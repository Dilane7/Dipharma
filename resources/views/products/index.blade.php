<x-layaout>
    
    <div class="px-5 bg-light">
        <h2 class="mb-4" style="color: #176abc">Gestion des Produits</h2>

        @if (session('success'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="shadow-sm rounded bg-white mb-4 ">

            <div class="d-flex justify-content-between align-items-center p-3">
                <h5 style="color: #176abc">Liste des Produits</h5>
                <form action="{{ route('products.index') }}" method="GET" class="d-flex">
                    <input type="text" class="form-control mr-3 w-50" placeholder="Rechercher par nom..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            </div>
            <div class="table-responsive p-3">
                <table class="table table-striped ">
                    <thead>
                        <tr class="" style="color: #176abc; ">
                            <th>Preview</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Dosage</th>
                            <th>Expiration</th>
                            <th>Disponible</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                            <tr style="color: black">
                                <td>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td style="color: #176abc">{{ $product->name }}</td>
                                <td>{{ $product->categorie->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->prix }}</td>
                                <td>{{ $product->dosage ?? '-' }}</td>
                                <td class="">
                                    @if ($product->expiration_date)
                                        <span class="badge py-1 {{ $product->getExpirationClass() }}" style="color: white">
                                            {{ $product->expiration_date->format('d/m/Y') }}
                                        </span>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td >
                                    <span class=" py-1 {{ $product->is_available ? 'badge bg-success text-white' : 'badge bg-danger text-white' }}">
                                        {{ $product->is_available ? 'Oui' : 'Non' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-sm "><i class='fas fa-eye' style='font-size:17px;color:#176abc'></i></a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm "><i class='fas fa-pencil-alt' style='font-size:18px;color:orange'></i></a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm " onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')"><i class='fas fa-trash-alt' style='font-size:17px;color:red'></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">Aucun produit trouvé.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $products->links() }}

    </div>
</x-layaout>


