-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2021 at 05:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `request`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_info` text NOT NULL,
  `stocks` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_category`, `image`, `product_info`, `stocks`, `price`) VALUES
(3, 'DDR4 4GB 2400MHz', 'RAM', 'RAM-KINGSTON-4GB-2400MHZ-FURY-BLK-HX424C15FB4-1.jpg', 'Random Access Memory', 123, 1000),
(5, 'DDR4 8GB 3200MHz', 'RAM', 'kingston_hyperx_fury_8gb_ddr4_3200mhz_rgb_01_l.jpg', 'Random Access Memory', 42, 2500),
(6, '80mm 8cm DC12V Brushless Computer PC Case Cooler Fan', 'Cooling Fan', '6d99cd299f0221ed14499b14c1d51669.jpg', 'Cooling Fan ', 48, 120),
(7, 'Aluminum Laptop Stand', 'Laptop Stand', 'Z21-Aluminum-Alloy-Multi-angle-Adjustable-Laptop-Stand-Notebook-Desktop-Bracket-05082020-01-p.jpg', 'Laptop Stand', 100, 235),
(8, '1 Meter Micro HDMI to HDMI 2.0', 'Cable', 'a649820ef577a06ec1f0460ac4394418.jpg', 'Micro HDMI to HDMI 2.0', 12, 320),
(10, '1 Meter HDMI Extension Cable', 'Cable', 'c21a5dd89de3f50e504cda79a6016e5a.jpg', 'HDMI Extension Cable', 11, 350),
(11, '250GB Solid State Drive', 'SSD', 'ssd.jpg', 'Solid State Drive', 12, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `products` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `date_bought` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`id`, `user`, `products`, `total`, `date_bought`) VALUES
(1, 1, '', '11589', '2021-06-15 04:05:38'),
(2, 1, '', '9', '2021-06-15 10:46:59'),
(3, 3, '', '9', '2021-06-15 10:47:57'),
(4, 0, '', '15655', '2021-06-17 05:34:05'),
(5, 0, '', '6262', '2021-06-17 05:34:45'),
(6, 0, '', '320', '2021-06-19 05:32:53'),
(7, 0, '', '1500', '2021-06-19 10:59:23');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employee_id` int(10) NOT NULL,
  `department` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `issue` varchar(255) NOT NULL,
  `date_issued` datetime DEFAULT NULL,
  `date_resolved` datetime DEFAULT NULL,
  `status_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `email`, `employee_id`, `department`, `subject`, `issue`, `date_issued`, `date_resolved`, `status_update`) VALUES
(1, 'Gerard', 'admin@example.com', 2, 'IT', 'tester', 'tqwrqwrwqqr', '2021-03-27 02:30:34', '2021-03-27 02:31:33', 'Resolved'),
(2, 'Julius', 'julius@sample.com', 609, 'IT', 'Trial', 'This is a trial message', '2021-03-27 08:03:14', '2021-03-27 08:03:28', 'Resolved'),
(3, 'Mark', 'mark@sample.com', 420, 'IT', 'Amber', 'Give me C6 amber', '2021-03-27 08:04:56', '2021-03-27 08:05:33', 'Resolved'),
(4, 'Client test', 'client@sample.com', 1245, 'IT', 'Hardware malfunction/issue', 'There has been a hardware issue that i cannot turn on the computer.', '2021-03-27 08:28:05', '2021-03-27 08:31:23', 'Resolved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
