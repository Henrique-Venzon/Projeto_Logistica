-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09/07/2024 às 10:34
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
-- Banco de dados: `matrei89_logistica`
--
CREATE DATABASE IF NOT EXISTS `matrei89_logistica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `matrei89_logistica`;

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
) ENGINE=InnoDB AUTO_INCREMENT=663 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'PROFESSOR', 'PROFESSOR@SESISENAI2024', -1),
(2, 'root.Att', 'Hu97', 1),
(12, 'HelloWorldJuniorteste', '4RTZ', 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `carga`
--

INSERT INTO `carga` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(193, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(194, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(195, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(196, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(197, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(198, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(200, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-27', '2024-06-28', 1),
(201, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(202, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(203, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(204, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(205, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(206, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 2),
(207, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 2),
(208, 'enviado', '345644', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Mouse', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 8.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(209, 'enviado', '11111', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-03', '2024-07-04', 1),
(210, 'enviado', '1213123', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-03', '2024-07-04', 1),
(211, 'Finalizada', '665', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 4, 5, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-03', '2024-07-04', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE IF NOT EXISTS `estoque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome_produto`, `quantidade_enviada`, `posicao`, `id_turma`) VALUES
(69, 'Teclado', 17, 'A1', 2),
(70, 'Teclado', 2, 'A2', 2),
(71, 'Teclado', 1, 'A3', 2),
(72, 'Teclado', 103, 'A1', 1),
(73, 'Mouse', 65, 'A1', 1),
(74, 'Óleo Diesel', 600, 'A1', 1),
(75, 'Camisa', 50, 'A1', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=384 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota_fiscal`
--

