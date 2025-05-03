<x-layaout>
    <div class="container w-50 my-4">

        {{-- Header de la conversation --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                 <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">
                    <div>
                        <h6 class="m-0 font-weight-bold text-primary">
                           Conversation : {{ $conversation->subject ?? '#' . $conversation->id }}
                        </h6>
                        <small class="text-muted">
                            Client : {{ $conversation->user->name ?? 'Utilisateur Supprimé' }} ({{ $conversation->user->email ?? 'N/A' }})
                        </small>
                    </div>
                     {{-- Statut et Actions --}}
                    <div class="d-flex align-items-center gap-2 mt-2 mt-sm-0">
                        @php
                            $statusClass = match($conversation->status) {
                                'open' => 'badge-success',
                                'closed' => 'badge-secondary',
                                'pending_admin' => 'badge-warning', // Nouveau cas pour pending_admin
                                default => 'badge-light', // Cas par défaut pour éviter les erreurs
                            };

                            $statusText = match($conversation->status) {
                                'open' => 'Ouverte',
                                'closed' => 'Fermée',
                                'pending_admin' => 'En attente de l\'admin', // Nouveau cas pour pending_admin
                                default => 'Inconnu', // Cas par défaut pour éviter les erreurs
                            };
                        @endphp
                         <span class="badge rounded-pill {{ $statusClass }}">
                             {{ $statusText }}
                         </span>
                         {{-- Boutons Ouvrir/Fermer --}}
                        @if($conversation->status != 'closed')
                             <form action="{{ route('admin.conversations.close', $conversation) }}" method="POST" class="d-inline">
                                 @csrf
                                 @method('PATCH')
                                 <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Voulez-vous vraiment fermer cette conversation ?')">Fermer</button>
                             </form>
                         @else
                              <form action="{{ route('admin.conversations.open', $conversation) }}" method="POST" class="d-inline">
                                 @csrf
                                 @method('PATCH')
                                 <button type="submit" class="btn btn-sm btn-outline-success">Réouvrir</button>
                             </form>
                         @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- Conteneur des messages --}}
                <div class="message-container mb-4 border rounded p-3 bg-light" style="max-height: 60vh; overflow-y: auto;">
                    <ul class="list-unstyled">
                        @forelse($conversation->messages as $message)
                            {{-- Message du Client --}}
                            @if($message->sender_id == $conversation->user_id)
                                <li class="mb-3 d-flex justify-content-start">
                                    {{-- Avatar Client --}}
                                    <img src="{{ $message->sender->photo ? asset('storage/' . $message->sender->photo) : asset('assets/img/undraw_profile.svg') }}" alt="{{ $message->sender->name }}" class="rounded-circle me-2 flex-shrink-0" style="width: 40px; height: 40px; object-fit: cover;">
                                    {{-- Bulle de message --}}
                                    <div class="card bg-white border shadow-sm" style="max-width: 75%;">
                                        <div class="card-body p-2">
                                            <p class="card-text small mb-0">{!! nl2br(e($message->body)) !!}</p>
                                            <small class="text-muted d-block text-end mt-1">
                                                {{ $message->sender->name }} - {{ $message->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                </li>
                            {{-- Message de l'Admin --}}
                            @else
                                <li class="mb-3 d-flex justify-content-end">
                                    {{-- Bulle de message --}}
                                    <div class="card bg-primary text-white border-0 shadow-sm" style="max-width: 75%;">
                                        <div class="card-body p-2">
                                             <p class="card-text small mb-0">{!! nl2br(e($message->body)) !!}</p>
                                             <small class="text-white-50 d-block text-end mt-1">
                                                {{ $message->sender->name }} (Admin) - {{ $message->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                    {{-- Avatar Admin --}}
                                     <span class="d-inline-flex align-items-center justify-content-center ms-2 rounded-circle bg-secondary text-white fw-bold flex-shrink-0" style="width: 40px; height: 40px;">
                                         {{ strtoupper(substr($message->sender->name ?? 'A', 0, 1)) }}
                                    </span>
                                </li>
                            @endif
                        @empty
                            <li class="text-center text-muted py-4">
                                <small>Aucun message dans cette conversation.</small>
                            </li>
                        @endforelse
                    </ul>
                </div>
    
                 {{-- Formulaire de réponse Admin --}}
                 @if($conversation->status != 'closed')
                     <div class="reply-form border-top pt-3">
                         <form action="{{ route('admin.conversations.reply', $conversation) }}" method="POST">
                             @csrf
                             <div class="mb-3">
                                 <label for="body" class="form-label small">Votre réponse :</label>
                                 <textarea name="body" id="body" rows="4" required
                                           class="form-control @error('body') is-invalid @enderror"
                                           placeholder="Répondre à {{ $conversation->user->name ?? 'ce client' }}..."></textarea>
                                 @error('body')
                                     <div class="invalid-feedback">
                                         {{ $message }}
                                     </div>
                                 @enderror
                             </div>
                             <div class="text-end">
                                 <button type="submit" class="btn btn-success">
                                     <i class="bi bi-send-fill me-1"></i> Envoyer la réponse
                                 </button>
                             </div>
                         </form>
                     </div>
                @else
                     <div class="alert alert-secondary text-center small" role="alert">
                         Cette conversation est fermée. Vous pouvez la <a href="#" onclick="event.preventDefault(); document.getElementById('open-form-{{ $conversation->id }}').submit();">réouvrir</a> pour répondre.
                         <form id="open-form-{{ $conversation->id }}" action="{{ route('admin.conversations.open', $conversation) }}" method="POST" class="d-none">
                             @csrf
                             @method('PATCH')
                         </form>
                     </div>
                 @endif
    
            </div> {{-- Fin card-body --}}
            <div class="card-footer bg-light border-top text-end">
                 <a href="{{ route('admin.conversations.index') }}" class="btn btn-sm btn-outline-secondary">
                     ← Retour à la messagerie
                 </a>
            </div>
        </div>
    </div>
</x-layaout>