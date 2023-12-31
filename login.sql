-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 09:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `mis_data`
--

CREATE TABLE `mis_data` (
  `run_dt` datetime NOT NULL,
  `w_shift` char(1) NOT NULL,
  `w_unit` varchar(2) NOT NULL,
  `ga_mwhr_s` float NOT NULL,
  `ga_mwhr_e` float NOT NULL,
  `gen_act` float NOT NULL,
  `gr_mvar_s` float NOT NULL,
  `gr_mvar_e` float NOT NULL,
  `gen_react` float NOT NULL,
  `ua_mwhr_s` float NOT NULL,
  `ua_mwhr_e` float NOT NULL,
  `uat_act` float NOT NULL,
  `res_sort_fal` varchar(250) DEFAULT NULL,
  `short_fall1` float NOT NULL,
  `short_fall2` float NOT NULL,
  `short_fall3` float NOT NULL,
  `short_fall4` float NOT NULL,
  `reason1` varchar(100) DEFAULT NULL,
  `reason2` varchar(100) DEFAULT NULL,
  `reason3` varchar(100) DEFAULT NULL,
  `reason4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mis_data`
--

INSERT INTO `mis_data` (`run_dt`, `w_shift`, `w_unit`, `ga_mwhr_s`, `ga_mwhr_e`, `gen_act`, `gr_mvar_s`, `gr_mvar_e`, `gen_react`, `ua_mwhr_s`, `ua_mwhr_e`, `uat_act`, `res_sort_fal`, `short_fall1`, `short_fall2`, `short_fall3`, `short_fall4`, `reason1`, `reason2`, `reason3`, `reason4`) VALUES
('2023-06-29 00:00:00', 'B', '3', 45, 56, 0, 78, 22, 0, 787, 455, 0, 'Removal is ok', 350, 450, 200, 610, 'Heavy rain', 'Electric Outstation', 'Invalid removal of Shift worker', 'DFO low anms'),
('2023-06-07 00:00:00', 'B', '4', 45, 56, 11, 78, 43, 35, 787, 646, 141, '', 324, 345, 645, 345, 'Insufficient', 'Upshoot', 'Reposliona effecyt', 'DFO low anms'),
('2023-06-29 00:00:00', 'C', '5', 40, 50, 10, 20, 40, 20, 60, 30, 30, 'Life is fucked', 350, 450, 200, 610, 'dsfg', 'Electric Outstation', 'Invalid removal of Shift worker', 'DFO low anms'),
('2023-07-15 03:53:00', 'C', '4', 45, 50, 5, 20, 22, 2, 787, 30, 757, 'Removal is ok', 350, 450, 200, 610, 'Heavy rain', 'gdfs', 'Invalid removal of Shift worker', 'DFO low anms');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, '2105719', '$2y$10$5G8Oal4o6.tomiyzVYdso.VBjX0ZxSAxB4aeUzvhRpUhnCZHfdH8.', '2023-06-27 23:01:49'),
(2, 'hkm49906@gmail.com', '$2y$10$.6l3GzULndqvBDRu0yXVpOyhbcD6my/cQHqnMniYD87GfijuuGHX2', '2023-06-28 00:39:14'),
(3, 'Aditya', '$2y$10$1o8GS8PlIq1KhiwztDndiessm7//6O/nwdaJLBAjch./vPU44EcHK', '2023-06-28 00:49:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
