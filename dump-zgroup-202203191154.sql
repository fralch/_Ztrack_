-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: zgroup
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alarmas`
--

DROP TABLE IF EXISTS `alarmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alarmas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_alarma` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_alarma_ingles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alarmas`
--

LOCK TABLES `alarmas` WRITE;
/*!40000 ALTER TABLE `alarmas` DISABLE KEYS */;
INSERT INTO `alarmas` VALUES (1,'Temperatura del agua alta','WATER TEMPERATURE HIGH\r',NULL,NULL),(2,'Error durante el arranque','FAILED TO CRANK\r',NULL,NULL),(3,'Error durante la puesta en marcha','FAILED TO START \r',NULL,NULL),(4,'Fallo de realimentacion del rele de mantenimiento ','RL2 (FUEL H) FEEDBACK FAILURE\r',NULL,NULL),(5,'Fallo de realimentacion del rele de atraccion del ','RL1 (FUEL P) FEEDBACK FAILURE\r',NULL,NULL),(6,'Fallo de realimentacion del rele de arranque RL5','RL5 (STARTER) FEEDBACK FAILURE\r',NULL,NULL),(7,'Sobrecarga externa','EXTERNAL OVERLOAD\r',NULL,NULL),(8,'El motor no funciona por un motivo desconocido','ENGINE NOT RUNNING REASON UNKNOWN\r',NULL,NULL),(9,'Bajo nivel de aceite','LOW OIL LEVEL\r',NULL,NULL),(10,'R.p.m. por debajo del limite','RPM BELOW LIMIT\r',NULL,NULL),(11,'Error durante la puesta en marcha por una carga ba','FAILED TO START LOW BATTERY\r',NULL,NULL),(12,'Fallo del sensor de la temperatura del agua','WATER TEMPERATURE SENSOR FAILURE\r',NULL,NULL),(13,'Nivel de liquido refrigerante bajo','COOLANT LEVEL LOW\r',NULL,NULL),(14,'Sobrecarga interna','INTERNAL OVERLOAD\r',NULL,NULL),(15,'Apagado de la unidad de control del excitado','EXCITER CONTROL UNIT SHUTDOWN\r',NULL,NULL),(16,'Apagado de la unidad de control del motor','ENGINE CONTROL UNIT SHUTDOWN\r',NULL,NULL),(17,'Bajo voltaje de excitacion\n','LOW EXCITATION VOLTAGE',NULL,NULL),(18,'Baja presion del aceite','LOW OIL PRESSURE\r',NULL,NULL),(19,'Voltaje de salida alto','OUTPUT VOLTAGE HIGH\r',NULL,NULL),(20,'Error de la unidad del generador','GENERATOR UNIT ERROR\r',NULL,NULL),(21,'Fallo del ventilador del liquido refrigerante','COOLANT FAN FAILURE\r',NULL,NULL),(22,'Deposito de combustible vacio','FUEL TANK EMPTY\r',NULL,NULL),(23,'Caduco la correa de distribucion\n','TIMING BELT EXPIRED',NULL,NULL),(24,'Fallo de la frecuencia de salida','OUTPUT FREQUENCY FAILURE\r',NULL,NULL);
/*!40000 ALTER TABLE `alarmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenedores`
--

DROP TABLE IF EXISTS `contenedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenedores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_contenedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encendido` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `booking` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_temp` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenedores`
--

LOCK TABLES `contenedores` WRITE;
/*!40000 ALTER TABLE `contenedores` DISABLE KEYS */;
INSERT INTO `contenedores` VALUES (1,'Zgru2245761','Reefer',1,'2022-03-08 22:15:56','2022-03-08 22:15:56','dwq',1),(2,'ZGUU204907-2','Generador',1,'2022-03-08 22:16:34','2022-03-08 22:16:34','ffd',2),(3,'ZGUU204851-7','Generador',1,'2022-03-08 22:16:34','2022-03-08 22:16:34','qggh',3),(4,'ZGUU204905-1','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48','eqwe',4),(5,'ZGUU204854-3','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48','dqwd',5),(6,'ZGUU204904-6','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48','dqwd',5),(7,'ZGUU204896-5','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(8,'ZGUU204906-7','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(9,'ZGUU205299-1','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(10,'ZGUU205301-0','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(11,'ZGUU204822-4','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(12,'ZGUU205304-6','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(13,'ZGUU204821-9','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(14,'ZGUU205347-3','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(15,'ZGUU205348-9','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL),(16,'ZGUU205303-0','Generador',1,'2022-03-08 22:17:48','2022-03-08 22:17:48',NULL,NULL);
/*!40000 ALTER TABLE `contenedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) unsigned NOT NULL,
  `nombre_empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_booking` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_contratada` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresas_usuario_id_foreign` (`usuario_id`),
  CONSTRAINT `empresas_usuario_id_foreign` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES (1,26,'Dp World','-',1.00,'2022-03-08 22:12:51','2022-03-08 22:12:51'),(2,2,'VE Logisctic','-',1.00,'2022-03-18 21:09:09','2022-03-18 21:09:09');
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresas_contenedores`
--

DROP TABLE IF EXISTS `empresas_contenedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas_contenedores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint(20) unsigned NOT NULL,
  `contenedor_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresas_contenedores_empresa_id_foreign` (`empresa_id`),
  KEY `empresas_contenedores_contenedor_id_foreign` (`contenedor_id`),
  CONSTRAINT `empresas_contenedores_contenedor_id_foreign` FOREIGN KEY (`contenedor_id`) REFERENCES `contenedores` (`id`),
  CONSTRAINT `empresas_contenedores_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas_contenedores`
--

LOCK TABLES `empresas_contenedores` WRITE;
/*!40000 ALTER TABLE `empresas_contenedores` DISABLE KEYS */;
INSERT INTO `empresas_contenedores` VALUES (1,1,1,'2022-03-08 22:16:18','2022-03-08 22:16:18'),(2,2,2,'2022-03-08 22:18:30','2022-03-08 22:18:30'),(3,2,3,'2022-03-08 22:16:34','2022-03-08 22:16:34'),(4,2,4,'2022-03-08 22:12:51','2022-03-08 22:12:51'),(5,2,5,'2022-03-08 22:16:34','2022-03-08 22:16:34'),(6,2,6,NULL,NULL),(7,2,7,NULL,NULL),(8,2,8,NULL,NULL),(9,2,9,NULL,NULL),(10,2,10,NULL,NULL),(11,2,11,NULL,NULL),(12,2,12,NULL,NULL),(13,2,13,NULL,NULL),(14,2,14,NULL,NULL),(15,2,15,NULL,NULL),(16,2,16,NULL,NULL);
/*!40000 ALTER TABLE `empresas_contenedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_evento_ingles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Voltaje bajo de la bateria','BAT. VOLTAGE LOW\r',NULL,NULL),(2,'Fallo de las entradas digitales','DIGITAL INPUT FAILURE\r',NULL,NULL),(3,'Voltaje de salida inferior a 180 V','OUTPUT VOLTAGE < 180 V\r',NULL,NULL),(4,'Filtro de aire bloqueado','AIR FILTER BLOCKED\r',NULL,NULL),(5,'Nivel de liquido refrigerante bajo','COOLANT LEVEL LOW\r',NULL,NULL),(6,'Frecuencia de salida baja','OUTPUT FREQUENCY LOW\r',NULL,NULL),(7,'Frecuencia de salida alta','OUTPUT FREQUENCY HIGH\r',NULL,NULL),(8,'Bajo nivel de aceite','LOW OIL LEVEL\r',NULL,NULL),(9,'El contador horario 1 ha superado el limite','HOUR METER 1 HAS EXCEEDED THRESHOLD\r',NULL,NULL),(10,'El contador horario 2 ha superado el limite','HOUR METER 2 HAS EXCEEDED THRESHOLD\r',NULL,NULL),(11,'Nivel bajo de combustible','FUEL LEVEL LOW\r',NULL,NULL),(12,'Fallo del sensor de r.p.m. del motor','ENGINE RPM SENSOR FAILURE\r',NULL,NULL),(13,'Fallo del sensor de la temperatura del agua','WATER TEMPERATURE SENSOR FAILURE\r',NULL,NULL),(14,'Baja presion del aceite','LOW OIL PRESSURE\r',NULL,NULL),(15,'Fallo de realimentacion del rele de precalentamien','RL6 (AIRHEAT) FEEDBACK FAILURE\r',NULL,NULL),(16,'Ha expirado el temporizador de cuenta atras','COUNTDOWN TIMER HAS EXPIRED\r',NULL,NULL),(17,'Presion del aceite alta cuando el motor no esta en','OIL PRESSURE HIGH WHILE ENG. IS NOT RUNNING\r',NULL,NULL),(18,'Fallo del presostato de presion del aceite','OIL PRESSURE SWITCH FAILURE\r',NULL,NULL),(19,'Temperatura del agua alta','WATER TEMPERATURE HIGH\r',NULL,NULL),(20,'El motor no arranca','ENGINE FAILED TO CRANK\r',NULL,NULL),(21,'El motor no se pone en marcha','ENGINE FAILED TO START\r',NULL,NULL),(22,'Sobrecarga externa','EXTERNAL OVERLOAD\r',NULL,NULL),(23,'Motor parado por un motivo desconocido','ENGINE STOPPED REASON UNKNOWN\r',NULL,NULL),(24,'Sin carga, r.p.m. inferiores a 1.530','NO LOAD RPM LESS THAN 1530\r',NULL,NULL),(25,'Fallo de realimentacion del rele de la valvula sol','RL3 (SPEED SOLENOID) FEEDBACK FAILURE\r',NULL,NULL),(26,'Sensor del nivel de combustible fuera de rango','FUEL LEVEL SENSOR OUT OF RANGE\r',NULL,NULL),(27,'El nivel de combustible se redujo demasiado r?pido','FUEL LEVEL DECREASED TO FAST\r',NULL,NULL),(28,'Fallo de la v?lvula solenoide de velocidad','SPEED SOLENOID FAILURE\r',NULL,NULL),(29,'R.p.m. por debajo del l?mite','RPM BELOW LIMIT\r',NULL,NULL),(30,'Tiempo de espera agotado para la salida retrasada','DELAYED OUTPUT TIMED OUT\r',NULL,NULL),(31,'Fallo de realimentaci?n del rel? de arranque RL5','RL5 (STARTER) FEEDBACK FAILURE\r',NULL,NULL),(32,'Sobrecarga interna','INTERNAL OVERLOAD\r',NULL,NULL),(33,'Apagado de la unidad de control del excitador','EXCITER CONTROL UNIT SHUTDOWN\r',NULL,NULL),(34,'Bajo voltaje de excitaci?n	LOW EXCITATION VOLTAGE\r','',NULL,NULL),(35,'Apagado de la unidad de control del motor','ENGINE CONTROL UNIT SHUTDOWN\r',NULL,NULL),(36,'Luz indicadora de fallo de funcionamiento del moto','ENGINE MALFUNCTION INDICATOR LAMP\r',NULL,NULL),(37,'Advertencia de la suma de comprobaci?n del DSR','DSR CHECKSUM WARNING\r',NULL,NULL),(38,'Advertencia de cortocircuito en el DSR','DSR SHORT CIRCUIT WARNING\r',NULL,NULL),(39,'Advertencia de sobrecorriente de excitaci?n en el ','DSR EXCITATION OVERCURRENT WARNING\r',NULL,NULL),(40,'Evento del DSR','DSR EVENT\r',NULL,NULL),(41,'Advertencia de velocidad del DSR','DSR SPEED WARNING\r',NULL,NULL),(42,'Voltaje de salida alto','OUTPUT VOLTAGE HIGH\r',NULL,NULL),(43,'Protecci?n del excitador activada','EXCITER PROTECTION ACTIVATED\r',NULL,NULL),(44,'Fallo del ventilador del l?quido refrigerante','COOLANT FAN FAILURE\r',NULL,NULL),(45,'Informaci?n sobre el c?digo P del motor','ENGINE P-CODE INFO\r',NULL,NULL),(46,'Caduc? la correa de distribuci?n	TIMING BELT EXPIRED\r','',NULL,NULL);
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_12_14_000001_create_personal_access_tokens_table',1),(2,'2022_02_04_233003_create_usuarios_table',1),(3,'2022_02_05_160716_create_empresas_table',1),(4,'2022_02_05_161917_create_contenedores_table',1),(5,'2022_02_05_165520_create_alarmas_table',1),(6,'2022_02_05_165656_create_eventos_table',1),(7,'2022_02_10_161655_create_usuarios_contenedores_table',1),(8,'2022_02_11_163403_create_registro_diario_generadores_table',1),(9,'2022_02_11_164912_create_registro_diario_reefers_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_diario_generadores`
--

DROP TABLE IF EXISTS `registro_diario_generadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_diario_generadores` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contenedor_id` bigint(20) unsigned NOT NULL,
  `battery_voltage` decimal(8,1) DEFAULT NULL,
  `water_temp` decimal(8,1) DEFAULT NULL,
  `running_frequency` decimal(8,1) DEFAULT NULL,
  `fuel_level` decimal(8,1) DEFAULT NULL,
  `voltage_measure` decimal(8,1) DEFAULT NULL,
  `rotor_current` decimal(8,1) DEFAULT NULL,
  `fiel_current` decimal(8,1) DEFAULT NULL,
  `speed` tinyint(1) DEFAULT NULL,
  `eco_power` tinyint(1) DEFAULT NULL,
  `rpm` int(11) DEFAULT NULL,
  `unit_mode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horometro` int(11) DEFAULT NULL,
  `alarma_id` bigint(20) unsigned NOT NULL,
  `evento_id` bigint(20) unsigned NOT NULL,
  `modelo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` double(8,2) DEFAULT NULL,
  `longitud` double(8,2) DEFAULT NULL,
  `engine_state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registro_diario_generadores_contenedor_id_foreign` (`contenedor_id`),
  KEY `registro_diario_generadores_alarma_id_foreign` (`alarma_id`),
  KEY `registro_diario_generadores_evento_id_foreign` (`evento_id`),
  CONSTRAINT `registro_diario_generadores_alarma_id_foreign` FOREIGN KEY (`alarma_id`) REFERENCES `alarmas` (`id`),
  CONSTRAINT `registro_diario_generadores_contenedor_id_foreign` FOREIGN KEY (`contenedor_id`) REFERENCES `contenedores` (`id`),
  CONSTRAINT `registro_diario_generadores_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_diario_generadores`
--

LOCK TABLES `registro_diario_generadores` WRITE;
/*!40000 ALTER TABLE `registro_diario_generadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_diario_generadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_diario_reefers`
--

DROP TABLE IF EXISTS `registro_diario_reefers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro_diario_reefers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `contenedor_id` bigint(20) unsigned NOT NULL,
  `set_point` decimal(8,1) DEFAULT NULL,
  `temp_supply_1` decimal(8,1) DEFAULT NULL,
  `temp_supply_2` decimal(8,1) DEFAULT NULL,
  `return_air` decimal(8,1) DEFAULT NULL,
  `evaporation_coil` decimal(8,1) DEFAULT NULL,
  `condensation_coil` decimal(8,1) DEFAULT NULL,
  `compress_coil_1` decimal(8,1) DEFAULT NULL,
  `compress_coil_2` decimal(8,1) DEFAULT NULL,
  `ambient_air` decimal(8,1) DEFAULT NULL,
  `cargo_1_temp` decimal(8,1) DEFAULT NULL,
  `cargo_2_temp` decimal(8,1) DEFAULT NULL,
  `cargo_3_temp` decimal(8,1) DEFAULT NULL,
  `cargo_4_temp` decimal(8,1) DEFAULT NULL,
  `relative_humidity` int(11) DEFAULT NULL,
  `avl` int(11) DEFAULT NULL,
  `suction_pressure` decimal(8,2) DEFAULT NULL,
  `discharge_pressure` decimal(8,2) DEFAULT NULL,
  `line_voltage` int(11) DEFAULT NULL,
  `line_frequency` int(11) DEFAULT NULL,
  `consumption_ph_1` decimal(8,1) DEFAULT NULL,
  `consumption_ph_2` decimal(8,1) DEFAULT NULL,
  `consumption_ph_3` decimal(8,1) DEFAULT NULL,
  `co2_reading` decimal(8,1) DEFAULT NULL,
  `o2_reading` decimal(8,1) DEFAULT NULL,
  `evaporator_speed` int(11) DEFAULT NULL,
  `condenser_speed` int(11) DEFAULT NULL,
  `battery_voltage` decimal(8,1) DEFAULT NULL,
  `power_kwh` decimal(8,1) DEFAULT NULL,
  `power_trip_reading` decimal(8,1) DEFAULT NULL,
  `power_trip_duration` int(11) DEFAULT NULL,
  `suction_temp` decimal(8,1) DEFAULT NULL,
  `discharge_temp` decimal(8,1) DEFAULT NULL,
  `supply_air_temp` decimal(8,1) DEFAULT NULL,
  `return_air_temp` decimal(8,1) DEFAULT NULL,
  `dl_battery_temp` decimal(8,2) DEFAULT NULL,
  `dl_battery_charge` decimal(8,2) DEFAULT NULL,
  `power_consumption` decimal(8,2) DEFAULT NULL,
  `power_consumption_avg` decimal(8,1) DEFAULT NULL,
  `alarm_present` tinyint(1) DEFAULT NULL,
  `capacity_load` int(11) DEFAULT NULL,
  `power_state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controlling_mode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `humidity_control` tinyint(1) DEFAULT NULL,
  `humidity_set_point` int(11) DEFAULT NULL,
  `fresh_air_ex_mode` int(11) DEFAULT NULL,
  `fresh_air_ex_rate` int(11) DEFAULT NULL,
  `fresh_air_ex_delay` int(11) DEFAULT NULL,
  `set_point_o2` int(11) DEFAULT NULL,
  `set_point_co2` int(11) DEFAULT NULL,
  `defrost_term_temp` decimal(8,1) DEFAULT NULL,
  `defrost_interval` int(11) DEFAULT NULL,
  `water_cooled_conde` tinyint(1) DEFAULT NULL,
  `usda_trip` tinyint(1) DEFAULT NULL,
  `evaporator_exp_valve` int(11) DEFAULT NULL,
  `suction_mod_valve` int(11) DEFAULT NULL,
  `hot_gas_valve` int(11) DEFAULT NULL,
  `economizer_valve` int(11) DEFAULT NULL,
  `modelo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitud` double(8,2) DEFAULT NULL,
  `longitud` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registro_diario_reefers_contenedor_id_foreign` (`contenedor_id`),
  CONSTRAINT `registro_diario_reefers_contenedor_id_foreign` FOREIGN KEY (`contenedor_id`) REFERENCES `contenedores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_diario_reefers`
--

LOCK TABLES `registro_diario_reefers` WRITE;
/*!40000 ALTER TABLE `registro_diario_reefers` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_diario_reefers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contraseña` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ultimo_acceso` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'ztracer','-','ZTrackTracer',1,0,'-','ztrack2020\r',NULL,NULL,NULL),(2,'jzabarburu','Zabarburu','Jose',1,0,'-','12345\r',NULL,NULL,NULL),(3,'rrodriguez','Rodriguez','Ricardo',1,0,'-','12345\r',NULL,NULL,NULL),(4,'wbujaico','Bujaico','Wilmer',1,0,'-','12345\r',NULL,NULL,NULL),(5,'vsoluciones','-','VSOLUCIONES',1,0,'-','vsol2020\r',NULL,NULL,NULL),(6,'coditev','-','CODITEV',1,0,'-','cod2020\r',NULL,NULL,NULL),(7,'ransa','-','RANSA',1,0,'-','ran2020\r',NULL,NULL,NULL),(8,'viticola','-','Vit?cola',1,0,'-','vit2021\r',NULL,NULL,NULL),(9,'mmatumay','Matumay','Mario',1,0,'-','12345\r',NULL,NULL,NULL),(10,'madurador1','-','Madurador1',1,0,'-','12345\r',NULL,NULL,NULL),(11,'properusasc','-','Procesadora Peru SAC',1,0,'-','pps12345\r',NULL,NULL,NULL),(12,'properusac','-','Procesadora Peru SAC',1,0,'-','pro2021\r',NULL,NULL,NULL),(13,'mebolgf','-','MEBOLGF',1,0,'-','meb2021\r',NULL,NULL,NULL),(14,'apeel','apeel','apeel',1,0,'-','apeel2021\r',NULL,NULL,NULL),(15,'apeelperu','-','apeel',1,0,'-','apeel2021\r',NULL,NULL,NULL),(16,'Florent ','-','Florent ',1,0,'-','123456\r',NULL,NULL,NULL),(17,'agromar','-','agromar',1,0,'-','agromar2021\r',NULL,NULL,NULL),(18,'proarandanos','-','proarandanos',1,0,'-','pro2021\r',NULL,NULL,NULL),(19,'san fernando','-','san fernando',1,0,'-','san2021\r',NULL,NULL,NULL),(20,'gandules','-','Gandules',1,0,'-','gan2021\r',NULL,NULL,NULL),(21,'mario','zgroup','zgroup',1,0,'-','123456\r','2022-03-11 16:03:18',NULL,'2022-03-11 21:03:18'),(22,'ZGROUP','ZGROUP','ZGROUP|',1,0,'-','123456\r',NULL,NULL,NULL),(23,'Inkafrut','Inkafrut','Inkafrut',1,0,'-','inkafrut8\r',NULL,NULL,NULL),(24,'dpworld','dpworld','dpworld',1,0,'-','dp2021\r',NULL,NULL,NULL),(25,'CENCOSUD','-','CENCOSUD',1,0,'-','cencosud\r',NULL,NULL,NULL),(26,'fralch','cairampoma','frank',1,1,'ingfralch@gmail.com','siempree08','2022-03-18 17:52:03',NULL,'2022-03-18 22:52:03');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'zgroup'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-19 11:54:07
