-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2017 at 04:32 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jadwalperkuliahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `npp` int(20) NOT NULL,
  `namadosen` varchar(100) NOT NULL,
  `nohp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`npp`, `namadosen`, `nohp`) VALUES
(23123213, 'Kiki', '0897856456'),
(23123346, 'Heri Saputra', '01827812373'),
(23123567, 'Mulya Ahmad S.Kom', '081723673'),
(23123918, 'Rudi Saputra S.Kom', '0173268238');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(3) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` varchar(8) NOT NULL,
  `jam_akhir` varchar(8) NOT NULL,
  `kodemakul` varchar(6) NOT NULL,
  `idruangan` int(3) NOT NULL,
  `idkelas` int(11) NOT NULL,
  `npp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `hari`, `jam_mulai`, `jam_akhir`, `kodemakul`, `idruangan`, `idkelas`, `npp`) VALUES
(26, 'Senin', '07:00', '09:00', 'AKB201', 8, 2, 23123918),
(28, 'Senin', '09:00', '12:00', 'SKB102', 8, 2, 23123346),
(29, 'Senin', '12:00', '15:00', 'SKB102', 8, 2, 23123567),
(30, 'Senin', '07:00', '09:00', 'AKB201', 9, 2, 23123213),
(31, 'Selasa', '07:00', '09:00', 'AKB201', 8, 2, 23123346);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(3) NOT NULL,
  `kelas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `kelas`) VALUES
(2, 'TI-2B');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kodemakul` varchar(6) NOT NULL,
  `makul` varchar(50) NOT NULL,
  `semester` int(2) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kodemakul`, `makul`, `semester`, `prodi`) VALUES
('AKB201', 'Aplikasi DBMS', 1, 'TI'),
('SKB101', 'Pemrograman Java 1', 1, 'TI'),
('SKB102', 'Pemrograman Java 2', 2, 'TI'),
('SKB123', 'Sistem Pakar', 1, 'TI'),
('SKB124', 'Teknik Riset Operasi', 5, 'TI');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `idruangan` int(3) NOT NULL,
  `ruangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`idruangan`, `ruangan`) VALUES
(8, 'LID1'),
(9, 'LID2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `no_identitas`, `password`, `status`) VALUES
(0, 1, 'eecba96bd7dda234fcf173c62aa38a84', 'adm'),
(1, 19970116, 'eecba96bd7dda234fcf173c62aa38a84', 'dsn'),
(2, 154118, 'eecba96bd7dda234fcf173c62aa38a84', 'mhs'),
(3, 69, '21232f297a57a5a743894a0e4a801fc3', 'adm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`npp`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`),
  ADD KEY `kodemakul` (`kodemakul`),
  ADD KEY `idruangan` (`idruangan`),
  ADD KEY `idkelas` (`idkelas`),
  ADD KEY `npp` (`npp`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kodemakul`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`idruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `idruangan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idkelas`) REFERENCES `kelas` (`idkelas`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`idruangan`) REFERENCES `ruangan` (`idruangan`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`kodemakul`) REFERENCES `matakuliah` (`kodemakul`),
  ADD CONSTRAINT `jadwal_ibfk_4` FOREIGN KEY (`npp`) REFERENCES `dosen` (`npp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
