-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02/04/2024 às 12:08
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
CREATE DATABASE IF NOT EXISTS `logistica` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `logistica`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `armazem`
--

DROP TABLE IF EXISTS `armazem`;
CREATE TABLE IF NOT EXISTS `armazem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade_atual` int NOT NULL,
  `limite_maximo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `armazem`
--

INSERT INTO `armazem` (`id`, `quantidade_atual`, `limite_maximo`) VALUES
(1, 5, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_notas_fiscais`
--

DROP TABLE IF EXISTS `itens_notas_fiscais`;
CREATE TABLE IF NOT EXISTS `itens_notas_fiscais` (
  `NUMERO` int NOT NULL,
  `CODIGO_DO_PRODUTO` varchar(10) NOT NULL,
  `QUANTIDADE` int NOT NULL,
  `PRECO` float NOT NULL,
  PRIMARY KEY (`NUMERO`,`CODIGO_DO_PRODUTO`),
  KEY `CODIGO_DO_PRODUTO` (`CODIGO_DO_PRODUTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `logins`
--

DROP TABLE IF EXISTS `logins`;
CREATE TABLE IF NOT EXISTS `logins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_login` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `logins`
--

INSERT INTO `logins` (`id`, `username`, `password`, `tipo_login`) VALUES
(1, 'root.Att', 'root', 'professor');

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
-- Estrutura para tabela `tabela_de_clientes`
--

DROP TABLE IF EXISTS `tabela_de_clientes`;
CREATE TABLE IF NOT EXISTS `tabela_de_clientes` (
  `CPF` varchar(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `ENDERECO_1` varchar(150) DEFAULT NULL,
  `ENDERECO_2` varchar(150) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(2) DEFAULT NULL,
  `CEP` varchar(8) DEFAULT NULL,
  `DATA_DE_NASCIMENTO` date DEFAULT NULL,
  `IDADE` smallint DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL,
  `LIMITE_DE_CREDITO` float DEFAULT NULL,
  `VOLUME_DE_COMPRA` float DEFAULT NULL,
  `PRIMEIRA_COMPRA` bit(1) DEFAULT NULL,
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
  `SABOR` varchar(20) DEFAULT NULL,
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

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itens_notas_fiscais`
--
ALTER TABLE `itens_notas_fiscais`
  ADD CONSTRAINT `itens_notas_fiscais_ibfk_1` FOREIGN KEY (`CODIGO_DO_PRODUTO`) REFERENCES `tabela_de_produtos` (`CODIGO_DO_PRODUTO`),
  ADD CONSTRAINT `itens_notas_fiscais_ibfk_2` FOREIGN KEY (`NUMERO`) REFERENCES `notas_fiscais` (`NUMERO`);

--
-- Restrições para tabelas `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  ADD CONSTRAINT `notas_fiscais_ibfk_1` FOREIGN KEY (`MATRICULA`) REFERENCES `tabela_de_vendedores` (`MATRICULA`),
  ADD CONSTRAINT `notas_fiscais_ibfk_2` FOREIGN KEY (`CPF`) REFERENCES `tabela_de_clientes` (`CPF`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
