-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 09:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openhouse23`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `id` int(255) NOT NULL,
  `foto` text NOT NULL,
  `ukm` text DEFAULT NULL,
  `lk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` int(10) UNSIGNED NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_by` varchar(9) NOT NULL,
  `submit` tinyint(1) NOT NULL,
  `submit_by` varchar(9) NOT NULL,
  `link_jawaban` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id`, `nrp`, `last_update`, `update_by`, `submit`, `submit_by`, `link_jawaban`) VALUES
(0, '', '2023-04-24 23:40:17', 'c14210135', 0, '', NULL),
(0, 'c14210154', '2023-05-08 13:38:42', 'c14210135', 0, '', NULL),
(0, 'nrpsaya', '2023-05-13 00:15:42', 'c14210135', 0, '', NULL),
(0, 'test1div', '2023-05-22 10:48:47', 'c14210135', 1, 'c14210135', 'https://docs.google.com/document/d/1xM9O91bnjS9fXTgUg8P8AiTHfxeCZxtU6oZPpf6o__s/edit'),
(0, '', '2023-04-24 23:40:17', 'c14210135', 0, '', NULL),
(0, 'c14210154', '2023-05-08 13:38:42', 'c14210135', 0, '', NULL),
(0, 'nrpsaya', '2023-05-13 00:15:42', 'c14210135', 0, '', NULL),
(0, 'test1div', '2023-05-22 10:48:47', 'c14210135', 1, 'c14210135', 'https://docs.google.com/document/d/1xM9O91bnjS9fXTgUg8P8AiTHfxeCZxtU6oZPpf6o__s/edit');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_openreg`
--

