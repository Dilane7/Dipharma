<x-layaout>
    <div class="container">
        <h1 class="mb-4" style="color: #176abc">Tableau de Bord Administrateur</h1>

        {{-- Section Résumé Financier & Factures --}}
        <div class="row mb-4">
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-white bg-success shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-4 fw-bold">{{ number_format($stats['revenueToday'], 2, ',', ' ') }} XAF</div>
                                <div class="medium">Revenu Aujourd'hui</div>
                            </div>
                            <i class="bi bi-cash-coin fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-4 fw-bold">{{ number_format($stats['revenueThisMonth'], 2, ',', ' ') }} XAF</div>
                                <div class=" medium">Revenu Ce Mois</div>
                            </div>
                             <i class="bi bi-calendar-check fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-3 col-sm-6 mb-3">
                <div class="card bg-light shadow">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-4 fw-bold">{{ $stats['invoicesTodayCount'] }}</div>
                                <div class="small " style="color: #176abc;font-weight:bold">Factures Créées Aujourd'hui</div>
                            </div>
                             <i class="bi bi-receipt fs-1 text-info opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-3">
                <div class="card shadow bg-light">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs fw-bold"  style="font-weight:bold">{{ $stats['pendingInvoicesCount'] }}</div>
                                <div class=" small" style="color: #176abc;font-weight:bold">Factures Non Payées / Brouillons</div>
                            </div>
                             <i class="bi bi-hourglass-split fs-1 text-warning opacity-50"></i>
                        </div>
                         {{-- Lien optionnel vers la liste des factures filtrées --}}
                         {{-- <a href="{{ route('admin.invoices.index', ['status' => 'unpaid']) }}" class="stretched-link"></a> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Section Inventaire & Produits --}}
        <h2 class="h4 mb-3 st" >Inventaire</h2>
        <div class="row  mb-4">
            <div class="col-md-4 col-sm-6 mb-3">
                 <div class="card shadow bg-light">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-4 fw-bold">{{ $stats['totalProductsCount'] }}</div>
                                <div class="text-secondary medium" style="font-weight:bold">Produits au Total</div>
                            </div>
                             <i class="bi bi-box-seam fs-1 text-secondary opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4 col-sm-6 mb-3">
                <div class="card {{ $stats['lowStockProductsCount'] > 0 ? 'border-warning' : '' }}">
                    <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-4 fw-bold text-warning">{{ $stats['lowStockProductsCount'] }}</div>
                                <div class="text-warning medium" style="font-weight:bold">Produits en Stock Bas (< {{ $stats['lowStockThreshold'] }})</div>
                            </div>
                             <i class="bi bi-exclamation-triangle fs-1 text-warning opacity-50"></i>
                        </div>
                         {{-- Lien optionnel vers les produits filtrés --}}
                         {{-- <a href="{{ route('admin.products.index', ['stock' => 'low']) }}" class="stretched-link"></a> --}}
                    </div>
                </div>
            </div>
             <div class="col-md-4 col-sm-6 mb-3">
                 <div class="card shadow {{ $stats['outOfStockProductsCount'] > 0 ? 'border-danger' : '' }}">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-4 fw-bold text-danger">{{ $stats['outOfStockProductsCount'] }}</div>
                                <div class="text-danger medium" style="font-weight:bold">Produits en Rupture de Stock</div>
                            </div>
                             <i class="bi bi-x-octagon fs-1 text-danger opacity-50"></i>
                        </div>
                        {{-- Lien optionnel vers les produits filtrés --}}
                         {{-- <a href="{{ route('admin.products.index', ['stock' => 'out']) }}" class="stretched-link"></a> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Section Clients --}}
         <h2 class="h4 mb-3 st" >Clients</h2>
         <div class="row mb-4">
             <div class="col-md-6 mb-3">
                 <div class="card shadow bg-light">
                    <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-4 fw-bold" style="color: #176abc;font-weight:bold">{{ $stats['totalCustomersCount'] }}</div>
                                <div class=" medium" style="color: #176abc;font-weight:bold">Clients Enregistrés Total</div>
                            </div>
                             <i class="bi bi-people fs-1 text-primary opacity-50"></i>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-md-6 mb-3">
                 <div class="card shadow bg-light">
                    <div class="card-body">
                         <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="fs-4 text-success fw-bold" style="">{{ $stats['newCustomersThisMonth'] }}</div>
                                <div class="text-success medium" style="font-weight:bold">Nouveaux Clients Ce Mois</div>
                            </div>
                             <i class="bi bi-person-plus fs-1 text-success opacity-50"></i>
                        </div>
                    </div>
                </div>
             </div>
         </div>

          {{-- ========================== GRAPHIQUES ========================== --}}
    {{-- <h2 class="h4 mb-3">Visualisations</h2>
    <div class="row"> --}}
        {{-- Graphique Revenus 7 Jours --}}
        {{-- <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">Revenu des 7 derniers jours</div>
                <div class="card-body">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div> --}}

        {{-- Graphique Statuts Factures --}}
        {{-- <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">Répartition des Statuts de Factures</div>
                <div class="card-body">
                    <canvas id="invoiceStatusChart"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- ========================== FIN GRAPHIQUES ========================== --}}

         {{-- Autres sections possibles --}}
         {{-- - Dernières factures --}}
         {{-- - Dernières commandes --}}
         {{-- - Produits bientôt expirés --}}
         {{-- - Graphiques (nécessite une librairie JS comme Chart.js) --}}

    </div>
</x-layaout>
