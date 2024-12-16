-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 09:58 PM
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
  `location_stored` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `shelf_life` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fruitsvegetables`
--

INSERT INTO `fruitsvegetables` (`foodID`, `foodName`, `location_stored`, `notes`, `expiration_date`, `shelf_life`, `created_at`, `user_id`) VALUES
(29, 'eggplant', 'shelf', 'dsadsada', '2024-12-31', 1, '2024-12-15 14:59:01', 0),
(30, 'dsad', 'dsasda', 'dsadsa', '2024-12-18', 13, '2024-12-15 15:12:26', 0),
(31, 'eggplant', '2', '11', '2024-12-18', 25, '2024-12-15 15:35:39', 0),
(32, 'dsa', '1', 'dsa', '2024-12-19', 21, '2024-12-15 15:36:35', 0),
(33, 'eggplant', 'fds', 'dfwsadf', '2024-12-20', 1, '2024-12-15 16:10:39', 0),
(34, 'eggplant', 'hello', 'nice', '2024-12-21', 1, '2024-12-15 16:51:06', 0),
(35, 'vejsl', '', '', '0000-00-00', 12, '2024-12-15 19:24:04', 0),
(36, '12', '', '', '0000-00-00', 24321, '2024-12-15 19:24:17', 0),
(37, 'eggplant', 'dasdsa', 'dsas', '2024-12-01', 1, '2024-12-15 19:28:53', 0),
(38, 'dsa', 'dsa', 'dsa', '0000-00-00', 1, '2024-12-15 20:05:49', 0),
(40, 'eggplant', '1', '2121', '0000-00-00', 1, '2024-12-15 20:20:55', 3);

-- --------------------------------------------------------

--
-- Table structure for table `grainscerials`
--

CREATE TABLE `grainscerials` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `location_stored` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `shelf_life` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grainscerials`
--

INSERT INTO `grainscerials` (`foodID`, `foodName`, `location_stored`, `notes`, `expiration_date`, `shelf_life`, `created_at`, `user_id`) VALUES
(29, 'dsaf', 'dsasda', 'dsadsa', '0000-00-00', 1, '2024-12-15 18:58:34', 0),
(30, 'eggplant', 'dsadsa', 'dsadsa', '0000-00-00', 1, '2024-12-15 19:01:07', 0),
(35, 'hello', 'dsa', 'dsads', '0000-00-00', 1, '2024-12-15 20:17:50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `meatsdairy`
--

CREATE TABLE `meatsdairy` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `location_stored` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `shelf_life` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meatsdairy`
--

INSERT INTO `meatsdairy` (`foodID`, `foodName`, `location_stored`, `notes`, `expiration_date`, `shelf_life`, `created_at`, `user_id`) VALUES
(3, 'hamburger', 'shelf', 'eat', '2024-12-26', 24321, '2024-12-15 14:09:32', 0),
(5, 'dsadsa', 'shelf', 'dsad', '2024-12-18', 0, '2024-12-15 14:09:32', 0),
(7, '1', '1', '1', '0000-00-00', 1, '2024-12-15 16:24:35', 0),
(8, 'dsasda', 'shelf', 'dsa', '0000-00-00', 1, '2024-12-15 16:28:35', 0),
(9, '1', '1', '1', '0000-00-00', 1, '2024-12-15 16:48:51', 0),
(10, 'eggplant', 'dsa', 'dsadsa', '0000-00-00', 1, '2024-12-15 17:11:36', 0),
(11, 'eggplant', 'dsas', 'dsadsa', '0000-00-00', 1, '2024-12-15 19:43:45', 3),
(12, 'hello', '1', '1', '2024-12-01', 0, '2024-12-15 19:44:06', 3),
(13, 'dsa', '1', '1', '0000-00-00', 1, '2024-12-15 20:02:10', 3),
(14, 'nice', '1', '11', '0000-00-00', 1, '2024-12-15 20:03:26', 3),
(15, 'nice', '', '', '0000-00-00', 1, '2024-12-15 20:14:24', 3),
(16, 'fuck coding', '', '', '0000-00-00', 0, '2024-12-15 20:14:31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sweets`
--

CREATE TABLE `sweets` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(255) NOT NULL,
  `location_stored` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `shelf_life` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sweets`
--

INSERT INTO `sweets` (`foodID`, `foodName`, `location_stored`, `notes`, `expiration_date`, `shelf_life`, `created_at`, `user_id`) VALUES
(4, 'cake', 'shelf', 'fjdslajdflas', '2024-12-21', 24321, '2024-12-15 14:09:32', 0),
(5, 'eggplant', 'shelf', 'sdada', '2024-12-28', 24321, '2024-12-15 14:09:32', 0),
(6, 'hello', 'fdasf', 'dsadsada', '0000-00-00', 1, '2024-12-15 17:02:04', 0),
(7, 'eggplant', '123', '3213', '0000-00-00', 1, '2024-12-15 17:09:24', 0),
(10, '1', '1', '1', '0000-00-00', 1, '2024-12-15 19:50:07', 3),
(11, 'hello', 'fdas', 'fda', '0000-00-00', 1, '2024-12-15 19:59:52', 3),
(12, 'oks', 'dsa', 'dsa', '0000-00-00', 1, '2024-12-15 20:15:15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_id`) VALUES
(1, 'huhu', '$2y$10$tFbwXpQ43qnDcuiAwt7vnepcIgMInG.ZxcEOzVjPjN6FDc86eliIa', 0),
(2, 'hehe', '$2y$10$wV34lM.UuLgslLiBU9uPkepndnzuj/VuNXJAUaZ14Vq/FIjXn6kDK', 0),
(3, 'hatdog', '$2y$10$b5Fs7ze.CQz4OrLa8apoVuHEE7aY7qyXtWeEpOgO5Ta6gcXDwnXoe', 0),
(4, 'lolz', '$2y$10$j1oWZU4Tv89cNCqKUXKGVeuhXarB/3MJsNqfW1JAWze/M/vmjQp3G', 0),
(5, 'dsjahkdhsakh', '$2y$10$Q0RwJgbtq9LF63sjgakkruv/.9wWxyOoUYFxcaiLzVjXx0VycBHwS', 0),
(6, 'hello', '$2y$10$KaAiqCrIZxASwyYUQYJ9x.knnHGHDlREcoM25Fqy03CUbqLSxW4Za', 0);

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
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `grainscerials`
--
ALTER TABLE `grainscerials`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `meatsdairy`
--
ALTER TABLE `meatsdairy`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sweets`
--
ALTER TABLE `sweets`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
