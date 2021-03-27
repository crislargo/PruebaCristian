-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2021 a las 04:03:08
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL COMMENT 'Identificador del área',
  `nombre` varchar(25) NOT NULL COMMENT 'Nombre del área de la empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Administración'),
(2, 'Talento Humano'),
(3, 'Sistemas'),
(4, 'Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `sexo` char(1) NOT NULL,
  `area_id` int(11) NOT NULL,
  `boletin` int(11) NOT NULL DEFAULT 0,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `email`, `sexo`, `area_id`, `boletin`, `descripcion`) VALUES
(6, 'Cristhian Largo Duque', 'cristhian.largod@gmail.com', 'M', 3, 1, 'Programador Laravel'),
(7, 'Andres Duque', 'andres@duque', 'M', 1, 1, 'prueba de programacion'),
(8, 'Amparo Duque', 'amparo@gmail.com', 'F', 4, 0, 'Prueba de creación de usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_rol`
--

CREATE TABLE `empleado_rol` (
  `empleado_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado_rol`
--

INSERT INTO `empleado_rol` (`empleado_id`, `rol_id`) VALUES
(6, 1),
(7, 2),
(8, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL COMMENT 'Identificador del ROl',
  `nombre` varchar(225) NOT NULL COMMENT 'Nombre del Rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Profesional de Proyectos - Desarrollador'),
(2, 'Gerente Estratégico'),
(3, 'Auxiliar Administrativo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
