-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mega-tony
CREATE DATABASE IF NOT EXISTS `mega-tony` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `mega-tony`;

-- Dumping structure for table mega-tony.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nama` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.admin: ~2 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `id_nama`, `date`) VALUES
  (1, 1, '2021-10-25 09:03:19'),
  (2, 3, '2021-10-25 09:03:45'),
  (3, 2, '2021-10-25 09:11:06'),
  (4, 1, '2021-11-03 12:07:10');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table mega-tony.auth_tokens
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selector` varchar(12) NOT NULL,
  `hashedvalidator` varchar(64) NOT NULL,
  `userid` int(11) NOT NULL,
  `expires` timestamp NULL DEFAULT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table mega-tony.auth_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;

-- Dumping structure for table mega-tony.list_barang
CREATE TABLE IF NOT EXISTS `list_barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` text DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `promo` text DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `tgl_expire` date DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.list_barang: ~15 rows (approximately)
/*!40000 ALTER TABLE `list_barang` DISABLE KEYS */;
INSERT INTO `list_barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `promo`, `diskon`, `satuan`, `unit`, `tgl_expire`, `foto`) VALUES
  (1, 'Oreo Besar', 10000, 200, 'Beli 2 gratis 1', 10, 'pcs', 1, '2022-05-21', '1722776945oreo.jpg'),
  (2, 'Minyak Goreng', 15000, 150, '', 0, 'pcs', 1, '2022-07-25', 'minyak.jpg'),
  (3, 'Kalpa', 2000, 200, '', 5, 'pcs', 1, '2022-12-25', '329447873kalpa.jpg'),
  (4, 'Beng-beng', 1000, 140, '', 0, 'pcs', 1, '2022-04-25', '330009499bengbeng.jpg'),
  (5, 'Wafer Classic', 10000, 300, 'Beli 2 gratis 1', 0, 'pcs', 1, '2024-02-25', '495192766classic.jpg'),
  (6, 'Gabing Chocolate', 12000, 184, '', 10, 'pcs', 1, '2022-03-25', '709823059chocolate.jpg'),
  (7, 'Pillows', 12000, 105, '', 0, 'pcs', 1, '2022-12-25', '798035465pillows.jpg'),
  (8, 'Wafer Diabetasol', 15000, 50, '', 0, 'pcs', 1, '2022-11-25', '898971797diabetasol.jpg'),
  (9, 'Wafer Superstar', 2000, 100, '', 0, 'pcs', 1, '2022-02-25', '1116721285superstar.jpg'),
  (10, 'Wafer Knoppers', 5000, 80, '', 5, 'pcs', 1, '2022-03-25', '1530580760knoppers.jpg'),
  (11, 'Astor', 1000, 70, '', 0, 'pcs', 1, '2022-04-25', '1591523232astor.jpg'),
  (12, 'Wafer Nabati', 15000, 45, '', 10, 'pcs', 1, '2022-12-25', '1627113236nabati.jpg'),
  (13, 'Wafello', 4000, 30, '', 0, 'pcs', 1, '2022-02-25', '1642042847wafello.jpg'),
  (14, 'Getgit', 2000, 59, '', 4, 'pcs', 1, '2022-03-25', '1661546435getgit.jpg'),
  (15, 'Wafer Tango', 8000, 56, 'Beli 3 Gratis Piring', 0, 'pcs', 1, '2023-01-25', '1813747564tango.jpg'),
  (16, 'Wafer Ovaltine', 10000, 78, '', 4, 'pcs', 1, '2022-04-25', '1970758816ovaltine.jpg'),
  (17, 'Wafer Gery', 5000, 30, '', 0, 'pcs', 1, '2024-03-25', '1998018935gery.jpg');
/*!40000 ALTER TABLE `list_barang` ENABLE KEYS */;

-- Dumping structure for table mega-tony.log_accessi
CREATE TABLE IF NOT EXISTS `log_accessi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `mail_immessa` varchar(50) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `accesso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- Dumping data for table mega-tony.log_accessi: ~40 rows (approximately)
/*!40000 ALTER TABLE `log_accessi` DISABLE KEYS */;
INSERT INTO `log_accessi` (`id`, `ip`, `mail_immessa`, `data`, `accesso`) VALUES
  (1, '::1', 'megatony@gmail.com', '2021-10-21 13:08:50', 1),
  (2, '::1', 'megatony@gmail.com', '2021-10-21 14:05:30', 1),
  (3, '::1', 'megatony@gmail.com', '2021-10-21 14:53:10', 1),
  (4, '::1', 'megatony@gmail.com', '2021-10-23 16:15:22', 0),
  (5, '::1', 'megatony@gmail.com', '2021-10-23 16:15:38', 1),
  (6, '::1', 'megatony@gmail.com', '2021-10-25 08:57:02', 1),
  (7, '::1', 'megatony@gmail.com', '2021-10-25 09:05:28', 1),
  (8, '::1', 'megatony@gmail.com', '2021-10-26 14:38:39', 1),
  (9, '::1', 'megatony@gmail.com', '2021-10-26 15:35:46', 1),
  (10, '::1', 'megatony@gmail.com', '2021-10-29 16:40:47', 1),
  (11, '::1', 'megatony@gmail.com', '2021-10-29 17:11:44', 1),
  (12, '::1', 'megatony@gmail.com', '2021-11-01 16:38:20', 1),
  (13, '::1', 'rhadi.indrawankkpi@gmail.com', '2021-11-01 16:44:02', 1),
  (14, '::1', 'rhadi.indrawankkpi@gmail.com', '2021-11-01 16:44:51', 1),
  (15, '::1', 'megatony@gmail.com', '2021-11-01 16:47:18', 1),
  (16, '::1', 'megatony@gmail.com', '2021-11-03 12:06:52', 1),
  (17, '::1', 'megatony@gmail.com', '2021-11-03 13:26:34', 1),
  (18, '::1', 'megatony@gmail.com', '2021-11-03 13:26:46', 1),
  (19, '::1', 'rhadi.indrawankkpi@gmail.com', '2021-11-03 13:27:22', 1),
  (20, '::1', 'megatony@gmail.com', '2021-11-03 13:51:58', 1),
  (21, '::1', 'megatony@gmail.com', '2021-11-03 14:18:13', 1),
  (22, '::1', 'megatony@gmail.com', '2021-11-03 14:18:40', 1),
  (23, '::1', 'megatony@gmail.com', '2021-11-03 14:42:03', 1),
  (24, '::1', 'megatony@gmail.com', '2021-11-14 16:15:46', 1),
  (25, '::1', 'megatony@gmail.com', '2021-11-14 16:21:27', 1),
  (26, '::1', 'megatony@gmail.com', '2021-11-14 16:32:15', 1),
  (27, '::1', 'megatony@gmail.com', '2021-11-14 16:45:22', 1),
  (28, '::1', 'megatony@gmail.com', '2021-11-14 16:45:44', 1),
  (29, '::1', 'megatony@gmail.com', '2021-11-26 15:15:07', 1),
  (30, '::1', 'megatony@gmail.com', '2022-01-05 10:43:43', 1),
  (31, '::1', 'hulk.hulk@gmail.com', '2022-01-05 10:45:45', 1),
  (32, '::1', 'megatony@gmail.com', '2022-01-05 10:51:01', 1),
  (33, '::1', 'hulk.hulk@gmail.com', '2022-01-05 10:55:28', 1),
  (34, '::1', 'hulk.hulk@gmail.com', '2022-01-05 11:46:55', 1),
  (35, '::1', 'megatony@gmail.com', '2022-01-05 12:07:35', 1),
  (36, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-01-05 12:08:33', 1),
  (37, '::1', 'hulk.hulk@gmail.com', '2022-01-05 12:16:09', 1),
  (38, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-01-05 12:33:25', 1),
  (39, '::1', 'megatony@gmail.com', '2022-01-05 12:38:16', 1),
  (40, '::1', 'megatony@gmail.com', '2022-01-06 17:13:07', 1),
  (41, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-01-06 17:22:39', 1),
  (42, '::1', 'megatony@gmail.com', '2022-01-07 14:15:19', 1),
  (43, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-01-07 16:15:38', 1),
  (44, '::1', 'hulk.hulk@gmail.com', '2022-01-07 16:22:33', 1),
  (45, '::1', 'megatony@gmail.com', '2022-01-07 16:23:58', 1),
  (46, '::1', 'megatony@gmail.com', '2022-02-09 06:15:54', 1);
/*!40000 ALTER TABLE `log_accessi` ENABLE KEYS */;

-- Dumping structure for table mega-tony.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.pegawai: ~3 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id`, `nama`, `jabatan`, `email`, `hp`, `foto`) VALUES
  (1, 'Rhadi Indrawan', 'Leader', 'rhadi.indrawankkpi@gmail.com', '085255554789', '1218473185fotoku.jpg'),
  (2, 'Tony Stark', 'Pegawai', 'tony.stark@gmail.com', '085234978798', '1279478115tony11.jpg'),
  (3, 'Hulk', 'Pegawai', 'hulk.hulk@gmail.com', '085234978798', '1127862404hulk.jpg');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;

