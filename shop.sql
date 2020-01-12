-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2020 at 07:10 PM
-- Server version: 10.2.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `entity_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`entity_id`, `name`, `description`) VALUES
(1, 'Laptopuri', 'Iti doresti un laptop nou? Ai Livrare Gratuita si Finantare in Rate la laptopuri cumparate de la eMAG. Nu rata ofertele de astazi!');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `entity_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` int(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `entity_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `address` varchar(64) NOT NULL,
  `zip` int(4) NOT NULL,
  `city` varchar(32) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `shipping` varchar(16) NOT NULL,
  `payment` varchar(16) NOT NULL,
  `products` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `entity_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` float NOT NULL,
  `rating` int(6) NOT NULL,
  `reviews` int(6) NOT NULL,
  `category_id` int(6) NOT NULL,
  `image` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`entity_id`, `name`, `description`, `price`, `rating`, `reviews`, `category_id`, `image`) VALUES
(1, 'Laptop ASUS A550VX-XX286D', 'Laptop ASUS A550VX-XX286D cu procesor Intel® Core™ i5-6300HQ 2.30GHz, Skylake™, 15.6\", 4GB, 1TB, DVD-RW, nVIDIA® GeForce® GTX 950M 2GB, Free DOS, Blue Gray', 2699, 4, 13, 1, 'A550VX-XX286D.jpg'),
(2, 'Acer Aspire Switch One SW1-011-18H5', 'Laptop 2 in 1 Acer Aspire Switch One SW1-011-18H5 cu procesor Intel® Atom™ x5-Z8300 1.44 GHz, 10.1\", Touchscreen, 2GB, 32GB+500GB, Intel® HD Graphics, Microsoft Windows 10 Home, Steel Gray', 1099, 0, 0, 1, 'NT.LCTEX.003.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`entity_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`entity_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`entity_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`entity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
