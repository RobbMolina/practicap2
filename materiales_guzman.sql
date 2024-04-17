-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2023 a las 02:10:21
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `materiales guzman`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `restarStock` (IN `Cod` INT, IN `Cant` INT)   BEGIN
	UPDATE inventario set Cantidad = Cantidad-Cant WHERE Codigo = Cod;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Nombre_producto` varchar(100) NOT NULL,
  `Codigo` int(60) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Precio_compra` int(60) NOT NULL,
  `Precio_venta` int(60) NOT NULL,
  `Categoria` varchar(60) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Nombre_producto`, `Codigo`, `Descripcion`, `Precio_compra`, `Precio_venta`, `Categoria`, `Cantidad`) VALUES
('Frenos', 8237, 'sdfasdf', 12, 23, 'carros', 8),
('Rines', 123984, 'Rines de carro', 60, 70, 'carros', 1),
('Radiador', 1273, 'sfasfsdafdsaf', 100, 200, 'carros', -3),
('Balatas', 9236, 'Balatas para carro', 2000, 2700, 'carros', 8),
('llantas', 12345, 'afsdfsdf', 45, 85, 'carros', 128),
('Aceite', 1093, 'Aceite de carro', 20, 25, 'carros', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `servicio` varchar(100) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `fecha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `servicio`, `producto`, `precio`, `fecha`) VALUES
(2, 'Cambio de aceite', 'Aceite', 50, '2023-05-22'),
(3, 'cambio de aceite', 'Aceite', 40, '2023-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `jerarquia` int(11) DEFAULT NULL,
  `nombres` varchar(60) DEFAULT NULL,
  `apellidos` varchar(60) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `usuario`, `contraseña`, `jerarquia`, `nombres`, `apellidos`, `correo`, `telefono`) VALUES
(5, 'robb', '123', 3, 'Jose Roberto', 'Molina Duran', 'jose.molina@iest.edu.mx', '8332802613'),
(6, 'jumbo', '456', 2, 'Juan Pablo', 'Salinas Barreda', 'juanpablo.salinas@iest.edu.mx', '8332045822'),
(7, 'zangetsu', '789', 1, 'Alejandro', 'Lozano Guzman', 'alejandro.lozano@iest.edu.mx', '8335441774');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `Nombre_producto` varchar(100) NOT NULL,
  `Codigo` int(60) NOT NULL,
  `Precio_venta` int(60) NOT NULL,
  `Cantidad` int(200) NOT NULL,
  `Fecha` int(11) NOT NULL,
  `ID_venta` int(60) NOT NULL,
  `total` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`Nombre_producto`, `Codigo`, `Precio_venta`, `Cantidad`, `Fecha`, `ID_venta`, `total`) VALUES
('llantas', 12345, 85, 7, 2023, 27, 595),
('Radiador', 1273, 200, 3, 2023, 28, 600),
('Radiador', 1273, 200, 4, 2023, 29, 800);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`ID_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `ID_venta` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
