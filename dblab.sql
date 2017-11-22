-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2017 at 03:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblab`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'CPU'),
(2, 'Mainboard'),
(3, 'Graphic card'),
(4, 'Monitor'),
(5, 'HDD & SSD'),
(6, 'RAM'),
(7, 'Case & PSU'),
(8, 'Optical disk drive');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(255) NOT NULL,
  `con_email` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `con_name`, `con_email`, `user_id`) VALUES
(1, 'Test2', 'test2@email.com \r\n', 4),
(9, 'Test1', 'test@email.com', 2),
(13, 'test 00', 'test00@email.com', 0),
(17, 'test 01', 'test01@email.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `mes_id` int(11) NOT NULL,
  `con_id` int(11) NOT NULL,
  `mes_from` int(11) NOT NULL,
  `mes_txt` text NOT NULL,
  `mes_datetime` datetime NOT NULL,
  `mes_check` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`mes_id`, `con_id`, `mes_from`, `mes_txt`, `mes_datetime`, `mes_check`) VALUES
(1, 1, 4, 'first test message', '2017-11-10 15:19:31', 1),
(2, 1, 4, 'second test', '2017-11-10 17:17:09', 1),
(3, 1, 1, 'admin reply 1', '2017-11-10 17:31:09', 1),
(4, 1, 4, 'user reply 1 ********************************************************************************************************************************************************************', '2017-11-10 20:31:47', 1),
(5, 1, 1, 'admin reply 2', '2017-11-10 21:06:14', 1),
(6, 1, 4, 'user reply 2', '2017-11-10 22:03:14', 1),
(8, 1, 4, 'user reply 3', '2017-11-12 19:47:23', 1),
(10, 1, 4, 'user reply 4', '2017-11-12 20:03:57', 1),
(16, 9, 2, 'user2 test1', '2017-11-12 20:15:43', 1),
(18, 9, 2, 'user reply 99999999999999999999999999999999999999999999999999999999999999', '2017-11-12 20:46:17', 1),
(21, 13, 0, 'not member message', '2017-11-12 20:54:03', 1),
(26, 1, 4, 'user reply 5', '2017-11-12 21:07:15', 1),
(27, 17, 0, 'not member message 2', '2017-11-12 23:18:07', 1),
(28, 1, 1, 'admin reply 3', '2017-11-13 00:22:05', 1),
(30, 9, 1, 'admin reply 1', '2017-11-13 00:30:13', 1),
(31, 9, 1, 'admin reply 2', '2017-11-13 00:32:44', 1),
(32, 9, 1, 'admin reply 3', '2017-11-13 01:49:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_pic` varchar(255) NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_price` float NOT NULL,
  `pro_pdis` int(11) NOT NULL,
  `pro_psale` float NOT NULL,
  `pro_warr` varchar(11) NOT NULL,
  `pro_detail` text NOT NULL,
  `pro_avai` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_pic`, `pro_desc`, `pro_price`, `pro_pdis`, `pro_psale`, `pro_warr`, `pro_detail`, `pro_avai`, `cat_id`) VALUES
