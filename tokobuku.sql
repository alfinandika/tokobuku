-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2017 at 08:56 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `noisbn` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga_pokok` int(50) NOT NULL,
  `keuntungan` int(50) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `ppn` int(2) NOT NULL,
  `diskon` int(2) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `noisbn`, `penulis`, `penerbit`, `tahun`, `stok`, `harga_pokok`, `keuntungan`, `harga_jual`, `ppn`, `diskon`, `foto`) VALUES
(1, 'Seni - Apa Itu?', '9792141170', 'Michael Hauskeller', 'Kanisius', 2014, 10, 45500, 0, 0, 0, 0, '616988672'),
(3, 'Zaman Kalasurasa', '9791684472', 'Agus Wahyudi', 'Narasi', 2015, 7, 54000, 0, 55000, 0, 0, ''),
(8, 'Tarian Dua Wajah', '6029193864', 'S. Prasetyo Utomo', 'Pustaka Alpabet', 2016, 13, 52500, 0, 53000, 0, 0, ''),
(14, 'Filologi Indonesia', '6021186281', 'Oman Fathurahman', 'Kencana', 2015, 14, 45000, 0, 47000, 0, 0, ''),
(15, 'Kebudayaan di Nusantara', '6029402412', 'Edi Sedyawati', 'Komunitas Bambu', 2014, 20, 38000, 0, 40000, 0, 0, ''),
(16, 'Kretek Indonesia', '6021217039', 'S. Margana', 'Sejarah FIB UGM', 2014, 20, 85300, 0, 86000, 0, 0, ''),
(17, 'Mengenal Wayang', '6027723238', 'Ardian Kresna', 'LAKSANA', 2012, 10, 65000, 0, 68000, 0, 0, ''),
(18, 'Budaya Media Bahasa', '6028252522', 'Stuart Hall', 'Jalasutra', 2011, 4, 50000, 0, 51500, 0, 0, ''),
(19, '100 Keajaiban Indonesia', '6028526320', 'Tim Sunrise Pictures', 'Cikal Aksara', 2010, 76, 30000, 0, 32500, 0, 0, ''),
(20, 'The Papua Paradox', '9792916458', 'Drs. Gasper Liauw,M.Si', 'Andi Publisher', 2010, 10, 78300, 0, 80000, 0, 0, ''),
(21, 'Defending Indonesia', '9792244344', 'Connie Rahakundini Bakrie', 'Gramedia Pustaka Utama', 2009, 5, 57000, 0, 59000, 0, 0, ''),
(22, 'Komunikasi Antar Budaya', '9792573771', 'Dadan Anugrah', 'Jala Permata Aksara', 2008, 15, 46000, 0, 48000, 0, 0, ''),
(23, '40 Days In Europe', '9791227128', 'Maulana M. Syuhada', 'Bentang Pustaka', 2007, 17, 68000, 0, 70500, 0, 0, ''),
(24, 'Agama Dan Peradaban', '9795235664', 'Hisanori Kato', 'Dian Rakyat', 2007, 25, 57000, 0, 59000, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id_penjualan` int(50) NOT NULL,
  `id_buku` int(50) NOT NULL,
  `id_kasir` int(50) NOT NULL,
  `harga_jual` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_penjualan`, `id_buku`, `id_kasir`, `harga_jual`, `jumlah`, `total`) VALUES
(39, 23, 2, 70500, 1, 70500),
(39, 18, 2, 51500, 1, 51500),
(39, 14, 2, 47000, 1, 47000),
(40, 1, 2, 47000, 4, 188000),
(41, 1, 2, 47000, 1, 47000),
(42, 1, 2, 47000, 4, 188000),
(42, 3, 2, 55000, 1, 55000),
(2, 2, 2, 2, 2, 2),
(56, 3, 2, 55000, 2, 110000),
(56, 1, 2, 47000, 13, 611000),
(56, 8, 2, 53000, 2, 106000),
(57, 3, 2, 55000, 2, 110000),
(57, 1, 2, 47000, 13, 611000),
(57, 8, 2, 53000, 2, 106000),
(58, 1, 2, 47000, 4, 188000),
(58, 3, 2, 55000, 1, 55000),
(58, 8, 2, 53000, 1, 53000),
(59, 1, 2, 47000, 5, 235000),
(59, 3, 2, 55000, 1, 55000),
(59, 8, 2, 53000, 1, 53000);

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE IF NOT EXISTS `distributor` (
  `id_distributor` int(50) NOT NULL,
  `nama_distributor` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`id_distributor`, `nama_distributor`, `alamat`, `telepon`) VALUES
(1, 'CV Bambang Jaya', 'Jalan Panglima Sudirman No.254 Tuban', '0356 330330'),
(2, 'CV Adib Jaya', 'Jalan Panglima Sudirman No.254 Tuban', '0356 330330'),
(4, 'CV Bintang Jaya', 'Jalan Panglima Sudirman No.254 Tuban', '0356 330330'),
(5, 'TB. Asa Paradiso', 'Jl. Diponegoro No.23 Bandung', '022-7308415'),
(6, 'TB. Asa Paradiso', 'Jl. Diponegoro No.23 Bandung', '022-7308415'),
(7, 'TB. Rumah Buku', 'Jl. Supratman No. 96 Surabaya', '022-7233257'),
(8, 'TB. Gramedia Merdeka', 'Jl. Merdeka No. 43 Yogyakarta', '021-5643466'),
(9, 'TB. Alinea Book Corners', 'Jl. Mayor Abdurrohman No. 153 Jakarta', '031-5462685'),
(10, 'CV. Berkah Abadi', 'Jl. Pattimura No. 12 Lamongan', '024-8411511'),
(12, 'Gramedia Paris Van Java', 'Jl. Sukajadi No. 137-139 Bandung', '022-5224275'),
(13, 'Bandung Book Center', 'Jl. Karapitan No. 38 Bandung', '022-4205916'),
(14, 'TB. Nusa Cendana', 'Jl. Braga 115 Semarang', '022-4231544'),
(15, 'TB. Setia Kawan', 'Jl. Kramat Raya No. 3L Jakarta', '022-3155243'),
(16, 'Pustaka Indah', 'Jl. Soekarno No. 34 Surabaya', '022-75176363'),
(17, 'CV. Sumber Ilmu', 'Jl. Pramuka No. 2 Malang', '0341-494740'),
(18, 'Pustaka Media', 'Jl. Veteran No. 32 Sidoarjo', '031-5462685'),
(19, 'TB. Mandiri Buku', 'Jl. Plaosan No. 45 Surabaya', '024-3518674'),
(20, 'TB. Gramedia Istana Plaza', 'Jl. Pasir Kaliki No. 123 Surabaya', '022-5224275');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama`, `alamat`, `telepon`, `status`, `username`, `password`, `akses`) VALUES
(2, 'Alfin Andika Pratama', 'Leran Kulon Kec. Palang Tuban', '085730677732', '1', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin'),
(3, 'Rojiun', 'Jalan Basuki Rahmat', '085342534567', '1', 'rojiun', '51639b2a0879f725b872a4b96d914cadddfb5fef', 'operator'),
(4, 'Stefany', 'Malang', '08156317587', '1', 'stefany', '5a26a8edac14bcf78f62448d7d836a8a36845373', 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `id_kasir` int(50) NOT NULL,
  `id_buku` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_kasir`, `id_buku`, `jumlah`) VALUES
(4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasok`
--

CREATE TABLE IF NOT EXISTS `pasok` (
  `id_pasok` int(50) NOT NULL,
  `id_distributor` int(50) NOT NULL,
  `id_buku` int(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasok`
--

INSERT INTO `pasok` (`id_pasok`, `id_distributor`, `id_buku`, `jumlah`, `tanggal`) VALUES
(2, 3, 2, 23, '2017-01-04'),
(5, 1, 1, 5635, '2017-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(50) NOT NULL,
  `id_kasir` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_kasir`, `total`, `tanggal`) VALUES
(39, '2', 169000, '2017-01-31'),
(40, '2', 188000, '2017-02-01'),
(41, '2', 47000, '2017-02-01'),
(42, '2', 243000, '2017-02-01'),
(43, '2', 827000, '2017-02-25'),
(44, '2', 12000, '2017-02-25'),
(45, '2', 827000, '2017-02-25'),
(46, '2', 827000, '2017-02-25'),
(47, '2', 827000, '2017-02-25'),
(48, '2', 827000, '2017-02-25'),
(49, '2', 827000, '2017-02-25'),
(50, '2', 827000, '2017-02-25'),
(51, '2', 827000, '2017-02-25'),
(52, '2', 827000, '2017-02-25'),
(53, '2', 827000, '2017-02-25'),
(54, '2', 827000, '2017-02-25'),
(55, '2', 827000, '2017-02-25'),
(56, '2', 827000, '2017-02-25'),
(57, '2', 827000, '2017-02-27'),
(58, '2', 296000, '2017-03-12'),
(59, '2', 343000, '2017-03-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id_distributor`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indexes for table `pasok`
--
ALTER TABLE `pasok`
  ADD PRIMARY KEY (`id_pasok`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id_distributor` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pasok`
--
ALTER TABLE `pasok`
  MODIFY `id_pasok` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
