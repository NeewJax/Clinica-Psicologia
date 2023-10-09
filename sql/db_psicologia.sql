-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Out-2023 às 00:21
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_psicologia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cadastro`
--

CREATE TABLE `tbl_cadastro` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `idade` int(11) NOT NULL,
  `nascimento` date NOT NULL,
  `localidade` varchar(50) NOT NULL,
  `escolaridade` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `renda_familiar` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `composicao_familiar` varchar(255) NOT NULL,
  `mora_com` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `cep` int(11) NOT NULL,
  `telefone_residencial` int(11) NOT NULL,
  `telefone_recado` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_cadastro`
--

INSERT INTO `tbl_cadastro` (`id`, `nome`, `sexo`, `idade`, `nascimento`, `localidade`, `escolaridade`, `profissao`, `renda_familiar`, `rg`, `cpf`, `estado_civil`, `composicao_familiar`, `mora_com`, `endereco`, `bairro`, `cidade`, `cep`, `telefone_residencial`, `telefone_recado`, `celular`, `email`) VALUES
(1, 'wilson pedro', 'masculino', 20, '1988-10-10', 'brasileiro', 'Superior', 'Estágio', 1000000000, 23123123, 12312312, 'solteiro', 'pais, avós, irmãos', 'pais', 'Rua das Goiabas', 'Bairro da Luz', 'São Lucas', 123443, 123213123, 123432432, 768768768, 'wilson@gmail.com'),
(3, 'pedro', 'masclino', 33, '1990-10-03', 'brasileiro', 'Superior', 'Astronauta', 1000000, 2423423, 33423525, 'casado', 'esposa, filhos', 'esposa, filhos', 'Rua da Luz', 'Bairro das Goiabas', 'São Luan', 5674654, 434324354, 654635, 234235, 'pedro@gmail.com'),
(4, 'Gabriel Bruno', 'Maculino', 60, '1957-10-04', 'são luís', 'Doutorado', 'Fiscal de Marte', 2147483647, 2147483647, 2147483647, 'Casado', 'Esposa', 'Esposa', 'Rua das Maças', 'Barro dos Limões', 'São Luís', 90900343, 78564564, 45436224, 2147483647, 'gabrielbruno@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_cadastro_menor`
--

CREATE TABLE `tbl_cadastro_menor` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome_do_responsavel` varchar(100) NOT NULL,
  `parentesco` varchar(100) NOT NULL,
  `rg` int(11) UNSIGNED NOT NULL,
  `celular` int(11) UNSIGNED NOT NULL,
  `cpf` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_cadastro_menor`
--

INSERT INTO `tbl_cadastro_menor` (`id`, `nome_do_responsavel`, `parentesco`, `rg`, `celular`, `cpf`) VALUES
(1, 'João Lucas', 'Primo', 123123, 345345, 567567);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_cadastro_menor`
--
ALTER TABLE `tbl_cadastro_menor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_cadastro_menor`
--
ALTER TABLE `tbl_cadastro_menor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
