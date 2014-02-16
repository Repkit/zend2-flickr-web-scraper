-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              5.5.27 - MySQL Community Server (GPL)
-- S.O. server:                  Win32
-- HeidiSQL Versione:            8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dump della struttura di tabella flickrscraper.images
DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_url` varchar(150) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL DEFAULT '0',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `owner` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dump dei dati della tabella flickrscraper.images: ~10 rows (circa)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `image_url`, `title`, `width`, `height`, `owner`) VALUES
	(1, 'http://farm8.staticflickr.com/7425/12538255115_aff7b6ed0a_t.jpg', 'The Kew Mural, Victoria Plaza, Royal Botanic Gardens, KEW @ 12 February 2014 (Part 2 of 2)', 100, 74, '60000251@N06'),
	(2, 'http://farm4.staticflickr.com/3720/12538818964_59b7577fd6_t.jpg', 'The Kew Mural, Victoria Plaza, Royal Botanic Gardens, KEW @ 12 February 2014 (Part 1 of 2)', 100, 84, '60000251@N06'),
	(3, 'http://farm8.staticflickr.com/7374/12537764843_1160f90bb6_t.jpg', 'Mr & Mrs Mute Swans, Plants + People Museum No. 1, Royal KEW Gardens @ 12 February 2014 (1/2)', 100, 100, '60000251@N06'),
	(4, 'http://farm8.staticflickr.com/7392/12537930924_3f440a30d4_t.jpg', 'Millionaire Interviews 21', 100, 24, '91067428@N08'),
	(5, 'http://farm4.staticflickr.com/3763/12537213403_a82f9dd885_t.jpg', 'Encephalartos Ferox, Palm House, Royal Botanic Gardens, KEW @ 12 February 2014', 75, 100, '60000251@N06'),
	(6, 'http://farm4.staticflickr.com/3794/12537452864_d2e4090245_t.jpg', 'Lavender (Lavandadula Pinnata), Palm House, Royal Botanic Gardens, KEW @ 12 February 2014', 100, 75, '60000251@N06'),
	(7, 'http://farm4.staticflickr.com/3814/12536642475_784acda378_t.jpg', 'Coco de Mer  (Lodoicea Maldivica) Palm House, Royal KEW Gardens @ 12 February 2014 (Part 1 of 3)', 98, 100, '60000251@N06'),
	(8, 'http://farm8.staticflickr.com/7381/12536559955_57220240e0_t.jpg', 'Coco de Mer  (Lodoicea Maldivica) Palm House, Royal KEW Gardens @ 12 February 2014 (Part 2 of 3)', 100, 75, '60000251@N06'),
	(9, 'http://farm4.staticflickr.com/3733/12536462333_1416d9ddef_t.jpg', 'Coco de Mer  (Lodoicea Maldivica) Palm House, Royal KEW Gardens @ 12 February 2014 (Part 3 of 3)', 75, 100, '60000251@N06'),
	(10, 'http://farm8.staticflickr.com/7460/12536196513_5dc0a68534_t.jpg', 'Peepul - Sacred Bo Tree, Palm House, Royal Botanic Gardens, KEW @ 12 February 2014 (2 of 2)', 100, 100, '60000251@N06');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
