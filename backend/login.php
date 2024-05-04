<?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($_SESSION['registered_user'])) {
        $userData = $_SESSION['registered_user'];
        
        if ($userData['email'] === $email && $userData['senha'] === $password) {
            
            $_SESSION['logged_in'] = true;
            
            header('Location: http://localhost/www/projeto_integrador_2024_website/pages/index.php');
            exit();
        }
    }

    echo '<script>alert("Credenciais inválidas. Tente novamente.");';
    echo 'window.history.back();</script>';
    exit();
}
?>
