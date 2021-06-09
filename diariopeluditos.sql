-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 10:22:55
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diariopeluditos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenta`
--

CREATE TABLE `agenta` (
  `IdAgenda` int(11) NOT NULL,
  `Descripcion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Hora` time NOT NULL,
  `IdMascota` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Dia` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `IdComentario` int(11) NOT NULL,
  `Descripcion_comentario` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha_comentario` date NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdPublicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `IdMascota` int(11) NOT NULL,
  `Nombre_mascota` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Sexo` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tipo_mascota` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Raza_mascota` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Edad` int(2) NOT NULL,
  `Foto_mascota` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `curso` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `IdPublicacion` int(11) NOT NULL,
  `Titulo` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion_publicacion` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha_publicacion` date NOT NULL,
  `Foto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`IdPublicacion`, `Titulo`, `Descripcion_publicacion`, `Fecha_publicacion`, `Foto`, `IdUsuario`) VALUES
(3, 'Prueba1', 'Esto es una prueba....', '2020-11-30', 'plato-de-hamburguesa8.jpg', 1),
(4, 'Prueba2', 'prueba2', '2020-11-30', 'plato-de-hamburguesa8.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Apellido` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Correo` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Password` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Telefono` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Trabajo` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nombre`, `Apellido`, `Correo`, `usuario`, `Password`, `Telefono`, `Direccion`, `Trabajo`, `Fecha_creacion`) VALUES
(1, 'christo', 'cruz', 'c123@gmail.com', 'admin', '123', '123', '', 'doc', '0000-00-00'),
(3, 'Pricila', 'Romero', 'pricila@gmail.com', 'pricila', '123', '', '', '', '0000-00-00'),
(4, 'Mateo', 'Quinteros', 'mateo@gmail.com', 'mateo', '123', '', '', '', '2020-11-28'),
(7, 'Alexis', 'Fuentes', 'alexis@gmail.com', 'alexito', '123', '', '', '', '2020-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificacion_veterinario`
--

CREATE TABLE `verificacion_veterinario` (
  `IdVeterinario` int(11) NOT NULL,
  `Carnet` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenta`
--
ALTER TABLE `agenta`
  ADD PRIMARY KEY (`IdAgenda`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdMascota` (`IdMascota`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`IdComentario`),
  ADD KEY `IdPublicacion` (`IdPublicacion`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`IdMascota`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`IdPublicacion`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indices de la tabla `verificacion_veterinario`
--
ALTER TABLE `verificacion_veterinario`
  ADD PRIMARY KEY (`IdVeterinario`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenta`
--
ALTER TABLE `agenta`
  MODIFY `IdAgenda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `IdComentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `IdMascota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `IdPublicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `verificacion_veterinario`
--
ALTER TABLE `verificacion_veterinario`
  MODIFY `IdVeterinario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenta`
--
ALTER TABLE `agenta`
  ADD CONSTRAINT `agenta_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `agenta_ibfk_2` FOREIGN KEY (`IdMascota`) REFERENCES `mascota` (`IdMascota`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`IdPublicacion`) REFERENCES `publicacion` (`IdPublicacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `verificacion_veterinario`
--
ALTER TABLE `verificacion_veterinario`
  ADD CONSTRAINT `verificacion_veterinario_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
