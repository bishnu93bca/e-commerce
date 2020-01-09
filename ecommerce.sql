-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2016 at 05:10 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `pro_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  KEY `pro_id` (`pro_id`,`ip_add`,`qty`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`pro_id`, `ip_add`, `qty`) VALUES
(1, '::1', 0),
(2, '::1', 0),
(3, '::1', 0),
(4, '::1', 0),
(5, '::1', 0),
(6, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(100) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Cameras\r\n'),
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'iPads'),
(6, 'iPhones');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_ip` varchar(100) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` varchar(200) NOT NULL,
  `customer_city` varchar(100) NOT NULL,
  `customer_contact` int(200) NOT NULL,
  `customer_image` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(2, '::1', 'BISHNU RAY', 'bishnu99bca@gmail.com', '1234', 'India', 'DELHI', 2147483647, '3.jpg', 'A-30 AAYA NAGER PHASE-2'),
(3, '::1', 'BISHNU RAY', 'bishnu99bca@gmail.com', '1234', 'India', 'DELHI', 2147483647, '3.jpg', 'A-30 AAYA NAGER PHASE-2');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 1, 1, 'HP', 1200, '<p>nice laptop</p>', 'HP_laptop.jpeg', 'hp'),
(2, 1, 2, 'Laptop', 1200, '<p>nice</p>', 'dell-inspiron-notebook-125x125-imae8z63jqzv5cdh.jpeg', 'dell'),
(3, 3, 4, 'Mobile', 600, '<p>nice mobile</p>', '20140925-105733-moto-g.jpg', 'mobile'),
(4, 2, 5, 'nikon', 120, '<p>nice</p>', 'nikon-d3200-dslr-125x125-imaeyxfayjnxjvg9.jpeg', 'cameras'),
(5, 1, 1, 'HP', 700, '<p>nice</p>', 'hp-notebook-125x125.jpeg', 'hp'),
(6, 1, 1, 'HP', 3000, '<p>nice</p>', 'hp-notebook-125x125-imaejb8zhwxs62by.jpeg', 'hp');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
