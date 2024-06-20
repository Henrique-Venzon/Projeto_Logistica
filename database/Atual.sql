-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 20-Jun-2024 às 13:19
-- Versão do servidor: 5.7.11
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

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
-- Estrutura da tabela `armazem_limite`
--

CREATE TABLE `armazem_limite` (
  `id` int(11) NOT NULL,
  `quantidade_atual` int(11) NOT NULL,
  `limite_maximo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_concluida`
--

CREATE TABLE `atividade_concluida` (
  `id` int(11) NOT NULL,
  `id_transporte` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
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
  `container_bem_desgastado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `atividade_concluida`
--

INSERT INTO `atividade_concluida` (`id`, `id_transporte`, `id_turma`, `id_aluno`, `sem_lona`, `avariana_lateral_direita`, `sem_cabo_de_energia`, `avaria_no_teto`, `avaria_na_frente`, `sem_lacre`, `adesivos_avariados`, `excesso_de_altura`, `excesso_na_direita`, `excesso_na_esquerda`, `excesso_na_frente`, `painel_avariado`, `avariana_na_lateral_esquerda`, `container_bem_desgastado`) VALUES
(43, 15, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carga`
--

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
  `quantidade2` int(11) DEFAULT '0',
  `quantidade3` int(11) DEFAULT '0',
  `quantidade4` int(11) DEFAULT '0',
  `valor1` decimal(10,2) NOT NULL,
  `valor2` decimal(10,2) DEFAULT '0.00',
  `valor3` decimal(10,2) DEFAULT '0.00',
  `valor4` decimal(10,2) DEFAULT '0.00',
  `ncm1` int(11) NOT NULL,
  `ncm2` int(11) DEFAULT '0',
  `ncm3` int(11) DEFAULT '0',
  `ncm4` int(11) DEFAULT '0',
  `cst1` int(11) NOT NULL,
  `cst2` int(11) DEFAULT '0',
  `cst3` int(11) DEFAULT '0',
  `cst4` int(11) DEFAULT '0',
  `cfop1` int(11) NOT NULL,
  `cfop2` int(11) DEFAULT '0',
  `cfop3` int(11) DEFAULT '0',
  `cfop4` int(11) DEFAULT '0',
  `data_pedido` date NOT NULL,
  `data_entrega` date NOT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carga`
--

INSERT INTO `carga` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(104, 'esperando a nota fiscal', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-12', '2024-06-12', 3),
(122, 'Finalizada', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 2),
(123, 'Vistoriado', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-12', '2024-06-06', 2),
(124, 'Vistoriado', '3', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 2),
(125, 'enviado', '5', 'MultiLog', 'Luan Pereira', '4789426155', '23812310', 'Motor', 'Óleo Diesel', '', '', 'UN', 'L', ' ', ' ', 15, 30, 0, 0, '2800.00', '2.40', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-25', '2024-06-05', 1),
(126, 'enviado', '2', 'ARXO', 'Henrique Venzon', '4791296865', '88318481', 'Camisa', 'Moletom', '', '', 'UN', 'UN', ' ', ' ', 30, 20, 0, 0, '20.00', '24.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 1),
(127, 'Finalizada', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', 'Motor', 'Óleo Diesel', 'UN', 'UN', 'UN', 'L', 25, 25, 2, 800, '15.00', '8.00', '2800.00', '2.40', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 3),
(128, 'Finalizada', '56', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Camisa', 'Moletom', '', '', 'UN', 'UN', ' ', ' ', 3, 4, 0, 0, '20.00', '24.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-06', '2024-07-02', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `container`
--

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

--
-- Extraindo dados da tabela `container`
--

INSERT INTO `container` (`id_container`, `cliente`, `placa`, `container`, `navio`, `tipo`, `lacre`, `lacre SIF`, `nome_motorista`, `NOnu`, `Temperatura`, `IMO`, `turma_id`, `situacao`) VALUES
(15, 'Hnerique', '3423', '3443', '34', '34', '3432', '0', 'Luan', '0', 26, '0', 3, 'enviado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `docas`
--

CREATE TABLE `docas` (
  `id` int(11) NOT NULL,
  `id_doca` int(11) NOT NULL,
  `id_carga` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `docas`
--

INSERT INTO `docas` (`id`, `id_doca`, `id_carga`, `id_aluno`, `id_turma`) VALUES
(81, 1, 123, 1, 2),
(82, 1, 124, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estoque`
--

CREATE TABLE `estoque` (
  `id` int(11) NOT NULL,
  `id_doca` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `quantidade_enviada` int(11) NOT NULL,
  `posicao` varchar(2) NOT NULL,
  `id_turma` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `estoque`
--

INSERT INTO `estoque` (`id`, `id_doca`, `nome_produto`, `quantidade_enviada`, `posicao`, `id_turma`) VALUES
(33, 1, 'Teclado', 20, 'A1', 1),
(34, 1, 'Mouse', 30, 'A1', 1),
(35, 1, 'Motor', 15, 'A1', 1),
(36, 1, 'Óleo Diesel', 30, 'A1', 1),
(37, 1, 'Teclado', 30, 'A1', 3),
(38, 1, 'Mouse', 30, 'A1', 3),
(39, 1, 'Teclado', 10, 'A1', 2),
(40, 1, 'Mouse', 15, 'A1', 2),
(41, 1, 'Motor', 2, 'A1', 3),
(42, 1, 'Óleo Diesel', 800, 'A1', 3),
(43, 1, 'Camisa', 3, 'A1', 3),
(44, 1, 'Moletom', 4, 'A1', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacao`
--

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
-- Estrutura da tabela `nota_fiscal_criada`
--

CREATE TABLE `nota_fiscal_criada` (
  `id_notafiscal` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `data_hora_envio` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nota_fiscal_criada`
--

INSERT INTO `nota_fiscal_criada` (`id_notafiscal`, `id_atividade`, `id_turma`, `data_hora_envio`) VALUES
(95, 104, 3, '2024-06-12 08:48:37'),
(113, 122, 2, '2024-06-13 11:21:58'),
(114, 123, 2, '2024-06-13 11:26:33'),
(115, 124, 2, '2024-06-13 11:26:52'),
(116, 125, 1, '2024-06-13 11:51:19'),
(117, 126, 1, '2024-06-13 11:52:02'),
(118, 127, 3, '2024-06-13 12:06:58'),
(119, 128, 3, '2024-06-13 12:17:48');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pegado`
--

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
-- Estrutura da tabela `produto`
--

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
(6, 'Moletom', 24, 'Moletom');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `password` varchar(65) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
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
(1, 3, 'tesoura', 5, '', 0, '', 0, '', 0, 0),
(2, 6, 'tesoura', 5, 'Mouse', 5, '', 0, '', 0, 0),
(3, 5, 'Teclado', 2, 'Teclado', 2, 'Motor', 2, '', 0, 0),
(4, 2, 'Teclado', 24, '', 0, '', 0, '', 0, 3),
(5, 12, 'Teclado', 1, '', 0, '', 0, '', 0, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacao2`
--

CREATE TABLE `solicitacao2` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_produto` varchar(50) NOT NULL,
  `quantidadeS` int(11) NOT NULL,
  `posicao` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id`) VALUES
(-1),
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vistoriado`
--

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
  `quantidade2` int(11) DEFAULT '0',
  `quantidade3` int(11) DEFAULT '0',
  `quantidade4` int(11) DEFAULT '0',
  `valor1` decimal(10,2) NOT NULL,
  `valor2` decimal(10,2) DEFAULT '0.00',
  `valor3` decimal(10,2) DEFAULT '0.00',
  `valor4` decimal(10,2) DEFAULT '0.00',
  `ncm1` int(11) NOT NULL,
  `ncm2` int(11) DEFAULT '0',
  `ncm3` int(11) DEFAULT '0',
  `ncm4` int(11) DEFAULT '0',
  `cst1` int(11) NOT NULL,
  `cst2` int(11) DEFAULT '0',
  `cst3` int(11) DEFAULT '0',
  `cst4` int(11) DEFAULT '0',
  `cfop1` int(11) NOT NULL,
  `cfop2` int(11) DEFAULT '0',
  `cfop3` int(11) DEFAULT '0',
  `cfop4` int(11) DEFAULT '0',
  `data_pedido` date NOT NULL,
  `data_entrega` date NOT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vistoriado`
--

INSERT INTO `vistoriado` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `data_pedido`, `data_entrega`, `turma_id`) VALUES
(122, 'Vistoriado', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 0, 0, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 2),
(123, 'Vistoriado', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-12', '2024-06-06', 2),
(124, 'Vistoriado', '3', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 2),
(127, 'Vistoriado', '2', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Teclado', 'Mouse', 'Motor', 'Óleo Diesel', 'UN', 'UN', 'UN', 'L', 0, 0, 0, 0, '15.00', '8.00', '2800.00', '2.40', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-13', '2024-06-13', 3),
(128, 'Vistoriado', '56', 'Portonave', 'Matheus Yan', '4740028922', '88370904', 'Camisa', 'Moletom', '', '', 'UN', 'UN', ' ', ' ', 0, 0, 0, 0, '20.00', '24.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-06-06', '2024-07-02', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `armazem_limite`
--
ALTER TABLE `armazem_limite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atividade_concluida`
--
ALTER TABLE `atividade_concluida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_turma` (`id_turma`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_transporte` (`id_transporte`);

--
-- Indexes for table `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`id_container`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `docas`
--
ALTER TABLE `docas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_docas_aluno` (`id_aluno`),
  ADD KEY `FK_docas_turma` (`id_turma`);

--
-- Indexes for table `estoque`
--
ALTER TABLE `estoque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movimentacao`
--
ALTER TABLE `movimentacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota_fiscal_criada`
--
ALTER TABLE `nota_fiscal_criada`
  ADD PRIMARY KEY (`id_notafiscal`),
  ADD KEY `id_atividade` (`id_atividade`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Indexes for table `pegado`
--
ALTER TABLE `pegado`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `solicitacao`
--
ALTER TABLE `solicitacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solicitacao2`
--
ALTER TABLE `solicitacao2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vistoriado`
--
ALTER TABLE `vistoriado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;
--
-- AUTO_INCREMENT for table `armazem_limite`
--
ALTER TABLE `armazem_limite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `atividade_concluida`
--
ALTER TABLE `atividade_concluida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `carga`
--
ALTER TABLE `carga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `docas`
--
ALTER TABLE `docas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `estoque`
--
ALTER TABLE `estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `movimentacao`
--
ALTER TABLE `movimentacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nota_fiscal_criada`
--
ALTER TABLE `nota_fiscal_criada`
  MODIFY `id_notafiscal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `pegado`
--
ALTER TABLE `pegado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `solicitacao`
--
ALTER TABLE `solicitacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `solicitacao2`
--
ALTER TABLE `solicitacao2`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vistoriado`
--
ALTER TABLE `vistoriado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `FK_carga_turma` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `container`
--
ALTER TABLE `container`
  ADD CONSTRAINT `container_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `docas`
--
ALTER TABLE `docas`
  ADD CONSTRAINT `FK_docas_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`),
  ADD CONSTRAINT `FK_docas_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `nota_fiscal_criada`
--
ALTER TABLE `nota_fiscal_criada`
  ADD CONSTRAINT `nota_fiscal_criada_ibfk_1` FOREIGN KEY (`id_atividade`) REFERENCES `carga` (`id`),
  ADD CONSTRAINT `nota_fiscal_criada_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
