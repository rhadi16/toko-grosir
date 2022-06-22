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
  `usia_awal` int(11) DEFAULT NULL,
  `usia_akhir` int(11) DEFAULT NULL,
  `kalangan` varchar(50) DEFAULT NULL,
  `kat_jkel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.list_barang: ~19 rows (approximately)
/*!40000 ALTER TABLE `list_barang` DISABLE KEYS */;
INSERT INTO `list_barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `promo`, `diskon`, `satuan`, `unit`, `tgl_expire`, `foto`, `usia_awal`, `usia_akhir`, `kalangan`, `kat_jkel`) VALUES
  (1, 'Oreo Besar', 10000, 174, 'Beli 2 gratis 1', 10, 'pcs', 1, '2024-05-21', '1722776945oreo.jpg', 15, 20, 'Remaja', 'pl'),
  (2, 'Minyak Goreng', 15000, 118, '', 0, 'pcs', 1, '2022-08-25', 'minyak.jpg', 20, 70, 'Orang Tua', 'p'),
  (3, 'Kalpa', 2000, 187, '', 5, 'pcs', 1, '2022-12-25', '329447873kalpa.jpg', 15, 25, 'Remaja', 'pl'),
  (4, 'Beng-beng', 1000, 138, '', 0, 'pcs', 1, '2023-04-25', '330009499bengbeng.jpg', 15, 25, 'Remaja', 'pl'),
  (5, 'Wafer Classic', 10000, 300, 'Beli 2 gratis 1', 0, 'pcs', 1, '2024-02-25', '495192766classic.jpg', 15, 25, 'Remaja', 'pl'),
  (6, 'Gabing Chocolate', 12000, 184, '', 10, 'pcs', 1, '2022-08-25', '709823059chocolate.jpg', 15, 38, 'Dewasa', 'pl'),
  (7, 'Pillows', 12000, 105, '', 0, 'pcs', 1, '2022-12-25', '798035465pillows.jpg', 15, 25, 'Remaja', 'pl'),
  (8, 'Wafer Diabetasol', 15000, 49, '', 0, 'pcs', 1, '2022-11-25', '898971797diabetasol.jpg', 35, 70, 'Orang Tua', 'pl'),
  (9, 'Wafer Superstar', 2000, 100, '', 0, 'pcs', 1, '2022-08-25', '1116721285superstar.jpg', 15, 38, 'Dewasa', 'pl'),
  (10, 'Wafer Knoppers', 5000, 80, '', 5, 'pcs', 1, '2022-09-25', '1530580760knoppers.jpg', 15, 25, 'Remaja', 'pl'),
  (11, 'Astor', 1000, 70, '', 0, 'pcs', 1, '2023-04-25', '1591523232astor.jpg', 15, 38, 'Remaja', 'pl'),
  (12, 'Wafer Nabati', 15000, 45, '', 10, 'pcs', 1, '2022-12-25', '1627113236nabati.jpg', 15, 38, 'Remaja', 'pl'),
  (13, 'Wafello', 4000, 30, '', 0, 'pcs', 1, '2022-07-25', '1642042847wafello.jpg', 15, 38, 'Dewasa', 'pl'),
  (14, 'Getgit', 2000, 59, '', 4, 'pcs', 1, '2022-08-25', '1661546435getgit.jpg', 15, 20, 'Dewasa', 'pl'),
  (15, 'Wafer Tango', 8000, 56, 'Beli 3 Gratis Piring', 0, 'pcs', 1, '2023-01-25', '1813747564tango.jpg', 15, 30, 'Remaja', 'pl'),
  (16, 'Wafer Ovaltine', 10000, 78, '', 4, 'pcs', 1, '2022-07-25', '1970758816ovaltine.jpg', 15, 38, 'Dewasa', 'pl'),
  (17, 'Wafer Gery', 5000, 30, '', 0, 'pcs', 1, '2024-08-25', '1998018935gery.jpg', 15, 25, 'Remaja', 'pl'),
  (19, 'Buavita Sedang', 10000, 149, '', 0, 'pcs', 1, '2023-04-16', '2145402575buavita.jpg', 15, 70, 'Dewasa', 'pl'),
  (20, 'L-men Gain Mass', 123000, 450, '', 0, 'pcs', 1, '2023-05-06', '1797886072lmen.jpg', 25, 40, 'Dewasa', 'l');
/*!40000 ALTER TABLE `list_barang` ENABLE KEYS */;

-- Dumping structure for table mega-tony.list_pesanan
CREATE TABLE IF NOT EXISTS `list_pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_barang` int(11) DEFAULT NULL,
  `jum_yg_dibeli` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.list_pesanan: ~1 rows (approximately)
