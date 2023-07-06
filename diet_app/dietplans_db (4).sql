-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 04:07 PM
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
-- Database: `dietplans_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_recordDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_recordDate`) VALUES
(1, 'ADMIN', 'admin@food.com', 'admin123', '2018-06-27 07:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_recordDate` date NOT NULL,
  `category_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_recordDate`, `category_active`) VALUES
(1, 'anc', '2018-06-23', 0),
(3, 'anc', '2018-06-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dietplan`
--

CREATE TABLE `dietplan` (
  `dietplan_id` int(11) NOT NULL,
  `dietplan_name` varchar(50) NOT NULL,
  `dietplan_description` varchar(1000) NOT NULL,
  `dietplan_active` int(10) NOT NULL,
  `dietplan_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dietplan`
--

INSERT INTO `dietplan` (`dietplan_id`, `dietplan_name`, `dietplan_description`, `dietplan_active`, `dietplan_recordDate`) VALUES
(1, 'dietplan1', 'description 1', 1, '2018-06-25'),
(2, 'dietplan2', 'description 2', 1, '2018-06-27'),
(3, 'dietplan3', 'plan 3 description', 1, '2018-07-03'),
(4, 'Dietplan4', 'Plan4 description', 1, '2018-07-04'),
(5, 'plan5', 'plan5 description', 1, '2018-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_recordDate` date NOT NULL,
  `item_active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `category_id`, `item_name`, `item_recordDate`, `item_active`) VALUES
(1, 1, 'abcd', '2018-06-25', 0),
(3, 1, 'abc', '2018-06-25', 1),
(4, 1, 'item2', '2018-06-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_uname` varchar(50) NOT NULL,
  `message_email` varchar(50) NOT NULL,
  `message_msg` varchar(500) NOT NULL,
  `message_recordDate` date NOT NULL,
  `message_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_uname`, `message_email`, `message_msg`, `message_recordDate`, `message_active`) VALUES
(1, 'Abdul Rehman', 'rehmana578@gmail.com', 'skfd', '2018-06-29', 0),
(2, 'Abdul Rehman', 'rehmana578@gmail.com', 'fkf', '2018-06-29', 0),
(3, 'Abdul Rehman', 'rehmana578@gmail.com', 'fk', '2018-06-29', 1),
(4, 'Abdul Rehman', 'rehmana578@gmail.com', 'fk', '2018-06-29', 1),
(5, 'Abdul Rehman', 'rehmana578@gmail.com', 'fk', '2018-06-29', 1),
(6, 'Abdul Rehman', 'rehmana578@gmail.com', 'fk', '2018-06-29', 1),
(7, 'Abdul Rehman', 'rehmana578@gmail.com', 'fk', '2018-06-29', 1),
(8, 'Abdul Rehman', 'rehmana578@gmail.com', 'skj', '2018-06-29', 1),
(9, 'Abdul Rehman', 'rehmana578@gmail.com', 'skj', '2018-06-29', 1),
(10, 'Abdul Rehman', 'rehmana578@gmail.com', 'skj', '2018-06-29', 1),
(11, 'Abdul Rehman', 'rehmana578@gmail.com', 'skj', '2018-06-29', 1),
(12, 'Abdul Rehman', 'rehmana578@gmail.com', 'asdasd', '2018-06-29', 1),
(13, 'Abdul Rehman', 'rehmana578@gmail.com', 'asdasd', '2018-06-29', 1),
(14, 'sefkfj', 'rehmana578@gmail.com', 'kfs', '2018-06-29', 1),
(15, 'dsjk', 'rehmana578@gmail.com', 'sd', '2018-06-29', 1),
(16, 'Abdul Rehman', 'rehmana578@gmail.com', 'edmn', '2018-06-29', 1),
(17, 'Abdul Rehman', 'rehmana578@gmail.com', 'sakj', '2018-06-29', 1),
(18, 'Abdul Rehman', 'rehmana578@gmail.com', 'ksfj', '2018-06-29', 1),
(19, 'Web Scraping, Data mining, Web Developme', 'rehmana578@gmail.com', 'm m m m m m m m m m m m m m', '2018-07-02', 1),
(20, 'Abc', 'rehmana578@gmail.com', 'sdjkn', '2018-07-06', 1),
(21, 'Abdul Rehman', 'rehmana578@gmail.com', 'js', '2018-07-06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plandetail`
--

CREATE TABLE `plandetail` (
  `plandetail_id` int(11) NOT NULL,
  `plandetail_name` varchar(50) NOT NULL,
  `plandetail_description` varchar(5000) NOT NULL,
  `dietplan_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `plandetails_active` int(10) NOT NULL,
  `plandetail_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plandetail`
--

INSERT INTO `plandetail` (`plandetail_id`, `plandetail_name`, `plandetail_description`, `dietplan_id`, `item_id`, `plandetails_active`, `plandetail_recordDate`) VALUES
(3, 'details1', 'nothing', 1, 3, 1, '2018-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `planfilter`
--

CREATE TABLE `planfilter` (
  `planfilter_id` int(11) NOT NULL,
  `item_id` int(10) NOT NULL,
  `dietplan_id` int(10) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `planfilter_recordDate` date NOT NULL,
  `planfilter_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planfilter`
--

INSERT INTO `planfilter` (`planfilter_id`, `item_id`, `dietplan_id`, `flag`, `planfilter_recordDate`, `planfilter_active`) VALUES
(1, 3, 1, 'allowed', '2018-07-03', 1),
(2, 4, 1, 'allowed', '2018-07-03', 1),
(3, 3, 2, 'not allowed', '2018-07-03', 1),
(9, 4, 2, 'cautionary', '2018-07-03', 1),
(10, 3, 3, 'cautionary', '2018-07-03', 1),
(11, 4, 3, 'allowed', '2018-07-03', 1),
(12, 3, 4, 'cautionary', '2018-07-04', 1),
(13, 3, 5, 'cautionary', '2018-07-04', 1),
(14, 4, 4, 'not allowed', '2018-07-04', 1),
(15, 4, 5, 'not allowed', '2018-07-04', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dietplan`
--
ALTER TABLE `dietplan`
  ADD PRIMARY KEY (`dietplan_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `plandetail`
--
ALTER TABLE `plandetail`
  ADD PRIMARY KEY (`plandetail_id`);

--
-- Indexes for table `planfilter`
--
ALTER TABLE `planfilter`
  ADD PRIMARY KEY (`planfilter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dietplan`
--
ALTER TABLE `dietplan`
  MODIFY `dietplan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `plandetail`
--
ALTER TABLE `plandetail`
  MODIFY `plandetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `planfilter`
--
ALTER TABLE `planfilter`
  MODIFY `planfilter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
