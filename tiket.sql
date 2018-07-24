-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Jul 2018 pada 14.41
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
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `email`, `username`, `password`) VALUES
(2, 'Nabila Rifda Ristyawan', 'nabilarifdaaa@gmail.com', 'lala', '2e3817293fc275dbee74bd71ce6eb056');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`IdBooking`, `FK_KodePesawat`, `FK_IdPenumpang`, `TanggalBook`, `JumlahTiket`, `TotalHarga`) VALUES
(3, 'SriwijayaSJ-251', 1, '2018-05-13', 1, 553000),
(4, 'GarudaGA-291', 1, '2018-05-14', 1, 758700),
(5, 'BatikID-7582', 1, '2018-05-15', 1, 742200),
(6, 'LionJT-815', 1, '2018-05-15', 1, 418800);

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
  `NoHp` int(13) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`IdPenumpang`, `Nama`, `KTP`, `Email`, `NoHp`, `username`, `password`) VALUES
(1, 'Nabila', 1234, 'nabila@gmail.com', 12344, '', '');

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
('BatikID-7582', 'Batik Air', '14:30:00', '16:00:00', 1, 2, 'Ekonomi', 742200, 'batik air.jpg'),
('CitilinkQG-751', 'Citilink', '11:15:00', '12:45:00', 1, 2, 'Ekonomi', 429800, 'download.png'),
('GarudaGA-291', 'Garuda', '10:55:00', '12:30:00', 1, 2, 'Ekonomi', 758700, 'Logo_Garuda_Indonesia.jpg'),
('LionJT-16', 'Lion', '18:45:00', '21:30:00', 2, 3, 'Ekonomi', 534200, 'Screen shot 2012-02-10 at 04.50.00  - Copy.png'),
('LionJT-815', 'Lion', '12:45:00', '13:55:00', 1, 2, 'Ekonomi', 418800, 'Screen shot 2012-02-10 at 04.50.00 .png'),
('SriwijayaSJ-251', 'Sriwijaya', '08:30:00', '09:50:00', 1, 2, 'Ekonomi', 553000, 'sriwijaya air.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'lala', '2e3817293fc275dbee74bd71ce6eb056');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `IdBooking` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `IdKota` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `IdPenumpang` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
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