(1, 'INTEL Core i7-8700K ', 'intel core i7-8700k.png', 'Socket : LGA1151-v2! CPU Core / Thread : 6/12!Frequency : 3.70 GHz!Turbo : 4.70 GHz', 13800, 0, 13800, '3y', 'Brand?INTEL!\r\nModel?Core i7-8700K!\r\nSocket?LGA1151-v2!\r\nCPU Core / Thread?6/12!\r\nFrequency?3.70 GHz!\r\nTurbo?4.70 GHz!\r\nCPU Bus?8 GT/s DMI3!\r\nArchitecture?14nm!\r\nCache L2?12 x 256KB!\r\nCache L3?12MB!\r\nPower Peak?95W!', 1, 1),
(10, 'INTEL Core i7-7800X', 'INTEL Core i7-7800X .png', 'CPU Core / Thread 6/12!Frequency 3.5 GHz!Turbo 4.00 GHz!', 13700, 10, 12330, '3y', 'Brand?INTEL!Model?Core i7-7800X!Socket?LGA2066!CPU Core / Thread?6/12!Frequency?3.5 GHz!Turbo?4.00 GHz!CPU Bus?8 GT/s DMI3!Architecture?14nm!Cache L2?6 x 256KB!Cache L3?8.25MB!Power Peak?140W!', 0, 1),
(23, 'a', 'xxx', '', 100, 20, 80, '5y', '', 1, 3),
(26, 'c', 'xxx', '', 500, 0, 500, '3y', '', 1, 5),
(27, 'b', 'xxx', '', 100, 10, 90, '5y', '', 1, 7),
(28, 'ASROCK Z370 Pro4', 'ASROCK Z370 Pro4.png', 'Socket LGA1151-v2!Mainboard Chipsetintel Z370!RAM Slot 4!', 4150, 0, 4150, '3y', 'Brand?ASROCK!Model?Z370 Pro4!Mainboard Chipset?intel Z370!VGA Onboard Chip?Integrated Graphics Processor!Audio Chip?Realtek ALC892 Audio Codec!Expansion Slots?2 Slot PCIe x16 3 Slot PCIe x1 1 Slot PCI!Chipset LAN?Intel I219-V Gigabit LAN!', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'order receive'),
(2, 'prepare & package'),
(3, 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_title` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_tel` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pw` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_birth` date NOT NULL,
  `user_recip` varchar(255) NOT NULL,
  `user_rtel` varchar(255) NOT NULL,
  `user_addr` text NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_title`, `user_name`, `user_tel`, `user_email`, `user_pw`, `user_gender`, `user_birth`, `user_recip`, `user_rtel`, `user_addr`, `user_type`) VALUES
(1, 'Mr.', 'Karanpoj Varintaravet', '099999999', 'karanpoj@gmail.com', 'cGFzc3dvcmQ=', 'male', '1996-07-14', 'Karanpoj Varintaravet', '0888888888', '99 Soi Klong Luang 17, Tambon Khlong Nung, Amphoe Khlong Luang, Chang Wat Pathum Thani 12120', 'admin'),
(2, 'Mrs.', 'Test1', '0999999999', 'test@email.com', 'cGFzc3dvcmQ=', 'female', '1998-08-04', 'Test1', '0999999999', 'aaaaaaaaaaa', 'member'),
(4, 'Miss', 'Test2', '0888888888', 'test2@email.com', 'cGFzc3dvcmQ=', 'female', '1992-07-03', 'Test2', '0888888888', 'asdf', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_pros` text NOT NULL,
  `order_datetime` datetime DEFAULT NULL,
  `order_to` text,
  `order_cost` float NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_id`, `user_id`, `order_pros`, `order_datetime`, `order_to`, `order_cost`, `status_id`) VALUES
(1, 1, 'b?90?2?180@INTEL Core i7-7800X?12330?1?12330@a?80?5?400@', '2017-11-05 11:16:29', 'Karanpoj Varintaravet^0888888888^99 Soi Klong Luang 17, Tambon Khlong Nung, Amphoe Khlong Luang, Chang Wat Pathum Thani 12120', 12910, 3),
(2, 1, 'INTEL Core i7-8700K ?13800?1?13800@c?500?4?2000@', '2017-11-06 15:38:51', 'Karanpoj Varintaravet^0888888888^99 Soi Klong Luang 17, Tambon Khlong Nung, Amphoe Khlong Luang, Chang Wat Pathum Thani 12120', 15800, 2),
(5, 4, 'INTEL Core i7-7800X?12330?1?12330@', '2017-11-06 21:00:27', 'Test2^0888888888^asdf', 12330, 1),
(6, 4, 'INTEL Core i7-7800X?12330?1?12330@', '2017-11-07 14:20:08', 'Test2^0888888888^asdf', 12330, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`mes_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `mes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
