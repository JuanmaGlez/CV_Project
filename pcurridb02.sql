-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2017 at 06:37 PM
-- Server version: 5.7.17-0ubuntu0.16.04.2
-- PHP Version: 5.6.30-10+deb.sury.org~xenial+2

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
  `idCurri` int(11) NOT NULL,
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
  `idCurri` int(11) NOT NULL,
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
(1, 'manu', '$2y$12$NI9m/Nk0ZlxotKjp4MuGzO7iNDh9vqpH9KH4wxrOeShpNiRF2wPpu', 'smigol_82@yahoo.es', 'Manu', 'Glez', '22222222-X', '1990-12-22', 'La que sea, 2', '41300', 'San José', 'Sevilla', '600600600', '954000000', 'administrador', 'activado', NULL, NULL),
(2, 'maria', '$2y$12$ceqlt9OBQ5Q99GSyFkrdme/G1Vk80Xv/.aaP3RiBfHXPOuGKQmrfu', 'maria@maria.com', 'María', 'Pérez', '22222223-X', '1997-02-02', 'Lope sin Rueda, 16', '41007', 'Sevilla', 'Sevilla', '600600601', '950000001', 'usuario', 'activado', '2017-05-18 16:00:00', 'muneco.png'),
(3, 'luis', '$2y$12$oNAwh3OKVd88j3CjzhKxZOVZ1gb6BgjSMVFVVMGZj9Kj6BMdQ4xqy', 'luis@luis.es', 'Luis', 'Díaz', '12121212-x', '2001-05-05', 'Izquierda 2', '41003', 'Sevilla', 'Sevilla', '611611611', '954111111', 'usuario', 'activado', '2017-05-18 16:02:00', 'muneco.png'),
(4, 'ana', '$2y$12$0lFd5mJUdS/VLBy8fk6PRuEk8pJVabwT7VSDgJ4E94Btovr.Yqzm2', 'ana@ana.es', 'Ana', 'López', '11111111-Z', '2000-04-02', 'Primera 97', '41300', 'San José', 'Sevilla', '600600609', '954000002', 'usuario', 'activado', '2017-05-18 16:04:21', NULL),
(5, 'noe', '$2y$12$PqrslesDeLBFKLPkt2n6B.Nn4Z2BNFtnPU3d7T0/wDxZ83ANuL.XK', 'noe@noe.es', 'Noelia', 'Martín', '11111111-x', '2001-02-01', 'Sol 1', '41007', 'Sevilla', 'Sevilla', '600600609', '954000007', 'usuario', 'activado', '2017-05-18 16:15:34', 'muneco.png'),
(6, 'usuario1', '$2y$12$L35o826hZGYEOpj3x3K3ZuBoxRMYQRxQqv9VwVtYD8EmhFz7qj9FC', 'usuario1@usuario.es', 'Usuario', 'Uno', '11111111-u', '1980-12-12', 'Esta de aquí 1', '41007', 'Sevilla', 'Sevilla', '955955955', '605000010', 'usuario', 'activado', NULL, 'muneco.png'),
(7, 'usuario2', '$2y$12$NbJm2MqaaBcDnR9Yjvyi7.cDfQLVr49RjNKi1K701Kfgpknyuvuw.', 'usuario2@usuario.es', 'Usuario', 'Dos', '11111112-u', '1980-12-13', 'Bien 1', '41007', 'Sevilla', 'Sevilla', '600600602', '954000003', 'usuario', 'activado', NULL, 'muneco.png'),
(8, 'usuario3', '$2y$12$GOLM3eC1Ev3F4gqEHjSt1eenTRsXvhC.ohpgvSjB5tuS2q10wTL7u', 'usuario3@usuario.es', 'Usuario', 'Tres', '11111113-x', '2000-04-22', 'Esta misma 2', '41300', 'San José', 'Sevilla', '612345679', '954000007', 'usuario', 'activado', NULL, 'muneco.png'),
(9, 'usuario4', '$2y$12$oGYDjFVuJ1gQ9YGKEAnrE.ZQzv6OcnPBpTY3MbcYLF2k68DIsKrEe', 'usuario4@usuario.es', 'Usuario', 'Cuatro', '11111114-x', '2000-06-22', 'Primera 2', '41007', 'Sevilla', 'Sevilla', '600600604', '954000004', 'usuario', 'activado', NULL, 'muneco.png'),
(10, 'usuario5', '$2y$12$CXI928echqr2w7c5IpHdIuI19Vt18fYHPDUIBlbQAEqImh9oNsS.i', 'usuario5@usuario.es', 'Usuario', 'Cinco', '11111115-x', '2002-06-22', 'Que bien 2', '41002', 'Sevilla', 'Sevilla', '600221122', '951234123', 'usuario', 'activado', NULL, NULL),
(11, 'consultor1', '$2y$12$VuWE6cjVXR5MtYCTJQAnYOa2dVF1MqpHX4RDPKU5bbfPoYmWPGLNy', 'consultor1@consultor.com', 'Consultor', 'Uno', '33333333-x', '1997-02-01', 'Rio 2', '41007', 'Sevilla', 'Sevilla', '600111000', '950111000', 'consultor', 'activado', NULL, NULL),
(12, 'xwilly', '$2y$12$/5tYpZK.d0vXj4CxwzA1lO/DtQRMfX79cp6gKtqsrh4Go19.oIAsC', 'willy@willy.com', 'Wilson', 'Alarcon', '22112211-x', '2001-02-01', 'Luna 1', '41300', 'San José', 'Sevilla', '612345679', '954000002', 'usuario', 'activado', NULL, NULL),
(13, 'consultor2', '$2y$12$0SKB6xV623Qx8T6pwq3JxO7Yso4XPFY0OzT9Reb4QOVdSCeXxrDZW', 'consultor2@consultor.com', 'Consultor', 'Dos', '12345678-P', '2002-02-04', 'Luna 4', '41209', 'Sevilla', 'Sevilla', '600600604', '954000004', 'usuario', 'activado', '2017-05-21 16:37:26', NULL),
(14, 'consultor3', 'aaaa', 'consultor3@consultor.com', 'vacio', 'vacio', 'vacio', '2000-01-01', 'vacio', 'vacio', 'vacio', 'vacio', 'vacio', 'vacio', 'consultor', 'activado', '2017-05-23 18:35:54', NULL),
(15, 'consultor4', '', 'consultor4@consultor.com', '', '', '', '2000-01-01', '', '', '', '', '', '', 'consultor', 'desactivado', '2017-05-23 18:39:13', NULL),
(16, 'admin1', '$2y$12$AzKZtuVBATfYdenqVDyZRekF3MJzuvlkRxvNrALiXAEsgn1uL/Hu2', 'admin1@admin.com', '', '', 'admin1', '2000-01-01', '', '', '', '', '', '', 'administrador', 'activado', '2017-05-23 18:52:21', NULL),
(17, 'consultor5', '$2y$12$e478NlG6pbAEfwi/gwIEseIX.K.JQNsUGZ1Id1RtbH34GZguOMoku', 'consultor5@consultor.com', '', '', 'consultor5', '2000-01-01', '', '', '', '', '', '', 'consultor', 'activado', '2017-05-23 19:30:25', NULL);

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
  MODIFY `idCurri` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `formacion`
--
ALTER TABLE `formacion`
  MODIFY `idFormacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `otros`
--
ALTER TABLE `otros`
  MODIFY `idOtros` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profesion`
--
ALTER TABLE `profesion`
  MODIFY `idProfesion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
