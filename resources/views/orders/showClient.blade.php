@extends('base')
@section('title', 'Détails de la Commande - Pharmacie Dipharma')
@section('content')
<div class="bg-gray-100  flex items-center mt-24 justify-center py-10">
    <div class="container w-[75%] mx-auto px-4">
        <h1 class="text-3xl font-semibold mb-6">Détails de la Commande #{{ $order->id }}</h1>

        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Informations de la Commande</h2>
            <p class="mb-2"><strong class="font-semibold">ID Commande:</strong> {{ $order->id }}</p>
            <p class="mb-2"><strong class="font-semibold">Date de Commande:</strong> {{ $order->order_date->format('d/m/Y H:i:s') }}</p>
            <p class="mb-2"><strong class="font-semibold">Adresse de Livraison:</strong> {{ $order->shipping_address }}</p>
            <p class="mb-2"><strong class="font-semibold">Statut:</strong>
                @if ($order->status === 'en attente')
                    <span class="inline-block bg-yellow-200 text-yellow-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $order->status }}</span>
                @elseif ($order->status === 'validée')
                    <span class="inline-block bg-green-200 text-green-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $order->status }}</span>
                @elseif ($order->status === 'annulée')
                    <span class="inline-block bg-red-200 text-red-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $order->status }}</span>
                @else
                    <span class="inline-block bg-gray-200 text-gray-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $order->status }}</span>
                @endif
            </p>
            <p class="mb-2"><strong class="font-semibold">Total de la Commande:</strong> {{ $order->total_amount }} FCFA</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Articles de la Commande</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full leading-normal">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Produit</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Prix Unitaire</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Quantité</th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Sous-total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item->product->name }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item->unit_price }} FCFA</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item->quantity }}</td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item->subtotal }} FCFA</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('orders.history') }}" class="bg-[#176abc] hover:bg-white hover:border hover:border-[#176abc] hover:text-[#176abc] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour à l'historique</a>
        </div>
    </div>
</div>
@endsection
