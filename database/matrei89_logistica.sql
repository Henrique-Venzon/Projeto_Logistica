-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jul-2024 às 12:54
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

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
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'PROFESSOR', 'PROFESSOR@SESISENAI2024', -1),
(2, 'root.Att', 'Hu97', 1),
(12, 'HelloWorldJuniorteste', '4RTZ', 1),
(94, 'Aluno 1', 'xSTt', 2),
(95, 'Aluno 2', 'blFm', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `armazem_limite`
--

DROP TABLE IF EXISTS `armazem_limite`;
CREATE TABLE `armazem_limite` (
  `id` int(11) NOT NULL,
  `quantidade_atual` int(11) NOT NULL,
  `limite_maximo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_concluida`
--

DROP TABLE IF EXISTS `atividade_concluida`;
CREATE TABLE `atividade_concluida` (
  `id` int(11) NOT NULL,
  `id_transporte` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `sem_lona` tinyint(1) NOT NULL DEFAULT 0,
  `avariana_lateral_direita` tinyint(1) NOT NULL DEFAULT 0,
  `sem_cabo_de_energia` tinyint(1) NOT NULL DEFAULT 0,
  `avaria_no_teto` tinyint(1) NOT NULL DEFAULT 0,
  `avaria_na_frente` tinyint(1) NOT NULL DEFAULT 0,
  `sem_lacre` tinyint(1) NOT NULL DEFAULT 0,
  `adesivos_avariados` tinyint(1) NOT NULL DEFAULT 0,
  `excesso_de_altura` tinyint(1) NOT NULL DEFAULT 0,
  `excesso_na_direita` tinyint(1) NOT NULL DEFAULT 0,
  `excesso_na_esquerda` tinyint(1) NOT NULL DEFAULT 0,
  `excesso_na_frente` tinyint(1) NOT NULL DEFAULT 0,
  `painel_avariado` tinyint(1) NOT NULL DEFAULT 0,
  `avariana_na_lateral_esquerda` tinyint(1) NOT NULL DEFAULT 0,
  `container_bem_desgastado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carga`
--

DROP TABLE IF EXISTS `carga`;
CREATE TABLE `carga` (
  `id` int(11) NOT NULL,
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
  `quantidade1` int(11) NOT NULL,
  `quantidade2` int(11) DEFAULT 0,
  `quantidade3` int(11) DEFAULT 0,
  `quantidade4` int(11) DEFAULT 0,
  `valor1` decimal(10,2) NOT NULL,
  `valor2` decimal(10,2) DEFAULT 0.00,
  `valor3` decimal(10,2) DEFAULT 0.00,
  `valor4` decimal(10,2) DEFAULT 0.00,
  `ncm1` int(11) NOT NULL,
  `ncm2` int(11) DEFAULT 0,
  `ncm3` int(11) DEFAULT 0,
  `ncm4` int(11) DEFAULT 0,
  `cst1` int(11) NOT NULL,
  `cst2` int(11) DEFAULT 0,
  `cst3` int(11) DEFAULT 0,
  `cst4` int(11) DEFAULT 0,
  `cfop1` int(11) NOT NULL,
  `cfop2` int(11) DEFAULT 0,
  `cfop3` int(11) DEFAULT 0,
  `cfop4` int(11) DEFAULT 0,
  `data_pedido` date NOT NULL,
  `data_entrega` date NOT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carga`
--

INSERT INTO `carga` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(193, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(194, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(195, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(196, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(197, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(198, 'Finalizada', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(200, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-27', '2024-06-28', 1),
(201, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(202, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(203, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(204, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(205, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(206, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 2),
(207, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 2),
(208, 'enviado', '345644', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Mouse', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '8.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-02', '2024-07-03', 1),
(209, 'enviado', '11111', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-03', '2024-07-04', 1),
(210, 'enviado', '1213123', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 5, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-03', '2024-07-04', 1),
(211, 'Finalizada', '665', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 4, 5, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-03', '2024-07-04', 1),
(212, 'enviado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 645, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-09', '2024-07-10', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `container`
--

DROP TABLE IF EXISTS `container`;
CREATE TABLE `container` (
  `id_container` int(11) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `placa` varchar(30) NOT NULL,
  `container` varchar(30) NOT NULL,
  `navio` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `lacre` varchar(30) NOT NULL,
  `lacre SIF` varchar(30) DEFAULT NULL,
  `nome_motorista` varchar(255) DEFAULT NULL,
  `NOnu` varchar(30) DEFAULT NULL,
  `Temperatura` int(11) DEFAULT NULL,
  `IMO` varchar(30) NOT NULL,
  `turma_id` int(11) NOT NULL,
  `situacao` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `docas`
--

DROP TABLE IF EXISTS `docas`;
CREATE TABLE `docas` (
  `id` int(11) NOT NULL,
  `id_doca` int(11) NOT NULL,
  `id_carga` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

DROP TABLE IF EXISTS `estoque`;
CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int(11) NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
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
-- Estrutura da tabela `movimentacao`
--

DROP TABLE IF EXISTS `movimentacao`;
CREATE TABLE `movimentacao` (
  `id` int(11) NOT NULL,
  `id_doca` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int(11) NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_carga` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota_fiscal`
--

DROP TABLE IF EXISTS `nota_fiscal`;
CREATE TABLE `nota_fiscal` (
  `id` int(11) NOT NULL,
  `numero` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `entrada_saida` date NOT NULL,
  `chave_acesso` varchar(100) NOT NULL,
  `informacao_interna` text DEFAULT NULL,
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
  `quantidade` int(11) DEFAULT NULL,
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
  `nome_produto2` text DEFAULT NULL,
  `ncm_sh2` varchar(100) DEFAULT NULL,
  `cst2` varchar(100) DEFAULT NULL,
  `cfop2` varchar(100) DEFAULT NULL,
  `unid2` varchar(100) DEFAULT NULL,
  `quantidade_prod2` decimal(10,2) DEFAULT NULL,
  `valor_unitario2` decimal(10,2) DEFAULT NULL,
  `valor_total_prod2` decimal(10,2) DEFAULT NULL,
  `nome_produto3` text DEFAULT NULL,
  `ncm_sh3` varchar(100) DEFAULT NULL,
  `cst3` varchar(100) DEFAULT NULL,
  `cfop3` varchar(100) DEFAULT NULL,
  `unid3` varchar(100) DEFAULT NULL,
  `quantidade_prod3` decimal(10,2) DEFAULT NULL,
  `valor_unitario3` decimal(10,2) DEFAULT NULL,
  `valor_total_prod3` decimal(10,2) DEFAULT NULL,
  `nome_produto4` text DEFAULT NULL,
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
  `id_turma` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nota_fiscal`
--

INSERT INTO `nota_fiscal` (`id`, `numero`, `serie`, `entrada_saida`, `chave_acesso`, `informacao_interna`, `nome_razao_social`, `sede`, `telefone`, `cep`, `protocolo_autorizacao`, `cnpj`, `inscricao_estadual_subs_tributaria`, `natureza_operacao`, `inscricao_estadual`, `nome_razao_social_remetente`, `cnpj_cpf_remetente`, `cep_remetente`, `telefone_remetente`, `inscricao_estadual_remetente`, `data_emissao`, `data_entrada_saida`, `hora_saida`, `fatura_duplicata`, `forma_pagamento`, `base_calculo_icms`, `valor_icms`, `base_calculo_icms_st`, `valor_icms_substituicao`, `total_produtos`, `valor_frete`, `valor_seguro`, `desconto`, `outras_despesas`, `valor_ipi`, `valor_total_nota`, `nome_razao_social_transportador`, `frete_por_conta`, `codigo_antt`, `placa_veiculo`, `cnpj_cpf_transportador`, `inscricao_estadual_transportador`, `quantidade`, `especie`, `marca`, `numeracao`, `peso_bruto`, `peso_liquido`, `nome_produto1`, `ncm_sh1`, `cst1`, `cfop1`, `unid1`, `quantidade_prod1`, `valor_unitario1`, `valor_total_prod1`, `nome_produto2`, `ncm_sh2`, `cst2`, `cfop2`, `unid2`, `quantidade_prod2`, `valor_unitario2`, `valor_total_prod2`, `nome_produto3`, `ncm_sh3`, `cst3`, `cfop3`, `unid3`, `quantidade_prod3`, `valor_unitario3`, `valor_total_prod3`, `nome_produto4`, `ncm_sh4`, `cst4`, `cfop4`, `unid4`, `quantidade_prod4`, `valor_unitario4`, `valor_total_prod4`, `inscricao_municipal`, `valor_total_servicos`, `base_calculo_issqn`, `id_turma`, `id_atividade`) VALUES
(4, '54', '3', '2024-07-09', '112233445566778899001122334455', 'Informação interna GHI', 'Empresa GHI', 'Av. GHI, 789', '(41) 98765-4321', '54321-000', '987654', '76.543.210/0001-76', '6543210987', 'Venda', '6543210987', 'Empresa GHI', '76.543.210/0001-76', '54321-000', '(41) 99876-5432', '7654321098', '2024-07-10', '2024-07-10', '08:30:00', 'Fatura 9876', 'Boleto Bancário', '7500.00', '675.00', '6000.00', '900.00', '180000.00', '5000.00', '350000.00', '17.00', '4000.00', '1200.00', '554200.00', 'Transportadora GHI', 'Destinatário', '7654321', 'GHI-5432', '76.543.210/0001-76', '7654321098', 700, 'Pallet', 'Marca GHI', '987654', '2.50', '2.20', 'Teclado', '0', '0', '0', 'UN', '5.00', '15.00', '75.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', NULL, NULL, NULL, 2, 0),
(5, '54', '3', '2024-07-09', '112233445566778899001122334455', 'Informação interna GHI', 'Empresa GHI', 'Av. GHI, 789', '(41) 98765-4321', '54321-000', '987654', '76.543.210/0001-76', '6543210987', 'Venda', '6543210987', 'Empresa GHI', '76.543.210/0001-76', '54321-000', '(41) 99876-5432', '7654321098', '2024-07-10', '2024-07-10', '08:30:00', 'Fatura 9876', 'Boleto Bancário', '7500.00', '675.00', '6000.00', '900.00', '180000.00', '5000.00', '350000.00', '17.00', '4000.00', '1200.00', '554200.00', 'Transportadora GHI', 'Destinatário', '7654321', 'GHI-5432', '76.543.210/0001-76', '7654321098', 700, 'Pallet', 'Marca GHI', '987654', '2.50', '2.20', 'Teclado', '0', '0', '0', 'UN', '5.00', '15.00', '75.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', NULL, NULL, NULL, 2, 0),
(6, '1', '3', '2024-07-09', '112233445566778899001122334455', 'Informação interna GHI', 'Empresa GHI', 'Av. GHI, 789', '(41) 98765-4321', '54321-000', '987654', '76.543.210/0001-76', '6543210987', 'Venda', '6543210987', 'Empresa GHI', '76.543.210/0001-76', '54321-000', '(41) 99876-5432', '7654321098', '2024-07-10', '2024-07-10', '08:30:00', 'Fatura 9876', 'Boleto Bancário', '7500.00', '675.00', '6000.00', '900.00', '180000.00', '5000.00', '350000.00', '17.00', '4000.00', '1200.00', '554200.00', 'Transportadora GHI', 'Destinatário', '7654321', 'GHI-5432', '76.543.210/0001-76', '7654321098', 700, 'Pallet', 'Marca GHI', '987654', '2.50', '2.20', 'Teclado', '0', '0', '0', 'UN', '645.00', '15.00', '9675.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', '', '0', '0', '0', ' ', '0.00', '0.00', '0.00', NULL, NULL, NULL, 2, 212);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pegado`
--

DROP TABLE IF EXISTS `pegado`;
CREATE TABLE `pegado` (
  `id` int(11) NOT NULL,
  `id_doca` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int(11) NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_carga` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `picking`
--

DROP TABLE IF EXISTS `picking`;
CREATE TABLE `picking` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `quantidade_solicitada` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `posicao` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `picking`
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
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(60) NOT NULL,
  `preco` float NOT NULL,
  `nome_produto_normalizado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
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
-- Estrutura da tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(65) NOT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'teste', 'teste', -1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao`
--

DROP TABLE IF EXISTS `solicitacao`;
CREATE TABLE `solicitacao` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `produto` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `produto2` varchar(255) DEFAULT NULL,
  `quantidade2` int(11) DEFAULT NULL,
  `produto3` varchar(255) DEFAULT NULL,
  `quantidade3` int(11) DEFAULT NULL,
  `produto4` varchar(255) DEFAULT NULL,
  `quantidade4` int(11) DEFAULT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacao`
--

INSERT INTO `solicitacao` (`id`, `id_pedido`, `produto`, `quantidade`, `produto2`, `quantidade2`, `produto3`, `quantidade3`, `produto4`, `quantidade4`, `id_turma`) VALUES
(18, 213, 'Teclado', 1, '', 0, '', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE `turma` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`) VALUES
(-1),
(1),
(2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vistoriado`
--

DROP TABLE IF EXISTS `vistoriado`;
CREATE TABLE `vistoriado` (
  `id` int(11) NOT NULL,
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
  `quantidade1` int(11) NOT NULL,
  `quantidade2` int(11) DEFAULT 0,
  `quantidade3` int(11) DEFAULT 0,
  `quantidade4` int(11) DEFAULT 0,
  `valor1` decimal(10,2) NOT NULL,
  `valor2` decimal(10,2) DEFAULT 0.00,
  `valor3` decimal(10,2) DEFAULT 0.00,
  `valor4` decimal(10,2) DEFAULT 0.00,
  `ncm1` int(11) NOT NULL,
  `ncm2` int(11) DEFAULT 0,
  `ncm3` int(11) DEFAULT 0,
  `ncm4` int(11) DEFAULT 0,
  `cst1` int(11) NOT NULL,
  `cst2` int(11) DEFAULT 0,
  `cst3` int(11) DEFAULT 0,
  `cst4` int(11) DEFAULT 0,
  `cfop1` int(11) NOT NULL,
  `cfop2` int(11) DEFAULT 0,
  `cfop3` int(11) DEFAULT 0,
  `cfop4` int(11) DEFAULT 0,
  `data_pedido` date NOT NULL,
  `data_entrega` date NOT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vistoriado`
--

INSERT INTO `vistoriado` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(193, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(194, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(195, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(196, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(197, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(198, 'Vistoriado', '1', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', '', '', '', 'UN', ' ', ' ', ' ', 0, 0, 0, 0, '15.00', '0.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-26', '2024-06-27', 2),
(211, 'Vistoriado', '665', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 0, 0, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-07-03', '2024-07-04', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices para tabela `armazem_limite`
--
ALTER TABLE `armazem_limite`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `atividade_concluida`
--
ALTER TABLE `atividade_concluida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_turma` (`id_turma`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_transporte` (`id_transporte`);

--
-- Índices para tabela `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices para tabela `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id_container`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices para tabela `docas`
--
ALTER TABLE `docas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docas_aluno` (`id_aluno`),
  ADD KEY `FK_docas_turma` (`id_turma`);

--
-- Índices para tabela `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pegado`
--
ALTER TABLE `pegado`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `picking`
--
ALTER TABLE `picking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_picking` (`id_pedido`,`produto`,`posicao`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices para tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `vistoriado`
--
ALTER TABLE `vistoriado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=663;

--
-- AUTO_INCREMENT de tabela `armazem_limite`
--
ALTER TABLE `armazem_limite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atividade_concluida`
--
ALTER TABLE `atividade_concluida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `carga`
--
ALTER TABLE `carga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT de tabela `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `docas`
--
ALTER TABLE `docas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de tabela `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=384;

--
-- AUTO_INCREMENT de tabela `nota_fiscal`
--
ALTER TABLE `nota_fiscal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pegado`
--
ALTER TABLE `pegado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT de tabela `picking`
--
ALTER TABLE `picking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=670;

--
-- AUTO_INCREMENT de tabela `vistoriado`
--
ALTER TABLE `vistoriado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
