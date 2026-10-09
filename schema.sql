-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: task_today_db
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2024_01_01_000001','App\\Database\\Migrations\\CreateTasksTable','default','App',1791536500,1),(2,'2024_01_01_000002','App\\Database\\Migrations\\CreateUsersTable','default','App',1791536500,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `task_date` date NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'Review pull requests on the main repository','pending','2026-10-09','2026-10-09 17:01:40'),(2,'Complete the UI wireframes for dashboard redesign','in-progress','2026-10-09','2026-10-09 17:01:40'),(3,'Write unit tests for authentication module','pending','2026-10-09','2026-10-09 17:01:40'),(4,'Deploy staging environment updates','completed','2026-10-09','2026-10-09 17:01:40'),(5,'Set up CI/CD pipeline for the new microservice','completed','2026-10-08','2026-10-09 17:01:40'),(6,'Optimize database queries for reporting module','completed','2026-10-08','2026-10-09 17:01:40'),(7,'Draft technical documentation for REST API endpoints','completed','2026-10-07','2026-10-09 17:01:40'),(8,'Conduct code review meeting with the backend team','pending','2026-10-10','2026-10-09 17:01:40'),(9,'Prepare presentation slides for sprint retrospective','pending','2026-10-10','2026-10-09 17:01:40'),(10,'Refactor user notification service for scalability','in-progress','2026-10-09','2026-10-09 17:01:40'),(11,'Review pull requests on the main repository','pending','2026-10-09','2026-10-09 17:23:01'),(12,'Complete the UI wireframes for dashboard redesign','in-progress','2026-10-09','2026-10-09 17:23:01'),(13,'Write unit tests for authentication module','pending','2026-10-09','2026-10-09 17:23:01'),(14,'Deploy staging environment updates','completed','2026-10-09','2026-10-09 17:23:01'),(15,'Set up CI/CD pipeline for the new microservice','completed','2026-10-08','2026-10-09 17:23:01'),(16,'Optimize database queries for reporting module','completed','2026-10-08','2026-10-09 17:23:01'),(17,'Draft technical documentation for REST API endpoints','completed','2026-10-07','2026-10-09 17:23:01'),(18,'Conduct code review meeting with the backend team','pending','2026-10-10','2026-10-09 17:23:01'),(19,'Prepare presentation slides for sprint retrospective','pending','2026-10-10','2026-10-09 17:23:01'),(20,'Refactor user notification service for scalability','in-progress','2026-10-09','2026-10-09 17:23:01'),(21,'Review pull requests on the main repository','pending','2026-10-09','2026-10-09 17:23:45'),(22,'Complete the UI wireframes for dashboard redesign','in-progress','2026-10-09','2026-10-09 17:23:45'),(23,'Write unit tests for authentication module','pending','2026-10-09','2026-10-09 17:23:45'),(24,'Deploy staging environment updates','completed','2026-10-09','2026-10-09 17:23:45'),(25,'Set up CI/CD pipeline for the new microservice','completed','2026-10-08','2026-10-09 17:23:45'),(26,'Optimize database queries for reporting module','completed','2026-10-08','2026-10-09 17:23:45'),(27,'Draft technical documentation for REST API endpoints','completed','2026-10-07','2026-10-09 17:23:45'),(28,'Conduct code review meeting with the backend team','pending','2026-10-10','2026-10-09 17:23:45'),(29,'Prepare presentation slides for sprint retrospective','pending','2026-10-10','2026-10-09 17:23:45'),(30,'Refactor user notification service for scalability','in-progress','2026-10-09','2026-10-09 17:23:45');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pmalcantara','Prince Xavier M. Alcantara','pmalcantara@fit.edu.ph','2026-10-09 17:01:40');
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

-- Dump completed on 2026-10-09 18:43:00
