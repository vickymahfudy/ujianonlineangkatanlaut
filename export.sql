-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 19, 2020 at 08:53 AM
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
  `idmapel` int(11) NOT NULL,
  `idgurumapel` int(11) NOT NULL,
  `statusgrup` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupsoal`
--

INSERT INTO `groupsoal` (`idgroup`, `namagroup`, `idmapel`, `idgurumapel`, `statusgrup`) VALUES
(3, 'UAS - IPA', 2, 0, 'Y'),
(4, 'UTS - Bahasa Indonesia', 1, 0, 'Y');

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
(0, 0, 1, 1),
(0, 0, 2, 1);

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
(4, 3, 1, 3, 'e'),
(5, 3, 1, 1, 'a');

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
(1, 'bhs2020', 'Bahasa Indonesia'),
(2, 'ipa2020', 'IPA');

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
(3, 3, 1, 50, '2020-02-18');

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
(1, 4, 60, '12345', 'aktif', 2, 1),
(4, 3, 10, '333', 'tidak aktif', 2, 1);

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
(1, 4, 'singlechoice', '<p>1+1+1</p>\r\n', '<p>1</p>\r\n', '<p>2</p>\r\n', '<p>3</p>\r\n', '<p>4</p>\r\n', '<p>Semua benar</p>\r\n', 'c', '<p>1+1=2</p>\r\n'),
(3, 4, 'singlechoice', '<p>5x5=</p>\r\n', '<p>25</p>\r\n', '<p>245</p>\r\n', '<p>343</p>\r\n', '<p>2342</p>\r\n', '<p>Tidak benar</p>\r\n', 'e', '<p>yeyeyeye</p>\r\n');

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
(1, '2020', 'Y');

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
(0, 'guru', 'laki-laki', '0', '2020-02-17', 'guru', '0', '0'),
(2, 'admin', 'laki-laki', 'Negara', '1997-01-05', 'admin', 'admin', 'YWRtaW4='),
(3, 'Vicky Mahfudy', 'laki-laki', 'Banyuwangi', '1997-01-05', 'siswa', 'vickym', 'dmlja3lt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groupsoal`
--
ALTER TABLE `groupsoal`
  ADD PRIMARY KEY (`idgroup`);

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
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `idjawab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `idmapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `idnilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setujian`
--
ALTER TABLE `setujian`
  MODIFY `idujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `idsoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tahunajaran`
--
ALTER TABLE `tahunajaran`
  MODIFY `idtahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
