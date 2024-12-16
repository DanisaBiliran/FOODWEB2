-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 08:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `fruitsvegetables`
--

CREATE TABLE `fruitsvegetables` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `location_stored` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `shelf_life` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grainscerials`
--

CREATE TABLE `grainscerials` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `location_stored` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `shelf_life` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meatsdairy`
--

CREATE TABLE `meatsdairy` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `location_stored` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `shelf_life` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sweets`
--

CREATE TABLE `sweets` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `location_stored` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `shelf_life` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'huhu', '$2y$10$tFbwXpQ43qnDcuiAwt7vnepcIgMInG.ZxcEOzVjPjN6FDc86eliIa'),
(2, 'hehe', '$2y$10$wV34lM.UuLgslLiBU9uPkepndnzuj/VuNXJAUaZ14Vq/FIjXn6kDK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fruitsvegetables`
--
ALTER TABLE `fruitsvegetables`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `grainscerials`
--
ALTER TABLE `grainscerials`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `meatsdairy`
--
ALTER TABLE `meatsdairy`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `sweets`
--
ALTER TABLE `sweets`
  ADD PRIMARY KEY (`foodID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fruitsvegetables`
--
ALTER TABLE `fruitsvegetables`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grainscerials`
--
ALTER TABLE `grainscerials`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meatsdairy`
--
ALTER TABLE `meatsdairy`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sweets`
--
ALTER TABLE `sweets`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
