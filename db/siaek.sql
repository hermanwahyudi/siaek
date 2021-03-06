-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 23. Mei 2014 jam 21:06
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siaek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE IF NOT EXISTS `absensi` (
  `id_peserta` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `alasan` text NOT NULL,
  KEY `id_peserta` (`id_peserta`),
  KEY `id_kegiatan` (`id_kegiatan`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id_peserta`, `id_kegiatan`, `id_status`, `alasan`) VALUES
(1, 1, 1, 'Hadir tepat waktu'),
(2, 1, 1, 'Hadir hahaha'),
(3, 1, 1, 'Hadir'),
(3, 4, 1, 'datang'),
(4, 4, 4, 'deman'),
(6, 4, 5, ''),
(7, 4, 1, ''),
(8, 4, 1, ''),
(9, 4, 1, ''),
(3, 6, 1, 'bagus'),
(4, 6, 2, ''),
(6, 6, 1, ''),
(7, 6, 1, 'ai'),
(8, 6, 2, ''),
(9, 6, 1, ''),
(3, 63, 1, ''),
(4, 63, 1, ''),
(6, 63, 1, ''),
(7, 63, 1, ''),
(8, 63, 1, ''),
(9, 63, 1, ''),
(110, 63, 1, ''),
(111, 63, 1, ''),
(112, 63, 1, ''),
(113, 63, 1, ''),
(114, 63, 1, ''),
(115, 63, 1, ''),
(116, 63, 1, ''),
(117, 63, 1, ''),
(118, 63, 1, ''),
(119, 63, 1, ''),
(120, 63, 1, ''),
(121, 63, 1, ''),
(122, 63, 1, ''),
(123, 63, 1, ''),
(124, 63, 1, ''),
(125, 63, 1, ''),
(126, 63, 1, ''),
(128, 63, 1, ''),
(129, 63, 1, ''),
(210, 63, 1, ''),
(211, 63, 1, ''),
(212, 63, 1, ''),
(3, 63, 1, ''),
(4, 63, 1, ''),
(6, 63, 1, ''),
(7, 63, 1, ''),
(8, 63, 1, ''),
(9, 63, 1, ''),
(110, 63, 1, ''),
(111, 63, 1, ''),
(112, 63, 1, ''),
(113, 63, 1, ''),
(114, 63, 1, ''),
(115, 63, 1, ''),
(116, 63, 1, ''),
(117, 63, 1, ''),
(118, 63, 1, ''),
(119, 63, 1, ''),
(120, 63, 1, ''),
(121, 63, 1, ''),
(122, 63, 1, ''),
(123, 63, 1, ''),
(124, 63, 1, ''),
(125, 63, 1, ''),
(126, 63, 1, ''),
(128, 63, 1, ''),
(129, 63, 1, ''),
(210, 63, 1, ''),
(211, 63, 1, ''),
(212, 63, 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id_feedback` int(11) NOT NULL AUTO_INCREMENT,
  `komentar` text NOT NULL,
  `id_regional` int(11) NOT NULL,
  `nama_kegiatan` varchar(64) NOT NULL,
  PRIMARY KEY (`id_feedback`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1805 ;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `komentar`, `id_regional`, `nama_kegiatan`) VALUES
(1796, 'asik nih', 1, 'APA ya'),
(1797, 'itu yaa', 1, 'apa sih'),
(1798, 'hsbfhsbfhbsh', 1, 'apa adhbahsdbh'),
(1799, 'hsbfhsbfhbshansd nasnanjdnaj', 1, 'apa adhbahsdansda dnsadbh'),
(1800, 'asik nih', 1, 'APA ya'),
(1801, 'itu yaa', 1, 'apa sih'),
(1802, 'hsbfhsbfhbsh', 1, 'apa adhbahsdbh'),
(1803, 'hsbfhsbfhbshansd nasnanjdnaj', 1, 'apa adhbahsdansda dnsadbh'),
(1804, 'afdsfsf', 5, 'szfsdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `materi` text NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `pembicara` varchar(64) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_kegiatan` int(5) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `deadline` datetime NOT NULL,
  `waktu_isi` datetime NOT NULL,
  `status_isi` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kegiatan`),
  UNIQUE KEY `id_kegiatan` (`id_kegiatan`),
  KEY `id_regional` (`id_regional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `materi`, `waktu_mulai`, `waktu_selesai`, `pembicara`, `tanggal`, `jenis_kegiatan`, `id_regional`, `nama_kegiatan`, `deadline`, `waktu_isi`, `status_isi`) VALUES
(1, 'Fiqih Dakwah', '17:45:00', '18:45:00', 'Bpk. Tif', '2014-04-21', 1, 1, 'Kajian Fiqh', '2014-04-30 06:14:25', '2014-04-28 11:28:22', 1),
(2, 'Sejarah Islam', '14:45:19', '14:45:19', 'Pak Makan roti', '2014-06-18', 1, 1, 'SKI', '2014-06-25 00:00:00', '2014-06-19 00:00:00', 1),
(3, '	tahfiz', '07:00:00', '09:00:00', '	jihan', '2014-01-01', 1, 1, '	KIK', '2014-01-30 23:55:00', '2014-01-30 11:55:00', 1),
(4, '	tahsin', '08:00:00', '10:00:00', '	balwel', '2014-02-01', 2, 1, '	TPD', '2014-02-28 23:55:00', '2014-02-28 11:55:00', 1),
(5, '	kiamat', '09:00:00', '11:00:00', '	jamal', '2014-03-01', 3, 1, '	TJ', '2014-03-30 23:55:00', '2014-03-30 11:55:00', 1),
(6, '	wudhu', '10:00:00', '12:00:00', '	husna', '2014-04-01', 4, 1, '	DPK', '2014-04-30 23:55:00', '2014-04-30 11:55:00', 1),
(7, '	solat', '11:00:00', '13:00:00', '	yanevi', '2014-05-01', 1, 1, '	DT', '2014-05-30 23:55:00', '2014-05-30 11:55:00', 1),
(8, '	tayamum', '12:00:00', '14:00:00', '	yane', '2014-06-01', 2, 1, '	KFP', '2014-06-30 23:55:00', '2014-06-30 11:55:00', 1),
(9, '	adab', '13:00:00', '15:00:00', '	evi', '2014-07-01', 3, 1, '	KKP', '2014-07-30 23:55:00', '2014-07-30 11:55:00', 0),
(10, '	fiqih', '14:00:00', '16:00:00', '	yanto', '2014-08-01', 4, 1, '	KIP', '2014-08-30 23:55:00', '2014-08-30 11:55:00', 1),
(11, '	akidah', '15:00:00', '17:00:00', '	giri', '2014-09-01', 1, 1, '	T&T', '2014-09-30 23:55:00', '2014-09-30 11:55:00', 1),
(12, '	akhlak', '16:00:00', '18:00:00', '	hariz', '2014-10-01', 2, 1, '	FM', '2014-10-30 23:55:00', '2014-10-30 11:55:00', 0),
(13, '	doa', '17:00:00', '19:00:00', '	tio', '2014-01-01', 3, 2, '	P1', '2014-01-30 23:55:00', '2014-01-30 11:55:00', 1),
(14, '	kubur', '18:00:00', '20:00:00', '	hawiz', '2014-02-01', 4, 2, '	P2', '2014-02-28 23:55:00', '2014-02-28 11:55:00', 0),
(15, '	ibu', '07:00:00', '09:00:00', '	wahiz', '2014-03-01', 1, 2, '	P3', '2014-03-30 23:55:00', '2014-03-30 11:55:00', 0),
(16, '	ayah', '08:00:00', '10:00:00', '	choirudin', '2014-04-01', 2, 2, '	P4', '2014-04-30 23:55:00', '2014-04-30 11:55:00', 1),
(17, '	zakat', '09:00:00', '11:00:00', '	choi', '2014-05-01', 3, 2, '	KIK', '2014-05-30 23:55:00', '2014-05-30 11:55:00', 1),
(18, '	solat', '10:00:00', '12:00:00', '	roo', '2014-06-01', 4, 2, '	TPD', '2014-06-30 23:55:00', '2014-06-30 11:55:00', 1),
(19, '	tadarus', '11:00:00', '13:00:00', '	din', '2014-07-01', 1, 2, '	TJ', '2014-07-30 23:55:00', '2014-07-30 11:55:00', 0),
(20, '	makan', '12:00:00', '14:00:00', '	herman', '2014-08-01', 2, 2, '	DPK', '2014-08-30 23:55:00', '2014-08-30 11:55:00', 1),
(21, '	puasa', '13:00:00', '15:00:00', '	wahyu', '2014-09-01', 3, 2, '	DT', '2014-09-30 23:55:00', '2014-09-30 11:55:00', 1),
(22, '	ramadhan', '14:00:00', '16:00:00', '	yudi', '2014-10-01', 4, 2, '	KFP', '2014-10-30 23:55:00', '2014-10-30 11:55:00', 0),
(23, '	sunah', '15:00:00', '17:00:00', '	vini', '2014-01-01', 1, 3, '	KKP', '2014-01-30 23:55:00', '2014-01-30 11:55:00', 1),
(24, '	subuh', '16:00:00', '18:00:00', '	rama', '2014-02-01', 2, 3, '	KIP', '2014-02-28 23:55:00', '2014-02-28 11:55:00', 1),
(25, '	jamaah', '17:00:00', '19:00:00', '	firdha', '2014-03-01', 3, 3, '	T&T', '2014-03-30 23:55:00', '2014-03-30 11:55:00', 0),
(26, '	qada', '18:00:00', '20:00:00', '	akbar', '2014-04-01', 4, 3, '	FM', '2014-04-30 23:55:00', '2014-04-30 11:55:00', 1),
(27, '	akhirat', '07:00:00', '09:00:00', '	nia', '2014-05-01', 1, 3, '	P1', '2014-05-30 23:55:00', '2014-05-30 11:55:00', 0),
(28, '	dajjal', '08:00:00', '10:00:00', '	nur', '2014-06-01', 2, 3, '	P2', '2014-06-30 23:55:00', '2014-06-30 11:55:00', 1),
(29, '	imam', '09:00:00', '11:00:00', '	rahma', '2014-07-01', 3, 3, '	P3', '2014-07-30 23:55:00', '2014-07-30 11:55:00', 0),
(30, '	harakat', '10:00:00', '12:00:00', '	dani', '2014-08-01', 4, 3, '	P4', '2014-08-30 23:55:00', '2014-08-30 11:55:00', 0),
(31, '	siwak', '11:00:00', '13:00:00', '	nia', '2014-09-01', 1, 3, '	KIK', '2014-09-30 23:55:00', '2014-09-30 11:55:00', 0),
(32, '	sedekah', '12:00:00', '14:00:00', '	dania', '2014-10-01', 2, 3, '	TPD', '2014-10-30 23:55:00', '2014-10-30 11:55:00', 1),
(33, '	riba', '13:00:00', '15:00:00', '	vatia', '2014-01-01', 3, 4, '	TJ', '2014-01-30 23:55:00', '2014-01-30 11:55:00', 1),
(34, '	amalan', '14:00:00', '16:00:00', '	arda', '2014-02-01', 4, 4, '	DPK', '2014-02-28 23:55:00', '2014-02-28 11:55:00', 1),
(35, '	zuhur', '15:00:00', '17:00:00', '	putri', '2014-03-01', 1, 4, '	DT', '2014-03-30 23:55:00', '2014-03-30 11:55:00', 0),
(36, '	waktu', '16:00:00', '18:00:00', '	wahyu', '2014-04-01', 2, 4, '	KFP', '2014-04-30 23:55:00', '2014-04-30 11:55:00', 0),
(37, '	hidayah', '17:00:00', '19:00:00', '	yudi', '2014-05-01', 3, 4, '	KKP', '2014-05-30 23:55:00', '2014-05-30 11:55:00', 0),
(38, '	surga', '18:00:00', '20:00:00', '	vini', '2014-06-01', 4, 4, '	KIP', '2014-06-30 23:55:00', '2014-06-30 11:55:00', 1),
(39, '	neraka', '07:00:00', '09:00:00', '	rama', '2014-07-01', 1, 4, '	T&T', '2014-07-30 23:55:00', '2014-07-30 11:55:00', 1),
(40, '	dunia', '08:00:00', '10:00:00', '	firdha', '2014-08-01', 2, 4, '	FM', '2014-08-30 23:55:00', '2014-08-30 11:55:00', 1),
(41, '	sains', '09:00:00', '11:00:00', '	akbar', '2014-09-01', 3, 4, '	P1', '2014-09-30 23:55:00', '2014-09-30 11:55:00', 0),
(42, '	biografi', '10:00:00', '12:00:00', '	nia', '2014-10-01', 4, 4, '	P2', '2014-10-30 23:55:00', '2014-10-30 11:55:00', 1),
(43, '	nabi', '11:00:00', '13:00:00', '	nur', '2014-01-01', 1, 5, '	P3', '2014-01-30 23:55:00', '2014-01-30 11:55:00', 0),
(44, '	indonesia', '12:00:00', '14:00:00', '	rahma', '2014-02-01', 2, 5, '	P4', '2014-02-28 23:55:00', '2014-02-28 11:55:00', 1),
(45, '	negara', '13:00:00', '15:00:00', '	dani', '2014-03-01', 3, 5, '	KIK', '2014-03-30 23:55:00', '2014-03-30 11:55:00', 0),
(46, '	syariah', '14:00:00', '16:00:00', '	nia', '2014-04-01', 4, 5, '	TPD', '2014-04-30 23:55:00', '2014-04-30 11:55:00', 0),
(47, '	hijab', '15:00:00', '17:00:00', '	dania', '2014-05-01', 1, 5, '	TJ', '2014-05-30 23:55:00', '2014-05-30 11:55:00', 1),
(48, '	khianat', '16:00:00', '18:00:00', '	vatia', '2014-06-01', 2, 5, '	DPK', '2014-06-30 23:55:00', '2014-06-30 11:55:00', 1),
(49, '	kafir', '17:00:00', '19:00:00', '	arda', '2014-07-01', 3, 5, '	DT', '2014-07-30 23:55:00', '2014-07-30 11:55:00', 0),
(50, '	neraca', '18:00:00', '20:00:00', '	putri', '2014-08-01', 4, 5, '	KFP', '2014-08-30 23:55:00', '2014-08-30 11:55:00', 1),
(51, '	sopan', '07:00:00', '09:00:00', '	hawiz', '2014-09-01', 3, 5, '	KKP', '2014-09-30 23:55:00', '2014-09-30 11:55:00', 1),
(52, '	santun', '08:00:00', '10:00:00', '	wahiz', '2014-10-01', 4, 5, '	KIP', '2014-10-30 23:55:00', '2014-10-30 11:55:00', 1),
(53, 'Jaminan Produk Halal', '17:00:00', '18:00:00', 'Ustadz Ramli', '2014-05-15', 1, 1, 'JPH', '2014-05-20 12:15:00', '0000-00-00 00:00:00', 0),
(54, 'Nikah', '12:00:00', '13:30:00', 'Ustadz Ramli, SAg', '2014-08-22', 1, 1, 'JOK', '2014-05-26 07:38:00', '0000-00-00 00:00:00', 0),
(55, 'Nikah', '11:00:00', '13:00:00', 'Ust Suryadharma', '2014-05-30', 1, 1, 'Seminar Nikah', '2014-05-29 06:47:00', '0000-00-00 00:00:00', 0),
(56, 'Taaruf', '12:00:00', '13:00:00', 'Ust Suryadharma', '2014-05-29', 1, 1, 'Seminar Taaruf', '2014-05-30 07:13:00', '0000-00-00 00:00:00', 0),
(57, 'Taaruf', '09:00:00', '07:00:00', 'Ust Suryadharma', '2014-05-29', 1, 1, 'Seminar Taaruf', '2014-05-29 07:20:00', '0000-00-00 00:00:00', 0),
(58, 'Taarfu', '12:00:00', '13:00:00', 'Ust Suryadharma', '2014-05-26', 1, 1, 'Seminar Taaruf', '2014-05-30 07:21:00', '0000-00-00 00:00:00', 0),
(59, 'Taaruf', '08:00:00', '08:00:00', 'Ust Suryadharma', '2014-05-29', 1, 1, 'Seminar Taaruf', '2014-05-30 08:00:00', '0000-00-00 00:00:00', 0),
(60, 'Taaruf', '12:00:00', '13:00:00', 'Ust Suryadharma', '2014-05-30', 1, 1, 'Seminar Taaruf', '2014-05-30 12:00:00', '0000-00-00 00:00:00', 0),
(61, 'Kesehatan', '09:00:00', '11:00:00', 'Ust Munandar', '2014-07-24', 1, 1, 'HSH', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(62, 'Kesehatan Islami', '12:00:00', '13:00:00', 'Ust Munandar', '2014-05-24', 1, 1, 'HSH', '2014-05-23 13:00:00', '0000-00-00 00:00:00', 0),
(63, 'President SBY subhanallah', '17:00:00', '16:00:00', 'Bapak Dokter halal', '2014-05-23', 1, 1, 'JPH', '0000-00-00 00:00:00', '2014-05-23 10:20:47', 2),
(65, 'Jaminan Produk HALAL', '06:00:00', '07:00:00', 'Ustadz Ramli', '2014-05-26', 1, 1, 'JPH', '2014-05-31 23:59:59', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE IF NOT EXISTS `peserta` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_regional`, `nomor_peserta`, `nama`, `no_handphone`, `email`, `jenis_kelamin`, `status_aktif`) VALUES
(3, 1, '121324', 'choirudin', '081227832822', 'choirudin22@gmail.com', 'L', 1),
(4, 1, '1213149', 'hehehe', '081227832822', 'choirudin22@gmail.com', 'P', 1),
(5, 2, '110606', 'Herman', '081227832822', 'choirudin22@gmail.com', 'P', 1),
(6, 1, '112329', 'arras', '08122639', 'choirudin22@gmail.com', 'P', 1),
(7, 1, '63456', 'siapa saja', '0887877', 'email@yahoo.com', 'L', 1),
(8, 1, '878789', 'heheh', '081228788989', 'choirudin2@gmail.com', 'L', 1),
(9, 1, '87898989', 'choirudin ganteng', '08123378328', 'choriudin@gmail.com', 'L', 1),
(110, 1, '1001010', 'Choirudin', '8567172801', 'choi@gmail.com', 'L', 1),
(111, 1, '1001010', 'Giri Hariztio', '8567172802', 'giri@gmail.com', 'L', 1),
(112, 1, '1001010', 'Herman Wahyudi', '8567172803', 'herman@gmail.com', 'L', 1),
(113, 1, '112323', 'Afifun A', '8567172804', 'herman.wahyudi01@ui.ac.id', 'L', 1),
(114, 1, '1001010', 'Riza', '8567172805', 'riza@gmail.com', 'L', 1),
(115, 1, '1001010', 'Zego', '8567172806', 'zego@gmail.com', 'L', 1),
(116, 1, '1001010', 'Riandra', '8567172807', 'rian@gmail.com', 'L', 1),
(117, 1, '1001010', 'Akmal', '8567172808', 'akmal@gmail.com', 'L', 1),
(118, 1, '1001010', 'Hafiudzan', '8567172809', 'havin@gmail.com', 'L', 1),
(119, 1, '1001011', 'Refsito', '8567172810', 'nito@gmail.com', 'L', 1),
(120, 1, '1001011', 'Putra', '8567172811', 'putra@gmail.com', 'L', 1),
(121, 1, '1001011', 'Raya Ilham', '8567172812', 'raya@gmail.com', 'L', 1),
(122, 1, '1001011', 'Denny', '8567172813', 'denny@gmail.com', 'L', 1),
(123, 1, '1001011', 'Fahmi Islami', '8567172814', 'fahmi@gmail.com', 'L', 1),
(124, 1, '1001011', 'Prakoso', '8567172815', 'koso@gmail.com', 'L', 1),
(126, 1, '1001011', 'Izzuddiin', '8567172817', 'judin@gmail.com', 'L', 1),
(128, 1, '1001011', 'Handar', '8567172819', 'handar@gmail.com', 'L', 1),
(129, 1, '1001012', 'Cakra', '8567172820', 'cakra@gmail.com', 'L', 1),
(130, 2, '	2001010', '	Jihan', '	8567172821', '	jihan@gmail.com', '	', 1),
(131, 2, '	2001010', '	Husna Yanevi', '	8567172822', '	husna@gmail.com', '	', 1),
(132, 2, '	2001010', '	Aulia', '	8567172823', '	aulia@gmail.com', '	', 1),
(133, 2, '	2001010', '	Karendiya', '	8567172824', '	karen@gmail.com', '	', 1),
(134, 2, '	2001010', '	Elvira', '	8567172825', '	el@gmail.com', '	', 1),
(135, 2, '	2001010', '	Irania', '	8567172826', '	iran@gmail.com', '	', 1),
(136, 2, '	2001010', '	Nur', '	8567172827', '	nur@gmail.com', '	', 1),
(137, 2, '	2001010', '	Vini Akbar', '	8567172828', '	vini@gmail.com', '	', 1),
(138, 2, '	2001010', '	Vatia Putri', '	8567172829', '	vatia@gmail.com', '	', 1),
(139, 2, '	2001011', '	Syeftiarini', '	8567172830', '	septi@gmail.com', '	', 1),
(140, 2, '	2001011', '	Dewi Setia', '	8567172831', '	dewi@gmail.com', '	', 1),
(141, 2, '	2001011', '	Anisa Fatkhu', '	8567172832', '	nisa@gmail.com', '	', 1),
(142, 2, '	2001011', '	Alia', '	8567172833', '	alia@gmail.com', '	', 1),
(143, 2, '	2001011', '	Nurul Fitri', '	8567172834', '	ulul@gmail.com', '	', 1),
(144, 2, '	2001011', '	Dita Dwi', '	8567172835', '	dita@gmail.com', '	', 1),
(145, 2, '	2001011', '	Melinda', '	8567172836', '	mel@gmail.com', '	', 1),
(146, 2, '	2001011', '	Anita Kusuma', '	8567172837', '	nita@gmail.com', '	', 1),
(147, 2, '	2001011', '	Firdha', '	8567172838', '	pirda@gmail.com', '	', 1),
(148, 2, '	2001011', '	Ayu Nur', '	8567172839', '	aida@gmail.com', '	', 1),
(149, 2, '	2001012', '	Amalia', '	8567172840', '	ame@gmail.com', '	', 1),
(150, 3, '	3001010', '	Kim Jedong', '	8567172841', '	jedong@gmail.com', '	', 1),
(151, 3, '	3001010', '	Lee Hongki', '	8567172842', '	hongki@gmail.com', '	', 1),
(152, 3, '	3001010', '	Jang Oh Juk', '	8567172843', '	on@gmail.com', '	', 1),
(153, 3, '	3001010', '	Kim Bum', '	8567172844', '	kimbum@gmail.com', '	', 1),
(154, 3, '	3001010', '	Lee Dong Wook', '	8567172845', '	dongwook@gmail.com', '	', 1),
(155, 3, '	3001010', '	Kim Min  Woo', '	8567172846', '	minwoo@gmail.com', '	', 1),
(156, 3, '	3001010', '	Tablo', '	8567172847', '	tablo@gmail.com', '	', 1),
(157, 3, '	3001010', '	Jeremy', '	8567172848', '	jerry@gmail.com', '	', 1),
(158, 3, '	3001010', '	Thomas', '	8567172849', '	tom@gmail.com', '	', 1),
(159, 3, '	3001011', '	Ahmad Candra', '	8567172850', '	candra@gmail.com', '	', 1),
(160, 4, '	4001010', '	Swandika', '	8567172851', '	swan@gmail.com', '	', 1),
(161, 4, '	4001010', '	Swandriya', '	8567172852', '	andri@gmail.com', '	', 1),
(162, 4, '	4001010', '	Febrian', '	8567172853', '	febrian@gmail.com', '	', 1),
(163, 4, '	4001010', '	Faiz', '	8567172854', '	faiz@gmail.com', '	', 1),
(164, 4, '	4001010', '	Jaesuk', '	8567172855', '	jaesuk@gmail.com', '	', 1),
(165, 4, '	4001010', '	Sukjin', '	8567172856', '	sukjin@gmail.com', '	', 1),
(166, 4, '	4001010', '	Gwangsoo', '	8567172857', '	kirin@gmail.com', '	', 1),
(167, 4, '	4001010', '	Jong Kook', '	8567172858', '	tiger@gmail.com', '	', 1),
(168, 4, '	4001010', '	Haha', '	8567172859', '	pororo@gmail.com', '	', 1),
(169, 4, '	4001011', '	Jongki', '	8567172860', '	flower@gmail.com', '	', 1),
(170, 5, '	5001010', '	Shinichi', '	8567172861', '	conan@gmail.com', '	', 1),
(171, 5, '	5001010', '	Conan', '	8567172862', '	shinichi@gmail.com', '	', 1),
(172, 5, '	5001010', '	Kyuhyun', '	8567172863', '	cho@gmail.com', '	', 1),
(173, 5, '	5001010', '	Donghae', '	8567172864', '	lee@gmail.com', '	', 1),
(174, 5, '	5001010', '	Ryewook', '	8567172865', '	wook@gmail.com', '	', 1),
(175, 5, '	5001010', '	Siwon', '	8567172866', '	won@gmail.com', '	', 1),
(176, 5, '	5001010', '	Abdi Praja', '	8567172867', '	praja@gmail.com', '	', 1),
(177, 5, '	5001010', '	Ahmad Zein', '	8567172868', '	ahmad@gmail.com', '	', 1),
(178, 5, '	5001010', '	Aji', '	8567172869', '	aji@gmail.com', '	', 1),
(179, 5, '	5001011', '	Ezra', '	8567172870', '	ezra@gmail.com', '	', 1),
(180, 6, '	6001010', '	Rendi', '	8567172871', '	rendi@gmail.com', '	', 1),
(181, 6, '	6001010', '	Ario Rahadi', '	8567172872', '	ario@gmail.com', '	', 1),
(182, 6, '	6001010', '	Dahru', '	8567172873', '	dahru@gmail.com', '	', 1),
(183, 6, '	6001010', '	Wahyu Rismawan', '	8567172874', '	wahyu@gmail.com', '	', 1),
(184, 6, '	6001010', '	Helmi', '	8567172875', '	helmi@gmail.com', '	', 1),
(185, 6, '	6001010', '	Rian Fitrian', '	8567172876', '	ryan@gmail.com', '	', 1),
(186, 6, '	6001010', '	Thesar', '	8567172877', '	thesar@gmail.com', '	', 1),
(187, 6, '	6001010', '	Keri', '	8567172878', '	keri@gmail.com', '	', 1),
(188, 6, '	6001010', '	Dana Avian', '	8567172879', '	dana@gmail.com', '	', 1),
(189, 6, '	6001011', '	Earvin', '	8567172880', '	ncek@gmail.com', '	', 1),
(190, 7, '	7001010', '	Fadin Darma', '	8567172881', '	fadin@gmail.com', '	', 1),
(191, 7, '	7001010', '	Fajar Putra', '	8567172882', '	fajar@gmail.com', '	', 1),
(192, 7, '	7001010', '	Farhan', '	8567172883', '	farhan@gmail.com', '	', 1),
(193, 7, '	7001010', '	Farras Olif', '	8567172884', '	faras@gmail.com', '	', 1),
(194, 7, '	7001010', '	Fauzan', '	8567172885', '	ujan@gmail.com', '	', 1),
(195, 7, '	7001010', '	Ginanjar', '	8567172886', '	anjar@gmail.com', '	', 1),
(196, 7, '	7001010', '	Aradea', '	8567172887', '	ara@gmail.com', '	', 1),
(197, 7, '	7001010', '	Abdullah Majid', '	8567172888', '	majid@gmail.com', '	', 1),
(198, 7, '	7001010', '	Aldi Reinal', '	8567172889', '	menoy@gmail.com', '	', 1),
(199, 7, '	7001011', '	Rasmunandar', '	8567172890', '	mun@gmail.com', '	', 1),
(200, 8, '	8001010', '	Novian', '	8567172891', '	novi@gmail.com', '	', 1),
(201, 8, '	8001010', '	Aditya Wicak', '	8567172892', '	odit@gmail.com', '	', 1),
(202, 8, '	8001010', '	Tito Ghonim', '	8567172893', '	tito@gmail.com', '	', 1),
(203, 8, '	8001010', '	Ari Anjar', '	8567172894', '	ari@gmail.com', '	', 1),
(204, 8, '	8001010', '	Erza Rahmat', '	8567172895', '	erza@gmail.com', '	', 1),
(205, 8, '	8001010', '	Ivan Rama', '	8567172896', '	ivan@gmail.com', '	', 1),
(206, 8, '	8001010', '	Tri Kunto', '	8567172897', '	tri@gmail.com', '	', 1),
(207, 8, '	8001010', '	Andika Rianil', '	8567172898', '	mbew@gmail.com', '	', 1),
(208, 8, '	8001010', '	Fakhruroji', '	8567172899', '	roji@gmail.com', '	', 1),
(209, 8, '	8001011', '	Sandi Hasan', '	8567172900', '	sandi@gmail.com', '	', 1),
(210, 1, '65656565', 'Kiki', '34340', 'herman.wahyudi01@ui.ac.id', 'L', 1),
(211, 1, 'Jaka090', 'JakaPerdana', '4534534', 'herman.wahyudi01@ui.ac.id', 'L', 1),
(212, 1, '1123234', 'adasd', '234243', 'ada@gmial.com', 'L', 1),
(213, 1, '10054636', 'chori', '0986886868', 'choirudin22@gmail.com', 'P', 0),
(214, 1, '34356', 'Herman Wahyudi', '23423432', 'herman.wahyudi01@ui.ac.id', 'L', 1),
(215, 1, '4534534', 'Aji', '3423', 'herman.wahyudi01@ui.ac.id', 'L', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `regional`
--

CREATE TABLE IF NOT EXISTS `regional` (
  `id_regional` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(54) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_regional`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `regional`
--

INSERT INTO `regional` (`id_regional`, `nama`, `alamat`, `id_user`) VALUES
(1, 'Regional I Jakarta Putra', 'Jaln Srengseng', 3),
(2, 'Regional I Jakarta Putri', 'Jalan', 4),
(3, 'Regional II Bandung', 'Jalan', 2),
(4, 'Regional 3 jogjakarta', 'jl.marlioboro', 1),
(5, 'Regional 4 Bandung', 'alalalalakakaka', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(1) NOT NULL AUTO_INCREMENT,
  `status_kehadiran` char(5) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `status`
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
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `role`, `username`, `password`, `nama`, `jenis_kelamin`, `email`, `nip`, `no_telp`, `alamat`, `url_image`) VALUES
(1, 1, 'administrator', '827ccb0eea8a706c4c34a16891f84e7b', 'Administrator', 'P', 'administrator@gmail.com', '1290', '0219898689', 'Jakarta Selatan', '471011.jpg'),
(2, 2, 'pengurus.pusat', '827ccb0eea8a706c4c34a16891f84e7b', 'Pengurus Pusat', 'L', 'herman.wahyudi02@gmail.com', '1690', '0217685658', 'Jakarta Selatan', '377655.jpg'),
(3, 3, 'regional.jakarta1', '827ccb0eea8a706c4c34a16891f84e7b', 'Regional Jakarta I', 'L', 'regional.jakarta1@gmail.com', '00909090', '082137341838', 'Jalan mawar 21', 'hehehe.png'),
(4, 3, 'regional.jakarta2', '827ccb0eea8a706c4c34a16891f84e7b', 'Regional Jakarta II', 'L', 'choirudin22@gmail.com', '1112233', '0988787668', 'Jalan Mawar', 'photo.jpg'),
(5, 3, 'regional.jogja', '827ccb0eea8a706c4c34a16891f84e7b', 'Regional Jogja', 'L', 'herman.wahyudi02@gmail.com', '1234678', '09545845', 'Jogja', '5143-'),
(6, 3, 'regional.bandung', '827ccb0eea8a706c4c34a16891f84e7b', 'Regional Bandung', 'L', 'husnayanevi@gmail.com', '1234678', '098754343', 'Bandung', '9897-e-commerce.jpg'),
(9, 3, 'regional.bogor', '827ccb0eea8a706c4c34a16891f84e7b', 'Regional Bogor', 'L', 'choirudin22@gmail.com', '1214434', '081227832822', 'Bogor', 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `_history_kegiatan`
--

CREATE TABLE IF NOT EXISTS `_history_kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `materi` text NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `pembicara` varchar(64) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_kegiatan` int(5) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `deadline` datetime NOT NULL,
  `waktu_isi` datetime NOT NULL,
  `status_isi` smallint(1) NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `_history_kegiatan`
--

INSERT INTO `_history_kegiatan` (`id_kegiatan`, `materi`, `waktu_mulai`, `waktu_selesai`, `pembicara`, `tanggal`, `jenis_kegiatan`, `id_regional`, `nama_kegiatan`, `deadline`, `waktu_isi`, `status_isi`) VALUES
(1, 'akdajdkj', '18:00:00', '19:00:00', 'JDajd', '2014-05-30', 1, 1, 'JPH', '2014-05-24 17:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `_history_peserta`
--

CREATE TABLE IF NOT EXISTS `_history_peserta` (
  `id_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `id_regional` int(11) NOT NULL,
  `nomor_peserta` varchar(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `email` varchar(64) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `status_aktif` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_peserta`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `_history_peserta`
--

INSERT INTO `_history_peserta` (`id_peserta`, `id_regional`, `nomor_peserta`, `nama`, `no_handphone`, `email`, `jenis_kelamin`, `status_aktif`) VALUES
(1, 1, '1001011', 'Zulfikar', '8567172816', 'zaki@gmail.com', 'L', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `_history_regional`
--

CREATE TABLE IF NOT EXISTS `_history_regional` (
  `id_regional` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(54) NOT NULL,
  `alamat` text NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_regional`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `_history_regional`
--

INSERT INTO `_history_regional` (`id_regional`, `nama`, `alamat`, `id_user`) VALUES
(1, 'dfsdfs', 'sdfds', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `_history_user`
--

CREATE TABLE IF NOT EXISTS `_history_user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `_history_user`
--

INSERT INTO `_history_user` (`id_user`, `role`, `username`, `password`, `nama`, `jenis_kelamin`, `email`, `nip`, `no_telp`, `alamat`, `url_image`) VALUES
(1, 3, '!#$%', '827ccb0eea8a706c4c34a16891f84e7b', 'nama', 'L', 'choirudin22@gmail.com', '121324242', '081227832822', 'skdfskdjskjgfksjfk', '');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `regional`
--
ALTER TABLE `regional`
  ADD CONSTRAINT `regional_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
