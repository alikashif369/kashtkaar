-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Dec 25, 2024 at 01:48 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyerregistration`
--

DROP TABLE IF EXISTS `buyerregistration`;
CREATE TABLE IF NOT EXISTS `buyerregistration` (
  `buyer_id` int NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(30) NOT NULL,
  `buyer_phone` bigint NOT NULL,
  `buyer_addr` text NOT NULL,
  `buyer_comp` varchar(100) NOT NULL,
  `buyer_license` varchar(100) NOT NULL,
  `buyer_bank` int NOT NULL,
  `buyer_cnic` bigint NOT NULL,
  `buyer_mail` varchar(20) NOT NULL,
  `buyer_username` varchar(20) NOT NULL,
  `buyer_password` varchar(20) NOT NULL,
  PRIMARY KEY (`buyer_id`),
  UNIQUE KEY `buyer_username` (`buyer_username`),
  UNIQUE KEY `buyer_phone` (`buyer_phone`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyerregistration`
--

INSERT INTO `buyerregistration` (`buyer_id`, `buyer_name`, `buyer_phone`, `buyer_addr`, `buyer_comp`, `buyer_license`, `buyer_bank`, `buyer_cnic`, `buyer_mail`, `buyer_username`, `buyer_password`) VALUES
(15, 'Abhishek', 1234567890, ' Raj Uday 234', 'Elysian.org', '02082000', 2147483647, 1234567890, 'abhi@hmil.com', 'admin', 'm8bf5+Y='),
(16, 'Arpit', 7666610976, 'Bhat Mansion', 'Mafia Pvt Ltd', '99', 12345, 987, 'abcd@gmail.com', 'redhawk', 'm9HW6O8B'),
(17, 'calista', 2589631472, '4/2,rose building .wadala', 'apple', 'w3566908', 8947, 2436467897, 'rose21@gmail.com', 'melissa', 'nM7d+e0b41E='),
(18, 'Lokesh', 9029788504, 'SEC -13 , PALM BEACH ROAD', '', 'MAHARASHTRA', 0, 1234567890, 'abhi@hmil.com', 'lokesh', 'yw=='),
(19, 'ansh', 9819104641, 'fam', 'Elysian.org', 'MAHARASHTRA', 2147483647, 1234567890, 'abhi@hmil.com', 'ansh', 'y5CB'),
(20, 'bhabalomkar421', 8828071232, 'bj', 'c company', 'just **** off', 1, 1, 'xyz@domain.com', '501807', 'yw=='),
(21, 'ali', 5169193101, 'isb', 'somethign', 'something', 2147483647, 123, 'asdfasd@gamil.com', 'something', 'm8bf5+ZY4w=='),
(22, 'Ali Khan test1', 3001234567, 'House #12, Street #45, Karachi', 'Ali Agro Traders', 'ABC123456', 2147483647, 4210112345678, 'ali.khan@example.com', 'alikhan', 'zpGAvw==');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `product_id` int NOT NULL,
  `phonenumber` bigint NOT NULL,
  `qty` int NOT NULL DEFAULT '1',
  `subtotal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `phonenumber`, `qty`, `subtotal`) VALUES
(32, 8169193101, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Crops'),
(2, 'Vegetables'),
(3, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `farmerregistration`
--

DROP TABLE IF EXISTS `farmerregistration`;
CREATE TABLE IF NOT EXISTS `farmerregistration` (
  `farmer_id` int NOT NULL AUTO_INCREMENT,
  `farmer_name` varchar(255) NOT NULL,
  `farmer_phone` bigint NOT NULL,
  `farmer_address` text NOT NULL,
  `farmer_state` varchar(50) NOT NULL,
  `farmer_district` varchar(50) NOT NULL,
  `farmer_bank` int NOT NULL,
  `farmer_password` varchar(100) NOT NULL,
  `farmer_cnic` varchar(15) NOT NULL,
  UNIQUE KEY `farmer_id` (`farmer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmerregistration`
--

INSERT INTO `farmerregistration` (`farmer_id`, `farmer_name`, `farmer_phone`, `farmer_address`, `farmer_state`, `farmer_district`, `farmer_bank`, `farmer_password`, `farmer_cnic`) VALUES
(1, 'omar', 8169193101, 'Mars', 'MAHARASHTRA', 'Thane', 2147483647, 'm8bf5+Y=', ''),
(3, 'omkar', 8169193102, 'SEC -13 , PALM BEACH ROAD', 'KERALA', 'Alappuzha', 45745425, 'nMPb4g==', ''),
(4, 'Ram', 8169193103, 'Moon', 'MahaRASHTRA', 'Nagpur', 211324654, 'm8bf5+Y=', ''),
(5, 'Lokesh', 8169193104, 'SEC -13 , PALM BEACH ROAD', 'MAHARASHTRA', 'Nagpur', 45745425, 'yw==', ''),
(6, 'Ramlal', 8169193105, 'Address 1', 'WEST BENGAL', 'Darjiling', 2147483647, 'yw==', ''),
(7, 'Chirag', 8169193106, 'Address 2', 'WEST BENGAL', 'Darjiling', 2147483647, 'yw==', ''),
(8, 'Gladina', 8169193107, 'Address 3', 'WEST BENGAL', 'Jalpaiguri', 2147483647, 'yw==', ''),
(9, 'neeta', 8169193108, 'add1', 'HIMACHAL PRADESH', 'Chamba', 56878613, 'yw==', ''),
(10, 'meeta', 8169193109, 'add2', 'HIMACHAL PRADESH', 'Kullu', 2147483647, 'yw==', ''),
(11, 'melissa', 8169193110, 'add3', 'HIMACHAL PRADESH', 'Kullu', 454586125, 'yw==', ''),
(12, 'jon', 8169193111, 'add5', 'HIMACHAL PRADESH', 'Chamba', 248654352, 'yw==', ''),
(13, 'daenarys', 8169193112, 'add5', 'HIMACHAL PRADESH', 'Solan', 3216415, 'yw==', ''),
(14, 'drogon', 8169193113, 'add7', 'HIMACHAL PRADESH', 'Solan', 2147483647, 'yw==', ''),
(16, 'Bran', 8169193114, 'add10\r\n', 'LAKSHADWEEP', 'Lakshadweep', 65464851, 'yw==', ''),
(17, 'lyanna', 8169193115, 'add10', 'LAKSHADWEEP', 'Lakshadweep', 21544232, 'yw==', ''),
(18, 'catelyn', 8169193116, 'add115', 'MADHYA PRADESH', 'Rewa', 3846835, 'yw==', ''),
(19, 'Sansa', 8169193117, 'add 17', 'GOA', 'North Goa', 3468651, 'yw==', ''),
(20, 'Rachel', 8169193118, 'add20', 'GOA', 'North Goa', 27486513, 'yw==', ''),
(21, 'Joanna', 8169193119, 'add16', 'GOA', 'South Goa', 24568536, 'yw==', ''),
(22, 'Arya', 8169193120, 'add17', 'GOA', 'South Goa', 249685547, 'yw==', ''),
(23, 'Andy', 8169193121, 'add19', 'HARYANA', 'Rohtak', 54564684, 'yw==', ''),
(25, 'stark', 8169193122, 'add29', 'DAMAN AND DIU', 'Diu', 541564564, 'yw==', ''),
(26, 'hound', 8169193123, 'add23', 'DAMAN AND DIU', 'Daman', 524845638, 'yw==', ''),
(27, 'Ryte Richard', 8169193124, 'add45', 'TAMIL NADU', 'Nagapattinam *', 254685746, 'yw==', ''),
(29, 'John', 8169193125, 'Address 7', 'JHARKAND', 'Garhwa *', 168, 'yw==', ''),
(30, 'Rogan', 8169193126, 'Address56', 'JHARKAND', 'Garhwa *', 6455415, 'yw==', ''),
(31, 'Swaarop', 8169193127, 'Address 23', 'JHARKAND', 'Garhwa *', 4646544, 'yw==', ''),
(32, 'Jesudas', 8169193128, 'Address 56', 'JHARKAND', 'Palamu', 544613515, 'yw==', ''),
(33, 'same', 8169193129, 'addeees', 'JAMMU AND KASHMIR', 'Kupwara', 121321, 'yw==', ''),
(34, 'Mitesh Chhadva', 8169193130, '19/502,Fam chs ltd\r\nSector 11  koparkhairne', 'MAHARASHTRA', 'Nandurbar *', 5465415, 'yw==', ''),
(35, 'Manali', 8169193131, '19/502,Fam chs ltd\r\n', 'JAMMU AND KASHMIR', 'Kupwara', 5465415, 'yw==', ''),
(36, 'Manya', 8169193132, '19/502,Fam chs \r\nameri', 'JAMMU AND KASHMIR', 'Baramula', 54654101, 'yw==', ''),
(37, 'surli', 8169193133, '19/502,Fam chs \r\nameri', 'JAMMU AND KASHMIR', 'Baramula', 54654101, 'yw==', ''),
(38, 'asha', 8169193134, 'superman', 'JAMMU AND KASHMIR', 'Srinagar', 3213213, 'yw==', ''),
(39, 'asjij', 8169193135, 'ameica', 'JAMMU AND KASHMIR', 'Srinagar', 1212, 'yw==', ''),
(40, 'arama', 8169193136, 'australia', 'JAMMU AND KASHMIR', 'Badgam', 121211, 'yw==', ''),
(41, 'andami', 8169193137, 'askkkey', 'JAMMU AND KASHMIR', 'Badgam', 12127, 'yw==', ''),
(42, 'human', 8169193138, 'ansh', 'JAMMU AND KASHMIR', 'Badgam', 12127, 'yw==', ''),
(43, 'varma', 8169193139, 'jupiter', 'JAMMU AND KASHMIR', 'Badgam', 22, 'yw==', ''),
(44, 'ashhhish', 8169193140, 'asmaan', 'HIMACHAL PRADESH', 'Chamba', 2147483647, 'yw==', ''),
(45, 'ashhhish', 8169193141, 'asmaan', 'HIMACHAL PRADESH', 'Chamba', 2147483647, 'yw==', ''),
(46, 'ruchi', 8169193142, 'juhinagar', 'HIMACHAL PRADESH', 'Kangra', 1, 'yw==', ''),
(47, 'name', 8169193143, 'toonpur', 'HIMACHAL PRADESH', 'Kangra', 11, 'yw==', ''),
(48, 'kargil', 8169193144, 'toonpur super', 'HIMACHAL PRADESH', 'Lahul & Spiti', 223, 'yw==', ''),
(49, 'admi', 8169193145, 'asam\r\n', 'HIMACHAL PRADESH', 'Kangra', 222, 'yw==', ''),
(50, 'robot', 8169193146, 'asa1', 'HIMACHAL PRADESH', 'Lahul & Spiti', 2221, 'yw==', ''),
(51, 'robot shah', 8169193147, 'arya', 'HIMACHAL PRADESH', 'Lahul & Spiti', 2221, 'yw==', ''),
(52, 'robot farmer', 8169193148, 'doremon', 'HIMACHAL PRADESH', 'Kullu', 2221189, 'yw==', ''),
(53, 'robot schema', 8169193149, 'doremon nobita', 'HIMACHAL PRADESH', 'Kullu', 222118, 'yw==', ''),
(54, 'ashhhish chanchali', 8169193150, 'asmeta', 'HIMACHAL PRADESH', 'Mandi', 2147483647, 'yw==', ''),
(55, 'ashhhish chanchali', 8169193151, 'asmeta', 'HIMACHAL PRADESH', 'Mandi', 2147483647, 'yw==', ''),
(56, 'arpita', 8169193152, 'asmeta upra', 'HIMACHAL PRADESH', 'Hamirpur', 2147483647, 'yw==', ''),
(57, 'robot aunty', 8169193153, 'iten', 'HIMACHAL PRADESH', 'Una', 22219, 'yw==', ''),
(58, 'Kira', 8169193154, 'add', 'ARUNACHAL PRADESH', 'Upper Siang *', 1, 'yZE=', ''),
(59, 'Arpit', 8169193155, 'Lenyadri Tower', 'MAHARASHTRA', 'Thane', 999, 'yw==', ''),
(60, 'Raghu', 8169193156, 'West City', 'ANDHRA PRADESH', 'Adilabad', 4321, 'yw==', ''),
(61, 'Raghav', 8169193157, '9 Palk Street', 'CHANDIGARH', 'Chandigarh', 991, 'yw==', ''),
(62, 'Keshav', 8169193158, 'Sarojnagar', 'GOA', 'North Goa', 332, 'yw==', ''),
(63, 'Suraj', 8169193159, 'Moraj', 'CHHATTISGARH', 'Kawardha *', 987, 'yw==', ''),
(64, 'Midoriya', 8169193160, 'Hosu', 'DAMAN AND DIU', 'Diu', 818, 'yw==', ''),
(65, 'Dhole', 8169193161, 'North Silvasa', 'DADRA AND NAGAR HAVELI', 'Dadra & Nagar Haveli', 666, 'yw==', ''),
(66, 'Yash', 8169193162, 'Ambika Heights', 'GOA', 'South Goa', 361, 'yw==', ''),
(67, 'Karan', 8169193163, 'Nilgiri Gardens', 'PUDUCHERRY', 'Yanam', 1014, 'yw==', ''),
(68, 'Arun', 8169193164, 'Harbour View', 'JAMMU AND KASHMIR', 'Punch', 3014, 'yw==', ''),
(69, 'Khan', 8169193165, 'SBI colony', 'ARUNACHAL PRADESH', 'Tawang', 1048, 'yw==', ''),
(70, 'Kahn', 8169193166, 'Baba Niwas', 'MADHYA PRADESH', 'Sheopur *', 5096, 'yw==', ''),
(71, 'Iqbal', 8169193167, 'Hiranandani', 'HARYANA', 'Panchkula *', 1047, 'yw==', ''),
(72, 'Archit', 8169193168, 'Army Colony', 'DELHI', 'Central *', 7192, 'yw==', ''),
(73, 'Kumar', 8169193169, 'Masjid Rd', 'DELHI', 'West *', 2192, 'yw==', ''),
(74, 'Eeshan', 8169193170, 'BARC Colony', 'GOA', 'South Goa', 3192, 'yw==', ''),
(75, 'Gavin', 8169193171, 'Oxfordshire', 'DELHI', 'South *', 4192, 'yw==', ''),
(76, 'Meg', 8169193172, 'Chelsea', 'TAMIL NADU', 'Madurai', 433, 'yw==', ''),
(77, 'Hodaka', 8169193173, 'Touto', 'JAMMU AND KASHMIR', 'Rajauri', 2729, 'yw==', ''),
(78, 'Rohan', 8169193174, 'Spurs', 'BIHAR', 'Purnia', 7171, 'yw==', ''),
(79, 'Navin', 8169193175, 'Hoenn', 'GOA', 'North Goa', 5020, 'yw==', ''),
(80, 'Ansh', 8169193176, 'Liverpool', 'CHANDIGARH', 'Chandigarh', 8100, 'yw==', ''),
(81, 'Umesh', 8169193177, 'Everton', 'DELHI', 'North West *', 7896, 'yw==', ''),
(82, 'Bhuvan', 8169193178, 'Leicester', 'HIMACHAL PRADESH', 'Shimla', 2020, 'yw==', ''),
(83, 'Pavan', 8169193179, 'Munich', 'JHARKAND', 'ORISSA', 7374, 'yw==', ''),
(84, 'Suman', 8169193180, 'Watford', 'GOA', 'South Goa', 8453, 'yw==', ''),
(85, 'Ashish', 8169193181, 'Crystal Palace', 'KERALA', 'Kasaragod', 5454, 'yw==', ''),
(86, 'Lal', 8169193182, 'West Ham', 'KARNATAKA', 'Belgaum', 9998, 'yw==', ''),
(87, 'Ranvir', 8169193183, 'Newcastle', 'MAHARASHTRA', 'Jalna', 2818, 'yw==', ''),
(88, 'Suresh', 8169193184, 'Real Madrid', 'MEGHALAYA', 'West Garo Hills', 8017, 'yw==', ''),
(89, 'Anish', 8169193185, 'Bournmouth', 'PUDUCHERRY', 'Yanam', 2999, 'yw==', ''),
(90, 'Lahiru', 8169193186, 'Barcelona', 'GUJARAT', 'Kachchh', 8199, 'yw==', ''),
(91, 'Jasmeet', 8169193187, 'Manchester city', '0', 'Kachchh', 6666, 'yw==', ''),
(92, 'bhabalomkar421', 8828071232, '1', 'MADHYA PRADESH', 'Sheopur *', 1, 'yw==', ''),
(93, 'ali', 3127892832, 'rawalpindid', 'PUNJAB', 'Rawalpindi', 2147483647, 'y5CBug==', '1234567890123');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_locations`
--

