-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-07-2017 a las 20:37:16
-- Versión del servidor: 10.0.30-MariaDB-0+deb8u2
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `TDW`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE IF NOT EXISTS `games` (
`id` int(10) unsigned NOT NULL,
  `idUser` int(10) unsigned NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `gameBoard` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `idUser`, `score`, `gameBoard`, `created_at`, `updated_at`) VALUES
(16, 7, 45, '{"custom":false,"Latitudes":{"row1":{"idGb":"row1","posiciones":[{"id":"b11","pos":"uno","state":"vacio"},{"id":"b12","pos":"dos","state":"vacio"},{"id":"b13","pos":"tres","state":"imagen"},{"id":"b14","pos":"cuatro","state":"imagen"},{"id":"b15","pos":"cinco","state":"imagen"},{"id":"b16","pos":"seis","state":"vacio"},{"id":"b17","pos":"siete","state":"vacio"}]},"row2":{"idGb":"row2","posiciones":[{"id":"b21","pos":"uno","state":"vacio"},{"id":"b22","pos":"dos","state":"vacio"},{"id":"b23","pos":"tres","state":"imagen"},{"id":"b24","pos":"cuatro","state":"imagen"},{"id":"b25","pos":"cinco","state":"imagen"},{"id":"b26","pos":"seis","state":"vacio"},{"id":"b27","pos":"siete","state":"vacio"}]},"row3":{"idGb":"row3","posiciones":[{"id":"b31","pos":"uno","state":"imagen"},{"id":"b32","pos":"dos","state":"imagen"},{"id":"b33","pos":"tres","state":"hueco"},{"id":"b34","pos":"cuatro","state":"imagen"},{"id":"b35","pos":"cinco","state":"imagen"},{"id":"b36","pos":"seis","state":"imagen"},{"id":"b37","pos":"siete","state":"imagen"}]},"row4":{"idGb":"row4","posiciones":[{"id":"b41","pos":"uno","state":"imagen"},{"id":"b42","pos":"dos","state":"imagen"},{"id":"b43","pos":"tres","state":"hueco"},{"id":"b44","pos":"cuatro","state":"imagen"},{"id":"b45","pos":"cinco","state":"imagen"},{"id":"b46","pos":"seis","state":"imagen"},{"id":"b47","pos":"siete","state":"imagen"}]},"row5":{"idGb":"row5","posiciones":[{"id":"b51","pos":"uno","state":"imagen"},{"id":"b52","pos":"dos","state":"hueco"},{"id":"b53","pos":"tres","state":"imagen"},{"id":"b54","pos":"cuatro","state":"imagen"},{"id":"b55","pos":"cinco","state":"imagen"},{"id":"b56","pos":"seis","state":"imagen"},{"id":"b57","pos":"siete","state":"imagen"}]},"row6":{"idGb":"row6","posiciones":[{"id":"b61","pos":"uno","state":"vacio"},{"id":"b62","pos":"dos","state":"vacio"},{"id":"b63","pos":"tres","state":"imagen"},{"id":"b64","pos":"cuatro","state":"hueco"},{"id":"b65","pos":"cinco","state":"imagen"},{"id":"b66","pos":"seis","state":"vacio"},{"id":"b67","pos":"siete","state":"vacio"}]},"row7":{"idGb":"row7","posiciones":[{"id":"b71","pos":"uno","state":"vacio"},{"id":"b72","pos":"dos","state":"vacio"},{"id":"b73","pos":"tres","state":"imagen"},{"id":"b74","pos":"cuatro","state":"imagen"},{"id":"b75","pos":"cinco","state":"imagen"},{"id":"b76","pos":"seis","state":"vacio"},{"id":"b77","pos":"siete","state":"vacio"}]}},"previous":null,"current":{"id":"b53","pos":"tres","state":"imagen"},"timer":-1,"time":true,"score":45}', '2017-07-05 09:26:32', '2017-07-05 16:34:56'),
(17, 8, 15, '{"custom":false,"Latitudes":{"row1":{"idGb":"row1","posiciones":[{"id":"b11","pos":"uno","state":"vacio"},{"id":"b12","pos":"dos","state":"vacio"},{"id":"b13","pos":"tres","state":"imagen"},{"id":"b14","pos":"cuatro","state":"imagen"},{"id":"b15","pos":"cinco","state":"imagen"},{"id":"b16","pos":"seis","state":"vacio"},{"id":"b17","pos":"siete","state":"vacio"}]},"row2":{"idGb":"row2","posiciones":[{"id":"b21","pos":"uno","state":"vacio"},{"id":"b22","pos":"dos","state":"vacio"},{"id":"b23","pos":"tres","state":"imagen"},{"id":"b24","pos":"cuatro","state":"imagen"},{"id":"b25","pos":"cinco","state":"imagen"},{"id":"b26","pos":"seis","state":"vacio"},{"id":"b27","pos":"siete","state":"vacio"}]},"row3":{"idGb":"row3","posiciones":[{"id":"b31","pos":"uno","state":"imagen"},{"id":"b32","pos":"dos","state":"imagen"},{"id":"b33","pos":"tres","state":"imagen"},{"id":"b34","pos":"cuatro","state":"imagen"},{"id":"b35","pos":"cinco","state":"imagen"},{"id":"b36","pos":"seis","state":"imagen"},{"id":"b37","pos":"siete","state":"imagen"}]},"row4":{"idGb":"row4","posiciones":[{"id":"b41","pos":"uno","state":"imagen"},{"id":"b42","pos":"dos","state":"imagen"},{"id":"b43","pos":"tres","state":"imagen"},{"id":"b44","pos":"cuatro","state":"imagen"},{"id":"b45","pos":"cinco","state":"imagen"},{"id":"b46","pos":"seis","state":"imagen"},{"id":"b47","pos":"siete","state":"imagen"}]},"row5":{"idGb":"row5","posiciones":[{"id":"b51","pos":"uno","state":"imagen"},{"id":"b52","pos":"dos","state":"imagen"},{"id":"b53","pos":"tres","state":"imagen"},{"id":"b54","pos":"cuatro","state":"hueco"},{"id":"b55","pos":"cinco","state":"imagen"},{"id":"b56","pos":"seis","state":"imagen"},{"id":"b57","pos":"siete","state":"imagen"}]},"row6":{"idGb":"row6","posiciones":[{"id":"b61","pos":"uno","state":"vacio"},{"id":"b62","pos":"dos","state":"vacio"},{"id":"b63","pos":"tres","state":"imagen"},{"id":"b64","pos":"cuatro","state":"hueco"},{"id":"b65","pos":"cinco","state":"imagen"},{"id":"b66","pos":"seis","state":"vacio"},{"id":"b67","pos":"siete","state":"vacio"}]},"row7":{"idGb":"row7","posiciones":[{"id":"b71","pos":"uno","state":"vacio"},{"id":"b72","pos":"dos","state":"vacio"},{"id":"b73","pos":"tres","state":"imagen"},{"id":"b74","pos":"cuatro","state":"imagen"},{"id":"b75","pos":"cinco","state":"imagen"},{"id":"b76","pos":"seis","state":"vacio"},{"id":"b77","pos":"siete","state":"vacio"}]}},"previous":null,"current":{"id":"b44","pos":"cuatro","state":"imagen"},"timer":-1,"time":true,"score":15}', '2017-07-05 09:38:29', '2017-07-05 11:53:08'),
(18, 8, 15, '{"custom":false,"Latitudes":{"row1":{"idGb":"row1","posiciones":[{"id":"b11","pos":"uno","state":"vacio"},{"id":"b12","pos":"dos","state":"vacio"},{"id":"b13","pos":"tres","state":"imagen"},{"id":"b14","pos":"cuatro","state":"imagen"},{"id":"b15","pos":"cinco","state":"imagen"},{"id":"b16","pos":"seis","state":"vacio"},{"id":"b17","pos":"siete","state":"vacio"}]},"row2":{"idGb":"row2","posiciones":[{"id":"b21","pos":"uno","state":"vacio"},{"id":"b22","pos":"dos","state":"vacio"},{"id":"b23","pos":"tres","state":"imagen"},{"id":"b24","pos":"cuatro","state":"imagen"},{"id":"b25","pos":"cinco","state":"imagen"},{"id":"b26","pos":"seis","state":"vacio"},{"id":"b27","pos":"siete","state":"vacio"}]},"row3":{"idGb":"row3","posiciones":[{"id":"b31","pos":"uno","state":"imagen"},{"id":"b32","pos":"dos","state":"imagen"},{"id":"b33","pos":"tres","state":"imagen"},{"id":"b34","pos":"cuatro","state":"imagen"},{"id":"b35","pos":"cinco","state":"imagen"},{"id":"b36","pos":"seis","state":"imagen"},{"id":"b37","pos":"siete","state":"imagen"}]},"row4":{"idGb":"row4","posiciones":[{"id":"b41","pos":"uno","state":"imagen"},{"id":"b42","pos":"dos","state":"imagen"},{"id":"b43","pos":"tres","state":"imagen"},{"id":"b44","pos":"cuatro","state":"imagen"},{"id":"b45","pos":"cinco","state":"imagen"},{"id":"b46","pos":"seis","state":"imagen"},{"id":"b47","pos":"siete","state":"imagen"}]},"row5":{"idGb":"row5","posiciones":[{"id":"b51","pos":"uno","state":"imagen"},{"id":"b52","pos":"dos","state":"imagen"},{"id":"b53","pos":"tres","state":"imagen"},{"id":"b54","pos":"cuatro","state":"hueco"},{"id":"b55","pos":"cinco","state":"imagen"},{"id":"b56","pos":"seis","state":"imagen"},{"id":"b57","pos":"siete","state":"imagen"}]},"row6":{"idGb":"row6","posiciones":[{"id":"b61","pos":"uno","state":"vacio"},{"id":"b62","pos":"dos","state":"vacio"},{"id":"b63","pos":"tres","state":"imagen"},{"id":"b64","pos":"cuatro","state":"hueco"},{"id":"b65","pos":"cinco","state":"imagen"},{"id":"b66","pos":"seis","state":"vacio"},{"id":"b67","pos":"siete","state":"vacio"}]},"row7":{"idGb":"row7","posiciones":[{"id":"b71","pos":"uno","state":"vacio"},{"id":"b72","pos":"dos","state":"vacio"},{"id":"b73","pos":"tres","state":"imagen"},{"id":"b74","pos":"cuatro","state":"imagen"},{"id":"b75","pos":"cinco","state":"imagen"},{"id":"b76","pos":"seis","state":"vacio"},{"id":"b77","pos":"siete","state":"vacio"}]}},"previous":null,"current":{"id":"b44","pos":"cuatro","state":"imagen"},"timer":-1,"time":true,"score":15}', '2017-07-05 09:52:40', '2017-07-05 12:02:38'),
(19, 8, 30, '{"custom":false,"Latitudes":{"row1":{"idGb":"row1","posiciones":[{"id":"b11","pos":"uno","state":"vacio"},{"id":"b12","pos":"dos","state":"vacio"},{"id":"b13","pos":"tres","state":"imagen"},{"id":"b14","pos":"cuatro","state":"imagen"},{"id":"b15","pos":"cinco","state":"imagen"},{"id":"b16","pos":"seis","state":"vacio"},{"id":"b17","pos":"siete","state":"vacio"}]},"row2":{"idGb":"row2","posiciones":[{"id":"b21","pos":"uno","state":"vacio"},{"id":"b22","pos":"dos","state":"vacio"},{"id":"b23","pos":"tres","state":"imagen"},{"id":"b24","pos":"cuatro","state":"imagen"},{"id":"b25","pos":"cinco","state":"imagen"},{"id":"b26","pos":"seis","state":"vacio"},{"id":"b27","pos":"siete","state":"vacio"}]},"row3":{"idGb":"row3","posiciones":[{"id":"b31","pos":"uno","state":"imagen"},{"id":"b32","pos":"dos","state":"imagen"},{"id":"b33","pos":"tres","state":"imagen"},{"id":"b34","pos":"cuatro","state":"imagen"},{"id":"b35","pos":"cinco","state":"imagen"},{"id":"b36","pos":"seis","state":"imagen"},{"id":"b37","pos":"siete","state":"imagen"}]},"row4":{"idGb":"row4","posiciones":[{"id":"b41","pos":"uno","state":"imagen"},{"id":"b42","pos":"dos","state":"imagen"},{"id":"b43","pos":"tres","state":"imagen"},{"id":"b44","pos":"cuatro","state":"imagen"},{"id":"b45","pos":"cinco","state":"imagen"},{"id":"b46","pos":"seis","state":"imagen"},{"id":"b47","pos":"siete","state":"imagen"}]},"row5":{"idGb":"row5","posiciones":[{"id":"b51","pos":"uno","state":"imagen"},{"id":"b52","pos":"dos","state":"hueco"},{"id":"b53","pos":"tres","state":"hueco"},{"id":"b54","pos":"cuatro","state":"imagen"},{"id":"b55","pos":"cinco","state":"imagen"},{"id":"b56","pos":"seis","state":"imagen"},{"id":"b57","pos":"siete","state":"imagen"}]},"row6":{"idGb":"row6","posiciones":[{"id":"b61","pos":"uno","state":"vacio"},{"id":"b62","pos":"dos","state":"vacio"},{"id":"b63","pos":"tres","state":"imagen"},{"id":"b64","pos":"cuatro","state":"hueco"},{"id":"b65","pos":"cinco","state":"imagen"},{"id":"b66","pos":"seis","state":"vacio"},{"id":"b67","pos":"siete","state":"vacio"}]},"row7":{"idGb":"row7","posiciones":[{"id":"b71","pos":"uno","state":"vacio"},{"id":"b72","pos":"dos","state":"vacio"},{"id":"b73","pos":"tres","state":"imagen"},{"id":"b74","pos":"cuatro","state":"imagen"},{"id":"b75","pos":"cinco","state":"imagen"},{"id":"b76","pos":"seis","state":"vacio"},{"id":"b77","pos":"siete","state":"vacio"}]}},"previous":null,"current":{"id":"b54","pos":"cuatro","state":"imagen"},"timer":-1,"time":true,"score":30}', '2017-07-05 09:59:17', '2017-07-05 12:05:47'),
(23, 8, 30, '{"custom":false,"Latitudes":{"row1":{"idGb":"row1","posiciones":[{"id":"b11","pos":"uno","state":"vacio"},{"id":"b12","pos":"dos","state":"vacio"},{"id":"b13","pos":"tres","state":"imagen"},{"id":"b14","pos":"cuatro","state":"imagen"},{"id":"b15","pos":"cinco","state":"imagen"},{"id":"b16","pos":"seis","state":"vacio"},{"id":"b17","pos":"siete","state":"vacio"}]},"row2":{"idGb":"row2","posiciones":[{"id":"b21","pos":"uno","state":"vacio"},{"id":"b22","pos":"dos","state":"vacio"},{"id":"b23","pos":"tres","state":"imagen"},{"id":"b24","pos":"cuatro","state":"imagen"},{"id":"b25","pos":"cinco","state":"imagen"},{"id":"b26","pos":"seis","state":"vacio"},{"id":"b27","pos":"siete","state":"vacio"}]},"row3":{"idGb":"row3","posiciones":[{"id":"b31","pos":"uno","state":"imagen"},{"id":"b32","pos":"dos","state":"imagen"},{"id":"b33","pos":"tres","state":"imagen"},{"id":"b34","pos":"cuatro","state":"imagen"},{"id":"b35","pos":"cinco","state":"imagen"},{"id":"b36","pos":"seis","state":"imagen"},{"id":"b37","pos":"siete","state":"imagen"}]},"row4":{"idGb":"row4","posiciones":[{"id":"b41","pos":"uno","state":"imagen"},{"id":"b42","pos":"dos","state":"imagen"},{"id":"b43","pos":"tres","state":"imagen"},{"id":"b44","pos":"cuatro","state":"imagen"},{"id":"b45","pos":"cinco","state":"imagen"},{"id":"b46","pos":"seis","state":"imagen"},{"id":"b47","pos":"siete","state":"imagen"}]},"row5":{"idGb":"row5","posiciones":[{"id":"b51","pos":"uno","state":"imagen"},{"id":"b52","pos":"dos","state":"imagen"},{"id":"b53","pos":"tres","state":"imagen"},{"id":"b54","pos":"cuatro","state":"imagen"},{"id":"b55","pos":"cinco","state":"hueco"},{"id":"b56","pos":"seis","state":"hueco"},{"id":"b57","pos":"siete","state":"imagen"}]},"row6":{"idGb":"row6","posiciones":[{"id":"b61","pos":"uno","state":"vacio"},{"id":"b62","pos":"dos","state":"vacio"},{"id":"b63","pos":"tres","state":"imagen"},{"id":"b64","pos":"cuatro","state":"hueco"},{"id":"b65","pos":"cinco","state":"imagen"},{"id":"b66","pos":"seis","state":"vacio"},{"id":"b67","pos":"siete","state":"vacio"}]},"row7":{"idGb":"row7","posiciones":[{"id":"b71","pos":"uno","state":"vacio"},{"id":"b72","pos":"dos","state":"vacio"},{"id":"b73","pos":"tres","state":"imagen"},{"id":"b74","pos":"cuatro","state":"imagen"},{"id":"b75","pos":"cinco","state":"imagen"},{"id":"b76","pos":"seis","state":"vacio"},{"id":"b77","pos":"siete","state":"vacio"}]}},"previous":null,"current":{"id":"b54","pos":"cuatro","state":"imagen"},"timer":-1,"time":true,"score":30}', '2017-07-05 12:16:16', '2017-07-05 14:22:50'),
(24, 8, 75, '{"custom":false,"Latitudes":{"row1":{"idGb":"row1","posiciones":[{"id":"b11","pos":"uno","state":"vacio"},{"id":"b12","pos":"dos","state":"vacio"},{"id":"b13","pos":"tres","state":"imagen"},{"id":"b14","pos":"cuatro","state":"imagen"},{"id":"b15","pos":"cinco","state":"imagen"},{"id":"b16","pos":"seis","state":"vacio"},{"id":"b17","pos":"siete","state":"vacio"}]},"row2":{"idGb":"row2","posiciones":[{"id":"b21","pos":"uno","state":"vacio"},{"id":"b22","pos":"dos","state":"vacio"},{"id":"b23","pos":"tres","state":"imagen"},{"id":"b24","pos":"cuatro","state":"hueco"},{"id":"b25","pos":"cinco","state":"imagen"},{"id":"b26","pos":"seis","state":"vacio"},{"id":"b27","pos":"siete","state":"vacio"}]},"row3":{"idGb":"row3","posiciones":[{"id":"b31","pos":"uno","state":"imagen"},{"id":"b32","pos":"dos","state":"imagen"},{"id":"b33","pos":"tres","state":"hueco"},{"id":"b34","pos":"cuatro","state":"hueco"},{"id":"b35","pos":"cinco","state":"imagen"},{"id":"b36","pos":"seis","state":"imagen"},{"id":"b37","pos":"siete","state":"imagen"}]},"row4":{"idGb":"row4","posiciones":[{"id":"b41","pos":"uno","state":"imagen"},{"id":"b42","pos":"dos","state":"imagen"},{"id":"b43","pos":"tres","state":"imagen"},{"id":"b44","pos":"cuatro","state":"imagen"},{"id":"b45","pos":"cinco","state":"hueco"},{"id":"b46","pos":"seis","state":"imagen"},{"id":"b47","pos":"siete","state":"imagen"}]},"row5":{"idGb":"row5","posiciones":[{"id":"b51","pos":"uno","state":"imagen"},{"id":"b52","pos":"dos","state":"hueco"},{"id":"b53","pos":"tres","state":"imagen"},{"id":"b54","pos":"cuatro","state":"imagen"},{"id":"b55","pos":"cinco","state":"imagen"},{"id":"b56","pos":"seis","state":"imagen"},{"id":"b57","pos":"siete","state":"imagen"}]},"row6":{"idGb":"row6","posiciones":[{"id":"b61","pos":"uno","state":"vacio"},{"id":"b62","pos":"dos","state":"vacio"},{"id":"b63","pos":"tres","state":"imagen"},{"id":"b64","pos":"cuatro","state":"hueco"},{"id":"b65","pos":"cinco","state":"imagen"},{"id":"b66","pos":"seis","state":"vacio"},{"id":"b67","pos":"siete","state":"vacio"}]},"row7":{"idGb":"row7","posiciones":[{"id":"b71","pos":"uno","state":"vacio"},{"id":"b72","pos":"dos","state":"vacio"},{"id":"b73","pos":"tres","state":"imagen"},{"id":"b74","pos":"cuatro","state":"imagen"},{"id":"b75","pos":"cinco","state":"imagen"},{"id":"b76","pos":"seis","state":"vacio"},{"id":"b77","pos":"siete","state":"vacio"}]}},"previous":null,"current":{"id":"b44","pos":"cuatro","state":"imagen"},"timer":-1,"time":true,"score":75}', '2017-07-05 12:31:04', '2017-07-05 15:57:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
`id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_31_170316_create_games_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nick',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `isEnabled` tinyint(1) NOT NULL DEFAULT '0',
  `isDelete` tinyint(1) NOT NULL DEFAULT '0',
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telf` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '11111',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `nick`, `isAdmin`, `isEnabled`, `isDelete`, `email`, `password`, `telf`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', 'Admin', 1, 1, 0, 'Admin@admin.es', '$2y$10$y5Z.6YtjyTkEqVr36s2hMu7ypL8gfg8zZUGeBDiDRlJ6mT1lv8LSq', '0', 'rd40A572PdPHl7JrVfOxPwskHi7jfUCWri3d2wtBtJNLhAsk5rbw3T9Rp61H', '2017-07-03 14:36:53', '2017-07-05 11:37:41'),
(7, 'Update', 'test', 0, 1, 0, 'test@test.es', '$2y$10$PWDCHJk8vJTMd3scFI8hZuLlkF933KP1VP4Crzxmh7nZ4w7uDF.XG', '11111', 'aLFKxV9YH6YSr3L7YHJ4xbcknPY6hE6pxNuLl5HGxHHAPsLvMoHZfht4V29Y', '2017-07-05 09:16:40', '2017-07-05 16:27:12'),
(8, 'newUser', 'newUser', 0, 1, 0, 'test2@test.es', '$2y$10$Zs7Bqzb.6MDSRRuHUVBs0.PKvJCPFG.Dup/R92GNlqDgFd9f05xAO', '11111', '9FwTYlsYWUFmjnrhmAha0DdfVVIhEZ1YKyETN2xKVAuTtLYDF6bpuZrgQCmX', '2017-07-05 09:33:26', '2017-07-05 16:04:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `games_id_iduser_unique` (`id`,`idUser`), ADD KEY `games_iduser_foreign` (`idUser`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
ADD CONSTRAINT `games_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
