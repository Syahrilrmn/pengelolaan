-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 09:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengelolaan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_gaji`
--

CREATE TABLE `tb_data_gaji` (
  `nip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tmt` date NOT NULL,
  `pangkat` enum('Golongan I (Juru)','Golongan II (Pengatur)','Golongan III (Penata)','Golongan IV (Pembina)') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `golongan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masakerja` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gajilama` int(20) NOT NULL,
  `gajibaru` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data_gaji`
--

INSERT INTO `tb_data_gaji` (`nip`, `nama`, `tmt`, `pangkat`, `golongan`, `masakerja`, `gajilama`, `gajibaru`) VALUES
('180132964', 'irawan', '2023-03-17', 'Golongan I (Juru)', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(11) NOT NULL,
  `info` varchar(30) NOT NULL,
  `dari_tgl` date NOT NULL,
  `sampai_tgl` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kgb`
--

CREATE TABLE `tb_kgb` (
  `id_kgb` int(11) NOT NULL,
  `no_surat` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `perihal` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pangkat` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unit` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pejabat` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `berdasarkan_sk` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_sk` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masakerja` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gajilama` int(200) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `gajibaru` int(100) NOT NULL,
  `golongan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masakerja_baru` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NOT NULL,
  `tgl_kenaikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_naik_gaji`
--

CREATE TABLE `tb_naik_gaji` (
  `nip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jeniskelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tmt` date NOT NULL,
  `unit` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `upload` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_naik_gaji`
--

INSERT INTO `tb_naik_gaji` (`nip`, `nama`, `jeniskelamin`, `tmt`, `unit`, `upload`) VALUES
('180132964', 'irawan', 'Laki-laki', '2023-03-17', 'Dinas Pendidikan Kota Banjarmasin', '1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `karpeg` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pangkat` enum('Golongan I (Juru)','Golongan II (Pengatur)','Golongan III (Penata)','Golongan IV (Pembina)') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unit` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tmt` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `karpeg`, `kota`, `tanggal_lahir`, `pangkat`, `jabatan`, `unit`, `tmt`) VALUES
('180132964', 'irawan', 'D 0001', 'Banjarbaru', '2023-03-09', 'Golongan I (Juru)', 'Kadis', 'Dinas Pendidikan Kota Banjarmasin', '2023-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(4, 'Irawan', '180132964', '1234567890', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `nama_pemerintahan` varchar(50) NOT NULL,
  `nama_dinas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama_pemerintahan`, `nama_dinas`, `alamat`, `bidang`, `logo`) VALUES
(1, 'PEMERINTAHAN KOTA BANJARMASIN', 'DINAS PENDIDIKAN', 'Alamat : Jl. Kapten Piere Tendean No.29, Gadang, Kec. Banjarmasin Tengah Kalimantan Selatan 70231', 'PENDIDIKAN (PTK)', 'dinas-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_riwayatkp`
--

CREATE TABLE `tb_riwayatkp` (
  `nip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NOT NULL,
  `jabatan_sebelum` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan_setelah` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unit` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_data_gaji`
--
ALTER TABLE `tb_data_gaji`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_kgb`
--
ALTER TABLE `tb_kgb`
  ADD PRIMARY KEY (`id_kgb`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_naik_gaji`
--
ALTER TABLE `tb_naik_gaji`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`),
  ADD KEY `nama` (`nama_pengguna`) USING BTREE;

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_riwayatkp`
--
ALTER TABLE `tb_riwayatkp`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kgb`
--
ALTER TABLE `tb_kgb`
  MODIFY `id_kgb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_data_gaji`
--
ALTER TABLE `tb_data_gaji`
  ADD CONSTRAINT `tb_data_gaji_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kgb`
--
ALTER TABLE `tb_kgb`
  ADD CONSTRAINT `tb_kgb_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_naik_gaji`
--
ALTER TABLE `tb_naik_gaji`
  ADD CONSTRAINT `tb_naik_gaji_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD CONSTRAINT `tb_pengguna_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_riwayatkp`
--
ALTER TABLE `tb_riwayatkp`
  ADD CONSTRAINT `tb_riwayatkp_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `tb_pegawai` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
