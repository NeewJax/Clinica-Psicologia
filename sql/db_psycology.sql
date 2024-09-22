-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/09/2024 às 14:16
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

--
-- Despejando dados para a tabela `tbl_bairro`
--

INSERT INTO `tbl_bairro` (`id`, `bairro`) VALUES
(1, 'bairro'),
(2, 'Goiabas'),
(3, 'Goiabas'),
(4, 'Peras'),
(5, 'Maças'),
(6, 'Maças'),
(7, 'Goiabas');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_consulta`
--

CREATE TABLE `tbl_consulta` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome_paciente` varchar(255) NOT NULL,
  `data_consulta` date NOT NULL,
  `horario` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_consulta`
--

INSERT INTO `tbl_consulta` (`id`, `nome_paciente`, `data_consulta`, `horario`) VALUES
(10, 'Anderson', '0000-00-00', '23:13:00.000000'),
(11, 'Anderson', '2024-06-30', '01:21:00.000000'),
(12, 'Teste', '2024-06-23', '09:20:00.000000'),
(13, 'Reus', '2024-06-13', '08:00:00.000000'),
(14, 'Wilson', '2024-09-12', '21:58:00.000000');

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

--
-- Despejando dados para a tabela `tbl_contato`
--

INSERT INTO `tbl_contato` (`id`, `id_paciente`, `email`, `telefone`) VALUES
(5, 6, 'wilson3@gmail.com', '23423432'),
(6, 7, 'willson@gmail.com', '98986117230'),
(8, 8, 'andre@gmail.com', '23423432'),
(10, 9, 'andre@gmail.com', '23423432'),
(11, 10, 'andre@gmail.com', '23423432'),
(12, 11, 'andre@gmail.com', '23423432'),
(13, 12, 'andre@gmail.com', '23423432'),
(14, 13, 'andre@gmail.com', '23423432');

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

--
-- Despejando dados para a tabela `tbl_endereco`
--

INSERT INTO `tbl_endereco` (`id`, `id_paciente`, `id_bairro`, `id_logradouro`, `cep`) VALUES
(1, 1, 1, 1, '88888881'),
(2, 1, 3, 3, '65071-14'),
(3, 1, 4, 4, '65071-14'),
(4, 1, 5, 5, '65071-14'),
(5, 12, 6, 6, '65071-14'),
(6, 13, 7, 7, '65071-14');

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

--
-- Despejando dados para a tabela `tbl_logradouro`
--

INSERT INTO `tbl_logradouro` (`id`, `logradouro`) VALUES
(1, 'Logradouro'),
(2, 'Localidade'),
(3, 'Localidade'),
(4, 'Localidade'),
(5, 'Localidade'),
(6, 'Localidade'),
(7, 'Localidade');

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
  `id_endereco` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_paciente`
--

