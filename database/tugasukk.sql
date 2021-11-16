-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 06:13 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_buku`
--

CREATE TABLE `tabel_buku` (
  `kode_buku` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_buku`
--

INSERT INTO `tabel_buku` (`kode_buku`, `judul`, `pengarang`, `penerbit`, `gambar`, `create_at`, `update_at`) VALUES
(10, 'he e a', 'sdsad', 'sadsa', 'background.jpeg', '2021-11-15 05:06:14', '2021-11-15 06:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_siswa`
--

CREATE TABLE `tabel_siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_siswa`
--

INSERT INTO `tabel_siswa` (`nis`, `nama`, `username`, `password`, `email`, `alamat`, `no_telepon`) VALUES
(16, 'imam', 'imam', '$2y$10$7vRM/6TGeHaVm9kq4kgWJ.2m3rDJaCmnHxfa3m4QOYl08WA.A1iWu', 'zahwatulizzah@gmail.com', 'Menco, Berahan Wetan, Wedung,', '081229677253'),
(17, 'admin', 'PPB656', '$2y$10$B.xCSCvbSkuryIJ.893YW.KSPA.4ctxby/qsA.YCGX6sdMGLhgdPi', 'zahwatulizzah@gmail.com', 'Menco, Berahan Wetan, Wedung,', '081229677253'),
(18, 'wedsf', 'sddsfsdf', '$2y$10$Se/4Ip/97OPxwGYqBYzqu.wNgxBodoHaTCGMXl02X19tz1nr/00RK', 'restikadian00@gmail.com', 'yogyakarta', '85912628'),
(19, 'aaa', 'dafs', '$2y$10$2IMhshWQ5m5OJR0BCb5DdOD8fcuDwS7.ZI0b7C8YBHxIbmAfdiXYC', 'saya@gmail.com', 'Menco, Berahan Wetan, Wedung,', '343432'),
(20, 'aku', 'aku', '$2y$10$ppdX78xNEnx6edyjlmCRUedG/4djvZbyc9LaAsFNFoN5JOMVVElgK', 'aku@gmail.com', 'aku', '0980595435');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_buku`
--
ALTER TABLE `tabel_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_buku`
--
ALTER TABLE `tabel_buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tabel_siswa`
--
ALTER TABLE `tabel_siswa`
  MODIFY `nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
