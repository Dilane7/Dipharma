
<x-layaout>
    <div class="px-5">
        <h2 class="mb-4" style="color: #44C244">Gestion des Catégories</h2>

        @if (session('success'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="row ">
            <div class="col-md-6">
                <h5 style="color: #176abc">Liste des Catégories</h5>
                <form action="{{ route('categories.index') }}" method="GET" class="d-flex mb-3">
                    <input type="text" class="form-control mr-5" placeholder="Rechercher par nom..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
                @if ($categories->isEmpty())
                    <p>Aucune catégorie enregistrée.</p>
                @else
                    <div class="table-responsive shadow-sm rounded bg-white mb-3">
                        <table class="table table-striped  " id="dataTable">
                            <thead class="font-weight-bold">
                                <tr class="text-black " style="color: black">
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Disponibilité</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td style="color: #176abc">{{ $category->name }}</td>
                                        <td style="color: black">{{ $category->description ?? '-' }}</td>
                                        <td>
                                            <span class="{{ $category->is_available ? 'badge bg-success text-white' : 'badge bg-danger text-white' }}">
                                                {{ $category->is_available ? 'Disponible' : 'Indisponible' }}
                                            </span>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-flex ">
                                                <a href="{{ route('categories.edit', $category) }}" class="btn "><i class='fas fa-pencil-alt' style='font-size:18px;color:#176abc'></i></i></a>
                                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn   btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"><i class='fas fa-trash-alt' style='font-size:17px;color:red'></i></i></button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>
                    {{ $categories->links() }}
                @endif
            </div>
            <div class="col-md-6">
                <h5 style="color: #176abc">Créer une Nouvelle Catégorie</h5>
                <form method="POST" action="{{ route('categories.store') }}" class="bg-white shadow-sm rounded p-4">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                        @error('name')
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
                    <div class="mb-3 ">
                        <label for="is_available" class="form-label">Disponibilité</label> <br>
                        <select class="form-select w-100 py-1 rounded border-secondary @error('is_available') is-invalid @enderror" id="is_available" name="is_available">
                            <option value="1" {{ old('is_available', true) == 1 ? 'selected' : '' }}>Disponible</option>
                            <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>Non disponible</option>
                        </select>
                        @error('is_available')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn text-white w-100" style="background-color:#176abc">Créer</button>
                </form>
            </div>
        </div>
    </div>
</x-layaout>

