-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27/05/2024 às 23:22
-- Versão do servidor: 8.2.0
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
) ENGINE=InnoDB AUTO_INCREMENT=351 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'Professor', 'Professor', -1),
(2, 'root.Att', '6nUJ', 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade_turma`
--

DROP TABLE IF EXISTS `atividade_turma`;
CREATE TABLE IF NOT EXISTS `atividade_turma` (
  `id_atividade` int NOT NULL,
  `id_turma` int NOT NULL,
  `data_hora_envio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_atividade`,`id_turma`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `carga`
--

INSERT INTO `carga` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `turma_id`) VALUES
(43, 'Vistoriado', '1234', 'Portonave', 'Matheus Yan', '4739406838', '88370904', 'Teclado', 'Mouse', 'ablublé', 'Ronaldo', 'UN', 'UN', 'UN', 'UN', 10, 15, 9, 11, 15.00, 8.00, 2.00, 5.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `container`
--

INSERT INTO `container` (`id_container`, `cliente`, `placa`, `container`, `navio`, `tipo`, `lacre`, `lacre SIF`, `nome_motorista`, `NOnu`, `Temperatura`, `IMO`, `turma_id`, `situacao`) VALUES
(3, 'rafael', '231QAC', '2231', 'KL2332', '22G1', 'ty223At', '41231', 'Matheus Yan dos Reis', '2546', 23, '1', 2, 'enviado'),
(4, 'Matheus Yand ', '231QAC', '2231', 'KL2332', '22G1', 'ty223At', '41231', 'Matheus Yan dos Reis', '2546', 23, '1', 1, 'enviado'),
(5, '', '231QAC', '2231', 'KL2332', '22G1', 'ty223At', '41231', 'Matheus Yan dos Reis', '2546', 23, 'NULL', 1, 'enviado');

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `docas`
--

INSERT INTO `docas` (`id`, `id_doca`, `id_carga`, `id_aluno`, `id_turma`) VALUES
(22, 1, 43, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `movimentacao`
--

INSERT INTO `movimentacao` (`id`, `id_doca`, `nome_produto`, `quantidade_enviada`, `posicao`, `id_carga`, `id_aluno`, `id_turma`) VALUES
(154, 1, 'Teclado', 3, 'a1', 43, 1, 1),
(155, 1, 'Mouse', 3, 'a1', 43, 1, 1),
(153, 1, 'Teclado', 3, 'a1', 43, 1, 1),
(152, 1, 'Teclado', 3, 'a1', 43, 1, 1),
(151, 1, 'Teclado', 3, 'a1', 43, 1, 1),
(156, 1, 'Teclado', 3, 'a1', 43, 1, 1),
(157, 1, 'Mouse', 3, 'a1', 43, 1, 1),
(158, 1, 'Teclado', 3, 'a1', 43, 1, 1),
(159, 1, 'Mouse', 3, 'a1', 43, 1, 1),
(160, 1, 'Teclado', 3, 'a1', 43, 1, 1),
(161, 1, 'Mouse', 3, 'a1', 43, 1, 1),
(162, 1, 'ablublé', 3, 'a1', 43, 1, 1),
(163, 1, 'Ronaldo', 3, 'a1', 43, 1, 1),
(164, 1, 'Teclado', 3, 'a1', 43, 1, 1),
(165, 1, 'Mouse', 3, 'a1', 43, 1, 1),
(166, 1, 'ablublé', 3, 'a1', 43, 1, 1),
(167, 1, 'Ronaldo', 3, 'a1', 43, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `nota_fiscal_criada`
--

INSERT INTO `nota_fiscal_criada` (`id_notafiscal`, `id_atividade`, `id_turma`, `data_hora_envio`) VALUES
(34, 43, 1, '2024-05-27 19:58:39');

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
(1, 'teste', 'teste', -1);

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
(2);

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
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `vistoriado`
--

INSERT INTO `vistoriado` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `turma_id`) VALUES
(43, 'Vistoriado', '1234', 'Portonave', 'Matheus Yan', '4739406838', '88370904', 'Teclado', 'Mouse', 'ablublé', 'Ronaldo', 'UN', 'UN', 'UN', 'UN', 7, 12, 6, 8, 15.00, 8.00, 2.00, 5.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

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
