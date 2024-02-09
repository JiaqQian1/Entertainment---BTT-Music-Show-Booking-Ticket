-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 06:59 PM
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
-- Database: `musicshow`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `card_cvc` varchar(4) NOT NULL,
  `expiry_month` varchar(5) NOT NULL,
  `expiry_year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `full_name`, `nick_name`, `email`, `dob`, `gender`, `payment_method`, `card_number`, `card_cvc`, `expiry_month`, `expiry_year`) VALUES
(1, 'Starry', 'Tan', 'starry@gmail.com', '2024-02-07', 'on', 'on', '1111 2342 2134 2', '1212', '02 JU', '2024'),
(2, 'Tan', ' Shu Yan', 'shuyan@gmail.com', '2024-02-08', 'on', 'on', '1112 2024 2534 1', '1425', '07 Fe', '2024'),
(3, 'Tan', 'Zhi Tong', 'zhitong@gmail.com', '2003-02-07', 'on', 'on', '1111 4152 5555 6', '1222', '09 Fe', '2024'),
(4, 'Starry', 'Tan', 'starry100@gmail.com', '2004-05-05', 'on', 'on', '1000 2505 4444 1', '425', '08 Fe', '2024');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
