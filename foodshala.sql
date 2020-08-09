-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 07:10 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `cid` int(12) NOT NULL,
  `item_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cid`, `item_id`) VALUES
(8, 6, 14),
(9, 6, 18),
(10, 7, 15),
(11, 7, 14),
(12, 8, 18),
(13, 8, 16),
(14, 8, 14),
(15, 9, 14),
(16, 9, 15),
(17, 9, 16),
(20, 6, 19);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(12) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `preference` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `email`, `phone`, `password`, `address`, `preference`) VALUES
(6, 'Rajesh', 'raj@gmail.com', '9459967899', 'raj', ' NIT Warangal', 'Veg'),
(7, 'Vivek', 'viv@gmail.com', '1212343456', 'viv', ' sec 13, Chandigarh', 'Non-Veg'),
(8, 'Subhash', 'subh@gmail.com', '768576476', 'subh', ' NIT Warangal', 'Veg'),
(9, 'Vikas', 'vikas@gmail.com', '67896545', 'vikas123', 'new delhi ', 'Veg');

-- --------------------------------------------------------

--
-- Table structure for table `menu_item`
--

CREATE TABLE `menu_item` (
  `item_id` int(12) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `item_quantity` varchar(30) NOT NULL,
  `item_price` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `r_name` varchar(30) NOT NULL,
  `item_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_item`
--

INSERT INTO `menu_item` (`item_id`, `item_name`, `item_quantity`, `item_price`, `r_id`, `r_name`, `item_image`) VALUES
(14, 'Burger', '1 pc', 60, 5, 'Paradise', 0x6275726765722e6a7067),
(15, 'Veg Sandwich', '1 pc', 50, 5, 'Paradise', 0x73616e642e6a7067),
(16, 'Chicken Lollipop', '8 pc', 300, 6, 'Taj Hotel', 0x636869636b656e2e6a7067),
(17, 'Egg Noodle', '1 plate', 100, 6, 'Taj Hotel', 0x6e6f6f646c652e6a7067),
(18, 'Paneer Dosa', '1 pc', 80, 7, 'BK Restaurant', 0x646f73612e6a7067),
(19, 'Idli', '5 pc', 40, 8, 'FastFood Corner', 0x69646c692e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `o_id` int(12) NOT NULL,
  `c_id` int(12) NOT NULL,
  `item_id` int(12) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`o_id`, `c_id`, `item_id`, `status`) VALUES
(5, 6, 16, 'Delivered'),
(6, 6, 17, 'Delivered'),
(7, 6, 18, 'Undelivered'),
(8, 7, 14, 'Undelivered'),
(9, 7, 15, 'Undelivered'),
(10, 7, 17, 'Delivered'),
(11, 8, 14, 'Undelivered'),
(12, 8, 15, 'Undelivered'),
(13, 8, 16, 'Delivered'),
(14, 8, 17, 'Delivered'),
(15, 8, 18, 'Delivered'),
(16, 6, 14, 'Undelivered'),
(17, 6, 16, 'Undelivered'),
(18, 9, 14, 'Undelivered'),
(19, 9, 15, 'Undelivered'),
(20, 9, 16, 'Undelivered'),
(21, 9, 17, 'Undelivered'),
(22, 9, 18, 'Undelivered'),
(23, 6, 19, 'Undelivered');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(60) NOT NULL,
  `details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rid`, `name`, `email`, `phone`, `password`, `address`, `details`) VALUES
(5, 'Paradise', 'para@gmail.com', '345678345', 'para', '133 Colony, Hyderabad', ' All types of food Available'),
(6, 'Taj Hotel', 'taj@gmail.com', '68654378', 'taj', ' Taj, Mumbai', 'Tasty food'),
(7, 'BK Restaurant', 'bk@gmail.com', '695658978', 'bk', ' bk colony, shimla', ' Fast food available'),
(8, 'FastFood Corner', 'fast@gmail.com', '345678998', 'fastfood', ' near bus stand, chndigarh', ' only fast food');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_item`
--
ALTER TABLE `menu_item`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `o_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
