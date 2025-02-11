-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-02-2025 a las 15:26:53
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
-- Estructura de tabla para la tabla `controlrespuestas`
--

CREATE TABLE `controlrespuestas` (
  `id_control` int NOT NULL,
  `id_usuario` int NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `controlrespuestas`
--

INSERT INTO `controlrespuestas` (`id_control`, `id_usuario`, `status`) VALUES
(5, 14, 1),
(6, 14, 1),
(7, 14, 1),
(8, 14, 1),
(9, 9, 1),
(10, 15, 1),
(11, 13, 1),
(12, 16, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionarios`
--

CREATE TABLE `cuestionarios` (
  `id_cuestionario` int NOT NULL,
  `fechaCreacion` date NOT NULL,
  `tipo` enum('atributos','objetivos') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cuestionarios`
--

INSERT INTO `cuestionarios` (`id_cuestionario`, `fechaCreacion`, `tipo`) VALUES
(1, '2025-02-06', 'atributos'),
(2, '2025-02-06', 'objetivos'),
(3, '2025-02-10', 'atributos');

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
(4, 'Luis Angel', 'Gonzalez', 'Flores', '123', 9, '2020-2025', 'TESSFP'),
(6, 'Luis Angel', 'Gonzalez', 'Flores', '741852', 10, '2020-2025', 'Pollotec'),
(8, 'Luis Angel', 'Gonzalez', 'Flores', '1234', 12, '2014-2018', ''),
(9, 'd', 'd', 'd', '333', 13, '2010-2014', ''),
(10, 'k', 'k', 'kk', '222', 14, '', 'tesfp'),
(11, 'Luis Angel', 'Gonzalez', 'Flores', '2', 15, '2020-2024', ''),
(12, 'c', 'c', 'c', 'c', 16, '2010-2014', ''),
(13, 'e', 'e', 'e', 'e', 17, '', 'xxx');

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

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id_opcion`, `etiqueta`, `opcion`, `id_pregunta`) VALUES
(1, 'A', 'Muy frecuentemente', 1),
(2, 'B', 'frecuentemente', 1),
(3, 'C', 'ocasionalmente', 1),
(4, 'D', 'nunca', 1),
(5, 'A', 'Muy frecuentemente', 2),
(6, 'B', 'frecuentemente', 2),
(7, 'C', 'ocasionalmente', 2),
(8, 'D', 'nunca', 2),
(9, 'A', 'Muy frecuentemente', 3),
(10, 'B', 'frecuentemente', 3),
(11, 'C', 'ocasionalmente', 3),
(12, 'D', 'nunca', 3),
(13, 'A', 'Muy frecuentemente', 4),
(14, 'B', 'frecuentemente', 4),
(15, 'C', 'ocasionalmente', 4),
(16, 'D', 'nunca', 4),
(17, 'A', 'Muy frecuentemente', 5),
(18, 'B', 'frecuentemente', 5),
(19, 'C', 'ocasionalmente', 5),
(20, 'D', 'nunca', 5),
(21, 'A', 'Muy frecuentemente', 6),
(22, 'B', 'frecuentemente', 6),
(23, 'C', 'ocasionalmente', 6),
(24, 'D', 'nunca', 6),
(25, 'A', 'Muy frecuentemente', 7),
(26, 'B', 'frecuentemente', 7),
(27, 'C', 'ocasionalmente', 7),
(28, 'D', 'nunca', 7),
(29, 'A', 'Muy frecuentemente', 8),
(30, 'B', 'frecuentemente', 8),
(31, 'C', 'ocasionalmente', 8),
(32, 'D', 'nunca', 8),
(33, 'A', 'Muy frecuentemente', 9),
(34, 'B', 'frecuentemente', 9),
(35, 'C', 'ocasionalmente', 9),
(36, 'D', 'nunca', 9),
(37, 'A', 'Muy frecuentemente', 10),
(38, 'B', 'frecuentemente', 10),
(39, 'C', 'ocasionalmente', 10),
(40, 'D', 'nunca', 10),
(41, 'A', 'Muy frecuentemente', 11),
(42, 'B', 'frecuentemente', 11),
(43, 'C', 'ocasionalmente', 11),
(44, 'D', 'nunca', 11),
(45, 'A', 'Muy frecuentemente', 12),
(46, 'B', 'frecuentemente', 12),
(47, 'C', 'ocasionalmente', 12),
(48, 'D', 'nunca', 12),
(49, 'A', 'Muy frecuentemente', 13),
(50, 'B', 'frecuentemente', 13),
(51, 'C', 'ocasionalmente', 13),
(52, 'D', 'nunca', 13),
(53, 'A', 'Muy frecuentemente', 14),
(54, 'B', 'frecuentemente', 14),
(55, 'C', 'ocasionalmente', 14),
(56, 'D', 'nunca', 14),
(57, 'A', 'Muy frecuentemente', 15),
(58, 'B', 'frecuentemente', 15),
(59, 'C', 'ocasionalmente', 15),
(60, 'D', 'nunca', 15),
(61, 'A', 'Muy frecuentemente', 16),
(62, 'B', 'frecuentemente', 16),
(63, 'C', 'ocasionalmente', 16),
(64, 'D', 'nunca', 16),
(65, 'A', 'Muy frecuentemente', 17),
(66, 'B', 'frecuentemente', 17),
(67, 'C', 'ocasionalmente', 17),
(68, 'D', 'nunca', 17),
(69, 'A', 'Muy frecuentemente', 18),
(70, 'B', 'frecuentemente', 18),
(71, 'C', 'ocasionalmente', 18),
(72, 'D', 'nunca', 18),
(73, 'A', 'Superiores   ', 19),
(74, 'B', 'Mando Medio', 19),
(75, 'A', 'Privado ', 20),
(76, 'B', 'Publico', 20),
(77, 'A', 'Local ', 21),
(78, 'B', 'Nacional ', 21),
(79, 'C', 'Multinacional  ', 21),
(80, 'D', 'Internacional', 21),
(81, 'A', '5', 22),
(82, 'B', '6', 22),
(83, 'C', '7', 22),
(84, 'D', '8', 22),
(85, 'E', '9', 22),
(86, 'F', '10', 22),
(87, 'A', 'Muy frecuentemente', 23),
(88, 'B', 'frecuentemente', 23),
(89, 'C', 'ocasionalmente', 23),
(90, 'D', 'Nunca', 23),
(91, 'A', 'Muy frecuentemente', 24),
(92, 'B', 'frecuentemente', 24),
(93, 'C', 'ocasionalmente', 24),
(94, 'D', 'nunca', 24),
(95, 'A', 'Muy frecuentemente', 25),
(96, 'B', 'frecuentemente', 25),
(97, 'C', 'ocasionalmente', 25),
(98, 'D', 'nunca', 25),
(99, 'A', 'Muy frecuentemente', 26),
(100, 'B', 'frecuentemente', 26),
(101, 'C', 'ocasionalmente', 26),
(102, 'D', 'nunca', 26),
(103, 'A', 'Muy frecuentemente', 27),
(104, 'B', 'frecuentemente', 27),
(105, 'C', 'ocasionalmente', 27),
(106, 'D', 'nunca', 27),
(107, 'A', '1 a 3', 28),
(108, 'B', '3 a 5', 28),
(109, 'C', '6 o más', 28),
(110, 'A', '1 a 3', 29),
(111, 'B', '3 a 5', 29),
(112, 'C', '6 o más', 29),
(113, 'A', '1 a 3', 30),
(114, 'B', '3 a 5', 30),
(115, 'C', '6 o más', 30),
(116, 'A', '1 a 3', 31),
(117, 'B', '3 a 5', 31),
(118, 'C', '6 o más', 31),
(119, 'A', 'Muy frecuentemente', 32),
(120, 'B', 'frecuentemente', 32),
(121, 'C', 'ocasionalmente', 32),
(122, 'D', 'nunca', 32),
(123, 'A', 'Muy frecuentemente', 33),
(124, 'B', 'frecuentemente', 33),
(125, 'C', 'ocasionalmente', 33),
(126, 'D', 'nunca', 33),
(127, 'A', 'Muy frecuentemente', 34),
(128, 'B', 'frecuentemente', 34),
(129, 'C', 'ocasionalmente', 34),
(130, 'D', 'nunca', 34),
(131, 'A', 'Muy frecuentemente', 35),
(132, 'B', 'frecuentemente', 35),
(133, 'C', 'ocasionalmente', 35),
(134, 'D', 'nunca', 35),
(135, 'A', 'Muy frecuentemente', 36),
(136, 'B', 'frecuentemente', 36),
(137, 'C', 'ocasionalmente', 36),
(138, 'D', 'nunca', 36),
(139, 'A', 'Muy frecuentemente', 37),
(140, 'B', 'frecuentemente', 37),
(141, 'C', 'ocasionalmente', 37),
(142, 'D', 'nunca', 37),
(143, 'A', 'Muy frecuentemente', 38),
(144, 'B', 'frecuentemente', 38),
(145, 'C', 'ocasionalmente', 38),
(146, 'D', 'nunca', 38),
(147, 'A', 'Muy frecuentemente', 39),
(148, 'B', 'frecuentemente', 39),
(149, 'C', 'ocasionalmente', 39),
(150, 'D', 'nunca', 39),
(151, 'A', 'Muy frecuentemente', 40),
(152, 'B', 'frecuentemente', 40),
(153, 'C', 'ocasionalmente', 40),
(154, 'D', 'nunca', 40),
(155, 'A', 'Muy frecuentemente', 41),
(156, 'B', 'frecuentemente', 41),
(157, 'C', 'ocasionalmente', 41),
(158, 'D', 'nunca', 41),
(159, 'A', 'Muy frecuentemente', 42),
(160, 'B', 'frecuentemente', 42),
(161, 'C', 'ocasionalmente', 42),
(162, 'D', 'nunca', 42),
(163, 'A', 'Muy frecuentemente', 43),
(164, 'B', 'frecuentemente', 43),
(165, 'C', 'ocasionalmente', 43),
(166, 'D', 'nunca', 43),
(167, 'A', 'Muy frecuentemente', 44),
(168, 'B', 'frecuentemente', 44),
(169, 'C', 'ocasionalmente', 44),
(170, 'D', 'nunca', 44),
(171, 'A', 'Muy frecuentemente', 45),
(172, 'B', 'frecuentemente', 45),
(173, 'C', 'ocasionalmente', 45),
(174, 'D', 'nunca', 45),
(175, 'A', 'Muy frecuentemente', 46),
(176, 'B', 'frecuentemente', 46),
(177, 'C', 'ocasionalmente', 46),
(178, 'D', 'nunca', 46),
(179, 'A', 'Muy frecuentemente', 47),
(180, 'B', 'frecuentemente', 47),
(181, 'C', 'ocasionalmente', 47),
(182, 'D', 'nunca', 47),
(183, 'A', 'Muy frecuentemente', 48),
(184, 'B', 'frecuentemente', 48),
(185, 'C', 'ocasionalmente', 48),
(186, 'D', 'nunca', 48),
(187, 'A', 'Muy frecuentemente', 49),
(188, 'B', 'frecuentemente', 49),
(189, 'C', 'ocasionalmente', 49),
(190, 'D', 'nunca', 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id_pregunta` int NOT NULL,
  `pregunta` varchar(255) NOT NULL,
  `id_cuestionario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id_pregunta`, `pregunta`, `id_cuestionario`) VALUES
(1, '¿Ha resuelto  algún problema de conectividad que le permitió diseñar y desarrollar soluciones de redes locales confiables y escalables?', 1),
(2, 'A partir de su egreso y a la fecha, ¿ha encontrado y resuelto vulnerabilidades en su infraestructura aplicando principios éticos y profesionales?', 1),
(3, '¿Se actualiza en el uso de herramientas de administración de redes y servidores que le permiten solucionar problemáticas en un contexto actual y constante evolución?', 1),
(4, '¿Ha  realizado trabajo de campo en el levantamiento de requerimientos y el modelado de los mismos?', 1),
(5, '¿Ha realizado propuestas de proyectos que atiendan necesidades especificas de diversos sectores aplicando metodologías y procesos de ingeniería de software?', 1),
(6, '¿Todas las actividades realizadas en su entorno laboral  se ajustan a los valores y principios éticos profesionales ?', 1),
(7, '¿Ha dirigido equipos de trabajo?', 1),
(8, '¿Ha gestionado sistemas enterprise resourse planning (ERP)?', 1),
(9, '¿Ha desarrollado modulos o interfaces sobre sistemas Enterprise Resourse Planning (ERP)?', 1),
(10, '¿ha implementado servicios de TI que satisfagan necesidades alineándolos a los objetivos y recursos organizacionales', 1),
(11, '¿En su labor diaria, interactua con actividades  en un  idioma extranjero? ', 1),
(12, '¿Ha trabajado y/o dirigido equipos de diversas áreas de conocimiento utilizando procesos de ingeniería para la toma de decisiones? ', 1),
(13, '¿Ha evaluado y optimizado  procesos de diseño y gestión de base de datos?', 1),
(14, '¿Ha diseñado modelos de bases de datos integrados en sistemas de información que permitan analizar e interpretar datos?', 1),
(15, '¿Ha utilizado plataformas de desarrollo, soporte o mantenimiento colaboratibas en servicios en la nube (AWS, Azure, Google Colab,)?', 1),
(16, '¿ha empleado procesos y/o algoritmos de minería de datos  para la  generación de conocimiento?', 1),
(17, 'Desde su egreso ¿Ha iniciado algun emprendimiento o proyecto propio ?', 1),
(18, 'has aplicado metodologias de investigacion pura o aplicada que contribuya a la generacion de conocimiento ', 1),
(19, 'Dentro de su organización ¿Qué nivel jerárquico ocupa el egresado de la carrera de ingeniería informática?', 2),
(20, 'A que tipo de sector pertenece su empresa ?', 2),
(21, 'Cuál es el ámbito geografico de su empresa ?', 2),
(22, 'En una escala de 5 a 10 . ¿ Que nivel  de conocimientos y habiilidades ha demostrado el  egresado en su formación profesional para la solución de problemas  dentro de su organización ?', 2),
(23, '¿Con que Frecuencia el egresado implementa soluciones tecnológicas dentro de su organización?', 2),
(24, '¿Con que frecuencia el egresado participa en proyectos multidiciplinarios y sostenibles? ', 2),
(25, 'Como parte de las actividades realizadas dentro de su organización, con que frecuencia el egresado se rige bajo las normativas y estándares vigentes de calidad adecuados a su formación.', 2),
(26, '¿Con que fecuencia el egresado diseña y administra tecnologias que permitan optimizar los recursos disponibles dentro de su organización?', 2),
(27, '¿Con que frecuencia el egresado inplementa normas y estandares vigentes en el manejo y seguridad de la informacion y comunicación?', 2),
(28, '¿Cuantos de los egresados a cargo de su organización cuentan con estudios de posgrado?', 2),
(29, 'Su organización ofrece certificaciones o actualizaciones dirigidas a la formación profesional del egresado', 2),
(30, 'Al momento de la contratación del egresado, en promedio ¿Con cuantas certificaciones, diplomados o cursos de actualización contaba?', 2),
(31, 'A partir de su contratación y hasta la fecha cuatas certificaciones, diplomados o cursos de capacitación a logrado el egresado', 2),
(32, '¿Ha resuelto  algún problema de conectividad que le permitió diseñar y desarrollar soluciones de redes locales confiables y escalables?', 3),
(33, 'A partir de su egreso y a la fecha, ¿ha encontrado y resuelto vulnerabilidades en su infraestructura aplicando principios éticos y profesionales?', 3),
(34, '¿Se actualiza en el uso de herramientas de administración de redes y servidores que le permiten solucionar problemáticas en un contexto actual y constante evolución?', 3),
(35, '¿Ha  realizado trabajo de campo en el levantamiento de requerimientos y el modelado de los mismos?', 3),
(36, '¿Ha realizado propuestas de proyectos que atiendan necesidades especificas de diversos sectores aplicando metodologías y procesos de ingeniería de software?', 3),
(37, '¿Todas las actividades realizadas en su entorno laboral  se ajustan a los valores y principios éticos profesionales ?', 3),
(38, '¿Ha dirigido equipos de trabajo?', 3),
(39, '¿Ha gestionado sistemas enterprise resourse planning (ERP)?', 3),
(40, '¿Ha desarrollado modulos o interfaces sobre sistemas Enterprise Resourse Planning (ERP)?', 3),
(41, '¿ha implementado servicios de TI que satisfagan necesidades alineándolos a los objetivos y recursos organizacionales', 3),
(42, '¿En su labor diaria, interactua con actividades  en un  idioma extranjero? ', 3),
(43, '¿Ha trabajado y/o dirigido equipos de diversas áreas de conocimiento utilizando procesos de ingeniería para la toma de decisiones? ', 3),
(44, '¿Ha evaluado y optimizado  procesos de diseño y gestión de base de datos?', 3),
(45, '¿Ha diseñado modelos de bases de datos integrados en sistemas de información que permitan analizar e interpretar datos?', 3),
(46, '¿Ha utilizado plataformas de desarrollo, soporte o mantenimiento colaboratibas en servicios en la nube (AWS, Azure, Google Colab,)?', 3),
(47, '¿ha empleado procesos y/o algoritmos de minería de datos  para la  generación de conocimiento?', 3),
(48, 'Desde su egreso ¿Ha iniciado algun emprendimiento o proyecto propio ?', 3),
(49, 'has aplicado metodologias de investigacion pura o aplicada que contribuya a la generacion de conocimiento ', 3);

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

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id_respuesta`, `id_usuario`, `id_pregunta`, `id_opcion`) VALUES
(1, 9, 1, 1),
(2, 9, 2, 5),
(3, 9, 3, 9),
(4, 9, 4, 13),
(5, 9, 5, 17),
(6, 9, 6, 21),
(7, 9, 7, 25),
(8, 9, 8, 29),
(9, 9, 9, 33),
(10, 9, 10, 37),
(11, 9, 11, 41),
(12, 9, 12, 45),
(13, 9, 13, 49),
(14, 9, 14, 53),
(15, 9, 15, 57),
(16, 9, 16, 61),
(17, 9, 17, 65),
(18, 9, 18, 69),
(19, 9, 1, 1),
(20, 9, 2, 5),
(21, 9, 3, 9),
(22, 9, 4, 13),
(23, 9, 5, 17),
(24, 9, 6, 21),
(25, 9, 7, 25),
(26, 9, 8, 29),
(27, 9, 9, 33),
(28, 9, 10, 37),
(29, 9, 11, 41),
(30, 9, 12, 45),
(31, 9, 13, 49),
(32, 9, 14, 53),
(33, 9, 15, 57),
(34, 9, 16, 61),
(35, 9, 17, 65),
(36, 9, 18, 69),
(37, 9, 1, 1),
(38, 9, 2, 5),
(39, 9, 3, 9),
(40, 9, 4, 13),
(41, 9, 5, 17),
(42, 9, 6, 21),
(43, 9, 7, 25),
(44, 9, 8, 29),
(45, 9, 9, 33),
(46, 9, 10, 37),
(47, 9, 11, 41),
(48, 9, 12, 45),
(49, 9, 13, 49),
(50, 9, 14, 53),
(51, 9, 15, 57),
(52, 9, 16, 61),
(53, 9, 17, 65),
(54, 9, 18, 69),
(55, 9, 1, 1),
(56, 9, 2, 5),
(57, 9, 3, 9),
(58, 9, 4, 13),
(59, 9, 5, 17),
(60, 9, 6, 21),
(61, 9, 7, 25),
(62, 9, 8, 29),
(63, 9, 9, 33),
(64, 9, 10, 37),
(65, 9, 11, 41),
(66, 9, 12, 45),
(67, 9, 13, 49),
(68, 9, 14, 53),
(69, 9, 15, 57),
(70, 9, 16, 61),
(71, 9, 17, 65),
(72, 9, 18, 69),
(73, 9, 1, 1),
(74, 9, 2, 5),
(75, 9, 3, 9),
(76, 9, 4, 13),
(77, 9, 5, 17),
(78, 9, 6, 21),
(79, 9, 7, 25),
(80, 9, 8, 29),
(81, 9, 9, 33),
(82, 9, 10, 37),
(83, 9, 11, 41),
(84, 9, 12, 45),
(85, 9, 13, 49),
(86, 9, 14, 53),
(87, 9, 15, 57),
(88, 9, 16, 61),
(89, 9, 17, 65),
(90, 9, 18, 69),
(91, 9, 1, 1),
(92, 9, 2, 5),
(93, 9, 3, 9),
(94, 9, 4, 13),
(95, 9, 5, 17),
(96, 9, 6, 21),
(97, 9, 7, 25),
(98, 9, 8, 29),
(99, 9, 9, 33),
(100, 9, 10, 37),
(101, 9, 11, 41),
(102, 9, 12, 45),
(103, 9, 13, 49),
(104, 9, 14, 53),
(105, 9, 15, 57),
(106, 9, 16, 61),
(107, 9, 17, 65),
(108, 9, 18, 69),
(109, 9, 1, 1),
(110, 9, 2, 5),
(111, 9, 3, 9),
(112, 9, 4, 13),
(113, 9, 5, 17),
(114, 9, 6, 21),
(115, 9, 7, 25),
(116, 9, 8, 29),
(117, 9, 9, 33),
(118, 9, 10, 37),
(119, 9, 11, 41),
(120, 9, 12, 45),
(121, 9, 13, 49),
(122, 9, 14, 53),
(123, 9, 15, 57),
(124, 9, 16, 61),
(125, 9, 17, 65),
(126, 9, 18, 69),
(127, 9, 1, 1),
(128, 9, 2, 5),
(129, 9, 3, 9),
(130, 9, 4, 13),
(131, 9, 5, 17),
(132, 9, 6, 21),
(133, 9, 7, 25),
(134, 9, 8, 29),
(135, 9, 9, 33),
(136, 9, 10, 37),
(137, 9, 11, 41),
(138, 9, 12, 45),
(139, 9, 13, 49),
(140, 9, 14, 53),
(141, 9, 15, 57),
(142, 9, 16, 61),
(143, 9, 17, 65),
(144, 9, 18, 69),
(145, 9, 1, 1),
(146, 9, 2, 5),
(147, 9, 3, 9),
(148, 9, 4, 13),
(149, 9, 5, 17),
(150, 9, 6, 21),
(151, 9, 7, 25),
(152, 9, 8, 29),
(153, 9, 9, 33),
(154, 9, 10, 37),
(155, 9, 11, 41),
(156, 9, 12, 45),
(157, 9, 13, 49),
(158, 9, 14, 53),
(159, 9, 15, 57),
(160, 9, 16, 61),
(161, 9, 17, 65),
(162, 9, 18, 69),
(163, 9, 1, 1),
(164, 9, 2, 5),
(165, 9, 3, 9),
(166, 9, 4, 13),
(167, 9, 5, 17),
(168, 9, 6, 21),
(169, 9, 7, 25),
(170, 9, 8, 29),
(171, 9, 9, 33),
(172, 9, 10, 37),
(173, 9, 11, 41),
(174, 9, 12, 45),
(175, 9, 13, 49),
(176, 9, 14, 53),
(177, 9, 15, 57),
(178, 9, 16, 61),
(179, 9, 17, 65),
(180, 9, 18, 69),
(181, 9, 1, 1),
(182, 9, 2, 5),
(183, 9, 3, 9),
(184, 9, 4, 13),
(185, 9, 5, 17),
(186, 9, 6, 21),
(187, 9, 7, 25),
(188, 9, 8, 29),
(189, 9, 9, 33),
(190, 9, 10, 37),
(191, 9, 11, 41),
(192, 9, 12, 45),
(193, 9, 13, 49),
(194, 9, 14, 53),
(195, 9, 15, 57),
(196, 9, 16, 61),
(197, 9, 17, 65),
(198, 9, 18, 69),
(199, 9, 1, 1),
(200, 9, 2, 5),
(201, 9, 3, 9),
(202, 9, 4, 13),
(203, 9, 5, 17),
(204, 9, 6, 21),
(205, 9, 7, 25),
(206, 9, 8, 29),
(207, 9, 9, 33),
(208, 9, 10, 37),
(209, 9, 11, 41),
(210, 9, 12, 45),
(211, 9, 13, 49),
(212, 9, 14, 53),
(213, 9, 15, 57),
(214, 9, 16, 61),
(215, 9, 17, 65),
(216, 9, 18, 69),
(217, 14, 19, 74),
(218, 14, 20, 75),
(219, 14, 21, 77),
(220, 14, 22, 81),
(221, 14, 23, 87),
(222, 14, 24, 91),
(223, 14, 25, 95),
(224, 14, 26, 99),
(225, 14, 27, 103),
(226, 14, 28, 107),
(227, 14, 29, 110),
(228, 14, 30, 113),
(229, 14, 31, 116),
(230, 14, 19, 74),
(231, 14, 20, 75),
(232, 14, 21, 77),
(233, 14, 22, 81),
(234, 14, 23, 87),
(235, 14, 24, 91),
(236, 14, 25, 95),
(237, 14, 26, 99),
(238, 14, 27, 103),
(239, 14, 28, 107),
(240, 14, 29, 110),
(241, 14, 30, 113),
(242, 14, 31, 116),
(243, 14, 19, 74),
(244, 14, 20, 75),
(245, 14, 21, 77),
(246, 14, 22, 81),
(247, 14, 23, 87),
(248, 14, 24, 91),
(249, 14, 25, 95),
(250, 14, 26, 99),
(251, 14, 27, 103),
(252, 14, 28, 107),
(253, 14, 29, 110),
(254, 14, 30, 113),
(255, 14, 31, 116),
(256, 14, 19, 74),
(257, 14, 20, 75),
(258, 14, 21, 77),
(259, 14, 22, 81),
(260, 14, 23, 87),
(261, 14, 24, 91),
(262, 14, 25, 95),
(263, 14, 26, 99),
(264, 14, 27, 103),
(265, 14, 28, 107),
(266, 14, 29, 110),
(267, 14, 30, 113),
(268, 14, 31, 116),
(269, 14, 19, 74),
(270, 14, 20, 75),
(271, 14, 21, 77),
(272, 14, 22, 81),
(273, 14, 23, 87),
(274, 14, 24, 91),
(275, 14, 25, 95),
(276, 14, 26, 99),
(277, 14, 27, 103),
(278, 14, 28, 107),
(279, 14, 29, 110),
(280, 14, 30, 113),
(281, 14, 31, 116),
(282, 14, 19, 74),
(283, 14, 20, 75),
(284, 14, 21, 77),
(285, 14, 22, 81),
(286, 14, 23, 87),
(287, 14, 24, 91),
(288, 14, 25, 95),
(289, 14, 26, 99),
(290, 14, 27, 103),
(291, 14, 28, 107),
(292, 14, 29, 110),
(293, 14, 30, 113),
(294, 14, 31, 116),
(295, 14, 19, 74),
(296, 14, 20, 75),
(297, 14, 21, 77),
(298, 14, 22, 81),
(299, 14, 23, 87),
(300, 14, 24, 91),
(301, 14, 25, 95),
(302, 14, 26, 99),
(303, 14, 27, 103),
(304, 14, 28, 107),
(305, 14, 29, 110),
(306, 14, 30, 113),
(307, 14, 31, 116),
(308, 14, 19, 74),
(309, 14, 20, 75),
(310, 14, 21, 77),
(311, 14, 22, 81),
(312, 14, 23, 87),
(313, 14, 24, 91),
(314, 14, 25, 95),
(315, 14, 26, 99),
(316, 14, 27, 103),
(317, 14, 28, 107),
(318, 14, 29, 110),
(319, 14, 30, 113),
(320, 14, 31, 116),
(321, 14, 19, 74),
(322, 14, 20, 75),
(323, 14, 21, 77),
(324, 14, 22, 81),
(325, 14, 23, 87),
(326, 14, 24, 91),
(327, 14, 25, 95),
(328, 14, 26, 99),
(329, 14, 27, 103),
(330, 14, 28, 107),
(331, 14, 29, 110),
(332, 14, 30, 113),
(333, 14, 31, 116),
(334, 14, 19, 74),
(335, 14, 20, 75),
(336, 14, 21, 77),
(337, 14, 22, 81),
(338, 14, 23, 87),
(339, 14, 24, 91),
(340, 14, 25, 95),
(341, 14, 26, 99),
(342, 14, 27, 103),
(343, 14, 28, 107),
(344, 14, 29, 110),
(345, 14, 30, 113),
(346, 14, 31, 116),
(347, 14, 19, 74),
(348, 14, 20, 75),
(349, 14, 21, 77),
(350, 14, 22, 81),
(351, 14, 23, 87),
(352, 14, 24, 91),
(353, 14, 25, 95),
(354, 14, 26, 99),
(355, 14, 27, 103),
(356, 14, 28, 107),
(357, 14, 29, 110),
(358, 14, 30, 113),
(359, 14, 31, 116),
(360, 14, 19, 74),
(361, 14, 20, 75),
(362, 14, 21, 77),
(363, 14, 22, 81),
(364, 14, 23, 87),
(365, 14, 24, 91),
(366, 14, 25, 95),
(367, 14, 26, 99),
(368, 14, 27, 103),
(369, 14, 28, 107),
(370, 14, 29, 110),
(371, 14, 30, 113),
(372, 14, 31, 116),
(373, 14, 19, 73),
(374, 14, 20, 75),
(375, 14, 21, 77),
(376, 14, 22, 81),
(377, 14, 23, 87),
(378, 14, 24, 91),
(379, 14, 25, 95),
(380, 14, 26, 99),
(381, 14, 27, 103),
(382, 14, 28, 107),
(383, 14, 29, 110),
(384, 14, 30, 113),
(385, 14, 31, 116),
(386, 14, 19, 73),
(387, 14, 20, 75),
(388, 14, 21, 77),
(389, 14, 22, 81),
(390, 14, 23, 87),
(391, 14, 24, 91),
(392, 14, 25, 95),
(393, 14, 26, 99),
(394, 14, 27, 103),
(395, 14, 28, 107),
(396, 14, 29, 110),
(397, 14, 30, 113),
(398, 14, 31, 116),
(399, 14, 19, 74),
(400, 14, 20, 75),
(401, 14, 21, 77),
(402, 14, 22, 81),
(403, 14, 23, 87),
(404, 14, 24, 91),
(405, 14, 25, 95),
(406, 14, 26, 99),
(407, 14, 27, 103),
(408, 14, 28, 107),
(409, 14, 29, 110),
(410, 14, 30, 113),
(411, 14, 31, 116),
(412, 14, 19, 73),
(413, 14, 20, 75),
(414, 14, 21, 77),
(415, 14, 22, 81),
(416, 14, 23, 87),
(417, 14, 24, 91),
(418, 14, 25, 95),
(419, 14, 26, 99),
(420, 14, 27, 103),
(421, 14, 28, 107),
(422, 14, 29, 110),
(423, 14, 30, 113),
(424, 14, 31, 116),
(425, 14, 19, 73),
(426, 14, 20, 75),
(427, 14, 21, 77),
(428, 14, 22, 81),
(429, 14, 23, 87),
(430, 14, 24, 91),
(431, 14, 25, 95),
(432, 14, 26, 99),
(433, 14, 27, 103),
(434, 14, 28, 107),
(435, 14, 29, 110),
(436, 14, 30, 113),
(437, 14, 31, 116),
(438, 14, 19, 73),
(439, 14, 20, 75),
(440, 14, 21, 77),
(441, 14, 22, 81),
(442, 14, 23, 87),
(443, 14, 24, 91),
(444, 14, 25, 95),
(445, 14, 26, 99),
(446, 14, 27, 103),
(447, 14, 28, 107),
(448, 14, 29, 110),
(449, 14, 30, 113),
(450, 14, 31, 116),
(451, 14, 19, 74),
(452, 14, 20, 75),
(453, 14, 21, 77),
(454, 14, 22, 81),
(455, 14, 23, 87),
(456, 14, 24, 91),
(457, 14, 25, 95),
(458, 14, 26, 99),
(459, 14, 27, 103),
(460, 14, 28, 107),
(461, 14, 29, 110),
(462, 14, 30, 113),
(463, 14, 31, 116),
(464, 14, 19, 74),
(465, 14, 20, 75),
(466, 14, 21, 77),
(467, 14, 22, 81),
(468, 14, 23, 87),
(469, 14, 24, 91),
(470, 14, 25, 95),
(471, 14, 26, 99),
(472, 14, 27, 103),
(473, 14, 28, 107),
(474, 14, 29, 110),
(475, 14, 30, 113),
(476, 14, 31, 116),
(477, 14, 19, 74),
(478, 14, 20, 75),
(479, 14, 21, 77),
(480, 14, 22, 81),
(481, 14, 23, 87),
(482, 14, 24, 91),
(483, 14, 25, 95),
(484, 14, 26, 99),
(485, 14, 27, 103),
(486, 14, 28, 107),
(487, 14, 29, 110),
(488, 14, 30, 113),
(489, 14, 31, 116),
(490, 14, 19, 74),
(491, 14, 20, 75),
(492, 14, 21, 77),
(493, 14, 22, 81),
(494, 14, 23, 87),
(495, 14, 24, 91),
(496, 14, 25, 95),
(497, 14, 26, 99),
(498, 14, 27, 103),
(499, 14, 28, 107),
(500, 14, 29, 110),
(501, 14, 30, 113),
(502, 14, 31, 116),
(503, 14, 19, 73),
(504, 14, 20, 75),
(505, 14, 21, 77),
(506, 14, 22, 81),
(507, 14, 23, 87),
(508, 14, 24, 91),
(509, 14, 25, 95),
(510, 14, 26, 99),
(511, 14, 27, 103),
(512, 14, 28, 107),
(513, 14, 29, 110),
(514, 14, 30, 113),
(515, 14, 31, 116),
(516, 9, 1, 1),
(517, 9, 2, 5),
(518, 9, 3, 9),
(519, 9, 4, 13),
(520, 9, 5, 17),
(521, 9, 6, 21),
(522, 9, 7, 25),
(523, 9, 8, 29),
(524, 9, 9, 33),
(525, 9, 10, 37),
(526, 9, 11, 41),
(527, 9, 12, 45),
(528, 9, 13, 49),
(529, 9, 14, 53),
(530, 9, 15, 57),
(531, 9, 16, 61),
(532, 9, 17, 65),
(533, 9, 18, 69),
(534, 9, 1, 1),
(535, 9, 2, 5),
(536, 9, 3, 9),
(537, 9, 4, 13),
(538, 9, 5, 17),
(539, 9, 6, 21),
(540, 9, 7, 25),
(541, 9, 8, 29),
(542, 9, 9, 33),
(543, 9, 10, 37),
(544, 9, 11, 41),
(545, 9, 12, 45),
(546, 9, 13, 49),
(547, 9, 14, 53),
(548, 9, 15, 57),
(549, 9, 16, 61),
(550, 9, 17, 65),
(551, 9, 18, 69),
(552, 9, 1, 1),
(553, 9, 2, 5),
(554, 9, 3, 9),
(555, 9, 4, 13),
(556, 9, 5, 17),
(557, 9, 6, 21),
(558, 9, 7, 25),
(559, 9, 8, 29),
(560, 9, 9, 35),
(561, 9, 10, 37),
(562, 9, 11, 41),
(563, 9, 12, 45),
(564, 9, 13, 49),
(565, 9, 14, 53),
(566, 9, 15, 57),
(567, 9, 16, 61),
(568, 9, 17, 65),
(569, 9, 18, 69),
(570, 9, 1, 1),
(571, 9, 2, 5),
(572, 9, 3, 9),
(573, 9, 4, 13),
(574, 9, 5, 17),
(575, 9, 6, 21),
(576, 9, 7, 25),
(577, 9, 8, 29),
(578, 9, 9, 33),
(579, 9, 10, 37),
(580, 9, 11, 41),
(581, 9, 12, 45),
(582, 9, 13, 49),
(583, 9, 14, 53),
(584, 9, 15, 57),
(585, 9, 16, 61),
(586, 9, 17, 65),
(587, 9, 18, 69),
(588, 9, 1, 1),
(589, 9, 2, 5),
(590, 9, 3, 9),
(591, 9, 4, 13),
(592, 9, 5, 17),
(593, 9, 6, 21),
(594, 9, 7, 25),
(595, 9, 8, 29),
(596, 9, 9, 33),
(597, 9, 10, 37),
(598, 9, 11, 41),
(599, 9, 12, 45),
(600, 9, 13, 49),
(601, 9, 14, 53),
(602, 9, 15, 57),
(603, 9, 16, 61),
(604, 9, 17, 65),
(605, 9, 18, 69),
(606, 9, 1, 1),
(607, 9, 2, 5),
(608, 9, 3, 9),
(609, 9, 4, 13),
(610, 9, 5, 17),
(611, 9, 6, 21),
(612, 9, 7, 25),
(613, 9, 8, 29),
(614, 9, 9, 33),
(615, 9, 10, 37),
(616, 9, 11, 41),
(617, 9, 12, 45),
(618, 9, 13, 49),
(619, 9, 14, 53),
(620, 9, 15, 57),
(621, 9, 16, 61),
(622, 9, 17, 65),
(623, 9, 18, 69),
(624, 9, 1, 1),
(625, 9, 2, 5),
(626, 9, 3, 9),
(627, 9, 4, 13),
(628, 9, 5, 17),
(629, 9, 6, 21),
(630, 9, 7, 25),
(631, 9, 8, 29),
(632, 9, 9, 33),
(633, 9, 10, 37),
(634, 9, 11, 41),
(635, 9, 12, 45),
(636, 9, 13, 49),
(637, 9, 14, 53),
(638, 9, 15, 57),
(639, 9, 16, 61),
(640, 9, 17, 65),
(641, 9, 18, 69),
(642, 9, 1, 1),
(643, 9, 2, 5),
(644, 9, 3, 9),
(645, 9, 4, 13),
(646, 9, 5, 17),
(647, 9, 6, 21),
(648, 9, 7, 25),
(649, 9, 8, 29),
(650, 9, 9, 33),
(651, 9, 10, 37),
(652, 9, 11, 41),
(653, 9, 12, 45),
(654, 9, 13, 49),
(655, 9, 14, 53),
(656, 9, 15, 57),
(657, 9, 16, 61),
(658, 9, 17, 65),
(659, 9, 18, 69),
(660, 9, 1, 1),
(661, 9, 2, 5),
(662, 9, 3, 9),
(663, 9, 4, 13),
(664, 9, 5, 17),
(665, 9, 6, 21),
(666, 9, 7, 25),
(667, 9, 8, 29),
(668, 9, 9, 33),
(669, 9, 10, 37),
(670, 9, 11, 41),
(671, 9, 12, 45),
(672, 9, 13, 49),
(673, 9, 14, 53),
(674, 9, 15, 57),
(675, 9, 16, 61),
(676, 9, 17, 65),
(677, 9, 18, 69),
(678, 9, 1, 1),
(679, 9, 2, 5),
(680, 9, 3, 9),
(681, 9, 4, 13),
(682, 9, 5, 17),
(683, 9, 6, 21),
(684, 9, 7, 25),
(685, 9, 8, 29),
(686, 9, 9, 33),
(687, 9, 10, 37),
(688, 9, 11, 41),
(689, 9, 12, 45),
(690, 9, 13, 49),
(691, 9, 14, 53),
(692, 9, 15, 57),
(693, 9, 16, 61),
(694, 9, 17, 65),
(695, 9, 18, 69),
(696, 9, 1, 1),
(697, 9, 2, 5),
(698, 9, 3, 9),
(699, 9, 4, 13),
(700, 9, 5, 17),
(701, 9, 6, 21),
(702, 9, 7, 25),
(703, 9, 8, 29),
(704, 9, 9, 33),
(705, 9, 10, 37),
(706, 9, 11, 41),
(707, 9, 12, 45),
(708, 9, 13, 49),
(709, 9, 14, 53),
(710, 9, 15, 57),
(711, 9, 16, 61),
(712, 9, 17, 65),
(713, 9, 18, 69),
(714, 9, 1, 1),
(715, 9, 2, 5),
(716, 9, 3, 9),
(717, 9, 4, 13),
(718, 9, 5, 17),
(719, 9, 6, 21),
(720, 9, 7, 25),
(721, 9, 8, 29),
(722, 9, 9, 33),
(723, 9, 10, 37),
(724, 9, 11, 41),
(725, 9, 12, 45),
(726, 9, 13, 49),
(727, 9, 14, 53),
(728, 9, 15, 57),
(729, 9, 16, 61),
(730, 9, 17, 65),
(731, 9, 18, 69),
(732, 9, 1, 1),
(733, 9, 2, 5),
(734, 9, 3, 9),
(735, 9, 4, 13),
(736, 9, 5, 17),
(737, 9, 6, 21),
(738, 9, 7, 25),
(739, 9, 8, 29),
(740, 9, 9, 33),
(741, 9, 10, 37),
(742, 9, 11, 41),
(743, 9, 12, 45),
(744, 9, 13, 49),
(745, 9, 14, 53),
(746, 9, 15, 57),
(747, 9, 16, 61),
(748, 9, 17, 65),
(749, 9, 18, 69),
(750, 15, 1, 1),
(751, 15, 2, 5),
(752, 15, 3, 9),
(753, 15, 4, 13),
(754, 15, 5, 17),
(755, 15, 6, 21),
(756, 15, 7, 25),
(757, 15, 8, 29),
(758, 15, 9, 33),
(759, 15, 10, 37),
(760, 15, 11, 41),
(761, 15, 12, 45),
(762, 15, 13, 49),
(763, 15, 14, 53),
(764, 15, 15, 57),
(765, 15, 16, 61),
(766, 15, 17, 65),
(767, 15, 18, 69),
(768, 13, 1, 1),
(769, 13, 2, 5),
(770, 13, 3, 9),
(771, 13, 4, 13),
(772, 13, 5, 17),
(773, 13, 6, 21),
(774, 13, 7, 25),
(775, 13, 8, 29),
(776, 13, 9, 33),
(777, 13, 10, 37),
(778, 13, 11, 41),
(779, 13, 12, 45),
(780, 13, 13, 49),
(781, 13, 14, 53),
(782, 13, 15, 57),
(783, 13, 16, 61),
(784, 13, 17, 65),
(785, 13, 18, 69),
(786, 16, 1, 2),
(787, 16, 2, 5),
(788, 16, 3, 9),
(789, 16, 4, 13),
(790, 16, 5, 17),
(791, 16, 6, 21),
(792, 16, 7, 25),
(793, 16, 8, 29),
(794, 16, 9, 33),
(795, 16, 10, 37),
(796, 16, 11, 41),
(797, 16, 12, 45),
(798, 16, 13, 49),
(799, 16, 14, 53),
(800, 16, 15, 57),
(801, 16, 16, 61),
(802, 16, 17, 65),
(803, 16, 18, 69);

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
(9, 'lui1525angel@gmail.com', '$2y$10$9cTuIwmFZbV6lfCC5Si4he0r6n40Zak7IstKRcQ1g8bCYGOhkusZm', 'egresado'),
(10, 'lui1525', '$2y$10$9cTuIwmFZbV6lfCC5Si4he0r6n40Zak7IstKRcQ1g8bCYGOhkusZm', 'admin'),
(11, 'lui', '$2y$10$B5f.8wJfVVb8uBUHx6anxOcxzSR8opZRS2SdjnjTENAVTeAQ1bwVe', 'admin'),
(12, 'lui1525angel@gmail.com', '$2y$10$fWWazxLpHTB/gVmB/JPn6OroBtsDN8MYve0xKofGBQ/W0PqSHghIa', 'egresado'),
(13, 'juan', '$2y$10$5CEDzRigLS5.ibf6AGGyHe11gA7S7Gm1H6Oy4s/CHzW2TJP7tm3Te', 'egresado'),
(14, 'inge', '$2y$10$mhvY33VxDoBYMzLPBpKiM.Cnse9Jg1yFvLt.7NC7yySuLhsAnzoUK', 'empleador'),
(15, 'aa', '$2y$10$aCQqU4A/j6xX/In3TW00Y.ohhlNeaAQu5mxYUs954OmXCm0QuR8T.', 'egresado'),
(16, 'c', '$2y$10$nMJB8aa4EJWbHAR00pQ.Kuwh/wqCfrKUlilYJcMPxdmBsSKOm7yru', 'egresado'),
(17, 'e', '$2y$10$p.vPk5Kh4sT33RqTN9kA0e4fUdEGO2hdNyRBYvb4gUmd.YoFSQD2y', 'empleador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `controlrespuestas`
--
ALTER TABLE `controlrespuestas`
  ADD PRIMARY KEY (`id_control`);

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
-- AUTO_INCREMENT de la tabla `controlrespuestas`
--
ALTER TABLE `controlrespuestas`
  MODIFY `id_control` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cuestionarios`
--
ALTER TABLE `cuestionarios`
  MODIFY `id_cuestionario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id_datos` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id_opcion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id_pregunta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id_respuesta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=804;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
