-- MySQL dump 10.16  Distrib 10.2.31-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: zamarket_automobiles
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
  `admin_name` varchar(40) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_image` varchar(500) NOT NULL,
  `admin_recorddate` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin','admin','admin123','dummy.png','2018-05-27 09:17:25');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_access_vehicles`
--

DROP TABLE IF EXISTS `customer_access_vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_access_vehicles` (
  `customer_access_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_access_vehicle_type_id` int(10) NOT NULL COMMENT '0 for all',
  `customer_id` int(10) NOT NULL,
  PRIMARY KEY (`customer_access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_access_vehicles`
--

LOCK TABLES `customer_access_vehicles` WRITE;
/*!40000 ALTER TABLE `customer_access_vehicles` DISABLE KEYS */;
INSERT INTO `customer_access_vehicles` VALUES (27,0,3),(29,1,7),(31,4,9),(34,1,4),(35,0,2),(45,1,8),(48,1,11),(50,0,10);
/*!40000 ALTER TABLE `customer_access_vehicles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_demand`
--

DROP TABLE IF EXISTS `customer_demand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_demand` (
  `demand_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `model_id` int(10) NOT NULL,
  `manufacture_id` int(10) NOT NULL,
  `vehicle_type_id` int(10) NOT NULL,
  `record_entry_time_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `demand_found` int(10) NOT NULL DEFAULT 0 COMMENT '1 for found',
  PRIMARY KEY (`demand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_demand`
--

LOCK TABLES `customer_demand` WRITE;
/*!40000 ALTER TABLE `customer_demand` DISABLE KEYS */;
INSERT INTO `customer_demand` VALUES (1,3,312,22,1,'2020-01-21 06:54:38',0),(2,3,489,42,10,'2020-01-21 07:56:03',0),(3,3,348,4,1,'2020-01-21 08:23:02',0),(4,3,433,32,1,'2020-01-21 08:23:18',0),(5,3,487,20,4,'2020-01-21 10:23:09',0),(6,8,22,8,1,'2020-01-21 16:02:27',0),(7,8,24,8,1,'2020-01-21 16:02:37',0),(8,8,69,3,1,'2020-01-21 16:37:44',0),(9,8,492,8,1,'2020-01-21 16:45:31',0),(10,8,408,28,1,'2020-01-21 16:58:12',0),(11,10,492,8,1,'2020-01-21 17:29:38',0),(12,8,0,12,1,'2020-01-21 17:47:42',0),(13,7,0,1,1,'2020-01-21 18:29:16',0),(14,10,0,41,6,'2020-01-21 20:49:18',0),(15,10,0,20,4,'2020-01-21 20:49:57',0),(16,8,0,34,1,'2020-01-22 19:59:24',0),(17,8,15,5,1,'2020-01-22 20:09:49',0),(18,8,0,1,1,'2020-01-22 20:34:50',0),(19,8,0,16,1,'2020-01-24 07:58:08',0),(20,8,0,5,1,'2020-01-24 13:10:30',0),(21,8,308,21,1,'2020-02-08 09:14:44',0);
/*!40000 ALTER TABLE `customer_demand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_password` varchar(50) NOT NULL,
  `customer_added_by` int(10) NOT NULL COMMENT '0 for admin 1 for itself',
  `customer_address` varchar(500) NOT NULL,
  `customer_contact_man` varchar(50) NOT NULL,
  `customer_phone` varchar(50) NOT NULL,
  `customer_block` int(10) NOT NULL DEFAULT 0 COMMENT '1 for block',
  `customer_block_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customer_ads_limit` int(10) NOT NULL,
  `customer_business_logo` varchar(500) DEFAULT NULL,
  `customer_business_address` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,'tali','nyc@gbh.co.il','1234',0,'××œ×™','0542479685','0542479685',0,'2020-01-21 15:01:07',10,'',''),(3,'gbh','gbh@gbh.com','gbh123',0,'×©×•×§×Ÿ 15 ×ª×œ ××‘×™×‘','0542476989','0542476989',0,'2020-01-18 14:10:08',10,'3business_logo_XHGHQV.jpg',''),(4,'george ban haim','nn@nn.com','123',0,'×‘×¨ ×™×•×—××™ 9 ','george','0542476989',0,'2020-01-21 15:01:56',24,'',''),(7,'×™×•×¡×£ ××•×¤× ×•×¢×™×','aaa@aaa.com','123',0,'×× ×™×œ×‘×™×¥ 5 ×ª×œ ××‘×™×‘ ','×™×•×¡×™','0506699887',0,'2020-01-21 18:40:11',20,NULL,'×‘×Ÿ ×’×•×¨×™×•×Ÿ 60 × ×ª× ×™×”'),(8,'ban motorcycle ','bbb@bbb.com','BBB123',0,'×‘×¨ ×™×•×—××™ 36 ×ª×œ ××‘×™×‘ ','0506699887','0506699887',0,'2020-01-30 10:27:11',8,'','×‘×Ÿ ×’×•×¨×™×•×Ÿ 60 × ×ª× ×™×”'),(9,'mor','mor@mor.com','mor123',0,'×”×ª×ž×¨×™× 8','mor','05011111111',0,'2020-01-21 14:12:56',14,NULL,NULL),(10,'avi','avi@avi.com','123',0,'sderot  5','0542476989','0542476989',0,'2020-01-21 15:22:44',2,NULL,NULL),(11,'soso','soso@soso.com','123',0,'tmarim 5','soso','0542476989',0,'2020-01-21 18:41:34',2,NULL,NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_images`
--

DROP TABLE IF EXISTS `vehicle_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_images` (
  `vehicle_image_id` int(10) NOT NULL AUTO_INCREMENT,
  `vehicle_image_name` varchar(500) NOT NULL,
  `vehicle_ad_id` int(10) NOT NULL COMMENT 'as a foreign key',
  `vehicle_image_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`vehicle_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_images`
--

LOCK TABLES `vehicle_images` WRITE;
/*!40000 ALTER TABLE `vehicle_images` DISABLE KEYS */;
INSERT INTO `vehicle_images` VALUES (1,'v_img_1_0_FgL4fMqh44Wm5.jpg',1,'2020-01-17 19:39:18'),(2,'v_img_2_0_11R.jpg',2,'2020-01-17 21:11:17'),(3,'v_img_3_0_tCVl0mi.jpg',3,'2020-01-17 21:25:22'),(5,'v_img_5_0_I1zwbbxdp4E79sNZBAn.jpg',5,'2020-01-17 21:36:04'),(6,'v_updated_img_1_0_UN.jpg',1,'2020-01-17 23:13:05'),(7,'v_updated_img_1_0_Vth8xqle4ryNANlM.jpg',1,'2020-01-17 23:13:19'),(9,'v_updated_img_6_0_diN3.jpg',6,'2020-01-18 06:28:18'),(10,'v_updated_img_6_0_w0.jpg',6,'2020-01-18 06:31:36'),(11,'v_updated_img_6_0_MvNtbaHRkbyb07.jpg',6,'2020-01-18 06:31:48'),(12,'v_img_7_0_ghKsK10709XRuj.jpg',7,'2020-01-18 07:29:06'),(13,'v_img_8_3_V2a05n6i4R6.jpg',8,'2020-01-18 14:09:11'),(14,'v_img_8_4_Y5ndIZ.jpg',8,'2020-01-18 14:09:11'),(15,'v_img_8_5_HtL9xNCmh.jpg',8,'2020-01-18 14:09:11'),(16,'insert_img_0_gpZUXgvwT.jpg',9,'2020-01-21 10:18:05'),(17,'insert_img_0_K8UkTLwcJUu4.jpg',9,'2020-01-21 10:18:05'),(18,'insert_img_1_x5bmglmZrh.jpg',9,'2020-01-21 10:18:05'),(19,'insert_img_0_cGHjay.jpg',9,'2020-01-21 10:18:05'),(20,'insert_img_0_sBhgzFsh2whx6.jpg',10,'2020-01-21 12:44:12'),(21,'insert_img_0_wgCaUHFhPwU0.jpg',11,'2020-01-21 14:29:14'),(22,'insert_img_0_gNw.jpg',12,'2020-01-21 14:42:14'),(23,'insert_img_0_738bIQNrTXS4YFXm.jpg',12,'2020-01-21 14:42:14'),(24,'insert_img_0_errzWxXAnwmYuvUnZIix.jpg',12,'2020-01-21 14:42:14'),(25,'insert_img_0_CJS1.jpg',12,'2020-01-21 14:42:14'),(26,'insert_img_0_3zzBYaOcacVk6.jpg',12,'2020-01-21 14:42:14'),(27,'insert_img_0_tAH40s9ela.jpg',12,'2020-01-21 14:42:14'),(28,'insert_img_0_3Y7Omfb2B04r.jpg',13,'2020-01-21 14:52:21'),(29,'insert_img_0_Hd.jpg',14,'2020-01-21 15:05:10'),(30,'insert_img_0_2CmIv9nL.jpg',15,'2020-01-21 15:26:21'),(31,'insert_img_0_mQEgFjVcTIi0.jpg',15,'2020-01-21 15:26:21'),(32,'insert_img_0_2DbAQTumzJiOT.jpg',15,'2020-01-21 15:26:21'),(33,'insert_img_0_XW77Qv.jpg',15,'2020-01-21 15:26:21'),(34,'insert_img_0_cm.jpg',15,'2020-01-21 15:26:21'),(35,'insert_img_0_zTqSnpW.jpg',15,'2020-01-21 15:26:21'),(36,'insert_img_0_FDD9w6GVmpSN.jpg',15,'2020-01-21 15:26:21'),(37,'insert_img_0_EAH7S93Xy53EF.jpg',16,'2020-01-21 15:59:51'),(38,'insert_img_0_v16.jpg',17,'2020-01-21 16:32:24'),(39,'insert_img_0_kX.jpg',18,'2020-01-21 16:45:09'),(40,'insert_img_0_7S9DdIG6mPO8jN0DpO.jpg',19,'2020-01-21 17:20:50'),(41,'insert_img_0_6xJHNtA9Od8lx0pT.jpg',20,'2020-01-21 18:44:08'),(42,'insert_img_0_LiROKQQlNa7.jpg',21,'2020-01-21 18:45:38'),(43,'insert_img_0_Ai63bYTt.jpeg',22,'2020-01-21 20:52:06'),(44,'insert_img_0_OP1emBnKyI8eFgZ.jpeg',23,'2020-01-24 13:27:22'),(45,'v_updated_img_24_0_EpWwuZVqlEy.jpeg',24,'2020-01-24 13:36:05'),(46,'insert_img_0_TmfIJt7yiAfef6sX.jpg',25,'2020-01-24 14:37:13'),(47,'v_updated_img_23_0_OBTrVRRmVve8tLuEqw.png',23,'2020-01-30 11:04:46'),(48,'insert_img_0_lYiK2y6NYw7GbZMDVVSC.jpg',26,'2020-02-05 14:10:21'),(49,'insert_img_0_7NUVqYUgpl.png',27,'2020-02-11 11:16:50'),(50,'insert_img_1_DqtMmdPpcUMySEe.jpeg',27,'2020-02-11 11:16:50'),(51,'insert_img_2_wSzQz.jpeg',27,'2020-02-11 11:16:50'),(52,'insert_img_3_aSzeu9h7C6.png',27,'2020-02-11 11:16:50');
/*!40000 ALTER TABLE `vehicle_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_types`
--

DROP TABLE IF EXISTS `vehicle_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_types` (
  `vehicle_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `vehicle_type_name` varchar(50) NOT NULL,
  `vehicle_type_img` varchar(50) NOT NULL,
  `vehicle_added_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`vehicle_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_types`
--

LOCK TABLES `vehicle_types` WRITE;
/*!40000 ALTER TABLE `vehicle_types` DISABLE KEYS */;
INSERT INTO `vehicle_types` VALUES (1,'×“×• ×’×œ×’×œ×™','UFsS7OW20V.jpg','2020-01-15 19:13:59'),(3,'×¨×›×‘ ×ž×¡×—×¨×™','8DeyeOEviJ.jpg','2020-01-15 18:50:24'),(4,'×¨×›×‘ ×¤×¨×˜×™','7nScgTy0A7.jpg','2020-01-15 18:43:17'),(6,'×˜×¨×§×˜×•×¨×•× ×™×','H7CERIQnpo.jpg','2020-01-15 19:08:18'),(9,'××—×¨','LAcgdsvo1R.jpg','2020-01-15 18:58:01'),(10,'×ž×©××™×ª','F0qVvoH3FQ.jpg','2020-01-15 19:04:28');
/*!40000 ALTER TABLE `vehicle_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicle_videos`
--

DROP TABLE IF EXISTS `vehicle_videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicle_videos` (
  `vehicle_video_id` int(10) NOT NULL AUTO_INCREMENT,
  `vehicle_video_name` varchar(500) NOT NULL,
  `vehicle_ad_id` int(10) NOT NULL COMMENT 'as a foreign key',
  `vehicle_video_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`vehicle_video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicle_videos`
--

LOCK TABLES `vehicle_videos` WRITE;
/*!40000 ALTER TABLE `vehicle_videos` DISABLE KEYS */;
INSERT INTO `vehicle_videos` VALUES (1,'1vehicle_video_vkC1lbQVGv5L.mp4',1,'2020-01-17 19:39:18'),(2,'2vehicle_video_i.jpg',2,'2020-01-17 21:11:17'),(3,'3vehicle_video_.jpg',3,'2020-01-17 21:25:22'),(5,'6vehicle_video_s6pdNXS.jpg',6,'2020-01-18 06:24:58');
/*!40000 ALTER TABLE `vehicle_videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles_ads`
--

DROP TABLE IF EXISTS `vehicles_ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles_ads` (
  `vehicle_ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type_id` int(10) NOT NULL COMMENT 'foreign key',
  `vehicle_model_id` int(10) NOT NULL COMMENT 'foreign key',
  `vehicle_manufacture_id` int(10) NOT NULL COMMENT 'as a foreign key',
  `vehicle_ad_year` varchar(50) NOT NULL,
  `vehicle_ad_hand` varchar(500) NOT NULL,
  `vehicle_ad_km` varchar(500) NOT NULL,
  `vehicle_ad_test_to_date` date NOT NULL,
  `vehicle_ad_license_level` varchar(500) NOT NULL,
  `vehicle_ad_current_ownership` varchar(500) NOT NULL,
  `vehicle_ad_previous_ownership` varchar(500) NOT NULL,
  `vehicle_ad_ownership_type` varchar(500) NOT NULL,
  `vehicle_ad_tire_condition` varchar(500) NOT NULL,
  `vehicle_ad_accidents` varchar(500) NOT NULL,
  `vehicle_treatment_with_oil` varchar(500) NOT NULL,
  `vehicle_ad_have_seller_invoice` varchar(500) NOT NULL,
  `vehicle_ad_vehicle_issue` varchar(500) NOT NULL,
  `vehicle_ad_free_text` varchar(500) NOT NULL,
  `customer_id` int(10) NOT NULL COMMENT 'as a foreign key',
  `vehicle_ad_added_timestamp` datetime NOT NULL,
  `vehicle_ad_price` varchar(500) NOT NULL,
  `vehicle_ad_updated_timestamp` datetime DEFAULT NULL,
  `vehicle_ad_sold_status` int(10) NOT NULL DEFAULT 0 COMMENT '1 for sold 0 for not sold yet',
  `vehicle_ad_sold_date` date DEFAULT NULL,
  `vehicle_ad_sold_time` time DEFAULT NULL,
  PRIMARY KEY (`vehicle_ad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles_ads`
--

LOCK TABLES `vehicles_ads` WRITE;
/*!40000 ALTER TABLE `vehicles_ads` DISABLE KEYS */;
INSERT INTO `vehicles_ads` VALUES (1,10,488,43,'2013','2','22','2020-01-16','ksdjlk','jkljdklj','lkjlkj','Trade Character','New','Known','Yes','Yes','lsdfkjflkjl','sjklsf',3,'2020-01-17 11:39:18','234243',NULL,1,'2020-01-21','08:45:46'),(2,1,440,32,'2010','1','5000','2020-01-17','A1','×¤×¨×˜×™','×—×‘×¨×”','Trade Character','New','Known','Yes','Yes','× ×–×™×œ×•×ª','×§×˜× ×•×¢ ×©×ž×•×¨',3,'2020-01-17 13:11:17','5000',NULL,1,'2020-01-18','23:00:00'),(3,1,440,32,'2008','1','96333','2020-02-20','A1','×¤×¨×˜×™','×—×‘×¨×”','Private','Fair','Unknown','Yes','No','×ž×›×•×ª ×§×˜× ×•×ª','×›×œ×™ ×™×“ ×¨××©×•× ×” ×ž×¨×•×¤×',3,'2020-01-17 13:25:22','6000',NULL,1,'2020-01-21','08:46:59'),(5,1,269,20,'2018','4','6000','2019-10-11','A1','×¤×¨×˜×™','×—×‘×¨×”','Company','New','Known','Yes','Yes','×ž×›×” ×§×˜× ×” ×‘×›× ×£ ×™×ž×™×Ÿ\r\n×–× ×‘ ','×›×œ×™ ×©×ž×•×¨',3,'2020-01-17 13:36:04','15000',NULL,1,'2020-01-18','19:00:00'),(6,1,117,8,'2020','1','3','2020-07-03','A1','×¤×¨×˜×™','×—×‘×¨×”','Private','New','Known','Yes','Yes','   ×™×© × ×–×™×œ×•×ª ×•×ž×›×•×ª ×§×˜× ×•×ª ×ž××—×•×¨×”','××•×¤× ×•×¢ ×©×ž×•×¨ ×ž××•×“ \r\n×™×“ 1 ',3,'2020-01-17 22:24:58','110000','2020-01-17 22:32:31',0,NULL,NULL),(7,1,42,11,'2020','2','1','2020-01-18','A1','×¤×¨×˜×™','×—×‘×¨×”','Private','New','Known','Yes','Yes','××™×Ÿ × ×–×™×œ×•×ª','××•×¤× ×•×¢ ×©×ž×•×¨ ×•×ž×©×•×¤×¨',3,'2020-01-17 23:29:06','50000',NULL,0,NULL,NULL),(8,1,399,28,'2018','2','7000','2020-06-12','390','×¤×¨×˜×™','×—×‘×¨×”','Trade Character','New','Known','Yes','Yes','×ž×¦×‘ ×—×“×©','×›×œ×™ ×ž×¦×‘ ×—×“×©',3,'2020-01-18 06:09:11','30000',NULL,0,NULL,NULL),(9,6,481,28,'2018','2','2900','2020-01-20','Nothing','yes','YEs','Trade Character','New','Known','Yes','Yes','dfsf','Nothihng',4,'2020-01-21 02:18:05','2500',NULL,0,NULL,NULL),(10,1,406,28,'2010','2','5623','2020-04-30','×¤×¨×˜×™','×¤×¨×˜×™','×¤×¨×˜×™','×ª×• ×¡×—×¨','×—×“×©×™×','×™×“×•×¢','×›×Ÿ','×›×Ÿ','   × ×–×™×œ×•×ª ×‘×‘×•×œ×','××•×¤× ×•×¢ ×©×ž×•×¨ ×ž××•×“ ',8,'2020-01-21 04:44:12','32400','2020-01-22 23:40:39',1,'2020-01-24','08:05:30'),(11,4,486,7,'2010','3','32000','2020-01-21','1','×¤×¨×˜×™','×—×‘×¨×”','Private','New','Known','Yes','Yes','×¨×›×‘ × ×§×™','×¨×›×‘ ×‘×ž×¦×‘ ×—×“×©\r\n×œ×œ× ×ª××•× ×•×ª \r\n×œ× × ×¡×¢ ×‘×›×œ×œ ',9,'2020-01-21 06:29:14','69000',NULL,0,NULL,NULL),(12,1,326,23,'2010','2','3000','2020-01-21','A1','×¤×¨×˜×™','×—×‘×¨×”','Private','Fair','Unknown','No','No','××™×Ÿ × ×–×™×œ×•×ª ×›×œ×™ ×—×“×©','×›×œ×™ ×©×ž×•×¨',7,'2020-01-21 06:42:14','15000',NULL,0,NULL,NULL),(13,1,347,4,'2018','5','23000','2020-01-21','A1','×¤×¨×˜×™','×—×‘×¨×”','Private','Fair','Unknown','No','No',' × ×§×™ ×ž× ×–×™×œ×•×ª','×›×œ×™ ×©×ž×•×¨',7,'2020-01-21 06:52:21','90000','2020-01-21 10:30:55',0,NULL,NULL),(14,10,489,42,'2018','2','5000','2019-09-12','A1','×¤×¨×˜×™','×—×‘×¨×”','Trade Character','New','Known','Yes','Yes','×¨×›×‘ ×—×“×©','×ž×©××™×ª ×—×“×©×” ×œ××—×¨ ×©×™×¤×•×¥',3,'2020-01-21 07:05:10','200000',NULL,0,NULL,NULL),(15,6,485,37,'2020','2','600','2020-05-08','A1','×¤×¨×˜×™','×—×‘×¨×”','Private','New','Known','Yes','Yes','× ×–×™×œ×•×ª ×—×¡×¨ ×ž× ×•×¢','×›×œ×™ ×—×“×©',10,'2020-01-21 07:26:21','150000',NULL,1,'2020-01-21','08:52:26'),(16,1,117,8,'2018','5','3000','2019-11-06','.','.','×—×‘×¨×”','Private','Fair','Known','Yes','Yes',' .','×©×ž×•×¨ ×—×“×©',8,'2020-01-21 07:59:51','85000','2020-01-21 08:00:33',1,'2020-01-24','08:05:43'),(17,1,347,4,'2020','2','5000','2019-11-01','.','.','×—×‘×¨×”','Private','New','Known','Yes','Yes','×›×œ×™ ×—×“×©','×›×œ×™ ×©×ž×•×¨ ',8,'2020-01-21 08:32:24','120000',NULL,1,'2020-01-24','01:18:18'),(18,1,256,20,'2015','5','62000','2019-08-08','.','.','×—×‘×¨×”','×ª×• ×¡×—×¨','×—×“×©×™×','×™×“×•×¢','×›×Ÿ','×›×Ÿ',' .','.',8,'2020-01-21 08:45:09','100','2020-01-24 05:32:24',1,'2020-01-24','02:28:37'),(19,1,13,2,'2015','4','5000','2019-09-05','A1','.','×—×‘×¨×”','Trade Character','New','Known','Yes','Yes','× ×§×™ ×—×“×©','×›×œ×™ ×—×“×© ×‘× ×™×™×œ×•×Ÿ',8,'2020-01-21 09:20:50','100000',NULL,1,'2020-01-24','02:42:37'),(20,1,426,29,'2010','11','5999','2019-12-30','.','×¤×¨×˜×™','×—×‘×¨×”','Trade Character','New','Known','Yes','Yes','  ××™×Ÿ × ×–×™×œ×•×ª','×›×œ×™ ×—×“×© ×ž×œ× ×ª×•×¡×¤×•×ª ××’×–×•×–',11,'2020-01-21 10:44:08','120000','2020-01-21 11:32:32',0,NULL,NULL),(21,1,427,29,'2008','3','6000','2020-01-22','A1','×¤×¨×˜×™','×—×‘×¨×”','Trade Character','New','Known','Yes','Yes','××™×Ÿ','×›×œ×™ ×—×“×©',11,'2020-01-21 10:45:38','80000',NULL,0,NULL,NULL),(22,1,277,20,'2020','4','5','2019-07-12','A1','×¤×¨×˜×™','×—×‘×¨×”','Trade Character','New','Known','Yes','Yes','.','.',10,'2020-01-21 12:52:06','30000',NULL,0,NULL,NULL),(23,1,42,11,'2008','2','20000','2020-07-04','','×¤×¨×˜×™','×—×‘×¨×”','×ª×• ×¡×—×¨','×—×“×©×™×','×œ× ×™×“×•×¢','×›×Ÿ','×›×Ÿ',' ×§×¦×ª ×—×•×¤×©×™× ,× ×–×™×œ×•×ª ×‘×‘×•×œ×ž×™×','.',8,'2020-01-24 05:27:22','56000','2020-01-30 03:04:49',1,'2020-02-05','02:13:10'),(24,1,323,20,'2018','2','23000','2020-07-03','A1','×¤×¨×˜×™','×—×‘×¨×”','×ª×• ×¡×—×¨','×‘×™× ×•× ×™','×œ× ×™×“×•×¢','×›×Ÿ','×›×Ÿ','  ..','.',8,'2020-01-24 05:30:00','3000','2020-02-06 00:53:39',0,NULL,NULL),(25,1,13,2,'2008','2','6000','2020-06-05','','.','×—×‘×¨×”','×ª×• ×¡×—×¨','×“×¨×•×© ×”×—×œ×¤×”','×›×Ÿ','×œ× ×™×“×•×¢','×œ× ×™×“×•×¢','.','.',8,'2020-01-24 06:37:13','1000',NULL,0,NULL,NULL),(26,1,440,32,'2018','4','12000','2020-07-11','A1','×¤×¨×˜×™','×—×‘×¨×”','×¤×¨×˜×™','×—×“×©×™×','×›×Ÿ','×œ×','×œ×','×™×© × ×–×™×œ×•×ª ×‘×‘×•×œ× ×™×ž×™×Ÿ \r\n×ž×›×” ×‘×›× ×£','×§×˜× ×•×¢ ×©×ž×•×¨\r\n ×ž××•×“',8,'2020-02-05 06:10:21','124000',NULL,0,NULL,NULL),(27,6,481,28,'sdffd','3','3423','2020-02-12','dfsf','dfsf','w34234','×ª×• ×¡×—×¨','×—×“×©×™×','×œ×','×œ×','×œ×','dfs','dsffsdsdfdfsdfs',2,'2020-02-11 03:16:50','4323',NULL,0,NULL,NULL);
/*!40000 ALTER TABLE `vehicles_ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles_manufacture`
--

DROP TABLE IF EXISTS `vehicles_manufacture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles_manufacture` (
  `vehicle_manufacture_id` int(10) NOT NULL AUTO_INCREMENT,
  `vehicle_manufacture_name` varchar(50) NOT NULL,
  `vehicle_manufacture_added_timedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`vehicle_manufacture_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles_manufacture`
--

LOCK TABLES `vehicles_manufacture` WRITE;
/*!40000 ALTER TABLE `vehicles_manufacture` DISABLE KEYS */;
INSERT INTO `vehicles_manufacture` VALUES (1,'×©×¨×§×•','2020-01-05 17:40:58'),(2,'×× ×•×™ ××’×•×¡×˜×”','2020-01-05 17:41:01'),(3,'××¤×¨×™×œ×™×”','2020-01-05 17:41:05'),(4,'×™×ž××”×”','2020-01-05 17:41:09'),(5,'×¨×•×™××œ ×× ×¤×™×œ×“','2020-01-05 17:41:14'),(6,'×§×¡×™× ×’ ×™×•','2020-01-05 17:41:18'),(7,'toyota','2020-01-05 17:41:42'),(8,'bmw','2020-01-06 11:50:42'),(9,'×‘×˜×”','2020-01-06 11:56:55'),(10,'×‘×™×•××œ','2020-01-06 11:57:46'),(11,'××™× ×“×™××Ÿ','2020-01-06 12:17:52'),(12,'swm','2020-01-06 12:30:55'),(13,'×‘× ×œ×™','2020-01-06 13:51:50'),(14,'×’××¡ ×’××¡','2020-01-06 13:55:34'),(15,'×’×™×œ×¨×”','2020-01-06 14:02:54'),(16,'×“×•×§××˜×™','2020-01-06 14:08:21'),(17,'×“×™××œ×™×','2020-01-06 14:30:14'),(18,'×”.×ž.×ž×•×˜×•','2020-01-06 14:47:51'),(19,'×”××¨×œ×™ ×“×™×•×™×“×¡×•×Ÿ','2020-01-06 15:12:49'),(20,'×”×•× ×“×”','2020-01-06 15:23:16'),(21,'×”×¡×§×•×•×¨× ×”','2020-01-06 15:51:45'),(22,'×˜×™.××ž ×¨×™×™×¡×™× ×’','2020-01-06 16:03:15'),(23,'×˜×™.×’×™.×‘×™','2020-01-06 16:10:17'),(24,'×™×•××¡×× ×’','2020-01-07 13:31:07'),(25,'×ž×•×˜×• ×’×•×¦×™','2020-01-07 13:59:42'),(26,'×¡×•×–×•×§×™','2020-01-07 14:02:17'),(27,'×¤×™××’×•','2020-01-07 14:08:41'),(28,'ktm','2020-01-07 14:22:20'),(29,'×§×•×•××¡×§×™','2020-01-07 14:25:25'),(30,'×§×™×•×•××™','2020-01-07 14:30:27'),(31,'×§×™×ž×§×•','2020-01-07 14:33:24'),(32,'×¡××Ÿ ×™×× ×’','2020-01-07 14:39:51'),(33,'×¤×’×•','2020-01-07 14:44:33'),(34,'××—×¨','2020-01-07 14:54:07'),(35,'cf moto','2020-01-07 15:09:40'),(36,'××¨×§×™×˜×§','2020-01-07 15:10:35'),(37,'×‘×•×ž×‘×“×™×¨ - ×§××Ÿ ××','2020-01-07 15:11:32'),(38,'×“×™× ×œ×™','2020-01-07 15:11:43'),(39,'×¤×•×œ×¨×™×¡','2020-01-07 15:12:06'),(40,'×©×™×¨×•×ž×™×§×”','2020-01-07 15:12:18'),(41,'×ª×•× ×§××¨','2020-01-07 15:12:24'),(42,'×ž×¨×¦×“×¡','2020-01-14 10:42:28'),(43,'×ž××Ÿ','2020-01-14 10:42:34'),(44,'××™×•×•×§×•','2020-01-14 10:43:27'),(45,'×”×›×œ','2020-01-24 13:20:09');
/*!40000 ALTER TABLE `vehicles_manufacture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles_models`
--

DROP TABLE IF EXISTS `vehicles_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles_models` (
  `vehicles_model_id` int(10) NOT NULL AUTO_INCREMENT,
  `vehicle_type_id` int(10) NOT NULL,
  `vehicle_manufacture_id` int(10) NOT NULL COMMENT 'as a foreign key',
  `vehicles_model_name` varchar(50) NOT NULL,
  `vehicles_mode_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`vehicles_model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=494 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles_models`
--

LOCK TABLES `vehicles_models` WRITE;
/*!40000 ALTER TABLE `vehicles_models` DISABLE KEYS */;
INSERT INTO `vehicles_models` VALUES (3,1,1,'×˜×¨×™××œ st250','2020-01-05 17:42:47'),(4,1,1,'×˜×¨×™××œ st300','2020-01-05 17:42:58'),(8,1,2,'brutale 1090','2020-01-06 11:40:57'),(9,1,2,'brutale 800','2020-01-06 11:41:46'),(11,1,2,'f3 675','2020-01-06 11:44:58'),(12,1,2,'f3 800','2020-01-06 11:45:17'),(13,1,2,'f4','2020-01-06 11:45:31'),(14,1,2,'rivale 800','2020-01-06 11:45:48'),(15,1,5,'×§×œ××¡×™×§ efi','2020-01-06 11:46:46'),(22,1,8,'r1200 gs','2020-01-06 11:51:10'),(23,1,8,'gs','2020-01-06 11:51:28'),(24,1,8,'hp2','2020-01-06 11:51:51'),(25,1,8,'g450x','2020-01-06 11:52:04'),(26,1,8,'k1200r','2020-01-06 11:52:20'),(27,1,8,'r1150t','2020-01-06 11:52:39'),(28,1,8,'r1100','2020-01-06 11:52:53'),(29,1,8,'r1200r','2020-01-06 11:54:14'),(31,1,8,'road king','2020-01-06 11:55:25'),(32,1,8,'rs','2020-01-06 11:55:34'),(33,1,8,'rt','2020-01-06 11:55:42'),(36,1,10,'×™×•×œ×™×¡×¡','2020-01-06 12:10:43'),(37,1,10,'×œ×•× ×’','2020-01-06 12:10:52'),(38,1,10,'×œ×™×˜× ×™× ×’','2020-01-06 12:11:06'),(39,1,10,'×¤×™×™×¨×‘×•×œ×˜','2020-01-06 12:11:23'),(40,1,11,'ftr 1200','2020-01-06 12:20:32'),(41,1,11,'chief','2020-01-06 12:20:50'),(42,1,11,'chief - vintage','2020-01-06 12:21:31'),(43,1,11,'chiftain','2020-01-06 12:21:54'),(44,1,11,'ftr 1200s','2020-01-06 12:22:15'),(45,1,11,'ftr 1200s race replica','2020-01-06 12:22:44'),(46,1,11,'road master','2020-01-06 12:23:05'),(47,1,11,'scout','2020-01-06 12:23:17'),(48,1,11,'scout bobber','2020-01-06 12:23:37'),(49,1,11,'scout sixty','2020-01-06 12:23:57'),(50,1,11,'springfield','2020-01-06 12:24:23'),(51,1,2,'brutale 800rr','2020-01-06 12:25:59'),(52,1,2,'brutale 675','2020-01-06 12:26:35'),(53,1,2,'dragster 800rr','2020-01-06 12:27:21'),(54,1,2,'dragster rvs','2020-01-06 12:27:54'),(55,1,2,'f3675','2020-01-06 12:28:28'),(56,1,2,'f3675 rc','2020-01-06 12:28:45'),(57,1,2,'f4 1000','2020-01-06 12:29:06'),(58,1,2,'f4 rc','2020-01-06 12:29:14'),(59,1,2,'f4 rr','2020-01-06 12:29:25'),(60,1,2,'rivale','2020-01-06 12:29:42'),(61,1,2,'stradale','2020-01-06 12:30:02'),(62,1,2,'turisimo veloce','2020-01-06 12:30:26'),(63,1,12,'swm 440 silver','2020-01-06 12:31:28'),(64,1,12,'rs125r','2020-01-06 12:31:48'),(65,1,12,'rs300r','2020-01-06 12:32:17'),(66,1,12,'rs500r','2020-01-06 12:32:32'),(67,1,12,'rs650r','2020-01-06 12:32:52'),(68,1,12,'superdual','2020-01-06 12:33:12'),(69,1,3,'tuono 125','2020-01-06 12:34:28'),(70,1,3,'1200 caponord','2020-01-06 12:35:57'),(71,1,3,'125 rx','2020-01-06 12:36:11'),(72,1,3,'300 sr max','2020-01-06 12:36:38'),(73,1,3,'450 rxv','2020-01-06 12:37:20'),(74,1,3,'450 sxv','2020-01-06 12:37:35'),(75,1,3,'550 sxv','2020-01-06 12:37:50'),(76,1,3,'mana 850','2020-01-06 12:38:07'),(77,1,3,'dorsoduro ','2020-01-06 12:43:34'),(78,1,3,'pegaso 650 t','2020-01-06 12:43:55'),(79,1,3,'rs 125 2t','2020-01-06 12:44:19'),(80,1,3,'rs 125 4t','2020-01-06 12:44:39'),(81,1,3,'rsv 1000','2020-01-06 12:45:04'),(82,1,3,'rsv 1000rf factory','2020-01-06 12:51:11'),(83,1,3,'shiver','2020-01-06 12:51:27'),(84,1,3,'srv 850 ××•×˜×•','2020-01-06 12:52:00'),(85,1,3,'tuono v4 1100rr','2020-01-06 12:52:23'),(86,1,3,'tuono v4 1100 factory','2020-01-06 12:52:58'),(87,1,3,'tuono 1000 v4 aprc','2020-01-06 12:53:40'),(88,1,8,'r1250 gs','2020-01-06 12:54:49'),(89,1,8,'r1200rt','2020-01-06 12:55:23'),(90,1,8,'hp2 1200 edduro','2020-01-06 12:58:01'),(91,1,8,'hp 1200 ×¡×¤×•×¨×˜','2020-01-06 12:58:19'),(92,1,8,'avd f800gs','2020-01-06 12:58:43'),(93,1,8,'adv r1200gs','2020-01-06 12:59:02'),(94,1,8,'c1','2020-01-06 12:59:23'),(95,1,8,'c600 sport','2020-01-06 12:59:38'),(96,1,8,'c650gt','2020-01-06 12:59:52'),(97,1,8,'f750gs','2020-01-06 13:00:27'),(98,1,8,'f800gs','2020-01-06 13:08:26'),(99,1,8,'f800gt','2020-01-06 13:08:39'),(100,1,8,'f800r','2020-01-06 13:08:57'),(101,1,8,'f800st','2020-01-06 13:09:45'),(102,1,8,'g310gs','2020-01-06 13:11:08'),(103,1,8,'g310r','2020-01-06 13:11:21'),(104,1,8,'g650gs sertao','2020-01-06 13:12:12'),(105,1,8,'k1600gt','2020-01-06 13:12:50'),(106,1,8,'nine t r1200','2020-01-06 13:13:09'),(107,1,8,'nine t r1200 racer','2020-01-06 13:13:29'),(108,1,8,'pure nine t r 1200','2020-01-06 13:13:57'),(109,1,8,'r/s k1300','2020-01-06 13:14:21'),(110,1,8,'r1100r','2020-01-06 13:14:35'),(111,1,8,'r1100rs','2020-01-06 13:14:48'),(112,1,8,'r1100s','2020-01-06 13:15:05'),(113,1,8,'r1150gs','2020-01-06 13:15:21'),(114,1,8,'r1150r','2020-01-06 13:15:47'),(115,1,8,'r1200rs','2020-01-06 13:16:00'),(116,1,8,'s1000r','2020-01-06 13:17:25'),(117,1,8,'s1000rr','2020-01-06 13:17:36'),(118,1,8,'s1000rr pure','2020-01-06 13:17:52'),(119,1,8,'s1000xr','2020-01-06 13:18:07'),(120,1,8,'f700 -f650 gs twin','2020-01-06 13:18:37'),(121,1,9,'125rr 2t','2020-01-06 13:41:49'),(122,1,9,'125 rr 4t','2020-01-06 13:42:07'),(123,1,9,'200rr 2t','2020-01-06 13:42:21'),(124,1,9,'250rr 2t','2020-01-06 13:42:37'),(125,1,9,'300rr 2t','2020-01-06 13:42:55'),(126,1,9,'350rr 4t','2020-01-06 13:43:08'),(127,1,9,'390rr 4t','2020-01-06 13:43:23'),(128,1,9,'480rr 4t','2020-01-06 13:43:41'),(129,1,9,'alp 125','2020-01-06 13:43:59'),(130,1,9,'alp4.0 350','2020-01-06 13:44:28'),(131,1,9,'evo trial 125 2t','2020-01-06 13:44:48'),(132,1,9,'evo trial300 2t','2020-01-06 13:45:11'),(133,1,9,'evo trial 250 2t','2020-01-06 13:46:07'),(134,1,9,'sm m4 350','2020-01-06 13:46:23'),(135,1,9,'spm rr motard 125','2020-01-06 13:46:48'),(136,1,9,'urban 125','2020-01-06 13:47:05'),(137,1,9,'urban 200','2020-01-06 13:47:18'),(138,1,9,'x trainer 250 2t','2020-01-06 13:47:43'),(139,1,9,'x trainer 300 2t','2020-01-06 13:47:57'),(140,1,13,'502c','2020-01-06 13:52:31'),(141,1,13,'leoncino 250','2020-01-06 13:53:00'),(142,1,13,'leoncino 500','2020-01-06 13:53:20'),(143,1,13,'tnt125','2020-01-06 13:53:33'),(144,1,13,'tnt250','2020-01-06 13:53:52'),(145,1,13,'tnt300','2020-01-06 13:54:02'),(146,1,13,'trk502','2020-01-06 13:54:26'),(147,1,13,'trk502x','2020-01-06 13:54:39'),(148,1,14,'ec 2t 125','2020-01-06 13:56:06'),(149,1,14,'pro txt 125 trial','2020-01-06 13:56:30'),(150,1,14,'pro txt 250 trial','2020-01-06 13:56:47'),(151,1,14,'pro txt 300 trial','2020-01-06 13:57:08'),(152,1,14,'cami   4t  ×“×• ×©×™×ž×•×©×™','2020-01-06 13:58:06'),(153,1,14,'ec 2t 250','2020-01-06 13:58:30'),(154,1,14,'ec 2t 300','2020-01-06 13:58:49'),(155,1,14,'ec300f  4t ','2020-01-06 13:59:17'),(156,1,14,'ec 450 f  racing 4t ','2020-01-06 13:59:50'),(157,1,14,'enduro racing 2t ','2020-01-06 14:00:13'),(158,1,14,'racing ec200r  2t','2020-01-06 14:00:57'),(159,1,14,'racing ec200f  4t','2020-01-06 14:01:21'),(160,1,14,'randonne 4 t','2020-01-06 14:01:39'),(161,1,15,'fuoco 500','2020-01-06 14:03:45'),(162,1,15,'gp800','2020-01-06 14:03:55'),(163,1,15,'nexus ','2020-01-06 14:07:15'),(164,1,15,'runner','2020-01-06 14:07:31'),(165,1,16,'1198','2020-01-06 14:10:36'),(166,1,16,'diavel','2020-01-06 14:10:54'),(167,1,16,'diavel 1260s','2020-01-06 14:11:16'),(168,1,16,'848','2020-01-06 14:11:27'),(169,1,16,'multistrada 950','2020-01-06 14:12:04'),(171,1,16,'corse panigale 959','2020-01-06 14:12:52'),(172,1,16,'streert fighter','2020-01-06 14:13:28'),(173,1,16,'hypermotard ','2020-01-06 14:13:56'),(174,1,16,'icon scrambler','2020-01-06 14:14:20'),(175,1,16,'monster 1100','2020-01-06 14:14:51'),(176,1,16,'monster 696','2020-01-06 14:15:13'),(177,1,16,'monster 796','2020-01-06 14:15:50'),(178,1,16,'monster 797','2020-01-06 14:16:06'),(179,1,16,'monster 1200','2020-01-06 14:16:24'),(180,1,16,'monster 1200r','2020-01-06 14:16:42'),(181,1,16,'monster 1200s','2020-01-06 14:16:59'),(183,1,16,'multistrada 1200','2020-01-06 14:17:41'),(184,1,16,'multistrada 1200  enduro','2020-01-06 14:18:10'),(185,1,16,'multistrada 1260','2020-01-06 14:21:56'),(186,1,16,'multistrada 1260 pp','2020-01-06 14:22:13'),(187,1,16,'multistrada 1260 s','2020-01-06 14:22:37'),(188,1,16,'panigale 1199','2020-01-06 14:23:09'),(189,1,16,'panigale 1299','2020-01-06 14:23:26'),(190,1,16,'panigale v4','2020-01-06 14:23:44'),(191,1,16,'real enduro scrambler ','2020-01-06 14:24:34'),(192,1,16,'red panigale 899','2020-01-06 14:25:15'),(193,1,16,'red panigale 959','2020-01-06 14:25:32'),(194,1,16,'scrambler  1100','2020-01-06 14:27:18'),(195,1,16,'scrambler  sixty 2','2020-01-06 14:28:24'),(196,1,16,'super sport ','2020-01-06 14:28:41'),(197,1,16,'x diavel','2020-01-06 14:29:06'),(198,1,16,'x diavel s black','2020-01-06 14:29:29'),(199,1,17,'s3 advance sv250','2020-01-06 14:31:09'),(200,1,17,'aroma yc125 ','2020-01-06 14:31:28'),(201,1,17,'b bbone sn125','2020-01-06 14:31:47'),(202,1,17,'besbi lc 125','2020-01-06 14:42:09'),(203,1,17,'dart nc 125','2020-01-06 14:42:37'),(204,1,17,'dayster vl 250','2020-01-06 14:43:00'),(205,1,17,'lw125 ','2020-01-06 14:43:15'),(206,1,17,'ql125 steezer ','2020-01-06 14:43:40'),(207,1,17,'s1 sl 125u','2020-01-06 14:43:57'),(208,1,17,'s3 sv125','2020-01-06 14:44:16'),(209,1,17,'win road vjf 125','2020-01-06 14:44:37'),(210,1,17,'win road vjf 250','2020-01-06 14:44:50'),(211,1,18,'125 r cre f 4t','2020-01-06 14:49:09'),(212,1,18,'300 cre f ','2020-01-06 14:49:42'),(213,1,18,'f 250r cre 4t','2020-01-06 14:50:07'),(214,1,18,'f 250 ri cre 4t','2020-01-06 14:50:29'),(215,1,18,'f 250x cre 4t','2020-01-06 15:05:26'),(216,1,18,'f 300x cre 4t','2020-01-06 15:05:49'),(217,1,18,'f 450r cre 4t','2020-01-06 15:06:12'),(218,1,18,'f 450crm  cre 4t','2020-01-06 15:07:37'),(219,1,18,'f 450x  cre 4t','2020-01-06 15:08:04'),(220,1,18,'f 500r cre  4t','2020-01-06 15:08:50'),(221,1,18,'f 500x cre   4t','2020-01-06 15:09:23'),(222,1,18,'sixcomp cre125  2t','2020-01-06 15:09:56'),(223,1,18,'f 450 crm 4t  ×¡×•×¤×¨×ž×•×˜×•','2020-01-06 15:10:30'),(224,1,19,'breakout ','2020-01-06 15:14:09'),(225,1,19,'custom','2020-01-06 15:14:27'),(226,1,19,'deluxe','2020-01-06 15:14:46'),(227,1,19,'electra glide ','2020-01-06 15:15:17'),(228,1,19,'fat bob','2020-01-06 15:15:32'),(229,1,19,'fat boy','2020-01-06 15:15:47'),(230,1,19,'forty eight ','2020-01-06 15:16:11'),(231,1,19,'fxdr','2020-01-06 15:16:33'),(232,1,19,'haritage ','2020-01-06 15:16:56'),(233,1,19,'iron','2020-01-06 15:17:31'),(234,1,19,'low','2020-01-06 15:17:46'),(235,1,19,'low rider','2020-01-06 15:18:05'),(236,1,19,'night rod','2020-01-06 15:18:22'),(237,1,19,'road glide','2020-01-06 15:18:48'),(238,1,19,'road king','2020-01-06 15:19:10'),(239,1,19,'roadster','2020-01-06 15:19:35'),(240,1,19,'rocker','2020-01-06 15:19:56'),(241,1,19,'softail slim','2020-01-06 15:20:21'),(242,1,19,'sport glide','2020-01-06 15:20:57'),(243,1,19,'street xg 750','2020-01-06 15:21:17'),(244,1,19,'street bob','2020-01-06 15:21:34'),(245,1,19,'street glide','2020-01-06 15:21:52'),(246,1,19,'superlow','2020-01-06 15:22:11'),(247,1,19,'ultra limited','2020-01-06 15:22:37'),(248,1,20,'ps 125','2020-01-06 15:23:51'),(249,1,20,'msx 125','2020-01-06 15:24:05'),(250,1,20,'pcx 125','2020-01-06 15:24:19'),(251,1,20,'forza 250','2020-01-06 15:24:46'),(252,1,20,'forza 300','2020-01-06 15:30:12'),(253,1,20,'africa twin  1000','2020-01-06 15:30:50'),(254,1,20,'cbr 250r','2020-01-06 15:31:13'),(255,1,20,'cb 500','2020-01-06 15:31:27'),(256,1,20,'cb1000r','2020-01-06 15:31:51'),(257,1,20,'cb 1100a','2020-01-06 15:32:12'),(258,1,20,'cb125r','2020-01-06 15:32:34'),(259,1,20,'cb300r','2020-01-06 15:32:50'),(260,1,20,'cb500f','2020-01-06 15:33:01'),(261,1,20,'cb500x','2020-01-06 15:33:23'),(262,1,20,'cb650f','2020-01-06 15:33:39'),(263,1,20,'cb650r','2020-01-06 15:33:53'),(264,1,20,'cbf250','2020-01-06 15:34:15'),(265,1,20,'cbr1000rr','2020-01-06 15:34:41'),(266,1,20,'cbr300ra','2020-01-06 15:34:59'),(267,1,20,'cbr500r','2020-01-06 15:35:10'),(268,1,20,'cbr 600','2020-01-06 15:35:23'),(269,1,20,'cbr 600rr','2020-01-06 15:35:38'),(270,1,20,'cbr 650r','2020-01-06 15:36:05'),(271,1,20,'cmx 500 rebel','2020-01-06 15:36:29'),(272,1,20,'crf 250 rally','2020-01-06 15:36:48'),(273,1,20,'crf 250 l','2020-01-06 15:37:05'),(274,1,20,'crf 250x','2020-01-06 15:37:17'),(275,1,20,'crf 400rx','2020-01-06 15:37:40'),(276,1,20,'crf 450l','2020-01-06 15:38:18'),(277,1,20,'crf 450l rx','2020-01-06 15:38:37'),(278,1,20,'vfr 800x','2020-01-06 15:38:59'),(279,1,20,'gold wing','2020-01-06 15:39:25'),(280,1,20,'inova 125','2020-01-06 15:39:41'),(281,1,20,'integra','2020-01-06 15:39:58'),(282,1,20,'integra 750','2020-01-06 15:40:24'),(283,1,20,'cbf 125','2020-01-06 15:40:50'),(284,1,20,'sh 125','2020-01-06 15:43:54'),(285,1,20,'monkey 125','2020-01-06 15:45:12'),(287,1,20,'new hornet ','2020-01-06 15:45:48'),(288,1,20,'sh300','2020-01-06 15:46:11'),(289,1,20,'silver wing 400','2020-01-06 15:46:35'),(290,1,20,'silver wing 600','2020-01-06 15:47:39'),(291,1,20,'sport adv  crf 1000l','2020-01-06 15:48:19'),(292,1,20,'trans alp ','2020-01-06 15:48:41'),(293,1,20,'varadero','2020-01-06 15:49:00'),(294,1,20,'vfr 1200','2020-01-06 15:49:16'),(295,1,20,'vision 110','2020-01-06 15:49:38'),(296,1,20,'x adv ','2020-01-06 15:50:06'),(297,1,21,'nuda 900r','2020-01-06 15:53:09'),(298,1,21,'4t fe501','2020-01-06 15:54:37'),(299,1,21,'enduro 701','2020-01-06 15:55:23'),(300,1,21,'fe250 4t','2020-01-06 15:55:42'),(301,1,21,'fe350 4t','2020-01-06 15:56:04'),(302,1,21,'fe450  4t','2020-01-06 15:56:24'),(303,1,21,'supermoto 701','2020-01-06 15:56:41'),(304,1,21,'svartpilen 701','2020-01-06 15:57:18'),(305,1,21,'te125 2t','2020-01-06 15:57:38'),(306,1,21,'te150i 2t','2020-01-06 15:58:05'),(307,1,21,'te250i 2t','2020-01-06 15:58:29'),(308,1,21,'te300 2t','2020-01-06 15:58:55'),(309,1,21,'tx 125','2020-01-06 15:59:23'),(310,1,21,'vitpilen 401','2020-01-06 16:00:08'),(311,1,21,'vitpilen 701','2020-01-06 16:00:29'),(312,1,22,'125g  en  2t','2020-01-06 16:06:08'),(313,1,22,'250g en  2t','2020-01-06 16:06:26'),(314,1,22,'300g en2  2t','2020-01-06 16:06:47'),(315,1,22,'en250fi  es 2t','2020-01-06 16:07:11'),(316,1,22,'en 300f  4t','2020-01-06 16:07:31'),(317,1,22,'en 300','2020-01-06 16:07:51'),(318,1,22,'fi en 250  4t','2020-01-06 16:08:31'),(319,1,22,'fi en 450  4t','2020-01-06 16:08:49'),(320,1,22,'smr450f  4t','2020-01-06 16:09:11'),(321,1,22,'smr530f  f  4t','2020-01-06 16:09:32'),(322,1,8,'r80','2020-01-07 13:23:58'),(323,1,20,'nc700','2020-01-07 13:24:51'),(324,1,16,'monster 821	','2020-01-07 13:25:44'),(325,1,16,'multistrada 950 adv	','2020-01-07 13:26:00'),(326,1,23,'125','2020-01-07 13:29:14'),(327,1,23,'akros-tec','2020-01-07 13:29:35'),(328,1,23,'delivery','2020-01-07 13:29:53'),(329,1,23,'ergon','2020-01-07 13:30:03'),(330,1,24,'gt','2020-01-07 13:31:39'),(331,1,24,'gt250 r','2020-01-07 13:31:59'),(332,1,24,'gt650','2020-01-07 13:32:10'),(333,1,24,'gt125r','2020-01-07 13:32:24'),(334,1,24,'gv','2020-01-07 13:32:37'),(335,1,24,'gv250','2020-01-07 13:32:48'),(336,1,24,'gv650','2020-01-07 13:32:58'),(337,1,24,'gv125','2020-01-07 13:33:09'),(338,1,24,'rx','2020-01-07 13:33:19'),(339,1,24,'rx125','2020-01-07 13:33:30'),(340,1,24,'sf 50 b','2020-01-07 13:33:44'),(341,1,24,'×§×•×ž×˜ gt 250','2020-01-07 13:34:05'),(342,1,4,'dt','2020-01-07 13:34:29'),(343,1,4,'fjr','2020-01-07 13:34:42'),(344,1,4,'fzr','2020-01-07 13:34:55'),(345,1,4,'mt','2020-01-07 13:35:05'),(346,1,4,'pw','2020-01-07 13:35:17'),(347,1,4,'r1','2020-01-07 13:35:26'),(348,1,4,'r6','2020-01-07 13:35:33'),(349,1,4,'tdm','2020-01-07 13:56:07'),(350,1,4,'tt','2020-01-07 13:56:14'),(351,1,4,'tw','2020-01-07 13:56:21'),(352,1,4,'v max','2020-01-07 13:56:29'),(353,1,4,'wr','2020-01-07 13:56:37'),(354,1,4,'wr-f','2020-01-07 13:56:51'),(355,1,4,'xj','2020-01-07 13:57:01'),(356,1,4,'xt','2020-01-07 13:57:09'),(357,1,4,'xtz','2020-01-07 13:57:17'),(358,1,4,'ybr','2020-01-07 13:57:28'),(359,1,4,'yfz 450','2020-01-07 13:57:42'),(360,1,4,'yz','2020-01-07 13:57:51'),(361,1,4,'×“×™×•×•×¨×’×Ÿ','2020-01-07 13:58:22'),(362,1,4,'×“×¨×’×¡×˜××¨','2020-01-07 13:58:35'),(363,1,4,'×•×™×¨×’×•','2020-01-07 13:58:44'),(364,1,4,'×¤×™×™×–×¨','2020-01-07 13:58:53'),(365,1,25,'v9 bobber','2020-01-07 14:00:04'),(366,1,25,'v9 roamer','2020-01-07 14:00:20'),(367,1,25,'××™×ž×•×œ×”','2020-01-07 14:00:35'),(368,1,25,'×¤×œ×•×¨×™×“×”','2020-01-07 14:00:44'),(369,1,25,'×§×œ×™×¤×•×¨× ×™×”','2020-01-07 14:00:59'),(371,1,26,'dl/ v storm','2020-01-07 14:03:12'),(372,1,26,'dr','2020-01-07 14:04:11'),(373,1,26,'dr big','2020-01-07 14:04:48'),(374,1,26,'drz s','2020-01-07 14:05:03'),(375,1,26,'drz sm','2020-01-07 14:05:13'),(376,1,26,'gn','2020-01-07 14:05:21'),(377,1,26,'gs','2020-01-07 14:05:29'),(378,1,26,'gsx','2020-01-07 14:05:40'),(379,1,26,'gsxr','2020-01-07 14:05:54'),(380,1,26,'gsx f','2020-01-07 14:06:03'),(381,1,26,'gz','2020-01-07 14:06:13'),(382,1,26,'rf','2020-01-07 14:06:20'),(383,1,26,'rm','2020-01-07 14:06:27'),(384,1,26,'rmx','2020-01-07 14:06:36'),(385,1,26,'rv','2020-01-07 14:06:46'),(386,1,26,'sv','2020-01-07 14:07:00'),(387,1,26,'tl','2020-01-07 14:07:08'),(388,1,26,'tsw','2020-01-07 14:07:17'),(389,1,26,'xf','2020-01-07 14:07:40'),(390,1,26,'××™× ×˜×¨×•×“×¨','2020-01-07 14:07:56'),(391,1,26,'×‘× ×“×™×˜','2020-01-07 14:08:08'),(392,1,26,'×•×•×œ×£','2020-01-07 14:08:16'),(393,1,26,'×ž×•× ×¡×˜×¨','2020-01-07 14:08:25'),(394,1,27,'x evo','2020-01-07 14:09:11'),(395,1,27,'×‘×•×•×¨×œ×™','2020-01-07 14:09:27'),(396,1,27,'×•×¡×¤×” 125  x8','2020-01-07 14:09:58'),(397,1,27,'mp3 250','2020-01-07 14:10:34'),(398,1,27,'mp3 400','2020-01-07 14:21:37'),(399,1,28,'duke','2020-01-07 14:22:33'),(400,1,28,'exc','2020-01-07 14:22:45'),(401,1,28,'××“×•×•× ×¦×¨','2020-01-07 14:23:04'),(402,1,28,'×ž×•×˜×•×§×¨×•×¡ sx','2020-01-07 14:23:18'),(403,1,28,'×ž×™× ×™ ×§×¨×•×¡ mini sx','2020-01-07 14:23:45'),(404,1,28,'×¡×•×¤×¨ ××“×•×•× ×¦×¨','2020-01-07 14:24:07'),(405,1,28,'×¡×•×¤×¨×‘×™×™×§','2020-01-07 14:24:23'),(406,1,28,'×¡×•×¤×¨ ×ž×•×˜×•','2020-01-07 14:24:34'),(407,1,28,'×¤×¨×™ ×¨×™×™×“','2020-01-07 14:24:47'),(408,1,28,'×¨×™×™×¡×™× ×’','2020-01-07 14:24:58'),(409,1,29,'en','2020-01-07 14:25:43'),(410,1,29,'er','2020-01-07 14:25:58'),(411,1,29,'er 5','2020-01-07 14:26:06'),(412,1,29,'gpx r','2020-01-07 14:26:20'),(413,1,29,'gpz','2020-01-07 14:26:46'),(414,1,29,'kle','2020-01-07 14:26:58'),(415,1,29,'klr','2020-01-07 14:27:07'),(416,1,29,'klx','2020-01-07 14:27:16'),(417,1,29,'k x','2020-01-07 14:27:32'),(418,1,29,'vn','2020-01-07 14:27:41'),(419,1,29,'z250','2020-01-07 14:27:52'),(420,1,29,'z750','2020-01-07 14:28:03'),(421,1,29,'z300','2020-01-07 14:28:17'),(422,1,29,'z400','2020-01-07 14:28:25'),(423,1,29,'z800','2020-01-07 14:28:34'),(424,1,29,'z900','2020-01-07 14:28:44'),(425,1,29,'zx','2020-01-07 14:28:51'),(426,1,29,'zx12','2020-01-07 14:29:19'),(427,1,29,'zx 6r','2020-01-07 14:29:30'),(428,1,29,'zzr','2020-01-07 14:29:40'),(429,1,29,'×•×¨×¡×™×¡','2020-01-07 14:29:48'),(430,1,30,'×¡×•×¤×¨ ×©××“×•','2020-01-07 14:32:35'),(431,1,30,'×¡×•×¤×¨ ×œ×™×™×˜','2020-01-07 14:32:53'),(432,1,31,'quannon','2020-01-07 14:33:44'),(433,1,32,'euro mx','2020-01-07 14:40:24'),(434,1,32,'hd','2020-01-07 14:40:34'),(435,1,32,'maxsym','2020-01-07 14:40:49'),(436,1,32,'vs','2020-01-07 14:40:58'),(437,1,32,'××•×¨×‘×™×˜','2020-01-07 14:41:13'),(438,1,32,'××˜×™×œ×”','2020-01-07 14:41:25'),(439,1,32,'×’×•×™ ×ž×§×¡','2020-01-07 14:41:35'),(440,1,32,'×’×•×™ ×¨×™×™×“','2020-01-07 14:41:47'),(441,1,32,'×’×•× ×’×œ','2020-01-07 14:41:56'),(442,1,32,'×’×˜','2020-01-07 14:42:04'),(443,1,32,'×“×™×•×§','2020-01-07 14:42:12'),(444,1,32,'×ž××¡×§','2020-01-07 14:42:20'),(445,1,32,'×ž×™×•','2020-01-07 14:42:28'),(446,1,32,'× ×™×• ×’×˜','2020-01-07 14:42:39'),(447,1,32,'× ×™×• ×“×™×•×§','2020-01-07 14:42:51'),(448,1,32,'×¡×™×˜×™×§×•× 300','2020-01-07 14:43:07'),(449,1,32,'×§×¨×•×¡×™×','2020-01-07 14:43:21'),(450,1,32,'×¤× ×¡×™','2020-01-07 14:43:29'),(451,1,26,'×‘×•×¨×’×ž×Ÿ','2020-01-07 14:43:49'),(452,1,33,'sum up','2020-01-07 14:44:49'),(453,1,33,'××œ×™×–××•','2020-01-07 14:45:01'),(454,1,33,'×•×™×•×” ×¡×™×˜×™','2020-01-07 14:45:17'),(455,1,33,'×˜×¨×§×¨','2020-01-07 14:45:26'),(456,1,33,'×œ×•×“×™×§×¡','2020-01-07 14:45:38'),(457,1,33,'×¡×˜×¨×™×˜ ×‘×•×¨×“','2020-01-07 14:45:55'),(458,1,33,'×¡×¤×™×“ ×¤×™×™×˜','2020-01-07 14:46:07'),(459,1,33,'×¤×•×§×¡','2020-01-07 14:46:17'),(460,1,29,'j300','2020-01-07 14:46:41'),(461,1,30,'×”×•×¨×™×§×Ÿ','2020-01-07 14:47:18'),(462,1,30,'matrix 125','2020-01-07 14:47:45'),(463,1,30,'act 125','2020-01-07 14:48:07'),(464,1,31,'×“××•×Ÿ ×˜××•×Ÿ ','2020-01-07 14:48:44'),(465,1,31,'e v t 400','2020-01-07 14:49:05'),(466,1,31,'people','2020-01-07 14:49:24'),(467,1,31,'x town 250','2020-01-07 14:49:59'),(468,1,31,'××’×™×œ×™×˜×™','2020-01-07 14:50:16'),(469,1,31,'××§×¡×™×™×˜×™× ×’','2020-01-07 14:50:43'),(470,1,31,'×’×¨× ×“ ×“×™× ×§','2020-01-07 14:50:54'),(471,1,31,'×“×™× ×§','2020-01-07 14:51:10'),(472,1,31,'×”×¨×•××™×–×','2020-01-07 14:51:24'),(473,1,31,'×•×™×˜××œ×™×˜×™','2020-01-07 14:51:41'),(474,1,31,'×ž×•×‘×™','2020-01-07 14:51:53'),(475,1,31,'× ×™×• ×“×™× ×§','2020-01-07 14:52:04'),(476,1,31,'×¡×•×¤×¨ ×’×•×§×™','2020-01-07 14:52:21'),(477,1,31,'×¡× ×˜×•','2020-01-07 14:52:31'),(478,1,31,'×¤×™×¤×œ 125 ','2020-01-07 14:52:45'),(479,1,34,'××—×¨','2020-01-07 14:54:23'),(480,6,41,'mt27','2020-01-07 15:13:08'),(481,6,28,'525','2020-01-07 15:13:45'),(482,6,34,'××—×¨','2020-01-07 15:14:32'),(483,6,39,'rzr','2020-01-07 15:14:47'),(484,6,29,'×ž×™×•×œ','2020-01-07 15:15:08'),(485,6,37,'×ž×•×•×¨×™×§','2020-01-07 15:15:59'),(486,4,7,'h1','2020-01-14 10:40:54'),(487,4,20,'hzx2','2020-01-14 10:41:33'),(488,10,43,'65','2020-01-14 10:42:55'),(489,10,42,'740','2020-01-14 10:43:11'),(490,6,36,'450x','2020-01-14 10:56:04');
/*!40000 ALTER TABLE `vehicles_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'zamarket_automobiles'
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
