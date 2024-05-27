<?php
session_start();
include 'bd_config.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para selecionar o usuário com o email fornecido
    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $userData = $result->fetch_assoc();

        // Verificar se a senha fornecida corresponde à senha armazenada no banco de dados
        if (password_verify($password, $userData['senha'])) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_email'] = $email; // Armazenar o email do usuário na sessão
            
            // Redirecionar para a página de índice após o login bem-sucedido
            header('Location: http://localhost/www/projeto_integrador_2024_website/pages/index.php');
            exit();
        }
    }

    // Se não houver correspondência de usuário ou senha incorreta, exibir uma mensagem de erro
    echo '<script>alert("Credenciais inválidas. Tente novamente.");';
    echo 'window.history.back();</script>';
    exit();
}
?>
