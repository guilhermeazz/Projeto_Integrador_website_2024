SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Criação da Tabela `servico`
CREATE TABLE `servico` (
  `id` VARCHAR(8) NOT NULL,
  `nome` VARCHAR(250) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `img` LONGBLOB NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Criação da Tabela `solicitacao`
CREATE TABLE `solicitacao` (
  `id` VARCHAR(8) NOT NULL,
  `servico` VARCHAR(250) NOT NULL,
  `desc` VARCHAR(500) NOT NULL,
  `cliente` VARCHAR(300) NOT NULL,
  `email_cliente` VARCHAR(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Criação da Tabela `usuario`
CREATE TABLE `usuario` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(300) NOT NULL,
  `email` VARCHAR(254) NOT NULL UNIQUE,
  `celular` VARCHAR(15) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `senha` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserção de dados na tabela `usuario`
INSERT INTO `usuario` (`nome`, `email`, `celular`, `data_nasc`, `senha`) 
VALUES 
('Guilherme', 'gui@gmail.com', '2147483647', '2004-11-17', '$2y$10$OMlQb8G9gEx6/bU8FKL8UOVJ86vuLqsxjOoFOV/AFcwszoO9oW/P2'),
('Carlos', 'g@g', '2147483647', '2004-11-17', '$2y$10$qdOwsepVM9LxVKMK6ZRmsuKeHYLS38WmHI7AlLkE99PIxRGperj0y');

-- Criação da Tabela `produto`
CREATE TABLE `produto` (
  `id` VARCHAR(8) NOT NULL PRIMARY KEY,
  `nome` VARCHAR(250) NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `preco` DECIMAL(15, 2) NOT NULL,
  `estoque` INT(9) NOT NULL,
  `img_path` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserção de dados na tabela `produto`
INSERT INTO `produto` (`id`, `nome`, `descricao`, `preco`, `estoque`, `img_path`) VALUES 
('CAB-CAT5-15M', 'Cabo Cat5 de 15 metros', 'Cabo de rede UTP, cat5 de 15 metros, para empresas e profissionais que exigem velocidades de transmissão rápidas e mínima interferência. Com uma frequência de 150MHz, o cabo Cat5 suporta largura de banda de 1Gbps a uma distância de 100 metros e largura de banda de 10Gbps a uma distância de 55 metros', 99.00, 10, './assets/img/roteador.jpg'),
('SWT-GER-24-1G', 'Switch Gerenciavel 24 Portas 1GB', 'Switch Gerencial de 24 portas e 1 Gigabit', 2000.00, 10, './assets/switch.webp'),
('RCK-PAD-42U', 'Rack Padrão de 42 unidades', 'Rack Padrão de 42 unidades', 1500.00, 3, './assets/img/rack.webp');

-- Criação da Tabela `carrinho`
CREATE TABLE `carrinho` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_email` VARCHAR(254) NOT NULL,
    `produto_id` VARCHAR(8) NOT NULL,
    `quantidade` INT NOT NULL,
    FOREIGN KEY (`user_email`) REFERENCES `usuario`(`email`),
    FOREIGN KEY (`produto_id`) REFERENCES `produto`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
