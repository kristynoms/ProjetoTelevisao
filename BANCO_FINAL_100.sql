-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `projetotr`
--
CREATE DATABASE `projetotr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `projetotr`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classificacaoetaria`
--

DROP TABLE IF EXISTS `classificacaoetaria`;
CREATE TABLE IF NOT EXISTS `classificacaoetaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `classificacaoetaria`
--

INSERT INTO `classificacaoetaria` (`id`, `nome`) VALUES
(1, '13+'),
(2, '16+'),
(3, '18+');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emissora`
--

DROP TABLE IF EXISTS `emissora`;
CREATE TABLE IF NOT EXISTS `emissora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `emissora`
--

INSERT INTO `emissora` (`id`, `nome`) VALUES
(1, 'Globo'),
(2, 'SBT'),
(3, 'BAND');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `nome`) VALUES
(1, 'Suspense'),
(2, 'Drama'),
(8, 'Comédia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grade`
--

DROP TABLE IF EXISTS `grade`;
CREATE TABLE IF NOT EXISTS `grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_programa` int(11) DEFAULT NULL,
  `dataExibicao` date DEFAULT NULL,
  `horaExibicao` varchar(200) DEFAULT NULL,
  `horaTermino` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `grade`
--

INSERT INTO `grade` (`id`, `fk_programa`, `dataExibicao`, `horaExibicao`, `horaTermino`) VALUES
(1, 2, '2013-09-30', '00:00', NULL),
(14, 6, '2013-09-30', '01:00', NULL),
(15, 7, '2013-09-30', '09:00', NULL),
(16, 8, '0000-00-00', '', NULL),
(17, 9, '2013-10-10', '15:00', NULL),
(18, 10, '2013-10-10', '15:00', NULL),
(19, 11, '0000-00-00', '13:00', '14:00'),
(20, 12, '0000-00-00', '', ''),
(21, 13, '0000-00-00', '', ''),
(22, 14, '0000-00-00', '', ''),
(23, NULL, NULL, NULL, '01:00'),
(24, 15, '0000-00-00', '13:00', '14:00'),
(25, 16, '2013-10-15', '13:00', '21:00'),
(26, 17, '1970-01-01', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `programa`
--

DROP TABLE IF EXISTS `programa`;
CREATE TABLE IF NOT EXISTS `programa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `fk_genero_id` int(11) DEFAULT NULL,
  `sinopse` varchar(200) DEFAULT NULL,
  `fk_classificacao_id` int(11) DEFAULT NULL,
  `fk_emissora_id` int(11) DEFAULT NULL,
  `fk_tipo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `programa`
--

INSERT INTO `programa` (`id`, `nome`, `fk_genero_id`, `sinopse`, `fk_classificacao_id`, `fk_emissora_id`, `fk_tipo_id`) VALUES
(2, 'Todo Mundo em Panico 2', 3, 'Filme de comÃ©dia', 2, 1, 1),
(6, 'Friends', 3, 'Comedy tv series', 1, 1, 2),
(7, 'How I meet your Mother', 3, 'Comedy tv series', 1, 1, 2),
(8, '', 1, '', 1, 1, 1),
(9, 'kristy', 1, 'teste de sinopse', 2, 1, 2),
(10, 'kristy', 1, 'teste de sinopse', 2, 1, 2),
(11, 'teste2', 1, 'testetstetse', 1, 2, 2),
(12, '', 1, '', 1, 1, 1),
(13, '', 1, '', 1, 1, 5),
(14, '', 1, '', 1, 1, 1),
(15, 'teste4', 1, 'testando sinopse', 1, 1, 4),
(16, 'tyestt', 1, 'dsadasdas', 1, 1, 1),
(17, '', 1, '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`) VALUES
(1, 'Novela'),
(4, 'Filme'),
(5, 'Série'),
(7, 'Informativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`) VALUES
(1, 'kristy', 'kkk@kkk', 'kristy', '1234');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
