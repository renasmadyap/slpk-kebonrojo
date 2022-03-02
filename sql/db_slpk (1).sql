-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2022 at 09:22 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_slpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(7) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `satuan_id`, `jenis_id`) VALUES
('B000001', 'Lenovo Ideapad 1550', 15, 1, 3),
('B000002', 'Samsung Galaxy J1 Ace', 50, 1, 4),
('B000003', 'Aqua 1,5 Liter', 700, 3, 2),
('B000004', 'Mouse Wireless Logitech M220', 20, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `user_id`, `barang_id`, `jumlah_keluar`, `tanggal_keluar`) VALUES
('T-BK-19082000001', 1, 'B000003', 35, '2019-08-20'),
('T-BK-19082000002', 1, 'B000002', 10, '2019-08-20'),
('T-BK-19092000003', 1, 'B000001', 5, '2019-09-20'),
('T-BK-19092000004', 1, 'B000003', 150, '2019-09-20'),
('T-BK-19092000005', 1, 'B000004', 10, '2019-09-20'),
('T-BK-19092200006', 1, 'B000003', 100, '2019-09-22');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_stok_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(16) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` char(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `supplier_id`, `user_id`, `barang_id`, `jumlah_masuk`, `tanggal_masuk`) VALUES
('T-BM-19082000001', 2, 1, 'B000003', 800, '2019-08-20'),
('T-BM-19082000002', 3, 1, 'B000001', 20, '2019-08-20'),
('T-BM-19082000003', 3, 1, 'B000002', 10, '2019-08-20'),
('T-BM-19082000004', 1, 1, 'B000004', 15, '2019-08-20'),
('T-BM-19092000005', 3, 1, 'B000002', 40, '2019-09-20'),
('T-BM-19092000006', 2, 1, 'B000003', 50, '2019-09-20'),
('T-BM-19092200007', 3, 1, 'B000004', 15, '2019-09-22'),
('T-BM-19092200008', 1, 1, 'B000003', 135, '2019-09-22');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_masuk` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`stok` = `barang`.`stok` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.barang_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Snack'),
(2, 'Minuman'),
(3, 'Laptop'),
(4, 'Handphone'),
(5, 'Sepeda Motor'),
(6, 'Mobil'),
(7, 'Perangkat Komputer');

-- --------------------------------------------------------

--
-- Table structure for table `mandor_koreksi`
--

