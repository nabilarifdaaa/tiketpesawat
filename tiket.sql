-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Mei 2018 pada 07.42
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
-- Struktur dari tabel `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `IdBooking` int(5) NOT NULL,
  `FK_KodePesawat` varchar(30) NOT NULL,
  `FK_IdPenumpang` int(10) NOT NULL,
  `TanggalBook` date NOT NULL,
  `JumlahTiket` int(11) NOT NULL,
  `TotalHarga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
  `IdKota` int(3) NOT NULL,
  `NamaKota` varchar(150) NOT NULL,
  `Bandara` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`IdKota`, `NamaKota`, `Bandara`) VALUES
(1, 'Malang (MLG)', 'Abdul Rahman Saleh (ABD)'),
(2, 'Jakarta (CGK)', 'Soekarno Hatta International Airport'),
(3, 'Bali / Denpasar (DPS)', 'Ngurah Rai Int''l');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE IF NOT EXISTS `penumpang` (
  `IdPenumpang` int(10) NOT NULL,
  `Nama` varchar(150) DEFAULT NULL,
  `KTP` int(20) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `NoHp` int(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesawat`
--

CREATE TABLE IF NOT EXISTS `pesawat` (
  `KodePesawat` varchar(30) NOT NULL,
  `Maskapai` varchar(50) NOT NULL,
  `Boarding` time NOT NULL,
  `Landing` time NOT NULL,
  `FK_IdAsal` int(3) NOT NULL,
  `FK_IdTujuan` int(3) NOT NULL,
  `Kelas` varchar(20) NOT NULL,
  `Harga` int(20) NOT NULL,
  `LogoPesawat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesawat`
--

INSERT INTO `pesawat` (`KodePesawat`, `Maskapai`, `Boarding`, `Landing`, `FK_IdAsal`, `FK_IdTujuan`, `Kelas`, `Harga`, `LogoPesawat`) VALUES
('LionJT-16', 'Lion', '18:45:00', '21:30:00', 2, 3, 'Ekonomi', 534200, ''),
('SriwijayaSJ-251', 'Sriwijaya', '08:30:00', '09:50:00', 1, 2, 'Ekonomi', 553000, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`IdBooking`),
  ADD KEY `FK_KodePesawat` (`FK_KodePesawat`),
  ADD KEY `FK_IdPenumpang` (`FK_IdPenumpang`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`IdKota`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`IdPenumpang`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`KodePesawat`),
  ADD KEY `FK_IdAsal` (`FK_IdAsal`),
  ADD KEY `FK_IdTujuan` (`FK_IdTujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `IdBooking` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `IdKota` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `IdPenumpang` int(10) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`FK_KodePesawat`) REFERENCES `pesawat` (`KodePesawat`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`FK_IdPenumpang`) REFERENCES `penumpang` (`IdPenumpang`);

--
-- Ketidakleluasaan untuk tabel `pesawat`
--
ALTER TABLE `pesawat`
  ADD CONSTRAINT `pesawat_ibfk_1` FOREIGN KEY (`FK_IdAsal`) REFERENCES `kota` (`IdKota`),
  ADD CONSTRAINT `pesawat_ibfk_2` FOREIGN KEY (`FK_IdTujuan`) REFERENCES `kota` (`IdKota`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
