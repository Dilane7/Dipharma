@extends('base')
@section('title', 'Nos Produits - Pharmacie Dipharma')
@section('content')
<section>
    <div class="relative w-full mt-10">
        <img src="{{ asset('assets/img/fun-bg.jpg') }}" alt="" class="object-cover h-80 w-full">
        <div class="bg-[#176abc]/70 text-white  h-80 absolute w-full top-0 z-1 flex justify-center items-center">
            <div class="animate-fadeInUp animate-delay-500">
                <h1 class="font-semibold text-4xl">Nos Produits Disponibles</h1>
                <span class="flex justify-center gap-2 my-2">
                    <a href="index.html" class="hover:text-[#014c6e]">Acceuil</a> <span> >  Produits</span>
                </span>
            </div>
        </div>
    </div>
</section>
<div class="bg-gray-200 min-h-screen flex items-center  justify-center py-10">
    <div class="container w-[75%]  mx-auto">
        <h1 class="text-3xl font-semibold mb-6 text-[#176abc]"></h1>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white shadow-md animate-fadeInUp animate-delay-500 rounded-xl overflow-hidden hover:scale-105 transition-transform">
                    <div class="relative">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-45 object-cover rounded-xl transition-transform hover:[transform:scale(0.92)]">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">Pas d'image</div>
                        @endif
                        <div class="absolute top-2 right-2">
                            <span class="inline-block rounded-lg px-1 pb-1 text-xs font-semibold {{ $product->is_available ? 'bg-green-600 text-white' : 'bg-red-500 text-white' }}">
                                {{ $product->is_available ? 'Disponible' : 'Indisponible' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h5 class="text-xl font-semibold mb-1">{{ $product->name }}</h5>
                        <p class="text-gray-600 text-sm mb-1">{{ Str::limit($product->description, 100) }}</p>

                        <div class="flex items-center justify-between">
                            <p class="text-green-500 text-sm font-bold">XAF  {{ $product->prix }} </p>
                            <form id="add-to-cart-form-{{ $product->id }}" action="{{ route('cart.add', $product) }}" method="POST" class="add-to-cart-form">
                                @csrf
                                {{-- <button type="button"  data-product-id="{{ $product->id }}" class="add-to-cart-button bg-[#176abc] hover:bg-white hover:border text-sm   hover:text-[#176abc] text-white py-1 px-2 rounded-lg focus:outline-none focus:shadow-outline mt-1" {{ !$product->is_available ? 'disabled' : '' }}>
                                    Acheter
                                </button> --}}
                                <button type="button" class="add-to-cart-button bg-[#176abc] hover:bg-white hover:border-[#176abc] hover:border-2 text-white hover:text-[#176abc] font-bold p-1 rounded-full focus:outline-none focus:shadow-outline mt-1 flex items-center justify-center w-9 h-9" data-product-id="{{ $product->id }}" {{ !$product->is_available ? 'disabled' : '' }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 fill-white hover:fill-[#176abc]" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 0a2 2 0 100 4 2 2 0 000-4z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-6">Aucun produit disponible pour le moment.</div>
            @endforelse
        </div>
        <div class="mt-6">
            {{ $products->links('vendor.pagination.tailwind') }}
        </div>
    </div>

</div>


@endsection
