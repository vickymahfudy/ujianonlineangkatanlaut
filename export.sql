-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 13, 2020 at 01:23 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `pkl`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupsoal`
--

CREATE TABLE `groupsoal` (
  `idgroup` int(11) NOT NULL,
  `namagroup` varchar(50) NOT NULL,
  `idgurumapel` int(11) NOT NULL,
  `statusgrup` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupsoal`
--

INSERT INTO `groupsoal` (`idgroup`, `namagroup`, `idgurumapel`, `statusgrup`) VALUES
(8, 'percobaan', 2, 'N'),
(9, 'percobaan 2', 4, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `gurumapel`
--

CREATE TABLE `gurumapel` (
  `idgurumapel` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idmapel` int(11) NOT NULL,
  `idtahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gurumapel`
--

INSERT INTO `gurumapel` (`idgurumapel`, `iduser`, `idmapel`, `idtahun`) VALUES
(1, 24, 25, 1),
(2, 24, 26, 1),
(3, 26, 26, 1),
(4, 32, 27, 1),
(5, 24, 28, 1),
(6, 26, 27, 1),
(7, 32, 26, 1),
(8, 32, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `idjawab` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idujian` int(11) NOT NULL,
  `idsoal` int(11) NOT NULL,
  `jawaban` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`idjawab`, `iduser`, `idujian`, `idsoal`, `jawaban`) VALUES
(128, 25, 13, 8, 'a, b, c, d, e'),
(129, 25, 13, 8, 'a, b, c, d, e'),
(130, 25, 13, 5, 'a'),
(131, 25, 13, 7, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `idmapel` int(11) NOT NULL,
  `kdmapel` varchar(20) NOT NULL,
  `mapel` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`idmapel`, `kdmapel`, `mapel`) VALUES
(30, 'IG001', 'Fisika 1'),
(31, 'IG002', 'Matematika 1');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `idnilai` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idujian` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`idnilai`, `iduser`, `idujian`, `nilai`, `tgl`) VALUES
(51, 25, 13, 100, '2019-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `setujian`
--

CREATE TABLE `setujian` (
  `idujian` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `token` varchar(10) NOT NULL,
  `status` enum('aktif','tidak aktif','','') NOT NULL,
  `rangesoal` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setujian`
--

INSERT INTO `setujian` (`idujian`, `idgroup`, `waktu`, `token`, `status`, `rangesoal`, `user`) VALUES
(13, 8, 100, 'specialone', 'aktif', 4, 24),
(17, 8, 10, '100', 'aktif', 2, 26);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `idsoal` int(11) NOT NULL,
  `idgroup` int(11) NOT NULL,
  `jenissoal` enum('singlechoice','truefalse','shortanswer','sorting','multipleanswer') NOT NULL,
  `soal` longtext NOT NULL,
  `pilihana` longtext NOT NULL,
  `pilihanb` longtext NOT NULL,
  `pilihanc` longtext NOT NULL,
  `pilihand` longtext NOT NULL,
  `pilihane` longtext NOT NULL,
  `pilihanbenar` varchar(20) NOT NULL,
  `pembahasan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`idsoal`, `idgroup`, `jenissoal`, `soal`, `pilihana`, `pilihanb`, `pilihanc`, `pilihand`, `pilihane`, `pilihanbenar`, `pembahasan`) VALUES
(5, 8, 'singlechoice', '<p>President pertama republik Indonesia ?</p>\r\n', '<p>Soekarno</p>\r\n', '<p>Bung Hatta</p>\r\n', '<p>Soeharto</p>\r\n', '<p>Habibie</p>\r\n', '<p>Jusuf Kalla</p>\r\n', 'a', '<p>jawaban yang benar adalah A</p>\r\n'),
(7, 8, 'truefalse', '<p>soekarno adalah presiden ke 10</p>\r\n', '', '', '', '', '', 'false', '<p>salah, karena soekarno presiden ke 1</p>\r\n'),
(8, 8, 'multipleanswer', '<p>berikut ini adalah presiden RI</p>\r\n', '<p>soekarno</p>\r\n', '<p>soeharto</p>\r\n', '<p>SBY</p>\r\n', '<p>Jokowi</p>\r\n', '<p>Gusdur</p>\r\n', 'a, b, c, d, e', '<p>semua jawaban benar</p>\r\n'),
(9, 8, 'sorting', '<p>urutkan kejadian berikut</p>\r\n', 'berangkat sekolah', 'sarapan', 'berpakaian', 'mandi', 'Bangun tidur', 'e,d,c,b,a', '');

-- --------------------------------------------------------

--
-- Table structure for table `tahunajaran`
--

CREATE TABLE `tahunajaran` (
  `idtahun` int(11) NOT NULL,
  `tahun` varchar(11) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahunajaran`
--

INSERT INTO `tahunajaran` (`idtahun`, `tahun`, `status`) VALUES
(2, '2019 Genap', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `namauser` varchar(30) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tgllahir` date NOT NULL,
  `status` enum('admin','siswa','guru') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `jk`, `tempatlahir`, `tgllahir`, `status`, `username`, `password`) VALUES
(1, 'admin', 'laki-laki', 'Negara', '2000-08-05', 'admin', 'admin', 'YWRtaW4='),
(32, 'guru', 'laki-laki', 'Banyuwangi', '1997-01-05', 'guru', 'guru', 'Z3VydQ=='),
(33, 'siswa', 'laki-laki', 'Banyuwangi', '1997-01-15', 'siswa', 'siswa', 'c2lzd2E=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groupsoal`
--
ALTER TABLE `groupsoal`
  ADD PRIMARY KEY (`idgroup`);

--
-- Indexes for table `gurumapel`
--
ALTER TABLE `gurumapel`
  ADD PRIMARY KEY (`idgurumapel`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`idjawab`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`idmapel`),
  ADD UNIQUE KEY `kdmapel` (`kdmapel`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`idnilai`);

--
-- Indexes for table `setujian`
--
ALTER TABLE `setujian`
  ADD PRIMARY KEY (`idujian`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`idsoal`);

--
-- Indexes for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  ADD PRIMARY KEY (`idtahun`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groupsoal`
--
ALTER TABLE `groupsoal`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gurumapel`
--
ALTER TABLE `gurumapel`
  MODIFY `idgurumapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `idjawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `idmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `setujian`
--
ALTER TABLE `setujian`
  MODIFY `idujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `idsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `idtahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
