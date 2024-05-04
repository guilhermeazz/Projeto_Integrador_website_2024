<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/sobre.css">
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
    <aside>
        <nav>
            <ul>
                <li><a href="#about_us">Sobre</a></li>
                <li><a href="#termos_uso">Termos e Condições</a></li>
                <li><a href="#politicas">Política de Privacidade</a></li>
            </ul>
        </nav>
    </aside>
    <div class="textos">
    <section id="about_us" class="about-us">
            <h2>Sobre a CONNECT INFRATECH'S</h2>
            <p>
                Fundada em 2005, a CONNECT INFRATECH'S emergiu como líder no setor de infraestrutura de TI,
                proporcionando soluções inovadoras para empresas de todos os portes. Com sede em São Paulo,
                a empresa começou com uma pequena equipe de entusiastas em tecnologia, que compartilhavam
                uma visão comum de transformar a maneira como as empresas utilizam a tecnologia em suas
                operações diárias.
            </p>
            <p>
                Ao longo dos anos, a CONNECT INFRATECH'S expandiu seu portfólio de serviços, incluindo
                soluções de cloud computing, segurança cibernética e consultoria estratégica em TI,
                atendendo clientes em mais de 50 países. Com um compromisso inabalável com a inovação e
                excelência, a empresa continua a ser uma força motriz na redefinição das fronteiras da
                tecnologia empresarial.
            </p>
            <p>
                A infraestrutura da CONNECT INFRATECH'S inclui avançados centros de dados localizados em
                diversas regiões estratégicas ao redor do mundo, equipados com a mais recente tecnologia
                para garantir alta disponibilidade e segurança dos dados de nossos clientes. Além disso,
                a empresa investe continuamente em tecnologias sustentáveis, buscando reduzir o impacto
                ambiental de suas operações.
            </p>
    </section>
    <section id="termos_uso" class="termos_uso">
            <h2>Termos e Condições de Uso</h2>
            <p>Por favor, leia atentamente os seguintes termos e condições antes de utilizar este site. Ao acessar ou utilizar este site de qualquer forma, você concorda em ficar vinculado a estes termos e condições. Se você não concorda com todos os termos e condições, então você não deve acessar o site ou utilizar qualquer serviço.</p>
            <br>
            <p> 1. Uso do Site</p>
            <p>     1.1 Este site destina-se apenas para uso pessoal e não comercial. Você concorda em não utilizar este site para fins comerciais ou de publicidade sem o consentimento prévio por escrito.</p>
            <p>     1.2 Você concorda em não utilizar este site de qualquer forma que possa danificar, desativar, sobrecarregar ou prejudicar o site ou interferir no uso e aproveitamento de qualquer outra pessoa do site.</p>
            <p>     1.3 Ao utilizar este site, você concorda em cumprir todas as leis locais, estaduais, nacionais e internacionais aplicáveis, incluindo, mas não se limitando às leis de propriedade intelectual.</p>
            <br>
            <p> 2. Conteúdo do Usuario</p>
            <p>     2.1 Você é exclusivamente responsável por qualquer conteúdo que você postar, enviar ou disponibilizar através deste site, incluindo, mas não se limitando a texto, imagens, vídeos, e outros materiais.</p>
            <p>     2.2 Ao enviar conteúdo para este site, você concede à empresa proprietária do site uma licença mundial, não exclusiva, livre de royalties, sublicenciável e transferível para usar, reproduzir, modificar, adaptar, distribuir e exibir tal conteúdo em conexão com o site e os negócios da empresa.</p>
            <p>     2.3 Você garante que tem o direito de publicar o conteúdo que você envia e que tal conteúdo não infringe os direitos de terceiros, incluindo direitos de propriedade intelectual, privacidade ou publicidade.</p>
            <br>
            <p> 3. Links para Terceiros</p>
            <p>     3.1 Este site pode conter links para sites de terceiros que não são controlados ou mantidos pela empresa proprietária do site. A inclusão de tais links não implica um endosso ou afiliação com os proprietários desses sites.</p>
            <p>     3.2 A empresa proprietária do site não é responsável pelo conteúdo ou práticas de privacidade de sites de terceiros. Ao acessar esses links, você o faz por sua própria conta e risco.
