-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ibi
CREATE DATABASE IF NOT EXISTS `ibi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ibi`;


-- Dumping structure for table ibi.bidan
CREATE TABLE IF NOT EXISTS `bidan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_rumah` text NOT NULL,
  `alamat_praktik` text NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `golongan_darah` int(11) NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `kampus` varchar(50) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `no_ijazah` varchar(50) NOT NULL,
  `tempat_kerja` varchar(100) NOT NULL,
  `status_pegawai` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pendidikan` (`pendidikan`),
  KEY `status_kepegawaian` (`status_pegawai`),
  KEY `golongan_darah` (`golongan_darah`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.bidan: ~2 rows (approximately)
/*!40000 ALTER TABLE `bidan` DISABLE KEYS */;
INSERT INTO `bidan` (`id`, `nomor`, `name`, `tempat_lahir`, `tanggal_lahir`, `alamat_rumah`, `alamat_praktik`, `tlp`, `golongan_darah`, `pendidikan`, `kampus`, `tahun_lulus`, `no_ijazah`, `tempat_kerja`, `status_pegawai`, `nip`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(4, 'IBI-00001', 'Adam Prasetia', 'Bandung', '1989-02-16', 'Cianjur', 'Jakarta', '083817321885', 2, 7, 'Universitas Suryakancana Cianjur', '2011', '', 'PT Kompas Cyber Media', 1, '033152', 1, '2017-03-20 18:58:22', 1, '2017-03-21 23:51:44'),
	(5, 'IBI-00002', 'Ulfah Awaliah', 'Cianjur', '1990-12-04', 'warujajar', 'Cilaku', '083817321712', 3, 7, '', '', '', '', 0, '', 1, '2017-03-20 19:13:02', 1, '2017-03-21 23:51:34');
/*!40000 ALTER TABLE `bidan` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_kta
CREATE TABLE IF NOT EXISTS `bidan_kta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `bidan` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bidan` (`bidan`),
  KEY `type` (`type`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.bidan_kta: ~3 rows (approximately)
/*!40000 ALTER TABLE `bidan_kta` DISABLE KEYS */;
INSERT INTO `bidan_kta` (`id`, `date`, `bidan`, `type`, `attachment`, `nomor`, `masa_berlaku`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(17, '2017-03-22', 4, 2, '1,2,3,4', '12312323', '0000-00-00', 1, 1, '2017-03-20 23:03:21', 1, '2017-03-22 00:01:52'),
	(18, '2017-03-20', 5, 1, '1,2,3,4', '09020202', '2020-03-17', 2, 1, '2017-03-20 23:11:46', 1, '2017-03-21 21:54:12'),
	(20, '2017-03-21', 4, 2, '1,2,4', '78978797', '2017-03-31', 3, 1, '2017-03-21 22:50:26', 1, '2017-03-22 00:01:26'),
	(21, '0000-00-00', 5, 0, '', '', '0000-00-00', 0, 1, '2017-03-22 00:13:42', 1, '2017-03-22 00:15:00'),
	(22, '0000-00-00', 5, 0, '3', '', '0000-00-00', 0, 1, '2017-03-22 00:15:13', 1, '2017-03-22 00:15:25');
/*!40000 ALTER TABLE `bidan_kta` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_kta_attachment
CREATE TABLE IF NOT EXISTS `bidan_kta_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_kta_attachment: ~4 rows (approximately)
/*!40000 ALTER TABLE `bidan_kta_attachment` DISABLE KEYS */;
INSERT INTO `bidan_kta_attachment` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'FOTO COPY STR YANG MASIH BERLAKU 1 LEMBAR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'FOTO COPY IJAZAH 1 LEMBAR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'FOTO UKURAN 3X4 (LATAR BELAKANG MERAH & MEMAKAI SERAGAM IBI) 1 LEMBAR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'FOTO COPY KTA LAMA 1 LEMBAR (BAGI PERPANJANGAN)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_kta_attachment` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_kta_status
CREATE TABLE IF NOT EXISTS `bidan_kta_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_kta_status: ~4 rows (approximately)
/*!40000 ALTER TABLE `bidan_kta_status` DISABLE KEYS */;
INSERT INTO `bidan_kta_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Sedang Di Proses', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Selesai', 0, '0000-00-00 00:00:00', 1, '2017-03-22 00:00:02'),
	(3, 'Kurang Persyaratan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'Ditolak', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_kta_status` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_kta_type
