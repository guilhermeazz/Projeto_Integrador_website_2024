<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/loja.css">
    <link rel="stylesheet" href="../assets/css/produto.css">
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
        <div class="product-details">
            <div class="product-gallery">
                <img src="../assets/img/caboRede.webp" alt="Nome do Produto">
            </div>
            <div class="product-info">
                <h1>Nome do Produto</h1>
                <p>Obtenha conexões de alta velocidade e desempenho confiável com o Cabo de Rede Cat6. Com taxas de transferência de até 10Gbps em até 100 metros, este cabo é o padrão para Ethernet com par trançado, oferecendo uma solução robusta e confiável. O cabo Cat6 é ideal para empresas e profissionais que exigem velocidades de transmissão rápidas e mínima interferência. Sua construção sólida e menos flexível garante maior durabilidade e desempenho estável. Com uma frequência de 150MHz, o cabo Cat6 suporta largura de banda de 1Gbps a uma distância de 100 metros e largura de banda de 10Gbps a uma distância de 55 metros. Isso significa que você pode desfrutar de conexões rápidas e confiáveis em toda a sua rede. O cabo de rede Cat6 possui certificação Anatel (05190-22-06448), garantindo sua qualidade e conformidade com as normas de telecomunicações. Obtenha o máximo desempenho e confiabilidade para suas necessidades de rede com o Cabo de Rede Cat6. Invista na melhor solução para transmissões de alta velocidade e minimize a interferência. Desfrute de conexões rápidas e estáveis em sua rede. *Observação: A velocidade real da conexão depende também dos dispositivos e configurações de rede utilizados. Estamos à disposição para tirar suas dúvidas e oferecer suporte. Aproveite essa oferta exclusiva!</p>
                <p>Preço: R$ 99,99</p>
                
                <label for="quantity">Quantidade:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                
                <button class="add-to-cart-button">Adicionar ao Carrinho</button>
            </div>
        </div>
        <div class="carrinho_compra">
                <div class="nav_carrinho">
                    <h3>Carrinho de compras</h3>
                    <i class="fa-sharp fa-solid fa-cart-shopping" style="color: #012840;"></i>
                </div>

                <div class="organizar_compras">
                    <div class="lista_carrinho">
                        <div class="conteudo_carrinho">
                            <div class="img_produto_carrinho">
                                <img src="../assets/img/caboRede.webp" alt="imagem do cabo de rede de 15m com rj45" class="img_produto">
                            </div>
                            <p>Cabo de rede 15m</p>
                            <h4>R$23,00</h4>
                            <form action="excluir.php" method="post">
                                <input type="hidden" name="id_produto" value="">
                                <button type="submit" style="border:none; background:none;"><i class="fa-solid fa-trash" style="color: #012840;"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="carrinho_vazio">
                        <p>Seu Carrinho está vazio.</p>
                    </div>

                    <div>
                        <div class="somatoria">
                            <p>Total:</p>
                            <p>R$23,00</p>
                        </div>
                        <div class="confirmar_compra">
                            <button> Comprar </button>
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
    
<script src="../assets/js/script.js"></script>
<script src="https://kit.fontawesome.com/970adb6dd1.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="../assets/js/loja.js"><script>
    
</body>
</html>