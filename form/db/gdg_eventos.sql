-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2016 a las 18:53:38
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gdg_eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` bigint(20) NOT NULL AUTO_INCREMENT,
  `PRIVILEGIO` varchar(25) DEFAULT NULL,
  `DESCRIPCION` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `PRIVILEGIO`, `DESCRIPCION`) VALUES
(1, 'Registro presencial', 'Este usuario solo puede realizar registros, el dia del evento'),
(2, 'Registro online', 'Este usuario solo puede activar los registros online'),
(3, 'Super usuario', 'Este usuario tiene acceso a ambas cuentas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `ID_EVENTO` bigint(20) NOT NULL AUTO_INCREMENT,
  `NOMBRE_EVENTO` varchar(50) DEFAULT NULL,
  `FECHA_EVENTO` timestamp NULL DEFAULT NULL,
  `UBICACION` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_EVENTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`ID_EVENTO`, `NOMBRE_EVENTO`, `FECHA_EVENTO`, `UBICACION`) VALUES
(1, 'DevFest - 2016', '2016-11-22 04:00:00', 'Universidad La Salle');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_web`
--

CREATE TABLE IF NOT EXISTS `inscripcion_web` (
  `ID_INSCRIPCION` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_REGISTRO` bigint(20) NOT NULL,
  `IMG_RECIBO` varchar(30) DEFAULT NULL,
  `CODIGO_RECIBO` varchar(20) NOT NULL,
  `BANCO` varchar(40) DEFAULT NULL,
  `VALIDADO` tinyint(1) NOT NULL DEFAULT '0',
  `TOTAL_PAGADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_INSCRIPCION`),
  KEY `ID_REGISTRO` (`ID_REGISTRO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `inscripcion_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `ID_REGISTRO` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_EVENTO` bigint(20) DEFAULT NULL,
  `NOMBRE` varchar(30) DEFAULT NULL,
  `APAT` varchar(30) DEFAULT NULL,
  `AMAT` varchar(30) DEFAULT NULL,
  `CORREO` varchar(45) NOT NULL,
  `CI` int(11) NOT NULL,
  `CELULAR` int(11) DEFAULT NULL,
  `TIPO` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`ID_REGISTRO`),
  KEY `FK_REFERENCE_3` (`ID_EVENTO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `souvenir`
--

CREATE TABLE IF NOT EXISTS `souvenir` (
  `ID_SOUVENIR` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_REGISTRO` bigint(20) DEFAULT NULL,
  `CANTIDAD_TAZAS` int(11) DEFAULT NULL,
  `CANTIDAD_POLERAS` int(11) DEFAULT NULL,
  `TALLA_POLERA` char(2) NOT NULL,
  `TOTAL_SOUVENIR` float DEFAULT NULL,
  PRIMARY KEY (`ID_SOUVENIR`),
  KEY `ID_REGISTRO` (`ID_REGISTRO`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_USUARIO` bigint(20) NOT NULL AUTO_INCREMENT,
  `ID_ADMIN` bigint(20) DEFAULT NULL,
  `NOMBRE_USUARIO` varchar(50) DEFAULT NULL,
  `CI` varchar(8) DEFAULT NULL,
  `CONTRASENA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `FK_REFERENCE_6` (`ID_ADMIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valida_a`
--

CREATE TABLE IF NOT EXISTS `valida_a` (
  `ID_USUARIO` bigint(20) DEFAULT NULL,
  `ID_REGISTRO` bigint(20) NOT NULL,
  `ID_VALIDACION` bigint(20) NOT NULL AUTO_INCREMENT,
  `FECHA_VALIDACION` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_VALIDACION`),
  KEY `FK_REFERENCE_7` (`ID_USUARIO`),
  KEY `ID_REGISTRO` (`ID_REGISTRO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripcion_web`
--
ALTER TABLE `inscripcion_web`
  ADD CONSTRAINT `inscripcion_web_ibfk_1` FOREIGN KEY (`ID_REGISTRO`) REFERENCES `registro` (`ID_REGISTRO`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `FK_REFERENCE_3` FOREIGN KEY (`ID_EVENTO`) REFERENCES `evento` (`ID_EVENTO`);

--
-- Filtros para la tabla `souvenir`
--
ALTER TABLE `souvenir`
  ADD CONSTRAINT `souvenir_ibfk_1` FOREIGN KEY (`ID_REGISTRO`) REFERENCES `registro` (`ID_REGISTRO`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_REFERENCE_6` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);

--
-- Filtros para la tabla `valida_a`
--
ALTER TABLE `valida_a`
  ADD CONSTRAINT `FK_REFERENCE_7` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `valida_a_ibfk_1` FOREIGN KEY (`ID_REGISTRO`) REFERENCES `registro` (`ID_REGISTRO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
