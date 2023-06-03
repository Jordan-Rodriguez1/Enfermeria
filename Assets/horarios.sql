-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: testdb
-- ------------------------------------------------------
-- Server version	5.7.42

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
-- Table structure for table `apart`
--

DROP TABLE IF EXISTS `apart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` tinyint(4) NOT NULL,
  `day_id` tinyint(4) NOT NULL,
  `hour_id` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apart`
--

LOCK TABLES `apart` WRITE;
/*!40000 ALTER TABLE `apart` DISABLE KEYS */;
/*!40000 ALTER TABLE `apart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day`
--

DROP TABLE IF EXISTS `day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `day` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `data` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `day_created_by_id` (`created_by`),
  KEY `day_updated_by_id` (`updated_by`),
  KEY `day_deleted_by_id` (`deleted_by`),
  CONSTRAINT `day_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `day_deleted_by_id` FOREIGN KEY (`deleted_by`) REFERENCES `user` (`id`),
  CONSTRAINT `day_updated_by_id` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day`
--

LOCK TABLES `day` WRITE;
/*!40000 ALTER TABLE `day` DISABLE KEYS */;
INSERT INTO `day` VALUES (1,'LUNES','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(2,'MARTES','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(3,'MIÉRCOLES','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(4,'JUEVES','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(5,'VIERNES','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hour`
--

DROP TABLE IF EXISTS `hour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hour` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `data` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hour`
--

LOCK TABLES `hour` WRITE;
/*!40000 ALTER TABLE `hour` DISABLE KEYS */;
INSERT INTO `hour` VALUES (1,'7:00-8:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(2,'8:00-9:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(3,'9:00-10:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(4,'10:00-11:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(5,'11:00-12:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(6,'12:00-1:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(7,'1:00-2:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(8,'2:00-3:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(9,'3:00-4:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(10,'4:00-5:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(11,'5:00-6:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(12,'6:00-7:00','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `hour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professor`
--

DROP TABLE IF EXISTS `professor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professor` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `account` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `professor_created_by_id` (`created_by`),
  KEY `professor_updated_by_id` (`updated_by`),
  KEY `professor_deleted_by_id` (`deleted_by`),
  CONSTRAINT `professor_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `professor_deleted_by_id` FOREIGN KEY (`deleted_by`) REFERENCES `user` (`id`),
  CONSTRAINT `professor_updated_by_id` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professor`
--

LOCK TABLES `professor` WRITE;
/*!40000 ALTER TABLE `professor` DISABLE KEYS */;
INSERT INTO `professor` VALUES (1,'Estela Epifanio',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(2,'Sofía Marino',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(3,'Alma Pascuala',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(4,'Vicente Concepción',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(5,'Maribel Visitación',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(6,'Dionisia Ani',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(7,'Pablo Lolita',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(8,'Zaida Adelardo',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(9,'Cristóbal Pancho',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(10,'Abril Eusebio',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(11,'Camilo Justina',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(12,'Fermín Prudencia',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(13,'Rodolfo Encarna',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(14,'Carlota Remedios',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(15,'Modesto Roberto',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(16,'Adelaida Enrique',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(17,'Fe Macarena',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(18,'Ani Leocadia',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(19,'Rayen José Ángel',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(20,'Duilio Albano',1,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(21,'Rosita Bárbara',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(22,'Ambrosio Mayte',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(23,'Reina Armando',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(24,'Íñigo Jazmín',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(25,'Narciso Jésica',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(26,'Visitación Primitivo',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(27,'Martirio Ruth',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(28,'Tulio Marisol',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(29,'Víctor Blas',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(30,'Nayara Cándido',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022',NULL),(31,'Samanta Encarna',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(32,'Ester Petrona',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(33,'Edu Agapito',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(34,'Amelia Yago',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(35,'Julio César Maite',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(36,'Chus Luis Ángel',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(37,'Rosario Tamara',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(38,'León Flora',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(39,'Julio César Vito',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com'),(40,'Silvio Felipa',0,'2023-05-03 01:52:21',NULL,NULL,1,NULL,NULL,'2022','email@example.com');
/*!40000 ALTER TABLE `professor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) DEFAULT NULL,
  `subject_id` tinyint(4) DEFAULT NULL,
  `hour_id` tinyint(4) DEFAULT NULL,
  `day_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_schedule_id_id` (`schedule_id`),
  KEY `schedule_hour_id_id` (`hour_id`),
  KEY `schedule_day_id_id` (`day_id`),
  KEY `schedule_subject_id_id` (`subject_id`),
  CONSTRAINT `schedule_day_id_id` FOREIGN KEY (`day_id`) REFERENCES `day` (`id`),
  CONSTRAINT `schedule_hour_id_id` FOREIGN KEY (`hour_id`) REFERENCES `hour` (`id`),
  CONSTRAINT `schedule_schedule_id_id` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_data` (`id`),
  CONSTRAINT `schedule_subject_id_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule`
--

LOCK TABLES `schedule` WRITE;
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedule_data`
--

DROP TABLE IF EXISTS `schedule_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedule_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `semester` tinyint(4) NOT NULL,
  `group` varchar(1) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `schedule_data_created_by_id` (`created_by`),
  KEY `schedule_data_updated_by_id` (`updated_by`),
  KEY `schedule_data_deleted_by_id` (`deleted_by`),
  CONSTRAINT `schedule_data_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `schedule_data_deleted_by_id` FOREIGN KEY (`deleted_by`) REFERENCES `user` (`id`),
  CONSTRAINT `schedule_data_updated_by_id` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedule_data`
--

LOCK TABLES `schedule_data` WRITE;
/*!40000 ALTER TABLE `schedule_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `schedule_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `data` varchar(100) NOT NULL,
  `professor_id` tinyint(4) NOT NULL,
  `day_id` tinyint(4) DEFAULT NULL,
  `hour_id` tinyint(4) DEFAULT NULL,
  `quantity` smallint(6) NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_created_by_id` (`created_by`),
  KEY `subject_updated_by_id` (`updated_by`),
  KEY `subject_deleted_by_id` (`deleted_by`),
  KEY `subject_professor_id_id` (`professor_id`),
  CONSTRAINT `subject_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `subject_deleted_by_id` FOREIGN KEY (`deleted_by`) REFERENCES `user` (`id`),
  CONSTRAINT `subject_professor_id_id` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`id`),
  CONSTRAINT `subject_updated_by_id` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'Plática de Gestión y docencia en enfermería',1,1,NULL,0,1,'2023-05-03 02:21:44','2023-05-09 04:37:28',NULL,1,NULL,NULL),(2,'ELECTIVA',1,1,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(3,'Optativa I',4,1,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(4,'Optativa II',2,1,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(5,'Optativa III',3,2,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(6,'Optativa IV',3,2,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(7,'Optativa V',4,2,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(8,'HTI',4,3,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(9,'Didáctica',5,3,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(10,'Tutoría de Gestión y docencia',5,3,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(11,'Seminario de investigación I',6,4,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(12,'Seminario de investigación II',6,4,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(13,'Orientación educativa',7,4,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(14,'Inglés I',7,5,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(15,'Inglés II',8,5,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(16,'Inglés III',8,5,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(17,'Inglés IV',9,2,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(18,'Inglés V',9,1,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(19,'Inglés VI',10,2,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(20,'Inglés VII',10,3,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(21,'Estadística',11,4,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(22,'Inglés VII',11,2,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(23,'Inglés VII',12,4,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(24,'Inglés VII',12,5,NULL,0,1,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(25,'Aarón Rosalinda',13,5,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(26,'Eduardo Pablo',13,1,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(27,'Soraya Fermín',14,1,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(28,'Carmina Abraham',14,2,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(29,'Ibán Josefina',15,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(30,'Vinicio Tatiana',15,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(31,'Ulises Encarnación',16,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(32,'Obdulia Nereo',16,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(33,'Carmina Judith',17,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(34,'Cirilo Malena',17,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(35,'Basilio Jessica',18,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(36,'Juan Bautista Cloe',18,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(37,'Valente Toni',19,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(38,'Saturnina Baldo',19,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(39,'Adrián Filemón',20,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(40,'Izan Fernando',20,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(41,'Pepe María Carmen',21,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(42,'Nazaret Ramona',21,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(43,'Belén Quintín',22,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL),(44,'Azahara Atilio',22,NULL,NULL,0,0,'2023-05-03 02:21:44',NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `data` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `type_created_by_id` (`created_by`),
  KEY `type_updated_by_id` (`updated_by`),
  KEY `type_deleted_by_id` (`deleted_by`),
  CONSTRAINT `type_created_by_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  CONSTRAINT `type_deleted_by_id` FOREIGN KEY (`deleted_by`) REFERENCES `user` (`id`),
  CONSTRAINT `type_updated_by_id` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'admin','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(2,'student','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL),(3,'group_leader','2023-05-03 01:51:54',NULL,NULL,1,NULL,NULL);
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `type_id` tinyint(4) NOT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `semester` tinyint(4) DEFAULT NULL,
  `group` varchar(1) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type_id_id` (`type_id`),
  KEY `user_schedule_id_id` (`schedule_id`),
  CONSTRAINT `user_schedule_id_id` FOREIGN KEY (`schedule_id`) REFERENCES `schedule_data` (`id`),
  CONSTRAINT `user_type_id_id` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','password','hochoa5@ucol.mx',1,1,NULL,NULL,NULL,'admin','2023-05-03 01:51:54',NULL,NULL),(2,'admin','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,1,NULL,NULL,NULL,'admin','2023-05-03 02:02:57',NULL,NULL),(3,'ENFERMERIA','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,1,NULL,NULL,NULL,'ENFERMERÍA','2023-05-03 02:02:57',NULL,NULL),(4,'DIRECCION','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,1,NULL,NULL,NULL,'DIRECCIÓN','2023-05-03 02:02:57',NULL,NULL),(5,'martin','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,1,NULL,NULL,NULL,'Martín Mar','2023-05-03 02:02:57',NULL,NULL),(6,'telmo','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,1,NULL,NULL,NULL,'Telmo Borja','2023-05-03 02:02:57',NULL,NULL),(7,'20220001','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,2,NULL,1,'A','Juan José Régulo','2023-05-03 02:02:57',NULL,NULL),(8,'20220002','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,2,NULL,1,'B','Alonso Maricruz','2023-05-03 02:02:57',NULL,NULL),(9,'20220003','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,2,NULL,3,'C','Pepe Fe','2023-05-03 02:02:57',NULL,NULL),(10,'20220004','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,2,NULL,3,'D','Rosana Próspero','2023-05-03 02:02:57',NULL,NULL),(11,'20220005','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,2,NULL,5,'E','Pili Alba','2023-05-03 02:02:57',NULL,NULL),(12,'20220006','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,2,NULL,5,'A','Chuy Belén','2023-05-03 02:02:57',NULL,NULL),(13,'20220007','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,2,NULL,7,'B','Eulogio Yessenia','2023-05-03 02:02:57',NULL,NULL),(14,'20220008','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,2,NULL,7,'C','Miguel Ángel Cloe','2023-05-03 02:02:57',NULL,NULL),(15,'20220009','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,2,NULL,9,'D','Mauro María Josefa','2023-05-03 02:02:57',NULL,NULL),(16,'20220010','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,2,NULL,9,'E','Dulce Rainerio','2023-05-03 02:02:57',NULL,NULL),(17,'20220011','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,3,NULL,1,'A','Paulina Esteban','2023-05-03 02:02:57',NULL,NULL),(18,'20220012','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,3,NULL,1,'B','Saturnina Ainara','2023-05-03 02:02:57',NULL,NULL),(19,'20220013','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,3,NULL,3,'A','Javi Bernardino','2023-05-03 02:02:57',NULL,NULL),(20,'20220014','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,3,NULL,3,'B','Samuel Maximino','2023-05-03 02:02:57',NULL,NULL),(21,'20220015','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',1,3,NULL,5,'A','Dionisia Soledad','2023-05-03 02:02:57',NULL,NULL),(22,'20220016','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,3,NULL,5,'B','Hermenegildo Jorge','2023-05-03 02:02:57',NULL,NULL),(23,'20220017','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,3,NULL,7,'A','Poncio Izan','2023-05-03 02:02:57',NULL,NULL),(24,'20220018','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,3,NULL,7,'B','Altagracia Sonsoles','2023-05-03 02:02:57',NULL,NULL),(25,'20220019','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,3,NULL,9,'A','Carina Tania','2023-05-03 02:02:57',NULL,NULL),(26,'20220020','8cb2237d0679ca88db6464eac60da96345513964','example@gmail.com',0,3,NULL,9,'B','Teo Débora','2023-05-03 02:02:57',NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-10 10:14:28
