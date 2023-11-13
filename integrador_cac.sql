-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2023 a las 00:24:10
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
-- Base de datos: `integrador_cac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oradores`
--

CREATE TABLE `oradores` (
  `id_orador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `oradores`
--

INSERT INTO `oradores` (`id_orador`, `nombre`, `apellido`, `mail`, `tema`, `fecha_alta`) VALUES
(1, 'Steve', 'Jobs', 'stevejobs@apple.com', 'Sobre javascript', '2023-11-12 20:05:31'),
(2, 'Bill', 'Gates', 'billgates@microsoft.com', 'Sobre javascript', '2023-11-12 20:09:17'),
(3, 'Ada', 'Lovelace', 'adalovelace@gmail.com', 'Sobre startup', '2023-11-12 20:12:04'),
(4, 'Juan', 'Gomes', 'jgomes@gmail.com', 'Sobre bootstrap', '2023-11-12 20:12:04'),
(5, 'Ivan', 'gonzales', 'ivangonz@gmail.com', 'Sobre react', '2023-11-12 20:17:44'),
(6, 'Adriana', 'Perez', 'adri.perez@gmail.com', 'Sobre typescript', '2023-11-12 20:17:44'),
(7, 'Matias', 'Centurion', 'maticenturion@gmail.com', 'Sobre angular', '2023-11-12 20:17:44'),
(8, 'Luca', 'Martinez', 'martinezluca@gmail.com', 'Sobre php', '2023-11-12 20:17:44'),
(9, 'Milagros', 'Salinas', 'milisalinas@gmail.com', 'Sobre java', '2023-11-12 20:17:44'),
(10, 'Santiago', 'Lopez', 'san_tiagolopez@gmail.com', 'Sobre ruby', '2023-11-12 20:17:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `oradores`
--
ALTER TABLE `oradores`
  ADD PRIMARY KEY (`id_orador`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oradores`
--
ALTER TABLE `oradores`
  MODIFY `id_orador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
