-- MySQL dump 10.14  Distrib 5.5.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: HMS
-- ------------------------------------------------------
-- Server version	5.5.37-MariaDB

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
-- Table structure for table `Bill`
--

DROP TABLE IF EXISTS `Bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bill` (
  `BillID` int(11) NOT NULL AUTO_INCREMENT,
  `Comments` varchar(255) DEFAULT NULL,
  `ReservationID` int(11) DEFAULT NULL,
  PRIMARY KEY (`BillID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bill`
--

LOCK TABLES `Bill` WRITE;
/*!40000 ALTER TABLE `Bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `Bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CheckIn`
--

DROP TABLE IF EXISTS `CheckIn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CheckIn` (
  `CheckInID` int(11) NOT NULL AUTO_INCREMENT,
  `ReservationID` int(11) DEFAULT NULL,
  `RoomID` int(11) DEFAULT NULL,
  `CheckInDate` date DEFAULT NULL,
  PRIMARY KEY (`CheckInID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CheckIn`
--

LOCK TABLES `CheckIn` WRITE;
/*!40000 ALTER TABLE `CheckIn` DISABLE KEYS */;
/*!40000 ALTER TABLE `CheckIn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CheckOut`
--

DROP TABLE IF EXISTS `CheckOut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CheckOut` (
  `CheckoutID` int(11) NOT NULL AUTO_INCREMENT,
  `ReservationID` int(11) DEFAULT NULL,
  `CheckOutDate` date DEFAULT NULL,
  PRIMARY KEY (`CheckoutID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CheckOut`
--

LOCK TABLES `CheckOut` WRITE;
/*!40000 ALTER TABLE `CheckOut` DISABLE KEYS */;
/*!40000 ALTER TABLE `CheckOut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerName` varchar(50) DEFAULT NULL,
  `AddStreet` varchar(50) DEFAULT NULL,
  `AddCity` varchar(50) DEFAULT NULL,
  `AddState` varchar(50) DEFAULT NULL,
  `AddZip` varchar(50) DEFAULT NULL,
  `AddCountry` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `NID` varchar(50) DEFAULT NULL,
  `CCNum` varchar(50) DEFAULT NULL,
  `CCExp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CustomerID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customer`
--

LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;
INSERT INTO `Customer` VALUES (8,'shamim Reza','20','Moulvi Bazar','moulvi Bazar','3220','Bangladesh','01717954716','ms.reza007@gmail.com','bnvknlkn','kvnlnlmlo','3-2020'),(9,'shamim Reza','20','Moulvi Bazar','moulvi Bazar','3220','Bangladesh','01717954716','mk','bnvknlkn','nlmvlm kn','2-2015');
/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Image`
--

DROP TABLE IF EXISTS `Image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Image` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `Path` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Image`
--

LOCK TABLES `Image` WRITE;
/*!40000 ALTER TABLE `Image` DISABLE KEYS */;
INSERT INTO `Image` VALUES (1,'http://localhost/hms/Images/delux.jpg'),(2,'http://localhost/hms/Images/executive.jpg');
/*!40000 ALTER TABLE `Image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Payment`
--

DROP TABLE IF EXISTS `Payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Payment` (
  `PaymentID` int(11) NOT NULL AUTO_INCREMENT,
  `TransactionId` varchar(50) DEFAULT NULL,
  `PaymentTypeID` int(11) DEFAULT NULL,
  `CCNumber` varchar(50) DEFAULT NULL,
  `CCExpirationMonth` varchar(10) DEFAULT NULL,
  `CCExpirationYear` varchar(10) DEFAULT NULL,
  `CCOwner` varchar(50) DEFAULT NULL,
  `PaymentAmount` decimal(10,2) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL,
  `ReservationID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Payment`
--

LOCK TABLES `Payment` WRITE;
/*!40000 ALTER TABLE `Payment` DISABLE KEYS */;
INSERT INTO `Payment` VALUES (1,'23',1,'nlmvlm kn','2','2015',NULL,10.00,'2014-06-09',7);
/*!40000 ALTER TABLE `Payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PaymentType`
--

DROP TABLE IF EXISTS `PaymentType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PaymentType` (
  `PaymentTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `PaymentType` varchar(20) DEFAULT NULL,
  `Description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PaymentTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PaymentType`
--

LOCK TABLES `PaymentType` WRITE;
/*!40000 ALTER TABLE `PaymentType` DISABLE KEYS */;
INSERT INTO `PaymentType` VALUES (1,'Cash','direct'),(2,'PayPal','online');
/*!40000 ALTER TABLE `PaymentType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reservation`
--

DROP TABLE IF EXISTS `Reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reservation` (
  `ReservationID` int(11) NOT NULL AUTO_INCREMENT,
  `CustomerID` int(11) DEFAULT NULL,
  `ReservationDate` date DEFAULT NULL,
  `ExpectedCheckinDate` date DEFAULT NULL,
  `ExpectedCheckOutDate` date DEFAULT NULL,
  `ArrivalTime` time DEFAULT NULL,
  `NumGuests` int(11) DEFAULT NULL,
  `RoomNumber` int(11) DEFAULT NULL,
  `RoomRate` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ReservationID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reservation`
--

LOCK TABLES `Reservation` WRITE;
/*!40000 ALTER TABLE `Reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `Reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Room`
--

DROP TABLE IF EXISTS `Room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Room` (
  `RoomNumber` int(11) NOT NULL AUTO_INCREMENT,
  `RoomTypeID` int(11) DEFAULT NULL,
  `StatusDescription` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`RoomNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=421 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Room`
--

LOCK TABLES `Room` WRITE;
/*!40000 ALTER TABLE `Room` DISABLE KEYS */;
INSERT INTO `Room` VALUES (203,2,'vacant'),(420,1,'booked');
/*!40000 ALTER TABLE `Room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `RoomType`
--

DROP TABLE IF EXISTS `RoomType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `RoomType` (
  `RoomTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `RoomType` varchar(50) NOT NULL,
  `RoomDesc` varchar(255) DEFAULT NULL,
  `RoomRate` decimal(10,2) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `NumBeds` int(11) DEFAULT NULL,
  PRIMARY KEY (`RoomTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `RoomType`
--

LOCK TABLES `RoomType` WRITE;
/*!40000 ALTER TABLE `RoomType` DISABLE KEYS */;
INSERT INTO `RoomType` VALUES (1,'স্ট্যান্ডার্ড রুম',' লেখার টেবিল ও স্টেশনারি সেট। তারযুক্ত ইন্টারনেট সুবিধা । LCD টেলিভিশনের সাথে স্থানীয় এবং কেবল চ্যানেল সংযোগ ।',10.00,'http://localhost/hms/Images/executive.jpg',2),(2,'শৌখিন',' বিনামূল্যে উচ্চ গতির ইন্টারনেট ।ইলেক্ট্রনিক নিরাপদ ।মিনি বার এবং রুম সার্ভিস (24 ঘন্টা) । সরাসরি আন্তর্জাতিক  টেলিফোন কল ।নিজ নিয়ন্ত্রিত এয়ার কন্ডিশনার ।',20.00,'http://localhost/hms/Images/delux.jpg',1);
/*!40000 ALTER TABLE `RoomType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ServiceType`
--

DROP TABLE IF EXISTS `ServiceType`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ServiceType` (
  `ServiceTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ServiceTypeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ServiceType`
--

LOCK TABLES `ServiceType` WRITE;
/*!40000 ALTER TABLE `ServiceType` DISABLE KEYS */;
INSERT INTO `ServiceType` VALUES (1,'বিজনেস সেন্টার',' তারবিহীন ও তারযুক্ত ইন্টারনেট সুবিধা । ভিডিও-কনফারেন্সিং সুবিধা । ফটোকপি / লেজার প্রিন্টিং । মোবাইল টেলিফোন / কম্পিউটার / ল্যাপটপ ভাড়া ।কুরিয়ার সার্ভিস ব্যাবস্হা ।',20.00);
/*!40000 ALTER TABLE `ServiceType` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Services`
--

DROP TABLE IF EXISTS `Services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Services` (
  `ServiceID` int(11) NOT NULL AUTO_INCREMENT,
  `ServiceTypeID` int(11) NOT NULL,
  `NoOfService` int(11) NOT NULL,
  `BillchargeDate` date NOT NULL,
  `BillID` int(11) NOT NULL,
  PRIMARY KEY (`ServiceID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Services`
--

LOCK TABLES `Services` WRITE;
/*!40000 ALTER TABLE `Services` DISABLE KEYS */;
/*!40000 ALTER TABLE `Services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `UserID` varchar(50) NOT NULL DEFAULT '',
  `PassWord` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES ('1789','1789');
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-10 12:05:55
