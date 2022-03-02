-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2022 at 12:59 PM
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
(12, 'Raden Muhammad Syamsul Arifin', 146, 3, '2021-12-30', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 0, 0, 0, 10, 90, 100, 10, 95, 105, 330701018, '20:26:55'),
(13, 'fajar', 14, 1, '2021-12-30', 0, 0, 0, 0, 0, 0, 0, 28, 28, 78, 50, 128, 5, 0, 5, 0, 29, 29, 83, 107, 190, 321, '20:27:30'),
(14, 'fajar', 1, 3, '2022-01-03', 5, 0, 5, 0, 10, 10, 0, 0, 0, 0, 5, 5, 6, 50, 6, 0, 5, 5, 11, 20, 31, 321, '15:30:37'),
(15, 'fajar', 1, 3, '2022-01-03', 5, 0, 5, 0, 10, 10, 0, 0, 0, 0, 5, 5, 6, 0, 6, 0, 50, 50, 11, 65, 76, 321, '15:33:55'),
(16, 'fajar', 15, 3, '2022-01-03', 5, 0, 5, 0, 10, 10, 0, 90, 90, 0, 5, 5, 6, 0, 6, 10, 5, 15, 21, 110, 131, 321, '15:51:01'),
(17, 'fajar', 275, 1, '2022-01-03', 0, 0, 0, 0, 0, 0, 0, 28, 28, 78, 0, 78, 5, 0, 5, 0, 40, 40, 83, 68, 151, 321, '15:51:31'),
(18, 'fajar', 11, 1, '2022-01-29', 10, 0, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10, 10, 0, 50, 50, 10, 60, 70, 321, '10:47:10'),
(19, 'fajar', 11, 1, '2022-02-12', 30, 0, 30, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 30, 0, 50, 50, 30, 80, 110, 321, '09:49:49');

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
(6, 'Raden Muhammad Syamsul Arifin', 146, 3, 5, 5, 10, 5, 5, 10, 5, 5, 10, 5, 0, 5, 0, 5, 5, 0, 0, 0, 10, 5, 15, 25, 30, 55, 330701018, '2022-01-03', '15:38:30'),
(7, 'fajar', 1, 5, 0, 0, 0, 0, 10, 10, 0, 0, 0, 6, 0, 6, 8, 10, 18, 0, 0, 0, 5, 0, 5, 14, 25, 39, 321, '2022-01-03', '15:39:43'),
(8, 'fajar', 1, 3, 5, 5, 10, 5, 5, 10, 5, 5, 10, 5, 0, 5, 0, 5, 5, 0, 0, 0, 100, 5, 105, 25, 120, 145, 321, '2022-01-03', '15:40:45'),
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
(1, 'BPFK', 'SBU', 'Jl.'),
(2, 'FIF  SPEKTRA/GALAXI KERTAJAYA', 'SBU', 'Jl.'),
(3, 'PLN UP2B', 'SBU', 'Jl.'),
(4, 'DIPO STAR', 'SBU', 'Jl.'),
(5, 'BRI PERAK', 'SBU', 'Jl.'),
(6, 'BOGASARI MC', 'SBU', 'Jl.'),
(7, 'BRI PAHLAWAN', 'SBU', 'Jl.'),
(8, 'PAJAK SAWAHAN', 'SBU', 'Jl.'),
(9, 'PAJAK SUKOMANUNGGAL', 'SBU', 'Jl.'),
(10, 'PAJAK TEGAL SARI', 'SBU', 'Jl.'),
(11, 'PDAM', 'SBU', 'Jl.'),
(12, 'PAJAK KREMBANGAN', 'SBU', 'Jl.'),
(13, 'PAJAK MADYA ', 'SBU', 'Jl.'),
(14, 'PAJAK PABEAN CANTIKAN', 'SBU', 'Jl.'),
(15, 'UD INDO JAYA', 'SBU', 'Jl.'),
(16, 'K. MATA SURYA INTI', 'SBU', 'Jl.'),
(17, 'OPTIK NIAGARA', 'SBU', 'Jl.'),
(18, 'OPTIK SINAR BARU', 'SBU', 'Jl.'),
(19, 'VIVI OPTIK', 'SBU', 'Jl.'),
(20, 'TOYOTA ASTRA FINANCE MERR', 'SBU', 'Jl.'),
(21, 'OPTINDO', 'SBU', 'Jl.'),
(22, 'NIAGA CARD/SEMUT/COLL/RECV', 'SBU', 'Jl.'),
(23, 'KANWIL X DJKN SB', 'SBU', 'Jl.'),
(24, 'PEGADAIAN KANWIL DINOYO', 'SBU', 'Jl.'),
(25, 'BALAI TEKNIK KESEHATAN', 'SBU', 'Jl.'),
(26, 'STARS INTERNASIONAL', 'SBU', 'Jl.'),
(27, 'DISPENDA JIMERTO', 'SBU', 'Jl.'),
(28, 'WOM FINANCE', 'SBU', 'Jl.'),
(29, 'KANWIL VII BEA CUKAI/SLPK', 'SBU', 'Jl.'),
(30, 'BEA CUKAI/SLPK', 'SBU', 'Jl.'),
(31, 'KPKNL2 SB2/SLPK', 'SBU', 'Jl.'),
(32, 'KPP GENTENG/SLPK', 'SBU', 'Jl.'),
(33, 'WONOKOYO FARID', 'SBU', 'Jl.'),
(34, 'KANWIL XV DJPBN/SLPK', 'SBU', 'Jl.'),
(35, 'SUCOFINDO LAB', 'SBU', 'Jl.'),
(36, 'BNI GRAHA PANGERAN', 'SBU', 'Jl.'),
(37, 'JEMBATAN MAS BUANA', 'SBU', 'Jl.'),
(38, ' UNIVERSITAS WIDYA MANDALA ', 'SBU', 'Jl.'),
(39, ' INTI SUMBER PUSAT KANWIL ', 'SBU', 'Jl.'),
(40, ' PT PELINDO III ', 'SBU', 'Jl.'),
(41, ' OTO MULTIARTHA GENTENG ', 'SBU', 'Jl.'),
(42, ' SOF M SUNGKONO ', 'SBU', 'Jl.'),
(43, ' PHC ', 'SBU', 'Jl.'),
(44, ' PELINDO PERAK ', 'SBU', 'Jl.'),
(45, ' PUPUK KALTIM ', 'SBU', 'Jl.'),
(46, ' PT PERTANI (PERSERO) ', 'SBU', 'Jl.'),
(47, ' MANDIRI IRBA ', 'SBU', 'Jl.'),
(48, ' PT GARAM ', 'SBU', 'Jl.'),
(49, ' INTI PRESISI MEDIA ', 'SBU', 'Jl.'),
(50, ' MITSUI LEASING ', 'SBU', 'Jl.'),
(51, ' PENGADILAN TINGGI ', 'SBU', 'Jl.'),
(52, ' PELINDO DAYA SEJAHTERA ', 'SBU', 'Jl.'),
(53, ' PT MITRA SETIA BUDI ', 'SBU', 'Jl.'),
(54, ' PT SUMBER CIPTA ', 'SBU', 'Jl.'),
(55, ' KEMENKUMHAM ', 'SBU', 'Jl.'),
(56, ' ACCESSORIS ONLINE ', 'SBU', 'Jl.'),
(57, ' BJB DARMO ', 'SBU', 'Jl.'),
(58, ' BRI RAJAWALI ', 'SBU', 'Jl.'),
(59, ' BRI KANWIL ', 'SBU', 'Jl.'),
(60, ' TIK BMN ', 'SBU', 'Jl.'),
(61, ' PT WINGS SURYA ', 'SBU', 'Jl.'),
(62, ' BRI DIPONEGORO ', 'SBU', 'Jl.'),
(63, ' BTN PEMUDA ', 'SBU', 'Jl.'),
(64, ' CIGNA ', 'SBU', 'Jl.'),
(65, 'Mpm Sedati', 'SBU', 'Jl.'),
(66, 'Mpm simpang dukuh', 'SBU', 'Jl.'),
(67, 'KPPN SB 1', 'SBU', 'Jl.'),
(68, 'FIF TANDES', 'SBU', 'Jl.'),
(69, 'BNI kcu sb GUBSUR', 'SBU', 'Jl.'),
(70, 'BNI USM', 'SBU', 'Jl.'),
(71, 'OTTO HR MUHAMMAD', 'SBU', 'Jl.'),
(72, 'JAYABAYA', 'SBU', 'Jl.'),
(73, 'PENJEBAR SEMANGAT', 'SBU', 'Jl.'),
(74, 'BANK JATIM', 'SBU', 'Jl.'),
(75, 'BPJS KANWIL', 'SBU', 'Jl.'),
(76, 'BNI PERAK', 'SBU', 'Jl.'),
(77, 'PT HARUMALAM  (WINGS SURYA)', 'SBU', 'Jl.'),
(78, 'KPPN SB 2', 'SBU', 'Jl.'),
(79, 'BAITUL MALL HIDAYATULLAH', 'SBU', 'Jl.'),
(80, 'MERATUS GROUP', 'SBU', 'Jl.'),
(81, 'PLN', 'SBU', 'Jl.'),
(82, 'TOYOTA ASTRA DARMO', 'SBU', 'Jl.'),
(83, 'MOMENTHUM', 'SBU', 'Jl.'),
(84, 'BRI KALIASIN ', 'SBU', 'Jl.'),
(85, 'BRI HR MUHAMMAD', 'SBU', 'Jl.'),
(86, 'BRI KUSUMA BANGSA', 'SBU', 'Jl.'),
(87, 'BRI KERTAJAYA', 'SBU', 'Jl.'),
(88, 'LAB SUCOFINDO', 'SBU', 'Jl.'),
(89, 'BPJS DHARMAHUSADA', 'SBU', 'Jl.'),
(90, 'BUANA FINANCE', 'SBU', 'Jl.'),
(91, 'PT SABA INDOMEDIKA', 'SBU', 'Jl.'),
(92, 'TELKOMSEL LT 5', 'SBU', 'Jl.'),
(93, 'OTORITAS JASA KEUANGAN (OJK)', 'SBU', 'Jl.'),
(94, 'KIANWIL BEA CUKAI PABEAN ', 'SBU', 'Jl.'),
(95, 'PT DIAN LESTARI PERDANA (WINGS SURYA)', 'SBU', 'Jl.'),
(96, 'GAWIH JAYA', 'SBU', 'Jl.'),
(97, 'MITRA UTAMA GAPURA', 'SBU', 'Jl.'),
(98, 'SETDA JATIM', 'SBU', 'Jl.'),
(99, 'GRAMEDIA', 'SBU', 'Jl.'),
(100, 'MIF', 'SBU', 'Jl.'),
(101, 'MBLOG', 'SBU', 'Jl.'),
(102, 'PUSKUD JATIM', 'SBU', 'Jl.'),
(103, 'KARYA INDAH ALAM SEJAHTERA (WINGS SURYA)', 'SBU', 'Jl.'),
(104, 'PT KARUNIA ALAM SEGAR (WINGS SURYA)', 'SBU', 'Jl.'),
(105, 'YAMAHA BASUKI RAHMAT', 'SBU', 'Jl.'),
(106, 'RODA SAKTI MEGAH', 'SBU', 'Jl.'),
(107, 'YAMAHA PANGSUD', 'SBU', 'Jl.'),
(108, 'PRIMA SUKSES', 'SBU', 'Jl.'),
(109, 'CLIPAN II', 'SBU', 'Jl.'),
(110, 'SATLANTAS POLDA JATIM', 'SBU', 'Jl.'),
(111, 'MITRA ALAM SEGAR', 'SBU', 'Jl.'),
(112, 'IHS GLOBAL (CP LT 2)', 'SBU', 'Jl.'),
(113, 'KARYA INDAH ALAM SEGAR (WINGS SURYA)', 'SBU', 'Jl.'),
(114, 'ADYABUANA', 'SBU', 'Jl.'),
(115, 'BPIB', 'SBU', 'Jl.'),
(116, 'PRIMA EXPRESS', 'SBU', 'Jl.'),
(117, 'BNI SKC', 'SBU', 'Jl.'),
(118, 'his kanwil (pusat/cust)', 'SBU', 'Jl.'),
(119, 'IHS CABANG', 'SBU', 'Jl.'),
(120, 'KPBN ', 'SBU', 'Jl.'),
(121, 'PTPN XII', 'SBU', 'Jl.'),
(122, 'BPJS PERAK TAG PIUTANG', 'SBU', 'Jl.'),
(123, 'PLN JETB II', 'SBU', 'Jl.'),
(124, 'MITRA DARMA LAKSANA', 'SBU', 'Jl.'),
(125, 'PLN TRANSMISI', 'SBU', 'Jl.'),
(126, 'BOGASARI BBC', 'SBU', 'Jl.'),
(127, 'BOGASARI SSM', 'SBU', 'Jl.'),
(128, 'TASPEN', 'SBU', 'Jl.'),
(129, 'MANDIRA DIAN SEMESTA', 'SBU', 'Jl.'),
(130, 'WONOKOYO', 'SBU', 'Jl.'),
(131, 'PERTAMINA', 'SBU', 'Jl.'),
(132, 'KARUNIA INDAH SEGAR', 'SBU', 'Jl.'),
(133, 'KARUNIA INDAH ABADI ( WINGS SURYA )', 'SBU', 'Jl.'),
(134, 'SALIM INFOMAS', 'SBU', 'Jl.'),
(135, 'KREDIT PLUS', 'SBU', 'Jl.'),
(136, 'BRINGIN LIFE POLIS IBS', 'SBU', 'Jl.'),
(137, 'KMB SURABAYA', 'SBU', 'Jl.'),
(138, 'BRINGIN LIFE POLIS SYARIAH', 'SBU', 'Jl.'),
(139, 'PLN TRANSMISI UPT', 'SBU', 'Jl.'),
(140, 'PENGADILAN NEGERI PIDANA ', 'SBU', 'Jl.'),
(141, 'PENGADILAN NEGERI PIDANA PHI', 'SBU', 'Jl.'),
(142, 'PENGADILAN NEGERI PIDANA UMUM', 'SBU', 'Jl.'),
(143, 'BANK JATIM CAB UNTAG', 'SBU', 'Jl.'),
(144, 'KENCANA BAJA TRADA', 'SBU', 'Jl.'),
(145, ' PT EKATAMA MAKMUR (WINGS SURYA) ', 'SBU', 'Jl.'),
(146, ' PT SURYA PERMATA ALAM MAKMUR (WINGS SURYA) ', 'SBU', 'Jl.'),
(147, 'UPN', 'SBU', 'Jl.'),
(148, 'ITS', 'SBU', 'Jl.'),
(149, 'YAYASAN AL MADINA', 'SBU', 'Jl.'),
(150, ' PT PERURI ', 'SBU', 'Jl.'),
(151, 'BPJS KETENAGAKERJAAN JUANDA', 'SBU', 'Jl.'),
(152, 'BI', 'SBU', 'Jl.'),
(153, 'PT MASPION', 'SBU', 'Jl.'),
(154, 'BNI JMP', 'SBU', 'Jl.'),
(155, 'ITTS TELKOM', 'SBU', 'Jl.'),
(156, 'PT BANK MANDIRI TP', 'SBU', 'Jl.'),
(157, 'JAMKRINDO', 'SBU', 'Jl.'),
(158, 'BPJS DHARMAHUSADA KIS', 'SBU', 'Jl.'),
(159, 'KONI', 'SBU', 'Jl.'),
(160, 'UNUSA', 'SBU', 'Jl.'),
(161, ' ADIRA ', 'SBU', 'Jl.'),
(162, ' WOM FINANCE ', 'SBU', 'Jl.'),
(163, ' BCA FINANCE COLL ', 'SBU', 'Jl.'),
(164, ' BCA FINANCE OPRATIONAL ', 'SBU', 'Jl.'),
(165, ' BCA FINANCE VETERAN COLL ', 'SBU', 'Jl.'),
(166, ' MEGA FINANCE ', 'SBU', 'Jl.'),
(167, ' SITRUZ ', 'SBU', 'Jl.'),
(168, ' MPM FINANCE ', 'SBU', 'Jl.'),
(169, ' MPM FINANCE BUKITMAS ', 'SBU', 'Jl.'),
(170, ' SM LOGISTICS ', 'SBU', 'Jl.'),
(171, ' BCA FINANCE VETERAN (OPS) ', 'SBU', 'Jl.'),
(172, ' SAMSAT ', 'SBU', 'Jl.'),
(173, ' KORLANTAS ', 'SBU', 'Jl.'),
(174, ' DINKES SAMPEL DARAH ', 'SBU', 'Jl.'),
(175, 'AIA BCA', 'SBS', 'Jl.'),
(176, 'AIA CIMB NIAGA', 'SBS', 'Jl.'),
(177, 'ADIRA BPKB', 'SBS', 'Jl.'),
(178, 'BTN HR MUH', 'SBS', 'Jl.'),
(179, 'KPP MULYOREJO', 'SBS', 'Jl.'),
(180, 'BNI LT 2', 'SBS', 'Jl.'),
(181, 'PT PN XI', 'SBS', 'Jl.'),
(182, 'ASSARENT', 'SBS', 'Jl.'),
(183, 'DINKES JATIM', 'SBS', 'Jl.'),
(184, 'UBAYA TENGGILIS', 'SBS', 'Jl.'),
(185, 'SIGMA', 'SBS', 'Jl.'),
(186, 'HM SAMPURNA', 'SBS', 'Jl.'),
(187, 'WAFA', 'SBS', 'Jl.'),
(188, 'PERTAMINA', 'SBS', 'Jl.'),
(189, 'HM SAMPURNA', 'SBS', 'Jl.'),
(190, 'BNI LT 2', 'SBS', 'Jl.'),
(191, 'FIF', 'SBS', 'Jl.'),
(192, 'BNI LT 4', 'SBS', 'Jl.'),
(193, 'BNI LT 3', 'SBS', 'Jl.'),
(194, 'BNI', 'SBS', 'Jl.'),
(195, 'RSI JEMURSARI', 'SBS', 'Jl.'),
(196, 'KPP WONOCOLO', 'SBS', 'Jl.'),
(197, 'BPJS', 'SBS', 'Jl.'),
(198, 'KPP MADYA', 'SBS', 'Jl.'),
(199, 'BNI LT 2', 'SBS', 'Jl.'),
(200, 'NSC SBY', 'SBS', 'Jl.'),
(201, 'ASSARENT', 'SBS', 'Jl.'),
(202, 'KPP KARANG PILANG', 'SBS', 'Jl.'),
(203, 'TRAC', 'SBS', 'Jl.'),
(204, 'KPP KARANG PILANG', 'SBS', 'Jl.'),
(205, 'BNI GRHA PANGERAN', 'SBS', 'Jl.'),
(206, 'ADIRA BPKB', 'SBS', 'Jl.'),
(207, 'BNI LT 2', 'SBS', 'Jl.'),
(208, 'BNI LT 2', 'SBS', 'Jl.'),
(209, 'BNI LT 2', 'SBS', 'Jl.'),
(210, 'PANIN', 'SBS', 'Jl.'),
(211, 'FAST PRIN', 'SBS', 'Jl.'),
(212, 'NPM', 'SBS', 'Jl.'),
(213, 'PANIN COKLAT', 'SBS', 'Jl.'),
(214, 'MTF BPKB', 'SBS', 'Jl.'),
(215, 'DJP 6', 'SBS', 'Jl.'),
(216, 'KPP MADYA', 'SBS', 'Jl.'),
(217, 'KPP WONOCOLO', 'SBS', 'Jl.'),
(218, 'PTPN', 'SBS', 'Jl.'),
(219, 'DJP JATIM', 'SBS', 'Jl.'),
(220, 'SINERGY', 'SBS', 'Jl.'),
(221, 'MTF FINANCE', 'SBS', 'Jl.'),
(222, 'TRAC', 'SBS', 'Jl.'),
(223, 'MTF REG', 'SBS', 'Jl.'),
(224, 'ALAM DIAN RAYA', 'SBS', 'Jl.'),
(225, 'BJ WULAN', 'SBS', 'Jl.'),
(226, 'CMN GALERY', 'SBS', 'Jl.'),
(227, 'PJB', 'SBS', 'Jl.'),
(228, 'PUSMANPRO', 'SBS', 'Jl.'),
(229, 'BNI LT 9', 'SBS', 'Jl.'),
(230, 'JAWA POS', 'SBS', 'Jl.'),
(231, 'JAWA POS IKLAN', 'SBS', 'Jl.'),
(232, 'BERKAT KESELAMATAN', 'SBS', 'Jl.'),
(233, 'SAMAFITRO', 'SBS', 'Jl.'),
(234, 'MOMENT', 'SBS', 'Jl.'),
(235, 'HM SAMPURNA', 'SBS', 'Jl.'),
(236, 'HM SAMPURNA', 'SBS', 'Jl.'),
(237, 'BPS', 'SBS', 'Jl.'),
(238, 'PERTAMINA', 'SBS', 'Jl.'),
(239, 'BNI LT 2', 'SBS', 'Jl.'),
(240, 'DINKES BU EMA', 'SBS', 'Jl.'),
(241, 'KANWIL DJP JATIM', 'SDA', 'Jl.'),
(242, 'KPP MADYA SIDOARJO', 'SDA', 'Jl.'),
(243, 'KPP PRATAMA SIDOARJO BARAT', 'SDA', 'Jl.'),
(244, 'KPP SIDOARJO SELATAN', 'SDA', 'Jl.'),
(245, 'KPP BC TIPE MADYA PABEAN JUANDA', 'SDA', 'Jl.'),
(246, 'KPP BC TIPE MADYA PABEAN SIDOARJO', 'SDA', 'Jl.'),
(247, 'DAS BRANTAS', 'SDA', 'Jl.'),
(248, 'KPKNL SIDOARJO', 'SDA', 'Jl.'),
(249, 'KPPN SIDOARJO', 'SDA', 'Jl.'),
(250, 'PENGADILAN MILITER (UMUM)', 'SDA', 'Jl.'),
(251, 'PENGADILAN MILITER (PERKARA)', 'SDA', 'Jl.'),
(252, 'PENGADILAN TIPIKOR', 'SDA', 'Jl.'),
(253, 'DINAS PENDAPATAN', 'SDA', 'Jl.'),
(254, 'BADAN PERTANAHAN NASIONAL SIDOARJO', 'SDA', 'Jl.'),
(255, 'DINAS KEHUTANAN', 'SDA', 'Jl.'),
(256, 'BALAI KONSERVASI SUMBER DAYA ALAM', 'SDA', 'Jl.'),
(257, 'BPPHLHK WIL JAWA BALI NUSA TENGGARA', 'SDA', 'Jl.'),
(258, 'DINAS KESEHATAN SIDOARJO', 'SDA', 'Jl.'),
(259, 'BPJS KESEHATAN SIDOARJO', 'SDA', 'Jl.'),
(260, 'BANK BTN CABANG SIDOARJO', 'SDA', 'Jl.'),
(261, 'PT BANK NEGARA INDONESIA (PERSERO)', 'SDA', 'Jl.'),
(262, 'JAMKRINDO', 'SDA', 'Jl.'),
(263, 'BANK JATIM', 'SDA', 'Jl.'),
(264, 'PT OTO MULTIARTA FINANCE', 'SDA', 'Jl.'),
(265, 'PT WOM FINANCE GATEWAY WARU', 'SDA', 'Jl.'),
(266, 'PT. MITRA KARYA PRIMA (SURAT PAKET)', 'SDA', 'Jl.'),
(267, 'CV. STACCATO', 'SDA', 'Jl.'),
(268, 'PT HISAMITSU PHARMA INDONESIA', 'SDA', 'Jl.'),
(269, 'PT JAPFA COMFEED', 'SDA', 'Jl.'),
(270, 'PT BISI INTERNATIONAL, TBk', 'SDA', 'Jl.'),
(271, 'YANA VALENTINA', 'SDA', 'Jl.'),
(272, 'NICE OPTIK', 'SDA', 'Jl.'),
(273, 'KAOS KAOS.COM', 'SDA', 'Jl.'),
(274, 'DINAS PETERNAKAN PAPUA (LOGISTIK)', 'SDA', 'Jl.'),
(275, 'GRAHA KSATRIA ENVIROTAMA (LOGISTIK)', 'SDA', 'Jl.'),
(276, 'PT. MITRA KARYA PRIMA (LOGISTIK)', 'SDA', 'Jl.');

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
(16, 'Raden Muhammad Syamsul Arifin', 15, 891274, 3, 'Dalam Negri', 5, 0, 0, 10, 0, 90, 0, 5, 6, 0, 5, 10, 5, 10, 90, 5, 6, 15, 21, 110, '2022-01-03', 131, 330701018, '16:06:47'),
(17, 'fajar', 146, 891274, 3, 'Dalam Negri', 0, 0, 0, 0, 0, 0, 0, 5, 0, 0, 0, 10, 0, 0, 0, 5, 0, 10, 10, 5, '2021-12-07', 15, 321, '16:45:06'),
(18, 'fajar', 275, 891274, 1, 'Dalam Negri', 0, 0, 0, 0, 0, 28, 78, 0, 5, 0, 29, 0, 0, 0, 28, 78, 5, 29, 83, 57, '2022-01-03', 140, 321, '15:12:58'),
(19, 'alif', 15, 891274, 4, 'Dalam Negri', 0, 10, 0, 0, 5, 0, 0, 0, 0, 7, 0, 9, 10, 0, 5, 0, 7, 9, 14, 17, '2021-12-29', 31, 1206, '14:41:39'),
(20, 'fajar', 18, 4213, 5, 'Dalam Negri', 30, 0, 0, 40, 0, 0, 0, 0, 0, 0, 52, 0, 30, 40, 0, 0, 0, 52, 30, 92, '2022-01-03', 122, 321, '15:58:50'),
(21, 'fajar', 11, 321, 1, 'Dalam Negri', 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50, 0, 10, 0, 0, 0, 0, 50, 10, 50, '2022-01-29', 60, 321, '10:02:43'),
(22, 'Zainul Chakim', 193, 89321, 1, 'Dalam Negri', 10, 40, 20, 30, 80, 100, 35, 35, 25, 15, 0, 0, 50, 50, 180, 70, 40, 0, 170, 220, '2022-01-29', 390, 969364295, '10:22:39'),
(23, 'fajar', 15, 891274, 1, 'Dalam Negri', 0, 0, 10, 0, 0, 20, 0, 0, 0, 50, 0, 0, 0, 10, 20, 0, 50, 0, 10, 70, '0000-00-00', 80, 321, '11:57:35');

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
(2, 'Raden Muhammad Syamsul Arifin', 247, 4213, 3, 'Luar Negri', '2022-01-03', 5, 50, 55, 5, 5, 10, 5, 5, 10, 5, 0, 5, 0, 5, 5, 0, 0, 0, 5, 100, 105, 25, 165, 190, 330701018, '15:48:56'),
(3, 'fajar', 146, 891274, 5, 'Luar Negri', '2021-12-07', 0, 0, 0, 0, 10, 10, 0, 0, 0, 6, 0, 6, 8, 0, 8, 0, 0, 0, 0, 5, 5, 14, 15, 29, 321, '14:45:40'),
(4, 'fajar', 247, 891274, 4, 'Luar Negri', '2021-12-30', 19, 0, 19, 0, 0, 0, 0, 98, 98, 0, 0, 0, 50, 0, 50, 0, 0, 0, 0, 100, 100, 69, 198, 267, 321, '20:21:13');

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
(1, 'Pak Purnama', '970314747', '-', 'Manager Prostrans', '$2y$10$4yp5fhyxnHtpiWupqPfPEeMhvLTs3JdRQfxic/ildbMaalaPGfG8q', 1640864784, 0, 1, '-'),
(2, 'Pak Teguh Triyoko', '968288650', '-', 'Mandor', '$2y$10$1xnp5mh.IsXehEnA.JjMSe5sB2R/zKpfWHiA8GOt3PPwpKgDyON2K', 1640864785, 0, 1, '-'),
(3, 'Zainul Chakim', '969364295', '-', 'Petugas Pickup', '$2y$10$OSE/P3lD2rh4EW3qHJOC7eXTa37vLyDzehfnV8eNAlGmgK8yqGOeC', 1640864786, 0, 1, '0'),
(4, 'Abdul Rachman Sholeh', '983412674', '-', 'Petugas Pickup', '$2y$10$E7iiBzJNZidzj7q3aiBN9.zgu2wOMVbJE8jUn4ELbD0wHRSSKdEl.', 1640864787, 0, 1, '0'),
(5, 'Yuri Putra R', '330791042', '-', 'Petugas Pickup', '$2y$10$laZEKKVWovHwh66VCOgKBO/xpCjpAk7iCJ3NWrZip0RGGx7KH5M5G', 1640864788, 0, 1, '0'),
(6, 'Achmad Alberto', '330794062', '-', 'Petugas Pickup', '$2y$10$Sv2HITUKW2RiOIEdstTtYOLPnUYFxI5q.ewnUI/uASA6j6YaNLxMy', 1640864789, 0, 1, '0'),
(7, 'Firman Maulana Firdaus', '330701007', '-', 'Petugas Pickup', '$2y$10$5dCd3qL4uSs.y8vE2IWxv.gSeKH.bry6hpoEG1hsoxB03Z9ojID2S', 1640864790, 0, 1, '0'),
(8, 'Moch. Sofyan', '330701008', '-', 'Petugas Pickup', '$2y$10$scrFGSqrDIlZHYR.JFEnV.I500HdwiwEy.rn87g.qORq2/nqrGlHa', 1640864791, 0, 1, '0'),
(9, 'Alfian Rahmaddin Bisri', '993463873', '-', 'Petugas Pickup', '$2y$10$UsaRwZcE0tIWkCn/VzVPCOHng65JVL3E4gOx51CpCR37kb43PHdWC', 1640864792, 0, 1, '0'),
(10, 'Rachmat Andrian', '330797042', '-', 'Petugas Pickup', '$2y$10$IvPheD0bvMC3gfc2TqO8EuWFCy7zCKHkgSyBjLRnjg//Y5AKL2Uem', 1640864793, 0, 1, '0'),
(11, 'Mas Ribut B', '983464121', '-', 'Petugas Pickup', '$2y$10$5iDK11rdP.xAAv76IiDdReIRSDgaMhUXy/7CEtPgpxdzMSzemzZn6', 1640864794, 0, 1, '0'),
(12, 'Aziz Ghazali W.P', '330796044', '-', 'Petugas Pickup', '$2y$10$r2.qzeti0W7sexTeV1d4vuh5pGI161StSxVXn7OP9lzDZrEd3m0oe', 1640864795, 0, 1, '0'),
(13, 'Raden Muhammad Syamsul Arifin', '330701018', '-', 'Petugas Pickup', '$2y$10$S7VSfugzARPfJtWCketKP.GcOalxkW5vc9c5IPMbQKwG0k4p.nIrq', 1640864796, 0, 1, '0'),
(14, 'Nizar Salahudin', '330794072', '-', 'Petugas Pickup', '$2y$10$h/frz958D3LmkFgGOZ8YgOyvtddYGXNJLJ0fzTKvJfPqf/qjQK93a', 1640864797, 0, 1, '0'),
(15, 'Sany Irwansyah', '330795089', '-', 'Petugas Pickup', '$2y$10$fh7nnYolmjdGeRS2pO3jTeeqCxgs4Y1WnocMlofe2N1BLVFKzeNrG', 1640864798, 0, 1, '0'),
(16, 'Afif Akhsanullah', '330796055', '-', 'Petugas Pickup', '$2y$10$uVeFvitoOjCU.0QdcP2QWuTx57wwjBI2FTUCS.9xcI4HzLkmdFJDq', 1640864799, 0, 1, '0'),
(17, 'Iqbal Farisi', '330794071', '-', 'Petugas Pickup', '$2y$10$KGT4DTGBh7QxNBRmW17pCulJ6ZfD8TzG2MthnyB9JSCNCJvOMoYxW', 1640864800, 0, 1, '0'),
(51, 'Adminisitrator', '123', '025123456789', 'Manager Prostrans', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, 0, 1, '0'),
(101, 'Adminisitrator', '123', '025123456789', 'Manager Prostrans', '$2y$10$wMgi9s3FEDEPEU6dEmbp8eAAEBUXIXUy3np3ND2Oih.MOY.q/Kpoy', 1568689561, 0, 1, '0'),
(102, 'Fajar', '4321', '084724', 'Mandor', '$2y$10$.w6TqpyvDlucfaAiWMnIQuNKJp4ZYv/qRRNIcLsXhZh65KIL/AZeW', 1637649480, 1, 1, '1'),
(103, 'fajar', '321', '4321', 'Petugas Pickup', '$2y$10$QFUNiysZd.6KqHjQH8hJCeTpMlFBL9AZKzLVeTRwWcFKRT6NkiNUG', 1637653749, 17, 1, '5'),
(104, 'nadif', '0321', '085851111140', 'Manager Prostrans', '$2y$10$7wOzhMXLDiCaVTTybhfLkOKNfM.v1RVIPtJSoRQMQsHKkJ6mIMA5q', 1637654113, 3, 1, '0321'),
(105, 'Nugroho', '890', '085851111140', 'Petugas Pickup', '$2y$10$3cY2k9u274BoREXAfJVJNOLR9y0jiIlBkBa1e9huWcvrRDVRwyzrW', 1637656511, 1, 1, '30'),
(107, 'alif', '1206', '09842', 'Petugas Pickup', '$2y$10$H848RUyNWcpesy/f5C9ZI.U1zF4J29nSpruQTUrSY13CRtfbaJDrK', 1640763592, 1, 1, '30'),
(1001, 'imanuel', '9123', '081274', 'Super user', '$2y$10$VvI0CHiONB3mhab5SK.gVOoQhUUH1qj59YbXJJJxjSfpF5rEn.ZIe', 1640857068, 4, 1, '9123'),
(1002, 'nama', 'nippos', 'no_telp', '', 'password', 0, 0, 0, 'id_petugas');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mandor_koreksi`
--
ALTER TABLE `mandor_koreksi`
  MODIFY `id_koreksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mandor_koreksiln`
--
ALTER TABLE `mandor_koreksiln`
  MODIFY `id_koreksiln` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `pu_dn`
--
ALTER TABLE `pu_dn`
  MODIFY `id_pu_dn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pu_ln`
--
ALTER TABLE `pu_ln`
  MODIFY `id_pu_ln` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
