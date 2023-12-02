-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 06:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
-- Table structure for table `r_keluarga`
--

CREATE TABLE `r_keluarga` (
  `id` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `r_kepegawaian`
--

CREATE TABLE `r_kepegawaian` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `pangkat` varchar(50) DEFAULT NULL,
  `masuk` date NOT NULL,
  `keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `r_kepegawaian`
--

INSERT INTO `r_kepegawaian` (`id`, `id_pegawai`, `perusahaan`, `jabatan`, `pangkat`, `masuk`, `keluar`) VALUES
(2, '19630001', '', 'Staff', '', '2023-12-06', '2023-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `r_pendidikan`
--

CREATE TABLE `r_pendidikan` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(50) NOT NULL,
  `tingkat` varchar(15) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `masuk` date NOT NULL,
  `keluar` date NOT NULL,
  `gelar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `r_pendidikan`
--

INSERT INTO `r_pendidikan` (`id`, `id_pegawai`, `tingkat`, `sekolah`, `jurusan`, `masuk`, `keluar`, `gelar`) VALUES
(5, '19630001', 'S1', 'UNISKA', 'Teknik Informatika', '2019-11-02', '2023-12-02', 'S. KOM');

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
('19630001', 'Wafda', '2023-08-03', 'Penata', 'IIIa', '', 0, 0),
('196306061985032010', 'Rubina', '1985-02-25', 'Pembina', 'IVb', '32', 4811900, 4963400),
('196410031989021002', 'Muhammad Zikri', '1989-02-01', 'Pembina', 'IVb', '30', 4665000, 4811900),
('196603241988042001', 'Yesni Mudiarti', '2004-07-22', 'Pembina', 'IVb', '28', 4522500, 4665000),
('196608111989021001', 'Abdul Hamid', '1989-02-01', 'Pembina', 'IVc', '30', 5068000, 5227600),
('196705091993021003', 'Jumansyah', '1993-02-01', 'Penata', 'IIId', '16', 3456200, 3565000),
('197106112014062004', 'Aida', '2014-06-01', 'Penata', 'IIIb', '22', 3601400, 3601400),
('197503192007012009', 'Mahmudah', '2007-01-01', 'Penata', 'IIIc', '16', 3420300, 3528100),
('197511152000032003', 'Parsini', '2021-02-10', 'Pengatur', 'IId', '8', 2507800, 2586700),
('197711112014061010', 'Akhyar Gunawan', '2017-01-01', 'Penata', 'IIIb', '6', 2810200, 3384900),
('197906162014062005', 'Sri Wahyuni', '2014-01-02', 'Penata', 'IIIc', '18', 3528100, 3639200),
('197910232006041007', 'Wisnu Kartika Hadi Putra', '2007-10-01', 'Penata', 'IIIc', '16', 3420300, 3420300),
('198202102009032008', 'Widarini Febrianingrum', '2009-03-01', 'Penata', 'IIIc', '12', 3214700, 3214700),
('199303192019032019', 'Rika', '2020-03-01', 'Penata', 'IIIa', '2', 2534000, 2613800);

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
(4, 'Ia'),
(5, 'Ib'),
(6, 'Ic'),
(7, 'Id'),
(8, 'IIa'),
(9, 'IIb'),
(10, 'IIc'),
(11, 'IId'),
(12, 'IIIa'),
(13, 'IIIb'),
(14, 'IIIc'),
(16, 'IIId'),
(17, 'IVa'),
(18, 'IVb'),
(19, 'IVc'),
(20, 'IVd'),
(21, 'IVe');

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
(4, 'Kenaikan Gaji', '2023-07-05', '2023-07-12', 'Akan dicairkan'),
(5, 'Pengumpulan Berkas Pensiun', '2023-08-01', '2023-10-10', 'Harap Berkas Segera Dikumpulkan'),
(6, 'Kenaikan Pangkat Berkala', '2023-11-01', '2023-11-30', 'Segera kumpulkan data pribadi dan surat pendukung lainnya');

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
(12, '800.03.8.2023/12-PTK/Dipendik', 'Surat Kenaikan Gaji Berkala', '2023-08-01', 'Parsini', 'Banyumas', '1975-11-15', '197511152000032003', 'Pengatur/IId', 'Guru Mapel', 'SD HIPPINDO', 'Nuryadi, S.Pd.,MA', 'Md.7/1-a/Kp.003/639/2000', '8 Tahun 1 bulan', 2507800, '2023-09-01', 2586700, 'IId', '10 Tahun 1 Bulan', '2023-09-01', '2025-01-01'),
(13, '800.03.8.2023/13-PTK/Dipendik', 'Surat Kenaikan Gaji Berkala', '2023-08-01', 'Akhyar Gunawan', 'Banjarmasin', '1977-11-11', '197711112014061010', 'Penata/IIIb', 'Guru Kelas SD/MI', 'SD NEGERI BENUA ANYAR 2', 'Nuryadi, S.Pd.,MA', '821.13/016-Si.Um/BKD,Diklat', '16 Tahun 0 Bulan', 3281500, '2023-09-01', 3384900, 'IIIb', '18 Tahun 0 Bulan', '2023-09-01', '2025-01-01'),
(14, '800.03.8.2023/14-PTK/Dipendik', 'Surat Kenaikan Gaji Berkala', '2023-08-01', 'Mahmudah', 'Hambuku Pasar', '1975-03-19', '197503192007012009', 'Penata/IIIc', 'Guru Mapel', 'SMP NEGERI 01', 'Nuryadi, S.Pd.,MA', '813.2/008-Si.Peg/BKD', '16 Tahun 0 Bulan', 3420300, '2023-09-01', 3528100, 'IIIc', '18 Tahun 0 Bulan', '2023-09-01', '2025-01-01'),
(15, '800.03.8.2023/15-PTK/Dipendik', 'Surat Kenaikan Gaji Berkala', '2023-08-01', 'Sri Wahyuni', 'Banjarmasin', '1979-06-16', '197906162014062005', 'Penata/IIIc', 'Guru Kelas', 'SD NEGERI GADANG 2', 'Nuryadi, S.Pd.,MA', '821.13/003-KP/BKD,Diklat', '18 Tahun 0 Bulan', 3528100, '2023-09-01', 3639200, 'IIIc', '20 Tahun 0 Bulan', '2023-09-01', '2025-01-01'),
(16, '800.03.8.2023/16-PTK/Dipendik', 'Surat Kenaikan Gaji Berkala', '2023-08-01', 'Rika', 'Banjarmasin', '1993-03-19', '199303192019032019', 'Penata/IIIa', 'Guru Kelas', 'SDN SUNGAI ANDAI 4', 'Nuryadi, S.Pd.,MA', '821.13/078-Forsel/BKD,Diklat/2020', '2 Tahun 0 Bulan', 2534000, '2023-09-01', 2613800, 'IIIa', '4 Tahun 0 Bulan', '2023-09-01', '2025-01-01');

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
('197503192007012009', 'Mahmudah', 'Perempuan', '2007-01-01', 'SMP NEGERI 01', 'sk kgb.pdf'),
('197511152000032003', 'Parsini', 'Perempuan', '2021-02-10', 'SD HIPPINDO', 'sk kgb.pdf'),
('197711112014061010', 'Akhyar Gunawan', 'Laki-laki', '2017-01-01', 'SD NEGERI BENUA ANYAR 2', 'sk kgb.pdf'),
('197906162014062005', 'Sri Wahyuni', 'Perempuan', '2014-01-02', 'SD NEGERI GADANG 2', 'sk kgb.pdf'),
('199303192019032019', 'Rika', 'Perempuan', '2020-03-01', 'SDN SUNGAI ANDAI 4', 'sk kgb.pdf');

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
(4, 'Juru'),
(5, 'Pengatur'),
(6, 'Penata'),
(7, 'Pembina');

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
('19630001', 'Wafda', 'B 0001', 'perempuan', 'Banjarmasin', '2023-08-10', 'Penata', 'IIIa', 'Kepala Bidang PTK', 'Dinas Pendidikan Kota Banjarmasin', '2023-08-03', 'foto cwe formal.jpg'),
('196306061985032010', 'Rubina', 'N 007456', 'perempuan', 'Paringin', '1963-03-03', 'Pembina', 'IVb', 'Guru Mapel', 'SDN - SN PASAR LAMA 1', '1985-02-25', 'foto cwe formal.jpg'),
('196410031989021002', 'Muhammad Zikri', ' P 012511', 'laki-laki', 'Banjarmasin', '1964-10-03', 'Pembina', 'IVb', 'Guru Mapel', 'SMP NEGERI 15', '1989-02-01', 'fto laki-laki formal.jpg'),
('196603241988042001', 'Yesni Mudiarti', 'N 007891', 'perempuan', 'Tabalong', '1966-03-24', 'Pembina', 'IVb', 'Kepala Sekolah', 'SD KARTIKA V-2', '1988-04-01', 'foto cwe formal.jpg'),
('196608111989021001', 'Abdul Hamid', 'E 031255', 'laki-laki', 'Awang', '1966-08-11', 'Pembina', 'IVc', 'Guru Mapel', 'SMP NEGERI 01', '1989-02-01', 'fto laki-laki formal.jpg'),
('196705091993021003', 'Jumansyah', 'B 043781', 'laki-laki', 'Barabai', '1967-05-09', 'Penata', 'IIId', 'Kepala Sekolah', 'SMP MUHAMMADIYAH 6', '1993-02-01', 'fto laki-laki formal.jpg'),
('197106112014062004', 'Aida', 'C 008911', 'perempuan', 'Banjarmasin', '1971-11-06', 'Penata', 'IIIb', 'Tenaga Administrasi Sekolah', 'SMP NEGERI 34', '2014-06-01', 'foto cwe formal.jpg'),
('197503192007012009', 'Mahmudah', 'D 019647', 'perempuan', 'Hambuku Pasar', '1975-03-19', 'Penata', 'IIIc', 'Guru Mapel', 'SMP NEGERI 01', '2007-01-01', 'foto cwe formal.jpg'),
('197511152000032003', 'Parsini', 'B 014567', 'laki-laki', 'Banyumas', '1975-11-15', 'Pengatur', 'IId', 'Guru Mapel', 'SD HIPPINDO', '2015-08-24', 'foto cwe formal.jpg'),
('197711112014061010', 'Akhyar Gunawan', 'Q 023401', 'laki-laki', 'Banjarmasin', '1977-11-11', 'Penata', 'IIIb', 'Guru Kelas SD/MI', 'SD NEGERI BENUA ANYAR 2', '2017-01-01', 'fto laki-laki formal.jpg'),
('197906162014062005', 'Sri Wahyuni', 'A 005399', 'perempuan', 'Banjarmasin', '1979-06-16', 'Penata', 'IIIc', 'Guru Kelas', 'SD NEGERI GADANG 2', '2014-01-02', 'foto cwe formal.jpg'),
('197910232006041007', 'Wisnu Kartika Hadi Putra', 'C 004376', 'laki-laki', 'Probolinggo', '1979-10-23', 'Penata', 'IIIc', 'Guru Mapel', 'SMP NEGERI 05', '2007-10-01', 'fto laki-laki formal.jpg'),
('198202102009032008', 'Widarini Febrianingrum', 'S 027001', 'perempuan', 'Banjarmasin', '1982-02-10', 'Penata', 'IIIc', 'Kepala Sekolah', 'SD NEGERI ANTASAN BESAR 7', '2009-03-01', 'foto cwe formal.jpg'),
('199303192019032019', 'Rika', 'Q 237401', 'perempuan', 'Banjarmasin', '1993-03-19', 'Penata', 'IIIa', 'Guru Kelas', 'SDN SUNGAI ANDAI 4', '2020-03-01', 'foto cwe formal.jpg');

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
(45, 'Ahmad', '1234124335', '1234567890', 'Kadis', 'Untitled.jpeg'),
(46, 'Parsini', '197511152000032003', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(47, 'Yesni Mudiarti', '196603241988042001', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(48, 'Akhyar Gunawan', '197711112014061010', '1234567890', 'Pegawai', 'fto laki-laki formal.jpg'),
(49, 'Jumansyah', '196705091993021003', '1234567890', 'Pegawai', 'fto laki-laki formal.jpg'),
(50, 'Wisnu Kartika Hadi Putra', '197910232006041007', '1234567890', 'Pegawai', 'fto laki-laki formal.jpg'),
(51, 'Aida', '197106112014062004', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(52, 'Mahmudah', '197503192007012009', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(53, 'Rika', '199303192019032019', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(54, 'Widarini Febrianingrum', '198202102009032008', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(55, 'Sri Wahyuni', '197906162014062005', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(57, 'Rubina', '196306061985032010', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(58, 'Abdul Hamid', '196608111989021001', '1234567890', 'Pegawai', 'fto laki-laki formal.jpg'),
(59, 'Muhammad Zikri', '196410031989021002', '1234567890', 'Pegawai', 'fto laki-laki formal.jpg'),
(60, 'Wafda Lina Azkiya', '19630887', '1234567890', 'Pegawai', 'foto cwe formal.jpg'),
(61, 'Wafda', '19630001', '1234567890', 'Pegawai', 'foto cwe formal.jpg');

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
('196306061985032010', 'Rubina', 'Paringin', '1963-03-03', 'perempuan', '60', '2023-09-01', '1985-02-25', '2425900', '2147483647'),
('196608111989021001', 'Abdul Hamid', 'Awang', '1966-08-11', 'laki-laki', '57', '2023-09-01', '1989-02-01', '3015400', '2147483647');

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
('19630887', 'Wafda Lina Azkiya', 'perempuan', '2023-08-09', 'Penata', 'IIIa', 'Kepala Bidang PTK', 4, 2000000, 'Dinas Pendidikan Kota Banjarmasin', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'DITERIMA'),
('197106112014062004', 'Aida', 'perempuan', '2014-06-01', 'Penata', 'IIIb', 'Tenaga Administrasi Sekolah', 8, 2898700, 'SMP NEGERI 34', 'pdf-contoh-surat-pengantar-dari-kepala-sekolah_compress.pdf', 'pdf-sk-pangkat-terakhir_compress.pdf', 'pdf-sk-berkala_compress.pdf', 'DITOLAK'),
('197503192007012009', 'Mahmudah', 'perempuan', '2007-01-01', 'Penata', 'IIIc', 'Guru Mapel', 16, 3420300, 'SMP NEGERI 01', 'pdf-contoh-surat-pengantar-dari-kepala-sekolah_compress.pdf', 'pdf-sk-pangkat-terakhir_compress.pdf', 'pdf-sk-berkala_compress.pdf', 'DITERIMA'),
('197511152000032003', 'Parsini', 'perempuan', '2021-02-10', 'Pengatur', 'IId', 'Guru Mapel', 8, 2507800, 'SD HIPPINDO', 'pdf-contoh-surat-pengantar-dari-kepala-sekolah_compress.pdf', 'pdf-sk-pangkat-terakhir_compress.pdf', 'pdf-sk-berkala_compress.pdf', 'DITERIMA'),
('197711112014061010', 'Akhyar Gunawan', 'laki-laki', '2017-01-01', 'Penata', 'IIIb', 'Guru Kelas SD/MI', 6, 2810200, 'SD NEGERI BENUA ANYAR 2', 'pdf-contoh-surat-pengantar-dari-kepala-sekolah_compress.pdf', 'pdf-sk-pangkat-terakhir_compress.pdf', 'pdf-sk-berkala_compress.pdf', 'DITERIMA'),
('197906162014062005', 'Sri Wahyuni', 'perempuan', '2014-01-02', 'Penata', 'IIIc', 'Guru Kelas', 18, 3528100, 'SD NEGERI GADANG 2', 'pdf-contoh-surat-pengantar-dari-kepala-sekolah_compress.pdf', 'pdf-sk-pangkat-terakhir_compress.pdf', 'pdf-sk-berkala_compress.pdf', 'DITERIMA'),
('197910232006041007', 'Wisnu Kartika Hadi Putra', 'laki-laki', '2007-10-01', 'Penata', 'IIIc', 'Guru Mapel', 16, 3420300, 'SMP NEGERI 05', 'pdf-contoh-surat-pengantar-dari-kepala-sekolah_compress.pdf', 'pdf-sk-pangkat-terakhir_compress.pdf', 'pdf-sk-berkala_compress.pdf', 'DITOLAK'),
('198202102009032008', 'Widarini Febrianingrum', 'perempuan', '2009-03-01', 'Penata', 'IIIc', 'Kepala Sekolah', 12, 3214700, 'SD NEGERI ANTASAN BESAR 7', 'pdf-contoh-surat-pengantar-dari-kepala-sekolah_compress.pdf', 'pdf-sk-pangkat-terakhir_compress.pdf', 'pdf-sk-berkala_compress.pdf', 'DITOLAK'),
('199303192019032019', 'Rika', 'perempuan', '2020-03-01', 'Penata', 'IIIa', 'Guru Kelas', 2, 2534000, 'SDN SUNGAI ANDAI 4', 'pdf-contoh-surat-pengantar-dari-kepala-sekolah_compress.pdf', 'pdf-sk-pangkat-terakhir_compress.pdf', 'pdf-sk-berkala_compress.pdf', 'DITERIMA');

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
('196306061985032010', 'Rubina', 'Paringin', '1963-03-03', 'perempuan', 60, '1985-02-25', 2425900, 2147483647, 'Mencapai Batas Usia Pensiun', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'DITERIMA'),
('196603241988042001', 'Yesni Mudiarti', 'Tabalong', '1966-03-24', 'laki-laki', 57, '1988-04-01', 2665000, 2147483647, 'Mencapai Batas Usia Pensiun', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'DITOLAK'),
('196608111989021001', 'Abdul Hamid', 'Awang', '1966-08-11', 'laki-laki', 57, '1989-02-01', 3015400, 2147483647, 'Mencapai Batas Usia Pensiun', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'sk kgb.pdf', 'DITERIMA');

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
-- Indexes for table `r_keluarga`
--
ALTER TABLE `r_keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_kepegawaian`
--
ALTER TABLE `r_kepegawaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_pendidikan`
--
ALTER TABLE `r_pendidikan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `r_keluarga`
--
ALTER TABLE `r_keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `r_kepegawaian`
--
ALTER TABLE `r_kepegawaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_pendidikan`
--
ALTER TABLE `r_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_golongan`
--
ALTER TABLE `tb_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_info`
--
ALTER TABLE `tb_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kgb`
--
ALTER TABLE `tb_kgb`
  MODIFY `id_kgb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_pangkat`
--
ALTER TABLE `tb_pangkat`
  MODIFY `id_pangkat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
