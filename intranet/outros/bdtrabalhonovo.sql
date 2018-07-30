-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28-Nov-2017 às 19:07
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdtrabalhonovo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `dt_acesso` date DEFAULT NULL,
  `hr_acesso` time DEFAULT NULL,
  `cd_acesso` int(11) NOT NULL,
  `cd_login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`dt_acesso`, `hr_acesso`, `cd_acesso`, `cd_login`) VALUES
('2017-11-28', '15:55:43', 1, 32),
('2017-11-28', '15:56:54', 2, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `nm_tipo_cadastro` varchar(20) DEFAULT NULL,
  `dt_cadastro` date DEFAULT NULL,
  `cd_cadastro` int(11) NOT NULL,
  `cd_login` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`nm_tipo_cadastro`, `dt_cadastro`, `cd_cadastro`, `cd_login`) VALUES
('AlteraÃ§Ã£o', '2017-11-28', 1, 32),
('Novo', '2017-11-28', 2, 32),
('Novo', '2017-11-28', 3, 32),
('Novo', '2017-11-28', 4, 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `cd_conta` int(11) NOT NULL,
  `nm_conta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vl_conta` decimal(10,2) NOT NULL,
  `cd_movimentacao_conta` int(11) NOT NULL,
  `dt_vencimento_conta` date NOT NULL,
  `dt_pagamento_conta` date DEFAULT NULL,
  `cd_pessoa` int(11) NOT NULL,
  `cd_cadastro` int(11) NOT NULL,
  `nm_status_conta` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`cd_conta`, `nm_conta`, `vl_conta`, `cd_movimentacao_conta`, `dt_vencimento_conta`, `dt_pagamento_conta`, `cd_pessoa`, `cd_cadastro`, `nm_status_conta`) VALUES
(1, 'SalÃ¡rio', '1000.00', 0, '2017-11-28', '2017-11-28', 2, 2, 'Ativo'),
(2, 'Recebimento por ServiÃ§o', '5000.00', 1, '2017-11-01', '2017-11-01', 3, 4, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamento`
--

CREATE TABLE `departamento` (
  `nm_departamento` varchar(50) NOT NULL,
  `cd_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `departamento`
--

INSERT INTO `departamento` (`nm_departamento`, `cd_departamento`) VALUES
('Administrativo', 1),
('Financeiro', 2),
('Comercial', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `cd_login` int(11) NOT NULL,
  `nm_login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nm_senha_login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cd_pessoa` int(11) NOT NULL,
  `cd_cadastro` int(11) NOT NULL,
  `nm_status_login` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`cd_login`, `nm_login`, `nm_senha_login`, `cd_pessoa`, `cd_cadastro`, `nm_status_login`) VALUES
(32, 'andreAdmin', '12345', 1, 1, 'Ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `cd_pessoa` int(11) NOT NULL,
  `nm_pessoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cd_documento_pessoa` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nm_endereco_pessoa` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cd_ddd_pessoa` int(11) NOT NULL,
  `cd_telefone_pessoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nm_tipo_pessoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cd_cep_pessoa` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nm_email_pessoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nm_status_pessoa` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cd_cadastro` int(11) NOT NULL,
  `cd_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`cd_pessoa`, `nm_pessoa`, `cd_documento_pessoa`, `nm_endereco_pessoa`, `cd_ddd_pessoa`, `cd_telefone_pessoa`, `nm_tipo_pessoa`, `cd_cep_pessoa`, `nm_email_pessoa`, `nm_status_pessoa`, `cd_cadastro`, `cd_departamento`) VALUES
(1, 'AndrÃ©', '11111111111', 'Rua Rua Rua', 13, '1234-5678', 'Fisica', '11111-111', 'email@email.com', 'Inativo', 0, 1),
(2, 'AndrÃ©', '11111111111', 'Rua Rua Rua', 13, '1234-5678', 'Fisica', '11111-111', 'email@email.com', 'Ativo', 1, 0),
(3, 'Empresa Cliente', '22222222222222', 'Rua Rua', 13, '3333-3333', 'Juridica', '22222-222', 'email@email.com', 'Ativo', 3, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`cd_acesso`),
  ADD KEY `cd_login` (`cd_login`);

--
-- Indexes for table `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`cd_cadastro`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`cd_conta`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`cd_departamento`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`cd_login`);

--
-- Indexes for table `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`cd_pessoa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso`
--
ALTER TABLE `acesso`
  MODIFY `cd_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `cd_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `cd_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `cd_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `cd_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `acesso`
--
ALTER TABLE `acesso`
  ADD CONSTRAINT `cd_login` FOREIGN KEY (`cd_login`) REFERENCES `login` (`cd_login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
