-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2017 at 10:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `daftar_muat`
--

CREATE TABLE `daftar_muat` (
  `id_dm` int(11) NOT NULL,
  `no_dm` varchar(100) NOT NULL,
  `sopir` varchar(100) NOT NULL,
  `truk` varchar(100) NOT NULL,
  `total_ongkos` int(100) NOT NULL,
  `total_qty` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_muat`
--

INSERT INTO `daftar_muat` (`id_dm`, `no_dm`, `sopir`, `truk`, `total_ongkos`, `total_qty`, `created_at`, `updated_at`) VALUES
(1, '00000001', '', '', 0, 0, '2017-07-09 22:49:45', '0000-00-00 00:00:00'),
(4, '2222', '', '', 0, 0, '2017-07-09 22:40:03', '0000-00-00 00:00:00'),
(5, '11111', '', '', 0, 0, '2017-07-09 22:08:43', '0000-00-00 00:00:00'),
(6, '1111111', '', '', 0, 0, '2017-07-29 02:34:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` int(100) NOT NULL,
  `kode_faktur` varchar(10) NOT NULL,
  `no_sj` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `id_faktur_pengirim` varchar(100) NOT NULL,
  `id_faktur_penerima` varchar(100) NOT NULL,
  `id_faktur_dm` int(11) NOT NULL,
  `lunas` int(2) NOT NULL,
  `tagihan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `kode_faktur`, `no_sj`, `tujuan`, `total`, `id_faktur_pengirim`, `id_faktur_penerima`, `id_faktur_dm`, `lunas`, `tagihan`, `created_at`, `updated_at`) VALUES
(12, '100000', 'rrrr', '0', 15000, 'CDE', '2', 2147483647, 0, '0', '2017-07-26 07:25:18', '0000-00-00 00:00:00'),
(13, '1112222', 'ttttt', '0', 15000, 'fyz', '2', 2222, 1, '0', '2017-07-26 07:25:23', '0000-00-00 00:00:00'),
(19, '3456789', '', 'vvvvvvvv', 0, 'uryuruyruyryu', 'rtyuio', 1111111, 0, '0', '2017-07-29 02:34:32', '0000-00-00 00:00:00'),
(20, 'ytytyyttyt', '', 'coba', 0, 'uryuruyruyryu', 'rtyuio', 0, 0, '0', '2017-07-29 03:24:42', '0000-00-00 00:00:00');

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
(3, '1231234', 2, 'asdasd', 4000, 8000, '2017-07-10 04:08:55', '2017-07-09 23:08:55'),
(5, '1111', 10, 'testsss', 1000, 10000, '2017-07-10 04:13:56', '2017-07-09 23:13:56'),
(21, '100000', 3, 'asdasd', 5000, 15000, '2017-07-10 03:00:13', '2017-07-09 22:00:13'),
(22, '3456789', 3333, '2', 2, 2, '2017-07-26 08:57:42', '2017-07-26 03:57:42'),
(23, '3456789', 3333, '2', 2, 2, '2017-07-26 08:57:42', '2017-07-26 03:57:42'),
(24, 'ytytyyttyt', 3333, '33', 33, 3333, '2017-07-26 08:59:46', '2017-07-26 03:59:46');

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
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `no_tagihan` varchar(100) NOT NULL,
  `klien` varchar(100) NOT NULL,
  `tipe_pembayaran` varchar(100) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `total_tagihan` int(100) NOT NULL,
  `total_qty` int(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `no_tagihan`, `klien`, `tipe_pembayaran`, `tanggal_pembayaran`, `total_tagihan`, `total_qty`, `created_at`, `updated_at`) VALUES
(1, '00000001', '0', '', '0000-00-00', 0, 0, '2017-07-09 22:49:45', '0000-00-00 00:00:00'),
(4, '2222', '0', '', '0000-00-00', 0, 0, '2017-07-09 22:40:03', '0000-00-00 00:00:00'),
(5, '11111', '0', '', '0000-00-00', 0, 0, '2017-07-09 22:08:43', '0000-00-00 00:00:00'),
(6, '1111111', '0', '', '0000-00-00', 0, 0, '2017-07-29 02:34:32', '0000-00-00 00:00:00'),
(7, 'asdasdasd', 'asdasdasd', 'transfer', '0000-00-00', 0, 0, '2017-07-29 03:24:42', '0000-00-00 00:00:00');

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
-- AUTO_INCREMENT for table `daftar_muat`
--
ALTER TABLE `daftar_muat`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id_faktur` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `klien`
--
ALTER TABLE `klien`
  MODIFY `id_klien` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `truk`
--
ALTER TABLE `truk`
  MODIFY `id_truk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
