document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.add-to-cart-button');
    const cartItemCount = document.getElementById('cart-item-count');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Empêcher la soumission du formulaire classique

            const productId = this.dataset.productId;
            const form = document.getElementById(`add-to-cart-form-${productId}`);
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // Indiquer que c'est une requête AJAX
                    'X-CSRF-TOKEN': formData.get('_token') // Envoyer le token CSRF
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    cartItemCount.textContent = data.cartItemCount; // Mettre à jour le nombre d'éléments
                    // Vous pouvez ajouter ici une notification visuelle (ex: un petit message "Ajouté au panier !")
                } else if (data.error) {
                    alert(data.error); // Afficher une erreur si nécessaire
                }
            })
            .catch(error => {
                console.error('Erreur lors de l\'ajout au panier:', error);
            });
        });
    });
});
