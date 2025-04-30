<x-layaout>
    <div class="container">
        <h3 class="mb-4" style="color: #176abc">Commandes en Attente</h3>

        @if (session('success'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($pendingOrders->isEmpty())
            <p class="lead">Aucune commande en attente pour le moment.</p>
        @else
            <div class="table-responsive  bg-white rounded shadow-sm">
                <table class="table table-striped table-hover" style="color: black">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID Commande</th>
                            <th scope="col">Client</th>
                            <th scope="col">Nom du Client</th>
                            <th scope="col">Adresse de Livraison</th>
                            <th scope="col">Date de Commande</th>
                            <th scope="col">Total</th>
                            <th>Statut</th>
                            <th scope="col" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }} ({{ $order->user->email }})</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->shipping_address }}</td>
                                <td>{{ $order->order_date->format('d/m/Y H:i') }}</td>
                                <td>{{ $order->total_amount }} FCFA</td>
                                <td>
                                    @if ($order->status === 'en attente')
                                        <span class="badge badge-warning">{{ $order->status }}</span>
                                    @elseif ($order->status === 'validée')
                                        <span class="badge badge-success">{{ $order->status }}</span>
                                    @else
                                        <span>{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td class="text-end d-flex gap-2">
                                    <a href="{{ route('orders.show', $order) }}" class="btn text-info "><i class='fas fa-eye' style='font-size:17px'></i></a>
                                    <a href="{{ route('orders.validate', $order) }}" class="btn  "><i class="fa fa-check" style="font-size:17px;color: rgb(65, 245, 65)"></i></a>
                                    {{-- Add this condition and button --}}
                                    @if(!$order->invoice && in_array($order->status, ['en attente', 'shipped', 'processing'])) {{-- Adjust statuses as needed --}}
                                    <a href="{{ route('invoices.createFromOrder', $order) }}" class="btn btn-sm btn-outline-primary" title="Créer Facture">
                                        <i class="bi bi-receipt"></i> Créer Facture
                                    </a>
                                    @elseif($order->invoice)
                                        <a href="{{ route('invoices.show', $order->invoice) }}" class="btn btn-sm btn-outline-success" title="Voir Facture">
                                            <i class="bi bi-receipt-cutoff"></i> Voir Facture
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $pendingOrders->links() }}
            </div>
        @endif
    </div>
</x-layaout>
