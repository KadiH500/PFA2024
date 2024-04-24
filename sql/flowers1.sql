-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 22 Avril 2024 à 17:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `flowers`
--

-- --------------------------------------------------------

--
-- Structure de la table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('acheteur','fleuriste','','') NOT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `role`) VALUES
(4, 'meriam000', 'cherifmeriam004@gmail.com', '$2y$10$NUnxqwGrfV185', 'acheteur'),
(5, 'meriam000', 'cherifmeriam004@gmail.com', '$2y$10$7yIPIXWWs.PHE', 'acheteur'),
(6, 'kiki', 'cherif11223344@gmail.co', '$2y$10$XYqiWNfTBOado', 'acheteur'),
(7, '', '', '$2y$10$.htbtjKWHpx7p', 'acheteur');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `name` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `price` decimal(3,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stock`
--

INSERT INTO `stock` (`name`, `id`, `qte`, `price`) VALUES
('flower 1', 0, 3, '0.00'),
('flower 2', 1, 2, '0.00'),
('flower 3', 2, 4, '0.00'),
('flower 4', 3, 5, '0.00'),
('flower 5', 4, 1, '0.00'),
('flower 6', 5, 1, '0.00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `codepostal` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
