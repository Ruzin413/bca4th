-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 05:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `itemname`, `price`, `photo`) VALUES
(18, 'admin', 'AMD Ryzen 9 7900X 12-Core, 24-Thread Unlocked Desk', 700, 'cpu7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(12, 'CPU'),
(11, 'GPU'),
(6, 'Keyboard'),
(13, 'monitor'),
(5, 'Mouse'),
(7, 'PC Case'),
(14, 'pendrive'),
(9, 'Power Supply'),
(8, 'RAM'),
(10, 'Storage');

-- --------------------------------------------------------

--
-- Table structure for table `newprod`
--

CREATE TABLE `newprod` (
  `id` int(11) NOT NULL,
  `itemname` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `remarks` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newprod`
--

INSERT INTO `newprod` (`id`, `itemname`, `photo`, `remarks`, `price`, `category`, `quantity`) VALUES
(26, 'M65 RGB ULTRA WIRELESS Tunable FPS Gaming Mouse', 'M65_RGB_ULTRA_WIRELESS_WHT_01.avif', 'Precise movement and responses\r\nNear zero latency ', 230, 'Mouse', 0),
(27, 'SCIMITAR ELITE WIRELESS MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', 'The SCIMITAR ELITE WIRELESS MMO gaming mouse equip', 110, 'Mouse', 878184),
(28, 'M65 RGB ULTRA Tunable FPS Gaming Mouse', 'M65_RGB_ULTRA_WIRELESS_WHT_01.avif', 'Make all your clicks count with the CORSAIR M65 RG', 60, 'Mouse', 0),
(29, 'SCIMITAR RGB ELITE Optical MOBA/MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', '17 fully programmable (remappable) buttons\r\nKey sl', 80, 'Mouse', 0),
(30, 'DARK CORE RGB PRO Wireless Gaming Mouse', 'DARK_CORE4.avif', 'The CORSAIR DARK CORE RGB PRO helps you win withou', 80, 'Mouse', 34),
(31, 'NIGHTSWORD RGB Tunable FPS/MOBA Gaming Mouse', '5NIGHTSWORD.avif', 'The CORSAIR NIGHTSWORD RGB Performance Tunable Gam', 70, 'Mouse', 12),
(32, 'IRONCLAW RGB WIRELESS Gaming Mouse', '6IRONCLAW_RGB_WIRELESS_01.avif', 'The CORSAIR IRONCLAW RGB WIRELESS Gaming Mouse com', 70, 'Mouse', 18),
(33, 'M75 AIR WIRELESS Ultra-Lightweight Gaming Mouse – ', '7M75_AIR_BLACK_RENDER_01.avif', 'Defined in ambition. Built through rigor. M75 AIR ', 100, 'Mouse', 4),
(34, 'KATAR ELITE WIRELESS Gaming Mouse', '8KATAR_ELITE_WIRELESS_01.avif', 'Weighing in at just 69g, the CORSAIR KATAR ELITE W', 70, 'Mouse', 15),
(35, 'NIGHTSABRE WIRELESS RGB Gaming Mouse', '9m.avif', 'Be the last player standing with the CORSAIR NIGHT', 170, 'Mouse', 16),
(36, 'K55 RGB PRO Gaming Keyboard', 'k1.avif', 'The CORSAIR K55 RGB PRO Gaming Keyboard lights up ', 60, 'Keyboard', 6),
(37, 'K70 CORE RGB Mechanical Gaming Keyboard — Steel Gr', 'k2.avif', 'The CORSAIR K70 CORE gaming keyboard empowers your', 80, 'Keyboard', 7),
(38, 'K55 CORE RGB Gaming Keyboard — Gray', 'k3.avif', 'The CORSAIR K55 CORE gaming keyboard puts you on t', 40, 'Keyboard', 0),
(39, 'K70 RGB PRO Mechanical Gaming Keyboard with PBT DO', 'k4.avif', 'Durable aluminum frame with per-key RGB lighting\r\n', 110, 'Keyboard', 13),
(40, 'K70 CORE RGB Mechanical Gaming Keyboard with Palm ', 'k5.avif', 'The CORSAIR K70 CORE gaming keyboard empowers your', 90, 'Keyboard', 5),
(41, 'K70 CORE RGB Mechanical Gaming Keyboard — Carbon G', 'k6.avif', 'The CORSAIR K70 CORE gaming keyboard empowers your', 120, 'Keyboard', 4),
(42, 'K100 RGB Optical-Mechanical Gaming Keyboard — CORS', 'k7.avif', 'Stylish aluminum design with RGB edge\r\n8x faster r', 174, 'Keyboard', 6),
(43, 'K70 RGB TKL CHAMPION SERIES Optical-Mechanical Gam', 'k8.avif', 'Take the CORSAIR K70 RGB TKL Optical-Mechanical Ga', 130, 'Keyboard', 16),
(44, 'K65 PLUS WIRELESS 75% RGB Mechanical Gaming Keyboa', 'k9.avif', 'Stand out from the crowd with superior skill and d', 130, 'Keyboard', 83),
(45, 'K70 PRO MINI WIRELESS 60% Mechanical CHERRY MX Spe', 'k10.avif', 'Hot Swappable Keyswitches\r\nMulti-platform Connecti', 130, 'Keyboard', 5),
(46, 'MP700 PRO SE Hydro X Series 2TB PCIe 5.0 x4 NVMe M', 'm1.avif', 'Experience the outstanding performance of the late', 350, 'Storage', 53),
(47, 'MP700 PRO SE 4TB PCIe 5.0 x4 NVMe M.2 SSD', 'm2.avif', 'Experience the outstanding performance of the late', 624, 'Storage', 35),
(48, 'MP700 PRO 4TB with Air Cooler PCIe Gen5 x4 NVMe 2.', 'm3.avif', 'Experience the performance of PCIe Gen5 storage in', 594, 'Storage', 1),
(49, 'MP700 PRO 4TB Hydro X Series PCIe Gen5 x4 NVMe 2.0', 'm4.avif', 'Experience the performance of PCIe Gen5 storage wi', 590, 'Storage', 8),
(50, 'MP700 PRO 4TB PCIe Gen5 x4 NVMe 2.0 M.2 SSD', 'm5.avif', 'Experience the incredible performance of PCIe Gen5', 574, 'Storage', 9),
(51, 'MP600 ELITE 2TB PCIe Gen4 x4 NVMe 1.4 M.2 SSD with', 'm6.avif', 'The CORSAIR MP600 ELITE provides impressive PCIe 4', 184, 'Storage', 9),
(52, 'MP600 MICRO 1TB PCIe 4.0 (Gen4) x4 NVMe M.2 2242 S', 'm7.avif', 'The CORSAIR MP600 MICRO provides great storage per', 95, 'Storage', 5),
(53, 'CX Series™ Modular CX750M ATX Power Supply — 750 W', 'p1.avif', 'CX Series Modular power supply units are an excell', 90, 'Storage', 8),
(54, ' CX Series™ Modular CX850M ATX Power Supply — 850 ', 'p2.avif', 'CX Series™ Modular power supply units are an excel', 150, 'Power Supply', 9),
(55, 'CX Series™ Modular CX600M ATX Power Supply — 600 W', 'p3.avif', 'CX Series™ Modular power supply units are an excel', 200, 'Power Supply', 6),
(56, 'HXi Series™ HX1200i High-Performance ATX Power Sup', 'p4.avif', 'HXi Series™ power supplies give you extremely tigh', 310, 'Power Supply', 5),
(57, 'AX860 ATX Power Supply — 860 Watt 80 PLUS® PLATINU', 'p5.avif', 'AX Series™ PSUs offer world-class performance, wit', 254, 'Power Supply', 6),
(58, 'VENGEANCE® Series 16GB (1 x 16GB) DDR4 SODIMM 3200', 'ram1.avif', 'Give your DDR4 laptop ultra-fast SODIMM DRAM memor', 40, 'RAM', 65),
(59, 'VENGEANCE® RGB 32GB (2x16GB) DDR5 DRAM 6000MT/s CL', 'ram2.avif', 'Attain top DDR5 RAM performance optimized for AMD®', 124, 'RAM', 60),
(60, 'VENGEANCE® 64GB (2x32GB) DDR5 DRAM 6000MT/s CL40 A', 'ram3.avif', 'Deliver the higher frequencies and greater capacit', 200, 'RAM', 5),
(61, 'DOMINATOR® PLATINUM RGB 64GB (2x32GB) DDR5 DRAM 68', 'ram4.avif', 'Push the limits of performance with CORSAIR DOMINA', 334, 'RAM', 6),
(62, 'Vengeance® — 8GB Dual Channel DDR3 Memory Kit', 'ram5.avif', 'Corsair Vengeance DDR3 memory modules are designed', 50, 'RAM', 7),
(63, 'VENGEANCE® RGB PRO 32GB (2 x 16GB) DDR4 DRAM 3600M', 'ram6.avif', 'CORSAIR VENGEANCE RGB PRO Series DDR4 overclocked ', 82, 'RAM', 7),
(64, 'VENGEANCE® LPX 16GB (2 x 8GB) DDR4 DRAM 3600MHz C1', 'ram7.avif', 'VENGEANCE LPX memory is designed for high-performa', 50, 'RAM', 6),
(65, '4000D AIRFLOW Tempered Glass Mid-Tower ATX Case — ', 'pc1.avif', '#1 case choice for PC builders\r\nFits GPUs under 34', 104, 'PC Case', 7),
(66, '5000D AIRFLOW Tempered Glass Mid-Tower ATX PC Case', 'pc2.avif', 'Easily fits any Nvidia 4000 series or AMD 7000 ser', 174, 'PC Case', 2),
(67, '3000D AIRFLOW Mid-Tower PC Case ', 'pc3.avif', 'The CORSAIR 3000D AIRFLOW presents a mid-tower ATX', 85, 'PC Case', 3),
(68, '6500X Mid-Tower Dual Chamber PC Case - Black', 'pc4.avif', 'The CORSAIR 6500X Mid-Tower Dual Chamber PC Case d', 200, 'PC Case', 1),
(69, '2500X Mid-Tower Dual Chamber PC Case', 'pc5.avif', 'The CORSAIR 2500X Mid-Tower Dual Chamber PC Case d', 160, 'PC Case', 4),
(70, '7000D AIRFLOW Full-Tower ATX PC Case', 'pc6.avif', 'High-airflow steel construction front and roof pan', 267, 'PC Case', 8),
(71, 'Special Edition White Graphite Series™ 600T Mid-To', 'pc7.avif', 'The Special Edition White Graphite Series™ 600T is', 180, 'PC Case', 7),
(72, '2000D AIRFLOW Mini-ITX PC Case - Black', 'pc8.avif', 'The CORSAIR 2000D AIRFLOW is a Mini-ITX small-form', 120, 'PC Case', 12),
(73, 'iCUE 5000X RGB QL Edition Mid-Tower ATX Case — Tru', 'pc9.avif', 'The CORSAIR iCUE 5000X RGB QL Edition Mid-Tower Ca', 350, 'PC Case', 7),
(74, 'MSI Gaming GeForce RTX 4060 Ti 8GB GDRR6 Extreme C', 'gpu1.jpg', 'Chipset: GeForce RTX 4060 Ti\r\nVideo Memory: 8GB GD', 434, 'GPU', 6),
(75, 'MSI Gaming GeForce RTX 4060 Ti 8GB GDRR6 Extreme C', 'gpu2.jpg', 'Chipset: GeForce RTX 4060 Ti\r\nVideo Memory: 8GB GD', 422, 'GPU', 6),
(76, 'MSI Gaming GeForce RTX 4060 Ti 8GB GDRR6 Extreme C', 'gpu3.jpg', 'Chipset: GeForce RTX 4060 Ti\r\nVideo Memory: 8GB GD', 389, 'GPU', 6),
(77, 'MSI Gaming GeForce RTX 4090, 24GB GDRR6X, 384-Bit,', 'gpu4.jpg', 'Chipset: GeForce RTX 4090.Recommended PSU : 850 W.', 1839, 'GPU', 8),
(78, 'MSI Gaming GeForce RTX 4080 16GB GDRR6X 384-Bit HD', 'gpu5.jpg', 'Chipset: GeForce RTX 4080\r\nVideo Memory: 16GB GDDR', 1419, 'GPU', 6),
(79, 'MSI Gaming GeForce RTX 4080 16GB GDRR6X 256-Bit HD', 'gpu6.jpg', 'Chipset: GeForce RTX 4080\r\nVideo Memory: 16GB GDDR', 1169, 'GPU', 23),
(80, 'MSI Gaming Radeon RX 6750 XT 192-bit 12GB GDDR6 DP', 'gpu7.jpg', 'Chipset Radeon RX 6750 XT\r\nVideo Memory: 12GB GDDR', 603, 'GPU', 4),
(81, 'MSI Gaming GeForce RTX 4070 Ti 12GB GDRR6X Extreme', 'gpu8.jpg', 'Chipset: GeForce RTX 4070 Ti\r\nVideo Memory: 12GB G', 781, 'GPU', 12),
(82, 'AMD Ryzen 7 7800X3D 8-Core, 16-Thread Desktop Proc', 'cpu.jpg', 'Processor provides dependable and fast execution o', 278, 'CPU', 43),
(83, 'Intel® Core™ i7-14700K New Gaming Desktop Processo', 'cpu2.jpg', 'Game Without Compromise. Play harder and work smar', 376, 'CPU', 23),
(84, 'AMD Ryzen™ 9 7950X3D 16-Core, 32-Thread Desktop Pr', 'cpu4.jpg', 'The Socket AM5 socket allows processor to be place', 478, 'CPU', 13),
(85, 'Intel Core i5-14500 Desktop Processor 14 cores (6 ', 'cpu5.jpg', '14 cores (6 P-cores + 8 E-cores) and 20 threads\r\nP', 219, 'CPU', 54),
(86, 'Intel Core i9-13900KF Gaming Desktop Processor 24 ', 'cpu6.jpg', 'Stream, create, and compete at the highest levels ', 400, 'CPU', 40),
(87, 'AMD Ryzen 9 7900X 12-Core, 24-Thread Unlocked Desk', 'cpu7.jpg', 'Processor is versatile, reliable, and offers conve', 700, 'CPU', 6),
(96, 'Pendrive', '1.webp', 'this is pendrive\r\n', 43, 'pendrive', 10);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `itemname` varchar(1000) NOT NULL,
  `photo` varchar(10000) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `username`, `itemname`, `photo`, `price`, `quantity`, `Date`) VALUES
(1, 'user', 'MP600 MICRO 1TB PCIe 4.0 (Gen4) x4 NVMe M.2 2242 S', 'm7.avif', 95, 4, '2024-05-28 06:40:52'),
(2, 'user', 'K65 PLUS WIRELESS 75% RGB Mechanical Gaming Keyboa', 'k9.avif', 130, 4, '2024-05-28 06:40:52'),
(3, 'user', 'M65 RGB ULTRA WIRELESS Tunable FPS Gaming Mouse', 'M65_RGB_ULTRA_WIRELESS_WHT_01.avif', 110, 5, '2024-05-28 06:59:16'),
(4, 'user', 'SCIMITAR ELITE WIRELESS MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', 110, 8, '2024-05-28 07:18:54'),
(5, 'user', 'SCIMITAR RGB ELITE Optical MOBA/MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', 80, 10, '2024-05-28 11:24:59'),
(6, 'USER', 'PENDRIVE 3.1', '1.webp', 500, 14, '2024-05-28 18:50:48'),
(7, 'user', '2500X Mid-Tower Dual Chamber PC Case', 'pc5.avif', 160, 5, '2024-05-28 18:53:47'),
(8, 'USER', 'SCIMITAR ELITE WIRELESS MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', 110, 1, '2024-05-29 11:28:35'),
(9, 'USER', 'MP700 PRO 4TB with Air Cooler PCIe Gen5 x4 NVMe 2.', 'm3.avif', 594, 1, '2024-05-29 11:28:35'),
(10, 'USER', 'MP700 PRO 4TB with Air Cooler PCIe Gen5 x4 NVMe 2.', 'm3.avif', 594, 1, '2024-05-29 11:28:35'),
(11, 'USER', 'SCIMITAR ELITE WIRELESS MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', 110, 7, '2024-05-29 11:29:02'),
(12, 'USER', 'K55 CORE RGB Gaming Keyboard — Gray', 'k3.avif', 40, 5, '2024-05-29 11:29:02'),
(16, 'Fisher@123', 'Pendrive', '1.webp', 43, 183, '2024-06-11 14:45:46'),
(17, 'ruzin123', 'SCIMITAR ELITE WIRELESS MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', 110, -824, '2024-06-14 18:42:34'),
(18, 'user', 'Special Edition White Graphite Series™ 600T Mid-To', 'pc7.avif', 180, 1, '2024-07-18 19:24:30'),
(19, 'user ', 'M65 RGB ULTRA WIRELESS Tunable FPS Gaming Mouse', 'M65_RGB_ULTRA_WIRELESS_WHT_01.avif', 230, 7, '2024-10-06 14:52:04'),
(20, 'user ', 'SCIMITAR ELITE WIRELESS MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', 110, -876876, '2024-10-06 14:52:56'),
(21, 'ruzin123', 'SCIMITAR ELITE WIRELESS MMO Gaming Mouse', 'SCIMITAR_ELITE_WIRELESS_01.avif', 110, 6, '2024-10-06 14:59:08'),
(22, 'user', 'K55 CORE RGB Gaming Keyboard — Gray', 'k3.avif', 40, 3, '2024-11-03 11:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `cpassword`, `status`) VALUES
(0, 'admin', 'admin@gmail.com', 'admin', 'admin', 'valid'),
(1, 'ruzin123', 'ruzin123@gmail.com', 'ruzin123', 'ruzin123', 'valid'),
(2, 'Samipgiri', 'samip.giri3@gmail.com', 'Samipgiri', 'Samipgiri', 'valid'),
(3, 'user', 'user123@gmail.com', 'user', 'user', 'valid'),
(27, 'Sanjay', 'Sanjay123@gmail.com', 'Sanjay123', 'Sanjay123', 'valid'),
(29, 'Ruzin413', 'Ruzin413@gmail.com', 'Ruzin413@', 'Ruzin413@', 'valid'),
(30, 'Fisher@123', 'fisher@gmail.com', 'Fisher@123', 'Fisher@123', 'valid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `newprod`
--
ALTER TABLE `newprod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `newprod`
--
ALTER TABLE `newprod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
