function addToCart(productId) {
    console.log('Produto adicionado ao carrinho:', productId);
}

function removeFromCart(productId) {
    console.log('Produto removido do carrinho:', productId);
}

document.getElementById('add-to-cart-1').addEventListener('click', function() {
    addToCart(1);
});

document.querySelectorAll('.remove-from-cart').forEach(function(button) {
    button.addEventListener('click', function() {
        var productId = this.getAttribute('data-product-id');
        removeFromCart(productId);
    });
});