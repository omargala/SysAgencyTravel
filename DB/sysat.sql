-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-08-2017 a las 21:47:19
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sysat`
--
CREATE DATABASE IF NOT EXISTS `sysat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sysat`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbbitacora`
--

CREATE TABLE IF NOT EXISTS `tbbitacora` (
  `idbitacora` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `accion` text NOT NULL,
  PRIMARY KEY (`idbitacora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetalleedocta`
--

CREATE TABLE IF NOT EXISTS `tbdetalleedocta` (
  `idabono` int(11) NOT NULL AUTO_INCREMENT,
  `idedocuenta` int(11) NOT NULL,
  `abonadopor` varchar(100) NOT NULL,
  `recibidopor` varchar(100) NOT NULL,
  `montoabono` int(11) NOT NULL,
  `fechaabono` date NOT NULL,
  `modopagoabono` varchar(2) NOT NULL,
  `statusabono` varchar(1) NOT NULL,
  PRIMARY KEY (`idabono`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `tbdetalleedocta`
--

INSERT INTO `tbdetalleedocta` (`idabono`, `idedocuenta`, `abonadopor`, `recibidopor`, `montoabono`, `fechaabono`, `modopagoabono`, `statusabono`) VALUES
(1, 1, 'Isabel Loyo', 'Omar Gala', 350, '2017-06-26', 'ef', 'A'),
(2, 1, 'Isabel Loyo', 'Omar Gala', 500, '2017-06-27', 'ef', 'A'),
(3, 1, 'Isabel Loyo', 'Omar Gala', 300, '2017-06-27', 'tc', 'A'),
(4, 1, 'Isabel Loyo', 'Omar Gala', 450, '2017-06-28', 'ef', 'A'),
(5, 1, 'Isabel Loyo', 'Omar Gala', 100, '2017-06-28', 'ef', 'A'),
(6, 1, 'Isabel Loyo', 'Omar Gala', 100, '2017-06-28', 'ef', 'A'),
(7, 1, 'Isabel Loyo', 'Omar Gala', 200, '2017-06-28', 'ef', 'A'),
(8, 1, 'Isabel Loyo', 'Omar Gala', 50, '2017-06-28', 'ef', 'A'),
(9, 1, 'Isabel Loyo', 'Omar Gala', 80, '2017-06-28', 'ef', 'A'),
(10, 1, 'Isabel Loyo', 'Omar Gala', 25, '2017-06-28', 'ef', 'A'),
(11, 1, 'Isabel Loyo', 'Omar Gala', 20, '2017-06-28', 'ef', 'A'),
(12, 1, 'Isabel Loyo', 'Omar Gala', 90, '2017-06-28', 'ef', 'A'),
(13, 1, 'Isabel Loyo', 'Omar Gala', 1000, '2017-07-03', 'ef', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbedocta`
--

CREATE TABLE IF NOT EXISTS `tbedocta` (
  `idedocta` int(11) NOT NULL AUTO_INCREMENT,
  `cvelocalizador` varchar(30) NOT NULL,
  `montooriginal` decimal(10,0) NOT NULL,
  `acumulado` decimal(10,0) NOT NULL,
  `fechacreacion` date NOT NULL,
  `saldo` decimal(10,0) DEFAULT '0',
  `cantidadabonos` int(11) DEFAULT '0',
  `fechaultimoabono` date DEFAULT '0000-00-00',
  `statusedocta` varchar(1) NOT NULL,
  PRIMARY KEY (`idedocta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbedocta`
--

INSERT INTO `tbedocta` (`idedocta`, `cvelocalizador`, `montooriginal`, `acumulado`, `fechacreacion`, `saldo`, `cantidadabonos`, `fechaultimoabono`, `statusedocta`) VALUES
(1, '9999900598', '10800', '3265', '2017-06-12', '7535', 13, '2017-07-03', 'A'),
(2, '125234', '8600', '0', '2017-08-08', '8600', 0, '0000-00-00', 'A'),
(3, '88887777', '10000', '0', '2017-08-08', '0', 0, '0000-00-00', 'C'),
(4, '3333', '15000', '0', '2017-08-08', '15000', 0, '0000-00-00', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblocalizadores`
--

CREATE TABLE IF NOT EXISTS `tblocalizadores` (
  `idlocalizador` int(11) NOT NULL AUTO_INCREMENT,
  `cvelocalizador` varchar(30) NOT NULL,
  `titular` varchar(50) NOT NULL,
  `ttoo` varchar(50) NOT NULL,
  `otroespecificacion` varchar(100) NOT NULL,
  `tarifapublica` float NOT NULL,
  `fechain` date NOT NULL,
  `fechaout` date NOT NULL,
  `servicio` varchar(150) NOT NULL,
  `planalimentos` varchar(100) NOT NULL,
  `tipotarifa` varchar(100) NOT NULL,
  `numhabs` int(11) NOT NULL,
  `adultos` int(11) NOT NULL,
  `menores` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `fechacreacion` date NOT NULL,
  PRIMARY KEY (`idlocalizador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tblocalizadores`
--

INSERT INTO `tblocalizadores` (`idlocalizador`, `cvelocalizador`, `titular`, `ttoo`, `otroespecificacion`, `tarifapublica`, `fechain`, `fechaout`, `servicio`, `planalimentos`, `tipotarifa`, `numhabs`, `adultos`, `menores`, `status`, `fechacreacion`) VALUES
(1, '9999900598', 'OMAR GALA', '', '', 10800, '2017-07-01', '2017-02-07', 'GRAND BAHíA PRíNCIPE', 'TODO INCLUIDO', 'NORMAL', 1, 2, 0, 'A', '2017-06-12'),
(3, '125234', 'MILKA MENENDEZ', '', '', 8600, '2017-11-11', '2017-11-15', 'GRAN PARNASSUS', 'TODO INCLUIDO', 'NORMAL', 1, 2, 0, 'A', '2017-08-08'),
(4, '88887777', 'MILA JOVOVICH', '', '', 10000, '2017-12-21', '2017-12-28', 'CANCúN VIVA', 'TODO INCLUIDO', 'NORMAL', 1, 2, 0, 'A', '2017-08-08'),
(5, '3333', 'ALEJANDRO MURANO', '', '', 15000, '2017-09-10', '2017-09-15', 'XCARET', 'TODO INCLUIDO', 'VERANO', 1, 2, 0, 'A', '2017-08-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbusuario`
--

CREATE TABLE IF NOT EXISTS `tbusuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(8) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `fechaalta` date NOT NULL,
  `usuariocrea` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `perfil` varchar(30) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tbusuario`
--

INSERT INTO `tbusuario` (`idusuario`, `usuario`, `contrasenia`, `fechaalta`, `usuariocrea`, `nombre`, `perfil`) VALUES
(1, 'ogala', '82828', '2017-04-16', 1, 'omar gala', 'vendedor'),
(2, 'iloyo', '6574', '2017-04-16', 1, 'isabel loyo', 'vendedor'),
(3, 'pgala', '9087', '2017-04-16', 1, 'perla gala', 'vendedor'),
(4, 'fgala', '9393', '2017-04-16', 1, 'felix gala', 'vendedor'),
(5, 'dparedes', '123', '2017-04-16', 1, 'diana paredes', 'vendedor'),
(6, 'dcupul', '82828', '2017-04-16', 1, 'diana cupul', 'vendedor'),
(7, 'oacupul', '98988', '2017-04-16', 1, 'omar antonio cupul', 'vendedor'),
(8, 'ehelguer', '82828', '2017-04-16', 1, 'erick helguera', 'vendedor'),
(9, 'ehelguer', '88844', '2017-04-16', 1, 'esmeralda helguera', 'vendedor'),
(10, 'lparedes', '8833', '2017-04-16', 1, 'laura paredes', 'vendedor'),
(11, 'iparedes', '1283', '2017-04-16', 1, 'isma paredes', 'vendedor'),
(12, 'ipmoreno', '38383', '2017-04-16', 1, 'isma paredes morenos', 'vendedor'),
(13, 'cparedes', '939393', '2017-04-16', 1, 'caro paredes', 'vendedor'),
(14, 'lmoreno', '98999', '2017-04-16', 1, 'laura moreno', 'vendedor'),
(15, 'sloyo', '8888', '2017-04-16', 1, 'sofi loyo', 'vendedor'),
(16, 'iancona', '8888', '2017-04-16', 1, 'isa ancona', 'vendedor');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
