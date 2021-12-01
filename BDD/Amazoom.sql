-- Adminer 4.8.1 MySQL 5.5.5-10.6.4-MariaDB-1:10.6.4+maria~focal dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

INSERT INTO `image` (`id`, `path`, `name`) VALUES
(1,	'C:\\Users\\aurel\\Pictures\\52d17ec2ef86cd0463c2d7b2070bc1eb.jpeg',	NULL),
(2,	'C:\\Users\\aurel\\Pictures\\52d17ec2ef86cd0463c2d7b2070bc1eb.jpeg',	NULL),
(3,	'C:\\Users\\aurel\\Pictures\\52d17ec2ef86cd0463c2d7b2070bc1eb.jpeg',	NULL),
(4,	'img_617fd7559bd66.jpg',	'TEST'),
(5,	'img_617fd7a1dc177.jpg',	'TEST'),
(7,	'img_617fd86fc3ede.jpg',	'TEST'),
(8,	'img_617fd891cd6fe.jpg',	'TEST'),
(9,	'img_617fd98ddba75.jpg',	'TEST');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `objet`;
CREATE TABLE `objet` (
  `image_id` int(30) DEFAULT NULL,
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Marque` varchar(255) DEFAULT NULL,
  `Prix` double NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_id` (`image_id`),
  CONSTRAINT `objet_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `objet` (`image_id`, `id`, `Nom`, `Description`, `Marque`, `Prix`, `Categorie`) VALUES
(NULL,	1,	'Test',	'Test objet n°1',	'Marque test',	3.3,	'Test'),
(1,	2,	'Test',	'Test objet n°1',	'Marque test',	3.3,	'Test'),
(2,	3,	'Test',	'Test objet n°1',	'Marque test',	0.3,	'Test'),
(3,	4,	'jk',	'jk',	'lj',	3.3,	'kjjk'),
(4,	5,	'Test',	'Test objet n°1',	'Marque test',	3.3,	'Test'),
(5,	6,	'Test',	'Test objet n°1',	'Marque test',	3.3,	'Test'),
(7,	7,	'Test',	'Test objet n°1',	'Marque test',	3.3,	'Test'),
(8,	8,	'Test',	'Test objet n°1',	'Marque test',	3.3,	'Test'),
(9,	9,	'Test',	'Test objet n°1',	'Marque test',	3.3,	'Test');

-- 2021-11-01 12:23:02
