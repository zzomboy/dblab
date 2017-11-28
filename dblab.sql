-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2017 at 03:07 PM
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
(1, 'INTEL Core i7-8700K ', 'intel core i7-8700k.png', 'Socket : LGA1151-v2!CPU Core / Thread : 6/12!Frequency : 3.70 GHz!Turbo : 4.70 GHz!', 13800, 0, 13800, '3y', 'Brand?INTEL!Model?Core i7-8700K!Socket?LGA1151-v2!CPU Core / Thread?6/12!Frequency?3.70 GHz!Turbo?4.70 GHz!CPU Bus?8 GT/s DMI3!Architecture?14nm!Cache L2?12 x 256KB!Cache L3?12MB!Power Peak?95W!', 1, 1),
(10, 'INTEL Core i7-7800X', 'INTEL Core i7-7800X .png', 'CPU Core / Thread 6/12!Frequency 3.5 GHz!Turbo 4.00 GHz!', 13700, 10, 12330, '3y', 'Brand?INTEL!Model?Core i7-7800X!Socket?LGA2066!CPU Core / Thread?6/12!Frequency?3.5 GHz!Turbo?4.00 GHz!CPU Bus?8 GT/s DMI3!Architecture?14nm!Cache L2?6 x 256KB!Cache L3?8.25MB!Power Peak?140W!', 0, 1),
(23, 'NVIDIA GTX 1070Ti', 'NVIDIA GTX 1070Ti .png', 'Model GTX 1070Ti!GPU Model NVIDIA 1000 Series!RAM 8GB!Bus Width 256bit!', 17490, 10, 15741, '3y', 'Brand?NVIDIA!Model?GTX 1070Ti!GPU Model?NVIDIA 1000 Series!Bus Interface?PCI-ex 3.0 16x!Technology?16nm!GPU speed?1607MHz!RAM speed?2002MHz!RAM?8GB!Bus Width?256bit!DirectX?12!Cross Fire / SLI?SLI Ready!Port Connector?Display Port 3 Port!Power?Recommended 600W!Power Connectors?8 Pin!', 1, 3),
(26, 'WESTERN DIGITAL Black 2TB WD2003FZEX ', 'WESTERN DIGITAL Black 2TB WD2003FZEX .jpg', 'Brand Western Digital!Capacity 2TB!Size 3.5!7200 RPM!', 4590, 0, 4590, '5y', 'Brand?Western Digital!Model?Black 2TB WD2003FZEX!Capacity?2TB!Size?3.5!Speed?7200 RPM!Buffer size?64MB!Port?SATA III!', 1, 5),
(27, 'COOLER MASTER MasterBox 5 Black ', 'COOLER MASTER MasterBox 5 Black .jpg', 'Brand COOLER MASTER!Mid Tower!Mini-ITX,Micro-ATX,ATX,E-ATX!Dimension 220mm x 500mm x 475mm!', 2690, 15, 2286.5, '-', 'Brand?COOLER MASTER!Model?MasterBox 5 Black!Mid Tower?Mini-ITX,Micro-ATX,ATX,E-ATX!Material?Plastic,Steel!Dimension?220mm x 500mm x 475mm!Color?Black!Input Connector?USB 3.0 x 2, HD Audio!Weight?7.64kg!Fan Cooling?Front : 120mm / 140mm x2!', 1, 7),
(28, 'ASROCK Z370 Pro4', 'ASROCK Z370 Pro4.png', 'Socket LGA1151-v2!Mainboard Chipsetintel Z370!RAM Slot 4!', 4150, 0, 4150, '3y', 'Brand?ASROCK!Model?Z370 Pro4!Mainboard Chipset?intel Z370!VGA Onboard Chip?Integrated Graphics Processor!Audio Chip?Realtek ALC892 Audio Codec!Expansion Slots?2 Slot PCIe x16 3 Slot PCIe x1 1 Slot PCI!Chipset LAN?Intel I219-V Gigabit LAN!', 1, 2),
(29, 'ASUS VC239H ', 'ASUS VC239H .jpg', 'Brand ASUS!Refresh Rate 60 Hz!Resolution 1920 x 1080!Response Time 5ms!', 4990, 0, 4990, '3y', 'Brand?ASUS!Model?VC239H!Resolution?1920 x 1080!Refresh Rate?60 Hz!Display Size Detail?23.00!Response Time?5ms!VGA Port?1 Port!DVI Port?1 Port!HDMI Port?1 Port!', 1, 4),
(30, 'CORSAIR Vengeance LPX DDR4 8GB 2400 (4GBx2) Black ', 'CORSAIR Vengeance LPX DDR4 8GB 2400 (4GBx2) Black .jpg', 'Brand CORSAIR!DDR4 8GB (4GBx2)!RAM Bus 2400!', 4190, 0, 4190, 'LT', 'Brand?CORSAIR!Model?Vengeance LPX DDR4 8GB 2400 (4GBx2) Black!DDR4?8GB (4GBx2)!RAM Bus?2400!CL Timing?14-16-16-31!', 1, 6),
(31, 'DVD RW SATA 24X LITE-ON iHAS324', 'DVD RW SATA 24X LITE-ON iHAS324.jpg', 'Brand liteon!Buffer Size 2MB!Read Speed 24X!Interface Type Serial ATA!', 445, 0, 445, '1y', 'Brand?liteon!Model?(SATA) DVD RW 24x (Black, BOX) LITE-ON (iHAS324)!Buffer Size?2MB!Interface Type?Serial ATA!Read Speed?24X!DVD-RAM?Support!DVD+R?Support!DVD+R DL?Support!DVD+RW?Support!DVD-R?Support!DVD-R DL?Support!DVD-RW?Support!DVD-RW DL?Support!DVD-ROM?Support!CD-R?Support!CD-RW?Support!CD-ROM?Support!', 1, 8),
(32, 'INTEL Core i5-8600K ', 'INTEL Core i5-8600K .png', 'Socket LGA1151-v2!CPU Core / Thread 6/6!Frequency 3.60 GHz!Turbo 4.30 GHz!', 9800, 0, 9800, '3y', 'Brand?INTEL!Model?Core i5-8600K!Socket?LGA1151-v2!CPU Core / Thread?6/6!Frequency?3.60 GHz!Turbo?4.30 GHz!CPU Bus?8 GT/s DMI3!Architecture?14nm!Cache L2?6 x 256KB!Cache L3?9MB!Power Peak?91W!', 1, 1),
(33, 'INTEL Core i3-8350K ', '20170925-174929_small_i3-K.png', 'Socket LGA1151-v2!CPU Core / Thread 4/4!Frequency 4.00 GHz!', 6490, 0, 6490, '3y', 'Brand?INTEL!Model?Core i3-8350K!Socket?LGA1151-v2!CPU Core / Thread?4/4!Frequency?4.00 GHz!CPU Bus?8 GT/s DMI3!Architecture?14nm!Cache L2?4 x 256KB!Cache L3?8MB!Power Peak?91W!', 1, 1),
(34, 'INTEL Core i3-6100 ', 'core-i3-lga1151.jpg', 'Socket LGA1151!CPU Core / Thread 2/4!Frequency 3.70 GHz!', 3690, 0, 3690, '3y', 'Brand?INTEL!Model?Core i3-6100!Socket?LGA1151!CPU Core / Thread?2/4!Frequency?3.70 GHz!CPU Bus?8 GT/s DMI!Architecture?14nm!Cache L2?2 x 256KB!Cache L3?3MB!Power Peak?47W!', 1, 1),
(35, 'MSI Z370 GAMING M5 ', '20171010-133245_small.png', 'Socket LGA1151-v2!Mainboard Chipset intel Z370!RAM slot 4 / max 64GB!', 8590, 0, 8590, '3y', 'Brand?MSI!Model?Z370 GAMING M5!Socket?LGA1151-v2!CPU Support?Intel 8th Generation Core Processors!Mainboard Chipset?intel Z370!RAM slot?4!Max RAM?64GB!RAM support?Support Dual Channel DDR4 4000(O.C.) / 3866(O.C.) / 3800(O.C.) / 3733(O.C.) / 3666(O.C.) / 3600(O.C.) / 3466(O.C.) / 3400(O.C.) / 3333(O.C.) / 3300(O.C.) / 3200(O.C.) / 3000(O.C.) / 2800(O.C.) / 2666(O.C.) / 2400 / 2133 MHz!VGA Onboard Chip?Integrated Graphics Processor!Audio Chip?Realtek ALC1220 Audio Codec!Port SATA 3?6!M.2 Slot?2!M.2 Supports type?2242/2260/2280/22110!Expansion Slots?3 Slot PCIe x16 3 Slot PCIe x1!Chipset LAN?Killer E2500 10/100/1000Mbps!Port USB 2.0?3 Port!Port USB 3.1?Type-A 3 Port / Type-C 1 Port!HDMI Output?1 Port!Display port?1 Port!Audio Output?5 Port!Port PS2?1 Port!Physical Spec?ATX   24+8 Pin!Size?30.5 x 24.4 cm!', 1, 2),
(36, 'MSI Z370 GAMING PLUS ', '20171118-230505_small.png', 'Socket LGA1151-v2!Mainboard Chipset intel Z370!RAM slot 4 / max 64GB!', 5190, 0, 5190, '3y', 'Brand?MSI!Model?Z370 GAMING PLUS!Socket?LGA1151-v2!CPU Support?Intel 8th Generation Core Processors!Mainboard Chipset?intel Z370!RAM slot?4!Max RAM?64GB!RAM support?Support Dual Channel DDR4 4000(O.C.) / 3866(O.C.) / 3800(O.C.) / 3733(O.C.) / 3666(O.C.) / 3600(O.C.) / 3466(O.C.) / 3400(O.C.) / 3333(O.C.) / 3300(O.C.) / 3200(O.C.) / 3000(O.C.) / 2800(O.C.) / 2666(O.C.) / 2400 / 2133 MHz!VGA Onboard Chip?Integrated Graphics Processor!Audio Chip?Realtek ALC892 Audio Codec!Port SATA 3?6!M.2 Slot?1!M.2 Supports type?2242/2260/2280!Expansion Slots?2 Slot PCIe x16   4 Slot PCIe x1!Chipset LAN?Intel I219-V Gigabit LAN   10/100/1000Mbps!Port USB 2.0?2 Port!Port USB 3.1?Type-A 4 Port!Dsub Output?1 Port!DVI Output?1 Port!Display port?1 Port!Audio Output?6 Port!Port PS2?1 Port!Physical Spec?ATX   24+8 Pin!Size?30.5 x 24.4 cm!', 1, 2),
(37, 'NVIDIA GTX1080Ti ', '20170303-180634_small.png', 'GPU Model NVIDIA 1000 Series!GPU speed 1480MHz!RAM 11GB!', 28990, 0, 28990, '3y', 'Brand?NVIDIA!Model?GTX1080Ti!Chipset?NVIDIA!GPU Model?NVIDIA 1000 Series!GPU Name?GP102!Bus Interface?PCI-ex 3.0 16x!Technology?16nm!GPU speed?1480MHz!RAM speed?1000MHz!RAM?11GB!RAM type?DDR5X!Bus Width?352bit!Shader Model?5.0!Shader Unit?3584!DirectX?12!Cross Fire / SLI?SLI Ready!HDMI Port?1 Port!Display Port?3 Port!Power Recommended?600W!à¸„à¸§à¸²à¸¡à¸ˆà¸¸ RAM 11GB à¸Šà¸™à¸´à¸”à¸‚à¸­à¸‡ RAM DDR5X Bus Width 352bit General Shader Model 5.0 Shader Unit 3584 DirectX 12 à¸£à¸­à¸‡à¸£à¸±à¸š Cross Fire / SLI SLI Ready à¸£à¸­à¸‡à¸£à¸±à¸š 3D Ready Port Connector DSUB Port DVI Port   HDMI Port 1 Port  Mini HDMI Port   Display Port 3 Port  Mini Display port   Power Requirement Power Recommended 600W  Power Connectors?6 Pin + 8 Pin!', 1, 3),
(38, 'MSI GTX1080Ti SEA HAWK X ', '20170601-162200_small.png', 'GPU Model NVIDIA 1000 Series!GPU speed 1544MHz!RAM 11GB!', 33900, 0, 33900, '3y', 'Brand?MSI!Model?GTX1080Ti SEA HAWK X!Chipset?NVIDIA!GPU Model?NVIDIA 1000 Series!GPU Name?GP102!Bus Interface?PCI-ex 3.0 16x!Technology?16nm!GPU speed?1544MHz!RAM speed?1376MHz!RAM?11GB!RAM type?DDR5X!Bus Width?352bit!Shader Model?5.0!Shader Unit?3584!DirectX?12!Cross Fire / SLI?SLI Ready!DVI Port?1 Port!HDMI Port?1 Port!Display Port?3 Port!Power Recommended?600W!Power Connectors?6 Pin + 8 Pin!', 1, 3),
(39, 'LEADTEK Quadro K1200 GDDR5 ', '20170221-144203_small.png', 'GPU Model NVIDIA Quadro!GPU speed 1058MHz!RAM speed 1250MHz!RAM 4GB!', 15690, 0, 15690, '3y', 'Brand?LEADTEK!Model?Quadro K1200 GDDR5!Chipset?NVIDIA!GPU Model?NVIDIA Quadro!GPU Name?GM107!Bus Interface?PCI-ex 2.0 16x!Technology?28nm!GPU speed?1058MHz!RAM speed?1250MHz!RAM?4GB!RAM type?DDR5!Bus Width?128bit!Shader Model?5.0!Shader Unit?512!DirectX?12!Cross Fire / SLI?-!Mini Display port?4 Port!Power Recommended?400W!Power Connectors?-!', 1, 3),
(40, 'LEADTEK Quadro M5000 ', '20170222-112410_61NsBzWj5jL__SL1000_.jpg', 'GPU Model NVIDIA Quadro!GPU speed 861MHz!RAM speed 1653MHz!RAM 8GB!', 70500, 0, 70500, '3y', 'Brand?LEADTEK!Model?Quadro M5000!Chipset?NVIDIA!GPU Model?NVIDIA Quadro!GPU Name?GM204!Bus Interface?PCI-ex 3.0 16x!Technology?28nm!GPU speed?861MHz!RAM speed?1653MHz!RAM?8GB!RAM type?DDR5!Bus Width?256bit!Shader Model?5.0!Shader Unit?2048!DirectX?12!Cross Fire / SLI?SLI Ready!DVI Port?1 Port!Display Port?4 port!Power Recommended?550W!Power Connectors?6 Pin!', 1, 3),
(41, 'DELL S2418H ', '20170607-153030_S2418H.png', 'Resolution 1920 x 1080!Refresh Rate 60 Hz!Display Size Detail 23.80!', 7990, 0, 7990, '3y', 'Brand?DELL!Model?S2418H!Full HD?Yes!Resolution?1920 x 1080!Refresh Rate?60 Hz!Display Size Detail?23.80!VGA Port?1 Port!HDMI Port?2 Port!', 1, 4),
(42, 'ASUS MG248QR 144Hz ', '20170929-134831_small.png', 'Resolution 1920 x 1080!Refresh Rate 144 Hz!Response Time 1ms!', 9590, 0, 9590, '3y', 'Brand?ASUS!Model?MG248QR 144Hz!Full HD?Yes!Resolution?1920 x 1080!Refresh Rate?144 Hz!Display Size Detail?24.00!Response Time?1ms!DVI Port?1 Port!HDMI Port?1 Port!Display Port?1 Port!', 1, 4),
(43, 'SEAGATE BARRACUDA 3TB ', '20170123-230010_barracuda.jpg', 'Capacity 3TB!Harddisk size 3.5!RPM 7200!Buffer size 64MB!', 3490, 0, 3490, '3y', 'Brand?SEAGATE!Model?BARRACUDA 3TB!Capacity?3TB!Harddisk size?3.5!RPM?7200!Buffer size?64MB!Interface Connector?SATA III!', 1, 5),
(44, 'SAMSUNG 850 EVO 250GB ', '850-EVO-250GB-250GB.jpg', 'Capacity 250GB!SSD size 2.5!Read/write speed 540 / 520!', 3350, 0, 3350, '5y', 'Brand?SAMSUNG!Model?850 EVO 250GB!Capacity?250GB!SSD size?2.5!Read/write speed?540 / 520!MaxRandom 4K?Up to 97,000 IOPS/88,000 IOPS!Technology?Samsung MGX Controller!Interface Connector?SATA III!', 1, 5),
(45, 'TEAMGROUP T-Force Night Hawk RGB DDR4 3200 16GB (2x8GB) Black ', '20170821-191837_small.png', 'RAM type DDR4!Capacity 16GB (8GBx2)!RAM Bus 3200!CL Timing 16-18-18-38!', 8990, 0, 8990, 'LT', 'Brand?TEAMGROUP!Model?T-Force Night Hawk RGB DDR4 3200 16GB (2x8GB) Black!RAM type?DDR4!Capacity?16GB (8GBx2)!Voltage?1.35V!RAM Bus?3200!CL Timing?16-18-18-38!', 1, 6),
(46, 'KINGSTON Hyper-X Fury DDR3 8GB 1600 Blue ', 'fury-hyper-x-ddr3-8gb-1600-blue.jpg', 'RAM type DDR3!Capacity 8GB!RAM Bus 1600!CL Timing 9-9-9-27!', 2550, 0, 2550, 'LT', 'Brand?KINGSTON!Model?Hyper-X Fury DDR3 8GB 1600 Blue!RAM type?DDR3!Capacity?8GB!RAM Bus?1600!CL Timing?9-9-9-27!', 1, 6),
(47, 'THERMALTAKE Core P3 SE Red Edition ', '20170922-135624_small.png', 'Support Motherboard   Mini-ITX,Micro-ATX,ATX!Dimension 333mm x 470mm x 512mm!Type   Open Air Chassis!', 3990, 0, 3990, '-', 'Brand?THERMALTAKE!Model?Core P3 SE Red Edition!Type?Open Air Chassis!Support Motherboard?Mini-ITX,Micro-ATX,ATX!Material?Steel!Dimension?333mm x 470mm x 512mm!Color?White & Black!Input Connector?USB 3.0 x 2, USB 2.0 x 2, HD Audio x 1!weight?10.3!Support VGA size?450!Fan Cooling?Side : 3 x 120mm/140mm!', 1, 7),
(48, 'CORSAIR HX750 ', '20170603-144903_small.png', 'Power Supply Type   ATX 12V v2.4 & EPS v2.92!Maximum power 750W!Input power supply 100 - 240 V!', 5290, 0, 5290, '10y', 'Brand?CORSAIR!Model?HX750!Series?HX Series!Power Supply Type?ATX 12V v2.4 & EPS v2.92!Maximum power?750W!Fan Size?1 x 135mm Fan!Power Factor Correction?Active!Mainboard Connector?20+4 Pin!PCI Ex Connector?4 x 6+2-Pin!Sata Connector?8!Can be disconnected?Modular!Power supply?MEET 80 Plus PLATINUM at 115Vac input.!Certification standards?80 PLUS Platinum!Overload protection?FCC/ICES/CE/UL/CUL/CSA/C-Tick/RCM/TUV/CB/CU/KC Mark/RoHS/WEEE/RoHS (China)/REACH!Input power supply?100 - 240 V!Input Frequency Range?47/63 Hz!Hours Usage?>120,000 Hours!Size?150mm x 180mm x 86mm!', 1, 7),
(49, 'SILVERSTONE Strider Titanium ST1100-TI ', '20170907-124728_small.png', 'Power Supply Type   ATX!Maximum power 1100W!Input power supply 90 - 264 V!', 10800, 0, 10800, '5y', 'Brand?SILVERSTONE!Model?Strider Titanium ST1100-TI!Series?Strider Titanium!Power Supply Type?ATX!Maximum power?1100W!Fan Size?1 x 135mm Fan!Power Factor Correction?Active!Mainboard Connector?20+4 Pin!PCI Ex Connector?8 x 6+2-Pin!Sata Connector?16!Can be disconnected?Modular!Power supply?94%!Certification standards?80 PLUS Titanium!Overload protection?OPP, OVP, UVP, OCP, OTP, SCP!Input power supply?90 - 264 V!Input Frequency Range?47/63 Hz!Hours Usage?>100,000 Hours!Size?150mm x 180mm x 86mm!', 1, 7),
(50, 'DVD RW SATA 24X LG GH24NS (B/P)', 'A0032616OK_BIG_1.jpg', 'Read Speed 24x / 24x!Buffer Size 2 Mb!Interface Type S-ATA.!', 485, 0, 485, '1y', 'Brand?LG!Model?(SATA/BP) DVD RW 24x LG#GH24NS (DCOM)!Buffer Size?2 Mb!Interface Type?S-ATA!Read Speed?24x / 24x!DVD-RAM?12x!DVD+R?24x / 24x!DVD+R DL?16x / 12x!DVD+RW?8x / 6x!DVD-R DL?16x / 12x!DVD-RW?8x / 6x!DVD-RW DL?24x / 24x!CD-R?48x / 32x!CD-RW?48x / 32x!', 1, 8),
(51, 'Ext.Slim DVD RW Neo (DV20TBLK (Black)', 'A0092775OK_BIG_1.jpg', 'USB 2.0 / DVD RW Write/Read Speed : 8X!Weight 280g!', 720, 0, 720, '1Y', 'Brand?Neo!Model?DV20TBLK!Interface Type?Support USB 2.0+SATA high speed transfer interface  Support Hot Swappable, Plug & Play!Write Speed?CD-R: 24x  CD-RW: 10x  DVD-R, DVD+R: 8x  DVD-R DL: 6x  DVD+R DL: 6x  DVD-RW, DVD+RW: 8x!Read Speed?CD-R: 24x  CD-RW: 24x  DVD-ROM: 8x  DVD-R, DVD+R: 8x  DVD-RAM: 5x  DVD-R DL: 8x  DVD+R DL: 8x  DVD-RW, DVD+RW: 8x!Operating System?Window 2000/XP/2003/Vista/7/8, Linux, Mac 10 OS!Demension?17mm (H) x 134mm (W) x 138mm (D)!Weight?280g!', 1, 8);

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
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
