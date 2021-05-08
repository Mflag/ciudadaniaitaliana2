-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2021 a las 06:32:01
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ciudadania_italiana`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arboles`
--

CREATE TABLE `arboles` (
  `id_arbol` int(11) NOT NULL,
  `acta` varchar(5) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `lugar_nacimiento` varchar(150) NOT NULL,
  `datos_nacimiento` varchar(150) NOT NULL,
  `fecha_nacimiento` varchar(130) NOT NULL,
  `lugar_matrimonio` varchar(150) NOT NULL,
  `datos_matrimonio` varchar(150) NOT NULL,
  `fecha_matrimonio` varchar(30) NOT NULL,
  `lugar_defuncion` varchar(150) NOT NULL,
  `datos_defuncion` varchar(150) NOT NULL,
  `fecha_defuncion` varchar(30) NOT NULL,
  `divorcio` tinyint(1) NOT NULL,
  `lugar_divorcio` varchar(150) NOT NULL,
  `datos_divorcio` varchar(150) NOT NULL,
  `fecha_divorcio` varchar(30) NOT NULL,
  `segundo` tinyint(1) NOT NULL,
  `lugar_segundo` varchar(150) NOT NULL,
  `datos_segundo` varchar(150) NOT NULL,
  `fecha_segundo` varchar(30) NOT NULL,
  `segundoDivorcio` tinyint(1) NOT NULL,
  `lugar_segundoDivorcio` varchar(150) NOT NULL,
  `datos_segundoDivorcio` varchar(150) NOT NULL,
  `fecha_segundoDivorcio` varchar(30) NOT NULL,
  `tercero` tinyint(1) NOT NULL,
  `lugar_tercero` varchar(150) NOT NULL,
  `datos_tercero` varchar(150) NOT NULL,
  `fecha_tercero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arboles`
--

INSERT INTO `arboles` (`id_arbol`, `acta`, `id_cliente`, `nombre`, `apellido`, `lugar_nacimiento`, `datos_nacimiento`, `fecha_nacimiento`, `lugar_matrimonio`, `datos_matrimonio`, `fecha_matrimonio`, `lugar_defuncion`, `datos_defuncion`, `fecha_defuncion`, `divorcio`, `lugar_divorcio`, `datos_divorcio`, `fecha_divorcio`, `segundo`, `lugar_segundo`, `datos_segundo`, `fecha_segundo`, `segundoDivorcio`, `lugar_segundoDivorcio`, `datos_segundoDivorcio`, `fecha_segundoDivorcio`, `tercero`, `lugar_tercero`, `datos_tercero`, `fecha_tercero`) VALUES
(40, '1', 35, 'Joaquin', 'Bandera', '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `fecha` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` int(16) NOT NULL,
  `tipo_de_cliente` varchar(40) NOT NULL,
  `carpeta` varchar(40) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `apellido`, `nombre`, `fecha`, `email`, `telefono`, `tipo_de_cliente`, `carpeta`, `estado`) VALUES
(35, 'Bandera', 'Joaquin', '2021-05-08', 'matiibandera@outlook.com', 1566334422, 'CRM', 'Franco', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuentas` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `presupuesto` int(10) NOT NULL,
  `pagos` int(10) NOT NULL,
  `saldo` int(10) NOT NULL,
  `fecha_pago` varchar(12) NOT NULL,
  `medio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuentas`, `id_cliente`, `presupuesto`, `pagos`, `saldo`, `fecha_pago`, `medio`) VALUES
(44, 35, 100000, 0, 100000, '2021-05-08', ''),
(45, 35, 100000, 25000, 75000, '2021-05-08', 'Efectivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arboles`
--
ALTER TABLE `arboles`
  ADD PRIMARY KEY (`id_arbol`),
  ADD KEY `cliente_arbol` (`id_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuentas`),
  ADD KEY `cliente_cuentas` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arboles`
--
ALTER TABLE `arboles`
  MODIFY `id_arbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuentas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arboles`
--
ALTER TABLE `arboles`
  ADD CONSTRAINT `cliente_arbol` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cliente_cuentas` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
