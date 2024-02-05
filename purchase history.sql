-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 05:25 PM
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
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `music_show` varchar(255) NOT NULL,
  `show_type` varchar(20) NOT NULL,
  `show_date` date NOT NULL,
  `show_time` time NOT NULL,
  `show_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`id`, `login_id`, `music_show`, `show_type`, `show_date`, `show_time`, `show_location`) VALUES
(1, 1, 'BlackPink Concert', 'Concert', '2023-06-15', '00:06:06', 'The Sail Melaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  DROP PRIMARY KEY,
  ADD PRIMARY KEY (`id`, `login_id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD CONSTRAINT `fk_login_id_history` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
