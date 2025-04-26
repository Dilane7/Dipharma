<x-layaout>
    <div class="container w-50 py-4">
        <h3 class="mb-4" style="color: #176abc">Modifier l'Utilisateur</h3>

        <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm rounded p-4" style="color: black">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-between w-100 mx-auto">
                <div class="w-50 mr-3">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}">
                    @error('telephone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-50">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between w-100 mx-auto">
                <div class="w-50 mr-3 form-check">
                    <input type="checkbox" class="form-check-input @error('est_actif') is-invalid @enderror" id="est_actif" name="est_actif" value="1" {{ old('est_actif', $user->est_actif) ? 'checked' : '' }}>
                    <label class="form-check-label" for="est_actif">Est actif</label>
                    @error('est_actif')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-50">
                    <label for="roles" class="form-label">Rôles</label>
                    <select  class="form-select @error('roles') is-invalid @enderror" id="roles" name="roles[]">
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" {{ in_array($role->name, old('roles', $user->roles->pluck('name')->toArray())) ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Sélectionnez les rôles pour cet utilisateur.</small>
                    @error('roles')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex justify-content-between w-100 mx-auto">
                <div class="w-25 mr-3">
                    <label for="photo" class="form-label">Photo actuelle</label>
                    @if ($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" width="100" class="d-block mb-2">
                    @else
                        <p class="text-danger">Aucune photo enregistrée.</p>
                    @endif
                </div>
                <div class="w-75">
                    <label for="photo" class="form-label">Changer la photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo">
                    @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class="mb-3">
                <label for="password" class="form-label">Nouveau mot de passe <span class="text-danger">(laisser vide pour ne pas changer)</span></label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirmer le nouveau mot de passe</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary ms-2">Annuler</a>
        </form>
    </div>

</x-layaout>

