-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Nov-2017 às 23:00
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
('2017-11-12', '00:33:04', 1, 1),
('2017-11-12', '00:37:02', 2, 2),
('2017-11-11', '21:40:02', 3, 1),
('2017-11-12', '16:22:55', 4, 1),
('2017-11-12', '16:44:21', 5, 1),
(NULL, NULL, 6, NULL),
('2017-11-12', '19:30:09', 7, 1),
('2017-11-12', '22:01:50', 8, 12),
('2017-11-12', '22:04:30', 9, 13),
('2017-11-12', '22:12:24', 10, 13),
('2017-11-12', '22:14:20', 11, 13),
('2017-11-12', '22:14:59', 12, 13);

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
('Novo', '2017-11-12', 1, 1),
('Novo', '2017-11-12', 2, 2),
('Novo', '2017-11-12', 3, 1),
('AlteraÃ§Ã£o', '2017-11-12', 4, 1),
('AlteraÃ§Ã£o', '2017-11-12', 5, 1),
('Novo', '2017-11-12', 6, 1),
('Novo', '2017-11-12', 7, 1),
('AlteraÃ§Ã£o', '2017-11-12', 8, 1),
('AlteraÃ§Ã£o', '2017-11-12', 9, 1),
('ExclusÃ£o', '2017-11-12', 10, 13),
('ExclusÃ£o', '2017-11-12', 11, 13),
('ExclusÃ£o', '2017-11-12', 12, 13),
('ExclusÃ£o', '2017-11-12', 13, 13),
('Novo', '2017-11-12', 14, 13),
('ExclusÃ£o', '2017-11-12', 15, 13),
('ExclusÃ£o', '2017-11-12', 16, 13),
('Novo', '2017-11-12', 17, 13),
('Novo', '2017-11-12', 18, 13),
('Novo', '2017-11-12', 19, 13),
('Novo', '2017-11-12', 20, 13),
('Novo', '2017-11-12', 21, 13),
('Novo', '2017-11-12', 22, 13),
('AlteraÃ§Ã£o', '2017-11-12', 23, 13),
('ExclusÃ£o', '2017-11-12', 24, 13),
('ExclusÃ£o', '2017-11-12', 25, 13),
('AlteraÃ§Ã£o', '2017-11-12', 26, 13),
('ExclusÃ£o', '2017-11-12', 27, 13),
('Novo', '2017-11-13', 28, 13),
('Novo', '2017-11-13', 29, 13),
('Novo', '2017-11-13', 30, 13),
('Novo', '2017-11-13', 31, 13),
('AlteraÃ§Ã£o', '2017-11-13', 32, 13),
('AlteraÃ§Ã£o', '2017-11-13', 33, 13),
('ExclusÃ£o', '2017-11-13', 34, 13);

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
(1, 'SalÃ¡rio', '900.00', 0, '2017-11-10', '2017-11-10', 1, 0, ''),
(2, 'ServiÃ§o Prestado', '500.00', 1, '2017-11-10', '2017-11-11', 1, 0, ''),
(3, 'Teste Lucro', '400.00', 0, '2017-11-10', '0000-00-00', 2, 0, '');

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
(1, 'andre', 'teste', 1, 1, NULL),
(2, 'andre2', 'teste', 2, 0, NULL),
(3, 'AndrÃ©22', 'fffs', 1, 0, NULL),
(4, 'fds', 'fffd', 2, 0, NULL),
(5, 'fd', '22', 2, 0, NULL),
(6, 'fdgdgg', 'gddd', 1, 2, NULL),
(7, '222', '232', 2, 3, NULL),
(8, '222', '232s', 2, 4, 'Inativo'),
(9, '222', '232ss', 2, 5, NULL),
(10, 'kk', '123', 0, 6, 'Ativo'),
(11, 'kkk', 'h12', 1, 7, 'Inativo'),
(12, 'kkk', 'h123', 1, 8, 'Inativo'),
(13, 'kkk', 'h1234', 1, 9, 'Inativo'),
(14, '', '', 0, 11, 'Ativo'),
(15, '', '', 0, 12, 'Ativo'),
(16, 'kkk', 'h1234', 1, 13, 'Inativo'),
(17, 'kkk2', 'h1234', 1, 14, 'Inativo'),
(18, 'kkk2', 'h1234', 1, 15, 'Inativo'),
(19, 'kkk', 'h1234', 1, 16, 'Inativo'),
(20, 'kkk', 'h1234', 1, 17, 'Inativo'),
(21, 'kkk', 'h1234', 1, 18, 'Inativo'),
(22, 'kkk', 'h1234', 1, 19, 'Ativo'),
(23, 'kkk', 'h1234', 1, 20, 'Ativo'),
(24, 'kkk', 'h1234', 1, 21, 'Inativo'),
(25, 'kkk', 'h1234', 1, 22, 'Inativo'),
(26, 'kkk2', 'h1234', 1, 23, 'Ativo'),
(27, 'kkk', 'h1234', 1, 24, 'Inativo'),
(28, 'kkk', 'h1234', 1, 25, 'Inativo'),
(29, 'kkkr', 'h1234', 1, 26, 'Ativo'),
(30, 'kkk', 'h1234', 1, 27, 'Inativo');

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
(1, 'AndrÃ©', '37559256805', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Ativo', 1, 1),
(2, 'AndrÃ©2', '37559256804', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Ativo', 1, 1),
(4, 'AndrÃ©', '37559256809', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Ativo', 0, 0),
(5, 'AndrÃ©', '37559256877', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Ativo', 0, 0),
(6, 'AndrÃ©', '37559256833', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Ativo', 0, 0),
(7, 'AndrÃ©', '37559256832', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Inativo', 31, 0),
(8, 'AndrÃ©1', '37559256832', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Inativo', 32, 0),
(9, 'AndrÃ©1', '37559256832', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Inativo', 33, 0),
(10, 'AndrÃ©1', '37559256832', 'Rua Jau', 13, '1234-6789', 'Fisica', '11700-170', 'andre@.com', 'Inativo', 34, 0);

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
  MODIFY `cd_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `cd_cadastro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `cd_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `cd_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `cd_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `acesso`
--
ALTER TABLE `acesso`
  ADD CONSTRAINT `cd_login` FOREIGN KEY (`cd_login`) REFERENCES `login` (`cd_login`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
