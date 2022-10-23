-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 11:49 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln_airtanah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `email`, `telepon`, `username`, `password`, `status`, `keterangan`) VALUES
('ADM01', 'a', 'a@gmail.com', '08987655444', 'a', 'a', 'Aktif', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_controlling`
--

CREATE TABLE `tb_controlling` (
  `id_controlling` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `perintah` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_controlling`
--

INSERT INTO `tb_controlling` (`id_controlling`, `tanggal`, `jam`, `perintah`, `status`, `keterangan`) VALUES
(1, '2022-07-14', '04:30:03', 'Motor ON', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_monitoring`
--

CREATE TABLE `tb_monitoring` (
  `id_monitoring` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `sensor_m1` int(8) NOT NULL,
  `sensor_m2` int(8) NOT NULL,
  `sensor_t1` int(8) NOT NULL,
  `sensor_t2` int(8) NOT NULL,
  `motor` varchar(15) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_monitoring`
--

INSERT INTO `tb_monitoring` (`id_monitoring`, `tanggal`, `jam`, `sensor_m1`, `sensor_m2`, `sensor_t1`, `sensor_t2`, `motor`, `keterangan`) VALUES
(1, '2022-07-14', '04:29:23', 37, 31, 72, 76, 'ON', '-'),
(2, '2022-07-14', '04:29:27', 37, 26, 74, 69, 'ON', ''),
(3, '2022-07-14', '04:29:29', 27, 30, 61, 67, 'ON', ''),
(4, '2022-07-14', '04:29:31', 30, 29, 68, 80, 'ON', ''),
(5, '2022-07-14', '04:30:33', 25, 37, 87, 82, 'ON', 'p'),
(6, '2022-07-14', '04:30:51', 26, 28, 67, 81, 'ON', 'juuj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_controlling`
--
ALTER TABLE `tb_controlling`
  ADD PRIMARY KEY (`id_controlling`);

--
-- Indexes for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_controlling`
--
ALTER TABLE `tb_controlling`
  MODIFY `id_controlling` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  MODIFY `id_monitoring` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
