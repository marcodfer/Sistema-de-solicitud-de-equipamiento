-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 06:24:57
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

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
-- Estructura de tabla para la tabla `sol_auditoria_solicitud`
--

CREATE TABLE `sol_auditoria_solicitud` (
  `aud_id` int(11) NOT NULL,
  `aud_rut` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `det_id` int(11) NOT NULL,
  `sol_codigo` int(11) NOT NULL,
  `equ_codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `aud_observacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `aud_fecha_modificacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sol_auditoria_solicitud`
--

INSERT INTO `sol_auditoria_solicitud` (`aud_id`, `aud_rut`, `det_id`, `sol_codigo`, `equ_codigo`, `aud_observacion`, `aud_fecha_modificacion`) VALUES
(4, '25355291-3', 1, 1, '9099009', 'Eliminar', '2018-11-24 00:42:02'),
(5, '25355291-3', 2, 1, 'qwe', 'Eliminar', '2018-11-24 00:43:11');

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
(3, 1, 'xffx'),
(4, 2, '12321312'),
(6, 4, 'qwe'),
(7, 5, '9099009'),
(8, 6, '12321312'),
(9, 7, 'qwe'),
(10, 8, 'qwe'),
(11, 9, '9099009'),
(12, 10, 'wq'),
(13, 10, 'wqxv'),
(14, 11, 'xffx'),
(15, 12, 'xffx'),
(16, 13, 'xffx'),
(17, 14, 'xffx'),
(18, 15, 'xffx'),
(19, 18, 'xffx'),
(20, 19, 'xffx'),
(21, 20, 'xffx'),
(22, 21, 'xffx'),
(23, 22, 'xffx'),
(24, 23, 'xffx'),
(25, 24, 'xffx'),
(26, 25, 'xffx');

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
('12321312', 'sdlfkmdslkm', 'slkmsdlkm', '2342342', 1, 4, '2018-10-17', '2018-10-23 22:23:17'),
('9099009', 'kjjkjkj', 'kkjkj', '0990909090', 1, 2, '2018-10-16', '2018-10-18 00:00:00'),
('qwe', 'qwe', 'qwe', 'qwe', 1, 2, '2018-10-16', '2018-10-18 00:00:00'),
('wq', 'qw', 'w', 'qw', 1, 2, '2018-10-09', '2018-10-25 20:07:45'),
('wqxv', 'qw', 'w', 'qw', 1, 2, '2018-10-09', '2018-10-25 20:08:35'),
('xffx', 'as', 'as', 'as', 2, 1, '2018-10-08', '2018-10-18 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_equipo_baja`
--

CREATE TABLE `sol_equipo_baja` (
  `equ_id` int(11) NOT NULL,
  `equ_fecha` datetime NOT NULL,
  `equ_observacion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `equ_codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sol_equipo_eliminado`
--

CREATE TABLE `sol_equipo_eliminado` (
  `equ_codigo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `equ_modelo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `equ_marca` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `equ_numero_serie` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `equ_tipo_equipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `equ_fecha_adquisicion` date NOT NULL,
  `equ_fecha_ingreso` datetime NOT NULL,
  `equ_fecha_eliminado` datetime NOT NULL
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

--
-- Volcado de datos para la tabla `sol_equipo_mantencion`
--

INSERT INTO `sol_equipo_mantencion` (`equ_id`, `equ_fecha_inicio`, `equ_fecha_fin`, `equ_obervacion`, `equ_codigo`) VALUES
(1, '2018-12-05 00:00:00', '2018-11-14 00:00:00', 'asd', '12321312');

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
(4, 'Mantención'),
(5, 'Eliminado');

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
(3, 'Rechazada'),
(4, 'Finalizada');

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
(5, '1', '1', '2018-10-25 19:26:30', '2018-10-30 12:03:00', '111111-1', 1, 2),
(6, '1', '1', '2018-10-25 19:31:43', '2018-10-30 12:03:00', '111111-1', 1, 1),
(7, '1', '1', '2018-10-25 19:33:45', '2018-10-30 12:03:00', '111111-1', 1, 3),
(8, '1', '1', '2018-10-25 19:39:27', '2018-10-16 12:03:00', '111111-1', 1, 3),
(9, '1', '1', '2018-10-25 19:43:37', '2018-10-30 12:03:00', '111111-1', 1, 1),
(10, 'qwe', 'qwe', '2018-11-23 00:58:56', '2018-11-28 12:12:00', '111111-1', 2, 1),
(11, 'qwe', 'qwe', '2018-11-23 11:36:23', '2018-11-19 12:03:00', '25355291-3', 1, 1),
(12, 'correo', 'qwe', '2018-11-24 01:00:32', '2018-11-28 12:32:00', '111111-1', 1, 1),
(13, 'correo', 'asd', '2018-11-24 01:15:22', '2018-12-04 12:03:00', '111111-1', 1, 1),
(14, 'correo', 'asd', '2018-11-24 01:16:24', '2018-11-27 12:03:00', '111111-1', 4, 1),
(15, 'correo', 'asd', '2018-11-24 01:17:34', '2018-11-27 12:03:00', '111111-1', 4, 1),
(16, 'correo', 'qwe', '2018-11-24 01:18:10', '2018-11-28 12:03:00', '111111-1', 1, 1),
(17, 'correo', 'asd', '2018-11-24 01:39:02', '2018-11-28 12:03:00', '111111-1', 1, 1),
(18, 'correo', 'asd', '2018-11-24 01:41:06', '0512-03-12 12:03:00', '111111-1', 4, 1),
(19, 'correo', 'asd', '2018-11-24 01:42:05', '1245-03-12 12:03:00', '111111-1', 1, 1),
(20, 'correo', 'asd', '2018-11-24 01:43:11', '0015-03-12 12:03:00', '111111-1', 4, 1),
(21, 'correo', 'asd', '2018-11-24 01:44:39', '3123-03-12 12:03:00', '111111-1', 1, 1),
(22, 'correo', 'asd', '2018-11-24 01:47:56', '3123-12-12 12:03:00', '111111-1', 4, 1),
(23, 'correo', 'asd', '2018-11-24 01:53:47', '0004-03-12 12:03:00', '111111-1', 2, 1),
(24, 'correo', 'asd', '2018-11-24 01:54:37', '0004-03-12 12:03:00', '111111-1', 2, 1),
(25, 'correo', 'asd', '2018-11-24 02:01:34', '0004-03-12 12:03:00', '111111-1', 1, 1),
(26, 'qwe', '123', '2018-11-24 02:04:45', '0004-03-12 12:03:00', '25355291-3', 1, 1),
(27, 'q', 'q', '2018-11-25 22:43:07', '0014-03-12 12:23:00', '25355291-3', 1, 1);

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
-- Indices de la tabla `sol_auditoria_solicitud`
--
ALTER TABLE `sol_auditoria_solicitud`
  ADD PRIMARY KEY (`aud_id`);

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
-- Indices de la tabla `sol_equipo_eliminado`
--
ALTER TABLE `sol_equipo_eliminado`
  ADD PRIMARY KEY (`equ_codigo`);

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
-- AUTO_INCREMENT de la tabla `sol_auditoria_solicitud`
--
ALTER TABLE `sol_auditoria_solicitud`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sol_detalle_solicitud`
--
ALTER TABLE `sol_detalle_solicitud`
  MODIFY `det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sol_equipo_baja`
--
ALTER TABLE `sol_equipo_baja`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sol_equipo_mantencion`
--
ALTER TABLE `sol_equipo_mantencion`
  MODIFY `equ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sol_estados_equipo`
--
ALTER TABLE `sol_estados_equipo`
  MODIFY `est_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sol_estados_solicitud`
--
ALTER TABLE `sol_estados_solicitud`
  MODIFY `est_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `sol_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
