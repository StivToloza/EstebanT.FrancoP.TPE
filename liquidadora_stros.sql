-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2023 a las 02:34:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `liquidadora_stros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cias`
--

CREATE TABLE `cias` (
  `id_Cia` int(11) NOT NULL,
  `nombre_cia` varchar(30) NOT NULL,
  `direccion_Cia` varchar(40) NOT NULL,
  `Contacto` double NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspectores`
--

CREATE TABLE `inspectores` (
  `id_inspector` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `contacto` double NOT NULL,
  `email` varchar(40) NOT NULL,
  `localidad` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidadores`
--

CREATE TABLE `liquidadores` (
  `id_liquidador` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `contacto` double NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `siniestros`
--

CREATE TABLE `siniestros` (
  `id_Stro` int(11) NOT NULL,
  `id_Cia` int(11) NOT NULL,
  `tipo_Stro` varchar(30) NOT NULL,
  `nombre:_Asegurado` varchar(30) NOT NULL,
  `apellido_Asegurado` varchar(30) NOT NULL,
  `fecha_Stro` date NOT NULL,
  `direccion_Aseg` varchar(40) NOT NULL,
  `localidad` varchar(25) NOT NULL,
  `contacto_Aseg` int(11) NOT NULL,
  `id_iquidador` int(11) NOT NULL,
  `id_inspector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cias`
--
ALTER TABLE `cias`
  ADD PRIMARY KEY (`id_Cia`);

--
-- Indices de la tabla `inspectores`
--
ALTER TABLE `inspectores`
  ADD PRIMARY KEY (`id_inspector`);

--
-- Indices de la tabla `liquidadores`
--
ALTER TABLE `liquidadores`
  ADD PRIMARY KEY (`id_liquidador`);

--
-- Indices de la tabla `siniestros`
--
ALTER TABLE `siniestros`
  ADD UNIQUE KEY `id_Stro` (`id_Stro`),
  ADD UNIQUE KEY `id_Stro_3` (`id_Stro`) USING BTREE,
  ADD KEY `id_Cia` (`id_Cia`),
  ADD KEY `id_Cia_2` (`id_Cia`),
  ADD KEY `id_iquidador` (`id_iquidador`,`id_inspector`),
  ADD KEY `id_Stro_2` (`id_Stro`),
  ADD KEY `id_Stro_4` (`id_Stro`),
  ADD KEY `id_inspector` (`id_inspector`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cias`
--
ALTER TABLE `cias`
  MODIFY `id_Cia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inspectores`
--
ALTER TABLE `inspectores`
  MODIFY `id_inspector` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidadores`
--
ALTER TABLE `liquidadores`
  MODIFY `id_liquidador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `siniestros`
--
ALTER TABLE `siniestros`
  MODIFY `id_Stro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cias`
--
ALTER TABLE `cias`
  ADD CONSTRAINT `cias_ibfk_1` FOREIGN KEY (`id_Cia`) REFERENCES `siniestros` (`id_Cia`);

--
-- Filtros para la tabla `inspectores`
--
ALTER TABLE `inspectores`
  ADD CONSTRAINT `inspectores_ibfk_1` FOREIGN KEY (`id_inspector`) REFERENCES `siniestros` (`id_inspector`);

--
-- Filtros para la tabla `liquidadores`
--
ALTER TABLE `liquidadores`
  ADD CONSTRAINT `liquidadores_ibfk_1` FOREIGN KEY (`id_liquidador`) REFERENCES `siniestros` (`id_iquidador`);

--
-- Filtros para la tabla `siniestros`
--
ALTER TABLE `siniestros`
  ADD CONSTRAINT `siniestros_ibfk_1` FOREIGN KEY (`id_iquidador`) REFERENCES `liquidadores` (`id_liquidador`),
  ADD CONSTRAINT `siniestros_ibfk_2` FOREIGN KEY (`id_inspector`) REFERENCES `inspectores` (`id_inspector`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
