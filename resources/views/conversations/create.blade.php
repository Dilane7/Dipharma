@extends('base')

@section('title', 'Nouveau Message - Pharmacie Diilane')

@section('content')
<div class="py-12 mt-24 bg-gray-50"> {{-- Fond légèrement différent pour la page --}}
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-md rounded-lg border border-gray-100">
            <div class="px-6 py-5 bg-[#176abc] text-white border-b border-blue-700">
                {{-- Utilisation de text-lg ou text-xl pour le titre --}}
                <h1 class="text-xl font-semibold leading-6">Démarrer une Nouvelle Conversation</h1>
            </div>
            <div class="p-6">
                <p class="text-sm text-gray-600 mb-6">
                    Posez votre question ou décrivez votre demande ici. Notre équipe vous répondra dans les meilleurs délais.
                </p>

                {{-- Affichage des erreurs générales --}}
                @if (session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Erreur !</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                {{-- Formulaire --}}
                <form action="{{ route('conversations.store') }}" method="POST" class="space-y-5"> {{-- Espace vertical entre les éléments --}}
                    @csrf

                    {{-- Champ Sujet --}}
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                            Sujet <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required
                               class="appearance-none block w-full px-4 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm
                                      @error('subject') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-[#176abc] focus:border-[#176abc] @enderror">
                        @error('subject')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Champ Message --}}
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">
                            Votre Message <span class="text-red-500">*</span>
                        </label>
                        <textarea name="body" id="body" rows="6" required
                                  class="appearance-none block w-full px-4 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm resize-none
                                         @error('body') border-red-500 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-[#176abc] focus:border-[#176abc] @enderror"
                                  placeholder="Écrivez votre message ici...">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Boutons d'action --}}
                    <div class="flex justify-end gap-4 pt-3">
                        <a href="{{ route('conversations.index') }}"
                           class="inline-flex justify-center py-2 px-5 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex justify-center items-center py-2 px-5 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#44C244] hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                            Démarrer la Conversation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection