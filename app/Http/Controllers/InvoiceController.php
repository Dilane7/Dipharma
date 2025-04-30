<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade for transactions
use Illuminate\Support\Facades\Log; // Optional: for logging errors

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('user', 'order')->latest()->paginate(15);
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource (Manual Invoice).
     */
    public function create()
    {
        $customers = User::role('client')->orderBy('name')->get(); // Assuming 'client' role for customers
        $products = Product::where('is_available', true)->orderBy('name')->get();
        return view('invoices.create', compact('customers', 'products'));
    }

    /**
     * Store a newly created resource in storage (Manual Invoice).
     */
    public function store(Request $request)
    {
        $request->validate([
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date|after_or_equal:invoice_date',
            'customer_type' => 'required|in:existing,walk_in',
            // Assurez-vous que user_id est bien validé s'il est fourni
            'user_id' => 'nullable|required_if:customer_type,existing|exists:users,id',
            // La validation 'string' est bonne, mais on va vérifier la source plus tard
            'customer_name' => 'required_if:customer_type,walk_in|nullable|string|max:255',
            'customer_phone' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string',
            'products' => 'required|array|min:1',
            'products.*.id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
            'status' => 'required|in:draft,unpaid,paid',
        ]);

        // Utilisez dd($request->all()); ici pour déboguer et voir les données entrantes si le problème persiste

        DB::beginTransaction();
        try {
            $invoiceData = $request->only(['invoice_date', 'due_date', 'notes', 'status', 'customer_phone', 'customer_address']);
            $invoiceData['invoice_number'] = Invoice::generateInvoiceNumber();

            $customerName = null; // Initialiser

            if ($request->customer_type == 'existing') {
                // La validation 'exists' a déjà confirmé que user_id est valide si fourni
                $customer = User::find($request->user_id);

                // --> Vérification cruciale <--
                if (!$customer) {
                     // Ne devrait pas arriver à cause de 'exists', mais sécurité supplémentaire
                     DB::rollBack();
                     return redirect()->back()->withInput()->withErrors(['user_id' => 'Le client sélectionné est introuvable.']);
                }
                if (empty($customer->name) || !is_string($customer->name)) {
                    // Gérer le cas où le nom de l'utilisateur n'est pas une chaîne valide
                    DB::rollBack();
                    return redirect()->back()->withInput()->withErrors(['user_id' => "Le client sélectionné (ID: {$customer->id}) n'a pas de nom valide enregistré. Veuillez mettre à jour le profil."]);
                    // Alternativement, définir un nom par défaut si autorisé par votre logique métier:
                    // $customerName = 'Client ID ' . $customer->id;
                } else {
                    $customerName = $customer->name; // C'est une chaîne valide
                }
                // <-- Fin de la vérification -->

                $invoiceData['user_id'] = $customer->id;
                // Remplir le téléphone/adresse depuis l'utilisateur si non fourni dans le formulaire
                $invoiceData['customer_phone'] = $request->filled('customer_phone') ? $request->customer_phone : $customer->telephone;
                 // Adaptez 'address' au nom de champ réel dans votre modèle User si nécessaire
                 // $invoiceData['customer_address'] = $request->filled('customer_address') ? $request->customer_address : $customer->address;

            } else { // customer_type == 'walk_in'
                // La validation 'required_if' garantit que $request->customer_name est présent et 'string' garantit le type
                $customerName = $request->customer_name;
            }

            // Assigner le nom client validé ou dérivé
            // Vérification finale pour s'assurer qu'on a bien un nom avant de créer
             if (empty($customerName)) {
                DB::rollBack();
                // Cette erreur ne devrait pas arriver si la logique ci-dessus est correcte, mais c'est une sécurité
                return redirect()->back()->withInput()->withErrors(['error' => 'Impossible de déterminer le nom du client pour la facture.']);
            }
            $invoiceData['customer_name'] = $customerName;


            // *** Le reste de votre logique pour créer l'invoice et les lignes ***
            // ... (création de l'invoice)
            $invoice = Invoice::create($invoiceData);

            // ... (boucle pour les produits, décrémentation stock, création lignes)
            $subTotal = 0;
            $linesData = [];
            $productsToUpdateStock = []; // Pour décrémenter après la boucle

            foreach ($request->products as $item) {
                $product = Product::find($item['id']);
                // Mettre des vérifications robustes ici (produit existe, stock, etc.)
                 if (!$product || !$product->is_available) {
                    throw new \Exception("Produit non trouvé ou indisponible: ID " . $item['id']);
                }
                $requestedQuantity = (int)$item['quantity'];
                 if ($product->quantity < $requestedQuantity) {
                    throw new \Exception("Stock insuffisant pour: " . $product->name . ". Demandé: " . $requestedQuantity . ", Dispo: " . $product->quantity);
                }

                $unitPrice = $product->prix;
                $lineTotal = $requestedQuantity * $unitPrice;
                $subTotal += $lineTotal;

                 $linesData[] = [
                    // ... détails ligne ...
                    'invoice_id' => $invoice->id, // Assigner l'ID de la facture créée
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => $requestedQuantity,
                    'unit_price' => $unitPrice,
                    'line_total' => $lineTotal,
                    'created_at' => now(),
                    'updated_at' => now(),
                 ];

                 // Garder une trace pour la mise à jour du stock
                 $productsToUpdateStock[] = ['product' => $product, 'decrement' => $requestedQuantity];
            }

            // Insérer les lignes
             if (!empty($linesData)) {
                 DB::table('invoice_lines')->insert($linesData);
             } else {
                  throw new \Exception("Aucun produit valide à ajouter à la facture."); // Ou gérer autrement
             }


            // Mettre à jour les totaux de la facture
            $invoice->update([
                'sub_total' => $subTotal,
                'total_amount' => $subTotal, // Ajuster avec taxes si nécessaire
            ]);

             // Décrémenter le stock APRES que tout le reste ait réussi (juste avant commit)
            foreach ($productsToUpdateStock as $updateInfo) {
                $prod = $updateInfo['product'];
                $dec = $updateInfo['decrement'];
                $prod->quantity -= $dec; // Mise à jour directe ou $prod->decrement('quantity', $dec);
                 if ($prod->quantity <= 0) {
                     $prod->is_available = false;
                 }
                $prod->save();
            }


            DB::commit(); // Commit transaction

            return redirect()->route('invoices.show', $invoice)->with('success', 'Facture créée avec succès.');

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on error
            Log::error("Erreur création facture manuelle: " . $e->getMessage());
            // Rediriger avec l'erreur spécifique
            return redirect()->back()->withInput()->withErrors(['error' => 'Erreur lors de la création de la facture: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('lines.product', 'user', 'order'); // Eager load relationships
        return view('invoices.show', compact('invoice'));
    }

    // Removed duplicate edit method to avoid redeclaration error.




    /**
     * Update the specified resource in storage.
     * (Optional)
     */
    public function update(Request $request, Invoice $invoice)
    {
         if ($invoice->status !== 'draft') {
            // return redirect()->route('admin.invoices.show', $invoice)->with('error', 'Seules les factures brouillons peuvent être modifiées.');
        }
        // Add validation and update logic
        abort(404); // Or implement update functionality
    }


         /**
     * Annule (change le statut à 'cancelled') la facture spécifiée et restaure le stock.
     */
    public function destroy(Invoice $invoice)
    {
        // Vérification 1: Ne pas annuler une facture payée
        if ($invoice->status == 'paid') {
            return redirect()->route('invoices.show', $invoice)
                             ->with('error', 'Impossible d\'annuler une facture qui est déjà marquée comme payée.');
        }

        // Vérification 2: Ne pas annuler une facture déjà annulée
        if ($invoice->status == 'cancelled') {
             return redirect()->route('invoices.show', $invoice)->with('warning', 'Cette facture est déjà annulée.');
        }

        // Charger les lignes de facture et les produits associés AVANT la transaction
        // C'est important pour que la restauration du stock se fasse sur les bonnes données
        // et pour éviter les problèmes de N+1 requêtes dans la boucle.
        $invoice->load('lines.product');

        DB::beginTransaction();
        try {
            // ---> ÉTAPE : RESTAURATION DU STOCK <---
            Log::info("Début de la restauration du stock pour annulation de la facture #{$invoice->invoice_number}"); // Log pour suivi

            foreach ($invoice->lines as $line) {
                // Vérifier si le produit lié existe toujours
                if ($line->product) {
                    $product = $line->product;
                    $quantityToRestore = $line->quantity;

                    Log::info("Restauration de {$quantityToRestore} unités pour le produit ID: {$product->id} ({$product->name})");

                    // Incrémente le stock du produit. increment() est atomique.
                    $product->increment('quantity', $quantityToRestore);

                    // Optionnel mais recommandé: Rendre le produit de nouveau disponible s'il ne l'était plus
                    // uniquement à cause de cette vente (stock tombé à 0).
                    // Vérifie si le produit n'est pas disponible ET si son stock actuel (après incrément) est > 0
                    // Cette vérification après increment est fiable car increment met à jour directement la BDD.
                    // Pour être 100% sûr dans le code PHP, on pourrait recharger le produit : $product->refresh();
                    // Mais on peut supposer que si on ajoute de la quantité, elle devient > 0.
                    if (!$product->is_available && $product->quantity > 0) {
                         $product->update(['is_available' => true]);
                         Log::info("Produit ID: {$product->id} marqué comme disponible car stock restauré > 0.");
                    }

                } else {
                    // Le produit associé à cette ligne de facture n'existe plus. Loguer une alerte.
                    Log::warning("Produit ID {$line->product_id} associé à la ligne de facture {$line->id} (Facture #{$invoice->invoice_number}) non trouvé lors de la restauration du stock. Stock non restauré pour cet article.");
                }
            }
            // ---> FIN RESTAURATION DU STOCK <---

            // Mettre à jour le statut de la facture à 'cancelled'
            $invoice->update(['status' => 'cancelled']);
            Log::info("Statut de la facture #{$invoice->invoice_number} mis à jour à 'cancelled'.");

            DB::commit(); // Valide la transaction (mise à jour statut ET restauration stock)

            // Message flash mis à jour
            return redirect()->route('invoices.index')->with('success', 'Facture annulée avec succès. Le stock des produits associés a été restauré.');

        } catch (\Exception $e) {
            DB::rollBack(); // Annule TOUTES les opérations (statut ET stock) en cas d'erreur
            Log::error("Erreur lors de l'annulation de la facture #{$invoice->id} et/ou de la restauration du stock: " . $e->getMessage(), ['exception' => $e]);

            // Message d'erreur mis à jour
            return redirect()->route('invoices.show', $invoice)->with('error', 'Une erreur est survenue lors de l\'annulation de la facture et de la restauration du stock. Veuillez vérifier les logs.');
        }

    }

        /**
     * Create an invoice automatically from an existing order.
     */
    public function createFromOrder(Order $order)
    {
        if ($order->invoice) {
            return redirect()->route('invoices.show', $order->invoice)
                             ->with('warning', 'Une facture existe déjà pour cette commande.');
        }

        if (!in_array($order->status, ['en attente', 'shipped', 'processing'])) { // Adaptez les statuts
             return redirect()->route('orders.show', $order) // Adaptez la route si nécessaire
                              ->with('error', 'La commande n\'est pas dans un état permettant la facturation.');
        }

        // Charger la relation user ET la relation orderItems avec les produits associés aux orderItems
        // Note: Ceci suppose que votre modèle OrderItem a une relation belongsTo('product')
        $order->load('user', 'orderItems.product'); // <--- CHANGEMENT ICI

        // Vérifier si la collection d'items est vide
        if ($order->orderItems->isEmpty()) { // <--- CHANGEMENT ICI
             return redirect()->route('orders.show', $order) // Adaptez la route si nécessaire
                              ->with('error', 'La commande ne contient aucun article à facturer.');
        }


        DB::beginTransaction();
        try {
            // Créer la facture
            $invoice = Invoice::create([
                'invoice_number' => Invoice::generateInvoiceNumber(),
                'invoice_date' => now()->toDateString(),
                'order_id' => $order->id,
                'user_id' => $order->user_id,
                'customer_name' => $order->customer_name ?? $order->user->name,
                'customer_phone' => $order->user->telephone ?? null,
                'customer_address' => $order->shipping_address,
                'sub_total' => 0,
                'total_amount' => $order->total_amount, // Ou recalculer basé sur les lignes
                'status' => 'paid',
                'notes' => 'Facture générée depuis la commande #' . $order->id,
            ]);

            $subTotal = 0;
            $linesData = [];
            $productsToUpdateStock = []; // Pour la mise à jour du stock

            // Créer les lignes de facture à partir des OrderItems
            // Note: Utilisation de $orderItem comme variable de boucle
            foreach ($order->orderItems as $orderItem) { // <--- CHANGEMENT ICI

                // Assurez-vous que OrderItem a bien les propriétés 'quantity' et 'price'
                // et qu'il a accès au produit via la relation 'product' chargée plus haut
                if (!$orderItem->product) {
                    throw new \Exception("Produit lié manquant pour l'article de commande ID: " . $orderItem->id);
                }

                $unitPrice = $orderItem->unit_price; // Prix au moment de la commande
                $quantity = $orderItem->quantity;
                $lineTotal = $quantity * $unitPrice;
                $subTotal += $lineTotal;

                $linesData[] = [
                    'invoice_id' => $invoice->id,
                    'product_id' => $orderItem->product_id,
                    'product_name' => $orderItem->product->name, // Nom actuel du produit
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'line_total' => $lineTotal,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                // Préparer la mise à jour du stock (si elle se fait à la facturation)
                 $productsToUpdateStock[] = ['product' => $orderItem->product, 'decrement' => $quantity];
            }

            // Insérer les lignes de facture
             if (!empty($linesData)) {
                DB::table('invoice_lines')->insert($linesData);
            } else {
                 throw new \Exception("Aucun article de commande valide trouvé pour créer les lignes de facture.");
            }

            // Mettre à jour les totaux de la facture (recalculer le sous-total est une bonne pratique)
             $invoice->update([
                'sub_total' => $subTotal,
                // Vous pourriez aussi recalculer le total_amount ici si vous avez des taxes
                 // 'total_amount' => $subTotal + $calculated_tax,
            ]);

            // Mettre à jour le stock (si applicable à cette étape)
            foreach ($productsToUpdateStock as $updateInfo) {
                 $product = $updateInfo['product'];
                 $decrement = $updateInfo['decrement'];

                 // Vérification de stock (optionnelle mais recommandée)
                 if ($product->quantity < $decrement) {
                     throw new \Exception("Stock devenu insuffisant (lors de la facturation) pour : " . $product->name);
                 }

                 $product->decrement('quantity', $decrement);
                 if ($product->quantity <= 0) {
                    $product->update(['is_available' => false]);
                 }
            }

            DB::commit();

            return redirect()->route('invoices.show', $invoice)->with('success', 'Facture créée avec succès à partir de la commande.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Erreur création facture depuis commande #{$order->id}: " . $e->getMessage());
             return redirect()->route('orders.show', $order) // Adaptez la route
                              ->with('error', 'Erreur lors de la création de la facture: ' . $e->getMessage());
        }
    }


}
