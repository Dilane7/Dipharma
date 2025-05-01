@extends('base')
@section('title', 'Panier - Pharmacie Dipharma')
@section('content')

    <section class="bg-gradient-to-r mt-24 from-[#176abc] to-[#135a9e] text-white py-8 md:py-20 overflow-hidden">
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold mb-4 animate-fadeInUp">
                Votre Panier
            </h1>
        </div>
    </section>
    <div class="bg-gray-100  flex items-center  justify-center py-10">
        <div class="container shadow-md w-[75%] mx-auto rounded-xl  bg-white">

            @if (session('success'))
                <div class="bg-green-200 border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Succès!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if (empty($cart))
                <p class="py-4">Votre panier est vide.</p>
                <a href="{{ route('products.indexClient') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Continuer vos achats</a>
            @else
                <div class="overflow-x-auto rounded-xl">
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Produit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix Unitaire</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sous-total</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $id => $item)
                                <tr class="{{ $loop->even ? 'bg-gray-50' : '' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item['product']->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item['product']->prix }} FCFA</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('cart.update', $item['product']) }}" method="POST" class="inline-block">
                                            @csrf
                                            <div class="flex items-center space-x-2">
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md w-20" min="1">
                                                <button type="submit" class="bg-yellow-500 hover:border hover:text-yellow-500 hover:border-yellow-500 hover:bg-white text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline text-xs">Mettre à jour</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $item['product']->prix * $item['quantity'] }} FCFA</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right">
                                        <form action="{{ route('cart.remove', $item['product']) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:border hover:text-red-500 hover:border-red-500 hover:bg-white text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline text-xs" onclick="return confirm('Êtes-vous sûr de retirer ce produit du panier ?')">Retirer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-200">
                            <tr>
                                <td colspan="3" class="px-6 py-3 text-right font-semibold">Total:</td>
                                <td class="px-6 py-3 font-semibold">{{ $total }} FCFA</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5" class="px-6 py-3 text-right">
                                    <a href="{{ route('products.indexClient') }}" class="bg-[#176abc] hover:bg-white hover:border hover:border-[#176abc] hover:text-[#176abc] text-white font-semibold py-1 px-2 rounded-md focus:outline-none focus:shadow-outline mr-2">Continuer vos achats</a>
                                    <a href="{{ route('orders.checkout') }}" class="bg-green-500 hover:border hover:text-green-500 hover:border-green-500 hover:bg-white text-white font-semibold py-1 px-2 rounded-md focus:outline-none focus:shadow-outline">Passer à la caisse</a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
