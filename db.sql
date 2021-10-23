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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `id_nama`) VALUES
  (1, 1);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.list_barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `list_barang` DISABLE KEYS */;
INSERT INTO `list_barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `promo`, `diskon`, `satuan`, `unit`, `tgl_expire`, `foto`) VALUES
  (1, 'Oreo Besar', 10000, 200, 'Beli 2 gratis 1', 10, 'pcs', 1, '2021-11-21', '1722776945oreo.jpg');
/*!40000 ALTER TABLE `list_barang` ENABLE KEYS */;

-- Dumping structure for table mega-tony.log_accessi
CREATE TABLE IF NOT EXISTS `log_accessi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `mail_immessa` varchar(50) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `accesso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table mega-tony.log_accessi: ~2 rows (approximately)
/*!40000 ALTER TABLE `log_accessi` DISABLE KEYS */;
INSERT INTO `log_accessi` (`id`, `ip`, `mail_immessa`, `data`, `accesso`) VALUES
  (1, '::1', 'megatony@gmail.com', '2021-10-21 13:08:50', 1),
  (2, '::1', 'megatony@gmail.com', '2021-10-21 14:05:30', 1),
  (3, '::1', 'megatony@gmail.com', '2021-10-21 14:53:10', 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.pegawai: ~0 rows (approximately)
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` (`id`, `nama`, `jabatan`, `email`, `hp`, `foto`) VALUES
  (1, 'Rhadi Indrawan', 'Leader', 'rhadi.indrawankkpi@gmail.com', '085255554789', '1218473185fotoku.jpg');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.pembelian: ~0 rows (approximately)
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT INTO `pembelian` (`id`, `id_barang`, `harga_yg_dibeli`, `stok_yg_dibeli`, `stok_awal`, `tot_stok`, `tanggal`) VALUES
  (1, 1, 20000, 2, 200, 202, '2021-10-21');
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;

-- Dumping structure for table mega-tony.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `jum_yg_dibeli` int(11) DEFAULT NULL,
  `tot_yg_dibeli` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.penjualan: ~0 rows (approximately)
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`id`, `id_barang`, `jum_yg_dibeli`, `tot_yg_dibeli`, `tanggal`) VALUES
  (1, 1, 2, 18000, '2021-10-21 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table mega-tony.utenti: ~0 rows (approximately)
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;
INSERT INTO `utenti` (`id`, `email`, `password`, `stato`, `reset_selector`, `reset_code`, `data`, `last_update`) VALUES
  (1, 'megatony@gmail.com', '$2y$12$flvnTQ0c13eXHRJAsl/66.Ynp..mjRY413kTB37hJ8/kzm2K/XXqq', 0, '', '', '2021-10-21 12:35:45', '2021-10-21 12:35:45');
/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
