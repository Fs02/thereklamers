-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2014 at 04:16 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
  `id_pemasangan` varchar(10) NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `id_reklame` varchar(10) NOT NULL,
  `id_survey` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pemasangan`),
  UNIQUE KEY `id_pemasangan` (`id_pemasangan`),
  UNIQUE KEY `id_reklame` (`id_reklame`),
  UNIQUE KEY `id_survey` (`id_survey`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `disurvey`
--

CREATE TABLE IF NOT EXISTS `disurvey` (
  `id_survey` varchar(10) NOT NULL,
  `tanggal_survey` date NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `id_lokasi` varchar(10) NOT NULL,
  PRIMARY KEY (`id_survey`),
  UNIQUE KEY `id_survey` (`id_survey`),
  UNIQUE KEY `id_pegawai` (`id_pegawai`),
  UNIQUE KEY `id_lokasi` (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE IF NOT EXISTS `izin` (
  `no_surat` int(20) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `no_ktp` int(30) NOT NULL,
  `id_survey` varchar(10) NOT NULL,
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
  `id_lokasi` varchar(10) NOT NULL,
  `kelurahan` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_lokasi`),
  UNIQUE KEY `id_lokasi` (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE IF NOT EXISTS `pemohon` (
  `no_ktp` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`no_ktp`),
  UNIQUE KEY `no_ktp` (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`no_ktp`, `nama`, `alamat`, `no_telp`, `email`) VALUES
(2312124, 'Desri', 'Demang', 211287212, 'Desri.mur@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
  `id_perusahaan` varchar(10) NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `jenis_usaha` varchar(30) NOT NULL,
  `jenis_perusahaan` varchar(30) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `NPWP` int(15) NOT NULL,
  `no_ktp` int(30) NOT NULL,
  PRIMARY KEY (`id_perusahaan`),
  UNIQUE KEY `id_perusahaan` (`id_perusahaan`),
  UNIQUE KEY `no_ktp` (`no_ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE IF NOT EXISTS `petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_petugas` varchar(30) NOT NULL,
  PRIMARY KEY (`id_petugas`),
  UNIQUE KEY `id_petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reklame`
--

CREATE TABLE IF NOT EXISTS `reklame` (
  `id_reklame` varchar(10) NOT NULL,
  `merek` varchar(30) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `id_perusahaan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_reklame`),
  UNIQUE KEY `id_reklame` (`id_reklame`),
  UNIQUE KEY `id_perusahaan` (`id_perusahaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE IF NOT EXISTS `resi` (
  `no_resi` int(15) NOT NULL,
  `tanggal` date NOT NULL,
  `no_ktp` int(30) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  PRIMARY KEY (`no_resi`),
  UNIQUE KEY `no_resi` (`no_resi`),
  UNIQUE KEY `no_ktp` (`no_ktp`),
  UNIQUE KEY `id_petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sekretariat`
--

CREATE TABLE IF NOT EXISTS `sekretariat` (
  `id_pegawai` varchar(10) NOT NULL,
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
  `no_ktp` int(30) NOT NULL,
  `id_survey` varchar(10) NOT NULL,
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
  ADD CONSTRAINT `dipasang_ibfk_2` FOREIGN KEY (`id_survey`) REFERENCES `disurvey` (`id_survey`),
  ADD CONSTRAINT `dipasang_ibfk_1` FOREIGN KEY (`id_reklame`) REFERENCES `reklame` (`id_reklame`);

--
-- Constraints for table `disurvey`
--
ALTER TABLE `disurvey`
  ADD CONSTRAINT `disurvey_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `lapangan` (`id_lokasi`),
  ADD CONSTRAINT `disurvey_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `sekretariat` (`id_pegawai`);

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_ibfk_2` FOREIGN KEY (`id_survey`) REFERENCES `disurvey` (`id_survey`),
  ADD CONSTRAINT `izin_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `pemohon` (`no_ktp`);

--
-- Constraints for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `pemohon` (`no_ktp`);

--
-- Constraints for table `reklame`
--
ALTER TABLE `reklame`
  ADD CONSTRAINT `reklame_ibfk_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id_perusahaan`);

--
-- Constraints for table `resi`
--
ALTER TABLE `resi`
  ADD CONSTRAINT `resi_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `resi_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `pemohon` (`no_ktp`);

--
-- Constraints for table `skrd`
--
ALTER TABLE `skrd`
  ADD CONSTRAINT `skrd_ibfk_2` FOREIGN KEY (`id_survey`) REFERENCES `disurvey` (`id_survey`),
  ADD CONSTRAINT `skrd_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `pemohon` (`no_ktp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
