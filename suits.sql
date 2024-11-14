CREATE DATABASE suits;
USE suits;

-- Tabela de clientes
CREATE TABLE clientes (  
    id INT AUTO_INCREMENT PRIMARY KEY,  
    nome VARCHAR(100) NOT NULL,  
    cpf VARCHAR(14) NOT NULL,  
    data_nascimento DATE NOT NULL,  
    nacionalidade VARCHAR(50) NOT NULL,  
    estado_civil VARCHAR(20) NOT NULL,  
    profissao VARCHAR(50) NOT NULL,  
    email VARCHAR(100) NOT NULL,  
    telefone VARCHAR(15) NOT NULL,  
    cep VARCHAR(10) NOT NULL,  
    rua VARCHAR(100) NOT NULL,  
    bairro VARCHAR(50) NOT NULL,  
    cidade VARCHAR(50) NOT NULL,  
    numero VARCHAR(10) NOT NULL,  
    estado VARCHAR(2) NOT NULL,  
    status VARCHAR(10) NOT NULL,
    caminho_rg VARCHAR(255),
    caminho_cpf VARCHAR(255),
    caminho_residencia VARCHAR(255),
    caminho_trabalho VARCHAR(255)  
);

-- Tabela de funcionários
CREATE TABLE funcionarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  cpf VARCHAR(15) NOT NULL,
  perfil VARCHAR(20) NOT NULL,
  numero_oab VARCHAR(10) NOT NULL,
  especializacao VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  senha VARCHAR(50) NOT NULL,
  telefone VARCHAR(14) NOT NULL,
  cep VARCHAR(9) NOT NULL,
  rua VARCHAR(50) NOT NULL,
  bairro VARCHAR(50) NOT NULL,
  cidade VARCHAR(50) NOT NULL,
  numero VARCHAR(10) NOT NULL,
  estado VARCHAR(50) NOT NULL,
  status ENUM('Ativo', 'Inativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Tabela de processos
CREATE TABLE processos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_processo VARCHAR(100) NOT NULL,
    data DATE NOT NULL,
    horario TIME NOT NULL,
    vara VARCHAR(200) NOT NULL,
    cliente INT,
    status BOOLEAN DEFAULT 1,
    FOREIGN KEY (cliente) REFERENCES clientes(id) ON DELETE SET NULL
);

-- Tabela de tarefas
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
    FOREIGN KEY (id_usuario) REFERENCES funcionarios(id) ON DELETE SET NULL,
    FOREIGN KEY (processo) REFERENCES processos(id) ON DELETE SET NULL
) CHARSET=utf8mb4;


SELECT * FROM clientes;
SELECT * FROM processos;