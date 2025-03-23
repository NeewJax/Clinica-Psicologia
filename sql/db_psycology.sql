-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/03/2025 às 21:01
-- Versão do servidor: 10.6.15-MariaDB
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_psycology`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_bairro`
--

CREATE TABLE `tbl_bairro` (
  `id` int(11) UNSIGNED NOT NULL,
  `bairro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_calendario_agendamento`
--

CREATE TABLE `tbl_calendario_agendamento` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome_paciente` varchar(255) NOT NULL,
  `data_consulta` date NOT NULL,
  `horario` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_consulta`
--

CREATE TABLE `tbl_consulta` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_terapeuta` int(11) NOT NULL,
  `id_paciente` int(11) UNSIGNED NOT NULL,
  `id_sala_reservada` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_contato`
--

CREATE TABLE `tbl_contato` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_paciente` int(11) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_disponibilidade`
--

CREATE TABLE `tbl_disponibilidade` (
  `id` int(11) UNSIGNED NOT NULL,
  `disponibilidade` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_disponibilidade`
--

INSERT INTO `tbl_disponibilidade` (`id`, `disponibilidade`) VALUES
(1, 'Disponível'),
(2, 'Indisponível');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_endereco`
--

CREATE TABLE `tbl_endereco` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_paciente` int(11) UNSIGNED NOT NULL,
  `id_bairro` int(11) UNSIGNED NOT NULL,
  `id_logradouro` int(11) UNSIGNED NOT NULL,
  `cep` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_escolaridade`
--

CREATE TABLE `tbl_escolaridade` (
  `id` int(11) UNSIGNED NOT NULL,
  `escolaridade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_escolaridade`
--

INSERT INTO `tbl_escolaridade` (`id`, `escolaridade`) VALUES
(1, 'Ensino Fundamental Incompleto'),
(2, 'Ensino Fundamental Completo'),
(3, 'Ensino Médio Incompleto'),
(4, 'Ensino Médio Completo'),
(5, 'Ensino Técnico'),
(6, 'Ensino Superior Incompleto'),
(7, 'Ensino Superior Completo'),
(8, 'Pós-Graduação Incompleta'),
(9, 'Pós-Graduação Completa'),
(10, 'Mestrado Incompleto'),
(11, 'Mestrado Completo'),
(12, 'Doutorado Incompleto'),
(13, 'Doutorado Completo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_estado_civil`
--

CREATE TABLE `tbl_estado_civil` (
  `id` int(11) UNSIGNED NOT NULL,
  `estado_civil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_estado_civil`
--

INSERT INTO `tbl_estado_civil` (`id`, `estado_civil`) VALUES
(1, 'Solteiro'),
(2, 'Casado'),
(3, 'Separado'),
(4, 'Divorciado'),
(5, 'Viúvo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_genero`
--

CREATE TABLE `tbl_genero` (
  `id` int(11) UNSIGNED NOT NULL,
  `sexo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_genero`
--

INSERT INTO `tbl_genero` (`id`, `sexo`) VALUES
(1, 'Masculino'),
(2, 'Feminino'),
(3, 'Outro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_horario_sala`
--

CREATE TABLE `tbl_horario_sala` (
  `id` int(11) UNSIGNED NOT NULL,
  `horario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_horario_sala`
--

INSERT INTO `tbl_horario_sala` (`id`, `horario`) VALUES
(1, '08H'),
(2, '09H'),
(3, '10H'),
(4, '11H'),
(5, '14H'),
(6, '15H'),
(7, '16H'),
(8, '17H');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_logradouro`
--

CREATE TABLE `tbl_logradouro` (
  `id` int(10) UNSIGNED NOT NULL,
  `logradouro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_maturidade`
--

CREATE TABLE `tbl_maturidade` (
  `id` int(11) NOT NULL,
  `maturidade` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_maturidade`
--

INSERT INTO `tbl_maturidade` (`id`, `maturidade`) VALUES
(1, 'Adulto'),
(2, 'Criança');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_monitor`
--

CREATE TABLE `tbl_monitor` (
  `id` int(11) NOT NULL,
  `id_disponibilidade` int(11) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_paciente`
--

CREATE TABLE `tbl_paciente` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(150) NOT NULL,
  `nascimento` date NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` int(11) NOT NULL,
  `id_genero` int(11) UNSIGNED NOT NULL,
  `id_contato` int(11) UNSIGNED NOT NULL,
  `id_escolaridade` int(11) UNSIGNED NOT NULL,
  `id_profissao` int(11) UNSIGNED NOT NULL,
  `id_renda_familiar` int(11) UNSIGNED NOT NULL,
  `id_estado_civil` int(11) UNSIGNED NOT NULL,
  `id_endereco` int(11) UNSIGNED NOT NULL,
  `id_maturidade` int(11) NOT NULL,
  `nome_responsavel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_professor`
--

CREATE TABLE `tbl_professor` (
  `id` int(11) NOT NULL,
  `id_disponibilidade` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_profissao`
--

CREATE TABLE `tbl_profissao` (
  `id` int(11) UNSIGNED NOT NULL,
  `profissao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_renda_familiar`
--

CREATE TABLE `tbl_renda_familiar` (
  `id` int(11) UNSIGNED NOT NULL,
  `renda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_renda_familiar`
--

INSERT INTO `tbl_renda_familiar` (`id`, `renda`) VALUES
(1, 'Até 2000'),
(2, 'De 2000 a 4000'),
(3, 'De 4000 a 10000'),
(4, 'De 10000 a 20000'),
(5, 'Acima de 20000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_sala_reservada`
--

CREATE TABLE `tbl_sala_reservada` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_turno` int(11) UNSIGNED NOT NULL,
  `id_horario` int(11) UNSIGNED NOT NULL,
  `id_semana` int(11) UNSIGNED NOT NULL,
  `id_status` int(11) UNSIGNED NOT NULL,
  `id_terapeuta` int(11) DEFAULT NULL,
  `id_paciente` int(11) UNSIGNED DEFAULT NULL,
  `sala_cod` varchar(20) NOT NULL,
  `sala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_sala_reservada`
--

INSERT INTO `tbl_sala_reservada` (`id`, `id_turno`, `id_horario`, `id_semana`, `id_status`, `id_terapeuta`, `id_paciente`, `sala_cod`, `sala`) VALUES
(1, 1, 1, 1, 1, NULL, NULL, 'seg_m_8_s1', 'Lucio - Wilson'),
(2, 1, 1, 1, 2, NULL, NULL, 'seg_m_8_s2', '---'),
(3, 1, 1, 1, 4, NULL, NULL, 'seg_m_8_s3', 'Ana - Lucas'),
(4, 1, 1, 1, 2, NULL, NULL, 'seg_m_8_s4', '---'),
(5, 1, 1, 1, 3, NULL, NULL, 'seg_m_8_s5', 'Ana - Wilson'),
(6, 1, 1, 1, 2, NULL, NULL, 'seg_m_8_s6', '---'),
(7, 1, 1, 1, 1, NULL, NULL, 'seg_m_8_s7', 'Ana - Mara'),
(8, 1, 2, 1, 2, NULL, NULL, 'seg_m_9_s1', '---'),
(9, 1, 2, 1, 3, NULL, NULL, 'seg_m_9_s2', 'Ana - Lucas'),
(10, 1, 2, 1, 1, NULL, NULL, 'seg_m_9_s3', 'Lucio - Wilson'),
(11, 1, 2, 1, 1, NULL, NULL, 'seg_m_9_s4', 'Ana - Wilson'),
(12, 1, 2, 1, 2, NULL, NULL, 'seg_m_9_s5', 'Ana - Wilson'),
(13, 1, 2, 1, 2, NULL, NULL, 'seg_m_9_s6', '---'),
(14, 1, 2, 1, 2, NULL, NULL, 'seg_m_9_s7', '---'),
(15, 1, 3, 1, 2, NULL, NULL, 'seg_m_10_s1', '---'),
(16, 1, 3, 1, 2, NULL, NULL, 'seg_m_10_s2', '---'),
(17, 1, 3, 1, 2, NULL, NULL, 'seg_m_10_s3', '---'),
(18, 1, 3, 1, 2, NULL, NULL, 'seg_m_10_s4', '---'),
(19, 1, 3, 1, 2, NULL, NULL, 'seg_m_10_s5', '---'),
(20, 1, 3, 1, 2, NULL, NULL, 'seg_m_10_s6', 'Ana - Mara'),
(21, 1, 3, 1, 2, NULL, NULL, 'seg_m_10_s7', '---'),
(22, 1, 4, 1, 2, NULL, NULL, 'seg_m_11_s1', '---'),
(23, 1, 4, 1, 2, NULL, NULL, 'seg_m_11_s2', '---'),
(24, 1, 4, 1, 2, NULL, NULL, 'seg_m_11_s3', '---'),
(25, 1, 4, 1, 2, NULL, NULL, 'seg_m_11_s4', '---'),
(26, 1, 4, 1, 2, NULL, NULL, 'seg_m_11_s5', '---'),
(27, 1, 4, 1, 2, NULL, NULL, 'seg_m_11_s6', '---'),
(28, 1, 4, 1, 2, NULL, NULL, 'seg_m_11_s7', '---'),
(29, 2, 5, 1, 2, NULL, NULL, 'seg_t_14_s1', '---'),
(30, 2, 5, 1, 2, NULL, NULL, 'seg_t_14_s2', '---'),
(31, 2, 5, 1, 2, NULL, NULL, 'seg_t_14_s3', '---'),
(32, 2, 5, 1, 2, NULL, NULL, 'seg_t_14_s4', '---'),
(33, 2, 5, 1, 2, NULL, NULL, 'seg_t_14_s5', '---'),
(34, 2, 5, 1, 2, NULL, NULL, 'seg_t_14_s6', '---'),
(35, 2, 5, 1, 2, NULL, NULL, 'seg_t_14_s7', '---'),
(36, 2, 6, 1, 2, NULL, NULL, 'seg_t_15_s1', '---'),
(37, 2, 6, 1, 2, NULL, NULL, 'seg_t_15_s2', '---'),
(38, 2, 6, 1, 2, NULL, NULL, 'seg_t_15_s3', '---'),
(39, 2, 6, 1, 2, NULL, NULL, 'seg_t_15_s4', '---'),
(40, 2, 6, 1, 2, NULL, NULL, 'seg_t_15_s5', '---'),
(41, 2, 6, 1, 2, NULL, NULL, 'seg_t_15_s6', '---'),
(42, 2, 6, 1, 2, NULL, NULL, 'seg_t_15_s7', '---'),
(43, 2, 7, 1, 2, NULL, NULL, 'seg_t_16_s1', '---'),
(44, 2, 7, 1, 2, NULL, NULL, 'seg_t_16_s2', '---'),
(45, 2, 7, 1, 2, NULL, NULL, 'seg_t_16_s3', '---'),
(46, 2, 7, 1, 2, NULL, NULL, 'seg_t_16_s4', '---'),
(47, 2, 7, 1, 3, NULL, NULL, 'seg_t_16_s5', 'Ana - Mara'),
(48, 2, 7, 1, 2, NULL, NULL, 'seg_t_16_s6', '---'),
(49, 2, 7, 1, 2, NULL, NULL, 'seg_t_16_s7', '---'),
(50, 2, 8, 1, 2, NULL, NULL, 'seg_t_17_s1', '---'),
(51, 2, 8, 1, 2, NULL, NULL, 'seg_t_17_s2', '---'),
(52, 2, 8, 1, 2, NULL, NULL, 'seg_t_17_s3', '---'),
(53, 2, 8, 1, 2, NULL, NULL, 'seg_t_17_s4', '---'),
(54, 2, 8, 1, 2, NULL, NULL, 'seg_t_17_s5', '---'),
(55, 2, 8, 1, 2, NULL, NULL, 'seg_t_17_s6', '---'),
(56, 2, 8, 1, 2, NULL, NULL, 'seg_t_17_s7', '---'),
(57, 1, 1, 2, 2, NULL, NULL, 'ter_m_8_s1', '---'),
(58, 1, 1, 2, 2, NULL, NULL, 'ter_m_8_s2', '---'),
(59, 1, 1, 2, 2, NULL, NULL, 'ter_m_8_s3', '---'),
(60, 1, 1, 2, 2, NULL, NULL, 'ter_m_8_s4', '---'),
(61, 1, 1, 2, 2, NULL, NULL, 'ter_m_8_s5', '---'),
(62, 1, 1, 2, 1, NULL, NULL, 'ter_m_8_s6', 'Lucio - Wilson'),
(63, 1, 1, 2, 2, NULL, NULL, 'ter_m_8_s7', '---'),
(64, 1, 2, 2, 2, NULL, NULL, 'ter_m_9_s1', '---'),
(65, 1, 2, 2, 2, NULL, NULL, 'ter_m_9_s2', '---'),
(66, 1, 2, 2, 2, NULL, NULL, 'ter_m_9_s3', '---'),
(67, 1, 2, 2, 2, NULL, NULL, 'ter_m_9_s4', '---'),
(68, 1, 2, 2, 3, NULL, NULL, 'ter_m_9_s5', '---'),
(69, 1, 2, 2, 2, NULL, NULL, 'ter_m_9_s6', '---'),
(70, 1, 2, 2, 2, NULL, NULL, 'ter_m_9_s7', '---'),
(71, 1, 3, 2, 2, NULL, NULL, 'ter_m_10_s1', '---'),
(72, 1, 3, 2, 2, NULL, NULL, 'ter_m_10_s2', '---'),
(73, 1, 3, 2, 2, NULL, NULL, 'ter_m_10_s3', '---'),
(74, 1, 3, 2, 1, NULL, NULL, 'ter_m_10_s4', 'Ana - Wilson'),
(75, 1, 3, 2, 2, NULL, NULL, 'ter_m_10_s5', '---'),
(76, 1, 3, 2, 2, NULL, NULL, 'ter_m_10_s6', '---'),
(77, 1, 3, 2, 2, NULL, NULL, 'ter_m_10_s7', '---'),
(78, 1, 4, 2, 2, NULL, NULL, 'ter_m_11_s1', '---'),
(79, 1, 4, 2, 2, NULL, NULL, 'ter_m_11_s2', '---'),
(80, 1, 4, 2, 2, NULL, NULL, 'ter_m_11_s3', '---'),
(81, 1, 4, 2, 2, NULL, NULL, 'ter_m_11_s4', '---'),
(82, 1, 4, 2, 2, NULL, NULL, 'ter_m_11_s5', '---'),
(83, 1, 4, 2, 2, NULL, NULL, 'ter_m_11_s6', '---'),
(84, 1, 4, 2, 2, NULL, NULL, 'ter_m_11_s7', '---'),
(85, 2, 5, 2, 2, NULL, NULL, 'ter_t_14_s1', '---'),
(86, 2, 5, 2, 2, NULL, NULL, 'ter_t_14_s2', '---'),
(87, 2, 5, 2, 2, NULL, NULL, 'ter_t_14_s3', '---'),
(88, 2, 5, 2, 2, NULL, NULL, 'ter_t_14_s4', '---'),
(89, 2, 5, 2, 2, NULL, NULL, 'ter_t_14_s5', '---'),
(90, 2, 5, 2, 2, NULL, NULL, 'ter_t_14_s6', '---'),
(91, 2, 5, 2, 2, NULL, NULL, 'ter_t_14_s7', '---'),
(92, 2, 6, 2, 2, NULL, NULL, 'ter_t_15_s1', '---'),
(93, 2, 6, 2, 2, NULL, NULL, 'ter_t_15_s2', '---'),
(94, 2, 6, 2, 2, NULL, NULL, 'ter_t_15_s3', '---'),
(95, 2, 6, 2, 2, NULL, NULL, 'ter_t_15_s4', '---'),
(96, 2, 6, 2, 2, NULL, NULL, 'ter_t_15_s5', '---'),
(97, 2, 6, 2, 2, NULL, NULL, 'ter_t_15_s6', '---'),
(98, 2, 6, 2, 2, NULL, NULL, 'ter_t_15_s7', '---'),
(99, 2, 7, 2, 2, NULL, NULL, 'ter_t_16_s1', '---'),
(100, 2, 7, 2, 2, NULL, NULL, 'ter_t_16_s2', '---'),
(101, 2, 7, 2, 2, NULL, NULL, 'ter_t_16_s3', '---'),
(102, 2, 7, 2, 2, NULL, NULL, 'ter_t_16_s4', '---'),
(103, 2, 7, 2, 2, NULL, NULL, 'ter_t_16_s5', '---'),
(104, 2, 7, 2, 2, NULL, NULL, 'ter_t_16_s6', '---'),
(105, 2, 7, 2, 2, NULL, NULL, 'ter_t_16_s7', '---'),
(106, 2, 8, 2, 2, NULL, NULL, 'ter_t_17_s1', '---'),
(107, 2, 8, 2, 2, NULL, NULL, 'ter_t_17_s2', '---'),
(108, 2, 8, 2, 2, NULL, NULL, 'ter_t_17_s3', '---'),
(109, 2, 8, 2, 2, NULL, NULL, 'ter_t_17_s4', '---'),
(110, 2, 8, 2, 2, NULL, NULL, 'ter_t_17_s5', '---'),
(111, 2, 8, 2, 2, NULL, NULL, 'ter_t_17_s6', '---'),
(112, 2, 8, 2, 2, NULL, NULL, 'ter_t_17_s7', '---'),
(113, 1, 1, 3, 2, NULL, NULL, 'qua_m_8_s1', '---'),
(114, 1, 1, 3, 2, NULL, NULL, 'qua_m_8_s2', '---'),
(115, 1, 1, 3, 2, NULL, NULL, 'qua_m_8_s3', '---'),
(116, 1, 1, 3, 2, NULL, NULL, 'qua_m_8_s4', '---'),
(117, 1, 1, 3, 2, NULL, NULL, 'qua_m_8_s5', '---'),
(118, 1, 1, 3, 2, NULL, NULL, 'qua_m_8_s6', '---'),
(119, 1, 1, 3, 2, NULL, NULL, 'qua_m_8_s7', '---'),
(120, 1, 2, 3, 2, NULL, NULL, 'qua_m_9_s1', '---'),
(121, 1, 2, 3, 2, NULL, NULL, 'qua_m_9_s2', '---'),
(122, 1, 2, 3, 2, NULL, NULL, 'qua_m_9_s3', '---'),
(123, 1, 2, 3, 2, NULL, NULL, 'qua_m_9_s4', '---'),
(124, 1, 2, 3, 2, NULL, NULL, 'qua_m_9_s5', '---'),
(125, 1, 2, 3, 2, NULL, NULL, 'qua_m_9_s6', '---'),
(126, 1, 2, 3, 2, NULL, NULL, 'qua_m_9_s7', '---'),
(127, 1, 3, 3, 2, NULL, NULL, 'qua_m_10_s1', '---'),
(128, 1, 3, 3, 2, NULL, NULL, 'qua_m_10_s2', '---'),
(129, 1, 3, 3, 2, NULL, NULL, 'qua_m_10_s3', '---'),
(130, 1, 3, 3, 3, NULL, NULL, 'qua_m_10_s4', 'Lucio - Mara'),
(131, 1, 3, 3, 2, NULL, NULL, 'qua_m_10_s5', '---'),
(132, 1, 3, 3, 2, NULL, NULL, 'qua_m_10_s6', '---'),
(133, 1, 3, 3, 2, NULL, NULL, 'qua_m_10_s7', '---'),
(134, 1, 4, 3, 2, NULL, NULL, 'qua_m_11_s1', '---'),
(135, 1, 4, 3, 2, NULL, NULL, 'qua_m_11_s2', '---'),
(136, 1, 4, 3, 2, NULL, NULL, 'qua_m_11_s3', '---'),
(137, 1, 4, 3, 2, NULL, NULL, 'qua_m_11_s4', '---'),
(138, 1, 4, 3, 2, NULL, NULL, 'qua_m_11_s5', '---'),
(139, 1, 4, 3, 2, NULL, NULL, 'qua_m_11_s6', '---'),
(140, 1, 4, 3, 2, NULL, NULL, 'qua_m_11_s7', '---'),
(141, 2, 5, 3, 2, NULL, NULL, 'qua_m_14_s1', '---'),
(142, 2, 5, 3, 2, NULL, NULL, 'qua_m_14_s2', '---'),
(143, 2, 5, 3, 2, NULL, NULL, 'qua_m_14_s3', '---'),
(144, 2, 5, 3, 2, NULL, NULL, 'qua_m_14_s4', '---'),
(145, 2, 5, 3, 2, NULL, NULL, 'qua_m_14_s5', '---'),
(146, 2, 5, 3, 2, NULL, NULL, 'qua_m_14_s6', '---'),
(147, 2, 5, 3, 2, NULL, NULL, 'qua_m_14_s7', '---'),
(148, 2, 6, 3, 2, NULL, NULL, 'qua_m_15_s1', '---'),
(149, 2, 6, 3, 2, NULL, NULL, 'qua_m_15_s2', '---'),
(150, 2, 6, 3, 2, NULL, NULL, 'qua_m_15_s3', '---'),
(151, 2, 6, 3, 2, NULL, NULL, 'qua_m_15_s4', '---'),
(152, 2, 6, 3, 2, NULL, NULL, 'qua_m_15_s5', '---'),
(153, 2, 6, 3, 4, NULL, NULL, 'qua_m_15_s6', '---'),
(154, 2, 6, 3, 2, NULL, NULL, 'qua_m_15_s7', '---'),
(155, 2, 7, 3, 2, NULL, NULL, 'qua_m_16_s1', '---'),
(156, 2, 7, 3, 2, NULL, NULL, 'qua_m_16_s2', '---'),
(157, 2, 7, 3, 2, NULL, NULL, 'qua_m_16_s3', '---'),
(158, 2, 7, 3, 2, NULL, NULL, 'qua_m_16_s4', '---'),
(159, 2, 7, 3, 2, NULL, NULL, 'qua_m_16_s5', '---'),
(160, 2, 7, 3, 2, NULL, NULL, 'qua_m_16_s6', '---'),
(161, 2, 7, 3, 2, NULL, NULL, 'qua_m_16_s7', '---'),
(162, 2, 8, 3, 2, NULL, NULL, 'qua_m_17_s1', '---'),
(163, 2, 8, 3, 2, NULL, NULL, 'qua_m_17_s2', '---'),
(164, 2, 8, 3, 2, NULL, NULL, 'qua_m_17_s3', '---'),
(165, 2, 8, 3, 2, NULL, NULL, 'qua_m_17_s4', '---'),
(166, 2, 8, 3, 2, NULL, NULL, 'qua_m_17_s5', '---'),
(167, 2, 8, 3, 2, NULL, NULL, 'qua_m_17_s6', '---'),
(168, 2, 8, 3, 2, NULL, NULL, 'qua_m_17_s7', '---'),
(169, 1, 1, 4, 2, NULL, NULL, 'qui_m_8_s1', '---'),
(170, 1, 1, 4, 2, NULL, NULL, 'qui_m_8_s2', '---'),
(171, 1, 1, 4, 2, NULL, NULL, 'qui_m_8_s3', '---'),
(172, 1, 1, 4, 2, NULL, NULL, 'qui_m_8_s4', '---'),
(173, 1, 1, 4, 2, NULL, NULL, 'qui_m_8_s5', '---'),
(174, 1, 1, 4, 2, NULL, NULL, 'qui_m_8_s6', '---'),
(175, 1, 1, 4, 2, NULL, NULL, 'qui_m_8_s7', '---'),
(176, 1, 2, 4, 2, NULL, NULL, 'qui_m_9_s1', '---'),
(177, 1, 2, 4, 2, NULL, NULL, 'qui_m_9_s2', '---'),
(178, 1, 2, 4, 2, NULL, NULL, 'qui_m_9_s3', '---'),
(179, 1, 2, 4, 2, NULL, NULL, 'qui_m_9_s4', '---'),
(180, 1, 2, 4, 2, NULL, NULL, 'qui_m_9_s5', '---'),
(181, 1, 2, 4, 2, NULL, NULL, 'qui_m_9_s6', '---'),
(182, 1, 2, 4, 2, NULL, NULL, 'qui_m_9_s7', '---'),
(183, 1, 3, 4, 3, NULL, NULL, 'qui_m_10_s1', 'Ana - Lucas'),
(184, 1, 3, 4, 2, NULL, NULL, 'qui_m_10_s2', '---'),
(185, 1, 3, 4, 4, NULL, NULL, 'qui_m_10_s3', 'Ana - Wilson'),
(186, 1, 3, 4, 2, NULL, NULL, 'qui_m_10_s4', '---'),
(187, 1, 3, 4, 2, NULL, NULL, 'qui_m_10_s5', '---'),
(188, 1, 3, 4, 2, NULL, NULL, 'qui_m_10_s6', '---'),
(189, 1, 3, 4, 2, NULL, NULL, 'qui_m_10_s7', '---'),
(190, 1, 4, 4, 2, NULL, NULL, 'qui_m_11_s1', '---'),
(191, 1, 4, 4, 2, NULL, NULL, 'qui_m_11_s2', '---'),
(192, 1, 4, 4, 2, NULL, NULL, 'qui_m_11_s3', '---'),
(193, 1, 4, 4, 2, NULL, NULL, 'qui_m_11_s4', '---'),
(194, 1, 4, 4, 2, NULL, NULL, 'qui_m_11_s5', '---'),
(195, 1, 4, 4, 2, NULL, NULL, 'qui_m_11_s6', '---'),
(196, 1, 4, 4, 2, NULL, NULL, 'qui_m_11_s7', '---'),
(197, 2, 5, 4, 2, NULL, NULL, 'qui_t_14_s1', '---'),
(198, 2, 5, 4, 2, NULL, NULL, 'qui_t_14_s2', '---'),
(199, 2, 5, 4, 2, NULL, NULL, 'qui_t_14_s3', '---'),
(200, 2, 5, 4, 2, NULL, NULL, 'qui_t_14_s4', '---'),
(201, 2, 5, 4, 2, NULL, NULL, 'qui_t_14_s5', '---'),
(202, 2, 5, 4, 2, NULL, NULL, 'qui_t_14_s6', '---'),
(203, 2, 5, 4, 2, NULL, NULL, 'qui_t_14_s7', '---'),
(204, 2, 6, 4, 2, NULL, NULL, 'qui_t_15_s1', '---'),
(205, 2, 6, 4, 2, NULL, NULL, 'qui_t_15_s2', '---'),
(206, 2, 6, 4, 2, NULL, NULL, 'qui_t_15_s3', '---'),
(207, 2, 6, 4, 2, NULL, NULL, 'qui_t_15_s4', '---'),
(208, 2, 6, 4, 2, NULL, NULL, 'qui_t_15_s5', '---'),
(209, 2, 6, 4, 2, NULL, NULL, 'qui_t_15_s6', '---'),
(210, 2, 6, 4, 2, NULL, NULL, 'qui_t_15_s7', '---'),
(211, 2, 7, 4, 2, NULL, NULL, 'qui_t_16_s1', '---'),
(212, 2, 7, 4, 2, NULL, NULL, 'qui_t_16_s2', '---'),
(213, 2, 7, 4, 2, NULL, NULL, 'qui_t_16_s3', '---'),
(214, 2, 7, 4, 2, NULL, NULL, 'qui_t_16_s4', '---'),
(215, 2, 7, 4, 2, NULL, NULL, 'qui_t_16_s5', '---'),
(216, 2, 7, 4, 2, NULL, NULL, 'qui_t_16_s6', '---'),
(217, 2, 7, 4, 2, NULL, NULL, 'qui_t_16_s7', '---'),
(218, 2, 8, 4, 2, NULL, NULL, 'qui_t_17_s1', '---'),
(219, 2, 8, 4, 2, NULL, NULL, 'qui_t_17_s2', '---'),
(220, 2, 8, 4, 2, NULL, NULL, 'qui_t_17_s3', '---'),
(221, 2, 8, 4, 2, NULL, NULL, 'qui_t_17_s4', '---'),
(222, 2, 8, 4, 2, NULL, NULL, 'qui_t_17_s5', '---'),
(223, 2, 8, 4, 2, NULL, NULL, 'qui_t_17_s6', '---'),
(224, 2, 8, 4, 2, NULL, NULL, 'qui_t_17_s7', '---'),
(225, 1, 1, 5, 2, NULL, NULL, 'sex_m_8_s1', '---'),
(226, 1, 1, 5, 2, NULL, NULL, 'sex_m_8_s2', '---'),
(227, 1, 1, 5, 2, NULL, NULL, 'sex_m_8_s3', '---'),
(228, 1, 1, 5, 2, NULL, NULL, 'sex_m_8_s4', '---'),
(229, 1, 1, 5, 2, NULL, NULL, 'sex_m_8_s5', '---'),
(230, 1, 1, 5, 2, NULL, NULL, 'sex_m_8_s6', '---'),
(231, 1, 1, 5, 1, NULL, NULL, 'sex_m_8_s7', '---'),
(232, 1, 2, 5, 2, NULL, NULL, 'sex_m_9_s1', '---'),
(233, 1, 2, 5, 2, NULL, NULL, 'sex_m_9_s2', '---'),
(234, 1, 2, 5, 2, NULL, NULL, 'sex_m_9_s3', '---'),
(235, 1, 2, 5, 2, NULL, NULL, 'sex_m_9_s4', '---'),
(236, 1, 2, 5, 2, NULL, NULL, 'sex_m_9_s5', '---'),
(237, 1, 2, 5, 2, NULL, NULL, 'sex_m_9_s6', '---'),
(238, 1, 2, 5, 4, NULL, NULL, 'sex_m_9_s7', '---'),
(239, 1, 3, 5, 2, NULL, NULL, 'sex_m_10_s1', '---'),
(240, 1, 3, 5, 2, NULL, NULL, 'sex_m_10_s2', '---'),
(241, 1, 3, 5, 2, NULL, NULL, 'sex_m_10_s3', '---'),
(242, 1, 3, 5, 2, NULL, NULL, 'sex_m_10_s4', '---'),
(243, 1, 3, 5, 3, NULL, NULL, 'sex_m_10_s5', '---'),
(244, 1, 3, 5, 2, NULL, NULL, 'sex_m_10_s6', '---'),
(245, 1, 3, 5, 2, NULL, NULL, 'sex_m_10_s7', '---'),
(246, 1, 4, 5, 2, NULL, NULL, 'sex_m_11_s1', '---'),
(247, 1, 4, 5, 2, NULL, NULL, 'sex_m_11_s2', '---'),
(248, 1, 4, 5, 2, NULL, NULL, 'sex_m_11_s3', '---'),
(249, 1, 4, 5, 2, NULL, NULL, 'sex_m_11_s4', '---'),
(250, 1, 4, 5, 2, NULL, NULL, 'sex_m_11_s5', '---'),
(251, 1, 4, 5, 2, NULL, NULL, 'sex_m_11_s6', '---'),
(252, 1, 4, 5, 2, NULL, NULL, 'sex_m_11_s7', '---'),
(253, 2, 5, 5, 2, NULL, NULL, 'sex_t_14_s1', '---'),
(254, 2, 5, 5, 2, NULL, NULL, 'sex_t_14_s2', '---'),
(255, 2, 5, 5, 2, NULL, NULL, 'sex_t_14_s3', '---'),
(256, 2, 5, 5, 2, NULL, NULL, 'sex_t_14_s4', '---'),
(257, 2, 5, 5, 2, NULL, NULL, 'sex_t_14_s5', '---'),
(258, 2, 5, 5, 2, NULL, NULL, 'sex_t_14_s6', '---'),
(259, 2, 5, 5, 2, NULL, NULL, 'sex_t_14_s7', '---'),
(260, 2, 6, 5, 2, NULL, NULL, 'sex_t_15_s1', '---'),
(261, 2, 6, 5, 2, NULL, NULL, 'sex_t_15_s2', '---'),
(262, 2, 6, 5, 2, NULL, NULL, 'sex_t_15_s3', '---'),
(263, 2, 6, 5, 2, NULL, NULL, 'sex_t_15_s4', '---'),
(264, 2, 6, 5, 2, NULL, NULL, 'sex_t_15_s5', '---'),
(265, 2, 6, 5, 2, NULL, NULL, 'sex_t_15_s6', '---'),
(266, 2, 6, 5, 2, NULL, NULL, 'sex_t_15_s7', '---'),
(267, 2, 7, 5, 2, NULL, NULL, 'sex_t_16_s1', '---'),
(268, 2, 7, 5, 2, NULL, NULL, 'sex_t_16_s2', '---'),
(269, 2, 7, 5, 2, NULL, NULL, 'sex_t_16_s3', '---'),
(270, 2, 7, 5, 2, NULL, NULL, 'sex_t_16_s4', '---'),
(271, 2, 7, 5, 2, NULL, NULL, 'sex_t_16_s5', '---'),
(272, 2, 7, 5, 2, NULL, NULL, 'sex_t_16_s6', '---'),
(273, 2, 7, 5, 2, NULL, NULL, 'sex_t_16_s7', '---'),
(274, 2, 8, 5, 2, NULL, NULL, 'sex_t_17_s1', '---'),
(275, 2, 8, 5, 2, NULL, NULL, 'sex_t_17_s2', '---'),
(276, 2, 8, 5, 2, NULL, NULL, 'sex_t_17_s3', '---'),
(277, 2, 8, 5, 2, NULL, NULL, 'sex_t_17_s4', '---'),
(278, 2, 8, 5, 2, NULL, NULL, 'sex_t_17_s5', '---'),
(279, 2, 8, 5, 2, NULL, NULL, 'sex_t_17_s6', '---'),
(280, 2, 8, 5, 2, NULL, NULL, 'sex_t_17_s7', '---');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_semana`
--

CREATE TABLE `tbl_semana` (
  `id` int(11) UNSIGNED NOT NULL,
  `semana` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_semana`
--

INSERT INTO `tbl_semana` (`id`, `semana`) VALUES
(1, 'segunda'),
(2, 'terça'),
(3, 'quarta'),
(4, 'quinta'),
(5, 'sexta');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_status_sala`
--

CREATE TABLE `tbl_status_sala` (
  `id` int(11) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_status_sala`
--

INSERT INTO `tbl_status_sala` (`id`, `status`) VALUES
(1, 'reservada'),
(2, 'livre'),
(3, 'encaixe'),
(4, 'triagem');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_turno`
--

CREATE TABLE `tbl_turno` (
  `id` int(11) UNSIGNED NOT NULL,
  `turno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_turno`
--

INSERT INTO `tbl_turno` (`id`, `turno`) VALUES
(1, 'MANHÃ'),
(2, 'TARDE');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `nome`, `email`, `senha`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$Z3w1Yd9AiDlTUIgSa.rT5eQb.4Brv3pi6f41.gaiVBOSy7zqElSau', '2023-10-27 04:05:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_user_terapeuta`
--

CREATE TABLE `tbl_user_terapeuta` (
  `id` int(11) NOT NULL,
  `id_disponibilidade` int(11) UNSIGNED NOT NULL,
  `id_professor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_bairro`
--
ALTER TABLE `tbl_bairro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_calendario_agendamento`
--
ALTER TABLE `tbl_calendario_agendamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_consulta_terapeuta` (`id_terapeuta`),
  ADD KEY `fk_consulta_paciente` (`id_paciente`),
  ADD KEY `fk_consulta_sala_reservada` (`id_sala_reservada`);

--
-- Índices de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contato_paciente` (`id_paciente`);

--
-- Índices de tabela `tbl_disponibilidade`
--
ALTER TABLE `tbl_disponibilidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_endereco`
--
ALTER TABLE `tbl_endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_endereco_paciente` (`id_paciente`),
  ADD KEY `fk_endereco_bairro` (`id_bairro`),
  ADD KEY `fk_aluno_logradouro` (`id_logradouro`);

--
-- Índices de tabela `tbl_escolaridade`
--
ALTER TABLE `tbl_escolaridade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_estado_civil`
--
ALTER TABLE `tbl_estado_civil`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_genero`
--
ALTER TABLE `tbl_genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_horario_sala`
--
ALTER TABLE `tbl_horario_sala`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_logradouro`
--
ALTER TABLE `tbl_logradouro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_maturidade`
--
ALTER TABLE `tbl_maturidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_monitor`
--
ALTER TABLE `tbl_monitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_monitor_disponibilidadee` (`id_disponibilidade`);

--
-- Índices de tabela `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_paciente_contato` (`id_contato`),
  ADD KEY `fk_paciente_estado_civil` (`id_estado_civil`),
  ADD KEY `fk_paciente_renda_familar` (`id_renda_familiar`),
  ADD KEY `fk_paciente_escolaridade` (`id_escolaridade`),
  ADD KEY `fk_paciente_profissao` (`id_profissao`),
  ADD KEY `fk_paciente_endereco` (`id_endereco`),
  ADD KEY `fk_paciente_genero` (`id_genero`),
  ADD KEY `fk_paciente_maturidade` (`id_maturidade`);

--
-- Índices de tabela `tbl_professor`
--
ALTER TABLE `tbl_professor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_professor_disciplina` (`id_disponibilidade`);

--
-- Índices de tabela `tbl_profissao`
--
ALTER TABLE `tbl_profissao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_renda_familiar`
--
ALTER TABLE `tbl_renda_familiar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_sala_reservada`
--
ALTER TABLE `tbl_sala_reservada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_sala_turno` (`id_turno`),
  ADD KEY `fk_reserva_sala_horario` (`id_horario`),
  ADD KEY `fk_reserva_sala_semana` (`id_semana`),
  ADD KEY `fk_reserva_sala_status` (`id_status`),
  ADD KEY `fk_reserva_sala_paciente` (`id_paciente`),
  ADD KEY `fk_reserva_sala_terapeuta` (`id_terapeuta`);

--
-- Índices de tabela `tbl_semana`
--
ALTER TABLE `tbl_semana`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_status_sala`
--
ALTER TABLE `tbl_status_sala`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_turno`
--
ALTER TABLE `tbl_turno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_user_terapeuta`
--
ALTER TABLE `tbl_user_terapeuta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_terapeuta_disponibilidade` (`id_disponibilidade`),
  ADD KEY `fk_terapeuta_professor` (`id_professor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_bairro`
--
ALTER TABLE `tbl_bairro`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_calendario_agendamento`
--
ALTER TABLE `tbl_calendario_agendamento`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_disponibilidade`
--
ALTER TABLE `tbl_disponibilidade`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_endereco`
--
ALTER TABLE `tbl_endereco`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_escolaridade`
--
ALTER TABLE `tbl_escolaridade`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbl_estado_civil`
--
ALTER TABLE `tbl_estado_civil`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_genero`
--
ALTER TABLE `tbl_genero`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_horario_sala`
--
ALTER TABLE `tbl_horario_sala`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbl_logradouro`
--
ALTER TABLE `tbl_logradouro`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tbl_maturidade`
--
ALTER TABLE `tbl_maturidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_monitor`
--
ALTER TABLE `tbl_monitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_professor`
--
ALTER TABLE `tbl_professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_profissao`
--
ALTER TABLE `tbl_profissao`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `tbl_renda_familiar`
--
ALTER TABLE `tbl_renda_familiar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_semana`
--
ALTER TABLE `tbl_semana`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_status_sala`
--
ALTER TABLE `tbl_status_sala`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_turno`
--
ALTER TABLE `tbl_turno`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_user_terapeuta`
--
ALTER TABLE `tbl_user_terapeuta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  ADD CONSTRAINT `fk_consulta_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `tbl_paciente` (`id`),
  ADD CONSTRAINT `fk_consulta_sala_reservada` FOREIGN KEY (`id_sala_reservada`) REFERENCES `tbl_sala_reservada` (`id`),
  ADD CONSTRAINT `fk_consulta_terapeuta` FOREIGN KEY (`id_terapeuta`) REFERENCES `tbl_user_terapeuta` (`id`);

--
-- Restrições para tabelas `tbl_endereco`
--
ALTER TABLE `tbl_endereco`
  ADD CONSTRAINT `fk_aluno_logradouro` FOREIGN KEY (`id_logradouro`) REFERENCES `tbl_logradouro` (`id`),
  ADD CONSTRAINT `fk_endereco_bairro` FOREIGN KEY (`id_bairro`) REFERENCES `tbl_bairro` (`id`);

--
-- Restrições para tabelas `tbl_monitor`
--
ALTER TABLE `tbl_monitor`
  ADD CONSTRAINT `fk_monitor_disponibilidadee` FOREIGN KEY (`id_disponibilidade`) REFERENCES `tbl_disponibilidade` (`id`);

--
-- Restrições para tabelas `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  ADD CONSTRAINT `fk_paciente_contato` FOREIGN KEY (`id_contato`) REFERENCES `tbl_contato` (`id`),
  ADD CONSTRAINT `fk_paciente_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `tbl_endereco` (`id`),
  ADD CONSTRAINT `fk_paciente_escolaridade` FOREIGN KEY (`id_escolaridade`) REFERENCES `tbl_escolaridade` (`id`),
  ADD CONSTRAINT `fk_paciente_estado_civil` FOREIGN KEY (`id_estado_civil`) REFERENCES `tbl_estado_civil` (`id`),
  ADD CONSTRAINT `fk_paciente_genero` FOREIGN KEY (`id_genero`) REFERENCES `tbl_genero` (`id`),
  ADD CONSTRAINT `fk_paciente_maturidade` FOREIGN KEY (`id_maturidade`) REFERENCES `tbl_maturidade` (`id`),
  ADD CONSTRAINT `fk_paciente_profissao` FOREIGN KEY (`id_profissao`) REFERENCES `tbl_profissao` (`id`),
  ADD CONSTRAINT `fk_paciente_renda_familar` FOREIGN KEY (`id_renda_familiar`) REFERENCES `tbl_renda_familiar` (`id`);

--
-- Restrições para tabelas `tbl_professor`
--
ALTER TABLE `tbl_professor`
  ADD CONSTRAINT `fk_professor_disponibilidade` FOREIGN KEY (`id_disponibilidade`) REFERENCES `tbl_disponibilidade` (`id`);

--
-- Restrições para tabelas `tbl_sala_reservada`
--
ALTER TABLE `tbl_sala_reservada`
  ADD CONSTRAINT `fk_reserva_sala_horario` FOREIGN KEY (`id_horario`) REFERENCES `tbl_horario_sala` (`id`),
  ADD CONSTRAINT `fk_reserva_sala_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `tbl_paciente` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_reserva_sala_semana` FOREIGN KEY (`id_semana`) REFERENCES `tbl_semana` (`id`),
  ADD CONSTRAINT `fk_reserva_sala_status` FOREIGN KEY (`id_status`) REFERENCES `tbl_status_sala` (`id`),
  ADD CONSTRAINT `fk_reserva_sala_terapeuta` FOREIGN KEY (`id_terapeuta`) REFERENCES `tbl_user_terapeuta` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_reserva_sala_turno` FOREIGN KEY (`id_turno`) REFERENCES `tbl_turno` (`id`);

--
-- Restrições para tabelas `tbl_user_terapeuta`
--
ALTER TABLE `tbl_user_terapeuta`
  ADD CONSTRAINT `fk_terapeuta_disponibilidade` FOREIGN KEY (`id_disponibilidade`) REFERENCES `tbl_disponibilidade` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
