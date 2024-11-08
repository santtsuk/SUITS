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

CREATE DATABASE suits;
USE suits;

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE clientes (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    nome VARCHAR(100) NOT NULL,  
    cpf VARCHAR(14) NOT NULL UNIQUE,  
    data_nascimento DATE NOT NULL,  
    nascionalidade VARCHAR(50) NOT NULL,  
    estado_civil VARCHAR(20) NOT NULL,  
    profissao VARCHAR(50) NOT NULL,  
    email VARCHAR(100) NOT NULL UNIQUE,  
    telefone VARCHAR(15) NOT NULL,  
    cep VARCHAR(10) NOT NULL,  
    rua VARCHAR(100) NOT NULL,  
    bairro VARCHAR(50) NOT NULL,  
    cidade VARCHAR(50) NOT NULL,  
    numero VARCHAR(10) NOT NULL,  
    estado VARCHAR(2) NOT NULL,  
    status VARCHAR(10) NOT NULL  
);

select *
from clientes;

select * from tarefas;

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    dataInicio DATE NOT NULL,
    horarioInicio TIME NOT NULL,
    dataFinal DATE NOT NULL,
    horarioFinal TIME NOT NULL,
    cliente VARCHAR(255) NOT NULL,
    descricao TEXT,
    cor VARCHAR(7),
    status TINYINT(1) DEFAULT 0,  
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES funcionarios(id)
) CHARSET=utf8mb4;


INSERT INTO tarefa (titulo, dataInicio, horarioInicio, dataFinal, horarioFinal, cliente, descricao, cor, id_usuario)
VALUES 
('Reunião com cliente X', '2024-11-10', '10:00:00', '2024-11-10', '12:00:00', 'Cliente X', 'Reunião para discutir o projeto', '#FF5733', 1);
INSERT INTO tarefa (titulo, dataInicio, horarioInicio, dataFinal, horarioFinal, cliente, descricao, cor, id_usuario)
VALUES 
('Reunião de equipe', '2024-11-11', '14:00:00', '2024-11-11', '16:00:00', 'Equipe interna', 'Reunião semanal de alinhamento de tarefas', '#33FF57', 2);




CREATE TABLE processos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_processo VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
    horario TIME NOT NULL,
    vara VARCHAR(200) NOT NULL,
    cliente VARCHAR(200) NOT NULL
);


CREATE TABLE `funcionarios` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `numero_oab` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(50) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `status` enum('Ativo','Inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
