-- phpMyAdmin SQL Dump
-- version 3.3.7deb3build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-01-2011 a las 20:09:34
-- Versión del servidor: 5.1.49
-- Versión de PHP: 5.3.3-1ubuntu9.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `registromensajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `bd_contacts` (
  `iduser` int(11) NOT NULL,
  `idcontact` int(11) NOT NULL,
  PRIMARY KEY (`iduser`,`idcontact`)
) ENGINE=MyISAM;

--
-- Volcar la base de datos para la tabla `contactos`
--

INSERT INTO `bd_contacts` (`iduser`, `idcontact`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `bd_messages` (
  `idmessage` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `refsender` int(10) unsigned NOT NULL,
  `refrecipient` int(10) unsigned NOT NULL,
  `date` varchar(10) NOT NULL,
  `time` varchar(5) NOT NULL,
  `subject` varchar(20) NOT NULL DEFAULT '[without subject]',
  `body` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idmessage`)
) ENGINE=MyISAM AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `mensajes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `bd_users` (
  `iduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nick` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL DEFAULT '0000',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=MyISAM AUTO_INCREMENT=21 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `bd_users` (`iduser`, `nick`, `password`, `name`) VALUES
(1, 'emilio', '0000', 'Emilio Jesús Ramírez Velasco'),
(2, 'rocio', '1111', 'Rocío Gómez Caballero'),
(3, 'alvaro', '2222', 'Álvaro Yeste'),
(4, 'javier', '0000', 'Javier Jiménez Rodríguez'),
(5, 'beatriz', '1111', 'Beatriz Morales Rosales'),
(6, 'ana', '2222', 'Ana María Bernier Blanco'),
(7, 'danielp', '0000', 'Daniel Palma'),
(8, 'josef', '1111', 'José de la Fuente Murillo'),
(9, 'joseb', '2222', 'José Belmonte Gómez'),
(10, 'israel', '0000', 'José Israel Fernández Barroso'),
(11, 'rafael', '1111', 'Rafael Sánchez Santos'),
(12, 'danielc', '2222', 'Daniel Curtean');
