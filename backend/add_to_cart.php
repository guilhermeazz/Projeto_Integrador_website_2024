<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'bd_config.php';

    $produtoId = intval($_POST['produto_id']);
    $quantidade = isset($_POST['quantidade']) ? intval($_POST['quantidade']) : 1;

    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    if (isset($_SESSION['carrinho'][$produtoId])) {
        $_SESSION['carrinho'][$produtoId] += $quantidade;
    } else {
        $_SESSION['carrinho'][$produtoId] = $quantidade;
    }

    header('Content-Type: application/json');
    echo json_encode(['message' => 'Produto adicionado ao carrinho.']);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Método não permitido.']);
}
?>
