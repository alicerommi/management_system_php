-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 02:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `save_energy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_image` varchar(500) NOT NULL,
  `admin_recorddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_recorddate`) VALUES
(1, 'Admin', 'admin', 'admin', 'dummy.png', '2018-05-27 09:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `county_id` int(10) NOT NULL,
  `county_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`county_id`, `county_name`) VALUES
(4, 'bedfordshire'),
(5, 'berkshire'),
(6, 'bristol'),
(7, 'buckinghamshire'),
(8, 'cambridgeshire'),
(9, 'cheshire'),
(10, 'cornwall'),
(11, 'county durham'),
(12, 'cumberland'),
(13, 'derbyshire'),
(14, 'devon'),
(15, 'dorset'),
(16, 'essex'),
(17, 'gloucestershire'),
(18, 'hampshire'),
(19, 'herefordshire'),
(20, 'huntingdonshire'),
(21, 'kent'),
(22, 'lancashire'),
(23, 'leicestershire'),
(24, 'lincolnshire'),
(25, 'middlesex'),
(26, 'norfolk'),
(27, 'northamptonshire'),
(28, 'northumberland'),
(29, 'nottinghamshire'),
(30, 'oxfordshire'),
(31, 'rutland'),
(32, 'shropshire'),
(33, 'somerset'),
(34, 'staffordshire'),
(35, 'suffolk'),
(36, 'surrey'),
(37, 'sussex'),
(38, 'warwickshire'),
(39, 'westmorland'),
(40, 'wiltshire'),
(41, 'worcestershire'),
(42, 'yorkshire');

-- --------------------------------------------------------

--
-- Table structure for table `county_with_suppliers`
--

CREATE TABLE `county_with_suppliers` (
  `county_configuration_id` int(10) NOT NULL,
  `county_id` varchar(50) NOT NULL COMMENT 'as a foreign key from the counties table',
  `county_home_rate_per_unit` varchar(10) NOT NULL,
  `county_standing_charges_for_home` varchar(10) NOT NULL,
  `county_business_rate_per_unit` varchar(10) NOT NULL,
  `county_standing_charges_for_business` varchar(10) NOT NULL,
  `county_add_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `county_update_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `county_with_suppliers`
--

INSERT INTO `county_with_suppliers` (`county_configuration_id`, `county_id`, `county_home_rate_per_unit`, `county_standing_charges_for_home`, `county_business_rate_per_unit`, `county_standing_charges_for_business`, `county_add_timestamp`, `county_update_datetime`) VALUES
(2, '5', '223', '2', '223', '2', '2019-11-26 13:27:04', '2019-11-26 19:08:51'),
(3, '4', '223', '2', '223', '2', '2019-11-26 13:27:04', '2019-11-26 19:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `customer_form_filling`
--

CREATE TABLE `customer_form_filling` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(50) NOT NULL,
  `customer_business_or_home` varchar(50) NOT NULL,
  `customer_county` int(10) NOT NULL,
  `customer_energy_soruce_type` varchar(50) NOT NULL COMMENT 'gas or electricity',
  `customer_supplier_id` int(10) NOT NULL,
  `customer_bill_type` varchar(50) NOT NULL,
  `customer_bill_amount` varchar(100) NOT NULL,
  `customer_number_of_units` int(10) NOT NULL,
  `customer_standing_charges` varchar(50) NOT NULL,
  `customer_total_charges` varchar(50) NOT NULL,
  `customer_record_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_form_filling`
--

INSERT INTO `customer_form_filling` (`customer_id`, `customer_name`, `customer_contact`, `customer_business_or_home`, `customer_county`, `customer_energy_soruce_type`, `customer_supplier_id`, `customer_bill_type`, `customer_bill_amount`, `customer_number_of_units`, `customer_standing_charges`, `customer_total_charges`, `customer_record_date`) VALUES
(1, 'dasdad', '2323323333332', 'business', 4, 'electricity', 2, 'monthly', '3600', 256, '7.3', '57095.3', '2019-12-05 18:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `electricity_energy_suppliers`
--

CREATE TABLE `electricity_energy_suppliers` (
  `electricity_provider_id` int(10) NOT NULL,
  `electricity_provider_name` varchar(50) NOT NULL,
  `electricity_provider_description` varchar(5000) NOT NULL,
  `electricity_provider_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electricity_energy_suppliers`
--

INSERT INTO `electricity_energy_suppliers` (`electricity_provider_id`, `electricity_provider_name`, `electricity_provider_description`, `electricity_provider_timestamp`) VALUES
(2, 'affect energy', '<p><br></p>', '2019-11-20 06:33:47'),
(3, 'angelic energy', '<p><br></p>', '2019-11-20 06:34:41'),
(4, 'avid energy', '<p><br></p>', '2019-11-20 06:34:49'),
(5, 'avro energy', '<p><br></p>', '2019-11-20 06:34:53'),
(6, 'beam energy', '<p><br></p>', '2019-11-20 06:34:59'),
(7, 'boost', '<p><br></p>', '2019-11-20 06:35:04'),
(8, 'bristol energy', '<p><br></p>', '2019-11-20 06:35:08'),
(9, 'british gas', '<p><br></p>', '2019-11-20 06:35:13'),
(10, 'bulb', '<p><br></p>', '2019-11-20 06:35:17'),
(11, 'citizen energy', '<p><br></p>', '2019-11-20 06:35:21'),
(12, 'co-operative energy', '<p><br></p>', '2019-11-20 06:35:26'),
(13, 'e', '<p><br></p>', '2019-11-20 06:35:31'),
(14, 'e.on', '<p><br></p>', '2019-11-20 06:35:37'),
(15, 'ebico', '<p><br></p>', '2019-11-20 06:35:43'),
(16, 'economy seven energy', '<p><br></p>', '2019-11-20 06:35:48'),
(17, 'ecotricity', '<p><br></p>', '2019-11-20 06:35:53'),
(18, 'edf energy', '<p><br></p>', '2019-11-20 06:35:57'),
(19, 'energysw', '<p><br></p>', '2019-11-20 06:36:02'),
(20, 'engie', '<p><br></p>', '2019-11-20 06:36:06'),
(21, 'enstroga', '<p><br></p>', '2019-11-20 06:36:11'),
(22, 'entice energy', '<p><br></p>', '2019-11-20 06:36:17'),
(23, 'esb energy', '<p><br></p>', '2019-11-20 06:36:21'),
(24, 'fairerpower', '<p><br></p>', '2019-11-20 06:36:26'),
(25, 'flow energy', '<p><br></p>', '2019-11-20 06:36:32'),
(26, 'fosse energy', '<p><br></p>', '2019-11-20 06:36:36'),
(27, 'foxglove energy', '<p><br></p>', '2019-11-20 06:36:41'),
(28, 'gb energy supply', '<p><br></p>', '2019-11-20 06:36:49'),
(29, 'gnergy', '<p><br></p>', '2019-11-20 06:36:53'),
(30, 'go effortless energy', '<p><br></p>', '2019-11-20 06:37:09'),
(31, 'good energy', '<p><br></p>', '2019-11-20 06:37:14'),
(32, 'goto energy', '<p><br></p>', '2019-11-20 06:37:18'),
(33, 'great north energy', '<p><br></p>', '2019-11-20 06:37:23'),
(34, 'green', '<p><br></p>', '2019-11-20 06:37:27'),
(35, 'green energy (uk) plc', '<p><br></p>', '2019-11-20 06:37:39'),
(36, 'green network energy', '<p><br></p>', '2019-11-20 06:37:44'),
(37, 'green star energy', '<p><br></p>', '2019-11-20 06:37:49'),
(38, 'gulf gas &amp; power uk', '<p><br></p>', '2019-11-20 06:37:57'),
(39, 'igloo energy', '<p><br></p>', '2019-11-20 06:38:04'),
(40, 'isupplyenergy', '<p><br></p>', '2019-11-20 06:38:08'),
(41, 'leccy', '<p><br></p>', '2019-11-20 06:38:12'),
(42, 'm&amp;s energy', '<p><br></p>', '2019-11-20 06:38:21'),
(43, 'moneyplus energy', '<p><br></p>', '2019-11-20 06:38:26'),
(44, 'nabuh energy', '<p><br></p>', '2019-11-20 06:38:31'),
(45, 'northumbria energy', '<p><br></p>', '2019-11-20 06:38:38'),
(46, 'npower', '<p><br></p>', '2019-11-20 06:38:42'),
(47, 'npower select', '<p><br></p>', '2019-11-20 06:38:46'),
(48, 'octopus energy', '<p><br></p>', '2019-11-20 06:38:51'),
(49, 'orbit energy', '<p><br></p>', '2019-11-20 06:38:58'),
(50, 'outfox the market', '<p><br></p>', '2019-11-20 06:39:04'),
(51, 'ovo energy', '<p><br></p>', '2019-11-20 06:39:09'),
(52, 'peterborough energy', '<p><br></p>', '2019-11-20 06:39:14'),
(53, 'pfp energy', '<p><br></p>', '2019-11-20 06:39:18'),
(54, 'powershop', '<p><br></p>', '2019-11-20 06:39:23'),
(55, 'pure planet', '<p><br></p>', '2019-11-20 06:39:28'),
(56, 'qwest energy', '<p><br></p>', '2019-11-20 06:39:33'),
(57, 'ram energy', '<p><br></p>', '2019-11-20 06:39:38'),
(58, 'roar power', '<p><br></p>', '2019-11-20 06:39:50'),
(59, 'robin hood energy', '<p><br></p>', '2019-11-20 06:39:54'),
(60, 'sainsburys energy', '<p><br></p>', '2019-11-20 06:40:09'),
(61, 'scottishpower', '<p><br></p>', '2019-11-20 06:40:15'),
(62, 'shell energy', '<p><br></p>', '2019-11-20 06:40:20'),
(63, 'simplicity energy', '<p><br></p>', '2019-11-20 06:40:24'),
(64, 'so energy', '<p><br></p>', '2019-11-20 06:40:29'),
(65, 'southend energy', '<p><br></p>', '2019-11-20 06:40:33'),
(66, 'spark energy', '<p><br></p>', '2019-11-20 06:40:37'),
(67, 'sse', '<p><br></p>', '2019-11-20 06:40:42'),
(68, 'sse atlantic', '<p><br></p>', '2019-11-20 06:40:48'),
(69, 'sse scottish hydro', '<p><br></p>', '2019-11-20 06:40:54'),
(70, 'sse southern electric', '<p><br></p>', '2019-11-20 06:40:59'),
(71, 'sse swalec', '<p><br></p>', '2019-11-20 06:41:03'),
(72, 'symbio energy', '<p><br></p>', '2019-11-20 06:41:08'),
(73, 'the peoples energy company', '<p><br></p>', '2019-11-20 06:41:19'),
(74, 'together energy', '<p><br></p>', '2019-11-20 06:41:24'),
(75, 'tonik energy', '<p><br></p>', '2019-11-20 06:41:29'),
(76, 'toto energy', '<p><br></p>', '2019-11-20 06:41:35'),
(77, 'twenty energy', '<p><br></p>', '2019-11-20 06:41:43'),
(78, 'utilita', '<p><br></p>', '2019-11-20 06:41:48'),
(79, 'utility point', '<p><br></p>', '2019-11-20 06:41:52'),
(80, 'utility warehouse', '<p><br></p>', '2019-11-20 06:41:57'),
(81, 'wasps energy', '<p><br></p>', '2019-11-20 06:42:02'),
(82, 'white rose energy', '<p><br></p>', '2019-11-20 06:42:06'),
(83, 'wigan warriors energy', '<p><br></p>', '2019-11-20 06:42:11'),
(84, 'yorkshire energy', '<p><br></p>', '2019-11-20 06:42:16'),
(85, 'your energy sussex', '<p><br></p>', '2019-11-20 06:42:23'),
(86, 'sex zebra power', '<p><br></p>', '2019-11-20 06:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `energy_supplier_types`
--

CREATE TABLE `energy_supplier_types` (
  `energy_supplier_type_id` int(10) NOT NULL,
  `energy_supplier_type_name` varchar(50) NOT NULL,
  `energy_supplier_type_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `energy_supplier_type_updated_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `energy_supplier_types`
--

INSERT INTO `energy_supplier_types` (`energy_supplier_type_id`, `energy_supplier_type_name`, `energy_supplier_type_timestamp`, `energy_supplier_type_updated_datetime`) VALUES
(1, 'gas', '2019-11-19 17:11:47', NULL),
(2, 'electricity', '2019-11-20 08:46:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gas_energy_suppliers`
--

CREATE TABLE `gas_energy_suppliers` (
  `energy_supplier_id` int(10) NOT NULL,
  `energy_supplier_name` varchar(50) NOT NULL,
  `energy_supplier_img` varchar(5000) NOT NULL,
  `energy_supplier_description` varchar(5000) NOT NULL,
  `energy_suppliers_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `energy_suppliers_update_timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gas_energy_suppliers`
--

INSERT INTO `gas_energy_suppliers` (`energy_supplier_id`, `energy_supplier_name`, `energy_supplier_img`, `energy_supplier_description`, `energy_suppliers_timestamp`, `energy_suppliers_update_timestamp`) VALUES
(9, 'angelic energy', '', '<p><br></p>', '2019-11-19 18:18:23', NULL),
(10, 'avid energy', '', '<p><br></p>', '2019-11-19 18:21:30', NULL),
(11, 'beam energy', '', '<p><br></p>', '2019-11-19 18:21:43', NULL),
(12, 'better energy', '', '<p><br></p>', '2019-11-19 18:21:49', NULL),
(13, 'bristol energy', '', '<p><br></p>', '2019-11-19 18:21:51', NULL),
(14, 'british gas', '', '<p><br></p>', '2019-11-19 18:21:56', NULL),
(15, 'bulb', '', '<p><br></p>', '2019-11-19 18:21:59', NULL),
(16, 'citizen energy', '', '<p><br></p>', '2019-11-19 18:22:03', NULL),
(17, 'co-operative energy', '', '<p><br></p>', '2019-11-19 18:22:07', NULL),
(18, 'daligas', '', '<p><br></p>', '2019-11-19 18:22:12', NULL),
(19, 'e', '', '<p><br></p>', '2019-11-19 18:22:15', NULL),
(20, 'e.on', '', '<p><br></p>', '2019-11-19 18:22:19', NULL),
(21, 'ebico', '', '<p><br></p>', '2019-11-19 18:22:23', NULL),
(22, 'ecotricity', '', '<p><br></p>', '2019-11-19 18:22:30', NULL),
(23, 'edf energy', '', '<p><br></p>', '2019-11-19 18:22:36', NULL),
(24, 'engie', '', '<p><br></p>', '2019-11-19 18:22:46', NULL),
(25, 'enstroga', '', '<p><br></p>', '2019-11-19 18:22:52', NULL),
(26, 'entice energy', '', '<p><br></p>', '2019-11-19 18:22:56', NULL),
(27, 'esb energy', '', '<p><br></p>', '2019-11-19 18:23:05', NULL),
(28, 'flow energy', '', '<p><br></p>', '2019-11-19 18:23:11', NULL),
(29, 'fosse energy', '', '<p><br></p>', '2019-11-19 18:23:17', NULL),
(30, 'gb energy supply', '', '<p><br></p>', '2019-11-19 18:23:23', NULL),
(31, 'gnergy', '', '<p><br></p>', '2019-11-19 18:23:30', NULL),
(32, 'go effortless energy', '', '<p><br></p>', '2019-11-19 18:23:34', NULL),
(33, 'good energy', '', '<p><br></p>', '2019-11-19 18:23:39', NULL),
(34, 'goto energy', '', '<p><br></p>', '2019-11-19 18:23:49', NULL),
(35, 'great north energy', '', '<p><br></p>', '2019-11-19 18:23:53', NULL),
(36, 'green network energy', '', '<p><br></p>', '2019-11-19 18:23:59', NULL),
(37, 'green star energy', '', '<p><br></p>', '2019-11-19 18:24:10', NULL),
(38, 'gulf gas &amp; power uk', '', '<p><br></p>', '2019-11-19 18:24:21', NULL),
(39, 'igloo energy', '', '<p><br></p>', '2019-11-19 18:24:24', NULL),
(40, 'isupplyenergy', '', '<p><br></p>', '2019-11-19 18:24:29', NULL),
(41, 'leccy', '', '<p><br></p>', '2019-11-19 18:24:42', NULL),
(42, 'northumbria energy', '', '<p><br></p>', '2019-11-19 18:24:46', NULL),
(43, 'npower', '', '<p><br></p>', '2019-11-19 18:24:50', NULL),
(44, 'npower select', '', '<p><br></p>', '2019-11-19 18:24:56', NULL),
(45, 'outfox the market', '', '<p><br></p>', '2019-11-19 18:25:00', NULL),
(46, 'ovo energy', '', '<p><br></p>', '2019-11-19 18:25:04', NULL),
(47, 'pfp energy', '', '<p><br></p>', '2019-11-19 18:25:08', NULL),
(48, 'powershop', '', '<p><br></p>', '2019-11-19 18:25:13', NULL),
(49, 'pure planet', '', '<p><br></p>', '2019-11-19 18:25:18', NULL),
(50, 'qwest energy', '', '<p><br></p>', '2019-11-19 18:25:23', NULL),
(51, 'ram energy', '', '<p><br></p>', '2019-11-19 18:25:27', NULL),
(52, 'roar power', '', '<p><br></p>', '2019-11-19 18:25:31', NULL),
(53, 'robin hood energy', '', '<p><br></p>', '2019-11-19 18:25:35', NULL),
(54, 'sainsbury energy', '', '<p><br></p>', '2019-11-19 18:25:47', NULL),
(55, 'scottishpower', '', '<p><br></p>', '2019-11-19 18:25:51', NULL),
(56, 'shell energy', '', '<p><br></p>', '2019-11-19 18:25:54', NULL),
(57, 'so energy', '', '<p><br></p>', '2019-11-19 18:26:00', NULL),
(58, 'spark energy', '', '<p><br></p>', '2019-11-19 18:26:03', NULL),
(59, 'sse', '', '<p><br></p>', '2019-11-19 18:26:12', NULL),
(60, 'sse atlantic', '', '<p><br></p>', '2019-11-19 18:26:19', NULL),
(61, 'sse scottish hydro', '', '<p><br></p>', '2019-11-19 18:26:23', NULL),
(62, 'sse southern electric', '', '<p><br></p>', '2019-11-19 18:26:27', NULL),
(63, 'sse swalec', '', '<p><br></p>', '2019-11-19 18:26:40', NULL),
(64, 'utilita', '', '<p><br></p>', '2019-11-19 18:26:43', NULL),
(65, 'utility point', '', '<p><br></p>', '2019-11-19 18:26:47', NULL),
(66, 'utility warehouse', '', '<p><br></p>', '2019-11-19 18:26:52', NULL),
(67, 'white rose energy', '', '<p><br></p>', '2019-11-19 18:26:56', NULL),
(68, 'your energy sussex', '', '<p><br></p>', '2019-11-19 18:27:00', NULL),
(69, 'zog energy', '', '<p><br></p>', '2019-11-19 18:27:04', NULL),
(70, 'abc', '', '', '2019-11-24 06:47:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_msgs`
--

CREATE TABLE `users_msgs` (
  `msg_id` int(10) NOT NULL,
  `msg_name` varchar(50) NOT NULL,
  `msg_email` varchar(50) NOT NULL,
  `msg_phone` varchar(50) NOT NULL,
  `msg_content` varchar(500) NOT NULL,
  `msg_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_msgs`
--

INSERT INTO `users_msgs` (`msg_id`, `msg_name`, `msg_email`, `msg_phone`, `msg_content`, `msg_datetime`) VALUES
(1, 'dsdasds', 'rehmana578@gmail.com', 'asdd', 'dggrf', '2019-12-05 18:54:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`county_id`);

--
-- Indexes for table `county_with_suppliers`
--
ALTER TABLE `county_with_suppliers`
  ADD PRIMARY KEY (`county_configuration_id`);

--
-- Indexes for table `customer_form_filling`
--
ALTER TABLE `customer_form_filling`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `electricity_energy_suppliers`
--
ALTER TABLE `electricity_energy_suppliers`
  ADD PRIMARY KEY (`electricity_provider_id`);

--
-- Indexes for table `energy_supplier_types`
--
ALTER TABLE `energy_supplier_types`
  ADD PRIMARY KEY (`energy_supplier_type_id`);

--
-- Indexes for table `gas_energy_suppliers`
--
ALTER TABLE `gas_energy_suppliers`
  ADD PRIMARY KEY (`energy_supplier_id`);

--
-- Indexes for table `users_msgs`
--
ALTER TABLE `users_msgs`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `county_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `county_with_suppliers`
--
ALTER TABLE `county_with_suppliers`
  MODIFY `county_configuration_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `customer_form_filling`
--
ALTER TABLE `customer_form_filling`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `electricity_energy_suppliers`
--
ALTER TABLE `electricity_energy_suppliers`
  MODIFY `electricity_provider_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `energy_supplier_types`
--
ALTER TABLE `energy_supplier_types`
  MODIFY `energy_supplier_type_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gas_energy_suppliers`
--
ALTER TABLE `gas_energy_suppliers`
  MODIFY `energy_supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `users_msgs`
--
ALTER TABLE `users_msgs`
  MODIFY `msg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
