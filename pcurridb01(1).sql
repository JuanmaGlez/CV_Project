-- phpMyAdmin SQL Dump
-- version 4.0.10.17
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2017 at 01:43 PM
-- Server version: 5.6.32
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pcurridb01`
--

-- --------------------------------------------------------

--
-- Table structure for table `datosCurriculum`
--

CREATE TABLE IF NOT EXISTS `datosCurriculum` (
  `idCurriculum` int(5) NOT NULL,
  `idFormacion` int(5) NOT NULL,
  `idProfesional` int(5) NOT NULL,
  `idOtros` int(5) NOT NULL,
  PRIMARY KEY (`idCurriculum`,`idFormacion`,`idProfesional`,`idOtros`),
  KEY `fk_datosCurri_formacion` (`idFormacion`),
  KEY `fk_datosCurri_profesional` (`idProfesional`),
  KEY `fk_datosCurri_otros` (`idOtros`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formacion`
--

CREATE TABLE IF NOT EXISTS `formacion` (
  `idFormacion` int(5) NOT NULL AUTO_INCREMENT,
  `formation` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `studyCenter` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `notas` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idFormacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `listaCurriculum`
--

CREATE TABLE IF NOT EXISTS `listaCurriculum` (
  `idCurriculum` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idCurriculum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `otros`
--

CREATE TABLE IF NOT EXISTS `otros` (
  `idOtros` int(5) NOT NULL AUTO_INCREMENT,
  `lenguage` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `card` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `ability` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `knowledge` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `hobby` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idOtros`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profesional`
--

CREATE TABLE IF NOT EXISTS `profesional` (
  `idProfesional` int(5) NOT NULL AUTO_INCREMENT,
  `occupation` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `company` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idProfesional`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tipoUsuarios`
--

CREATE TABLE IF NOT EXISTS `tipoUsuarios` (
  `idTipo` int(5) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tipoUsuarios`
--

INSERT INTO `tipoUsuarios` (`idTipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Consultor');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `surname` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `postal` int(5) NOT NULL,
  `town` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `province` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `mobile` int(9) NOT NULL,
  `telephone` int(9) DEFAULT NULL,
  `idTipoUsuario` int(5) NOT NULL DEFAULT '2',
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `password` (`password`),
  KEY `fk_tipos_usarios` (`idTipoUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `username`, `password`, `email`, `name`, `surname`, `birthday`, `address`, `postal`, `town`, `province`, `mobile`, `telephone`, `idTipoUsuario`) VALUES
(1, 'manu', 'unadeestas', 'jmgonzalez@comvive.es', 'Manu', 'Glez', '2002-02-02', 'Rua 99', 41300, 'San José de La Rinconada', 'Sevilla', 600000000, 950000000, 1),
(2, 'usuario1', 'usuario1', 'usuario1@usuario.com', 'Usuario', 'Uno', '2016-12-14', 'Circular 1', 41001, 'Sevilla', 'Sevilla', 600000001, 950000001, 2),
(3, 'usuario2', 'usuario2', 'usuario2@usuario.com', 'Usuario', 'Dos', '2016-12-14', 'Olimpo 23', 41009, 'Sevilla', 'Sevilla', 600000002, 950000002, 2),
(4, 'usuario3', 'usuario3', 'usuario3@usuario.com', 'usuario', 'Tres', '2016-12-14', 'Rua 45', 41007, 'Sevilla', 'Sevilla', 600000003, 950000003, 2),
(5, 'usuario4', 'usuario4', 'usuario4@usuario.com', 'Usuario', 'Cuatro', '2016-12-14', 'Madrid 99', 41309, 'La Rinconada', 'Sevilla', 600000004, 950000004, 2),
(6, 'usuario5', 'usuario5', 'usuario5@usuario.com', 'Usuario', 'Cinqui', '2016-12-14', 'Circular 2', 41008, 'La Algaba', 'Sevilla', 600000005, 950000005, 2),
(7, 'usuario6', 'usuario6', 'usuario6@usuario.com', 'Usuario', 'Seis', '2016-12-14', 'Andalucia 23', 41010, 'Sevilla', 'Sevilla', 600000006, 950000006, 2),
(8, 'usuario7', 'usuario7', 'usuario7@usuario.com', 'Usuario', 'Siete', '2016-12-14', 'Verano 42', 28016, 'Vallecas', 'Madrid', 600000007, 950000007, 2),
(9, 'usuario8', 'usuario8', 'usuario8@usuario.com', 'Usuario', 'Ocho', '2016-12-14', 'Por fin 88', 41200, 'Ecija', 'Sevilla', 600000008, 950000008, 2),
(10, 'usuario9', 'usuario9', 'usuario9@usuario.com', 'Usuario', 'Nueva', '2016-12-14', 'Cordoba 3', 41300, 'San José de La Rinconada', 'Sevilla', 600000009, 950000009, 2),
(11, 'usuario10', 'usuario10', 'usuario10@usuario.com', 'Usuario', 'Diez', '2016-12-14', 'Cadiz 99', 41009, 'Sevilla', 'Sevilla', 600000010, 950000010, 2),
(12, 'consultor1', 'consultor1', 'consultor@consultor.com', 'Consultor', 'Uno', '2016-12-14', 'Jaen 78', 41001, 'Sevilla', 'Sevilla', 610000001, 951000001, 3),
(13, 'consultor2', 'consultor2', 'consultor2@consultor.com', 'Consultor', 'Dos', '2016-12-14', 'Betica 101', 41300, 'San José de La Rinconada', 'Sevilla', 610000002, 951000002, 2),
(14, 'consultor3', 'consultor3', 'consultor3@consultor.com', 'Consultor', 'Tres', '2016-12-14', 'Circular 3', 41009, 'Sevilla', 'Sevilla', 610000003, 951000003, 2),
(15, 'consultor4', 'consultor4', 'consultor4@consultor.com', 'Consultor', 'Cuatro', '2016-12-19', 'Septiembre', 41006, 'Sevilla', 'Sevilla', 610000004, 951000004, 2),
(16, 'consultor5', 'consultor5', 'consultor5@consultor.com', 'Consultor', 'Cinqui', '2016-12-19', 'Octubre 13', 41010, 'Sevilla', 'Sevilla', 610000005, 951000005, 2),
(17, 'consultor6', 'consultor6', 'consultor6@consultor.com', 'Consultor', 'Seis', '2016-12-20', 'Esta si que si 120', 41309, 'La Rinconada', 'Sevilla', 610000006, 951000006, 2),
(18, 'consultor7', 'consultor7', 'consultor7@consultor.com', 'Consultor', 'Siete', '2016-12-20', 'Una 2', 41001, 'Sevilla', 'Sevilla', 610000007, 951000007, 2),
(19, 'consultor8', 'consultor8', 'consultor8@consultor.com', 'Consultor', 'Ocho', '2017-01-09', 'Granada', 41300, 'San José de La Rinconada', 'Sevilla', 610000008, 951000008, 2),
(20, 'consultor9', 'consultor9', 'consultor9@consultor.com', 'Consultor', 'Nueve', '2017-01-09', 'Mas alla', 41300, 'San José de La Rinconada', 'Sevilla', 610000009, 951000009, 2),
(21, 'consultor10', 'consultor10', 'consultor10@consultor.com', 'Consultor', 'Diez', '2017-01-10', 'Otro dia mas', 41009, 'La Rinconada', 'Sevilla', 610000010, 951000010, 2),
(22, 'usuario11', 'usuario11', 'usuario11@usuario.com', 'Usuario', 'Once', '2017-01-11', 'Eleven 11', 41011, 'Sevilla', 'Sevilla', 600000011, 0, 2),
(23, 'usuario12', 'usuario12', 'usuario12@usuario.com', 'Usuario', 'Doce', '2017-01-12', 'Otro mas 29', 41300, 'San José de La Rinconada', 'Sevilla', 610000012, 0, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
