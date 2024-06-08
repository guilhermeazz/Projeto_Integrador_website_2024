<?php

include '../backend/bd_config.php';

$sql = "SELECT id, nome, descricao, preco, estoque, img FROM produto";
$result = $conn->query($sql);

if ($result) {
    $produtos = array();
    while($row = $result->fetch_assoc()) {
        $row['preco'] = floatval($row['preco']);
        // Verifique se a imagem existe
        if (!empty($row['img'])) {
            $row['img'] = '../uploads/' . $row['img'];
        } else {
            $row['img'] = '../assets/img/default.png'; // Caminho para uma imagem padrão
        }
        $produtos[] = $row;
    }
    echo json_encode($produtos);
} else {
    echo json_encode(array("error" => "Erro ao carregar produtos"));
}
?>
