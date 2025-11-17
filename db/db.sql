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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dates_available`
--

LOCK TABLES `dates_available` WRITE;
/*!40000 ALTER TABLE `dates_available` DISABLE KEYS */;
INSERT INTO `dates_available` VALUES (12,'2025-09-11','11 septiembre 2025',1,1497);
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
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hours_available`
--

LOCK TABLES `hours_available` WRITE;
/*!40000 ALTER TABLE `hours_available` DISABLE KEYS */;
INSERT INTO `hours_available` VALUES (177,12,'13:00:00','1 PM',1,197),(178,12,'14:00:00','2 PM',1,200),(179,12,'15:00:00','3 PM',1,200),(180,12,'16:00:00','4 PM',1,200),(181,12,'17:00:00','5 PM',1,200),(182,12,'18:00:00','6 PM',1,200),(183,12,'19:00:00','7 PM',1,300);
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,1,NULL,4,1,1,'2025-05-19 17:51:37'),(2,2,NULL,1,1,2,'2025-05-20 11:24:17'),(3,3,NULL,1,8,128,'2025-05-20 11:25:53'),(4,4,NULL,4,11,161,'2025-05-22 17:42:20'),(5,5,NULL,3,11,171,'2025-08-31 14:21:00'),(6,6,NULL,3,11,171,'2025-08-31 14:23:17'),(7,7,NULL,3,11,171,'2025-08-31 14:33:22'),(8,8,NULL,4,11,164,'2025-09-01 12:19:56'),(9,9,NULL,3,12,177,'2025-09-03 18:06:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors`
--

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
INSERT INTO `visitors` VALUES (1,'mario@gmail.com','Mario Lopez',NULL,NULL,NULL,'2025-05-19 17:51:29'),(2,'migue@gmail.com','Migue A',NULL,NULL,NULL,'2025-05-20 11:24:03'),(3,'latin@gmail.com','Alejandro Ar',NULL,NULL,NULL,'2025-05-20 11:25:44'),(4,'migel@gas.com','asdasd asd',NULL,NULL,NULL,'2025-05-22 17:35:02'),(5,'masdasdqwe@asd.com','asdaodsn iasjdn aisd',NULL,NULL,NULL,'2025-08-31 14:15:39'),(6,'asd1123@23s.com','asdasd asd asd',NULL,NULL,NULL,'2025-08-31 14:22:25'),(7,'pedroperez212@gmail.com','Pedro Perez',NULL,NULL,NULL,'2025-08-31 14:30:51'),(8,'asdwewe1212111@asd.com','Mar Perez',NULL,NULL,NULL,'2025-09-01 12:16:51'),(9,'jjujuju@asdasds.com','asda dasda sd1',NULL,NULL,NULL,'2025-09-03 18:06:09'),(10,'13aasdasdaasdasdq@asd.com','asdasd asdasdasd',NULL,NULL,NULL,'2025-09-03 18:06:39');
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

-- Dump completed on 2025-09-03 17:14:39
