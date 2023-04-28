-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2023 a las 16:56:33
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `enfermeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `grado` int(2) NOT NULL,
  `grupo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `asistencias` int(3) NOT NULL DEFAULT 0,
  `faltas` int(3) NOT NULL DEFAULT 0,
  `rol` int(2) NOT NULL DEFAULT 1,
  `clave` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `perfil` varchar(150) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'perfil.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `usuario`, `nombre`, `correo`, `grado`, `grupo`, `asistencias`, `faltas`, `rol`, `clave`, `estado`, `perfil`) VALUES
(1, '666', 'Junita Pérez', 'juntio@ucol.mx', 6, 'E', 0, 0, 1, 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 'perfil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(5) NOT NULL,
  `id_practica` int(5) NOT NULL,
  `id_alumno` int(5) NOT NULL,
  `asistencia` int(5) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `id_practica`, `id_alumno`, `asistencia`, `fecha`) VALUES
(1, 1, 1, 1, '2023-04-26 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'AAA'),
(23, 'Jeringa'),
(24, 'Medicamento'),
(26, 'XXX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_proveedor` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_generador` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `formato` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `descripcion`, `total`, `id_proveedor`, `id_generador`, `fecha`, `formato`) VALUES
(37, 'Primera Prueba', '1400.00', '6', '14', '2023-04-16 13:46:19', ''),
(38, 'Prueba 2', '200.00', '1', '14', '2023-04-16 13:47:30', ''),
(39, 'Holaaa', '700.00', '6', '14', '2023-04-16 14:16:15', ''),
(40, 'Quedó?', '100.00', '6', '14', '2023-04-16 23:43:29', ''),
(41, 'Prueba Gestor', '100.00', '6', '26', '2023-04-17 11:21:00', ''),
(42, 'Prueba X', '100.00', '1', '14', '2023-04-22 15:17:04', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `facultad` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `ciudad` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `aminimas` int(3) NOT NULL,
  `fmaximas` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `facultad`, `calle`, `colonia`, `cp`, `ciudad`, `aminimas`, `fmaximas`) VALUES
(1, 'Facultad de Enfermería', 'Av. Universidad No. 333', 'Las Víboras', 28040, 'Colima, Colima, México.', 20, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `total` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id`, `descripcion`, `total`, `estado`, `fecha`) VALUES
(47, 'Prueba 1', 2, 1, '2023-04-22 15:26:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `producto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id`, `id_compra`, `producto`, `id_producto`, `cantidad`, `precio`, `id_usuario`, `fecha`) VALUES
(29, 37, 'Prueba', 254, '3.00', '100.00', 14, '2023-04-16 13:46:19'),
(30, 37, 'Otro', 256, '2.00', '500.00', 14, '2023-04-16 13:46:19'),
(31, 37, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-16 13:46:19'),
(32, 38, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-16 13:47:30'),
(33, 38, 'Prueba', 254, '1.00', '100.00', 14, '2023-04-16 13:47:30'),
(34, 39, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-16 14:16:15'),
(35, 39, 'Prueba', 254, '1.00', '100.00', 14, '2023-04-16 14:16:15'),
(36, 39, 'Otro', 256, '1.00', '500.00', 14, '2023-04-16 14:16:15'),
(37, 40, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-16 23:43:29'),
(38, 41, 'Prueba', 254, '1.00', '100.00', 26, '2023-04-17 11:21:00'),
(39, 42, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-22 15:17:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_coti`
--

CREATE TABLE `detalle_coti` (
  `id` int(11) NOT NULL,
  `id_cotizacion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_coti`
--

INSERT INTO `detalle_coti` (`id`, `id_cotizacion`, `id_producto`, `cantidad`, `id_usuario`, `fecha`) VALUES
(53, 47, 253, '1.00', 14, '2023-04-22 15:26:32'),
(54, 47, 254, '1.00', 14, '2023-04-22 15:26:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `producto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id`, `id_venta`, `producto`, `id_producto`, `cantidad`, `precio`, `id_usuario`, `fecha`) VALUES
(49, 44, 'Ejemplo', 253, '2.00', '100.00', 1, '2023-02-22 23:58:59'),
(50, 45, 'Ejemplo', 253, '2.00', '100.00', 1, '2023-02-22 23:59:11'),
(51, 46, 'Ejemplo', 253, '3.00', '100.00', 1, '2023-02-23 00:02:26'),
(52, 47, 'Ejemplo', 253, '1.00', '100.00', 1, '2023-03-24 10:11:57'),
(53, 48, 'Ejemplo', 253, '1.00', '100.00', 1, '2023-04-06 12:41:14'),
(54, 49, 'Prueba', 254, '1.00', '100.00', 1, '2023-04-06 12:46:29'),
(55, 50, 'Prueba', 254, '1.00', '100.00', 1, '2023-04-06 13:13:13'),
(56, 51, 'Ejemplo', 253, '1.00', '100.00', 1, '2023-04-06 13:17:26'),
(57, 52, 'Prueba', 254, '1.00', '100.00', 1, '2023-04-06 13:18:17'),
(58, 53, 'Ejemplo', 253, '1.00', '100.00', 1, '2023-04-06 13:19:39'),
(59, 54, 'Ejemplo', 253, '1.00', '100.00', 1, '2023-04-06 13:21:50'),
(60, 55, 'Prueba', 254, '1.00', '100.00', 1, '2023-04-06 13:22:27'),
(61, 56, 'OTRO', 255, '1.00', '20.00', 1, '2023-04-06 13:23:23'),
(62, 58, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-13 13:08:04'),
(63, 58, 'Prueba', 254, '1.00', '100.00', 14, '2023-04-13 13:08:04'),
(64, 58, 'OTRO', 255, '1.00', '20.00', 14, '2023-04-13 13:08:04'),
(65, 59, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-14 13:18:46'),
(66, 61, 'Ejemplo', 253, '2.00', '100.00', 14, '2023-04-14 13:32:32'),
(67, 61, 'Prueba', 254, '2.00', '100.00', 14, '2023-04-14 13:32:32'),
(68, 61, 'OTRO', 255, '1.00', '20.00', 14, '2023-04-14 13:32:32'),
(69, 62, 'Prueba', 254, '1.00', '100.00', 14, '2023-04-14 13:38:10'),
(70, 63, 'Prueba', 254, '1.00', '100.00', 14, '2023-04-14 20:29:30'),
(71, 64, 'Ejemplo', 253, '1.00', '100.00', 26, '2023-04-15 00:37:53'),
(72, 65, 'Ejemplo', 253, '1.00', '100.00', 26, '2023-04-15 00:38:12'),
(73, 65, 'Prueba', 254, '1.00', '100.00', 26, '2023-04-15 00:38:12'),
(74, 65, 'OTRO', 255, '1.00', '20.00', 26, '2023-04-15 00:38:12'),
(75, 66, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-15 01:31:14'),
(76, 67, 'Prueba', 254, '1.00', '100.00', 14, '2023-04-16 15:04:20'),
(77, 67, 'Otro', 256, '1.00', '500.00', 14, '2023-04-16 15:04:20'),
(78, 68, 'Ejemplo', 253, '1.00', '100.00', 14, '2023-04-26 10:31:25'),
(79, 68, 'Prueba', 254, '1.00', '100.00', 14, '2023-04-26 10:31:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillas`
--

CREATE TABLE `plantillas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `objetivo` varchar(300) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `requisitos` varchar(300) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `formato` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `plantillas`
--

INSERT INTO `plantillas` (`id`, `nombre`, `descripcion`, `objetivo`, `requisitos`, `formato`, `estado`, `fecha`) VALUES
(1, 'Prueba 1 Act', 'Hola Act', 'Adios Act', 'Hola Act', '', 1, '2023-04-21'),
(2, 'Prueba 2 Act', 'Hola Act', 'Adios Act', 'Hola Act', '', 1, '2023-04-22'),
(3, 'Prueba 3', 'Adios', 'Hola', 'Adios', '', 1, '2023-04-22'),
(4, 'Prueba 4', 'Hola', 'Adios', 'Hola', '', 1, '2023-04-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practicas`
--

CREATE TABLE `practicas` (
  `id` int(5) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `id_plantilla` int(5) NOT NULL,
  `id_plantillam` int(10) NOT NULL,
  `id_responsable` int(5) NOT NULL,
  `fecha_practica` datetime NOT NULL,
  `semestre` int(2) NOT NULL,
  `capacidad` int(2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `practicas`
--

INSERT INTO `practicas` (`id`, `nombre`, `id_plantilla`, `id_plantillam`, `id_responsable`, `fecha_practica`, `semestre`, `capacidad`, `estado`, `fecha`) VALUES
(1, 'Prueba 1', 1, 47, 26, '2023-04-24 00:00:00', 6, 10, 1, '2023-04-23 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` decimal(10,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(10,2) NOT NULL,
  `minimo` int(10) NOT NULL,
  `categoria` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `proveedor` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `cantidad`, `precio`, `minimo`, `categoria`, `proveedor`, `estado`) VALUES
(253, '1', 'Ejemplo', '10.00', '100.00', 3, 'A', 'Guadalajara', 1),
(254, '2', 'Prueba', '11.00', '100.00', 6, 'Medicamento', 'Prueba', 1),
(256, '3', 'Otro', '3.00', '500.00', 0, 'Jeringa', 'Proveedor General', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `direccion`, `telefono`, `estado`) VALUES
(1, 'Proveedor General', 'NA', 'NA', 1),
(6, 'Prueba2', 'AAAA', 'BBBBB', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `perfil` varchar(150) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'perfil.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `correo`, `rol`, `clave`, `estado`, `perfil`) VALUES
(14, '111', 'Jordán Rodríguez', 'admin@sadsa.com', '5', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 'perfil.jpg'),
(26, '666', 'Prueba1', 'prueba1@ucol.mx', '4', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 'perfil.jpg'),
(27, '999', 'Prueba2', 'prueba2@ucol.mx', '3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 'perfil.jpg'),
(28, '333', 'Prueba3', 'prueba3@ucol.mx', '2', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 'perfil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `id_responsable` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_generador` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `formato` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `descripcion`, `total`, `id_responsable`, `id_generador`, `fecha`, `estado`, `formato`) VALUES
(44, 'Holaaaa', '200.00', '26', '14', '2023-02-22 23:58:59', 1, ''),
(45, 'Holaaaa', '200.00', '26', '14', '2023-02-22 23:59:11', 1, ''),
(46, 'S/D', '300.00', '26', '14', '2023-02-23 00:02:26', 1, ''),
(47, 'Prueba', '100.00', '26', '14', '2023-03-24 10:11:57', 1, ''),
(48, 'AAAA', '100.00', '14', '26', '2023-04-06 12:41:14', 0, ''),
(49, 'BBBBB', '100.00', '26', '14', '2023-04-06 12:46:29', 1, ''),
(50, '1', '100.00', '14', '26', '2023-04-06 13:13:13', 1, ''),
(51, 'xxxxxxxxx', '100.00', '26', '14', '2023-04-06 13:17:26', 1, ''),
(52, '5.2 Ejercicio ilwis ', '100.00', '14', '26', '2023-04-06 13:18:17', 1, ''),
(53, 'DSFDSF', '100.00', '26', '14', '2023-04-06 13:19:39', 1, ''),
(54, 'ZZZZ', '100.00', '26', '14', '2023-04-06 13:21:50', 1, ''),
(55, 'ZZZZ', '100.00', '26', '14', '2023-04-06 13:22:27', 1, ''),
(56, '222', '20.00', '14', '26', '2023-04-06 13:23:23', 2, ''),
(58, 'Prueba Ventas', '220.00', '26', '14', '2023-04-13 13:08:04', 1, ''),
(59, 'Esto es una prueba de salida', '100.00', '26', '14', '2023-04-14 13:18:46', 1, ''),
(60, 'Hola Esta Es Una Prueba', '220.00', '26', '14', '2023-04-14 13:29:55', 1, ''),
(61, 'Otra Prueba Fea', '420.00', '26', '14', '2023-04-14 13:32:32', 1, ''),
(62, 'Funciona la madre', '100.00', '26', '14', '2023-04-14 13:38:10', 1, ''),
(63, 'Hola', '100.00', '26', '14', '2023-04-14 20:29:30', 1, ''),
(64, 'Ejemplo de rechazo', '100.00', '14', '26', '2023-04-15 00:37:53', 1, ''),
(65, 'Ejemplo de aprobado', '220.00', '14', '26', '2023-04-15 00:38:12', 1, ''),
(67, 'Holaaaaaa', '600.00', '26', '14', '2023-04-16 15:04:20', 1, ''),
(68, 'Jotos Todos', '200.00', '26', '14', '2023-04-26 10:31:25', 2, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_coti`
--
ALTER TABLE `detalle_coti`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `practicas`
--
ALTER TABLE `practicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `detalle_coti`
--
ALTER TABLE `detalle_coti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `practicas`
--
ALTER TABLE `practicas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
