-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 21 mars 2021 à 19:45
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `starsflawdb`
--
CREATE DATABASE IF NOT EXISTS `starsflawdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `starsflawdb`;

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `description`, `password`) VALUES
(1, 'Installation des outils Prérequis Installez les outils qui vous permettront de suivre les cours et réaliser les challenges qui vous sont proposés.', ''),
(2, 'Vulnérabilité de ports VSFTPD Découvrez comment obtenir un shell avec les droits root sur un hôte-cible en utilisant Nmap et Metasploitable.', ''),
(3, 'Vulnérabilité web Faille SQL Découvrez comment récupérer les informations d\'une base de données d\'un site non sécurisé avec SQLMAP.', ''),
(4, 'Vulnérabilité Web Injection SQL Découvrez comment exploiter une injection SQL à travers une application Web vulnérable (DWVA) locale.', ''),
(5, 'Vulnérabilité de ports Tomcat-Apache Découvrez comment obtenir un shell avec les droits root sur un hôte-cible en utilisant Tomcat-Apache.', ''),
(6, 'Vulnérabilité de ports SSH Découvrez comment effectuer une attaque par brute force sur le protocle SSH sous trois différentes manières.', ''),
(7, 'Challenge 1 Une machine vulnérable avec un mot de passe à l\'intérieur, trouvez-le et obtenez une récompense de 10 points !', '$2y$14$uTewl.yV4Oory1/MLl15EO1sD2m/JOieTM58IUwqopHH9Xz9Ohne6');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(200) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dateRegister` datetime NOT NULL,
  `token` text NOT NULL,
  `confirmation_token` datetime DEFAULT NULL,
  `validation` text,
  `point` int(11) NOT NULL DEFAULT '0',
  `challenge1` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nickname` (`nickname`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nickname`, `email`, `password`, `dateRegister`, `token`, `confirmation_token`, `validation`, `point`, `challenge1`) VALUES
(49, 'admin', 'starsflaw@gmail.com', '$2y$14$BFFFMZk9YvCljo.z7SZt2OHwkbSaP556RKaeREd6B0Okj797VOM.a', '2021-03-21 19:41:41', '0', '2021-03-21 19:42:04', NULL, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
