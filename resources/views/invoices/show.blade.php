<x-layaout>


<div class="container  w-75 mx-auto invoice-container mb-5">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2 style="color:#176abc">Facture N° {{ $invoice->invoice_number }}</h2>
            <div>
                 <button onclick="window.print()" class="btn btn-success"><i class="bi bi-printer"></i> Imprimer</button>
                 <a href="{{ route('invoices.index') }}" class="btn btn-light">Retour à la liste</a>
             </div>
        </div>
    </div>

     @include('partials.alerts')

    <div class="card shadow-md bg-white"  style="color: black">
        <div class="card-header" >
             <div class="row">
                 <div class="col-md-6">
                     <strong>Pharmacie Dipharma</strong><br>
                     Logpom<br>
                     Douala<br>
                     Téléphone: 695746380<br>
                     Email: tsaguedilane7@gmail.com
                 </div>
                 <div class="col-md-6 text-md-end">
                     <strong>Facturé à :</strong><br>
                     {{ $invoice->customer_name }}<br>
                     @if($invoice->customer_address) {{ $invoice->customer_address }}<br>@endif
                     @if($invoice->customer_phone) Tél: {{ $invoice->customer_phone }}<br>@endif
                     @if($invoice->user) Email: {{ $invoice->user->email }} @endif
                 </div>
             </div>
             <hr>
             <div class="row">
                 <div class="col-md-6">
                     <strong>Date Facture:</strong> {{ $invoice->invoice_date->format('d/m/Y') }}<br>
                     @if($invoice->due_date)<strong>Date Échéance:</strong> {{ $invoice->due_date->format('d/m/Y') }}<br>@endif
                     @if($invoice->order)<strong>Commande Origine:</strong> #{{ $invoice->order_id }}<br>@endif
                 </div>
                 <div class="col-md-6 text-md-end">
                    <strong>Statut:</strong>
                    <span class="badge text-white fs-6 bg-{{ $invoice->status == 'paid' ? 'success' : ($invoice->status == 'unpaid' ? 'warning' : ($invoice->status == 'cancelled' ? 'danger' : 'secondary')) }}">
                        {{ ucfirst($invoice->status) }}
                    </span>
                 </div>
             </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead  style="color: black">
                    <tr>
                        <th>#</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire (xaf)</th>
                        <th>Total Ligne (xaf)</th>
                    </tr>
                </thead>
                <tbody style="color: black">
                    @foreach ($invoice->lines as $index => $line)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $line->product_name }} {{ $line->product ? '('.$line->product->dosage.')' : '' }}</td>
                        <td>{{ $line->quantity }}</td>
                        <td class="text-end">{{ number_format($line->unit_price, 2, ',', ' ') }}</td>
                        <td class="text-end">{{ number_format($line->line_total, 2, ',', ' ') }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot style="color: #176abc">
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-end"><strong>Sous-Total</strong></td>
                        <td class="text-end">{{ number_format($invoice->sub_total, 2, ',', ' ') }} xaf</td>
                    </tr>
                    {{-- Add rows for Tax if applicable --}}
                    {{-- <tr>
                        <td colspan="3"></td>
                        <td class="text-end"><strong>TVA (x%)</strong></td>
                        <td class="text-end">{{ number_format($invoice->tax, 2, ',', ' ') }} €</td>
                    </tr> --}}
                    <tr>
                        <td colspan="3"></td>
                        <td class="text-end"><strong>Montant Total</strong></td>
                        <td class="text-end"><strong>{{ number_format($invoice->total_amount, 2, ',', ' ') }} xaf</strong></td>
                    </tr>
                </tfoot>
            </table>

            @if($invoice->notes)
            <div class="mt-4">
                <strong>Notes:</strong>
                <p>{{ $invoice->notes }}</p>
            </div>
            @endif
        </div>
    </div>
</div>

{{-- Basic Print CSS --}}
<style>

</style>

</x-layaout>
