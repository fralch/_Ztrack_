-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2022 a las 17:25:42
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
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_evento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_evento_ingles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `nombre_evento`, `nombre_evento_ingles`, `created_at`, `updated_at`) VALUES
(1, 'Voltaje bajo de la bateria', 'BAT. VOLTAGE LOW\r', NULL, NULL),
(2, 'Fallo de las entradas digitales', 'DIGITAL INPUT FAILURE\r', NULL, NULL),
(3, 'Voltaje de salida inferior a 180 V', 'OUTPUT VOLTAGE < 180 V\r', NULL, NULL),
(4, 'Filtro de aire bloqueado', 'AIR FILTER BLOCKED\r', NULL, NULL),
(5, 'Nivel de liquido refrigerante bajo', 'COOLANT LEVEL LOW\r', NULL, NULL),
(6, 'Frecuencia de salida baja', 'OUTPUT FREQUENCY LOW\r', NULL, NULL),
(7, 'Frecuencia de salida alta', 'OUTPUT FREQUENCY HIGH\r', NULL, NULL),
(8, 'Bajo nivel de aceite', 'LOW OIL LEVEL\r', NULL, NULL),
(9, 'El contador horario 1 ha superado el limite', 'HOUR METER 1 HAS EXCEEDED THRESHOLD\r', NULL, NULL),
(10, 'El contador horario 2 ha superado el limite', 'HOUR METER 2 HAS EXCEEDED THRESHOLD\r', NULL, NULL),
(11, 'Nivel bajo de combustible', 'FUEL LEVEL LOW\r', NULL, NULL),
(12, 'Fallo del sensor de r.p.m. del motor', 'ENGINE RPM SENSOR FAILURE\r', NULL, NULL),
(13, 'Fallo del sensor de la temperatura del agua', 'WATER TEMPERATURE SENSOR FAILURE\r', NULL, NULL),
(14, 'Baja presion del aceite', 'LOW OIL PRESSURE\r', NULL, NULL),
(15, 'Fallo de realimentacion del rele de precalentamien', 'RL6 (AIRHEAT) FEEDBACK FAILURE\r', NULL, NULL),
(16, 'Ha expirado el temporizador de cuenta atras', 'COUNTDOWN TIMER HAS EXPIRED\r', NULL, NULL),
(17, 'Presion del aceite alta cuando el motor no esta en', 'OIL PRESSURE HIGH WHILE ENG. IS NOT RUNNING\r', NULL, NULL),
(18, 'Fallo del presostato de presion del aceite', 'OIL PRESSURE SWITCH FAILURE\r', NULL, NULL),
(19, 'Temperatura del agua alta', 'WATER TEMPERATURE HIGH\r', NULL, NULL),
(20, 'El motor no arranca', 'ENGINE FAILED TO CRANK\r', NULL, NULL),
(21, 'El motor no se pone en marcha', 'ENGINE FAILED TO START\r', NULL, NULL),
(22, 'Sobrecarga externa', 'EXTERNAL OVERLOAD\r', NULL, NULL),
(23, 'Motor parado por un motivo desconocido', 'ENGINE STOPPED REASON UNKNOWN\r', NULL, NULL),
(24, 'Sin carga, r.p.m. inferiores a 1.530', 'NO LOAD RPM LESS THAN 1530\r', NULL, NULL),
(25, 'Fallo de realimentacion del rele de la valvula sol', 'RL3 (SPEED SOLENOID) FEEDBACK FAILURE\r', NULL, NULL),
(26, 'Sensor del nivel de combustible fuera de rango', 'FUEL LEVEL SENSOR OUT OF RANGE\r', NULL, NULL),
(27, 'El nivel de combustible se redujo demasiado r?pido', 'FUEL LEVEL DECREASED TO FAST\r', NULL, NULL),
(28, 'Fallo de la v?lvula solenoide de velocidad', 'SPEED SOLENOID FAILURE\r', NULL, NULL),
(29, 'R.p.m. por debajo del l?mite', 'RPM BELOW LIMIT\r', NULL, NULL),
(30, 'Tiempo de espera agotado para la salida retrasada', 'DELAYED OUTPUT TIMED OUT\r', NULL, NULL),
(31, 'Fallo de realimentaci?n del rel? de arranque RL5', 'RL5 (STARTER) FEEDBACK FAILURE\r', NULL, NULL),
(32, 'Sobrecarga interna', 'INTERNAL OVERLOAD\r', NULL, NULL),
(33, 'Apagado de la unidad de control del excitador', 'EXCITER CONTROL UNIT SHUTDOWN\r', NULL, NULL),
(34, 'Bajo voltaje de excitaci?n	LOW EXCITATION VOLTAGE\r', '', NULL, NULL),
(35, 'Apagado de la unidad de control del motor', 'ENGINE CONTROL UNIT SHUTDOWN\r', NULL, NULL),
(36, 'Luz indicadora de fallo de funcionamiento del moto', 'ENGINE MALFUNCTION INDICATOR LAMP\r', NULL, NULL),
(37, 'Advertencia de la suma de comprobaci?n del DSR', 'DSR CHECKSUM WARNING\r', NULL, NULL),
(38, 'Advertencia de cortocircuito en el DSR', 'DSR SHORT CIRCUIT WARNING\r', NULL, NULL),
(39, 'Advertencia de sobrecorriente de excitaci?n en el ', 'DSR EXCITATION OVERCURRENT WARNING\r', NULL, NULL),
(40, 'Evento del DSR', 'DSR EVENT\r', NULL, NULL),
(41, 'Advertencia de velocidad del DSR', 'DSR SPEED WARNING\r', NULL, NULL),
(42, 'Voltaje de salida alto', 'OUTPUT VOLTAGE HIGH\r', NULL, NULL),
(43, 'Protecci?n del excitador activada', 'EXCITER PROTECTION ACTIVATED\r', NULL, NULL),
(44, 'Fallo del ventilador del l?quido refrigerante', 'COOLANT FAN FAILURE\r', NULL, NULL),
(45, 'Informaci?n sobre el c?digo P del motor', 'ENGINE P-CODE INFO\r', NULL, NULL),
(46, 'Caduc? la correa de distribuci?n	TIMING BELT EXPIRED\r', '', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
