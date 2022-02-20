-- Adminer 4.8.1 MySQL 8.0.17 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `blabla`;
CREATE DATABASE `blabla` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `blabla`;

DROP TABLE IF EXISTS `favoriler`;
CREATE TABLE `favoriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `seyehatID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `favoriler` (`id`, `userID`, `seyehatID`) VALUES
(1,	6,	1),
(2,	6,	2),
(3,	6,	5),
(11,	8,	1);

DROP TABLE IF EXISTS `rezervasyon`;
CREATE TABLE `rezervasyon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `seyehatID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `rezervasyon` (`id`, `userID`, `seyehatID`) VALUES
(1,	6,	2),
(2,	6,	1),
(3,	6,	3),
(4,	6,	5),
(5,	8,	3);

DROP TABLE IF EXISTS `seyehat`;
CREATE TABLE `seyehat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `nerden` varchar(128) COLLATE utf8_bin NOT NULL,
  `nereye` varchar(128) COLLATE utf8_bin NOT NULL,
  `tarih` date NOT NULL,
  `kisi` varchar(128) COLLATE utf8_bin NOT NULL,
  `fiyat` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `aciklama` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `seyehat` (`id`, `userID`, `nerden`, `nereye`, `tarih`, `kisi`, `fiyat`, `aciklama`) VALUES
(1,	3,	'Antalya',	'İstanbul',	'2022-02-14',	'2',	'90',	'Benimle yolculuk yapacak birine ihtiyacim var. Arabamda sigara içilmesine izin vermiyorum'),
(2,	2,	'İstanbul',	'Kars',	'2022-02-18',	'3',	'110',	'Örnek açıklama 1'),
(3,	5,	'Samsun',	'Konya',	'2022-02-27',	'1',	'60',	'Örnek açıklama 2'),
(4,	1,	'Fethiye',	'İzmir',	'2022-03-14',	'2',	'30',	'Örnek açıklama 3'),
(5,	4,	'Isparta',	'İstanbul',	'2022-03-01',	'1',	'100',	'Örnek açıklama 4'),
(6,	5,	'Tekirdağ',	'Bursa',	'2022-03-19',	'4',	'69',	'Örnek açıklama 5'),
(7,	2,	'Ankara',	'İstanbul',	'2022-04-14',	'2',	'150',	'Örnek açıklama 6'),
(8,	1,	'İstanbul',	'Trabzon',	'2022-04-09',	'1',	'200',	'Örnek açıklama 7');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `surname` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `e-mail` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `users` (`id`, `name`, `surname`, `e-mail`, `password`, `tel`) VALUES
(1,	'Şermin',	'Güngör',	'sermin.gungor@hotmail.com',	'',	'05423365989'),
(2,	'Sefa',	'Dışbudak',	'sefa.disbudak@gmail.com',	'',	'05336987852'),
(3,	'Emel ',	'Yeşil',	'emel.yesil@hotmail.com',	'',	'05432405896'),
(4,	'Özer',	'Cantekin',	'ozer_cantekin@gmail.com',	'',	'05422563651'),
(5,	'Şevval',	'Semiz',	'sevval.semiz@gmail.com',	'',	'05436598742'),
(6,	'01',	'011',	'01@hotmail.com',	'$2y$10$5eCgKodFS0tTY78yEURefehyUL.oyWQ5m1vBtT2dbqJYf3odOCVY6',	'05432404596'),
(8,	'deneme',	'deneme',	'deneme01@hotmail.com',	'$2y$10$5z0Ed3ryErxglA3NZVCPF.c.w.lBMFTNLBx4Yy37qqWRrdE83Og1a',	'05432401425'),
(12,	'01',	'01',	'013@hotmail.com',	'$2y$10$DtLl0BOyPdOoXg06EKsn.uJ//jjckkbAQjFhigesaJxVdTcdH07Jm',	'05432145879');

-- 2022-02-15 15:04:27
