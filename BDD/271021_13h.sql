-- Adminer 4.8.1 MySQL 5.5.5-10.6.4-MariaDB-1:10.6.4+maria~focal dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `Amazoom` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `Amazoom`;

DROP TABLE IF EXISTS `objet`;
CREATE TABLE `objet` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Marque` varchar(255) DEFAULT NULL,
  `Prix` double NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2021-10-27 11:07:48
