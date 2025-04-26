<x-layaout>
    <div class="container w-50 py-4">
        <h3 class="mb-4" style="color: #176abc">Détails de l'Utilisateur</h3>

        <div class="bg-white shadow-sm rounded p-4">
            <h5 class="mb-3 text-primary">Informations de l'Utilisateur</h5>
            <dl class="row">
                <dt class="col-sm-3">Nom</dt>
                <dd class="col-sm-9">{{ $user->name }}</dd>

                <dt class="col-sm-3">Téléphone</dt>
                <dd class="col-sm-9">{{ $user->telephone ?? '-' }}</dd>

                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $user->email }}</dd>

                <dt class="col-sm-3">Est actif</dt>
                <dd class="col-sm-9">
                    @if ($user->est_actif)
                        <span class="badge bg-success text-white">Oui</span>
                    @else
                        <span class="badge bg-danger text-white">Non</span>
                    @endif
                </dd>

                <dt class="col-sm-3">Photo</dt>
                <dd class="col-sm-9">
                    @if ($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" width="150">
                    @else
                        -
                    @endif
                </dd>

                <dt class="col-sm-3">Rôles</dt>
                <dd class="col-sm-9">
                    @forelse ($user->roles as $role)
                        <span class="badge bg-primary text-white">{{ $role->name }}</span>
                    @empty
                        <span class="badge bg-light text-muted">Aucun rôle</span>
                    @endforelse
                </dd>

                <dt class="col-sm-3">Créé le</dt>
                <dd class="col-sm-9">{{ $user->created_at->format('d/m/Y H:i') }}</dd>

                <dt class="col-sm-3">Modifié le</dt>
                <dd class="col-sm-9">{{ $user->updated_at->format('d/m/Y H:i') }}</dd>
            </dl>

            <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-primary ms-2">Modifier</a>
        </div>
    </div>

</x-layaout>