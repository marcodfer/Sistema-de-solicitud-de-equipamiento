-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2018 a las 02:52:30
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `solicitud_de_equipamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_detalle_solicitud`
--

CREATE TABLE `sol_detalle_solicitud` (
  `det_id` int(11) NOT NULL,
  `sol_codigo` int(11) NOT NULL,
  `equ_codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_detalle_solicitud`
--

INSERT INTO `sol_detalle_solicitud` (`det_id`, `sol_codigo`, `equ_codigo`) VALUES
(1, 1, '9099009'),
(2, 1, 'qwe'),
(3, 1, 'xffx'),
(4, 2, '12321312'),
(5, 2, 'xffx'),
(6, 4, 'qwe'),
(7, 5, '9099009'),
(8, 6, '12321312'),
(9, 7, 'qwe'),
(10, 8, 'qwe'),
(11, 9, '9099009');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_equipos`
--

CREATE TABLE `sol_equipos` (
  `equ_codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `equ_modelo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `equ_marca` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `equ_numero_serie` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `equ_tipo_equipo` int(11) NOT NULL,
  `est_codigo` int(11) NOT NULL,
  `equ_fecha_adquisicion` date NOT NULL,
  `equ_fecha_ingreso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_equipos`
--

INSERT INTO `sol_equipos` (`equ_codigo`, `equ_modelo`, `equ_marca`, `equ_numero_serie`, `equ_tipo_equipo`, `est_codigo`, `equ_fecha_adquisicion`, `equ_fecha_ingreso`) VALUES
('123-2', 'kasd', 'kas', 'dq', 1, 1, '2018-11-21', '2018-11-08 21:35:04'),
('12321312', 'sdlfkmdslkm', 'slkmsdlkm', '2342342', 1, 2, '2018-10-17', '2018-10-23 22:23:17'),
('9099009', 'kjjkjkj', 'kkjkj', '0990909090', 1, 2, '2018-10-16', '2018-10-18 00:00:00'),
('qwe', 'qwe', 'qwe', 'qwe', 1, 2, '2018-10-16', '2018-10-18 00:00:00'),
('wq', 'qw', 'w', 'qw', 1, 1, '2018-10-09', '2018-10-25 20:07:45'),
('wqxv', 'qw', 'w', 'qw', 1, 1, '2018-10-09', '2018-10-25 20:08:35'),
('xffx', 'as', 'as', 'as', 2, 1, '2018-10-08', '2018-10-18 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_equipo_baja`
--

CREATE TABLE `sol_equipo_baja` (
  `equ_id` int(11) NOT NULL,
  `equ_fecha` int(11) NOT NULL,
  `equ_observacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `equ_codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_equipo_eliminar`
--

CREATE TABLE `sol_equipo_eliminar` (
  `equ_id` int(11) NOT NULL,
  `equ_fecha` datetime NOT NULL,
  `equ_codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_equipo_mantencion`
--

CREATE TABLE `sol_equipo_mantencion` (
  `equ_id` int(11) NOT NULL,
  `equ_fecha_inicio` datetime NOT NULL,
  `equ_fecha_fin` datetime NOT NULL,
  `equ_obervacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `equ_codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_estados_equipo`
--

CREATE TABLE `sol_estados_equipo` (
  `est_codigo` int(11) NOT NULL,
  `est_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_estados_equipo`
--

INSERT INTO `sol_estados_equipo` (`est_codigo`, `est_nombre`) VALUES
(1, 'Disponible'),
(2, 'Prestado'),
(3, 'Dado de baja'),
(4, 'Mantención');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_estados_solicitud`
--

CREATE TABLE `sol_estados_solicitud` (
  `est_codigo` int(11) NOT NULL,
  `est_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_estados_solicitud`
--

INSERT INTO `sol_estados_solicitud` (`est_codigo`, `est_nombre`) VALUES
(1, 'Pendiente'),
(2, 'Aceptada'),
(3, 'Rechazada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_salas`
--

CREATE TABLE `sol_salas` (
  `sal_codigo` int(11) NOT NULL,
  `sal_numero` int(11) NOT NULL,
  `sed_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_salas`
--

INSERT INTO `sol_salas` (`sal_codigo`, `sal_numero`, `sed_codigo`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_sedes`
--

CREATE TABLE `sol_sedes` (
  `sed_codigo` int(11) NOT NULL,
  `sed_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_sedes`
--

INSERT INTO `sol_sedes` (`sed_codigo`, `sed_nombre`) VALUES
(1, 'Republica'),
(2, 'Alameda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_solicitudes`
--

CREATE TABLE `sol_solicitudes` (
  `sol_codigo` int(11) NOT NULL,
  `sol_titulo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `sol_motivo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `sol_fecha_creacion` datetime NOT NULL,
  `sol_fecha_entrega` datetime NOT NULL,
  `usu_rut` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `sal_codigo` int(11) NOT NULL,
  `est_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_solicitudes`
--

INSERT INTO `sol_solicitudes` (`sol_codigo`, `sol_titulo`, `sol_motivo`, `sol_fecha_creacion`, `sol_fecha_entrega`, `usu_rut`, `sal_codigo`, `est_codigo`) VALUES
(1, 'prueba', 'prueba', '2018-10-24 00:00:00', '2018-10-30 00:00:00', '111111-1', 3, 1),
(2, 'prueba', 'prueba1', '2018-10-11 00:00:00', '2018-10-23 00:00:00', '25355291-3', 1, 1),
(3, '1', '1', '2018-10-25 19:18:31', '2018-10-09 12:03:00', '111111-1', 1, 1),
(4, '1', '1', '2018-10-25 19:20:57', '2018-10-24 12:03:00', '111111-1', 1, 1),
(5, '1', '1', '2018-10-25 19:26:30', '2018-10-30 12:03:00', '111111-1', 1, 1),
(6, '1', '1', '2018-10-25 19:31:43', '2018-10-30 12:03:00', '111111-1', 1, 1),
(7, '1', '1', '2018-10-25 19:33:45', '2018-10-30 12:03:00', '111111-1', 1, 1),
(8, '1', '1', '2018-10-25 19:39:27', '2018-10-16 12:03:00', '111111-1', 1, 1),
(9, '1', '1', '2018-10-25 19:43:37', '2018-10-30 12:03:00', '111111-1', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_tipos_equipo`
--

CREATE TABLE `sol_tipos_equipo` (
  `tip_id` int(11) NOT NULL,
  `tip_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_tipos_equipo`
--

INSERT INTO `sol_tipos_equipo` (`tip_id`, `tip_nombre`) VALUES
(1, 'Notebook'),
(2, 'Equipo de Red'),
(3, 'Data');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_tipos_usuario`
--

CREATE TABLE `sol_tipos_usuario` (
  `tip_codigo` int(11) NOT NULL,
  `tip_nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_tipos_usuario`
--

INSERT INTO `sol_tipos_usuario` (`tip_codigo`, `tip_nombre`) VALUES
(1, 'Estudiante'),
(2, 'Docente'),
(3, 'Administrativo'),
(4, 'Soporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_usuarios`
--

CREATE TABLE `sol_usuarios` (
  `usu_rut` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `usu_nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `usu_contraseña` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `tip_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_usuarios`
--

INSERT INTO `sol_usuarios` (`usu_rut`, `usu_nombre`, `usu_contraseña`, `tip_codigo`) VALUES
('111111-1', 'prueba', '1234', 1),
('25355291-3', 'Marco Serrano', '1234', 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sol_detalle_solicitud`
--
ALTER TABLE `sol_detalle_solicitud`
  ADD PRIMARY KEY (`det_id`),
  ADD KEY `sol_codigo` (`sol_codigo`),
  ADD KEY `equ_codigo` (`equ_codigo`);

--
-- Indices de la tabla `sol_equipos`
--
ALTER TABLE `sol_equipos`
  ADD PRIMARY KEY (`equ_codigo`),
  ADD KEY `est_codigo` (`est_codigo`),
  ADD KEY `equ_tipo_equipo` (`equ_tipo_equipo`);

--
-- Indices de la tabla `sol_equipo_baja`
--
ALTER TABLE `sol_equipo_baja`
  ADD PRIMARY KEY (`equ_id`),
  ADD KEY `equ_codigo` (`equ_codigo`);

--
-- Indices de la tabla `sol_equipo_eliminar`
--
ALTER TABLE `sol_equipo_eliminar`
  ADD PRIMARY KEY (`equ_id`),
  ADD KEY `equ_codigo` (`equ_codigo`);

--
-- Indices de la tabla `sol_equipo_mantencion`
--
ALTER TABLE `sol_equipo_mantencion`
  ADD PRIMARY KEY (`equ_id`),
  ADD KEY `equ_codigo` (`equ_codigo`);

--
-- Indices de la tabla `sol_estados_equipo`
--
ALTER TABLE `sol_estados_equipo`
  ADD PRIMARY KEY (`est_codigo`);

--
-- Indices de la tabla `sol_estados_solicitud`
--
ALTER TABLE `sol_estados_solicitud`
  ADD PRIMARY KEY (`est_codigo`);

--
-- Indices de la tabla `sol_salas`
--
ALTER TABLE `sol_salas`
  ADD PRIMARY KEY (`sal_codigo`),
  ADD KEY `sed_codigo` (`sed_codigo`);

--
-- Indices de la tabla `sol_sedes`
--
ALTER TABLE `sol_sedes`
  ADD PRIMARY KEY (`sed_codigo`);

--
-- Indices de la tabla `sol_solicitudes`
--
ALTER TABLE `sol_solicitudes`
  ADD PRIMARY KEY (`sol_codigo`),
  ADD KEY `usu_rut` (`usu_rut`),
  ADD KEY `sal_codigo` (`sal_codigo`),
  ADD KEY `est_codigo` (`est_codigo`);

--
-- Indices de la tabla `sol_tipos_equipo`
--
ALTER TABLE `sol_tipos_equipo`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indices de la tabla `sol_tipos_usuario`
--
ALTER TABLE `sol_tipos_usuario`
  ADD PRIMARY KEY (`tip_codigo`);

--
-- Indices de la tabla `sol_usuarios`
--
ALTER TABLE `sol_usuarios`
  ADD PRIMARY KEY (`usu_rut`),
  ADD KEY `tip_codigo` (`tip_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sol_detalle_solicitud`
--
ALTER TABLE `sol_detalle_solicitud`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sol_equipo_baja`
--
ALTER TABLE `sol_equipo_baja`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sol_equipo_eliminar`
--
ALTER TABLE `sol_equipo_eliminar`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sol_equipo_mantencion`
--
ALTER TABLE `sol_equipo_mantencion`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sol_estados_equipo`
--
ALTER TABLE `sol_estados_equipo`
  MODIFY `est_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sol_estados_solicitud`
--
ALTER TABLE `sol_estados_solicitud`
  MODIFY `est_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sol_salas`
--
ALTER TABLE `sol_salas`
  MODIFY `sal_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sol_sedes`
--
ALTER TABLE `sol_sedes`
  MODIFY `sed_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sol_solicitudes`
--
ALTER TABLE `sol_solicitudes`
  MODIFY `sol_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sol_tipos_equipo`
--
ALTER TABLE `sol_tipos_equipo`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sol_tipos_usuario`
--
ALTER TABLE `sol_tipos_usuario`
  MODIFY `tip_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sol_detalle_solicitud`
--
ALTER TABLE `sol_detalle_solicitud`
  ADD CONSTRAINT `sol_detalle_solicitud_ibfk_3` FOREIGN KEY (`equ_codigo`) REFERENCES `sol_equipos` (`equ_codigo`),
  ADD CONSTRAINT `sol_detalle_solicitud_ibfk_4` FOREIGN KEY (`sol_codigo`) REFERENCES `sol_solicitudes` (`sol_codigo`);

--
-- Filtros para la tabla `sol_equipos`
--
ALTER TABLE `sol_equipos`
  ADD CONSTRAINT `sol_equipos_ibfk_1` FOREIGN KEY (`est_codigo`) REFERENCES `sol_estados_equipo` (`est_codigo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sol_equipos_ibfk_2` FOREIGN KEY (`equ_tipo_equipo`) REFERENCES `sol_tipos_equipo` (`tip_id`);

--
-- Filtros para la tabla `sol_equipo_baja`
--
ALTER TABLE `sol_equipo_baja`
  ADD CONSTRAINT `sol_equipo_baja_ibfk_1` FOREIGN KEY (`equ_codigo`) REFERENCES `sol_equipos` (`equ_codigo`);

--
-- Filtros para la tabla `sol_equipo_mantencion`
--
ALTER TABLE `sol_equipo_mantencion`
  ADD CONSTRAINT `sol_equipo_mantencion_ibfk_1` FOREIGN KEY (`equ_codigo`) REFERENCES `sol_equipos` (`equ_codigo`);

--
-- Filtros para la tabla `sol_salas`
--
ALTER TABLE `sol_salas`
  ADD CONSTRAINT `sol_salas_ibfk_1` FOREIGN KEY (`sed_codigo`) REFERENCES `sol_sedes` (`sed_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sol_solicitudes`
--
ALTER TABLE `sol_solicitudes`
  ADD CONSTRAINT `sol_solicitudes_ibfk_1` FOREIGN KEY (`usu_rut`) REFERENCES `sol_usuarios` (`usu_rut`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sol_solicitudes_ibfk_3` FOREIGN KEY (`sal_codigo`) REFERENCES `sol_salas` (`sal_codigo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `sol_solicitudes_ibfk_4` FOREIGN KEY (`est_codigo`) REFERENCES `sol_estados_solicitud` (`est_codigo`);

--
-- Filtros para la tabla `sol_usuarios`
--
ALTER TABLE `sol_usuarios`
  ADD CONSTRAINT `sol_usuarios_ibfk_1` FOREIGN KEY (`tip_codigo`) REFERENCES `sol_tipos_usuario` (`tip_codigo`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