-- Dumping structure for table mega-tony.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `harga_yg_dibeli` double DEFAULT NULL,
  `stok_yg_dibeli` int(11) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `tot_stok` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.pembelian: ~5 rows (approximately)
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` (`id`, `id_barang`, `harga_yg_dibeli`, `stok_yg_dibeli`, `stok_awal`, `tot_stok`, `tanggal`, `id_admin`) VALUES
  (2, 2, 45000, 3, 150, 153, '2021-10-25', 5),
  (3, 3, 10000, 5, 200, 205, '2021-10-25', 5),
  (4, 4, 45000, 50, 100, 150, '2021-11-03', 6),
  (5, 6, 48000, 4, 180, 184, '2022-01-05', 6),
  (6, 7, 20000, 5, 100, 105, '2022-01-07', 1),
  (7, 17, 50000, 10, 20, 30, '2022-02-09', 1);
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;

-- Dumping structure for table mega-tony.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `jum_yg_dibeli` int(11) DEFAULT NULL,
  `tot_yg_dibeli` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.penjualan: ~5 rows (approximately)
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`id`, `id_barang`, `jum_yg_dibeli`, `tot_yg_dibeli`, `tanggal`, `id_admin`) VALUES
  (2, 2, 3, 45000, '2021-10-25 00:00:00', 5),
  (3, 3, 5, 9500, '2021-10-25 00:00:00', 5),
  (4, 13, 2, 8000, '2021-10-25 00:00:00', 5),
  (5, 17, 25, 125000, '2021-11-03 00:00:00', 6),
  (6, 4, 10, 10000, '2022-01-05 00:00:00', 6);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- Dumping structure for table mega-tony.utenti
CREATE TABLE IF NOT EXISTS `utenti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `stato` int(11) NOT NULL,
  `reset_selector` varchar(100) NOT NULL,
  `reset_code` varchar(256) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table mega-tony.utenti: ~2 rows (approximately)
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` (`id`, `email`, `password`, `stato`, `reset_selector`, `reset_code`, `data`, `last_update`) VALUES
  (1, 'megatony@gmail.com', '$2y$12$flvnTQ0c13eXHRJAsl/66.Ynp..mjRY413kTB37hJ8/kzm2K/XXqq', 0, '', '', '2021-10-21 12:35:45', '2021-10-21 12:35:45'),
  (5, 'rhadi.indrawankkpi@gmail.com', '$2y$12$JnM9.kFO3Lu1QnaJb9J2SOQi2pA09Bhow0oUL4ahHUlfZ5PhNVDxC', 0, '', '', '2021-11-01 16:43:07', '2021-11-01 16:43:07'),
  (6, 'hulk.hulk@gmail.com', '$2y$12$cUayFdVD8KLj0P7Uh.JhKengLGp4U42OInIRi5Ji47AACIeEZ.AQ6', 0, '', '', '2022-01-05 10:45:00', '2022-01-05 10:45:00');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
