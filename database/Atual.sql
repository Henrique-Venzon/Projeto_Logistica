-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01/08/2024 às 23:20
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
(2, 'root.Att', 'teste', 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `unidade`, `ncm`, `cst`, `cfop`, `nome_produto_normalizado`) VALUES
(1, 'teclado', 30, 'UN', 0, 0, 0, 'teclado'),
(2, 'mouse', 12.5, 'UN', 0, 0, 0, 'mouse');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;