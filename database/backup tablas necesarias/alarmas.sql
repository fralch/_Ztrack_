-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2022 a las 17:25:25
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
-- Estructura de tabla para la tabla `alarmas`
--

CREATE TABLE `alarmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_alarma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_alarma_ingles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alarmas`
--

INSERT INTO `alarmas` (`id`, `nombre_alarma`, `nombre_alarma_ingles`, `created_at`, `updated_at`) VALUES
(1, 'Temperatura del agua alta', 'WATER TEMPERATURE HIGH\r', NULL, NULL),
(2, 'Error durante el arranque', 'FAILED TO CRANK\r', NULL, NULL),
(3, 'Error durante la puesta en marcha', 'FAILED TO START \r', NULL, NULL),
(4, 'Fallo de realimentacion del rele de mantenimiento ', 'RL2 (FUEL H) FEEDBACK FAILURE\r', NULL, NULL),
(5, 'Fallo de realimentacion del rele de atraccion del ', 'RL1 (FUEL P) FEEDBACK FAILURE\r', NULL, NULL),
(6, 'Fallo de realimentacion del rele de arranque RL5', 'RL5 (STARTER) FEEDBACK FAILURE\r', NULL, NULL),
(7, 'Sobrecarga externa', 'EXTERNAL OVERLOAD\r', NULL, NULL),
(8, 'El motor no funciona por un motivo desconocido', 'ENGINE NOT RUNNING REASON UNKNOWN\r', NULL, NULL),
(9, 'Bajo nivel de aceite', 'LOW OIL LEVEL\r', NULL, NULL),
(10, 'R.p.m. por debajo del limite', 'RPM BELOW LIMIT\r', NULL, NULL),
(11, 'Error durante la puesta en marcha por una carga ba', 'FAILED TO START LOW BATTERY\r', NULL, NULL),
(12, 'Fallo del sensor de la temperatura del agua', 'WATER TEMPERATURE SENSOR FAILURE\r', NULL, NULL),
(13, 'Nivel de liquido refrigerante bajo', 'COOLANT LEVEL LOW\r', NULL, NULL),
(14, 'Sobrecarga interna', 'INTERNAL OVERLOAD\r', NULL, NULL),
(15, 'Apagado de la unidad de control del excitado', 'EXCITER CONTROL UNIT SHUTDOWN\r', NULL, NULL),
(16, 'Apagado de la unidad de control del motor', 'ENGINE CONTROL UNIT SHUTDOWN\r', NULL, NULL),
(17, 'Bajo voltaje de excitacion\n', 'LOW EXCITATION VOLTAGE', NULL, NULL),
(18, 'Baja presion del aceite', 'LOW OIL PRESSURE\r', NULL, NULL),
(19, 'Voltaje de salida alto', 'OUTPUT VOLTAGE HIGH\r', NULL, NULL),
(20, 'Error de la unidad del generador', 'GENERATOR UNIT ERROR\r', NULL, NULL),
(21, 'Fallo del ventilador del liquido refrigerante', 'COOLANT FAN FAILURE\r', NULL, NULL),
(22, 'Deposito de combustible vacio', 'FUEL TANK EMPTY\r', NULL, NULL),
(23, 'Caduco la correa de distribucion\n', 'TIMING BELT EXPIRED', NULL, NULL),
(24, 'Fallo de la frecuencia de salida', 'OUTPUT FREQUENCY FAILURE\r', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alarmas`
--
ALTER TABLE `alarmas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alarmas`
--
ALTER TABLE `alarmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
