-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 03:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `the_outer_clove`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `contact_no`, `username`, `password`) VALUES
(5, 'Mohamed Shabri', 'shabri55mohomed@gmail.com', '0771234567', 'Admin', 'Admin'),
(6, 'John Doe', 'hwdhau2@gmail.com', '0771234567', 'John', 'john1234'),
(13, 'Mohamed Shabri', 'shabri55mohomed@gmail.com', '0771234567', 'Admin2', 'admin1234'),
(14, 'Mohamed Shabri', 'Shabri55mohomed@gmail.com', '0771234567', 'Shabri', 'shabri1234');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `customer_email` varchar(55) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `address` varchar(225) NOT NULL,
  `item_name` varchar(55) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_email`, `customer_phone`, `address`, `item_name`, `quantity`) VALUES
(29, 'Shabri', 'Shabri55mohomed@gmail.com', '0771234567', 'Kurunegala', 'Grilled Salmon', 2),
(30, 'Dhanupa', 'dhanupa@gmail.com', '0773216547', 'Anuradhapura', 'Shrimp Scampi', 2),
(31, 'Akila', 'Akila@gmail.com', '0721234567', 'Horowpathana', 'Strawberry Cheesecake', 1),
(32, 'Menadh', 'Menad@gmail.com', '0781234567', 'Uyandana', 'Chicken Alfredo Pasta', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`) VALUES
(6, 'Chicken Alfredo Pasta'),
(7, 'Margherita Pizza'),
(8, 'Grilled Salmon'),
(9, 'Vegetarian Sushi Rolls'),
(10, 'Shrimp Scampi'),
(11, 'Caprese Salad'),
(12, 'Vegetable Pad Thai'),
(13, 'Classic Caesar Salad'),
(14, 'Chicken Quesadilla'),
(15, 'Chocolate Lava Cake'),
(16, 'Strawberry Cheesecake');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `person` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `phone`, `person`, `reservation_date`, `reservation_time`, `message`) VALUES
(14, 'Mohamed Shabri', '0771234567', 2, '2024-01-04', '11:00:00', 'Hello'),
(15, 'Dhanupa', '0773216547', 2, '2024-01-10', '12:00:00', 'Hi'),
(16, 'Akila', '0773215697', 1, '2024-01-17', '08:00:00', 'Hello'),
(17, 'Menadh', '0781234567', 1, '2024-01-16', '11:00:00', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `password` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `firstName`, `lastName`, `username`, `email`, `contactNo`, `password`) VALUES
(3, 'Mohamed', 'Shabri', 'Staff1', 'Shabri55mohomed@gmail.com', '0771234567', 'staff1234'),
(4, 'Dhanupa', 'Kolaba', 'Staff2', 'dhanupa@gmail.com', '0771234567', 'staff12345');

-- --------------------------------------------------------

--
-- Table structure for table `userfb`
--

CREATE TABLE `userfb` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userfb`
--

INSERT INTO `userfb` (`id`, `fullName`, `email`, `message`) VALUES
(12, 'Mohomed Shabri', 'Shabri55mohomed@gmail.com', 'Is delivery charges free?'),
(13, 'Akila ', 'Akila@gmail.com', 'Whats special today?'),
(14, 'Dhanupa', 'Dhanupa@gmail.com', 'is new year promotions still valid?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(55) NOT NULL,
  `lastName` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `username`, `email`, `contactNo`, `password`) VALUES
(23, 'Mohomed', 'Shabri', 'Shabri', 'Shabri55mohomed@gmail.com', '0771234567', 'Shabri1234'),
(24, 'Eren', 'Yeager', 'Eren', 'Eren@gmail.com', '0773216547', 'Eren12345'),
(25, 'Peter', 'Griffin', 'Peter', 'Peter@gmail.com', '0771239874', 'peter1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userfb`
--
ALTER TABLE `userfb`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userfb`
--
ALTER TABLE `userfb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
