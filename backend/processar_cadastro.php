<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userData = array();

    if (isset($_POST['nome_completo']) && isset($_POST['email']) && isset($_POST['data_nascimento']) && isset($_POST['senha']) && isset($_POST['confirmar_senha']) && isset($_POST['aceitar_termos'])) {
        $userData['nome_completo'] = $_POST['nome_completo'];
        $userData['email'] = $_POST['email'];
        $userData['celular'] = isset($_POST['celular']) ? $_POST['celular'] : null;
        $userData['data_nascimento'] = $_POST['data_nascimento'];
        $userData['senha'] = $_POST['senha'];
        $userData['confirmar_senha'] = $_POST['confirmar_senha'];

        $_SESSION['registered_user'] = $userData;

        header("Location: ../pages/login.html");
        exit();
    } else {
        echo '<script>alert("Por favor, preencha todos os campos obrigatórios.");</script>';
        echo '<script>window.history.back();</script>';
        exit();
    }
}
?>

