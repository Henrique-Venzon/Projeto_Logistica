-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10/08/2024 às 06:02
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

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
(2, 'root.Att', 'YfAz', 1),
(12, 'Matheus', 'Teste', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `atividade_concluida_expedicao`
--

DROP TABLE IF EXISTS `atividade_concluida_expedicao`;
CREATE TABLE IF NOT EXISTS `atividade_concluida_expedicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade` int NOT NULL,
  `doca` int NOT NULL,
  `data_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `atividade_concluida_expedicao`
--

INSERT INTO `atividade_concluida_expedicao` (`id`, `id_pedido`, `nome_produto`, `quantidade`, `doca`, `data_criacao`, `id_turma`) VALUES
(1, 20, 'Leitor De Código De Barra', 2, 1, '2024-08-10 05:58:33', 1),
(2, 20, 'Teclado', 2, 1, '2024-08-10 05:58:33', 1),
(3, 20, 'Leitor De Código De Barra', 2, 1, '2024-08-10 05:58:52', 1),
(4, 20, 'Teclado', 2, 1, '2024-08-10 05:58:52', 1),
(5, 20, 'Leitor De Código De Barra', 2, 1, '2024-08-10 05:59:46', 1),
(6, 20, 'Teclado', 2, 1, '2024-08-10 05:59:46', 1),
(7, 10, 'Leitor De Código De Barra', 5, 1, '2024-08-10 05:59:48', 1),
(8, 9, 'Leitor De Código De Barra', 5, 1, '2024-08-10 05:59:50', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cancelamentos_pedidos`
--

DROP TABLE IF EXISTS `cancelamentos_pedidos`;
CREATE TABLE IF NOT EXISTS `cancelamentos_pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_carga` int DEFAULT NULL,
  `motivo` text,
  `data_cancelamento` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_turma` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cancelamentos_pedidos`
--

INSERT INTO `cancelamentos_pedidos` (`id`, `id_carga`, `motivo`, `data_cancelamento`, `id_turma`) VALUES
(2, 9, 'algo', '2024-08-01 14:00:44', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cancelamentos_solicitacao`
--

DROP TABLE IF EXISTS `cancelamentos_solicitacao`;
CREATE TABLE IF NOT EXISTS `cancelamentos_solicitacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_solicitacao` int DEFAULT NULL,
  `produto` varchar(255) DEFAULT NULL,
  `quantidade_cancelada` int DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `data_cancelamento` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cancelamentos_solicitacao`
--

INSERT INTO `cancelamentos_solicitacao` (`id`, `id_solicitacao`, `produto`, `quantidade_cancelada`, `motivo`, `data_cancelamento`, `id_turma`) VALUES
(1, 2, 'Leitor De Código De Barra', 1, 'Sem Estoque.', '2024-07-23 03:54:29', 1),
(2, 4, 'Leitor De Código De Barra', 1, 'Sem Estoque.', '2024-07-23 04:07:19', 1),
(3, 7, 'Leitor De Código De Barra', 213, 'Sem Estoque.', '2024-07-23 04:11:45', 1),
(4, 15, 'Leitor De Código De Barra', 1, 'Seilakj', '2024-08-01 11:31:56', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `carga`
--

INSERT INTO `carga` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(19, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, 30.00, 0.00, 0.00, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-08-10', '2024-08-11', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `estoque`
--

INSERT INTO `estoque` (`id`, `nome_produto`, `quantidade_enviada`, `posicao`, `id_turma`) VALUES
(1, 'Leitor De Código De Barra', 182, 'A1', 1),
(2, 'Teclado', 3, 'A1', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `expedicao`
--

DROP TABLE IF EXISTS `expedicao`;
CREATE TABLE IF NOT EXISTS `expedicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int DEFAULT NULL,
  `nome_produto` varchar(255) DEFAULT NULL,
  `quantidade_enviada` int DEFAULT NULL,
  `id_doca` int DEFAULT NULL,
  `id_turma` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `expedicao`
--

INSERT INTO `expedicao` (`id`, `id_pedido`, `nome_produto`, `quantidade_enviada`, `id_doca`, `id_turma`) VALUES
(1, 6, 'Leitor De Código De Barra', 5, 1, 1),
(4, 21, 'Leitor De Código De Barra', 2, 1, 1),
(5, 8, 'Leitor De Código De Barra', 5, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota_fiscal`
--

DROP TABLE IF EXISTS `nota_fiscal`;
CREATE TABLE IF NOT EXISTS `nota_fiscal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `entrada_saida` date NOT NULL,
  `chave_acesso` varchar(100) NOT NULL,
  `informacao_interna` text,
  `nome_razao_social` varchar(150) NOT NULL,
  `sede` varchar(150) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `protocolo_autorizacao` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `inscricao_estadual_subs_tributaria` varchar(50) DEFAULT NULL,
  `natureza_operacao` varchar(150) NOT NULL,
  `inscricao_estadual` varchar(50) DEFAULT NULL,
  `nome_razao_social_remetente` varchar(150) NOT NULL,
  `cnpj_cpf_remetente` varchar(20) NOT NULL,
  `cep_remetente` varchar(20) NOT NULL,
  `telefone_remetente` varchar(50) NOT NULL,
  `Empresa` text NOT NULL,
  `inscricao_estadual_remetente` varchar(50) DEFAULT NULL,
  `data_emissao` date NOT NULL,
  `data_entrada_saida` date NOT NULL,
  `hora_saida` time NOT NULL,
  `fatura_duplicata` varchar(100) NOT NULL,
  `forma_pagamento` varchar(100) NOT NULL,
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
  `nome_razao_social_transportador` varchar(150) DEFAULT NULL,
  `frete_por_conta` varchar(100) DEFAULT NULL,
  `codigo_antt` varchar(100) DEFAULT NULL,
  `placa_veiculo` varchar(100) DEFAULT NULL,
  `cnpj_cpf_transportador` varchar(20) DEFAULT NULL,
  `inscricao_estadual_transportador` varchar(50) DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `especie` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `numeracao` varchar(100) DEFAULT NULL,
  `peso_bruto` decimal(10,2) DEFAULT NULL,
  `peso_liquido` decimal(10,2) DEFAULT NULL,
  `nome_produto1` text NOT NULL,
  `ncm_sh1` varchar(100) NOT NULL,
  `cst1` varchar(100) NOT NULL,
  `cfop1` varchar(100) NOT NULL,
  `unid1` varchar(100) NOT NULL,
  `quantidade_prod1` decimal(10,2) NOT NULL,
  `valor_unitario1` decimal(10,2) NOT NULL,
  `valor_total_prod1` decimal(10,2) NOT NULL,
  `nome_produto2` text,
  `ncm_sh2` varchar(100) DEFAULT NULL,
  `cst2` varchar(100) DEFAULT NULL,
  `cfop2` varchar(100) DEFAULT NULL,
  `unid2` varchar(100) DEFAULT NULL,
  `quantidade_prod2` decimal(10,2) DEFAULT NULL,
  `valor_unitario2` decimal(10,2) DEFAULT NULL,
  `valor_total_prod2` decimal(10,2) DEFAULT NULL,
  `nome_produto3` text,
  `ncm_sh3` varchar(100) DEFAULT NULL,
  `cst3` varchar(100) DEFAULT NULL,
  `cfop3` varchar(100) DEFAULT NULL,
  `unid3` varchar(100) DEFAULT NULL,
  `quantidade_prod3` decimal(10,2) DEFAULT NULL,
  `valor_unitario3` decimal(10,2) DEFAULT NULL,
  `valor_total_prod3` decimal(10,2) DEFAULT NULL,
  `nome_produto4` text,
  `ncm_sh4` varchar(100) DEFAULT NULL,
  `cst4` varchar(100) DEFAULT NULL,
  `cfop4` varchar(100) DEFAULT NULL,
  `unid4` varchar(100) DEFAULT NULL,
  `quantidade_prod4` decimal(10,2) DEFAULT NULL,
  `valor_unitario4` decimal(10,2) DEFAULT NULL,
  `valor_total_prod4` decimal(10,2) DEFAULT NULL,
  `inscricao_municipal` varchar(100) DEFAULT NULL,
  `valor_total_servicos` decimal(10,2) DEFAULT NULL,
  `base_calculo_issqn` decimal(10,2) DEFAULT NULL,
  `id_turma` int NOT NULL,
  `id_atividade` int NOT NULL,
  `data_hora_pedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `situacao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `nota_fiscal`
--

INSERT INTO `nota_fiscal` (`id`, `numero`, `serie`, `entrada_saida`, `chave_acesso`, `informacao_interna`, `nome_razao_social`, `sede`, `telefone`, `cep`, `protocolo_autorizacao`, `cnpj`, `inscricao_estadual_subs_tributaria`, `natureza_operacao`, `inscricao_estadual`, `nome_razao_social_remetente`, `cnpj_cpf_remetente`, `cep_remetente`, `telefone_remetente`, `Empresa`, `inscricao_estadual_remetente`, `data_emissao`, `data_entrada_saida`, `hora_saida`, `fatura_duplicata`, `forma_pagamento`, `base_calculo_icms`, `valor_icms`, `base_calculo_icms_st`, `valor_icms_substituicao`, `total_produtos`, `valor_frete`, `valor_seguro`, `desconto`, `outras_despesas`, `valor_ipi`, `valor_total_nota`, `nome_razao_social_transportador`, `frete_por_conta`, `codigo_antt`, `placa_veiculo`, `cnpj_cpf_transportador`, `inscricao_estadual_transportador`, `quantidade`, `especie`, `marca`, `numeracao`, `peso_bruto`, `peso_liquido`, `nome_produto1`, `ncm_sh1`, `cst1`, `cfop1`, `unid1`, `quantidade_prod1`, `valor_unitario1`, `valor_total_prod1`, `nome_produto2`, `ncm_sh2`, `cst2`, `cfop2`, `unid2`, `quantidade_prod2`, `valor_unitario2`, `valor_total_prod2`, `nome_produto3`, `ncm_sh3`, `cst3`, `cfop3`, `unid3`, `quantidade_prod3`, `valor_unitario3`, `valor_total_prod3`, `nome_produto4`, `ncm_sh4`, `cst4`, `cfop4`, `unid4`, `quantidade_prod4`, `valor_unitario4`, `valor_total_prod4`, `inscricao_municipal`, `valor_total_servicos`, `base_calculo_issqn`, `id_turma`, `id_atividade`, `data_hora_pedido`, `situacao`) VALUES
(14, '1', '1', '2024-08-10', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Matheus Yan ', '12.345.678/0001-12', '88370904', '(11) 1234-5678', 'Portonave', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 17.00, 180.00, 1200.00, 216.00, 150.00, 50.00, 20.00, 30.00, 15.00, 50.00, 285.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 5, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, 'teclado', '0', '0', '0', 'UN', 5.00, 30.00, 150.00, '', '0', '0', '0', ' ', 0.00, 0.00, 0.00, '', '0', '0', '0', ' ', 0.00, 0.00, 0.00, 'teste', '0', '0', '0', ' ', 0.00, 0.00, 0.00, '0', 0.00, 0.00, 1, 19, '2024-08-10 05:48:43', 'Enviado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nota_fiscal_expedicao`
--

DROP TABLE IF EXISTS `nota_fiscal_expedicao`;
CREATE TABLE IF NOT EXISTS `nota_fiscal_expedicao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `entrada_saida` date NOT NULL,
  `chave_acesso` varchar(100) NOT NULL,
  `informacao_interna` text,
  `nome_razao_social` varchar(150) NOT NULL,
  `sede` varchar(150) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `protocolo_autorizacao` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `inscricao_estadual_subs_tributaria` varchar(50) DEFAULT NULL,
  `natureza_operacao` varchar(150) NOT NULL,
  `inscricao_estadual` varchar(50) DEFAULT NULL,
  `nome_razao_social_remetente` varchar(150) NOT NULL,
  `cnpj_cpf_remetente` varchar(20) NOT NULL,
  `cep_remetente` varchar(20) NOT NULL,
  `telefone_remetente` varchar(50) NOT NULL,
  `Empresa` text NOT NULL,
  `inscricao_estadual_remetente` varchar(50) DEFAULT NULL,
  `data_emissao` date NOT NULL,
  `data_entrada_saida` date NOT NULL,
  `hora_saida` time NOT NULL,
  `fatura_duplicata` varchar(100) NOT NULL,
  `forma_pagamento` varchar(100) NOT NULL,
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
  `nome_razao_social_transportador` varchar(150) DEFAULT NULL,
  `frete_por_conta` varchar(100) DEFAULT NULL,
  `codigo_antt` varchar(100) DEFAULT NULL,
  `placa_veiculo` varchar(100) DEFAULT NULL,
  `cnpj_cpf_transportador` varchar(20) DEFAULT NULL,
  `inscricao_estadual_transportador` varchar(50) DEFAULT NULL,
  `quantidade` int DEFAULT NULL,
  `especie` varchar(100) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `numeracao` varchar(100) DEFAULT NULL,
  `peso_bruto` decimal(10,2) DEFAULT NULL,
  `peso_liquido` decimal(10,2) DEFAULT NULL,
  `nome_produto1` text NOT NULL,
  `ncm_sh1` varchar(100) NOT NULL,
  `cst1` varchar(100) NOT NULL,
  `cfop1` varchar(100) NOT NULL,
  `unid1` varchar(100) NOT NULL,
  `quantidade_prod1` decimal(10,2) NOT NULL,
  `valor_unitario1` decimal(10,2) NOT NULL,
  `valor_total_prod1` decimal(10,2) NOT NULL,
  `nome_produto2` text,
  `ncm_sh2` varchar(100) DEFAULT NULL,
  `cst2` varchar(100) DEFAULT NULL,
  `cfop2` varchar(100) DEFAULT NULL,
  `unid2` varchar(100) DEFAULT NULL,
  `quantidade_prod2` decimal(10,2) DEFAULT NULL,
  `valor_unitario2` decimal(10,2) DEFAULT NULL,
  `valor_total_prod2` decimal(10,2) DEFAULT NULL,
  `nome_produto3` text,
  `ncm_sh3` varchar(100) DEFAULT NULL,
  `cst3` varchar(100) DEFAULT NULL,
  `cfop3` varchar(100) DEFAULT NULL,
  `unid3` varchar(100) DEFAULT NULL,
  `quantidade_prod3` decimal(10,2) DEFAULT NULL,
  `valor_unitario3` decimal(10,2) DEFAULT NULL,
  `valor_total_prod3` decimal(10,2) DEFAULT NULL,
  `nome_produto4` text,
  `ncm_sh4` varchar(100) DEFAULT NULL,
  `cst4` varchar(100) DEFAULT NULL,
  `cfop4` varchar(100) DEFAULT NULL,
  `unid4` varchar(100) DEFAULT NULL,
  `quantidade_prod4` decimal(10,2) DEFAULT NULL,
  `valor_unitario4` decimal(10,2) DEFAULT NULL,
  `valor_total_prod4` decimal(10,2) DEFAULT NULL,
  `inscricao_municipal` varchar(100) DEFAULT NULL,
  `valor_total_servicos` decimal(10,2) DEFAULT NULL,
  `base_calculo_issqn` decimal(10,2) DEFAULT NULL,
  `id_turma` int NOT NULL,
  `id_atividade` int NOT NULL,
  `data_hora_pedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `situacao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `nota_fiscal_expedicao`
--

INSERT INTO `nota_fiscal_expedicao` (`id`, `numero`, `serie`, `entrada_saida`, `chave_acesso`, `informacao_interna`, `nome_razao_social`, `sede`, `telefone`, `cep`, `protocolo_autorizacao`, `cnpj`, `inscricao_estadual_subs_tributaria`, `natureza_operacao`, `inscricao_estadual`, `nome_razao_social_remetente`, `cnpj_cpf_remetente`, `cep_remetente`, `telefone_remetente`, `Empresa`, `inscricao_estadual_remetente`, `data_emissao`, `data_entrada_saida`, `hora_saida`, `fatura_duplicata`, `forma_pagamento`, `base_calculo_icms`, `valor_icms`, `base_calculo_icms_st`, `valor_icms_substituicao`, `total_produtos`, `valor_frete`, `valor_seguro`, `desconto`, `outras_despesas`, `valor_ipi`, `valor_total_nota`, `nome_razao_social_transportador`, `frete_por_conta`, `codigo_antt`, `placa_veiculo`, `cnpj_cpf_transportador`, `inscricao_estadual_transportador`, `quantidade`, `especie`, `marca`, `numeracao`, `peso_bruto`, `peso_liquido`, `nome_produto1`, `ncm_sh1`, `cst1`, `cfop1`, `unid1`, `quantidade_prod1`, `valor_unitario1`, `valor_total_prod1`, `nome_produto2`, `ncm_sh2`, `cst2`, `cfop2`, `unid2`, `quantidade_prod2`, `valor_unitario2`, `valor_total_prod2`, `nome_produto3`, `ncm_sh3`, `cst3`, `cfop3`, `unid3`, `quantidade_prod3`, `valor_unitario3`, `valor_total_prod3`, `nome_produto4`, `ncm_sh4`, `cst4`, `cfop4`, `unid4`, `quantidade_prod4`, `valor_unitario4`, `valor_total_prod4`, `inscricao_municipal`, `valor_total_servicos`, `base_calculo_issqn`, `id_turma`, `id_atividade`, `data_hora_pedido`, `situacao`) VALUES
(2, '15', '1', '2024-08-01', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 17.00, 180.00, 1200.00, 216.00, 0.00, 50.00, 20.00, 30.00, 15.00, 50.00, 135.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 1, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, 'Leitor De Código De Barra', '0', '0', '0', ' 0', 1.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 6, '2024-08-01 11:28:47', ''),
(3, '17', '1', '2024-08-01', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 17.00, 180.00, 1200.00, 216.00, 0.00, 50.00, 20.00, 30.00, 15.00, 50.00, 135.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 1, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, 'Leitor De Código De Barra', '0', '0', '0', ' 0', 1.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 17, '2024-08-01 12:26:36', ''),
(4, '18', '1', '2024-08-06', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 17.00, 180.00, 1200.00, 216.00, 0.00, 50.00, 20.00, 30.00, 15.00, 50.00, 135.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 5, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, 'Leitor De Código De Barra', '0', '0', '0', ' 0', 5.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 18, '2024-08-06 11:07:18', 'Enviado'),
(5, '19', '1', '2024-08-06', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 17.00, 180.00, 1200.00, 216.00, 0.00, 50.00, 20.00, 30.00, 15.00, 50.00, 135.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 2, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, 'Leitor De Código De Barra', '0', '0', '0', ' 0', 2.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, '', '0', '0', '0', '0', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 19, '2024-08-06 11:14:18', 'Enviado'),
(6, '20', '1', '2024-08-08', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 17.00, 180.00, 1200.00, 216.00, 100.00, 50.00, 20.00, 30.00, 15.00, 50.00, 235.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 4, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, 'Leitor De Código De Barra', '2', '3', '4', ' UN', 2.00, 20.00, 40.00, 'Teclado', '0', '0', '0', 'UN', 2.00, 30.00, 60.00, '', '0', '0', '0', '', 0.00, 0.00, 0.00, '', '0', '0', '0', '', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 20, '2024-08-10 01:13:22', 'Enviado'),
(7, '21', '1', '2024-08-09', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 17.00, 180.00, 1200.00, 216.00, 100.00, 50.00, 20.00, 30.00, 15.00, 50.00, 235.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 4, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, 'Leitor De Código De Barra', '2', '3', '4', ' UN', 2.00, 20.00, 40.00, 'Teclado', '0', '0', '0', 'UN', 2.00, 30.00, 60.00, '', '0', '0', '0', '', 0.00, 0.00, 0.00, '', '0', '0', '0', '', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 21, '2024-08-10 01:22:05', 'Enviado'),
(8, '22', '1', '2024-08-10', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', 'Portonave2', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 17.00, 180.00, 1200.00, 216.00, 20.00, 50.00, 20.00, 30.00, 15.00, 50.00, 155.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 1, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, 'Leitor De Código De Barra', '2', '3', '4', ' UN', 1.00, 20.00, 20.00, '', '0', '0', '0', '', 0.00, 0.00, 0.00, '', '0', '0', '0', '', 0.00, 0.00, 0.00, '', '0', '0', '0', '', 0.00, 0.00, 0.00, NULL, NULL, NULL, 1, 22, '2024-08-10 05:36:58', 'Enviado');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `quantidade` float NOT NULL,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_picking` (`id_pedido`,`produto`,`posicao`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `picking`
--

INSERT INTO `picking` (`id`, `id_pedido`, `quantidade_solicitada`, `produto`, `posicao`, `quantidade`, `id_turma`) VALUES
(5, 12, 4, 'Leitor De Código De Barra', 'A3', 4, 1),
(14, 21, 2, 'Teclado', 'A1', 2, 1),
(15, 13, 2, 'Leitor De Código De Barra', 'A2', 2, 1),
(16, 11, 5, 'Teclado', 'A1', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `picking_pegado`
--

DROP TABLE IF EXISTS `picking_pegado`;
CREATE TABLE IF NOT EXISTS `picking_pegado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_carga` int NOT NULL,
  `id_aluno` int NOT NULL,
  `id_turma` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `picking_pegado`
--

INSERT INTO `picking_pegado` (`id`, `id_pedido`, `nome_produto`, `quantidade_enviada`, `posicao`, `id_carga`, `id_aluno`, `id_turma`) VALUES
(3, 14, 'Leitor De Código De Barra', 1, 'A1', 14, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(60) NOT NULL,
  `preco` float NOT NULL,
  `unidade` varchar(2) NOT NULL,
  `ncm` int NOT NULL,
  `cst` int NOT NULL,
  `cfop` int NOT NULL,
  `nome_produto_normalizado` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `unidade`, `ncm`, `cst`, `cfop`, `nome_produto_normalizado`) VALUES
(1, 'teclado', 30, 'UN', 0, 0, 0, 'teclado'),
(2, 'mouse', 12.5, 'UN', 0, 0, 0, 'mouse'),
(3, 'Leitor De Código De Barra', 20, 'UN', 2, 3, 4, 'Leitor De Codigo De Barra');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(65) NOT NULL,
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'teste', 'teste', -1),
(2, 'Matheus', 'teste', -1);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id`, `id_pedido`, `produto`, `quantidade`, `produto2`, `quantidade2`, `produto3`, `quantidade3`, `produto4`, `quantidade4`, `id_turma`) VALUES
(16, 1, 'Leitor De Código De Barra', 5, '', 0, '', 0, '', 0, 1),
(17, 1, 'Leitor De Código De Barra', 1, '', 0, '', 0, '', 0, 1),
(18, 2, 'Leitor De Código De Barra', 5, '', 0, '', 0, '', 0, 1),
(19, 1, 'Leitor De Código De Barra', 2, '', 0, '', 0, '', 0, 1),
(22, 1, 'Leitor De Código De Barra', 1, '', 0, '', 0, '', 0, 1);

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
(1);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `vistoriado`
--

INSERT INTO `vistoriado` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(14, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Leitor De Código De Barra', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, 20.00, 0.00, 0.00, 0.00, 2, 0, 0, 0, 3, 0, 0, 0, 4, 0, 0, 0, '2024-08-09', '2024-08-10', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
