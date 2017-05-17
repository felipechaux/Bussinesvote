-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2017 a las 11:52:23
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_bussinesvote`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eleccion`
--

CREATE TABLE IF NOT EXISTS `tbl_eleccion` (
`id_eleccion` int(5) NOT NULL,
  `nombre_eleccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio_ins` datetime NOT NULL,
  `fecha_fin_ins` datetime NOT NULL,
  `fecha_inicio_vot` datetime NOT NULL,
  `fecha_fin_vot` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_eleccion`
--

INSERT INTO `tbl_eleccion` (`id_eleccion`, `nombre_eleccion`, `fecha_inicio_ins`, `fecha_fin_ins`, `fecha_inicio_vot`, `fecha_fin_vot`) VALUES
(1, 'COPASO oo      ', '2017-05-16 00:00:00', '2017-05-17 00:00:00', '2017-05-16 00:00:00', '2017-05-17 00:00:00'),
(2, 'CJD  ', '2017-05-16 00:00:00', '2017-05-17 00:00:00', '2017-05-16 00:00:00', '2017-05-17 00:00:00'),
(3, 'VERDE', '2017-04-16 00:00:00', '2017-04-17 00:00:00', '2017-04-16 00:00:00', '2017-04-20 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_voto`
--

CREATE TABLE IF NOT EXISTS `tbl_estado_voto` (
`id_estado_voto` int(2) NOT NULL,
  `nombre_estado_voto` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_estado_voto`
--

INSERT INTO `tbl_estado_voto` (`id_estado_voto`, `nombre_estado_voto`) VALUES
(1, 'Si'),
(2, 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_genero_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_genero_usuario` (
`id_genero_usuario` int(2) NOT NULL,
  `nombre_genero` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbl_genero_usuario`
--

INSERT INTO `tbl_genero_usuario` (`id_genero_usuario`, `nombre_genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagen_candidato`
--

CREATE TABLE IF NOT EXISTS `tbl_imagen_candidato` (
`id_imagen` int(5) NOT NULL,
  `nombre_imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `peso_imagen` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_imagen_candidato`
--

INSERT INTO `tbl_imagen_candidato` (`id_imagen`, `nombre_imagen`, `peso_imagen`) VALUES
(1, '77767.png', '8.68 KB'),
(2, '56454.jpg', '7.14 KB'),
(3, '45435.png', '840.78 KB');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_rol_usuario` (
`id_rol` int(2) NOT NULL,
  `nombre_rol` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbl_rol_usuario`
--

INSERT INTO `tbl_rol_usuario` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Candidato'),
(3, 'Votante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `documento` int(20) NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_genero_usuario` int(2) NOT NULL,
  `id_imagen` int(3) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_eleccion` int(2) DEFAULT NULL,
  `id_rol` int(2) NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`documento`, `nombre_usuario`, `password`, `id_genero_usuario`, `id_imagen`, `fecha_nacimiento`, `fecha_registro`, `id_eleccion`, `id_rol`, `correo`) VALUES
(0, 'Blanco', NULL, 0, NULL, '0000-00-00', '2017-05-16 16:31:09', NULL, 0, NULL),
(222, 'fege', '6454a9c8279cd3f405a4165f757da684', 1, NULL, '2017-05-17', '2017-05-16 15:23:28', NULL, 3, 'carlos@misena.edu.co'),
(666, 'felipe chaux gutierrez', 'fae0b27c451c728867a567e8c1bb4e53', 1, NULL, '2017-04-05', '2017-04-09 23:07:23', NULL, 3, ''),
(1012, 'Admin Bussine', 'fae0b27c451c728867a567e8c1bb4e53', 1, NULL, '0000-00-00', '2017-05-15 16:07:30', NULL, 1, ''),
(4234, 'felciano', 'ed044bfdabb734f12149f668882ade47', 1, NULL, '2017-05-09', '2017-05-16 16:48:57', NULL, 3, 'fefefefefef@misena.edu.co'),
(44444, 'andra matias', 'f6a204d588c6933a20317bed4ae9102b', 1, NULL, '2017-05-16', '2017-05-16 14:40:56', NULL, 3, 'feleef@mis.com'),
(45435, 'Eddie', NULL, 1, 3, '2017-05-17', '2017-05-16 14:38:00', 2, 2, NULL),
(56454, 'Ricardo', NULL, 1, 2, '2017-05-23', '2017-05-16 14:37:34', 1, 2, NULL),
(77767, 'carlos', NULL, 1, 1, '2017-05-10', '2017-05-16 14:36:48', 1, 2, NULL),
(776856, 'Fabian santo', '27d0195c0b55672fc682b223e74e4e07', 1, NULL, '2017-05-09', '2017-05-16 14:44:00', NULL, 3, 'chahaha@mise.anedu.co');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_voto`
--

CREATE TABLE IF NOT EXISTS `tbl_voto` (
`id_voto` int(5) NOT NULL,
  `documento_v` int(15) NOT NULL,
  `documento_c` int(15) DEFAULT NULL,
  `id_estado_voto` int(2) NOT NULL,
  `id_eleccion` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tbl_voto`
--

INSERT INTO `tbl_voto` (`id_voto`, `documento_v`, `documento_c`, `id_estado_voto`, `id_eleccion`) VALUES
(2, 666, 45435, 1, 2),
(3, 666, 56454, 1, 1),
(4, 44444, 0, 2, 1),
(5, 44444, 0, 2, 2),
(6, 776856, 45435, 1, 2),
(7, 776856, 56454, 1, 1),
(8, 222, 0, 2, 1),
(9, 222, 45435, 1, 2),
(10, 4234, 0, 2, 1),
(11, 4234, 0, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_eleccion`
--
ALTER TABLE `tbl_eleccion`
 ADD PRIMARY KEY (`id_eleccion`);

--
-- Indices de la tabla `tbl_estado_voto`
--
ALTER TABLE `tbl_estado_voto`
 ADD PRIMARY KEY (`id_estado_voto`);

--
-- Indices de la tabla `tbl_genero_usuario`
--
ALTER TABLE `tbl_genero_usuario`
 ADD PRIMARY KEY (`id_genero_usuario`);

--
-- Indices de la tabla `tbl_imagen_candidato`
--
ALTER TABLE `tbl_imagen_candidato`
 ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `tbl_rol_usuario`
--
ALTER TABLE `tbl_rol_usuario`
 ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
 ADD PRIMARY KEY (`documento`);

--
-- Indices de la tabla `tbl_voto`
--
ALTER TABLE `tbl_voto`
 ADD PRIMARY KEY (`id_voto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_eleccion`
--
ALTER TABLE `tbl_eleccion`
MODIFY `id_eleccion` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_estado_voto`
--
ALTER TABLE `tbl_estado_voto`
MODIFY `id_estado_voto` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_genero_usuario`
--
ALTER TABLE `tbl_genero_usuario`
MODIFY `id_genero_usuario` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tbl_imagen_candidato`
--
ALTER TABLE `tbl_imagen_candidato`
MODIFY `id_imagen` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_rol_usuario`
--
ALTER TABLE `tbl_rol_usuario`
MODIFY `id_rol` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tbl_voto`
--
ALTER TABLE `tbl_voto`
MODIFY `id_voto` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
