<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Order; // Si vous voulez des stats sur les commandes aussi
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon; // Pour la manipulation des dates
use Illuminate\Support\Facades\DB; // Pour les requêtes DB

class AdminDashboardController extends Controller
{
   /**
     * Affiche le tableau de bord administrateur avec les statistiques
     * et les données préparées pour les graphiques Chart.js.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // --- Paramètres ---
        $lowStockThreshold = 10; // Seuil pour considérer un stock comme bas

        // --- Statistiques pour les Cartes (Cards) ---

        // Revenus (basés sur les factures non annulées)
        $revenueToday = Invoice::whereDate('invoice_date', Carbon::today())
                                ->where('status', '!=', 'cancelled')
                                ->sum('total_amount');

        $revenueThisMonth = Invoice::whereYear('invoice_date', Carbon::now()->year)
                                   ->whereMonth('invoice_date', Carbon::now()->month)
                                   ->where('status', '!=', 'cancelled')
                                   ->sum('total_amount');

        // Factures
        $invoicesTodayCount = Invoice::whereDate('invoice_date', Carbon::today())->count();
        $pendingInvoicesCount = Invoice::whereIn('status', ['unpaid', 'draft'])->count();
        $paidInvoicesCount = Invoice::where('status', 'paid')->count(); // Total factures payées (peut être utile)

        // Produits
        $totalProductsCount = Product::count();
        $lowStockProductsCount = Product::where('quantity', '<', $lowStockThreshold)
                                        ->where('is_available', true) // Optionnel: ne compter que ceux marqués dispo
                                        ->count();
        $outOfStockProductsCount = Product::where('quantity', '<=', 0)
                                           ->where('is_available', true) // Optionnel
                                           ->count();

        // Clients (utilisateurs avec le rôle 'client')
        $totalCustomersCount = User::role('client')->count();
        $newCustomersThisMonth = User::role('client')
                                      ->whereYear('created_at', Carbon::now()->year)
                                      ->whereMonth('created_at', Carbon::now()->month)
                                      ->count();


        // --- Préparation des Données pour les Graphiques Chart.js ---

        // 1. Revenu des 7 derniers jours
        $revenueLast7DaysLabels = [];
        $revenueLast7DaysData = [];
        // Boucle pour obtenir les 7 derniers jours (aujourd'hui inclus)
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $revenue = Invoice::whereDate('invoice_date', $date)
                              ->where('status', '!=', 'cancelled') // Exclure les annulées
                              ->sum('total_amount');

            // Formater le label (Ex: 'Lun 29/4') et ajouter aux tableaux
             // 'D' pour le jour abrégé (Lun, Mar...), 'j' pour le jour du mois, 'n' pour le mois sans zéro initial
            $revenueLast7DaysLabels[] = $date->translatedFormat('D j/n');
            $revenueLast7DaysData[] = round($revenue, 2); // Arrondir à 2 décimales
        }

        // 2. Répartition des statuts de factures
        $invoiceStatusCounts = Invoice::select('status', DB::raw('count(*) as count'))
                                       ->groupBy('status')
                                       ->pluck('count', 'status') // Résultat: ['status' => count]
                                       ->all(); // Convertir en tableau PHP

        // Définir l'ordre, les labels et les couleurs pour le graphique
        $statusOrder = ['paid', 'unpaid', 'draft', 'cancelled']; // Ordre souhaité dans le graphique
        $statusLabels = [
            'paid' => 'Payées',
            'unpaid' => 'Non Payées',
            'draft' => 'Brouillons',
            'cancelled' => 'Annulées'
        ];
        $statusColors = [
            'paid' => 'rgba(40, 167, 69, 0.8)',  // Vert (Bootstrap Success)
            'unpaid' => 'rgba(255, 193, 7, 0.8)',   // Jaune (Bootstrap Warning)
            'draft' => 'rgba(108, 117, 125, 0.8)', // Gris (Bootstrap Secondary)
            'cancelled' => 'rgba(220, 53, 69, 0.8)' // Rouge (Bootstrap Danger)
        ];

        $invoiceStatusChartLabels = [];
        $invoiceStatusChartData = [];
        $invoiceStatusChartColors = [];

        // Construire les données pour Chart.js en respectant l'ordre défini
        foreach ($statusOrder as $status) {
             // Ajouter seulement si le statut existe et a un compte > 0 (pour éviter des parts vides)
             // Si vous voulez voir même les statuts à 0, enlevez "&& $invoiceStatusCounts[$status] > 0"
            if (isset($invoiceStatusCounts[$status]) && $invoiceStatusCounts[$status] > 0) {
                $invoiceStatusChartLabels[] = $statusLabels[$status] ?? ucfirst($status); // Utilise le label défini ou capitalise
                $invoiceStatusChartData[] = $invoiceStatusCounts[$status];
                $invoiceStatusChartColors[] = $statusColors[$status] ?? 'rgba(150, 150, 150, 0.8)'; // Couleur grise par défaut
            }
        }

        // --- Rassembler toutes les données pour la vue ---
        // Utilisation d'un tableau structuré pour plus de clarté dans la vue
        $viewData = [
            // Données pour les cartes statistiques
            'stats' => [
                'revenueToday' => $revenueToday,
                'revenueThisMonth' => $revenueThisMonth,
                'invoicesTodayCount' => $invoicesTodayCount,
                'pendingInvoicesCount' => $pendingInvoicesCount,
                'paidInvoicesCount' => $paidInvoicesCount,
                'totalProductsCount' => $totalProductsCount,
                'lowStockProductsCount' => $lowStockProductsCount,
                'outOfStockProductsCount' => $outOfStockProductsCount,
                'totalCustomersCount' => $totalCustomersCount,
                'newCustomersThisMonth' => $newCustomersThisMonth,
                'lowStockThreshold' => $lowStockThreshold, // Passer le seuil à la vue
            ],
            // Données formatées pour les graphiques Chart.js
            'charts' => [
                'revenueLast7Days' => [
                    'labels' => $revenueLast7DaysLabels,
                    'data' => $revenueLast7DaysData,
                ],
                'invoiceStatus' => [
                    'labels' => $invoiceStatusChartLabels,
                    'data' => $invoiceStatusChartData,
                    'colors' => $invoiceStatusChartColors,
                ]
            ]
        ];

        // Retourner la vue en passant le tableau complet des données
        return view('WelcomeAdmin', $viewData);
    }
}
