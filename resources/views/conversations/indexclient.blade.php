@extends('base')
@section('content')
<section class="bg-gradient-to-r md:mt-24 mt-5 from-[#176abc] to-[#135a9e] text-white py-10 md:py-15 overflow-hidden">
    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 animate-fadeInUp">
            Vos conversations
        </h1>
    </div>
</section>
<div class="bg-gray-100 flex items-center justify-center py-10">
    <div class="container w-[50%]  mx-auto px-6 py-8 md:py-12">
        <h1 class="text-2xl md:text-3xl font-bold text-[#176abc] mb-6">Mes Messages</h1>
    
    
        <div class="mb-6 text-right">
            <a href="{{ route('conversations.create') }}" class="inline-block bg-[#176abc] text-white font-semibold px-5 py-2 rounded-lg shadow-sm hover:bg-[#135a9e] transition-colors duration-200">
                Nouvouvelle Conversation
            </a>
        </div>
       
    
        <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
            @if($conversations->count() > 0)
                <ul class="divide-y divide-gray-200">
                    @foreach($conversations as $conversation)
                        {{-- Déterminer si non lu par le client --}}
                        @php
                            $isUnread = $conversation->latestMessage && $conversation->latestMessage->sender_id != Auth::id() && !$conversation->latestMessage->is_read;
                        @endphp
    
                        <li class="hover:bg-gray-50 transition-colors duration-150 {{ $isUnread ? 'bg-blue-50 font-semibold' : '' }}">
                            <a href="{{ route('conversations.show', $conversation) }}" class="block p-4 sm:p-6">
                                <div class="flex items-center justify-between gap-4">
                                    {{-- Sujet et Expéditeur du dernier message --}}
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium {{ $isUnread ? 'text-[#176abc]' : 'text-gray-800' }} truncate">
                                            {{ $conversation->subject ?? 'Conversation #' . $conversation->id }}
                                        </p>
                                        <p class="text-xs sm:text-sm {{ $isUnread ? 'text-gray-700' : 'text-gray-500' }} mt-1 truncate">
                                            @if($conversation->latestMessage)
                                                @if($conversation->latestMessage->sender_id == Auth::id())
                                                    <span class="font-normal">Vous:</span>
                                                @else
                                                    {{-- Idéalement, on aurait le nom de l'admin ici --}}
                                                    <span class="font-normal">Support:</span>
                                                @endif
                                                {{ Str::limit($conversation->latestMessage->body, 50) }} {{-- Limite l'aperçu --}}
                                            @else
                                                <span class="italic">Aucun message</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- Date et Statut/Indicateur Non Lu --}}
                                    <div class="flex-shrink-0 text-right ml-2">
                                        <p class="text-xs text-gray-500 whitespace-nowrap">
                                            {{ $conversation->last_reply_at ? $conversation->last_reply_at->diffForHumans() : $conversation->created_at->diffForHumans() }}
                                        </p>
                                        @if($isUnread)
                                            <span class="mt-1 inline-block bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">
                                                Nouveau
                                            </span>
                                         @elseif($conversation->status == 'closed')
                                             <span class="mt-1 inline-block bg-gray-400 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">
                                                Fermée
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
    
                {{-- Pagination --}}
                @if ($conversations->hasPages())
                    <div class="p-4 bg-gray-50 border-t border-gray-200">
                        {{ $conversations->links() }}
                    </div>
                @endif
    
            @else
                <div class="p-10 text-center text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <p class="mt-4 text-lg">Vous n'avez aucune conversation.</p>
                    <p class="mt-2 text-sm">Commencez une nouvelle conversation si vous avez une question.</p>
                    {{-- Lien vers la création si implémentée --}}
                    {{-- <a href="{{ route('conversations.create') }}" class="mt-6 inline-block text-[#176abc] hover:underline">Démarrer une conversation</a> --}}
                </div>
            @endif
        </div>
        <div class="mt-8">
            <a href="{{ route('welcome') }}" class="bg-[#176abc] text-white rounded py-1 px-2" >Retour a l'acceuil</a>
        </div>
        

    </div>
</div>
@endsection