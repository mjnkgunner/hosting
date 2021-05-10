-- MySQL dump 10.13  Distrib 8.0.15, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: cake
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bill_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `bill_detail_ibfk_2` (`id_product`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill_detail`
--

LOCK TABLES `bill_detail` WRITE;
/*!40000 ALTER TABLE `bill_detail` DISABLE KEYS */;
INSERT INTO `bill_detail` VALUES (77,65,13,1,300000,'2020-06-29 12:58:36','2020-06-29 12:58:36'),(76,64,13,1,300000,'2020-06-29 12:56:03','2020-06-29 12:56:03'),(75,63,2,1,180000,'2020-06-29 12:21:15','2020-06-29 12:21:15'),(74,62,2,1,180000,'2020-06-29 12:11:49','2020-06-29 12:11:49'),(73,61,2,1,180000,'2020-06-27 15:16:04','2020-06-27 15:16:04');
/*!40000 ALTER TABLE `bill_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `bills` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_promotion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bills_ibfk_1` (`id_customer`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES (62,63,'2020-06-29',160000,NULL,'2020-06-29 12:11:49','2020-06-29 12:11:49',0),(61,62,'2020-06-27',160000,NULL,'2020-06-27 15:16:04','2020-06-27 15:16:04',0);
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT '0',
  `id_product` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (27,7,2,'2020-06-27 22:15:58','2020-06-27 22:15:58'),(28,7,2,'2020-06-29 19:11:36','2020-06-29 19:11:36'),(29,7,13,'2020-06-29 19:55:57','2020-06-29 19:55:57'),(30,0,7,'2020-06-30 08:39:13','2020-06-30 08:39:13'),(31,0,1,'2020-07-01 21:47:57','2020-07-01 21:47:57');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `content` varchar(512) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,7,1,'banh rat ngon',10,'2020-04-22 12:43:43','2020-04-22 15:10:56',0),(2,7,1,NULL,10,'2020-04-22 12:44:40','2020-04-22 15:09:47',1),(3,7,1,'bang qua ngon',10,'2020-04-22 12:45:04','2020-04-22 12:45:04',1),(4,12,1,'tuyet voi',10,'2020-04-22 12:45:42','2020-04-22 12:45:42',1),(5,12,1,NULL,10,'2020-04-22 12:47:58','2020-04-22 12:47:58',1),(6,12,1,NULL,10,'2020-04-22 12:52:09','2020-04-22 12:52:09',1),(7,12,1,NULL,9,'2020-04-22 12:55:24','2020-04-22 15:09:49',1),(8,18,2,'banh ngon',10,'2020-05-26 22:03:00','2020-05-26 22:03:00',1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (66,'bang11','male','bang98ptit@gmail.com','hanoi','0961455406',NULL,'2020-06-29 12:58:36','2020-06-29 12:58:36',7),(65,'bang11','male','bang98ptit@gmail.com','hanoi','0961455406',NULL,'2020-06-29 12:56:03','2020-06-29 12:56:03',7),(64,'bang11','male','bang98ptit@gmail.com','hanoi','0961455406',NULL,'2020-06-29 12:21:15','2020-06-29 12:21:15',7),(63,'bang11','male','bang98ptit@gmail.com','hanoi','0961455406',NULL,'2020-06-29 12:11:49','2020-06-29 12:11:49',7),(62,'bang11','male','bang98ptit@gmail.com','hanoi','0961455406',NULL,'2020-06-27 15:16:04','2020-06-27 15:16:04',7);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,'Khach hang',NULL,'nhóm user khách hàng',NULL,NULL,'2020-04-19 18:09:27','2020-04-19 18:09:27'),(2,'Admin',NULL,NULL,NULL,NULL,'2020-04-19 22:24:53','2020-04-19 22:24:53'),(3,'Sale',NULL,'Bộ phận bán hàng',NULL,NULL,'2020-04-20 18:25:08','2020-04-20 18:25:08'),(4,'Inventory',NULL,'Bộ phận Kho',NULL,NULL,'2020-05-15 22:34:47','2020-05-24 21:45:25'),(5,'HRS',NULL,'Bộ phân nguồn nhân lực',NULL,NULL,'2020-05-24 20:27:02','2020-05-24 20:27:02');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ex_imports`
--

DROP TABLE IF EXISTS `ex_imports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ex_imports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_material` int(10) unsigned NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `quantity` double(8,2) NOT NULL DEFAULT '0.00',
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `expire` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ex_imports_id_material_foreign` (`id_material`),
  CONSTRAINT `ex_imports_id_material_foreign` FOREIGN KEY (`id_material`) REFERENCES `materials` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ex_imports`
--

LOCK TABLES `ex_imports` WRITE;
/*!40000 ALTER TABLE `ex_imports` DISABLE KEYS */;
INSERT INTO `ex_imports` VALUES (2,1,'kg',100000.00,10.00,0,'2020-04-18 00:00:00','2020-04-17 09:55:52','2020-04-17 09:55:52',NULL),(3,1,'kg',1.00,1.00,1,'2020-04-18 00:00:00','2020-04-17 09:59:01','2020-04-17 09:59:01',15),(4,1,'kg',1.00,2.00,1,'2020-04-18 11:11:00','2020-04-17 11:19:21','2020-04-17 11:19:21',15),(5,1,'kg',100000.00,10.00,0,'2020-06-26 21:15:00','2020-06-17 14:16:25','2020-06-17 14:16:25',7);
/*!40000 ALTER TABLE `ex_imports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `larapoll_options`
--

DROP TABLE IF EXISTS `larapoll_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `larapoll_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poll_id` int(10) unsigned NOT NULL,
  `votes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `larapoll_options_poll_id_foreign` (`poll_id`),
  CONSTRAINT `larapoll_options_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `larapoll_polls` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `larapoll_options`
--

LOCK TABLES `larapoll_options` WRITE;
/*!40000 ALTER TABLE `larapoll_options` DISABLE KEYS */;
INSERT INTO `larapoll_options` VALUES (9,'a',4,2,'2020-04-23 07:53:20','2020-04-23 07:53:20'),(10,'b',4,2,'2020-04-23 07:53:20','2020-05-27 10:05:51'),(11,'c',4,1,'2020-04-23 07:53:20','2020-06-30 02:24:30'),(12,'1',5,0,'2020-04-23 08:14:35','2020-04-23 08:14:35'),(13,'2',5,0,'2020-04-23 08:14:35','2020-04-23 08:14:35'),(14,'3',5,0,'2020-04-23 08:14:35','2020-04-23 08:14:35'),(15,'4',5,0,'2020-04-23 08:14:35','2020-04-23 08:14:35'),(18,'1',6,0,'2020-04-24 01:22:26','2020-04-24 01:22:26'),(19,'2',6,0,'2020-04-24 01:22:26','2020-04-24 01:22:26'),(20,'3',6,0,'2020-04-24 01:22:26','2020-04-24 01:22:26'),(21,'Rất hài lòng',7,0,'2020-06-22 13:22:17','2020-06-22 13:22:17'),(22,'Hài lòng',7,0,'2020-06-22 13:22:17','2020-06-22 13:22:17'),(23,'Tạm ổn',7,0,'2020-06-22 13:22:17','2020-06-22 13:22:17'),(24,'Không hài lòng',7,0,'2020-06-22 13:22:17','2020-06-22 13:22:17');
/*!40000 ALTER TABLE `larapoll_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `larapoll_polls`
--

DROP TABLE IF EXISTS `larapoll_polls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `larapoll_polls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maxCheck` int(11) NOT NULL DEFAULT '1',
  `canVisitorsVote` tinyint(1) NOT NULL DEFAULT '0',
  `isClosed` timestamp NULL DEFAULT NULL,
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `canVoterSeeResult` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `larapoll_polls`
--

LOCK TABLES `larapoll_polls` WRITE;
/*!40000 ALTER TABLE `larapoll_polls` DISABLE KEYS */;
INSERT INTO `larapoll_polls` VALUES (4,'Who',1,1,'2020-06-30 02:24:30','2020-04-23 07:53:20','2025-04-23 07:53:20','2020-04-23 07:53:20','2020-06-30 02:24:30',1),(5,'What',1,1,'2020-04-23 10:21:42','2020-04-23 17:00:00','2020-04-24 17:00:00','2020-04-23 08:14:35','2020-04-23 10:21:42',1),(6,'Love',1,1,'2020-04-24 01:24:13','2020-04-22 17:00:00','2020-04-24 17:00:00','2020-04-24 01:22:26','2020-04-24 01:24:13',0),(7,'Bạn có hài lòng về dịch vụ của HIBI cake?',1,1,NULL,'2020-06-22 13:22:00','2020-06-28 13:22:00','2020-06-22 13:22:17','2020-06-22 13:22:17',0);
/*!40000 ALTER TABLE `larapoll_polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `larapoll_votes`
--

DROP TABLE IF EXISTS `larapoll_votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `larapoll_votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `larapoll_votes_option_id_foreign` (`option_id`),
  CONSTRAINT `larapoll_votes_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `larapoll_options` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `larapoll_votes`
--

LOCK TABLES `larapoll_votes` WRITE;
/*!40000 ALTER TABLE `larapoll_votes` DISABLE KEYS */;
INSERT INTO `larapoll_votes` VALUES (1,'7',11,'2020-04-23 11:53:41','2020-04-23 11:53:41'),(2,'7',10,'2020-04-23 11:54:10','2020-04-23 11:54:10'),(3,'7',9,'2020-04-23 12:03:27','2020-04-23 12:03:27'),(4,'18',9,'2020-05-26 16:16:36','2020-05-26 16:16:36'),(5,'0',10,'2020-05-27 10:05:51','2020-05-27 10:05:51');
/*!40000 ALTER TABLE `larapoll_votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_type` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `materials_id_type_foreign` (`id_type`),
  KEY `materials_id_supplier_foreign` (`id_supplier`),
  CONSTRAINT `materials_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `suppliers` (`id`),
  CONSTRAINT `materials_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_materials` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (1,1,1,'bot mi banh mi','decor banh','GbEa_83488834_1490327121133070_2562308206676148224_n.jpg',17,'2020-04-17 04:39:19','2020-06-17 14:16:25');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (21,'2020_04_15_182822_create_type_materials_table',1),(22,'2020_04_15_182850_create_suppliers_table',1),(23,'2020_04_15_182752_create_materials_table',2),(24,'2020_04_15_200710_create_ex_import_tables',3),(25,'2014_10_12_100000_create_password_resets_table',4),(26,'2017_01_23_115718_create_polls_table',5),(27,'2017_01_23_124357_create_options_table',5),(28,'2017_01_25_111721_create_votes_table',5),(29,'2019_04_20_145921_schema_changes',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('bahiu@gmail.com','$2y$10$LXJNMXIyEPyqxD6QiVWCJ.shV2ztqzd9g0qlI53ogw1EnI7OW/4le','2020-05-15 19:07:45','2020-05-15 19:18:03',1),('bang98ptit@gmail.com','$2y$10$m5n2dgmXWMWCZANQAbP8ZOXKTDwkDx1LCOXXZ2LoTwv/gNtsWzhUi','2020-07-03 19:09:37',NULL,32);
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_bill` int(11) DEFAULT NULL,
  `method` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,61,'COD','160000',1,'2020-06-27 22:16:04','2020-06-29 19:54:33'),(2,63,'COD','160000',1,'2020-06-29 19:21:15','2020-06-29 19:55:38');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_department` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,1,'Normal',NULL,NULL,'2020-04-19 18:10:44','2020-04-19 18:10:44'),(2,2,'admin',NULL,NULL,'2020-04-19 22:25:08','2020-04-19 22:25:08'),(3,3,'Parttime 1',NULL,'nhan vien theo gio','2020-04-20 18:53:53','2020-04-20 18:53:53'),(4,4,'nhân viên kho 1',NULL,NULL,'2020-05-15 22:35:45','2020-05-15 22:35:45'),(5,5,'Nhân viên Hrs 1',NULL,NULL,'2020-05-24 20:28:30','2020-05-24 20:28:30'),(6,6,'nhân viên SP1',NULL,NULL,'2020-05-26 20:08:08','2020-05-26 20:08:08');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) unsigned DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_id_type_foreign` (`id_type`),
  CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Bánh Crepe Sầu riêng',5,'Bánh crepe sầu riêng nhà làm',150000,120000,'oHaY_91341957_2618838605067672_7408525247923617792_o.jpg','hộp',1,'2016-10-26 03:00:16','2020-04-23 12:23:04'),(2,'Bánh Crepe Chocolate',6,NULL,180000,160000,'4nR7_90790367_2618838645067668_4346525268832157696_o.jpg','hộp',1,'2016-10-26 03:00:16','2020-04-23 12:23:21'),(3,'Bánh Crepe Sầu riêng - Chuối',5,NULL,150000,120000,'XDLy_93794208_2634941140124085_6995032717519749120_o.jpg','hộp',0,'2016-10-26 03:00:16','2020-04-23 12:23:37'),(4,'Bánh Crepe Đào',5,NULL,160000,0,'mmwy_93670649_2640175592933973_100006672809852928_o.jpg','hộp',0,'2016-10-26 03:00:16','2020-04-23 12:23:56'),(5,'Bánh Crepe Dâu',5,NULL,160000,0,'fk57_90351298_2611269295824603_7511472263934246912_o.jpg','hộp',0,'2016-10-26 03:00:16','2020-04-23 12:25:17'),(6,'Bánh Crepe Pháp',5,NULL,200000,180000,'RgkY_90532988_2614223602195839_7001317173796798464_o.jpg','hộp',0,'2016-10-26 03:00:16','2020-04-23 12:25:32'),(7,'Bánh Crepe Táo',5,NULL,160000,0,'OKRL_90644501_2614227868862079_919188344976441344_o.jpg','hộp',1,'2016-10-26 03:00:16','2020-04-23 12:25:49'),(9,'Bánh Crepe Sầu riêng và Dứa',5,'',160000,150000,'saurieng-dua.jpg','hộp',0,'2016-10-26 03:00:16','2016-10-24 22:11:00'),(11,'Bánh Gato Trái cây Việt Quất',3,'',250000,0,'544bc48782741.png','cái',0,'2016-10-12 02:00:00','2016-10-27 02:24:00'),(12,'Bánh sinh nhật rau câu trái cây',3,'',200000,180000,'210215-banh-sinh-nhat-rau-cau-body- (6).jpg','cái',0,'2016-10-12 02:00:00','2016-10-27 02:24:00'),(13,'Bánh kem Chocolate Dâu',3,'',300000,280000,'banh kem sinh nhat.jpg','cái',1,'2016-10-12 02:00:00','2016-10-27 02:24:00'),(14,'Bánh kem Dâu III',3,'',300000,280000,'Banh-kem (6).jpg','cái',0,'2016-10-12 02:00:00','2016-10-27 02:24:00'),(15,'Bánh kem Dâu I',3,'',350000,320000,'banhkem-dau.jpg','cái',1,'2016-10-12 02:00:00','2016-10-27 02:24:00'),(16,'Bánh trái cây II',3,'',150000,120000,'banhtraicay.jpg','hộp',0,'2016-10-12 02:00:00','2016-10-27 02:24:00'),(17,'Apple Cake',3,'',250000,240000,'Fruit-Cake_7979.jpg','cai',0,'2016-10-12 02:00:00','2016-10-27 02:24:00'),(18,'Bánh ngọt nhân cream táo',2,'',180000,0,'20131108144733.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(19,'Bánh Chocolate Trái cây',2,'',150000,0,'Fruit-Cake_7976.jpg','hộp',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(20,'Bánh Chocolate Trái cây II',2,'',150000,0,'Fruit-Cake_7981.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(21,'Peach Cake',2,'',160000,150000,'Peach-Cake_3294.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(22,'Bánh bông lan trứng muối I',1,'',160000,150000,'banhbonglantrung.jpg','hộp',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(23,'Bánh bông lan trứng muối II',1,'',180000,0,'banhbonglantrungmuoi.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(24,'Bánh French',1,'',180000,0,'banh-man-thu-vi-nhat-1.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(25,'Bánh mì Australia',1,'',80000,70000,'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(26,'Bánh mặn thập cẩm',1,'',50000,0,'Fruit-Cake.png','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(27,'Bánh Muffins trứng',1,'',100000,80000,'maxresdefault.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(28,'Bánh Scone Peach Cake',1,'',120000,0,'Peach-Cake_3300.jpg','hộp',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(29,'Bánh mì Loaf I',1,'',100000,0,'sli12.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(30,'Bánh kem Chocolate Dâu I',4,'',380000,350000,'sli12.jpg','cái',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(31,'Bánh kem Trái cây I',4,'',380000,350000,'Fruit-Cake.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(33,'Bánh kem Doraemon',4,'',280000,250000,'p1392962167_banh74.jpg','cái',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(34,'Bánh kem Caramen Pudding',4,'',280000,0,'Caramen-pudding636099031482099583.jpg','cái',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(35,'Bánh kem Chocolate Fruit',4,'',320000,300000,'chocolate-fruit636098975917921990.jpg','cái',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(36,'Bánh kem Coffee Chocolate GH6',4,'',320000,300000,'COFFE-CHOCOLATE636098977566220885.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(37,'Bánh kem Mango Mouse',4,'',320000,300000,'mango-mousse-cake.jpg','cái',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(38,'Bánh kem Matcha Mouse',4,'',350000,330000,'MATCHA-MOUSSE.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(39,'Bánh kem Flower Fruit',4,'',350000,330000,'flower-fruits636102461981788938.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(40,'Bánh kem Strawberry Delight',4,'',350000,330000,'strawberry-delight636102445035635173.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(41,'Bánh kem Raspberry Delight',4,'',350000,330000,'raspberry.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(42,'Beefy Pizza',6,'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella',150000,130000,'40819_food_pizza.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(43,'Hawaii Pizza',6,'Sốt cà chua, ham , dứa, pho mai mozzarella',120000,0,'hawaiian paradise_large-900x900.jpg','cái',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(44,'Smoke Chicken Pizza',6,'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.',120000,0,'chicken black pepper_large-900x900.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(45,'Sausage Pizza',6,'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.',120000,0,'pizza-miami.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(46,'Ocean Pizza',6,'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.',120000,0,'seafood curry_large-900x900.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(47,'All Meaty Pizza',6,'Ham, bacon, chorizo, pho mai mozzarella.',140000,0,'all1).jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(48,'Tuna Pizza',6,'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella',140000,0,'54eaf93713081_-_07-germany-tuna.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(49,'Bánh su kem nhân dừa',7,'',120000,100000,'maxresdefault.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(50,'Bánh su kem sữa tươi',7,'',120000,100000,'sukem.jpg','cái',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(51,'Bánh su kem sữa tươi chiên giòn',7,'',150000,0,'1434429117-banh-su-kem-chien-20.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(52,'Bánh su kem dâu sữa tươi',7,'',150000,0,'sukemdau.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(53,'Bánh su kem bơ sữa tươi',7,'',150000,0,'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(54,'Bánh su kem nhân trái cây sữa tươi',7,'',150000,0,'foody-banh-su-que-635930347896369908.jpg','hộp',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(55,'Bánh su kem cà phê',7,'',150000,0,'banh-su-kem-ca-phe-1.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(56,'Bánh su kem phô mai',7,'',150000,0,'50020041-combo-20-banh-su-que-pho-mai-9.jpg','hộp',0,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(57,'Bánh su kem sữa tươi chocolate',7,'',150000,0,'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg','hộp',1,'2016-10-13 02:20:00','2016-10-19 03:20:00'),(58,'Bánh Macaron Pháp',2,'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.',200000,180000,'Macaron9.jpg','',0,'2016-10-26 17:00:00','2016-10-11 17:00:00'),(59,'Bánh Tiramisu - Italia',2,'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn',200000,0,'234.jpg','',0,'2016-10-26 17:00:00','2016-10-11 17:00:00'),(60,'Bánh Táo - Mỹ',2,'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.',200000,0,'1234.jpg','',0,'2016-10-26 17:00:00','2016-10-11 17:00:00'),(61,'Bánh Cupcake - Anh Quốc',6,'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.',150000,120000,'cupcake.jpg','cái',1,NULL,NULL),(62,'Bánh Sachertorte',6,'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. Sachertorte có vị ngọt nhẹ, gồm nhiều lớp bánh được làm từ ruột bánh mì và bánh sữa chocholate, xen lẫn giữa các lớp bánh là mứt mơ. Món bánh chocholate này nổi tiếng tới mức thành phố Vienna của Áo đã ấn định&nbsp;tổ chức một ngày Sachertorte quốc gia, vào 5/12 hằng năm',250000,220000,'111.jpg','cái',0,NULL,NULL),(64,'Banh bong lan',1,'bánh mềm, dễ ăn',100000,0,'','cai',1,'2020-04-22 05:20:16','2020-04-22 05:20:16');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `promotions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `code` varchar(45) NOT NULL,
  `rate` float DEFAULT '0',
  `cost` float DEFAULT '0',
  `fromDate` datetime DEFAULT NULL,
  `toDate` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT '0',
  `count` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
INSERT INTO `promotions` VALUES (1,'Khuyen mai 1/5','KM100',0,100,'2020-04-20 00:00:00','2020-06-30 00:00:00','2020-04-20 16:17:13','2020-06-22 20:26:00',1,2),(2,'happy birthday','BIRTHDAY100',0,100,'2020-04-22 00:00:00','2020-06-30 00:00:00','2020-04-22 23:57:25','2020-06-22 20:25:08',1,0);
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slide`
--

DROP TABLE IF EXISTS `slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slide`
--

LOCK TABLES `slide` WRITE;
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;
INSERT INTO `slide` VALUES (8,NULL,'iadj_90790367_2618838645067668_4346525268832157696_o.jpg','2020-04-23 19:21:01','2020-04-23 19:21:01'),(9,NULL,'E3QO_91341957_2618838605067672_7408525247923617792_o.jpg','2020-04-23 19:21:10','2020-04-23 19:21:10'),(10,NULL,'H8oC_93794208_2634941140124085_6995032717519749120_o.jpg','2020-04-23 19:21:15','2020-04-23 19:21:15'),(11,NULL,'oAkC_93670649_2640175592933973_100006672809852928_o.jpg','2020-04-23 19:21:21','2020-04-23 19:21:21');
/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `staffs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `salary` double DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staffs`
--

LOCK TABLES `staffs` WRITE;
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` VALUES (1,16,160000,'2020-05-04 20:09:10','2020-05-04 20:35:29',1),(2,17,100000,'2020-05-15 22:37:28','2020-05-15 22:37:28',1),(3,18,1000000,'2020-05-26 20:10:18','2020-05-26 20:10:18',1),(4,19,10000,'2020-05-26 20:11:42','2020-05-26 20:11:42',1);
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `suppliers_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Min Enterprise1','Hà nội','0961455406','2020-04-16 09:46:34','2020-04-16 13:44:58','minenterprise@gmail.com','minenterprise.com.vn','jpAy_70610071_117562376301884_1404100138493804544_n.png'),(2,'Bang apple','Ha noi','01234','2020-04-17 08:35:33','2020-04-30 01:07:57','apple@gmail.com','bangaapple.com.vn','4KnG_75619127_3153012811439921_6625854933826535424_n.jpg');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_materials`
--

DROP TABLE IF EXISTS `type_materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `type_materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_materials`
--

LOCK TABLES `type_materials` WRITE;
/*!40000 ALTER TABLE `type_materials` DISABLE KEYS */;
INSERT INTO `type_materials` VALUES (1,'Bột mì','màu trắng','RfmD_83488834_1490327121133070_2562308206676148224_n.jpg','2020-04-17 04:04:44','2020-04-17 04:06:37');
/*!40000 ALTER TABLE `type_materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_products`
--

DROP TABLE IF EXISTS `type_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `type_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_products`
--

LOCK TABLES `type_products` WRITE;
/*!40000 ALTER TABLE `type_products` DISABLE KEYS */;
INSERT INTO `type_products` VALUES (1,'Bánh mặn','Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.','banh-man-thu-vi-nhat-1.jpg',NULL,NULL),(2,'Bánh ngọt','Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..','20131108144733.jpg','2016-10-12 02:16:15','2016-10-13 01:38:35'),(3,'Bánh trái cây','Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.','banhtraicay.jpg','2016-10-18 00:33:33','2016-10-15 07:25:27'),(4,'Bánh kem','Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!','banhkem.jpg','2016-10-26 03:29:19','2016-10-26 02:22:22'),(5,'Bánh crepe','Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”','crepe.jpg','2016-10-28 04:00:00','2016-10-27 04:00:23'),(6,'Bánh Pizza','Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.','pizza.jpg','2016-10-25 17:19:00',NULL),(7,'Bánh su kem','Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.','sukemdau.jpg','2016-10-25 17:19:00',NULL);
/*!40000 ALTER TABLE `type_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci DEFAULT '0',
  `gender` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) DEFAULT '0',
  `id_position` int(11) NOT NULL,
  `dob` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'bang11','bang98ptit@gmail.com','$2y$10$q3zhmgbgEtxBaqqIIypQ5eAu8BQ7FamVps2TBKJM6UmsCdHUCXMWO','0961455406','hanoi','pRkB78u5AflCG3ECpb7A2Hmq2NCBCZAwDxLvoGABZ7gtvp8nanyevlwKRtqd','2019-10-19 09:35:43','2020-06-29 12:58:36','0','male',10400,2,'2020-04-23 00:00:00'),(8,'bang','quantri@laocai.vn','$2y$10$OJZUG5RJ7rMXLOzZAqjmmukoa2IGx4M.HEo9Cmy3jI4rDOWyxXd7K','111111','1111111',NULL,'2020-04-11 07:53:46','2020-04-11 07:53:46','1','',0,1,NULL),(9,'bahiu1','bahiu@gmail.com','$2y$10$qOJhxMdDeIFhm3.4cW3hQOzqdKWplU.vkt1Ks38a.TrJtISAerV5q','111111','hanoi',NULL,'2020-04-19 11:48:31','2020-05-24 07:29:03',NULL,'male',0,1,'1998-01-21 00:00:00'),(10,'nguyễn thu ha','thuha@gmail.com','$2y$10$UHShcCN3iNnOO2Xu7a7X/.t/pWgx/OUoxxfbDiiBKeHFU0LYJ.qh2','0961455406','Thôn 6, xã Đông Dư, huyện Gia Lâm',NULL,'2020-04-19 13:56:25','2020-04-19 14:30:59','0','female',0,1,'2020-04-10 00:00:00'),(11,'dang thi hoa','hoa@gmail.com','$2y$10$HQ9lbU5N13Mg2rORv7fM1eWJwZI2Y1HFFMWt9PMCg2uAS5krCuUpu','111111','Thôn 6, xã Đông Dư, huyện Gia Lâm',NULL,'2020-04-19 13:57:24','2020-04-19 14:39:06','1','other',0,1,'2020-04-24 00:00:00'),(12,'dang thi hoa','hoa71@gmail.com','$2y$10$A0RLepCr3cNy6fpdcy00EuDg31Kbd4Gsi4fDeIQHje6ty8kIL33Ti','0961455406','Thôn 6, xã Đông Dư, huyện Gia Lâm',NULL,'2020-04-19 15:25:58','2020-05-24 13:35:41','0','female',0,2,'1971-12-23 00:00:00'),(13,'Cao ky duyen','duyen@gmail.com','$2y$10$XvTZRlJl9lq1bOCaTP.5XeOJTrs/JN2D7rPNnf0/thh9GUXwy99Cm','12345','HCM',NULL,'2020-04-20 11:55:21','2020-04-20 12:14:34','0','female',0,3,'1998-04-19 00:00:00'),(14,'thuha','ha@gmail.com','$2y$10$uATtf0RcbLO.9kk9gAEzn.OoLrhvCNPAJFzpRrl1e2jPYLalpgYXa','111111','Thôn 6, xã Đông Dư, huyện Gia Lâm',NULL,'2020-04-21 08:56:28','2020-04-21 08:56:28','0','female',0,1,'2020-04-04 11:01:00'),(15,'nguyen  van a','nguyenvana@gmail.com','$2y$10$y535aIV4UW7nRB9qxyxib..HVnK.N5U7wOH57Bg7DKlX.3yS/7fqS','111111','Ha noi',NULL,'2020-05-04 13:06:31','2020-05-24 13:30:39','0','male',0,4,'2020-05-23 11:11:00'),(16,'nguyen van nam','nguyenvannam@gmail.com','$2y$10$wGc9nNLu/Wp5htYg5YqdpeQSqMbCe4qZsDWz9CPFIERQNF02pKWsC','0961455406','Thôn 6, xã Đông Dư, huyện Gia Lâm',NULL,'2020-05-04 13:09:10','2020-05-04 13:09:10','0','male',0,3,'2020-05-03 11:11:00'),(17,'Nguyen van kho','nguyenvankho@gmail.com','$2y$10$TXwdm2Vpltmvvjvhzi3XWOjuUkQccE8PJyVLbDzcn47xFgPxKKckq','111111','hanoi',NULL,'2020-05-15 15:37:28','2020-05-15 15:37:28','0','male',0,4,'1990-02-01 11:11:00'),(18,'nguyen thi a','hrs1@gmail.com','$2y$10$RBOx6lO3eAjcryePCWuPA.2WO5bNyJhDuUJsO9X6.Dty6mj20rv1i','11111','hanoi',NULL,'2020-05-26 13:10:18','2020-05-26 15:03:54','0','female',0,3,'2000-02-02 11:01:00'),(19,'nguyen thi b','sp1@gmail.com','$2y$10$2pkB.jG809Wpq5/8UP3qUeKf6Ps49d8Ws8Gu/I/MS22qz1QpQOD2C','11111','hanoi',NULL,'2020-05-26 13:11:42','2020-05-26 13:11:42','0','female',0,6,'2000-11-11 11:01:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-06 15:51:07
