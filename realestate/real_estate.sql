-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 08:49 AM
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
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_recordDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_recordDate`) VALUES
(1, 'Asad Rehman', 'asadrehman@gmail.com', 'admin123', '2018-05-25 12:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `com_detail`
--

CREATE TABLE `com_detail` (
  `com_detail_id` int(11) NOT NULL,
  `com_address` varchar(50) NOT NULL,
  `com_contact` varchar(50) NOT NULL,
  `com_email` varchar(50) NOT NULL,
  `com_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `com_detail`
--

INSERT INTO `com_detail` (`com_detail_id`, `com_address`, `com_contact`, `com_email`, `com_recordDate`) VALUES
(1, 'Esmeralda 910, Piso 5 Oficina 2', '5253-8030', 'abc@yahoo.com', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_uname` varchar(40) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_uemail` varchar(40) NOT NULL,
  `contact_msg` varchar(500) NOT NULL,
  `contact_reply` varchar(500) NOT NULL,
  `ans_status` int(11) NOT NULL DEFAULT '0',
  `msg_read` int(10) NOT NULL DEFAULT '0',
  `contact_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_uname`, `contact_phone`, `contact_uemail`, `contact_msg`, `contact_reply`, `ans_status`, `msg_read`, `contact_recordDate`) VALUES
(5, 'Abdul Rehman\r\n			', '', 'rehmana578@gmail.com', 'ksjff', 'Hello', 1, 1, '2018-06-20'),
(6, 'Abdul Rehman\r\n			', '', 'rehmana578@gmail.com', 'dk', 'yes', 1, 0, '2018-06-22'),
(9, 'kjsj', '03346733506', 'rehmana578@gmail.com', 'dkjdf', 'dsfjsgk', 1, 0, '2018-06-28'),
(11, 'Abdul Rehman', '033560450558', 'rehmana578@gmail.com', 'msfnfkjs', '', 0, 0, '2018-06-28');

-- --------------------------------------------------------

--
-- Table structure for table `footersocial_medialinks`
--

