-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 07:52 AM
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
-- Database: `pengelolaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftargaji`
--

CREATE TABLE `tb_daftargaji` (
  `id_daftargaji` varchar(10) NOT NULL,
  `golongan` varchar(25) NOT NULL,
  `pangkat` varchar(25) NOT NULL,
  `mkg` int(10) NOT NULL,
  `gaji_now` int(10) NOT NULL,
  `gaji_before` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_daftargaji`
--

INSERT INTO `tb_daftargaji` (`id_daftargaji`, `golongan`, `pangkat`, `mkg`, `gaji_now`, `gaji_before`) VALUES
('K1IIa', 'IIa', 'Guru Muda', 1, 2000000, 1000000),
('K2IIb', 'IIb', 'Guru Muda', 2, 4000000, 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_data_gaji`
--

CREATE TABLE `tb_data_gaji` (
  `nip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tmt` date NOT NULL,
  `pangkat` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `golongan` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `masakerja` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gaji_before` int(10) NOT NULL,
  `gaji_now` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_data_gaji`
--

INSERT INTO `tb_data_gaji` (`nip`, `nama`, `tmt`, `pangkat`, `golongan`, `masakerja`, `gaji_before`, `gaji_now`) VALUES
('196300118', 'Wafda Lina Azkiya', '2023-03-31', 'Guru Muda', 'IIa', '2', 2, 2000000),
('19681113 200701 2 013', 'Rahmasari', '2012-06-01', 'Golongan III (Penata)', 'III/d', '6', 6000000, 8000000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_golongan`
--

CREATE TABLE `tb_golongan` (
  `id_golongan` int(11) NOT NULL,
  `golongan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_golongan`
--

INSERT INTO `tb_golongan` (`id_golongan`, `golongan`) VALUES
(1, 'IIa'),
(3, 'IIb');

-- --------------------------------------------------------

--
-- Table structure for table `tb_info`
--

CREATE TABLE `tb_info` (
  `id_info` int(11) NOT NULL,
  `info` varchar(100) NOT NULL,
  `dari_tgl` date NOT NULL,
  `sampai_tgl` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_info`
--

INSERT INTO `tb_info` (`id_info`, `info`, `dari_tgl`, `sampai_tgl`, `ket`) VALUES
(1, 'Pengumpulan Berkas Naik Gaji Berkala', '2023-03-10', '2023-03-23', 'Harap Segera Dikumpulan'),
(4, 'Kenaikan Gaji', '2023-07-05', '2023-07-12', 'Akan dicairkan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kadis`
--

CREATE TABLE `tb_kadis` (
  `nip` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(11) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `tb_kadis`
--

INSERT INTO `tb_kadis` (`nip`, `nama`, `alamat`, `jk`, `tempat_lahir`, `tanggal_lahir`, `foto`) VALUES
('1234124335', 'Ahmad ', 'Banjarbaru', 'laki-laki', 'Banjarmasin', '2023-06-23', 'Untitled.jpeg');

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
  `nip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pangkat` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unit` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pejabat` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
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

--
-- Dumping data for table `tb_kgb`
--

INSERT INTO `tb_kgb` (`id_kgb`, `no_surat`, `perihal`, `tanggal_surat`, `nama`, `tempat_lahir`, `tanggal_lahir`, `nip`, `pangkat`, `jabatan`, `unit`, `pejabat`, `no_sk`, `masakerja`, `gajilama`, `tgl_mulai`, `gajibaru`, `golongan`, `masakerja_baru`, `tgl`, `tgl_kenaikan`) VALUES
(7, '011', 'Kenaikan Pangkat', '2023-07-18', 'Wafda Lina Azkiya', 'Banjarbaru', '2023-03-24', '196300118', 'Guru Muda/IIa', 'Kepala Bidang Pembinaan SMP', 'Dinas Pendidikan Kota Banjarmasin', 'Nuryadi, S.Pd.,MA', '003/07', '6', 4000000, '2023-07-27', 5000000, 'iiic', '8', '2023-07-27', '2023-07-27'),
(8, '011', 'Kenaikan Pangkat', '2023-07-19', 'Dr.Fatimah', 'Banjarmasin', '1985-01-10', '19650730198703', 'Guru Muda/IIa', 'Pengelola Kepegawaian', 'Dinas Pendidikan Kota Banjarmasin', 'Nuryadi, S.Pd.,MA', '003/07', '4', 2000000, '2023-07-19', 3000000, 'iiic', '6', '2023-07-27', '2023-07-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_naik_gaji`
--

CREATE TABLE `tb_naik_gaji` (
  `nip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
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
('196300118', 'Wafda Lina Azkiya', 'Perempuan', '2023-03-31', 'Dinas Pendidikan Kota Banjarmasin', 'KTP.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pangkat`
--

CREATE TABLE `tb_pangkat` (
  `id_pangkat` int(11) NOT NULL,
  `pangkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pangkat`
--

INSERT INTO `tb_pangkat` (`id_pangkat`, `pangkat`) VALUES
(2, 'Guru Muda'),
(3, 'Guru Madya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `nip` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `karpeg` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jk` varchar(11) NOT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pangkat` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `golongan` varchar(25) NOT NULL,
  `jabatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unit` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tmt` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`nip`, `nama`, `karpeg`, `jk`, `tempat_lahir`, `tanggal_lahir`, `pangkat`, `golongan`, `jabatan`, `unit`, `tmt`, `foto`) VALUES
('196300118', 'Wafda Lina Azkiya', 'D 10988', 'perempuan', 'Banjarbaru', '2023-03-24', 'Guru Muda', 'IIa', 'Kepala Bidang Pembinaan SMP', 'Dinas Pendidikan Kota Banjarmasin', '2023-03-31', 'photo_2023-03-07_19-37-18.png'),
('19650730198703', 'Dr.Fatimah', 'A 12345', 'perempuan', 'Banjarmasin', '1985-01-10', 'Guru Muda', 'IIa', 'Pengelola Kepegawaian', 'Dinas Pendidikan Kota Banjarmasin', '2023-03-13', 'photo_2023-03-11_11-13-03.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` char(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Pegawai','Kadis') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`, `foto`) VALUES
(33, 'Rahmasari, S.Pi', 'admin', 'admin', 'Admin', 'Picture1.png'),
(40, 'Dr.Fatimah', '19650730198703', '1234567890', 'Pegawai', ''),
(41, 'Wafda Lina Azkiya', '196300118', '1234567890', 'Pegawai', 'photo_2023-03-07_19-37-18.png'),
(45, 'Ahmad', '1234124335', '1234567890', 'Kadis', 'Untitled.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pensiun`
--

CREATE TABLE `tb_pensiun` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(10) NOT NULL,
  `usia` varchar(10) NOT NULL,
  `tgl_pensiun` varchar(10) NOT NULL,
  `tmt_kerja` varchar(10) NOT NULL,
  `gapok` varchar(20) NOT NULL,
  `no_rek` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pensiun`
--

INSERT INTO `tb_pensiun` (`nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `usia`, `tgl_pensiun`, `tmt_kerja`, `gapok`, `no_rek`) VALUES
('196300118', 'Wafda Lina Azkiya', 'Banjarbaru', '2023-03-24', 'perempuan', '58', '2023-07-26', '2023-03-31', '2000000', '123435643'),
('19650730198703', 'Dr.Fatimah', 'Banjarmasin', '1985-01-10', 'perempuan', '57', '2023-08-04', '2023-03-13', '3000000', '123546');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pkgb`
--

CREATE TABLE `tb_pkgb` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tmt` date NOT NULL,
  `pangkat` varchar(25) NOT NULL,
  `golongan` varchar(25) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `masakerja` int(10) NOT NULL,
  `gaji_before` int(10) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `sk_pangkat` varchar(255) NOT NULL,
  `sk_berkala` varchar(255) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `tb_pkgb`
--

INSERT INTO `tb_pkgb` (`nip`, `nama`, `jk`, `tmt`, `pangkat`, `golongan`, `jabatan`, `masakerja`, `gaji_before`, `unit`, `upload`, `sk_pangkat`, `sk_berkala`, `ket`) VALUES
('196300118', 'Wafda Lina Azkiya', 'perempuan', '2023-03-31', 'Guru Muda', 'IIa', 'Kepala Bidang Pembinaan SMP', 2, 2, 'Dinas Pendidikan Kota Banjarmasin', 'bahan web.pdf', 'CV_MUHAMMADHANAFI.pdf', 'PENGELOLAAN DATA KGB.pdf', 'DITERIMA'),
('19650730198703', 'Dr.Fatimah', 'perempuan', '2023-03-13', 'Guru Muda', 'IIa', 'Pengelola Kepegawaian', 5, 5000000, 'Dinas Pendidikan Kota Banjarmasin', 'Rancangan Aplikasi_Wafda Lina Azkiya_19630887-1(1).zip', '', '', 'DITOLAK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ppensiun`
--

CREATE TABLE `tb_ppensiun` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jk` varchar(11) NOT NULL,
  `usia` int(10) NOT NULL,
  `tmt_kinerja` date NOT NULL,
  `gapok` int(30) NOT NULL,
  `no_rek` int(25) NOT NULL,
  `alasan` text NOT NULL,
  `upload` varchar(255) NOT NULL,
  `upload1` varchar(255) NOT NULL,
  `upload2` varchar(255) NOT NULL,
  `upload3` varchar(255) NOT NULL,
  `upload4` varchar(255) NOT NULL,
  `upload5` varchar(255) NOT NULL,
  `upload6` varchar(255) NOT NULL,
  `upload7` varchar(255) NOT NULL,
  `upload8` varchar(255) NOT NULL,
  `upload9` varchar(255) NOT NULL,
  `upload10` varchar(255) NOT NULL,
  `upload11` varchar(255) NOT NULL,
  `upload12` varchar(255) NOT NULL,
  `upload13` varchar(255) NOT NULL,
  `upload14` varchar(255) NOT NULL,
  `upload15` varchar(255) NOT NULL,
  `upload16` varchar(255) NOT NULL,
  `upload17` varchar(255) NOT NULL,
  `upload18` varchar(255) NOT NULL,
  `upload19` varchar(255) NOT NULL,
  `ket` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `tb_ppensiun`
--

INSERT INTO `tb_ppensiun` (`nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jk`, `usia`, `tmt_kinerja`, `gapok`, `no_rek`, `alasan`, `upload`, `upload1`, `upload2`, `upload3`, `upload4`, `upload5`, `upload6`, `upload7`, `upload8`, `upload9`, `upload10`, `upload11`, `upload12`, `upload13`, `upload14`, `upload15`, `upload16`, `upload17`, `upload18`, `upload19`, `ket`) VALUES
('196300118', 'Wafda Lina Azkiya', 'Banjarbaru', '2023-03-24', 'perempuan', 50, '2023-03-31', 2000000, 123456789, 'Pengen Meningmati masa tua', 'PENGELOLAAN DATA KGB.pdf', 'PENGELOLAAN DATA KGB - Copy.pdf', 'PENGELOLAAN DATA KGB - Copy (2).pdf', 'PENGELOLAAN DATA KGB - Copy (3).pdf', 'PENGELOLAAN DATA KGB - Copy (4).pdf', 'PENGELOLAAN DATA KGB - Copy (5).pdf', 'PENGELOLAAN DATA KGB - Copy (6).pdf', 'PENGELOLAAN DATA KGB - Copy (7).pdf', 'PENGELOLAAN DATA KGB - Copy (8).pdf', 'PENGELOLAAN DATA KGB - Copy (9).pdf', 'PENGELOLAAN DATA KGB - Copy (10).pdf', 'PENGELOLAAN DATA KGB - Copy (11).pdf', 'PENGELOLAAN DATA KGB - Copy (12).pdf', 'PENGELOLAAN DATA KGB - Copy (13).pdf', 'PENGELOLAAN DATA KGB - Copy (14).pdf', 'PENGELOLAAN DATA KGB - Copy (15).pdf', 'PENGELOLAAN DATA KGB - Copy (16).pdf', 'PENGELOLAAN DATA KGB - Copy (17).pdf', 'PENGELOLAAN DATA KGB - Copy (18).pdf', 'PENGELOLAAN DATA KGB - Copy (19).pdf', 'DITERIMA'),
('19650730198703', 'Dr.Fatimah', 'Banjarmasin', '1985-01-10', 'perempuan', 57, '2023-03-13', 3000000, 123546, 'aedsda', 'Rancangan Aplikasi_Wafda Lina Azkiya_19630887-1.zip', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DITOLAK');

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
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl` date NOT NULL,
  `jabatan_sebelum` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan_setelah` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unit` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_riwayatkp`
--

INSERT INTO `tb_riwayatkp` (`nip`, `nama`, `tgl`, `jabatan_sebelum`, `jabatan_setelah`, `unit`) VALUES
('19681113 200701 2 013', 'Rahmasari, S.Pi', '2023-06-01', 'Kasubbag Umum dan Kepegawaian', 'Kepala Bidang Pembinaan PTK', 'Dinas Pendidikan Kota Banjarmasin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftargaji`
--
ALTER TABLE `tb_daftargaji`
  ADD PRIMARY KEY (`id_daftargaji`);

--
-- Indexes for table `tb_data_gaji`
--
ALTER TABLE `tb_data_gaji`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tb_info`
--
ALTER TABLE `tb_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tb_kadis`
--
ALTER TABLE `tb_kadis`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_kgb`
--
ALTER TABLE `tb_kgb`
  ADD PRIMARY KEY (`id_kgb`);

--
-- Indexes for table `tb_naik_gaji`
--
ALTER TABLE `tb_naik_gaji`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `nip` (`nip`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  ADD PRIMARY KEY (`id_pangkat`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `password` (`password`),
  ADD KEY `nama` (`nama_pengguna`) USING BTREE,
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_pensiun`
--
ALTER TABLE `tb_pensiun`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_pkgb`
--
ALTER TABLE `tb_pkgb`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `ket` (`ket`);

--
-- Indexes for table `tb_ppensiun`
--
ALTER TABLE `tb_ppensiun`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_riwayatkp`
--
ALTER TABLE `tb_riwayatkp`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kgb`
--
ALTER TABLE `tb_kgb`
  MODIFY `id_kgb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
