-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 19/06/2024 às 06:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `danfe`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `serie` varchar(255) NOT NULL,
  `entrada_saida` varchar(255) NOT NULL,
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
  `quantidade` decimal(10,2) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `numeracao` varchar(255) DEFAULT NULL,
  `peso_bruto` decimal(10,2) DEFAULT NULL,
  `peso_liquido` decimal(10,2) DEFAULT NULL,
  `cod_prod` varchar(255) NOT NULL,
  `descricao_prod` varchar(255) NOT NULL,
  `ncm_sh` varchar(255) NOT NULL,
  `cst` varchar(255) NOT NULL,
  `cfop` varchar(255) NOT NULL,
  `unid` varchar(255) NOT NULL,
  `quantidade_prod` decimal(10,2) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL,
  `valor_total_prod` decimal(10,2) NOT NULL,
  `base_calculo_icms_prod` decimal(10,2) DEFAULT NULL,
  `valor_icms_prod` decimal(10,2) DEFAULT NULL,
  `valor_ipi_prod` decimal(10,2) DEFAULT NULL,
  `icms` decimal(10,2) DEFAULT NULL,
  `ipi` decimal(10,2) DEFAULT NULL,
  `inscricao_municipal` varchar(255) DEFAULT NULL,
  `valor_total_servicos` decimal(10,2) DEFAULT NULL,
  `base_calculo_issqn` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `info`
--

INSERT INTO `info` (`id`, `numero`, `serie`, `entrada_saida`, `chave_acesso`, `informacao_interna`, `nome_razao_social`, `sede`, `telefone`, `cep`, `protocolo_autorizacao`, `cnpj`, `inscricao_estadual_subs_tributaria`, `natureza_operacao`, `inscricao_estadual`, `nome_razao_social_remetente`, `cnpj_cpf_remetente`, `cep_remetente`, `telefone_remetente`, `inscricao_estadual_remetente`, `data_emissao`, `data_entrada_saida`, `hora_saida`, `fatura_duplicata`, `forma_pagamento`, `base_calculo_icms`, `valor_icms`, `base_calculo_icms_st`, `valor_icms_substituicao`, `total_produtos`, `valor_frete`, `valor_seguro`, `desconto`, `outras_despesas`, `valor_ipi`, `valor_total_nota`, `nome_razao_social_transportador`, `frete_por_conta`, `codigo_antt`, `placa_veiculo`, `cnpj_cpf_transportador`, `inscricao_estadual_transportador`, `quantidade`, `especie`, `marca`, `numeracao`, `peso_bruto`, `peso_liquido`, `cod_prod`, `descricao_prod`, `ncm_sh`, `cst`, `cfop`, `unid`, `quantidade_prod`, `valor_unitario`, `valor_total_prod`, `base_calculo_icms_prod`, `valor_icms_prod`, `valor_ipi_prod`, `icms`, `ipi`, `inscricao_municipal`, `valor_total_servicos`, `base_calculo_issqn`) VALUES
(1, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00),
(2, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00),
(3, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00),
(4, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00),
(5, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00),
(6, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00),
(7, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00),
(8, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00),
(9, '123456', '1', 'Saída', '12345678901234567890123456789012345678901234', 'Informação interna XYZ', 'Empresa XYZ', 'Rua ABC, 123', '(11) 1234-5678', '12345-678', '123456', '12.345.678/0001-12', '1234567890', 'Venda', '1234567890', 'Empresa XYZ', '12.345.678/0001-12', '12345-678', '(11) 1234-5678', '1234567890', '2023-06-18', '2023-06-18', '12:00:00', 'Fatura 123', 'Boleto', 1000.00, 180.00, 1200.00, 216.00, 1000.00, 50.00, 20.00, 30.00, 15.00, 50.00, 1230.00, 'Transportadora ABC', 'Destinatário', '1234567', 'ABC-1234', '12.345.678/0001-12', '1234567890', 10.00, 'Caixa', 'Marca XYZ', '123456', 100.00, 95.00, '001', 'Produto A', '1234.56.78', '101', '5102', 'UN', 10.00, 100.00, 1000.00, 1000.00, 180.00, 50.00, 18.00, 5.00, '1234567890', 200.00, 200.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
