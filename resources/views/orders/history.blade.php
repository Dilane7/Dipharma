@extends('base')
@section('title', 'Historique des Commandes - Pharmacie Dipharma')
@section('content')
<section class="bg-gradient-to-r md:mt-24 mt-5 from-[#176abc] to-[#135a9e] text-white py-10 md:py-15 overflow-hidden">
    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 animate-fadeInUp">
            Historique de mes commandes
        </h1>
    </div>
</section>
<div class="bg-gray-100">
    <div class="container w-[75%] py-10 mx-auto px-4">

    @if (session('success'))
        <div class="bg-green-200 border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Succès!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if (session('warning'))
        <div class="bg-yellow-200 border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Attention!</strong>
            <span class="block sm:inline">{{ session('warning') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-200 border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Erreur!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    @if ($orders->isEmpty())
        <p class="py-4">Vous n'avez passé aucune commande pour le moment.</p>
    @else
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full leading-normal">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID Commande</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date de Commande</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Statut</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->order_date->format('d/m/Y H:i') }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $order->total_amount }} FCFA</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                @if ($order->status === 'en attente')
                                    <span class="inline-block bg-yellow-200 text-yellow-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $order->status }}</span>
                                @elseif ($order->status === 'validée')
                                    <span class="inline-block bg-green-200 text-green-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $order->status }}</span>
                                @elseif ($order->status === 'annulée')
                                    <span class="inline-block bg-red-200 text-red-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $order->status }}</span>
                                @else
                                    <span class="inline-block bg-gray-200 text-gray-800 rounded-full px-2 py-1 text-xs font-semibold">{{ $order->status }}</span>
                                @endif
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-right">
                                <a href="{{ route('orders.showClient', $order) }}" class="text-blue-500 hover:underline mr-2">Détails</a>
                                @if ($order->status === 'en attente')
                                    <form action="{{ route('orders.cancel', $order) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline text-xs" onclick="return confirm('Êtes-vous sûr d\'annuler cette commande ?')">Annuler</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">
            {{ $orders->links('vendor.pagination.tailwind') }}
        </div>
    @endif
</div>
</div>
@endsection
