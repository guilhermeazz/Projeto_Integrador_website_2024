<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    header('Content-Type: application/json');

    $produtoId = intval($_POST['produto_id']);

    if (isset($_SESSION['carrinho'][$produtoId])) {
        unset($_SESSION['carrinho'][$produtoId]);
        echo json_encode(['message' => 'Produto removido do carrinho.']);
    } else {
        echo json_encode(['error' => 'Produto não encontrado no carrinho.']);
    }
} else {
    echo json_encode(['error' => 'Método não permitido.']);
}
?>
