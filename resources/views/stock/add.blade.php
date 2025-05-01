<x-layaout>
    <div class="w-50 mx-auto mt-5">
        <h2 class="mb-4" style="color: #176abc">Ajouter du Stock pour {{ $product->name }}</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('stock.storeAdd', $product) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantité à Ajouter</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Raison (Optionnel)</label>
                        <textarea class="form-control" id="reason" name="reason" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Ajouter au Stock</button>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-secondary ms-2">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</x-layaout>
