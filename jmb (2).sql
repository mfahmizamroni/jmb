-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2017 at 05:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku_besar`
--

CREATE TABLE `buku_besar` (
  `id` int(11) NOT NULL,
  `no_tagihan` varchar(100) NOT NULL,
  `klien` varchar(100) NOT NULL,
  `tipe_pembayaran` varchar(100) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `total_tagihan` int(100) NOT NULL,
  `total_qty` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar_muat`
--

CREATE TABLE `daftar_muat` (
  `id_dm` int(11) NOT NULL,
  `no_dm` varchar(100) NOT NULL,
  `sopir` varchar(100) NOT NULL,
  `truk` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `total_ongkos` int(100) NOT NULL,
  `total_qty` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_muat`
--

INSERT INTO `daftar_muat` (`id_dm`, `no_dm`, `sopir`, `truk`, `status`, `total_ongkos`, `total_qty`, `created_at`, `updated_at`) VALUES
(39, '25082017001', 'asdasd', 'W 123 AC', '', 0, 0, '2017-08-25 18:27:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(100) NOT NULL,
  `kode_faktur` varchar(10) NOT NULL,
  `no_sj` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `kembali` int(11) DEFAULT '0',
  `id_faktur_pengirim` varchar(100) NOT NULL,
  `id_faktur_penerima` varchar(100) NOT NULL,
  `id_faktur_dm` varchar(100) NOT NULL DEFAULT '0',
  `kode_sk_faktur` varchar(11) NOT NULL DEFAULT '0',
  `lunas` int(2) NOT NULL,
  `tagihan` varchar(100) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `kode_faktur`, `no_sj`, `tujuan`, `total_qty`, `potongan`, `total`, `kembali`, `id_faktur_pengirim`, `id_faktur_penerima`, `id_faktur_dm`, `kode_sk_faktur`, `lunas`, `tagihan`, `created_at`, `updated_at`) VALUES
(55, 'asdasd', 'asdasd', 'asdasd', 1111, 0, 11111, 0, 'asdasd', 'asdasd', '25082017001', 'LN', 0, 'AA01', '2017-08-26 00:20:14', '2017-08-25 19:20:14'),
(56, 'asdasdaaaa', 'asdasdasd', 'aaaaa', 1111, 0, 11111, 0, 'aaaaa', 'aaaaaa', '25082017001', 'LN', 0, '0', '2017-08-25 23:53:58', '2017-08-25 18:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `kode_faktur` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `kode_faktur`, `qty`, `jenis`, `harga`, `total`, `created_at`, `updated_at`) VALUES
(28, '1111', 11, 'asd', 111, 111, '2017-08-25 13:00:52', '0000-00-00 00:00:00'),
(29, '1111', 11, 'asdasd', 1111, 1111, '2017-08-25 13:03:32', '0000-00-00 00:00:00'),
(30, 'asdasd', 111, 'asdasd', 111, 1111, '2017-08-25 13:07:21', '0000-00-00 00:00:00'),
(31, 'asdasd', 111, 'asdasd', 111, 1111, '2017-08-25 13:07:21', '0000-00-00 00:00:00'),
(32, '111', 11, 'asdasd', 11111, 1111, '2017-08-25 13:07:42', '0000-00-00 00:00:00'),
(33, '11111', 111, 'asdasd', 1111, 111111, '2017-08-25 13:28:27', '0000-00-00 00:00:00'),
(34, 'asdasd', 111, 'asdasd', 1111, 1111, '2017-08-25 13:34:40', '0000-00-00 00:00:00'),
(35, 'asdasd', 111, 'asdasd', 1111, 1111, '2017-08-25 13:34:40', '0000-00-00 00:00:00'),
(36, 'asdasd', 111, 'qasasdasd', 1111, 1111, '2017-08-25 13:39:57', '0000-00-00 00:00:00'),
(37, 'asdasd', 111, 'asdasd', 111, 111111, '2017-08-25 13:45:27', '0000-00-00 00:00:00'),
(38, 'asdasd', 111, 'asdasd', 111, 1111, '2017-08-25 13:58:44', '0000-00-00 00:00:00'),
(39, 'asdasd', 111, 'asdsad', 11111, 1111, '2017-08-25 14:00:50', '0000-00-00 00:00:00'),
(40, 'asdasd', 111, 'asdsad', 11111, 1111, '2017-08-25 14:00:50', '0000-00-00 00:00:00'),
(41, 'asdasd', 1111, 'adasd', 1111, 11111, '2017-08-25 14:05:21', '0000-00-00 00:00:00'),
(42, 'asdasd', 111, 'asdasd', 11111, 11111, '2017-08-25 14:21:02', '0000-00-00 00:00:00'),
(43, 'asdasd', 111, 'asdasd', 1111, 1111, '2017-08-25 14:27:24', '0000-00-00 00:00:00'),
(44, 'asdasd', 1111, 'asdasd', 11111, 11111, '2017-08-25 14:46:18', '0000-00-00 00:00:00'),
(45, 'asdasdaaaa', 1111, 'asdsad', 1111, 11111, '2017-08-25 17:10:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `klien`
--

CREATE TABLE `klien` (
  `id_klien` int(100) NOT NULL,
  `nama_klien` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klien`
--

INSERT INTO `klien` (`id_klien`, `nama_klien`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'surya makmur', 'surabaya', '2017-06-10 09:01:00', '0000-00-00 00:00:00'),
(2, 'Maspion', 'Surabaya', '2017-06-20 17:39:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status_kirim`
--

CREATE TABLE `status_kirim` (
  `id` int(11) NOT NULL,
  `kode_sk` varchar(100) NOT NULL,
  `nama_sk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_kirim`
--

INSERT INTO `status_kirim` (`id`, `kode_sk`, `nama_sk`) VALUES
(1, 'LN', 'lancar'),
(2, 'KU', 'Kirim Ulang'),
(3, 'SBS', 'Surat Ongkos Belum Selesai'),
(4, 'S', 'Stempel'),
(5, 'RSB', 'Retur Sebagian'),
(6, 'RS', 'Retur Semua'),
(7, 'BK', 'Barang Kurang'),
(8, 'SJP', 'Salah Jurusan'),
(9, 'AJ', 'Alamat Jauh');

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `no_tagihan` varchar(100) NOT NULL,
  `id_buku_besar` int(11) NOT NULL,
  `klien` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `tanggal_tagihan` date NOT NULL,
  `total_tagihan` int(100) NOT NULL,
  `total_qty` int(100) NOT NULL,
  `kembali` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `no_tagihan`, `id_buku_besar`, `klien`, `status`, `tanggal_tagihan`, `total_tagihan`, `total_qty`, `kembali`, `created_at`, `updated_at`) VALUES
(22, 'AA01', 0, 'asdasd', '0', '2017-08-26', 11111, 0, 0, '2017-08-25 19:20:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `truk`
--

CREATE TABLE `truk` (
  `id_truk` int(100) NOT NULL,
  `nopol` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `kapasitas` varchar(100) NOT NULL,
  `ongkos` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truk`
--

INSERT INTO `truk` (`id_truk`, `nopol`, `jenis`, `kapasitas`, `ongkos`, `created_at`, `updated_at`) VALUES
(1, 'W 123 AC', 'Fuso 10', '12', 100000, '2017-06-20 23:24:04', '0000-00-00 00:00:00'),
(2, 'L 312 AB', 'Fuso 20', '12', 100000, '2017-06-20 23:24:17', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `flag` int(2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `flag`, `updated_at`, `created_at`) VALUES
(2, 'fahmi@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'Fahmi Zamroni', 1, '2017-05-23 14:32:37', '2017-04-03 07:47:22'),
(4, 'bedu@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'bedu', 2, '2017-05-06 16:04:04', '2017-04-03 07:52:53'),
(5, 'bandi@ggmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'bandi', 2, '2017-05-06 16:07:48', '2017-04-03 07:53:42'),
(8, 'baskara@gmail.com', '$2y$10$vjD.8/pXbqDJTGBs6/ycqOjA8UteJCRfZ7roBrv51IhD1XXfyHWhe', 'baskara sakti', 0, '2017-05-23 14:32:34', '2017-05-20 09:57:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku_besar`
--
ALTER TABLE `buku_besar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_muat`
--
ALTER TABLE `daftar_muat`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `klien`
--
ALTER TABLE `klien`
  ADD PRIMARY KEY (`id_klien`);

--
-- Indexes for table `status_kirim`
--
ALTER TABLE `status_kirim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indexes for table `truk`
--
ALTER TABLE `truk`
  ADD PRIMARY KEY (`id_truk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku_besar`
--
ALTER TABLE `buku_besar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `daftar_muat`
--
ALTER TABLE `daftar_muat`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id_faktur` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_kirim`
--
ALTER TABLE `status_kirim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `truk`
--
ALTER TABLE `truk`
  MODIFY `id_truk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
