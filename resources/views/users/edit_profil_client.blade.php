@extends('base')
@section('title', 'Edit Profil Client')
@section('content')
<section class="bg-gradient-to-r md:mt-24 mt-5 from-[#176abc] to-[#135a9e] text-white py-10 md:py-15 overflow-hidden">
    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 animate-fadeInUp">
            Modifier mon Profil
        </h1>
    </div>
</section>
<div class="bg-gray-50">
    <div class="mx-auto  w-1/3 py-4">
        <h3 class="mb-4 text-xl font-semibold" style="color:#176abc"></h3>
    
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                <strong class="font-bold">Succès!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
    
        <form action="{{ route('profile.updateC') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded p-4">
            @csrf
            @method('PUT')
    
            <div class="mb-3">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nom</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="telephone" class="block text-gray-700 text-sm font-bold mb-2">Téléphone</label>
                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telephone') border-red-500 @enderror" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}">
                @error('telephone')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="photo" class="block text-gray-700 text-sm font-bold mb-2">Photo actuelle</label>
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Votre photo" width="100" class="block mb-2">
                @else
                    <p class="text-red-500">Aucune photo enregistrée.</p>
                @endif
                <label for="photo" class="block text-blue-700 text-sm font-bold mb-2">Changer la photo</label>
                <input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('photo') border-red-500 @enderror" id="photo" name="photo">
                @error('photo')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Nouveau mot de passe <span class="text-red-500">(laisser vide pour ne pas changer)</span></label>
                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror" id="password" name="password">
                @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmer le nouveau mot de passe</label>
                <input type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password_confirmation" name="password_confirmation">
            </div>
    
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Mettre à jour le profil</button>
            <a href="{{ route('welcome') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">Annuler</a>
        </form>
    </div>
</div>
@endsection