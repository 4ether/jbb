-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 09:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bisnis`
--

CREATE TABLE `bisnis` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `bentuk` varchar(15) NOT NULL,
  `pendapatan` varchar(20) NOT NULL,
  `didirikan` year(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `fitur` text DEFAULT NULL,
  `benda` text DEFAULT NULL,
  `mapLat` float(10,6) DEFAULT NULL,
  `mapLng` float(10,6) DEFAULT NULL,
  `kota` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `rataPerB` varchar(20) NOT NULL,
  `rataPerT` varchar(20) NOT NULL,
  `idPengusaha` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bisnis`
--

INSERT INTO `bisnis` (`id`, `nama`, `deskripsi`, `harga`, `bentuk`, `pendapatan`, `didirikan`, `status`, `jenis`, `fitur`, `benda`, `mapLat`, `mapLng`, `kota`, `alamat`, `rataPerB`, `rataPerT`, `idPengusaha`) VALUES
(1, 'Toko Permen', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ab repudiandae, explicabo voluptate ethic cum ratione a. Officia delectus illum perferendis maiores', 25000000, 'Toko', '5.200.000', '2005', 'Aktif', 'Pemilik', 'Wifi Area, Screen Order', 'Pegawai, Kasir', -7.767706, 110.378532, 'Yogyakarta', 'Universitas Gadjah Mada, university, Catur Tunggal, Indonesia', '6.000.000', '72.000.000', 17),
(2, 'Rumah Makan Itali', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ab repudiandae, explicabo voluptate ethic cum ratione a. Officia delectus illum perferendis maiores', 50000000, 'Restoran', '10.000.000', '2002', 'Aktif', 'Pemilik', 'Wifi Area, Luxury Service, VIP Area', 'Pegawai, Kasir, Pelayan', 38.673702, 15.887084, 'Vibo Valentia', '89861 Provinsi Vibo Valentia', '9.800.000', '117.600.000', 17),
(3, 'Bisnis Printing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ab repudiandae, explicabo voluptate ethic cum ratione a. Officia delectus illum perferendis maiores', 10000000, 'Ruko', '2.500.000', '2006', 'Aktif', 'Sewa', 'Waiting Area, Wifi', 'Printer', NULL, NULL, 'Yogyakarta', '6C9G+R3R, Jl. Onggomertan, Nayan, Maguwoharjo, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '3.000.000', '36.000.000', 17),
(4, 'Rotio Factorio', 'Bisnis ini telah berdiri sejak tahun 1945, bisnis ini memiliki sejarah panjang sehingga dianggap unik.', 27000000, 'Pabrik', '2.900.000.000', '1945', 'Aktif', 'Pemilik', 'Free Wifi', 'Karyawan, Tempat Duduk, Kantin, Karyawan, Oven', 41.894066, 12.502791, 'Aincard', 'Via Michelangelo Buonarroti, 42, 00185 Roma RM, Italia', '3.000.000.000', '36.000.000.000', 17),
(5, 'Toko Baju', 'Yang membedakan Toko Baju kami dari pesaing lainnya adalah komitmen kami terhadap tren terkini dalam industri fashion.', 650000000, 'Toko', '15.000.000', '1995', 'Aktif', 'Pemilik', 'Free Wifi, Desain Inovatif, Koleksi Tren Terbaru', 'Kasir, Stan Baju, Manekin', -7.767879, 110.401199, 'Yogyakarta', 'Jl. Wahid Hasyim No.36B, Dabag, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', '15.000.000', '180.000.000', 21);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama`) VALUES
(1, 'Admin'),
(2, 'Investor'),
(3, 'Pengusaha');

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id` int(11) NOT NULL,
  `id_bisnis` int(255) NOT NULL,
  `id_penawar` int(255) NOT NULL,
  `namaBisnis` varchar(20) NOT NULL,
  `hargaAsli` int(11) NOT NULL,
  `hargaTawar` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id`, `id_bisnis`, `id_penawar`, `namaBisnis`, `hargaAsli`, `hargaTawar`, `tanggal`) VALUES
(1, 2, 16, 'Rumah Makan Itali', 50000000, 45000000, '2023-05-15'),
(2, 2, 16, 'Rumah Makan Itali', 50000000, 48000000, '2023-06-07'),
(3, 1, 16, 'Toko Permen', 25000000, 32000000, '2023-06-09'),
(4, 1, 16, 'Toko Permen', 25000000, 35000000, '2023-06-10'),
(5, 3, 16, 'Bisnis Printing', 10000000, 12000000, '2023-05-19'),
(7, 5, 22, 'Toko Baju', 650000000, 630000000, '2023-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `id_jenis` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `notelp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `id_jenis`, `nama`, `email`, `password`, `notelp`) VALUES
(2, 1, 'Admin JBB', 'admin@gmail.com', '25f9e794323b453885f5181f1b624d0b', NULL),
(16, 2, 'investor1', 'investor@gmail.com', 'b4f18f5b05307bd1e3cc00e0802d641b', '5550123'),
(17, 3, 'Pengusaha 1', 'pengusaha@gmail.com', '457202d6b46efbd7da18c78a064e601f', '088855556467'),
(21, 3, 'PengusahaJBB', 'pjbb@mail.com', '202cb962ac59075b964b07152d234b70', '08886964888'),
(22, 2, 'InvestorJBB', 'ijbb@mail.com', '202cb962ac59075b964b07152d234b70', '08886964888');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bisnis`
--
ALTER TABLE `bisnis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPengusaha` (`idPengusaha`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penawar` (`id_penawar`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bisnis`
--
ALTER TABLE `bisnis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
