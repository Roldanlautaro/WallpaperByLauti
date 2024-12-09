-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2024 a las 20:58:31
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
-- Base de datos: `wallpaper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `tipo_fondo` int(1) NOT NULL,
  `filtro` varchar(15) NOT NULL,
  `foto_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_usuario`, `titulo`, `tipo_fondo`, `filtro`, `foto_path`) VALUES
(1, 4, 'foto', 1, 'Animales', 'cat-grande.jpg'),
(2, 4, 'foto', 1, 'Peliculas', 'deadpool-grande.jpg'),
(3, 4, 'foto', 1, 'Animales', 'gloomy-grande.jpg'),
(4, 4, 'foto', 1, 'Peliculas', 'gwenpool-grande.jpg'),
(5, 4, 'foto', 1, 'Anime', 'itadori-grande.jpg'),
(6, 4, 'foto', 1, 'Series', 'jake-grande.jpg'),
(7, 4, 'foto', 1, 'Anime', 'one-piece-grande.jpg'),
(8, 4, 'foto', 1, 'Paisajes', 'sky-granden.jpg'),
(9, 4, 'foto', 0, 'Videojuegos', 'darksouls-desktop.jpg'),
(10, 4, 'foto', 0, 'Anime', 'deku-desktop.jpg'),
(11, 4, 'foto', 0, 'Anime', 'luffy-desktop.jpg'),
(12, 4, 'foto', 0, 'Paisajes', 'montaña-desktop.jpg'),
(13, 4, 'foto', 0, 'Peliculas', 'spiderman-desktop.jpg'),
(14, 4, 'foto', 0, 'Peliculas', 'starwars-desktop.jpg'),
(15, 4, 'foto', 0, 'Anime', 'tanjiro-desktop.jpg'),
(16, 4, 'foto', 0, 'Peliculas', 'venom-desktop.jpg'),
(25, 4, 'test', 1, 'Paisajes', 'd6c5920b724c36800351f455ab36937b.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `tipo_usuario` int(1) NOT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `tipo_usuario`, `foto_perfil`) VALUES
(1, 'admin', 'admin1', 1, NULL),
(2, 'mate123', '123', 0, NULL),
(3, 'mate144', 'pinamar', 0, NULL),
(4, 'lautaro', 'hola123', 0, 'imgs/imgs_perfil/4e769258cb9fed3628c53110cfdcd236cf734fd6_full.jpg'),
(5, 'preuba', '123', 0, NULL),
(6, 'prueba2', '1234', 0, NULL),
(7, 'prueba3', '123', 0, NULL),
(8, 'prueba5', 'holahola1', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
