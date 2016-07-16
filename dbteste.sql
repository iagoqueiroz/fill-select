-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jul-2016 às 17:36
-- Versão do servidor: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cidades`
--

DROP TABLE IF EXISTS `tb_cidades`;
CREATE TABLE IF NOT EXISTS `tb_cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) NOT NULL,
  `cidade_nome` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_cidades`
--

INSERT INTO `tb_cidades` (`id`, `estado_id`, `cidade_nome`) VALUES
(1, 1, 'Fortaleza'),
(2, 1, 'Quixadá'),
(3, 1, 'Maranguape'),
(4, 1, 'Aracati'),
(5, 2, 'São Paulo'),
(6, 3, 'Rio de Janeiro'),
(7, 4, 'Belo Horizonte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_estados`
--

DROP TABLE IF EXISTS `tb_estados`;
CREATE TABLE IF NOT EXISTS `tb_estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_nome` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_estados`
--

INSERT INTO `tb_estados` (`id`, `estado_nome`) VALUES
(1, 'Ceará'),
(2, 'São Paulo'),
(3, 'Rio de Janeiro'),
(4, 'Minas Gerais');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