CREATE TABLE `mandor_koreksi` (
  `id_koreksi` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `mitra_id` int(3) NOT NULL,
  `jadwal_pu` int(3) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `instan_doc` int(3) NOT NULL,
  `instan_brg` int(3) NOT NULL,
  `instan_jml` int(3) NOT NULL,
  `pos_exp_doc` int(3) NOT NULL,
  `pos_exp_brg` int(3) NOT NULL,
  `pos_exp_jml` int(3) NOT NULL,
  `pkh_doc` int(3) NOT NULL,
  `pkh_brg` int(3) NOT NULL,
  `pkh_jml` int(3) NOT NULL,
  `perlaksus_doc` int(3) NOT NULL,
  `perlaksus_brg` int(3) NOT NULL,
  `perlaksus_jml` int(3) NOT NULL,
  `log_doc` int(3) NOT NULL,
  `log_brg` int(3) NOT NULL,
  `log_jml` int(3) NOT NULL,
  `lain_doc` int(3) NOT NULL,
  `lain_brg` int(3) NOT NULL,
  `lain_jml` int(3) NOT NULL,
  `jml_doc` int(3) NOT NULL,
  `jml_brg` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `nippos` int(11) NOT NULL,
  `jam_input` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandor_koreksi`
--

INSERT INTO `mandor_koreksi` (`id_koreksi`, `nama_petugas`, `mitra_id`, `jadwal_pu`, `tgl_masuk`, `instan_doc`, `instan_brg`, `instan_jml`, `pos_exp_doc`, `pos_exp_brg`, `pos_exp_jml`, `pkh_doc`, `pkh_brg`, `pkh_jml`, `perlaksus_doc`, `perlaksus_brg`, `perlaksus_jml`, `log_doc`, `log_brg`, `log_jml`, `lain_doc`, `lain_brg`, `lain_jml`, `jml_doc`, `jml_brg`, `total`, `nippos`, `jam_input`) VALUES
(9, 'fajar', 15, 3, '2022-01-03', 5, 0, 5, 0, 10, 10, 0, 0, 0, 0, 5, 5, 6, 0, 6, 0, 5, 5, 11, 20, 31, 321, '15:33:49'),
(10, 'fajar', 15, 3, '2021-12-27', 5, 0, 5, 0, 10, 10, 0, 0, 0, 0, 0, 0, 6, 10, 16, 0, 5, 5, 11, 25, 36, 321, '15:04:13'),
(11, 'alif', 15, 4, '2021-12-29', 0, 10, 10, 0, 0, 0, 5, 0, 5, 0, 0, 0, 0, 7, 7, 9, 0, 9, 14, 17, 31, 1206, '15:05:33'),
(12, 'fajar', 1, 3, '2021-12-30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 10, 90, 100, 10, 95, 105, 321, '20:26:55'),
(13, 'fajar', 14, 1, '2021-12-30', 0, 0, 0, 0, 0, 0, 0, 28, 28, 78, 50, 128, 5, 0, 5, 0, 29, 29, 83, 107, 190, 321, '20:27:30'),
(14, 'fajar', 0, 3, '2022-01-03', 5, 0, 5, 0, 10, 10, 0, 0, 0, 0, 5, 5, 6, 50, 6, 0, 5, 5, 11, 20, 31, 321, '15:30:37'),
(15, 'fajar', 0, 3, '2022-01-03', 5, 0, 5, 0, 10, 10, 0, 0, 0, 0, 5, 5, 6, 0, 6, 0, 50, 50, 11, 65, 76, 321, '15:33:55'),
(16, 'fajar', 15, 3, '2022-01-03', 5, 0, 5, 0, 10, 10, 0, 90, 90, 0, 5, 5, 6, 0, 6, 10, 5, 15, 21, 110, 131, 321, '15:51:01'),
(17, 'fajar', 275, 1, '2022-01-03', 0, 0, 0, 0, 0, 0, 0, 28, 28, 78, 0, 78, 5, 0, 5, 0, 40, 40, 83, 68, 151, 321, '15:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `mandor_koreksiln`
--

CREATE TABLE `mandor_koreksiln` (
  `id_koreksiln` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `mitra_id` int(3) NOT NULL,
  `jadwal_pu` int(3) NOT NULL,
  `ems_doc` int(3) NOT NULL,
  `ems_brg` int(3) NOT NULL,
  `ems_jml` int(3) NOT NULL,
  `pos_expt_doc` int(3) NOT NULL,
  `pos_expt_brg` int(3) NOT NULL,
  `pos_expt_jml` int(3) NOT NULL,
  `pp_cpt_doc` int(3) NOT NULL,
  `pp_cpt_brg` int(3) NOT NULL,
  `pp_cpt_jml` int(3) NOT NULL,
  `pp_laut_doc` int(3) NOT NULL,
  `pp_laut_brg` int(3) NOT NULL,
  `pp_laut_jml` int(3) NOT NULL,
  `r_ln_doc` int(3) NOT NULL,
  `r_ln_brg` int(3) NOT NULL,
  `r_ln_jml` int(3) NOT NULL,
  `e_pack_doc` int(3) NOT NULL,
  `e_pack_brg` int(3) NOT NULL,
  `e_pack_jml` int(3) NOT NULL,
  `lain_brg` int(3) NOT NULL,
  `lain_doc` int(3) NOT NULL,
  `lain_jml` int(3) NOT NULL,
  `jml_doc` int(3) NOT NULL,
  `jml_brg` int(3) NOT NULL,
  `total` int(3) NOT NULL,
  `nippos` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jam_input` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandor_koreksiln`
--

INSERT INTO `mandor_koreksiln` (`id_koreksiln`, `nama_petugas`, `mitra_id`, `jadwal_pu`, `ems_doc`, `ems_brg`, `ems_jml`, `pos_expt_doc`, `pos_expt_brg`, `pos_expt_jml`, `pp_cpt_doc`, `pp_cpt_brg`, `pp_cpt_jml`, `pp_laut_doc`, `pp_laut_brg`, `pp_laut_jml`, `r_ln_doc`, `r_ln_brg`, `r_ln_jml`, `e_pack_doc`, `e_pack_brg`, `e_pack_jml`, `lain_brg`, `lain_doc`, `lain_jml`, `jml_doc`, `jml_brg`, `total`, `nippos`, `tgl_masuk`, `jam_input`) VALUES
(2, 'fajar', 4, 3, 5, 5, 10, 5, 5, 10, 5, 5, 10, 5, 5, 10, 0, 5, 5, 0, 0, 0, 10, 25, 15, 25, 30, 55, 321, '2022-01-03', '15:37:10'),
(3, 'fajar', 4, 3, 5, 5, 10, 5, 5, 10, 5, 5, 10, 5, 0, 5, 0, 5, 5, 0, 0, 0, 0, 5, 5, 25, 20, 45, 321, '2021-12-27', '15:36:59'),
(4, 'fajar', 17, 5, 0, 0, 0, 0, 10, 10, 0, 0, 0, 6, 10, 16, 8, 0, 8, 0, 0, 0, 5, 0, 5, 14, 25, 39, 321, '2021-12-27', '15:37:47'),
(5, 'fajar', 247, 3, 5, 5, 10, 5, 100, 105, 5, 5, 10, 5, 0, 5, 0, 5, 5, 0, 0, 0, 100, 5, 105, 25, 215, 240, 321, '2021-12-30', '20:27:52'),
(6, 'fajar', 0, 3, 5, 5, 10, 5, 5, 10, 5, 5, 10, 5, 0, 5, 0, 5, 5, 0, 0, 0, 10, 5, 15, 25, 30, 55, 321, '2022-01-03', '15:38:30'),
(7, 'fajar', 0, 5, 0, 0, 0, 0, 10, 10, 0, 0, 0, 6, 0, 6, 8, 10, 18, 0, 0, 0, 5, 0, 5, 14, 25, 39, 321, '2022-01-03', '15:39:43'),
(8, 'fajar', 0, 3, 5, 5, 10, 5, 5, 10, 5, 5, 10, 5, 0, 5, 0, 5, 5, 0, 0, 0, 100, 5, 105, 25, 120, 145, 321, '2022-01-03', '15:40:45'),
(9, 'fajar', 247, 3, 5, 50, 55, 5, 5, 10, 5, 5, 10, 5, 0, 5, 0, 55, 55, 0, 0, 0, 100, 5, 105, 25, 215, 240, 321, '2022-01-03', '15:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(3) NOT NULL,
  `nama_mitra` varchar(50) NOT NULL,
  `wilayah` varchar(3) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama_mitra`, `wilayah`, `alamat`) VALUES
