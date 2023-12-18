-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2023 at 09:21 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto_integrador_cac`
--

-- --------------------------------------------------------

--
-- Table structure for table `oradores`
--

CREATE TABLE `oradores` (
  `id_orador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_alta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` varchar(255) NOT NULL,
  `categorias` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oradores`
--

INSERT INTO `oradores` (`id_orador`, `nombre`, `apellido`, `mail`, `tema`, `descripcion`, `fecha_alta`, `imagen`, `categorias`) VALUES
(1, 'Jonathan', 'Mircha', 'jmircha@gmail.com', 'Introduccion a las \"Progressive web apps\"', 'Las PWAs (Progressive Web Apps) están cambiando la forma en que interactuamos en la web. Descubre como fusionan velocidad web con funciones de aplicaciones nativas.', '2023-12-10 09:52:29', 'jon-mircha.webp', 'javascript,css'),
(2, 'Carmen', 'Ansio', 'carmen-ansio@gmail.com', 'Desarrollo de modelos creados en Figma', 'Explora el desarrollo práctico de diseños desde Figma. Aprende a dar vida a tus modelos en una charla que revela los secretos detrás de la creación y ejecución efectiva.', '2023-12-10 10:00:10', 'carmen-ansio.webp', 'figma,html,css'),
(3, 'Kevin', 'Powell', 'kevin-powell@gmail.com', 'Las novedades en CSS4', 'Explora las últimas innovaciones con CSS4. Desde nuevas propiedades hasta mejoras en diseño responsivo, esta charla destaca las funciones que están dando forma al futuro del estilo web.', '2023-12-10 10:01:38', 'kevin-powell.webp', 'css,html'),
(4, 'Brais', 'Moure', 'mouredev@gmail.com', 'PHP para principiantes', 'Inicia tu viaje en el desarrollo web con PHP. Esta charla introduce los conceptos básicos y necesarios para la creación de tu primer script.', '2023-12-10 10:03:31', 'mouredev.webp', 'php,laravel'),
(5, 'Miguel', 'Duran', 'midu@gmail.com', 'Control de versiones con GIT', 'Desde la clonación hasta el commit, esta charla te guiará en el uso efectivo de GIT para gestionar y rastrear cambios en tus proyectos.', '2023-12-10 10:05:54', 'midudev.webp', 'git,github'),
(6, 'Victor', 'Robles', 'victor.robles@gmail.com', 'Desarrollo web con Angular', 'Descubre Angular, el potente framework para desarrollo web. Esta charla te llevará a través de los fundamentos para construir aplicaciones web modernas.', '2023-12-10 10:13:49', 'victor-robles.webp', 'angular,javascript'),
(7, 'Gonzalo', 'Pozzo', 'goncy@gmail.com', 'Documenta correctamente tu repositorio', 'Descubre cómo una documentación clara y estructurada puede potenciar tu proyecto y hacer que sea más accesible para colaboradores y usuarios. ¡Aprende a optimizar tus proyectos en GitHub con técnicas efectivas de documentación!', '2023-12-15 17:19:02', '1702671542_goncy.webp', 'github,markdown'),
(8, 'Oscar', 'Uh', 'oscaruh@gmail.com', 'Diseño de plantillas personalizadas en Wordpress', ' Descubre cómo crear plantillas personalizadas que transformarán la apariencia de tus sitios web. Desde lo básico hasta técnicas avanzadas, esta charla te guiará en el camino para destacar en el diseño web con WordPress', '2023-12-15 17:27:54', '1702672074_oscaruh.webp', 'php,wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rol` enum('administrador','cliente') DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `correo`, `password`, `fecha_registro`, `rol`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$OAzeBV0PVtcDuOveeLUraeWd9TmN9TDXJyxQJE00MCaiOdx7I.eW.', '2023-12-16 23:02:56', 'administrador'),
(2, 'fulanito', 'fulanito@gmail.com', '$2y$10$EsHh4lpEzGUADssM3J3YLuwQMPcf0Ih5Js26AP8ghewh4/JMO0IDa', '2023-12-18 16:18:17', 'cliente'),
(4, 'julian', 'julian@gmail.com', '$2y$10$.nIQSEPFopxnaC8B29rDsOTKrvecUJCpJzAVBWu2lIXgyexAUm6O6', '2023-12-18 21:16:52', 'cliente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oradores`
--
ALTER TABLE `oradores`
  ADD PRIMARY KEY (`id_orador`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `oradores`
--
ALTER TABLE `oradores`
  MODIFY `id_orador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
