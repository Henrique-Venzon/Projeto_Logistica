-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 11/05/2024 às 01:13
-- Versão do servidor: 8.0.36
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `logistica`
--
CREATE DATABASE IF NOT EXISTS `logistica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `logistica`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'root.Att', 'root', 1),
(12, 'teste', 'teste', 1),
(94, 'Aluno 1', 'xSTt', 2),
(95, 'Aluno 2', 'blFm', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `armazem_limite`
--

DROP TABLE IF EXISTS `armazem_limite`;
CREATE TABLE IF NOT EXISTS `armazem_limite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade_atual` int NOT NULL,
  `limite_maximo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade_concluida`
--

DROP TABLE IF EXISTS `atividade_concluida`;
CREATE TABLE IF NOT EXISTS `atividade_concluida` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_transporte` int NOT NULL,
  `id_turma` int NOT NULL,
  `id_aluno` int NOT NULL,
  `sem_lona` tinyint(1) NOT NULL DEFAULT '0',
  `avariana_lateral_direita` tinyint(1) NOT NULL DEFAULT '0',
  `sem_cabo_de_energia` tinyint(1) NOT NULL DEFAULT '0',
  `avaria_no_teto` tinyint(1) NOT NULL DEFAULT '0',
  `avaria_na_frente` tinyint(1) NOT NULL DEFAULT '0',
  `sem_lacre` tinyint(1) NOT NULL DEFAULT '0',
  `adesivos_avariados` tinyint(1) NOT NULL DEFAULT '0',
  `excesso_de_altura` tinyint(1) NOT NULL DEFAULT '0',
  `excesso_na_direita` tinyint(1) NOT NULL DEFAULT '0',
  `excesso_na_esquerda` tinyint(1) NOT NULL DEFAULT '0',
  `excesso_na_frente` tinyint(1) NOT NULL DEFAULT '0',
  `painel_avariado` tinyint(1) NOT NULL DEFAULT '0',
  `avariana_na_lateral_esquerda` tinyint(1) NOT NULL DEFAULT '0',
  `container_bem_desgastado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_turma` (`id_turma`),
  KEY `id_aluno` (`id_aluno`),
  KEY `id_transporte` (`id_transporte`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `atividade_concluida`
--

INSERT INTO `atividade_concluida` (`id`, `id_transporte`, `id_turma`, `id_aluno`, `sem_lona`, `avariana_lateral_direita`, `sem_cabo_de_energia`, `avaria_no_teto`, `avaria_na_frente`, `sem_lacre`, `adesivos_avariados`, `excesso_de_altura`, `excesso_na_direita`, `excesso_na_esquerda`, `excesso_na_frente`, `painel_avariado`, `avariana_na_lateral_esquerda`, `container_bem_desgastado`) VALUES
(18, 2, 1, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 1, 1, 12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `notas_fiscais`
--

DROP TABLE IF EXISTS `notas_fiscais`;
CREATE TABLE IF NOT EXISTS `notas_fiscais` (
  `CPF` varchar(11) NOT NULL,
  `MATRICULA` varchar(5) NOT NULL,
  `DATA_VENDA` date DEFAULT NULL,
  `NUMERO` int NOT NULL,
  `IMPOSTO` float NOT NULL,
  PRIMARY KEY (`NUMERO`),
  KEY `MATRICULA` (`MATRICULA`),
  KEY `CPF` (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(255) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `UN` varchar(4) NOT NULL,
  `Quantidade` int NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `UN`, `Quantidade`, `turma_id`) VALUES
(1, 'Tesoura', 5.00, 'UN', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(65) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'teste', 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_de_clientes`
--

DROP TABLE IF EXISTS `tabela_de_clientes`;
CREATE TABLE IF NOT EXISTS `tabela_de_clientes` (
  `CPF` varchar(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `ENDERECO_1` varchar(150) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(2) DEFAULT NULL,
  `CEP` varchar(8) DEFAULT NULL,
  `DATA_DE_NASCIMENTO` date DEFAULT NULL,
  `IDADE` smallint DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_de_produtos`
--

DROP TABLE IF EXISTS `tabela_de_produtos`;
CREATE TABLE IF NOT EXISTS `tabela_de_produtos` (
  `CODIGO_DO_PRODUTO` varchar(10) NOT NULL,
  `NOME_DO_PRODUTO` varchar(50) DEFAULT NULL,
  `EMBALAGEM` varchar(20) DEFAULT NULL,
  `TAMANHO` varchar(10) DEFAULT NULL,
  `PRECO_DE_LISTA` float NOT NULL,
  PRIMARY KEY (`CODIGO_DO_PRODUTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tabela_de_vendedores`
--

DROP TABLE IF EXISTS `tabela_de_vendedores`;
CREATE TABLE IF NOT EXISTS `tabela_de_vendedores` (
  `MATRICULA` varchar(5) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `PERCENTUAL_COMISSAO` float DEFAULT NULL,
  `DATA_ADMISSAO` date DEFAULT NULL,
  `DE_FERIAS` bit(1) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MATRICULA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `transporte`
--

DROP TABLE IF EXISTS `transporte`;
CREATE TABLE IF NOT EXISTS `transporte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `placa` varchar(30) NOT NULL,
  `NomeMotorista` varchar(100) NOT NULL,
  `container` varchar(30) NOT NULL,
  `navio` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `lacre` varchar(30) NOT NULL,
  `LacreSif` int NOT NULL,
  `IMD` varchar(30) NOT NULL,
  `NOnu` int NOT NULL,
  `situacao` varchar(30) NOT NULL,
  `npedido` varchar(30) NOT NULL,
  `temperatura` int DEFAULT NULL,
  `Empresa` varchar(30) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `Telefone` varchar(30) NOT NULL,
  `CEP` varchar(30) NOT NULL,
  `produto1` varchar(30) NOT NULL,
  `produto2` varchar(30) DEFAULT NULL,
  `produto3` varchar(30) DEFAULT NULL,
  `produto4` varchar(30) DEFAULT NULL,
  `unidade1` varchar(30) NOT NULL,
  `unidade2` varchar(30) DEFAULT NULL,
  `unidade3` varchar(30) DEFAULT NULL,
  `unidade4` varchar(30) DEFAULT NULL,
  `quantidade1` int NOT NULL,
  `quantidade2` int DEFAULT NULL,
  `quantidade3` int DEFAULT NULL,
  `quantidade4` int DEFAULT NULL,
  `valor1` decimal(10,2) NOT NULL,
  `valor2` decimal(10,2) DEFAULT NULL,
  `valor3` decimal(10,2) DEFAULT NULL,
  `valor4` decimal(10,2) DEFAULT NULL,
  `ncm1` int NOT NULL,
  `ncm2` int DEFAULT NULL,
  `ncm3` int DEFAULT NULL,
  `ncm4` int DEFAULT NULL,
  `cst1` int NOT NULL,
  `cst2` int DEFAULT NULL,
  `cst3` int DEFAULT NULL,
  `cst4` int DEFAULT NULL,
  `cfop1` int NOT NULL,
  `cfop2` int DEFAULT NULL,
  `cfop3` int DEFAULT NULL,
  `cfop4` int DEFAULT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `transporte`
--

INSERT INTO `transporte` (`id`, `placa`, `NomeMotorista`, `container`, `navio`, `tipo`, `lacre`, `LacreSif`, `IMD`, `NOnu`, `situacao`, `npedido`, `temperatura`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `turma_id`) VALUES
(1, '231QAC', 'Portifólio Matheus Yan', '2231', 'KL2332', '22G1', 'ty223At', 41231, '1', 2546, 'enviado', '231', 0, 'a', 'a', '', '88380000', 'Portifólio Matheus Yan', 'Portifólio Matheus Yan', '', '', 'UN', 'RL', 'UN', 'UN', 231, 266, 0, 0, 5.00, 2.00, 0.00, 0.00, 231, 52143, 0, 0, 231, 2314, 0, 0, 123, 2313, 0, 0, 1),
(2, '231QAC', 'Portifólio Matheus Yan', '2231', 'KL2332', '22G1', 'ty223At', 41231, '1', 2546, 'enviado', '56213', 23, 'a', 'a', '23124', '88380000', 'Portifólio Matheus Yan', 'Portifólio Matheus Yan', '', '', ' ', ' ', ' ', ' ', 231, 266, 0, 0, 5.00, 2.00, 0.00, 0.00, 231, 52143, 0, 0, 231, 2314, 0, 0, 123, 2313, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=670 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id`) VALUES
(1),
(2);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Restrições para tabelas `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  ADD CONSTRAINT `notas_fiscais_ibfk_1` FOREIGN KEY (`MATRICULA`) REFERENCES `tabela_de_vendedores` (`MATRICULA`),
  ADD CONSTRAINT `notas_fiscais_ibfk_2` FOREIGN KEY (`CPF`) REFERENCES `tabela_de_clientes` (`CPF`);

--  
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
