-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2019 a las 01:06:42
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `hotel`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `tipo`) VALUES
(1, 'Valeria', 'Esquivel', 'habitual'),
(4, 'alexandra', 'esquivel', 'esporadico'),
(5, 'alex', 'dominguez', 'esporadico'),
(6, 'Grecia', 'Rodriguez', 'esporadico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE IF NOT EXISTS `habitaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_habitacion` varchar(255) NOT NULL,
  `precio` double NOT NULL,
  `img_hotel` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `tipo_habitacion`, `precio`, `img_hotel`) VALUES
(1, 'matrimonial', 200, ''),
(2, 'matrimonial', 200, ''),
(3, 'matrimonial', 200, ''),
(6, 'especial', 2500, ''),
(8, 'individual', 8900, ''),
(17, 'especial', 300, 'imagenes/25530276_1569495723116378_1489681477_n.jpg'),
(18, 'matrimonial', 850.9, 'imagenes/Matrimonial-Miraflore-hotel1.jpg'),
(19, 'dos camas', 900, 'imagenes/17.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `nombre`, `foto`) VALUES
(1, 'd', 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_habitacion` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `dias_reserva` int(11) NOT NULL,
  `pago_total` double NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_habitacion` (`id_habitacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_cliente`, `id_habitacion`, `fecha_entrada`, `dias_reserva`, `pago_total`, `estado`) VALUES
(1, 1, 2, '2019-05-01', 55, 55555, 2),
(2, 4, 6, '2019-05-11', 5, 500, 0),
(3, 4, 2, '2019-05-05', 9, 0, 0),
(4, 4, 8, '2019-05-16', 10, 0, 1),
(5, 4, 2, '2019-05-26', 1, 0, 0),
(6, 4, 8, '2019-05-26', 5, 8900, 1),
(7, 4, 8, '2019-05-02', 2147483647, 888888.3, 1888),
(8, 4, 8, '2019-05-31', 5, 44500, 1),
(9, 1, 1, '2019-05-01', 0, 0, 0),
(10, 4, 8, '2019-05-02', 5, 10.2, 1),
(11, 4, 8, '2019-05-26', 5, 8900, 1000000000),
(12, 4, 8, '2019-05-02', 5, 10.2, 1888),
(13, 4, 8, '2019-05-02', 2147483647, 10.2, 1888),
(14, 4, 8, '2019-05-02', 2147483647, 10.2, 1888),
(15, 4, 8, '2019-05-02', 2147483647, 10.2055, 1888),
(70, 4, 8, '2019-05-02', 5, 10.2, 1888),
(71, 4, 18, '2019-06-07', 8, 5000, 1),
(72, 1, 18, '2019-05-19', 10, 8509, 1),
(73, 6, 19, '2019-05-19', 2, 1800, 1),
(74, 6, 19, '2019-05-03', 5, 4500, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_usuario` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo_usuario`, `nombre`, `password`) VALUES
(1, '1', 'val', '123'),
(2, '2', 'us', '1234'),
(3, '1', 'alexandra', '123456'),
(4, '2', 'cc', 'cc'),
(5, '1', 'ww', 'ww'),
(6, '1', 'ww', 'ww'),
(7, '2', 'ww1', 'ww'),
(8, '2', 'ww1', 'ww');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `reservas_2` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id`),
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