/*!40000 ALTER TABLE `list_pesanan` DISABLE KEYS */;
INSERT INTO `list_pesanan` (`id`, `id_barang`, `jum_yg_dibeli`, `tanggal`, `id_pelanggan`) VALUES
  (14, 1, 1, '2022-04-05', 2),
  (15, 8, 1, '2022-04-05', 2),
  (16, 2, 1, '2022-04-13', 3),
  (17, 2, 1, '2022-04-17', 2),
  (18, 19, 1, '2022-06-09', 4);
/*!40000 ALTER TABLE `list_pesanan` ENABLE KEYS */;

-- Dumping structure for table mega-tony.log_accessi
CREATE TABLE IF NOT EXISTS `log_accessi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `mail_immessa` varchar(50) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `accesso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

-- Dumping data for table mega-tony.log_accessi: ~105 rows (approximately)
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
  (46, '::1', 'megatony@gmail.com', '2022-02-09 06:15:54', 1),
  (47, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-02-10 09:36:35', 1),
  (48, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-02-10 09:36:50', 1),
  (49, '::1', 'megatony@gmail.com', '2022-03-16 09:59:13', 1),
  (50, '::1', 'indrawanrhadi@gmail.com', '2022-03-17 17:57:16', 0),
  (51, '::1', 'indrawanrhadi@gmail.com', '2022-03-17 17:57:47', 0),
  (52, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-03-17 18:12:54', 1),
  (53, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-03-17 18:19:40', 1),
  (54, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-03-17 18:48:29', 1),
  (55, '::1', 'indrawanrhadi@gmail.com', '2022-03-17 18:55:05', 0),
  (56, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-17 19:11:58', 1),
  (57, '::1', 'indrawanrhadi@gmail.com', '2022-03-17 20:04:36', 0),
  (58, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-17 20:05:05', 1),
  (59, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-17 20:33:31', 1),
  (60, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-17 20:41:06', 1),
  (61, '::1', 'indrawanrhadi@gmail.com', '2022-03-18 06:55:21', 1),
  (62, '::1', 'indrawanrhadi@gmail.com', '2022-03-18 07:55:10', 1),
  (63, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-03-18 08:15:22', 1),
  (64, '::1', 'indrawanrhadi@gmail.com', '2022-03-18 13:25:05', 1),
  (65, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-18 15:08:21', 1),
  (66, '::1', 'indrawanrhadi@gmail.com', '2022-03-19 09:19:10', 1),
  (67, '::1', 'indrawanrhadi@gmail.com', '2022-03-19 09:41:07', 1),
  (68, '::1', 'indrawanrhadi@gmail.com', '2022-03-19 19:58:26', 0),
  (69, '::1', 'indrawanrhadi@gmail.com', '2022-03-19 19:58:40', 1),
  (70, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-19 20:28:43', 1),
  (71, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-03-19 20:33:51', 1),
  (72, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-03-20 12:56:26', 1),
  (73, '::1', 'indrawanrhadi@gmail.com', '2022-03-20 13:44:15', 0),
  (74, '::1', 'indrawanrhadi@gmail.com', '2022-03-20 13:44:30', 1),
  (75, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-20 13:46:40', 0),
  (76, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-20 13:46:57', 1),
  (77, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-03-20 13:47:27', 1),
  (78, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-31 17:12:14', 0),
  (79, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-31 17:12:28', 1),
  (80, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-31 18:41:47', 1),
  (81, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-03-31 19:55:57', 1),
  (82, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-03-31 20:01:32', 1),
  (83, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-01 13:54:13', 1),
  (84, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-04-01 13:55:29', 1),
  (85, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-01 14:58:00', 1),
  (86, '::1', 'indrawanrhadi@gmail.com', '2022-04-01 18:01:47', 0),
  (87, '::1', 'indrawanrhadi@gmail.com', '2022-04-01 18:02:00', 0),
  (88, '::1', 'indrawanrhadi@gmail.com', '2022-04-01 18:02:18', 1),
  (89, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-04-05 11:46:37', 1),
  (90, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-04-05 12:40:39', 1),
  (91, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-05 13:02:08', 1),
  (92, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-04-05 13:06:57', 1),
  (93, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-13 09:52:53', 0),
  (94, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-13 09:53:10', 1),
  (95, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-13 10:03:29', 1),
  (96, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-13 10:23:12', 1),
  (97, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-13 10:47:33', 1),
  (98, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-04-13 13:06:15', 1),
  (99, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-13 13:45:14', 1),
  (100, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-04-13 14:01:02', 1),
  (101, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-13 14:07:27', 1),
  (102, '::1', 'indrawanrhadi@gmail.com', '2022-04-13 14:15:22', 0),
  (103, '::1', 'indrawanrhadi@gmail.com', '2022-04-13 14:15:38', 0),
  (104, '::1', 'indrawanrhadi@gmail.com', '2022-04-13 14:16:11', 1),
  (105, '::1', 'indrawanrhadi@gmail.com', '2022-04-13 14:23:27', 1),
  (106, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-14 11:55:47', 1),
  (107, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-14 16:53:32', 1),
  (108, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-17 14:21:33', 1),
  (109, '::1', 'indrawanrhadi@gmail.com', '2022-04-17 14:26:32', 1),
  (110, '::1', 'indrawanrhadi@gmail.com', '2022-04-17 14:43:58', 1),
  (111, '::1', 'andaf@gmail.com', '2022-04-17 14:46:34', 1),
  (112, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-20 08:41:05', 1),
  (113, '::1', 'indrawanrhadi@gmail.com', '2022-04-20 08:42:22', 1),
  (114, '::1', 'andaf@gmail.com', '2022-04-20 08:42:51', 1),
  (115, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-04-20 09:37:26', 1),
  (116, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-05-21 12:32:34', 1),
  (117, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-05-21 13:25:04', 0),
  (118, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-05-21 13:25:20', 1),
  (119, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-05-25 13:51:05', 1),
  (120, '::1', 'andaf@gmail.com', '2022-05-25 14:40:50', 1),
  (121, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-05-25 14:45:58', 1),
  (122, '::1', 'indrawanrhadi@gmail.com', '2022-06-08 09:55:44', 1),
  (123, '::1', 'rhadi.indrawankkpi@gmail.com', '2022-06-08 09:58:30', 1),
  (124, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-06-08 09:59:34', 0),
  (125, '::1', 'rhadi.indrawankkpi1@gmail.com', '2022-06-08 09:59:50', 1),
  (126, '::1', 'rina@rina.com', '2022-06-08 10:02:52', 1),
  (127, '::1', 'megatony@gmail.com', '2022-06-09 17:18:00', 1),
  (128, '::1', 'andaf@gmail.com', '2022-06-09 18:38:26', 1),
  (129, '::1', 'megatony@gmail.com', '2022-06-15 18:12:43', 1);
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

-- Dumping structure for table mega-tony.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jkel` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_wa` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.pelanggan: ~3 rows (approximately)
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT INTO `pelanggan` (`id`, `email`, `nama`, `jkel`, `alamat`, `no_wa`, `password`, `tgl_lahir`) VALUES
  (2, 'rhadi.indrawankkpi1@gmail.com', 'Rhadi Indrawan', 'l', 'Pongtiku', '085255554789', '$2y$12$DS5eeIoOtrnhw5U.QVAiROUOuGhZ6uHJvF.rqSp8UpmiTAPY6ChFq', '1988-04-14'),
  (3, 'indrawanrhadi@gmail.com', 'indrawan', 'l', 'Jl. pongtiku I', '085255554789', '$2y$12$2EOK.qjA0aPBZnafzRXPneMv2qXP2a1GGGic5k2BYLC8KoqL2FIwS', '1999-04-14'),
  (4, 'andaf@gmail.com', 'Andaf', 'l', 'Jl. perintis', '085255554789', '$2y$12$Xe0uKMTryrtrmmoeoiG.9uvrnM3HYeWpFvVa84blvDAi/D7J7QjPS', '1980-04-14'),
  (5, 'rina@rina.com', 'Rina', 'p', 'Jl. Poros Maros', '085234978798', '$2y$12$49cz38UMjyPfQhogy88p6ep6b0z3vHcFK5CunRbnpGUIybBjo82rC', '1999-03-16');
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

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
  `nama_pelanggan` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table mega-tony.penjualan: ~9 rows (approximately)
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`id`, `id_barang`, `jum_yg_dibeli`, `tot_yg_dibeli`, `tanggal`, `id_admin`, `nama_pelanggan`) VALUES
  (2, 2, 3, 45000, '2021-10-25 00:00:00', 5, 'Rhadi'),
  (3, 3, 5, 9500, '2021-10-25 00:00:00', 5, 'Alul'),
  (4, 13, 2, 8000, '2021-10-25 00:00:00', 5, 'Alul'),
  (5, 17, 25, 125000, '2021-11-03 00:00:00', 6, 'Indrawan'),
  (6, 4, 10, 10000, '2022-01-05 00:00:00', 6, 'Indrawan'),
  (7, 1, 2, 18000, '2022-03-20 00:00:00', 5, 'Rhadi'),
  (8, 1, 5, 45000, '2022-03-18 00:00:00', 5, 'indrawan'),
  (9, 4, 2, 2000, '2022-03-31 00:00:00', 5, 'Rhadi Indrawan'),
  (10, 3, 3, 5700, '2022-03-31 00:00:00', 5, 'Rhadi Indrawan'),
  (11, 2, 20, 300000, '2022-03-18 00:00:00', 5, 'indrawan'),
  (12, 1, 10, 90000, '2022-03-19 00:00:00', 5, 'Rhadi Indrawan');
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
