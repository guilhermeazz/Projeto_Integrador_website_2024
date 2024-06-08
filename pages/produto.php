<?php
include '../backend/bd_config.php';

if (!isset($_GET['id'])) {
    echo "Produto não encontrado.";
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT nome, descricao, preco, img FROM produto WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Produto não encontrado.";
    exit;
}

$produto = $result->fetch_assoc();
$nome = htmlspecialchars($produto['nome']);
$descricao = htmlspecialchars($produto['descricao']);
$preco = number_format($produto['preco'], 2, ',', '.');
$img = htmlspecialchars($produto['img']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nome; ?></title>
    <link rel="stylesheet" href="../assets/css/e.css">
    <link rel="stylesheet" href="../assets/css/loja.css">
    <link rel="stylesheet" href="../assets/css/produto.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
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
                        <?php
                    } else {
                        echo "Erro ao obter dados do usuário.";
                    }
                } else {
                    ?>
                    <div class="profile-menu" id="profileMenu">
                        <a href="login.html">Logar</a>
                        <a href="cadastro.html">Cadastrar</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </nav>
    </header>

    <main>
        <div class="product-details">
            <div class="product-info">
                <h1><?php echo $nome; ?></h1>
                <p><?php echo $descricao; ?></p>
                <p>Preço: R$ <?php echo $preco; ?></p>

                <label for="quantity">Quantidade:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1">
                <button class="add-to-cart-button" onclick="adicionarAoCarrinho('<?php echo $id; ?>')">Adicionar ao Carrinho</button>
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
            <p>Telefone: (XX) YYYY-ZZZZ</p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("profileMenu");
            menu.classList.toggle("show");
        }

        function adicionarAoCarrinho(id) {
            // Função para adicionar o produto ao carrinho
        }

        function logout() {
            // Função para logout
        }
    </script>
</body>
</html>
