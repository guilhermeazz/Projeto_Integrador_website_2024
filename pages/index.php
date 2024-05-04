<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) { ?>
                    <div class="profile-menu" id="profileMenu">
                        <a href="http://localhost/www/projeto_integrador_2024_website/pages/perfil.php">Perfil</a>
                        <a href="compras.html">Compras</a>
                        <button onclick="logout()">Sair</button>
                    </div>
                <?php } else { ?>
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
            <h2>CONNECT INFRATECH</h2>
            <p>A Connect Infratech é uma empresa especializada em fornecer infraestrutura de TI para empresas de todos os tamanhos. Com anos de experiência no mercado, oferecemos soluções de cabeamento estruturado e produtos essenciais para garantir o funcionamento eficiente da sua rede.</p>
            <div class="video-container">
                <video id="background-video" autoplay loop muted>
                    <source src="../assets/vdi/INFRA.mp4" type="video/mp4">
                    Seu navegador não suporta o elemento de vídeo.
                </video>
            </div>
        </section>
    
        <section class="servicos-produtos">
            <h2>Serviços e Produtos</h2>
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
    
<script src="../assets/js/script.js"></script>
</body>
</html>
