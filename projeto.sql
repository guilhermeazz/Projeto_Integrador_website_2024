-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/06/2024 às 06:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `user_email` varchar(254) NOT NULL,
  `produto_id` varchar(8) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` varchar(8) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `preco` decimal(15,2) NOT NULL,
  `estoque` int(9) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `estoque`, `img`) VALUES
('CAB-CAT5', 'Cabo Cat5 de 15 metros', 'Cabo de rede UTP, cat5 de 15 metros, para empresas e profissionais que exigem velocidades de transmissão rápidas e mínima interferência. Com uma frequência de 150MHz, o cabo Cat5 suporta largura de banda de 1Gbps a uma distância de 100 metros e largura de banda de 10Gbps a uma distância de 55 metros', 99.00, 10, '6663d9060701a.jpg'),
('RCK-PAD-', 'Rack Padrão de 42 unidades', 'Rack Padrão de 42 unidades', 1500.00, 5, '6663d9381ef3f.jpg'),
('SWT-GER-', 'Switch Gerenciavel 24 Portas 1GB', 'Switch Gerencial de 24 portas e 1 Gigabit', 2000.00, 10, '6663d8b223914.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `id` varchar(8) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao`
--

CREATE TABLE `solicitacao` (
  `id` varchar(8) NOT NULL,
  `servico` varchar(250) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `cliente` varchar(300) NOT NULL,
  `email_cliente` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(254) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `data_nasc` date NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `celular`, `data_nasc`, `senha`) VALUES
(3, 'Jose ', 'jose@gmail.com', '11985423658', '2004-11-17', '$2y$10$pNsvVAb9vaSHGIYbjbzXreQn.D6i8Hx5ADh.vqr/kHMxXivpVD/Ea');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `usuario` (`email`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
