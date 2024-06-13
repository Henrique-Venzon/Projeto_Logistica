-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13/06/2024 às 14:24
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
) ENGINE=InnoDB AUTO_INCREMENT=411 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'PROFESSOR', 'PROFESSOR@SESISENAI2024', -1),
(2, 'root.Att', '6nUJ', 1),
(12, 'teste', 'teste', 1),
(94, 'Aluno 1', 'xSTt', 2),
(95, 'Aluno 2', 'blFm', 2),
(391, 'Aluno 1', 'GZtv', 3),
(392, 'Aluno 2', 'gtmQ', 3),
(393, 'Aluno 3', 'fmi8', 3),
(394, 'Aluno 4', '7Oom', 3),
(395, 'Aluno 5', 'hN87', 3),
(396, 'Aluno 6', 'Fbgu', 3),
(397, 'Aluno 7', 'dvmi', 3),
(398, 'Aluno 8', '8mGq', 3),
(399, 'Aluno 9', 'FqL7', 3),
(400, 'Aluno 10', 'gKoM', 3),
(401, 'Aluno 11', '7Ojm', 3),
(402, 'Aluno 12', 'xN7Y', 3),
(403, 'Aluno 13', 'w27R', 3),
(404, 'Aluno 14', 'qsCu', 3),
(405, 'Aluno 15', 'Ef7e', 3),
(406, 'Aluno 16', 'GEt9', 3),
(407, 'Aluno 17', 'emfd', 3),
(408, 'Aluno 18', '9Eqz', 3),
(409, 'Aluno 19', 'W6wr', 3),
(410, 'Aluno 20', 'h7E3', 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `atividade_concluida`
--

INSERT INTO `atividade_concluida` (`id`, `id_transporte`, `id_turma`, `id_aluno`, `sem_lona`, `avariana_lateral_direita`, `sem_cabo_de_energia`, `avaria_no_teto`, `avaria_na_frente`, `sem_lacre`, `adesivos_avariados`, `excesso_de_altura`, `excesso_na_direita`, `excesso_na_esquerda`, `excesso_na_frente`, `painel_avariado`, `avariana_na_lateral_esquerda`, `container_bem_desgastado`) VALUES
(43, 15, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carga`
--

DROP TABLE IF EXISTS `carga`;
CREATE TABLE IF NOT EXISTS `carga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `situacao` varchar(30) NOT NULL,
  `npedido` varchar(30) NOT NULL,
  `Empresa` varchar(30) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `Telefone` varchar(30) NOT NULL,
  `CEP` varchar(30) NOT NULL,
  `produto1` varchar(30) NOT NULL,
  `produto2` varchar(30) DEFAULT '',
  `produto3` varchar(30) DEFAULT '',
  `produto4` varchar(30) DEFAULT '',
  `unidade1` varchar(30) NOT NULL,
  `unidade2` varchar(30) DEFAULT '0',
  `unidade3` varchar(30) DEFAULT '0',
  `unidade4` varchar(30) DEFAULT '0',
  `quantidade1` int NOT NULL,
  `quantidade2` int DEFAULT '0',
  `quantidade3` int DEFAULT '0',
  `quantidade4` int DEFAULT '0',
  `valor1` decimal(10,2) NOT NULL,
  `valor2` decimal(10,2) DEFAULT '0.00',
  `valor3` decimal(10,2) DEFAULT '0.00',
  `valor4` decimal(10,2) DEFAULT '0.00',
  `ncm1` int NOT NULL,
  `ncm2` int DEFAULT '0',
  `ncm3` int DEFAULT '0',
  `ncm4` int DEFAULT '0',
  `cst1` int NOT NULL,
  `cst2` int DEFAULT '0',
  `cst3` int DEFAULT '0',
  `cst4` int DEFAULT '0',
  `cfop1` int NOT NULL,
  `cfop2` int DEFAULT '0',
  `cfop3` int DEFAULT '0',
  `cfop4` int DEFAULT '0',
  `data_pedido` date NOT NULL,
  `data_entrega` date NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `carga`
--

INSERT INTO `carga` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(104, 'esperando a nota fiscal', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-12', '2024-06-12', 3),
(105, 'Esperando a nota fiscal', '2', 'ARXO', 'Henrique Venzon', '4791296865', '88318481', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 30, 20, 0, 0, 15.00, 8.33, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-12', '2024-06-13', 1),
(106, 'Esperando a nota fiscal', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-12', '2024-06-13', 1),
(107, 'Esperando a nota fiscal', '2', 'MultiLog', 'Luan Pereira', '4789426155', '23812310', 'Motor', 'Óleo Diesel', '', '', 'UN', 'L', ' ', ' ', 15, 30, 0, 0, 2800.00, 2.40, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-12', '2024-06-13', 1),
(108, 'Esperando a nota fiscal', '2', 'MultiLog', 'Luan Pereira', '4789426155', '23812310', 'Motor', 'Óleo Diesel', '', '', 'UN', 'L', ' ', ' ', 15, 30, 0, 0, 2800.00, 2.40, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-21', '2024-06-07', 1),
(109, 'Esperando a nota fiscal', '2', 'MultiLog', 'Luan Pereira', '4789426155', '23812310', 'Motor', 'Óleo Diesel', '', '', 'UN', 'L', ' ', ' ', 15, 30, 0, 0, 2800.00, 2.40, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 1),
(110, 'Esperando a nota fiscal', '2', 'MultiLog', 'Luan Pereira', '4789426155', '23812310', 'Motor', 'Óleo Diesel', '', '', 'UN', 'L', ' ', ' ', 15, 30, 0, 0, 2800.00, 2.40, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-07', '2024-06-13', 1),
(111, 'Esperando a nota fiscal', '3', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 1),
(112, 'Esperando a nota fiscal', '3', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 1),
(113, 'Esperando a nota fiscal', '3', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 1),
(114, 'Esperando a nota fiscal', '5', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 16.00, 9.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-06', '2024-05-30', 1),
(115, 'Esperando a nota fiscal', '0', 'MultiLog', 'Luan Pereira', '4789426155', '23812310', 'Motor', 'Óleo Diesel', '', '', 'UN', 'L', ' ', ' ', 15, 30, 0, 0, 2800.00, 2.40, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0412-02-23', '0323-12-05', 1),
(116, 'Esperando a nota fiscal', '4', 'MultiLog', 'Luan Pereira', '4789426155', '23812310', 'Motor', 'Óleo Diesel', '', '', 'UN', 'L', ' ', ' ', 15, 30, 0, 0, 21800.00, 2.40, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 1),
(117, 'Esperando a nota fiscal', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-12', '2024-06-13', 1),
(118, 'Esperando a nota fiscal', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 1),
(122, 'Finalizada', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `container`
--

DROP TABLE IF EXISTS `container`;
CREATE TABLE IF NOT EXISTS `container` (
  `id_container` int NOT NULL AUTO_INCREMENT,
  `cliente` varchar(255) NOT NULL,
  `placa` varchar(30) NOT NULL,
  `container` varchar(30) NOT NULL,
  `navio` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `lacre` varchar(30) NOT NULL,
  `lacre SIF` varchar(30) DEFAULT NULL,
  `nome_motorista` varchar(255) DEFAULT NULL,
  `NOnu` varchar(30) DEFAULT NULL,
  `Temperatura` int DEFAULT NULL,
  `IMO` varchar(30) NOT NULL,
  `turma_id` int NOT NULL,
  `situacao` char(20) NOT NULL,
  PRIMARY KEY (`id_container`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `container`
--

INSERT INTO `container` (`id_container`, `cliente`, `placa`, `container`, `navio`, `tipo`, `lacre`, `lacre SIF`, `nome_motorista`, `NOnu`, `Temperatura`, `IMO`, `turma_id`, `situacao`) VALUES
(15, 'Hnerique', '3423', '3443', '34', '34', '3432', '0', 'Luan', '0', 26, '0', 3, 'enviado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `docas`
--

DROP TABLE IF EXISTS `docas`;
CREATE TABLE IF NOT EXISTS `docas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_doca` int NOT NULL,
  `id_carga` int NOT NULL,
  `id_aluno` int NOT NULL,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_docas_aluno` (`id_aluno`),
  KEY `FK_docas_turma` (`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_doca` int NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `id_doca`, `nome_produto`, `quantidade_enviada`, `posicao`, `id_turma`) VALUES
(33, 1, 'Teclado', 20, 'A1', 1),
(34, 1, 'Mouse', 30, 'A1', 1),
(35, 1, 'Motor', 15, 'A1', 1),
(36, 1, 'Óleo Diesel', 30, 'A1', 1),
(37, 1, 'Teclado', 5, 'A1', 3),
(38, 1, 'Mouse', 5, 'A1', 3),
(39, 1, 'Teclado', 10, 'A1', 2),
(40, 1, 'Mouse', 15, 'A1', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_doca` int NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_carga` int NOT NULL,
  `id_aluno` int NOT NULL,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=292 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota_fiscal_criada`
--

DROP TABLE IF EXISTS `nota_fiscal_criada`;
CREATE TABLE IF NOT EXISTS `nota_fiscal_criada` (
  `id_notafiscal` int NOT NULL AUTO_INCREMENT,
  `id_atividade` int NOT NULL,
  `id_turma` int NOT NULL,
  `data_hora_envio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_notafiscal`),
  KEY `id_atividade` (`id_atividade`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `nota_fiscal_criada`
--

INSERT INTO `nota_fiscal_criada` (`id_notafiscal`, `id_atividade`, `id_turma`, `data_hora_envio`) VALUES
(95, 104, 3, '2024-06-12 08:48:37'),
(96, 105, 1, '2024-06-13 08:48:57'),
(97, 106, 1, '2024-06-13 08:49:20'),
(98, 107, 1, '2024-06-13 08:53:14'),
(99, 108, 1, '2024-06-13 08:53:26'),
(100, 109, 1, '2024-06-13 08:53:43'),
(101, 110, 1, '2024-06-13 08:56:41'),
(102, 111, 1, '2024-06-13 08:57:04'),
(103, 112, 1, '2024-06-13 08:57:11'),
(104, 113, 1, '2024-06-13 08:58:03'),
(105, 114, 1, '2024-06-13 08:58:24'),
(106, 115, 1, '2024-06-13 09:02:50'),
(107, 116, 1, '2024-06-13 09:03:03'),
(108, 117, 1, '2024-06-13 09:07:55'),
(109, 118, 1, '2024-06-13 09:09:15'),
(113, 122, 2, '2024-06-13 11:21:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pegado`
--

DROP TABLE IF EXISTS `pegado`;
CREATE TABLE IF NOT EXISTS `pegado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_doca` int NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_carga` int NOT NULL,
  `id_aluno` int NOT NULL,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=257 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(60) NOT NULL,
  `preco` float NOT NULL,
  `nome_produto_normalizado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `nome_produto_normalizado`) VALUES
(1, 'Teclado', 15, 'Teclado'),
(2, 'Mouse', 8, 'Mouse');

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
(1, 'teste', 'teste', -1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacao`
--

DROP TABLE IF EXISTS `solicitacao`;
CREATE TABLE IF NOT EXISTS `solicitacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `produto` varchar(255) NOT NULL,
  `quantidade` int NOT NULL,
  `produto2` varchar(255) DEFAULT NULL,
  `quantidade2` int DEFAULT NULL,
  `produto3` varchar(255) DEFAULT NULL,
  `quantidade3` int DEFAULT NULL,
  `produto4` varchar(255) DEFAULT NULL,
  `quantidade4` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id`, `id_pedido`, `produto`, `quantidade`, `produto2`, `quantidade2`, `produto3`, `quantidade3`, `produto4`, `quantidade4`) VALUES
(1, 3, 'tesoura', 5, '', 0, '', 0, '', 0),
(2, 6, 'tesoura', 5, 'Mouse', 5, '', 0, '', 0);

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
(-1),
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vistoriado`
--

DROP TABLE IF EXISTS `vistoriado`;
CREATE TABLE IF NOT EXISTS `vistoriado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `situacao` varchar(30) NOT NULL,
  `npedido` varchar(30) NOT NULL,
  `Empresa` varchar(30) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `Telefone` varchar(30) NOT NULL,
  `CEP` varchar(30) NOT NULL,
  `produto1` varchar(30) NOT NULL,
  `produto2` varchar(30) DEFAULT '',
  `produto3` varchar(30) DEFAULT '',
  `produto4` varchar(30) DEFAULT '',
  `unidade1` varchar(30) NOT NULL,
  `unidade2` varchar(30) DEFAULT '0',
  `unidade3` varchar(30) DEFAULT '0',
  `unidade4` varchar(30) DEFAULT '0',
  `quantidade1` int NOT NULL,
  `quantidade2` int DEFAULT '0',
  `quantidade3` int DEFAULT '0',
  `quantidade4` int DEFAULT '0',
  `valor1` decimal(10,2) NOT NULL,
  `valor2` decimal(10,2) DEFAULT '0.00',
  `valor3` decimal(10,2) DEFAULT '0.00',
  `valor4` decimal(10,2) DEFAULT '0.00',
  `ncm1` int NOT NULL,
  `ncm2` int DEFAULT '0',
  `ncm3` int DEFAULT '0',
  `ncm4` int DEFAULT '0',
  `cst1` int NOT NULL,
  `cst2` int DEFAULT '0',
  `cst3` int DEFAULT '0',
  `cst4` int DEFAULT '0',
  `cfop1` int NOT NULL,
  `cfop2` int DEFAULT '0',
  `cfop3` int DEFAULT '0',
  `cfop4` int DEFAULT '0',
  `data_pedido` date NOT NULL,
  `data_entrega` date NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `vistoriado`
--

INSERT INTO `vistoriado` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(122, 'Vistoriado', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 0, 0, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 2);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Restrições para tabelas `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `FK_carga_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Restrições para tabelas `container`
--
ALTER TABLE `container`
  ADD CONSTRAINT `container_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Restrições para tabelas `docas`
--
ALTER TABLE `docas`
  ADD CONSTRAINT `FK_docas_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `FK_docas_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`);

--
-- Restrições para tabelas `nota_fiscal_criada`
--
ALTER TABLE `nota_fiscal_criada`
  ADD CONSTRAINT `nota_fiscal_criada_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `carga` (`id`),
  ADD CONSTRAINT `nota_fiscal_criada_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`);

--
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
