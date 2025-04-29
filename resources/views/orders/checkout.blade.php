@extends('base')
@section('content')
    <div class="bg-gray-100  flex items-center mt-24 justify-center py-10">
        <div class="container w-[75%] mx-auto px-4">
            <h1 class="text-3xl font-semibold mb-6">Récapitulatif de votre commande</h1>
            @if (session('warning'))
                <div class="bg-yellow-200 border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Attention!</strong>
                    <span class="block sm:inline">{{ session('warning') }}</span>
                </div>
            @endif
            @if (!empty($cart))
                <div class="overflow-x-auto bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Articles dans votre panier</h2>
                    <table class="min-w-full leading-normal mb-4">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Produit</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Prix Unitaire</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Quantité</th>
                                <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Sous-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item['product']->name }}</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item['product']->prix }} FCFA</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item['quantity'] }}</td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $item['product']->prix * $item['quantity'] }} FCFA</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-gray-100">
                            <tr>
                                <td colspan="3" class="px-5 py-3 text-right font-semibold">Total:</td>
                                <td class="px-5 py-3 font-semibold">{{ $total }} FCFA</td>
                            </tr>
                        </tfoot>
                    </table>
    
                    <h2 class="text-xl font-semibold mb-4">Informations de livraison</h2>
                    <form action="{{ route('orders.place') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="shipping_address" class="block text-gray-700 text-sm font-bold mb-2">Adresse de livraison</label>
                            <textarea id="shipping_address" name="shipping_address" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                            @error('shipping_address')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <div class="flex justify-end">
                            <a href="{{ route('cart.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Retour au panier</a>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">Confirmer la commande</button>
                        </div>
                    </form>
                </div>
            @else
                <p class="py-4">Votre panier est vide. <a href="{{ route('products.indexClients') }}" class="text-blue-500 hover:underline">Continuer vos achats</a></p>
            @endif
        </div>
    </div>
@endsection