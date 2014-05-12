-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 12, 2014 at 11:52 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `siaek`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_peserta` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `alasan` text NOT NULL,
  KEY `id_peserta` (`id_peserta`),
  KEY `id_kegiatan` (`id_kegiatan`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_peserta`, `id_kegiatan`, `id_status`, `alasan`) VALUES
(1, 1, 1, 'Hadir tepat waktu'),
(2, 1, 1, 'Hadir hahaha'),
(3, 1, 1, 'Hadir'),
(3, 1, 1, 'aduh sakit'),
(4, 1, 1, 'sekahi huhuhuhu'),
(6, 1, 1, 'hihiihihih'),
(7, 1, 1, 'susususu');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `komentar` text NOT NULL,
  `id_regional` int(11) NOT NULL,
  `nama_kegiatan` varchar(64) NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1800 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `komentar`, `id_regional`, `nama_kegiatan`) VALUES
(1796, 'asik nih', 1, 'APA ya'),
(1797, 'itu yaa', 1, 'apa sih'),
(1798, 'hsbfhsbfhbsh', 1, 'apa adhbahsdbh'),
(1799, 'hsbfhsbfhbshansd nasnanjdnaj', 1, 'apa adhbahsdansda dnsadbh');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `materi` text NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `pembicara` varchar(64) NOT NULL,
  `hari` char(12) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_kegiatan` int(5) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `deadline` datetime NOT NULL,
  `waktu_isi` datetime NOT NULL,
  `status_isi` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_kegiatan`),
  UNIQUE KEY `id_kegiatan` (`id_kegiatan`),
  KEY `id_regional` (`id_regional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `materi`, `waktu_mulai`, `waktu_selesai`, `pembicara`, `hari`, `tanggal`, `jenis_kegiatan`, `id_regional`, `nama_kegiatan`, `deadline`, `waktu_isi`, `status_isi`) VALUES
(1, 'Fiqih Dakwah', '17:45:00', '18:45:00', 'Bapak Tifatul Sembiring', 'senin', '2014-04-21', 1, 1, 'apa hayo', '2014-04-30 06:14:25', '2014-04-28 11:28:22', 2),
(2, 'APA ya', '14:45:19', '14:45:19', 'Pak Makan roti', 'Selasa', '2014-06-18', 1, 1, 'APA sih', '2014-06-25 00:00:00', '2014-06-19 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `id_regional` int(11) NOT NULL,
  `nomor_peserta` varchar(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_peserta`),
  KEY `id_regional` (`id_regional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_regional`, `nomor_peserta`, `nama`, `no_handphone`, `email`, `jenis_kelamin`, `status_aktif`) VALUES
(3, 1, '121324', 'choirudin', '081227832822', 'choirudin22@gmail.com', 'L', 1),
(4, 1, '1213149', 'hehehe', '081227832822', 'choirudin22@gmail.com', 'P', 1),
(5, 2, '110606', 'Herman', '081227832822', 'choirudin22@gmail.com', 'P', 1),
(6, 1, '112323', 'arras', '08122639', 'choirudin22@gmail.com', '1', 1),
(7, 1, '63456', 'siapa saja', '0887877', 'email@yahoo.com', 'L', 1);

-- --------------------------------------------------------

--
-- Table structure for table `regional`
--

CREATE TABLE `regional` (
  `id_regional` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(64) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_regional`),
  UNIQUE KEY `id_regional` (`id_regional`),
  KEY `id_user` (`id_user`),
  KEY `id_regional_2` (`id_regional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `regional`
--

INSERT INTO `regional` (`id_regional`, `nama`, `alamat`, `id_user`) VALUES
(1, 'Regional I Jakarta Putra', 'Srengseng Sawah, Jakarta Selatan', 3),
(2, 'Regional I Jakarta Putri', 'Jalan', 1),
(3, 'Regional II Bandung', 'Jalan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(1) NOT NULL AUTO_INCREMENT,
  `status_kehadiran` char(5) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status_kehadiran`, `keterangan`) VALUES
(1, 'H', 'Hadir dan tepat waktu'),
(2, 'TI', 'Telat Ijin'),
(3, 'TTI', 'Telat Tidak Ijin'),
(4, 'S', 'Sakit'),
(5, 'I', 'Ijin'),
(6, 'A', 'Alpha - Tidak Jelas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(1) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `email` varchar(64) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `url_image` varchar(125) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `username`, `password`, `nama`, `jenis_kelamin`, `email`, `nip`, `no_telp`, `alamat`, `url_image`) VALUES
(1, 1, 'administrator', '12345', 'Administrator', 'L', 'herman.wahyudi@gmail.com', '1290', '0217685858', 'Jakarta', 'Photo.jpg'),
(2, 2, 'pengurus.pusat', 'pusat', 'Siapa ya haha', 'L', 'jaka.perdana@gmail.com', '1690', '0217685658', 'Jakarta edit lagilagi lagi laghin hahah jadjhsajdhsjad', '595723.jpg'),
(3, 3, 'regional.jakarta1', 'regional', 'ini regional', 'L', 'siapa@gmail.com', '00909090', '082137341838', 'Jalan mawar 21', 'hehehe.png'),
(4, 3, 'regional.jakarta2', '5891282', 'siapa ya kamu', 'L', 'choirudin22@gmail.com', '1112233', '0988787668', 'Jalan Mawar', 'photo.jpg');
