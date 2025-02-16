-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 05:33 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Bharat_Patel', '5278c943e6342d3ca900f3e97cb5a23c35f266cc'),
(2, 'Jay_Rupapara', '5c03d5d446798d0024664a6d987dd4735737a6d1');

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `person` int(2) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `msg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`fname`, `lname`, `email`, `number`, `person`, `date`, `time`, `msg`) VALUES
('aarti', 'kaneriya', 'arti@gmail.com', '9978887008', 2, '2023-09-30', '11:45:00', 'prepare our food');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 1, 'bharat', 'bharatmungalpara664@gmail.com', '7698963943', 'hii');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `des` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `des`) VALUES
(1, 'Vaggie Burger', 'Burgers', 160, 'b-1.jpeg', 'A patato patty'),
(2, 'paneer Burger', 'Burgers', 200, 'b-2.jpeg', 'A paneer patty'),
(3, 'Maharaja Burger', 'Burgers', 220, 'b-3.jpeg', 'A 2 cheese patty'),
(4, 'Cheese Frankie', 'Frankies', 135, 'frankie-1.jpg', 'With Cheese '),
(5, 'Schezwan Frankie', 'Frankies', 120, 'frankie-2.jpg', 'With Schezwan sause '),
(6, 'Mayo Schezwan Frankie', 'Frankies', 145, 'frankie-3.jpg', 'With mayo and Schezwan sause '),
(7, 'Mexican Fiesta Pizza', 'pizzas', 700, 'pizza-1.jpg', ' Flavourful mix of red capsicum, green capsicum'),
(8, 'American Cheesy Pizza', 'pizzas', 400, 'pizza-2.jpg', 'Our divine peruvian flavoured cheesy sauce'),
(9, 'Tandoori Paneer', 'pizzas', 350, 'pizza-3.jpg', ' It&#39;s our signature. Spiced Paneer'),
(10, 'Paneer Chilli Dry', 'Pastas', 250, 'pasta-1.png', 'Dice coated fried paneer, onion'),
(11, 'Pink Panther Pasta', 'Pastas', 300, 'pasta-2.png', 'Red sauce & rich cream '),
(12, 'White Sauce Pasta', 'Pastas', 200, 'pasta-3.png', 'Onion, capsicum, sweet corn, mushrooms,'),
(13, 'Farali French Fries', 'Fries', 70, 'fries-1.png', 'Crispy golden French '),
(14, 'Masala French Fries', 'Fries', 100, 'fries-2.png', 'Crispy golden Masala French fries '),
(15, 'Cheese Loaded French Fries', 'Fries', 200, 'fries-3.png', 'Crispy Fries with cheese'),
(16, 'Hot Jamun ', 'Desserts', 80, 'dessert-1.png', 'Hot jamun is milk solid based'),
(17, 'Chocolate Mousse Cup', 'Desserts', 150, 'dessert-2.png', 'Airy and creamy chocolate '),
(18, 'Choco Lava Cup', 'Desserts', 180, 'dessert-3.png', 'Melty Chocolate filled in cupcake'),
(19, 'Jamun Juice', 'Juices', 150, 'juice-1.png', 'jamun juice'),
(20, 'Orange Juice', 'Juices', 100, 'juice-2.png', 'With pulp of Orange '),
(21, 'Watermelon Juice', 'Juices', 180, 'juice-3.png', 'Watermelon '),
(22, 'Pepsi Black Medium', 'Cold Drinks', 80, 'cold_drink-1.png', 'Pepsi Black'),
(23, 'Coke', 'Cold Drinks', 150, 'cold_drink-2.png', 'The perfect companion to your burger'),
(24, 'Red Bull', 'Cold Drinks', 200, 'cold_drink-3.png', 'Original taste soft drink');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `number`, `password`, `address`) VALUES
(1, 'Bharat', 'Patel', 'bharatmungalpara664@gmail.com', '7698963943', '99f29d310ed72b3e131c48266feba13ef107f886', 'fgsd, sfg, sdfgsf, gsfgs, fsdfgsdf, sdfs, dfsfds - 360003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
