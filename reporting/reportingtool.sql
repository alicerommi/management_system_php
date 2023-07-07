-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 11:04 AM
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
-- Database: `reportingtool`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionplan`
--

CREATE TABLE `actionplan` (
  `ap_id` int(12) UNSIGNED ZEROFILL NOT NULL,
  `ap_title` varchar(250) NOT NULL,
  `ap_assignedto` varchar(250) NOT NULL,
  `ap_description` varchar(45000) NOT NULL,
  `ap_status` text NOT NULL,
  `ap_DueDate` date NOT NULL,
  `ap_level1DueDate` date NOT NULL,
  `ap_level1Status` varchar(30) NOT NULL,
  `ap_level1requirements` varchar(2000) NOT NULL,
  `ap_level1attachFiles` varchar(5000) NOT NULL,
  `ap_level2DueDate` date NOT NULL,
  `ap_level2Status` varchar(30) NOT NULL,
  `ap_level2requirements` varchar(2000) NOT NULL,
  `ap_level2attachFiles` varchar(5000) NOT NULL,
  `ap_level3DueDate` date NOT NULL,
  `ap_level3Status` varchar(30) NOT NULL,
  `ap_level3requirements` varchar(2000) NOT NULL,
  `ap_level3attachFiles` varchar(3000) NOT NULL,
  `ap_kpiName` varchar(50) NOT NULL,
  `ap_kpibaseValue` varchar(10) NOT NULL,
  `ap_targetValue` varchar(10) NOT NULL,
  `ap_finalValue` varchar(10) NOT NULL,
  `ap_recordDate` date NOT NULL,
  `ap_modifiedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ap_startdate` date NOT NULL,
  `ap_enddate` date NOT NULL,
  `added_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actionplan`
--

INSERT INTO `actionplan` (`ap_id`, `ap_title`, `ap_assignedto`, `ap_description`, `ap_status`, `ap_DueDate`, `ap_level1DueDate`, `ap_level1Status`, `ap_level1requirements`, `ap_level1attachFiles`, `ap_level2DueDate`, `ap_level2Status`, `ap_level2requirements`, `ap_level2attachFiles`, `ap_level3DueDate`, `ap_level3Status`, `ap_level3requirements`, `ap_level3attachFiles`, `ap_kpiName`, `ap_kpibaseValue`, `ap_targetValue`, `ap_finalValue`, `ap_recordDate`, `ap_modifiedDate`, `ap_startdate`, `ap_enddate`, `added_by`) VALUES
(000000000001, 'action plan 1', 'Abdul', 'to execute it', 'in progress', '2018-02-15', '2018-02-21', 'in progress', 'nothing', '&key123456789=attachment_67f434ed5f7ab407d0f576c6373b3e7e.pdf', '2018-02-20', 'in progress', 'wojr o', '&key123456789=ITPM Assignment.docx', '2018-02-27', 'in progress', 'nothing ', '&key123456789=Blackburn With Darwen Restaurants.docx', 'kpi name', '123', '4748', '400', '2018-02-26', '2018-03-16 11:55:15', '0000-00-00', '0000-00-00', 'dealer'),
(000000000002, 'Action 2', 'Abdul', 'Done', 'completed', '2018-03-09', '2018-03-10', 'completed', 're', '&key123456789=', '2018-03-10', 'completed', 're1', '&key123456789=', '2018-03-16', 'completed', 're3', '&key123456789=attachment_ce349532f0cb08a0ce4b632a466f23cc.doc', 'kpiname', '12', '12', '12', '2018-03-09', '2018-03-16 11:55:20', '0000-00-00', '0000-00-00', 'dealer'),
(000000000003, 'action paln', 'Abdul', 'cancel', 'cancelled', '2018-03-10', '2018-03-10', 'in progress', '1', '&key123456789=', '2018-03-10', 'completed', '2', '&key123456789=', '2018-03-10', 'completed', '3', '&key123456789=', 'excu', '23', '23', '3434', '2018-03-09', '2018-03-16 11:55:23', '0000-00-00', '0000-00-00', 'dealer'),
(000000000004, 'AbdulFridy', 'jason', 'none', 'in progress', '2018-03-31', '2018-03-31', 'in progress', 'no', '&key123456789=', '0000-00-00', 'in progress', 'noe2', '&key123456789=', '2018-03-16', 'in progress', 'kn', '&key123456789=', 'hi', '2', '2', '2', '2018-03-16', '2018-03-16 14:42:05', '0000-00-00', '0000-00-00', 'dealer'),
(000000000005, 'AdminAdded Action Plan', 'warner', 'admin', 'in progress', '2018-03-17', '2018-03-17', 'in progress', 'nothing', '&key123456789=file.csv', '2018-03-15', 'completed', 'askdjd', '&key123456789=a.csv', '2018-03-17', 'in progress', 'admin2', '&key123456789=b.csv', 'final', '3', '3', '3', '2018-03-16', '2018-03-16 11:47:56', '0000-00-00', '0000-00-00', 'admin'),
(000000000006, 'Admin2', 'warner', 'nothin', 'in progress', '2018-03-17', '2018-03-17', 'in progress', 'nothing', '&key123456789=a.csv', '2018-03-24', 'completed', 'n', '&key123456789=c.csv', '2018-03-18', 'in progress', 'fkn', '&key123456789=b.csv', '23', '23', '2424', '32234', '2018-03-16', '2018-03-16 11:52:03', '0000-00-00', '0000-00-00', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `admin_name` text NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(001, 'daniel', 'admin@admin.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE `dealers` (
  `dealer_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `dealer_name` text NOT NULL,
  `dealer_email` varchar(250) NOT NULL,
  `dealer_password` varchar(50) NOT NULL,
  `dealer_actionplan` varchar(500) NOT NULL,
  `dealer_status` int(2) NOT NULL DEFAULT '1',
  `dealer_code` varchar(12) NOT NULL,
  `dealer_region` varchar(40) NOT NULL,
  `dealer_address` varchar(40) NOT NULL,
  `dealer_nameOfResponsibePerson` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`dealer_id`, `dealer_name`, `dealer_email`, `dealer_password`, `dealer_actionplan`, `dealer_status`, `dealer_code`, `dealer_region`, `dealer_address`, `dealer_nameOfResponsibePerson`) VALUES
