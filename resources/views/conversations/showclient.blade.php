@extends('base')
@section('title', 'Conversation : ' . ($conversation->subject ?? 'Détails'))

@section('content')
<section class="bg-gradient-to-r md:mt-24 mt-5 from-[#176abc] to-[#135a9e] text-white py-10 md:py-15 overflow-hidden">
    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 animate-fadeInUp">
            Conversation : {{ $conversation->subject ?? '#' . $conversation->id }}
        </h1>
    </div>
</section>
<div class="bg-gray-50 flex items-center justify-center py-10">
    <div class="container w-[50%] mt-24 mx-auto px-6 py-8">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Conversation : {{ $conversation->subject ?? '#' . $conversation->id }}</h1>
        <p class="text-sm text-gray-600 mb-6">Avec : Support Pharmacie</p> {{-- Ou nom de l'admin si connu --}}
    
        {{-- Affichage des messages --}}
        <div class="bg-white shadow-md rounded-lg p-4 md:p-6 space-y-4 max-h-[60vh] overflow-y-auto mb-6 border border-gray-100">
            @forelse($conversation->messages as $message)
                {{-- Message de l'autre personne (Admin) --}}
                @if($message->sender_id != Auth::id())
                    <div class="flex items-start gap-3">
                        {{-- Avatar générique Admin --}}
                        <span class="flex-shrink-0 inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-100 text-[#176abc]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" /></svg>
                        </span>
                        <div class="flex-1 bg-gray-100 rounded-lg  p-3">
                            <p class="text-sm text-gray-800">{!! nl2br(e($message->body)) !!}</p>
                            <p class="text-xs text-gray-500 mt-1 text-right">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                {{-- Message de l'utilisateur connecté (Client) --}}
                @else
                    <div class="flex items-start gap-3 justify-end">
                        <div class="flex-1 bg-[#176abc] text-white rounded-lg p-3 max-w-xs sm:max-w-md lg:max-w-lg">
                            <p class="text-sm">{!! nl2br(e($message->body)) !!}</p>
                             <p class="text-xs text-blue-100/80 mt-1 text-right">{{ $message->created_at->diffForHumans() }}</p>
                        </div>
                         {{-- Avatar Client --}}
                        <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('assets/img/undraw_profile.svg') }}" alt="Vous" class="flex-shrink-0 h-10 w-10 rounded-full object-cover">
                    </div>
                @endif
            @empty
                <p class="text-center text-gray-500">Aucun message dans cette conversation pour le moment.</p>
            @endforelse
        </div>
    
        {{-- Formulaire de réponse --}}
         @if($conversation->status != 'closed')
         {{-- ($conversation->status == 'open' || $conversation->status == 'pending_client') N'afficher que si la conv est ouverte/attend réponse client --}}
            <div class="bg-white shadow-md rounded-lg p-4 md:p-6 border border-gray-100">
                <form action="{{ route('conversations.reply', $conversation) }}" method="POST">
                    @csrf
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-1">Votre réponse :</label>
                    <textarea name="body" id="body" rows="4" required
                              class="w-full px-3 py-2 border rounded-md shadow-sm focus:ring-[#176abc] focus:border-[#176abc] resize-none @error('body') border-red-500 @enderror border-gray-300"
                              placeholder="Écrivez votre message ici..."></textarea>
                    @error('body') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    
                    <div class="mt-4 text-right">
                        <button type="submit"
                                class="inline-flex items-center px-6 py-2 bg-[#44C244] border border-transparent rounded-md font-semibold text-sm text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition ease-in-out duration-150">
                            Envoyer
                        </button>
                    </div>
                </form>
            </div>
        @else
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md" role="alert">
                <p class="font-bold">Conversation Fermée</p>
                <p>Cette conversation est actuellement fermée. Contactez le support si nécessaire.</p>
            </div>
        @endif
    
         <div class="mt-6 text-sm">
             <a href="{{ route('conversations.index') }}" class="text-[#176abc] hover:underline">← Retour à mes messages</a>
         </div>
    
    </div>
</div>
@endsection