(1, 'BPFK', 'SBU', 'jalan'),
(2, 'FIF  SPEKTRA/GALAXI KERTAJAYA', 'SBU', 'jalan'),
(3, 'PLN UP2B', 'SBU', 'jalan'),
(4, 'BPFK', 'SBU', 'jalan'),
(5, 'FIF  SPEKTRA/GALAXI KERTAJAYA', 'SBU', 'jalan'),
(6, 'PLN UP2B', 'SBU', 'jalan'),
(7, 'DIPO STAR', 'SBU', 'jalan'),
(8, 'BRI PERAK', 'SBU', 'jalan'),
(9, 'BOGASARI MC', 'SBU', 'jalan'),
(10, 'BRI PAHLAWAN', 'SBU', 'jalan'),
(11, 'PAJAK SAWAHAN', 'SBU', 'jalan'),
(12, 'PAJAK SUKOMANUNGGAL', 'SBU', 'jalan'),
(13, 'PAJAK TEGAL SARI', 'SBU', 'jalan'),
(14, 'PDAM', 'SBU', 'jalan'),
(15, 'PAJAK KREMBANGAN', 'SBU', 'jalan'),
(16, 'PAJAK MADYA ', 'SBU', 'jalan'),
(17, 'PAJAK PABEAN CANTIKAN', 'SBU', 'jalan'),
(18, 'UD INDO JAYA', 'SBU', 'jalan'),
(19, 'K. MATA SURYA INTI', 'SBU', 'jalan'),
(20, 'OPTIK NIAGARA', 'SBU', 'jalan'),
(21, 'OPTIK SINAR BARU', 'SBU', 'jalan'),
(22, 'VIVI OPTIK', 'SBU', 'jalan'),
(23, 'TOYOTA ASTRA FINANCE MERR', 'SBU', 'jalan'),
(24, 'OPTINDO', 'SBU', 'jalan'),
(25, 'NIAGA CARD/SEMUT/COLL/RECV', 'SBU', 'jalan'),
(26, 'KANWIL X DJKN SB', 'SBU', 'jalan'),
(27, 'PEGADAIAN KANWIL DINOYO', 'SBU', 'jalan'),
(28, 'BALAI TEKNIK KESEHATAN', 'SBU', 'jalan'),
(29, 'STARS INTERNASIONAL', 'SBU', 'jalan'),
(30, 'DISPENDA JIMERTO', 'SBU', 'jalan'),
(31, 'WOM FINANCE', 'SBU', 'jalan'),
(32, 'KANWIL VII BEA CUKAI/SLPK', 'SBU', 'jalan'),
(33, 'BEA CUKAI/SLPK', 'SBU', 'jalan'),
(34, 'KPKNL2 SB2/SLPK', 'SBU', 'jalan'),
(35, 'KPP GENTENG/SLPK', 'SBU', 'jalan'),
(36, 'WONOKOYO FARID', 'SBU', 'jalan'),
(37, 'KANWIL XV DJPBN/SLPK', 'SBU', 'jalan'),
(38, 'SUCOFINDO LAB', 'SBU', 'jalan'),
(39, 'BNI GRAHA PANGERAN', 'SBU', 'jalan'),
(40, 'JEMBATAN MAS BUANA', 'SBU', 'jalan'),
(41, ' UNIVERSITAS WIDYA MANDALA ', 'SBU', 'jalan'),
(42, ' INTI SUMBER PUSAT KANWIL ', 'SBU', 'jalan'),
(43, ' PT PELINDO III ', 'SBU', 'jalan'),
(44, ' OTO MULTIARTHA GENTENG ', 'SBU', 'jalan'),
(45, ' SOF M SUNGKONO ', 'SBU', 'jalan'),
(46, ' PHC ', 'SBU', 'jalan'),
(47, ' PELINDO PERAK ', 'SBU', 'jalan'),
(48, ' PUPUK KALTIM ', 'SBU', 'jalan'),
(49, ' PT PERTANI (PERSERO) ', 'SBU', 'jalan'),
(50, ' MANDIRI IRBA ', 'SBU', 'jalan'),
(51, ' PT GARAM ', 'SBU', 'jalan'),
(52, ' INTI PRESISI MEDIA ', 'SBU', 'jalan'),
(53, ' MITSUI LEASING ', 'SBU', 'jalan'),
(54, ' PENGADILAN TINGGI ', 'SBU', 'jalan'),
(55, ' PELINDO DAYA SEJAHTERA ', 'SBU', 'jalan'),
(56, ' PT MITRA SETIA BUDI ', 'SBU', 'jalan'),
(57, ' PT SUMBER CIPTA ', 'SBU', 'jalan'),
(58, ' KEMENKUMHAM ', 'SBU', 'jalan'),
(59, ' ACCESSORIS ONLINE ', 'SBU', 'jalan'),
(60, ' BJB DARMO ', 'SBU', 'jalan'),
(61, ' BRI RAJAWALI ', 'SBU', 'jalan'),
(62, ' BRI KANWIL ', 'SBU', 'jalan'),
(63, ' TIK BMN ', 'SBU', 'jalan'),
(64, ' PT WINGS SURYA ', 'SBU', 'jalan'),
(65, ' BRI DIPONEGORO ', 'SBU', 'jalan'),
(66, ' BTN PEMUDA ', 'SBU', 'jalan'),
(67, ' CIGNA ', 'SBU', 'jalan'),
(68, 'Mpm Sedati', 'SBU', 'jalan'),
(69, 'Mpm simpang dukuh', 'SBU', 'jalan'),
(70, 'KPPN SB 1', 'SBU', 'jalan'),
(71, 'FIF TANDES', 'SBU', 'jalan'),
(72, 'BNI kcu sb GUBSUR', 'SBU', 'jalan'),
(73, 'BNI USM', 'SBU', 'jalan'),
(74, 'OTTO HR MUHAMMAD', 'SBU', 'jalan'),
(75, 'JAYABAYA', 'SBU', 'jalan'),
(76, 'PENJEBAR SEMANGAT', 'SBU', 'jalan'),
(77, 'BANK JATIM', 'SBU', 'jalan'),
(78, 'BPJS KANWIL', 'SBU', 'jalan'),
(79, 'BNI PERAK', 'SBU', 'jalan'),
(80, 'PT HARUMALAM  (WINGS SURYA)', 'SBU', 'jalan'),
(81, 'KPPN SB 2', 'SBU', 'jalan'),
(82, 'BAITUL MALL HIDAYATULLAH', 'SBU', 'jalan'),
(83, 'MERATUS GROUP', 'SBU', 'jalan'),
(84, 'PLN', 'SBU', 'jalan'),
(85, 'TOYOTA ASTRA DARMO', 'SBU', 'jalan'),
(86, 'MOMENTHUM', 'SBU', 'jalan'),
(87, 'BRI KALIASIN ', 'SBU', 'jalan'),
(88, 'BRI HR MUHAMMAD', 'SBU', 'jalan'),
(89, 'BRI KUSUMA BANGSA', 'SBU', 'jalan'),
(90, 'BRI KERTAJAYA', 'SBU', 'jalan'),
(91, 'LAB SUCOFINDO', 'SBU', 'jalan'),
(92, 'BPJS DHARMAHUSADA', 'SBU', 'jalan'),
(93, 'BUANA FINANCE', 'SBU', 'jalan'),
(94, 'PT SABA INDOMEDIKA', 'SBU', 'jalan'),
(95, 'TELKOMSEL LT 5', 'SBU', 'jalan'),
(96, 'OTORITAS JASA KEUANGAN (OJK)', 'SBU', 'jalan'),
(97, 'KIANWIL BEA CUKAI PABEAN ', 'SBU', 'jalan'),
(98, 'PT DIAN LESTARI PERDANA (WINGS SURYA)', 'SBU', 'jalan'),
(99, 'GAWIH JAYA', 'SBU', 'jalan'),
(100, 'MITRA UTAMA GAPURA', 'SBU', 'jalan'),
(101, 'SETDA JATIM', 'SBU', 'jalan'),
(102, 'GRAMEDIA', 'SBU', 'jalan'),
(103, 'MIF', 'SBU', 'jalan'),
(104, 'MBLOG', 'SBU', 'jalan'),
(105, 'PUSKUD JATIM', 'SBU', 'jalan'),
(106, 'KARYA INDAH ALAM SEJAHTERA (WINGS SURYA)', 'SBU', 'jalan'),
(107, 'PT KARUNIA ALAM SEGAR (WINGS SURYA)', 'SBU', 'jalan'),
(108, 'YAMAHA BASUKI RAHMAT', 'SBU', 'jalan'),
(109, 'RODA SAKTI MEGAH', 'SBU', 'jalan'),
(110, 'YAMAHA PANGSUD', 'SBU', 'jalan'),
(111, 'PRIMA SUKSES', 'SBU', 'jalan'),
(112, 'CLIPAN II', 'SBU', 'jalan'),
(113, 'SATLANTAS POLDA JATIM', 'SBU', 'jalan'),
(114, 'MITRA ALAM SEGAR', 'SBU', 'jalan'),
(115, 'IHS GLOBAL (CP LT 2)', 'SBU', 'jalan'),
(116, 'KARYA INDAH ALAM SEGAR (WINGS SURYA)', 'SBU', 'jalan'),
(117, 'ADYABUANA', 'SBU', 'jalan'),
(118, 'BPIB', 'SBU', 'jalan'),
(119, 'PRIMA EXPRESS', 'SBU', 'jalan'),
(120, 'BNI SKC', 'SBU', 'jalan'),
(121, 'his kanwil (pusat/cust)', 'SBU', 'jalan'),
(122, 'IHS CABANG', 'SBU', 'jalan'),
(123, 'KPBN ', 'SBU', 'jalan'),
(124, 'PTPN XII', 'SBU', 'jalan'),
(125, 'BPJS PERAK TAG PIUTANG', 'SBU', 'jalan'),
(126, 'PLN JETB II', 'SBU', 'jalan'),
(127, 'MITRA DARMA LAKSANA', 'SBU', 'jalan'),
(128, 'PLN TRANSMISI', 'SBU', 'jalan'),
(129, 'BOGASARI BBC', 'SBU', 'jalan'),
(130, 'BOGASARI SSM', 'SBU', 'jalan'),
(131, 'TASPEN', 'SBU', 'jalan'),
(132, 'MANDIRA DIAN SEMESTA', 'SBU', 'jalan'),
(133, 'WONOKOYO', 'SBU', 'jalan'),
(134, 'PERTAMINA', 'SBU', 'jalan'),
(135, 'KARUNIA INDAH SEGAR', 'SBU', 'jalan'),
(136, 'KARUNIA INDAH ABADI ( WINGS SURYA )', 'SBU', 'jalan'),
(137, 'SALIM INFOMAS', 'SBU', 'jalan'),
(138, 'KREDIT PLUS', 'SBU', 'jalan'),
(139, 'BRINGIN LIFE POLIS IBS', 'SBU', 'jalan'),
(140, 'KMB SURABAYA', 'SBU', 'jalan'),
(141, 'BRINGIN LIFE POLIS SYARIAH', 'SBU', 'jalan'),
(142, 'PLN TRANSMISI UPT', 'SBU', 'jalan'),
(143, 'PENGADILAN NEGERI PIDANA ', 'SBU', 'jalan'),
(144, 'PENGADILAN NEGERI PIDANA PHI', 'SBU', 'jalan'),
(145, 'PENGADILAN NEGERI PIDANA UMUM', 'SBU', 'jalan'),
(146, 'BANK JATIM CAB UNTAG', 'SBU', 'jalan'),
(147, 'KENCANA BAJA TRADA', 'SBU', 'jalan'),
(148, ' PT EKATAMA MAKMUR (WINGS SURYA) ', 'SBU', 'jalan'),
(149, ' PT SURYA PERMATA ALAM MAKMUR (WINGS SURYA) ', 'SBU', 'jalan'),
(150, 'UPN', 'SBU', 'jalan'),
(151, 'ITS', 'SBU', 'jalan'),
(152, 'YAYASAN AL MADINA', 'SBU', 'jalan'),
(153, ' PT PERURI ', 'SBU', 'jalan'),
(154, 'BPJS KETENAGAKERJAAN JUANDA', 'SBU', 'jalan'),
(155, 'BI', 'SBU', 'jalan'),
(156, 'PT MASPION', 'SBU', 'jalan'),
(157, 'BNI JMP', 'SBU', 'jalan'),
(158, 'ITTS TELKOM', 'SBU', 'jalan'),
(159, 'PT BANK MANDIRI TP', 'SBU', 'jalan'),
(160, 'JAMKRINDO', 'SBU', 'jalan'),
(161, 'BPJS DHARMAHUSADA KIS', 'SBU', 'jalan'),
(162, 'KONI', 'SBU', 'jalan'),
(163, 'UNUSA', 'SBU', 'jalan'),
(164, ' ADIRA ', 'SBU', 'jalan'),
(165, ' WOM FINANCE ', 'SBU', 'jalan'),
(166, ' BCA FINANCE COLL ', 'SBU', 'jalan'),
(167, ' BCA FINANCE OPRATIONAL ', 'SBU', 'jalan'),
(168, ' BCA FINANCE VETERAN COLL ', 'SBU', 'jalan'),
(169, ' MEGA FINANCE ', 'SBU', 'jalan'),
(170, ' SITRUZ ', 'SBU', 'jalan'),
(171, ' MPM FINANCE ', 'SBU', 'jalan'),
(172, ' MPM FINANCE BUKITMAS ', 'SBU', 'jalan'),
(173, ' SM LOGISTICS ', 'SBU', 'jalan'),
(174, ' BCA FINANCE VETERAN (OPS) ', 'SBU', 'jalan'),
(175, ' SAMSAT ', 'SBU', 'jalan'),
(176, ' KORLANTAS ', 'SBU', 'jalan'),
(177, ' DINKES SAMPEL DARAH ', 'SBU', 'jalan'),
(178, 'AIA BCA', 'SBS', 'jalan'),
(179, 'AIA CIMB NIAGA', 'SBS', 'jalan'),
(180, 'ADIRA BPKB', 'SBS', 'jalan'),
(181, 'BTN HR MUH', 'SBS', 'jalan'),
(182, 'KPP MULYOREJO', 'SBS', 'jalan'),
(183, 'BNI LT 2', 'SBS', 'jalan'),
(184, 'PT PN XI', 'SBS', 'jalan'),
(185, 'ASSARENT', 'SBS', 'jalan'),
(186, 'DINKES JATIM', 'SBS', 'jalan'),
(187, 'UBAYA TENGGILIS', 'SBS', 'jalan'),
(188, 'SIGMA', 'SBS', 'jalan'),
(189, 'HM SAMPURNA', 'SBS', 'jalan'),
(190, 'WAFA', 'SBS', 'jalan'),
(191, 'PERTAMINA', 'SBS', 'jalan'),
(192, 'HM SAMPURNA', 'SBS', 'jalan'),
(193, 'BNI LT 2', 'SBS', 'jalan'),
(194, 'FIF', 'SBS', 'jalan'),
(195, 'BNI LT 4', 'SBS', 'jalan'),
(196, 'BNI LT 3', 'SBS', 'jalan'),
(197, 'BNI', 'SBS', 'jalan'),
(198, 'RSI JEMURSARI', 'SBS', 'jalan'),
(199, 'KPP WONOCOLO', 'SBS', 'jalan'),
(200, 'BPJS', 'SBS', 'jalan'),
(201, 'KPP MADYA', 'SBS', 'jalan'),
(202, 'BNI LT 2', 'SBS', 'jalan'),
(203, 'NSC SBY', 'SBS', 'jalan'),
(204, 'ASSARENT', 'SBS', 'jalan'),
(205, 'KPP KARANG PILANG', 'SBS', 'jalan'),
(206, 'TRAC', 'SBS', 'jalan'),
(207, 'KPP KARANG PILANG', 'SBS', 'jalan'),
(208, 'BNI GRHA PANGERAN', 'SBS', 'jalan'),
(209, 'ADIRA BPKB', 'SBS', 'jalan'),
(210, 'BNI LT 2', 'SBS', 'jalan'),
(211, 'BNI LT 2', 'SBS', 'jalan'),
(212, 'BNI LT 2', 'SBS', 'jalan'),
(213, 'PANIN', 'SBS', 'jalan'),
(214, 'FAST PRIN', 'SBS', 'jalan'),
(215, 'NPM', 'SBS', 'jalan'),
(216, 'PANIN COKLAT', 'SBS', 'jalan'),
(217, 'MTF BPKB', 'SBS', 'jalan'),
(218, 'DJP 6', 'SBS', 'jalan'),
(219, 'KPP MADYA', 'SBS', 'jalan'),
(220, 'KPP WONOCOLO', 'SBS', 'jalan'),
(221, 'PTPN', 'SBS', 'jalan'),
(222, 'DJP JATIM', 'SBS', 'jalan'),
(223, 'SINERGY', 'SBS', 'jalan'),
(224, 'MTF FINANCE', 'SBS', 'jalan'),
(225, 'TRAC', 'SBS', 'jalan'),
(226, 'MTF REG', 'SBS', 'jalan'),
(227, 'ALAM DIAN RAYA', 'SBS', 'jalan'),
(228, 'BJ WULAN', 'SBS', 'jalan'),
(229, 'CMN GALERY', 'SBS', 'jalan'),
(230, 'PJB', 'SBS', 'jalan'),
(231, 'PUSMANPRO', 'SBS', 'jalan'),
(232, 'BNI LT 9', 'SBS', 'jalan'),
(233, 'JAWA POS', 'SBS', 'jalan'),
(234, 'JAWA POS IKLAN', 'SBS', 'jalan'),
(235, 'BERKAT KESELAMATAN', 'SBS', 'jalan'),
(236, 'SAMAFITRO', 'SBS', 'jalan'),
(237, 'MOMENT', 'SBS', 'jalan'),
(238, 'HM SAMPURNA', 'SBS', 'jalan'),
(239, 'HM SAMPURNA', 'SBS', 'jalan'),
(240, 'BPS', 'SBS', 'jalan'),
(241, 'PERTAMINA', 'SBS', 'jalan'),
(242, 'BNI LT 2', 'SBS', 'jalan'),
(243, 'DINKES BU EMA', 'SBS', 'jalan'),
(244, 'KANWIL DJP JATIM', 'SDA', 'jalan'),
(245, 'KPP MADYA SIDOARJO', 'SDA', 'jalan'),
(246, 'KPP PRATAMA SIDOARJO BARAT', 'SDA', 'jalan'),
(247, 'KPP SIDOARJO SELATAN', 'SDA', 'jalan'),
(248, 'KPP BC TIPE MADYA PABEAN JUANDA', 'SDA', 'jalan'),
(249, 'KPP BC TIPE MADYA PABEAN SIDOARJO', 'SDA', 'jalan'),
(250, 'DAS BRANTAS', 'SDA', 'jalan'),
(251, 'KPKNL SIDOARJO', 'SDA', 'jalan'),
(252, 'KPPN SIDOARJO', 'SDA', 'jalan'),
(253, 'PENGADILAN MILITER (UMUM)', 'SDA', 'jalan'),
(254, 'PENGADILAN MILITER (PERKARA)', 'SDA', 'jalan'),
(255, 'PENGADILAN TIPIKOR', 'SDA', 'jalan'),
(256, 'DINAS PENDAPATAN', 'SDA', 'jalan'),
(257, 'BADAN PERTANAHAN NASIONAL SIDOARJO', 'SDA', 'jalan'),
(258, 'DINAS KEHUTANAN', 'SDA', 'jalan'),
(259, 'BALAI KONSERVASI SUMBER DAYA ALAM', 'SDA', 'jalan'),
(260, 'BPPHLHK WIL JAWA BALI NUSA TENGGARA', 'SDA', 'jalan'),
(261, 'DINAS KESEHATAN SIDOARJO', 'SDA', 'jalan'),
(262, 'BPJS KESEHATAN SIDOARJO', 'SDA', 'jalan'),
(263, 'BANK BTN CABANG SIDOARJO', 'SDA', 'jalan'),
(264, 'PT BANK NEGARA INDONESIA (PERSERO)', 'SDA', 'jalan'),
(265, 'JAMKRINDO', 'SDA', 'jalan'),
(266, 'BANK JATIM', 'SDA', 'jalan'),
(267, 'PT OTO MULTIARTA FINANCE', 'SDA', 'jalan'),
(268, 'PT WOM FINANCE GATEWAY WARU', 'SDA', 'jalan'),
(269, 'PT. MITRA KARYA PRIMA (SURAT PAKET)', 'SDA', 'jalan'),
(270, 'CV. STACCATO', 'SDA', 'jalan'),
(271, 'PT HISAMITSU PHARMA INDONESIA', 'SDA', 'jalan'),
(272, 'PT JAPFA COMFEED', 'SDA', 'jalan'),
(273, 'PT BISI INTERNATIONAL, TBk', 'SDA', 'jalan'),
(274, 'YANA VALENTINA', 'SDA', 'jalan'),
(275, 'NICE OPTIK', 'SDA', 'jalan'),
(276, 'KAOS KAOS.COM', 'SDA', 'jalan'),
(277, 'DINAS PETERNAKAN PAPUA (LOGISTIK)', 'SDA', 'jalan'),
(278, 'GRAHA KSATRIA ENVIROTAMA (LOGISTIK)', 'SDA', 'jalan'),
(279, 'PT. MITRA KARYA PRIMA (LOGISTIK)', 'SDA', 'jalan');

