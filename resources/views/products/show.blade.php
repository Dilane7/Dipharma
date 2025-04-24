

<x-layaout>
<div class="container mx-auto w-50">
        <h4 class="mb-4" style="color: #176abc">Détails du Produit</h4>

        <div class="bg-white shadow-sm rounded p-4 "style="border: 1px solid #176abc;">
            <h5 class="mb-3" style="color: crimson">Informations du Produit</h5>
            <dl class="row">
                <dt class="col-sm-3">Nom :</dt>
                <dd class="col-sm-9">{{ $product->name }}</dd>

                <dt class="col-sm-3">Catégorie :</dt>
                <dd class="col-sm-9">{{ $product->categorie->name }}</dd>

                <dt class="col-sm-3">Description :</dt>
                <dd class="col-sm-9">{{ $product->description ?? '-' }}</dd>

                <dt class="col-sm-3">Quantité :</dt>
                <dd class="col-sm-9">{{ $product->quantite }}</dd>

                <dt class="col-sm-3">Prix :</dt>
                <dd class="col-sm-9">{{ number_format($product->prix, 2) }}</dd>

                <dt class="col-sm-3">Dosage:</dt>
                <dd class="col-sm-9">{{ $product->dosage ?? '-' }}</dd>

                <dt class="col-sm-3">Date d'Expiration :</dt>
                <dd class="col-sm-9">{{ $product->expiration_date ? $product->expiration_date->format('d/m/Y') : '-' }}</dd>

                <dt class="col-sm-3">Image :</dt>
                <dd class="col-sm-9">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">
                    @else
                        -
                    @endif
                </dd>

                <dt class="col-sm-3">Disponible :</dt>
                <dd class="col-sm-9">
                    <span class="{{ $product->is_available ? 'text-success' : 'text-danger' }}">
                        {{ $product->is_available ? 'Oui' : 'Non' }}
                    </span>
                </dd>

                <dt class="col-sm-3">Créé le :</dt>
                <dd class="col-sm-9">{{ $product->created_at->format('d/m/Y H:i') }}</dd>

                <dt class="col-sm-3">Modifié le :</dt>
                <dd class="col-sm-9">{{ $product->updated_at->format('d/m/Y H:i') }}</dd>
            </dl>

            <a href="{{ route('products.index') }}" class="btn btn-secondary">Retour à la liste</a>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary ms-2">Modifier</a>
        </div>
    </div>

</x-layaout>