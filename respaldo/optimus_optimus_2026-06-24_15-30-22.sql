-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: optimus_optimus
-- ------------------------------------------------------
-- Server version	8.0.46-0ubuntu0.24.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acceso`
--

DROP TABLE IF EXISTS `acceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `acceso` (
  `id` int NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `mac` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acceso`
--

LOCK TABLES `acceso` WRITE;
/*!40000 ALTER TABLE `acceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `acceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activar_contrato`
--

DROP TABLE IF EXISTS `activar_contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activar_contrato` (
  `contrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `unico` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activar_contrato`
--

LOCK TABLES `activar_contrato` WRITE;
/*!40000 ALTER TABLE `activar_contrato` DISABLE KEYS */;
INSERT INTO `activar_contrato` VALUES ('4',1),('4',2),('77',3),('114',4),('32',5),('33',6),('68',7),('49',8),('23',9),('144',10),('93',11),('62',12),('6',13),('6',14),('101',15),('101',16),('59',17),('59',18),('12',19),('15',20),('16',21),('16',22),('106',23),('143',24),('42',25),('22',26),('22',27),('116',28),('20',29),('58',30),('31',31),('31',32),('14',33),('14',34),('110',35),('34',36),('3',37),('35',38),('82',39),('35',40),('82',41),('72',42),('10',43),('43',44),('43',45),('13',46),('48',47),('15',48),('78',49),('78',50),('79',51),('39',52),('80',53),('87',54),('66',55),('75',56),('26',57),('26',58),('135',59),('102',60),('102',61),('76',62),('17',63),('18',64),('18',65),('100',66),('151',67),('111',68),('111',69),('19',70),('57',71),('47',72),('65',73),('25',74),('94',75),('63',76),('63',77),('58',78),('38',79),('28',80),('41',81),('41',82),('99',83),('65',84),('29',85),('29',86),('96',87),('96',88),('128',89),('154',90),('55',91),('55',92),('125',93),('53',94),('153',95),('120',96),('138',97),('30',98),('30',99),('22',100),('64',101),('64',102),('113',103),('142',104),('89',105),('19',106),('54',107),('27',108),('27',109),('27',110),('27',111),('46',112),('46',113),('56',114),('56',115),('108',116),('108',117),('103',118),('72',119),('12',120),('48',121),('71',122),('26',123),('33',124),('68',125),('57',126),('49',127),('51',128),('51',129),('93',130),('52',131),('52',132),('62',133),('7',134),('7',135),('7',136),('7',137),('7',138),('10',139),('50',140),('31',141),('11',142),('11',143),('92',144),('92',145),('70',146),('39',147),('148',148),('148',149),('66',150),('153',151),('100',152),('130',153),('130',154),('25',155),('45',156),('45',157),('74',158),('74',159),('73',160),('133',161),('133',162),('157',163),('154',164),('156',165),('122',166),('115',167),('115',168),('95',169),('53',170),('80',171),('87',172),('2',173),('2',174),('1',175),('1',176),('67',177),('67',178),('67',179),('131',180),('131',181),('131',182),('131',183),('131',184),('131',185),('131',186),('131',187),('131',188),('131',189),('47',190),('95',191),('113',192),('116',193),('116',194),('142',195),('122',196),('134',197),('134',198),('155',199),('147',200),('147',201),('34',202),('24',203),('38',204),('73',205),('104',206),('104',207),('163',208),('23',209),('144',210),('72',211),('30',212),('77',213),('71',214),('93',215),('134',216),('34',217),('52',218),('4',219),('4',220),('62',221),('101',222),('101',223),('103',224),('8',225),('8',226),('55',227),('55',228),('139',229),('53',230),('53',231),('72',232),('72',233),('58',234),('10',235),('132',236),('43',237),('165',238),('13',239),('14',240),('14',241),('48',242),('38',243),('150',244),('150',245),('71',246),('39',247),('80',248),('87',249),('75',250),('75',251),('77',252),('26',253),('54',254),('47',255),('144',256),('157',257),('49',258),('104',259),('29',260),('51',261),('115',262),('23',263),('24',264),('105',265),('96',266),('96',267),('45',268),('20',269),('107',270),('21',271),('21',272),('73',273),('114',274),('113',275),('17',276),('153',277),('100',278),('162',279),('151',280),('28',281),('151',282),('44',283),('33',284),('41',285),('41',286),('99',287),('19',288),('122',289),('143',290),('106',291),('57',292),('43',293),('141',294),('141',295),('63',296),('63',297),('120',298),('89',299),('70',300),('70',301),('135',302),('65',303),('147',304),('147',305),('94',306),('94',307),('74',308),('74',309),('18',310),('138',311),('1',312),('2',313),('1',314),('2',315),('1',316),('2',317),('106',318),('143',319),('0',320),('0',321),('0',322),('0',323),('0',324),('1',325),('1',326);
/*!40000 ALTER TABLE `activar_contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apis`
--

DROP TABLE IF EXISTS `apis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apis` (
  `id` int NOT NULL,
  `numerowhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `tokenwhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `instanciawhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apis`
--

LOCK TABLES `apis` WRITE;
/*!40000 ALTER TABLE `apis` DISABLE KEYS */;
INSERT INTO `apis` VALUES (1,'1','0whoj5siceiv7hky','instance16295');
/*!40000 ALTER TABLE `apis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_cliente`
--

DROP TABLE IF EXISTS `app_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `app_cliente` (
  `id` int NOT NULL,
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `solicitud` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pendiente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_cliente`
--

LOCK TABLES `app_cliente` WRITE;
/*!40000 ALTER TABLE `app_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asientos`
--

DROP TABLE IF EXISTS `asientos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asientos` (
  `id` int NOT NULL,
  `asiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `debeuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `debedos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `debetres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `debecuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `debecinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `debeseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `haberuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `haberdos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `habertres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `habercuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `habercinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `haberseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asientos`
--

LOCK TABLES `asientos` WRITE;
/*!40000 ALTER TABLE `asientos` DISABLE KEYS */;
INSERT INTO `asientos` VALUES (2,'compraspendientes','1','2','4','4','4','4','3','4','4','4','4','4');
/*!40000 ALTER TABLE `asientos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodegabahia`
--

DROP TABLE IF EXISTS `bodegabahia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bodegabahia` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `serie` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fechaing` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `codigo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `periodo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `precio` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `categoria` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodegabahia`
--

LOCK TABLES `bodegabahia` WRITE;
/*!40000 ALTER TABLE `bodegabahia` DISABLE KEYS */;
INSERT INTO `bodegabahia` VALUES ('Aag','Alambre amarre guía ','no','2025-05-26 (10:33:33)','Aag','normal','50','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('Canaleta2','Canaleta 4 cables','no','2025-05-27 (11:23:47)','Canaleta2','normal','2','Sin_Asignar','Sin_Asignar','Sin_Asignar');
/*!40000 ALTER TABLE `bodegabahia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodegabiblian`
--

DROP TABLE IF EXISTS `bodegabiblian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bodegabiblian` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `serie` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fechaing` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `codigo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `periodo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `precio` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `categoria` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodegabiblian`
--

LOCK TABLES `bodegabiblian` WRITE;
/*!40000 ALTER TABLE `bodegabiblian` DISABLE KEYS */;
INSERT INTO `bodegabiblian` VALUES ('Aag','Alambre amarre guía ','no','2025-05-22 (10:25:50)','Aag','normal','0','Sin_Asignar','Sin_Asignar','Sin_Asignar');
/*!40000 ALTER TABLE `bodegabiblian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodegagrupo1`
--

DROP TABLE IF EXISTS `bodegagrupo1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bodegagrupo1` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `serie` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fechaing` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `codigo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `periodo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `precio` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `categoria` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodegagrupo1`
--

LOCK TABLES `bodegagrupo1` WRITE;
/*!40000 ALTER TABLE `bodegagrupo1` DISABLE KEYS */;
INSERT INTO `bodegagrupo1` VALUES ('cintaaislante','Cinta Aislante  P111','no','2025-05-28 (09:22:26)','cintaaislante','normal','4','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('HG8310M','HG8310M','si','2024-09-25 (10:36:50)','HG8310M','normal','0','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('MR50G','MERCUSYS MR50G','si','2024-09-25 (16:13:47)','MR50G','normal','0','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('SC/APC','FAST CONECTOR VERDE (VERDE)','no','2025-05-28 (09:22:45)','SC/APC','normal','20','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('WR940N','TP-LINK 940N','si','2024-09-27 (16:52:05)','WR940N','normal','0','Sin_Asignar','Sin_Asignar','Sin_Asignar');
/*!40000 ALTER TABLE `bodegagrupo1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodegaprincipalfabrica`
--

DROP TABLE IF EXISTS `bodegaprincipalfabrica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bodegaprincipalfabrica` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `serie` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fechaing` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `codigo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `periodo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `precio` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `categoria` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodegaprincipalfabrica`
--

LOCK TABLES `bodegaprincipalfabrica` WRITE;
/*!40000 ALTER TABLE `bodegaprincipalfabrica` DISABLE KEYS */;
INSERT INTO `bodegaprincipalfabrica` VALUES ('5731','SPLITTER SM 1-4H S/CONECT PLC 1M','no','2024-12-12 (12:41:10)','5731','normal','1','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('6995','NAP 16H IP68 SC/APC COMPLETA','no','2024-12-12 (12:42:42)','6995','normal','12','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('7358','splitter sm 1-8H S/CONECT PLC 1MT','no','2024-12-12 (12:38:10)','7358','normal','1','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('aaaaaaaaa','aaaaaaaaa','no','2024-09-25 (10:31:53)','aaaaaaaaa','normal','1','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('amarre30cm','amarre negra 30cm','no','2024-12-02 (15:51:00)','amarre30cm','normal','1000','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('Canaleta2','Canaleta 4 cables','no','2025-05-27 (11:23:04)','Canaleta2','normal','0','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('cintaaislante','Cinta Aislante  P111','no','2025-05-28 (09:21:52)','cintaaislante','normal','0','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('fibradrop','fibra drop 2km','si','2024-12-02 (15:45:45)','fibradrop','normal','2','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('HG8310M','HG8310M','si','2024-09-25 (10:30:09)','HG8310M','normal','0','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('MR50G','MERCUSYS MR50G','si','2024-09-25 (16:10:26)','MR50G','normal','21','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('SC/APC','FAST CONECTOR VERDE (VERDE)','no','2025-05-28 (09:11:55)','SC/APC','normal','0','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('WR940N','TP-LINK 940N','si','2024-09-27 (16:40:48)','WR940N','normal','6','Sin_Asignar','Sin_Asignar','Sin_Asignar'),('xz000','TP-LINK XZ000-G7','si','2024-11-07 (11:12:35)','xz000','normal','20','Sin_Asignar','Sin_Asignar','Sin_Asignar');
/*!40000 ALTER TABLE `bodegaprincipalfabrica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bodegas`
--

DROP TABLE IF EXISTS `bodegas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bodegas` (
  `numero` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `responsable` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `tabla` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `principal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `unico` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bodegas`
--

LOCK TABLES `bodegas` WRITE;
/*!40000 ALTER TABLE `bodegas` DISABLE KEYS */;
INSERT INTO `bodegas` VALUES ('principalfabrica','PRINCIPAL','demo','principalfabrica','bodegaprincipalfabrica','si',2),('Grupo1','Grupo1','Grupo1','Grupo1','bodegaGrupo1','no',3),('Biblian','Biblian','0302227194','Biblian','bodegaBiblian','si',4),('Bahia','Bahia','demo','Bahia','bodegaBahia','no',5);
/*!40000 ALTER TABLE `bodegas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `id_categoria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nombre_categorias` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `url_imagen` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES ('ACCION','ACCION','http://192.168.88.4/optimus_demo/multimedia/imagenes_categorias/tarros.jpg'),('ANIME','ANIME','http://45.70.237.242/optimus_demo/multimedia/imagenes_categorias/anime.png'),('CIENCIAFICCION','CIENCIA FICCION','http://45.70.237.242/optimus_demo/multimedia/imagenes_categorias/CIENCIA-FICCION.png'),('COMEDIA','COMEDIA','http://192.168.88.4/optimus_demo/multimedia/imagenes_categorias/dibujos-animados-jesucristo-con-ninos-llorando-2exhj4f.jpg'),('DRAMA','DRAMA','http://45.70.237.242/optimus_demo/multimedia/imagenes_categorias/DRAMA.png'),('ESTRENOS','ESTRENOS','http://45.70.237.242/optimus_demo/multimedia/imagenes_categorias/CANALES-DIGITALES.png'),('INFANTILES','INFANTILES','http://45.70.237.242/optimus_demo/multimedia/imagenes_categorias/INFANTILES.png'),('ROMANCE','ROMANCE','http://45.70.237.242/optimus_demo/multimedia/imagenes_categorias/ROMANCE.png'),('TERROR','TERROR','http://45.70.237.242/optimus_demo/multimedia/imagenes_categorias/TERROR.png');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citasmedicas`
--

DROP TABLE IF EXISTS `citasmedicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citasmedicas` (
  `cedula` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nombres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `correo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nombremedico` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `especialidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '255',
  `turnos` int NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`turnos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citasmedicas`
--

LOCK TABLES `citasmedicas` WRITE;
/*!40000 ALTER TABLE `citasmedicas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citasmedicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clienteasignar`
--

DROP TABLE IF EXISTS `clienteasignar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clienteasignar` (
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `bodega` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `novedades` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `id` int NOT NULL AUTO_INCREMENT,
  `prioridad` int NOT NULL DEFAULT '3',
  `lat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `lng` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `armadocaja` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clienteasignar`
--

LOCK TABLES `clienteasignar` WRITE;
/*!40000 ALTER TABLE `clienteasignar` DISABLE KEYS */;
INSERT INTO `clienteasignar` VALUES ('0102917689','Daiel Teodoro','2026-04-23T12:12','pendiente','Grupo1','Instalacion Nueva modificada',15,1,'0','0','0','25','2','no');
/*!40000 ALTER TABLE `clienteasignar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientegps`
--

DROP TABLE IF EXISTS `clientegps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientegps` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `lat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `lng` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `pais` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `modelo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ipgestion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientegps`
--

LOCK TABLES `clientegps` WRITE;
/*!40000 ALTER TABLE `clientegps` DISABLE KEYS */;
INSERT INTO `clientegps` VALUES (1,'Daiel Teodoro','Control Sur','0','0','Ecuador','0102917689','0','1','1','1','vacio','CUENCA'),(5,'DANIEL TEODORO CARDENAS CAMPOS ','wqeq','0','0','593','0102917689','0','0','0','0','0.0.0.0','0.0.0.0');
/*!40000 ALTER TABLE `clientegps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `nombres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `apellidos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `telefono1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `telefono2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `saldo` int NOT NULL DEFAULT '0',
  `unico` int NOT NULL AUTO_INCREMENT,
  `foto5` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `isp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `proveedorisp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `pct` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `procesado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `medio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `fechaprocesado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `foto6` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto7` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `cedula1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `cedula2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `planilla` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `multimedia` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `ciudad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `representante` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Representante',
  `juridica` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `fuente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('0102917689','0102917689','CARDENAS CAMPOS DANIEL TEODORO','Sin Asignar','Salto a la soga','0996629720','','sin@mail','2026-05-24 (22:24:42)','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif',0,19,'../images/silueta.gif','NO','SIN ASIGNAR','no','no','no','0','../images/silueta.gif','../images/silueta.gif','daniel teodoro','0102917689','0','0','0','NO','0','CARDENAS CAMPOS DANIEL TEODORO','NO','0','0');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `numero` int NOT NULL AUTO_INCREMENT,
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `propietario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ruc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `autorizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `preciounitario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `preciototal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `subtotal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `vencimiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `descuento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pendiente',
  `forma_pago` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombrecliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `recibo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/sin_documento.png',
  `numerorecibo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Recibo',
  `contrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tipodocumento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_documento',
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Foto',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estadodos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras_comercialesatemporal`
--

DROP TABLE IF EXISTS `compras_comercialesatemporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras_comercialesatemporal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_comercialesatemporal`
--

LOCK TABLES `compras_comercialesatemporal` WRITE;
/*!40000 ALTER TABLE `compras_comercialesatemporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras_comercialesatemporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compratemporal`
--

DROP TABLE IF EXISTS `compratemporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compratemporal` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compratemporal`
--

LOCK TABLES `compratemporal` WRITE;
/*!40000 ALTER TABLE `compratemporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `compratemporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuracion`
--

DROP TABLE IF EXISTS `configuracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configuracion` (
  `empresa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ruc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `autorizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ice` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `logo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `logoimprecionhojacompleta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `unico` int NOT NULL AUTO_INCREMENT,
  `colorfondo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'factura',
  `carpeta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_carpeta',
  `nombremedico` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `especialidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `clave` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `firmaelectronica` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '''vacio',
  `ambiente` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `tipoemision` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `codigodocumento` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `establesimiento` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `contabilidad` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `configuracion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `web` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_web',
  `representante` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `leyendafactura` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `firmasrecibo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'si',
  `personanatural` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `tipoempresa` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'isp',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `actualizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `reconeccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `olt` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `mikrotik` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuracion`
--

LOCK TABLES `configuracion` WRITE;
/*!40000 ALTER TABLE `configuracion` DISABLE KEYS */;
INSERT INTO `configuracion` VALUES ('DEMO','DEMO','222','DEMO','0996629720','15','3    ','../images/empresa/logo.png','../images/empresa/logoimprecionhojacompleta.jpg',1,'#24a5dd ','factura','optimus_global_telecom','vacio','vacio','11111','VACIO','1','1','1','1','e','','www.demo@gmail.com ','demo','Contribuyente Regimen RIMPE','no','si','isp','45.236.151.150:4443','2023-12-05','0','no','si');
/*!40000 ALTER TABLE `configuracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratos`
--

DROP TABLE IF EXISTS `contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contratos` (
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `numero` int NOT NULL,
  `gps1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `gps2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `router` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `antena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cable` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `conectores` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ultima_factura` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `vendedor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cortado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `procesados` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'si',
  `nombres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '001',
  `dia_corte` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '15',
  `dia_corte_actual` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '15',
  `service_port` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `absoluta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `autorizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `puerto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `asignado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `activado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `unico` int NOT NULL AUTO_INCREMENT,
  `puerto_gestion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `monitoreo` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `terceraedad` varchar(5) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cedula1` varchar(254) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `cedula2` varchar(254) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `planilla` varchar(254) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `foto1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/sistema/12.png',
  `foto2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/sistema/12.png',
  `foto3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/sistema/12.png',
  `foto4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/sistema/12.png',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratos`
--

LOCK TABLES `contratos` WRITE;
/*!40000 ALTER TABLE `contratos` DISABLE KEYS */;
INSERT INTO `contratos` VALUES ('0102917689','001','2026-06-20 (12:14:44)',1,'','','Salto a la soga','0992950431','Sin_Asignar','Sin_Asignar','Sin_Asignar','Sin_Asignar','sin@mail','activo','Sin_Asignar','0103597130','si','si','CARDENAS CAMPOS DANIEL TEODORO','CUENCA','10','10','0','0','qwe','0','0','0','no','192.168.88.254','no',26,'0','0','si','../contratos/0102917689/1781975684_global net.jpg','../contratos/0102917689/1781975684_optimus.jpg','../contratos/0102917689/1781975684_WhatsApp Image 2026-06-05 at 11.54.08 AM (2).jpeg','../images/sistema/12.png','../images/sistema/12.png','../images/sistema/12.png','../images/sistema/12.png');
/*!40000 ALTER TABLE `contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contratoscompra`
--

DROP TABLE IF EXISTS `contratoscompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contratoscompra` (
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `numero` int NOT NULL,
  `gps1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `gps2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `router` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `antena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cable` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `conectores` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ultima_factura` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `vendedor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cortado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `procesados` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'si',
  `nombres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '001',
  `dia_corte` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '15',
  `dia_corte_actual` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '15',
  `service_port` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `absoluta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `autorizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `puerto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contratos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `asignado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contratoscompra`
--

LOCK TABLES `contratoscompra` WRITE;
/*!40000 ALTER TABLE `contratoscompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `contratoscompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentas` (
  `numero` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `institucion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `saldo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `responsable` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `unico` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
INSERT INTO `cuentas` VALUES ('prueba','prueba','279','prueba','demo',1),('cajachica','CAJA CHICA','5127.33','cajachica','demo',2),('2100155078','BANCO PICHINCHA','3997.46','2100155078','demo',3),('4185778','COOP JEP','3128.54','4185778','demo',4),('2468085','COOP JARDIN AZUAYO','540.02','2468085','demo',5),('2100236066','COOPERATIVA CB','0','2100236066','demo',6),('Biblian','CAJA CHICA BIBLIAN','0','Biblian','0302227194',7),('t','t','200','t','demo',8);
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentascontable`
--

DROP TABLE IF EXISTS `cuentascontable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuentascontable` (
  `debe` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `haber` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `bgeneral` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `bresultados` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nuno` int NOT NULL DEFAULT '0',
  `ndos` int NOT NULL DEFAULT '0',
  `ntres` int NOT NULL DEFAULT '0',
  `ncuatro` int NOT NULL DEFAULT '0',
  `ncinco` int NOT NULL DEFAULT '0',
  `nseis` int NOT NULL DEFAULT '0',
  `saldo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuentascontable`
--

LOCK TABLES `cuentascontable` WRITE;
/*!40000 ALTER TABLE `cuentascontable` DISABLE KEYS */;
INSERT INTO `cuentascontable` VALUES ('si','no','si','si',1,1,1,0,0,0,'128.23','Compras',1),('si','no','si','si',1,1,2,0,0,0,'15.37','Iva Cobrado',2),('no','si','si','si',2,1,1,0,0,0,'143.6','Compras Pendientes',3),('si','no','si','si',0,0,0,0,0,0,'0','Vacio',4);
/*!40000 ALTER TABLE `cuentascontable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diario`
--

DROP TABLE IF EXISTS `diario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `asiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `debeuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `debedos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `debetres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `debecuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `debecinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `debeseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `haberuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `haberdos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `habertres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `habercuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `habercinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `haberseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumadebeuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumadebedos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumadebetres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumadebecuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumadebecinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumadebeseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumahaberuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumahaberdos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumahabertres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumahabercuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumahabercinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `sumahaberseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diario`
--

LOCK TABLES `diario` WRITE;
/*!40000 ALTER TABLE `diario` DISABLE KEYS */;
INSERT INTO `diario` VALUES (1,'ventaspendientes','','','','','','','','','','','','','2024-07-10 (16:49:20)','GENERAR MENSUALIDAD/Daniel Cardenas/Sin Documento/000/000','0','0.00','0','0','0','0','0.00','0','0','0','0','0'),(2,'ventaspendientes','','','','','','','','','','','','','2024-07-10 (16:55:48)','GENERAR MENSUALIDAD/Daniel Cardenas/Sin Documento/000/000','15','3.15','0','0','0','0','18.15','0','0','0','0','0'),(3,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (12:24:35)','GENERAR MENSUALIDAD/ANGUASHA SHARUP JUAN FREDY /Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(4,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (12:32:31)','GENERAR MENSUALIDAD/ARIAS MONTALVAN LUIS EDUARDO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(5,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (13:39:21)','GENERAR MENSUALIDAD/BARRERA SALAMEA DANIELA ESTEFANIA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(6,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (13:39:36)','GENERAR MENSUALIDAD/BARRERA SALAMEA DANIELA ESTEFANIA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(7,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (13:47:29)','GENERAR MENSUALIDAD/PILLCO GUAMAN LILIA MARIBEL /Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(8,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (13:49:48)','GENERAR MENSUALIDAD/VELETANGA GUANGA RUTH CECILIA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(9,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:14:51)','GENERAR MENSUALIDAD/SANGURIMA CONDO TANIA ELIZABETH/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(10,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:16:04)','GENERAR MENSUALIDAD/DIAZ BOSCAN RODULFO ANTONIO/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(11,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:26:45)','GENERAR MENSUALIDAD/FOXGYM CIA LTDA/Sin Documento/000/000','34.78','5.22','0','0','0','0','40.00','0','0','0','0','0'),(12,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:27:00)','GENERAR MENSUALIDAD/FOXGYM CIA LTDA/Sin Documento/000/000','34.78','5.22','0','0','0','0','40.00','0','0','0','0','0'),(13,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:27:12)','GENERAR MENSUALIDAD/FOXGYM CIA LTDA/Sin Documento/000/000','34.78','5.22','0','0','0','0','40.00','0','0','0','0','0'),(14,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:29:47)','GENERAR MENSUALIDAD/MALDONADO VILLALTA DOMENICA MARCELA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(15,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:30:04)','GENERAR MENSUALIDAD/MALDONADO VILLALTA DOMENICA MARCELA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(16,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:31:27)','GENERAR MENSUALIDAD/PARRA TAPIA PAUL SEBASTIAN/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(17,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:32:20)','GENERAR MENSUALIDAD/PUIN CENTENO DELIA ANGELITA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(18,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (14:35:02)','GENERAR MENSUALIDAD/QUITUISACA CABRERA KAREN ESTEFANY/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(19,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:04:44)','GENERAR MENSUALIDAD/AMORES PATIÑO KARINA DENISSE/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(20,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:05:47)','GENERAR MENSUALIDAD/CABRERA VITERI DARIO XAVIER/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(21,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:06:55)','GENERAR MENSUALIDAD/BERMEO RENDON XAVIER ADRIAN/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(22,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:08:03)','GENERAR MENSUALIDAD/PACHECO PACHECO JOHANNA PRISCILA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(23,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:09:47)','GENERAR MENSUALIDAD/CONTRERAS GOMEZ CLARA HERLINDA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(24,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:10:06)','GENERAR MENSUALIDAD/CONTRERAS GOMEZ CLARA HERLINDA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(25,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:11:38)','GENERAR MENSUALIDAD/VACACELA  AJILA MARIANA DE JESUS/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(26,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:15:20)','GENERAR MENSUALIDAD/DELGADO TELLO PAUL DANILO/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(27,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:16:46)','GENERAR MENSUALIDAD/DICAL S.A.S/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(28,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:18:13)','GENERAR MENSUALIDAD/LOJA LOJA ANA GABRIELA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(29,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:19:29)','GENERAR MENSUALIDAD/ERRAEZ SUCONOTA OLGA MARIBEL/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(30,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:20:40)','GENERAR MENSUALIDAD/ZHICAY FAREZ MANUEL SALVADOR/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(31,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:21:40)','GENERAR MENSUALIDAD/YUNGA MONTAÑO JOEL ALEXANDER/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(32,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:23:20)','GENERAR MENSUALIDAD/MOYANO MOYANO MONICA MARIA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(33,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:25:03)','GENERAR MENSUALIDAD/GUALLPA SANCHEZ ZOILA INES/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(34,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:26:28)','GENERAR MENSUALIDAD/JAIME WILFRIDO ANGUISACA PRADO/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(35,'ventaspendientes','','','','','','','','','','','','','2024-09-05 (15:27:33)','GENERAR MENSUALIDAD/GALAN CAJAMARCA JOHANNA ISABEL/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(36,'ventacancelar','','','','','','','','','','','','','2024-09-06 (10:33:18)','CANCELAR REGISTRO//94/2100155078/Se Retira','','0.00','0','0','0','0','20','0','0','0','0','0'),(37,'ventaspago','','','','','','','','','','','','','2024-09-06 (11:26:54)','COBRO ABONO MENSUALIDAD/DELGADO MACAO RUPERTO JUSTINO/198/001/001','8.93','0.00','0','0','0','0','10','0','0','0','0','0'),(38,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (11:51:00)','GENERAR MENSUALIDAD/AUZ BAUTISTA KATHERINE ELISABETH/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(39,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (12:13:29)','GENERAR MENSUALIDAD/CAMPOS MURILLO NATHALIE DEL CONSUELO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(40,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (12:31:26)','GENERAR MENSUALIDAD/MARCATOMA MOROCHO EDWIN REMIGIO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(41,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (12:37:00)','GENERAR MENSUALIDAD/SEGARRA SOLANO LIA NOEMI/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(42,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (12:43:32)','GENERAR MENSUALIDAD/OJEDA PEREZ FANNY CRISTINA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(43,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (12:53:02)','GENERAR MENSUALIDAD/PESANTEZ MARQUEZ DORIS MELIDA	/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(44,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (16:07:51)','GENERAR MENSUALIDAD/CUENCA TENEMPAGUAY CARMEN VALERIA/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(45,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (16:33:19)','GENERAR MENSUALIDAD/ENRIQUEZ CAMPOVERDE RENE FERNANDO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(46,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (16:38:18)','GENERAR MENSUALIDAD/AGUAYZA TOLEDO CARMEN JACQUELINE/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(47,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (16:56:03)','GENERAR MENSUALIDAD/SANCHEZ MEJIA KATHERINE PRISCILA/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(48,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (16:59:39)','GENERAR MENSUALIDAD/AMORES MERCHAN SILVIA DE LOURDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(49,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (17:03:29)','GENERAR MENSUALIDAD/ANDREA JOHANNA TIGRE TORRES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(50,'ventaspendientes','','','','','','','','','','','','','2024-09-06 (17:37:02)','GENERAR MENSUALIDAD/QUITO ZHININ OSCAR MAURICIO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(51,'ventaspendientes','','','','','','','','','','','','','2024-09-09 (11:18:02)','GENERAR MENSUALIDAD/QUINDE GARCIA OSWALDO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(52,'ventaspendientes','','','','','','','','','','','','','2024-09-09 (11:22:49)','GENERAR MENSUALIDAD/PAUCAR GARCIA CECIBEL DE LOS ANGELES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(53,'ventaspendientes','','','','','','','','','','','','','2024-09-09 (11:26:55)','GENERAR MENSUALIDAD/TIGRE ZHIZHPON NUBE MELANIA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(54,'ventaspendientes','','','','','','','','','','','','','2024-09-09 (11:49:26)','GENERAR MENSUALIDAD/ARIAS RODAS MARCOS XAVIER/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(55,'ventaspendientes','','','','','','','','','','','','','2024-09-09 (12:05:12)','GENERAR MENSUALIDAD/MENDEZ VERONICA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(56,'ventaspendientes','','','','','','','','','','','','','2024-09-09 (12:16:54)','GENERAR MENSUALIDAD/FERRER BADELL HERIBETH CAROLINA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(57,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (12:40:29)','GENERAR MENSUALIDAD/ROLDAN CONDO CARMEN DOLORES/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(58,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (13:07:06)','GENERAR MENSUALIDAD/TENESACA GONZALEZ ANNABELL PAOLA/Sin Documento/000/000','8.7','1.31','0','0','0','0','10.01','0','0','0','0','0'),(59,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (16:00:44)','GENERAR MENSUALIDAD/QUEZADA UREÑA FLAVIO DE JESUS/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(60,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (16:30:31)','GENERAR MENSUALIDAD/CONSULTORA MUNDOWEB COMUWEB CÍA LTDA/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(61,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (16:43:03)','GENERAR MENSUALIDAD/ANGEL GIOVANNI JARA TORRES/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(62,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (16:52:01)','GENERAR MENSUALIDAD/PATIÑO CARPIO NANCI MARLENE/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(63,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (17:02:39)','GENERAR MENSUALIDAD/JHON ALEXANDER PEREZ PESANTEZ/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(64,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (17:10:51)','GENERAR MENSUALIDAD/LUIS MIGUEL VILLALTA ARIAS/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(65,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (17:43:36)','GENERAR MENSUALIDAD/MOLINA ENCALADA NANCY ELIZABETH/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(66,'ventaspendientes','','','','','','','','','','','','','2024-09-10 (18:04:48)','GENERAR MENSUALIDAD/MAYRA FABIOLA GUTAMA CHUMIZ/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(67,'ventaspendientes','','','','','','','','','','','','','2024-09-11 (10:04:48)','GENERAR MENSUALIDAD/SERRANO QUEZADA JONATHAN STEVEN/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(68,'ventaspendientes','','','','','','','','','','','','','2024-09-11 (10:08:58)','GENERAR MENSUALIDAD/ZULEMA SOLEDAD CARCHI AMAY/Sin Documento/000/000','8.7','1.31','0','0','0','0','10.01','0','0','0','0','0'),(69,'ventaspendientes','','','','','','','','','','','','','2024-09-11 (17:22:13)','GENERAR MENSUALIDAD/GIL JARA JAVIER OSWALDO/Sin Documento/000/000','0','0.00','0','0','0','0','0.00','0','0','0','0','0'),(70,'ventaspendientes','','','','','','','','','','','','','2024-09-26 (09:02:20)','GENERAR MENSUALIDAD/DANIEL TEODORO CARDENAS CAMPOS/Sin Documento/000/000','0','0.00','0','0','0','0','0.00','0','0','0','0','0'),(71,'ventaspendientes','','','','','','','','','','','','','2024-09-27 (09:41:32)','GENERAR MENSUALIDAD/DANIEL TEODORO CARDENAS CAMPOS/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(72,'ventacancelar','','','','','','','','','','','','','2024-10-10 (11:46:55)','CANCELAR REGISTRO//112/2100155078/llll','','0.00','0','0','0','0','25','0','0','0','0','0'),(73,'ventacancelar','','','','','','','','','','','','','2024-10-10 (11:47:44)','CANCELAR REGISTRO//275/2100155078/yy','','0.00','0','0','0','0','25','0','0','0','0','0'),(74,'ventaspendientes','','','','','','','','','','','','','2024-10-10 (11:48:15)','GENERAR MENSUALIDAD/GIL PEÑAFIEL MARIA ISABEL/Sin Documento/000/000','10.87','1.63','0','0','0','0','12.50','0','0','0','0','0'),(75,'ventaspendientes','','','','','','','','','','','','','2024-11-20 (11:20:48)','GENERAR MENSUALIDAD/PATIÑO CARPIO NANCI MARLENE/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(76,'ventaspago','','','','','','','','','','','','','2024-11-20 (11:23:55)','COBRO ABONO MENSUALIDAD/DIAZ BOSCAN RODULFO ANTONIO/528/001/001','13.39','0.00','0','0','0','0','15','0','0','0','0','0'),(77,'ventaspendientes','','','','','','','','','','','','','2024-11-20 (11:54:06)','GENERAR MENSUALIDAD/CABRERA BRAVO EDUARDO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(78,'ventacancelar','','','','','','','','','','','','','2024-11-20 (11:58:04)','CANCELAR REGISTRO//390/cajachica/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(79,'ventacancelar','','','','','','','','','','','','','2024-11-20 (11:58:58)','CANCELAR REGISTRO//273/cajachica/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(80,'ventacancelar','','','','','','','','','','','','','2024-11-20 (11:59:49)','CANCELAR REGISTRO//193/cajachica/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(81,'ventacancelar','','','','','','','','','','','','','2024-11-20 (12:01:57)','CANCELAR REGISTRO//31/cajachica/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(82,'ventaspendientes','','','','','','','','','','','','','2024-11-20 (12:02:42)','GENERAR MENSUALIDAD/GALAN CAJAMARCA JOHANNA ISABEL/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(83,'ventacancelar','','','','','','','','','','','','','2024-11-20 (12:03:33)','CANCELAR REGISTRO//111/4185778/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(84,'ventaspendientes','','','','','','','','','','','','','2024-11-20 (12:24:08)','GENERAR MENSUALIDAD/LOJA LOJA SANDRA MARIA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(85,'ventacancelar','','','','','','','','','','','','','2024-11-20 (12:30:03)','CANCELAR REGISTRO//20/cajachica/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(86,'ventacancelar','','','','','','','','','','','','','2024-11-20 (12:30:41)','CANCELAR REGISTRO//99/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(87,'ventaspendientes','','','','','','','','','','','','','2024-11-20 (15:53:13)','GENERAR MENSUALIDAD/CULCAY TUBA LUIS ISAAC/Sin Documento/000/000','8.7','1.31','0','0','0','0','10.01','0','0','0','0','0'),(88,'ventacancelar','','','','','','','','','','','','','2024-11-20 (15:54:10)','CANCELAR REGISTRO//256/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(89,'ventacancelar','','','','','','','','','','','','','2024-11-20 (15:54:43)','CANCELAR REGISTRO//373/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(90,'ventacancelar','','','','','','','','','','','','','2024-11-21 (10:40:50)','CANCELAR REGISTRO//413/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(91,'ventaspendientes','','','','','','','','','','','','','2024-11-21 (10:41:15)','GENERAR MENSUALIDAD/MAYRA FABIOLA GUTAMA CHUMIZ/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(92,'ventacancelar','','','','','','','','','','','','','2024-11-21 (10:45:41)','CANCELAR REGISTRO//395/cajachica/ya no sigue','','0.00','0','0','0','0','30','0','0','0','0','0'),(93,'ventacancelar','','','','','','','','','','','','','2024-11-21 (11:13:41)','CANCELAR REGISTRO//366/cajachica/ya no sigue','','0.00','0','0','0','0','20','0','0','0','0','0'),(94,'ventacancelar','','','','','','','','','','','','','2024-11-21 (11:14:24)','CANCELAR REGISTRO//247/cajachica/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(95,'ventacancelar','','','','','','','','','','','','','2024-11-21 (11:14:26)','CANCELAR REGISTRO//247/cajachica/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(96,'ventacancelar','','','','','','','','','','','','','2024-11-21 (11:33:26)','CANCELAR REGISTRO//56/cajachica/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(97,'ventacancelar','','','','','','','','','','','','','2024-11-21 (11:34:39)','CANCELAR REGISTRO//136/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(98,'ventacancelar','','','','','','','','','','','','','2024-11-21 (11:35:05)','CANCELAR REGISTRO//308/cajachica/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(99,'ventaspendientes','','','','','','','','','','','','','2024-11-21 (11:35:25)','GENERAR MENSUALIDAD/PACHECO PACHECO OSCAR TOMAS/Sin Documento/000/000','10.87','1.63','0','0','0','0','12.50','0','0','0','0','0'),(100,'ventaspendientes','','','','','','','','','','','','','2024-11-21 (11:35:42)','GENERAR MENSUALIDAD/PACHECO PACHECO OSCAR TOMAS/Sin Documento/000/000','10.87','1.63','0','0','0','0','12.50','0','0','0','0','0'),(101,'ventaspendientes','','','','','','','','','','','','','2024-11-21 (11:35:55)','GENERAR MENSUALIDAD/PACHECO PACHECO OSCAR TOMAS/Sin Documento/000/000','10.87','1.63','0','0','0','0','12.50','0','0','0','0','0'),(102,'ventacancelar','','','','','','','','','','','','','2024-11-21 (11:36:48)','CANCELAR REGISTRO//422/cajachica/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(103,'ventaspendientes','','','','','','','','','','','','','2024-11-21 (12:00:07)','GENERAR MENSUALIDAD/JHON ALEXANDER PEREZ PESANTEZ/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(104,'ventaspago','','','','','','','','','','','','','2024-11-21 (12:24:31)','COBRO ABONO MENSUALIDAD/JHON ALEXANDER PEREZ PESANTEZ/587/001/001','17.86','0.00','0','0','0','0','20','0','0','0','0','0'),(105,'ventaspago','','','','','','','','','','','','','2024-11-21 (12:26:17)','COBRO ABONO MENSUALIDAD/JHON ALEXANDER PEREZ PESANTEZ/588/001/001','11.61','0.00','0','0','0','0','13','0','0','0','0','0'),(106,'ventaspendientes','','','','','','','','','','','','','2024-11-21 (12:31:01)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(107,'ventacancelar','','','','','','','','','','','','','2024-11-21 (12:49:29)','CANCELAR REGISTRO//442/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(108,'ventacancelar','','','','','','','','','','','','','2024-11-21 (12:52:49)','CANCELAR REGISTRO//149/2100155078/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(109,'ventacancelar','','','','','','','','','','','','','2024-11-21 (17:34:19)','CANCELAR REGISTRO//329/2100155078/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(110,'ventaanular','','','','','','','','','','','','','2024-11-21 (17:34:56)','ANULAR FACTURA/0100491604/000000248/2100155078/mal ingresado contrato','21.74','0.00','0','0','0','0','25.00','0','0','0','0','0'),(111,'ventaspendientes','','','','','','','','','','','','','2024-11-21 (17:35:38)','GENERAR MENSUALIDAD/SAQUICELA PEÑA AIDA GERARDINA/Sin Documento/000/000','10.87','1.63','0','0','0','0','12.50','0','0','0','0','0'),(112,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (10:12:28)','GENERAR MENSUALIDAD/Mark Leonardo Serrano Quezada/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(113,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (10:51:43)','GENERAR MENSUALIDAD/PACHECO GARCIA MAYRA KARINA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(114,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (11:05:31)','GENERAR MENSUALIDAD/TORRES DURAN PRISCILA MARIBEL/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(115,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (11:05:42)','GENERAR MENSUALIDAD/TORRES DURAN PRISCILA MARIBEL/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(116,'ventacancelar','','','','','','','','','','','','','2024-11-22 (11:07:06)','CANCELAR REGISTRO//455/cajachica/retirada','','0.00','0','0','0','0','15','0','0','0','0','0'),(117,'ventacancelar','','','','','','','','','','','','','2024-11-22 (11:07:33)','CANCELAR REGISTRO//340/cajachica/retirada','','0.00','0','0','0','0','20','0','0','0','0','0'),(118,'ventacancelar','','','','','','','','','','','','','2024-11-22 (11:08:01)','CANCELAR REGISTRO//183/cajachica/retirada','','0.00','0','0','0','0','20','0','0','0','0','0'),(119,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (11:13:32)','GENERAR MENSUALIDAD/CORTEZ DELGADO NORMA EULALIA/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(120,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (11:16:43)','GENERAR MENSUALIDAD/CORTEZ DELGADO NORMA EULALIA/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(121,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (16:00:48)','GENERAR MENSUALIDAD/CORTES DELGADO BLANCA AZUCENA/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(122,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (17:07:43)','GENERAR MENSUALIDAD/RAMON IDROVO ADRIAN MATEO/Sin Documento/000/000','26.09','3.91','0','0','0','0','30.00','0','0','0','0','0'),(123,'ventacancelar','','','','','','','','','','','','','2024-11-22 (17:09:27)','CANCELAR REGISTRO//222/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(124,'ventacancelar','','','','','','','','','','','','','2024-11-22 (17:11:39)','CANCELAR REGISTRO//301/2100155078/paga a sistelcell','','0.00','0','0','0','0','15','0','0','0','0','0'),(125,'ventacancelar','','','','','','','','','','','','','2024-11-22 (17:16:27)','CANCELAR REGISTRO//225/2100155078/mal ingresado','','0.00','0','0','0','0','10.01','0','0','0','0','0'),(126,'ventacancelar','','','','','','','','','','','','','2024-11-22 (17:23:31)','CANCELAR REGISTRO//214/2100155078/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(127,'ventacancelar','','','','','','','','','','','','','2024-11-22 (17:23:50)','CANCELAR REGISTRO//324/2100155078/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(128,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (17:24:26)','GENERAR MENSUALIDAD/ROLDAN CONDO CARMEN DOLORES/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(129,'ventacancelar','','','','','','','','','','','','','2024-11-22 (17:24:44)','CANCELAR REGISTRO//439/2100155078/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(130,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (17:30:27)','GENERAR MENSUALIDAD/PACHECO CASTILLO ANTONELLA ELIZABETH/Sin Documento/000/000','21.74','3.26','0','0','0','0','25.00','0','0','0','0','0'),(131,'ventacancelar','','','','','','','','','','','','','2024-11-22 (17:32:11)','CANCELAR REGISTRO//476/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(132,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (17:36:03)','GENERAR MENSUALIDAD/SAMANTHA KATHERINE QUIZHPILEMA MARIN/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(133,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (18:22:50)','GENERAR MENSUALIDAD/MARCATOMA MOROCHO EDWIN REMIGIO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(134,'ventaspago','','','','','','','','','','','','','2024-11-22 (18:23:52)','COBRO ABONO MENSUALIDAD/MARCATOMA MOROCHO EDWIN REMIGIO/672/001/001','6.46','0.00','0','0','0','0','7.24','0','0','0','0','0'),(135,'ventaspendientes','','','','','','','','','','','','','2024-11-22 (18:25:32)','GENERAR MENSUALIDAD/LUIS MIGUEL VILLALTA ARIAS/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(136,'ventaspago','','','','','','','','','','','','','2024-11-22 (18:26:57)','COBRO ABONO MENSUALIDAD/LUIS MIGUEL VILLALTA ARIAS/674/001/001','8.93','0.00','0','0','0','0','10','0','0','0','0','0'),(137,'ventacancelar','','','','','','','','','','','','','2024-11-27 (12:17:09)','CANCELAR REGISTRO//216/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(138,'ventacancelar','','','','','','','','','','','','','2024-11-27 (12:17:30)','CANCELAR REGISTRO//315/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(139,'ventacancelar','','','','','','','','','','','','','2024-11-27 (12:17:48)','CANCELAR REGISTRO//429/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(140,'ventaspendientes','','','','','','','','','','','','','2024-11-27 (12:18:10)','GENERAR MENSUALIDAD/QUEZADA UREÑA FLAVIO DE JESUS/Sin Documento/000/000','6.52','0.98','0','0','0','0','7.50','0','0','0','0','0'),(141,'ventaspendientes','','','','','','','','','','','','','2024-11-27 (12:18:32)','GENERAR MENSUALIDAD/QUEZADA UREÑA FLAVIO DE JESUS/Sin Documento/000/000','6.52','0.98','0','0','0','0','7.50','0','0','0','0','0'),(142,'ventacancelar','','','','','','','','','','','','','2024-11-27 (12:19:12)','CANCELAR REGISTRO//128/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(143,'ventacancelar','','','','','','','','','','','','','2024-11-27 (12:19:31)','CANCELAR REGISTRO//296/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(144,'ventacancelar','','','','','','','','','','','','','2024-11-27 (12:19:48)','CANCELAR REGISTRO//297/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(145,'ventacancelar','','','','','','','','','','','','','2024-11-27 (12:20:09)','CANCELAR REGISTRO//408/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(146,'ventacancelar','','','','','','','','','','','','','2024-11-27 (12:20:26)','CANCELAR REGISTRO//409/2100155078/mal ingresado','','0.00','0','0','0','0','15','0','0','0','0','0'),(147,'ventaspendientes','','','','','','','','','','','','','2024-11-27 (12:20:37)','GENERAR MENSUALIDAD/Maria Josefina Orellana Barrera/Sin Documento/000/000','6.52','0.98','0','0','0','0','7.50','0','0','0','0','0'),(148,'ventaspendientes','','','','','','','','','','','','','2024-11-27 (12:20:48)','GENERAR MENSUALIDAD/Maria Josefina Orellana Barrera/Sin Documento/000/000','6.52','0.98','0','0','0','0','7.50','0','0','0','0','0'),(149,'ventaspago','','','','','','','','','','','','','2024-11-27 (12:22:55)','COBRO ABONO MENSUALIDAD/Maria Josefina Orellana Barrera/693/001/001','2.23','0.00','0','0','0','0','2.5','0','0','0','0','0'),(150,'ventaspendientes','','','','','','','','','','','','','2024-11-27 (12:29:16)','GENERAR MENSUALIDAD/CAMPOS MURILLO NATHALIE DEL CONSUELO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(151,'ventaspago','','','','','','','','','','','','','2024-12-05 (16:49:33)','COBRO ABONO MENSUALIDAD/MAYRA FABIOLA GUTAMA CHUMIZ/714/001/001','4.46','0.00','0','0','0','0','5','0','0','0','0','0'),(152,'ventaspago','','','','','','','','','','','','','2024-12-10 (18:08:23)','COBRO ABONO MENSUALIDAD/AGUAYZA TOLEDO CARMEN JACQUELINE/722/001/001','4.46','0.00','0','0','0','0','5','0','0','0','0','0'),(153,'ventaspendientes','','','','','','','','','','','','','2024-12-19 (16:30:46)','GENERAR MENSUALIDAD/JARA URGILES JOSE FRANCISCO HORACIO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(154,'ventacancelar','','','','','','','','','','','','','2024-12-27 (15:52:46)','CANCELAR REGISTRO//15/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(155,'ventacancelar','','','','','','','','','','','','','2024-12-27 (17:01:54)','CANCELAR REGISTRO//549/2100155078/mal ingresado','','0.00','0','0','0','0','25','0','0','0','0','0'),(156,'ventacancelar','','','','','','','','','','','','','2024-12-27 (17:02:18)','CANCELAR REGISTRO//550/2100155078/mal ingresado','','0.00','0','0','0','0','30','0','0','0','0','0'),(157,'ventaspendientes','','','','','','','','','','','','','2024-12-27 (17:03:05)','GENERAR MENSUALIDAD/JAIME WILFRIDO ANGUISACA PRADO/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(158,'ventaspendientes','','','','','','','','','','','','','2024-12-27 (17:03:33)','GENERAR MENSUALIDAD/JAIME WILFRIDO ANGUISACA PRADO/Sin Documento/000/000','10.87','1.63','0','0','0','0','12.50','0','0','0','0','0'),(159,'ventaspendientes','','','','','','','','','','','','','2024-12-27 (17:06:16)','GENERAR MENSUALIDAD/JAIME WILFRIDO ANGUISACA PRADO/Sin Documento/000/000','10.87','1.63','0','0','0','0','12.50','0','0','0','0','0'),(160,'ventaspendientes','','','','','','','','','','','','','2024-12-27 (17:43:48)','GENERAR MENSUALIDAD/PACHECO PACHECO OSCAR TOMAS/Sin Documento/000/000','10.87','1.63','0','0','0','0','12.50','0','0','0','0','0'),(161,'ventacancelar','','','','','','','','','','','','','2025-01-07 (12:46:57)','CANCELAR REGISTRO//363/2100155078/ya no esta cliente','','0.00','0','0','0','0','25','0','0','0','0','0'),(162,'ventacancelar','','','','','','','','','','','','','2025-01-07 (12:47:33)','CANCELAR REGISTRO//644/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(163,'ventaanular','','','','','','','','','','','','','2025-01-07 (12:48:01)','ANULAR FACTURA/0195102104001/000000400/2100155078/mal ingresado contrato','17.39','0.00','0','0','0','0','20.00','0','0','0','0','0'),(164,'ventacancelar','','','','','','','','','','','','','2025-01-07 (12:52:56)','CANCELAR REGISTRO//464/2100155078/mal ingresado contrato','','0.00','0','0','0','0','20','0','0','0','0','0'),(165,'ventacancelar','','','','','','','','','','','','','2025-01-07 (12:53:24)','CANCELAR REGISTRO//513/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(166,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:29:47)','CANCELAR REGISTRO//656/2100155078/ya no esta cliente','','0.00','0','0','0','0','15','0','0','0','0','0'),(167,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:30:06)','CANCELAR REGISTRO//524/2100155078/ya no esta cliente','','0.00','0','0','0','0','15','0','0','0','0','0'),(168,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:30:25)','CANCELAR REGISTRO//372/2100155078/ya no esta cliente','','0.00','0','0','0','0','15','0','0','0','0','0'),(169,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:39:07)','CANCELAR REGISTRO//680/2100155078/ya no esta cliente','','0.00','0','0','0','0','25','0','0','0','0','0'),(170,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:39:23)','CANCELAR REGISTRO//546/2100155078/ya no esta cliente','','0.00','0','0','0','0','25','0','0','0','0','0'),(171,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:44:21)','CANCELAR REGISTRO//116/2100155078/venta de negocio','','0.00','0','0','0','0','15','0','0','0','0','0'),(172,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:44:39)','CANCELAR REGISTRO//280/2100155078/venta de negocio','','0.00','0','0','0','0','15','0','0','0','0','0'),(173,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:57:29)','CANCELAR REGISTRO//561/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(174,'ventacancelar','','','','','','','','','','','','','2025-01-07 (15:58:09)','CANCELAR REGISTRO//697/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(175,'ventacancelar','','','','','','','','','','','','','2025-01-07 (16:03:24)','CANCELAR REGISTRO//698/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(176,'ventacancelar','','','','','','','','','','','','','2025-01-07 (16:13:51)','CANCELAR REGISTRO//562/2100155078/mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(177,'ventacancelar','','','','','','','','','','','','','2025-01-07 (16:39:25)','CANCELAR REGISTRO//415/2100155078/paga a sistelcell','','0.00','0','0','0','0','15','0','0','0','0','0'),(178,'ventacancelar','','','','','','','','','','','','','2025-01-07 (16:39:27)','CANCELAR REGISTRO//415/2100155078/paga a sistelcell','','0.00','0','0','0','0','15','0','0','0','0','0'),(179,'ventacancelar','','','','','','','','','','','','','2025-01-07 (16:49:50)','CANCELAR REGISTRO//741/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(180,'ventacancelar','','','','','','','','','','','','','2025-01-07 (16:50:07)','CANCELAR REGISTRO//601/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(181,'ventacancelar','','','','','','','','','','','','','2025-01-08 (10:57:02)','CANCELAR REGISTRO//198/2100155078/ya no esta cliente','','0.00','0','0','0','0','25','0','0','0','0','0'),(182,'ventacancelar','','','','','','','','','','','','','2025-01-08 (10:57:17)','CANCELAR REGISTRO//305/2100155078/ya no esta cliente','','0.00','0','0','0','0','25','0','0','0','0','0'),(183,'ventacancelar','','','','','','','','','','','','','2025-01-08 (10:57:29)','CANCELAR REGISTRO//419/2100155078/ya no esta cliente','','0.00','0','0','0','0','25','0','0','0','0','0'),(184,'ventacancelar','','','','','','','','','','','','','2025-01-08 (10:57:45)','CANCELAR REGISTRO//575/2100155078/ya no esta cliente','','0.00','0','0','0','0','25','0','0','0','0','0'),(185,'ventacancelar','','','','','','','','','','','','','2025-01-08 (10:58:01)','CANCELAR REGISTRO//712/2100155078/ya no esta cliente','','0.00','0','0','0','0','25','0','0','0','0','0'),(186,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:11:21)','CANCELAR REGISTRO//718/2100155078/servicio cortado','','0.00','0','0','0','0','15','0','0','0','0','0'),(187,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:12:02)','CANCELAR REGISTRO//684/2100155078/servicio cortado','','0.00','0','0','0','0','15','0','0','0','0','0'),(188,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:12:22)','CANCELAR REGISTRO//683/2100155078/servicio cortado','','0.00','0','0','0','0','20','0','0','0','0','0'),(189,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:13:18)','CANCELAR REGISTRO//608/2100155078/plan mal ingresado','','0.00','0','0','0','0','30','0','0','0','0','0'),(190,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:15:57)','CANCELAR REGISTRO//747/2100155078/ya no esta cliente','','0.00','0','0','0','0','15','0','0','0','0','0'),(191,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:16:13)','CANCELAR REGISTRO//607/2100155078/ya no esta cliente','','0.00','0','0','0','0','15','0','0','0','0','0'),(192,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:18:34)','CANCELAR REGISTRO//756/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(193,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:18:53)','CANCELAR REGISTRO//614/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(194,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:19:24)','CANCELAR REGISTRO//459/2100155078/ya no esta cliente','','0.00','0','0','0','0','15','0','0','0','0','0'),(195,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:19:37)','CANCELAR REGISTRO//618/2100155078/ya no esta cliente','','0.00','0','0','0','0','15','0','0','0','0','0'),(196,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:19:50)','CANCELAR REGISTRO//760/2100155078/ya no esta cliente','','0.00','0','0','0','0','15','0','0','0','0','0'),(197,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:51:38)','CANCELAR REGISTRO//207/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(198,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:51:53)','CANCELAR REGISTRO//317/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(199,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:52:12)','CANCELAR REGISTRO//431/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(200,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:52:26)','CANCELAR REGISTRO//589/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(201,'ventacancelar','','','','','','','','','','','','','2025-01-08 (11:52:48)','CANCELAR REGISTRO//727/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0'),(202,'ventacancelar','','','','','','','','','','','','','2025-01-08 (12:01:00)','CANCELAR REGISTRO//716/2100155078/servicio cortado','','0.00','0','0','0','0','20','0','0','0','0','0'),(203,'ventacancelar','','','','','','','','','','','','','2025-01-08 (12:07:30)','CANCELAR REGISTRO//651/2100155078/plan mal ingresado','','0.00','0','0','0','0','20','0','0','0','0','0'),(204,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:22:06)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(205,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:22:15)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(206,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:22:26)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(207,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:22:40)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(208,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:22:52)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(209,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:26:18)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(210,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:26:29)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(211,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:26:54)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(212,'ventaspendientes','','','','','','','','','','','','','2025-01-21 (16:27:05)','GENERAR MENSUALIDAD/PINTADO TENESACA MARIA MERCEDES/Sin Documento/000/000','13.04','1.96','0','0','0','0','15.00','0','0','0','0','0'),(213,'ventaspendientes','','','','','','','','','','','','','2025-01-22 (12:47:31)','GENERAR MENSUALIDAD/QUIHPI VINUEZA HUGO MARCELO/Sin Documento/000/000','17.39','2.61','0','0','0','0','20.00','0','0','0','0','0'),(214,'ventacancelar','','','','','','','','','','','','','2025-01-22 (16:00:57)','CANCELAR REGISTRO//679/2100155078/ya no esta cliente','','0.00','0','0','0','0','20','0','0','0','0','0');
/*!40000 ALTER TABLE `diario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dispositivos`
--

DROP TABLE IF EXISTS `dispositivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dispositivos` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `modelo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `contrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dispositivos`
--

LOCK TABLES `dispositivos` WRITE;
/*!40000 ALTER TABLE `dispositivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `dispositivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dispositivos_empresa`
--

DROP TABLE IF EXISTS `dispositivos_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dispositivos_empresa` (
  `id` int NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `direccion` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `pais` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `referencial` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tarjeta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ubicacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dispositivos_empresa`
--

LOCK TABLES `dispositivos_empresa` WRITE;
/*!40000 ALTER TABLE `dispositivos_empresa` DISABLE KEYS */;
INSERT INTO `dispositivos_empresa` VALUES (25,'1','1',0,0,'593','1','192','1','principal','2','manga','1','1');
/*!40000 ALTER TABLE `dispositivos_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento_reservado`
--

DROP TABLE IF EXISTS `documento_reservado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documento_reservado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `documento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=664 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento_reservado`
--

LOCK TABLES `documento_reservado` WRITE;
/*!40000 ALTER TABLE `documento_reservado` DISABLE KEYS */;
INSERT INTO `documento_reservado` VALUES (656,'000000629','001','001','Pago de Factura','tati1703.');
/*!40000 ALTER TABLE `documento_reservado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento_reservadocompra`
--

DROP TABLE IF EXISTS `documento_reservadocompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documento_reservadocompra` (
  `id` int NOT NULL AUTO_INCREMENT,
  `documento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento_reservadocompra`
--

LOCK TABLES `documento_reservadocompra` WRITE;
/*!40000 ALTER TABLE `documento_reservadocompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento_reservadocompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equiposolt`
--

DROP TABLE IF EXISTS `equiposolt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equiposolt` (
  `cliente` varchar(512) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contrato` varchar(512) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombre` varchar(512) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_estado',
  `tarjeta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_tarjeta',
  `tarjetaoriginal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_tarjeta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equiposolt`
--

LOCK TABLES `equiposolt` WRITE;
/*!40000 ALTER TABLE `equiposolt` DISABLE KEYS */;
/*!40000 ALTER TABLE `equiposolt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facebook`
--

DROP TABLE IF EXISTS `facebook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facebook` (
  `id` int NOT NULL,
  `numerowhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `tokenwhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `instanciawhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facebook`
--

LOCK TABLES `facebook` WRITE;
/*!40000 ALTER TABLE `facebook` DISABLE KEYS */;
INSERT INTO `facebook` VALUES (1,'1','1','1');
/*!40000 ALTER TABLE `facebook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturero`
--

DROP TABLE IF EXISTS `facturero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `facturero` (
  `id` int NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturero`
--

LOCK TABLES `facturero` WRITE;
/*!40000 ALTER TABLE `facturero` DISABLE KEYS */;
INSERT INTO `facturero` VALUES (1,'001','001');
/*!40000 ALTER TABLE `facturero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotostemp`
--

DROP TABLE IF EXISTS `fotostemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotostemp` (
  `uno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `dos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `tres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotostemp`
--

LOCK TABLES `fotostemp` WRITE;
/*!40000 ALTER TABLE `fotostemp` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotostemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `generar_codigo`
--

DROP TABLE IF EXISTS `generar_codigo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `generar_codigo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `observacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ocupado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `motivousuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generar_codigo`
--

LOCK TABLES `generar_codigo` WRITE;
/*!40000 ALTER TABLE `generar_codigo` DISABLE KEYS */;
INSERT INTO `generar_codigo` VALUES (1,'233592581236596','retert','demo','2024-09-06 (13:02:17)','no','0'),(2,'53576693747523','CLIENTE RETIRADO SOLO SALIO, NO DIO RAZON DE RETIRO','demo','2024-10-10 (12:14:56)','si','mejor futuro'),(3,'175822069652012','PARA DAR DE BAJA CONTRATOS QUE YA LA GENTE \r\nHA DESAPARECIDO','12345','2024-12-27 (17:26:30)','si','sale '),(4,'289504535017035','Dar de baja facturas','12345','2025-01-07 (15:52:41)','si','cambio de domicilio'),(5,'289504535017035','Dar de baja facturas','12345','2025-01-07 (15:52:51)','si','cambio de domicilio'),(6,'167029690045472','Borrado clientes','12345','2025-01-07 (16:05:33)','si','moroso'),(7,'167029690045472','Borrado clientes','12345','2025-01-07 (16:05:42)','si','moroso'),(8,'167029690045472','Borrado clientes','12345','2025-01-07 (16:05:42)','si','moroso'),(9,'242843931160005','Borrado de clientes','12345','2025-01-07 (16:16:36)','si','moroso'),(10,'242843931160005','Borrado de clientes','12345','2025-01-07 (16:16:45)','si','moroso'),(11,'242843931160005','Borrado de clientes','12345','2025-01-07 (16:16:45)','si','moroso'),(12,'32091047777605','Borrado de clientes','12345','2025-01-07 (16:20:51)','si','moroso'),(13,'32091047777605','Borrado de clientes','12345','2025-01-07 (16:21:01)','si','moroso'),(14,'44345983565228','Borrado de clientes','12345','2025-01-07 (16:24:11)','si','moroso'),(15,'44345983565228','Borrado de clientes','12345','2025-01-07 (16:24:21)','si','moroso'),(16,'44345983565228','Borrado de clientes','12345','2025-01-07 (16:24:21)','si','moroso'),(17,'245220183899479','Borrado de clientes','12345','2025-01-07 (16:38:16)','si','venta de local'),(18,'245220183899479','Borrado de clientes','12345','2025-01-07 (16:38:26)','si','venta de local'),(19,'245220183899479','Borrado de clientes','12345','2025-01-07 (16:38:26)','si','venta de local'),(20,'55432741097308','Borrado de clientes','12345','2025-01-07 (16:53:43)','si','moroso'),(21,'55432741097308','Borrado de clientes','12345','2025-01-07 (16:53:53)','si','moroso'),(22,'55432741097308','Borrado de clientes','12345','2025-01-07 (16:53:53)','si','moroso'),(23,'55432741097308','Borrado de clientes','12345','2025-01-07 (16:53:53)','si','moroso'),(24,'34192614622402','Borrado de clientes','12345','2025-01-07 (16:59:46)','si','mal el servicio'),(25,'9424531350101','Borrado de clientes','12345','2025-01-08 (11:52:20)','si','cambio de domicilio'),(26,'9424531350101','Borrado de clientes','12345','2025-01-08 (11:52:30)','si','cambio de domicilio'),(27,'111739097295303','Borrado de clientes','12345','2025-01-08 (11:54:06)','si','moroso'),(28,'111739097295303','Borrado de clientes','12345','2025-01-08 (11:54:16)','si','moroso'),(29,'70915376004813','Borrado de clientes','12345','2025-01-08 (11:55:37)','si','moroso'),(30,'106192114940737','Borrado de clientes','12345','2025-01-08 (11:56:16)','si','cambio de domicilio'),(31,'106192114940737','Borrado de clientes','12345','2025-01-08 (11:56:25)','si','cambio de domicilio'),(32,'106192114940737','Borrado de clientes','12345','2025-01-08 (11:56:25)','si','cambio de domicilio'),(33,'106192114940737','Borrado de clientes','12345','2025-01-08 (11:56:25)','si','cambio de domicilio'),(34,'197371543544818','Borrado de clientes','12345','2025-01-08 (11:57:20)','si','no da motivo'),(35,'92738206075419','Borrado de clientes','12345','2025-01-08 (11:58:15)','si','va a suspender 2 meses'),(36,'207807826756350','prueba de suspencion de contrato','demo','2026-05-07 (16:50:32)','si','prueba e siuspencion');
/*!40000 ALTER TABLE `generar_codigo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `google_maps_php_mysql`
--

DROP TABLE IF EXISTS `google_maps_php_mysql`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `google_maps_php_mysql` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `lat` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `lng` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `pais` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'Sin_Asignar',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `modelo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contrato` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `google_maps_php_mysql`
--

LOCK TABLES `google_maps_php_mysql` WRITE;
/*!40000 ALTER TABLE `google_maps_php_mysql` DISABLE KEYS */;
/*!40000 ALTER TABLE `google_maps_php_mysql` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `graficar_contratos`
--

DROP TABLE IF EXISTS `graficar_contratos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `graficar_contratos` (
  `id` int NOT NULL,
  `date_at` varchar(255) COLLATE utf8mb4_general_ci DEFAULT '0',
  `val` varchar(255) COLLATE utf8mb4_general_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `graficar_contratos`
--

LOCK TABLES `graficar_contratos` WRITE;
/*!40000 ALTER TABLE `graficar_contratos` DISABLE KEYS */;
/*!40000 ALTER TABLE `graficar_contratos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imprimir`
--

DROP TABLE IF EXISTS `imprimir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imprimir` (
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `precio_unitario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `precio_total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `descuento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `anticipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `entrega` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imprimir`
--

LOCK TABLES `imprimir` WRITE;
/*!40000 ALTER TABLE `imprimir` DISABLE KEYS */;
/*!40000 ALTER TABLE `imprimir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imprimir_recaudacion`
--

DROP TABLE IF EXISTS `imprimir_recaudacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imprimir_recaudacion` (
  `factura` int NOT NULL DEFAULT '0',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `concepto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `unico` int NOT NULL AUTO_INCREMENT,
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imprimir_recaudacion`
--

LOCK TABLES `imprimir_recaudacion` WRITE;
/*!40000 ALTER TABLE `imprimir_recaudacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `imprimir_recaudacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imprimir_recaudacion_ats`
--

DROP TABLE IF EXISTS `imprimir_recaudacion_ats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imprimir_recaudacion_ats` (
  `unico` int NOT NULL AUTO_INCREMENT,
  `factura` int NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `concepto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `id` int NOT NULL DEFAULT '0',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `ci` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `subtotal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imprimir_recaudacion_ats`
--

LOCK TABLES `imprimir_recaudacion_ats` WRITE;
/*!40000 ALTER TABLE `imprimir_recaudacion_ats` DISABLE KEYS */;
/*!40000 ALTER TABLE `imprimir_recaudacion_ats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imprimir_recaudacioncompra`
--

DROP TABLE IF EXISTS `imprimir_recaudacioncompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imprimir_recaudacioncompra` (
  `unico` int NOT NULL AUTO_INCREMENT,
  `factura` int NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `concepto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `id` int NOT NULL DEFAULT '0',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imprimir_recaudacioncompra`
--

LOCK TABLES `imprimir_recaudacioncompra` WRITE;
/*!40000 ALTER TABLE `imprimir_recaudacioncompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `imprimir_recaudacioncompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imprimir_reporte_institucion`
--

DROP TABLE IF EXISTS `imprimir_reporte_institucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imprimir_reporte_institucion` (
  `unico` int NOT NULL AUTO_INCREMENT,
  `factura` int NOT NULL DEFAULT '0',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `concepto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `id` int NOT NULL DEFAULT '0',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `ci` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `subtotal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imprimir_reporte_institucion`
--

LOCK TABLES `imprimir_reporte_institucion` WRITE;
/*!40000 ALTER TABLE `imprimir_reporte_institucion` DISABLE KEYS */;
/*!40000 ALTER TABLE `imprimir_reporte_institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imprimirisp`
--

DROP TABLE IF EXISTS `imprimirisp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imprimirisp` (
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `valor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imprimirisp`
--

LOCK TABLES `imprimirisp` WRITE;
/*!40000 ALTER TABLE `imprimirisp` DISABLE KEYS */;
/*!40000 ALTER TABLE `imprimirisp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jellyfin`
--

DROP TABLE IF EXISTS `jellyfin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jellyfin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `api` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jellyfin`
--

LOCK TABLES `jellyfin` WRITE;
/*!40000 ALTER TABLE `jellyfin` DISABLE KEYS */;
INSERT INTO `jellyfin` VALUES (1,'7e7733aeb68d4ea2aaef995fa6692a45','http://192.168.0.23:30013','sistema');
/*!40000 ALTER TABLE `jellyfin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin mail',
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin contrasena',
  `logo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin logo',
  `cuentas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin cuentas',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'http://45.225.107.57',
  `pago` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `inicioservicio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_imagen',
  `finservicio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_imagen',
  `contrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin imagen',
  `nota` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contrasenaapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail`
--

LOCK TABLES `mail` WRITE;
/*!40000 ALTER TABLE `mail` DISABLE KEYS */;
INSERT INTO `mail` VALUES (1,'nelo416yahoocom@gmail.com','uzbzkauryxwubbch','../images/empresa/logo.png','../images/empresa/logo.png','https://45.236.151.150:444/optimus_global_telecom','../images/empresa/logo.png','../images/empresa/logo.png','../images/empresa/logo.png','../images/empresa/logo.png','../images/empresa/LOGO_ITG.png','');
/*!40000 ALTER TABLE `mail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrar`
--

DROP TABLE IF EXISTS `migrar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrar` (
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `plan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `valor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrar`
--

LOCK TABLES `migrar` WRITE;
/*!40000 ALTER TABLE `migrar` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mikrotik`
--

DROP TABLE IF EXISTS `mikrotik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mikrotik` (
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `corte` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `backup` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `creacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `reactivacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `reinicio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `eliminacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_nodo',
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mikrotik`
--

LOCK TABLES `mikrotik` WRITE;
/*!40000 ALTER TABLE `mikrotik` DISABLE KEYS */;
INSERT INTO `mikrotik` VALUES ('192.168.88.1','no','Vacio','Vacio','admin','Vacio','Vacio','Vacio','Optimus2023','Cuenca'),('45.236.151.130','0','0','0','sistema','0','0','0','Global*2024','Biblian');
/*!40000 ALTER TABLE `mikrotik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mikrotikclientes`
--

DROP TABLE IF EXISTS `mikrotikclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mikrotikclientes` (
  `nombreuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombredos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombretres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombrecuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mikrotikclientes`
--

LOCK TABLES `mikrotikclientes` WRITE;
/*!40000 ALTER TABLE `mikrotikclientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mikrotikclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitoreo`
--

DROP TABLE IF EXISTS `monitoreo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `monitoreo` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `dispositivo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitoreo`
--

LOCK TABLES `monitoreo` WRITE;
/*!40000 ALTER TABLE `monitoreo` DISABLE KEYS */;
/*!40000 ALTER TABLE `monitoreo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `multas`
--

DROP TABLE IF EXISTS `multas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `multas` (
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `valor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `multas`
--

LOCK TABLES `multas` WRITE;
/*!40000 ALTER TABLE `multas` DISABLE KEYS */;
/*!40000 ALTER TABLE `multas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nodo`
--

DROP TABLE IF EXISTS `nodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nodo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `provincia` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `canton` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `parroquia` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nodo`
--

LOCK TABLES `nodo` WRITE;
/*!40000 ALTER TABLE `nodo` DISABLE KEYS */;
INSERT INTO `nodo` VALUES (36,'CUENCA','CUENCA','AZUAY','CUENCA','BAÑOS');
/*!40000 ALTER TABLE `nodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notasventas`
--

DROP TABLE IF EXISTS `notasventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notasventas` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `numero` int NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `propietario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ruc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `autorizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `preciounitario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `preciototal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `subtotal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `vencimiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `descuento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pendiente',
  `forma_pago` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombrecliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notasventas`
--

LOCK TABLES `notasventas` WRITE;
/*!40000 ALTER TABLE `notasventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `notasventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notasventastemporal`
--

DROP TABLE IF EXISTS `notasventastemporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notasventastemporal` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notasventastemporal`
--

LOCK TABLES `notasventastemporal` WRITE;
/*!40000 ALTER TABLE `notasventastemporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `notasventastemporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `olt`
--

DROP TABLE IF EXISTS `olt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `olt` (
  `unico` int NOT NULL AUTO_INCREMENT,
  `olt` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `vlan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `ipinicio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `olt`
--

LOCK TABLES `olt` WRITE;
/*!40000 ALTER TABLE `olt` DISABLE KEYS */;
INSERT INTO `olt` VALUES (1,'0/1/0','2000','10.20.0'),(2,'0/1/1','2001','10.20.1'),(3,'0/1/2','2002','10.20.2'),(4,'0/1/3','2003','10.20.3'),(5,'0/1/4','2004','10.20.4'),(6,'0/1/5','2005','10.20.5'),(7,'0/1/6','2006','10.20.6'),(8,'0/1/7','2007','10.20.7'),(9,'0/1/8','2008','10.20.8'),(10,'0/1/9','2009','10.20.9'),(11,'0/1/10','2010','10.20.10'),(12,'0/1/11','2011','10.20.11'),(13,'0/1/12','2012','10.20.12'),(14,'0/1/13','2013','10.20.13'),(15,'0/1/14','2014','10.20.14'),(16,'0/1/15','2015','10.20.15'),(17,'0/2/0','2016','10.20.16'),(18,'0/2/1','2017','10.20.17'),(19,'0/2/2','2018','10.20.18'),(20,'0/2/3','2019','10.20.19'),(21,'0/2/4','2020','10.20.20'),(22,'0/2/5','2021','10.20.21'),(23,'0/2/6','2022','10.20.22'),(24,'0/2/7','2023','10.20.23'),(25,'0/2/8','2024','10.20.24'),(26,'0/2/9','2025','10.20.25'),(27,'0/2/10','2026','10.20.26'),(28,'0/2/11','2027','10.20.27'),(29,'0/2/12','2028','10.20.28'),(30,'0/2/13','2029','10.20.29'),(31,'0/2/14','2030','10.20.30'),(32,'0/2/15','2031','10.20.31');
/*!40000 ALTER TABLE `olt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `olt_conexion`
--

DROP TABLE IF EXISTS `olt_conexion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `olt_conexion` (
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `corte` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `backup` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `creacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `reactivacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `reinicio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `eliminacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'No',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_nodo',
  UNIQUE KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `olt_conexion`
--

LOCK TABLES `olt_conexion` WRITE;
/*!40000 ALTER TABLE `olt_conexion` DISABLE KEYS */;
INSERT INTO `olt_conexion` VALUES ('0','0','0','0','0','0','0','0','No','Biblian'),('10.106.1.118','0','0','0','pedro.gil','0','0','pedro0804','No','Cuenca');
/*!40000 ALTER TABLE `olt_conexion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oltclientes`
--

DROP TABLE IF EXISTS `oltclientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oltclientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `vlan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `lugar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `subida` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `bajada` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oltclientes`
--

LOCK TABLES `oltclientes` WRITE;
/*!40000 ALTER TABLE `oltclientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oltclientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagos`
--

DROP TABLE IF EXISTS `pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mes` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `registrado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagos`
--

LOCK TABLES `pagos` WRITE;
/*!40000 ALTER TABLE `pagos` DISABLE KEYS */;
INSERT INTO `pagos` VALUES (1,'2024-07','cancelado','0102917689'),(4,'2023-01','pagado','o1o291689'),(6,'2023-02','cancelado','Megalink2020'),(7,'2023-03','cancelado','Megalink2020'),(8,'2023-04','cancelado','Megalink2020'),(9,'2023-05','cancelado','Megalink2020'),(10,'2023-05','cancelado','Megalink2020'),(11,'2023-06','cancelado','Megalink2020'),(12,'2023-07','cancelado','Megalink2020'),(13,'2023-08','cancelado','Megalink2020'),(14,'2023-11','cancelado','nelo416'),(15,'2023-12','cancelado','0102917689'),(16,'2024-01','cancelado','0102917689'),(17,'2024-04','cancelado','0102317689'),(18,'2024-06','cancelado','0102317689'),(19,'2024-11','cancelado','0102917689');
/*!40000 ALTER TABLE `pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peliculas` (
  `id_categoria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `id_peliculas` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `pelicula_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `portada_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peliculas`
--

LOCK TABLES `peliculas` WRITE;
/*!40000 ALTER TABLE `peliculas` DISABLE KEYS */;
/*!40000 ALTER TABLE `peliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `nombres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `apellidos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `telefono1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `telefono2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/personal/silueta.jpg',
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `idunico` int NOT NULL AUTO_INCREMENT,
  `serie` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `uno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `dos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `tres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `seis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `siete` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `ocho` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `nueve` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `diez` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `once` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `doce` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `trece` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `catorce` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `quince` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `diezyseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `diezysiete` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `diezyocho` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `diezynueve` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinte` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteyuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteydos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteytres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteycuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteycinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteyseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteysiete` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteyocho` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `veinteynueve` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treinta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintayuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintaydos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintaytres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintaycuatro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintaycinco` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintayseis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintaysiete` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintayocho` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `treintaynueve` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarenta` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentayuno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentaydos` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentaytres` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentaycuatro` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentaycinco` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentayseis` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentaysiete` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentayocho` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cuarentaynueve` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cincuenta` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cincuentayuno` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cincuentaydos` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `cincuentaytres` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `exportar` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci DEFAULT '0',
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'activo',
  `cambiarprecio` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  PRIMARY KEY (`idunico`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES ('demo','demo','demo demo','demo demo','demo','996629720','','soldaniela416@gmail.com ','2023-07-27 (15:31:29)','../images/personal/silueta.jpg','admin',48,'001','001','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','demo','demo','activo','no'),('vendedor','vendedor','vendedor','vendedor','vendedor','0996629720','','sin mail','2023-05-09 (10:25:49)','../images/personal/silueta.jpg','vendedor',49,'001','001','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','vendedor','vendedor','activo','no'),('6','6','6','6','6','6','','6','2023-08-29 (16:45:50)','../images/personal/silueta.jpg','admin',51,'001','001','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','prueba','prueba','activo','no'),('nelo416','nelo416','nelo41','6','.','.','.','.','2023-09-12 (15:39:30)','../images/personal/silueta.jpg','admin',52,'001','001','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','nelo416','Optimusdemo2023','activo','no'),('cajera','cajera','cajera','cajera','dd','dd','','dd','2023-09-18 (10:00:13)','../images/personal/silueta.jpg','cajera',53,'001','001','no','no','no','no','no','no','no','no','no','no','no','si','si','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','si','si','no','no','no','no','no','no','si','no','no','no','no','no','no','no','no','no','no','cajera','cajera','activo','no'),('Grupo1','Grupo1','Grupo1','Grupo1','Grupo 1','99999999','','Sin Mail','2024-08-15 (11:20:36)','../images/personal/silueta.jpg','instalador',55,'001','001','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','Grupo1','Grupo1','activo','no'),('0103597130','0103597130','PEDRO DAVID','GIL  PEÑAFIEL','Eucaliptos 175 y Alamos','992950431','','pedgil@hotmail.com','2024-10-12 (15:49:57)','../images/personal/silueta.jpg','admin',56,'001','001','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','no','si','si','si','si','si','si','si','si','pgil','12345','activo','si'),(' 0106604333',' 0106604333','TATIANA ZAMORA','TATIANA ZAMORA','gasolinera','0958980600','',' tatisfernanda-1725@hotmail.com','2024-09-25 (15:51:39)','../images/personal/silueta.jpg','admin',57,'001','001','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','tzamora','tati1703.','activo','si'),('0104642731','0104642731','DARWIN ADRIAN','ARIAS LUZURIUAGA','SIN DIRECION','960877322','','adrianarias@hotmail.com','2024-09-27 (16:38:28)','../images/personal/silueta.jpg','cajera',58,'001','001','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','adri0109','31080209','activo','no'),('0302227194','0302227194','Diego Rolando','Sigüenza González','Biblián via a nazon','0998424305','','diegodjone12@gmail.com','2024-12-18 (09:01:05)','../images/personal/silueta.jpg','admin',59,'001','001','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','si','diego123','0302227194','activo','no'),('2','2','2','2','2','2','2','2','2026-05-11 (16:24:06)','../images/personal/silueta.jpg','admin',60,'001','001','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','2','2','activo','no'),('0102917689','0102917689','Optimus','Optimus','Optimus','0996629720','','soldaniela416@gmail.com','2026-06-10 (18:01:52)','../images/personal/silueta.jpg','admin',61,'001','001','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','no','optimus','optimus','activo','no');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portadas`
--

DROP TABLE IF EXISTS `portadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portadas` (
  `id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `archivo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portadas`
--

LOCK TABLES `portadas` WRITE;
/*!40000 ALTER TABLE `portadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `portadas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prefjo`
--

DROP TABLE IF EXISTS `prefjo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prefjo` (
  `pais` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `prefijo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `unico` int NOT NULL,
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prefjo`
--

LOCK TABLES `prefjo` WRITE;
/*!40000 ALTER TABLE `prefjo` DISABLE KEYS */;
INSERT INTO `prefjo` VALUES ('Ecuador','593',1,'Sin_asignar');
/*!40000 ALTER TABLE `prefjo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `serie` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `fechaing` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `periodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.jpg',
  `precio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `categoria` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `habitaciones` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `banos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `autos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_asignar',
  `facturar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `metraje` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `megass` int NOT NULL DEFAULT '0',
  `megasb` int NOT NULL DEFAULT '0',
  `tipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `producto_unico` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `pct` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `preciouno` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `preciodos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `preciotres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `contabilidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `servicio` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '10',
  `grabaiva` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no',
  `preciocompra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `linkcobro` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `minimo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `maximo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES ('001','Plan Basico','no','2024-09-03 (10:47:32)','001','mensual','0','../images/silueta.jpg','13.04','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',100,100,'SERVICIOTECNICO','no','no','13.04','8','1','gastofijo','10','no','0','0','0','0'),('aaaaaaaaa','aaaaaaaaa','si','2024-09-25 (10:32:33)','aaaaaaaaa','normal','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',0,0,'VARIOS','si','no','8','0','0','gastofijo','10','no','0','0','0','0'),('conveniototal','CONVENIO TOTAL','no','2024-09-06 (11:53:33)','conveniototal','mensual','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',200,200,'VARIOS','no','no','0','0','0','0','10','no','0','0','0','0'),('HG8310M','HG8310M','si','2024-09-18 (09:19:22)','HG8310M','normal','0','../images/silueta.jpg','86.9565','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','si','0',0,0,'SERVICIOTECNICO','si','no','0','0','0','gastofijo','10','no','0','0','5','30'),('hhhh','hhhh','no','2024-12-01 (09:52:24)','hhhh','mensual','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','si','0',200,200,'VARIOS','no','no','0','0','0','gastofijo','10','no','0','0','100','0'),('MR50G','MERCUSYS MR50G','si','2024-09-25 (16:19:05)','MR50G','normal','5','../images/silueta.jpg','20','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','si','0',0,0,'SERVICIOTECNICO','si','no','20','0','0','gastofijo','10','no','0','0','5','15'),('Plan2','Plan2','no','2024-08-26 (16:51:31)','Plan2','mensual','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',200,200,'PLANESMENSUALES','no','no','17.39','0','0','gastofijo','10','no','0','0','0','0'),('plan2des','Plan 2 Descuento','no','2024-09-06 (11:51:19)','plan2des','mensual','0','../images/silueta.jpg','8.70','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',200,200,'PLANESMENSUALES','no','no','8.70','0','0','gastofijo','10','no','0','0','0','0'),('plan3des','Plan 3 Descuento','no','2024-09-06 (12:29:56)','plan3des','mensual','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',300,300,'PLANESMENSUALES','no','no','10.87','0','0','gastofijo','10','no','0','0','0','0'),('Plan4','Plan4','no','2024-08-26 (16:50:54)','Plan4','mensual','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',400,400,'PLANESMENSUALES','no','no','26.09','0','0','gastofijo','10','no','0','0','0','0'),('plan4desc','Plan 4 Descuento','no','2024-09-06 (12:31:25)','plan4desc','mensual','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',400,400,'PLANESMENSUALES','no','no','13.04','0','0','gastofijo','10','no','0','0','0','0'),('Plan5','Plan5','no','2024-11-07 (11:59:30)','Plan5','mensual','0','../images/silueta.jpg','30.44','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',600,600,'PLANESMENSUALES','no','no','30.44','0','0','gastofijo','10','no','0','0','0','0'),('Plan6','Plan6','no','2024-08-26 (16:52:04)','Plan6','mensual','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',600,600,'PLANESMENSUALES','no','no','34.78','0','0','gastofijo','10','no','0','0','0','0'),('PlanConvenioTotal','Plan Convenio Total','no','2024-08-26 (16:52:42)','PlanConvenioTotal','mensual','0','../images/silueta.jpg','0','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','no','0',0,0,'PLANESMENSUALES','no','no','0','0','0','gastofijo','10','no','0','0','0','0'),('Plantres','Plan 3','no','2024-12-01 (09:50:36)','Plantres','mensual','0','../images/silueta.jpg','21.74','Sin_Asignar','Sin_asignar','Sin_Asignar','sin_asignar','si','0',301,301,'PLANESMENSUALES','no','no','21.74','0','0','gastofijo','10','no','0','0','0','0');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propaganda`
--

DROP TABLE IF EXISTS `propaganda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propaganda` (
  `id` int NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `telefono1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `procesado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `envio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `medio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fechaprocesado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fechahoy` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ciudad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propaganda`
--

LOCK TABLES `propaganda` WRITE;
/*!40000 ALTER TABLE `propaganda` DISABLE KEYS */;
/*!40000 ALTER TABLE `propaganda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `nombres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `apellidos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `telefono1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `telefono2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `saldo` int NOT NULL DEFAULT '0',
  `unico` int NOT NULL AUTO_INCREMENT,
  `isp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `proveedorisp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_nodo',
  UNIQUE KEY `codigo` (`codigo`),
  UNIQUE KEY `unico` (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES ('0102917689','0102917689','CARDENAS CAMPOS DANIEL TEODORO','','CONTROL SUR','0996629720','','soldaniela416@gmail.com','2025-01-27 (10:11:11)','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif',0,1,'0','0','Cuenca'),('Consumidorfinal','Consumidorfinal','Consumidor Final','','Consumidor Final','999','999','Sin@mail','2025-05-22 (10:20:10)','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif',0,2,'0','0','Biblian');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prueba`
--

DROP TABLE IF EXISTS `prueba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prueba` (
  `id` int NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prueba`
--

LOCK TABLES `prueba` WRITE;
/*!40000 ALTER TABLE `prueba` DISABLE KEYS */;
/*!40000 ALTER TABLE `prueba` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puestos`
--

DROP TABLE IF EXISTS `puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `puestos` (
  `unico` int NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puestos`
--

LOCK TABLES `puestos` WRITE;
/*!40000 ALTER TABLE `puestos` DISABLE KEYS */;
INSERT INTO `puestos` VALUES (3,'tecnico','Tecnico'),(4,'admin','admin'),(5,'cajera','cajera'),(6,'instalador','instalador'),(7,'vendedor','vendedor');
/*!40000 ALTER TABLE `puestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `accion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `saldo_anterior` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `saldo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `proveedor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `hora` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `bodega` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `seccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `unico` int NOT NULL AUTO_INCREMENT,
  `numerorecibo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Recibo',
  `serviciotecnico` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `observacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `codigoautorizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_codigo',
  `serieproducto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_serie',
  `descuento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES ('1','000000001','2026-04-23 (16:18:20)','pago','1','0','20','0102917689','prueba','demo','Pago de Factura','Vacio','Vacio','000000001',8,'Sin_Recibo','0','Vacio','001','001','sin_codigo','Sin_serie','0'),('1319','000000002','2026-04-23 (16:20:06)','pago','1','0','20','0102917689','prueba','demo','Pago de Factura','Vacio','Vacio','000000002',9,'Sin_Recibo','0','Vacio','001','001','sin_codigo','Sin_serie','0'),('1','1','2026-04-23 (17:40:07)','nuevo','0','0','0','Vacio','Vacio','demo','Vacio','Vacio','Vacio','Vacio',10,'Vacio','0','Vacio','Vacio','Vacio','sin_codigo','Sin_serie','0'),('0','0','2026-04-24 (09:18:21)','crear_factura','0','0','0','0102917689','0','0','0','0','0','0',11,'0','0','0','0','0','sin_codigo','Sin_serie','0'),('1321','000000002','2026-05-01 (23:06:35)','anular','1','0','20.00','0102917689','prueba','demo','Pago de Factura','Vacio','Vacio','000000002',12,'','0','','001','001','sin_codigo','Sin_serie','0'),('2','2','2026-05-11 (16:24:06)','nuevo','0','0','0','Sin_Asignar','Sin_Asignar','2','Sin_Asignar','Sin_asignar','Sin_Asignar','Sin_asignar',13,'Sin_Recibo','0','vacio','vacio','vacio','sin_codigo','Sin_serie','0'),('Sin_Asignar','Sin_Asignar','2026-05-11 (17:17:05)','nuevo','Sin_Asignar','Sin_Asignar','Sin_Asignar','Sin_Asignar','Sin_Asignar','demo','Sin_Asignar','Sin_asignar','Sin_Asignar','t',14,'Sin_Recibo','0','vacio','vacio','vacio','sin_codigo','Sin_serie','0'),('t','t','2026-05-11','ingreso','1','Vacio','100','Vacio','t','demo','prueba de ingreso','Vacio','Vacio','dfsd',15,'Vacio','0','Vacio','Vacio','Vacio','sin_codigo','Sin_serie','0'),('t','t','2026-05-11','ingreso','1','Vacio','100','Vacio','t','demo','prueba de ingreso','Vacio','Vacio','eewe',16,'Vacio','0','Vacio','Vacio','Vacio','sin_codigo','Sin_serie','0'),('0','0','2026-04-01(02:22:10)','crear_factura','0','0','0','0102917689','0','0','0','0','0','0',17,'0','0','0','0','0','sin_codigo','Sin_serie','0'),('0102917689','0102917689','2026-06-10 (18:01:52)','nuevo','0','0','0','Sin_Asignar','Sin_Asignar','optimus','Sin_Asignar','Sin_asignar','Sin_Asignar','Sin_asignar',18,'Sin_Recibo','0','vacio','vacio','vacio','sin_codigo','Sin_serie','0'),('1322','000000003','2026-06-10 (20:59:50)','pago','1','0','35.01','0102917689','4185778','optimus','Pago de Factura','Vacio','Vacio','000000003',19,'Sin_Recibo','0','Vacio','001','001','sin_codigo','Sin_serie','0'),('0','0','2026-05-01(09:29:07)','crear_factura','0','0','0','0102917689','0','0','0','0','0','0',20,'0','0','0','0','0','sin_codigo','Sin_serie','0'),('0','0','2026-06-01(08:09:39)','crear_factura','0','0','0','0102917689','0','0','0','0','0','0',21,'0','0','0','0','0','sin_codigo','Sin_serie','0'),('1324','000000001','2026-06-11 (08:39:34)','pago','1','0','35.01','0102917689','2100155078','optimus','Pago de Nota','Vacio','Vacio','000000001',22,'Sin_Recibo','0','Vacio','001','001','sin_codigo','Sin_serie','0'),('0','0','2026-06-22 (17:37:54)','crear_factura','0','0','0','0102917689','0','0','0','0','0','0',23,'0','0','0','0','0','sin_codigo','Sin_serie','0');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro_pagos`
--

DROP TABLE IF EXISTS `registro_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registro_pagos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ruc_ci` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nombres` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `direccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `telefono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `mail` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `url_image` varchar(900) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro_pagos`
--

LOCK TABLES `registro_pagos` WRITE;
/*!40000 ALTER TABLE `registro_pagos` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registroeliminados`
--

DROP TABLE IF EXISTS `registroeliminados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registroeliminados` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `accion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `saldo_anterior` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `saldo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `proveedor` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `hora` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `bodega` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `seccion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `unico` int NOT NULL,
  `numerorecibo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Recibo',
  `serviciotecnico` int NOT NULL DEFAULT '0',
  `observacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registroeliminados`
--

LOCK TABLES `registroeliminados` WRITE;
/*!40000 ALTER TABLE `registroeliminados` DISABLE KEYS */;
/*!40000 ALTER TABLE `registroeliminados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reportes_generados`
--

DROP TABLE IF EXISTS `reportes_generados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reportes_generados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_archivo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ruta_archivo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_generacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_generador` varchar(100) COLLATE utf8mb4_general_ci DEFAULT 'Sistema',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reportes_generados`
--

LOCK TABLES `reportes_generados` WRITE;
/*!40000 ALTER TABLE `reportes_generados` DISABLE KEYS */;
INSERT INTO `reportes_generados` VALUES (1,'lopam_20260608_114056.xls','../arcotel/lopam/lopam_20260608_114056.xls','2026-06-08 11:40:56','Sistema'),(2,'lopam_20260615_101316.xls','../arcotel/lopam/lopam_20260615_101316.xls','2026-06-15 10:13:16','Sistema'),(3,'lopam_20260622_213944.xls','../arcotel/lopam/lopam_20260622_213944.xls','2026-06-22 21:39:44','Sistema');
/*!40000 ALTER TABLE `reportes_generados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respaldo`
--

DROP TABLE IF EXISTS `respaldo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respaldo` (
  `id` int NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respaldo`
--

LOCK TABLES `respaldo` WRITE;
/*!40000 ALTER TABLE `respaldo` DISABLE KEYS */;
INSERT INTO `respaldo` VALUES (0,'optimus_global_telecom_2026-06-15_17-43-34.sql','15-06-2026 17:43:35'),(0,'optimus_global_telecom_2026-06-15_17-49-15.sql','15-06-2026 17:49:17'),(0,'optimus_global_telecom_2026-06-15_17-49-36.sql','15-06-2026 17:49:37'),(0,'optimus_global_telecom_2026-06-15_17-50-02.sql','15-06-2026 17:50:04');
/*!40000 ALTER TABLE `respaldo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retencion`
--

DROP TABLE IF EXISTS `retencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `retencion` (
  `fuente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retencion`
--

LOCK TABLES `retencion` WRITE;
/*!40000 ALTER TABLE `retencion` DISABLE KEYS */;
INSERT INTO `retencion` VALUES ('2.75','70');
/*!40000 ALTER TABLE `retencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolesconfiguracion`
--

DROP TABLE IF EXISTS `rolesconfiguracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rolesconfiguracion` (
  `unico` int NOT NULL,
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `salario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `iesspatronal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `iesspersonal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `fondosdereserva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `comicion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolesconfiguracion`
--

LOCK TABLES `rolesconfiguracion` WRITE;
/*!40000 ALTER TABLE `rolesconfiguracion` DISABLE KEYS */;
INSERT INTO `rolesconfiguracion` VALUES (3,'admin','600','10','10','10','no'),(4,'cajera','480','6','5','2','no'),(5,'tecnico','500','4','8','5','no'),(6,'instalador','200','7','5','1','no');
/*!40000 ALTER TABLE `rolesconfiguracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolesdepago`
--

DROP TABLE IF EXISTS `rolesdepago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rolesdepago` (
  `unico` int NOT NULL,
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `salario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `iesspatronal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `iesspersonal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `fondosdereserva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `adelantos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `comiciones` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `horasextrascomplementarias` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `horasextrassuplementarias` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `multas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `saldo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolesdepago`
--

LOCK TABLES `rolesdepago` WRITE;
/*!40000 ALTER TABLE `rolesdepago` DISABLE KEYS */;
/*!40000 ALTER TABLE `rolesdepago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `series` (
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `bodega` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `asignado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'disponible',
  `contrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `documento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `series`
--

LOCK TABLES `series` WRITE;
/*!40000 ALTER TABLE `series` DISABLE KEYS */;
/*!40000 ALTER TABLE `series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seriestemporal`
--

DROP TABLE IF EXISTS `seriestemporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seriestemporal` (
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `bodega` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `unico` int NOT NULL AUTO_INCREMENT,
  `documento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seriestemporal`
--

LOCK TABLES `seriestemporal` WRITE;
/*!40000 ALTER TABLE `seriestemporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `seriestemporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio_alta_nuevo`
--

DROP TABLE IF EXISTS `servicio_alta_nuevo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicio_alta_nuevo` (
  `unico` int NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `olt` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `puerto` int NOT NULL DEFAULT '0',
  `vlan` int NOT NULL DEFAULT '0',
  `ipgestion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `pon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `potencia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `problema` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `numerocliente` int NOT NULL DEFAULT '0',
  `puerto2` int NOT NULL DEFAULT '0',
  `megas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio_alta_nuevo`
--

LOCK TABLES `servicio_alta_nuevo` WRITE;
/*!40000 ALTER TABLE `servicio_alta_nuevo` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio_alta_nuevo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio_tecnico_oficina`
--

DROP TABLE IF EXISTS `servicio_tecnico_oficina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicio_tecnico_oficina` (
  `unico` int NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `pon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `potencia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `detalle` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio_tecnico_oficina`
--

LOCK TABLES `servicio_tecnico_oficina` WRITE;
/*!40000 ALTER TABLE `servicio_tecnico_oficina` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio_tecnico_oficina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviciotecnico`
--

DROP TABLE IF EXISTS `serviciotecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serviciotecnico` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `numero` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `pagado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `router` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `bobina` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `plan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `longitud` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `latitud` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `potencia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `pon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `tecnico1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `tecnico2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `tecnico3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_asignar',
  `tecnico4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `factura` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `unico` int NOT NULL AUTO_INCREMENT,
  `observacion` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `motivo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_nodo',
  PRIMARY KEY (`unico`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviciotecnico`
--

LOCK TABLES `serviciotecnico` WRITE;
/*!40000 ALTER TABLE `serviciotecnico` DISABLE KEYS */;
INSERT INTO `serviciotecnico` VALUES ('117','117','2026-09-25 (16:24:21)','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','0102917689','','10.20.11.9','0','HG8310M','0','CONVENIO TOTAL','','','-22','0','prueba de sistema gasolinera','1','Grupo1','1','1','1','1','CONVENIO TOTAL',3,'prueba de sistema gasolinera','Instalacion Nueva                    ','Sin_nodo'),('117','117','2026-09-25 (16:24:21)','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','0102917689','','10.20.11.9','0','HG8310M','0','CONVENIO TOTAL','','','-22','0','prueba de sistema gasolinera','1','Grupo1','1','1','1','1','CONVENIO TOTAL',4,'prueba de sistema gasolinera','Instalacion Nueva                    ','Sin_nodo'),('118','118','2026-09-27 (16:59:58)','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','0102917689','','0','0','WR940N','0','Plan Basico','','','-19','0','Cambio por prueba de sistema','1','Grupo1','1','1','1','1','Plan Basico',5,'Se recomienda utilizar un regulador de voltaje','Baja Velocidad                    ','Sin_nodo'),('121','121','2026-10-10 (12:56:00)','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','0102917689','','0','0','0','0','Plan 4 Descuento','','','-44','0','Servicio tecnico sencillo','0','Grupo1','1','1','1','1','Plan 4 Descuento',6,'fdsfds.ksdjfkl.sd','Instalacion Nueva                    ','Sin_nodo'),('121','121','2026-10-10 (12:56:00)','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','../images/silueta.gif','0102917689','','0','0','0','0','Plan 4 Descuento','','','-44','0','Servicio tecnico sencillo','0','Grupo1','1','1','1','1','Plan 4 Descuento',7,'fdsfds.ksdjfkl.sd','Instalacion Nueva                    ','Sin_nodo');
/*!40000 ALTER TABLE `serviciotecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviciotecnicoproveedor`
--

DROP TABLE IF EXISTS `serviciotecnicoproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serviciotecnicoproveedor` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `numero` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `foto4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.gif',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `pagado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `router` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `bobina` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `plan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `longitud` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `latitud` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `potencia` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `pon` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `tecnico1` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `tecnico2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `tecnico3` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'sin_asignar',
  `tecnico4` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `factura` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `unico` int NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `motivo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviciotecnicoproveedor`
--

LOCK TABLES `serviciotecnicoproveedor` WRITE;
/*!40000 ALTER TABLE `serviciotecnicoproveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `serviciotecnicoproveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `serviciotecnicotelefono`
--

DROP TABLE IF EXISTS `serviciotecnicotelefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `serviciotecnicotelefono` (
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `bodega` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `novedades` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `serviciotecnicotelefono`
--

LOCK TABLES `serviciotecnicotelefono` WRITE;
/*!40000 ALTER TABLE `serviciotecnicotelefono` DISABLE KEYS */;
/*!40000 ALTER TABLE `serviciotecnicotelefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud_peliculas`
--

DROP TABLE IF EXISTS `solicitud_peliculas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicitud_peliculas` (
  `id_solicitud` int NOT NULL,
  `id_usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `nombre_pelicula` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `solicitud` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud_peliculas`
--

LOCK TABLES `solicitud_peliculas` WRITE;
/*!40000 ALTER TABLE `solicitud_peliculas` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud_peliculas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sulicitudproducto`
--

DROP TABLE IF EXISTS `sulicitudproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sulicitudproducto` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `bodegadestino` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `autorizado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sulicitudproducto`
--

LOCK TABLES `sulicitudproducto` WRITE;
/*!40000 ALTER TABLE `sulicitudproducto` DISABLE KEYS */;
INSERT INTO `sulicitudproducto` VALUES (1,'9466','Sin_Asignar','2023-11-20 (21:20:56)','BODEGAPRINCIPAL','100','Sin_Asignar','Sin_Asignar','pruebaproducto','rr','000000000','no'),(1,'9466','Sin_Asignar','2023-11-20 (21:20:56)','BODEGAPRINCIPAL','100','Sin_Asignar','Sin_Asignar','pruebaproducto','rr','000000000','no'),(1,'9466','Sin_Asignar','2023-11-20 (21:20:56)','BODEGAPRINCIPAL','100','Sin_Asignar','Sin_Asignar','pruebaproducto','rr','000000000','no');
/*!40000 ALTER TABLE `sulicitudproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `description` varchar(900) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `destino` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tempserviciotecnico`
--

DROP TABLE IF EXISTS `tempserviciotecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tempserviciotecnico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  `precio` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tempserviciotecnico`
--

LOCK TABLES `tempserviciotecnico` WRITE;
/*!40000 ALTER TABLE `tempserviciotecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tempserviciotecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoproducto` (
  `id` int NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `puesto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `serviciotecnico` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
INSERT INTO `tipoproducto` VALUES (1,'SERVICIOTECNICO','SERVICIOTECNICO','si'),(2,'MANODEOBRA','MANO DE OBRA','no'),(3,'HERRAMIENTAS','HERRAMIENTAS','no'),(4,'INSUMOSDEOFICINA','INSUMOS DE OFICINA','no'),(5,'INSUMOSVEHICULOS','INSUMOS PARA VEHICULOS','no'),(6,'EQUIPOSINFORMATICOS','MATERIALES Y EQUIPOS INFORMATICOS','no'),(7,'PLANESMENSUALES','PLANES MENSUALES','no'),(8,'VARIOS','VARIOS','no');
/*!40000 ALTER TABLE `tipoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `traccar`
--

DROP TABLE IF EXISTS `traccar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `traccar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `api` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `traccar`
--

LOCK TABLES `traccar` WRITE;
/*!40000 ALTER TABLE `traccar` DISABLE KEYS */;
INSERT INTO `traccar` VALUES (1,'7e7733aeb68d4ea2aaef995fa6692a45','http://192.168.0.23:30206/','sistema');
/*!40000 ALTER TABLE `traccar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transferencia`
--

DROP TABLE IF EXISTS `transferencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transferencia` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `bodegadestino` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_asignar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transferencia`
--

LOCK TABLES `transferencia` WRITE;
/*!40000 ALTER TABLE `transferencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `transferencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truenas`
--

DROP TABLE IF EXISTS `truenas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `truenas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `api` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truenas`
--

LOCK TABLES `truenas` WRITE;
/*!40000 ALTER TABLE `truenas` DISABLE KEYS */;
INSERT INTO `truenas` VALUES (1,'1-kgMb8TfitMCfIcLOR517F6jexV4qvv6FL23hr5f0D3T9KHOfm8iYt2cf8Pik7Y8w','http://192.168.0.23','sistema');
/*!40000 ALTER TABLE `truenas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `numero` int NOT NULL AUTO_INCREMENT,
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `propietario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ruc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `autorizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `preciounitario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `preciototal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `subtotal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `vencimiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `descuento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pendiente',
  `forma_pago` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombrecliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `recibo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/sistema/sin_documento.png',
  `numerorecibo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Recibo',
  `contrato` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tipodocumento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_documento',
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Foto',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estadodos` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'activo',
  `anticipo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `entrega` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `descripcion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Descripcion',
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '001',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '001',
  `nodo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Cuenca',
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=1326 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES ('1',1325,'2026-06-22 (17:37:54)','1','1','1','0102917689','001','1','13.04','13.04','13.04','1.96','15.00','1','1','pendiente','Sin_Asignar','0','CARDENAS CAMPOS DANIEL TEODORO Sin Asignar','../images/sistema/sin_documento.png','Sin_Recibo','1','Sin_documento','Sin_Foto','Sin_Asignar','activo','0','0','Sin_Descripcion','1','1','CUENCA');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_comerciales`
--

DROP TABLE IF EXISTS `ventas_comerciales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_comerciales` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `numero` int NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `caja` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `fecha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `propietario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `ruc` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `autorizacion` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `preciounitario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `preciototal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `subtotal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `iva` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `total` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `vencimiento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `descuento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `estado` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pendiente',
  `forma_pago` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `abono` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `nombrecliente` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '../images/silueta.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_comerciales`
--

LOCK TABLES `ventas_comerciales` WRITE;
/*!40000 ALTER TABLE `ventas_comerciales` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_comerciales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_comercialesatemporal`
--

DROP TABLE IF EXISTS `ventas_comercialesatemporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_comercialesatemporal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'vacio',
  `created_at` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `personal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `cantidad` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `usuario` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `extra` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `producto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sin_Asignar',
  `descuento` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_comercialesatemporal`
--

LOCK TABLES `ventas_comercialesatemporal` WRITE;
/*!40000 ALTER TABLE `ventas_comercialesatemporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_comercialesatemporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapp`
--

DROP TABLE IF EXISTS `whatsapp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapp` (
  `id` int NOT NULL,
  `numerowhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `tokenwhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio',
  `instanciawhatsapp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'vacio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapp`
--

LOCK TABLES `whatsapp` WRITE;
/*!40000 ALTER TABLE `whatsapp` DISABLE KEYS */;
INSERT INTO `whatsapp` VALUES (1,'1','1','1');
/*!40000 ALTER TABLE `whatsapp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-24 15:30:26
