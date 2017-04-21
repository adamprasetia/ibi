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

-- Dumping structure for table ibi.bidan
CREATE TABLE IF NOT EXISTS `bidan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `golongan_darah` int(11) NOT NULL,
  `wilayah` int(11) NOT NULL,
  `praktik_nama` varchar(50) NOT NULL,
  `praktik_alamat` text NOT NULL,
  `pendidikan` int(11) NOT NULL,
  `kampus` varchar(50) NOT NULL,
  `tahun_lulus` varchar(4) NOT NULL,
  `no_ijazah` varchar(50) NOT NULL,
  `tempat_kerja` varchar(100) NOT NULL,
  `status_pegawai` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nomor` varchar(30) NOT NULL,
  `kta_no` varchar(20) NOT NULL,
  `sertikom` varchar(20) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pendidikan` (`pendidikan`),
  KEY `status_kepegawaian` (`status_pegawai`),
  KEY `golongan_darah` (`golongan_darah`),
  KEY `wilayah` (`wilayah`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.bidan: ~49 rows (approximately)
/*!40000 ALTER TABLE `bidan` DISABLE KEYS */;
INSERT INTO `bidan` (`id`, `name`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tlp`, `golongan_darah`, `wilayah`, `praktik_nama`, `praktik_alamat`, `pendidikan`, `kampus`, `tahun_lulus`, `no_ijazah`, `tempat_kerja`, `status_pegawai`, `nip`, `nomor`, `kta_no`, `sertikom`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'LINDA LIDYAWATI', 'CIANJUR', '1974-04-23', 'PERUM BUMI MAS BLOK B3 NO 05 SIRNAGALIH CIANJUR', '0813 2169 4664', 1, 1, '', '', 2, '', '2012', '', 'DINKES CIANJUR', 0, '', '', '10.06.0084', '77.99.7777', 0, '0000-00-00 00:00:00', 1, '2017-04-12 22:49:41'),
	(2, 'RINA YUDIANTINI', 'CIANJUR', '1975-02-02', 'KP TUGUSARI RT 06/18 DESA SAYANG KEC CIANJUR KAB CIANJUR', '0853 1660 5813', 3, 0, '', '', 2, '', '2003', '', 'DINKES CIANJUR', 0, '', '', '10.06.0044', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'IMAS SUMIYATI', 'CIANJUR', '1969-06-01', 'KP NARINGGUL RT 02/03 DESA NARINGGUL KEC NARINGGUL KAB CIANJUR', '0812 2020 4200', 4, 0, '', '', 2, '', '2008', '', 'PKM NARINGGUL', 0, '', '', '10.06.0007', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'MASROPAH', 'CIANJUR', '1987-05-02', 'KP CILUBANG RT 02/01 DESA CIMENTENG KEC CAMPAKA KAB CIANJUR', '0857 9577 2456', 4, 0, '', '', 2, '', '2009', '', 'PKM CAMPAKA', 0, '', '', '10.06.0501', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'DELIANA LUBIS', 'CIANJUR', '1986-06-22', 'KP CURUG OPAT RT 04/05 DESA SUKAJAYA KEC BOJNGPICUNG KAB CIANJUR', '0818 0970 5999', 4, 0, '', '', 2, '', '2007', '', 'PKM CIKONDANG', 0, '', '', '10.06.0397', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'IIM FATIMAH', 'CIANJUR', '1985-04-24', 'KP WANGUN RT 04/04 DESA WANGUNJAYA KEC CAMPAKA KAB CIANJUR', '0858 6007 2745', 0, 0, '', '', 2, '', '2007', '', 'PKM CAMPAKA', 0, '', '', '10.06.0421', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'NUNUNG NURJANAH', 'CIANJUR', '1968-10-20', 'KP NYALANTRANG RT 01/01 DESA SINDANGSARI KEC CILAKU KAB CIANJUR', '0858 6419 6810', 1, 0, '', '', 2, '', '2008', '', 'PKM SUKASARI', 0, '', '', '10.06.0261', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(8, 'ROSDIANI', 'GARUT', '1970-12-17', 'KP SUKARESMI RT 06/04 DESA RAHONG KEC CILAKU KAB CIANJUR', '0857 2000 7480', 2, 0, '', '', 2, '', '2008', '', 'PKM SUKASARI', 0, '', '', '10.06.0260', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(9, 'HJ AYI NANI HARYANI', 'CIANJUR', '1973-06-13', 'KP RANCAGOONG RT 02/05 DESA RANCAGOONG KEC CILAKU KAB CIANJUR', '0815 7237 9900', 4, 0, '', '', 2, '', '2008', '', 'PKM SUKASARI', 0, '', '', '10.06.0296', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(10, 'IMAS ROHAYATI', 'CIANJUR', '1967-01-16', 'KP KEBON KAWUNG RT 04/04 DESA CIHARASHAS KEC CILAKU KAB CIANJUR', '0813 2027 7841', 2, 0, '', '', 3, '', '2015', '', 'PKM SUKASARI', 0, '', '', '10.06.0293', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(11, 'HJ RAHMATIAH', 'UJUNG PANDANG', '1970-08-04', 'KP GENTENG RT 02/09 DESA MUNJUL KEC CILAKU KAB CIANJUR', '0812 2009 6406', 2, 0, '', '', 3, '', '2014', '', 'PKM SUKASARI', 0, '', '', '10.06.0295', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(12, 'AI KUSMIATI', 'CIANJUR', '1969-04-20', 'JL RAYA BANDUNG KM 05 RT 06/03 DESA HEGARMANAH KEC KARANGTENGAH KAB CIANJUR', '0856 5958 6404', 1, 0, '', '', 2, '', '2012', '', 'PKM KARTENG', 0, '', '', '10.06.0023', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(13, 'NENNI ROSITTA MALAU', 'BANDUNG', '1974-05-27', 'KP PANARUBAN RT 02/02 DESA BUNIJAYA KEC PAGELARAN  KAB CIANJUR', '0856 6356 4070', 4, 0, '', '', 2, '', '2012', '', 'RSUD PAGELARAN', 0, '', '', '10.06.0241', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(14, 'SITI KOMARIAH', 'SUMEDANG', '1974-08-11', 'KP PASIR NANGKA RT 03/03 DESA SINDANGJAYA KEC CIRANJANG KAB CIANJUR', '0818 0490 0531', 0, 0, '', '', 2, '', '2012', '', 'PKM BOJONGPICUNG', 0, '', '', '10.06.0285', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(15, 'TUTI HASTUTI', 'CIANJUR', '1966-03-23', 'KP WARUNG JAMBE RT 03/15 DESA SOLOKPANDAN KEC CIANJUR KAB CIANJUR', '0858 6348 9121', 1, 0, '', '', 2, '', '2010', '', 'RSUD CIANJUR', 0, '', '', '10.06.0211', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(16, 'ROKAYAH', 'CIANJUR', '1977-09-25', 'PERUM KOTA BARU BLOK B5 NO 11 DESA SUKASARI KEC CILAKU KAB CIANJUR', '0815 6331 1134', 3, 0, '', '', 3, '', '2014', '', 'PKM SUKASARI', 0, '', '', '10.06.0221', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(17, 'HJ DIDA AISYAH', 'CIANJUR', '1966-09-03', 'JL RAYA CIBEBER KP CILAKU DESA SUKASARI KEC CILAKU KAB CIANJUR', '0817 1437 3536', 4, 0, '', '', 3, '', '2011', '', 'PKM SUKASARI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(18, 'HJ TUTI SUPENTI', 'CIANJUR', '1970-07-06', 'BTN BUMI MAS BHAYANGKARA RT 02/17 DESA SIRNAGALIH KEC CILAKU KAB CIANJUR', '0815 1143 1600', 4, 0, '', '', 3, '', '2011', '', 'PKM SUKASARI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(19, 'SETIYATI', 'CIREBON', '1971-04-20', 'KP SODONG RT 02/04 DESA CIBINONG HILIR KEC CILAKU KAB CIANJUR', '0813 2026 5915', 2, 0, '', '', 2, '', '2006', '', 'PKM SUKASARI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(20, 'LENI KARNIAWATI', 'CIANJUR', '1990-01-14', 'KP KULINA RT 01/04 DESA SUKATANI KEC HAURWANGI KAB CIANJUR', '0857 2066 7898', 0, 0, '', '', 2, '', '2011', '', 'BELUM BEKERJA', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(21, 'SRI RAKHMAWATI', 'CIANJUR', '1994-09-17', 'KP PUNCAKWANGI DESA MEKARSARI KEC PAGELARAN KAB CIANJUR', '0856 2450 0017', 0, 0, '', '', 2, '', '2015', '', 'RSUD PAGELARAN', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(22, 'MIA RISMIATI', 'CIANJUR', '1993-02-10', 'KP GUNUNG BITUNG RT 01/05 DESA PANDANGAPAN KEC CIBINONG KAB CIANJUR', '0853 2182 9900', 4, 0, '', '', 2, '', '2014', '', 'RSUD PAGELARAN', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(23, 'SEFTY APRILIA', 'CIANJUR', '1991-04-06', 'KP BABAKAN CANGKLEK RT 02/02 DESA SUKAMANAH KEC CUGENANG KAB CIANJUR', '0857 9466 3400', 1, 0, '', '', 2, '', '2012', '', 'PKM CIKONDANG', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(24, 'ALMA SUJILA SALAM', 'CIANJUR', '1993-10-17', 'KP CIJENGKOL RT 02/02 DESA SUKAMANAH KEC CIBEBER KAB CIANJUR', '0877 2146 4724', 0, 0, '', '', 2, '', '2015', '', 'RSUD PAGELARAN', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(25, 'DEVI NURALIAH', 'CIANJUR', '1992-02-02', 'KP PANGAWAREN RT 03/05 DESA SUKARATU KEC BOJONGPICUNG KAB CIANJUR', '0852 2265 2476', 4, 0, '', '', 2, '', '2015', '', 'RSUD PAGELARAN', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(26, 'NURHALIPAH', 'CIANJUR', '1995-04-05', 'KP PADARKEMIS RT 03/01 DESA MEKARJAYA KEC SUKALUYU', '0857 2209 7444', 0, 0, '', '', 2, '', '2015', '', 'RSUD PAGELARAN', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(27, 'VIDONA SUCI EGI APRILIA', 'BANDUNG', '1989-04-07', 'BTN BUMI MAS BHAYANGKARA BLOK J2 NO 02 RT 06/17 DESA SIRNAGALIH KEC CILAKU KAB CIANJUR', '0857 2142 7591', 4, 0, '', '', 2, '', '2012', '', 'BELUM BEKERJA', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(28, 'NORMA SRI RAHAYU', 'CIANJUR', '1995-12-30', 'KP KEBON PEUTEUY RT 02/02 DESA KEBONPEUTEUY KEC GEKBRONG KAB CIANJUR', '0815 4648 8526', 4, 0, '', '', 2, '', '2015', '', 'BPM BD LISTE', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(29, 'FITRI MEILANI ARFASA', 'CIANJUR', '1994-05-15', 'KP CIBAKO RT 03/03 DESA CIPETIR KEC CIBEBER KAB CIANJUR', '0823 2004 8202', 1, 0, '', '', 0, '', '2016', '', 'BPM BD LILIS M', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(30, 'RIKA NURMILA', 'CIANJUR', '1983-04-18', 'KP SINDANGPALAY RT 02/08 DESA SUKAKERTA KEC CILAKU KAB CIANJUR', '0813 2263 0424', 3, 0, '', '', 2, '', '2010', '', 'PKM SUKASARI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(31, 'ASTRI SULASTRI', 'CIANJUR', '1986-08-15', 'KP SUKA ASIH RT 07/08 DESA MULYASARI KEC CILAKU KAB CIANJUR', '0821 1659 8002', 2, 0, '', '', 2, '', '2009', '', 'PKM SUKASARI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(32, 'NURHAYATI HIDAYAT', 'CIANJUR', '1985-09-27', 'KP NEGLASARI RT 03/02 DESA CIPANAS KEC CIPANAS KAB CIANJUR', '0857 2300 1241', 2, 0, '', '', 2, '', '2008', '', 'PKM SUKASARI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(33, 'ANISA RATNASARI', 'CIANJUR', '1986-06-14', 'KP PUNCAK SUJI RT 04/07 DESA RANCAGOONG KEC CILAKU KAB CIANJUR', '0857 2062 1459', 4, 0, '', '', 2, '', '2009', '', 'PKM SUKASARI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(34, 'YUNI SRI KARMILAH', 'CIANJUR', '1991-09-01', 'KP SIRNALUYU RT 04/03 DESA KUTAWARINGIN KEC MANDE KAB CIANJUR', '0838 1707 7798', 2, 0, '', '', 2, '', '2013', '', 'BPM BD DEWANTY', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(35, 'DE TATI WINARTI', 'CIANJUR', '1989-04-10', 'KP PAMOYANAN RT 02/05 DESA PARAKAN TUGU KEC CIJATO KAB CIANJUR', '0857 9311 2470', 2, 0, '', '', 2, '', '2011', '', 'PKM CIJATI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(36, 'PUTRI NURMALAWANTI', 'CIANJUR', '1992-03-19', 'KP CIBENING RT 01/02 DESA CISARANDI KEC WARUNGKONDANG KAB CIANJUR', '0857 2158 9995', 0, 0, '', '', 2, '', '2012', '', 'KLINIK LION AIR IN HOUSE', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(37, 'SILVIA NURMAYASARI', 'GARUT', '1994-07-29', 'KP KABANDUNGAN RT 04/02 DESA SUKALUYU KEC SUKALUYU KAB CIANJUR', '0838 2570 0002', 1, 0, '', '', 2, '', '2015', '', 'PKM SUKALUYU', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(38, 'JENI FRANKA WIDI SOPANDI', 'CIANJUR', '1990-02-20', 'PERUM BUMI CIRANJANG ASRI RT 02/14 DESA CIBIUK KEC CIRANJANG KAB CIANJUR', '0858 6344 4107', 1, 0, '', '', 2, '', '2011', '', 'PKM BOJONGPICUNG', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(39, 'ELA ALAWIYAH', 'CIANJUR', '1989-06-25', 'KP NANGGALA RT 03/04 DESA NANGGALA MEKAR KEC CIRANJANG KAB CIANJUR', '0822 1829 6642', 2, 0, '', '', 2, '', '2012', '', 'PKM BOJONGPICUNG', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(40, 'LUSI YULIAS WALINDARA', 'CIANJUR', '1980-04-19', 'PERUM PRIMA ANGGREK BLOK E NO 04 RT 09/02 DESA RANCAGOONG KEC CILAKU KAB CIANJUR', '0812 2046 6863', 3, 0, '', '', 2, '', '2008', '', 'PKM SUKASARI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(41, 'IRA MUSTIKA SARI', 'BOGOR', '1992-05-05', 'KP PADARINCANG PHOENIX RT 02/04 DESA PALASARI KEC CIPANAS KAB CIANJUR', '0857 1072 2329', 0, 0, '', '', 2, '', '2012', '', 'BELUM BEKERJA', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(42, 'IRMA HASANAH', 'CIAMIS', '1988-04-17', 'JL CIMAREME NO 83 PERUMNAS RT 001 RW 005 DS HEGARMANAHKEC. KARANGTENGAH', '0813 2168 3371', 0, 0, '', '', 2, '', '2010', '', 'BPM BD YULIANI', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(43, 'PUTRI ZAENURINA', 'CIANJUR', '1994-01-05', 'KP PANEMBONG RT 02/02 DESA LIMBANGAN SARI KEC CIANJUR KAB CIANJUR', '0819 1250 7574', 4, 0, '', '', 2, '', '2015', '', 'BPM BD HJ NENENG ROHIMAH', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(44, 'CACAS CAHWATI', 'CIANJUR', '1989-12-08', 'KP RAWASALAK 03/01 DS GELARANYAR KEC. PAGELARAN', '0858 6009 2080', 1, 0, '', '', 2, '', '2012', '', 'PKM SD KERTA', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(45, 'FITRI IRMA SAPUTRI', 'CIANJUR', '1991-04-03', 'BTN PURI ASRI LIMBANGAN BLOK A9 NO 34 DS CIKAROYA KEC. WARUNGKONDANG', '0815 1779 1993', 1, 0, '', '', 2, '', '2012', '', 'PKM CIBAREGBEG', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(46, 'EVA FATIMAH', 'CIANJUR', '1985-02-22', 'KP SINDANG RERET 01/01 KEC. CIRANJANG KAB. CIANJUR', '', 0, 0, '', '', 2, '', '2007', '', 'PKM CIRANJANG', 0, '', '', '', '', 0, '0000-00-00 00:00:00', 1, '2017-04-12 23:42:15'),
	(47, 'INA ROSIANA', 'CIANJUR', '1965-02-04', 'KP BARU RT 02/RW 21 KEL. SAYANG', '', 0, 0, '', '', 2, '', '2012', '', 'PKM CJR KOTA', 0, '', '33443.2223.222', '2233.222.112', '636363663', 0, '0000-00-00 00:00:00', 1, '2017-04-17 21:24:12'),
	(48, 'NENENG MULYANI', 'CIANJUR', '1997-04-10', 'KP CIBACANG 06/05 DS SITUHIANG KEC. PAGELARAN-CIANJUR', '083817321885', 3, 1, 'Nama Tempat Praktik', 'Alamat Praktik Alamat Praktik Alamat Praktik Alamat Praktik Alamat Praktik Alamat Praktik Alamat Praktik Alamat Praktik Alamat Praktik', 2, 'AKBID CIANJUR', '2012', '1232.12323.2323.2323', 'RSUD PAGELARAN', 0, '', 'no rek', 'nomor kta', 'no sert', 0, '0000-00-00 00:00:00', 1, '2017-04-18 21:09:19'),
	(49, 'Adam Prasetia', 'Bandung', '1989-02-16', 'Warujajar', '083817321885', 2, 6, 'DamzSoft', 'Palmerah, Jakarta Pusat', 4, 'Universitas Suryakancana', '2011', '1234.5678.90001', 'PT Kompas Cyber Media', 2, '033152', '222.222.222', '111.111.111', '333.333.333', 1, '2017-04-18 21:13:49', 1, '2017-04-20 21:42:26');
/*!40000 ALTER TABLE `bidan` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_kta
CREATE TABLE IF NOT EXISTS `bidan_kta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `bidan` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `syarat` varchar(50) NOT NULL,
  `masa_berlaku` int(4) NOT NULL,
  `status` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bidan` (`bidan`),
  KEY `type` (`tipe`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.bidan_kta: ~51 rows (approximately)
/*!40000 ALTER TABLE `bidan_kta` DISABLE KEYS */;
INSERT INTO `bidan_kta` (`id`, `tanggal`, `bidan`, `tipe`, `syarat`, `masa_berlaku`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(2, '2017-03-28', 2, 2, '', 0, 2, 1, '2017-03-28 07:36:37', 0, '0000-00-00 00:00:00'),
	(3, '2017-03-28', 3, 2, '', 0, 2, 1, '2017-03-28 07:36:51', 0, '0000-00-00 00:00:00'),
	(4, '2017-03-28', 4, 2, '', 0, 2, 1, '2017-03-28 07:37:03', 0, '0000-00-00 00:00:00'),
	(5, '2017-03-28', 17, 3, '', 0, 2, 1, '2017-03-28 07:37:43', 1, '2017-03-28 07:41:34'),
	(7, '2017-03-28', 21, 1, '', 0, 2, 1, '2017-03-28 07:42:57', 0, '0000-00-00 00:00:00'),
	(8, '2017-03-28', 5, 2, '', 0, 2, 1, '2017-03-28 08:06:54', 0, '0000-00-00 00:00:00'),
	(9, '2017-03-28', 6, 2, '', 0, 2, 1, '2017-03-28 08:07:10', 0, '0000-00-00 00:00:00'),
	(10, '2017-03-28', 7, 2, '', 0, 2, 1, '2017-03-28 08:36:07', 0, '0000-00-00 00:00:00'),
	(11, '2017-03-28', 8, 2, '', 0, 2, 1, '2017-03-28 08:37:43', 0, '0000-00-00 00:00:00'),
	(12, '2017-03-28', 9, 2, '', 0, 2, 1, '2017-03-28 08:39:22', 0, '0000-00-00 00:00:00'),
	(13, '2017-03-28', 10, 2, '', 0, 2, 1, '2017-03-28 08:40:01', 0, '0000-00-00 00:00:00'),
	(14, '2017-03-28', 11, 2, '', 0, 2, 1, '2017-03-28 08:40:15', 0, '0000-00-00 00:00:00'),
	(15, '2017-03-28', 12, 2, '', 0, 2, 1, '2017-03-28 08:40:53', 0, '0000-00-00 00:00:00'),
	(16, '2017-03-28', 13, 2, '', 0, 2, 1, '2017-03-28 08:41:04', 0, '0000-00-00 00:00:00'),
	(17, '2017-03-28', 14, 2, '', 0, 2, 1, '2017-03-28 08:41:16', 0, '0000-00-00 00:00:00'),
	(18, '2017-03-28', 15, 2, '', 0, 2, 1, '2017-03-28 08:41:29', 0, '0000-00-00 00:00:00'),
	(19, '2017-03-28', 16, 2, '', 0, 2, 1, '2017-03-28 08:41:46', 0, '0000-00-00 00:00:00'),
	(20, '2017-03-28', 18, 3, '', 0, 2, 1, '2017-03-28 08:42:50', 0, '0000-00-00 00:00:00'),
	(21, '2017-03-28', 19, 3, '', 0, 2, 1, '2017-03-28 08:43:09', 0, '0000-00-00 00:00:00'),
	(22, '2017-03-28', 20, 3, '', 0, 2, 1, '2017-03-28 08:46:25', 0, '0000-00-00 00:00:00'),
	(24, '2017-03-28', 22, 1, '', 0, 2, 1, '2017-03-28 08:48:23', 0, '0000-00-00 00:00:00'),
	(25, '2017-03-28', 23, 1, '', 0, 2, 1, '2017-03-28 08:48:32', 0, '0000-00-00 00:00:00'),
	(26, '2017-03-28', 24, 1, '', 0, 2, 1, '2017-03-28 08:48:40', 0, '0000-00-00 00:00:00'),
	(27, '2017-03-28', 25, 1, '', 0, 2, 1, '2017-03-28 08:48:49', 0, '0000-00-00 00:00:00'),
	(28, '2017-03-28', 26, 1, '', 0, 2, 1, '2017-03-28 08:49:00', 0, '0000-00-00 00:00:00'),
	(29, '2017-03-28', 27, 1, '', 0, 2, 1, '2017-03-28 08:49:19', 0, '0000-00-00 00:00:00'),
	(30, '2017-03-28', 28, 1, '', 0, 2, 1, '2017-03-28 08:49:27', 0, '0000-00-00 00:00:00'),
	(31, '2017-03-28', 29, 1, '', 0, 2, 1, '2017-03-28 08:49:54', 0, '0000-00-00 00:00:00'),
	(32, '2017-03-28', 30, 1, '', 0, 2, 1, '2017-03-28 08:50:05', 0, '0000-00-00 00:00:00'),
	(33, '2017-03-28', 31, 1, '', 0, 2, 1, '2017-03-28 08:50:14', 0, '0000-00-00 00:00:00'),
	(34, '2017-03-28', 32, 1, '', 0, 2, 1, '2017-03-28 08:50:26', 0, '0000-00-00 00:00:00'),
	(35, '2017-03-28', 33, 1, '', 0, 2, 1, '2017-03-28 09:15:48', 0, '0000-00-00 00:00:00'),
	(36, '2017-03-28', 34, 1, '', 0, 2, 1, '2017-03-28 09:15:58', 0, '0000-00-00 00:00:00'),
	(37, '2017-03-28', 35, 1, '', 2019, 1, 1, '2017-03-28 09:16:13', 1, '2017-04-21 01:04:42'),
	(38, '2017-03-28', 36, 1, '', 2016, 1, 1, '2017-03-28 09:16:24', 1, '2017-04-21 01:02:09'),
	(39, '2017-03-28', 37, 1, '', 0, 2, 1, '2017-03-28 09:16:37', 1, '2017-03-28 09:17:28'),
	(40, '2017-03-28', 38, 1, '', 0, 2, 1, '2017-03-28 09:16:45', 0, '0000-00-00 00:00:00'),
	(41, '2017-03-28', 39, 1, '', 0, 2, 1, '2017-03-28 09:18:05', 0, '0000-00-00 00:00:00'),
	(42, '2017-03-28', 40, 1, '', 0, 2, 1, '2017-03-28 09:18:13', 0, '0000-00-00 00:00:00'),
	(43, '2017-03-28', 41, 1, '', 0, 2, 1, '2017-03-28 09:18:21', 0, '0000-00-00 00:00:00'),
	(44, '2017-03-28', 42, 1, '', 0, 2, 1, '2017-03-28 09:18:29', 0, '0000-00-00 00:00:00'),
	(45, '2017-03-28', 43, 1, '', 0, 2, 1, '2017-03-28 09:18:38', 0, '0000-00-00 00:00:00'),
	(46, '2017-03-28', 44, 1, '', 0, 2, 1, '2017-03-28 09:18:51', 0, '0000-00-00 00:00:00'),
	(47, '2017-03-28', 45, 1, '', 0, 2, 1, '2017-03-28 09:19:00', 0, '0000-00-00 00:00:00'),
	(48, '2017-03-28', 46, 1, '', 0, 2, 1, '2017-03-28 09:19:09', 0, '0000-00-00 00:00:00'),
	(49, '2017-03-28', 47, 1, '', 2017, 1, 1, '2017-03-28 09:19:17', 1, '2017-04-15 11:49:41'),
	(53, '2017-04-12', 1, 1, '', 2000, 1, 1, '2017-04-12 21:19:49', 1, '2017-04-21 01:42:43'),
	(59, '2017-04-20', 48, 1, '', 0, 2, 1, '2017-04-20 23:46:31', 0, '0000-00-00 00:00:00'),
	(60, '2017-04-19', 49, 1, '', 2003, 1, 1, '2017-04-20 23:47:24', 1, '2017-04-21 01:16:28'),
	(61, '2017-04-20', 49, 2, '', 2018, 1, 1, '2017-04-20 23:47:40', 1, '2017-04-21 01:15:27'),
	(62, '2017-04-21', 49, 2, '', 0, 2, 1, '2017-04-21 01:16:58', 0, '0000-00-00 00:00:00'),
	(63, '2017-04-21', 1, 2, '', 2005, 1, 1, '2017-04-21 01:42:55', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_kta` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_kta_status
CREATE TABLE IF NOT EXISTS `bidan_kta_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_kta_status: ~3 rows (approximately)
/*!40000 ALTER TABLE `bidan_kta_status` DISABLE KEYS */;
INSERT INTO `bidan_kta_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Selesai', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Proses Cabang', 0, '0000-00-00 00:00:00', 1, '2017-03-22 00:00:02'),
	(3, 'Proses Daerah', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_kta_status` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_kta_syarat
CREATE TABLE IF NOT EXISTS `bidan_kta_syarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_kta_syarat: ~4 rows (approximately)
/*!40000 ALTER TABLE `bidan_kta_syarat` DISABLE KEYS */;
INSERT INTO `bidan_kta_syarat` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'FOTO COPY STR YANG MASIH BERLAKU 1 LEMBAR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'FOTO COPY IJAZAH 1 LEMBAR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'FOTO UKURAN 3X4 (LATAR BELAKANG MERAH & MEMAKAI SERAGAM IBI) 1 LEMBAR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'FOTO COPY KTA LAMA 1 LEMBAR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_kta_syarat` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_kta_tipe
CREATE TABLE IF NOT EXISTS `bidan_kta_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_kta_tipe: ~2 rows (approximately)
/*!40000 ALTER TABLE `bidan_kta_tipe` DISABLE KEYS */;
INSERT INTO `bidan_kta_tipe` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Baru', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Perpanjangan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Hilang', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_kta_tipe` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_pelatihan
CREATE TABLE IF NOT EXISTS `bidan_pelatihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bidan` int(11) NOT NULL,
  `pelatihan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nomor` varchar(30) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.bidan_pelatihan: ~3 rows (approximately)
/*!40000 ALTER TABLE `bidan_pelatihan` DISABLE KEYS */;
INSERT INTO `bidan_pelatihan` (`id`, `bidan`, `pelatihan`, `tanggal`, `alamat`, `nomor`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 2, 1, '2017-03-27', 'Hotel Palace', '5647.475.884.89554', 1, '2017-03-27 18:09:45', 1, '2017-03-27 19:51:50'),
	(2, 48, 5, '2017-03-20', 'Kab Cianjur', '123/gsf', 4, '2017-03-28 17:27:01', 1, '2017-04-18 21:40:23'),
	(3, 48, 1, '2017-04-18', 'Puncak', '123.123.123', 1, '2017-04-18 21:34:30', 1, '2017-04-18 21:37:20'),
	(4, 49, 8, '2017-04-18', '', '', 1, '2017-04-18 22:01:18', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_pelatihan` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_m
CREATE TABLE IF NOT EXISTS `bidan_sipb_m` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `bidan` int(11) NOT NULL,
  `bidan_lain` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `syarat` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bidan` (`bidan`),
  KEY `type` (`tipe`),
  KEY `status` (`status`),
  KEY `bidan_2` (`bidan_lain`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_m: ~6 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_m` DISABLE KEYS */;
INSERT INTO `bidan_sipb_m` (`id`, `tanggal`, `bidan`, `bidan_lain`, `tipe`, `syarat`, `nomor`, `masa_berlaku`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(3, '2017-04-14', 47, 0, 1, '', '123.123.123', '2017-04-16', 1, 1, '2017-04-15 17:24:16', 1, '2017-04-15 17:41:02'),
	(4, '2017-04-15', 47, 0, 2, '', '', '0000-00-00', 2, 1, '2017-04-15 17:40:04', 0, '0000-00-00 00:00:00'),
	(7, '2017-04-21', 49, 49, 1, '', '123', '2017-04-22', 1, 1, '2017-04-21 00:15:56', 1, '2017-04-21 00:17:01'),
	(8, '2017-04-22', 49, 0, 2, '', '123', '2017-04-23', 1, 1, '2017-04-21 00:17:24', 1, '2017-04-21 01:44:08'),
	(10, '2017-04-21', 48, 0, 1, '', '', '0000-00-00', 1, 1, '2017-04-21 00:19:26', 1, '2017-04-21 00:23:02'),
	(11, '2017-04-21', 48, 0, 2, '', '', '0000-00-00', 1, 1, '2017-04-21 00:23:14', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_m` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_m_status
CREATE TABLE IF NOT EXISTS `bidan_sipb_m_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_m_status: ~3 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_m_status` DISABLE KEYS */;
INSERT INTO `bidan_sipb_m_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Selesai', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Proses Cabang', 0, '0000-00-00 00:00:00', 1, '2017-03-22 00:00:02'),
	(3, 'Proses Daerah', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_m_status` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_m_syarat
CREATE TABLE IF NOT EXISTS `bidan_sipb_m_syarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_m_syarat: ~15 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_m_syarat` DISABLE KEYS */;
INSERT INTO `bidan_sipb_m_syarat` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Foto copy Ijazah Bidan 1 lembar', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Foto copy SIB/STR yang masih berlaku 1 lembar', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Surat Keterangan Sehat dari Dokter yang mempunyai SIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'Surat pernyataan memiliki tempat praktik diatas materai Rp 6.000, mengetahui RT/RW setempat', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'Surat Pernyataan  membina 2 posyandu dilingkungan tempat praktik diatas materai Rp 6.000, mengetahui', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'Surat Pernyataan akan melaporkan hasil pelayanan KIA ke Puskesmas Setempat di TTD Kapus dan cap', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'Surat Pernyataan tidak berkebaratan melakukan praktik dari Kepala Puskesmas Wilayah tempat kerja', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(8, 'Rekomendasi dari Kecamatan setempat', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(9, 'Rekomendasi dari Organisasi Profesi', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(10, 'Pas Foto ukuran 4x6 cm dan 3x4 cm masing – masing sebanyak 2 lembar ( memakai seragam IBI dan Latar Belakang merah)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(11, 'Foto copy KTA ( Kartu Tanda Anggota )', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(12, 'Foto copy NPWP (Nomor Pokok Wajib Pajak)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(13, 'Lampirkan foto copy sertifikat – sertifikat pelatihan atau seminar berlaku dari 5 tahun kebelakang', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(14, 'Bagi Bidan yang memperpanjang  SIPB harap lampirkan foto kopy SIPB lama 1 lembar ', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(15, 'Bagi Bidan yang pertama mengajukan SIPB harap melampirkan Surat Keterangan Bekerja minimal 2 tahun (bisa berupa SIKB)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_m_syarat` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_m_tipe
CREATE TABLE IF NOT EXISTS `bidan_sipb_m_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_m_tipe: ~3 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_m_tipe` DISABLE KEYS */;
INSERT INTO `bidan_sipb_m_tipe` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Baru', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Perpanjangan > 5 Tahun Visitasi', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Perpanjangan < 5 Tahun Visitasi', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_m_tipe` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_p
CREATE TABLE IF NOT EXISTS `bidan_sipb_p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `bidan` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `syarat` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bidan` (`bidan`),
  KEY `type` (`tipe`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_p: ~4 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_p` DISABLE KEYS */;
INSERT INTO `bidan_sipb_p` (`id`, `tanggal`, `bidan`, `tipe`, `syarat`, `nomor`, `masa_berlaku`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '2017-03-27', 1, 1, '1,2,3,4,5,6,7,8,9,10,11', '213213123', '2017-03-27', 1, 1, '2017-03-27 12:36:30', 1, '2017-03-27 12:36:40'),
	(2, '2017-04-15', 48, 1, '', '765.567.765', '2017-04-16', 1, 1, '2017-04-15 08:19:08', 0, '0000-00-00 00:00:00'),
	(8, '2017-04-21', 49, 1, '', '123', '2017-04-21', 1, 1, '2017-04-21 00:07:11', 0, '0000-00-00 00:00:00'),
	(9, '2017-04-22', 49, 2, '', '', '0000-00-00', 2, 1, '2017-04-21 00:07:55', 1, '2017-04-21 01:39:26');
/*!40000 ALTER TABLE `bidan_sipb_p` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_p_status
CREATE TABLE IF NOT EXISTS `bidan_sipb_p_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_p_status: ~3 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_p_status` DISABLE KEYS */;
INSERT INTO `bidan_sipb_p_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Selesai', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Proses Cabang', 0, '0000-00-00 00:00:00', 1, '2017-03-22 00:00:02'),
	(3, 'Proses Daerah', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_p_status` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_p_syarat
CREATE TABLE IF NOT EXISTS `bidan_sipb_p_syarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_p_syarat: ~9 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_p_syarat` DISABLE KEYS */;
INSERT INTO `bidan_sipb_p_syarat` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Foto copy Ijazah Bidan 1 lembar', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Foto copy STR yang masih berlaku 1 lembar', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Surat Keterangan Sehat dari Dokter yang mempunyai SIP', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'Surat Keterangan Bekerja Dari Kepala Puskesmas/Rumah Sakit/Klinik (Sesuai tempat bekerja)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'Foto copy SIPB bidan tempat bekerja (Bagi yang Bekerja di BPM)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'Surat Pernyataan bertanggung jawab dari Bidan pengelola BPM bermaterai Rp 6.000,- (Bagi yang Bekerja di BPM)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'Rekomendasi dari Organisasi Profesi', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(8, 'Pas Foto Ukuran 4x6 dan 3x4 cm masing – masing sebanyak 2 lembar (memakai seragam IBI dan latar belakang merah)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(9, 'Foto copy KTA (Kartu Tanda Anggota)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(10, 'Lampirkan foto kopy sertifikat – sertifikat pelatihan atau seminar berlaku dari 5 tahun kebelakang ', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(11, 'Foto copy SIKB lama 1 lembar (bagi perpanjangan)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_p_syarat` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_sipb_p_tipe
CREATE TABLE IF NOT EXISTS `bidan_sipb_p_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_sipb_p_tipe: ~2 rows (approximately)
/*!40000 ALTER TABLE `bidan_sipb_p_tipe` DISABLE KEYS */;
INSERT INTO `bidan_sipb_p_tipe` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Pertama', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Perpanjangan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_sipb_p_tipe` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_str
CREATE TABLE IF NOT EXISTS `bidan_str` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `bidan` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `syarat` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `status` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bidan` (`bidan`),
  KEY `type` (`tipe`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_str: ~8 rows (approximately)
/*!40000 ALTER TABLE `bidan_str` DISABLE KEYS */;
INSERT INTO `bidan_str` (`id`, `tanggal`, `bidan`, `tipe`, `syarat`, `nomor`, `masa_berlaku`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, '2017-03-27', 1, 1, '', 'STR-123.456.789', '2017-04-23', 1, 1, '2017-03-28 11:21:40', 1, '2017-03-28 15:47:09'),
	(2, '2017-03-28', 1, 2, '', '', '0000-00-00', 2, 1, '2017-03-28 12:59:25', 1, '2017-03-30 07:09:28'),
	(4, '2017-03-30', 47, 1, '', '1232312', '2017-04-12', 1, 1, '2017-03-30 07:23:51', 1, '2017-04-12 23:36:56'),
	(6, '2017-04-12', 48, 1, '', '123.123.123', '2017-04-12', 1, 1, '2017-04-12 21:39:18', 0, '0000-00-00 00:00:00'),
	(7, '2017-04-13', 48, 2, '', '222.222.222', '2017-04-13', 1, 1, '2017-04-12 21:43:00', 1, '2017-04-12 21:44:05'),
	(9, '2017-04-13', 47, 2, '', '', '0000-00-00', 2, 1, '2017-04-12 23:37:10', 0, '0000-00-00 00:00:00'),
	(10, '2017-04-12', 46, 1, '', 'asdadsd', '2017-04-12', 1, 1, '2017-04-12 23:41:42', 0, '0000-00-00 00:00:00'),
	(11, '2017-04-13', 46, 2, '', '', '0000-00-00', 2, 1, '2017-04-12 23:42:09', 0, '0000-00-00 00:00:00'),
	(15, '2017-04-20', 49, 1, '', '123', '2017-04-25', 1, 1, '2017-04-20 23:55:02', 1, '2017-04-21 01:34:29');
/*!40000 ALTER TABLE `bidan_str` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_str_status
CREATE TABLE IF NOT EXISTS `bidan_str_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_str_status: ~3 rows (approximately)
/*!40000 ALTER TABLE `bidan_str_status` DISABLE KEYS */;
INSERT INTO `bidan_str_status` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Selesai', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Proses Cabang', 0, '0000-00-00 00:00:00', 1, '2017-03-22 00:00:02'),
	(3, 'Proses Daerah', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_str_status` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_str_syarat
CREATE TABLE IF NOT EXISTS `bidan_str_syarat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_str_syarat: ~8 rows (approximately)
/*!40000 ALTER TABLE `bidan_str_syarat` DISABLE KEYS */;
INSERT INTO `bidan_str_syarat` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Fotocopy Ijazah D III wajib legal basah 2 lembar', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Fotocopy STR 2 lembar & STR ASLI', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Fotocopy Sertifikat Pelatihan Midwifery Update (MU) 2 lembar', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'Rekapitulasi Perolehan 25 SKP dari Tim Verifikator', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'Foto ukuran 4x6 sebanyak 3 lembar (menggunakan seragam lapangan IBI & latar merah)', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'Fotocopy KTA yang masih berlaku 2 lemb', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'Fotocopy bukti lunas pembayaran iuran 2 rangkap', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(8, 'Bukti asli / slip kuning asli (transfer melalui ATM tidak akan diterima)  ', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(9, 'Kir. Dr', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_str_syarat` ENABLE KEYS */;


-- Dumping structure for table ibi.bidan_str_tipe
CREATE TABLE IF NOT EXISTS `bidan_str_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.bidan_str_tipe: ~3 rows (approximately)
/*!40000 ALTER TABLE `bidan_str_tipe` DISABLE KEYS */;
INSERT INTO `bidan_str_tipe` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Baru', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Perpanjangan', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Pemutihan dari SIB', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `bidan_str_tipe` ENABLE KEYS */;


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
	(1, 'A', 0, '0000-00-00 00:00:00', 1, '2017-03-27 19:06:18'),
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


-- Dumping structure for table ibi.keuangan
CREATE TABLE IF NOT EXISTS `keuangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `tipe` int(11) NOT NULL,
  `bidan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jenis` int(11) NOT NULL,
  `ket` varchar(200) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipe` (`tipe`),
  KEY `bidan` (`bidan`),
  KEY `ket` (`jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.keuangan: ~11 rows (approximately)
/*!40000 ALTER TABLE `keuangan` DISABLE KEYS */;
INSERT INTO `keuangan` (`id`, `tanggal`, `tipe`, `bidan`, `jumlah`, `jenis`, `ket`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(6, '2017-04-20', 1, 48, 125000, 2, 'Otomatis', 1, '2017-04-20 23:46:31', 0, '0000-00-00 00:00:00'),
	(7, '2017-04-20', 1, 49, 125000, 2, 'Otomatis', 1, '2017-04-20 23:47:24', 0, '0000-00-00 00:00:00'),
	(8, '2017-04-20', 1, 49, 75000, 3, 'Otomatis', 1, '2017-04-20 23:47:40', 0, '0000-00-00 00:00:00'),
	(9, '2017-04-20', 1, 49, 250000, 4, 'Otomatis', 1, '2017-04-20 23:55:02', 0, '0000-00-00 00:00:00'),
	(10, '2017-04-21', 1, 49, 250000, 5, 'Otomatis', 1, '2017-04-20 23:55:50', 0, '0000-00-00 00:00:00'),
	(12, '2017-04-21', 1, 49, 50000, 6, 'Otomatis', 1, '2017-04-21 00:07:11', 0, '0000-00-00 00:00:00'),
	(13, '2017-04-21', 1, 49, 50000, 7, 'Otomatis', 1, '2017-04-21 00:07:55', 0, '0000-00-00 00:00:00'),
	(14, '2017-04-21', 1, 49, 580000, 8, 'Otomatis', 1, '2017-04-21 00:15:57', 0, '0000-00-00 00:00:00'),
	(15, '2017-04-21', 1, 49, 580000, 9, 'Otomatis', 1, '2017-04-21 00:17:24', 0, '0000-00-00 00:00:00'),
	(16, '2017-04-21', 1, 49, 100000, 10, 'Otomatis', 1, '2017-04-21 00:17:42', 0, '0000-00-00 00:00:00'),
	(17, '2017-04-21', 1, 48, 350000, 8, 'Otomatis', 1, '2017-04-21 00:19:26', 0, '0000-00-00 00:00:00'),
	(18, '2017-04-21', 1, 48, 350000, 9, 'Otomatis', 1, '2017-04-21 00:23:14', 0, '0000-00-00 00:00:00'),
	(19, '2017-04-21', 1, 49, 75000, 3, 'Otomatis', 1, '2017-04-21 01:16:58', 0, '0000-00-00 00:00:00'),
	(20, '2017-04-21', 1, 1, 75000, 3, 'Otomatis', 1, '2017-04-21 01:42:55', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `keuangan` ENABLE KEYS */;


-- Dumping structure for table ibi.keuangan_harga
CREATE TABLE IF NOT EXISTS `keuangan_harga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` int(11) NOT NULL,
  `wilayah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.keuangan_harga: ~20 rows (approximately)
/*!40000 ALTER TABLE `keuangan_harga` DISABLE KEYS */;
INSERT INTO `keuangan_harga` (`id`, `jenis`, `wilayah`, `harga`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 1, 0, 25000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 2, 0, 125000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 3, 0, 75000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 4, 0, 250000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 5, 0, 250000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 6, 0, 50000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 7, 0, 50000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(8, 8, 1, 350000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(9, 8, 2, 350000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(10, 8, 3, 350000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(11, 8, 4, 580000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(12, 8, 5, 580000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(13, 8, 6, 580000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(14, 9, 1, 350000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(15, 9, 2, 350000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(16, 9, 3, 350000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(17, 9, 4, 580000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(18, 9, 5, 580000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(19, 9, 6, 580000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(20, 10, 0, 100000, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `keuangan_harga` ENABLE KEYS */;


-- Dumping structure for table ibi.keuangan_jenis
CREATE TABLE IF NOT EXISTS `keuangan_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `tipe` int(11) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.keuangan_jenis: ~13 rows (approximately)
/*!40000 ALTER TABLE `keuangan_jenis` DISABLE KEYS */;
INSERT INTO `keuangan_jenis` (`id`, `name`, `tipe`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Iuran Bulanan', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'KTA - Baru', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'KTA - Perpanjang/Hilang KTA', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'STR - Baru', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'STR - Perpanjang/SIB - Pemutihan', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'SIPB P - Baru', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'SIPB P - Perpanjang', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(8, 'SIPB M - Baru', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(9, 'SIPB M - Perpanjang > 5 Tahun', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(10, 'SIPB M - Perpanjang < 5 Tahun', 1, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(11, 'Pembayaran Listrik', 2, 1, '2017-04-20 09:31:17', 0, '0000-00-00 00:00:00'),
	(12, 'Pembayaran Uang Makan Pegawai', 2, 1, '2017-04-20 09:31:40', 0, '0000-00-00 00:00:00'),
	(13, 'Uang Lembur', 2, 1, '2017-04-20 09:32:07', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `keuangan_jenis` ENABLE KEYS */;


-- Dumping structure for table ibi.keuangan_tipe
CREATE TABLE IF NOT EXISTS `keuangan_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.keuangan_tipe: ~2 rows (approximately)
/*!40000 ALTER TABLE `keuangan_tipe` DISABLE KEYS */;
INSERT INTO `keuangan_tipe` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Pemasukan', 0, '0000-00-00 00:00:00', 1, '2017-04-20 09:45:36'),
	(2, 'Pengeluaran', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `keuangan_tipe` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.module: ~23 rows (approximately)
/*!40000 ALTER TABLE `module` DISABLE KEYS */;
INSERT INTO `module` (`id`, `name`, `url`, `icon`, `parent`, `order`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Beranda', 'home', 'fa fa-home', 0, 1, 1, '2016-12-15 22:24:48', 1, '2016-12-15 23:23:09'),
	(2, 'Data Master', '', 'fa fa-database', 0, 2, 1, '2016-12-15 22:25:55', 1, '2016-12-15 23:23:29'),
	(23, 'Level', 'users_level', '', 51, 2, 1, '2016-12-15 23:12:35', 1, '2017-04-20 09:18:50'),
	(24, 'Status', 'reference/users_status', '', 51, 3, 1, '2016-12-15 23:13:12', 1, '2017-04-20 09:19:07'),
	(25, 'Pengguna', 'users', '', 51, 1, 1, '2016-12-15 23:15:54', 1, '2017-04-15 10:31:27'),
	(26, 'Backup', 'backup', 'fa fa-download', 0, 8, 1, '2016-12-15 23:16:42', 1, '2016-12-16 00:21:36'),
	(27, 'Module', 'module', 'fa fa-check', 0, 7, 1, '2016-12-16 00:21:22', 0, '0000-00-00 00:00:00'),
	(37, 'Pendidikan', 'reference/pendidikan', '', 2, 2, 1, '2017-03-15 22:01:56', 1, '2017-03-15 22:14:37'),
	(38, 'Pelatihan', 'reference/pelatihan', '', 2, 2, 1, '2017-03-15 22:03:49', 1, '2017-03-27 19:07:58'),
	(39, 'Status Kepegawaian', 'reference/status_pegawai', '', 2, 3, 1, '2017-03-15 22:04:16', 0, '0000-00-00 00:00:00'),
	(40, 'Bidan', 'bidan', '', 2, 1, 1, '2017-03-15 22:14:17', 0, '0000-00-00 00:00:00'),
	(42, 'KTA', 'kta', '', 41, 1, 1, '2017-03-21 20:23:22', 0, '0000-00-00 00:00:00'),
	(43, 'Golongan Darah', 'reference/golongan_darah', '', 2, 5, 1, '2017-03-21 23:56:30', 0, '0000-00-00 00:00:00'),
	(46, 'Reminder', '', 'fa fa-bell', 0, 4, 1, '2017-03-22 21:02:53', 1, '2017-04-21 00:42:14'),
	(48, 'STR/SIB', 'str', '', 41, 2, 1, '2017-03-26 17:47:36', 1, '2017-03-28 10:03:00'),
	(49, 'SIPB-P', 'sipb_p', '', 41, 3, 1, '2017-03-27 12:27:47', 0, '0000-00-00 00:00:00'),
	(50, 'Surat', 'surat', 'fa fa-tasks', 0, 4, 1, '2017-03-27 20:00:30', 1, '2017-03-28 15:58:58'),
	(51, 'Keamanan', '', 'fa fa-lock', 0, 3, 1, '2017-04-15 10:30:56', 0, '0000-00-00 00:00:00'),
	(52, 'Keuangan', '', 'fa fa-money', 0, 4, 1, '2017-04-18 06:31:43', 1, '2017-04-20 09:17:05'),
	(53, 'Pemasukan dan Pengeluaran', 'keuangan', '', 52, 1, 1, '2017-04-20 09:17:38', 0, '0000-00-00 00:00:00'),
	(54, 'Jenis', 'keuangan_jenis', '', 52, 3, 1, '2017-04-20 09:18:06', 1, '2017-04-20 09:25:16'),
	(55, 'Harga', 'keuangan_harga', '', 52, 4, 1, '2017-04-20 09:18:33', 1, '2017-04-20 09:21:14'),
	(56, 'Tipe', 'reference/keuangan_tipe', '', 52, 2, 1, '2017-04-20 09:20:11', 0, '0000-00-00 00:00:00'),
	(57, 'KTA', 'reminder_kta', '', 46, 1, 1, '2017-04-21 00:42:32', 0, '0000-00-00 00:00:00'),
	(58, 'STR', 'reminder_str', '', 46, 2, 1, '2017-04-21 01:30:30', 0, '0000-00-00 00:00:00'),
	(59, 'SIPB P', 'reminder_sipb_p', '', 46, 3, 1, '2017-04-21 01:30:54', 0, '0000-00-00 00:00:00'),
	(60, 'SIPB M', 'reminder_sipb_m', '', 46, 4, 1, '2017-04-21 01:31:16', 0, '0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.pendidikan: ~7 rows (approximately)
/*!40000 ALTER TABLE `pendidikan` DISABLE KEYS */;
INSERT INTO `pendidikan` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'D1', 0, '0000-00-00 00:00:00', 1, '2017-03-27 18:53:30'),
	(2, 'D3', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'D4', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'S1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'S2', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'Lain-Lain', 0, '0000-00-00 00:00:00', 1, '2017-04-19 19:15:16');
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


-- Dumping structure for table ibi.surat
CREATE TABLE IF NOT EXISTS `surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` int(11) NOT NULL,
  `nomor` varchar(30) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.surat: ~8 rows (approximately)
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` (`id`, `tipe`, `nomor`, `date_from`, `date_to`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 1, '248/PCIBI/CJR/XII/2016', '2017-03-01', '2017-03-31', 1, '2017-03-28 06:27:48', 1, '2017-04-10 21:30:44'),
	(3, 2, '', '2017-03-01', '2017-03-31', 1, '2017-03-29 15:15:38', 1, '2017-04-10 21:36:15'),
	(4, 3, '', '2017-03-01', '2017-03-31', 1, '2017-03-29 15:27:34', 1, '2017-04-10 21:39:46'),
	(5, 4, '006/REK/PC-IBI/CJR/I/2017', '2017-03-01', '2017-03-31', 1, '2017-03-29 15:38:21', 1, '2017-04-11 21:03:45'),
	(6, 5, '', '2017-03-01', '2017-04-30', 1, '2017-03-30 06:37:18', 1, '2017-04-12 21:49:07'),
	(7, 6, '', '2017-03-01', '2017-04-30', 1, '2017-04-11 21:09:22', 1, '2017-04-11 21:19:19'),
	(8, 7, '1212323', '2017-03-01', '2017-04-30', 1, '2017-04-12 22:09:19', 1, '2017-04-19 18:56:25');
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;


-- Dumping structure for table ibi.surat_tipe
CREATE TABLE IF NOT EXISTS `surat_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.surat_tipe: ~6 rows (approximately)
/*!40000 ALTER TABLE `surat_tipe` DISABLE KEYS */;
INSERT INTO `surat_tipe` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'SURAT PENGAJUAN KTA', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'DAFTAR NAMA PENGAJUAN KTA PD', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'DAFTAR NAMA PENGAJUAN KTA PC', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'SURAT REKOMENDASI STR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'DAFTAR NAMA PENGUSUL REGISTRASI STR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'DAFTAR NAMA PENGUSUL RE-REGISTRASI STR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(7, 'PENGUSULAN RE-REGISTRASI STR', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `surat_tipe` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table ibi.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `password`, `level`, `ip_login`, `date_login`, `user_agent`, `status`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Adam Prasetia', 'damz', '202cb962ac59075b964b07152d234b70', 1, '::1', '2017-04-21 01:31:38', 'Windows 7(Google Chrome 57.0.2987.133)', 1, 0, '0000-00-00 00:00:00', 2, '2016-10-21 09:34:23'),
	(2, 'Farida Ambarwati', 'ambar', 'caf1a3dfb505ffed0d024130f58c5cfa', 2, '::1', '2016-12-16 01:56:01', 'Windows 7(Google Chrome 55.0.2883.87)', 1, 1, '2016-10-21 09:21:00', 1, '2016-12-16 01:12:10'),
	(3, 'Budiarti', 'adhe', '202cb962ac59075b964b07152d234b70', 3, '::1', '2017-01-01 15:10:28', 'Windows 7(Google Chrome 55.0.2883.87)', 1, 1, '2016-12-30 20:17:58', 0, '0000-00-00 00:00:00'),
	(4, 'Ulfi Alawiah', 'ulfi', '202cb962ac59075b964b07152d234b70', 1, '::1', '2017-03-28 17:18:54', 'Windows 7(Google Chrome 56.0.2924.87)', 1, 1, '2017-03-23 19:41:56', 1, '2017-03-23 19:42:12');
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

-- Dumping data for table ibi.users_level: ~2 rows (approximately)
/*!40000 ALTER TABLE `users_level` DISABLE KEYS */;
INSERT INTO `users_level` (`id`, `name`, `module`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'ADMIN', '1,2,40,37,38,39,43,51,25,23,24,46,57,58,59,60,50,52,53,56,54,55,27,26', 0, '0000-00-00 00:00:00', 1, '2017-04-21 01:31:30');
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


-- Dumping structure for table ibi.wilayah
CREATE TABLE IF NOT EXISTS `wilayah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `user_update` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table ibi.wilayah: ~6 rows (approximately)
/*!40000 ALTER TABLE `wilayah` DISABLE KEYS */;
INSERT INTO `wilayah` (`id`, `name`, `user_create`, `date_create`, `user_update`, `date_update`) VALUES
	(1, 'Wilayah 1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(2, 'Wilayah 2', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(3, 'Wilayah 3', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(4, 'Wilayah 4', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(5, 'Wilayah 5', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
	(6, 'Wilayah 6', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `wilayah` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
