<?php
include 'bd_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifique se o arquivo foi enviado sem erros
    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['img']['name'];
        $filetype = $_FILES['img']['type'];
        $filesize = $_FILES['img']['size'];

        // Verifique a extensão do arquivo
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!in_array($ext, $allowed)) {
            echo "Erro: Por favor, selecione um formato de arquivo válido.";
            exit;
        }

        // Verifique o tamanho do arquivo - máximo 5MB
        if ($filesize > 5 * 1024 * 1024) {
            echo "Erro: O tamanho do arquivo é maior que o permitido.";
            exit;
        }

        // Caminho para salvar a imagem
        $newfilename = uniqid() . '.' . $ext;
        $upload_dir = '../uploads/';
        $upload_path = $upload_dir . $newfilename;

        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($_FILES['img']['tmp_name'], $upload_path)) {
            // Prepare a inserção no banco de dados
            $id = $conn->real_escape_string($_POST['id']);
            $nome = $conn->real_escape_string($_POST['nome']);
            $descricao = $conn->real_escape_string($_POST['descricao']);
            $preco = floatval($_POST['preco']);
            $estoque = intval($_POST['estoque']);
            $imagem = $conn->real_escape_string($newfilename);

            $sql = "INSERT INTO produto (id, nome, descricao, preco, estoque, img) VALUES ('$id', '$nome', '$descricao', $preco, $estoque, '$imagem')";

            if ($conn->query($sql)) {
                echo "Produto adicionado com sucesso.";
            } else {
                echo "Erro ao adicionar produto: " . $conn->error;
            }
        } else {
            echo "Erro ao fazer upload da imagem.";
        }
    } else {
        echo "Erro: " . $_FILES['img']['error'];
    }
}
?>
