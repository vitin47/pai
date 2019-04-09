-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 09-Abr-2019 às 16:44
-- Versão do servidor: 5.7.23
-- versão do PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(222) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`) VALUES
(1, 'orquidea'),
(2, 'manutencao'),
(3, 'cultivo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) NOT NULL,
  `valor` float NOT NULL,
  `image` varchar(200) NOT NULL,
  `descricao` text,
  `id_categoria` int(200) NOT NULL,
  `insercao` date DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_categoria` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome`, `valor`, `image`, `descricao`, `id_categoria`, `insercao`) VALUES
(105, 'pumila', 200, 'bolso.jpg', 'Orquidea branca', 1, '2019-04-09'),
(106, 'Laelia', 23, '2.jpg', 'Gosta de pouco sol', 1, '2019-04-09'),
(107, 'Cattleya', 132, '3.jpg', '', 1, '2019-04-09'),
(108, 'Xialinho', 32, 'flor1.jpg', '', 1, '2019-04-09'),
(109, 'amethystoglossa', 123, 'flor2.jpg', '', 1, '2019-04-09'),
(110, 'Dendrobium', 321, 'flor3.jpg', '', 1, '2019-04-09'),
(111, 'warneri cerulha', 321, 'warneri.jpg', '', 1, '2019-04-09'),
(112, 'Gaiola 20x20', 14, 'gaiola.jpg', 'gaiola 20 cm x 20cm', 2, '2019-04-09'),
(113, 'vazo ceramica', 321, 'vazo.jpg', 'ceramica', 2, '2019-04-09'),
(114, 'adubo pitters', 231, 'adubo.jpg', 'adubo floraÃ§Ã£o', 3, '2019-04-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_cad`
--

DROP TABLE IF EXISTS `user_cad`;
CREATE TABLE IF NOT EXISTS `user_cad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `data_nasc` date NOT NULL,
  `senha` int(11) NOT NULL,
  `endereco1` varchar(220) NOT NULL,
  `endereco2` varchar(220) NOT NULL,
  `adm` int(10) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_cad`
--

INSERT INTO `user_cad` (`id`, `nome`, `email`, `data_nasc`, `senha`, `endereco1`, `endereco2`, `adm`) VALUES
(66, 'vitor', 'vitn47@gmail.com', '2019-04-29', 123, 'wqewq', '231', 1),
(67, 'pedro', 'pedro@gmail.com', '2019-04-01', 123, 'eswq', 'sda', 0),
(68, 'vitor', 'vitn48@gmail.com', '9999-09-19', 123, '323', '321', 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
