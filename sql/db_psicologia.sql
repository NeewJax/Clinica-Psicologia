-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Jun-2024 às 02:20
-- Versão do servidor: 10.6.15-MariaDB
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
(3, 'pedro', 'masculino', 33, '1990-10-03', 'brasileiro', 'Superior', 'Astronauta', 1000000, 2423423, 33423525, 'casado', 'esposa, filhos', 'esposa, filhos', 'Rua da Luz', 'Bairro das Goiabas', 'São Luan', 5674654, 434324354, 654635, 234235, 'pedro@gmail.com'),
(4, 'Gabriel Bruno', 'Masculino', 60, '1957-10-04', 'são luís', 'Doutorado', 'Fiscal de Marte', 2147483647, 2147483647, 2147483647, 'Casado', 'Esposa', 'Esposa', 'Rua das Maças', 'Barro dos Limões', 'São Luís', 90900343, 78564564, 45436224, 2147483647, 'gabrielbruno@gmail.com');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_consulta`
--

CREATE TABLE `tbl_consulta` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome_paciente` varchar(255) NOT NULL,
  `data_consulta` date NOT NULL,
  `horario` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_consulta`
--

INSERT INTO `tbl_consulta` (`id`, `nome_paciente`, `data_consulta`, `horario`) VALUES
(10, 'Anderson', '0000-00-00', '23:13:00.000000'),
(11, 'Anderson', '2024-06-30', '01:21:00.000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_disponibilidade`
--

CREATE TABLE `tbl_disponibilidade` (
  `id` int(11) UNSIGNED NOT NULL,
  `disponibilidade` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbl_disponibilidade`
--

INSERT INTO `tbl_disponibilidade` (`id`, `disponibilidade`) VALUES
(1, 'Disponível'),
(2, 'Indisponível');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_user_terapeuta`
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
-- Extraindo dados da tabela `tbl_user_terapeuta`
--

INSERT INTO `tbl_user_terapeuta` (`id`, `id_disponibilidade`, `nome`, `usuario`, `email`, `senha`, `date`) VALUES
(2, 1, 'Anderson', 'Anderson', 'andersson@gemail.com', '$2y$10$uf2mzbZ78j2bBtr.eHQyse84b0bJcsVopEvUw.ynd507eYSDtVQQy', '2024-04-06 23:46:11'),
(3, 1, 'Ana', 'Ana', 'ana@gmail.com', '$2y$10$Ilhu3M5N8ClJiY9CRD/iV.q4MKYZoKfmuf/QF1LsvJaouonpUCpbS', '2023-11-23 18:31:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$Z3w1Yd9AiDlTUIgSa.rT5eQb.4Brv3pi6f41.gaiVBOSy7zqElSau', '2023-10-27 01:05:17');

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
-- Índices para tabela `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_disponibilidade`
--
ALTER TABLE `tbl_disponibilidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbl_user_terapeuta`
--
ALTER TABLE `tbl_user_terapeuta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_terapeuta_disponibilade` (`id_disponibilidade`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_cadastro`
--
ALTER TABLE `tbl_cadastro`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tbl_cadastro_menor`
--
ALTER TABLE `tbl_cadastro_menor`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_consulta`
--
ALTER TABLE `tbl_consulta`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tbl_disponibilidade`
--
ALTER TABLE `tbl_disponibilidade`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tbl_user_terapeuta`
--
ALTER TABLE `tbl_user_terapeuta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_user_terapeuta`
--
ALTER TABLE `tbl_user_terapeuta`
  ADD CONSTRAINT `fk_terapeuta_disponibilade` FOREIGN KEY (`id_disponibilidade`) REFERENCES `tbl_disponibilidade` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
