-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2018 a las 19:40:13
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `geopagos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `codigousuario` int(11) NOT NULL,
  `codigousuariofavorito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`codigousuario`, `codigousuariofavorito`) VALUES
(1, 2),
(2, 1),
(1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `codigopago` int(11) NOT NULL,
  `importe` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`codigopago`, `importe`, `fecha`) VALUES
(1, 20000, '2018-01-20'),
(2, 18000, '2018-01-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigousuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigousuario`, `usuario`, `clave`, `edad`) VALUES
(1, 'jeanorta', 'b3b4d2dbedc99fe843fd3dedb02f086f', 36),
(2, 'daymarin', '93ef886da951d1bd3d55d79476eded99', 31),
(3, 'santiago', 'db80b9aa37ae77339d4bc2b290d44231', 28),
(4, 'daymar', 'c8758b517083196f05ac29810b924aca', 26),
(5, 'Omar', '798cebccb32617ad94123450fd137104', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariospagos`
--

CREATE TABLE `usuariospagos` (
  `codigopago` int(11) NOT NULL,
  `codigousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuariospagos`
--

INSERT INTO `usuariospagos` (`codigopago`, `codigousuario`) VALUES
(1, 1),
(2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`codigopago`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigousuario`);

--
-- Indices de la tabla `usuariospagos`
--
ALTER TABLE `usuariospagos`
  ADD PRIMARY KEY (`codigopago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `codigopago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123461;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
