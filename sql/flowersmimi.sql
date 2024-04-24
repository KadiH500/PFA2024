-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Avril 2024 à 02:43
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
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `flowers` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `signup`
--

CREATE TABLE IF NOT EXISTS `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` enum('acheteur','fleuriste','','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `password`, `role`) VALUES
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `ville`, `adresse`, `codepostal`, `phone`) VALUES
(19, 'mounir', 'Bizerte', 'aaaaaaaaaaaaa', '1234', '98601370');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`id`) REFERENCES `signup` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
