<?php
session_start(); 
include '../backend/bd_config.php'; // Inclua o arquivo de configuração do banco de dados

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    $email = $_SESSION['user_email']; // Obtenha o email do usuário da sessão

    // Consulta SQL para selecionar os dados do usuário com o email fornecido
    $sql = "SELECT * FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $userData = $result->fetch_assoc();
    } else {
        // Se não houver correspondência de usuário, redirecione para a página de login
        header('Location: http://localhost/www/projeto_integrador_2024_website/pages/login.html');
        exit();
    }
} else {
    // Se o usuário não estiver logado, redirecione para a página de login
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
    <link rel="stylesheet" href="../assets/css/cookie.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="index.html"><img src="../assets/img/infratech_logo.png" alt="Logo da Infratech"></a></div>
            <div>
            </div>
                <ul class="nav-links">
                    <li><a href="index.php">Início</a></li>
                    <li><a href="loja.php">Loja</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
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
                <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $userData['nome']; ?>" readonly><br>
                
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>" readonly><br>
                
                <label for="celular">Celular:</label><br>
                <input type="tel" id="celular" name="celular" value="<?php echo isset($userData['celular']) ? $userData['celular'] : ''; ?>" readonly><br>
                
                <label for="data_nascimento">Data de Nascimento:</label><br>
                <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo $userData['data_nasc']; ?>" readonly><br>
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

    <div class="cookie-consent" id="cookieConsent">
        Nosso site utiliza cookies e tecnologias semelhantes, como explicado em nossa <a href="politica_privacidade.html">Política de Privacidade</a>.
        <button class="btn btn-primary btn-custom ms-2" onclick="acceptCookies()">OK</button>
    </div>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QJCXTvIpewj6I1vBpnW9pZCYtb1C2kGp5f3KlFuy6xkevTylCQnUlTklPq7G1F6Z" crossorigin="anonymous"></script>    

<script src="../assets/js/script.js"></script>
<script src="../assets/js/perfil.js"></script>
<script src="../assets/js/cookie.js"></script>
</body>
</html>
