<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/ajuda.css">
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
            <div class="profile">
                <button class="profile-btn" onclick="toggleMenu()">
                    <img src="../assets/img/icone_perfil.png" alt="Ícone de perfil, função de logar ao site">
                </button>
                <?php
                session_start();
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                    include '../backend/bd_config.php'; 

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
        <div class="ajuda">
            <h1>Perguntas Frequentes</h1>
            <div class="perguntas">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Como Solicito um orçamento?
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">Vá até a nossa seção de <a href="servicos.php">serviços</a> e escolha a opção de orçamento. Inicie uma solicitação e então um de nossos atendentes irá entrar em comunicação para apurar dados e prosseguir com o orçamento.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Como acompanhar uma entrega?
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body"> Após a realização de uma compra de nossa <a href="loja.php">loja</a> o processo de entrega será registrado, passo a passo localizado em minhas comprar dentro em suas opções de conta.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                          Como funciona o serviço de instalação?
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">A Connect Infratech oferece além dos produtos da loja, támbem a instalação dos equipamentos de rede, assim como a adequação e prparação do espaço. Para isso é preciso realizar um orçamento, indo a seção de <a href="servicos.php">Serviços</a> e depois indo a opção de orçamento.</div>
                      </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                O que eu faço caso o produto que eu comprei, apresente algum problema?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Caso algum produto nosso, do qual você tenha comprado apresente algum problema, entre em contato conosco por meio do setor de <a href="servicos.php">Serviços,e indo até a opção deconversar com um atendente.</a></div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                Qual a garantia oferecida pela Connect Infratech?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">Nós da Connect Infratech, quando relacionados com nossos serviços de instalação de rede ou preparação do ambiente, oferecemos uma garantia de 1 ano, nos serviços basicos. Já com relação aos produtos de nossa loja, são diretos de nossas parcerias, contendo cada um a sua garantia de fabrica.</div>
                        </div>
                    </div>
                </div>
            </div>
          <br>
          <div class="chat">
            <h4>Não encontrou a sua duvida?</h2>
            <p>Nos envie um feedback, contando seu problema ou duvida.</p>
            <div class="duvida">
              <textarea id="duvida" name="duvida" placeholder="Escreva a sua dúvida"></textarea>
              <button>Enviar</button>
            </div>
            <div class="contato">
              <p>Ou entre em contado com um de nossos atendentes clicando <a href="">aqui</a>.</p>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>

<script src="../assets/js/cookie.js"></script>

</body>
</html>