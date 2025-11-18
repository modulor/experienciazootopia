-- MySQL dump 10.13  Distrib 8.0.34, for macos13 (arm64)
--
-- Host: 127.0.0.1    Database: zootopia2
-- ------------------------------------------------------
-- Server version	8.0.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dates_available`
--

DROP TABLE IF EXISTS `dates_available`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dates_available` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `date_label` varchar(255) DEFAULT NULL,
  `available` int DEFAULT NULL,
  `attendees_available` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dates_available`
--

LOCK TABLES `dates_available` WRITE;
/*!40000 ALTER TABLE `dates_available` DISABLE KEYS */;
INSERT INTO `dates_available` VALUES (1,'2025-11-21','21 noviembre 2025',1,900),(2,'2025-11-22','22 noviembre 2025',1,1200),(3,'2025-11-23','23 noviembre 2025',1,600),(4,'2025-11-28','28 noviembre 2025',1,1200),(5,'2025-11-30','30 noviembre 2025',1,1200),(6,'2025-12-05','05 diciembre 2025',1,1200),(7,'2025-12-06','06 diciembre 2025',1,1200),(8,'2025-12-07','07 diciembre 2025',1,1200);
/*!40000 ALTER TABLE `dates_available` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hours_available`
--

DROP TABLE IF EXISTS `hours_available`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hours_available` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dates_available_id` int DEFAULT NULL,
  `hour` time DEFAULT NULL,
  `hour_label` varchar(255) DEFAULT NULL,
  `available` int DEFAULT NULL,
  `attendees_available` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hours_available`
--

LOCK TABLES `hours_available` WRITE;
/*!40000 ALTER TABLE `hours_available` DISABLE KEYS */;
INSERT INTO `hours_available` VALUES (1,1,'11:00:00','11 AM',1,150),(2,1,'12:00:00','12 PM',1,150),(3,1,'13:00:00','1 PM',1,150),(4,1,'17:00:00','5 PM',1,150),(5,1,'18:00:00','6 PM',1,150),(6,1,'19:00:00','7 PM',1,150),(7,2,'11:00:00','11 AM',1,150),(8,2,'12:00:00','12 PM',1,150),(9,2,'13:00:00','1 PM',1,150),(10,2,'14:00:00','2 PM',1,150),(11,2,'16:00:00','4 PM',1,150),(12,2,'17:00:00','5 PM',1,150),(13,2,'18:00:00','6 PM',1,150),(14,2,'19:00:00','7 PM',1,150),(15,3,'16:00:00','4 PM',1,150),(16,3,'17:00:00','5 PM',1,150),(17,3,'18:00:00','6 PM',1,150),(18,3,'19:00:00','7 PM',1,150),(19,4,'11:00:00','11 AM',1,150),(20,4,'12:00:00','12 PM',1,150),(21,4,'13:00:00','1 PM',1,150),(22,4,'14:00:00','2 PM',1,150),(23,4,'16:00:00','4 PM',1,150),(24,4,'17:00:00','5 PM',1,150),(25,4,'18:00:00','6 PM',1,150),(26,4,'19:00:00','7 PM',1,150),(27,5,'11:00:00','11 AM',1,150),(28,5,'12:00:00','12 PM',1,150),(29,5,'13:00:00','1 PM',1,150),(30,5,'14:00:00','2 PM',1,150),(31,5,'16:00:00','4 PM',1,150),(32,5,'17:00:00','5 PM',1,150),(33,5,'18:00:00','6 PM',1,150),(34,5,'19:00:00','7 PM',1,150),(35,6,'11:00:00','11 AM',1,150),(36,6,'12:00:00','12 PM',1,150),(37,6,'13:00:00','1 PM',1,150),(38,6,'14:00:00','2 PM',1,150),(39,6,'16:00:00','4 PM',1,150),(40,6,'17:00:00','5 PM',1,150),(41,6,'18:00:00','6 PM',1,150),(42,6,'19:00:00','7 PM',1,150),(43,7,'11:00:00','11 AM',1,150),(44,7,'12:00:00','12 PM',1,150),(45,7,'13:00:00','1 PM',1,150),(46,7,'14:00:00','2 PM',1,150),(47,7,'16:00:00','4 PM',1,150),(48,7,'17:00:00','5 PM',1,150),(49,7,'18:00:00','6 PM',1,150),(50,7,'19:00:00','7 PM',1,150),(51,8,'11:00:00','11 AM',1,150),(52,8,'12:00:00','12 PM',1,150),(53,8,'13:00:00','1 PM',1,150),(54,8,'14:00:00','2 PM',1,150),(55,8,'16:00:00','4 PM',1,150),(56,8,'17:00:00','5 PM',1,150),(57,8,'18:00:00','6 PM',1,150),(58,8,'19:00:00','7 PM',1,150);
/*!40000 ALTER TABLE `hours_available` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visitors_id` int DEFAULT NULL,
  `qr_code` varchar(355) DEFAULT NULL,
  `total_attendees` int DEFAULT NULL,
  `dates_available_id` int DEFAULT NULL,
  `hours_available_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors`
--

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-17 12:46:46