DROP TABLE IF EXISTS `nota_fiscal`;
CREATE TABLE IF NOT EXISTS `nota_fiscal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `entrada_saida` date NOT NULL,
  `chave_acesso` varchar(255) NOT NULL,
  `informacao_interna` varchar(255) DEFAULT NULL,
  `nome_razao_social` varchar(255) NOT NULL,
  `sede` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `protocolo_autorizacao` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `inscricao_estadual_subs_tributaria` varchar(255) DEFAULT NULL,
  `natureza_operacao` varchar(255) NOT NULL,
  `inscricao_estadual` varchar(255) DEFAULT NULL,
  `nome_razao_social_remetente` varchar(255) NOT NULL,
  `cnpj_cpf_remetente` varchar(255) NOT NULL,
  `cep_remetente` varchar(255) NOT NULL,
  `telefone_remetente` varchar(255) NOT NULL,
  `inscricao_estadual_remetente` varchar(255) DEFAULT NULL,
  `data_emissao` date NOT NULL,
  `data_entrada_saida` date NOT NULL,
  `hora_saida` time NOT NULL,
  `fatura_duplicata` varchar(255) NOT NULL,
  `forma_pagamento` varchar(255) NOT NULL,
  `base_calculo_icms` decimal(10,2) NOT NULL,
  `valor_icms` decimal(10,2) NOT NULL,
  `base_calculo_icms_st` decimal(10,2) DEFAULT NULL,
  `valor_icms_substituicao` decimal(10,2) DEFAULT NULL,
  `total_produtos` decimal(10,2) NOT NULL,
  `valor_frete` decimal(10,2) DEFAULT NULL,
  `valor_seguro` decimal(10,2) DEFAULT NULL,
  `desconto` decimal(10,2) DEFAULT NULL,
  `outras_despesas` decimal(10,2) DEFAULT NULL,
  `valor_ipi` decimal(10,2) DEFAULT NULL,
  `valor_total_nota` decimal(10,2) NOT NULL,
  `nome_razao_social_transportador` varchar(255) DEFAULT NULL,
  `frete_por_conta` varchar(255) DEFAULT NULL,
  `codigo_antt` varchar(255) DEFAULT NULL,
  `placa_veiculo` varchar(255) DEFAULT NULL,
  `cnpj_cpf_transportador` varchar(255) DEFAULT NULL,
  `inscricao_estadual_transportador` varchar(255) DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `numeracao` varchar(255) DEFAULT NULL,
  `peso_bruto` decimal(10,2) DEFAULT NULL,
  `peso_liquido` decimal(10,2) DEFAULT NULL,
  `nome_produto1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ncm_sh1` varchar(255) NOT NULL,
  `cst1` varchar(255) NOT NULL,
  `cfop1` varchar(255) NOT NULL,
  `unid1` varchar(255) NOT NULL,
  `quantidade_prod1` decimal(10,2) NOT NULL,
  `valor_unitario1` decimal(10,2) NOT NULL,
  `valor_total_prod1` decimal(10,2) NOT NULL,
  `nome_produto2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ncm_sh2` varchar(255) DEFAULT NULL,
  `cst2` varchar(255) DEFAULT NULL,
  `cfop2` varchar(255) DEFAULT NULL,
  `unid2` varchar(255) DEFAULT NULL,
  `quantidade_prod2` decimal(10,2) DEFAULT NULL,
  `valor_unitario2` decimal(10,2) DEFAULT NULL,
  `valor_total_prod2` decimal(10,2) DEFAULT NULL,
  `nome_produto3` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ncm_sh3` varchar(255) DEFAULT NULL,
  `cst3` varchar(255) DEFAULT NULL,
  `cfop3` varchar(255) DEFAULT NULL,
  `unid3` varchar(255) DEFAULT NULL,
  `quantidade_prod3` decimal(10,2) DEFAULT NULL,
  `valor_unitario3` decimal(10,2) DEFAULT NULL,
  `valor_total_prod3` decimal(10,2) DEFAULT NULL,
  `nome_produto4` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ncm_sh4` varchar(255) DEFAULT NULL,
  `cst4` varchar(255) DEFAULT NULL,
  `cfop4` varchar(255) DEFAULT NULL,
  `unid4` varchar(255) DEFAULT NULL,
  `quantidade_prod4` decimal(10,2) DEFAULT NULL,
  `valor_unitario4` decimal(10,2) DEFAULT NULL,
  `valor_total_prod4` decimal(10,2) DEFAULT NULL,
  `inscricao_municipal` varchar(255) DEFAULT NULL,
  `valor_total_servicos` decimal(10,2) DEFAULT NULL,
  `base_calculo_issqn` decimal(10,2) DEFAULT NULL,
  `id_turma` int NOT NULL,
  `id_atividade` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `nota_fiscal`
--

INSERT INTO `nota_fiscal` (`id`, `numero`, `serie`, `entrada_saida`, `chave_acesso`, `informacao_interna`, `nome_razao_social`, `sede`, `telefone`, `cep`, `protocolo_autorizacao`, `cnpj`, `inscricao_estadual_subs_tributaria`, `natureza_operacao`, `inscricao_estadual`, `nome_razao_social_remetente`, `cnpj_cpf_remetente`, `cep_remetente`, `telefone_remetente`, `inscricao_estadual_remetente`, `data_emissao`, `data_entrada_saida`, `hora_saida`, `fatura_duplicata`, `forma_pagamento`, `base_calculo_icms`, `valor_icms`, `base_calculo_icms_st`, `valor_icms_substituicao`, `total_produtos`, `valor_frete`, `valor_seguro`, `desconto`, `outras_despesas`, `valor_ipi`, `valor_total_nota`, `nome_razao_social_transportador`, `frete_por_conta`, `codigo_antt`, `placa_veiculo`, `cnpj_cpf_transportador`, `inscricao_estadual_transportador`, `quantidade`, `especie`, `marca`, `numeracao`, `peso_bruto`, `peso_liquido`, `nome_produto1`, `ncm_sh1`, `cst1`, `cfop1`, `unid1`, `quantidade_prod1`, `valor_unitario1`, `valor_total_prod1`, `nome_produto2`, `ncm_sh2`, `cst2`, `cfop2`, `unid2`, `quantidade_prod2`, `valor_unitario2`, `valor_total_prod2`, `nome_produto3`, `ncm_sh3`, `cst3`, `cfop3`, `unid3`, `quantidade_prod3`, `valor_unitario3`, `valor_total_prod3`, `nome_produto4`, `ncm_sh4`, `cst4`, `cfop4`, `unid4`, `quantidade_prod4`, `valor_unitario4`, `valor_total_prod4`, `inscricao_municipal`, `valor_total_servicos`, `base_calculo_issqn`, `id_turma`, `id_atividade`) VALUES
(2, '1213123', '4', '2024-07-03', '55667788990011223344556677889', 'Informação interna JKL', 'Empresa JKL', 'Travessa JKL, 321', '(51) 98765-4321', '45678-901', '654987', '76.543.210/0001-76', '6543210987', 'Exportação', '6543210987', 'Empresa JKL', '98.765.432/0001-98', '89012-345', '(61) 99876-5432', '210987654', '2024-10-10', '2024-10-11', '17:00:00', 'Fatura 4567', 'Cheque', 8000.00, 720.00, 7000.00, 1050.00, 300000.00, 3500.00, 400000.00, 3.00, 3500.00, 1000.00, 707000.00, 'Transportadora JKL', 'Destinatário', '3216540', 'JKL-1234', '76.543.210/0001-76', '6543210987', 2500, 'Palete', 'Marca JKL', '654987', 4.00, 4.00, 'Teclado', '0', '0', '0', 'UN', 5.00, 15.00, 75.00, '', '', '', '', '', 0.00, 0.00, 0.00, '', '', '', '', '', 0.00, 0.00, 0.00, '', '', '', '', '', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 0),
(3, '665', '2', '2024-07-03', '998877665544332211009988776655', 'Informação interna DEF', 'Empresa DEF', 'Rua DEF, 456', '(21) 91234-5678', '12345-000', '654321', '87.654.321/0001-87', '0987654321', 'Compra', '0987654321', 'Empresa DEF', '98.765.432/0001-87', '87654-321', '(31) 99876-5432', '876543210', '2024-07-01', '2024-07-02', '10:00:00', 'Fatura 1234', 'Dinheiro', 6000.00, 540.00, 5000.00, 750.00, 200000.00, 4000.00, 300000.00, 23.00, 3500.00, 1000.00, 511500.00, 'Transportadora DEF', 'Destinatário', '8765432', 'DEF-9876', '87.654.321/0001-87', '8765432100', 800, 'Caixa', 'Marca DEF', '654321', 2.00, 1.80, 'Teclado', '0', '0', '0', 'UN', 4.00, 15.00, 60.00, 'Mouse', '0', '0', '0', 'UN', 5.00, 8.00, 40.00, '', '0', '0', '0', ' ', 0.00, 0.00, 0.00, '', '0', '0', '0', ' ', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 211);

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
) ENGINE=InnoDB AUTO_INCREMENT=349 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `picking`
--

DROP TABLE IF EXISTS `picking`;
CREATE TABLE IF NOT EXISTS `picking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `quantidade_solicitada` int NOT NULL,
  `produto` varchar(255) NOT NULL,
  `posicao` varchar(255) NOT NULL,
  `quantidade` int NOT NULL,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_picking` (`id_pedido`,`produto`,`posicao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `picking`
