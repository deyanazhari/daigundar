-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 07:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daigundar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'deyan', 'deyan123', 'deyan azhari'),
(2, 'fadia', 'arsadila', 'fadia arsadila');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Sepatu');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(25) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Serang', 10000),
(2, 'Jakarta', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(7, 'luthfi@gmail.com', 'luthfi123', 'Luthfi', 'depok', '085947299517');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(5, 29, 'deyan azhari', 'bri', 35000, '2021-12-16', '20211216160818ActivityDiagram1.jpg'),
(6, 30, 'Fadia Arsadila', 'mandiri', 45000, '2021-12-21', '2021122114364405bf49ab-efa5-4615-8465-f70cb654d8cd.jfif'),
(7, 38, 'Fadia Arsadila', 'BRI', 119, '2022-01-02', '202201020804171a543249-4f0c-49b0-b902-e8838f7b944a.jfif'),
(8, 39, 'Nindia Rahma', 'BCA', 154000, '2022-01-02', '20220102083136381802d8-12a0-45b0-ad02-16712116897c.jpg'),
(9, 41, 'deyan', 'bri', 49000, '2022-01-03', '202201030947011200px-Instagram_logo_2016.svg.png'),
(10, 41, 'deyan', 'bri', 49000, '2022-01-03', '202201030948161200px-Instagram_logo_2016.svg.png'),
(11, 44, 'deyan azhari', 'bri', 35000, '2022-01-03', '20220103163340about.png'),
(12, 45, 'Deyan Azhari', 'Mandiri', 35000, '2022-01-03', '20220103164343product_01.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(50) NOT NULL,
  `totalberat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kodepos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat_pengiriman`, `status_pembelian`, `resi_pengiriman`, `totalberat`, `provinsi`, `kota`, `tipe`, `kodepos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`) VALUES
(50, 7, '2022-07-11', 15000, 'Depok', 'pending', '', 300, 'Jawa Barat', 'Depok', 'Kota', '16416', 'jne', '', 0, ''),
(51, 7, '2022-07-12', 350000, 'Depok', 'pending', '', 550, 'Jawa Barat', 'Depok', 'Kota', '16416', 'pos', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(26, 23, 8, 1, 'Line Square', 35000, 100, 100, 35000),
(27, 24, 6, 1, 'Pansy Square', 35000, 100, 100, 35000),
(28, 25, 6, 2, 'Pansy Square', 35000, 100, 200, 70000),
(29, 26, 6, 1, 'Pansy Square', 35000, 100, 100, 35000),
(30, 26, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(31, 27, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(32, 28, 6, 2, 'Pansy Square', 35000, 100, 200, 70000),
(33, 29, 6, 1, 'Pansy Square', 35000, 100, 100, 35000),
(34, 30, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(35, 31, 7, 3, 'Ammi Square', 35000, 100, 300, 105000),
(36, 31, 8, 1, 'Line Square', 35000, 100, 100, 35000),
(37, 32, 6, 2, 'Pansy Square', 35000, 100, 200, 70000),
(38, 32, 8, 1, 'Line Square', 35000, 100, 100, 35000),
(39, 33, 9, 3, 'Iris Square', 35000, 100, 300, 105000),
(40, 33, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(41, 33, 6, 2, 'Pansy Square', 35000, 100, 200, 70000),
(42, 34, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(43, 0, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(44, 0, 9, 1, 'Iris Square', 35000, 100, 100, 35000),
(45, 0, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(46, 0, 9, 1, 'Iris Square', 35000, 100, 100, 35000),
(47, 0, 8, 4, 'Line Square', 35000, 100, 400, 140000),
(48, 0, 9, 1, 'Iris Square', 35000, 100, 100, 35000),
(49, 0, 8, 1, 'Line Square', 35000, 100, 100, 35000),
(50, 0, 8, 1, 'Line Square', 35000, 100, 100, 35000),
(51, 0, 9, 1, 'Iris Square', 35000, 100, 100, 35000),
(52, 0, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(53, 0, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(54, 35, 9, 1, 'Iris Square', 35000, 100, 100, 35000),
(55, 36, 9, 2, 'Iris Square', 35000, 100, 200, 70000),
(56, 36, 7, 1, 'Ammi Square', 35000, 100, 100, 35000),
(57, 37, 8, 1, 'Line Square', 35000, 100, 100, 35000),
(58, 38, 7, 2, 'Ammi Square', 35000, 100, 200, 70000),
(59, 38, 9, 1, 'Iris Square', 35000, 100, 100, 35000),
(60, 39, 9, 4, 'Iris Square', 35000, 100, 400, 140000),
(61, 40, 8, 1, 'Line Square', 35000, 100, 100, 35000),
(62, 41, 11, 1, 'Pansy Square', 35000, 100, 100, 35000),
(63, 42, 11, 1, 'Pansy Square', 35000, 100, 100, 35000),
(64, 43, 12, 1, 'Ammi Square', 35000, 100, 100, 35000),
(65, 44, 11, 1, 'Pansy Square', 35000, 100, 100, 35000),
(66, 45, 11, 1, 'Pansy Square', 35000, 100, 100, 35000),
(67, 46, 14, 1, 'Iris Square', 35000, 100, 100, 35000),
(68, 47, 11, 1, 'Pansy Square', 35000, 100, 100, 35000),
(69, 48, 12, 1, 'Ammi Square', 35000, 100, 100, 35000),
(70, 49, 11, 1, 'Pansy Square', 35000, 100, 100, 35000),
(71, 49, 12, 1, 'Ammi Square', 35000, 100, 100, 35000),
(72, 50, 15, 1, 'Contoh', 15000, 300, 300, 15000),
(73, 51, 17, 1, 'Converse Retro Green', 350000, 550, 550, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(16, 1, 'Vans Waffle', 250000, 500, 'WhatsApp Image 2022-07-09 at 15.23.56 (1).jpeg', 'Sepatu Vans Waffle, Sol Bubble, Ukuran 41', 1),
(17, 1, 'Converse Retro Green', 350000, 550, 'about.jpg', 'Sepatu Converse retro warna Hijau, Ukuran 43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(1, 0, '20220101034607'),
(2, 0, 'product_01.png'),
(3, 0, ''),
(4, 0, 'product_01.png'),
(5, 0, 'product_02.png'),
(6, 0, 'hijab4.png'),
(7, 0, 'hijab3.png'),
(8, 0, 'about.jpg'),
(9, 0, 'WhatsApp Image 2022-07-09 at 15.23.56 (1).jpeg'),
(10, 0, 'about.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