DROP TABLE IF EXISTS `farmer_locations`;
CREATE TABLE IF NOT EXISTS `farmer_locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `farmer_id` int NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `farmer_id` (`farmer_id`),
  CONSTRAINT `fk_farmer_id` FOREIGN KEY (`farmer_id`) REFERENCES `farmerregistration` (`farmer_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery` varchar(10) NOT NULL,
  `phonenumber` bigint NOT NULL,
  `total` int NOT NULL,
  `payment` varchar(10) NOT NULL,
  `buyer_phonenumber` bigint NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `product_id` (`product_id`),
  KEY `phonenumber` (`phonenumber`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `qty`, `address`, `delivery`, `phonenumber`, `total`, `payment`, `buyer_phonenumber`) VALUES

(60, 32, 1, 'Working', 'Buyer', 8169193101, 10, 'cod', 1234567890),
(61, 38, 9, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 1080, 'paytm', 3001234567),
(62, 29, 1, 'House #12, Street #45, Karachi', 'Farmer', 8169193102, 50, 'paytm', 3001234567),
(63, 38, 22, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 2640, 'paytm', 3001234567),
(64, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'paytm', 3001234567),
(65, 38, 5, 'House #12, Street #45, Karachi', 'Courier', 3127892832, 600, 'paytm', 3001234567),
(66, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'paytm', 3001234567),
(67, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'paytm', 3001234567),
(68, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'cod', 3001234567),
(69, 38, 2, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 240, 'cod', 3001234567),
(70, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'paytm', 3001234567),
(71, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'paytm', 3001234567),
(72, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'cod', 3001234567),
(73, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'cod', 3001234567),
(74, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'paytm', 3001234567),
(75, 38, 2, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 240, 'cod', 3001234567),
(76, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'cod', 3001234567),
(77, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'cod', 3001234567),
(78, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'cod', 3001234567),
(79, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'cod', 3001234567),
(80, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'cod', 3001234567),
(81, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'cod', 3001234567),
(82, 38, 1, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 120, 'paytm', 3001234567),
(83, 1, 20, 'House #12, Street #45, Karachi', 'Farmer', 8169193101, 240, 'cod', 3001234567),
(84, 38, 3, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 360, 'cod', 3001234567),
(85, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'paytm', 3001234567),
(86, 38, 2, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 240, 'paytm', 3001234567),
(87, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'paytm', 3001234567),
(88, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'paytm', 3001234567),
(89, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'paytm', 3001234567),
(90, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'paytm', 3001234567),
(91, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'paytm', 3001234567),
(92, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'cod', 3001234567),
(93, 38, 5, 'House #12, Street #45, Karachi', 'Farmer', 3127892832, 600, 'paytm', 3001234567),
(94, 30, 1, 'House #12, Street #45, Karachi', 'Farmer', 8169193101, 65, 'jazz', 3001234567),
(95, 3, 1, 'House #12, Street #45, Karachi', 'Farmer', 8169193101, 5, 'jazz', 3001234567);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `farmer_fk` int NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_cat` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_expiry` varchar(25) NOT NULL,
  `product_image` text NOT NULL,
  `product_stock` int NOT NULL,
  `product_price` int NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_delivery` varchar(5) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `farmer_fk` (`farmer_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `farmer_fk`, `product_title`, `product_cat`, `product_type`, `product_expiry`, `product_image`, `product_stock`, `product_price`, `product_desc`, `product_keywords`, `product_delivery`) VALUES
(1, 1, 'Ramlal Potato', '2', 'Potato', '2020-04-15', 'Potato.jpg', 981, 12, 'Best Quality product guarented 100 percent', 'potato', 'yes'),
(3, 1, 'Ramlal Tomato', '2', 'Tomato', '2020-04-15', 'Tomato.jpg', 500, 5, 'Best Quality toamato assured', 'tomato , best quality tomato , Ramlal Tomato', 'no'),
(17, 3, 'Shivneri Bananas', '3', 'Bananas', '2020-04-15', 'Bananas.jpg', 250, 30, 'Best Quality Bananas', 'banana, shivneri ,', 'yes'),
(18, 3, 'Ram Rice', '1', 'Rice', '2020-04-15', 'Rice.jpg', 1500, 2, 'waqd', 'best rice', 'yes'),
(19, 1, 'Ansh Carrot', '2', 'Carrot', '2020-04-15', 'Carrot.jpg', 1250, 56, 'Big fat juicy best quality carrots assured', 'carrot,best carrot', 'yes'),
(21, 1, 'Abhi Maize', '1', 'Maize', '2020-04-15', 'Maize.jpg', 750, 99, 'Seeds Import from australia , grown with love', 'Maize,best Maize', 'yes'),
(22, 3, 'Calista Coconut', '1', 'Coconut', '2020-04-15', 'Coconut.jpg', 450, 12, 'Better than others', 'Coconut,best Coconut', 'no'),
(23, 1, 'Arpit Grapes', '3', 'Grapes', '2020-04-15', 'Green Grapes.jpg', 4560, 56, 'Best Grapes you will ever find', 'grapes,green grapes,best grapes', 'yes'),
(24, 1, 'Arpit Apples', '3', 'Apple', '2020-04-15', 'Apple.jpg', 1500, 101, 'Best Apples grown in Kashmir and handled with love and care', 'apples,apple,best apple', 'no'),
(25, 1, 'Ramlal Wheat', '1', 'Wheat', '2020-04-15', 'Wheat.jpg', 2000, 80, 'Thin , Fragrant wheat grains grown with love', 'wheat,best quality wheat,best wheat', 'no'),
(27, 3, 'Arpit Alphonso Mango', '3', 'Mango', '2020-04-15', 'Mango.jpg', 2000, 200, 'Grown with love in Ratnagiri', 'mango,alponso mango,best mango', 'yes'),
(28, 1, 'Ansh Custard Apple', '3', 'Custard Apple', '2020-04-15', 'custartapple.cms', 500, 45, 'Custard Apple so tasty ,to die for', 'Custard Apple,custart apple, apple, best custard apple', 'yes'),
(29, 3, 'Omkar Cabbage', '2', 'Cabbage', '2020-04-15', 'Cabbage.jpg', 1500, 50, 'Best Quality Cabbage', 'cabbage, best Cabbage', 'yes'),
(30, 1, 'Ansh Onion', '2', 'Onion', '2020-04-15', 'Onion.jpg', 1500, 65, 'Grown with love', 'Onion,best onion', 'no'),
(31, 1, 'Abhi Strawberry', '3', 'Strawberry', '2020-04-15', 'strawberry.jpg', 100, 25, 'Best Strawberrys all over India ', 'Strawberry,best strawberry', 'yes'),
(32, 1, 'Abhi Orange', '3', 'Orange', '2020-04-15', 'orange.jpg', 1500, 10, 'Best Oranges grown with love in Nagpur', 'Orange,best Orange', 'yes'),
(37, 1, 'Ram Sugacane', '1', 'Sugarcane', '2020-04-25', 'Sugarcane.jpg', 1000, 50, 'Best Sugarcane', 'Sugarcane', 'yes'),
(38, 93, 'Sante Potato', '1', 'potato', '2024-12-31', 'potato.jpg', 100, 120, 'test2 beautiful potato, pekhaa alooo, this edit you product test1, test3 test4 test5', 'metha aloo', 'yes');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
