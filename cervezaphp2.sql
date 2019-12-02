-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 14:52:51
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cervezaphp2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `CodMarca` int(11) NOT NULL,
  `NomMarca` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `CodPais` int(11) NOT NULL,
  `imgMarca` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`CodMarca`, `NomMarca`, `CodPais`, `imgMarca`) VALUES
(1, 'Bonvivant', 1, 'https://soloartesanas.es/img/m/171.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `CodPais` int(11) NOT NULL,
  `NomPais` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `imgPais` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`CodPais`, `NomPais`, `imgPais`) VALUES
(1, 'SPAIN', 'https://rlv.zcache.es/chapa_redonda_de_7_cm_calidad_de_la_bandera_espanola-r77a035550c344f6ba1bf982e5576c0d2_k94r7_540.jpg?rlvnet=1'),
(2, 'Portugal', 'https://rlv.zcache.es/pegatina_redonda_bandera_de_portugal-rabd41a7aa9c5431e988d63be91edcbef_0ugmp_8byvr_540.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `CodTipo` int(11) NOT NULL,
  `NomTipo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Graduacion` decimal(3,1) NOT NULL,
  `Composicion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `CodMarca` int(11) NOT NULL,
  `imgTipo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`CodTipo`, `NomTipo`, `Graduacion`, `Composicion`, `Capacidad`, `CodMarca`, `imgTipo`) VALUES
(1, 'Yeti', '5.6', 'Pale Ale', 330, 1, 'https://bonvivant.beer/wp-content/uploads/2019/09/beer-1818182_1c89f_hd-600x1200.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `fec_nacimiento` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `es_admin` tinyint(1) NOT NULL,
  `api_key` varchar(33) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `email`, `nombre`, `apellidos`, `pass`, `fec_nacimiento`, `foto`, `es_admin`, `api_key`) VALUES
(3, 'alex@cerverza.es', 'Alex', 'Morales', '81dc9bdb52d04dc20036dbd8313ed055', '2019-11-01', NULL, 0, '2dc4a89a5a4298f6905746a85e339fe5');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`CodMarca`),
  ADD KEY `marca_ibfk_1` (`CodPais`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`CodPais`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`CodTipo`),
  ADD KEY `CodMarca` (`CodMarca`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `CodMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `CodPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `CodTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`CodPais`) REFERENCES `pais` (`CodPais`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `tipo_ibfk_1` FOREIGN KEY (`CodMarca`) REFERENCES `marca` (`CodMarca`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
