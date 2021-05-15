-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33-0ubuntu0.16.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for securities
DROP DATABASE IF EXISTS `securities`;
CREATE DATABASE IF NOT EXISTS `securities` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `securities`;

-- Dumping structure for table securities.attributes
DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table securities.attributes: ~10 rows (approximately)
DELETE FROM `attributes`;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` (`id`, `name`) VALUES
	(7, 'assets'),
	(9, 'debt'),
	(3, 'dps'),
	(5, 'ebitda'),
	(2, 'eps'),
	(6, 'free_cash_flow'),
	(8, 'liabilities'),
	(1, 'price'),
	(4, 'sales'),
	(10, 'shares');
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;

-- Dumping structure for table securities.facts
DROP TABLE IF EXISTS `facts`;
CREATE TABLE IF NOT EXISTS `facts` (
  `security_id` int(11) unsigned DEFAULT NULL,
  `attribute_id` int(11) unsigned DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  KEY `security_id` (`security_id`),
  KEY `attribute_id` (`attribute_id`),
  KEY `value` (`value`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table securities.facts: ~100 rows (approximately)
DELETE FROM `facts`;
/*!40000 ALTER TABLE `facts` DISABLE KEYS */;
INSERT INTO `facts` (`security_id`, `attribute_id`, `value`) VALUES
	(1, 1, 1),
	(1, 2, 2),
	(1, 3, 3),
	(1, 4, 4),
	(1, 5, 5),
	(1, 6, 6),
	(1, 7, 7),
	(1, 8, 8),
	(1, 9, 9),
	(1, 10, 10),
	(2, 1, 2),
	(2, 2, 4),
	(2, 3, 6),
	(2, 4, 8),
	(2, 5, 10),
	(2, 6, 12),
	(2, 7, 14),
	(2, 8, 16),
	(2, 9, 18),
	(2, 10, 20),
	(3, 1, 3),
	(3, 2, 6),
	(3, 3, 9),
	(3, 4, 12),
	(3, 5, 15),
	(3, 6, 18),
	(3, 7, 21),
	(3, 8, 24),
	(3, 9, 27),
	(3, 10, 30),
	(4, 1, 4),
	(4, 2, 8),
	(4, 3, 12),
	(4, 4, 16),
	(4, 5, 20),
	(4, 6, 24),
	(4, 7, 28),
	(4, 8, 32),
	(4, 9, 36),
	(4, 10, 40),
	(5, 1, 5),
	(5, 2, 10),
	(5, 3, 15),
	(5, 4, 20),
	(5, 5, 25),
	(5, 6, 30),
	(5, 7, 35),
	(5, 8, 40),
	(5, 9, 45),
	(5, 10, 50),
	(6, 1, 6),
	(6, 2, 12),
	(6, 3, 18),
	(6, 4, 24),
	(6, 5, 30),
	(6, 6, 36),
	(6, 7, 42),
	(6, 8, 48),
	(6, 9, 54),
	(6, 10, 60),
	(7, 1, 7),
	(7, 2, 14),
	(7, 3, 21),
	(7, 4, 28),
	(7, 5, 35),
	(7, 6, 42),
	(7, 7, 49),
	(7, 8, 56),
	(7, 9, 63),
	(7, 10, 70),
	(8, 1, 8),
	(8, 2, 16),
	(8, 3, 24),
	(8, 4, 32),
	(8, 5, 40),
	(8, 6, 48),
	(8, 7, 56),
	(8, 8, 64),
	(8, 9, 72),
	(8, 10, 80),
	(9, 1, 9),
	(9, 2, 18),
	(9, 3, 27),
	(9, 4, 36),
	(9, 5, 45),
	(9, 6, 54),
	(9, 7, 63),
	(9, 8, 72),
	(9, 9, 81),
	(9, 10, 90),
	(10, 1, 10),
	(10, 2, 20),
	(10, 3, 30),
	(10, 4, 40),
	(10, 5, 50),
	(10, 6, 60),
	(10, 7, 70),
	(10, 8, 80),
	(10, 9, 90),
	(10, 10, 100);
/*!40000 ALTER TABLE `facts` ENABLE KEYS */;

-- Dumping structure for table securities.securities
DROP TABLE IF EXISTS `securities`;
CREATE TABLE IF NOT EXISTS `securities` (
  `id` int(11) unsigned NOT NULL,
  `symbol` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `symbol` (`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table securities.securities: ~10 rows (approximately)
DELETE FROM `securities`;
/*!40000 ALTER TABLE `securities` DISABLE KEYS */;
INSERT INTO `securities` (`id`, `symbol`) VALUES
	(1, 'ABC'),
	(2, 'BCD'),
	(3, 'CDE'),
	(4, 'DEF'),
	(5, 'EFG'),
	(6, 'FGH'),
	(7, 'GHI'),
	(8, 'HIJ'),
	(9, 'IJK'),
	(10, 'JKL');
/*!40000 ALTER TABLE `securities` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