(000001, 'john smith', '', 'john123', '', 1, 'DLR180', 'a', '', ''),
(000002, 'devid miller', '', 'devid123', '', 1, 'DLR124', 'b', '', ''),
(000003, 'sangakara', '', 'sangakara123', '', 1, 'DLR185', 'c', '', ''),
(000004, 'warner', '', 'warner123', '', 1, 'DLR160', 'd', '', ''),
(000005, 'jason gillespi', '', 'jason123', '', 1, 'DLR169', 'f', '', ''),
(000006, 'steve wa', '', 'steve123', '', 1, 'DLR129', 'j', '', ''),
(000007, 'joe roots', '', 'joe123', '', 1, 'DLR192', 'g', '', ''),
(000008, 'razi', 'raziurrehman7@yahoo.com', '123', '', 1, 'DLR142', 'k', '', ''),
(000014, 'Abdul', 'rehmana578@gmail.com', '123', '', 1, 'DLR147', 'new york', '', ''),
(000016, 'aa', 'asif36@gmail.com', '123', '', 1, 'DLR133', 'United State', '', ''),
(000017, 'abbas', 'abbs2@gmail.com', '123', '', 1, 'DLR102', 'pak', 'isb', ''),
(000018, 'Awasi', 'Awi22@gmail.com', '123', '', 1, 'DLR105', 'Dgk', 'Shahzad COlny', 'Vicky');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(11) NOT NULL,
  `imageName` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `imageName`, `date`) VALUES
(1, '333.PNG', '2018-03-08 13:13:29'),
(2, '3.PNG', '2018-03-08 13:14:56'),
(3, 'sam.PNG', '2018-03-09 04:52:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actionplan`
--
ALTER TABLE `actionplan`
  ADD PRIMARY KEY (`ap_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `dealers`
--
ALTER TABLE `dealers`
  ADD PRIMARY KEY (`dealer_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actionplan`
--
ALTER TABLE `actionplan`
  MODIFY `ap_id` int(12) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dealers`
--
ALTER TABLE `dealers`
  MODIFY `dealer_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
