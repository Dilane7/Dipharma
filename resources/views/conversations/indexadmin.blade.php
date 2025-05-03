<x-layaout>
    <div class="container w-75 my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 " style="color: #176abc">Messagerie</h1> {{-- Classe thème SB Admin ou h2/h3 Bootstrap --}}
    
            {{-- Filtres --}}
            <form method="GET" action="{{ route('admin.conversations.index') }}" class="d-flex align-items-center">
                <label for="status_filter" class="form-label me-2 mb-0 text-nowrap">Statut :</label>
                <select name="status" id="status_filter" onchange="this.form.submit()" class="form-select form-select-sm me-2" style="min-width: 150px;">
                    <option value="">Tous</option>
                    <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Ouvertes</option>
                    <option value="pending_admin" {{ request('status') == 'pending_admin' ? 'selected' : '' }}>Attente Admin</option>
                    <option value="pending_client" {{ request('status') == 'pending_client' ? 'selected' : '' }}>Attente Client</option>
                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Fermées</option>
                </select>
                <button type="submit" class="d-none">Filtrer</button> {{-- Caché, soumis par onchange --}}
                @if(request('status'))
                    <a href="{{ route('admin.conversations.index') }}" class="btn btn-sm btn-outline-secondary ms-1">Réinitialiser</a>
                @endif
            </form>
        </div>
    
         <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Conversations</h6>
            </div>
            <div class="card-body p-0"> {{-- p-0 pour que la table colle aux bords --}}
                @if($conversations->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0"> {{-- table-hover pour effet survol --}}
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="px-3 py-2">Client</th>
                                    <th scope="col" class="px-3 py-2">Sujet / Dernier Message</th>
                                    <th scope="col" class="px-3 py-2">Statut</th>
                                    <th scope="col" class="px-3 py-2">Dernière MàJ</th>
                                    <th scope="col" class="px-3 py-2 text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($conversations as $conversation)
                                     {{-- Déterminer si non lu par l'admin --}}
                                    @php
                                        $isUnreadByAdmin = $conversation->latestMessage && $conversation->latestMessage->sender_id == $conversation->user_id && !$conversation->latestMessage->is_read;
                                    @endphp
                                    <tr class="{{ $isUnreadByAdmin ? 'table-warning fw-semibold' : '' }}">
                                        <td class="px-3 py-2 align-middle">
                                            <div>{{ $conversation->user->name ?? 'Utilisateur Supprimé' }}</div>
                                            <small class="text-muted">{{ $conversation->user->email ?? 'N/A' }}</small>
                                        </td>
                                        <td class="px-3 py-2 align-middle" style="max-width: 300px;">
                                            <div class="text-truncate fw-medium {{ $isUnreadByAdmin ? '' : 'text-body' }}">
                                                 {{ $conversation->subject ?? 'Conversation #' . $conversation->id }}
                                            </div>
                                            <small class="d-block text-muted text-truncate mt-1">
                                                @if($conversation->latestMessage)
                                                     @if($conversation->latestMessage->sender_id == Auth::id())
                                                        <span class="text-primary">Vous:</span>
                                                    @else
                                                        <span class="">{{ $conversation->latestMessage->sender->name ?? 'Client' }}:</span>
                                                    @endif
                                                    {{ Str::limit($conversation->latestMessage->body, 60) }}
                                                @else
                                                    <em class="text-muted">Aucun message</em>
                                                @endif
                                            </small>
                                        </td>
                                        <td class="px-3 py-2 align-middle">
                                            @php /* Code PHP pour déterminer style statut */
                                                $statusClass = match($conversation->status) {
                                                    'open' => 'bg-info text-dark',
                                                    'pending_admin' => 'bg-danger text-white',
                                                    'pending_client' => 'bg-warning text-dark',
                                                    'closed' => 'bg-secondary text-white',
                                                    default => 'bg-light text-dark'
                                                };
                                                 $statusText = match($conversation->status) {
                                                    'open' => 'Ouverte',
                                                    'pending_admin' => 'Attente Admin',
                                                    'pending_client' => 'Attente Client',
                                                    'closed' => 'Fermée',
                                                    default => ucfirst($conversation->status)
                                                };
                                            @endphp
                                            <span class="badge rounded-pill {{ $statusClass }}">
                                                {{ $statusText }}
                                                 @if($isUnreadByAdmin)
                                                     <i class="bi bi-exclamation-circle-fill ms-1"></i>
                                                 @endif
                                            </span>
                                        </td>
                                        <td class="px-3 py-2 align-middle text-nowrap">
                                            <small class="text-muted">
                                                {{ $conversation->last_reply_at ? $conversation->last_reply_at->format('d/m/y H:i') : $conversation->created_at->format('d/m/y H:i') }}
                                            </small>
                                        </td>
                                        <td class="px-3 py-2 align-middle text-end text-nowrap">
                                            <a href="{{ route('admin.conversations.show', $conversation) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye-fill me-1"></i> Voir
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    
                     {{-- Pagination --}}
                     @if ($conversations->hasPages())
                        <div class="card-footer bg-light border-top">
                            {{ $conversations->appends(request()->query())->links() }} {{-- Assurez-vous que la pagination est configurée pour Bootstrap --}}
                        </div>
                    @endif
    
                @else
                    <div class="card-body">
                        <div class="text-center py-5 text-muted">
                            <i class="bi bi-chat-square-dots fs-1 mb-3 d-block"></i>
                            <p class="mb-1">Aucune conversation trouvée.</p>
                             @if(request('status'))
                                 <p class="text-sm">Aucune conversation ne correspond au statut "{{ request('status') }}".</p>
                                 <a href="{{ route('admin.conversations.index') }}" class="btn btn-sm btn-link mt-2">Voir toutes les conversations</a>
                             @endif
                        </div>
                    </div>
                @endif
            </div>
        </div>
    <a href="{{ route('dashboard') }} " class="btn text-white" style="background-color: #176abc">Dashboard</a>

    </div>
</x-layaout>