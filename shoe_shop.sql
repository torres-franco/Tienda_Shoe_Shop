-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2020 a las 21:10:52
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shoe_shop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `id_barrio` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`id_barrio`, `id_ciudad`, `descripcion`) VALUES
(1, 1, 'Mariano Moreno'),
(2, 1, 'Santa Rosa'),
(3, 1, 'San Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion`) VALUES
(1, 'Zapatillas'),
(2, 'Zapatos'),
(3, 'Botas'),
(4, 'Borcegos'),
(5, 'Panchitas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `id_provincia` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `codigo_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `id_provincia`, `nombre`, `codigo_postal`) VALUES
(1, 1, 'Formosa', 3600),
(2, 0, 'Los Chiriguanos', 3632);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `id_persona_fisica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `id_persona_fisica`) VALUES
(1, 1),
(2, 2),
(14, 8),
(15, 9),
(16, 0),
(17, 0),
(18, 0),
(19, 10),
(20, 11),
(21, 12),
(22, 13),
(23, 14),
(24, 15),
(25, 22),
(26, 23),
(27, 24),
(28, 25),
(29, 32),
(30, 33),
(31, 34),
(32, 35),
(33, 36),
(34, 37),
(35, 38),
(36, 39),
(37, 40),
(38, 41),
(39, 42),
(40, 43),
(41, 44),
(42, 45),
(43, 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `descripcion`) VALUES
(1, 'Blanco'),
(2, 'Negro'),
(3, 'Rojo'),
(4, 'Marrón'),
(5, 'Verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `numero_compra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `id_detalle_compra` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `cantidad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_direccion` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_barrio` int(11) NOT NULL,
  `calle` varchar(30) NOT NULL,
  `altura` varchar(10) DEFAULT NULL,
  `manzana` varchar(5) DEFAULT NULL,
  `torre` varchar(5) DEFAULT NULL,
  `piso` varchar(5) NOT NULL,
  `numero_puerta` int(5) DEFAULT NULL,
  `sector` varchar(10) DEFAULT NULL,
  `referencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`id_direccion`, `id_persona`, `id_barrio`, `calle`, `altura`, `manzana`, `torre`, `piso`, `numero_puerta`, `sector`, `referencia`) VALUES
(1, 1, 1, 'Av. Gutnisky', '3445', '', '1', '4', 4005, '', 'Frente de la UNaF'),
(2, 8, 3, 'Av. 25 de Mayo', '1992', '', '1', '', 22, '', 'Al lado de la agencia 144'),
(5, 2, 2, 'Siempre viva', '54', '', NULL, '', NULL, NULL, ''),
(6, 21, 1, 'Juan B. justo', 'S/N', '', NULL, '', NULL, NULL, ''),
(7, 14, 1, 'San MartÃ­n', '209', '', NULL, '', NULL, NULL, ''),
(8, 94, 2, 'Av. 25 de Mayo', '1991', '', NULL, '4', NULL, NULL, ''),
(9, 93, 2, 'Av. PantaleÃ³n Gomez', '55', '', NULL, '', NULL, NULL, ''),
(11, 92, 2, 'Fontanan', '54', '', NULL, '', NULL, NULL, ''),
(16, 91, 1, 'Av. Trinidad', '23999', '', NULL, '', NULL, NULL, ''),
(17, 100, 1, 'Av. Gutnisky', '3444', '', NULL, '5', NULL, NULL, ''),
(18, 108, 2, 'Juan B. justo', '555', '', NULL, '', NULL, NULL, ''),
(19, 102, 1, 'Prueba domicilio', '1234', '', NULL, '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `id_envio` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `codigo_seguimiento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedido`
--

CREATE TABLE `estadopedido` (
  `id_estado_pedido` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id_factura` int(11) NOT NULL,
  `numero` int(30) NOT NULL,
  `fecha_emision` date NOT NULL,
  `tipo` char(1) NOT NULL,
  `id_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `descripcion`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Narrow');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `directorio` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id_modulo`, `descripcion`, `directorio`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Clientes', 'clientes'),
(3, 'Proveedores', 'proveedores'),
(4, 'Productos', 'productos'),
(5, 'Compras', 'compras'),
(6, 'Gestion de Ventas', 'ventas'),
(7, 'Reportes', 'reportes'),
(8, 'Usuarios', 'usuarios'),
(9, 'Modulos', 'modulos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_pedido_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidodetalle`
--

CREATE TABLE `pedidodetalle` (
  `id_pedido_detalle` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `cantidad` int(3) NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'VENDEDOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_modulo`
--

CREATE TABLE `perfil_modulo` (
  `id_perfil_modulo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_modulo`
--

INSERT INTO `perfil_modulo` (`id_perfil_modulo`, `id_perfil`, `id_modulo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 2),
(9, 2, 4),
(10, 2, 5),
(11, 1, 8),
(12, 1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`) VALUES
(1),
(2),
(4),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personafisica`
--

CREATE TABLE `personafisica` (
  `id_persona_fisica` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `dni` varchar(15) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(10) NOT NULL,
  `estado` int(5) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personafisica`
--

INSERT INTO `personafisica` (`id_persona_fisica`, `id_persona`, `nombre`, `apellido`, `dni`, `fecha_nacimiento`, `genero`, `estado`) VALUES
(1, 1, 'Franco', 'Torres', '3456756789', '2020-07-21', 'Masculino', 1),
(2, 2, 'Francisco', 'Torres', '40443232', '1997-05-11', 'Masculino', 1),
(8, 21, 'Justo', 'GonzÃ¡les', '40009992', '1997-05-14', 'Femenino', 1),
(9, 14, 'Yanela', 'Pompella', '42878762', '1997-05-18', 'Femenino', 1),
(16, 75, 'Analy', 'Torres', '47474555', '0000-00-00', '', 1),
(17, 76, 'Analy', 'Torres', '87878555', '0000-00-00', '', 1),
(18, 77, 'Analy', 'Torres', '20100011', '0000-00-00', '', 1),
(19, 78, 'Analy', 'Torres', '4545454', '0000-00-00', '', 1),
(20, 79, 'Francisco', 'Torresss', '58555444', '0000-00-00', '', 1),
(21, 80, 'Juan', 'Cuellar', '47555444', '0000-00-00', '', 1),
(27, 86, 'Francisco', 'Torres', '55202000', '0000-00-00', '', 1),
(28, 87, 'Yani', 'Vizgarra', '47585520', '0000-00-00', '', 1),
(29, 88, 'Yani', 'Vizgarra', '47777', '0000-00-00', '', 1),
(30, 89, 'Diego', 'Riquelme', '444444', '0000-00-00', '', 1),
(31, 90, 'Diego', 'Palavecino', '444', '0000-00-00', '', 1),
(32, 91, 'Franco', 'Torres', '24444', '2020-07-05', 'Masculino', 1),
(41, 100, 'Fulanito', 'PÃ©rez', '32344', '2020-07-07', 'Masculino', 1),
(42, 101, 'Franco', 'Vizgarra', '2555', '2020-07-09', 'Masculino', 1),
(43, 102, 'Analy', 'Aylen', '2345678', '2020-07-10', 'Femenino', 1),
(44, 103, 'Franco', 'Vizgarra', '209809899', '2020-07-10', 'Masculino', 1),
(45, 104, 'Francisco', 'Palavecino', '123456789', '2020-07-09', 'Masculino', 1),
(46, 105, 'Jorge', 'BÃ¡ez', '', '0000-00-00', '', 1),
(47, 106, 'Jorge', 'BÃ¡ez', '', '0000-00-00', '', 1),
(48, 108, 'Scott', 'Travis', '123456789', '2020-07-21', 'Masculino', 1),
(49, 109, 'Pepito', 'Fulanito', '', '0000-00-00', '', 1),
(50, 110, 'Pepito', 'Fulanito', '', '0000-00-00', '', 1),
(51, 111, 'Pepito', 'Fulanito', '', '0000-00-00', '', 1),
(52, 112, 'Pepito', 'Amaya', '', '0000-00-00', '', 1),
(53, 113, 'Pepito', 'Fulanito', '', '0000-00-00', '', 1),
(54, 114, 'Pepito', 'Fulanito', '', '0000-00-00', '', 1),
(55, 115, 'Pepito', 'Fulanito', '', '0000-00-00', '', 1),
(56, 116, 'Prueba', 'Tester', '', '0000-00-00', '', 1),
(57, 117, 'Prueba', 'Tester', '', '0000-00-00', '', 1),
(58, 118, 'Prueba', 'Travis', '', '0000-00-00', '', 1),
(59, 119, 'Prueba', 'Travis', '', '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_talle` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `precio` float(10,2) NOT NULL,
  `stock_actual` int(10) NOT NULL,
  `stock_minimo` int(5) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_marca`, `id_categoria`, `id_talle`, `id_color`, `precio`, `stock_actual`, `stock_minimo`, `descripcion`) VALUES
(1, 1, 1, 15, 1, 2000.00, 10, 3, 'Air50'),
(2, 2, 1, 14, 2, 6000.00, 5, 2, 'Energy Falcon'),
(3, 1, 1, 15, 2, 5120.00, 6, 3, 'QUEST'),
(4, 1, 1, 15, 3, 6899.99, 6, 3, 'Revolution 5'),
(5, 2, 1, 14, 4, 4799.00, 5, 3, 'Runfalcon'),
(6, 3, 5, 13, 1, 3800.00, 3, 2, 'Lona Urbanas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `razon_social` varchar(50) NOT NULL,
  `cuit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `id_persona`, `razon_social`, `cuit`) VALUES
(1, 2, 'Calzados Multimarcas S.A', '21-02022531-0'),
(7, 30, 'Tienda', '20-33344564-3'),
(8, 31, 'Tienda Norte S.A', '41-02001221-1'),
(9, 32, 'Tienda de calzados', '41-02001221-1'),
(10, 34, 'Tienda de calzados', '41-02001221-1'),
(11, 35, 'ByE Calzados', '42-02001221-1'),
(12, 107, 'we24', '42-02001221-2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre`) VALUES
(1, 'Formosa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talle`
--

CREATE TABLE `talle` (
  `id_talle` int(11) NOT NULL,
  `descripcion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `talle`
--

INSERT INTO `talle` (`id_talle`, `descripcion`) VALUES
(1, 28),
(2, 29),
(3, 30),
(4, 31),
(5, 32),
(6, 33),
(7, 34),
(8, 35),
(9, 36),
(10, 37),
(11, 38),
(12, 39),
(13, 40),
(14, 41),
(15, 42),
(16, 43),
(17, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontacto`
--

CREATE TABLE `tipocontacto` (
  `id_tipo_contacto` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocontacto`
--

INSERT INTO `tipocontacto` (`id_tipo_contacto`, `descripcion`) VALUES
(1, 'Número de celular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontacto_persona`
--

CREATE TABLE `tipocontacto_persona` (
  `id_tipo_contacto_persona` int(11) NOT NULL,
  `id_tipo_contacto` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocontacto_persona`
--

INSERT INTO `tipocontacto_persona` (`id_tipo_contacto_persona`, `id_tipo_contacto`, `id_persona`, `descripcion`) VALUES
(1, 1, 1, '3704015065');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_persona_fisica` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `ultima_conexion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_perfil`, `id_persona_fisica`, `user`, `clave`, `ultima_conexion`) VALUES
(1, 1, 1, 'fr4nk097', '123456789', '2020-06-01 05:08:12'),
(4, 2, 19, 'AnalyTorres20', '12345', '0000-00-00 00:00:00'),
(8, 1, 27, 'Francisco98', '1234', '0000-00-00 00:00:00'),
(9, 1, 29, 'YanniViz97', '12345', '0000-00-00 00:00:00'),
(10, 1, 31, 'Diego', '123', '0000-00-00 00:00:00'),
(11, 0, 55, 'Pepe2020', '123456789', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`id_barrio`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`id_detalle_compra`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`id_envio`);

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`id_estado_pedido`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `pedidodetalle`
--
ALTER TABLE `pedidodetalle`
  ADD PRIMARY KEY (`id_pedido_detalle`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  ADD PRIMARY KEY (`id_perfil_modulo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `personafisica`
--
ALTER TABLE `personafisica`
  ADD PRIMARY KEY (`id_persona_fisica`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `talle`
--
ALTER TABLE `talle`
  ADD PRIMARY KEY (`id_talle`);

--
-- Indices de la tabla `tipocontacto`
--
ALTER TABLE `tipocontacto`
  ADD PRIMARY KEY (`id_tipo_contacto`);

--
-- Indices de la tabla `tipocontacto_persona`
--
ALTER TABLE `tipocontacto_persona`
  ADD PRIMARY KEY (`id_tipo_contacto_persona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `id_detalle_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `id_estado_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidodetalle`
--
ALTER TABLE `pedidodetalle`
  MODIFY `id_pedido_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfil_modulo`
--
ALTER TABLE `perfil_modulo`
  MODIFY `id_perfil_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `personafisica`
--
ALTER TABLE `personafisica`
  MODIFY `id_persona_fisica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `talle`
--
ALTER TABLE `talle`
  MODIFY `id_talle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tipocontacto`
--
ALTER TABLE `tipocontacto`
  MODIFY `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipocontacto_persona`
--
ALTER TABLE `tipocontacto_persona`
  MODIFY `id_tipo_contacto_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
