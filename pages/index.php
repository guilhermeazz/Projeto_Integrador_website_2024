<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/e.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font/awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="index.html"><img src="../assets/img/infratech_logo.png" alt="Logo da Infratech"></a></div>
            <div>
                <ul class="nav-links">
                    <li><a href="index.php">Início</a></li>
                    <li><a href="loja.php">Loja</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="ajuda.php">Ajuda</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                </ul>
            </div>
            <div class="profile">
                <button class="profile-btn" onclick="toggleMenu()">
                    <img src="../assets/img/icone_perfil.png" alt="Ícone de perfil, função de logar ao site">
                </button>
                <?php
                session_start();
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                    include '../backend/bd_config.php'; // Inclua o arquivo de configuração do banco de dados

                    // Consulta SQL para obter os dados do usuário logado
                    $email = $_SESSION['user_email']; // Obtenha o email do usuário da sessão
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
        <section class="descricao">
            <h2 class="titulo">CONNECT INFRATECH</h2>
            <p>A Connect Infratech é uma empresa especializada em fornecer infraestrutura de TI para empresas de todos os tamanhos. Com anos de experiência no mercado, oferecemos soluções de cabeamento estruturado e produtos essenciais para garantir o funcionamento eficiente da sua rede.</p>
            <div class="video-container">
                <video id="background-video" autoplay loop muted>
                    <source src="../assets/vdi/INFRA.mp4" type="video/mp4">
                    Seu navegador não suporta o elemento de vídeo.
                </video>
            </div>
        </section>
    
        <section class="servicos-produtos">
            <h2 class="titulo">Serviços e Produtos</h2>
            <p>A Infratech oferece uma variedade de serviços e produtos para atender às necessidades de infraestrutura de TI da sua empresa. Nossos serviços incluem:</p>
            <ul>
                <li>Cabeamento estruturado</li>
                <li>Instalação e configuração de redes</li>
                <li>Manutenção de infraestrutura de TI</li>
            </ul>
            <p>Nossos produtos incluem:</p>
            <ul>
                <li>Cabos de rede</li>
                <li>Conectores e patch panels</li>
                <li>Racks e gabinetes</li>
            </ul>
        </section>
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
<script src="../assets/js/cookie.js"></script>

</body>
</html>
