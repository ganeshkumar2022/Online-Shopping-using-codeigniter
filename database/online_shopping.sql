-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2023 at 04:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `password`) VALUES
(1, 'admin', '$2y$10$quuIRSN5I4njwL0ZboS2..hqVClbo2GRLdV9cY3QKuFFceHWw6OzK');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `bid` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`bid`, `bname`, `reading_time`) VALUES
(1, 'Nike', '2023-09-29 02:05:08'),
(2, 'Adidas', '2023-09-29 02:05:20'),
(3, 'Amazon', '2023-09-29 02:05:26'),
(4, 'flipkart', '2023-09-29 02:05:31'),
(5, 'Zomato', '2023-09-29 02:05:37'),
(6, 'Swiggy', '2023-09-29 02:05:56'),
(7, 'MC Donalds', '2023-09-29 02:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `product_image1` varchar(60) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `title`, `price`, `product_image1`, `product_id`, `user_id`, `reading_time`) VALUES
(5, 'Running shoe', 400, 'shoe1.jpg', 1, 3, '2023-10-01 03:56:26'),
(7, 'Running shoe', 400, 'shoe1.jpg', 1, 2, '2023-10-01 04:21:28'),
(8, 'Chicken Biriyani', 120, 'b1.jpg', 2, 2, '2023-10-01 04:21:33'),
(9, 'Chicken Biriyani', 240, 'b1.jpg', 2, 9, '2023-10-01 07:05:47'),
(10, 'Grey shirt', 2400, 'shirt1.jpg', 4, 9, '2023-10-01 07:07:47'),
(18, 'Running shoe', 400, 'shoe1.jpg', 1, 10, '2023-10-02 13:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `reading_time`) VALUES
(1, 'Juices', '2023-09-29 01:52:13'),
(2, 'Milk products', '2023-09-29 15:28:43'),
(3, 'Chips', '2023-09-29 01:55:14'),
(4, 'Fruits', '2023-09-29 01:55:21'),
(5, 'Books', '2023-09-29 01:55:27'),
(6, 'Biriyani', '2023-09-29 01:55:37'),
(7, 'Clothes', '2023-09-29 01:55:43'),
(8, 'shoes', '2023-09-29 01:56:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `message`, `reading_time`) VALUES
(1, 'ganesh', 'ganesh@gmail.com', 'this is my simple message', '2023-10-03 01:49:58'),
(2, 'nishitha', 'nishitha@gmail.com', 'hi i like your website', '2023-10-03 15:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE `final` (
  `cart_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `product_image1` varchar(60) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`cart_id`, `title`, `price`, `product_image1`, `product_id`, `user_id`, `order_id`, `reading_time`) VALUES
(12, 'Chicken Biriyani', 120, 'b1.jpg', 2, 0, 4, '2023-10-02 04:42:33'),
(13, 'Running shoe', 400, 'shoe1.jpg', 1, 10, 5, '2023-10-02 04:53:54'),
(14, 'Chicken Biriyani', 120, 'b1.jpg', 2, 10, 5, '2023-10-02 04:53:54'),
(15, 'Apple juice', 50, 'app1.jpg', 5, 10, 6, '2023-10-02 04:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `amount_due` int(11) NOT NULL,
  `total_products` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `status` varchar(60) NOT NULL DEFAULT 'Incomplete',
  `user_id` int(11) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `amount_due`, `total_products`, `invoice_no`, `status`, `user_id`, `reading_time`) VALUES
(4, 120, 1, 123044, 'Incomplete', 0, '2023-10-02 04:42:33'),
(5, 520, 2, 123042, 'Complete', 10, '2023-10-03 15:09:56'),
(6, 50, 1, 123043, 'Incomplete', 10, '2023-10-02 04:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `order_id`, `invoice_no`, `user_id`, `amount`, `payment_mode`, `reading_time`) VALUES
(1, 5, 123042, 10, 520, 'UPI', '2023-10-03 15:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `brand` int(11) NOT NULL,
  `product_image1` varchar(100) NOT NULL,
  `product_image2` varchar(100) NOT NULL,
  `product_image3` varchar(100) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `title`, `description`, `keyword`, `price`, `category`, `brand`, `product_image1`, `product_image2`, `product_image3`, `reading_time`) VALUES
(1, 'Running shoe', 'Stylish Comfortable Light weight, Breathable Socks Sports Walking Shoes For Men Running Shoes For Men  (Black)', 'shoe,foot wear', 400, 8, 2, 'shoe1.jpg', 'shoe2.jpg', 'shoe3.jpg', '2023-09-30 15:27:06'),
(2, 'Chicken Biriyani', 'Tata Sampann Yumside Chicken Biryani, Rich and Aromatic, Ready To Eat Meal, Serves 2 Pax 330 g', 'biriyani,food,chicken', 120, 6, 6, 'b1.jpg', 'b2.jpg', 'b3.jpg', '2023-09-29 16:49:19'),
(4, 'Grey shirt', 'German grey classic casual shirt for men it is very beautiful', 'shirt', 1200, 7, 4, 'shirt1.jpg', 'hirt2.jpg', 'shirt3.jpg', '2023-09-30 16:22:52'),
(5, 'Apple juice', '250 ml fresh apple juice with candys', 'juice,apple', 50, 1, 5, 'app1.jpg', 'app2.jpg', 'app3.jpg', '2023-09-30 16:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `myimage` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `contact` char(10) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `myimage`, `password`, `address`, `ip_address`, `contact`, `reg_time`) VALUES
(3, 'alia', 'alia@gmail.com', 'alia.jpg', '$2y$10$teU.YV4HBh7SMpYJ7egw1e7tM6sIf3rp4dZU4kgjV51dbVMykUXZ.', 'north mount upon , delhi', '::1', '9245145678', '2023-09-28 01:52:27'),
(5, 'samantha', 'samantha@gmail.com', 'samantha1.jpg', '$2y$10$lnLfhET7lVjxpDcqBQGuF.6W9cffafqYns0zy4GuM9/D9/QoB.pGy', 'chennai', '::1', '9887134567', '2023-09-28 16:02:30'),
(7, 'ram', 'ram@gmail.com', 'ram.jpg', '$2y$10$Pp1rhznMJRpyhAs6g9/9a.eY1rg76H8h./Cky0ydPHKjWoWrMEw5G', 'munnaru street, aavadi', '::1', '9123456789', '2023-09-29 16:07:45'),
(8, 'raja', 'raja@gmail.com', 'raja.jpg', '$2y$10$L3znkgBcwkipngRl9UIogujl6SR3EbE16momQWBNktY6iKxI3ioFa', 'sonali street, sivakasi', '::1', '7869012345', '2023-09-29 16:08:22'),
(10, 'kajal', 'kajal@gmail.com', 'kajal.jpg', '$2y$10$VX7Zatt0IllyQFRpFhCDdOVAxWEkNd/y8pQy1GSEJosVx4pUA1.Bi', 'chennai', '::1', '7891234567', '2023-10-04 15:31:13'),
(11, 'mareesh', 'mareesh@gmail.com', 'mareesh.jpg', '$2y$10$GpQ2K6dFFy6COg4.eZidm.955ULGqGuMsi2MUvym03HLJ7juT6Ciy', '44 street , sounth.', '::1', '7645634561', '2023-10-04 03:18:59'),
(12, 'ganesh', 'ganesh@gmail.com', 'kamalesh.jpg', '$2y$10$pg1nlRcn9rnRKUIu2C7zduV.9CW8ik0lhg/EAr1nBoIvo6.tZfYnC', '44/2 south street, chennai.', '::1', '7891234567', '2023-10-04 15:04:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `final`
--
ALTER TABLE `final`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `final`
--
ALTER TABLE `final`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
