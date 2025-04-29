<x-layaout>
    <div class="container mt-5">
        <h1>Détails de la Commande #{{ $order->id }}</h1>

        <div class="card mb-4">
            <div class="card-header">
                Informations de la Commande
            </div>
            <div class="card-body">
                <p><strong>ID Commande:</strong> {{ $order->id }}</p>
                <p><strong>Client:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
                <p><strong>Nom du Client (à la commande):</strong> {{ $order->customer_name }}</p>
                <p><strong>Adresse de Livraison:</strong> {{ $order->shipping_address }}</p>
                <p><strong>Date de Commande:</strong> {{ $order->order_date->format('d/m/Y H:i:s') }}</p>
                <p><strong>Statut:</strong> {{ $order->status }}</p>
                <p><strong>Total de la Commande:</strong> {{ $order->total_amount }} FCFA</p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Articles de la Commande
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Prix Unitaire</th>
                                <th>Quantité</th>
                                <th>Sous-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->unit_price }} FCFA</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->subtotal }} FCFA</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('orders.pending') }}" class="btn btn-primary">Retour aux commandes en attente</a>
        </div>
    </div>

</x-layaout>