CREATE DATABASE  IF NOT EXISTS `projectdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `projectdb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: wbmss.mysql.database.azure.com    Database: projectdb
-- ------------------------------------------------------
-- Server version	5.6.26.0

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `AdministratorID` int(5) NOT NULL AUTO_INCREMENT,
  `Password` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AdministratorID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (1,'12','Peter','Chan');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `charity`
--

DROP TABLE IF EXISTS `charity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `charity` (
  `CharityID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `WebsiteUrl` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`CharityID`)
) ENGINE=InnoDB AUTO_INCREMENT=11433 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `charity`
--

LOCK TABLES `charity` WRITE;
/*!40000 ALTER TABLE `charity` DISABLE KEYS */;
INSERT INTO `charity` VALUES (11410,'test','test','test',NULL),(11411,'test2','test2','test',NULL),(11412,'test3','test3','test',NULL),(11421,'Animal Charity Evaluators','Learn how you can be a more effective advocate\r\nHave you ever wondered how you can have the greatest impact helping animals? So have we.\r\n\r\nAnimal Charity Evaluators conducts research to answer that very question. Explore our website to learn how you can ','https://animalcharityevaluators.org/','../upload/charity_pic/Animal Charity Evaluators.png'),(11423,'aeqwewqweqw','','',''),(11424,'','','',''),(11425,'qweqwe','','',''),(11426,'23424234','','',''),(11427,'2342342','','',''),(11428,'345345534','','',''),(11429,'2342342342','','',''),(11430,'On9 Charity','','','../upload/charity_pic/On9 Charity.png'),(11431,'asdas','dasdadasdas','adasdasdsa','../upload/charity_pic/asdas.png'),(11432,'12','12','1212','../upload/charity_pic/12.png');
/*!40000 ALTER TABLE `charity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event` (
  `EventID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Distance` float DEFAULT NULL,
  `DateOfEvent` date DEFAULT NULL,
  `TimeStart` time DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`EventID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` VALUES (1,'2017 42km Full Marathon',42,'2017-09-05','06:00:00',145.00),(2,'2017 21km Half Marathon',21,'2017-09-06','07:00:00',75.00),(3,'2017 5km Funl Run',5,'2017-09-06','15:00:00',20.00),(5,'2017 Test Event',300,'2017-09-07','23:00:00',1000.00);
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventregister`
--

DROP TABLE IF EXISTS `eventregister`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventregister` (
  `RegID` int(5) NOT NULL AUTO_INCREMENT,
  `RunnerID` int(5) NOT NULL,
  `EventID` int(5) NOT NULL,
  `CheckInTime` time DEFAULT NULL,
  `FinishTime` time DEFAULT NULL,
  `TopSpeed` float DEFAULT NULL,
  `PaymentConfirmed` tinyint(1) DEFAULT '0',
  `PaymentTotal` int(11) DEFAULT NULL,
  `RaceKitID` int(5) NOT NULL,
  `RaceKitSent` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`RegID`),
  KEY `FKEventRegis439203` (`EventID`),
  KEY `FKEventRegis634186` (`RaceKitID`),
  KEY `FKEventRegis640020` (`RunnerID`),
  CONSTRAINT `FKEventRegis439203` FOREIGN KEY (`EventID`) REFERENCES `event` (`EventID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKEventRegis634186` FOREIGN KEY (`RaceKitID`) REFERENCES `racekitchoice` (`RaceKitID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKEventRegis640020` FOREIGN KEY (`RunnerID`) REFERENCES `runner` (`RunnerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12368 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventregister`
--

LOCK TABLES `eventregister` WRITE;
/*!40000 ALTER TABLE `eventregister` DISABLE KEYS */;
INSERT INTO `eventregister` VALUES (12354,34,1,'23:42:00','07:52:39',12,0,145,1,1),(12355,35,2,'12:42:00','23:01:53',11,0,75,2,0),(12356,34,3,'00:00:00','00:00:00',0,0,65,3,0),(12357,45,1,'00:00:00','23:00:00',2,0,145,1,0),(12359,34,2,'01:01:00','01:01:01',1,0,120,3,0),(12360,47,1,'00:00:00','00:00:05',0,0,165,2,0),(12366,35,5,NULL,NULL,NULL,0,200,3,0),(12367,40,5,NULL,NULL,NULL,0,100,2,0);
/*!40000 ALTER TABLE `eventregister` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `racekitchoice`
--

DROP TABLE IF EXISTS `racekitchoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `racekitchoice` (
  `RaceKitID` int(5) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`RaceKitID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `racekitchoice`
--

LOCK TABLES `racekitchoice` WRITE;
/*!40000 ALTER TABLE `racekitchoice` DISABLE KEYS */;
INSERT INTO `racekitchoice` VALUES (1,'Option A: Runner\'s bib + RFID bracelet.',NULL,0.00,'image/optionA.png'),(2,'Option B: Option A + hat + water bottle.',NULL,20.00,'image/optionB.png'),(3,'Option C: Option B + t-shirt + sourenir booklet.',NULL,45.00,'image/optionC.png');
/*!40000 ALTER TABLE `racekitchoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `runner`
--

DROP TABLE IF EXISTS `runner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `runner` (
  `RunnerID` int(5) NOT NULL AUTO_INCREMENT,
  `VolunteerID` int(5) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `ProfilePicture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`RunnerID`),
  KEY `FKRunner505187` (`VolunteerID`),
  CONSTRAINT `FKRunner505187` FOREIGN KEY (`VolunteerID`) REFERENCES `volunteer` (`VolunteerID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `runner`
--

LOCK TABLES `runner` WRITE;
/*!40000 ALTER TABLE `runner` DISABLE KEYS */;
INSERT INTO `runner` VALUES (34,NULL,'12','Peter','Chan','Female','2017-07-12','peterchan@gmail.com','Hong Kong','../upload/profile_pic/1500213847.png'),(35,NULL,'12','Tony','Cheung',NULL,'2017-07-22','tonycheung@gmail.com','Hong Kong',NULL),(36,NULL,'12','Mary','Lam','Male','2017-07-11','maryLam@gmail.com','TaiWan',NULL),(37,NULL,'12','Peter','Chan','Male','2017-07-18','peterchan@gmail.com','Hong Kong','../upload/profile_pic/1500309719.png'),(38,NULL,'12','Peter','Chan','Male','2017-07-18','peterchan@gmail.com','Hong Kong','../upload/profile_pic/1500309761.png'),(39,NULL,'12345678','Pui Lam','Cheung','Male','1997-06-03','cheungPuiLam@gmail.com','Hong Kong SAR','../upload/profile_pic/1500311477.jpg'),(40,NULL,'12','Peter','Chan','Male','2017-07-18','peterchan@gmail.com','Hong Kong','../upload/profile_pic/1500311475.png'),(41,NULL,'1234567','Pui Lam','Cheung','Male','1997-06-10','cheungpuilam@gmail.com','Hong Kong SAR','../upload/profile_pic/1500311748.jpg'),(42,NULL,'12345678','Peter','Pan','Male','2000-12-13','PeterPan111@gmail.com','Hong Kong','../upload/profile_pic/1500358815.png'),(43,NULL,'12','Pui Lam','Cheung','Male','1994-09-09','KCC@gmail.com','Hong Kong SAR',''),(44,NULL,'12','Peter','Chan','Male','2017-07-18','peterchan@gmail.com','Hong Kong','../upload/profile_pic/1500370962.png'),(45,NULL,'12','Peter','Cheung','Male','2017-07-18','peterchan@gmail.com','Hong Kong','../upload/profile_pic/1500371124.png'),(46,NULL,'12','Peter','Chan','Male','2017-07-18','peterchan@gmail.com','Hong Kong','../upload/profile_pic/1500384625.png'),(47,NULL,'12345678','Peter','PanPan','Male','2000-12-13','PeterPan@gmail.com','Hong Kong','../upload/profile_pic/1500387955.png'),(48,NULL,'12345678','Peter','Lau','Male','2000-12-13','PeterLau@gmail.com','Hong Kong','../upload/profile_pic/1500388106.png');
/*!40000 ALTER TABLE `runner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsor`
--

DROP TABLE IF EXISTS `sponsor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsor` (
  `SponsorID` int(5) NOT NULL AUTO_INCREMENT,
  `Password` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Company` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SponsorID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsor`
--

LOCK TABLES `sponsor` WRITE;
/*!40000 ALTER TABLE `sponsor` DISABLE KEYS */;
INSERT INTO `sponsor` VALUES (9,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(10,'12','Peter','Chan','Peter Chan LTD.','abc@abc.com'),(11,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(12,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(13,'12','Peter','Chan','12','peterchan@gmail.com'),(14,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(15,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(16,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(17,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(18,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(19,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(20,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(21,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(22,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(23,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(24,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(25,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(26,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(27,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(28,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(29,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(30,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(31,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(32,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(33,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(34,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(35,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(36,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(37,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(38,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(39,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(40,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(41,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(42,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(43,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(44,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(45,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(46,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(47,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(48,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(49,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(50,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(51,'12345678','Peter','Peter','PeterPeterIsAGoodCompany','PeterPeter@gmail.com'),(52,'12','Peter','Chan','Peter Chan LTD.','peterchan@gmail.com'),(53,'12345678','Peter','Lau','PeterLau limited','peterlau@gmail.com'),(54,'12345678','Peter','Lau','peterlau limited.','peterlau@gmail.com');
/*!40000 ALTER TABLE `sponsor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sponsorrecord`
--

DROP TABLE IF EXISTS `sponsorrecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sponsorrecord` (
  `SponsorID` int(5) NOT NULL,
  `CharityID` int(5) NOT NULL,
  `RegID` int(5) NOT NULL,
  `Amount` decimal(10,2) DEFAULT NULL,
  `PaymentConfirmed` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`SponsorID`,`CharityID`,`RegID`),
  KEY `FKSponsorRec723837` (`RegID`),
  KEY `FKSponsorRec587573` (`CharityID`),
  KEY `FKSponsorRec216661` (`SponsorID`),
  CONSTRAINT `FKSponsorRec216661` FOREIGN KEY (`SponsorID`) REFERENCES `sponsor` (`SponsorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKSponsorRec587573` FOREIGN KEY (`CharityID`) REFERENCES `charity` (`CharityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FKSponsorRec723837` FOREIGN KEY (`RegID`) REFERENCES `eventregister` (`RegID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sponsorrecord`
--

LOCK TABLES `sponsorrecord` WRITE;
/*!40000 ALTER TABLE `sponsorrecord` DISABLE KEYS */;
INSERT INTO `sponsorrecord` VALUES (34,11412,12355,237.00,0),(34,11421,12354,1250.00,0),(34,11421,12357,120.00,0),(34,11423,12360,234.00,0),(34,11426,12356,240.00,0),(45,11423,12359,111.00,0),(45,11427,12355,123.00,0);
/*!40000 ALTER TABLE `sponsorrecord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `volunteer`
--

DROP TABLE IF EXISTS `volunteer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volunteer` (
  `VolunteerID` int(5) NOT NULL AUTO_INCREMENT,
  `Password` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`VolunteerID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `volunteer`
--

LOCK TABLES `volunteer` WRITE;
/*!40000 ALTER TABLE `volunteer` DISABLE KEYS */;
INSERT INTO `volunteer` VALUES (1,'12','Peter','Chan','Male','peterchan@gmail.com'),(2,'12','Peter','Chan','Male','peterchan@gmail.com2'),(3,'12','Peter','Chan','Male','peterchan@gmail.com'),(4,'12','Peter','Chan','Male','peterchan@gmail.com'),(5,'12345678','Peter','Lau','Male','PeterLau123@gmail.com'),(6,'12','KC','C','Male','KCC@gmail.com'),(8,'12','Peter','Chan','Male','peterchan@gmail.com'),(9,'12345678','aaa','bbb','Male','aaa@gmail.com'),(10,'12345678','Peter','Lau','Male','peterlauvol@gmail.com'),(11,'12345678','Peter','Lau','Male','peterlau@gmail.com');
/*!40000 ALTER TABLE `volunteer` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-18 23:36:02