CREATE TABLE IF NOT EXISTS `bidan_kta_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_kta_type: ~2 rows (approximately)
/*!40000 ALTER TABLE `bidan_kta_type` DISABLE KEYS */;
INSERT INTO `bidan_kta_type` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Pertama', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Perpanjangan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Hilang', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_kta_type` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_pelatihan
CREATE TABLE IF NOT EXISTS `bidan_pelatihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidan` int(11) NOT NULL,
  `pelatihan` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.bidan_pelatihan: ~0 rows (approximately)
/*!40000 ALTER TABLE `bidan_pelatihan` DISABLE KEYS */;
/*!40000 ALTER TABLE `bidan_pelatihan` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sib
CREATE TABLE IF NOT EXISTS `bidan_sib` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidan` int(11) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sib: ~0 rows (approximately)
/*!40000 ALTER TABLE `bidan_sib` DISABLE KEYS */;
INSERT INTO `bidan_sib` (`id`, `bidan`, `nomor`, `masa_berlaku`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(2, 4, 'sib001', '2017-03-24', 1, '2017-03-20 18:58:22', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sib` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_m
CREATE TABLE IF NOT EXISTS `bidan_sipb_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidan` int(11) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `nomor_rekomendasi` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_m: ~0 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_m` DISABLE KEYS */;
INSERT INTO `bidan_sipb_m` (`id`, `bidan`, `nomor`, `nomor_rekomendasi`, `masa_berlaku`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(2, 4, 'sipb-m001', '', '2017-03-22', 1, '2017-03-20 18:58:22', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_m` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_p
CREATE TABLE IF NOT EXISTS `bidan_sipb_p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidan` int(11) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `nomor_rekomendasi` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_p: ~0 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_p` DISABLE KEYS */;
INSERT INTO `bidan_sipb_p` (`id`, `bidan`, `nomor`, `nomor_rekomendasi`, `masa_berlaku`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(2, 4, 'sipb-p001', '', '2017-03-23', 1, '2017-03-20 18:58:22', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_p` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_str
CREATE TABLE IF NOT EXISTS `bidan_str` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidan` int(11) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_str: ~0 rows (approximately)
/*!40000 ALTER TABLE `bidan_str` DISABLE KEYS */;
INSERT INTO `bidan_str` (`id`, `bidan`, `nomor`, `masa_berlaku`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(2, 4, 'str001', '2017-03-21', 1, '2017-03-20 18:58:22', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_str` ENABLE KEYS */;


-- Dumping structure for table ibi.golongan_darah
CREATE TABLE IF NOT EXISTS `golongan_darah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.golongan_darah: ~4 rows (approximately)
/*!40000 ALTER TABLE `golongan_darah` DISABLE KEYS */;
INSERT INTO `golongan_darah` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'A', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'B', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'AB', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'O', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `golongan_darah` ENABLE KEYS */;


-- Dumping structure for table ibi.iuran
CREATE TABLE IF NOT EXISTS `iuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.iuran: ~0 rows (approximately)
/*!40000 ALTER TABLE `iuran` DISABLE KEYS */;
/*!40000 ALTER TABLE `iuran` ENABLE KEYS */;


-- Dumping structure for table ibi.module
CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `parent` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.module: ~16 rows (approximately)
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` (`id`, `name`, `url`, `icon`, `parent`, `order`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Beranda', 'home', 'fa fa-home', 0, 1, 1, '2016-12-15 22:24:48', 1, '2016-12-15 23:23:09'),
	(2, 'Data Master', '', 'fa fa-database', 0, 2, 1, '2016-12-15 22:25:55', 1, '2016-12-15 23:23:29'),
	(23, 'Level User', 'users_level', '', 2, 5, 1, '2016-12-15 23:12:35', 1, '2017-03-15 22:01:06'),
	(24, 'Status User', 'reference/users_status', '', 2, 6, 1, '2016-12-15 23:13:12', 1, '2017-03-15 22:01:17'),
	(25, 'Pengguna', 'users', 'fa fa-user', 0, 6, 1, '2016-12-15 23:15:54', 1, '2016-12-15 23:25:30'),
	(26, 'Backup', 'backup', 'fa fa-download', 0, 8, 1, '2016-12-15 23:16:42', 1, '2016-12-16 00:21:36'),
	(27, 'Module', 'module', 'fa fa-check', 0, 7, 1, '2016-12-16 00:21:22', 0, '0000-00-00 00:00:00'),
	(37, 'Pendidikan', 'reference/pendidikan', '', 2, 2, 1, '2017-03-15 22:01:56', 1, '2017-03-15 22:14:37'),
	(38, 'Pelatihan', 'reference/pelatihan', '', 2, 2, 1, '2017-03-15 22:03:49', 0, '0000-00-00 00:00:00'),
	(39, 'Status Kepegawaian', 'reference/status_pegawai', '', 2, 3, 1, '2017-03-15 22:04:16', 0, '0000-00-00 00:00:00'),
	(40, 'Bidan', 'bidan', '', 2, 1, 1, '2017-03-15 22:14:17', 0, '0000-00-00 00:00:00'),
	(41, 'Transaksi', '', 'fa fa-tasks', 0, 3, 1, '2017-03-21 20:23:07', 1, '2017-03-21 20:24:17'),
	(42, 'KTA', 'kta', '', 41, 1, 1, '2017-03-21 20:23:22', 0, '0000-00-00 00:00:00'),
	(43, 'Golongan Darah', 'reference/golongan_darah', '', 2, 5, 1, '2017-03-21 23:56:30', 0, '0000-00-00 00:00:00'),
	(44, 'Status KTA', 'reference/bidan_kta_status', '', 2, 6, 1, '2017-03-21 23:57:27', 0, '0000-00-00 00:00:00'),
	(45, 'Tipe KTA', 'reference/bidan_kta_type', '', 2, 7, 1, '2017-03-21 23:57:51', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `module` ENABLE KEYS */;


-- Dumping structure for table ibi.pelatihan
CREATE TABLE IF NOT EXISTS `pelatihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.pelatihan: ~8 rows (approximately)
/*!40000 ALTER TABLE `pelatihan` DISABLE KEYS */;
INSERT INTO `pelatihan` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'APN', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'PONED', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'CTU', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'Management BBL', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'MU', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'ASFIKSI', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'KIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(8, 'ABPK', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pelatihan` ENABLE KEYS */;


-- Dumping structure for table ibi.pendidikan
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.pendidikan: ~9 rows (approximately)
/*!40000 ALTER TABLE `pendidikan` DISABLE KEYS */;
INSERT INTO `pendidikan` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'SD', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'SMP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'SMA', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'D1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'D3', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'D4', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'S1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(8, 'S2', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(9, 'S3', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `pendidikan` ENABLE KEYS */;


-- Dumping structure for table ibi.status_pegawai
CREATE TABLE IF NOT EXISTS `status_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.status_pegawai: ~7 rows (approximately)
/*!40000 ALTER TABLE `status_pegawai` DISABLE KEYS */;
INSERT INTO `status_pegawai` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'PNS', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'PTT Pusat', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'PTT Provinsi', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'PTT Daerah', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'Magang', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'TKS', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'Assisten Bidan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `status_pegawai` ENABLE KEYS */;


-- Dumping structure for table ibi.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `ip_login` varchar(50) NOT NULL,
  `date_login` datetime NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `ip_login`, `date_login`, `user_agent`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Adam Prasetia', 'damz', '202cb962ac59075b964b07152d234b70', 1, '::1', '2017-03-21 23:58:32', 'Windows 7(Google Chrome 56.0.2924.87)', 1, 0, '0000-00-00 00:00:00', 2, '2016-10-21 09:34:23'),
	(2, 'Farida Ambarwati', 'ambar', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, '::1', '2016-12-16 01:56:01', 'Windows 7(Google Chrome 55.0.2883.87)', 1, 1, '2016-10-21 09:21:00', 1, '2016-12-16 01:12:10'),
	(3, 'Budiarti', 'adhe', '202cb962ac59075b964b07152d234b70', 3, '::1', '2017-01-01 15:10:28', 'Windows 7(Google Chrome 55.0.2883.87)', 1, 1, '2016-12-30 20:17:58', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table ibi.users_level
CREATE TABLE IF NOT EXISTS `users_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `module` text NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.users_level: ~1 rows (approximately)
/*!40000 ALTER TABLE `users_level` DISABLE KEYS */;
INSERT INTO `users_level` (`id`, `name`, `module`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'ADMIN', '1,2,40,37,38,39,23,43,24,44,45,41,42,25,27,26', 0, '0000-00-00 00:00:00', 1, '2017-03-21 23:58:08');
/*!40000 ALTER TABLE `users_level` ENABLE KEYS */;


-- Dumping structure for table ibi.users_status
CREATE TABLE IF NOT EXISTS `users_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.users_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `users_status` DISABLE KEYS */;
INSERT INTO `users_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'ACTIVE', 0, '2015-10-31 14:00:03', 1, '2016-06-24 10:43:51'),
	(2, 'NOT ACTIVE', 0, '2015-10-31 14:00:03', 1, '2016-06-24 10:43:55');
/*!40000 ALTER TABLE `users_status` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
