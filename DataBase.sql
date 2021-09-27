-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 27-Set-2021 às 17:52
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cafeimetrodb`
--
CREATE DATABASE IF NOT EXISTS `cafeimetrodb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cafeimetrodb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cafe`
--

DROP TABLE IF EXISTS `cafe`;
CREATE TABLE IF NOT EXISTS `cafe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) DEFAULT NULL,
  `descricao` varchar(125) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo_id` (`tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cafe`
--

INSERT INTO `cafe` (`id`, `nome`, `descricao`, `tipo_id`) VALUES
(6, 'Cafe do Douglas', 'Gostoso', 1),
(7, 'Para programar', 'Usar nos estudos', 2),
(8, 'teste', 'jjj', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `consumo`
--

DROP TABLE IF EXISTS `consumo`;
CREATE TABLE IF NOT EXISTS `consumo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `qtd` int(11) DEFAULT NULL,
  `dia_semana` varchar(7) DEFAULT NULL,
  `preco` decimal(5,2) DEFAULT NULL,
  `cafe_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cafe_id` (`cafe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consumo`
--

INSERT INTO `consumo` (`id`, `data`, `hora`, `qtd`, `dia_semana`, `preco`, `cafe_id`) VALUES
(6, '2021-09-01', '12:57:00', 100, 'Quarta', '0.00', 6),
(7, '2021-08-29', '12:57:00', 200, 'Domingo', '0.00', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Espressooo'),
(2, 'Macchiato'),
(7, 'Capputinoaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `senha` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `senha`) VALUES
(1, 'meuemail@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Lmo3S3JOemRCWWJPYTBWVg$x0qxspUsu+Mh824oM8nsoE7cwIXZ1N5C5fJVnG/ztLI');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cafe`
--
ALTER TABLE `cafe`
  ADD CONSTRAINT `cafe_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`);

--
-- Limitadores para a tabela `consumo`
--
ALTER TABLE `consumo`
  ADD CONSTRAINT `consumo_ibfk_1` FOREIGN KEY (`cafe_id`) REFERENCES `cafe` (`id`);
--
-- Banco de dados: `pdo`
--
CREATE DATABASE IF NOT EXISTS `pdo` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `pdo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `descricao` varchar(200) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
--
-- Banco de dados: `teste`
--
CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`) VALUES
(14, 'Douglass777', 'douglas@hotmail.comss'),
(18, 'Id', 'teste@teste.com'),
(19, 'Carroseeeeeeee', 'douglaswag@hotmail.com');
--
-- Banco de dados: `vagas`
--
CREATE DATABASE IF NOT EXISTS `vagas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `vagas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vagas`
--

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE IF NOT EXISTS `vagas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` enum('s','n') NOT NULL,
  `data` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Banco de dados: `veiculos`
--
CREATE DATABASE IF NOT EXISTS `veiculos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `veiculos`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `ano` int(11) NOT NULL,
  `preco` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `marca`, `modelo`, `ano`, `preco`) VALUES
(8, 'Asas', 'FrontierTTT', 134, 123456);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
