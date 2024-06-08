<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/e.css">
    <link rel="stylesheet" href="../assets/css/loja.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
    <nav>
        <div class="logo"><a href="index.html"><img src="../assets/img/infratech_logo.png" alt="Logo da Infratech"></a></div>
        <ul class="nav-links">
            <li><a href="index.php">Início</a></li>
            <li><a href="loja.php">Loja</a></li>
            <li><a href="servicos.php">Serviços</a></li>
            <li><a href="ajuda.php">Ajuda</a></li>
            <li><a href="sobre.php">Sobre</a></li>
        </ul>
        <div class="profile">
            <button class="profile-btn" onclick="toggleMenu()">
                <img src="../assets/img/icone_perfil.png" alt="Ícone de perfil, função de logar ao site">
            </button>
            <?php
            session_start();
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                include '../backend/bd_config.php';

                $email = $_SESSION['user_email'];
                $sql = "SELECT * FROM usuario WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 1) {
                    $userData = $result->fetch_assoc();
            ?>
            <div class="profile-menu" id="profileMenu">
                <a href="perfil.php">Perfil</a>
                <a href="minhas_compras.php">Compras</a>
                <button onclick="logout()">Sair</button>
            </div>
            <?php } else {
                    echo "Erro ao obter dados do usuário.";
                }
            } else { ?>
            <div class="profile-menu" id="profileMenu">
                <a href="http://localhost/www/projeto_integrador_2024_website/pages/login.html">Logar</a>
                <a href="http://localhost/www/projeto_integrador_2024_website/pages/cadastro.html">Cadastrar</a>
            </div>
            <?php } ?>
        </div>
    </nav>
</header>

<main>
    <div class="loja">
    <div class="container mt-5">
        <div class="row" id="produtos">
            <!-- Produtos serão carregados aqui -->
        </div>
    </div>

        <div class="carrinho_compra">
            <div class="nav_carrinho">
                <h3>Carrinho de compras</h3>
                <i class="fa-sharp fa-solid fa-cart-shopping" style="color: #012840;"></i>
            </div>
            <div class="organizar_compras">
                <div class="lista_carrinho"></div>
                <div class="carrinho_vazio"><p>Seu Carrinho está vazio.</p></div>
                <div>
                    <div class="somatoria"><p>Total:</p><p id="totalCarrinho">R$0,00</p></div>
                    <div class="confirmar_compra"><button>Comprar</button></div>
                </div>
            </div>
        </div>
    </div>
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

<script src="../assets/js/script.js"></script>
<script src="https://kit.fontawesome.com/970adb6dd1.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../assets/js/loja.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="../assets/js/cookie.js"></script>