INSERT INTO `tbl_paciente` (`id`, `nome`, `nascimento`, `rg`, `cpf`, `id_genero`, `id_contato`, `id_escolaridade`, `id_profissao`, `id_renda_familiar`, `id_estado_civil`, `id_endereco`) VALUES
(7, 'Wilson', '2024-08-06', 1234, 98765, 1, 6, 5, 1, 1, 1, 1),
(9, 'Neymar9', '2024-08-04', 45, 987654321, 1, 10, 4, 4, 5, 2, 2),
(10, 'Neymar2', '2024-08-04', 45, 987654321, 1, 11, 4, 5, 5, 2, 3),
(11, 'Neymar2', '2024-08-04', 45, 987654321, 1, 12, 4, 6, 5, 2, 4),
(12, 'Neymar2', '2024-08-04', 45, 987654321, 1, 13, 4, 7, 5, 2, 5),
(13, 'Neymar2', '2024-08-04', 45, 987654321, 1, 14, 4, 8, 5, 2, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_profissao`
--

CREATE TABLE `tbl_profissao` (
  `id` int(11) UNSIGNED NOT NULL,
  `profissao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_profissao`
--

INSERT INTO `tbl_profissao` (`id`, `profissao`) VALUES
(1, 'Estudante'),
(2, 'Médico'),
(3, 'Médico'),
(4, 'Médico'),
(5, 'Médico'),
(6, 'Médico'),
(7, 'Médico'),
(8, 'Médico');

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
  `sala_cod` varchar(10) NOT NULL,
  `sala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_sala_reservada`
--

INSERT INTO `tbl_sala_reservada` (`id`, `id_turno`, `id_horario`, `id_semana`, `id_status`, `sala_cod`, `sala`) VALUES
(1, 1, 1, 1, 5, 'm_8_s1', 'Atend. Infantil'),
(2, 1, 1, 1, 5, 'm_8_s2', 'Atend. Grupo'),
(3, 1, 1, 1, 5, 'm_8_s3', 'Atend. I'),
(4, 1, 1, 1, 5, 'm_8_s4', 'Eline de Sousa(II)'),
(5, 1, 1, 1, 5, 'm_8_s5', 'Atend. III'),
(6, 1, 1, 1, 5, 'm_8_s6', 'Atend. IV'),
(7, 1, 1, 1, 5, 'm_8_s7', 'Atend. Infantil'),
(8, 1, 2, 1, 5, 'm_9_s1', 'Henrique Gabriel(Infantil)'),
(9, 1, 2, 1, 5, 'm_9_s2', 'Atend. Grupo'),
(10, 1, 2, 1, 5, 'm_9_s3', '(I)'),
(11, 1, 2, 1, 5, 'm_9_s4', 'Jessyea Karina(II)'),
(12, 1, 2, 1, 5, 'm_9_s5', 'Auana Maria'),
(13, 1, 2, 1, 5, 'm_9_s6', 'Atend. IV'),
(14, 1, 2, 1, 5, 'm_9_s7', 'Atend. V'),
(15, 1, 3, 1, 5, 'm_10_s1', 'Atend. Infantil'),
(16, 1, 3, 1, 5, 'm_10_s2', 'Atend. Grupo'),
(17, 1, 3, 1, 5, 'm_10_s3', '(I)'),
(18, 1, 3, 1, 5, 'm_10_s4', 'Maryana Dállia(II)'),
(19, 1, 3, 1, 5, 'm_10_s5', 'Yuri(III)'),
(20, 1, 3, 1, 5, 'm_10_s6', 'Ranilson(IV)'),
(21, 1, 3, 1, 5, 'm_10_s7', 'Tean Rayzton(V)'),
(22, 1, 4, 1, 5, 'm_11_s1', 'Luiz Márcio(Infantil)'),
(23, 1, 4, 1, 5, 'm_11_s2', 'Atend. Grupo'),
(24, 1, 4, 1, 5, 'm_11_s3', '(I)'),
(25, 1, 4, 1, 5, 'm_11_s4', 'GiulliaCarolina'),
(26, 1, 4, 1, 5, 'm_11_s5', 'Ildenize(III)'),
(27, 1, 4, 1, 5, 'm_11_s6', '(IV)'),
(28, 1, 4, 1, 5, 'm_11_s7', 'Jenice(V)'),
(29, 2, 5, 1, 5, 't_14_s1', 'Atend. Infantil'),
(30, 2, 5, 1, 5, 't_14_s2', 'Atend. Grupo'),
(31, 2, 5, 1, 5, 't_14_s3', 'Atend. I'),
(32, 2, 5, 1, 5, 't_14_s4', 'Eline de Sousa(II)'),
(33, 2, 5, 1, 5, 't_14_s5', 'Atend. III'),
(34, 2, 5, 1, 5, 't_14_s6', 'Atend. IV'),
(35, 2, 5, 1, 5, 't_14_s7', 'Atend. V'),
(36, 2, 6, 1, 5, 't_15_s1', 'Henrique Gabriel(Infantil)'),
(37, 2, 6, 1, 5, 't_15_s2', 'Atend. Grupo'),
(38, 2, 6, 1, 5, 't_15_s3', '(I)'),
(39, 2, 6, 1, 5, 't_15_s4', 'Jessyea Karina(II)'),
(40, 2, 6, 1, 5, 't_15_s5', 'Auana Maria'),
(41, 2, 6, 1, 5, 't_15_s6', 'Atend. IV'),
(42, 2, 6, 1, 5, 't_15_s7', 'Atend. V'),
(43, 2, 7, 1, 5, 't_16_s1', 'Atend. Infantil'),
(44, 2, 7, 1, 5, 't_16_s2', 'Atend. Grupo'),
(45, 2, 7, 1, 5, 't_16_s3', '(I)'),
(46, 2, 7, 1, 5, 't_16_s4', 'Maryana Dállia(II)'),
(47, 2, 7, 1, 5, 't_16_s5', 'Yuri(III)'),
(48, 2, 7, 1, 5, 't_16_s6', 'Ranilson(IV)'),
(49, 2, 7, 1, 5, 't_16_s7', 'Tean Rayzton(V)'),
(50, 2, 8, 1, 5, 't_17_s1', 'Luiz Márcio(Infantil)'),
(51, 2, 8, 1, 5, 't_17_s2', 'Atend. Grupo'),
(52, 2, 8, 1, 5, 't_17_s3', '(I)'),
(53, 2, 8, 1, 5, 't_17_s4', 'Giullia Carolina'),
(54, 2, 8, 1, 5, 't_17_s5', 'Ildenize(III)'),
(55, 2, 8, 1, 5, 't_17_s6', '(IV)'),
(56, 2, 8, 1, 5, 't_17_s7', 'Jenice(V)');

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
(4, 'triagem'),
(5, 'nada');

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
  `nome` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_user_terapeuta`
--

INSERT INTO `tbl_user_terapeuta` (`id`, `id_disponibilidade`, `nome`, `usuario`, `email`, `senha`, `date`) VALUES
(2, 1, 'Anderson', 'Anderson', 'andersson@gemail.com', '$2y$10$uf2mzbZ78j2bBtr.eHQyse84b0bJcsVopEvUw.ynd507eYSDtVQQy', '2024-04-07 02:46:11'),
(3, 1, 'Ana2', 'Ana', 'ana@gmail.com', '$2y$10$Ilhu3M5N8ClJiY9CRD/iV.q4MKYZoKfmuf/QF1LsvJaouonpUCpbS', '2024-09-01 12:11:52');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_bairro`
--
ALTER TABLE `tbl_bairro`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contato_paciente` (`id_paciente`);

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
  ADD KEY `fk_paciente_genero` (`id_genero`);

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
  ADD KEY `fk_sala_reservada_turno` (`id_turno`),
  ADD KEY `fk_sala_reservada_horario` (`id_horario`),
  ADD KEY `fk_sala_reservada_status` (`id_status`),
  ADD KEY `fk_sala_reservada_semana` (`id_semana`);

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
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_bairro`
--
ALTER TABLE `tbl_bairro`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbl_contato`
--
ALTER TABLE `tbl_contato`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tbl_endereco`
--
ALTER TABLE `tbl_endereco`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `tbl_profissao`
--
ALTER TABLE `tbl_profissao`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbl_renda_familiar`
--
ALTER TABLE `tbl_renda_familiar`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbl_sala_reservada`
--
ALTER TABLE `tbl_sala_reservada`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

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
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_endereco`
--
ALTER TABLE `tbl_endereco`
  ADD CONSTRAINT `fk_aluno_logradouro` FOREIGN KEY (`id_logradouro`) REFERENCES `tbl_logradouro` (`id`),
  ADD CONSTRAINT `fk_endereco_bairro` FOREIGN KEY (`id_bairro`) REFERENCES `tbl_bairro` (`id`);

--
-- Restrições para tabelas `tbl_paciente`
--
ALTER TABLE `tbl_paciente`
  ADD CONSTRAINT `fk_paciente_contato` FOREIGN KEY (`id_contato`) REFERENCES `tbl_contato` (`id`),
  ADD CONSTRAINT `fk_paciente_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `tbl_endereco` (`id`),
  ADD CONSTRAINT `fk_paciente_escolaridade` FOREIGN KEY (`id_escolaridade`) REFERENCES `tbl_escolaridade` (`id`),
  ADD CONSTRAINT `fk_paciente_estado_civil` FOREIGN KEY (`id_estado_civil`) REFERENCES `tbl_estado_civil` (`id`),
  ADD CONSTRAINT `fk_paciente_genero` FOREIGN KEY (`id_genero`) REFERENCES `tbl_genero` (`id`),
  ADD CONSTRAINT `fk_paciente_profissao` FOREIGN KEY (`id_profissao`) REFERENCES `tbl_profissao` (`id`),
  ADD CONSTRAINT `fk_paciente_renda_familar` FOREIGN KEY (`id_renda_familiar`) REFERENCES `tbl_renda_familiar` (`id`);

--
-- Restrições para tabelas `tbl_sala_reservada`
--
ALTER TABLE `tbl_sala_reservada`
  ADD CONSTRAINT `fk_sala_reservada_horario` FOREIGN KEY (`id_horario`) REFERENCES `tbl_horario_sala` (`id`),
  ADD CONSTRAINT `fk_sala_reservada_semana` FOREIGN KEY (`id_semana`) REFERENCES `tbl_semana` (`id`),
  ADD CONSTRAINT `fk_sala_reservada_status` FOREIGN KEY (`id_status`) REFERENCES `tbl_status_sala` (`id`),
  ADD CONSTRAINT `fk_sala_reservada_turno` FOREIGN KEY (`id_turno`) REFERENCES `tbl_turno` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
