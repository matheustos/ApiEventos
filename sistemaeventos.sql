-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 07-Jan-2024 às 00:29
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemaeventos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`) VALUES
(1, 'Animes'),
(2, 'sociais'),
(3, 'religioso'),
(4, 'educacional'),
(5, 'cultural'),
(6, 'esportivo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `dataInicio` varchar(10) NOT NULL,
  `dataTermino` varchar(10) NOT NULL,
  `horaInicio` varchar(10) NOT NULL,
  `horaTermino` varchar(10) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `vagas` int NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nome`, `dataInicio`, `dataTermino`, `horaInicio`, `horaTermino`, `descricao`, `vagas`, `categoria`, `status`) VALUES
(1, 'Comic Con', '2023-12-30', '2023-12-31', '10:00:00', '22:00:00', 'Evento sobre cultura pop', 10000, 'Cultura pop', 'Cancelado'),
(2, '', '2023-12-30', '2023-12-31', '10:00:00', '22:00:00', 'Evento sobre cultura pop', 10000, 'Cultura pop', 'Concluido'),
(3, '', '2023-12-30', '2023-12-31', '10:00:00', '22:00:00', 'Evento sobre cultura pop', 10000, 'Cultura pop', ''),
(4, 'Congresso das Testemunhas de Jeová', '2024-09-12', '2024-09-14', '09:40:00', '16:00:00', 'Congresso anual das Testemunhas de Jeová', 3500, 'religioso', 'Cancelado'),
(5, 'Aseembleia das Testemunhas de Jeová', '2024-02-12', '2024-02-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Cancelado'),
(6, 'Aseembleia das Testemunhas de Jeová', '2024-02-12', '2024-02-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Cancelado'),
(7, 'Aseembleia das Testemunhas de Jeová', '2024-02-12', '2024-02-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Cancelado'),
(8, 'Aseembleia das Testemunhas de Jeová', '2024-02-12', '2024-02-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Cancelado'),
(9, 'Aseembleia das Testemunhas de Jeová', '2024-02-12', '2024-02-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(10, 'Aseembleia das Testemunhas de Jeová', '2024-02-12', '2024-02-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(11, 'Aseembleia das Testemunhas de Jeová', '2024-02-12', '2024-02-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(12, 'Aseembleia das Testemunhas de Jeová', '2023-12-31', '2024-02-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(13, 'Aseembleia das Testemunhas de Jeová', '2023-12-31', '2023-12-31', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(14, 'Asembleia das Testemunhas de Jeová', '2024-07-12', '2024-07-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(15, 'Asembleia das Testemunhas de Jeová', '2024-07-12', '2024-07-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(16, 'Asembleia das Testemunhas de Jeová', '2024-07-12', '2024-07-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(17, 'Asembleia das Testemunhas de Jeová', '2024-07-12', '2024-07-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(18, 'Asembleia das Testemunhas de Jeová', '2024-07-12', '2024-07-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Aberto para inscrições'),
(19, 'Asembleia das Testemunhas de Jeová', '2024-07-12', '2024-07-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 3500, 'religioso', 'Em andamento'),
(20, 'Teste', '2024-07-12', '2024-07-12', '09:40:00', '16:00:00', 'Asembleia anual das Testemunhas de Jeová', 0, 'religioso', 'Cancelado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricoes`
--

DROP TABLE IF EXISTS `inscricoes`;
CREATE TABLE IF NOT EXISTS `inscricoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `evento` varchar(250) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `presenca` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `avaliacoes` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `inscricoes`
--

INSERT INTO `inscricoes` (`id`, `evento`, `nome`, `email`, `presenca`, `avaliacoes`) VALUES
(1, '', '', '', '', ''),
(2, '', '', '', '', 'jj'),
(3, 'Asembleia das Testemunhas de Jeová', 'Matheus', 'matheus@gmail.com', 'Presente', 'Mto BOm'),
(4, 'Teste', 'Matheus', 'matheus@gmail.com', 'Ausente', 'Muito bom'),
(5, 'Teste', 'Matheus', 'matheus@gmail.com', '', ''),
(6, 'Teste', 'Matheus', 'matheus@gmail.com', '', ''),
(7, 'Teste', 'Matheus', 'matheus@gmail.com', '', ''),
(8, 'Teste', 'Matheus', 'matheus@gmail.com', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
