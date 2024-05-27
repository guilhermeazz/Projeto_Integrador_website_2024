<?php
session_start();
include 'bd_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['data_nasc']) && isset($_POST['senha']) && isset($_POST['confirmar_senha']) && isset($_POST['aceitar_termos'])) {
        
        if ($_POST['senha'] !== $_POST['confirmar_senha']) {
            echo '<script>alert("As senhas não coincidem.");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }

        $nome_completo = $_POST['nome'];
        $email = $_POST['email'];
        $celular = isset($_POST['celular']) ? $_POST['celular'] : null;
        $data_nascimento = $_POST['data_nasc'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 

        // Verificar se o e-mail já está em uso
        $stmt_check_email = $conn->prepare("SELECT * FROM usuario WHERE email = ?");
        $stmt_check_email->bind_param("s", $email);
        $stmt_check_email->execute();
        $result_check_email = $stmt_check_email->get_result();

        if ($result_check_email->num_rows > 0) {
            // E-mail já está em uso
            echo '<script>alert("Este e-mail já está sendo utilizado por outro usuário.");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }

        // Se o e-mail não estiver em uso, proceda com a inserção
        $stmt_check_email->close();

        $stmt = $conn->prepare("INSERT INTO usuario (nome, email, celular, data_nasc, senha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome_completo, $email, $celular, $data_nascimento, $senha);

        if ($stmt->execute()) {
            header("Location: ../pages/login.html");
            exit();
        } else {
            echo '<script>alert("Erro ao registrar usuário: ' . $stmt->error . '");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }

        $stmt->close();
    } else {
        echo '<script>alert("Por favor, preencha todos os campos obrigatórios.");</script>';
        echo '<script>window.history.back();</script>';
        exit();
    }

    $conn->close();
}
?>
