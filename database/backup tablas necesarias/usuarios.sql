-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2022 a las 17:25:32
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `zgroup`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(700) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contraseña` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ultimo_acceso` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `apellidos`, `nombres`, `activo`, `admin`, `correo`, `contraseña`, `ultimo_acceso`, `created_at`, `updated_at`) VALUES
(1, 'ztracer', '-', 'ZTrackTracer', 1, 0, '-', 'ztrack2020\r', NULL, NULL, NULL),
(2, 'jzabarburu', 'Zabarburu', 'Jose', 1, 0, '-', '12345\r', NULL, NULL, NULL),
(3, 'rrodriguez', 'Rodriguez', 'Ricardo', 1, 0, '-', '12345\r', NULL, NULL, NULL),
(4, 'wbujaico', 'Bujaico', 'Wilmer', 1, 0, '-', '12345\r', NULL, NULL, NULL),
(5, 'vsoluciones', '-', 'VSOLUCIONES', 1, 0, '-', 'vsol2020\r', NULL, NULL, NULL),
(6, 'coditev', '-', 'CODITEV', 1, 0, '-', 'cod2020\r', NULL, NULL, NULL),
(7, 'ransa', '-', 'RANSA', 1, 0, '-', 'ran2020\r', NULL, NULL, NULL),
(8, 'viticola', '-', 'Vit?cola', 1, 0, '-', 'vit2021\r', NULL, NULL, NULL),
(9, 'mmatumay', 'Matumay', 'Mario', 1, 0, '-', '12345\r', NULL, NULL, NULL),
(10, 'madurador1', '-', 'Madurador1', 1, 0, '-', '12345\r', NULL, NULL, NULL),
(11, 'properusasc', '-', 'Procesadora Peru SAC', 1, 0, '-', 'pps12345\r', NULL, NULL, NULL),
(12, 'properusac', '-', 'Procesadora Peru SAC', 1, 0, '-', 'pro2021\r', NULL, NULL, NULL),
(13, 'mebolgf', '-', 'MEBOLGF', 1, 0, '-', 'meb2021\r', NULL, NULL, NULL),
(14, 'apeel', 'apeel', 'apeel', 1, 0, '-', 'apeel2021\r', NULL, NULL, NULL),
(15, 'apeelperu', '-', 'apeel', 1, 0, '-', 'apeel2021\r', NULL, NULL, NULL),
(16, 'Florent ', '-', 'Florent ', 1, 0, '-', '123456\r', NULL, NULL, NULL),
(17, 'agromar', '-', 'agromar', 1, 0, '-', 'agromar2021\r', NULL, NULL, NULL),
(18, 'proarandanos', '-', 'proarandanos', 1, 0, '-', 'pro2021\r', NULL, NULL, NULL),
(19, 'san fernando', '-', 'san fernando', 1, 0, '-', 'san2021\r', NULL, NULL, NULL),
(20, 'gandules', '-', 'Gandules', 1, 0, '-', 'gan2021\r', NULL, NULL, NULL),
(21, 'mario', 'zgroup', 'zgroup', 1, 0, '-', '123456\r', NULL, NULL, NULL),
(22, 'ZGROUP', 'ZGROUP', 'ZGROUP|', 1, 0, '-', '123456\r', NULL, NULL, NULL),
(23, 'Inkafrut', 'Inkafrut', 'Inkafrut', 1, 0, '-', 'inkafrut8\r', NULL, NULL, NULL),
(24, 'dpworld', 'dpworld', 'dpworld', 1, 0, '-', 'dp2021\r', NULL, NULL, NULL),
(25, 'CENCOSUD', '-', 'CENCOSUD', 1, 0, '-', 'cencosud\r', NULL, NULL, NULL),
(26, 'fralch', 'cairampoma', 'frank', 1, 1, 'ingfralch@gmail.com', 'siempree08', '2022-03-07 16:15:08', NULL, '2022-03-07 21:15:08'),
(37, 'USUARIO_PRUEBA', 'DDDDDDDDD', 'FFFFFFFFFFF', 1, 0, 'GGGGGGGGG', '12345', NULL, '2022-02-28 07:01:25', '2022-02-28 07:01:25');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
