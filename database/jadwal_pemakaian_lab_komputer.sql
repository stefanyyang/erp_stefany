-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 09:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_pemakaian_lab_komputer`
--

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id_blok` int(4) NOT NULL,
  `nama_blok` varchar(100) NOT NULL,
  `remark_blok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id_blok`, `nama_blok`, `remark_blok`) VALUES
(1, 'blok 1', 'belajar'),
(3, 'blok 2', 'mapel'),
(5, 'blok 9', 'mapel'),
(6, 'BLOK 3', 'mapel');

-- --------------------------------------------------------

--
-- Table structure for table `hadir`
--

CREATE TABLE `hadir` (
  `id_hadir` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('Sakit','Ijin','Alfa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hadir`
--

INSERT INTO `hadir` (`id_hadir`, `nama`, `kelas`, `tanggal`, `keterangan`) VALUES
(1, 'stefanyy', 'RPL XII B', '2024-04-21', 'Sakit'),
(2, 'Arizka', 'RPL XII B', '2024-04-21', 'Alfa');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `id_lab` int(4) NOT NULL,
  `id_blok` int(4) NOT NULL,
  `id_pelajaran` int(4) NOT NULL,
  `jam` varchar(100) NOT NULL,
  `sesi` varchar(100) NOT NULL,
  `tgl` date NOT NULL,
  `nama_tahun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `id_lab`, `id_blok`, `id_pelajaran`, `jam`, `sesi`, `tgl`, `nama_tahun`) VALUES
(18, 2, 4, 1, 4, '0', '0', '2023-09-25', '0'),
(19, 0, 0, 0, 0, '1', '1', '2023-09-01', '1'),
(20, 8, 8, 6, 8, '2', '2', '2023-09-25', '2'),
(21, 5, 8, 1, 6, '9', '5', '2024-03-21', '5');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(4) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `remark_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `remark_kelas`) VALUES
(2, 'RPL XII A', 'belajar'),
(3, 'RPL XII B', 'belajar'),
(5, 'RPL XII C', 'belajar'),
(7, 'AKL XII', 'mapell'),
(8, 'BDP XII ', 'MARKETING');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(4) NOT NULL,
  `remark_lab` varchar(100) NOT NULL,
  `nama_lab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `remark_lab`, `nama_lab`) VALUES
(4, 'kimia', 'lab ipa'),
(5, 'coding', 'lab komputer'),
(8, 'belajar', 'lab ph');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(4) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `sesi` varchar(100) NOT NULL,
  `hadir` varchar(100) NOT NULL,
  `keterangan` enum('Sakit','Ijin','Alfa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mapel`, `tanggal`, `sesi`, `hadir`, `keterangan`) VALUES
(1, 'siskom', '2024-04-21', '1', 'stefany', 'Alfa'),
(2, 'bahasa indonesia', '2024-04-21', '4', 'arizka', 'Sakit');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(4) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `nama_pelajaran`, `guru`) VALUES
(4, 'ipa', 'buk santun'),
(5, 'mtk', 'pak prans'),
(6, 'basis data', 'pak if'),
(8, 'conversation', 'buk marni');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_pengguna` date NOT NULL,
  `id_user_user` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `id_user`, `id_kelas`, `nama`, `ttl`, `nik`, `jk`, `alamat`, `tanggal_pengguna`, `id_user_user`) VALUES
(12, 0, 2, 'stefany', 'batam, 23 juni 2006', '12345', 'Perempuan', 'baloi', '0000-00-00', 6),
(15, 0, 0, '', '', '1', '', '', '0000-00-00', 8),
(17, 0, 0, '', '', '1', '', ',nkm', '0000-00-00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(4) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nik`, `nama`, `kelas`) VALUES
(1, '7777', 'tuti', 'RPL XII C'),
(2, '21161077', 'stefany yang', 'RPL XII B');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '123', 1),
(2, 'penanggung jawab', '12345', 2),
(3, 'guru', '000', 3),
(4, 'siswa', 'siswa', 4),
(6, 'fanyy', '698d51a19d8a121ce581499d7b701668', 4),
(8, '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(9, 'fany', '57f842286171094855e51fc3a541c1e2', 4),
(11, '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(12, '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(14, '', 'd41d8cd98f00b204e9800998ecf8427e', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id_blok`);

--
-- Indexes for table `hadir`
--
ALTER TABLE `hadir`
  ADD PRIMARY KEY (`id_hadir`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id_blok` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hadir`
--
ALTER TABLE `hadir`
  MODIFY `id_hadir` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
