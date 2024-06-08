// Função para carregar produtos
function carregarProdutos() {
    fetch('../backend/carregar_produtos.php')
    .then(response => response.json())
    .then(data => {
        const produtosContainer = document.getElementById('produtos');
        produtosContainer.innerHTML = '';

        if (data.error) {
            alert(data.error);
            return;
        }

        data.forEach(produto => {
            const preco = Number(produto.preco).toFixed(2);
            const imgSrc = produto.img ? produto.img : '../assets/img/default.png'; // Verifique se o caminho da imagem está correto
            const produtoCard = `
                <div class="col-md-4">
                    <div class="card">
                        <img src="${imgSrc}" class="card-img-top" alt="Imagem do produto">
                        <div class="card-body">
                            <h5 class="card-title">${produto.nome}</h5>
                            <p class="card-text">R$ ${preco}</p>
                            <a href="../pages/produto.php?id=${produto.id}" class="btn btn-primary">Detalhes</a>
                            <a href="#" class="btn btn-primary" onclick="adicionarAoCarri('${produto.id}')">Adicionar ao Carrinho</a>
                        </div>
                    </div>
                </div>
            `;
            produtosContainer.innerHTML += produtoCard;
        });
    })
    .catch(error => {
        console.error('Erro ao carregar produtos:', error);
        alert('Erro ao carregar produtos.');
    });
}

document.addEventListener('DOMContentLoaded', carregarProdutos);

// Função para adicionar ao carrinho
function adicionarAoCarrinho(produtoId) {
    fetch('../backend/add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `produto_id=${produtoId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            alert(data.message);
            atualizarCarrinho();
        }
    })
    .catch(error => {
        console.error('Erro ao adicionar ao carrinho:', error);
        alert('Erro ao adicionar ao carrinho.');
    });
}

// Função para atualizar o carrinho
function atualizarCarrinho() {
    fetch('../backend/view_cart.php')
    .then(response => response.json())
    .then(data => {
        const listaCarrinho = document.querySelector('.lista_carrinho');
        const carrinhoVazio = document.querySelector('.carrinho_vazio');
        const totalCarrinho = document.getElementById('totalCarrinho');
        listaCarrinho.innerHTML = '';
        let total = 0;

        if (data.error) {
            alert(data.error);
            return;
        }

        if (data.length > 0) {
            carrinhoVazio.style.display = 'none';
            data.forEach(item => {
                const preco = Number(item.preco).toFixed(2);
                const itemCarrinho = `
                    <div class="conteudo_carrinho">
                        <div class="img_produto_carrinho">
                            <img src="data:image/jpeg;base64,${item.img}" alt="${item.nome}" class="img_produto">
                        </div>
                        <p>${item.nome}</p>
                        <h4>R$${preco}</h4>
                        <p>Quantidade: ${item.quantidade}</p>
                        <button onclick="removerDoCarrinho('${item.id}')" style="border:none; background:none;">
                            <i class="fa-solid fa-trash" style="color: #012840;"></i>
                        </button>
                    </div>
                `;
                listaCarrinho.innerHTML += itemCarrinho;
                total += item.preco * item.quantidade;
            });
            totalCarrinho.textContent = `R$${total.toFixed(2)}`;
        } else {
            carrinhoVazio.style.display = 'block';
        }
    })
    .catch(error => {
        console.error('Erro ao atualizar o carrinho:', error);
        alert('Erro ao atualizar o carrinho.');
    });
}

// Função para remover do carrinho
function removerDoCarrinho(produtoId) {
    fetch('../backend/remove_from_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `produto_id=${produtoId}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.error) {
            alert(data.error);
        } else {
            alert(data.message);
            atualizarCarrinho();
        }
    })
    .catch(error => {
        console.error('Erro ao remover do carrinho:', error);
        alert('Erro ao remover do carrinho.');
    });
}

// Carregar produtos ao carregar a página
document.addEventListener('DOMContentLoaded', carregarProdutos);
document.addEventListener('DOMContentLoaded', atualizarCarrinho);
