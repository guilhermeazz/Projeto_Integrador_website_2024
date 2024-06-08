<?php
session_start();
include 'bd_config.php';

header('Content-Type: application/json');

$carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];

if (empty($carrinho)) {
    echo json_encode([]);
    exit;
}

$ids = array_map('intval', array_keys($carrinho));
$ids = implode(',', $ids);

$sql = "SELECT id, nome, preco, img FROM produto WHERE id IN ($ids)";
$result = $conn->query($sql);

$produtos = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $row['quantidade'] = $carrinho[$row['id']];
        $produtos[] = $row;
    }
} else {
    echo json_encode(['error' => 'Erro ao buscar produtos no banco de dados.']);
    exit;
}

echo json_encode($produtos);
?>
