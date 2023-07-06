-- MySQL dump 10.16  Distrib 10.2.31-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: zamarket_churchdb
-- ------------------------------------------------------
-- Server version	10.2.31-MariaDB-cll-lve

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_picture` varchar(100) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_recorddate` datetime NOT NULL,
  `admin_approvedStatus` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin','Trainactivateunleash@gmail.com','42526372_2141055322816234_8646425974721740800_n.png','Judah2020','2018-04-18 13:37:33',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_login`
--

LOCK TABLES `admin_login` WRITE;
/*!40000 ALTER TABLE `admin_login` DISABLE KEYS */;
INSERT INTO `admin_login` VALUES (1,'test','test','test@gmail.com');
/*!40000 ALTER TABLE `admin_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_login_activity`
--

DROP TABLE IF EXISTS `admin_login_activity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_login_activity` (
  `activity_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) NOT NULL,
  `login_datetime` datetime NOT NULL,
  `login_ip` varchar(100) NOT NULL,
  `login_flag` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_login_activity`
--

LOCK TABLES `admin_login_activity` WRITE;
/*!40000 ALTER TABLE `admin_login_activity` DISABLE KEYS */;
INSERT INTO `admin_login_activity` VALUES (1,1,'2019-02-08 08:15:20','::1',0),(2,1,'2019-02-08 15:45:11','::1',1),(3,1,'2019-02-14 23:32:46','72.255.30.121',1),(4,1,'2019-02-15 05:30:31','46.101.16.232',1),(5,1,'2019-02-15 07:19:14','72.255.30.121',0),(6,1,'2019-02-19 09:21:39','174.222.13.227',1),(7,1,'2019-02-19 11:03:13','98.244.43.134',1),(8,1,'2019-02-19 18:48:49','98.244.43.134',1),(9,1,'2019-02-20 18:09:21','98.244.43.134',1),(10,1,'2019-02-20 18:27:28','98.244.43.134',1),(11,1,'2019-02-20 19:33:46','98.244.43.134',1),(12,1,'2019-02-20 19:52:50','98.244.43.134',1),(13,1,'2019-02-20 19:57:39','98.244.43.134',1),(14,1,'2019-02-20 21:08:58','98.244.43.134',1),(15,1,'2019-02-21 03:33:07','103.255.5.85',1),(16,1,'2019-02-21 17:51:11','98.244.43.134',1),(17,1,'2019-02-21 18:18:36','98.244.43.134',1),(18,1,'2019-02-21 21:14:38','98.244.43.134',1),(19,1,'2019-02-21 23:01:26','98.244.43.134',1),(20,1,'2019-02-25 21:05:15','98.244.43.134',1),(21,1,'2019-06-01 00:20:30','39.50.0.19',1);
/*!40000 ALTER TABLE `admin_login_activity` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `book_id` int(10) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(100) NOT NULL,
  `book_details` varchar(5000) NOT NULL,
  `book_image` varchar(500) NOT NULL,
  `book_price` int(10) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'The Evangelist','â€œThe Evangelistâ€ EBOOK $10','bkk.png',10),(2,'The Evangelist','â€œThe Evangelistâ€ $10 EBOOK VOL 2','bk2.png',10),(4,'The Prophetic','The Prophetic Volume 1 Paperback $15','b2.png',15),(6,'The Prophetic','â€œThe Propheticâ€ volume 2 of the prophetic signed paperback $15','change.png',15);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_order`
--

DROP TABLE IF EXISTS `books_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_order` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_totalprice` int(10) NOT NULL,
  `book_id` int(10) NOT NULL,
  `order_book_quantity` int(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_order`
--

LOCK TABLES `books_order` WRITE;
/*!40000 ALTER TABLE `books_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `books_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_stock`
--

DROP TABLE IF EXISTS `books_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books_stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `book_id` int(10) NOT NULL,
  `book_quantity` int(10) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_stock`
--

LOCK TABLES `books_stock` WRITE;
/*!40000 ALTER TABLE `books_stock` DISABLE KEYS */;
INSERT INTO `books_stock` VALUES (1,2,20,'2019-02-19 08:56:52'),(2,1,10,'2019-02-19 09:12:14'),(3,2,10,'2019-02-19 09:12:23'),(4,3,10,'2019-02-19 09:12:38'),(5,4,20,'2019-02-19 09:12:46'),(6,5,20,'2019-02-19 09:12:58'),(7,6,30,'2019-02-19 09:13:09'),(10,1,20,'2019-02-21 03:33:42');
/*!40000 ALTER TABLE `books_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courier`
--

DROP TABLE IF EXISTS `courier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL AUTO_INCREMENT,
  `tracking_id` varchar(100) NOT NULL,
  `shipper_name` varchar(500) NOT NULL,
  `shipper_address` varchar(500) NOT NULL,
  `shipper_phone` varchar(500) NOT NULL,
  `reciver_name` varchar(500) NOT NULL,
  `reciver_address` varchar(500) NOT NULL,
  `reciver_phone` varchar(500) NOT NULL,
  `shippment_type` varchar(500) NOT NULL,
  `consignment_number` varchar(50) NOT NULL,
  `item_name` varchar(500) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `booking_mode` varchar(100) NOT NULL,
  `mode` varchar(100) NOT NULL,
  PRIMARY KEY (`courier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courier`
--

LOCK TABLES `courier` WRITE;
/*!40000 ALTER TABLE `courier` DISABLE KEYS */;
INSERT INTO `courier` VALUES (3,'a123','j','sdfsdfsdfsdf','g','j','j','j','j','jgjh','j','gj','gj','jh','g'),(4,'Thvddf44','Neweracourrier','no 102 isote street ajaka','+2348167201543','Jj okocha','no 102 isote street ajaka','14242920715','Plane','+2348167201543','Iphone 7','60.6kg','Thvddf44','Paid','Air');
/*!40000 ALTER TABLE `courier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_images`
--

DROP TABLE IF EXISTS `event_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_images` (
  `event_id` int(10) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(100) NOT NULL,
  `event_image` varchar(500) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_images`
--

LOCK TABLES `event_images` WRITE;
/*!40000 ALTER TABLE `event_images` DISABLE KEYS */;
INSERT INTO `event_images` VALUES (1,'picture 1','p1.jpeg'),(2,'picture 2','p2.jpeg'),(3,'picture 3','p3.jpeg'),(4,'picture 4','p4.jpeg'),(5,'picture 5','p5.jpeg'),(7,'picture 7','p7.jpeg'),(8,'picture 8','p8.jpeg'),(9,'picture 9','p9.jpeg'),(10,'picture 10','p10.jpeg'),(11,'picture 11','p11.jpeg'),(13,'picture 13','p13.jpeg'),(14,'picture 14','p14.jpeg'),(16,'picture 17','p17.jpeg'),(17,'picture 16','p16.jpeg'),(19,'Pic 6','2056257A-520E-44A0-8E45-61F28E24A972.jpeg'),(20,'Pic 12','EF93BF1F-D724-400C-A06A-A9B4BC5378AC.jpeg'),(21,'Pic 18','D5F0234D-2990-45A6-BCA3-D45876B9E036.jpeg'),(22,'Pic 11','652C9B9D-83B1-44D5-B180-543695B03346.jpeg'),(24,'Pic 12','9AD1481D-C263-44D7-B67B-D35B787687DB.jpeg'),(25,'Pic 13','73B90044-8202-4607-95A3-F24D854803AF.jpeg'),(26,'Pic14','35648A83-6712-47FB-B9FA-D87DBE6DAA91.jpeg'),(27,'Pic14','448CF359-2FD4-4856-9523-972D90D83880.jpeg'),(30,'Pic 16','848549F1-947E-4916-B343-03AE20D2A778.jpeg'),(31,'Pic 16','F333113F-FC0A-4CFB-B4EB-C03F7325E408.jpeg'),(32,'Pic 18','35545BBD-A8AC-4267-A4DE-A7C7CA6C6B38.jpeg'),(33,'Pic 18','FBBB4B3D-419F-46AE-9572-9D9A8605BB3E.jpeg'),(34,'Pic19','94B43B31-39AE-4F50-8BA5-92702D80E88B.jpeg'),(35,'Pic 20','CD13436F-FF33-4FFF-BC6D-6A649B520722.jpeg'),(36,'Pic 21','2A7A9C7D-6CDD-491B-B3B3-CFD6D0F74D79.jpeg'),(37,'Pic21','579769C2-B2C5-43E6-8592-E82E97ACE1EE.jpeg'),(38,'Pic23','993027B5-F994-476C-A2B6-07ECA4BB6A37.jpeg'),(39,'Pic22','CDDB91E1-67C6-46D3-99B3-DA8AE26858E6.jpeg'),(40,'Pic 24','256F0542-5C2C-4729-AE74-C9B3CF4A3801.jpeg'),(41,'Pic24','A971FA9A-1C88-491E-93C4-AD483B5AB898.jpeg'),(42,'Pic 25','ADB58BB3-7581-46D3-A447-FB7CF42EF4C4.jpeg');
/*!40000 ALTER TABLE `event_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mailing_address`
--

DROP TABLE IF EXISTS `mailing_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mailing_address` (
  `address_id` int(10) NOT NULL AUTO_INCREMENT,
  `address_country` varchar(100) NOT NULL,
  `address_charges` varchar(11) NOT NULL,
  `add_description` varchar(5000) NOT NULL,
  `address_recorddate` datetime NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mailing_address`
--

LOCK TABLES `mailing_address` WRITE;
/*!40000 ALTER TABLE `mailing_address` DISABLE KEYS */;
INSERT INTO `mailing_address` VALUES (1,'America ','$50','only for new york,','2019-03-03 15:41:21');
/*!40000 ALTER TABLE `mailing_address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_total` float(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_item`
--

DROP TABLE IF EXISTS `orders_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unit_cost` float(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_item`
--

LOCK TABLES `orders_item` WRITE;
/*!40000 ALTER TABLE `orders_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,'1','9Y190727N6329064H',20.00,'USD','Completed');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_videos`
--

DROP TABLE IF EXISTS `site_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `site_videos` (
  `vid_id` int(10) NOT NULL AUTO_INCREMENT,
  `vid_title` varchar(500) NOT NULL,
  `vid_link` varchar(200) NOT NULL,
  `vid_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`vid_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_videos`
--

LOCK TABLES `site_videos` WRITE;
/*!40000 ALTER TABLE `site_videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `site_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonals`
--

DROP TABLE IF EXISTS `testimonals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonals` (
  `testimonal_id` int(10) NOT NULL AUTO_INCREMENT,
  `testimonal_uname` varchar(50) NOT NULL,
  `testimonal_paragraph` varchar(500) NOT NULL,
  PRIMARY KEY (`testimonal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonals`
--

LOCK TABLES `testimonals` WRITE;
/*!40000 ALTER TABLE `testimonals` DISABLE KEYS */;
INSERT INTO `testimonals` VALUES (6,'Pastor Becca Umu','TAU was amazing! The experience to share the stage with a Visionary, Author and Soul Winner; Pastor Dorothy. It was an AHA moment, made me realize this canâ€™t talk about it but be about it. My eyes of Faith opened to itâ€™s not just preaching the Word but bringing the Word of wisdom to life and let your voice be heard! Thank you Pastors H, Dorothy and No Limits Team for your hearts of generosity and being such a blessing to us all! God bless and much love! Life in the Word, Vallejo'),(8,'Manufou Liaiga-Anoaâ€™i ','TAUâ€™s model of Train Activate & Unleash is impactful and empowering! The intentional efforts to build folks from the ground up in HIS WORD is such invaluable work and the level of commitment that is easily found is moving! Pastor Eighi & First Lady Dorothy have dedicated themselves to ensuring that they serve as integrators and influencers in the lives of others by modeling what they preach-TRAIN, ACTIVATE & UNLEASH..you canâ€™t help but feel engaged to SERVE! \r\nPresident SF Youth'),(9,'Pastor Alex II Toeaina ','The TAU Conference was an awesome way to start the year! A room of believers empowering one another to go to the next level in Faith, love and hope. A special thank you to Pastorâ€™s Eighi and Dorothy for having the heart and boldness, stepping out in faith for the sake of people reaching their maximum potential. Plan to be at the TAU conference 2020, you will be the blessed for it! \r\n\r\n-Alex II ðŸ˜ Soulâ€™d Out Ministries'),(10,'Senior Pastor Darcy Faiaipau','To God be the glory!! I was extremely blessed an honored when FL Dorthy reached out and asked if I could take part in the TAU conference.  The three day conference was a true encouragement and a challenge for my youth leader and staff. The speakers for the days were awesome and what they shared was sharp and on point. I had the privilege of being one of the keynote speakers. If asked again I would definitely take part in this conference again. \r\nCommunity Church San Jose\r\n');
/*!40000 ALTER TABLE `testimonals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_status`
--

DROP TABLE IF EXISTS `time_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_status` (
  `status_id` int(10) NOT NULL AUTO_INCREMENT,
  `status_date` date NOT NULL,
  `status_time` time NOT NULL,
  `shipment_status` varchar(500) NOT NULL,
  `status_cur_location` varchar(500) NOT NULL,
  `tracking_id` varchar(500) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_status`
--

LOCK TABLES `time_status` WRITE;
/*!40000 ALTER TABLE `time_status` DISABLE KEYS */;
INSERT INTO `time_status` VALUES (5,'2019-04-04','02:23:00','j','sdfsfsdf','a123'),(6,'2019-04-03','22:39:00','Package on hold at Los Angeles international airport ','London','a123'),(7,'2019-04-23','20:37:00','Processing','Isale oko nigeria','Thvddf44'),(8,'2019-04-19','17:40:00','Comfirmed Okay.','Sabo makun sagamu','Thvddf44'),(9,'2019-04-19','17:42:00','Package left, ajaka','Enroute','Thvddf44');
/*!40000 ALTER TABLE `time_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_messages`
--

DROP TABLE IF EXISTS `user_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_messages` (
  `msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `msg_fullname` varchar(100) NOT NULL,
  `msg_email` varchar(100) NOT NULL,
  `msg_contactnumber` varchar(50) NOT NULL,
  `msg_text` varchar(5000) NOT NULL,
  `msg_reply` varchar(5000) NOT NULL DEFAULT '',
  `msg_recordflag` int(11) NOT NULL DEFAULT 0 COMMENT '1 when admin will read it and reply',
  `msg_recorddate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_messages`
--

LOCK TABLES `user_messages` WRITE;
/*!40000 ALTER TABLE `user_messages` DISABLE KEYS */;
INSERT INTO `user_messages` VALUES (1,'Diana Williams','DianaWilliams03D@yahoo.com','1','Hi there !\r\n What would a huge increase in relevant traffic mean for your business? If I could greatly increase the number of customers who are interested in your products and services, wouldn\'t you be interested?\r\n Thank You.','',0,'2019-02-15 05:52:55'),(2,'Olivia Riggs','oliviariggs.smb@gmail.com','1','Hello\r\n\r\nWe are interested to increase traffic to your website. \r\n\r\nPlease get back to us in order to discuss the possibility in further detail.\r\n\r\nThanks','',0,'2019-06-19 12:14:18');
/*!40000 ALTER TABLE `user_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visitors`
--

DROP TABLE IF EXISTS `visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `visitors` (
  `visitor_id` int(10) NOT NULL AUTO_INCREMENT,
  `visitor_ip` varchar(500) NOT NULL,
  `visit_date` date NOT NULL,
  PRIMARY KEY (`visitor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1645 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visitors`
--

LOCK TABLES `visitors` WRITE;
/*!40000 ALTER TABLE `visitors` DISABLE KEYS */;
INSERT INTO `visitors` VALUES (2,'::1','2019-02-07'),(3,'103.228.158.41','2019-02-11'),(4,'174.222.8.88','2019-02-11'),(5,'98.244.43.134','2019-02-11'),(6,'72.255.30.121','2019-02-11'),(7,'52.114.6.38','2019-02-11'),(8,'101.50.126.145','2019-02-11'),(9,'141.8.143.168','2019-02-11'),(10,'218.241.108.76','2019-02-11'),(11,'45.116.233.17','2019-02-11'),(12,'45.116.233.16','2019-02-11'),(13,'104.132.10.94','2019-02-11'),(14,'13.92.226.151','2019-02-11'),(15,'104.238.217.123','2019-02-12'),(16,'5.255.250.152','2019-02-12'),(17,'103.59.156.16','2019-02-12'),(18,'217.127.234.235','2019-02-12'),(19,'66.220.149.27','2019-02-12'),(20,'66.220.149.1','2019-02-12'),(21,'66.220.149.9','2019-02-12'),(22,'66.220.149.36','2019-02-12'),(23,'27.151.73.192','2019-02-12'),(24,'40.77.167.16','2019-02-12'),(25,'172.58.30.141','2019-02-13'),(26,'65.46.225.74','2019-02-13'),(27,'68.183.153.200','2019-02-13'),(28,'178.154.171.26','2019-02-13'),(29,'141.8.144.12','2019-02-13'),(30,'77.88.47.50','2019-02-13'),(31,'171.79.4.182','2019-02-13'),(32,'100.43.85.101','2019-02-14'),(33,'93.158.161.23','2019-02-14'),(34,'141.8.143.148','2019-02-14'),(35,'93.158.161.68','2019-02-14'),(36,'185.220.102.4','2019-02-15'),(37,'185.220.100.253','2019-02-15'),(38,'171.25.193.25','2019-02-15'),(39,'178.154.244.142','2019-02-15'),(40,'122.176.141.226','2019-02-15'),(41,'46.101.16.232','2019-02-15'),(42,'54.39.100.61','2019-02-15'),(43,'93.158.161.130','2019-02-15'),(44,'94.130.140.243','2019-02-16'),(45,'174.222.129.84','2019-02-16'),(46,'173.252.127.23','2019-02-17'),(47,'173.252.127.1','2019-02-17'),(48,'109.173.57.189','2019-02-19'),(49,'103.255.5.102','2019-02-19'),(50,'174.222.13.227','2019-02-19'),(51,'103.255.5.98','2019-02-21'),(52,'103.255.5.85','2019-02-21'),(53,'49.34.186.138','2019-02-21'),(54,'42.111.65.212','2019-02-21'),(55,'2402:3a80:1208:245c:0:30:100:5901','2019-02-21'),(56,'103.212.144.118','2019-02-21'),(57,'103.255.5.83','2019-02-21'),(58,'103.255.4.11','2019-02-22'),(59,'103.255.5.61','2019-02-22'),(60,'24.4.234.196','2019-02-22'),(61,'107.77.92.64','2019-02-22'),(62,'180.87.254.107','2019-02-22'),(63,'67.182.187.72','2019-02-22'),(64,'100.43.90.125','2019-02-22'),(65,'174.222.162.19','2019-02-23'),(66,'77.88.5.4','2019-02-23'),(67,'77.88.47.44','2019-02-24'),(68,'34.214.71.62','2019-02-24'),(69,'3.95.216.77','2019-02-24'),(70,'66.220.149.4','2019-02-25'),(71,'66.220.149.33','2019-02-25'),(72,'31.13.127.6','2019-02-25'),(73,'66.220.149.22','2019-02-25'),(74,'73.162.195.154','2019-02-26'),(75,'34.220.97.36','2019-02-26'),(76,'103.255.5.80','2019-02-26'),(77,'157.55.39.124','2019-02-26'),(78,'40.77.167.8','2019-02-26'),(79,'66.220.149.25','2019-02-26'),(80,'173.252.127.40','2019-02-26'),(81,'69.171.251.31','2019-02-26'),(82,'31.13.127.10','2019-02-26'),(83,'173.252.127.36','2019-02-26'),(84,'69.171.251.18','2019-02-26'),(85,'66.220.149.42','2019-02-26'),(86,'66.220.149.35','2019-02-26'),(87,'141.8.144.8','2019-02-27'),(88,'34.210.158.218','2019-02-27'),(89,'34.214.46.249','2019-02-27'),(90,'173.252.127.35','2019-02-27'),(91,'66.220.149.13','2019-02-27'),(92,'212.21.66.6','2019-02-27'),(93,'100.43.90.164','2019-02-27'),(94,'5.255.250.138','2019-02-27'),(95,'212.47.239.148','2019-02-27'),(96,'54.212.90.177','2019-02-28'),(97,'34.213.136.39','2019-02-28'),(98,'66.220.149.28','2019-02-28'),(99,'156.1.172.33','2019-02-28'),(100,'69.171.251.3','2019-02-28'),(101,'65.154.226.126','2019-02-28'),(102,'158.96.85.100','2019-02-28'),(103,'173.252.87.6','2019-02-28'),(104,'73.93.191.91','2019-02-28'),(105,'54.202.28.245','2019-03-01'),(106,'65.155.30.101','2019-03-01'),(107,'99.25.38.7','2019-03-01'),(108,'67.181.124.230','2019-03-01'),(109,'173.252.95.23','2019-03-01'),(110,'172.58.32.32','2019-03-01'),(111,'173.252.127.25','2019-03-01'),(112,'64.246.178.34','2019-03-01'),(113,'73.151.109.209','2019-03-01'),(114,'73.93.141.120','2019-03-01'),(115,'107.77.97.111','2019-03-01'),(116,'66.220.149.12','2019-03-01'),(117,'5.255.250.112','2019-03-01'),(118,'178.154.244.146','2019-03-01'),(119,'173.252.87.12','2019-03-01'),(120,'173.252.87.18','2019-03-01'),(121,'172.58.32.110','2019-03-01'),(122,'172.58.95.78','2019-03-01'),(123,'54.245.78.12','2019-03-02'),(124,'34.215.156.171','2019-03-02'),(125,'66.220.149.37','2019-03-02'),(126,'174.215.22.148','2019-03-02'),(127,'73.93.140.180','2019-03-02'),(128,'173.252.127.17','2019-03-02'),(129,'173.252.87.15','2019-03-02'),(130,'173.252.87.4','2019-03-02'),(131,'71.198.150.144','2019-03-02'),(132,'192.160.102.168','2019-03-02'),(133,'185.104.120.60','2019-03-02'),(134,'199.249.230.65','2019-03-02'),(135,'188.32.120.156','2019-03-02'),(136,'109.70.100.19','2019-03-02'),(137,'174.127.135.130','2019-03-02'),(138,'109.70.100.20','2019-03-02'),(139,'66.220.149.41','2019-03-03'),(140,'35.163.115.78','2019-03-03'),(141,'18.237.172.140','2019-03-03'),(142,'34.218.75.223','2019-03-03'),(143,'173.252.127.5','2019-03-03'),(144,'34.221.161.147','2019-03-03'),(145,'66.220.149.8','2019-03-03'),(146,'38.77.218.162','2019-03-03'),(147,'38.94.186.57','2019-03-03'),(148,'38.94.180.141','2019-03-03'),(149,'38.77.222.3','2019-03-03'),(150,'38.94.186.105','2019-03-03'),(151,'38.94.176.191','2019-03-03'),(152,'34.216.151.21','2019-03-03'),(153,'35.160.230.24','2019-03-03'),(154,'199.249.230.88','2019-03-03'),(155,'157.55.39.96','2019-03-03'),(156,'103.255.4.76','2019-03-03'),(157,'77.247.181.163','2019-03-03'),(158,'51.15.92.212','2019-03-03'),(159,'85.248.227.164','2019-03-03'),(160,'66.220.149.39','2019-03-03'),(161,'66.220.149.32','2019-03-03'),(162,'109.70.100.25','2019-03-04'),(163,'54.202.40.172','2019-03-04'),(164,'173.252.95.16','2019-03-04'),(165,'94.181.75.3','2019-03-04'),(166,'134.209.34.152','2019-03-05'),(167,'134.209.42.182','2019-03-05'),(168,'173.252.127.15','2019-03-05'),(169,'75.85.80.190','2019-03-05'),(170,'37.9.87.155','2019-03-05'),(171,'134.209.33.146','2019-03-05'),(172,'134.209.38.150','2019-03-05'),(173,'45.26.49.67','2019-03-05'),(174,'18.237.73.161','2019-03-06'),(175,'18.237.138.42','2019-03-06'),(176,'66.220.149.17','2019-03-06'),(177,'54.185.128.33','2019-03-06'),(178,'34.220.136.30','2019-03-06'),(179,'34.217.120.170','2019-03-07'),(180,'38.77.216.0','2019-03-07'),(181,'38.77.216.18','2019-03-07'),(182,'38.94.176.51','2019-03-07'),(183,'38.94.180.133','2019-03-07'),(184,'38.77.208.120','2019-03-07'),(185,'38.77.216.238','2019-03-07'),(186,'91.206.14.10','2019-03-08'),(187,'141.8.143.164','2019-03-08'),(188,'37.9.87.128','2019-03-08'),(189,'66.220.149.30','2019-03-08'),(190,'104.130.231.20','2019-03-08'),(191,'54.229.167.35','2019-03-08'),(192,'173.252.127.4','2019-03-09'),(193,'162.209.76.231','2019-03-09'),(194,'54.244.205.63','2019-03-10'),(195,'52.36.64.185','2019-03-10'),(196,'34.217.91.126','2019-03-10'),(197,'34.210.80.131','2019-03-10'),(198,'34.213.192.242','2019-03-10'),(199,'91.210.146.225','2019-03-10'),(200,'34.211.147.78','2019-03-11'),(201,'34.221.28.78','2019-03-11'),(202,'34.250.24.9','2019-03-11'),(203,'66.220.149.11','2019-03-11'),(204,'66.220.149.23','2019-03-11'),(205,'54.245.197.55','2019-03-12'),(206,'34.216.97.6','2019-03-12'),(207,'173.252.127.27','2019-03-12'),(208,'66.220.149.5','2019-03-12'),(209,'5.255.250.141','2019-03-13'),(210,'185.203.119.227','2019-03-13'),(211,'108.88.153.46','2019-03-13'),(212,'100.43.85.113','2019-03-14'),(213,'34.218.44.135','2019-03-15'),(214,'209.141.45.212','2019-03-15'),(215,'176.14.249.166','2019-03-15'),(216,'34.221.52.250','2019-03-16'),(217,'109.74.11.28','2019-03-16'),(218,'178.154.244.133','2019-03-16'),(219,'173.252.127.42','2019-03-17'),(220,'54.214.117.215','2019-03-17'),(221,'54.184.26.136','2019-03-18'),(222,'207.46.13.143','2019-03-18'),(223,'66.220.149.38','2019-03-18'),(224,'54.191.44.216','2019-03-19'),(225,'34.240.253.1','2019-03-19'),(226,'66.220.149.10','2019-03-19'),(227,'66.220.149.2','2019-03-19'),(228,'66.220.149.24','2019-03-19'),(229,'69.171.251.26','2019-03-19'),(230,'31.13.115.16','2019-03-19'),(231,'162.209.103.174','2019-03-20'),(232,'34.222.161.197','2019-03-20'),(233,'73.185.222.156','2019-03-20'),(234,'174.239.1.148','2019-03-20'),(235,'208.80.194.42','2019-03-20'),(236,'18.237.66.199','2019-03-21'),(237,'71.48.33.21','2019-03-21'),(238,'103.255.4.12','2019-03-21'),(239,'34.222.97.209','2019-03-22'),(240,'54.200.0.66','2019-03-22'),(241,'64.246.165.50','2019-03-22'),(242,'100.43.85.160','2019-03-22'),(243,'66.220.149.14','2019-03-22'),(244,'100.43.91.109','2019-03-22'),(245,'66.220.149.20','2019-03-23'),(246,'173.252.127.3','2019-03-23'),(247,'18.237.175.16','2019-03-23'),(248,'34.219.183.126','2019-03-24'),(249,'3.91.94.167','2019-03-24'),(250,'35.161.32.1','2019-03-25'),(251,'54.245.138.217','2019-03-25'),(252,'173.252.127.38','2019-03-25'),(253,'54.88.86.37','2019-03-25'),(254,'207.46.13.76','2019-03-25'),(255,'66.220.149.18','2019-03-25'),(256,'37.9.87.229','2019-03-25'),(257,'18.236.192.244','2019-03-26'),(258,'18.234.71.126','2019-03-26'),(259,'173.252.127.41','2019-03-27'),(260,'54.149.17.16','2019-03-27'),(261,'54.202.245.214','2019-03-28'),(262,'18.237.28.190','2019-03-28'),(263,'66.220.149.26','2019-03-28'),(264,'208.80.194.41','2019-03-28'),(265,'173.252.127.29','2019-03-28'),(266,'93.158.161.17','2019-03-28'),(267,'120.22.234.83','2019-03-28'),(268,'104.223.38.215','2019-03-29'),(269,'66.220.149.19','2019-03-29'),(270,'34.219.154.245','2019-03-30'),(271,'37.9.87.192','2019-03-30'),(272,'66.220.149.29','2019-03-30'),(273,'173.252.127.18','2019-03-31'),(274,'66.220.149.15','2019-03-31'),(275,'66.220.149.3','2019-03-31'),(276,'173.252.127.14','2019-04-01'),(277,'195.154.107.8','2019-04-02'),(278,'111.196.87.127','2019-04-03'),(279,'173.252.127.16','2019-04-04'),(280,'209.97.155.208','2019-04-04'),(281,'163.172.255.82','2019-04-04'),(282,'166.78.138.153','2019-04-04'),(283,'185.153.196.157','2019-04-05'),(284,'172.245.14.170','2019-04-05'),(285,'66.220.149.31','2019-04-07'),(286,'34.221.7.216','2019-04-07'),(287,'34.214.53.26','2019-04-07'),(288,'173.252.127.12','2019-04-08'),(289,'173.252.127.12','2019-04-08'),(290,'173.252.127.6','2019-04-08'),(291,'66.220.149.21','2019-04-08'),(292,'5.255.250.179','2019-04-08'),(293,'54.149.46.16','2019-04-08'),(294,'34.222.88.72','2019-04-08'),(295,'151.80.39.56','2019-04-09'),(296,'138.197.172.73','2019-04-10'),(297,'45.114.51.136','2019-04-12'),(298,'54.36.148.25','2019-04-12'),(299,'157.55.39.172','2019-04-12'),(300,'34.221.129.125','2019-04-13'),(301,'173.252.127.28','2019-04-13'),(302,'173.252.127.2','2019-04-13'),(303,'64.246.165.210','2019-04-13'),(304,'173.252.127.48','2019-04-14'),(305,'173.252.127.9','2019-04-14'),(306,'77.88.47.41','2019-04-14'),(307,'54.36.150.22','2019-04-15'),(308,'66.220.149.34','2019-04-15'),(309,'40.77.167.39','2019-04-15'),(310,'173.252.95.22','2019-04-15'),(311,'66.220.149.16','2019-04-15'),(312,'34.208.200.65','2019-04-16'),(313,'54.202.206.215','2019-04-16'),(314,'185.220.101.6','2019-04-16'),(315,'173.252.95.1','2019-04-16'),(316,'173.252.95.5','2019-04-16'),(317,'209.85.238.88','2019-04-17'),(318,'209.85.238.90','2019-04-17'),(319,'149.202.86.127','2019-04-17'),(320,'173.252.127.11','2019-04-17'),(321,'173.252.95.21','2019-04-17'),(322,'173.252.95.25','2019-04-17'),(323,'54.36.148.247','2019-04-17'),(324,'209.85.238.86','2019-04-17'),(325,'66.249.90.176','2019-04-17'),(326,'66.249.90.184','2019-04-17'),(327,'66.249.90.180','2019-04-17'),(328,'66.249.90.183','2019-04-17'),(329,'54.183.22.245','2019-04-18'),(330,'209.85.238.84','2019-04-18'),(331,'54.36.150.66','2019-04-18'),(332,'54.36.149.79','2019-04-18'),(333,'66.249.65.180','2019-04-18'),(334,'54.36.150.169','2019-04-18'),(335,'185.220.101.26','2019-04-18'),(336,'93.119.227.19','2019-04-18'),(337,'69.4.87.74','2019-04-18'),(338,'69.4.87.74','2019-04-18'),(339,'34.222.39.5','2019-04-19'),(340,'18.237.57.57','2019-04-19'),(341,'54.36.149.60','2019-04-19'),(342,'54.36.149.77','2019-04-19'),(343,'77.88.47.20','2019-04-19'),(344,'54.36.149.65','2019-04-19'),(345,'34.212.40.22','2019-04-20'),(346,'34.215.52.31','2019-04-20'),(347,'173.252.127.43','2019-04-20'),(348,'173.252.127.46','2019-04-20'),(349,'66.249.90.178','2019-04-20'),(350,'66.249.73.212','2019-04-20'),(351,'54.36.148.193','2019-04-20'),(352,'173.252.127.34','2019-04-20'),(353,'173.252.95.33','2019-04-20'),(354,'173.252.95.7','2019-04-20'),(355,'54.36.150.79','2019-04-20'),(356,'173.252.127.13','2019-04-21'),(357,'176.126.83.211','2019-04-21'),(358,'93.119.227.91','2019-04-21'),(359,'93.119.227.91','2019-04-21'),(360,'34.218.206.150','2019-04-21'),(361,'173.252.95.28','2019-04-21'),(362,'199.115.117.70','2019-04-21'),(363,'52.43.189.37','2019-04-22'),(364,'54.187.52.99','2019-04-22'),(365,'34.234.54.252','2019-04-22'),(366,'95.211.148.51','2019-04-22'),(367,'54.36.148.2','2019-04-22'),(368,'69.171.251.29','2019-04-22'),(369,'173.252.127.32','2019-04-22'),(370,'173.252.127.26','2019-04-22'),(371,'31.13.127.9','2019-04-22'),(372,'173.252.95.8','2019-04-22'),(373,'173.252.95.9','2019-04-22'),(374,'66.249.65.182','2019-04-23'),(375,'173.252.95.12','2019-04-23'),(376,'173.252.95.43','2019-04-23'),(377,'157.55.39.122','2019-04-23'),(378,'66.249.73.210','2019-04-24'),(379,'141.8.143.145','2019-04-24'),(380,'34.221.131.154','2019-04-24'),(381,'34.220.11.146','2019-04-24'),(382,'34.222.96.231','2019-04-25'),(383,'35.155.200.138','2019-04-25'),(384,'94.230.208.147','2019-04-25'),(385,'173.252.87.8','2019-04-25'),(386,'54.36.148.226','2019-04-26'),(387,'173.252.95.38','2019-04-26'),(388,'72.80.29.181','2019-04-26'),(389,'66.249.65.184','2019-04-26'),(390,'54.36.148.151','2019-04-26'),(391,'54.36.150.61','2019-04-26'),(392,'34.220.4.120','2019-04-27'),(393,'54.244.216.53','2019-04-27'),(394,'54.36.148.72','2019-04-27'),(395,'54.36.150.90','2019-04-27'),(396,'66.249.73.208','2019-04-27'),(397,'54.149.98.57','2019-04-28'),(398,'34.214.127.190','2019-04-28'),(399,'54.36.148.201','2019-04-28'),(400,'91.250.241.241','2019-04-28'),(401,'91.250.241.241','2019-04-28'),(402,'93.119.227.34','2019-04-28'),(403,'93.119.227.34','2019-04-28'),(404,'35.182.224.202','2019-04-28'),(405,'54.36.148.137','2019-04-28'),(406,'34.230.28.243','2019-04-29'),(407,'52.42.66.127','2019-04-29'),(408,'54.68.50.23','2019-04-29'),(409,'34.211.112.124','2019-04-30'),(410,'34.219.124.143','2019-04-30'),(411,'157.55.39.82','2019-04-30'),(412,'54.36.149.35','2019-04-30'),(413,'173.252.95.4','2019-04-30'),(414,'173.252.95.39','2019-04-30'),(415,'173.252.95.19','2019-04-30'),(416,'173.252.95.10','2019-04-30'),(417,'173.252.95.11','2019-04-30'),(418,'192.162.102.230','2019-04-30'),(419,'54.213.142.162','2019-05-01'),(420,'173.252.95.20','2019-05-01'),(421,'5.255.250.102','2019-05-01'),(422,'173.252.95.29','2019-05-01'),(423,'173.252.95.24','2019-05-01'),(424,'173.252.95.34','2019-05-02'),(425,'173.252.95.41','2019-05-02'),(426,'181.215.120.130','2019-05-02'),(427,'173.252.95.32','2019-05-02'),(428,'93.158.161.28','2019-05-03'),(429,'13.230.177.41','2019-05-04'),(430,'13.230.177.41','2019-05-04'),(431,'104.130.24.234','2019-05-05'),(432,'174.215.0.46','2019-05-05'),(433,'54.36.148.51','2019-05-05'),(434,'167.114.233.118','2019-05-06'),(435,'14.143.67.82','2019-05-06'),(436,'45.55.62.100','2019-05-06'),(437,'159.203.68.90','2019-05-06'),(438,'54.36.148.211','2019-05-06'),(439,'166.78.137.206','2019-05-08'),(440,'35.226.76.246','2019-05-08'),(441,'23.251.145.225','2019-05-08'),(442,'35.232.197.153','2019-05-08'),(443,'35.225.22.68','2019-05-08'),(444,'104.154.36.92','2019-05-08'),(445,'35.188.140.215','2019-05-08'),(446,'93.158.161.83','2019-05-08'),(447,'93.158.166.137','2019-05-08'),(448,'35.202.253.19','2019-05-08'),(449,'35.239.122.65','2019-05-09'),(450,'66.249.90.185','2019-05-09'),(451,'35.225.196.183','2019-05-09'),(452,'35.188.108.23','2019-05-09'),(453,'141.8.142.100','2019-05-10'),(454,'37.9.113.160','2019-05-10'),(455,'199.19.248.218','2019-05-10'),(456,'37.9.113.57','2019-05-11'),(457,'54.36.148.116','2019-05-11'),(458,'77.234.68.250','2019-05-11'),(459,'40.77.167.100','2019-05-12'),(460,'141.8.142.166','2019-05-12'),(461,'54.36.148.6','2019-05-13'),(462,'54.36.148.95','2019-05-14'),(463,'54.36.148.71','2019-05-14'),(464,'54.36.149.31','2019-05-14'),(465,'54.36.148.202','2019-05-14'),(466,'54.36.148.158','2019-05-14'),(467,'37.9.113.46','2019-05-15'),(468,'134.209.112.18','2019-05-15'),(469,'54.36.149.44','2019-05-15'),(470,'54.36.148.27','2019-05-15'),(471,'34.221.140.209','2019-05-16'),(472,'91.210.145.46','2019-05-16'),(473,'34.222.167.167','2019-05-17'),(474,'134.209.112.161','2019-05-17'),(475,'157.55.39.169','2019-05-17'),(476,'34.210.89.166','2019-05-18'),(477,'35.161.153.51','2019-05-18'),(478,'54.36.149.18','2019-05-18'),(479,'167.114.174.95','2019-05-19'),(480,'194.44.61.241','2019-05-19'),(481,'34.222.171.77','2019-05-19'),(482,'40.77.167.84','2019-05-19'),(483,'173.252.127.33','2019-05-19'),(484,'18.237.114.34','2019-05-20'),(485,'54.190.6.137','2019-05-20'),(486,'163.172.255.58','2019-05-20'),(487,'173.252.87.19','2019-05-21'),(488,'13.52.180.95','2019-05-22'),(489,'52.12.178.197','2019-05-22'),(490,'54.36.149.20','2019-05-22'),(491,'54.36.149.52','2019-05-22'),(492,'40.77.167.76','2019-05-22'),(493,'173.252.87.1','2019-05-22'),(494,'178.128.233.84','2019-05-23'),(495,'54.212.122.109','2019-05-24'),(496,'54.214.230.37','2019-05-24'),(497,'66.220.149.43','2019-05-24'),(498,'66.220.149.7','2019-05-25'),(499,'66.220.149.40','2019-05-25'),(500,'66.220.149.46','2019-05-25'),(501,'51.77.129.159','2019-05-25'),(502,'34.221.188.91','2019-05-26'),(503,'173.252.127.22','2019-05-26'),(504,'173.252.127.30','2019-05-26'),(505,'173.252.127.47','2019-05-26'),(506,'173.252.127.44','2019-05-26'),(507,'51.158.73.199','2019-05-26'),(508,'66.220.149.48','2019-05-26'),(509,'34.215.205.35','2019-05-27'),(510,'54.36.148.46','2019-05-27'),(511,'77.234.68.53','2019-05-27'),(512,'40.77.167.158','2019-05-27'),(513,'18.237.166.249','2019-05-28'),(514,'173.252.127.8','2019-05-28'),(515,'54.36.150.25','2019-05-28'),(516,'165.22.198.150','2019-05-28'),(517,'54.36.150.88','2019-05-28'),(518,'40.77.167.120','2019-05-29'),(519,'162.244.33.8','2019-05-29'),(520,'34.217.100.70','2019-05-30'),(521,'34.220.79.226','2019-05-30'),(522,'34.221.25.64','2019-05-30'),(523,'40.77.167.81','2019-05-30'),(524,'207.46.13.64','2019-05-31'),(525,'54.36.148.191','2019-05-31'),(526,'54.36.150.190','2019-05-31'),(527,'52.18.195.227','2019-05-31'),(528,'173.252.127.37','2019-06-01'),(529,'173.252.127.24','2019-06-01'),(530,'173.252.127.45','2019-06-01'),(531,'39.50.0.19','2019-06-01'),(532,'54.36.149.7','2019-06-01'),(533,'77.243.191.19','2019-06-01'),(534,'173.252.127.21','2019-06-02'),(535,'66.220.149.44','2019-06-02'),(536,'66.220.149.45','2019-06-02'),(537,'66.220.149.6','2019-06-02'),(538,'66.220.149.6','2019-06-02'),(539,'66.220.149.47','2019-06-02'),(540,'54.36.150.105','2019-06-02'),(541,'122.161.102.66','2019-06-03'),(542,'207.46.13.141','2019-06-03'),(543,'54.36.148.183','2019-06-03'),(544,'34.220.91.253','2019-06-04'),(545,'54.146.44.66','2019-06-04'),(546,'173.252.83.11','2019-06-04'),(547,'173.252.83.1','2019-06-04'),(548,'173.252.83.4','2019-06-04'),(549,'173.252.83.6','2019-06-04'),(550,'35.192.236.160','2019-06-04'),(551,'173.252.127.19','2019-06-05'),(552,'173.252.127.31','2019-06-05'),(553,'173.252.127.31','2019-06-05'),(554,'173.252.127.31','2019-06-05'),(555,'173.252.127.31','2019-06-05'),(556,'50.97.77.188','2019-06-05'),(557,'3.112.16.174','2019-06-05'),(558,'34.240.175.73','2019-06-05'),(559,'173.252.87.38','2019-06-06'),(560,'173.252.87.36','2019-06-06'),(561,'173.252.87.24','2019-06-06'),(562,'173.252.87.14','2019-06-06'),(563,'173.252.87.3','2019-06-06'),(564,'173.252.127.39','2019-06-06'),(565,'69.171.251.21','2019-06-06'),(566,'69.171.251.19','2019-06-06'),(567,'69.171.251.43','2019-06-06'),(568,'69.171.251.36','2019-06-06'),(569,'69.171.251.40','2019-06-06'),(570,'69.171.251.20','2019-06-07'),(571,'69.171.251.12','2019-06-07'),(572,'69.171.251.24','2019-06-07'),(573,'40.77.167.14','2019-06-07'),(574,'157.55.39.98','2019-06-07'),(575,'149.20.243.70','2019-06-07'),(576,'162.209.101.93','2019-06-07'),(577,'35.182.226.3','2019-06-08'),(578,'173.252.87.2','2019-06-08'),(579,'173.252.87.39','2019-06-08'),(580,'173.252.127.53','2019-06-08'),(581,'173.252.127.50','2019-06-08'),(582,'54.36.149.32','2019-06-08'),(583,'157.55.39.235','2019-06-08'),(584,'51.158.121.89','2019-06-08'),(585,'207.46.13.44','2019-06-09'),(586,'54.36.150.48','2019-06-09'),(587,'54.36.150.172','2019-06-10'),(588,'173.252.87.32','2019-06-10'),(589,'173.252.87.11','2019-06-10'),(590,'173.252.87.35','2019-06-11'),(591,'173.252.87.34','2019-06-11'),(592,'173.252.87.27','2019-06-11'),(593,'173.252.87.34','2019-06-11'),(594,'173.252.87.5','2019-06-11'),(595,'173.252.87.22','2019-06-11'),(596,'173.252.87.9','2019-06-11'),(597,'173.252.87.33','2019-06-11'),(598,'173.252.87.16','2019-06-11'),(599,'178.164.146.36','2019-06-11'),(600,'42.236.10.117','2019-06-11'),(601,'54.187.150.136','2019-06-11'),(602,'34.212.77.195','2019-06-11'),(603,'166.78.145.227','2019-06-12'),(604,'66.96.214.58','2019-06-13'),(605,'173.252.79.8','2019-06-13'),(606,'173.252.79.5','2019-06-13'),(607,'173.252.79.3','2019-06-13'),(608,'173.252.79.4','2019-06-13'),(609,'173.252.79.1','2019-06-13'),(610,'173.252.79.2','2019-06-13'),(611,'54.36.150.122','2019-06-13'),(612,'193.148.19.182','2019-06-13'),(613,'34.212.207.2','2019-06-14'),(614,'173.252.87.10','2019-06-14'),(615,'173.252.87.37','2019-06-14'),(616,'173.252.87.7','2019-06-14'),(617,'40.77.167.72','2019-06-14'),(618,'109.70.100.18','2019-06-15'),(619,'109.70.100.24','2019-06-15'),(620,'199.249.230.112','2019-06-15'),(621,'54.36.148.104','2019-06-15'),(622,'158.69.225.33','2019-06-16'),(623,'51.77.246.199','2019-06-16'),(624,'18.237.19.90','2019-06-16'),(625,'173.252.127.10','2019-06-16'),(626,'173.252.127.55','2019-06-16'),(627,'54.36.150.7','2019-06-16'),(628,'31.13.115.23','2019-06-16'),(629,'54.36.150.51','2019-06-16'),(630,'173.252.95.13','2019-06-16'),(631,'173.252.95.26','2019-06-16'),(632,'54.36.150.137','2019-06-17'),(633,'173.252.127.49','2019-06-17'),(634,'54.187.58.194','2019-06-17'),(635,'54.36.148.129','2019-06-17'),(636,'54.36.150.68','2019-06-17'),(637,'157.55.39.125','2019-06-17'),(638,'54.36.150.178','2019-06-17'),(639,'173.252.87.30','2019-06-17'),(640,'173.252.87.21','2019-06-17'),(641,'173.252.87.13','2019-06-17'),(642,'173.252.87.25','2019-06-17'),(643,'52.25.29.106','2019-06-18'),(644,'34.221.248.203','2019-06-18'),(645,'54.36.150.145','2019-06-18'),(646,'185.158.149.221','2019-06-18'),(647,'54.187.25.245','2019-06-19'),(648,'34.209.136.91','2019-06-19'),(649,'207.46.13.180','2019-06-19'),(650,'207.46.13.116','2019-06-19'),(651,'122.161.98.249','2019-06-19'),(652,'54.36.150.84','2019-06-20'),(653,'40.77.167.96','2019-06-20'),(654,'207.46.13.115','2019-06-20'),(655,'35.163.107.115','2019-06-20'),(656,'52.13.62.251','2019-06-20'),(657,'64.246.165.170','2019-06-20'),(658,'157.55.39.94','2019-06-20'),(659,'35.162.60.24','2019-06-21'),(660,'54.36.150.82','2019-06-21'),(661,'54.149.136.135','2019-06-22'),(662,'40.77.167.90','2019-06-22'),(663,'151.80.39.16','2019-06-22'),(664,'54.202.112.2','2019-06-23'),(665,'54.187.50.8','2019-06-23'),(666,'54.202.244.85','2019-06-24'),(667,'54.214.176.145','2019-06-24'),(668,'173.252.79.7','2019-06-24'),(669,'173.252.79.6','2019-06-24'),(670,'40.77.167.106','2019-06-24'),(671,'52.34.248.160','2019-06-25'),(672,'18.236.185.151','2019-06-25'),(673,'35.180.136.228','2019-06-25'),(674,'207.46.13.19','2019-06-25'),(675,'34.223.205.53','2019-06-26'),(676,'52.12.247.246','2019-06-26'),(677,'34.77.55.10','2019-06-26'),(678,'199.229.249.163','2019-06-26'),(679,'54.152.214.47','2019-06-26'),(680,'34.222.224.93','2019-06-27'),(681,'34.217.212.120','2019-06-27'),(682,'54.36.150.54','2019-06-27'),(683,'145.239.19.77','2019-06-27'),(684,'208.121.5.32','2019-06-28'),(685,'54.244.98.243','2019-06-28'),(686,'52.32.148.112','2019-06-28'),(687,'173.252.87.29','2019-06-28'),(688,'173.252.87.31','2019-06-28'),(689,'54.36.150.151','2019-06-28'),(690,'34.245.129.77','2019-06-28'),(691,'173.252.87.28','2019-06-28'),(692,'54.218.208.18','2019-06-29'),(693,'40.77.167.116','2019-06-29'),(694,'157.55.39.105','2019-06-29'),(695,'69.171.251.32','2019-06-30'),(696,'69.171.251.47','2019-06-30'),(697,'50.112.223.189','2019-06-30'),(698,'173.252.87.20','2019-06-30'),(699,'173.252.87.20','2019-06-30'),(700,'173.252.87.23','2019-06-30'),(701,'173.252.87.26','2019-06-30'),(702,'207.46.13.35','2019-06-30'),(703,'54.38.123.235','2019-06-30'),(704,'157.55.39.137','2019-06-30'),(705,'34.222.41.36','2019-07-01'),(706,'54.245.142.19','2019-07-02'),(707,'173.252.83.10','2019-07-02'),(708,'173.252.83.5','2019-07-02'),(709,'173.252.83.9','2019-07-02'),(710,'34.77.242.233','2019-07-02'),(711,'54.244.200.132','2019-07-02'),(712,'54.184.124.177','2019-07-03'),(713,'77.234.65.153','2019-07-03'),(714,'207.46.13.221','2019-07-03'),(715,'54.36.148.150','2019-07-03'),(716,'167.71.167.201','2019-07-03'),(717,'54.36.148.30','2019-07-03'),(718,'34.214.69.74','2019-07-04'),(719,'34.222.96.145','2019-07-04'),(720,'173.252.87.40','2019-07-04'),(721,'54.36.149.47','2019-07-04'),(722,'167.71.188.108','2019-07-04'),(723,'35.188.47.47','2019-07-04'),(724,'34.217.215.206','2019-07-05'),(725,'54.190.246.233','2019-07-05'),(726,'34.77.140.167','2019-07-05'),(727,'54.214.226.192','2019-07-06'),(728,'52.43.126.14','2019-07-06'),(729,'173.252.83.16','2019-07-06'),(730,'173.252.83.8','2019-07-06'),(731,'173.252.79.10','2019-07-06'),(732,'31.13.127.29','2019-07-07'),(733,'31.13.127.28','2019-07-07'),(734,'31.13.127.13','2019-07-07'),(735,'31.13.127.4','2019-07-07'),(736,'31.13.127.20','2019-07-07'),(737,'54.190.194.130','2019-07-07'),(738,'40.77.167.102','2019-07-07'),(739,'77.88.5.200','2019-07-07'),(740,'104.130.231.140','2019-07-07'),(741,'173.252.95.46','2019-07-08'),(742,'173.252.95.50','2019-07-08'),(743,'176.31.101.204','2019-07-08'),(744,'34.222.69.241','2019-07-09'),(745,'46.161.60.90','2019-07-09'),(746,'207.46.13.40','2019-07-09'),(747,'173.252.87.17','2019-07-09'),(748,'73.66.71.144','2019-07-09'),(749,'69.171.251.4','2019-07-09'),(750,'69.171.251.39','2019-07-09'),(751,'157.55.39.179','2019-07-09'),(752,'119.23.72.135','2019-07-09'),(753,'173.252.79.11','2019-07-09'),(754,'173.252.79.9','2019-07-09'),(755,'66.249.73.138','2019-07-09'),(756,'54.36.149.28','2019-07-10'),(757,'34.219.210.71','2019-07-10'),(758,'207.46.13.155','2019-07-10'),(759,'34.210.147.107','2019-07-10'),(760,'166.78.138.150','2019-07-10'),(761,'207.46.13.121','2019-07-10'),(762,'54.36.148.94','2019-07-10'),(763,'54.245.149.201','2019-07-11'),(764,'66.249.65.194','2019-07-11'),(765,'66.249.65.136','2019-07-11'),(766,'54.36.149.4','2019-07-11'),(767,'54.189.6.155','2019-07-12'),(768,'34.219.209.158','2019-07-12'),(769,'64.246.165.190','2019-07-12'),(770,'52.41.200.122','2019-07-12'),(771,'207.46.13.181','2019-07-13'),(772,'18.236.199.201','2019-07-13'),(773,'40.77.167.197','2019-07-13'),(774,'34.245.230.144','2019-07-13'),(775,'66.249.75.9','2019-07-13'),(776,'40.77.167.108','2019-07-13'),(777,'66.249.75.13','2019-07-13'),(778,'18.237.16.137','2019-07-14'),(779,'188.32.136.113','2019-07-14'),(780,'18.237.218.229','2019-07-15'),(781,'40.77.167.75','2019-07-15'),(782,'54.36.150.171','2019-07-15'),(783,'34.229.45.163','2019-07-15'),(784,'34.217.95.170','2019-07-16'),(785,'40.77.167.28','2019-07-16'),(786,'66.70.157.189','2019-07-16'),(787,'66.249.75.11','2019-07-16'),(788,'207.46.13.144','2019-07-16'),(789,'54.36.149.85','2019-07-16'),(790,'167.114.117.176','2019-07-17'),(791,'54.36.150.40','2019-07-17'),(792,'54.36.149.83','2019-07-17'),(793,'34.210.86.111','2019-07-18'),(794,'69.171.251.17','2019-07-18'),(795,'69.171.251.22','2019-07-18'),(796,'69.171.251.14','2019-07-18'),(797,'52.13.37.40','2019-07-18'),(798,'37.204.75.254','2019-07-18'),(799,'85.10.56.138','2019-07-18'),(800,'54.166.161.66','2019-07-19'),(801,'13.56.149.12','2019-07-19'),(802,'3.90.55.68','2019-07-19'),(803,'47.252.86.74','2019-07-19'),(804,'34.221.1.153','2019-07-20'),(805,'66.249.75.18','2019-07-20'),(806,'207.46.13.197','2019-07-21'),(807,'40.77.167.53','2019-07-21'),(808,'54.36.150.31','2019-07-21'),(809,'134.119.221.30','2019-07-21'),(810,'54.36.150.108','2019-07-22'),(811,'54.187.110.133','2019-07-22'),(812,'54.36.150.62','2019-07-22'),(813,'40.77.167.88','2019-07-22'),(814,'107.178.232.246','2019-07-22'),(815,'54.36.148.62','2019-07-23'),(816,'54.36.150.174','2019-07-23'),(817,'18.237.127.58','2019-07-23'),(818,'54.187.120.20','2019-07-23'),(819,'54.36.148.136','2019-07-23'),(820,'69.171.251.1','2019-07-24'),(821,'69.171.251.35','2019-07-24'),(822,'69.171.251.8','2019-07-24'),(823,'69.171.251.41','2019-07-24'),(824,'69.171.251.42','2019-07-24'),(825,'34.211.49.244','2019-07-24'),(826,'54.212.132.179','2019-07-24'),(827,'49.234.97.202','2019-07-24'),(828,'34.221.67.33','2019-07-25'),(829,'155.159.115.197','2019-07-25'),(830,'155.159.115.254','2019-07-25'),(831,'155.159.121.157','2019-07-25'),(832,'155.159.121.189','2019-07-25'),(833,'155.159.12.174','2019-07-25'),(834,'54.36.150.118','2019-07-25'),(835,'23.239.180.115','2019-07-25'),(836,'40.77.167.73','2019-07-25'),(837,'173.252.79.14','2019-07-25'),(838,'18.236.242.109','2019-07-26'),(839,'54.201.39.151','2019-07-26'),(840,'31.13.115.28','2019-07-26'),(841,'207.46.13.165','2019-07-26'),(842,'52.33.209.255','2019-07-26'),(843,'96.114.65.148','2019-07-26'),(844,'35.203.252.115','2019-07-26'),(845,'107.178.194.150','2019-07-26'),(846,'69.164.206.42','2019-07-26'),(847,'35.247.84.113','2019-07-26'),(848,'141.8.188.146','2019-07-26'),(849,'174.214.29.211','2019-07-27'),(850,'159.8.84.105','2019-07-27'),(851,'169.50.212.27','2019-07-27'),(852,'169.57.65.165','2019-07-27'),(853,'169.51.83.86','2019-07-27'),(854,'169.55.177.100','2019-07-27'),(855,'52.37.76.247','2019-07-28'),(856,'173.252.79.17','2019-07-28'),(857,'172.58.37.49','2019-07-29'),(858,'54.36.150.73','2019-07-29'),(859,'54.36.149.30','2019-07-29'),(860,'104.129.3.144','2019-07-29'),(861,'66.220.149.50','2019-07-29'),(862,'54.186.86.172','2019-07-30'),(863,'34.217.125.36','2019-07-30'),(864,'173.252.83.13','2019-07-30'),(865,'178.154.148.81','2019-07-30'),(866,'173.252.79.15','2019-07-30'),(867,'69.171.251.37','2019-07-31'),(868,'69.171.251.46','2019-07-31'),(869,'69.171.251.9','2019-07-31'),(870,'207.46.13.185','2019-07-31'),(871,'18.236.177.31','2019-07-31'),(872,'52.38.131.54','2019-07-31'),(873,'69.171.251.2','2019-07-31'),(874,'40.77.167.37','2019-07-31'),(875,'166.137.242.110','2019-07-31'),(876,'69.171.251.10','2019-08-01'),(877,'69.171.251.45','2019-08-01'),(878,'69.171.251.28','2019-08-01'),(879,'84.236.87.184','2019-08-01'),(880,'207.46.13.113','2019-08-01'),(881,'173.252.83.7','2019-08-02'),(882,'181.214.200.137','2019-08-02'),(883,'181.214.202.139','2019-08-02'),(884,'207.241.230.164','2019-08-02'),(885,'181.214.181.192','2019-08-02'),(886,'67.227.97.251','2019-08-02'),(887,'69.171.251.6','2019-08-02'),(888,'69.171.251.49','2019-08-02'),(889,'69.171.251.33','2019-08-02'),(890,'69.171.251.48','2019-08-02'),(891,'157.55.39.110','2019-08-03'),(892,'173.252.127.51','2019-08-03'),(893,'191.96.85.209','2019-08-03'),(894,'129.78.110.131','2019-08-03'),(895,'118.127.15.83','2019-08-03'),(896,'118.127.15.83','2019-08-03'),(897,'118.127.15.83','2019-08-03'),(898,'118.127.15.83','2019-08-03'),(899,'118.127.15.83','2019-08-03'),(900,'118.127.15.83','2019-08-03'),(901,'118.127.15.83','2019-08-03'),(902,'118.127.15.83','2019-08-03'),(903,'181.215.75.88','2019-08-03'),(904,'64.246.161.190','2019-08-03'),(905,'205.237.95.71','2019-08-04'),(906,'104.130.231.136','2019-08-04'),(907,'18.144.27.37','2019-08-04'),(908,'173.252.79.16','2019-08-04'),(909,'173.252.79.16','2019-08-04'),(910,'173.252.79.12','2019-08-04'),(911,'181.214.178.46','2019-08-04'),(912,'100.43.81.200','2019-08-04'),(913,'191.96.41.53','2019-08-04'),(914,'54.36.150.186','2019-08-05'),(915,'87.101.94.122','2019-08-05'),(916,'173.252.83.12','2019-08-05'),(917,'209.95.51.167','2019-08-05'),(918,'45.82.49.182','2019-08-05'),(919,'165.227.107.116','2019-08-05'),(920,'46.188.31.210','2019-08-05'),(921,'137.226.113.26','2019-08-05'),(922,'211.56.145.140','2019-08-06'),(923,'209.17.96.194','2019-08-06'),(924,'137.226.113.27','2019-08-06'),(925,'167.99.116.54','2019-08-06'),(926,'13.57.34.249','2019-08-06'),(927,'60.191.38.77','2019-08-06'),(928,'66.249.138.196','2019-08-06'),(929,'209.17.97.26','2019-08-06'),(930,'191.96.191.112','2019-08-06'),(931,'54.165.59.7','2019-08-07'),(932,'45.40.125.174','2019-08-07'),(933,'119.160.118.211','2019-08-07'),(934,'209.17.96.250','2019-10-16'),(935,'54.36.148.26','2019-10-16'),(936,'54.36.148.80','2019-10-16'),(937,'100.35.75.170','2019-10-17'),(938,'34.221.223.169','2019-10-17'),(939,'137.226.113.34','2019-10-17'),(940,'54.36.150.28','2019-10-17'),(941,'54.200.172.172','2019-10-18'),(942,'18.237.61.8','2019-10-18'),(943,'111.7.100.26','2019-10-18'),(944,'111.7.100.27','2019-10-18'),(945,'118.126.88.207','2019-10-18'),(946,'84.17.49.42','2019-10-18'),(947,'52.12.212.163','2019-10-19'),(948,'54.218.254.121','2019-10-19'),(949,'92.63.111.27','2019-10-19'),(950,'173.252.87.43','2019-10-20'),(951,'54.202.122.199','2019-10-20'),(952,'173.252.87.49','2019-10-20'),(953,'23.95.109.196','2019-10-20'),(954,'84.17.61.143','2019-10-20'),(955,'5.188.62.5','2019-10-20'),(956,'35.161.203.170','2019-10-20'),(957,'66.249.65.134','2019-10-20'),(958,'34.220.86.232','2019-10-21'),(959,'54.36.150.23','2019-10-21'),(960,'54.184.157.139','2019-10-21'),(961,'207.46.13.145','2019-10-21'),(962,'35.163.136.211','2019-10-21'),(963,'66.249.65.94','2019-10-21'),(964,'69.171.251.51','2019-10-21'),(965,'137.226.113.28','2019-10-21'),(966,'157.55.39.57','2019-10-21'),(967,'173.252.87.46','2019-10-22'),(968,'34.209.151.82','2019-10-22'),(969,'209.17.97.58','2019-10-22'),(970,'213.159.213.137','2019-10-22'),(971,'207.46.13.37','2019-10-22'),(972,'209.17.96.122','2019-10-22'),(973,'84.17.62.134','2019-10-22'),(974,'185.93.3.107','2019-10-22'),(975,'173.252.79.18','2019-10-22'),(976,'158.69.27.211','2019-10-23'),(977,'51.77.129.167','2019-10-23'),(978,'114.226.67.61','2019-10-23'),(979,'34.217.37.143','2019-10-23'),(980,'77.222.99.214','2019-10-23'),(981,'54.36.148.75','2019-10-23'),(982,'37.1.218.99','2019-10-23'),(983,'54.189.90.201','2019-10-24'),(984,'34.219.193.110','2019-10-24'),(985,'138.246.253.5','2019-10-24'),(986,'193.128.111.36','2019-10-24'),(987,'66.249.65.148','2019-10-24'),(988,'52.34.140.188','2019-10-25'),(989,'54.36.149.1','2019-10-25'),(990,'18.237.134.29','2019-10-25'),(991,'54.36.150.75','2019-10-25'),(992,'54.36.150.128','2019-10-25'),(993,'185.93.3.111','2019-10-26'),(994,'54.202.28.56','2019-10-26'),(995,'66.249.65.64','2019-10-26'),(996,'34.221.139.130','2019-10-26'),(997,'54.36.149.93','2019-10-26'),(998,'54.36.149.51','2019-10-26'),(999,'209.17.97.42','2019-10-26'),(1000,'37.120.142.165','2019-10-27'),(1001,'52.10.208.227','2019-10-27'),(1002,'54.191.173.182','2019-10-28'),(1003,'54.36.148.171','2019-10-28'),(1004,'23.237.4.26','2019-10-28'),(1005,'37.120.145.94','2019-10-29'),(1006,'34.220.70.119','2019-10-29'),(1007,'51.158.125.36','2019-10-29'),(1008,'209.17.97.114','2019-10-29'),(1009,'34.221.56.51','2019-10-30'),(1010,'54.218.188.213','2019-10-30'),(1011,'94.212.232.156','2019-10-30'),(1012,'69.171.251.34','2019-10-30'),(1013,'5.16.25.81','2019-10-30'),(1014,'66.249.65.150','2019-10-30'),(1015,'34.222.215.131','2019-10-31'),(1016,'69.171.251.27','2019-10-31'),(1017,'54.36.149.67','2019-10-31'),(1018,'84.17.48.175','2019-10-31'),(1019,'18.236.252.161','2019-11-01'),(1020,'34.221.108.51','2019-11-01'),(1021,'54.36.150.58','2019-11-01'),(1022,'107.173.92.241','2019-11-01'),(1023,'213.159.213.236','2019-11-01'),(1024,'123.207.36.36','2019-11-01'),(1025,'148.72.74.191','2019-11-01'),(1026,'141.8.144.1','2019-11-01'),(1027,'54.36.150.21','2019-11-01'),(1028,'34.217.116.130','2019-11-02'),(1029,'209.17.96.18','2019-11-02'),(1030,'194.44.167.202','2019-11-02'),(1031,'73.220.152.109','2019-11-02'),(1032,'31.13.127.19','2019-11-03'),(1033,'66.249.65.146','2019-11-03'),(1034,'79.191.169.242','2019-11-03'),(1035,'159.203.165.106','2019-11-03'),(1036,'54.36.148.249','2019-11-04'),(1037,'34.214.224.1','2019-11-04'),(1038,'54.36.150.102','2019-11-04'),(1039,'173.252.87.45','2019-11-05'),(1040,'54.36.148.186','2019-11-05'),(1041,'34.218.234.57','2019-11-05'),(1042,'54.36.149.97','2019-11-05'),(1043,'178.62.82.141','2019-11-05'),(1044,'54.36.150.53','2019-11-06'),(1045,'199.244.88.124','2019-11-06'),(1046,'77.234.68.219','2019-11-06'),(1047,'34.209.191.209','2019-11-06'),(1048,'54.36.148.33','2019-11-06'),(1049,'52.34.139.82','2019-11-07'),(1050,'54.212.236.5','2019-11-07'),(1051,'54.84.11.20','2019-11-07'),(1052,'54.36.148.177','2019-11-07'),(1053,'209.17.96.2','2019-11-08'),(1054,'45.139.48.6','2019-11-08'),(1055,'54.185.170.253','2019-11-08'),(1056,'207.46.13.102','2019-11-08'),(1057,'54.36.150.156','2019-11-08'),(1058,'54.36.148.217','2019-11-08'),(1059,'173.252.83.14','2019-11-08'),(1060,'167.114.100.160','2019-11-09'),(1061,'54.71.32.8','2019-11-09'),(1062,'69.171.251.7','2019-11-09'),(1063,'34.222.133.251','2019-11-09'),(1064,'35.162.70.167','2019-11-09'),(1065,'40.77.167.112','2019-11-09'),(1066,'185.206.224.229','2019-11-09'),(1067,'173.252.87.42','2019-11-09'),(1068,'40.77.167.1','2019-11-09'),(1069,'172.241.82.26','2019-11-09'),(1070,'34.251.208.255','2019-11-10'),(1071,'18.237.148.1','2019-11-10'),(1072,'52.41.211.72','2019-11-10'),(1073,'185.93.54.51','2019-11-10'),(1074,'54.214.218.66','2019-11-11'),(1075,'87.101.94.74','2019-11-11'),(1076,'73.202.208.10','2019-11-11'),(1077,'173.252.79.20','2019-11-11'),(1078,'148.66.145.135','2019-11-11'),(1079,'52.10.215.216','2019-11-12'),(1080,'34.211.78.176','2019-11-12'),(1081,'52.34.24.33','2019-11-12'),(1082,'54.36.150.100','2019-11-12'),(1083,'209.17.96.98','2019-11-12'),(1084,'5.253.204.29','2019-11-12'),(1085,'52.12.74.242','2019-11-13'),(1086,'209.17.96.242','2019-11-13'),(1087,'173.252.87.41','2019-11-13'),(1088,'209.17.97.82','2019-11-13'),(1089,'34.209.85.222','2019-11-13'),(1090,'193.128.111.106','2019-11-13'),(1091,'85.206.165.30','2019-11-13'),(1092,'85.195.230.179','2019-11-14'),(1093,'181.177.107.197','2019-11-14'),(1094,'54.202.11.81','2019-11-14'),(1095,'35.160.107.92','2019-11-14'),(1096,'34.219.66.206','2019-11-14'),(1097,'54.36.150.144','2019-11-14'),(1098,'151.106.11.184','2019-11-14'),(1099,'34.219.208.99','2019-11-15'),(1100,'54.218.60.24','2019-11-15'),(1101,'52.12.10.240','2019-11-15'),(1102,'54.36.150.33','2019-11-15'),(1103,'209.17.96.74','2019-11-15'),(1104,'141.8.144.29','2019-11-15'),(1105,'209.17.97.10','2019-11-15'),(1106,'34.244.226.233','2019-11-15'),(1107,'34.241.108.232','2019-11-16'),(1108,'109.169.64.234','2019-11-16'),(1109,'172.86.75.230','2019-11-16'),(1110,'35.167.89.244','2019-11-16'),(1111,'35.163.46.168','2019-11-16'),(1112,'31.13.103.3','2019-11-16'),(1113,'31.13.103.10','2019-11-16'),(1114,'31.13.103.10','2019-11-16'),(1115,'31.13.103.18','2019-11-16'),(1116,'209.17.96.50','2019-11-16'),(1117,'209.17.97.18','2019-11-16'),(1118,'66.42.43.241','2019-11-16'),(1119,'54.36.150.27','2019-11-17'),(1120,'54.202.90.130','2019-11-17'),(1121,'31.13.127.8','2019-11-17'),(1122,'31.13.127.5','2019-11-17'),(1123,'34.218.222.112','2019-11-17'),(1124,'54.36.150.91','2019-11-17'),(1125,'100.43.85.188','2019-11-18'),(1126,'31.13.127.21','2019-11-18'),(1127,'54.201.33.124','2019-11-18'),(1128,'37.9.87.212','2019-11-18'),(1129,'128.199.213.97','2019-11-18'),(1130,'173.252.79.28','2019-11-18'),(1131,'209.17.96.178','2019-11-19'),(1132,'54.189.122.216','2019-11-19'),(1133,'64.246.187.42','2019-11-19'),(1134,'173.82.28.107','2019-11-19'),(1135,'173.82.28.107','2019-11-19'),(1136,'54.70.36.156','2019-11-19'),(1137,'173.252.83.20','2019-11-19'),(1138,'209.17.97.66','2019-11-20'),(1139,'34.222.50.56','2019-11-20'),(1140,'3.226.250.153','2019-11-20'),(1141,'209.17.96.210','2019-11-20'),(1142,'54.36.150.47','2019-11-20'),(1143,'207.46.13.36','2019-11-20'),(1144,'141.98.100.68','2019-11-20'),(1145,'5.9.145.132','2019-11-20'),(1146,'5.9.17.118','2019-11-20'),(1147,'46.4.83.150','2019-11-20'),(1148,'35.161.232.101','2019-11-21'),(1149,'54.218.144.84','2019-11-21'),(1150,'31.13.103.13','2019-11-21'),(1151,'31.13.103.16','2019-11-21'),(1152,'31.13.103.16','2019-11-21'),(1153,'31.13.103.21','2019-11-21'),(1154,'93.158.161.5','2019-11-21'),(1155,'107.175.58.163','2019-11-22'),(1156,'54.184.1.132','2019-11-22'),(1157,'173.252.95.36','2019-11-22'),(1158,'54.184.3.230','2019-11-22'),(1159,'34.213.153.234','2019-11-23'),(1160,'18.237.17.100','2019-11-23'),(1161,'209.17.96.66','2019-11-23'),(1162,'223.252.24.17','2019-11-23'),(1163,'54.36.150.59','2019-11-23'),(1164,'144.217.66.151','2019-11-23'),(1165,'18.236.182.179','2019-11-24'),(1166,'51.77.129.165','2019-11-24'),(1167,'35.161.91.113','2019-11-24'),(1168,'138.197.132.30','2019-11-24'),(1169,'207.102.138.158','2019-11-24'),(1170,'184.73.150.237','2019-11-25'),(1171,'69.4.89.106','2019-11-25'),(1172,'69.4.89.106','2019-11-25'),(1173,'209.17.96.114','2019-11-25'),(1174,'54.203.192.179','2019-11-25'),(1175,'54.202.213.131','2019-11-26'),(1176,'173.252.87.50','2019-11-26'),(1177,'209.17.96.146','2019-11-26'),(1178,'54.36.150.65','2019-11-26'),(1179,'195.154.61.206','2019-11-26'),(1180,'212.83.146.233','2019-11-26'),(1181,'62.4.14.206','2019-11-26'),(1182,'62.4.14.198','2019-11-26'),(1183,'51.15.191.81','2019-11-26'),(1184,'54.191.82.136','2019-11-26'),(1185,'54.36.150.129','2019-11-27'),(1186,'18.237.229.183','2019-11-27'),(1187,'92.249.158.9','2019-11-27'),(1188,'51.15.215.86','2019-11-27'),(1189,'167.99.173.118','2019-11-27'),(1190,'185.93.3.113','2019-11-27'),(1191,'54.213.208.152','2019-11-28'),(1192,'69.171.251.23','2019-11-28'),(1193,'185.93.3.110','2019-11-28'),(1194,'66.249.65.95','2019-11-28'),(1195,'209.17.96.154','2019-11-28'),(1196,'84.17.51.43','2019-11-29'),(1197,'34.222.25.100','2019-11-29'),(1198,'85.91.195.58','2019-11-29'),(1199,'196.245.184.90','2019-11-29'),(1200,'54.36.150.175','2019-11-29'),(1201,'5.255.250.71','2019-11-30'),(1202,'52.40.247.8','2019-11-30'),(1203,'209.17.96.42','2019-11-30'),(1204,'142.44.181.171','2019-11-30'),(1205,'142.44.181.171','2019-11-30'),(1206,'185.217.71.148','2019-11-30'),(1207,'54.36.148.1','2019-12-01'),(1208,'54.149.182.59','2019-12-01'),(1209,'31.13.127.2','2019-12-01'),(1210,'34.216.14.246','2019-12-02'),(1211,'34.214.25.144','2019-12-02'),(1212,'174.208.17.99','2019-12-02'),(1213,'52.24.250.63','2019-12-02'),(1214,'54.36.149.80','2019-12-02'),(1215,'100.43.91.121','2019-12-03'),(1216,'185.206.224.232','2019-12-03'),(1217,'54.71.192.128','2019-12-03'),(1218,'62.189.162.61','2019-12-03'),(1219,'38.128.159.68','2019-12-03'),(1220,'104.239.0.241','2019-12-03'),(1221,'104.239.4.183','2019-12-03'),(1222,'199.188.118.116','2019-12-03'),(1223,'38.128.157.86','2019-12-03'),(1224,'216.173.66.117','2019-12-03'),(1225,'173.252.79.13','2019-12-03'),(1226,'52.33.157.196','2019-12-04'),(1227,'54.245.199.117','2019-12-04'),(1228,'5.253.205.30','2019-12-04'),(1229,'209.17.96.218','2019-12-04'),(1230,'172.241.83.172','2019-12-05'),(1231,'35.162.214.144','2019-12-05'),(1232,'157.245.222.21','2019-12-05'),(1233,'34.246.194.173','2019-12-05'),(1234,'104.227.246.106','2019-12-05'),(1235,'34.216.147.34','2019-12-06'),(1236,'207.46.13.20','2019-12-06'),(1237,'209.17.97.34','2019-12-06'),(1238,'18.140.54.184','2019-12-07'),(1239,'54.188.10.139','2019-12-07'),(1240,'54.36.150.132','2019-12-07'),(1241,'54.187.246.76','2019-12-07'),(1242,'84.17.47.24','2019-12-07'),(1243,'3.87.71.163','2019-12-07'),(1244,'54.202.129.3','2019-12-08'),(1245,'173.252.111.9','2019-12-08'),(1246,'173.252.111.9','2019-12-08'),(1247,'40.77.167.25','2019-12-08'),(1248,'185.232.21.137','2019-12-08'),(1249,'51.77.185.73','2019-12-09'),(1250,'35.161.10.251','2019-12-09'),(1251,'88.198.90.9','2019-12-09'),(1252,'64.246.165.160','2019-12-09'),(1253,'23.252.241.91','2019-12-09'),(1254,'38.128.157.239','2019-12-09'),(1255,'38.77.197.114','2019-12-09'),(1256,'38.77.197.187','2019-12-09'),(1257,'38.77.197.16','2019-12-09'),(1258,'38.77.197.213','2019-12-09'),(1259,'185.180.220.253','2019-12-09'),(1260,'54.36.149.9','2019-12-09'),(1261,'54.200.94.189','2019-12-10'),(1262,'52.26.59.109','2019-12-10'),(1263,'52.38.29.69','2019-12-10'),(1264,'151.80.39.195','2019-12-10'),(1265,'151.80.39.54','2019-12-10'),(1266,'5.196.87.140','2019-12-10'),(1267,'151.80.39.220','2019-12-10'),(1268,'209.17.96.58','2019-12-10'),(1269,'89.187.178.238','2019-12-11'),(1270,'54.186.61.18','2019-12-11'),(1271,'54.36.149.90','2019-12-11'),(1272,'207.244.119.204','2019-12-11'),(1273,'66.249.75.216','2019-12-11'),(1274,'84.17.60.39','2019-12-11'),(1275,'66.249.75.214','2019-12-12'),(1276,'54.214.183.97','2019-12-12'),(1277,'34.215.52.173','2019-12-13'),(1278,'151.80.39.198','2019-12-13'),(1279,'5.196.87.158','2019-12-13'),(1280,'173.252.87.52','2019-12-13'),(1281,'209.17.97.90','2019-12-13'),(1282,'195.154.62.232','2019-12-14'),(1283,'62.210.5.253','2019-12-14'),(1284,'195.154.63.222','2019-12-14'),(1285,'163.172.70.242','2019-12-14'),(1286,'157.245.173.69','2019-12-14'),(1287,'157.245.173.69','2019-12-14'),(1288,'178.128.161.29','2019-12-14'),(1289,'52.12.124.20','2019-12-14'),(1290,'209.17.97.98','2019-12-14'),(1291,'159.69.157.209','2019-12-15'),(1292,'54.191.216.83','2019-12-15'),(1293,'34.217.45.168','2019-12-15'),(1294,'52.40.237.169','2019-12-16'),(1295,'54.36.150.20','2019-12-16'),(1296,'35.163.71.211','2019-12-16'),(1297,'38.145.98.148','2019-12-16'),(1298,'38.145.80.29','2019-12-16'),(1299,'38.145.80.155','2019-12-16'),(1300,'45.40.121.56','2019-12-16'),(1301,'151.80.39.143','2019-12-16'),(1302,'77.222.96.144','2019-12-16'),(1303,'137.226.113.21','2019-12-16'),(1304,'209.17.96.90','2019-12-17'),(1305,'34.219.231.101','2019-12-17'),(1306,'82.202.161.133','2019-12-17'),(1307,'54.36.150.4','2019-12-17'),(1308,'173.252.83.15','2019-12-17'),(1309,'173.252.83.18','2019-12-17'),(1310,'209.17.96.186','2019-12-17'),(1311,'62.210.79.40','2019-12-17'),(1312,'52.37.152.222','2019-12-18'),(1313,'209.17.96.234','2019-12-18'),(1314,'54.202.212.131','2019-12-19'),(1315,'54.36.150.42','2019-12-19'),(1316,'185.130.184.250','2019-12-19'),(1317,'38.77.197.127','2019-12-19'),(1318,'69.12.94.118','2019-12-19'),(1319,'185.253.96.27','2019-12-19'),(1320,'37.120.142.154','2019-12-20'),(1321,'54.191.164.3','2019-12-20'),(1322,'31.13.191.71','2019-12-20'),(1323,'173.252.83.3','2019-12-21'),(1324,'52.43.66.4','2019-12-21'),(1325,'209.17.96.82','2019-12-21'),(1326,'173.252.95.15','2019-12-21'),(1327,'69.58.178.57','2019-12-22'),(1328,'18.236.210.29','2019-12-22'),(1329,'82.102.18.43','2019-12-22'),(1330,'134.249.141.83','2019-12-22'),(1331,'207.46.13.25','2019-12-22'),(1332,'40.77.167.94','2019-12-22'),(1333,'144.168.162.250','2019-12-22'),(1334,'207.46.13.82','2019-12-23'),(1335,'193.176.85.115','2019-12-23'),(1336,'2.58.29.145','2019-12-23'),(1337,'172.241.131.139','2019-12-23'),(1338,'18.231.79.147','2019-12-23'),(1339,'54.200.116.189','2019-12-24'),(1340,'23.94.74.109','2019-12-24'),(1341,'54.212.214.104','2019-12-24'),(1342,'51.15.241.250','2019-12-24'),(1343,'51.158.114.198','2019-12-24'),(1344,'50.7.12.147','2019-12-24'),(1345,'50.7.12.147','2019-12-24'),(1346,'209.17.96.226','2019-12-24'),(1347,'163.172.137.15','2019-12-24'),(1348,'46.119.174.102','2019-12-25'),(1349,'46.101.7.140','2019-12-25'),(1350,'54.201.119.38','2019-12-25'),(1351,'54.149.59.84','2019-12-25'),(1352,'173.44.36.101','2019-12-25'),(1353,'51.158.113.35','2019-12-25'),(1354,'133.167.94.118','2019-12-25'),(1355,'34.223.40.91','2019-12-25'),(1356,'18.236.90.35','2019-12-26'),(1357,'34.209.201.162','2019-12-26'),(1358,'66.220.149.49','2019-12-26'),(1359,'178.62.74.6','2019-12-27'),(1360,'18.237.172.28','2019-12-27'),(1361,'209.17.96.170','2019-12-27'),(1362,'54.213.103.22','2019-12-27'),(1363,'185.112.82.229','2019-12-27'),(1364,'206.217.139.200','2019-12-27'),(1365,'72.76.221.125','2019-12-27'),(1366,'209.17.96.106','2019-12-28'),(1367,'196.245.185.242','2019-12-28'),(1368,'34.212.175.30','2019-12-28'),(1369,'209.17.97.74','2019-12-28'),(1370,'118.127.15.84','2019-12-28'),(1371,'157.55.39.222','2019-12-28'),(1372,'217.138.194.121','2019-12-28'),(1373,'158.69.26.144','2019-12-29'),(1374,'51.77.246.204','2019-12-29'),(1375,'85.254.72.26','2019-12-29'),(1376,'97.98.237.187','2019-12-29'),(1377,'5.188.62.25','2019-12-29'),(1378,'34.220.31.0','2019-12-29'),(1379,'35.153.51.152','2019-12-29'),(1380,'18.229.156.40','2019-12-29'),(1381,'34.254.90.222','2019-12-29'),(1382,'52.38.37.116','2019-12-30'),(1383,'134.90.149.148','2019-12-30'),(1384,'78.46.61.125','2019-12-30'),(1385,'34.220.246.5','2019-12-31'),(1386,'173.252.83.21','2019-12-31'),(1387,'173.252.83.2','2019-12-31'),(1388,'185.234.218.50','2020-01-01'),(1389,'18.237.17.54','2020-01-01'),(1390,'52.10.237.133','2020-01-01'),(1391,'69.171.251.15','2020-01-01'),(1392,'54.149.189.211','2020-01-02'),(1393,'104.239.0.153','2020-01-02'),(1394,'23.252.240.66','2020-01-02'),(1395,'149.100.187.62','2020-01-02'),(1396,'23.252.241.119','2020-01-02'),(1397,'23.252.240.225','2020-01-02'),(1398,'38.77.197.3','2020-01-02'),(1399,'35.167.174.5','2020-01-03'),(1400,'34.212.27.232','2020-01-04'),(1401,'173.252.111.20','2020-01-04'),(1402,'173.252.111.14','2020-01-04'),(1403,'34.245.162.219','2020-01-04'),(1404,'18.237.234.98','2020-01-05'),(1405,'194.61.24.29','2020-01-05'),(1406,'185.212.171.153','2020-01-05'),(1407,'199.249.230.68','2020-01-05'),(1408,'69.171.251.16','2020-01-05'),(1409,'84.17.53.22','2020-01-05'),(1410,'31.13.191.107','2020-01-05'),(1411,'188.165.235.173','2020-01-05'),(1412,'172.245.254.167','2020-01-06'),(1413,'52.32.212.191','2020-01-06'),(1414,'31.13.127.1','2020-01-06'),(1415,'31.13.127.3','2020-01-06'),(1416,'14.231.20.144','2020-01-06'),(1417,'181.177.97.8','2020-01-06'),(1418,'188.163.104.82','2020-01-06'),(1419,'84.17.49.190','2020-01-06'),(1420,'3.82.13.161','2020-01-06'),(1421,'52.87.200.99','2020-01-06'),(1422,'134.209.172.55','2020-01-06'),(1423,'54.190.48.80','2020-01-07'),(1424,'2.58.29.146','2020-01-07'),(1425,'173.252.83.19','2020-01-07'),(1426,'84.17.51.172','2020-01-08'),(1427,'84.17.50.200','2020-01-08'),(1428,'34.221.27.100','2020-01-08'),(1429,'168.235.111.235','2020-01-08'),(1430,'157.55.39.205','2020-01-09'),(1431,'54.245.36.31','2020-01-09'),(1432,'52.40.146.252','2020-01-09'),(1433,'3.233.224.176','2020-01-09'),(1434,'5.255.250.200','2020-01-10'),(1435,'40.77.167.54','2020-01-10'),(1436,'159.203.24.107','2020-01-10'),(1437,'159.203.24.155','2020-01-10'),(1438,'165.227.39.250','2020-01-10'),(1439,'54.190.57.22','2020-01-10'),(1440,'34.209.28.249','2020-01-10'),(1441,'52.36.249.49','2020-01-10'),(1442,'209.17.96.130','2020-01-10'),(1443,'207.46.13.162','2020-01-11'),(1444,'51.159.18.103','2020-01-11'),(1445,'185.112.82.239','2020-01-11'),(1446,'31.13.191.94','2020-01-11'),(1447,'34.211.152.210','2020-01-12'),(1448,'52.204.72.40','2020-01-12'),(1449,'73.192.189.172','2020-01-12'),(1450,'206.189.140.125','2020-01-12'),(1451,'40.77.167.168','2020-01-12'),(1452,'34.217.14.225','2020-01-13'),(1453,'84.17.53.19','2020-01-13'),(1454,'40.77.167.152','2020-01-14'),(1455,'54.188.195.9','2020-01-14'),(1456,'185.104.187.115','2020-01-14'),(1457,'31.13.191.82','2020-01-14'),(1458,'173.252.87.44','2020-01-15'),(1459,'171.13.14.83','2020-01-15'),(1460,'104.168.173.95','2020-01-15'),(1461,'51.77.129.168','2020-01-15'),(1462,'181.177.92.202','2020-01-16'),(1463,'52.40.3.94','2020-01-17'),(1464,'209.17.97.50','2020-01-17'),(1465,'173.252.111.24','2020-01-17'),(1466,'173.252.111.17','2020-01-17'),(1467,'173.252.111.7','2020-01-17'),(1468,'173.252.111.4','2020-01-17'),(1469,'195.181.166.142','2020-01-17'),(1470,'54.185.144.158','2020-01-18'),(1471,'35.163.211.213','2020-01-18'),(1472,'77.88.47.64','2020-01-18'),(1473,'54.187.172.137','2020-01-19'),(1474,'185.206.224.212','2020-01-19'),(1475,'173.252.111.6','2020-01-19'),(1476,'173.252.111.12','2020-01-19'),(1477,'178.70.171.152','2020-01-20'),(1478,'34.219.71.10','2020-01-20'),(1479,'52.32.58.19','2020-01-20'),(1480,'185.206.224.209','2020-01-20'),(1481,'160.116.0.30','2020-01-20'),(1482,'181.177.91.207','2020-01-20'),(1483,'54.202.117.218','2020-01-21'),(1484,'77.236.223.92','2020-01-21'),(1485,'68.6.190.143','2020-01-21'),(1486,'173.44.222.167','2020-01-22'),(1487,'95.216.149.140','2020-01-22'),(1488,'209.99.174.115','2020-01-22'),(1489,'54.149.71.66','2020-01-22'),(1490,'37.120.192.22','2020-01-22'),(1491,'91.208.99.2','2020-01-22'),(1492,'209.17.96.10','2020-01-22'),(1493,'103.21.59.22','2020-01-22'),(1494,'34.222.187.114','2020-01-23'),(1495,'34.220.13.180','2020-01-23'),(1496,'217.79.184.43','2020-01-23'),(1497,'54.212.30.217','2020-01-23'),(1498,'54.187.3.64','2020-01-24'),(1499,'34.216.54.160','2020-01-25'),(1500,'173.252.87.47','2020-01-25'),(1501,'173.252.95.18','2020-01-25'),(1502,'51.79.91.46','2020-01-26'),(1503,'54.186.14.140','2020-01-26'),(1504,'216.145.5.42','2020-01-26'),(1505,'185.212.171.150','2020-01-26'),(1506,'185.206.224.215','2020-01-26'),(1507,'54.201.153.227','2020-01-27'),(1508,'37.120.203.71','2020-01-27'),(1509,'141.8.188.133','2020-01-27'),(1510,'54.184.202.12','2020-01-27'),(1511,'62.210.157.10','2020-01-27'),(1512,'51.15.61.228','2020-01-28'),(1513,'188.163.104.155','2020-01-28'),(1514,'192.3.220.229','2020-01-28'),(1515,'84.17.47.116','2020-01-28'),(1516,'34.215.36.72','2020-01-29'),(1517,'79.142.76.211','2020-01-29'),(1518,'78.47.40.121','2020-01-29'),(1519,'34.210.65.61','2020-01-30'),(1520,'89.187.168.169','2020-01-30'),(1521,'5.255.174.141','2020-01-30'),(1522,'185.112.82.235','2020-01-30'),(1523,'84.17.46.27','2020-01-31'),(1524,'161.129.66.236','2020-01-31'),(1525,'86.185.206.44','2020-01-31'),(1526,'52.41.107.195','2020-01-31'),(1527,'209.17.97.2','2020-01-31'),(1528,'173.252.79.24','2020-01-31'),(1529,'173.252.79.22','2020-01-31'),(1530,'62.109.4.125','2020-02-01'),(1531,'84.17.46.21','2020-02-01'),(1532,'52.12.22.145','2020-02-01'),(1533,'35.165.228.53','2020-02-02'),(1534,'165.22.103.151','2020-02-02'),(1535,'89.238.131.146','2020-02-02'),(1536,'39.108.62.211','2020-02-02'),(1537,'173.252.87.48','2020-02-02'),(1538,'161.129.66.242','2020-02-02'),(1539,'34.212.34.56','2020-02-03'),(1540,'167.172.240.223','2020-02-03'),(1541,'104.254.95.152','2020-02-03'),(1542,'69.58.178.28','2020-02-04'),(1543,'54.71.209.187','2020-02-04'),(1544,'46.166.143.114','2020-02-04'),(1545,'143.137.165.78','2020-02-04'),(1546,'191.101.213.224','2020-02-04'),(1547,'181.214.183.59','2020-02-04'),(1548,'104.245.145.6','2020-02-05'),(1549,'89.223.30.116','2020-02-05'),(1550,'34.222.108.173','2020-02-05'),(1551,'34.221.36.119','2020-02-06'),(1552,'31.13.127.24','2020-02-06'),(1553,'85.254.72.25','2020-02-06'),(1554,'198.27.85.233','2020-02-06'),(1555,'89.223.26.253','2020-02-06'),(1556,'185.183.107.91','2020-02-06'),(1557,'77.88.47.11','2020-02-06'),(1558,'52.12.44.27','2020-02-07'),(1559,'34.219.251.127','2020-02-07'),(1560,'89.187.168.174','2020-02-07'),(1561,'207.46.13.86','2020-02-07'),(1562,'204.236.223.64','2020-02-07'),(1563,'89.187.168.146','2020-02-07'),(1564,'142.93.87.106','2020-02-07'),(1565,'54.245.184.203','2020-02-08'),(1566,'86.105.18.138','2020-02-08'),(1567,'66.249.65.138','2020-02-09'),(1568,'40.77.167.9','2020-02-09'),(1569,'18.236.248.1','2020-02-09'),(1570,'78.47.49.6','2020-02-09'),(1571,'66.249.65.198','2020-02-09'),(1572,'34.220.237.143','2020-02-10'),(1573,'66.249.65.200','2020-02-10'),(1574,'34.211.203.41','2020-02-11'),(1575,'34.211.245.51','2020-02-11'),(1576,'66.249.65.202','2020-02-11'),(1577,'34.215.139.12','2020-02-12'),(1578,'185.206.224.198','2020-02-12'),(1579,'185.103.110.204','2020-02-12'),(1580,'84.17.48.223','2020-02-12'),(1581,'66.249.65.140','2020-02-13'),(1582,'34.221.215.206','2020-02-13'),(1583,'209.17.96.26','2020-02-14'),(1584,'196.52.43.73','2020-02-14'),(1585,'196.52.43.75','2020-02-14'),(1586,'34.218.243.232','2020-02-14'),(1587,'196.52.43.78','2020-02-14'),(1588,'196.52.43.74','2020-02-14'),(1589,'46.45.185.171','2020-02-14'),(1590,'142.4.218.236','2020-02-14'),(1591,'51.77.246.200','2020-02-15'),(1592,'52.88.32.200','2020-02-15'),(1593,'216.244.66.238','2020-02-15'),(1594,'185.206.224.213','2020-02-15'),(1595,'185.103.110.209','2020-02-15'),(1596,'159.65.24.22','2020-02-15'),(1597,'66.249.66.146','2020-02-16'),(1598,'173.252.111.11','2020-02-16'),(1599,'173.252.111.5','2020-02-16'),(1600,'54.203.74.227','2020-02-16'),(1601,'54.201.132.196','2020-02-17'),(1602,'159.138.156.193','2020-02-17'),(1603,'173.252.83.23','2020-02-17'),(1604,'34.222.198.157','2020-02-18'),(1605,'64.246.165.180','2020-02-18'),(1606,'40.77.167.59','2020-02-18'),(1607,'2.58.29.24','2020-02-18'),(1608,'52.32.63.239','2020-02-18'),(1609,'134.90.149.147','2020-02-18'),(1610,'99.203.11.243','2020-02-18'),(1611,'159.138.148.187','2020-02-18'),(1612,'159.138.155.122','2020-02-18'),(1613,'89.187.178.137','2020-02-19'),(1614,'159.203.2.74','2020-02-19'),(1615,'211.176.125.70','2020-02-19'),(1616,'159.138.156.160','2020-02-19'),(1617,'54.202.177.51','2020-02-19'),(1618,'34.211.124.209','2020-02-19'),(1619,'185.102.219.169','2020-02-19'),(1620,'34.222.114.128','2020-02-20'),(1621,'199.244.88.131','2020-02-20'),(1622,'196.52.43.77','2020-02-20'),(1623,'196.52.43.67','2020-02-20'),(1624,'185.104.184.115','2020-02-20'),(1625,'84.17.60.123','2020-02-20'),(1626,'199.217.105.237','2020-02-20'),(1627,'207.46.13.56','2020-02-20'),(1628,'185.103.110.206','2020-02-20'),(1629,'209.17.96.202','2020-02-22'),(1630,'51.77.249.204','2020-03-01'),(1631,'138.246.253.15','2020-03-06'),(1632,'13.231.126.66','2020-03-06'),(1633,'179.43.169.182','2020-03-09'),(1634,'138.68.236.159','2020-03-09'),(1635,'68.183.154.8','2020-03-09'),(1636,'209.17.97.106','2020-03-14'),(1637,'209.17.96.34','2020-03-18'),(1638,'209.17.97.122','2020-03-24'),(1639,'51.77.249.202','2020-03-27'),(1640,'159.203.120.83','2020-03-31'),(1641,'3.249.97.11','2020-04-05'),(1642,'104.206.128.30','2020-04-07'),(1643,'170.130.187.30','2020-04-07'),(1644,'142.93.181.27','2020-04-13');
/*!40000 ALTER TABLE `visitors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'zamarket_churchdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-13 18:31:30
