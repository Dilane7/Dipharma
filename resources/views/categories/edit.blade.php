<x-layaout>
    <div class="container">
        <h3 class="mb-4" style="color: #176abc">Modifier la Catégorie</h3>

        <div class="bg-white shadow-sm w-50 rounded p-4">
            <form method="POST" action="{{ route('categories.update', $categorie) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: black">Nom</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" value="{{ old('name', $categorie->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label" style="color: black">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"  name="description" rows="3">{{ old('description', $categorie->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="is_available" class="form-label" style="color: black">Disponibilité</label> <br>
                    <select class="form-select w-100 py-1 rounded border-secondary @error('is_available') is-invalid @enderror" id="is_available" name="is_available">
                        <option value="1" {{ old('is_available', $categorie->is_available) == 1 ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ old('is_available', $categorie->is_available) == 0 ? 'selected' : '' }}>Non disponible</option>
                    </select>
                    @error('is_available')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn text-white" style="background-color: #176abc">Mettre à jour</button>
                <a href="{{ route('categories.index') }}" class="btn btn-warning ms-2">Annuler</a>
            </form>
        </div>
    </div>
</x-layaout>
