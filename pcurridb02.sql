-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 22, 2017 at 09:08 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 5.6.30-12~ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcurridb02`
--

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `idCurri` int(11) NOT NULL,
  `nameCurri` varchar(30) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `formacion`
--

CREATE TABLE `formacion` (
  `idFormacion` int(11) NOT NULL,
  `idCurri` int(11) NOT NULL DEFAULT '0',
  `formation` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `studyCenter` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `grade` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `otros`
--

CREATE TABLE `otros` (
  `idOtros` int(11) NOT NULL,
  `idCurri` int(11) NOT NULL,
  `lenguage` varchar(30) DEFAULT NULL,
  `card` varchar(20) DEFAULT NULL,
  `ability` varchar(159) DEFAULT NULL,
  `knowledge` varchar(150) DEFAULT NULL,
  `hobby` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profesion`
--

CREATE TABLE `profesion` (
  `idProfesion` int(11) NOT NULL,
  `idCurri` int(11) NOT NULL DEFAULT '0',
  `occupation` varchar(100) NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `company` varchar(100) NOT NULL,
  `town` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `postal` varchar(5) NOT NULL,
  `town` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `mobile` varchar(9) NOT NULL,
  `telephone` varchar(9) DEFAULT NULL,
  `tipoUsuario` varchar(15) NOT NULL DEFAULT 'usuario',
  `estado` varchar(15) NOT NULL DEFAULT 'activado',
  `registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `username`, `password`, `email`, `name`, `surname`, `dni`, `birthday`, `address`, `postal`, `town`, `province`, `mobile`, `telephone`, `tipoUsuario`, `estado`, `registro`, `photo`) VALUES
(1, 'jobsnetworks', '$2y$12$jadNU9TZ1goS5nRTnnoTUe9RE98Is.Q4ADDqalCdYzikI5jrmlzS.', 'juanmita1982@gmail.com', 'Manu', 'Glez', '22222222-X', '1992-12-12', 'La que sea, 14', '41300', 'San José', 'Sevilla', '600600600', '954000000', 'administrador', 'activado', NULL, 'playmobil.png'),
(32, 'antonio', '$2y$12$.bhkTgSspiN5mS/6ofsZ9.Tzt0ML/4QQFSVCzTGO7ugzS3.oKQtUy', 'juanmanuelgonzalezn@hotmail.com', 'Antonio', 'Vizoso', '11111111-x', '1993-04-01', 'Madrid,32', '41310', 'Cantillana', 'Sevilla', '600123123', '954123123', 'usuario', 'activado', '2017-06-22 22:42:14', 'AV.jpg'),
(33, 'rafa', '$2y$12$faa3E8jMrfgCoofpH1awzOl.wMCthIB0epxzvQlb0M3l9YLse/Bl6', 'rafa@rafa.es', 'Rafa', 'Aguirre', '12312312-P', '1992-12-12', 'Primera 1', '41310', 'Brenes', 'Sevilla', '600600602', '954000004', 'consultor', 'activado', '2017-06-22 22:51:51', 'rafa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`idCurri`),
  ADD KEY `fk_usuario_curri` (`idUsuario`);

--
-- Indexes for table `formacion`
--
ALTER TABLE `formacion`
  ADD PRIMARY KEY (`idFormacion`),
  ADD KEY `fk_curri_formacion` (`idCurri`);

--
-- Indexes for table `otros`
--
ALTER TABLE `otros`
  ADD PRIMARY KEY (`idOtros`),
  ADD KEY `fk_curri_otros` (`idCurri`);

--
-- Indexes for table `profesion`
--
ALTER TABLE `profesion`
  ADD PRIMARY KEY (`idProfesion`),
  ADD KEY `fk_curri_profesion` (`idCurri`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `idCurri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `formacion`
--
ALTER TABLE `formacion`
  MODIFY `idFormacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `otros`
--
ALTER TABLE `otros`
  MODIFY `idOtros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `profesion`
--
ALTER TABLE `profesion`
  MODIFY `idProfesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
