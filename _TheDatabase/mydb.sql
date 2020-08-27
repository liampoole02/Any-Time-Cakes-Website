-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2020 at 07:45 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`) VALUES
(1, 'Liam Poole', 'liampoole02@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `cake`
--

CREATE TABLE `cake` (
  `CakeID` int(11) NOT NULL,
  `CakeName` varchar(45) DEFAULT NULL,
  `CakePrice` decimal(10,2) DEFAULT NULL,
  `CakeDesc` varchar(300) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `CakeImage1` varchar(30) DEFAULT NULL,
  `CakeImage2` varchar(45) DEFAULT NULL,
  `CakeImage3` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cake`
--

INSERT INTO `cake` (`CakeID`, `CakeName`, `CakePrice`, `CakeDesc`, `CategoryID`, `CakeImage1`, `CakeImage2`, `CakeImage3`) VALUES
(4, 'Milk Tart', '55.00', '<p>Custard on dough filling with cinnamon</p>', 5, 'IMG-20200809-WA0017.jpg', 'IMG-20200813-WA0028.jpg', 'IMG-20200809-WA0017.jpg'),
(6, 'Chocolate cake', '85.00', 'Chocolate cake with mousse topping', 2, 'IMG-20200809-WA0019.jpg', 'IMG-20200809-WA0019.jpg', 'IMG-20200809-WA0019.jpg'),
(7, 'Flake cake', '550.00', 'Cake with flake border with strawberry topping', 3, 'IMG-20200809-WA0020.jpg', 'IMG-20200809-WA0020.jpg', 'IMG-20200809-WA0020.jpg'),
(9, 'Cup cakes (50)', '200.00', 'Cup cakes with various toppings and decorations', 1, 'IMG-20200809-WA0015.jpg', 'IMG-20200809-WA0009.jpg', 'IMG-20200809-WA0003.jpg'),
(10, 'Ferrero Roche', '650.00', 'Chocolate Cake with Ferrero Roche Topping', 3, 'IMG-20200809-WA0021.jpg', 'IMG-20200809-WA0021.jpg', 'IMG-20200809-WA0021.jpg'),
(11, 'KitKat chocolate cake', '450.00', 'Chocolate chocolate cake with KitKat border', 3, 'IMG-20200809-WA0033.jpg', 'IMG-20200809-WA0033.jpg', 'IMG-20200809-WA0033.jpg'),
(22, 'MakeUp styled cake', '700.00', '<p>Make-up product decorated cake</p>', 4, 'IMG-20200813-WA0030.jpg', 'IMG-20200813-WA0030.jpg', 'IMG-20200813-WA0030.jpg'),
(24, 'Candy Cake', '450.00', '<p>Candy topped cake</p>', 4, 'IMG-20200813-WA0040.jpg', 'IMG-20200813-WA0040.jpg', 'IMG-20200813-WA0040.jpg'),
(25, 'Strawberry Cake', '400.00', '<p>Strawberry topped cake with biscuit border</p>', 4, 'IMG-20200813-WA0042.jpg', 'IMG-20200813-WA0042.jpg', 'IMG-20200813-WA0042.jpg'),
(26, 'Icing cake', '350.00', '<p>Icing cake with sparkles</p>', 4, 'IMG-20200813-WA0029.jpg', 'IMG-20200813-WA0029.jpg', 'IMG-20200813-WA0029.jpg'),
(27, 'Wedding Cake', '800.00', '<p>Chocolate pattern cake with bride and groom figures</p>', 4, 'IMG-20200813-WA0039.jpg', 'IMG-20200813-WA0039.jpg', 'IMG-20200813-WA0039.jpg'),
(28, 'Flan', '55.00', '<p>Flan Cake with cream</p>', 5, 'IMG-20200809-WA0032.jpg', 'IMG-20200809-WA0032.jpg', 'IMG-20200809-WA0032.jpg'),
(29, 'Vanilla pound cake', '400.00', '<p>Vanilla pound cake&nbsp;</p>', 6, 'Vanilla Pound Cake.jpg', 'Vanilla Pound Cake.jpg', 'Vanilla Pound Cake.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cakecategory`
--

CREATE TABLE `cakecategory` (
  `CategoryID` int(11) NOT NULL,
  `CategoryTitle` varchar(100) DEFAULT NULL,
  `CategoryDesc` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cakecategory`
--

INSERT INTO `cakecategory` (`CategoryID`, `CategoryTitle`, `CategoryDesc`) VALUES
(3, ' High end cakes ', 'High range cakes'),
(4, ' Special occasion cakes ', 'Attractive cakes'),
(6, ' Average cakes ', 'Medium level cakes');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CakeID` int(11) NOT NULL,
  `IP_add` varchar(255) DEFAULT NULL,
  `CakeQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ClientEmail` varchar(45) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `ClientPassword` varchar(45) NOT NULL,
  `ClientName` varchar(45) NOT NULL,
  `ClientMobileNo` varchar(45) NOT NULL,
  `Client_ip` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ClientEmail`, `ClientID`, `ClientPassword`, `ClientName`, `ClientMobileNo`, `Client_ip`) VALUES
('liampoole02@gmail.com', 3, '123456789', 'Liam', '0734232769', '::1'),
('ndaim', 4, 'ndai', 'Ndai', '087638473', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `clientorder`
--

CREATE TABLE `clientorder` (
  `OrderID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `DueAmount` int(11) NOT NULL,
  `InvoiceNo` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `OrderDate` date NOT NULL,
  `OrderStatus` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientorder`
--

INSERT INTO `clientorder` (`OrderID`, `ClientID`, `DueAmount`, `InvoiceNo`, `Quantity`, `OrderDate`, `OrderStatus`) VALUES
(42, 2, 400, 2088887716, 2, '2020-08-15', 'Pending'),
(43, 2, 1300, 2088887716, 2, '2020-08-15', 'Complete'),
(44, 2, 900, 2088887716, 2, '2020-08-15', 'Pending'),
(45, 2, 550, 163412019, 1, '2020-08-15', 'Pending'),
(46, 3, 900, 100361963, 2, '2020-08-16', 'Complete'),
(47, 3, 450, 100361963, 1, '2020-08-16', 'Pending'),
(48, 3, 2000, 2061473825, 5, '2020-08-25', 'Pending'),
(49, 3, 800, 2061473825, 1, '2020-08-25', 'Pending'),
(50, 0, 0, 1265356632, 0, '2020-08-26', 'Pending'),
(51, 0, 700, 1649464136, 1, '2020-08-26', 'Pending'),
(52, 4, 2400, 1507605522, 3, '2020-08-27', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `orderspending`
--

CREATE TABLE `orderspending` (
  `OrderID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `InvoiceNo` int(11) DEFAULT NULL,
  `CakeID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `OrderStatus` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderspending`
--

INSERT INTO `orderspending` (`OrderID`, `ClientID`, `InvoiceNo`, `CakeID`, `Quantity`, `OrderStatus`) VALUES
(46, 3, 100361963, 11, 2, 'Complete'),
(47, 3, 100361963, 24, 1, 'Pending'),
(48, 3, 2061473825, 25, 5, 'Pending'),
(49, 3, 2061473825, 27, 1, 'Pending'),
(51, 0, 1649464136, 22, 1, 'Pending'),
(52, 4, 1507605522, 27, 3, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PaymentID` int(11) NOT NULL,
  `InvoiceNo` int(11) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `PaymentMode` varchar(45) DEFAULT NULL,
  `RefNo` int(11) DEFAULT NULL,
  `Code` int(11) DEFAULT NULL,
  `PaymentDate` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PaymentID`, `InvoiceNo`, `Amount`, `PaymentMode`, `RefNo`, `Code`, `PaymentDate`) VALUES
(1, 1507605522, 2400, 'Bank', 5345, 344, '2020-08-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cake`
--
ALTER TABLE `cake`
  ADD PRIMARY KEY (`CakeID`);

--
-- Indexes for table `cakecategory`
--
ALTER TABLE `cakecategory`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CakeID`),
  ADD KEY `fk_Cart_Cake1_idx` (`CakeID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `clientorder`
--
ALTER TABLE `clientorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `orderspending`
--
ALTER TABLE `orderspending`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PaymentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cake`
--
ALTER TABLE `cake`
  MODIFY `CakeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cakecategory`
--
ALTER TABLE `cakecategory`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clientorder`
--
ALTER TABLE `clientorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `orderspending`
--
ALTER TABLE `orderspending`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_Cart_Cake1` FOREIGN KEY (`CakeID`) REFERENCES `cake` (`CakeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
