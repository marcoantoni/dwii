-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 20/05/2026 às 00:01
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `des_web`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int NOT NULL,
  `nome` varchar(45) NOT NULL,
  `nasc` date NOT NULL,
  `fone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `bb` int NOT NULL,
  `bradesco` int NOT NULL,
  `nubank` int NOT NULL,
  `itau` int NOT NULL,
  `id_municipio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `nasc`, `fone`, `email`, `sexo`, `senha`, `bb`, `bradesco`, `nubank`, `itau`, `id_municipio`) VALUES
(1, 'Marguerite H. Rangel\n', '2002-01-14', '(51) 99847-2316', 'marguerite@rangel.eu', 'f', '1234', 1, 0, 0, 0, 1),
(2, 'Mateus Augusto Barros', '2002-01-14', '(11) 98765-4021', 'mateus.barros@ymail.com', 'm', '1234', 1, 0, 0, 0, 2),
(3, 'Camila da Rosa Santana', '2008-01-14', '519945457597', '(41) 99128-7743', 'f', '1234', 0, 0, 1, 0, 3),
(14, 'Gabriel Augusto da Silva', '2001-01-15', '519945457597', '(85) 99631-5802', 'm', '1234', 1, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `municipios`
--

CREATE TABLE `municipios` (
  `id` int NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `municipios`
--

INSERT INTO `municipios` (`id`, `nome`) VALUES
(1, 'Parobé'),
(2, 'Rolante'),
(3, 'Igrejinha'),
(4, 'Taquara'),
(5, 'Três Coroas'),
(6, 'Riozinho'),
(7, 'Santo Antônio da Patrulha');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientes_municipios_idx` (`id_municipio`);

--
-- Índices de tabela `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_municipios` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
