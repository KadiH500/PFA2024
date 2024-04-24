-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2024 at 02:55 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowers`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `datetime` datetime NOT NULL,
  `flowers` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `customer_id`, `datetime`, `flowers`) VALUES
(1, 15, '2024-04-23 22:28:36', '1xFlower 2, 1xFlower 3'),
(2, 15, '2024-04-23 23:45:31', '1xFlower 2, 1xFlower 3'),
(3, 15, '2024-04-23 23:53:54', '1xFlower 2, 1xFlower 3, 1xFlower 5'),
(4, 15, '2024-04-24 00:04:39', '1xFlower 1, 1xFlower 2, 1xFlower 3, 1xFlower 4'),
(5, 15, '2024-04-24 00:12:32', '1xFlower 3, 1xFlower 4');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(300) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` enum('acheteur','fleuriste','','') NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `role`) VALUES
(13, 'benmansou', 'ff@gmail.com', '$2y$10$FF3LmRnvUs.6wef933ro/.dccP1a6pSwsQ6HCDt/KgxXk8THojs8K', 'acheteur'),
(14, 'test', 'test@gg.com', '$2y$10$YOV9w.tqmoxZ2uxW1qb/RuK9meal4w1HBAUPazdL.3pNsNVk0sVxG', 'acheteur'),
(15, 'test2', 'fef9@gmail.com', '$2y$10$2eGgkh3nttqx59pdiMs4Fe0auTuO2re/QekdJMCqyiunj6aoBdSIu', 'acheteur'),
(16, 'test1', 'medival6hh9@gmail.com', '$2y$10$JFz8ZU3YMIrU0xu6Y8sImuXj9NcxboBTUWzC/eIXH.8kQpQ79QprW', 'fleuriste'),
(19, '', '', '$2y$10$Wu0FKtknlB/YWm6PFzjuEezkUeVLgLYp7X0mV0sG0mH0rRTk5HJtm', ''),
(20, 'meriam000', 'cherifmeriam004@gmail.com', '$2y$10$iCFDlwtQ317/JfipU1cNC.aaNi/IOjX/UeHTUs752UkQDVRzT4NPa', 'acheteur'),
(21, 'mimi', 'qqq@gmail.com', '$2y$10$0OWRPVc2qrcv9KMdDXUZsuYtLzu6SdbgBGmiilHokNyGBRRkUJ87q', 'acheteur'),
(22, 'mimi11', 'cherifmeri004@gmail.com', '$2y$10$A0T1zqcjOxboJtiHhqcTF.gyRmHKnWVUlQh9I8bdYMJxBEP5gH4C2', 'acheteur'),
(23, 'mimi33', 'cherif04@gmail.com', '$2y$10$yANMdfjQtPupPLThJ39jzuiTjUozFwIDB408cSV5Ajm8reqleK6EW', 'acheteur'),
(25, 'koura', 'koura@gmail.com', '$2y$10$f0xSVIKeMPaGYk6TtA2VJO1bmlyX0qHocFW3BAf9fDx/asHVFDNHu', 'acheteur'),
(26, 'www', 'www@gmail.com', '$2y$10$RBF37JpfH.g12tQ52eO8vOU5LuHzxe6cg3vgySOnQZARcvfum/t3O', 'acheteur'),
(27, 'mamii', 'mamii@gmail.com', '$2y$10$WZLM3FlFXUQ0AkYwauLzm.1//PWaDE.MubHal.Gfmf0aqQ5HOrpsG', 'acheteur'),
(28, 'ahmed', 'ahmed@gmail.com', '$2y$10$tce4fXmDPEyoxHbbuoTu0eths8eDDJQgZ.61IZbVsKy40GP.haYgq', 'acheteur');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `cat` varchar(20) NOT NULL,
  `qte` int NOT NULL,
  `price` double(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `cat`, `qte`, `price`) VALUES
(1, 'ff', 'gg', 3, 9.99),
(2, 'ff', 'gg', 2, 9.99),
(3, 'ff', 'gg', 4, 9.99),
(4, 'ff', 'gg', 5, 9.99),
(5, 'ff', 'gg', 1, 9.99),
(6, '', '', 0, 0.00),
(7, 'test', '', 0, 0.00),
(23, 'ahmed', 'gg', 5, 5.00),
(24, 'warda', 'hamra', 6, 9.99),
(25, 'warda2', 'gg', 5, 20.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `codepostal` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `ville`, `adresse`, `codepostal`, `phone`) VALUES
(15, 'mounir', 'Bizerte', 'aaaaaaaaaaaaa', '1234', '98601370'),
(19, 'mounir', 'Bizerte', 'aaaaaaaaaaaaa', '1234', '98601370');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `signup` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
