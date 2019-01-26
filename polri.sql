-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 25, 2019 at 09:43 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polri`
--

-- --------------------------------------------------------

--
-- Table structure for table `polda`
--

CREATE TABLE `polda` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `wilayah_hukum` varchar(100) NOT NULL,
  `tipe_polda` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polda`
--

INSERT INTO `polda` (`id`, `nama`, `wilayah_hukum`, `tipe_polda`) VALUES
(1, 'Polda Aceh', 'Aceh', 'A'),
(2, 'Polda Sumatera Utara', 'Sumatera Utara', 'A'),
(38, 'Polda Sumatera Barat', 'Sumatera Barat', 'A'),
(39, 'Polda Jambi', 'Jambi', 'A'),
(40, 'Polda Riau', 'Riau', 'A'),
(41, 'Polda Kepri', 'Kepri', 'A'),
(42, 'Polda Babel', 'Babel', 'A'),
(43, 'Polda Sumatera Selatan', 'Sumatera Selatan', 'A'),
(44, 'Polda Bengkulu', 'Bengkulu', 'A'),
(45, 'Polda Lampung', 'Lampung', 'A'),
(46, 'Polda Metro Jaya', 'Jakarta', 'A'),
(47, 'Polda Jawa Barat', 'Jawa Barat', 'A'),
(48, 'Polda Banten', 'Banten', 'A'),
(49, 'Polda Jawa Tengah', 'Jawa Tengah', 'A'),
(50, 'Polda Daerah Istimewa Yogyakarta', 'Yogyakarta', 'A'),
(51, 'Polda Jawa Timur', 'Jawa Timur', 'A'),
(52, 'Polda Bali', 'Bali', 'A'),
(53, 'Polda Nusa Tenggara Barat', 'NTB', 'A'),
(54, 'Polda Nusa Tenggara Timur', 'NTT', 'A'),
(55, 'Polda Kalimantan Barat', 'Kalimantan Barat', 'A'),
(56, 'Polda Kalimantan Timur', 'Kalimantan Timur', 'A'),
(57, 'Polda Kalimantan Utara', 'Kalimantan Utara', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `polres`
--

CREATE TABLE `polres` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `wilayah_hukum` varchar(50) NOT NULL,
  `tipe_polres` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polres`
--

INSERT INTO `polres` (`id`, `nama`, `wilayah_hukum`, `tipe_polres`) VALUES
(1, 'Polres Jakpus', 'Jakpus', 'A'),
(2, 'Polres Jakut', 'Jakut', 'A'),
(6, 'Polres Jakbar', 'Jakbar', 'A'),
(7, 'Polres Jaksel', 'Jaksel', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `polsek`
--

CREATE TABLE `polsek` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `wilayah_hukum` varchar(50) NOT NULL,
  `tipe_polsek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polsek`
--

INSERT INTO `polsek` (`id`, `nama`, `wilayah_hukum`, `tipe_polsek`) VALUES
(1, 'Polsek Cempaka Putih', 'Cempaka Putih', 'A'),
(3, 'Polsek Johar Baru', 'Johar Baru', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(10) NOT NULL,
  `id_program` varchar(10) NOT NULL,
  `kode_kegiatan` int(10) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `amount_kegiatan` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `id_program`, `kode_kegiatan`, `nama_kegiatan`, `amount_kegiatan`, `created`, `modified`) VALUES
(22, '4', 3068, 'Pelayanan Administrasi Keuaganan Polri', '50000000', '2019-01-24 15:08:29', NULL),
(23, '4', 3080, 'Penerangan Masyarakat', '20000000', '2019-01-24 15:08:47', NULL),
(24, '4', 3071, 'Penyelenggaraan Teknologi Informasi', '40000000', '2019-01-24 15:09:08', NULL),
(25, '4', 3072, 'Pelayanan Kesehatan Polri', '45000000', '2019-01-24 15:09:25', NULL),
(26, '4', 3073, 'Dukungan Pelayanan Internal Perkantoran Polri', '15000000', '2019-01-24 15:09:44', NULL),
(27, '4', 5051, 'Penyusunan Kebijakan Polri', '60000000', '2019-01-24 15:10:10', '2019-01-24 15:10:23'),
(28, '4', 5052, 'Penataan Kelembagaan dan Ketatalaksanaan Polri', '45000000', '2019-01-24 15:10:38', NULL),
(29, '4', 5053, 'Reformasi Birokrasi Polri', '20000000', '2019-01-24 15:10:54', NULL),
(30, '4', 5053, 'Manajemen Anggaran', '70000000', '2019-01-24 15:11:18', NULL),
(31, '4', 5055, 'Teknologi Komunikasi', '100000000', '2019-01-24 15:11:42', '2019-01-24 15:11:48'),
(32, '4', 5056, 'Pengelola Informasi dan Dokumentasi', '60000000', '2019-01-24 15:13:00', NULL),
(33, '4', 5057, 'Penyelenggaraan Kesejarahan, Museum dan Perpustakaan Polri', '46000000', '2019-01-24 15:13:16', NULL),
(34, '5', 1717, 'Untuk testt', '2000000', '2019-01-24 15:42:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan_polres`
--

CREATE TABLE `tbl_kegiatan_polres` (
  `id_pelaksanaan` int(10) NOT NULL,
  `id_program` int(10) NOT NULL,
  `id_kegiatan` int(10) NOT NULL,
  `id_output` int(10) NOT NULL,
  `no_kontrak` varchar(50) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `amount_pelaksanaan` int(50) NOT NULL,
  `bukti_transaksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kegiatan_polres`
--

INSERT INTO `tbl_kegiatan_polres` (`id_pelaksanaan`, `id_program`, `id_kegiatan`, `id_output`, `no_kontrak`, `uraian`, `amount_pelaksanaan`, `bukti_transaksi`) VALUES
(53, 5, 26, 16, '1829', 'Beli Alat Rongsen ', 20000000, 'mini.jpg'),
(54, 5, 23, 17, '213', 'Beli Lampu 200 Pasang', 8000000, 'POLRI.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_output`
--

CREATE TABLE `tbl_output` (
  `id_output` int(10) NOT NULL,
  `id_kegiatan` int(10) NOT NULL,
  `kode_output` varchar(50) NOT NULL,
  `nama_output` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_output`
--

INSERT INTO `tbl_output` (`id_output`, `id_kegiatan`, `kode_output`, `nama_output`) VALUES
(16, 25, '9090', 'Pengadaan Alat Kesehatan'),
(17, 23, '1702', 'Pembelian Lampu Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_program`
--

CREATE TABLE `tbl_program` (
  `id_program` int(10) NOT NULL,
  `kode_program` varchar(50) NOT NULL,
  `program` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_program`
--

INSERT INTO `tbl_program` (`id_program`, `kode_program`, `program`) VALUES
(4, '01', 'Program Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya Polri'),
(5, '02', 'Testtt');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_user` enum('pusat','polda','polres','polsek') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `jenis_user`) VALUES
(1, 'fadelfebriann@gmail.com', 'qwerty123', 'pusat'),
(3, 'testpolda@gmail.com', 'qwerty123', 'polda'),
(4, 'testpolres@gmail.com', 'qwerty123', 'polres'),
(5, 'testpolsek@gmail.com', 'qwerty123', 'polsek'),
(6, 'testpusat@gmail.com', 'qwerty123', 'pusat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `polda`
--
ALTER TABLE `polda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polres`
--
ALTER TABLE `polres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polsek`
--
ALTER TABLE `polsek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_kegiatan_polres`
--
ALTER TABLE `tbl_kegiatan_polres`
  ADD PRIMARY KEY (`id_pelaksanaan`);

--
-- Indexes for table `tbl_output`
--
ALTER TABLE `tbl_output`
  ADD PRIMARY KEY (`id_output`);

--
-- Indexes for table `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `polda`
--
ALTER TABLE `polda`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `polres`
--
ALTER TABLE `polres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `polsek`
--
ALTER TABLE `polsek`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_kegiatan_polres`
--
ALTER TABLE `tbl_kegiatan_polres`
  MODIFY `id_pelaksanaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tbl_output`
--
ALTER TABLE `tbl_output`
  MODIFY `id_output` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id_program` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
