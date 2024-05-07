-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 07-Maio-2024 às 15:17
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistica`
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
  `turma_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `username`, `password`, `turma_id`) VALUES
(1, 'root.Att', 'root', 1),
(12, 'teste', 'TWbr', 1);

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
-- Estrutura da tabela `notas_fiscais`
--

DROP TABLE IF EXISTS `notas_fiscais`;
CREATE TABLE `notas_fiscais` (
  `CPF` varchar(11) NOT NULL,
  `MATRICULA` varchar(5) NOT NULL,
  `DATA_VENDA` date DEFAULT NULL,
  `NUMERO` int(11) NOT NULL,
  `IMPOSTO` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo_container`
--

DROP TABLE IF EXISTS `processo_container`;
CREATE TABLE `processo_container` (
  `id` int(11) NOT NULL,
  `placa` varchar(7) NOT NULL,
  `NomeMotorista` varchar(255) NOT NULL,
  `container` varchar(255) NOT NULL,
  `navio` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `lacre` varchar(255) NOT NULL,
  `LacreSif` varchar(255) NOT NULL,
  `Temperatura` varchar(255) NOT NULL,
  `IMD` varchar(255) NOT NULL,
  `NOnu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `processo_container`
--

INSERT INTO `processo_container` (`id`, `placa`, `NomeMotorista`, `container`, `navio`, `cliente`, `tipo`, `lacre`, `LacreSif`, `Temperatura`, `IMD`, `NOnu`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
(2, 'q', 'q', 'q', 'q', 'q', 'q', 'qq', 'q', 'q', 'q', 'q'),
(3, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c'),
(4, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c'),
(5, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c'),
(6, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c'),
(7, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c'),
(8, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c'),
(9, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c'),
(10, 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c', 'c');

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
(1, 'teste', 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_de_clientes`
--

DROP TABLE IF EXISTS `tabela_de_clientes`;
CREATE TABLE `tabela_de_clientes` (
  `CPF` varchar(11) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `ENDERECO_1` varchar(150) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(2) DEFAULT NULL,
  `CEP` varchar(8) DEFAULT NULL,
  `DATA_DE_NASCIMENTO` date DEFAULT NULL,
  `IDADE` smallint(6) DEFAULT NULL,
  `SEXO` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_de_produtos`
--

DROP TABLE IF EXISTS `tabela_de_produtos`;
CREATE TABLE `tabela_de_produtos` (
  `CODIGO_DO_PRODUTO` varchar(10) NOT NULL,
  `NOME_DO_PRODUTO` varchar(50) DEFAULT NULL,
  `EMBALAGEM` varchar(20) DEFAULT NULL,
  `TAMANHO` varchar(10) DEFAULT NULL,
  `PRECO_DE_LISTA` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_de_vendedores`
--

DROP TABLE IF EXISTS `tabela_de_vendedores`;
CREATE TABLE `tabela_de_vendedores` (
  `MATRICULA` varchar(5) NOT NULL,
  `NOME` varchar(100) DEFAULT NULL,
  `PERCENTUAL_COMISSAO` float DEFAULT NULL,
  `DATA_ADMISSAO` date DEFAULT NULL,
  `DE_FERIAS` bit(1) DEFAULT NULL,
  `BAIRRO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1),
(2),
(3),
(4),
(223);

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
-- Indexes for table `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  ADD PRIMARY KEY (`NUMERO`),
  ADD KEY `MATRICULA` (`MATRICULA`),
  ADD KEY `CPF` (`CPF`);

--
-- Indexes for table `processo_container`
--
ALTER TABLE `processo_container`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Indexes for table `tabela_de_clientes`
--
ALTER TABLE `tabela_de_clientes`
  ADD PRIMARY KEY (`CPF`);

--
-- Indexes for table `tabela_de_produtos`
--
ALTER TABLE `tabela_de_produtos`
  ADD PRIMARY KEY (`CODIGO_DO_PRODUTO`);

--
-- Indexes for table `tabela_de_vendedores`
--
ALTER TABLE `tabela_de_vendedores`
  ADD PRIMARY KEY (`MATRICULA`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `armazem_limite`
--
ALTER TABLE `armazem_limite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `processo_container`
--
ALTER TABLE `processo_container`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id`);

--
-- Limitadores para a tabela `notas_fiscais`
--
ALTER TABLE `notas_fiscais`
  ADD CONSTRAINT `notas_fiscais_ibfk_1` FOREIGN KEY (`MATRICULA`) REFERENCES `tabela_de_vendedores` (`MATRICULA`),
  ADD CONSTRAINT `notas_fiscais_ibfk_2` FOREIGN KEY (`CPF`) REFERENCES `tabela_de_clientes` (`CPF`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
