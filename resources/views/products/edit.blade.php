

<x-layaout>
    <div class=" w-75 mx-auto mt-3 mb-5 bg-light d-flex ">
        <div class="p-3 w-75" style="color: #176abc">
            <h4 class="mb-4">Modifier le Produit</h4>

            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-sm rounded p-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="categorie_id" class="form-label">Catégorie</label> <br>
                    <select class="form-select w-100 py-1 rounded border-secondary @error('categorie_id') is-invalid @enderror" id="categorie_id" name="categorie_id" required>
                        <option value="">Sélectionner une catégorie</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ old('categorie_id', $product->categorie_id) == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 d-flex justify-content-between w-100 mx-auto">
                    <div class="w-50 mr-3">
                        <label for="quantity" class="form-label">Quantité</label>
                        <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" readonly required min="0">
                        @error('quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-50">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" step="0.01" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix" value="{{ old('prix', $product->prix) }}" required min="0">
                        @error('prix')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="mb-3 d-flex justify-content-between w-100 mx-auto">
                    <div class="mr-3 w-50">
                        <label for="dosage" class="form-label">Dosage</label>
                        <input type="text" class="form-control @error('dosage') is-invalid @enderror" id="dosage" name="dosage" value="{{ old('dosage', $product->dosage) }}">
                        @error('dosage')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-50">
                        <label for="is_available" class="form-label">Disponible</label>
                        <select class="form-select w-100 py-1 rounded broder-secondary @error('is_available') is-invalid @enderror" id="is_available" name="is_available">
                            <option value="1" {{ old('is_available', $product->is_available) == 1 ? 'selected' : '' }}>Oui</option>
                            <option value="0" {{ old('is_available', $product->is_available) == 0 ? 'selected' : '' }}>Non</option>
                        </select>
                        @error('is_available')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="expiration_date" class="form-label">Date d'Expiration</label>
                    <input type="date" class="form-control @error('expiration_date') is-invalid @enderror" id="expiration_date" name="expiration_date" value="{{ old('expiration_date', $product->expiration_date ? $product->expiration_date->format('Y-m-d') : '') }}">
                    @error('expiration_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image actuelle</label>
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100" class="d-block mb-2">
                    @else
                        <p>Aucune image enregistrée.</p>
                    @endif
                    <label for="image" class="form-label">Changer l'image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                

                <div class="d-flex  justify-content-between w-100 mx-auto">
                    <button type="submit" class="btn btn-primary w-50 ">Mettre à jour</button>
                    <a href="{{ route('products.index') }}" class="btn btn-warning ml-5 w-50">Annuler</a>
                </div>


            </form>
        </div>
        <div class="w-25 p-3 bg-light shadow rounded h-25 mt-5">
            <h4 class="mb-4" style="color: #176abc">Gerer le Stock</h4>
            <div class="d-flex  justify-content-between w-100 mb-3 mx-auto">
                <a href="{{ route('stock.add', $product) }}" class="btn btn-success  w-50 ">Ajouter </a>
                <a href="{{ route('stock.remove', $product) }}" class="btn btn-danger ms-2 ml-5 w-50">Retirer</a>
            </div>
            <a href="{{ route('stock.index') }}" class="btn btn-info ms-2">Voir l'Historique du Stock</a>

        </div>
    </div>
</x-layaout>
