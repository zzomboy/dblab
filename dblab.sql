-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2017 at 08:31 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cart_npro` int(11) DEFAULT NULL,
  `cart_ppro` float DEFAULT NULL,
  `pro_pdis` int(11) DEFAULT NULL,
  `cart_cost` float DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `con_subject` text NOT NULL,
  `con_date` datetime NOT NULL,
  `con_check` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pay_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'INTEL Core i7-8700K ', 'intel core i7-8700k.png', 'Socket : LGA1151-v2,\r\nCPU Core / Thread : 6/12,\r\nFrequency : 3.70 GHz,\r\nTurbo : 4.70 GHz', 13800, 0, 13800, '3y', 'Brand:INTEL,\r\nModel:Core i7-8700K,\r\nSocket:LGA1151-v2,\r\nCPU Core / Thread:6/12,\r\nFrequency:3.70 GHz,\r\nTurbo:4.70 GHz,\r\nCPU Bus:8 GT/s DMI3,\r\nArchitecture:14nm,\r\nCache L2:12 x 256KB,\r\nCache L3:12MB,\r\nPower Peak:95W', 1, 1),
(10, 'INTEL Core i7-7800X', 'xxx', 'CPU Core / Thread 6/12,Frequency 3.5 GHz,Turbo 4.00 GHz,', 13700, 0, 13700, '3y', 'Brand:INTEL,Model:Core i7-7800X ,Socket:LGA2066,CPU Core / Thread:6/12,Frequency:3.5 GHz,Turbo:4.00 GHz,CPU Bus:8 GT/s DMI3,Architecture:14nm,Cache L2:6 x 256KB,Cache L3:8.25MB,Power Peak:140W,', 1, 1);

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
(1, 'Mr.', 'Karanpoj Varintaravet', '099999999', 'karanpoj@gmail.com', 'cGFzc3dvcmQ=', 'male', '1996-07-14', 'Karanpoj Varintaravet', '0888888888', '99 Soi Klong Luang 17, Tambon Khlong Nung, Amphoe Khlong Luang, Chang Wat Pathum Thani 12120', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_to` text,
  `order_cost` float NOT NULL,
  `order_pay` int(11) NOT NULL,
  `order_send` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `FK` (`order_id`,`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

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
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
