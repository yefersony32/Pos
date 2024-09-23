-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2022 a las 19:20:34
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `caja` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `caja`, `estado`) VALUES
(1, 'General', 1),
(2, 'Secundario', 1),
(5, 'super mayor', 0),
(6, '3000', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios`
--

CREATE TABLE `cambios` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cambios`
--

INSERT INTO `cambios` (`id`, `id_cliente`, `total`, `fecha`, `estado`) VALUES
(1, 1, '37.00', '2022-06-15 21:17:32', 1),
(2, 1, '60000.00', '2022-06-15 22:17:36', 1),
(3, 1, '18.00', '2022-06-15 22:46:02', 1),
(4, 2, '18.00', '2022-06-15 23:55:39', 1),
(5, 2, '37.00', '2022-06-16 01:53:35', 1),
(6, 1, '55.00', '2022-06-16 13:45:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `estado`) VALUES
(1, 'adidas', 1),
(2, 'magno', 1),
(3, 'nick', 1),
(4, 'guccis', 1),
(5, 'n', 1),
(6, 'tenis', 1),
(7, 'sandalias', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_caja`
--

CREATE TABLE `cierre_caja` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `monto_inicial` decimal(10,2) NOT NULL,
  `monto_final` decimal(10,2) NOT NULL DEFAULT 0.00,
  `fecha_apertura` date NOT NULL,
  `fecha_cierre` date NOT NULL,
  `total_ventas` int(11) NOT NULL,
  `monto_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cierre_caja`
--

INSERT INTO `cierre_caja` (`id`, `id_usuario`, `monto_inicial`, `monto_final`, `fecha_apertura`, `fecha_cierre`, `total_ventas`, `monto_total`, `estado`) VALUES
(1, 1, '1000.00', '100000.00', '2022-03-09', '2022-03-09', 2, '101000.00', 0),
(2, 1, '10000.00', '0.00', '2022-03-09', '0000-00-00', 0, '0.00', 0),
(3, 1, '100.00', '178000.00', '2022-03-09', '2022-03-09', 2, '178100.00', 0),
(4, 1, '50.00', '170000.00', '2022-03-09', '2022-03-09', 4, '170050.00', 0),
(5, 1, '150.00', '4000.00', '2022-03-09', '2022-03-09', 1, '4150.00', 0),
(6, 1, '25000.00', '55.00', '2022-03-11', '2022-03-11', 1, '25055.00', 0),
(7, 1, '20000.00', '4458622.00', '2022-03-11', '2022-03-19', 5, '4478622.00', 0),
(8, 1, '10.00', '1852200.00', '2022-03-19', '2022-03-19', 1, '1852210.00', 0),
(9, 1, '50000.00', '9261000.00', '2022-03-19', '2022-03-19', 1, '9311000.00', 0),
(10, 1, '20000.00', '3708400.00', '2022-03-19', '2022-03-19', 1, '3728400.00', 0),
(11, 1, '20000.00', '7739059.00', '2022-03-19', '2022-03-21', 2, '7759059.00', 0),
(12, 1, '5200.00', '36344096.00', '2022-03-21', '2022-06-13', 7, '36349296.00', 0),
(13, 1, '50000.00', '92.00', '2022-06-15', '2022-06-15', 2, '50092.00', 0),
(14, 1, '50000.00', '37.00', '2022-06-15', '2022-06-16', 1, '50037.00', 0),
(15, 1, '50000.00', '55.00', '2022-06-16', '2022-06-16', 1, '50055.00', 0),
(16, 1, '50000.00', '1000000.00', '2022-06-16', '2022-06-17', 1, '1050000.00', 0),
(17, 1, '50000.00', '0.00', '2022-06-17', '0000-00-00', 0, '0.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `dni`, `nombre`, `telefono`, `direccion`, `estado`) VALUES
(1, '1005711779', 'yefferson castiblanco', '3246767265', 'Mz A casa 31', 1),
(2, '28556680', 'nohora', '3133820582', 'Mz A casa 31', 1),
(3, '80310224', 'hector', '3133820582', 'Mz A casa 31', 1),
(4, '1005711778', 'otrohumano', '3133820582', 'Mz A casa 31', 1),
(5, '1221121212', 'fulanito', '32212313', 'Mz A casa 31', 1),
(6, '1111111141', 'dennis', '3133820582', 'Ataco', 1),
(7, '1111', 'cosas212', '000101010', 'Mz A casa 31', 1),
(8, '11111', 'nohoraS', '3133820582', 'Mz A casa 31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `total`, `fecha`, `estado`) VALUES
(1, '84000.00', '2022-03-08 13:13:08', 0),
(2, '15000.00', '2022-03-08 13:26:57', 0),
(3, '777777.00', '2022-03-08 13:31:01', 0),
(4, '84000.00', '2022-03-09 19:47:06', 1),
(5, '750000.00', '2022-03-11 00:24:14', 1),
(6, '2000000.00', '2022-03-11 13:48:05', 1),
(7, '4400000.00', '2022-03-15 14:57:37', 1),
(8, '200000.00', '2022-03-19 12:18:54', 1),
(9, '15000.00', '2022-03-19 12:19:35', 1),
(10, '6400000.00', '2022-03-19 15:07:38', 1),
(11, '1500.00', '2022-03-19 15:08:32', 1),
(12, '4000000.00', '2022-03-19 15:58:50', 1),
(13, '5555550.00', '2022-03-19 16:12:22', 1),
(14, '20000000.00', '2022-03-19 16:12:39', 1),
(15, '105000.00', '2022-03-19 16:13:26', 1),
(16, '630000.00', '2022-03-21 19:36:38', 1),
(17, '60000.00', '2022-03-21 19:41:48', 1),
(18, '400000.00', '2022-03-21 19:43:07', 1),
(19, '800000.00', '2022-03-21 19:51:40', 1),
(20, '24000.00', '2022-03-21 20:06:13', 1),
(21, '400000.00', '2022-06-15 19:23:40', 1),
(22, '2400000.00', '2022-06-15 19:56:25', 1),
(23, '400000.00', '2022-06-15 22:46:27', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `ruc` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `ruc`, `nombre`, `telefono`, `direccion`, `mensaje`) VALUES
(2, '1002589681', 'ZAPATERIA ', '3223213654', 'Ibague-Tolima', 'Gracias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cambios`
--

CREATE TABLE `detalle_cambios` (
  `id` int(11) NOT NULL,
  `id_cambio` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_cambios`
--

INSERT INTO `detalle_cambios` (`id`, `id_cambio`, `id_producto`, `cantidad`, `precio`, `sub_total`) VALUES
(1, 1, 1, 2, '18.52', '37.04'),
(2, 2, 1, 1, '18.52', '18.52'),
(3, 2, 5, 2, '2000.00', '4000.00'),
(4, 3, 1, 1, '18.52', '18.52'),
(5, 4, 1, 6, '18.52', '111.12'),
(6, 1, 1, 2, '18.52', '37.04'),
(7, 2, 10, 2, '30000.00', '60000.00'),
(8, 3, 1, 1, '18.52', '18.52'),
(9, 4, 1, 1, '18.52', '18.52'),
(10, 5, 1, 2, '18.52', '37.04'),
(11, 6, 1, 3, '18.52', '55.56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_compras`
--

INSERT INTO `detalle_compras` (`id`, `id_compra`, `id_producto`, `cantidad`, `precio`, `sub_total`) VALUES
(1, 1, 6, 21, '4000.00', '84000.00'),
(2, 2, 5, 10, '1500.00', '15000.00'),
(3, 3, 4, 7, '111111.00', '777777.00'),
(4, 4, 6, 21, '4000.00', '84000.00'),
(5, 5, 9, 30, '25000.00', '750000.00'),
(6, 6, 1, 5, '400000.00', '2000000.00'),
(7, 7, 7, 4, '400000.00', '1600000.00'),
(8, 7, 1, 7, '400000.00', '2800000.00'),
(9, 8, 6, 50, '4000.00', '200000.00'),
(10, 9, 5, 10, '1500.00', '15000.00'),
(11, 10, 7, 16, '400000.00', '6400000.00'),
(12, 11, 8, 1, '1500.00', '1500.00'),
(13, 12, 7, 10, '400000.00', '4000000.00'),
(14, 13, 4, 50, '111111.00', '5555550.00'),
(15, 14, 1, 50, '400000.00', '20000000.00'),
(16, 15, 8, 50, '1500.00', '75000.00'),
(17, 15, 5, 20, '1500.00', '30000.00'),
(18, 16, 10, 42, '15000.00', '630000.00'),
(19, 17, 10, 4, '15000.00', '60000.00'),
(20, 18, 7, 1, '400000.00', '400000.00'),
(21, 19, 7, 2, '400000.00', '800000.00'),
(22, 20, 11, 12, '2000.00', '24000.00'),
(23, 21, 1, 1, '400000.00', '400000.00'),
(24, 22, 1, 6, '400000.00', '2400000.00'),
(25, 23, 1, 1, '400000.00', '400000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_permisos`
--

CREATE TABLE `detalle_permisos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_permisos`
--

INSERT INTO `detalle_permisos` (`id`, `id_usuario`, `id_permiso`) VALUES
(31, 1, 1),
(32, 1, 3),
(44, 3, 1),
(45, 3, 2),
(46, 3, 4),
(47, 3, 5),
(48, 3, 6),
(49, 3, 7),
(50, 3, 8),
(51, 3, 10),
(52, 3, 11),
(53, 3, 12),
(54, 3, 13),
(55, 3, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_tempc`
--

CREATE TABLE `detalle_tempc` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_tempc`
--

INSERT INTO `detalle_tempc` (`id`, `id_producto`, `id_usuario`, `precio`, `cantidad`, `sub_total`) VALUES
(16, 1, 1, '18.52', 3, '55.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `descuento` decimal(10,2) NOT NULL DEFAULT 0.00,
  `precio` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`id`, `id_venta`, `id_producto`, `cantidad`, `descuento`, `precio`, `sub_total`) VALUES
(1, 1, 7, 6, '0.00', '1852200.00', '11113200.00'),
(2, 2, 5, 2, '0.00', '2000.00', '4000.00'),
(3, 3, 1, 20, '0.00', '18.52', '370.40'),
(4, 4, 1, 2, '0.00', '18.52', '37.04'),
(5, 5, 7, 4, '0.00', '1852200.00', '7408800.00'),
(6, 6, 7, 2, '0.00', '1852200.00', '3704400.00'),
(7, 7, 7, 2, '0.00', '1852200.00', '3704400.00'),
(8, 8, 7, 2, '0.00', '1852200.00', '3704400.00'),
(9, 9, 1, 2, '0.00', '18.52', '37.04'),
(10, 9, 4, 4, '0.00', '18.52', '74.08'),
(11, 9, 5, 6, '0.00', '2000.00', '12000.00'),
(12, 9, 6, 3, '0.00', '10000.00', '30000.00'),
(13, 9, 7, 7, '0.00', '1852200.00', '12965400.00'),
(14, 9, 8, 13, '0.00', '2000.00', '26000.00'),
(15, 9, 9, 2, '0.00', '50000.00', '100000.00'),
(16, 9, 10, 26, '0.00', '30000.00', '780000.00'),
(17, 9, 11, 2, '0.00', '100000.00', '200000.00'),
(18, 10, 1, 10, '0.00', '18.52', '185.20'),
(19, 11, 1, 2, '0.00', '18.52', '37.04'),
(20, 12, 1, 3, '0.00', '18.52', '55.56'),
(21, 13, 1, 2, '0.00', '18.52', '37.04'),
(22, 14, 4, 2, '0.00', '18.52', '37.04'),
(23, 14, 1, 1, '0.00', '18.52', '18.52'),
(24, 15, 11, 10, '0.00', '100000.00', '1000000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locales`
--

CREATE TABLE `locales` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `locales`
--

INSERT INTO `locales` (`id`, `dni`, `nombre`, `telefono`, `direccion`, `estado`) VALUES
(1, '11111', 'free concept', '3133820582', 'Calle 13 #2-25, Centro', 1),
(2, '1111100', 'daniela', '3133820582', 'Mz A casa 31  Urb Albania 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre_corto` varchar(5) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `nombre`, `nombre_corto`, `estado`) VALUES
(1, 'mujer 36', 'M36', 1),
(2, 'Hombre40', 'H40', 1),
(3, 'mujer 39', 'M39', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `permiso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `permiso`) VALUES
(1, 'usuarios'),
(2, 'configuracion'),
(3, 'cajas'),
(4, 'arqueo'),
(5, 'clientes'),
(6, 'medidas'),
(7, 'categorias'),
(8, 'productos'),
(9, 'nueva_compra'),
(10, 'historial_compra'),
(11, 'nueva_venta'),
(12, 'historial_venta'),
(13, 'eliminar_clientes'),
(14, 'registrar_clientes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `descripcion` varchar(155) NOT NULL,
  `precio_compra` decimal(10,2) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 0,
  `id_medida` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `descripcion`, `precio_compra`, `precio_venta`, `cantidad`, `id_medida`, `id_categoria`, `foto`, `estado`) VALUES
(1, '1111000', 'cosas grandes', '400000.00', '18.52', 9, 1, 1, '20220319170057.jpg', 1),
(4, '1111111111111', 'cosas ex', '111111.00', '18.52', 40, 1, 1, '20220226222520.jpg', 1),
(5, '101011', 'cerbezas', '1500.00', '2000.00', 14, 1, 3, 'default.png', 1),
(6, '00001', 'toallas', '4000.00', '10000.00', 16, 1, 1, '20220302203738.jpg', 1),
(7, '000101010', 'dinero', '400000.00', '1852200.00', 20, 2, 3, '20220305215557.jpg', 1),
(8, '11110101001', 'juan', '1500.00', '2000.00', 30, 2, 2, 'default.png', 1),
(9, '00000000000', 'zapatos', '25000.00', '50000.00', 8, 1, 2, '20220311012341.jpg', 1),
(10, '17171717', 'BETAMETASONA', '15000.00', '30000.00', 18, 1, 1, '20220321203145.jpg', 1),
(11, '1818181', 'MAS PASTAS', '2000.00', '100000.00', 0, 1, 1, '20220321203234.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `clave` varchar(150) NOT NULL,
  `id_caja` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`, `id_caja`, `estado`) VALUES
(1, 'admin', 'yefferson', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 1, 1),
(2, 'otro', 'otrohumano', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918', 2, 0),
(3, 'adminstradora', 'nohora', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) DEFAULT 1,
  `apertura` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_usuario`, `id_cliente`, `total`, `fecha`, `estado`, `apertura`) VALUES
(1, 1, 1, '11113200.00', '2022-06-17 13:56:12', 0, 0),
(2, 1, 1, '4000.00', '2022-06-13 20:16:20', 1, 0),
(3, 1, 1, '370.00', '2022-06-13 20:16:20', 0, 0),
(4, 1, 2, '37.00', '2022-06-13 20:16:20', 0, 0),
(5, 1, 3, '7408800.00', '2022-06-13 20:16:20', 0, 0),
(6, 1, 1, '3704400.00', '2022-06-13 20:16:20', 1, 0),
(7, 1, 4, '3704400.00', '2022-06-13 20:16:20', 1, 0),
(8, 1, 2, '3704400.00', '2022-06-13 20:16:20', 1, 0),
(9, 1, 1, '14113511.00', '2022-06-13 20:16:20', 1, 0),
(10, 1, 1, '185.00', '2022-06-13 20:16:20', 1, 0),
(11, 1, 1, '37.00', '2022-06-15 20:38:54', 1, 0),
(12, 1, 1, '55.00', '2022-06-15 20:38:54', 1, 0),
(13, 1, 6, '37.00', '2022-06-16 13:45:50', 1, 0),
(14, 1, 1, '55.00', '2022-06-16 17:05:00', 1, 0),
(15, 1, 1, '1000000.00', '2022-06-17 13:54:18', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cambios`
--
ALTER TABLE `cambios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
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
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_cambios`
--
ALTER TABLE `detalle_cambios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_tempc`
--
ALTER TABLE `detalle_tempc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_caja` (`id_caja`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cambios`
--
ALTER TABLE `cambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cierre_caja`
--
ALTER TABLE `cierre_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `detalle_cambios`
--
ALTER TABLE `detalle_cambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `detalle_permisos`
--
ALTER TABLE `detalle_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `detalle_tempc`
--
ALTER TABLE `detalle_tempc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
