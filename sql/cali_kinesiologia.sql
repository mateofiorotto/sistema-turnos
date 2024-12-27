-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-12-2024 a las 17:46:48
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cali_kinesiologia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `fecha_turno` datetime NOT NULL,
  `creacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id`, `id_usuario`, `fecha_turno`, `creacion`) VALUES
(37, 3, '2024-12-31 12:00:00', '2024-12-27 13:37:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(32) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `telefono` bigint(20) UNSIGNED NOT NULL,
  `rol` enum('admin','usuario') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `nombre_completo`, `contrasena`, `telefono`, `rol`) VALUES
(3, 'mateofiorotto', 'Mateo Fiorotto', '$2y$10$57pEuNKVpy3AsZcEY06hTeTCtDVak6RdvHx442t5FG1hkY7ZIJMN.', 54911232121, 'admin'),
(4, 'carlos', 'Carlos Rivera', '$2y$10$cjFWEo3IKpPDfXl2XL6AfOVHd5/.103s/fJCGd01XYEatCkwz3U96', 34461021, 'usuario'),
(8, 'santiago', 'Santiago Donde', '$2y$10$RpKlaiFjhKqVBKiTVn7wfey04pevixxFsL4CFywsudw6MpsI5iCG6', 3123, 'usuario'),
(10, 'hola', 'hola', '$2y$10$0koxn6dMNr6l1to2QnI0xugsi1yZcENbvmX4PNK1WdB.tAjSRWMLK', 3434, 'usuario'),
(11, 'dfsafad', 'dafadf', '$2y$10$5LJYdjcJqt/e2Iig8.nz.e0IYdPWLbNOI3KKRz33fgTOCNy3RL7iu', 3232, 'usuario'),
(12, 'carlos1', 'Lucas Rodriguez', '$2y$10$P.l/GZ77jzwLecIuXELleuLPnrLMEgWHo6ihPEpjnuJG3hzWfR4ta', 3, 'usuario'),
(13, 'h', 'h', '$2y$10$gZERLWUgK0SGgnWzEbowN.OQRItnkXFUj2tAsJ6ZaYi77Eu/CIMam', 3, 'usuario'),
(14, 'a', 'a', '$2y$10$O7EMZnEw/Abf34OCMe0iKOB/1nzXpAb0HZECOLYXr9q1gZPM.LiSy', 3, 'usuario'),
(15, 'd', 'd', '$2y$10$9b.f08KmC8up97Gf2DGGZu5TmOcQFmWgcd8qZTqc/I.fBig0e3sv6', 3, 'usuario'),
(16, 'araceli', 'Araceli Ortiz Marie Tempel', '$2y$10$StMLTPVwBw9o4RD7nx6iEemH3k3UFoUnlNEQ.h5BTawIgnTA7idzS', 123, 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
