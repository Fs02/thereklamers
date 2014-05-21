-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2014 at 07:24 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `dipasang`
--

CREATE TABLE IF NOT EXISTS `dipasang` (
  `id_pemasangan` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `id_reklame` int(10) NOT NULL,
  `id_lokasi` int(10) NOT NULL,
  PRIMARY KEY (`id_pemasangan`),
  UNIQUE KEY `id_pemasangan` (`id_pemasangan`),
  UNIQUE KEY `id_reklame` (`id_reklame`),
  UNIQUE KEY `id_lokasi` (`id_lokasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `dipasang`
--

INSERT INTO `dipasang` (`id_pemasangan`, `tanggal_awal`, `tanggal_akhir`, `id_reklame`, `id_lokasi`) VALUES
(37, '2013-05-05', '2014-04-05', 50, 14),
(38, '2013-05-05', '2014-04-05', 51, 15);

-- --------------------------------------------------------

--
-- Table structure for table `disurvey`
--

CREATE TABLE IF NOT EXISTS `disurvey` (
  `id_survey` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal_survey` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_pemasangan` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  PRIMARY KEY (`id_survey`,`id_pemasangan`,`id_pegawai`),
  UNIQUE KEY `id_survey` (`id_survey`),
  UNIQUE KEY `id_pemasangan` (`id_pemasangan`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE IF NOT EXISTS `izin` (
  `no_surat` int(20) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `id_survey` int(10) NOT NULL,
  PRIMARY KEY (`no_surat`),
  UNIQUE KEY `no_surat` (`no_surat`),
  UNIQUE KEY `no_ktp` (`no_ktp`),
  UNIQUE KEY `id_survey` (`id_survey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE IF NOT EXISTS `lapangan` (
  `id_lokasi` int(10) NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_lokasi`),
  UNIQUE KEY `id_lokasi` (`id_lokasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lokasi`, `kelurahan`, `kecamatan`) VALUES
(14, 'Bandung Utara', 'Bandung Utara'),
(15, 'Bojongsoang', 'Sukapura');

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE IF NOT EXISTS `pemohon` (
  `no_ktp` varchar(20) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`no_ktp`),
  UNIQUE KEY `no_ktp` (`no_ktp`),
  UNIQUE KEY `id_perusahaan` (`id_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`no_ktp`, `id_perusahaan`, `nama`, `email`, `alamat`, `no_telp`, `status`) VALUES
('1103120100', 54, 'Muhammad Surya Asriadie', 'fs_02@mail.com', 'Dayeuhkolot', '085668835070', 'Belum diverifikasi'),
('1103120113', 55, 'Mahardika Fatahillah', 'apajalah@gmail.com', 'Pesona Bali Palsu', '08080808080808', 'Belum diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id_perusahaan` int(10) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(30) NOT NULL,
  `jenis_usaha` varchar(30) NOT NULL,
  `jenis_perusahaan` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `NPWP` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_perusahaan`),
  UNIQUE KEY `id_perusahaan` (`id_perusahaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nama_perusahaan`, `jenis_usaha`, `jenis_perusahaan`, `no_telp`, `NPWP`, `status`) VALUES
(54, 'Hydrax, INC', '--Pilih Jenis Usaha--', '--Pilih Jenis Perusahaan--', '085668835070', '1103120120', 'Belum diverifikasi'),
(55, 'Murianto Corp', '--Pilih Jenis Usaha--', '--Pilih Jenis Perusahaan--', '08080808080808', '11031201213', 'Belum diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` int(10) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  PRIMARY KEY (`id_petugas`),
  UNIQUE KEY `id_petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reklame`
--

CREATE TABLE IF NOT EXISTS `reklame` (
  `id_reklame` int(10) NOT NULL AUTO_INCREMENT,
  `merek` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `id_perusahaan` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_reklame`),
  UNIQUE KEY `id_reklame` (`id_reklame`),
  UNIQUE KEY `id_perusahaan` (`id_perusahaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `reklame`
--

INSERT INTO `reklame` (`id_reklame`, `merek`, `jenis`, `ukuran`, `id_perusahaan`, `status`) VALUES
(50, 'Ball Breakers', 'Komersil', '24', 54, 'Belum diverifikasi'),
(51, 'Mahardika Caleg', '--Pilih Kategori--', '15', 55, 'Belum diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE IF NOT EXISTS `resi` (
  `no_resi` int(10) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_pemasangan` int(10) NOT NULL,
  PRIMARY KEY (`no_resi`),
  UNIQUE KEY `no_resi` (`no_resi`),
  UNIQUE KEY `no_ktp` (`id_pemasangan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `resi`
--

INSERT INTO `resi` (`no_resi`, `tanggal`, `id_pemasangan`) VALUES
(4, '2014-05-21', 38);

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat`
--

CREATE TABLE IF NOT EXISTS `sekretariat` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  UNIQUE KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skrd`
--

CREATE TABLE IF NOT EXISTS `skrd` (
  `no_SKRD` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `id_survey` int(10) NOT NULL,
  PRIMARY KEY (`no_SKRD`),
  UNIQUE KEY `no_SKRD` (`no_SKRD`),
  UNIQUE KEY `no_ktp` (`no_ktp`),
  UNIQUE KEY `id_survey` (`id_survey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dipasang`
--
ALTER TABLE `dipasang`
  ADD CONSTRAINT `dipasang_ibfk_3` FOREIGN KEY (`id_reklame`) REFERENCES `reklame` (`id_reklame`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `dipasang_ibfk_4` FOREIGN KEY (`id_lokasi`) REFERENCES `lapangan` (`id_lokasi`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `disurvey`
--
ALTER TABLE `disurvey`
  ADD CONSTRAINT `disurvey_ibfk_4` FOREIGN KEY (`id_pemasangan`) REFERENCES `dipasang` (`id_pemasangan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `disurvey_ibfk_5` FOREIGN KEY (`id_pegawai`) REFERENCES `sekretariat` (`id_pegawai`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_ibfk_3` FOREIGN KEY (`no_ktp`) REFERENCES `pemohon` (`no_ktp`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `izin_ibfk_2` FOREIGN KEY (`id_survey`) REFERENCES `disurvey` (`id_survey`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD CONSTRAINT `pemohon_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `reklame`
--
ALTER TABLE `reklame`
  ADD CONSTRAINT `reklame_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `resi`
--
ALTER TABLE `resi`
  ADD CONSTRAINT `resi_ibfk_1` FOREIGN KEY (`id_pemasangan`) REFERENCES `dipasang` (`id_pemasangan`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `skrd`
--
ALTER TABLE `skrd`
  ADD CONSTRAINT `skrd_ibfk_3` FOREIGN KEY (`no_ktp`) REFERENCES `pemohon` (`no_ktp`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `skrd_ibfk_2` FOREIGN KEY (`id_survey`) REFERENCES `disurvey` (`id_survey`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
