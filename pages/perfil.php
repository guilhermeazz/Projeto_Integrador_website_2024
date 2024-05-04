<?php
session_start(); 

if (isset($_SESSION['registered_user'])) {
    $userData = $_SESSION['registered_user'];
} else {
    header('Location: http://localhost/www/projeto_integrador_2024_website/pages/login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/perfil.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="index.html"><img src="../assets/img/infratech_logo.png" alt="Logo da Infratech"></a></div>
            <div>
            </div>
                <ul class="nav-links">
                    <li><a href="index.html">Início</a></li>
                    <li><a href="loja.html">Loja</a></li>
                    <li><a href="servicos.html">Serviços</a></li>
                    <li><a href="ajuda.html">Ajuda</a></li>
                    <li><a href="sobre.html">Sobre</a></li>
                </ul>
            </div>

        </nav>
    </header>
    <main>
        <aside id="menu">
            <ul>
                <li><a href="#" id="perfil">Perfil</a></li>
                <li><a href="../pages/minhas_compras.php" id="compras">Minhas Compras</a></li>
                <li><button onclick="logout()">Sair</button></li>
            </ul>
        </aside>

        <div class="meu_perfil">
            <h4>Meu Perfil</h4>
            <form>
                <label for="nome_completo">Nome Completo:</label><br>
                <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $userData['nome_completo']; ?>" readonly><br>
                
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>" readonly><br>
                
                <label for="celular">Celular:</label><br>
                <input type="tel" id="celular" name="celular" value="<?php echo isset($userData['celular']) ? $userData['celular'] : ''; ?>" readonly><br>
                
                <label for="data_nascimento">Data de Nascimento:</label><br>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $userData['data_nascimento']; ?>" readonly><br>
            </form>
        </div>
    </main>

    </main>
    <footer>
        <div class="redes-sociais">
            <h3>Redes Sociais</h3>
            <ul>
                <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
                <li><a href="https://twitter.com" target="_blank">Twitter</a></li>
                <li><a href="https://www.linkedin.com" target="_blank">LinkedIn</a></li>
            </ul>
        </div>
    
        <div class="contato">
            <h3>Contato</h3>
            <p>Endereço: Av. Exemplo, 1234</p>
            <p>Email: contato@suaempresa.com</p>
            <p>Telefone: (XX) XXXX-XXXX</p>
        </div>
    </footer>
    
<script src="../assets/js/script.js"></script>
<script src="../assets/js/perfil.js"></script>
</body>
</html>
