-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Mei 2018 pada 14.35
-- Versi Server: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kotaasal`
--

CREATE TABLE IF NOT EXISTS `kotaasal` (
  `IdAsal` int(11) NOT NULL,
  `KotaAsal` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kotaasal`
--

INSERT INTO `kotaasal` (`IdAsal`, `KotaAsal`) VALUES
(1, 'Malang(MLG)'),
(2, 'Surabaya(SUB)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kotatujuan`
--

CREATE TABLE IF NOT EXISTS `kotatujuan` (
  `IdTujuan` int(11) NOT NULL,
  `KotaTujuan` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kotatujuan`
--

INSERT INTO `kotatujuan` (`IdTujuan`, `KotaTujuan`) VALUES
(1, 'Jakarta(JKTA)'),
(2, 'Bali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE IF NOT EXISTS `penumpang` (
  `KodeBook` int(10) NOT NULL,
  `KodePesawat` varchar(30) NOT NULL,
  `Nama` varchar(150) DEFAULT NULL,
  `KTP` int(20) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `NoHp` int(13) DEFAULT NULL,
  `Tanggal` date DEFAULT NULL,
  `JumlahTiket` int(3) DEFAULT NULL,
  `TempatDuduk` varchar(20) DEFAULT NULL,
  `TotalHarga` int(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`KodeBook`, `KodePesawat`, `Nama`, `KTP`, `Email`, `NoHp`, `Tanggal`, `JumlahTiket`, `TempatDuduk`, `TotalHarga`) VALUES
(3, 'Lion-JT831', 'lala', 123, 'nabilarifdaaa@gmail.com', 2147483647, '2018-05-06', NULL, '1a', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE IF NOT EXISTS `pesawat` (
  `KodePesawat` varchar(30) NOT NULL,
  `Maskapai` varchar(50) NOT NULL,
  `Landing` time NOT NULL,
  `Boarding` time NOT NULL,
  `IdAsal` int(11) NOT NULL,
  `IdTujuan` int(100) NOT NULL,
  `BandaraAsal` varchar(100) NOT NULL,
  `BandaraTujuan` varchar(100) NOT NULL,
  `Kelas` varchar(20) NOT NULL,
  `Harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`KodePesawat`, `Maskapai`, `Landing`, `Boarding`, `IdAsal`, `IdTujuan`, `BandaraAsal`, `BandaraTujuan`, `Kelas`, `Harga`) VALUES
('Batik ID-7580', 'Batik Air', '12:00:00', '10:30:00', 1, 1, 'ABD', 'CGK', 'Ekonomi', 696000),
('Citilink QG-751', 'Citilink ', '12:45:00', '11:15:00', 1, 1, 'ABD', 'CGK', 'Ekonomi', 740000),
('Lion-JT831', 'Lion', '08:25:00', '10:00:00', 1, 1, 'ABD', 'CGK', 'Ekonomi', 674000),
('Sriwijara-SJ257', 'Sriwijaya', '06:20:00', '05:00:00', 2, 1, 'JUANDA', 'CGK', 'Ekonomi', 510800),
('Sriwijaya SJ-251', 'Sriwijaya', '09:50:00', '08:30:00', 1, 1, 'ABD', 'CGK', 'Ekonomi', 440800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kotaasal`
--
ALTER TABLE `kotaasal`
  ADD PRIMARY KEY (`IdAsal`);

--
-- Indexes for table `kotatujuan`
--
ALTER TABLE `kotatujuan`
  ADD PRIMARY KEY (`IdTujuan`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`KodeBook`),
  ADD KEY `fk1` (`KodePesawat`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`KodePesawat`),
  ADD KEY `fk0` (`IdAsal`),
  ADD KEY `fk1` (`IdTujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kotaasal`
--
ALTER TABLE `kotaasal`
  MODIFY `IdAsal` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kotatujuan`
--
ALTER TABLE `kotatujuan`
  MODIFY `IdTujuan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `KodeBook` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD CONSTRAINT `penumpang_ibfk_1` FOREIGN KEY (`KodePesawat`) REFERENCES `pesawat` (`KodePesawat`);

--
-- Ketidakleluasaan untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD CONSTRAINT `pesawat_ibfk_1` FOREIGN KEY (`IdAsal`) REFERENCES `kotaasal` (`IdAsal`),
  ADD CONSTRAINT `pesawat_ibfk_2` FOREIGN KEY (`IdTujuan`) REFERENCES `kotatujuan` (`IdTujuan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
