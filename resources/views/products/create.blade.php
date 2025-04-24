<x-layaout>
    
    <div class="container w-50 py-4">
        <h3 class="mb-4" style="color: #176abc">Créer un Nouveau Produit</h3>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm rounded p-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categorie_id" class="form-label">Catégorie</label><br>
                <select class="form-select w-100 py-1 rounded @error('categorie_id') is-invalid @enderror" id="categorie_id" name="categorie_id" >
                    <option value="">Sélectionner une catégorie</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 d-flex justify-content-between w-100 mx-auto">
                <div class="w-50 mr-3">
                    <label for="quantite" class="form-label">Quantité</label>
                    <input type="number" class="form-control @error('quantite') is-invalid @enderror" id="quantite" name="quantite" value="{{ old('quantite', 0) }}" required min="0">
                    @error('quantite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-50">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" step="0.01" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix" value="{{ old('prix', 0.00) }}" required min="0">
                    @error('prix')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            
            <div class=" mb-3 d-flex justify-content-between w-100 mx-auto">
                <div class="w-50 mr-3">
                    <label for="dosage" class="form-label">Dosage</label>
                    <input type="text" class="form-control  @error('dosage') is-invalid @enderror" id="dosage" name="dosage" value="{{ old('dosage') }}">
                    @error('dosage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-50 ">
                    <label for="is_available" class="form-label">Disponible</label> <br>
                    <select class="form-select w-100 py-1 rounded border-secondary @error('is_available') is-invalid @enderror" id="is_available" name="is_available">
                        <option value="1" {{ old('is_available', true) == 1 ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>Non</option>
                    </select>
                    @error('is_available')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="expiration_date" class="form-label">Date d'Expiration</label>
                <input type="date" class="form-control @error('expiration_date') is-invalid @enderror" id="expiration_date" name="expiration_date" value="{{ old('expiration_date') }}">
                @error('expiration_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control py-1 @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex  justify-content-between w-100 mx-auto">
                <button type="submit" class="btn btn-primary w-50 ">Créer</button>
                <a href="{{ route('products.index') }}" class="btn btn-warning ml-5 w-50">Annuler</a>
            </div>
        </form>
    </div>
</x-layaout>