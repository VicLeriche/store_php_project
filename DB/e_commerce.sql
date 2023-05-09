-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 mai 2023 à 21:58
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e_commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `desc` text,
  `image` varchar(255) NOT NULL,
  `promo` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_At` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `desc`, `image`, `promo`, `quantity`, `created_At`) VALUES
(1, 'Women\'s Outerwear | ZARA United Kingdom', 150, 'Pour le printemps/été 2017, Zara nous offre une collection ultra tendance, n\'attendez plus pour découvrir notre guide des pièces de Zara Collection 2017 en images.', '2.jpg', NULL, 20, '2022-12-05'),
(2, 'Collection COS - Automne/hiver 2019-2020', 300.99, 'Nouvelle collection pour l\'hiver venez vous faire plaisir', '3.jpg', NULL, 12, '2022-12-05'),
(3, 'La collection Coperni automne-hiver 2022-2023', 200.74, 'fait en cotton très pratique pour l\\\'hiver', '4.jpeg', NULL, 53, '2022-12-05'),
(4, 'collection Gucci', 1500, 'veste en laine', '10.jpg', NULL, 23, '2022-12-14'),
(5, 'chemises chino polo', 800, 'Les allures', '9.jpg', NULL, 54, '2022-12-12'),
(6, 'Costume en laine gris foncé, Pull à col roulé noir', 2000, 'Pense à associer un costume en laine gris foncé avec un pull à col roulé noir pour une silhouette classique et raffinée.', '8.jpg', NULL, 30, '2022-12-28'),
(7, 'mvuatu', 1500, 'Norbat de Paris elu le roi du shopping', '7.jpg', NULL, 11, '2023-01-02'),
(8, 'BLAZER DE COSTUME CAVIAR', 44.99, 'Blazer coupe droite. Col à revers crantés, manches longues et poignets boutonnés. Poche poitrine passepoilée et poches à rabat sur les hanches. Poche intérieure. Ourlet', '5.jpg', NULL, 33, '2023-01-11'),
(9, 'Veste Dolce&Gabana', 800, 'Dolce & Gabbana Milan Collection prêt à porter printemps été Mannequin portant une casquette coton gris, écharpe et veste en cuir kaki', '6.jpg', NULL, 9, '2023-01-23');

-- --------------------------------------------------------

--
-- Structure de la table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `use_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `purchases`
--

INSERT INTO `purchases` (`id`, `use_id`, `prod_id`, `created_at`) VALUES
(16, 2, 3, '2022-12-13 02:12:33'),
(15, 2, 1, '2022-12-13 02:12:33'),
(14, 2, 1, '2022-12-13 02:12:33'),
(13, 2, 8, '2022-12-13 02:12:33'),
(12, 2, 6, '2022-12-13 02:11:08'),
(11, 2, 6, '2022-12-13 02:11:08'),
(10, 2, 5, '2022-12-13 02:11:08'),
(9, 2, 8, '2022-12-13 02:11:08'),
(17, 2, 3, '2023-04-11 21:04:55'),
(18, 2, 1, '2023-04-11 21:04:55'),
(19, 2, 1, '2023-04-11 21:04:55'),
(20, 2, 1, '2023-05-03 16:09:59'),
(21, 2, 3, '2023-05-03 16:09:59'),
(22, 2, 1, '2023-05-03 22:14:07'),
(23, 2, 3, '2023-05-03 22:14:07'),
(24, 2, 8, '2023-05-03 22:14:07'),
(25, 2, 8, '2023-05-03 22:14:07'),
(26, 2, 8, '2023-05-03 22:14:07'),
(27, 2, 8, '2023-05-03 22:14:07'),
(28, 2, 8, '2023-05-03 22:14:07'),
(29, 2, 8, '2023-05-03 22:14:07'),
(30, 2, 8, '2023-05-03 22:14:07'),
(31, 2, 8, '2023-05-03 22:14:07'),
(32, 2, 8, '2023-05-03 22:14:07'),
(33, 2, 8, '2023-05-03 22:14:07'),
(34, 2, 8, '2023-05-03 22:14:07'),
(35, 2, 8, '2023-05-03 22:14:07'),
(36, 2, 8, '2023-05-03 22:14:07'),
(37, 2, 3, '2023-05-09 23:32:48'),
(38, 2, 1, '2023-05-09 23:32:48'),
(39, 2, 8, '2023-05-09 23:32:48'),
(40, 2, 8, '2023-05-09 23:32:48');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `address`, `city`, `postal_code`, `created_at`) VALUES
(2, 'Bervic Leriche', 'MBOUAKA', 'mbouakab@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', '0758182318', '127', 'Villetaneuse', 93800, '2022-12-13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
