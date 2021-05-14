-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2021 a las 00:03:49
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
-- Estructura de tabla para la tabla `actas`
--

CREATE TABLE `actas` (
  `id_acta` int(11) NOT NULL,
  `id_arbol` int(11) NOT NULL,
  `acta` varchar(15) NOT NULL,
  `lugar` varchar(150) NOT NULL,
  `dato` varchar(150) NOT NULL,
  `fecha` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actas`
--

INSERT INTO `actas` (`id_acta`, `id_arbol`, `acta`, `lugar`, `dato`, `fecha`) VALUES
(4, 42, '1', 'madrid', '', '12/02/2009'),
(8, 42, '3', 'madrid', '', '11/05/2021'),
(9, 42, '2', 'madrid', 'tratamiento', '18/05/2021'),
(10, 41, '1', 'madrid', 'tratamiento', '11/05/2021'),
(11, 41, '2', 'madrid', 'tratamiento', '11/05/2021');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arboles`
--

CREATE TABLE `arboles` (
  `id_arbol` int(11) NOT NULL,
  `acta` varchar(5) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arboles`
--

INSERT INTO `arboles` (`id_arbol`, `acta`, `id_cliente`, `nombre`, `apellido`) VALUES
(41, '3', 36, 'Roberto', 'Bandera'),
(42, '4', 36, 'Matias', 'Bandera');

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
  `tipo_trabajo` varchar(150) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `apellido`, `nombre`, `fecha`, `email`, `telefono`, `tipo_de_cliente`, `carpeta`, `tipo_trabajo`, `estado`) VALUES
(36, 'Bandera', 'Joaquin', '09/05/0021', 'matiibandera@outlook.com', 1566334422, 'CRM', 'Matias', 'Carpeta', 'En Tratativas'),
(37, 'Caceres', 'Joaquin', '06/06/2021', 'melina@gmail.com', 1566334422, 'CRM', 'Franco', 'Turno', 'Activo'),
(38, 'Andrades', 'Joaquin', '13/05/2021', 'ro_gazzo@hotmail.com', 1566334422, 'CRM', 'Machado', 'Estado civil', 'Activo');

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
(69, 36, 50000, 0, 50000, '11/05/2021', ''),
(70, 37, 80000, 0, 80000, '13/05/2021', ''),
(71, 37, 80000, 40000, 40000, '13/05/2021', 'Efectivo'),
(72, 38, 60000, 0, 60000, '13/05/2021', ''),
(73, 38, 60000, 30000, 30000, '13/05/2021', 'Efectivo'),
(74, 38, 60000, 30000, 0, '13/05/2021', 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_notas` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha_nota` varchar(10) NOT NULL,
  `nota` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_notas`, `id_cliente`, `fecha_nota`, `nota`) VALUES
(2, 37, '2021-05-06', 'sadasdasdasd'),
(3, 37, '2021-05-06', 'fdsjfndsjfnffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff'),
(4, 37, '29/04/2021', 'dsadsadsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `id_responsable` int(11) NOT NULL,
  `responsable` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`id_responsable`, `responsable`) VALUES
(1, 'Torrado S.'),
(2, 'Soria'),
(3, 'Zaccagnino'),
(4, 'Bandera'),
(5, 'Galliusi'),
(6, 'Tonellato'),
(7, 'Anzelini'),
(8, 'Leguizamon'),
(9, 'Billosi'),
(10, 'Agostino'),
(13, 'Torrado E.'),
(14, 'Torrado M.'),
(15, 'Tripodi'),
(16, 'Wong'),
(17, 'Machado'),
(18, 'Madelia'),
(19, 'Vega'),
(20, 'Almiron'),
(21, 'D\'Onofrio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actas`
--
ALTER TABLE `actas`
  ADD PRIMARY KEY (`id_acta`),
  ADD KEY `arbol_acta` (`id_arbol`);

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
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_notas`),
  ADD KEY `clientes_notas` (`id_cliente`);

--
-- Indices de la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id_responsable`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actas`
--
ALTER TABLE `actas`
  MODIFY `id_acta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `arboles`
--
ALTER TABLE `arboles`
  MODIFY `id_arbol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuentas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_notas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `responsables`
--
ALTER TABLE `responsables`
  MODIFY `id_responsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actas`
--
ALTER TABLE `actas`
  ADD CONSTRAINT `arbol_acta` FOREIGN KEY (`id_arbol`) REFERENCES `arboles` (`id_arbol`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `clientes_notas` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
