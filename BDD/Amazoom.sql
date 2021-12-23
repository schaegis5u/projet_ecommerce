-- Adminer 4.8.1 MySQL 5.5.5-10.3.32-MariaDB-1:10.3.32+maria~focal dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `nom`) VALUES
(1,	'Technologie'),
(2,	'Nourriture'),
(3,	'Literie'),
(4,	'Papèterie'),
(5,	'Multimédia'),
(6,	'Livres'),
(7,	'Bien-être'),
(8,	'Bricolage'),
(9,	'Enfants'),
(10,	'Santé'),
(11,	'Sports'),
(12,	'Jeux-vidéos'),
(13,	'Musique & DVD'),
(14,	'Cuisine'),
(15,	'Vêtements');

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `objet`;
CREATE TABLE `objet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_id` int(11) DEFAULT NULL,
  `panier_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` double NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_46CD4C383DA5256D` (`image_id`),
  KEY `IDX_46CD4C38F77D927C` (`panier_id`),
  KEY `IDX_46CD4C38A76ED395` (`user_id`),
  CONSTRAINT `FK_46CD4C383DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  CONSTRAINT `FK_46CD4C38A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_46CD4C38F77D927C` FOREIGN KEY (`panier_id`) REFERENCES `panier` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `objet` (`id`, `image_id`, `panier_id`, `user_id`, `nom`, `description`, `marque`, `prix`) VALUES
(2,	NULL,	NULL,	2,	'Cheval',	'Un cheval, un vrai !',	'Findus',	14.99),
(3,	NULL,	NULL,	2,	'LOTR : Le Retour du Roi',	'Un livre, un vrai',	'Tolkiel',	15.99),
(4,	NULL,	NULL,	2,	'Pokémon Platine',	'Un bon jeu !',	'Nintendo',	45),
(5,	NULL,	NULL,	2,	'Pokémon Diamant Étincelant',	'Un jeu pas ouf, Platine > DP',	'Nintendo',	60),
(6,	NULL,	NULL,	2,	'T-shirt trop court',	'Un t-shirt, jamais à votre taille',	'JeFéDHabi',	12.5),
(7,	NULL,	NULL,	2,	'Bâton rose plastique',	'50cm de bonheur',	'Fun&Play',	60),
(8,	NULL,	NULL,	2,	'Cube magique',	'Un cube. Il exauce les voeux',	'Rubik\'s Cube',	30);

DROP TABLE IF EXISTS `objet_categories`;
CREATE TABLE `objet_categories` (
  `objet_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`objet_id`,`categories_id`),
  KEY `IDX_E9EDD412F520CF5A` (`objet_id`),
  KEY `IDX_E9EDD412A21214B7` (`categories_id`),
  CONSTRAINT `FK_E9EDD412A21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_E9EDD412F520CF5A` FOREIGN KEY (`objet_id`) REFERENCES `objet` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `objet_categories` (`objet_id`, `categories_id`) VALUES
(2,	2),
(3,	6),
(4,	12),
(5,	12),
(6,	15),
(7,	10),
(8,	9);

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE `paiement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carte` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccv` int(11) NOT NULL,
  `expiration` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `paiement` (`id`, `nom`, `prenom`, `carte`, `ccv`, `expiration`) VALUES
(1,	'Roger',	'Roger',	'1234567898765432',	112333,	'2016-01-01 00:00:00');

DROP TABLE IF EXISTS `panier`;
CREATE TABLE `panier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_24CC0DF2A76ED395` (`user_id`),
  CONSTRAINT `FK_24CC0DF2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1,	'Roger',	'[]',	'$2y$13$pUbVY/eQUQyb6/SuLfml..HXMSE16GCLuLmkzq8Sf0avT7lq3b.5K'),
(2,	'Roger2',	'[\"ROLE_ADMIN\"]',	'$2y$13$hL6Ab4kFIv4EgpuvAp3f8eHnwNKVr2GdbVEI1.S4wKX7OsH6rS5SG');

-- 2021-12-23 17:54:16
