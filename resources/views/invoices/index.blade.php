<x-layaout>
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-10">
                <h3 style="color: #176abc">Liste des Factures</h3>
            </div>

        </div>

        @include('partials.alerts') {{-- Include your alert partial --}}

        <div class="card shadow bg-white rounded">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N° Facture</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Montant Total</th>
                            <th>Statut</th>
                            <th>Commande liée</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_number }}</td>
                            <td>{{ $invoice->invoice_date->format('d/m/Y') }}</td>
                            <td>{{ $invoice->customer_name }} {{ $invoice->user ? '(Utilisateur enregistré)' : '(Client de passage)' }}</td>
                            <td>{{ number_format($invoice->total_amount, 2, ',', ' ') }} xaf</td>
                            <td>
                                <span class="badge text-white bg-{{ $invoice->status == 'paid' ? 'success' : ($invoice->status == 'unpaid' ? 'warning' : ($invoice->status == 'cancelled' ? 'danger' : 'secondary')) }}">
                                    {{ ucfirst($invoice->status) }}
                                </span>
                            </td>
                             <td>
                                @if($invoice->order)
                                    <a href="#">Commande #{{ $invoice->order->id }}</a> {{-- Link to order show page --}}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td class="text-end d-flex gap-1">
                                {{-- Add view button --}}
                                <a href="{{ route('invoices.show', $invoice) }}" class="btn " title="Voir"><i class='fas fa-eye' style='font-size:17px;color:#176abc'></i></a>
                                {{-- Add edit button conditionally --}}
                                @if($invoice->status == 'draft')
                                    <a href="{{ route('invoices.edit', $invoice) }}" class="btn " title="Modifier"><i class='fas fa-pencil-alt' style='font-size:18px;color:orange'></i></a>
                                @endif
                                 {{-- Add cancel/delete button --}}
                                {{-- Condition pour le bouton Annuler --}}
                                    @if(!in_array($invoice->status, ['paid', 'cancelled']))
                                    <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment annuler cette facture ? Cette action change le statut et ne supprime pas l\'enregistrement.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn " title="Annuler"><i class='fas fa-trash-alt' style='font-size:17px;color:red'></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Aucune facture trouvée.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $invoices->links() }}
            </div>
        </div>
    </div>
</x-layaout>
