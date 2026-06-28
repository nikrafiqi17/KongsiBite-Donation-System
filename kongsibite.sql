-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2026 at 02:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kongsibite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(2024273712, 'KongsiBiteAdmin', '2024273712');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `donation_date` date NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `transfer_ref` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `place_name` varchar(100) DEFAULT NULL,
  `progress_status` varchar(20) DEFAULT 'No Progress Yet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `email`, `amount`, `donation_date`, `payment_method`, `transfer_ref`, `status`, `place_name`, `progress_status`) VALUES
(4, 'nikrafiqi15@gmail.com', 50.00, '2026-06-20', 'DuitNow QR', '18254767299', 'Approved', 'Tempat Gelandangan Raub', 'No Progress Yet'),
(8, 'nikrafiqi15@gmail.com', 65.00, '2026-06-24', 'DuitNow QR', '8658128RHBMY345', 'Approved', 'Pusat Tahfiz Raub', 'No Progress Yet'),
(9, 'nikrafiqi15@gmail.com', 10.00, '2026-06-25', 'DuitNow QR', '932671RHBMY7123', 'Approved', 'Mosque Community Fund', 'No Progress Yet'),
(10, 'aisyah@gmail.com', 1000.00, '2026-06-25', 'DuitNow QR', '92647355RHBMY8123', 'Approved', 'Mosque Community Fund', 'No Progress Yet'),
(11, 'aisyah@gmail.com', 2000.00, '2026-06-25', 'DuitNow QR', '8658128RHBMY345', 'Approved', 'School Food Program', 'No Progress Yet');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `pass`) VALUES
('haikalfikh@gmail.com', '1234'),
('nikrafiqi15@gmail.com', '123456789'),
('aisyah@gmail.com', '1234567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2024273713;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
