-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-02-2025 a las 07:03:16
-- Versión del servidor: 8.1.0
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `id_cuestionario` int NOT NULL,
  `fechaCreacion` date NOT NULL,
  `tipo` enum('atributos','objetivos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id_datos` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidoP` varchar(255) NOT NULL,
  `apellidoM` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `id_usuario` int NOT NULL,
  `cohorte` varchar(255) NOT NULL,
  `empresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`id_datos`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `id_usuario`, `cohorte`, `empresa`) VALUES
(1, 'Luis Angel', 'Gonzalez', 'Flores', '3', 6, 'II-503', 'TESSFP'),
(2, 'Luis Angel', 'Gonzalez', 'Flores', '3', 7, 'II-503', 'TESSFP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id_opcion` int NOT NULL,
  `etiqueta` varchar(2) NOT NULL,
  `opcion` varchar(255) NOT NULL,
  `id_pregunta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `id_cuestionario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id_respuesta` int NOT NULL,
  `id_usuario` int NOT NULL,
  `id_pregunta` int NOT NULL,
  `id_opcion` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `contra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rol` enum('egresado','admin','empleador','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `contra`, `rol`) VALUES
(3, 'lui1525angel@gmail.com', '$2y$10$EatbYUvFzMr23Enql1T.MeMriIdh6uvLYYL5FsdECqEBovRElQP8O', 'egresado'),
(4, 'lui1525angel@gmail.com', '$2y$10$WE5Cxy8I3aEQ4vpztRvgq.ELckHcoVNhcr6SEe.xVLZufJgx8Vmf6', 'egresado'),
(5, 'lui1525angel@gmail.com', '$2y$10$GWQ.zfdB1pFnW9xSPj.za.V5udVPLOW8acnK0Hk9Ha6yJxC1Onfgq', 'egresado'),
(6, 'lui1525angel@gmail.com', '$2y$10$KGEjyz/FzHyexZ4wvfASNe9jwJ4rQUwAiboKdVeIxxHHAfviAnMPm', 'egresado'),
(7, 'lui1525angel@gmail.com', '$2y$10$RwKDZvNNKepp8HhaabyBouGo3eNBmuxv0cjEnmJhZbq3rsyUwiWIq', 'egresado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  ADD PRIMARY KEY (`id_cuestionario`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id_datos`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id_opcion`),
  ADD KEY `id_pregunta` (`id_pregunta`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_cuestionario` (`id_cuestionario`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `id_usuario` (`id_usuario`,`id_pregunta`),
  ADD KEY `id_pregunta` (`id_pregunta`),
  ADD KEY `id_opcion` (`id_opcion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `id_cuestionario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id_datos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opcion` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`id_cuestionario`) REFERENCES `cuestionarios` (`id_cuestionario`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas` (`id_pregunta`),
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`id_opcion`) REFERENCES `opciones` (`id_opcion`),
  ADD CONSTRAINT `respuestas_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
