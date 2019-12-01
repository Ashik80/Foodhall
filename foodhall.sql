-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 06:59 PM
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
-- Database: `foodhall`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(5) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(1, 'Appetizers'),
(2, 'Main Course'),
(3, 'Dessert'),
(4, 'Beverages');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerid` int(5) NOT NULL,
  `customername` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `customername`, `password`) VALUES
(1, 'Pranto', '2af09f4e45b6b885e09ee7448de01acf'),
(3, 'Sharvi', '098eb8ba2cc924fad0ec05acd869a4eb');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(5) NOT NULL,
  `categoryname` varchar(20) NOT NULL,
  `productname` varchar(150) NOT NULL,
  `price` int(5) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryname`, `productname`, `price`, `photo`) VALUES
(2, 'Appetizers', 'Chicken Curry', 100, 'images2.jpeg'),
(3, 'Main course', 'Chicken Meal', 250, 'Sticky-Tamarind-Chicken-PictureThe-Recipe-Featured-2-395x500.jpg'),
(4, 'Appetizers', 'Chutney Sandwich', 120, 'Bombay-Grilled-Chutney-Sandwich-Featured-PictureTheRecipe-395x500.jpg'),
(6, 'Beverages', 'Cranberry Cocktail', 150, 'Cranberry-Cocktail-Featured-395x500.jpg'),
(7, 'Dessert', 'Chocolate Cake', 180, 'images3.jpeg'),
(8, 'Beverages', 'Coconut Mojito', 140, 'Coconut-Mojito-PictureTheRecipe-com-Featured-395x500.jpg'),
(9, 'Appetizers', 'Chicken cutlets', 120, 'Chicken-Cutlets-by-PictureTheRecipe-Featured-395x500.jpg'),
(10, 'Appetizers', 'Greek Meatball', 150, 'Greek-Meatballs-Featured-PictureTheRecipe-1-395x500.jpg'),
(11, 'Dessert', 'Doughnuts', 150, 'doughnuts.jpeg'),
(12, 'Appetizers', 'Persian Kebab', 150, 'Persian-Chicken-Kebab-Featured-395x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseid` int(5) NOT NULL,
  `itemname` varchar(255) NOT NULL,
  `customer` varchar(150) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `itemname`, `customer`, `quantity`, `total`) VALUES
(52, 'Chicken cutlets', 'Pranto', 2, 240),
(53, 'Chutney Sandwich', 'Pranto', 2, 240),
(54, 'Greek Meatball', 'Pranto', 1, 150),
(243, 'Chicken Curry', 'Sharvi', 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `pdid` int(11) NOT NULL,
  `pdate` varchar(20) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `totalsales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `pdate`, `customername`, `totalsales`) VALUES
(8, 'Nov 27, 2019', 'Pranto', 630);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`) VALUES
(2, 'Ashik', 'c168a2bc673be90e75392d921959237c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
