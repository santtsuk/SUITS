
CREATE DATABASE suits;
USE suits;

CREATE TABLE clientes (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    nome VARCHAR(100) NOT NULL,  
    cpf VARCHAR(14) NOT NULL,  
    data_nascimento DATE NOT NULL,  
    nascionalidade VARCHAR(50) NOT NULL,  
    estado_civil VARCHAR(20) NOT NULL,  
    profissao VARCHAR(50) NOT NULL,  
    email VARCHAR(100) NOT NULL ,  
    telefone VARCHAR(15) NOT NULL,  
    cep VARCHAR(10) NOT NULL,  
    rua VARCHAR(100) NOT NULL,  
    bairro VARCHAR(50) NOT NULL,  
    cidade VARCHAR(50) NOT NULL,  
    numero VARCHAR(10) NOT NULL,  
    estado VARCHAR(2) NOT NULL,  
    status VARCHAR(10) NOT NULL  
);

CREATE TABLE `funcionarios` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `numero_oab` varchar(10) NOT NULL,
  `especializacao` varchar(50) NOT NULL,
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


CREATE TABLE processos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_processo VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
    horario TIME NOT NULL,
    vara VARCHAR(200) NOT NULL,
    cliente INT,
    status BOOLEAN DEFAULT 1,
    FOREIGN KEY (cliente) REFERENCES clientes(id)
);

CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    dataInicio DATE NOT NULL,
    horarioInicio TIME NOT NULL,
    dataFinal DATE NOT NULL,
    horarioFinal TIME NOT NULL,
    processo INT,
    descricao TEXT,
    cor VARCHAR(7),
    status TINYINT(1) DEFAULT 0,
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES funcionarios(id),
    FOREIGN KEY (processo) REFERENCES processos(id)
) CHARSET=utf8mb4;


select *
from clientes;

select * from tarefas;