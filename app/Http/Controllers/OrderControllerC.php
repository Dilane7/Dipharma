<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OrderControllerC extends Controller
{
    //
    /**
     * Affiche la page de confirmation de la commande (checkout).
     */
    public function checkout(): View
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['product']->prix * $item['quantity'];
        }

        if (empty($cart)) {
            return view('cart.empty')->with('warning', 'Votre panier est vide.');
        }

        $user = auth()->user(); // Récupérer l'utilisateur connecté

        return view('orders.checkout', compact('cart', 'total', 'user'));
    }

    public function placeOrder(Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('client.cart.index')->with('warning', 'Votre panier est vide.');
        }

        $request->validate([
            'shipping_address' => 'required|string|max:255',
        ]);

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['product']->prix * $item['quantity'];
        }

        $user = Auth::user(); // Récupérer l'utilisateur connecté

        $order = Order::create([
            'user_id' => $user->id,
            'order_date' => now(),
            'total_amount' => $totalAmount,
            'status' => 'en attente',
            'shipping_address' => $request->shipping_address,
            'customer_name' => $user->name, // Enregistrer le nom au moment de la commande
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['product']->id,
                'quantity' => $item['quantity'],
                'unit_price' => $item['product']->prix,
                'subtotal' => $item['product']->prix * $item['quantity'],
            ]);

            // SUPPRESSION DE LA DÉDUCTION DU STOCK ICI
            // $item['product']->decrement('quantity', $item['quantity']);
        }

        session()->forget('cart');
        return redirect()->route('orders.thankyou')->with('success', 'Votre commande a été placée avec succès et est en attente de validation.');
    }

    /**
     * Affiche la page de remerciement après la commande.
     */
    public function thankyou(): View
    {
        return view('orders.thankyou');
    }

    /**
     * Affiche l'historique des commandes de l'utilisateur connecté.
     */
    public function history(): View
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->paginate(10);
        return view('orders.history', compact('orders'));
    }

    /**
     * Annule une commande spécifique si elle est en attente.
     */
    public function cancel(Order $order): RedirectResponse
    {
        if ($order->user_id !== Auth::id()) {
            return back()->with('error', 'Vous n\'êtes pas autorisé à annuler cette commande.');
        }

        if ($order->status === 'en attente') {
            // Récupérer tous les articles de la commande
            $orderItems = $order->orderItems;

            // Parcourir chaque article et restituer la quantité au produit
            foreach ($orderItems as $item) {
                $product = $item->product;
                $product->increment('quantity', $item->quantity);
                $product->save(); // Sauvegarder les changements du produit
            }

            // Mettre à jour le statut de la commande à "annulée"
            $order->update(['status' => 'annulée']);

            return redirect()->route('orders.history')->with('success', "La commande #{$order->id} a été annulée et les quantités ont été restituées au stock.");
        } else {
            return redirect()->route('orders.history')->with('warning', "La commande #{$order->id} ne peut pas être annulée car son statut est '{$order->status}'.");
        }
    }

    /**
     * Affiche les détails d'une commande spécifique pour le client.
     */
    public function show(Order $order): View
    {
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Vous n\'êtes pas autorisé à voir les détails de cette commande.');
        }

        $order->load('orderItems.product'); // Charger les articles de la commande et leurs produits
        return view('orders.showClient', compact('order'));
    }
}