CREATE TABLE `footersocial_medialinks` (
  `sm_linkid` int(11) NOT NULL,
  `fb_link` varchar(100) NOT NULL,
  `twitter_link` varchar(100) NOT NULL,
  `gplus_link` varchar(100) NOT NULL,
  `linkedIn_link` varchar(100) NOT NULL,
  `vimeo_link` varchar(100) NOT NULL,
  `instagram_link` varchar(100) NOT NULL,
  `sm_linkrecordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footersocial_medialinks`
--

INSERT INTO `footersocial_medialinks` (`sm_linkid`, `fb_link`, `twitter_link`, `gplus_link`, `linkedIn_link`, `vimeo_link`, `instagram_link`, `sm_linkrecordDate`) VALUES
(1, 'https://facebook.com/', 'https://twitter.com', 'https://twitter.com', 'https://linkedin.com', 'https://linkedin.com', 'https://www.instagram.com/?hl=eni', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `footer_copyrighttext`
--

CREATE TABLE `footer_copyrighttext` (
  `footer_copyrightId` int(11) NOT NULL,
  `footer_copyrightText` varchar(100) NOT NULL,
  `footer_crRecordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_copyrighttext`
--

INSERT INTO `footer_copyrighttext` (`footer_copyrightId`, `footer_copyrightText`, `footer_crRecordDate`) VALUES
(1, '2018. All Right Reserved', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `footer_links`
--

CREATE TABLE `footer_links` (
  `footer_link_id` int(11) NOT NULL,
  `footer_headingtext` varchar(50) NOT NULL,
  `footer_link1` varchar(50) NOT NULL,
  `footer_link2` varchar(50) NOT NULL,
  `footer_link3` varchar(50) NOT NULL,
  `footer_link4` varchar(50) NOT NULL,
  `footer_link5` varchar(50) NOT NULL,
  `footer_links_type` int(11) NOT NULL COMMENT '1 or 2',
  `footer_linkRecordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_links`
--

INSERT INTO `footer_links` (`footer_link_id`, `footer_headingtext`, `footer_link1`, `footer_link2`, `footer_link3`, `footer_link4`, `footer_link5`, `footer_links_type`, `footer_linkRecordDate`) VALUES
(1, 'Recent Property', 'http://qaraad.com/realestate/index.php', 'http://qaraad.com/realestate/index.php', 'http://qaraad.com/realestate/index.php', 'http://qaraad.com/realestate/index.php', 'http://qaraad.com/realestate/index.php', 1, '2018-06-05'),
(2, 'Recent Projects', 'http://qaraad.com/realestate/index.php', 'http://qaraad.com/realestate/index.php', 'http://qaraad.com/realestate/index.php', 'http://qaraad.com/realestate/index.php', 'http://qaraad.com/realestate/index.php', 2, '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `footer_logo`
--

CREATE TABLE `footer_logo` (
  `footer_logo_id` int(11) NOT NULL,
  `footer_logo_image` varchar(100) NOT NULL,
  `footer_logo_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_logo`
--

INSERT INTO `footer_logo` (`footer_logo_id`, `footer_logo_image`, `footer_logo_recordDate`) VALUES
(1, 'logo.png', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `footer_text`
--

CREATE TABLE `footer_text` (
  `footer_text_id` int(11) NOT NULL,
  `footer_text` varchar(200) NOT NULL,
  `footer_text_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer_text`
--

INSERT INTO `footer_text` (`footer_text_id`, `footer_text`, `footer_text_recordDate`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione accusamus sint, officiis inventore ipsam perferendis labore magni reiciendis ipsa, iure in libero amet nemo aspernatur ut obcaecati ne', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `homepage_paragraph`
--

CREATE TABLE `homepage_paragraph` (
  `homepage_pid` int(11) NOT NULL,
  `homepage_p1` varchar(1000) NOT NULL,
  `homepage_p2Heading` varchar(100) NOT NULL,
  `homepage_p2` varchar(1000) NOT NULL,
  `homepage_p2btnText` varchar(15) NOT NULL,
  `homepage_p2btnLink` varchar(50) NOT NULL,
  `homepage_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage_paragraph`
--

INSERT INTO `homepage_paragraph` (`homepage_pid`, `homepage_p1`, `homepage_p2Heading`, `homepage_p2`, `homepage_p2btnText`, `homepage_p2btnLink`, `homepage_recordDate`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus odit quis soluta nemo nesciunt cu', 'ARE YOU LOOKING FOR A HOUSE OR CUSTOMER FOR YOUR PROPERTY SALE?', 'Please click the button for register, we will become your best agent and help you for both.', 'Register Now', 'index.php', '2018-06-05');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_location` varchar(40) NOT NULL,
  `project_desctiption` varchar(1000) NOT NULL,
  `project_services` varchar(500) NOT NULL,
  `project_amenties` varchar(500) NOT NULL,
  `project_info` varchar(1000) NOT NULL,
  `project_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `project_location`, `project_desctiption`, `project_services`, `project_amenties`, `project_info`, `project_recordDate`) VALUES
(1, 'demo2', 'america', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'demo services', 'demo amenties', 'demo project info', '2018-06-06'),
(4, 'dsfklj', 'nkgdnk', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'nkdsnk', 'kjsdkjk', 'nksdfn', '2018-06-20'),
(5, 'dfskj', 'knfsdk', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', 'nkdnfk', 'knsdfkjn', 'nkq', '2018-06-20'),
(6, 'testproject', 'JIJSNDISJNQJIN', 'it is project description testing purpose', 'JINJINQ', 'ODJSI', 'JINDJKFNQ', '2018-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `project_images`
--

CREATE TABLE `project_images` (
  `project_image_id` int(11) NOT NULL,
  `project_image_name` varchar(100) NOT NULL,
  `project_id` int(10) NOT NULL COMMENT 'used as a foreign key from project table',
  `project_image_recordDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_images`
--

INSERT INTO `project_images` (`project_image_id`, `project_image_name`, `project_id`, `project_image_recordDate`) VALUES
(1, '5.jpg', 1, '2018-06-06'),
(2, '6.jpg', 1, '2018-06-06'),
(3, '7.jpg', 1, '2018-06-06'),
(4, 'IMG_20180421_172554.jpg', 6, '2018-07-05'),
(5, 'IMG_20180421_172554.jpg', 6, '2018-07-05'),
(6, 'IMG_20180421_172554.jpg', 6, '2018-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_id` int(11) NOT NULL,
  `property_name` varchar(50) NOT NULL,
  `property_type` varchar(20) NOT NULL,
  `property_status` varchar(50) NOT NULL,
  `property_state1` varchar(50) NOT NULL,
  `property_area` varchar(20) NOT NULL,
  `property_address` varchar(50) NOT NULL,
  `property_floor` varchar(10) NOT NULL,
  `property_typeOfUnit` varchar(20) NOT NULL,
  `property_coveredSurface` varchar(10) NOT NULL,
  `property_totalSurface` varchar(10) NOT NULL,
  `property_antiquity` varchar(10) NOT NULL,
  `property_furnished` varchar(10) NOT NULL,
  `property_price` varchar(20) NOT NULL,
  `property_locationLat` varchar(10) NOT NULL,
  `property_locationLng` varchar(10) NOT NULL,
  `property_orientation` varchar(20) NOT NULL,
  `property_palier` varchar(20) NOT NULL,
  `property_state` varchar(20) NOT NULL,
  `property_office` varchar(20) NOT NULL,
  `property_meetingroom` varchar(50) NOT NULL,
  `property_reception` varchar(50) NOT NULL,
  `property_heating` varchar(10) NOT NULL,
  `property_hotwater` varchar(20) NOT NULL,
  `property_brightness` varchar(20) NOT NULL,
  `property_luminsoity` varchar(20) NOT NULL,
  `propety_floor2` varchar(20) NOT NULL,
  `property_bathrooms` varchar(20) NOT NULL,
  `property_toilete` varchar(10) NOT NULL,
  `property_expenses` varchar(50) NOT NULL,
  `property_abl` varchar(20) NOT NULL,
  `property_aysa` varchar(10) NOT NULL,
  `property_contractDuration` varchar(20) NOT NULL,
  `property_quantityOfFloors` varchar(10) NOT NULL,
  `property_officesOfFloors` varchar(20) NOT NULL,
  `property_surveillance` varchar(10) NOT NULL,
  `property_garage` varchar(10) NOT NULL,
  `property_baulera` varchar(20) NOT NULL,
  `property_recordDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_id`, `property_name`, `property_type`, `property_status`, `property_state1`, `property_area`, `property_address`, `property_floor`, `property_typeOfUnit`, `property_coveredSurface`, `property_totalSurface`, `property_antiquity`, `property_furnished`, `property_price`, `property_locationLat`, `property_locationLng`, `property_orientation`, `property_palier`, `property_state`, `property_office`, `property_meetingroom`, `property_reception`, `property_heating`, `property_hotwater`, `property_brightness`, `property_luminsoity`, `propety_floor2`, `property_bathrooms`, `property_toilete`, `property_expenses`, `property_abl`, `property_aysa`, `property_contractDuration`, `property_quantityOfFloors`, `property_officesOfFloors`, `property_surveillance`, `property_garage`, `property_baulera`, `property_recordDate`) VALUES
(2, 'k', 'Alquiler', 'Reservada', 'dsfkj', 'kjsfk', 'jkasjk', 'jkfjsk', 'jqwkj', 'kjkfjn`', 'knskan', 'knkn', 'k', '$2000', '23', '-99', 'ksdn', 'nknk', 'nkansdk', 'nksdfnk', 'nkdsn', 'kndjkn', 'knfdkj', 'njksnfjk', 'njkdnk', 'njkasfnkj', 'jnksdn', 'knskn', 'knsdkjn', 'kjdnsjk', 'nksfdnk', 'nksdan', 'kn', '2l', '2', '2', '2', '2', '2018-06-22 12:32:02'),
(3, 'abc', 'Venta', 'normal', 'asjsdj', 'jhsdjh', 'jhsdfj', 'hjsdhfj', 'hjsdfjq', 'jhcvbj', 'njsdfnkjn', 'kjndskjn', 'kjnsdfjknk', 'U$Dkjnsdfjkn', 'sdfjf', 'kjnsf', 'kjnsdfjkn', 'kjnsdfjknk', 'jnsfjkdn', 'knsdfknk', 'nsdkjn', 'knfdskn', 'knsdfkjn', 'kjnsdfkjn', 'nksdfjnk', 'kjnsdfkjnk', 'nksdfnk', 'nksdfnk', 'nksdfnk', 'nkfnsdk', 'nknfskn', 'knknwek', 'nknweknwe', 'sdjskdfjh', 'ksdnfkn', 'knsdfkn', 'knsdfkn', 'kndfskndf', '2018-07-05 12:24:00'),
(4, 'test1', 'Venta', 'Reservada', 'ksfj', 'knsdfjknkj', 'nqjkfn`jk', 'nfjn`jk', 'nfjksn`k', 'jnfjkn', 'jknfkjn', 'kjnfkjn`', 'kjnwfjkn', 'U$Dknkn', 'sdkfj', 'nkfds', 'nksdfjnk', 'nksdfnsk', 'nkjdnsk', 'nkjfdnjk', 'njkdnsjk', 'nkdnsfk', 'nkndfskj', 'nqkdnsk', 'nfkn', 'nkgnkj', 'kngdksn', 'kngjknq', 'kwngk', 'nkwngknkewfnqj', 'knsdkn', 'kndsgjknKQ', 'KRENEWK', 'kdfj`', 'kjqknfksn', 'knkdfnkqnw', 'qndgksn', 'kndg', '2018-07-05 12:28:39'),
(6, 'Test property2', 'Venta', 'Reservada', 'sdfjk', 'kdnsjk', 'njkfnjk', 'njsdnfj', 'njsdnj', 'njsdfnj', 'njfnj', 'njnj', 'njdfnj', 'U$D2', 'sdfnj', 'njsn', 'sdfnj', 'nsdfjn', 'jnsj', 'njsnfj', 'njfnj', 'njsfnj', 'njfnj', 'njfsdn', 'jnjsdfn', 'jnsjdfn', 'jnsdfjn', 'jnsfjn', 'jnfsjn', 'jnfsjn', 'jnaafsjn', 'jnsfj', 'njnsfa', '2', 'sdfjn', 'jnfjn', 'jnjfsn', 'jn', '2018-07-05 13:49:49'),
(7, 'property3', 'Venta', 'Vendida', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'U$Dabc', 'dsfkj', 'kjnsf', 'jinsdfij', 'njisdfnji', 'njisdvnij', 'njisdfnji', 'njisdfni', 'jnsdifn', 'insdvin', 'indfsij', 'nifdn', 'nisfndi', 'inasfin', 'insfaji', 'nisfnji', 'njisfnj', 'nfjs', 'jbsfj', 'bjfsdbj', 'sdfjn', 'nsfjin', 'jnsfjkdn', 'jksdfk', 'bffsb', '2018-07-05 15:10:16'),
(8, 'property3', 'Venta', 'Vendida', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'abc', 'U$Dabc', 'dsfkj', 'kjnsf', 'jinsdfij', 'njisdfnji', 'njisdvnij', 'njisdfnji', 'njisdfni', 'jnsdifn', 'insdvin', 'indfsij', 'nifdn', 'nisfndi', 'inasfin', 'insfaji', 'nisfnji', 'njisfnj', 'nfjs', 'jbsfj', 'bjfsdbj', 'sdfjn', 'nsfjin', 'jnsfjkdn', 'jksdfk', 'bffsb', '2018-07-05 15:10:48'),
(9, 'property4 test', 'Alquiler', 'Reservada', 'sdkjn', 'knsdfjkn', 'kjnsdfkjn', 'kjnsdfjk', 'njvnxj', 'njsdfnj', 'njsdfnj', 'nfjn', 'jnsfjn', 'U$Djnf', 'dfkjh', 'kjnfj', 'jnfjn', 'jnsdfjn', 'jsdnfj', 'njsfdn', 'jbasfjb', 'jbsvjb', 'jbsfjb', 'jbfjb', 'jbsjdfbjbjdfs', 'jbsdfjb', 'jsbdfjb`j', 'sjfbj', 'bjsfbj', 'bsjfb', 'jbsfjb', 'jbsfj', 'bjwfb', 'dfskj', 'fsj', 'bjsfbj', 'qbjdsb', 'sjb', '2018-07-05 15:11:30'),
(10, 'propeety test2', 'Alquiler', 'normal', 'dfkj', 'kdfn', 'jnfdjn', 'jndfjn', 'jnsfdjn', 'jnfjn', 'jnsfjn', 'jndfjnJNJ', 'JSFDNJ', 'U$DB', 'FDJJD', 'fdjds', 'jdfhj', 'hjsdf', 'dfkjk', 'jsdnj', 'njkfnjk', 'njsfnj', 'njnfsj', 'njdfnj', 'bjbfj', 'njsdnj', 'bjdfbsj', 'bjdfbj', 'njsdfbj', 'bjsfdbj', 'bjsdfbj', 'bjfbj', 'bfsdjb', 'dfsjb', 'jsdfn', 'jknsdfjkn', 'kjnsdfkjn', 'jkndfs', '2018-07-05 15:19:29'),
(11, 'testpropery5', 'Alquiler', 'normal', 'dfjsnjk', 'njksdfn', 'jnsjdfn', 'jnjdn', 'jnjdnj', 'njdsgnj', 'ndjn', 'jnsdfjn', 'jndfjsn', 'U$Djndsj', 'dsfjj', 'hsdfj', 'jhsdfjh', 'jhsfdsj', 'hjsdfhj', 'hsdfjh', 'jkhsdfjkh', 'jkfhjk', 'hjksdhk', 'jhksdjh', 'jkhdsjkh', 'hddsjh', 'jkhsdfj', 'hksfjdh', 'kjhfdskj', 'hkjsdfhkj', 'hsdkfjhq', 'kjhfdskjh', 'ksjdfhk', 'sdfjsdfkjh', 'kjhsdfkj', 'hkjsdhkj', 'hkjsdhk', 'qhkfhfkj', '2018-07-05 15:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

CREATE TABLE `property_image` (
  `property_image_id` int(11) NOT NULL,
  `property_id` int(10) NOT NULL COMMENT 'used as a foreign key from property table',
  `property_image` varchar(100) NOT NULL,
  `property_image_recordDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_image`
--

INSERT INTO `property_image` (`property_image_id`, `property_id`, `property_image`, `property_image_recordDate`) VALUES
(1, 1, '26234682_548561995479785_541327681_n.jpg', '2018-06-04 13:01:03'),
(2, 1, 'IMG_20180421_172554.jpg', '2018-06-22 12:22:06'),
(3, 2, 'IMG_20180421_172554.jpg', '2018-06-22 12:24:21'),
(4, 2, 'IMG_20180421_172554.jpg', '2018-06-22 12:31:28'),
(5, 3, 'IMG_20180421_172554.jpg', '2018-07-05 12:11:40'),
(6, 4, 'company.png', '2018-07-05 12:28:06'),
(7, 5, 'company.png', '2018-07-05 12:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `simage_id` int(11) NOT NULL,
  `simage_name` varchar(500) NOT NULL,
  `simage_description` varchar(500) NOT NULL,
  `s_image_recordDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`simage_id`, `simage_name`, `simage_description`, `s_image_recordDate`) VALUES
(10, '3.jpg ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', '2018-06-06 09:56:27'),
(11, '1.jpg ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters', '2018-06-06 14:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip`, `date`) VALUES
(1, '::1', '2018-06-20'),
(2, '::1', '2018-06-22'),
(3, '::1', '2018-06-25'),
(4, '::1', '2018-06-28'),
(5, '::1', '2018-06-30'),
(6, '::1', '2018-07-05'),
(7, '::1', '2018-07-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `com_detail`
--
ALTER TABLE `com_detail`
  ADD PRIMARY KEY (`com_detail_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `footersocial_medialinks`
--
ALTER TABLE `footersocial_medialinks`
  ADD PRIMARY KEY (`sm_linkid`);

--
-- Indexes for table `footer_copyrighttext`
--
ALTER TABLE `footer_copyrighttext`
  ADD PRIMARY KEY (`footer_copyrightId`);

--
-- Indexes for table `footer_links`
--
ALTER TABLE `footer_links`
  ADD PRIMARY KEY (`footer_link_id`);

--
-- Indexes for table `footer_logo`
--
ALTER TABLE `footer_logo`
  ADD PRIMARY KEY (`footer_logo_id`);

--
-- Indexes for table `footer_text`
--
ALTER TABLE `footer_text`
  ADD PRIMARY KEY (`footer_text_id`);

--
-- Indexes for table `homepage_paragraph`
--
ALTER TABLE `homepage_paragraph`
  ADD PRIMARY KEY (`homepage_pid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_images`
--
ALTER TABLE `project_images`
  ADD PRIMARY KEY (`project_image_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `property_image`
--
ALTER TABLE `property_image`
  ADD PRIMARY KEY (`property_image_id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`simage_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `com_detail`
--
ALTER TABLE `com_detail`
  MODIFY `com_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `footersocial_medialinks`
--
ALTER TABLE `footersocial_medialinks`
  MODIFY `sm_linkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `footer_copyrighttext`
--
ALTER TABLE `footer_copyrighttext`
  MODIFY `footer_copyrightId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `footer_links`
--
ALTER TABLE `footer_links`
  MODIFY `footer_link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `footer_logo`
--
ALTER TABLE `footer_logo`
  MODIFY `footer_logo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `footer_text`
--
ALTER TABLE `footer_text`
  MODIFY `footer_text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `homepage_paragraph`
--
ALTER TABLE `homepage_paragraph`
  MODIFY `homepage_pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `project_images`
--
ALTER TABLE `project_images`
  MODIFY `project_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `property_image`
--
ALTER TABLE `property_image`
  MODIFY `property_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `simage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
