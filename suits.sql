-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/11/2024 às 01:08
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
-- Banco de dados: `suits`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `numero_oab` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `cpf`, `perfil`, `numero_oab`, `email`, `senha`, `telefone`, `cep`, `rua`, `bairro`, `cidade`, `numero`, `estado`, `status`) VALUES
(1, 'jorge', '111.111.111', 'advogado', '11111111', 'jorge@gmail.com', '123456', '(11) 11111-', '44003-51', 'Avenida Doutor Araújo Pinho', 'Olhos D\'Água', 'Feira de Santana', '1046', 'BA', 'Inativo'),
(2, 'aa', '111.111.111', 'secretaria', '', 'aa@gmail.com', 'aaa', '(75) 98120-48', '44003-51', 'Avenida Doutor Araújo Pinho', 'Olhos D\'Água', 'Feira de Santana', '1046', 'BA', 'Inativo'),
(3, 'aa', '111.111.111', 'secretaria', '', 'aa@gmail.com', 'aa', '(75) 98120-48', '44003-51', 'Avenida Doutor Araújo Pinho', 'Olhos D\'Água', 'Feira de Santana', '1046', 'BA', 'Inativo'),
(4, 'bb', '000.000.000-00', 'secretaria', '', 'bb@gmail.com', 'bbaaa', '(11) 11111-111', '44009-06', 'Caminho 1', 'Calumbi', 'Feira de Santana', '1234', 'BA', 'Inativo'),
(5, 'Ana', '123.294.646-84', 'advogado', '1452365', 'carol16@gmail.com', 'asdfgghhk', '(75)98120-4889', '44003-51', 'Avenida Doutor Araújo Pinho', 'Olhos D\'Água', 'Feira de Santana', '1046', 'BA', 'Inativo'),
(6, 'joao', '548.464.848-61', 'secretaria', '', 'jorge@gmail.com', 'sdsadasdfdfs', '(11)11111-1111', '44003-51', 'Avenida Doutor Araújo Pinho', 'Olhos D\'Água', 'Feira de Santana', '1234', 'BA', 'Inativo');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