-- --------------------------------------------------------

--
-- Table structure for table `pu_dn`
--

CREATE TABLE `pu_dn` (
  `id_pu_dn` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `mitra_id` int(3) NOT NULL,
  `no_po` int(11) NOT NULL,
  `jadwal_pu` int(3) NOT NULL,
  `tujuan_krm` enum('Dalam Negri') NOT NULL DEFAULT 'Dalam Negri',
  `instan_doc` int(3) DEFAULT NULL,
  `instan_brg` int(3) DEFAULT NULL,
  `pos_exp_doc` int(3) DEFAULT NULL,
  `pos_exp_brg` int(3) DEFAULT NULL,
  `pkh_doc` int(3) DEFAULT NULL,
  `pkh_brg` int(3) DEFAULT NULL,
  `perlaksus_doc` int(3) DEFAULT NULL,
  `perlaksus_brg` int(3) DEFAULT NULL,
  `log_doc` int(3) DEFAULT NULL,
  `log_brg` int(3) DEFAULT NULL,
  `lain_brg` int(3) DEFAULT NULL,
  `lain_doc` int(3) DEFAULT NULL,
  `instan_jml` int(3) DEFAULT NULL,
  `pos_exp_jml` int(3) DEFAULT NULL,
  `pkh_jml` int(3) DEFAULT NULL,
  `perlaksus_jml` int(3) DEFAULT NULL,
  `log_jml` int(3) DEFAULT NULL,
  `lain_jml` int(3) DEFAULT NULL,
  `jml_doc` int(4) DEFAULT NULL,
  `jml_brg` int(4) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `total` int(4) DEFAULT NULL,
  `nippos` int(11) NOT NULL,
  `jam_input` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pu_dn`
--

INSERT INTO `pu_dn` (`id_pu_dn`, `nama_petugas`, `mitra_id`, `no_po`, `jadwal_pu`, `tujuan_krm`, `instan_doc`, `instan_brg`, `pos_exp_doc`, `pos_exp_brg`, `pkh_doc`, `pkh_brg`, `perlaksus_doc`, `perlaksus_brg`, `log_doc`, `log_brg`, `lain_brg`, `lain_doc`, `instan_jml`, `pos_exp_jml`, `pkh_jml`, `perlaksus_jml`, `log_jml`, `lain_jml`, `jml_doc`, `jml_brg`, `tgl_masuk`, `total`, `nippos`, `jam_input`) VALUES
(16, 'fajar', 15, 891274, 3, 'Dalam Negri', 5, 0, 0, 10, 0, 90, 0, 5, 6, 0, 5, 10, 5, 10, 90, 5, 6, 15, 21, 110, '2022-01-03', 131, 321, '16:06:47'),
(17, 'fajar', 1, 891274, 3, 'Dalam Negri', 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 10, 0, 0, 0, 5, 0, 10, 10, 5, '2021-12-07', 15, 321, '16:45:06'),
(18, 'fajar', 275, 891274, 1, 'Dalam Negri', 0, 0, 0, 0, 0, 28, 78, 0, 5, 0, 29, 0, 0, 0, 28, 78, 5, 29, 83, 57, '2022-01-03', 140, 321, '15:12:58'),
(19, 'alif', 15, 891274, 4, 'Dalam Negri', 0, 10, 0, 0, 5, 0, 0, 0, 0, 7, 0, 9, 10, 0, 5, 0, 7, 9, 14, 17, '2021-12-29', 31, 1206, '14:41:39'),
(20, 'fajar', 18, 4213, 5, 'Dalam Negri', 30, 0, 0, 40, 0, 0, 0, 0, 0, 0, 52, 0, 30, 40, 0, 0, 0, 52, 30, 92, '2022-01-03', 122, 321, '15:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `pu_ln`
--

CREATE TABLE `pu_ln` (
  `id_pu_ln` int(11) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `mitra_id` int(3) NOT NULL,
  `no_po` int(11) NOT NULL,
  `jadwal_pu` int(3) NOT NULL,
  `tujuan_krm` enum('Luar Negri') NOT NULL DEFAULT 'Luar Negri',
  `tgl_masuk` date NOT NULL,
  `ems_doc` int(3) NOT NULL,
  `ems_brg` int(3) NOT NULL,
  `ems_jml` int(3) NOT NULL,
  `pos_expt_doc` int(3) NOT NULL,
  `pos_expt_brg` int(3) NOT NULL,
  `pos_expt_jml` int(3) NOT NULL,
  `pp_cpt_doc` int(3) NOT NULL,
  `pp_cpt_brg` int(3) NOT NULL,
  `pp_cpt_jml` int(3) NOT NULL,
  `pp_laut_doc` int(3) NOT NULL,
  `pp_laut_brg` int(3) NOT NULL,
  `pp_laut_jml` int(3) NOT NULL,
  `r_ln_doc` int(3) NOT NULL,
  `r_ln_brg` int(3) NOT NULL,
  `r_ln_jml` int(3) NOT NULL,
  `e_pack_doc` int(3) NOT NULL,
  `e_pack_brg` int(3) NOT NULL,
  `e_pack_jml` int(3) NOT NULL,
  `lain_doc` int(3) NOT NULL,
  `lain_brg` int(3) NOT NULL,
  `lain_jml` int(3) NOT NULL,
  `jml_doc` int(3) NOT NULL,
  `jml_brg` int(3) NOT NULL,
  `total` int(4) NOT NULL,
  `nippos` int(11) NOT NULL,
  `jam_input` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pu_ln`
--

INSERT INTO `pu_ln` (`id_pu_ln`, `nama_petugas`, `mitra_id`, `no_po`, `jadwal_pu`, `tujuan_krm`, `tgl_masuk`, `ems_doc`, `ems_brg`, `ems_jml`, `pos_expt_doc`, `pos_expt_brg`, `pos_expt_jml`, `pp_cpt_doc`, `pp_cpt_brg`, `pp_cpt_jml`, `pp_laut_doc`, `pp_laut_brg`, `pp_laut_jml`, `r_ln_doc`, `r_ln_brg`, `r_ln_jml`, `e_pack_doc`, `e_pack_brg`, `e_pack_jml`, `lain_doc`, `lain_brg`, `lain_jml`, `jml_doc`, `jml_brg`, `total`, `nippos`, `jam_input`) VALUES
(2, 'fajar', 247, 4213, 3, 'Luar Negri', '2022-01-03', 5, 50, 55, 5, 5, 10, 5, 5, 10, 5, 0, 5, 0, 5, 5, 0, 0, 0, 5, 100, 105, 25, 165, 190, 321, '15:48:56'),
(3, 'fajar', 17, 891274, 5, 'Luar Negri', '2021-12-07', 0, 0, 0, 0, 10, 10, 0, 0, 0, 6, 0, 6, 8, 0, 8, 0, 0, 0, 0, 5, 5, 14, 15, 29, 321, '14:45:40'),
(4, 'fajar', 247, 891274, 4, 'Luar Negri', '2021-12-30', 19, 0, 19, 0, 0, 0, 0, 98, 98, 0, 0, 0, 50, 0, 50, 0, 0, 0, 0, 100, 100, 69, 198, 267, 321, '20:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(1, 'Unit'),
(2, 'Pack'),
(3, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(1, 'Ahmad Hasanudin', '085688772971', 'Kec. Cigudeg, Bogor - Jawa Barat'),
(2, 'Asep Salahudin', '081341879246', 'Kec. Ciampea, Bogor - Jawa Barat'),
(3, 'Filo Lial', '087728164328', 'Kec. Ciomas, Bogor - Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nippos` char(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `role` enum('Manager Prostrans','Petugas Pickup','Mandor','Super user') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `rute` int(3) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `id_petugas` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nippos`, `no_telp`, `role`, `password`, `created_at`, `rute`, `is_active`, `id_petugas`) VALUES
(1, 'Adminisitrator', '123', '025123456789', 'Manager Prostrans', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, 0, 1, '0'),
(19, 'Fajar', '4321', '084724', 'Mandor', '$2y$10$.w6TqpyvDlucfaAiWMnIQuNKJp4ZYv/qRRNIcLsXhZh65KIL/AZeW', 1637649480, 1, 1, '1'),
(22, 'fajar', '321', '4321', 'Petugas Pickup', '$2y$10$QFUNiysZd.6KqHjQH8hJCeTpMlFBL9AZKzLVeTRwWcFKRT6NkiNUG', 1637653749, 17, 1, '5'),
(23, 'nadif', '0321', '085851111140', 'Manager Prostrans', '$2y$10$7wOzhMXLDiCaVTTybhfLkOKNfM.v1RVIPtJSoRQMQsHKkJ6mIMA5q', 1637654113, 3, 1, '0321'),
(24, 'Nugroho', '890', '085851111140', 'Petugas Pickup', '$2y$10$3cY2k9u274BoREXAfJVJNOLR9y0jiIlBkBa1e9huWcvrRDVRwyzrW', 1637656511, 1, 1, '30'),
(25, 'alif', '1206', '09842', 'Petugas Pickup', '$2y$10$H848RUyNWcpesy/f5C9ZI.U1zF4J29nSpruQTUrSY13CRtfbaJDrK', 1640763592, 1, 1, '30'),
(1001, 'imanuel', '9123', '081274', 'Super user', '$2y$10$VvI0CHiONB3mhab5SK.gVOoQhUUH1qj59YbXJJJxjSfpF5rEn.ZIe', 1640857068, 4, 1, '9123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `satuan_id` (`satuan_id`),
  ADD KEY `kategori_id` (`jenis_id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_user` (`user_id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `mandor_koreksi`
--
ALTER TABLE `mandor_koreksi`
  ADD PRIMARY KEY (`id_koreksi`),
  ADD KEY `mitra_id` (`mitra_id`);

--
-- Indexes for table `mandor_koreksiln`
--
ALTER TABLE `mandor_koreksiln`
  ADD PRIMARY KEY (`id_koreksiln`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `pu_dn`
--
ALTER TABLE `pu_dn`
  ADD PRIMARY KEY (`id_pu_dn`),
  ADD KEY `mitra_id` (`mitra_id`);

--
-- Indexes for table `pu_ln`
--
ALTER TABLE `pu_ln`
  ADD PRIMARY KEY (`id_pu_ln`),
  ADD KEY `mitra_id` (`mitra_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mandor_koreksi`
--
ALTER TABLE `mandor_koreksi`
  MODIFY `id_koreksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mandor_koreksiln`
--
ALTER TABLE `mandor_koreksiln`
  MODIFY `id_koreksiln` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `pu_dn`
--
ALTER TABLE `pu_dn`
  MODIFY `id_pu_dn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pu_ln`
--
ALTER TABLE `pu_ln`
  MODIFY `id_pu_ln` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`jenis_id`) REFERENCES `jenis` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_keluar_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_masuk_ibfk_3` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
