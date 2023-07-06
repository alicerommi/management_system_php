-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2018 at 05:24 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratedins_driving`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `online_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `online_flag`) VALUES
(8, 'abdul', 'rehmana578@gmail.com', '123', '26168336_855255091312967_5821318825682454884_n.jpg', 1),
(10, 'abd', 'ayaz3@gmail.com', '123', 'image.PNG', 0),
(11, 'ab', 'ayaz568@gmail.com', '123', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_ins_chat`
--

CREATE TABLE `admin_ins_chat` (
  `chat_id` int(11) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `ins_id` int(10) NOT NULL,
  `message` text NOT NULL,
  `post_time` datetime NOT NULL,
  `sendBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_ins_chat`
--

INSERT INTO `admin_ins_chat` (`chat_id`, `admin_id`, `ins_id`, `message`, `post_time`, `sendBy`) VALUES
(1, 8, 10, 'kd', '2018-03-29 13:00:13', 'admin'),
(2, 8, 10, 'fjf', '2018-03-29 14:55:03', 'admin'),
(3, 8, 10, 'd', '2018-03-29 15:41:38', 'instructor'),
(4, 8, 10, 'hello', '2018-03-29 16:06:55', 'instructor'),
(5, 8, 10, 'actually we have reviewed your documents but there are few things which are missing your cnin copy and license', '2018-03-29 16:07:56', 'admin'),
(6, 8, 10, 'ok sir i will send to you soon.', '2018-03-30 09:33:50', 'instructor'),
(7, 8, 10, 'fjkf', '2018-03-30 10:25:00', 'admin'),
(8, 8, 10, 'The following documents are missing please upload them.', '2018-03-30 10:25:33', 'admin'),
(9, 8, 11, 'please send me again which are not marked as verified. \r\nthanks', '2018-03-30 11:25:39', 'admin'),
(10, 8, 11, 'dfkj', '2018-03-30 11:27:48', 'admin'),
(11, 8, 11, 'kdfj', '2018-03-30 11:28:54', 'admin'),
(12, 8, 11, 'kdfj', '2018-03-30 11:29:12', 'admin'),
(13, 8, 11, 'kdfj', '2018-03-30 11:29:29', 'admin'),
(14, 8, 11, 'hello the following documents are not correct', '2018-03-30 12:32:49', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin_learner_chat`
--

CREATE TABLE `admin_learner_chat` (
  `chat_id` int(11) NOT NULL,
  `admin_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `message` text NOT NULL,
  `post_time` datetime NOT NULL,
  `sendBy` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_learner_chat`
--

INSERT INTO `admin_learner_chat` (`chat_id`, `admin_id`, `user_id`, `message`, `post_time`, `sendBy`) VALUES
(1, 8, 1, 'ksdjf', '2018-03-29 17:20:48', 'admin'),
(2, 8, 1, 'ksjdf', '2018-03-29 17:21:35', 'admin'),
(3, 8, 1, 'hello', '2018-04-05 13:38:31', 'user'),
(4, 8, 1, 'how are you administrator?', '2018-04-05 13:38:41', 'user'),
(5, 8, 1, 'i am good', '2018-04-05 13:39:44', 'admin'),
(6, 10, 1, 'hihi', '2018-04-14 08:41:55', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `vLink` varchar(40) NOT NULL,
  `emailVeriStatus` int(2) NOT NULL,
  `legalVeri` int(2) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `lat` varchar(10) NOT NULL,
  `lng` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `instructorPrice_perHalfHour` varchar(10) NOT NULL,
  `online_flag` int(11) NOT NULL COMMENT 'for showing the status of user whether he is online or not',
  `gender` varchar(10) NOT NULL,
  `service_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `name`, `email`, `image`, `password`, `vLink`, `emailVeriStatus`, `legalVeri`, `postcode`, `address`, `lat`, `lng`, `date`, `instructorPrice_perHalfHour`, `online_flag`, `gender`, `service_type`) VALUES
(10, 'abdul', 'rehmana578@gmail.com', '', '123', 'F(K3YBcf7yDuupdhq0yfMlhAzvM@xBK6xo9', 1, 1, 'bb8', 'Blackburn BB6, UK', '53.748575', '-2.487529', '2018-02-17', '2', 0, 'male', 'company'),
(11, 'awais', 'awais2@gmail.com', '', '123', 'OCJ#Z_3ONOa(arK(L4VCjno9rkvy1BW1GbP', 1, 1, 'bb4', 'Haslingden, Rossendale BB4 4DN, UK', '53.694', '-2.329', '2018-02-17', '2', 1, 'male', 'company'),
(12, 'raheed', 'resh3@gmail.com', '', '123', 'VcLrTMwO8n_nYj1dKj*QFBI1hSsuNg7_FF4', 1, 1, 'bb5', 'Clayton-le-Moors, Accrington BB5 5JP, UK', '53.768', '-2.39', '2018-02-16', '2', 0, 'male', 'company'),
(13, 'sami', 'sami33@gmail.com', '', '123', '9RYq4vwspSf(yYpXvlHxLddIb8VNpbNAh(E', 1, 0, 'bb3', 'BB8, UK', '53.859', '-2.123', '2018-02-16', '2', 0, 'male', 'company'),
(14, 'sajid', 'sajid66@gmail.com', '', '123', '-7aSwwLya$BeGa1r*r01SpUBckl@O$UKBrd', 1, 0, 'ab39', 'Stonehaven AB39, UK', '56.964', '-2.209', '2018-02-16', '2', 0, 'male', 'company'),
(15, 'asif', 'asif33@gmail.com', '', '123', 'jBJguBImd3RAzKQdWwVbd4LS-BCZgxbVq0N', 1, 0, 'bb2', 'Blackburn BB2, UK', '53.764', '-2.541', '2018-02-16', '2', 0, 'male', 'company'),
(16, 'abdu', 'rehmana8@gmail.com', '', '123', 'zrUUmK-zuIFVx3_gA5*Mbw$MyuJe8NCJ9xu', 0, 0, '', '', '', '', '2018-03-30', '', 0, 'male', 'company'),
(21, 'rommi', 'rommi77@yahoo.com', '', 'X41yfnnaRS', 'I4HDA4MfJmu6GvHGoAWMpZvQjI6c2dzKigo', 1, 0, '', '', '', '', '2018-04-06', '', 0, 'male', 'company'),
(22, 'Tuffney', 'kevintuffney@gmail.com', '', 'YXC5JoOyNM', 'gW91PsTQZdBo8eQiAMa537UFg4yQ0e6hagi', 1, 0, '', '', '', '', '2018-04-06', '', 0, 'male', 'individual'),
(23, 'Carmenmillen', 'carmenmillen@hotmail.co.uk', '', 'carmenkev', 'emjR2Vs1cS1JNTrXpcYHM4ZzBwhgRDq60JY', 1, 0, '', '', '', '', '2018-04-07', '', 0, 'female', 'individual'),
(24, 'sanaullah', 'kianisanaullah@gmail.com', '', '123456789', 'lenWJwF8FhNiTFcRwG8pksjaSCExKqN5Fb2', 0, 0, '', '', '', '', '2018-04-10', '', 0, 'male', 'individual'),
(25, 'asf', 'feastorfood@gmail.com', '', 'abc', 'DidhvoKGO32C92oqO5IHTr9J0hWRaJhN1u5', 0, 0, '', '', '', '', '2018-04-11', '', 0, 'male', 'company'),
(26, 'homepa', 'paul@paulhomewood.cm', 'ph-sd.jpg', 'London', 'QjFYzIAi2LMRCFEQq2ICz4LWTZYntsmjL1h', 0, 0, '', '', '', '', '2018-04-11', '', 0, 'male', 'company');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_documents`
--

CREATE TABLE `instructor_documents` (
  `documents_id` int(11) NOT NULL,
  `ins_id` int(10) NOT NULL,
  `cnic_doc` varchar(500) NOT NULL,
  `ins_description` varchar(500) NOT NULL,
  `dba_doc` varchar(500) NOT NULL,
  `insurance_doc` varchar(500) NOT NULL,
  `ins_passrate` int(10) NOT NULL,
  `ins_dataQualified` date NOT NULL,
  `insuranceStatus` varchar(10) NOT NULL,
  `ins_lecense_doc` varchar(500) NOT NULL,
  `recordTimeDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_documents`
--

INSERT INTO `instructor_documents` (`documents_id`, `ins_id`, `cnic_doc`, `ins_description`, `dba_doc`, `insurance_doc`, `ins_passrate`, `ins_dataQualified`, `insuranceStatus`, `ins_lecense_doc`, `recordTimeDate`) VALUES
(2, 10, '&key123456789=2.PNG', 'nothin g', '&key123456789=done.PNG', '&key123456789=26938282_1539137556204945_520597376_o.jpg', 20, '2018-03-28', 'yes', '&key123456789=Capture.PNG', '2018-03-27 10:08:15'),
(3, 11, '&key123456789=26168336_855255091312967_5821318825682454884_n.jpg', 'i am a driver with great experience of driving i have drve car, bus, vehicles in UAE.', '&key123456789=IMG_1415.JPG', '&key123456789=project Update Documented Details.docx', 40, '2018-03-31', 'yes', '&key123456789=water bottles.xlsx', '2018-03-30 10:58:15');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_documents_status`
--

CREATE TABLE `instructor_documents_status` (
  `id` int(11) NOT NULL,
  `doc1_status` int(10) NOT NULL COMMENT 'CNIC Document',
  `doc2_status` int(10) NOT NULL COMMENT 'DBA Document 1 for approved 0 for disapproved',
  `doc3_status` int(10) NOT NULL COMMENT 'Public Liability Insurance Document 1 for approved 0 for disapproved',
  `doc4_status` int(10) NOT NULL COMMENT 'Car License Document',
  `documents_id` int(10) NOT NULL,
  `recordDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_documents_status`
--

INSERT INTO `instructor_documents_status` (`id`, `doc1_status`, `doc2_status`, `doc3_status`, `doc4_status`, `documents_id`, `recordDateTime`) VALUES
(3, 1, 1, 1, 1, 2, '2018-03-27 10:44:37'),
(5, 1, 0, 0, 0, 3, '2018-03-30 12:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_gocard_account`
--

CREATE TABLE `instructor_gocard_account` (
  `gocard_table_id` int(11) NOT NULL,
  `ins_id` int(10) NOT NULL,
  `gocard_ins_id` varchar(50) NOT NULL COMMENT 'this is the customer id returned by the api',
  `gocard_mandate_id` varchar(50) NOT NULL,
  `gocard_sub_id` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `updateDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_gocard_account`
--

INSERT INTO `instructor_gocard_account` (`gocard_table_id`, `ins_id`, `gocard_ins_id`, `gocard_mandate_id`, `gocard_sub_id`, `datetime`, `updateDateTime`) VALUES
(1, 10, 'CU0003CJA0AESP', '', '', '2018-04-04 13:02:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_reviews`
--

CREATE TABLE `instructor_reviews` (
  `review_id` int(11) NOT NULL,
  `ins_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `overall_rating` int(10) NOT NULL,
  `hospitality_rating` int(10) NOT NULL,
  `service_rating` int(10) NOT NULL,
  `review_msg` varchar(500) NOT NULL,
  `recordDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_reviews`
--

INSERT INTO `instructor_reviews` (`review_id`, `ins_id`, `user_id`, `overall_rating`, `hospitality_rating`, `service_rating`, `review_msg`, `recordDateTime`) VALUES
(1, 10, 1, 0, 0, 0, 'Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.', '2018-03-21 18:03:17'),
(2, 10, 1, 0, 0, 0, 'Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.', '2018-03-21 18:03:58'),
(3, 10, 1, 4, 3, 3, 'Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.', '2018-03-21 18:05:50'),
(4, 10, 1, 8, 7, 9, 'Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.', '2018-03-21 18:08:13'),
(5, 10, 1, 10, 7, 5, 'Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.', '2018-03-21 18:19:17'),
(6, 10, 1, 8, 5, 5, 'Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.', '2018-03-26 15:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_stripe_account`
--

CREATE TABLE `instructor_stripe_account` (
  `account_id` int(11) NOT NULL,
  `stripe_ins_account_id` varchar(100) NOT NULL,
  `ins_id` int(10) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_vehicles`
--

CREATE TABLE `instructor_vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `ins_id` int(10) NOT NULL,
  `vehicle_family` varchar(50) NOT NULL,
  `vehicle_model` varchar(50) NOT NULL,
  `vehicle_name` varchar(50) NOT NULL,
  `recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor_vehicles`
--

INSERT INTO `instructor_vehicles` (`vehicle_id`, `ins_id`, `vehicle_family`, `vehicle_model`, `vehicle_name`, `recordDate`) VALUES
(1, 10, 'Corola', '2017', 'mehran', '2018-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `ins_id` varchar(10) NOT NULL,
  `package_name` varchar(30) NOT NULL,
  `package_type` varchar(10) NOT NULL COMMENT '1 for basic, 2 for standard, 3 for premium',
  `package_days` varchar(10) NOT NULL,
  `package_durationHours` varchar(10) NOT NULL,
  `package_amount` varchar(10) NOT NULL,
  `package_description` varchar(250) NOT NULL,
  `recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `ins_id`, `package_name`, `package_type`, `package_days`, `package_durationHours`, `package_amount`, `package_description`, `recordDate`) VALUES
(2, '10', 'New Offer', '2', '7', '3', '30', 'Free offer hiow\r\n', '2018-03-14'),
(3, '10', 'Standard', '2', '1', '3', '90', 'Full Driving', '2018-03-14'),
(4, '11', 'Basic', '1', '6', '2', '90', 'Just driving12', '2018-03-14'),
(5, '11', 'Standard1', '2', '3', '2', '100', 'Standard1', '2018-03-14'),
(7, '11', 'PRemiium 2', '1', '3', '2', '12', 'all you need to leanr hwo to driver', '2018-03-14'),
(8, '10', 'try', '1', '5', '3', '90', 'ksjd', '2018-03-14'),
(9, '10', 'New one offer', '1', '6', '3', '5', 'n', '2018-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `packages_booking`
--

CREATE TABLE `packages_booking` (
  `package_booking_id` int(11) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `package_id` varchar(10) NOT NULL,
  `package_requestStatus` varchar(10) NOT NULL,
  `package_requestDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_booking`
--

INSERT INTO `packages_booking` (`package_booking_id`, `user_id`, `package_id`, `package_requestStatus`, `package_requestDate`) VALUES
(2, '1', '9', '1', '2018-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `packages_events`
--

CREATE TABLE `packages_events` (
  `id` int(11) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `title` text,
  `package_booking_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages_events`
--

INSERT INTO `packages_events` (`id`, `start`, `end`, `title`, `package_booking_id`) VALUES
(1, '2018-03-17 07:30:00', '2018-03-17 08:00:00', 'package', '2'),
(2, '2018-03-18 07:30:00', '2018-03-18 08:00:00', 'package', '2'),
(3, '2018-03-19 07:30:00', '2018-03-19 08:00:00', 'package', '2'),
(4, '2018-03-20 07:30:00', '2018-03-20 08:00:00', 'package', '2'),
(5, '2018-03-21 07:30:00', '2018-03-21 08:00:00', 'package', '2'),
(6, '2018-03-22 07:30:00', '2018-03-22 08:00:00', 'package', '2');

-- --------------------------------------------------------

--
-- Table structure for table `payment_request`
--

CREATE TABLE `payment_request` (
  `payment_id` int(11) NOT NULL,
  `schdule_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_requestStatus` varchar(20) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `payment_modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment_requestDate` date NOT NULL,
  `payment_details` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schdules`
--

CREATE TABLE `schdules` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `title` text,
  `ins_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schdules`
--

INSERT INTO `schdules` (`id`, `start`, `end`, `title`, `ins_id`) VALUES
(11, '2018-03-05 01:00:00', '2018-03-05 02:30:00', 'hello', 10),
(12, '2018-03-16 18:00:00', '2018-03-16 18:30:00', 'assigned', 10),
(13, '2018-03-17 09:00:00', '2018-03-17 09:30:00', 'nith', 10),
(14, '2018-03-20 10:00:00', '2018-03-20 17:30:00', 'meeting', 10),
(15, '2018-04-05 09:00:00', '2018-04-05 09:30:00', 'hello busy day and time slot', 10);

-- --------------------------------------------------------

--
-- Table structure for table `schdules_payments`
--

CREATE TABLE `schdules_payments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `schdule_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `package_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schdules_payments`
--

INSERT INTO `schdules_payments` (`id`, `name`, `email`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `modified`, `schdule_id`, `package_id`) VALUES
(1, 'abdul rehman', 'user123@gmail.com', 4242424242424242, 231, '03', '2019', 'Premium Trail Lesson', 'PS123456', '', 'usd', '55', 'usd', 'txn_1C5B5OLSYXG9qt0BM0DyHUOv', 'succeeded', '2018-03-13 12:14:33', '2018-03-13 12:14:33', '11', ''),
(3, 'abdul rehman', 'user123@gmail.com', 4242424242424242, 201, '09', '2020', 'Premium Trail Lesson', 'PS123456', '100', 'usd', '100', 'usd', 'txn_1C5YrQLSYXG9qt0BmxxqtqgB', 'succeeded', '2018-03-14 13:37:40', '2018-03-14 13:37:40', '', ''),
(4, 'abdul rehman', 'user123@gmail.com', 4242424242424242, 123, '02', '2019', 'Premium Trail Lesson', 'PS123456', '30', 'usd', '30', 'usd', 'txn_1C5Z2ALSYXG9qt0B7NxHUwli', 'succeeded', '2018-03-14 13:48:46', '2018-03-14 13:48:46', '', '2'),
(5, 'ayaz', 'user123@gmail.com', 4242424242424242, 123, '12', '2019', 'Premium Trail Lesson', 'PS123456', '2', 'usd', '2', 'usd', 'txn_1CH8WRLSYXG9qt0BMJ1Oaoyw', 'succeeded', '2018-04-15 10:55:51', '2018-04-15 10:55:51', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_bookings`
--

CREATE TABLE `schedule_bookings` (
  `id` int(11) NOT NULL,
  `ins_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `title` varchar(50) NOT NULL,
  `recordDate` date NOT NULL,
  `approvedStatus` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_bookings`
--

INSERT INTO `schedule_bookings` (`id`, `ins_id`, `user_id`, `start`, `end`, `title`, `recordDate`, `approvedStatus`) VALUES
(6, 10, 1, '2018-03-08 05:30:00', '2018-03-08 06:00:00', 'dkj', '2018-03-05', 2),
(7, 10, 1, '2018-03-08 04:00:00', '2018-03-08 04:30:00', 'abc', '2018-03-05', 2),
(9, 10, 1, '2018-03-07 03:30:00', '2018-03-07 04:00:00', 'need driver', '2018-03-06', 1),
(10, 10, 1, '2018-03-07 06:30:00', '2018-03-07 07:00:00', 'need r', '2018-03-06', 1),
(11, 10, 1, '2018-03-13 17:00:00', '2018-03-13 17:30:00', 'driving', '2018-03-13', 1),
(12, 11, 1, '2018-04-05 03:00:00', '2018-04-05 03:30:00', 'i want this slot', '2018-04-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `verificationLink` varchar(60) NOT NULL,
  `emailVeriStatus` int(11) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `address` varchar(60) NOT NULL,
  `image` varchar(50) NOT NULL,
  `online_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `verificationLink`, `emailVeriStatus`, `date`, `postcode`, `address`, `image`, `online_flag`) VALUES
(1, 'ayaz', 'user123@gmail.com', '123', '47dMFSXiGepNdEB3@GPO@BTNR55wDus_Zn9NW06H2bIdA1Gq(jpKpdO', 1, '2018-02-27', 'bb3', 'Darwen Road, Bolton, UK', 'default.png', 1),
(2, 'jj', 'rehmana57@gmail.com', '123', 'qw3Z6lch6vvFw7NXU-lBhm5FmVpxbO2doOrc-4mrJu9ow5M_-LnRnz$', 0, '2018-02-27', '', '', '', 0),
(3, 'sanaullah', 'kianisanaullah@gmail.com', '123456789', '5EZ(GvLkk*cLzMhWa5PaC*YGkzyzdYXiwPe6e$qyXCdqiugtz-D5(vM', 0, '2018-04-10', '', '', '', 0),
(4, 'Nick', 'mogue@hotmail.co.uk', 'mogue', 'aXNqu4swACHA@ZZQRSOZMC$@xy_7HH$SyHb@LErea2P5#HVLtDE89x4', 0, '2018-04-13', '', '', '', 0),
(5, 'Brian Tuffney', 'brian@bandrenterprises.co.uk', 'Coffeetime123', 'O6tG3-Uz67SB*T3#fq#YBqhyVW4E3QIRW5r$4esbmdNj0Refa87Mzod', 0, '2018-04-14', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `chat_id` int(11) NOT NULL,
  `ins_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `comment` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sendBy` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`chat_id`, `ins_id`, `user_id`, `comment`, `post_time`, `sendBy`) VALUES
(6, '10', '1', 'hui', '2018-03-19 12:23:22', 'user'),
(7, '10', '1', 'hello', '2018-03-19 12:27:46', 'user'),
(8, '10', '1', 'hi', '2018-03-19 12:29:05', 'user'),
(9, '10', '1', 'yes ayaz', '2018-03-19 12:31:44', 'instructor'),
(10, '10', '1', 'how are you', '2018-03-19 12:35:47', 'instructor'),
(11, '10', '1', 'i am good what about you.', '2018-03-19 12:36:56', 'user'),
(12, '10', '1', 'hey i have cancelled you request of schduling.. actually i am busy sorry for that', '2018-03-19 12:39:25', 'instructor'),
(13, '10', '1', 'no problem sir', '2018-03-19 12:41:21', 'user'),
(14, '10', '1', 'hi', '2018-03-19 13:20:24', 'instructor'),
(15, '10', '1', 'are you there?', '2018-03-19 13:22:50', 'user'),
(16, '10', '1', 'yes', '2018-03-19 13:22:57', 'instructor'),
(17, '10', '1', 'ji', '2018-03-19 13:24:44', 'instructor'),
(18, '10', '1', 'hello ins', '2018-03-19 13:26:13', 'user'),
(19, '10', '1', 'hello new try', '2018-03-20 10:17:38', 'instructor'),
(20, '10', '1', 'new try try1', '2018-03-20 10:21:13', 'instructor'),
(21, '10', '1', 'hell', '2018-03-20 10:21:51', 'instructor'),
(22, '10', '1', 'hi 343', '2018-03-20 10:43:03', 'instructor'),
(23, '10', '2', 'hello offiner', '2018-03-20 10:43:29', 'instructor'),
(24, '10', '1', 'ji', '2018-03-20 10:44:26', 'instructor'),
(25, '10', '1', 'hello sir', '2018-03-20 10:55:02', 'instructor'),
(26, '10', '1', 'hey', '2018-03-20 11:01:35', 'instructor'),
(27, '10', '1', 'hi sir', '2018-03-20 12:08:29', 'instructor'),
(28, '10', '1', 'hi', '2018-03-20 12:17:52', 'instructor'),
(29, '10', '2', 'hi', '2018-03-20 12:20:53', 'instructor'),
(30, '10', '1', 'hello', '2018-03-21 07:50:28', 'user'),
(31, '10', '1', 'hi', '2018-03-21 07:54:40', 'user'),
(32, '10', '1', 'hi2', '2018-03-21 07:55:27', 'user'),
(33, '10', '1', 'hi3', '2018-03-21 07:56:06', 'user'),
(34, '10', '1', 'hi4', '2018-03-21 07:57:35', 'user'),
(35, '10', '1', 'hi5', '2018-03-21 07:58:52', 'user'),
(36, '10', '1', 'hi6', '2018-03-21 07:59:53', 'user'),
(37, '10', '1', 'ksf', '2018-03-21 08:01:26', 'user'),
(38, '10', '1', 'hi8', '2018-03-21 08:04:19', 'user'),
(39, '10', '1', 'hi9', '2018-03-21 08:07:30', 'user'),
(40, '10', '1', 'hi10', '2018-03-21 08:08:46', 'user'),
(41, '10', '1', 'hi11', '2018-03-21 08:09:47', 'user'),
(42, '10', '1', 'bb3', '2018-03-21 08:12:49', 'user'),
(43, '10', '1', 'dfgdgiof', '2018-03-21 08:12:57', 'user'),
(44, '10', '1', 'sdfijsd', '2018-03-21 08:13:01', 'user'),
(45, '10', '1', 'sdfkjhfsdj', '2018-03-21 08:13:03', 'user'),
(46, '10', '1', 'neeno', '2018-03-21 08:21:28', 'user'),
(47, '10', '1', 'oj', '2018-03-21 08:50:14', 'user'),
(48, '10', '1', 'huh', '2018-03-21 08:51:10', 'user'),
(49, '10', '1', 'sdfhjs', '2018-03-21 10:05:45', 'user'),
(50, '10', '1', 'jsfh', '2018-03-21 10:05:50', 'user'),
(51, '10', '1', 'j\n', '2018-03-21 10:05:57', 'user'),
(52, '10', '1', 'jkj\n', '2018-03-21 10:25:41', 'user'),
(53, '10', '1', 'fkjf', '2018-03-22 12:54:55', 'user'),
(54, '10', '1', 'fkh', '2018-03-22 12:55:00', 'user'),
(55, '10', '1', 'k', '2018-03-26 06:53:22', 'instructor'),
(56, '10', '1', 'kdfjkf', '2018-03-26 10:09:29', 'instructor'),
(57, '10', '1', 'dfjkfj', '2018-03-26 10:13:01', 'user'),
(58, '10', '1', 'hello', '2018-03-29 04:57:16', 'user'),
(59, '10', '1', 'yes', '2018-03-29 04:57:43', 'instructor'),
(60, '10', '1', 'j', '2018-03-29 05:06:46', 'user'),
(61, '10', '1', 'hi', '2018-03-29 05:15:49', 'user'),
(62, '10', '1', 'hi', '2018-03-29 05:16:11', 'instructor'),
(63, '10', '1', 'hi', '2018-03-29 05:16:43', 'instructor'),
(64, '10', '1', 'dj', '2018-03-29 05:17:06', 'instructor'),
(65, '10', '1', 'ji', '2018-03-29 05:26:46', 'user'),
(66, '10', '1', 'yes', '2018-03-29 05:26:56', 'instructor'),
(67, '10', '1', 'dfg', '2018-03-30 16:05:38', 'instructor'),
(68, '10', '1', 'hell\n', '2018-04-04 12:25:38', 'user'),
(69, '10', '1', 'hi', '2018-04-14 08:41:40', 'user'),
(70, '10', '1', 'hello', '2018-04-15 11:00:24', 'instructor'),
(71, '10', '1', 'hi', '2018-04-15 11:00:58', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_ins_chat`
--
ALTER TABLE `admin_ins_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `admin_learner_chat`
--
ALTER TABLE `admin_learner_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_documents`
--
ALTER TABLE `instructor_documents`
  ADD PRIMARY KEY (`documents_id`);

--
-- Indexes for table `instructor_documents_status`
--
ALTER TABLE `instructor_documents_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor_gocard_account`
--
ALTER TABLE `instructor_gocard_account`
  ADD PRIMARY KEY (`gocard_table_id`);

--
-- Indexes for table `instructor_reviews`
--
ALTER TABLE `instructor_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `instructor_stripe_account`
--
ALTER TABLE `instructor_stripe_account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `instructor_vehicles`
--
ALTER TABLE `instructor_vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `packages_booking`
--
ALTER TABLE `packages_booking`
  ADD PRIMARY KEY (`package_booking_id`);

--
-- Indexes for table `packages_events`
--
ALTER TABLE `packages_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_request`
--
ALTER TABLE `payment_request`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `schdules`
--
ALTER TABLE `schdules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schdules_payments`
--
ALTER TABLE `schdules_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_bookings`
--
ALTER TABLE `schedule_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`chat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_ins_chat`
--
ALTER TABLE `admin_ins_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_learner_chat`
--
ALTER TABLE `admin_learner_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `instructor_documents`
--
ALTER TABLE `instructor_documents`
  MODIFY `documents_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructor_documents_status`
--
ALTER TABLE `instructor_documents_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructor_gocard_account`
--
ALTER TABLE `instructor_gocard_account`
  MODIFY `gocard_table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `instructor_reviews`
--
ALTER TABLE `instructor_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `instructor_stripe_account`
--
ALTER TABLE `instructor_stripe_account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructor_vehicles`
--
ALTER TABLE `instructor_vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages_booking`
--
ALTER TABLE `packages_booking`
  MODIFY `package_booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages_events`
--
ALTER TABLE `packages_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_request`
--
ALTER TABLE `payment_request`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schdules`
--
ALTER TABLE `schdules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `schdules_payments`
--
ALTER TABLE `schdules_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule_bookings`
--
ALTER TABLE `schedule_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
