function adicionarAoCarrinho(produtoId) {
    $.post('../backend/add_to_cart.php', { produto_id: produtoId }, function(data) {
        alert(data);
        atualizarCarrinho();
    });
}
