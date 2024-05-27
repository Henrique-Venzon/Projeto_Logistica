-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Maio-2024 às 15:24
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
-- Banco de dados: `logistica`
--
CREATE DATABASE IF NOT EXISTS `logistica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `logistica`;

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
(1, 'Professor', 'Professor', -1),
(2, 'root.Att', '6nUJ', 1),
(12, 'teste', 'teste', 1),
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

--
-- Extraindo dados da tabela `atividade_concluida`
--

INSERT INTO `atividade_concluida` (`id`, `id_transporte`, `id_turma`, `id_aluno`, `sem_lona`, `avariana_lateral_direita`, `sem_cabo_de_energia`, `avaria_no_teto`, `avaria_na_frente`, `sem_lacre`, `adesivos_avariados`, `excesso_de_altura`, `excesso_na_direita`, `excesso_na_esquerda`, `excesso_na_frente`, `painel_avariado`, `avariana_na_lateral_esquerda`, `container_bem_desgastado`) VALUES
(20, 4, 1, 12, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 5, 1, 12, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0),
(22, 5, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0),
(23, 5, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0),
(24, 5, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0),
(25, 5, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 5, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 5, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 5, 1, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0),
(29, 5, 1, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 5, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 4, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 6, 23, 1, 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0),
(33, 7, 23, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade_turma`
--

DROP TABLE IF EXISTS `atividade_turma`;
CREATE TABLE `atividade_turma` (
  `id_atividade` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `data_hora_envio` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carga`
--

INSERT INTO `carga` (`id`, `situacao`, `npedido`, `Empresa`, `cliente`, `Telefone`, `CEP`, `produto1`, `produto2`, `produto3`, `produto4`, `unidade1`, `unidade2`, `unidade3`, `unidade4`, `quantidade1`, `quantidade2`, `quantidade3`, `quantidade4`, `valor1`, `valor2`, `valor3`, `valor4`, `ncm1`, `ncm2`, `ncm3`, `ncm4`, `cst1`, `cst2`, `cst3`, `cst4`, `cfop1`, `cfop2`, `cfop3`, `cfop4`, `turma_id`) VALUES
(32, 'Vistoriado', '1234', 'Portonave', 'Matheus Yan', '4739406838', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(33, 'Vistoriado', '1', 'MultiLog', 'Luan Pereira', '4789426155', '23812310', 'Motor', 'Óleo Diesel', '', '', 'UN', 'L', ' ', ' ', 18, 30, 0, 0, '2800.00', '2.40', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(34, 'Vistoriado', '2', 'ARXO', 'Henrique Venzon', '4791296865', '88318481', 'Camisa', 'Moletom', '', '', 'UN', 'UN', ' ', ' ', 30, 20, 0, 0, '20.00', '24.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(35, 'Vistoriado', '15', 'Portonave', 'Matheus Yan', '4739406838', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(36, 'Vistoriado', '3', 'Portonave', 'Matheus Yan', '4739406838', '88370904', 'Teclado', 'Mouse', '', '', 'UN', 'UN', ' ', ' ', 10, 15, 0, 0, '15.00', '8.00', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1);

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

--
-- Extraindo dados da tabela `container`
--

INSERT INTO `container` (`id_container`, `cliente`, `placa`, `container`, `navio`, `tipo`, `lacre`, `lacre SIF`, `nome_motorista`, `NOnu`, `Temperatura`, `IMO`, `turma_id`, `situacao`) VALUES
(3, 'rafael', '231QAC', '2231', 'KL2332', '22G1', 'ty223At', '41231', 'Matheus Yan dos Reis', '2546', 23, '1', 2, 'enviado'),
(4, 'Matheus Yand ', '231QAC', '2231', 'KL2332', '22G1', 'ty223At', '41231', 'Matheus Yan dos Reis', '2546', 23, '1', 1, 'enviado'),
(5, '', '231QAC', '2231', 'KL2332', '22G1', 'ty223At', '41231', 'Matheus Yan dos Reis', '2546', 23, 'NULL', 1, 'enviado');

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

--
-- Extraindo dados da tabela `docas`
--

INSERT INTO `docas` (`id`, `id_doca`, `id_carga`, `id_aluno`, `id_turma`) VALUES
(10, 2, 33, 1, 1),
(11, 4, 34, 1, 1),
(12, 1, 35, 1, 1),
(13, 1, 36, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `nota_fiscal_criada`
--

DROP TABLE IF EXISTS `nota_fiscal_criada`;
CREATE TABLE `nota_fiscal_criada` (
  `id_notafiscal` int(11) NOT NULL,
  `id_atividade` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `data_hora_envio` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nota_fiscal_criada`
--

INSERT INTO `nota_fiscal_criada` (`id_notafiscal`, `id_atividade`, `id_turma`, `data_hora_envio`) VALUES
(23, 32, 1, '2024-05-22 19:51:25'),
(24, 33, 1, '2024-05-23 07:29:25'),
(25, 34, 1, '2024-05-23 07:59:30'),
(26, 35, 1, '2024-05-23 09:02:13'),
(27, 36, 1, '2024-05-23 10:18:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome_produto` varchar(255) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `UN` varchar(4) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome_produto`, `preco`, `UN`, `Quantidade`, `turma_id`) VALUES
(1, 'Tesoura', 5.00, 'UN', 0, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
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
-- Índices para tabela `atividade_turma`
--
ALTER TABLE `atividade_turma`
  ADD PRIMARY KEY (`id_atividade`,`id_turma`),
  ADD KEY `id_turma` (`id_turma`);

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
-- Índices para tabela `nota_fiscal_criada`
--
ALTER TABLE `nota_fiscal_criada`
  ADD PRIMARY KEY (`id_notafiscal`),
  ADD KEY `id_atividade` (`id_atividade`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT de tabela `armazem_limite`
--
ALTER TABLE `armazem_limite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `atividade_concluida`
--
ALTER TABLE `atividade_concluida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `carga`
--
ALTER TABLE `carga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `container`
--
ALTER TABLE `container`
  MODIFY `id_container` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `docas`
--
ALTER TABLE `docas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `nota_fiscal_criada`
--
ALTER TABLE `nota_fiscal_criada`
  MODIFY `id_notafiscal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=670;

--
-- Restrições para despejos de tabelas
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
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