</p>
            <p> 4. Limitação de Responsabilidade</p>
            <p>     4.1 Em nenhuma circunstância a empresa proprietária do site será responsável por danos diretos, indiretos, incidentais, especiais, consequenciais ou punitivos decorrentes do uso ou incapacidade de usar este site.</p>
            <p>     4.2 Este site é fornecido "como está" e "conforme disponível", sem garantias de qualquer tipo, expressas ou implícitas, incluindo, mas não se limitando a garantias de comercialização, adequação a uma finalidade específica ou não violação.</p>
            <p> 5. Alterações nos Termos e Condições</p>
            <p>     5.1 A empresa proprietária do site reserva-se o direito de alterar estes termos e condições a qualquer momento, a seu exclusivo critério. Quaisquer alterações entrarão em vigor imediatamente após a publicação dos termos revisados no site.</p>
            <p>     5.2 É sua responsabilidade revisar regularmente estes termos e condições para estar ciente de quaisquer alterações. O uso continuado do site após a publicação de quaisquer alterações constitui aceitação dessas alterações.</p>
            <br>
    </section>
    <section id="politicas" class="politicas">
            <h2>Política de Privacidade</h2>

            <p>     A sua privacidade é uma prioridade para nós. Esta Política de Privacidade descreve como coletamos, usamos e protegemos as informações que você fornece ao acessar nosso site e utilizar nossos serviços relacionados à venda de artigos de cabeamento Wi-Fi. Ao utilizar nossos serviços, você concorda com as práticas descritas nesta política.</p>
            <br>
            <p> Coleta de Informações</p>

            <p>     Quando você visita nosso site, podemos coletar informações pessoais que você nos fornece voluntariamente, como seu nome, endereço de e-mail, número de telefone e informações de pagamento. Também podemos coletar informações de forma automática, como endereços IP, cookies e dados de navegação, para melhorar sua experiência de usuário e fornecer um serviço personalizado.</p>
            <br>
            <p> Uso de Informações</p>

            <p>     Utilizamos as informações coletadas para processar seus pedidos, fornecer suporte ao cliente, personalizar sua experiência de usuário, enviar comunicações relacionadas aos nossos produtos e serviços, e cumprir com obrigações legais. Não vendemos, alugamos ou compartilhamos suas informações pessoais com terceiros para fins de marketing sem seu consentimento explícito.</p>
            <br>
            <p> Segurança de Informações</p>

            <p>     Implementamos medidas de segurança para proteger suas informações contra acesso não autorizado, uso indevido ou divulgação. No entanto, é importante lembrar que nenhum método de transmissão pela Internet ou armazenamento eletrônico é 100% seguro. Portanto, não podemos garantir segurança absoluta.</p>
            <br>
            <p> Cookies e Tecnologias Semelhantes</p>

            <p>Utilizamos cookies e tecnologias semelhantes para melhorar a funcionalidade do site, analisar tendências, administrar o site e rastrear os movimentos dos usuários ao redor do site. Você pode configurar seu navegador para recusar todos os cookies ou para indicar quando um cookie está sendo enviado. No entanto, se você optar por não aceitar cookies, algumas partes do nosso site podem não funcionar corretamente.</p>
            <br>
            <p> Links para Outros Sites</p>

            <p>     Nosso site pode conter links para outros sites que não são operados por nós. Não somos responsáveis pelas práticas de privacidade desses sites. Recomendamos que você revise a política de privacidade de cada site que visita.</p>
            <br>
            <p> Alterações nesta Política</p>

            <p>     Podemos atualizar esta Política de Privacidade periodicamente, conforme necessário para refletir mudanças em nossas práticas de privacidade. Recomendamos que você revise esta página regularmente para ficar informado sobre como estamos protegendo suas informações.</p>
            <br>
            <p> Contato</p>

            <p>     Se você tiver dúvidas sobre esta Política de Privacidade, entre em contato conosco</p>
            <br>
            <p>     Ao utilizar nosso site, você concorda com o uso de suas informações conforme descrito nesta Política de Privacidade.</p>
            <br>

    </section>
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
</body>
</html>