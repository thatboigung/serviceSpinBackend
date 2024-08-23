-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2024 at 11:56 PM
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
-- Database: `servicespin`
--

-- --------------------------------------------------------

--
-- Table structure for table `srvc_prders`
--

CREATE TABLE `srvc_prders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bio` longtext DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `profilePic` longtext NOT NULL,
  `serviceName` varchar(32) NOT NULL,
  `serviceDesc` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `location` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `srvc_prders`
--

INSERT INTO `srvc_prders` (`id`, `user_id`, `bio`, `name`, `profilePic`, `serviceName`, `serviceDesc`, `price`, `location`) VALUES
(2, 1, 'I am a skilled and reliable plumber with over 15 years of experience in the plumbing industry. Known for his dedication to quality workmanship and customer satisfaction, John has built a reputation as a trusted professional who consistently delivers top-notch service. From fixing leaky faucets to installing complex plumbing systems, John combines technical expertise with a friendly and approachable demeanor, making him the go-to plumber for both residential and commercial clients.', 'Tapuwa Mapfumo', 'WIN_20240226_21_52_26_Pro.jpg', 'Plumbing', 'Our plumbing service offers comprehensive solutions for all your plumbing needs. Whether you\'re dealing with a clogged drain, a malfunctioning water heater, or need a complete plumbing overhaul, we have the expertise to get the job done right. We pride ourselves on prompt, efficient service and use only high-quality materials to ensure lasting results. With a focus on transparent pricing and customer care, we\'re committed to providing you with a hassle-free experience from start to finish. Trust us to handle your plumbing issues with professionalism and precision.', 100, 'Lusaka');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `srvc_prders`
--
ALTER TABLE `srvc_prders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `srvc_prders`
--
ALTER TABLE `srvc_prders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
