-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/11/2023 às 13:50
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `police`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pix_data`
--

CREATE TABLE `pix_data` (
  `id` int(11) NOT NULL,
  `origem_nome` varchar(255) NOT NULL,
  `origem_instituicao` varchar(255) NOT NULL,
  `origem_agencia` varchar(20) NOT NULL,
  `origem_conta` varchar(20) NOT NULL,
  `origem_cpf` varchar(14) NOT NULL,
  `destino_nome` varchar(255) NOT NULL,
  `destino_instituicao` varchar(255) NOT NULL,
  `destino_agencia` varchar(20) NOT NULL,
  `destino_conta` varchar(20) NOT NULL,
  `destino_cpf` varchar(14) NOT NULL,
  `tipo_conta` varchar(20) NOT NULL,
  `id_transacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `pix_data`
--

INSERT INTO `pix_data` (`id`, `origem_nome`, `origem_instituicao`, `origem_agencia`, `origem_conta`, `origem_cpf`, `destino_nome`, `destino_instituicao`, `destino_agencia`, `destino_conta`, `destino_cpf`, `tipo_conta`, `id_transacao`) VALUES
(1, 'Cleberson Agostinho Fidelis', 'Nubank', '001', '1708-5', '03480705944', 'Cristian Cleber Tenfen', 'Banco do Brasil', '8050512', '123123', '23456789654', 'conta_corrente', '123123131313133');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pix_data`
--
ALTER TABLE `pix_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pix_data`
--
ALTER TABLE `pix_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
