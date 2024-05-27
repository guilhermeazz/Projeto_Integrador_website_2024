<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/loja.css">
    <link rel="stylesheet" href="../assets/css/cookie.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font/awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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

        <div class="container mt-4">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <img src="../assets/img/infratech_logo.png" class="card-img-top" alt="Imagem do produto">
                  <div class="card-body">
                    <h5 class="card-title">Orçamento</h5>
                    <p class="card-text">Realizamos seu orçamento, considerando o espaço da instalação e os produtos que deseja.</p>
                    <a href="../pages/detalhe_servico.php" class="btn btn-primary">Acessar</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <img src="../assets/img/infratech_logo.png" class="card-img-top" alt="Imagem do produto">
                  <div class="card-body">
                    <h5 class="card-title">Instalação</h5>
                    <p class="card-text">Caso já tenha os equipamentos, mas deseja o nosso serviço de instalação.</p>
                    <a href="#" class="btn btn-primary">Acessar</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <img src="../assets/img/infratech_logo.png" class="card-img-top" alt="Imagem do produto">
                  <div class="card-body">
                    <h5 class="card-title">Assistência</h5>
                    <p class="card-text">Oferecemos ajuda em relação aos produto ou alguma instalação nossa<br>.</p>
                    <a href="#" class="btn btn-primary">Acessar</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <img src="../assets/img/infratech_logo.png" class="card-img-top" alt="Imagem do produto">
                  <div class="card-body">
                    <h5 class="card-title">Atendimento online</h5>
                    <p class="card-text">Precisa de alguma outra ajuda, ou tirar uma duvida. Você pode optar em nos contactar diretamente.</p>
                    <a href="#" class="btn btn-primary">Acessar</a>
                  </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

<script src="../assets/js/cookie.js"></script>

</body>
</html>