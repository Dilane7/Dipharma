<x-layaout>
    <div class="container">
        <h1 class="mb-4">Historique des Mouvements de Stock</h1>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Produit</th>
                                <th>Utilisateur</th>
                                <th>Quantité Modifiée</th>
                                <th>Type</th>
                                <th>Raison</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stockMutations as $mutation)
                                <tr>
                                    <td>{{ $mutation->product->name }}</td>
                                    <td>{{ $mutation->user ? $mutation->user->name : 'Système' }}</td>
                                    <td class="{{ $mutation->quantity_change > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $mutation->quantity_change }}
                                    </td>
                                    <td>{{ ucfirst($mutation->type) }}</td>
                                    <td>{{ $mutation->reason ?? '-' }}</td>
                                    <td>{{ $mutation->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="text-center">Aucun mouvement de stock enregistré.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Retour à la liste des produits</a>
                <div class="mt-3">
                    {{ $stockMutations->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layaout>
