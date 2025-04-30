
    // Simple toggle for customer type fields
    function toggleCustomerFields() {
        const customerType = document.querySelector('input[name="customer_type"]:checked').value;
        document.getElementById('existing_customer_fields').style.display = (customerType === 'existing') ? 'block' : 'none';
        document.getElementById('walk_in_customer_fields').style.display = (customerType === 'walk_in') ? 'block' : 'none';
    }
    // Initial call
    toggleCustomerFields();


    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('product_select');
        const productPriceInput = document.getElementById('product_price');
        const productStockInput = document.getElementById('product_stock');
        const productQuantityInput = document.getElementById('product_quantity');
        const addProductBtn = document.getElementById('addProductBtn');
        const invoiceLinesTableBody = document.querySelector('#invoiceLinesTable tbody');
        const invoiceTotalElement = document.getElementById('invoiceTotal');
        const form = document.getElementById('invoiceForm');
        const productErrorDiv = document.getElementById('product_error');
        let lineItems = []; // Array to store added product data

        // Update price and stock display on product selection
        productSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const price = selectedOption.dataset.price || '';
            const stock = selectedOption.dataset.stock || '';
            productPriceInput.value = price ? parseFloat(price).toFixed(2) : '';
            productStockInput.value = stock;
            productQuantityInput.value = 1; // Reset quantity
            productQuantityInput.max = stock; // Set max based on stock
            productErrorDiv.textContent = ''; // Clear previous errors
        });

        // Add product to table and hidden inputs
        addProductBtn.addEventListener('click', function() {
            const productId = productSelect.value;
            const selectedOption = productSelect.options[productSelect.selectedIndex];
            const productName = selectedOption.text.trim();
            const unitPrice = parseFloat(productPriceInput.value);
            const availableStock = parseInt(productStockInput.value);
            const quantity = parseInt(productQuantityInput.value);

            productErrorDiv.textContent = ''; // Clear error

            if (!productId) {
                productErrorDiv.textContent = 'Veuillez sélectionner un produit.';
                return;
            }
            if (isNaN(quantity) || quantity < 1) {
                 productErrorDiv.textContent = 'Veuillez entrer une quantité valide.';
                 return;
            }
             if (isNaN(unitPrice)) {
                 productErrorDiv.textContent = 'Prix du produit invalide.';
                 return;
             }
            if (quantity > availableStock) {
                productErrorDiv.textContent = `Stock insuffisant. Disponible : ${availableStock}`;
                return;
            }

            // Check if product already added
            const existingIndex = lineItems.findIndex(item => item.id === productId);
            if (existingIndex > -1) {
                 // Option 1: Alert user
                 // productErrorDiv.textContent = 'Ce produit est déjà dans la liste.';
                 // return;

                 // Option 2: Update quantity (more user-friendly)
                 const newQuantity = lineItems[existingIndex].quantity + quantity;
                 if (newQuantity > availableStock) {
                    productErrorDiv.textContent = `Stock insuffisant pour ajouter cette quantité. Quantité totale demandée: ${newQuantity}, Disponible : ${availableStock}`;
                    return;
                 }
                 lineItems[existingIndex].quantity = newQuantity;

            } else {
                 // Add new item
                lineItems.push({
                    id: productId,
                    name: productName,
                    quantity: quantity,
                    price: unitPrice,
                    stock: availableStock // Keep stock info if needed later
                });
            }


            renderTable();
            updateTotal();

            // Clear selection form
            productSelect.value = '';
            productPriceInput.value = '';
            productStockInput.value = '';
            productQuantityInput.value = 1;
        });

        // Function to render the table rows from lineItems array
        function renderTable() {
            invoiceLinesTableBody.innerHTML = ''; // Clear existing rows
             lineItems.forEach((item, index) => {
                const row = document.createElement('tr');
                row.dataset.index = index; // Store index for easy removal

                const lineTotal = item.quantity * item.price;

                row.innerHTML = `
                    <td>
                        ${item.name}
                        <input type="hidden" name="products[${index}][id]" value="${item.id}">
                        <input type="hidden" name="products[${index}][name]" value="${item.name}">
                        <input type="hidden" name="products[${index}][price]" value="${item.price}">
                     </td>
                    <td>
                         <input type="number" name="products[${index}][quantity]" value="${item.quantity}" class="form-control form-control-sm item-quantity" min="1" max="${item.stock}" data-index="${index}" style="width: 80px;">
                     </td>
                     <td class="text-end">${item.price.toFixed(2)}</td>
                     <td class="text-end line-total">${lineTotal.toFixed(2)}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-item" data-index="${index}">×</button>
                    </td>
                `;
                invoiceLinesTableBody.appendChild(row);
            });

            // Add event listeners for new remove buttons and quantity inputs
             attachRowEventListeners();
        }

        // Function to update row total and grand total when quantity changes
        function handleQuantityChange(event) {
            const input = event.target;
            const index = parseInt(input.dataset.index);
            const newQuantity = parseInt(input.value);
            const item = lineItems[index];

            if (isNaN(newQuantity) || newQuantity < 1) {
                input.value = item.quantity; // Revert if invalid
                return;
            }

            if (newQuantity > item.stock) {
                alert(`Stock insuffisant. Maximum ${item.stock} disponible.`);
                input.value = item.stock; // Set to max available
                 item.quantity = item.stock;
            } else {
                 item.quantity = newQuantity;
            }


            // Update the line total in the table
            const row = input.closest('tr');
            const lineTotalCell = row.querySelector('.line-total');
            const newLineTotal = item.quantity * item.price;
            lineTotalCell.textContent = newLineTotal.toFixed(2);

            updateTotal();
        }

        // Function to remove item
        function handleRemoveItem(event) {
             const button = event.target;
             const index = parseInt(button.dataset.index);
             lineItems.splice(index, 1); // Remove item from array
             renderTable(); // Re-render the table
             updateTotal();
        }

         // Attach listeners to dynamically added quantity inputs and remove buttons
        function attachRowEventListeners() {
            document.querySelectorAll('.item-quantity').forEach(input => {
                input.removeEventListener('change', handleQuantityChange); // Prevent duplicate listeners
                input.addEventListener('change', handleQuantityChange);
            });
            document.querySelectorAll('.remove-item').forEach(button => {
                button.removeEventListener('click', handleRemoveItem); // Prevent duplicate listeners
                button.addEventListener('click', handleRemoveItem);
            });
        }


        // Function to calculate and display the grand total
        function updateTotal() {
            let total = 0;
            lineItems.forEach(item => {
                total += item.quantity * item.price;
            });
            invoiceTotalElement.textContent = total.toFixed(2) + ' xaf';
        }

        // // Attach remove event listener using event delegation (alternative)
        // invoiceLinesTableBody.addEventListener('click', function(event) {
        //     if (event.target.classList.contains('remove-item')) {
        //         const index = parseInt(event.target.dataset.index);
        //         lineItems.splice(index, 1);
        //         renderTable();
        //         updateTotal();
        //     }
        // });

        // // Attach quantity change listener using event delegation (alternative)
        // invoiceLinesTableBody.addEventListener('change', function(event) {
        //     if (event.target.classList.contains('item-quantity')) {
        //         handleQuantityChange(event);
        //     }
        // });


    }); // End DOMContentLoaded
