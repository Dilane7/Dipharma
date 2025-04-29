<x-layaout>
       <div class="container mt-5">
        <h3 class="" style="color: #176abc">Commandes Validées</h3>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($validatedOrders->isEmpty())
            <p>Aucune commande validée pour le moment.</p>
        @else
            <div class="table-responsive p-3 shadow bg-white rounded">
                <table class="table table-bordered">
                    <thead style="color: black">
                        <tr>
                            <th>ID Commande</th>
                            <th>Client</th>
                            <th>Nom du Client</th>
                            <th>Adresse de Livraison</th>
                            <th>Date de Commande</th>
                            <th>Total</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody style="color: black">
                        @foreach ($validatedOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }} ({{ $order->user->email }})</td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->shipping_address }}</td>
                                <td>{{ $order->order_date->format('d/m/Y H:i') }}</td>
                                <td style="color: #176abc">{{ $order->total_amount }} FCFA</td>
                                <td>
                                    @if ($order->status === 'en attente')
                                        <span class="badge badge-warning">{{ $order->status }}</span>
                                    @elseif ($order->status === 'validée')
                                        <span class="badge badge-success">{{ $order->status }}</span>
                                    @else
                                        <span>{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('orders.show', $order) }}" class="btn text-primary "><i class='fas fa-eye' style='font-size:17px'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $validatedOrders->links() }}
            </div>
        @endif
       </div>
</x-layaout>