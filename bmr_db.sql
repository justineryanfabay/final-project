-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 01:25 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bmr_tb`
--

CREATE TABLE `bmr_tb` (
  `id` int(200) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `bmr` float NOT NULL,
  `recorded_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bmr_tb`
--

INSERT INTO `bmr_tb` (`id`, `first_name`, `last_name`, `gender`, `age`, `weight`, `height`, `bmr`, `recorded_on`) VALUES
(1, 'Soobin', 'Choi', 'male', 21, 63, 185, 1686.25, '2021-12-24 08:47:04'),
(2, 'Beomgyu', 'Choi', 'female', 20, 54, 180, 1404, '2021-12-24 08:56:47'),
(3, 'Justine Ryan', 'Fabay', 'male', 21, 45, 166, 1387.5, '2021-12-28 06:49:07'),
(4, 'Kai Kamal', 'Huening', 'male', 19, 61, 187, 1688.75, '2022-01-02 12:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmr_tb`
--
ALTER TABLE `bmr_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmr_tb`
--
ALTER TABLE `bmr_tb`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
