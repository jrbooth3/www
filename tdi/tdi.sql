-- MySQL dump 10.11
--
-- Host: localhost    Database: tdi
-- ------------------------------------------------------
-- Server version	5.0.38-Ubuntu_0ubuntu1-log

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
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE `maintenance` (
  `mainid` int(10) unsigned NOT NULL auto_increment,
  `item` varchar(45) NOT NULL,
  `mileage` decimal(10,0) NOT NULL,
  `date` date NOT NULL,
  `vehicle` varchar(45) NOT NULL,
  `vendorid` varchar(45) NOT NULL,
  `parts` varchar(45) NOT NULL,
  `labor` varchar(45) NOT NULL,
  `hours` varchar(45) NOT NULL,
  PRIMARY KEY  (`mainid`),
  KEY `item` (`item`,`date`,`mileage`,`vehicle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maintenance`
--

LOCK TABLES `maintenance` WRITE;
/*!40000 ALTER TABLE `maintenance` DISABLE KEYS */;
INSERT INTO `maintenance` VALUES (3,'1','81000','2005-05-17','2','1','35','0','2'),(4,'1','84000','2005-07-23','2','1','35','0','2'),(5,'28','81000','2005-05-17','2','1','15','0','.5'),(6,'31','81000','2005-05-17','2','1','250','0','8'),(7,'1','88000','2005-09-12','2','1','35','0','2'),(8,'30','88000','2005-09-12','2','1','8','0','1'),(9,'1','93000','2005-11-29','2','1','35','0','2'),(10,'35','93000','2005-11-29','2','1','150','0','6'),(11,'28','101500','2006-02-26','2','1','15','0','.5'),(12,'1','103645','2006-03-24','2','1','35','0','2'),(13,'32','104000','2006-04-05','2','1','120','0','4'),(14,'40','106000','2006-05-05','2','1','290','50','0'),(15,'30','111000','2006-07-10','2','1','8','0','1'),(16,'34','111000','2006-07-10','2','1','18','0','1'),(17,'1','115450','2006-08-28','2','1','35','0','2'),(18,'33','121000','2006-11-18','2','1','150','0','4'),(19,'1','128950','2007-03-18','2','1','35','0','2'),(20,'28','128950','2007-03-18','2','1','35','0','3'),(21,'26','128950','2007-03-18','2','1','32','0','.5'),(23,'28','135642','2007-06-25','2','1','0','0','.5'),(33,'38','0','2007-05-15','1','2','0','0','0'),(34,'39','1','2007-05-15','1','2','0','0','0'),(37,'37','1','2007-05-15','1','2','0','0','0');
/*!40000 ALTER TABLE `maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rawdata`
--

DROP TABLE IF EXISTS `rawdata`;
CREATE TABLE `rawdata` (
  `data_id` int(10) unsigned NOT NULL auto_increment,
  `mileage` decimal(10,0) NOT NULL,
  `date` date default NULL,
  `gallons` varchar(45) NOT NULL,
  `vehicle` varchar(45) NOT NULL,
  PRIMARY KEY  (`data_id`),
  KEY `vehicle` (`vehicle`,`date`,`mileage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawdata`
--

LOCK TABLES `rawdata` WRITE;
/*!40000 ALTER TABLE `rawdata` DISABLE KEYS */;
INSERT INTO `rawdata` VALUES (2,'98588','2006-01-11','1','2'),(4,'99010','2006-01-19','9.60','2'),(5,'99607','2006-01-27','12.70','2'),(6,'100103','2006-02-03','12','2'),(7,'100557','2006-02-08','10.60','2'),(8,'100978','2006-02-17','9.80','2'),(9,'101182','2006-02-20','4.9','2'),(10,'101473','2006-02-24','6.30','2'),(11,'101681','2006-02-27','5.10','2'),(12,'102224','2006-03-06','11.90','2'),(13,'102695','2006-03-10','10.80','2'),(14,'103247','2006-03-20','12.20','2'),(15,'103839','2006-03-27','13.70','2'),(16,'104409','2006-04-04','13.40','2'),(17,'105065','2006-04-13','15.1','2'),(18,'105516','2006-04-18','10.48','2'),(19,'105838','2006-04-24','7.28','2'),(20,'106106','2006-04-27','5.59','2'),(21,'106506','2006-05-03','8.21','2'),(22,'106821','2006-05-06','6.90','2'),(23,'107290','2006-05-12','10.29','2'),(24,'107851','2006-05-19','12.60','2'),(25,'108124','2006-05-21','6.15','2'),(26,'108599','2006-05-30','10.70','2'),(27,'108923','2006-06-02','7.30','2'),(28,'109420','2006-06-12','10.70','2'),(29,'109807','2006-06-16','9.40','2'),(30,'110074','2006-06-19','6.20','2'),(31,'110632','2006-06-27','12.40','2'),(32,'111023','2006-07-01','8.70','2'),(33,'111391','2006-07-05','8.40','2'),(34,'111845','2006-07-09','10.30','2'),(35,'112288','2006-07-14','9.50','2'),(36,'112794','2006-07-23','11.70','2'),(37,'113240','2006-07-30','9.90','2'),(38,'113697','2006-08-06','10.87','2'),(39,'114271','2006-08-14','13.27','2'),(40,'114609','2006-08-18','7.70','2'),(41,'114856','2006-08-21','6.00','2'),(42,'115067','2006-08-23','4.76','2'),(43,'115694','2006-08-31','14.72','2'),(44,'116218','2006-09-08','11.93','2'),(45,'116785','2006-09-15','12.97','2'),(46,'117245','2006-09-23','10.66','2'),(47,'117744','2006-09-28','11.50','2'),(48,'118371','2006-10-06','12.80','2'),(49,'119070','2006-10-14','13.80','2'),(50,'119948','2006-10-24','17.36','2'),(51,'120352','2006-10-30','8.20','2'),(52,'121298','2006-11-15','19.00','2'),(53,'121807','2006-11-22','11.50','2'),(54,'122230','2006-11-30','9.20','2'),(55,'122883','2006-12-08','14.23','2'),(56,'123935','2007-01-01','21.28','2'),(57,'124485','2007-01-09','12.04','2'),(58,'124975','2007-01-17','11.40','2'),(59,'125480','2007-01-25','11.50','2'),(60,'126052','2007-02-01','13.30','2'),(61,'126764','2007-02-15','16.70','2'),(62,'127167','2007-02-19','9.40','2'),(63,'127743','2007-02-27','12.60','2'),(64,'128187','2007-03-07','10.22','2'),(65,'128586','2007-03-13','8.40','2'),(67,'129521','2007-03-30','12.90','2'),(68,'130142','2007-04-07','12.90','2'),(69,'130721','2007-04-12','13.30','2'),(70,'131181','2007-04-20','10.30','2'),(71,'131633','2007-04-30','10.20','2'),(72,'132001','2007-05-04','8.50','2'),(73,'132459','2007-05-11','11.10','2'),(74,'133049','2007-05-17','11.70','2'),(75,'133410','2007-05-23','8.70','2'),(76,'133928','2007-06-03','12.25','2'),(78,'134539','2007-06-11','7.96','2'),(79,'134829','2007-06-14','6.70','2'),(80,'134916','2007-06-15','1.99','2'),(82,'135029','2007-06-18','2.525','2'),(84,'135400','2007-06-21','8.83','2'),(87,'135970','2007-06-28','6.82','2'),(92,'2170','2007-06-30','72','1'),(93,'13','2007-05-17','1','1'),(95,'136204','2007-07-02','5.43','2'),(96,'135672','2007-06-25','6.41','2'),(97,'134214','2007-06-07','6.50','2'),(98,'128959','2007-03-19','8.51','2'),(99,'136409','2007-07-05','4.56','2'),(100,'2382','2007-07-02','9.19','1'),(101,'136758','2007-07-09','8.21','2'),(102,'136850','2007-07-10','2.08','2'),(103,'136972','2007-07-11','2.72','2'),(104,'2568','2007-07-09','7.17','1'),(105,'137183','2007-07-12','4.60','2'),(106,'137704','2007-07-13','10.55','2'),(107,'137937','2007-07-16','5.41','2'),(108,'138391','2007-07-16','9.90','2'),(111,'138616','2007-07-18','5.00','2'),(112,'2810','2007-07-20','7.8','1');
/*!40000 ALTER TABLE `rawdata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staticint`
--

DROP TABLE IF EXISTS `staticint`;
CREATE TABLE `staticint` (
  `statid` int(10) unsigned NOT NULL auto_increment,
  `staticitem` varchar(45) NOT NULL,
  `staticmileage` decimal(10,0) NOT NULL,
  `statowner` varchar(45) NOT NULL,
  PRIMARY KEY  (`statid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staticint`
--

LOCK TABLES `staticint` WRITE;
/*!40000 ALTER TABLE `staticint` DISABLE KEYS */;
INSERT INTO `staticint` VALUES (1,'oil filter','7500','7'),(26,'oil filter bypass','22500','7'),(28,'air cleaner','3000','7'),(29,'clutch','100000','7'),(30,'fuel filter','30000','7'),(31,'timing belt','60000','7'),(32,'front brakes','50000','7'),(33,'rear brakes','50000','7'),(34,'cabin filter','25000','7'),(35,'tdi heater','100000','7'),(36,'transmission fluid','50000','7'),(37,'timing belt 100k','100000','7'),(38,'oil filter 5k','5000','7'),(39,'gas air cleaner','10000','7'),(40,'tires','50000','7');
/*!40000 ALTER TABLE `staticint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `date_added` varchar(45) character set latin1 collate latin1_bin NOT NULL,
  PRIMARY KEY  (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (7,'john','e396f4fd2b959a9fc3b3221ed4f28df8','2007-06-29 6:11:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE `vehicle` (
  `vehicleid` int(10) unsigned NOT NULL auto_increment,
  `year` varchar(45) NOT NULL,
  `make` varchar(45) NOT NULL,
  `model` varchar(45) NOT NULL,
  `color` varchar(45) NOT NULL,
  `vin` varchar(45) NOT NULL,
  `owner` varchar(45) NOT NULL,
  PRIMARY KEY  (`vehicleid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

LOCK TABLES `vehicle` WRITE;
/*!40000 ALTER TABLE `vehicle` DISABLE KEYS */;
INSERT INTO `vehicle` VALUES (1,'2007','volkswagen','rabbit','sage green','','7'),(2,'1998','volkswagen','jetta tdi','silver','','7');
/*!40000 ALTER TABLE `vehicle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE `vendors` (
  `vendorid` int(10) unsigned NOT NULL auto_increment,
  `vendor_name` varchar(45) NOT NULL,
  `tele` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `owner` varchar(45) NOT NULL,
  PRIMARY KEY  (`vendorid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'home','763-390-7851','708 rum river drive','John Booth','7'),(2,'schmelz','','','Dee','7');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2007-07-25 19:04:25
