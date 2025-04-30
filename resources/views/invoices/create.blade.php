<x-layaout>

    <div class="container w-75 mb-4 mx-auto">
        <h2 style="color: #176abc">Créer une Facture Manuelle</h2>

        @include('partials.alerts') {{-- Show validation errors --}}

        <form action="{{ route('invoices.store') }}" method="POST" id="invoiceForm">
            @csrf
            <div class="card mb-4 shadow">
                <div class="card-header " style="color: rgb(10, 76, 243)">Informations Client</div>
                <div class="card-body">
                     <div class="mb-3">
                        <label class="form-label">Type de Client</label> <br>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="customer_type" id="existing_customer" value="existing" checked onchange="toggleCustomerFields()">
                          <label class="form-check-label" for="existing_customer">Client Enregistré</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" type="radio" name="customer_type" id="walk_in_customer" value="walk_in" {{ old('customer_type') == 'walk_in' ? 'checked' : '' }} onchange="toggleCustomerFields()">
                          <label class="form-check-label" for="walk_in_customer">Client de Passage</label>
                        </div>
                     </div>

                     <div id="existing_customer_fields">
                        <div class="mb-3">
                            <label for="user_id" class="form-label">Choisir Client <span class="text-danger">*</span></label>
                            <select name="user_id" id="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                <option value="">-- Sélectionner --</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ old('user_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                     </div>

                     <div id="walk_in_customer_fields" style="display: none;">
                         <div class="mb-3">
                            <label for="customer_name" class="form-label">Nom du Client <span class="text-danger">*</span></label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}">
                            @error('customer_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                         </div>
                     </div>

                     {{-- Common fields for both types --}}
                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="customer_phone" class="form-label">Téléphone Client</label>
                            <input type="text" name="customer_phone" id="customer_phone" class="form-control @error('customer_phone') is-invalid @enderror" value="{{ old('customer_phone') }}">
                            @error('customer_phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="customer_address" class="form-label">Adresse Client</label>
                            <textarea name="customer_address" id="customer_address" rows="2" class="form-control @error('customer_address') is-invalid @enderror">{{ old('customer_address') }}</textarea>
                            @error('customer_address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4 shadow">
                <div class="card-header" style="color: rgb(10, 76, 243)">Détails Facture</div>
                <div class="card-body">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="invoice_date" class="form-label">Date Facture <span class="text-danger">*</span></label>
                            <input type="date" name="invoice_date" id="invoice_date" class="form-control @error('invoice_date') is-invalid @enderror" value="{{ old('invoice_date', date('Y-m-d')) }}">
                            @error('invoice_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                         <div class="col-md-6 mb-3">
                            <label for="due_date" class="form-label">Date Échéance</label>
                            <input type="date" name="due_date" id="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{ old('due_date') }}">
                            @error('due_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                     </div>
                     <div class="mb-3">
                         <label for="status" class="form-label">Statut Initial <span class="text-danger">*</span></label>
                         <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                             <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Brouillon</option>
                             <option value="unpaid" {{ old('status', 'unpaid') == 'unpaid' ? 'selected' : '' }}>Non Payée</option>
                             <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Payée</option>
                         </select>
                         @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                     </div>
                     <div class="mb-3">
                         <label for="notes" class="form-label">Notes</label>
                         <textarea name="notes" id="notes" rows="3" class="form-control">{{ old('notes') }}</textarea>
                     </div>
                </div>
            </div>

            <div class="card mb-4 shadow">
                <div class="card-header" style="color: rgb(10, 76, 243)">Ajouter des Produits</div>
                <div class="card-body">
                    <div class="row g-3 align-items-end mb-3" id="addProductSection">
                        <div class="col-md-5">
                            <label for="product_select" class="form-label">Produit</label>
                            <select id="product_select" class="form-select">
                                <option value="">-- Choisir un produit --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" data-price="{{ $product->prix }}" data-stock="{{ $product->quantity }}">
                                        {{ $product->name }} ({{ $product->dosage }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                         <div class="col-md-2">
                            <label class="form-label">Prix Unit.</label>
                            <input type="text" id="product_price" class="form-control" readonly>
                         </div>
                         <div class="col-md-1">
                            <label class="form-label">Stock</label>
                            <input type="text" id="product_stock" class="form-control" readonly>
                         </div>
                         <div class="col-md-2">
                            <label for="product_quantity" class="form-label">Quantité</label>
                            <input type="number" id="product_quantity" class="form-control" min="1" value="1">
                         </div>
                         <div class="col-md-2">
                            <button type="button" class="btn btn-success w-100" id="addProductBtn">Ajouter</button>
                         </div>
                    </div>
                     <div id="product_error" class="text-danger mb-2"></div>

                    <table class="table" id="invoiceLinesTable">
                        <thead>
                            <tr>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix Unit. (xaf)</th>
                                <th>Total (xaf)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Lines will be added here by JavaScript --}}
                        </tbody>
                         <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                <td id="invoiceTotal" class="text-end fw-bold">0.00 xaf</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                     @error('products') <div class="text-danger mt-2">{{ $message }}</div> @enderror

                </div>
            </div>


            <div class="text-end">
                <a href="{{ route('invoices.index') }}" class="btn btn-danger">Annuler</a>
                <button type="submit" class="btn btn-primary">Enregistrer la Facture</button>
            </div>
        </form>

    </div>



</x-layaout>
