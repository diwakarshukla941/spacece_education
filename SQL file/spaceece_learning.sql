-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 12:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spaceece_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_address`
--

CREATE TABLE `child_address` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_address`
--

INSERT INTO `child_address` (`id`, `child_id`, `address_line1`, `address_line2`, `city`, `state`, `zipcode`) VALUES
(1, 9, 'HILL  NO -3', 'asdas', 'MUMBAI', 'MAHARASHTRA', '400072'),
(2, 10, 'HILL  NO -3', '1', 'MUMBAI', 'MAHARASHTRA', '400072'),
(3, 11, 'Bj', '1231', 'Hhn', 'Maharashtra', '400075'),
(4, 12, 'Bj', '2', 'Hhn', 'Maharashtra', '400075'),
(5, 13, 'Bj', '222', 'Hhn', 'Maharashtra', '400075'),
(6, 14, 'HILL  NO -3', 'asdas', 'MUMBAI', 'MAHARASHTRA', '400072'),
(7, 14, 'HILL  NO -3', 'asdas', 'MUMBAI', 'MAHARASHTRA', '400072'),
(8, 15, 'HILL  NO -3', '121121', 'MUMBAI', 'MAHARASHTRA', '400072'),
(9, 16, 'HILL  NO -3', '12121', 'MUMBAI', 'MAHARASHTRA', '400072'),
(10, 17, 'HILL  NO -3', 'sadsd', 'MUMBAI', 'MAHARASHTRA', '400072'),
(11, 18, 'Bj2', 'sad', 'Hhn', 'Maharashtra', '400075'),
(12, 19, 'HILL  NO -3', '121', 'MUMBAI', 'MAHARASHTRA', '400072'),
(13, 21, 'HILL  NO -3', '12121', 'MUMBAI', 'MAHARASHTRA', '400072'),
(14, 21, 'HILL  NO -3', '12121', 'MUMBAI', 'MAHARASHTRA', '400072');

-- --------------------------------------------------------

--
-- Table structure for table `child_info`
--

CREATE TABLE `child_info` (
  `id` int(11) NOT NULL,
  `child_name` varchar(100) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `appointment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_info`
--

INSERT INTO `child_info` (`id`, `child_name`, `photo`, `age`, `user_id`, `appointment_date`) VALUES
(9, 'rohan', 'uploads/675819203b6f4_portfolio_pic3.png', 0, 1, '2024-12-11'),
(10, 'rohan', 'uploads/6758209d27c94_portfolio_pic3.png', 0, 1, '2024-12-11'),
(11, 'ajay', 'uploads/6758245ec1510_user.png', 3, 2, '2024-12-11'),
(12, 'roshan', 'uploads/675824f477bd9_50 days leetcode badge.png', 1, 2, '2024-12-11'),
(13, 'rachit', 'uploads/6758252fefb19_portfolio_pic (1).png', 0, 2, '2024-12-28'),
(14, 'ads', 'uploads/6758258a4885a_user.png', 2, 2, '2024-12-20'),
(15, 'rachit2', 'uploads/67583c3a299fa_bangles.jpg', 5, 1, '2024-12-28'),
(16, 'rachit2', 'uploads/67583c5c607b6_bangles.jpg', 0, 1, '2024-12-28'),
(17, 'mohan', 'uploads/6759260abb0bc_user.png', 4, 11, '2024-12-19'),
(18, 'rachit', 'uploads/67593c5198caa_user.png', 2, 6, '2024-12-25'),
(19, 'child 1', 'uploads/6759650d92183_user.png', 4, 1, '2024-12-13'),
(20, 'sadjh', 'uploads/675966854b6d3_user.png', 1, 1, '2024-12-12'),
(21, 'sadjh', 'uploads/675977628be43_user.png', 0, 6, '2024-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(220) NOT NULL,
  `fullname` varchar(212) NOT NULL,
  `email` varchar(222) NOT NULL,
  `contact_no` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `role` enum('Parent','Champion') NOT NULL DEFAULT 'Parent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `email`, `contact_no`, `password`, `role`) VALUES
(1, 'diwakar shukla', 'shukladiwakar941@gmail.com', '9619934237', '$2y$10$weQuN3/jkbqFRxUo2H9Mue3VAR4sKIbVddp8VY7WuHTMLOc10jHDm', 'Parent'),
(2, 'diwakar shukla', 'shukladiwakar003@gmail.com', '9619934236', '$2y$10$TZrfOY2JMK/N84TtPEq0ReX6MjahqAuNpjNE2skwXOsskms8b7CZm', ''),
(4, 'diwakar shukla', 'admin@enpointe.io', '9167003344', '$2y$10$tojjcNTYkzomuRGQ800NuuSTeQXaBgA9PYe16LMaBPQaG/UgmcJoG', ''),
(5, 'diwakar shukla', 'check@admin.com', '9656567448', '$2y$10$6KYBDQt1njufEiJVNdsuTeXWVn7Ve/WWes88OQ5/3Uh60UPOGF4H2', ''),
(6, 'NETAJI NAGAR', 'admin@admin', '9619935337', '$2y$10$CieiS0m9IbQ9JTjHWs/Wh.F4Z0lJQeIESVclR1Mn/ZjoEq4X6cofq', 'Champion'),
(7, 'diwakar', 'padding@gmail.com', '9619965665', '$2y$10$fPEb8/XBKbBhGNaNhjn9l./E5HojSZvUcFPOjMOgqmu5W/g.FHoY2', 'Champion'),
(8, 'test', 'test@gmail.com', '123112311231', '$2y$10$IzPoWjaGKgAX4Ell3yUF3eFbc23MwMkvK6gkBK58I4s7etitAETam', 'Champion'),
(9, 'test', 'testing@gmail.com', '123112311231', '$2y$10$iOsUVx3uZj/6E8U60utUruRF1Dy5IJOvhZP6befDHULOwfjWPA9Se', 'Champion'),
(10, 'test', 'testing2@gmail.com', '123112311231', '$2y$10$8q3Va9hANUz.YliAqJxEyetQ5uIOd5nBvTi57x8D8U/2MESL28CEW', 'Champion'),
(11, 'diwakar shukla', 'check1@gmail.com', '9619953788', '$2y$10$gln1HCZiiqoVEjONjPGl1.vlJpu.x.kOZHbWyrCY0RKpQVZXCPArq', 'Parent'),
(12, 'champion', 'champion@gmail.com', '9656565665', '$2y$10$X7DsX/nl0TRSMy7ZTKmf6uum.hgZbkvjEGLhlNkMZaRQEKz8ilmhS', 'Champion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_address`
--
ALTER TABLE `child_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `child_info`
--
ALTER TABLE `child_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_address`
--
ALTER TABLE `child_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `child_info`
--
ALTER TABLE `child_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(220) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child_address`
--
ALTER TABLE `child_address`
  ADD CONSTRAINT `child_address_ibfk_1` FOREIGN KEY (`child_id`) REFERENCES `child_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `child_info`
--
ALTER TABLE `child_info`
  ADD CONSTRAINT `child_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