--

INSERT INTO `picking` (`id`, `id_pedido`, `quantidade_solicitada`, `produto`, `posicao`, `quantidade`, `id_turma`) VALUES
(1, 11, 2, 'Teclado', 'A1', 2, 1),
(2, 15, 1, 'Teclado', 'A1', 1, 1),
(3, 15, 1, 'Mouse', 'A2', 1, 1),
(4, 15, 1, 'Óleo Diesel', 'A3', 1, 1),
(5, 15, 1, 'Camisa', 'A4', 1, 1),
(6, 17, 1, 'Teclado', 'D4', 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `nome_produto_normalizado`) VALUES
(1, 'Teclado', 15, 'Teclado'),
(2, 'Mouse', 8, 'Mouse'),
(3, 'Motor', 2800, 'Motor'),
(4, 'Óleo Diesel', 2.4, 'Oleo Diesel'),
(5, 'Camisa', 20, 'Camisa'),
(6, 'Moletom', 24, 'Moletom'),
(7, 'Brinquedo', 24.99, 'Brinquedo'),
(8, 'Novelo de lã', 15, 'Novelo de la'),
(9, 'carrinho', 7, 'carrinho'),
(10, 'Carrinho de controle remoto.', 50, 'Carrinho de controle remoto.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(65) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
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
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id`, `id_pedido`, `produto`, `quantidade`, `produto2`, `quantidade2`, `produto3`, `quantidade3`, `produto4`, `quantidade4`, `id_turma`) VALUES
(18, 213, 'Teclado', 1, '', 0, '', 0, '', 0, 1);

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
  `data_pedido` date NOT NULL,
  `data_entrega` date NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `vistoriado`
--

INSERT INTO `vistoriado` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(193, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(194, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(195, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(196, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(197, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(198, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, 15.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(211, 'Vistoriado', '665', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 0, 0, 0, 0, 15.00, 8.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-03', '2024-07-04', 1);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`F
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
-- Restrições para tabelas `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
