-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2022 a las 14:18:16
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `recolector_municipal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_basura`
--

CREATE TABLE `pedido_basura` (
  `idpedido_basura` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` varchar(45) DEFAULT NULL COMMENT '1=recogido, 2=no recogido',
  `situacion` varchar(45) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermisos` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermisos`, `nombre`, `estado`) VALUES
(1, 'inicioA', '1'),
(2, 'acceso', '1'),
(3, 'designar', '1'),
(4, 'reportes', '1'),
(5, 'inicioT', '1'),
(6, 'inicioC', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `idreporte` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idtipo_residuo` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `referencia` varchar(300) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`idreporte`, `idusuario`, `idtipo_residuo`, `descripcion`, `referencia`, `img`, `fecha`, `estado`) VALUES
(1, 4, 3, 'tengo como 100 botellas por recoger ', 'Frente a mi casa al lado de un arbol', NULL, NULL, '1'),
(2, 5, 4, 'tengo 20 saquetas de plastico', 'A lado del hotel san marino', '', '2022-12-07', '1'),
(10, 24, 3, 'sadasdasdasdsda', 'fwfasadfasdsd', '06-12-2022 07.55.53 PM 11167037455335.jpeg', '2022-12-06', '1'),
(11, 5, 3, 'dsdasdsds', 'dasdsada', '06-12-2022 07.57.41 PM 9167037466225.jpeg', '2022-12-06', '1'),
(12, 22, 3, 'se hace reporte de tal coasa', 'frenre a la casas tal', '', '2022-12-06', '1'),
(13, 23, 3, 'ES UNA BOL', 'CALLE 03 FRENTE AL HOSPITAL', '', '2022-12-06', '1'),
(14, 25, 4, 'xgfdhfghdfgdgdss', 'asasasdsfdgthfd', '', '2022-12-07', '0'),
(15, 22, 5, 'jjfghfhgbfbdd', 'asasajjjjjj', '', '2022-12-07', '0'),
(16, 5, 3, 'adfasf', 'hola', '', '2022-12-07', '0'),
(17, 22, 3, 'estamos editando', '7 esquinas', '', '2022-12-07', '0'),
(18, 5, 4, 'zvxcbnm,m', 'zcvnm,', '07-12-2022 08.38.45 AM 1167042032525.jpg', '2022-12-07', '0'),
(19, 22, 2, 'sas', 'asd', '', '2022-12-07', '0'),
(20, 5, 2, 'Una saqueta llena', 'fernte al mercado la caserita', '', '2022-12-09', '1'),
(21, 5, 2, 'una saqueta llena de latas', 'ls banda de shilcayo frente al mercado', '', '2022-12-09', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `idtipo_persona` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`idtipo_persona`, `nombre`, `estado`) VALUES
(1, 'NINGUNO', '1'),
(2, 'ADMINISTRADOR', '1'),
(3, 'TRABAJADOR', '1'),
(4, 'CIVIL', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_residuo`
--

CREATE TABLE `tipo_residuo` (
  `idtipo_residuo` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_residuo`
--

INSERT INTO `tipo_residuo` (`idtipo_residuo`, `nombres`, `estado`) VALUES
(1, 'NINGUNO', '1'),
(2, 'LATAS', '1'),
(3, 'BOTELLAS', '1'),
(4, 'PLASTICO', '1'),
(5, 'VIDRIOS', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idtipo_persona` int(11) NOT NULL,
  `idzonas` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `img_perfil` varchar(100) DEFAULT NULL,
  `estado` char(1) DEFAULT '1',
  `last_sesion` timestamp NULL DEFAULT current_timestamp(),
  `estado_delete` char(1) DEFAULT NULL,
  `user_delete` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idtipo_persona`, `idzonas`, `nombres`, `dni`, `login`, `password`, `edad`, `direccion`, `telefono`, `email`, `img_perfil`, `estado`, `last_sesion`, `estado_delete`, `user_delete`) VALUES
(1, 2, 1, 'Lewis Caro', '70218467', 'lewis_caro', 'lewis123', 22, 'jr. Alvites', '918945645', 'lewiscaro@gmail.com', NULL, '1', '2022-12-07 00:23:04', NULL, NULL),
(4, 3, 2, 'Jheyfer Arevalo ', '78156498', 'jheyfer_arevalo', '123', 22, 'jr. Martires', '954987258', 'jheyfer@gmail.com', NULL, '1', '2022-12-07 00:23:04', NULL, NULL),
(5, 4, 3, 'Gorki Arce', '78451269', 'gorki_arce', '123', 23, 'jr. juan guerra', '966313487', 'gorki@gmail.com', NULL, '1', '2022-12-07 00:23:04', NULL, NULL),
(22, 4, 2, 'Jhon Huaman', '76589732', 'jhon_huaman', '123', 22, 'jr-grau', '963852741', 'jhon@gmail.com', NULL, '1', '2022-12-09 11:11:01', NULL, NULL),
(23, 4, 3, 'Juan Villa', '74454852', 'juan_villa', '123', 25, 'jr.jdsd', '941652123', 'villa@gmail', NULL, '1', '2022-12-09 13:09:55', NULL, NULL),
(24, 3, 2, 'Mateo Julca', '71541213', 'mateo', '123', 24, 'jr.girasol', '961561456', 'mateo@cdfsf', NULL, '1', '2022-12-09 13:14:14', NULL, NULL),
(25, 4, 2, 'Lisset Huaman ', '75152128', 'lisset', '123', 25, 'jr.hgsadfsad', '946512327', 'lisset@fdsfs', NULL, '1', '2022-12-09 13:14:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idpermisos` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idpermisos`, `idusuario`, `estado`) VALUES
(1, 1, 1, '1'),
(2, 2, 1, '1'),
(3, 3, 1, '1'),
(5, 4, 5, '1'),
(6, 6, 5, '1'),
(8, 5, 4, '1'),
(9, 4, 4, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `idzonas` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `horario` varchar(45) DEFAULT NULL,
  `estado` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`idzonas`, `nombre`, `horario`, `estado`) VALUES
(1, 'NINGUNO', 'NINGUNO', NULL),
(2, 'LA FLORIDA', '8:00 AM A 5:00 PM', NULL),
(3, '7 ESQUINAS', '8:00 AM A 5:00 PM', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido_basura`
--
ALTER TABLE `pedido_basura`
  ADD PRIMARY KEY (`idpedido_basura`),
  ADD KEY `fk_pedido_basura_usuario1_idx` (`idusuario`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermisos`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idreporte`),
  ADD KEY `fk_reporte_usuario1_idx` (`idusuario`),
  ADD KEY `fk_reporte_tipo_residuo1_idx` (`idtipo_residuo`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`idtipo_persona`);

--
-- Indices de la tabla `tipo_residuo`
--
ALTER TABLE `tipo_residuo`
  ADD PRIMARY KEY (`idtipo_residuo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_zonas1_idx` (`idzonas`),
  ADD KEY `fk_usuario_tipo_persona1_idx` (`idtipo_persona`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`),
  ADD KEY `fk_usuario_permiso_permisos1_idx` (`idpermisos`),
  ADD KEY `fk_usuario_permiso_usuario1_idx` (`idusuario`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`idzonas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido_basura`
--
ALTER TABLE `pedido_basura`
  MODIFY `idpedido_basura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idreporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `idtipo_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_residuo`
--
ALTER TABLE `tipo_residuo`
  MODIFY `idtipo_residuo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `idzonas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido_basura`
--
ALTER TABLE `pedido_basura`
  ADD CONSTRAINT `fk_pedido_basura_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `fk_reporte_tipo_residuo1` FOREIGN KEY (`idtipo_residuo`) REFERENCES `tipo_residuo` (`idtipo_residuo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reporte_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_persona1` FOREIGN KEY (`idtipo_persona`) REFERENCES `tipo_persona` (`idtipo_persona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_zonas1` FOREIGN KEY (`idzonas`) REFERENCES `zonas` (`idzonas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD CONSTRAINT `fk_usuario_permiso_permisos1` FOREIGN KEY (`idpermisos`) REFERENCES `permisos` (`idpermisos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_permiso_usuario1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
