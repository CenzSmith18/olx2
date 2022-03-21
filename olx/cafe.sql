-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2022 at 04:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `gambar_id` int(11) NOT NULL,
  `gambar_nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gambarpost`
--

CREATE TABLE `gambarpost` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tangga_upload` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gambarpost`
--

INSERT INTO `gambarpost` (`id`, `judul`, `username`, `nama_file`, `tangga_upload`, `status`) VALUES
(1, 'Vespa Muda', 'WandaNugraha', './image/upload/621eeb2abf401-wp2556052-wallpaper-vespa.jpg', '0000-00-00 00:00:00', '1'),
(2, 'Vespa Muda', 'WandaNugraha', './image/upload/621eeb2ada3b6-fg.jpg', '0000-00-00 00:00:00', '1'),
(3, 'Vespa Muda', 'WandaNugraha', './image/upload/621eebaccabe3-wp2556052-wallpaper-vespa.jpg', '0000-00-00 00:00:00', '1'),
(4, 'Vespa Muda', 'WandaNugraha', './image/upload/621eebacde366-fg.jpg', '0000-00-00 00:00:00', '1'),
(5, 'Vespa Muda 2019', 'WandaNugraha', './image/upload/621eec620b764-fg.jpg', '0000-00-00 00:00:00', '1'),
(6, 'Vespa Muda 2019', 'WandaNugraha', './image/upload/621eec621b337-gg.jpg', '0000-00-00 00:00:00', '1'),
(7, 'Vespa Muda 2019', 'WandaNugraha', './image/upload/621eec6228197-Open Peeps - Sitting (1).png', '0000-00-00 00:00:00', '1'),
(8, 'Vespa Muda 2019', 'WandaNugraha', './image/upload/621eec6233cd6-Open Peeps - Sitting.png', '0000-00-00 00:00:00', '1'),
(9, 'Ini Judul', 'WandaNugraha', './image/upload/621eeda32bc6d-2.jpg', '0000-00-00 00:00:00', '1'),
(10, 'Vespa Muda 2019', 'WandaNugraha', './image/upload/621f07f243fc0-wp2556052-wallpaper-vespa.jpg', '0000-00-00 00:00:00', '1'),
(11, 'Vespa Muda 2019', 'WandaNugraha', './image/upload/621f07f25b409-gg.jpg', '0000-00-00 00:00:00', '1'),
(12, 'Dijual Vespa Excel 150 tahun (1995)', 'WandaNugraha', './image/upload/621f09286aa6e-image (1).webp', '0000-00-00 00:00:00', '1'),
(13, 'Dijual Vespa Excel 150 tahun (1995)', 'WandaNugraha', './image/upload/621f0928a3f76-image (2).webp', '0000-00-00 00:00:00', '1'),
(14, 'Dijual Vespa Excel 150 tahun (1995)', 'WandaNugraha', './image/upload/621f0928b9c9b-image (3).webp', '0000-00-00 00:00:00', '1'),
(15, 'Dijual Vespa Excel 150 tahun (1995)', 'WandaNugraha', './image/upload/621f0928d5cf3-image.webp', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `orderan`
--

CREATE TABLE `orderan` (
  `id` int(25) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `jumlah` varchar(50) NOT NULL DEFAULT '0',
  `harga` varchar(255) DEFAULT NULL,
  `totalharga` int(255) NOT NULL DEFAULT 0,
  `alamat` varchar(255) DEFAULT NULL,
  `pembayaran` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderan`
--

INSERT INTO `orderan` (`id`, `username`, `produk`, `jumlah`, `harga`, `totalharga`, `alamat`, `pembayaran`, `status`) VALUES
(32, 'CenzSmith', 'Kopi ,Potato wedges ', '4,3', 'Rp. 15,000.00,Rp. 20,000.00', 120000, 'Jl.peta', 'cod', 'menunggu'),
(33, 'CenzSmith', 'Kopi ,Potato wedges ', '4,3', 'Rp. 15,000.00,Rp. 20,000.00', 120000, 'Jl.peta', 'cod', 'menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `postingan`
--

CREATE TABLE `postingan` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `merek` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `tahun` int(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postingan`
--

INSERT INTO `postingan` (`id`, `username`, `judul`, `merek`, `harga`, `tahun`, `deskripsi`, `alamat`, `tanggal`) VALUES
(1, 'WandaNugraha', 'Vespa Muda 2019', 'VesMud', 1883, 2019, 'dwjadaw\r\nodjwa\r\nkdwa\r\ndwka', 'Jl.peta', '2022-03-02 06:00:17'),
(2, 'WandaNugraha', 'Dijual Vespa Excel 150 tahun (1995)', 'Vespa Excel', 6500000, 1995, 'Harga 6 juta (nego)\r\n\r\nKondisi Mesin sehat Pisan\r\n\r\nMesin yg digunakan mesin PX\r\n\r\nKondisi vespa siap pakai', 'Jl.peta', '2022-03-02 06:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'asset/menu/kopi.jpg',
  `keterangan` varchar(255) DEFAULT NULL,
  `harga` int(25) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `gambar`, `keterangan`, `harga`) VALUES
(1, 'Kopi', 'asset/menu/kopi.jpg', NULL, 15000),
(2, 'Potato wedges', 'asset/menu/Potato-wedges.jpg', NULL, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'Samsung J2 Pro', '1.jpg', 100.00),
(2, 'HP Notebook', '2.jpg', 299.00),
(3, 'Panasonic T44 Lite', '3.jpg', 125.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `akses` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT 'asset/Profile.png',
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `nohp`, `akses`, `password`, `foto`, `alamat`) VALUES
(4, 'WandaNugraha', 'wanda.rahman38@gmail.com', '089646306691', 'user', '202cb962ac59075b964b07152d234b70', 'asset/Profile.png', ''),
(5, 'WandaNugraha2', 'wanda.rahman382@gmail.com', '', 'user', '202cb962ac59075b964b07152d234b70', 'asset/Profile.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_keranjang`
--

CREATE TABLE `user_keranjang` (
  `id` int(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `produk` varchar(255) DEFAULT NULL,
  `jumlah` int(25) DEFAULT NULL,
  `harga` int(25) DEFAULT 0,
  `totalharga` int(255) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_keranjang`
--

INSERT INTO `user_keranjang` (`id`, `username`, `produk`, `jumlah`, `harga`, `totalharga`) VALUES
(13, 'CenzSmith', 'Kopi ', 3, 15000, 45000),
(14, 'CenzSmith', 'Potato wedges ', 2, 20000, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `user_voucher`
--

CREATE TABLE `user_voucher` (
  `id` int(25) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gambar` varchar(50) DEFAULT 'asset/rupiah.png',
  `voucher` varchar(255) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `tukar` int(1) DEFAULT 0,
  `claimed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `exp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_voucher`
--

INSERT INTO `user_voucher` (`id`, `username`, `gambar`, `voucher`, `info`, `tukar`, `claimed`, `exp`) VALUES
(19, 'CenzSmith', 'asset/rupiah.png', 'voc-test', 'Potongan Harga 10rb', 0, '2021-12-11 04:55:42', '2021-12-03'),
(21, 'CenzSmith', 'asset/rupiah.png', 'voc-test2', 'Potongan Harga 15rb', 0, '2021-12-11 04:59:31', '2021-12-03'),
(22, 'CenzSmith', 'asset/rupiah.png', 'voc-test4', 'Potongan Harga 15rb', 0, '2021-12-11 05:01:28', '2021-12-03'),
(23, '', 'asset/rupiah.png', '', '', 0, '2021-12-13 00:29:39', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(25) NOT NULL,
  `voucher` varchar(255) NOT NULL,
  `gambar` varchar(50) DEFAULT 'asset/rupiah.png',
  `info` varchar(255) NOT NULL,
  `potongan` int(255) NOT NULL,
  `exp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `voucher`, `gambar`, `info`, `potongan`, `exp`) VALUES
(1, 'voc-test', 'asset/rupiah.png', 'Potongan Harga 10rb', 10000, '2021-12-03'),
(2, 'voc-test2', 'asset/rupiah.png', 'Potongan Harga 15rb', 10000, '2021-12-03'),
(3, 'voc-test3', 'asset/rupiah.png', 'Potongan Harga 15rb', 10000, '2021-12-03'),
(4, 'voc-test4', 'asset/rupiah.png', 'Potongan Harga 15rb', 10000, '2021-12-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`gambar_id`);

--
-- Indexes for table `gambarpost`
--
ALTER TABLE `gambarpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postingan`
--
ALTER TABLE `postingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_keranjang`
--
ALTER TABLE `user_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_voucher`
--
ALTER TABLE `user_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `gambar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambarpost`
--
ALTER TABLE `gambarpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `postingan`
--
ALTER TABLE `postingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_keranjang`
--
ALTER TABLE `user_keranjang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_voucher`
--
ALTER TABLE `user_voucher`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