CREATE TABLE `jadwal_openreg` (
  `id` int(10) UNSIGNED NOT NULL,
  `nrp_panit` varchar(9) NOT NULL,
  `hari_tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `nrp_pendaftar` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_openreg`
--

INSERT INTO `jadwal_openreg` (`id`, `nrp_panit`, `hari_tanggal`, `jam`, `status`, `nrp_pendaftar`) VALUES
(4, 'c14210154', '2022-12-17', '09:00:00', 1, 'c14210154'),
(7, 'd11200333', '2022-12-17', '11:00:00', 0, NULL),
(8, 'd11200333', '2022-12-17', '13:00:00', 0, NULL),
(9, 'd11200333', '2022-12-19', '14:00:00', 0, NULL),
(10, 'c14210154', '2022-12-17', '11:00:00', 0, NULL),
(11, 'c14210154', '2022-12-19', '16:00:00', 0, NULL),
(12, 'c14210154', '2022-12-17', '13:00:00', 0, NULL),
(13, 'c14210154', '2022-12-20', '12:00:00', 0, NULL),
(14, 'c14210154', '2022-12-21', '13:00:00', 1, 'c14210135'),
(15, 'd11200333', '2022-12-17', '09:00:00', 0, NULL),
(16, 'd11200094', '2022-12-17', '09:00:00', 0, NULL),
(17, 'c14210135', '2022-12-17', '11:00:00', 1, 'test1div');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(11) NOT NULL,
  `id_pendaftar_maba` int(11) NOT NULL,
  `nrp_penjawab` varchar(16) NOT NULL,
  `id_pertanyaan` varchar(16) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_pendaftar_maba`, `nrp_penjawab`, `id_pertanyaan`, `jawaban`) VALUES
(13, 6, 'c124213', '', 'image/6_c124213.png'),
(14, 6, 'c124213', '12', 'image/6_c124213.png'),
(15, 6, 'c124213', '11', 'pdf/6_c124213.pdf'),
(16, 7, 'c12345678', '6', 'TESTINGDATA1'),
(17, 7, 'c12345678', '11', 'pdf/7_c12345678.pdf'),
(18, 7, 'c12345678', '12', 'image/7_c12345678.jpg'),
(19, 8, 'c1234', '6', 'testingdata1'),
(20, 8, 'c1234', '11', 'pdf/8_c1234.pdf'),
(21, 8, 'c1234', '12', 'image/8_c1234.png'),
(22, 9, 'c14210026', '6', 'testing'),
(23, 9, 'c14210026', '12', 'image/9_c14210026.jpg'),
(24, 10, 'c14210154', '6', 'asdfg'),
(25, 10, 'c14210154', '12', 'image/10_c14210154.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id` int(11) NOT NULL,
  `id_wgg` int(11) NOT NULL,
  `nama_kelompok` text NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id`, `id_wgg`, `nama_kelompok`, `score`) VALUES
(1, 1, 'CIVIL E. 1', 10),
(2, 2, 'CIVIL E. 2', 0),
(3, 3, 'CIVIL E. 3', 0),
(4, 4, 'CIVIL E. 4', 0),
(5, 5, 'ARCHI 1', 0),
(6, 6, 'ARCHI 2', 0),
(7, 7, 'ARCHI 3', 0),
(8, 8, 'ARCHI 4', 0),
(9, 9, 'ARCHI 5', 0),
(10, 10, 'ARCHI 6', 0),
(11, 11, 'EE-IOT 1', 0),
(12, 12, 'EE-IOT 2', 0),
(13, 13, 'AUTO-SMED 1', 0),
(14, 14, 'AUTO-SMED 2', 0),
(15, 15, 'AUTO-SMED 3', 0),
(16, 16, 'IE-GSLC 1', 0),
(17, 17, 'IE-GSLC 2', 0),
(18, 18, 'IE-GSLC 3', 0),
(19, 19, 'IE-GSLC 4', 0),
(20, 20, 'INFOR-SIB-DSA 1', 0),
(21, 21, 'INFOR-SIB-DSA 2', 0),
(22, 22, 'INFOR-SIB-DSA 3', 0),
(23, 23, 'INFOR-SIB-DSA 4', 0),
(24, 24, 'INFOR-SIB-DSA 5', 0),
(25, 25, 'INFOR-SIB-DSA 6', 0),
(26, 26, 'INFOR-SIB-DSA 7', 0),
(27, 27, 'INFOR-SIB-DSA 8', 0),
(28, 28, 'INFOR-SIB-DSA 9', 170),
(29, 29, 'INFOR-SIB-DSA 10', 0),
(30, 30, 'INFOR-SIB-DSA 11', 0),
(31, 31, 'INFOR-SIB-DSA 12', 0),
(32, 32, 'INFOR-SIB-DSA 13', 0),
(33, 33, 'INFOR-SIB-DSA 14', 0),
(34, 34, 'INFOR-SIB-DSA 15', 0),
(35, 35, 'INFOR-SIB-DSA 16', 0),
(36, 36, 'INFOR-SIB-DSA 17', 0),
(37, 37, 'INFOR-SIB-DSA 18', 0),
(38, 38, 'BUS-ACC 1', 0),
(39, 39, 'BUS-ACC 2', 0),
(40, 40, 'BUS-ACC 3', 0),
(41, 41, 'BUS-ACC 4', 0),
(42, 42, 'TAX-ACC 1', 0),
(43, 43, 'TAX-ACC 2', 0),
(44, 44, 'TAX-ACC 3', 0),
(45, 45, 'TAX-ACC 4', 0),
(46, 46, 'TAX-ACC 5', 0),
(47, 47, 'TAX-ACC 6', 0),
(48, 48, 'BUSINESS 1', 0),
(49, 49, 'BUSINESS 2', 0),
(50, 50, 'BUSINESS 3', 0),
(51, 51, 'BUSINESS 4', 0),
(52, 52, 'BUSINESS 5', 0),
(53, 53, 'BUSINESS 6', 0),
(54, 54, 'BUSINESS 7', 0),
(55, 55, 'BUSINESS 8', 0),
(56, 56, 'BUSINESS 9', 0),
(57, 57, 'BUSINESS 10', 0),
(58, 58, 'BUSINESS 11', 0),
(59, 59, 'BUSINESS 12', 0),
(60, 60, 'BUSINESS 13', 0),
(61, 61, 'BUSINESS 14', 0),
(62, 62, 'BUSINESS 15', 0),
(63, 63, 'HOTEL 1', 0),
(64, 64, 'HOTEL 2', 0),
(65, 65, 'HOTEL 3', 0),
(66, 66, 'HOTEL 4', 0),
(67, 67, 'C. TOURISM 1', 0),
(68, 68, 'MARKETING 1', 0),
(69, 69, 'MARKETING 2', 0),
(70, 70, 'MARKETING 3', 0),
(71, 71, 'FINEST 1', 0),
(72, 72, 'FINEST 2', 0),
(73, 73, 'FINEST 3', 0),
(74, 74, 'FINEST 4', 0),
(75, 75, 'FINEST 5', 0),
(76, 76, 'FINEST 6', 0),
(77, 77, 'PGPAUD 1', 0),
(78, 78, 'PGPAUD 2', 0),
(79, 79, 'PGSD 1', 0),
(80, 80, 'PGSD 2', 0),
(81, 81, 'PGSD 3', 0),
(82, 82, 'EB 1', 0),
(83, 83, 'ECI 1', 0),
(84, 84, 'ECI 2', 0),
(85, 85, 'CHINESE 1', 0),
(86, 86, 'CHINESE 2', 0),
(87, 87, 'CHINESE 3', 0),
(88, 88, 'IDS-IPD 1', 0),
(89, 89, 'IDS-IPD 2', 0),
(90, 90, 'IDS-IPD 3', 0),
(91, 91, 'IDS-IPD 4', 0),
(92, 92, 'IDS-IPD 5', 0),
(93, 93, 'IDS-IPD 6', 0),
(94, 94, 'VISUAL COM. 1', 0),
(95, 95, 'VISUAL COM. 2', 0),
(96, 96, 'VISUAL COM. 3', 0),
(97, 97, 'VISUAL COM. 4', 0),
(98, 98, 'VISUAL COM. 5', 0),
(99, 99, 'VISUAL COM. 6', 0),
(100, 100, 'VISUAL COM. 7', 0),
(101, 101, 'VISUAL COM. 8', 0),
(102, 102, 'VISUAL COM. 9', 0),
(103, 103, 'VISUAL COM. 10', 0),
(104, 104, 'VISUAL COM. 11', 0),
(105, 105, 'VISUAL COM. 12', 0),
(106, 106, 'VISUAL COM. 13', 0),
(107, 107, 'VISUAL COM. 14', 0),
(108, 108, 'FASHION 1', 0),
(109, 109, 'FASHION 2', 0),
(110, 110, 'SC-BJ 1', 0),
(111, 111, 'SC-BJ 2', 0),
(112, 112, 'SC-BJ 3', 0),
(113, 113, 'SC-BJ 4', 0),
(114, 114, 'SC-BJ 5', 0),
(115, 115, 'SC-BJ 6', 0),
(116, 116, 'SC-BJ 7', 0),
(117, 117, 'SC-BJ 8', 0),
(118, 118, 'IBE 1', 0),
(119, 119, 'IPDM 1', 0),
(120, 120, 'IPDM 2', 0),
(121, 121, 'IBM 1', 0),
(122, 122, 'IBM 2', 0),
(123, 123, 'IBM 3', 0),
(124, 124, 'IBM 4', 0),
(125, 125, 'IBACC 1', 0),
(126, 126, 'Kelompok Ncik', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lk`
--

CREATE TABLE `lk` (
  `id` int(11) NOT NULL,
  `nama_lk` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `poster` longblob NOT NULL,
  `logo` longblob NOT NULL,
  `instagram` varchar(64) NOT NULL,
  `website` varchar(64) NOT NULL,
  `youtube` varchar(128) NOT NULL,
  `oa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lk`
--

INSERT INTO `lk` (`id`, `nama_lk`, `password`, `deskripsi`, `visi`, `misi`, `poster`, `logo`, `instagram`, `website`, `youtube`, `oa`) VALUES
(1, 'BEM', 'BEM', '', '', '', '', '', '', '', '', ''),
(2, 'PERSMA', 'PERSMA', '', '', '', '', '', '', '', '', ''),
(3, 'TPS', 'TPS', '', '', '', '', '', '', '', '', ''),
(4, 'PELMA', 'PELMA', '', '', '', '', '', '', '', '', ''),
(5, 'MPM', 'MPM', '', '', '', '', '', '', '', '', ''),
(6, 'BPMF 1', 'BPMF 1', '', '', '', '', '', '', '', '', ''),
(7, 'BPMF 2', 'BPMF 2', '', '', '', '', '', '', '', '', ''),
(8, 'BPMF 3', 'BPMF 3', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_baru`
--

CREATE TABLE `mahasiswa_baru` (
  `id` int(11) NOT NULL,
  `nrp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa_baru`
--

INSERT INTO `mahasiswa_baru` (`id`, `nrp`) VALUES
(5, 'c14210154'),
(6, 'c14230154');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` int(11) NOT NULL,
  `page` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `page`, `status`) VALUES
(1, 'check_news', 'aman'),
(2, 'data_panitia', 'aman'),
(3, 'ganti_password', 'aman'),
(4, 'give_point', 'aman'),
(5, 'index', 'aman'),
(6, 'interview', 'aman'),
(7, 'keteranganLK', 'aman'),
(8, 'keteranganUKM', 'aman'),
(9, 'lihat_jawaban_ukm', 'aman'),
(10, 'list_panitia', 'aman'),
(11, 'list_pendaftarUKM', 'aman'),
(12, 'list_peserta', 'aman'),
(13, 'newsOH', 'aman'),
(14, 'pertanyaanUKM', 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_user`
--

CREATE TABLE `maintenance_user` (
  `id` int(11) NOT NULL,
  `page` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maintenance_user`
--

INSERT INTO `maintenance_user` (`id`, `page`, `status`) VALUES
(1, 'semua', 'aman');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL,
  `last_update` date NOT NULL,
  `ukm_lk` text NOT NULL,
  `status` text NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `judul`, `tanggal`, `isi`, `last_update`, `ukm_lk`, `status`, `notes`) VALUES
(1, '6', '2023-07-07', '1', '2023-07-07', 'basket', 'terima', ''),
(2, '2', '2023-07-08', '2', '2023-07-07', 'basket', 'tolak', 'Hai'),
(3, 'judul1', '2023-07-14', 'isi1', '2023-07-12', 'vg', 'tolak', ''),
(4, 'judul2', '2023-07-18', 'isi2', '2023-07-12', 'vg', 'terima', ''),
(5, 'judul1', '2023-07-08', 'isi1', '2023-07-07', 'vg', 'terima', '');

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE `panitia` (
  `id` int(10) UNSIGNED NOT NULL,
  `nrp` varchar(9) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nama_lengkap` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nama_samaran` varchar(32) NOT NULL,
  `divisi` varchar(32) NOT NULL,
  `meet` text DEFAULT NULL,
  `line` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id`, `nrp`, `nama_lengkap`, `nama_samaran`, `divisi`, `meet`, `line`) VALUES
(1, 'c14210135', 'Alexander Louis', 'bawang', 'Creative', 'https://google.com', 'minatongmavook'),
(2, 'd11200333', 'Cindy Gosali', '', 'Acara', NULL, NULL),
(3, 'c14210154', 'Alvin Iqnacio', '', 'IT', NULL, '	\nAlvinn.i.s'),
(4, 'c14200020', 'Joshua Yordana', '', 'BPH', NULL, NULL),
(5, 'd11200094', 'Sie Immanuel Ardiyan', '', 'Perkapman', NULL, NULL),
(6, 'f11200039', 'Sentanu Chandra', '', 'BPH', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(10) UNSIGNED NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `nama_lengkap` varchar(30) DEFAULT NULL,
  `jurusan` varchar(30) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `line` varchar(30) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `ipk` float DEFAULT NULL,
  `domisili` text DEFAULT NULL,
  `divisi1` varchar(20) DEFAULT NULL,
  `divisi2` varchar(20) DEFAULT NULL,
  `ktm` text DEFAULT NULL,
  `chart` text DEFAULT NULL,
  `skkk` text DEFAULT NULL,
  `kecurangan` text DEFAULT NULL,
  `cv` text DEFAULT NULL,
  `portofolio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nrp`, `nama_lengkap`, `jurusan`, `angkatan`, `email`, `line`, `telp`, `ipk`, `domisili`, `divisi1`, `divisi2`, `ktm`, `chart`, `skkk`, `kecurangan`, `cv`, `portofolio`) VALUES
(1, 'c14210154', 'Alvin Iqnacio', 'Informatika', 2021, 'c14210154@john.petra.ac.id', 'linealvin', '0812345678', 3.63, 'Perak', 'IT', 'Creative', 'testktm', 'testchart', 'testskkk', 'testkecura', NULL, 'testport'),
(3, 'c14210135', 'Alexander Louis Tanadi', 'Informatika', 2021, 'c14210135@john.petra.ac.id', 'minatongmavook', '089131231414', 3.98, 'Surabaya', 'IT', 'Acara', 'ktm/c14210135.png', 'nilai/c14210135.png', 'skkk/c14210135.png', 'kecurangan/c14210135.png', NULL, 'afawfawfawgawg'),
(4, 'nrpmario', 'mario', 'International Business Managem', 2021, 'mario@gmail.com', 'marioline', '0899999992', 3.88, 'Pengampon', 'IT', 'Perlengkapan', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'nrpwilber', 'Wilbert velozz', 'Otomotif', 2022, 'wilber@gmail.com', 'wilawkoawkowak', '0891312314525235', 3.3435, 'jl Grand Pakuwon No.1-100', 'Perlengkapan', 'Creative', 'ktm/nrpwilber.jpg', 'nilai/nrpwilber.jpg', 'skkk/nrpwilber.jpg', 'kecurangan/nrpwilber.jpg', NULL, 'google.com'),
(7, 'nrpsaya', 'saya', 'Hotel Management', 2020, 'saya@gmail.com', 'idsaya', '08924124124', 3.88, 'awdadaw', 'Sekonkes', 'Creative', 'ktm/nrpsaya.jpg', 'nilai/nrpsaya.jpg', 'skkk/nrpsaya.jpg', 'kecurangan/nrpsaya.jpg', 'cv/nrpsaya.pdf', 'www.google.com'),
(8, 'test1div', 'testdiv', 'Bahasa Mandarin', 2021, 'test@gmail.com', 'testline', '08142121253', 3.45, 'alamat test', 'Creative', NULL, 'ktm/test1div.png', 'nilai/test1div.png', 'skkk/test1div.png', 'kecurangan/test1div.png', 'cv/test1div.pdf', 'www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar_maba`
--

CREATE TABLE `pendaftar_maba` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nrp` text NOT NULL,
  `jurusan` text NOT NULL,
  `fakultas` text NOT NULL,
  `angkatan` text NOT NULL,
  `UKM` text NOT NULL,
  `telepon` text NOT NULL,
  `terima` text DEFAULT NULL,
  `pembayaran` text NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftar_maba`
--

INSERT INTO `pendaftar_maba` (`id`, `nama`, `nrp`, `jurusan`, `fakultas`, `angkatan`, `UKM`, `telepon`, `terima`, `pembayaran`, `tanggal`) VALUES
(6, 'james', 'c124213', 'Architecture', 'Fakultas Bahasa dan Sastra', '2021', '', '', 'terima', '', '2023-07-30 12:28:09'),
(7, 'TESTINGDATA1', 'c12345678', 'Internet of Things', 'Fakultas Teknologi Industri (FTI)', '2023', 'vg', '12', 'terima', '', '2023-07-30 12:28:09'),
(8, 'testingdataakhir4', 'c14220046', 'Civil Engineering', 'Fakultas Bahasa dan Sastra', '2022', 'vg', '123', 'terima', '', '2023-07-30 12:28:09'),
(9, 'testingdata1', 'c14220046', 'Civil Engineering', 'Fakultas Bisnis dan Ekonomi', '2022', 'basket', '08211234567', 'terima', '9_c14210026.png', '2023-07-30 12:28:09'),
(10, 'Alvin', 'c14210154', 'English for Creative Industry', 'Fakultas Teknologi Industri (FTI)', '2022', 'basket', '12345', 'terima', '10_c14210154.jpg', '2023-07-30 12:28:48'),
(11, 'basket', 'c14210154', 'Bahasa Mandarin', 'Fakultas Teknik Sipil & Perencanaan (FTSP)', '2021', 'Teater', '12345', 'terima', '11_c14210154.jpg', '2023-07-30 13:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(20) NOT NULL,
  `ukm` varchar(10) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `ukm`, `pertanyaan`, `jenis`) VALUES
(6, 'basket', 'test?', 'text'),
(8, '', 'text', 'text'),
(11, 'vg', 'ini pertanyaan basket ke 2', 'image'),
(12, 'basket', 'ini pertanyaan basket ke 3', 'image'),
(16, 'vg', '123', 'text'),
(17, 'vg', '123', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `id` int(255) NOT NULL,
  `ukm_lk` varchar(20) NOT NULL,
  `kelompok` varchar(50) NOT NULL,
  `jumlah_point` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`id`, `ukm_lk`, `kelompok`, `jumlah_point`) VALUES
(4, 'c14210135', 'Kelompok 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id_kelompok` int(11) NOT NULL,
  `nama_kelompok` text NOT NULL,
  `score` int(11) NOT NULL,
  `pemberi_score` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id_kelompok`, `nama_kelompok`, `score`, `pemberi_score`) VALUES
(1, 'testing data 1', 25, 'testing data 1'),
(2, 'testing data 2', 15, 'testing data 2'),
(3, 'testing data 3', 200, 'testing data 3'),
(4, 'INFOR-SIB-DSA 9', 170, 'testing data 4'),
(27, 'CIVIL E. 1', 10, 'c14230154');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `token`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImMxNDIxMDE1NEBqb2huLnBldHJhLmFjLmlkIiwiaWF0IjoxNjkwMTgzMjYxLCJleHAiOjE2OTAxODQ0NjF9.65Nm71X5kaL9xuGExPKHa6oqxvKskMDDZ1XNsEw0vkE');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id` int(11) NOT NULL,
  `nama_ukm` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `deskripsi` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `poster` longblob NOT NULL,
  `logo` longblob NOT NULL,
  `biaya` varchar(32) NOT NULL,
  `jadwal` varchar(256) NOT NULL,
  `instagram` varchar(64) NOT NULL,
  `youtube` varchar(64) NOT NULL,
  `no_rek` varchar(32) NOT NULL,
  `quota` int(11) NOT NULL,
  `livechat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id`, `nama_ukm`, `password`, `deskripsi`, `visi`, `misi`, `poster`, `logo`, `biaya`, `jadwal`, `instagram`, `youtube`, `no_rek`, `quota`, `livechat`) VALUES
(1, 'UKM Martografi', 'UKM Martografi', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae2fcdcc26a871b027db3d/1h546lfgd\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(2, 'UKM Ilustrasi', 'UKM Ilustrasi', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae2ff494cf5d49dc6305f7/1h546mlli\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(3, 'Modeling', 'Modeling', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae302fcc26a871b027db4f/1h546ofgs\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(4, 'Teater', 'Teater', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae303ecc26a871b027db57/1h546ouoe\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(5, 'VG', 'VG', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae305094cf5d49dc630609/1h546pf94\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(6, 'ASFS', 'ASFS', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae305dcc26a871b027db60/1h546ps4f\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(7, 'Dekorasi', 'Dekorasi', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae306bcc26a871b027db63/1h546q9su\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(8, 'Chinese Art', 'Chinese Art', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae307acc26a871b027db68/1h546qop0\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(9, 'Dance', 'Dance', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae3089cc26a871b027db6b/1h546r73u\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(10, 'Taekwondo', 'Taekwondo', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae309c94cf5d49dc630624/1h546rpd0\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(11, 'Badminton', 'Badminton', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae30a9cc26a871b027db78/1h546s69k\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(12, 'Tenis Lapangan', 'Tenis Lapangan', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae30b7cc26a871b027db7d/1h546sjq3\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(13, 'Futsal', 'Futsal', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae30c3cc26a871b027db80/1h546sv8s\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(14, 'Voli', 'Voli', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae30cecc26a871b027db87/1h546tai8\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(15, 'Tenis Meja', 'Tenis Meja', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae3167cc26a871b027db9c/1h547205p\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(16, 'Catur', 'Catur', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae317694cf5d49dc63064a/1h5472eu7\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(17, 'Selam', 'Selam', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae3187cc26a871b027dba5/1h5472v9s\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(18, 'Fitness', 'Fitness', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae3196cc26a871b027dbb8/1h5473dvc\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(19, 'Esport', 'Esport', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae31a694cf5d49dc630655/1h5473svq\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(20, 'Cycling', 'Cycling', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae31b494cf5d49dc63065a/1h5474bd7\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(21, 'Renang', 'Renang', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae31c394cf5d49dc630666/1h5474q4l\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(22, 'English Debate', 'English Debate', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae31d2cc26a871b027dbc5/1h54758hl\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(23, 'Pengembangan Diri', 'Pengembangan Diri', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae31e3cc26a871b027dbcd/1h5475ogp\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(24, 'Menulis Kreatif', 'Menulis Kreatif', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae31f494cf5d49dc63066e/1h54769qi\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(25, 'Paduan Suara', 'Paduan Suara', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae3204cc26a871b027dbd5/1h5476oo9\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(26, 'Orkestra', 'Orkestra', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae3211cc26a871b027dbd9/1h54775pu\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(27, 'MATRAPENZA', 'MATRAPENZA', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae3221cc26a871b027dbe1/1h5477lha\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(28, 'MATRAPALA', 'MATRAPALA', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae322e94cf5d49dc63067c/1h547826f\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(29, 'EMR/KSR', 'EMR/KSR', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae323bcc26a871b027dbe5/1h5478f2p\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(30, 'MENWA', 'MENWA', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae324694cf5d49dc630686/1h5478ppo\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->'),
(31, 'Basket', 'Basket', '', '', '', '', '', '', '', '', '', '', 0, '<!--Start of Tawk.to Script--> <script type=\"text/javascript\"> var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date(); (function(){ var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0]; s1.async=true; s1.src=\'https://embed.tawk.to/64ae325394cf5d49dc630689/1h5479653\'; s1.charset=\'UTF-8\'; s1.setAttribute(\'crossorigin\',\'*\'); s0.parentNode.insertBefore(s1,s0); })(); </script> <!--End of Tawk.to Script-->');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_openreg`
--
ALTER TABLE `jadwal_openreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lk`
--
ALTER TABLE `lk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa_baru`
--
ALTER TABLE `mahasiswa_baru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar_maba`
--
ALTER TABLE `pendaftar_maba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jadwal_openreg`
--
ALTER TABLE `jadwal_openreg`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `lk`
--
ALTER TABLE `lk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mahasiswa_baru`
--
ALTER TABLE `mahasiswa_baru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pendaftar_maba`
--
ALTER TABLE `pendaftar_maba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
