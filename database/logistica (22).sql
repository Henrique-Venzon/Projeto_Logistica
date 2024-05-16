-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16/05/2024 às 15:24
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
) ENGINE=InnoDB AUTO_INCREMENT=329 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'root.Att', 'root', 1),
(12, 'teste', 'teste', 1),
(94, 'Aluno 1', 'xSTt', 2),
(95, 'Aluno 2', 'blFm', 2),
(179, 'Aluno 1', '9QhR', 3),
(180, 'Aluno 2', 'Sb6P', 3),
(181, 'Aluno 3', 'AWOf', 3),
(182, 'Aluno 4', 'Z8df', 3),
(183, 'Aluno 5', 'tSBe', 3),
(184, 'Aluno 6', 'HSzO', 3),
(185, 'Aluno 7', 'f9DQ', 3),
(186, 'Aluno 8', 'IiWD', 3),
(187, 'Aluno 9', 'blJR', 3),
(188, 'Aluno 10', 'WAIh', 3),
(189, 'Aluno 11', 'mq8A', 3),
(190, 'Aluno 12', 'VwBM', 3),
(191, 'Aluno 13', 'pMD7', 3),
(192, 'Aluno 14', 'fFIH', 3),
(193, 'Aluno 15', 'ChQk', 3),
(194, 'Aluno 16', '9j2G', 3),
(195, 'Aluno 17', 'BKlQ', 3),
(196, 'Aluno 18', 'jFvw', 3),
(197, 'Aluno 19', '8elW', 3),
(198, 'Aluno 20', 'Mk7U', 3),
(199, 'Aluno 21', 'CDH4', 3),
(200, 'Aluno 22', 'CgEM', 3),
(201, 'Aluno 23', 'XZd0', 3),
(202, 'Aluno 24', 'mthJ', 3),
(203, 'Aluno 25', 'lhF7', 3),
(204, 'Aluno 26', 'sV3y', 3),
(205, 'Aluno 27', 'tnwq', 3),
(206, 'Aluno 28', 'OgFA', 3),
(207, 'Aluno 29', 'qj03', 3),
(208, 'Aluno 30', 'SNUb', 3),
(209, 'Aluno 31', 'Ctp0', 3),
(210, 'Aluno 32', 'CkJD', 3),
(211, 'Aluno 33', 'oCQn', 3),
(212, 'Aluno 34', 'mbyM', 3),
(213, 'Aluno 35', 'xF0B', 3),
(214, 'Aluno 36', '7vCc', 3),
(215, 'Aluno 37', 'B4iV', 3),
(216, 'Aluno 38', '6rLJ', 3),
(217, 'Aluno 39', 'x713', 3),
(218, 'Aluno 40', 'Pg6b', 3),
(291, 'Aluno 1', 'wuoP', 45),
(292, 'Aluno 2', 'iL9G', 45),
(293, 'Aluno 3', 'wpqi', 45),
(294, 'Aluno 4', 'DRoP', 45),
(295, 'Aluno 5', 't4Pe', 45),
(296, 'Aluno 6', 'poCF', 45),
(297, 'Aluno 7', 'Ufa3', 45),
(298, 'Aluno 8', '79sA', 45),
(299, 'Aluno 9', 'rvxH', 45),
(300, 'Aluno 10', '5QSw', 45),
(301, 'Aluno 11', 'BSje', 45),
(302, 'Aluno 12', '4uD0', 45),
(303, 'Aluno 13', 'It52', 45),
(304, 'Aluno 14', '2tBd', 45),
(305, 'Aluno 15', 'GKFe', 45),
(306, 'Aluno 16', 'IxKa', 45),
(307, 'Aluno 17', 'GoBv', 45),
(308, 'Aluno 18', '0GYT', 45),
(309, 'Aluno 19', 'hjIc', 45),
(310, 'Aluno 20', 'zdph', 45),
(311, 'Aluno 21', 'egT5', 45),
(312, 'Aluno 22', 'yZdx', 45),
(313, 'Aluno 23', 'rNOh', 45),
(314, 'Aluno 24', 'KnkL', 45),
(315, 'Aluno 25', 'T8lF', 45),
(316, 'Aluno 26', 'UftE', 45),
(317, 'Aluno 27', 'b7nV', 45),
(318, 'Aluno 28', 'cu2A', 45),
(319, 'Aluno 29', 'yxVq', 45),
(320, 'Aluno 30', 'YsoM', 45),
(321, 'Aluno 31', '5G6t', 45),
(322, 'Aluno 32', 'daHr', 45),
(323, 'Aluno 33', 'BI7m', 45),
(324, 'Aluno 34', 'hLPe', 45),
(325, 'Aluno 35', 'A5YP', 45),
(326, 'Aluno 36', 'Xutd', 45),
(327, 'Aluno 37', '3f6D', 45),
(328, 'Aluno 38', 'qhQE', 45);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `nota_fiscal_criada`
--

INSERT INTO `nota_fiscal_criada` (`id_notafiscal`, `id_atividade`, `id_turma`, `data_hora_envio`) VALUES
(8, 13, 1, '2024-05-16 10:51:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `transporte`
--

INSERT INTO `transporte` (`id`, `placa`, `NomeMotorista`, `container`, `navio`, `tipo`, `lacre`, `LacreSif`, `IMD`, `NOnu`, `situacao`, `npedido`, `temperatura`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `turma_id`) VALUES
(13, '231QAC', 'Matheus Yan dos Reis', '2231', 'KL2332', '22G1', 'ty223At', 41231, '1', 2546, 'enviado', '432', 23, 'a', 'a', '47996814714', '88380000', 'Guilherme Darlan da Cunha', '', '', '', 'UN', ' ', ' ', ' ', 321, 0, 0, 0, 23.00, 0.00, 0.00, 0.00, 412, 0, 0, 0, 4123, 0, 0, 0, 4123, 0, 0, 0, 3),
(14, '231QAC', 'Matheus Yan dos Reis', '2231', 'KL2332', '22G1', 'ty223At', 41231, '1', 2546, 'enviado', '432', 23, 'a', 'a', '47996814714', '88380000', 'Guilherme Darlan da Cunha', '', '', '', 'UN', ' ', ' ', ' ', 321, 0, 0, 0, 23.00, 0.00, 0.00, 0.00, 412, 0, 0, 0, 4123, 0, 0, 0, 4123, 0, 0, 0, 2),
(17, '231QAC', 'Matheus Yan dos Reis', '2231', 'KL2332', '22G1', 'ty223At', 41231, '1', 2546, 'fechado', '4123', 23, 'a', 'a', '47996814714', '88380000', 'Guilherme Darlan da Cunha', '', '', '', 'UN', 'FD', ' ', ' ', 321, 0, 0, 0, 23.00, 0.00, 0.00, 0.00, 412, 0, 0, 0, 4123, 0, 0, 0, 4123, 0, 0, 0, 45);

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
(2),
(3),
(45);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Restrições para tabelas `nota_fiscal_criada`
--
ALTER TABLE `nota_fiscal_criada`
  ADD CONSTRAINT `nota_fiscal_criada_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `transporte` (`id`),
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
