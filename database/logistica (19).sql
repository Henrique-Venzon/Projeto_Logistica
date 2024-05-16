SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `logistica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `logistica`;
DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `armazem_limite`;
CREATE TABLE IF NOT EXISTS `armazem_limite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantidade_atual` int NOT NULL,
  `limite_maximo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `atividade_turma`;
CREATE TABLE IF NOT EXISTS `atividade_turma` (
  `id_atividade` int NOT NULL,
  `id_turma` int NOT NULL,
  `data_hora_envio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_atividade`,`id_turma`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `nota_fiscal_criadas`;
CREATE TABLE IF NOT EXISTS `nota_fiscal_criadas` (
  `id_atividade` int NOT NULL,
  `id_turma` int NOT NULL,
  `data_hora_envio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_atividade`,`id_turma`),
  KEY `id_turma` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
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
INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `UN`, `Quantidade`, `turma_id`) VALUES
(1, 'Tesoura', 5.00, 'UN', 0, NULL);
DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(65) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `professor` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'teste', 'teste', 670);
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=671 DEFAULT CHARSET=latin1;
INSERT INTO `turma` (`id`) VALUES
(1),
(670);
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);
ALTER TABLE `atividade_turma`
  ADD CONSTRAINT `atividade_turma_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `transporte` (`id`),
  ADD CONSTRAINT `atividade_turma_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`);
ALTER TABLE `nota_fiscal_criadas`
  ADD CONSTRAINT `nota_fiscal_criadas_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `transporte` (`id`),
  ADD CONSTRAINT `nota_fiscal_criadas_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`);
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);
COMMIT;
