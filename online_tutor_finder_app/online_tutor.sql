-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 06:39 PM
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
-- Database: `online_tutor`
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
  `admin_recorddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_recorddate`) VALUES
(1, 'admin', 'admin@tutor.com', '123', '2018-05-27 09:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `qual_id` int(11) NOT NULL,
  `qual_name` varchar(50) NOT NULL,
  `qual_recordDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `teacher_id` int(10) NOT NULL COMMENT 'used as a foreign key from teacher table'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`qual_id`, `qual_name`, `qual_recordDate`, `teacher_id`) VALUES
(2, 'MSC(Math)', '2018-06-03 10:42:20', 3),
(3, 'MSC(Chemistry)', '2018-06-03 10:42:28', 3),
(4, 'B.Ed', '2018-06-03 10:42:34', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `student_email` varchar(40) NOT NULL,
  `student_password` varchar(40) NOT NULL,
  `student_accountStatus` int(10) NOT NULL COMMENT '1 accepted 0 for rejected 2 for bloacked 3 for pending ',
  `student_contact` varchar(20) NOT NULL,
  `student_address` varchar(100) NOT NULL,
  `student_image` varchar(100) NOT NULL,
  `student_recordDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_email`, `student_password`, `student_accountStatus`, `student_contact`, `student_address`, `student_image`, `student_recordDate`) VALUES
(1, 'Abdul Rehman', 'rehmana578@gmail.com', '123', 1, '3356050509', '', '', '2018-05-27 21:30:43'),
(3, 'Awais', 'raziurrehman7@yahoo.com', '123', 1, '3356050509', 'G-8/4, Islamabad', '', '2018-05-29 20:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_request`
--

CREATE TABLE `student_request` (
  `srequest_id` int(11) NOT NULL,
  `srequest_std_id` int(10) NOT NULL,
  `srequest_tea_id` int(10) NOT NULL,
  `srequest_status` int(10) NOT NULL COMMENT '1 for accepted 0 for pending 2 for rejected',
  `srequest_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_request`
--

INSERT INTO `student_request` (`srequest_id`, `srequest_std_id`, `srequest_tea_id`, `srequest_status`, `srequest_recordDate`) VALUES
(1, 3, 3, 1, '2018-06-04'),
(2, 3, 3, 2, '2018-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL COMMENT 'use as a foreign key from teacher tabel',
  `subject_name` varchar(50) NOT NULL,
  `subject_class` varchar(50) NOT NULL,
  `subject_recordDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `teacher_id`, `subject_name`, `subject_class`, `subject_recordDate`) VALUES
(3, 3, 'Bio', '9th ', '2018-06-03 15:40:32'),
(4, 3, 'chemistry', '12th', '2018-06-03 15:40:59'),
(5, 3, 'physics', '13th', '2018-06-03 15:41:06'),
(6, 3, 'Math', '16th', '2018-06-03 15:41:58');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(40) NOT NULL,
  `teacher_email` varchar(40) NOT NULL,
  `teacher_password` varchar(40) NOT NULL,
  `teacher_joining_date` date NOT NULL,
  `teacher_account_status` int(11) NOT NULL COMMENT '0 for pending 1 for active 2 for blocked 3 for rejected',
  `teacher_contact` varchar(20) NOT NULL,
  `teacher_address` varchar(50) NOT NULL,
  `teacher_city` varchar(40) NOT NULL,
  `teacher_img` varchar(100) NOT NULL,
  `teacher_age` varchar(10) NOT NULL,
  `teacher_about` varchar(1000) NOT NULL,
  `teacher_recordDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_email`, `teacher_password`, `teacher_joining_date`, `teacher_account_status`, `teacher_contact`, `teacher_address`, `teacher_city`, `teacher_img`, `teacher_age`, `teacher_about`, `teacher_recordDate`) VALUES
(2, 'Abdul Rehman', 'rehmana578@gmail.com', '123', '2018-05-29', 0, '033560505090', 'G-8/4, Islamabad', 'islamabad', '', '20', 'nothing', '2018-05-27 21:16:13'),
(3, 'Abdul Rehman', 'rehma578@gmail.com', '123', '2018-05-24', 1, '03356050509', 'G-8/4, Islamabad', 'islamabad', 'IMG_0042.jpg', '33', 'nothing', '2018-05-28 18:00:46'),
(4, 'Abdul Rehman', 'reha578@gmail.com', '123', '2018-05-29', 2, '0335 6050509', 'G-8/4, Islamabad', 'islamabad', 'IMG_1419.JPG', '33', 'nothing', '2018-05-29 13:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `comment_id` int(11) NOT NULL,
  `comment_uname` varchar(50) NOT NULL,
  `comment_uemail` varchar(50) NOT NULL,
  `comment_msg` varchar(500) NOT NULL,
  `comment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_comments`
--

INSERT INTO `user_comments` (`comment_id`, `comment_uname`, `comment_uemail`, `comment_msg`, `comment_datetime`) VALUES
(2, 'Abdul Rehman', 'user123@gmail.com', 'Testing COmment has been Generating here', '2018-06-07 21:38:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`qual_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_request`
--
ALTER TABLE `student_request`
  ADD PRIMARY KEY (`srequest_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `qual_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `student_request`
--
ALTER TABLE `student_request`
  MODIFY `srequest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_comments`
--
ALTER TABLE `user_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
