-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 Agu 2019 pada 11.23
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `IdAbsensi` char(14) NOT NULL,
  `Tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`IdAbsensi`, `Tanggal`) VALUES
('20190831020323', '2019-08-26'),
('20190831020324', '2019-08-27'),
('20190831020325', '2019-08-28'),
('20190831020326', '2019-08-29'),
('20190831020327', '2019-08-30'),
('20190831020328', '2019-08-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_karyawan`
--

CREATE TABLE `absensi_karyawan` (
  `IdAbsenKaryawan` char(14) NOT NULL,
  `NoRegistrasi` char(12) DEFAULT NULL,
  `IdAbsensi` char(14) DEFAULT NULL,
  `Jam` time DEFAULT NULL,
  `Keterangan` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_karyawan`
--

INSERT INTO `absensi_karyawan` (`IdAbsenKaryawan`, `NoRegistrasi`, `IdAbsensi`, `Jam`, `Keterangan`) VALUES
('20190831020455', '201908310148', '20190831020324', '10:29:22', 'H'),
('20190831021223', '201908310148', '20190831020323', '04:12:21', 'H'),
('20190831024545', '201908310148', '20190831020325', '07:00:00', 'I'),
('20190831034328', '201908310148', '20190831020326', '07:00:00', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `idBulan` int(11) NOT NULL,
  `namaBulan` varchar(168) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`idBulan`, `namaBulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `IdJabatan` int(2) NOT NULL,
  `NamaJabatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`IdJabatan`, `NamaJabatan`) VALUES
(1, 'Karyawan'),
(2, 'Pimpinan'),
(3, 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `NoRegistrasi` char(12) NOT NULL,
  `IdJabatan` int(2) DEFAULT '1',
  `Nama` varchar(100) DEFAULT NULL,
  `Password` char(50) DEFAULT NULL,
  `Gender` enum('L','P') DEFAULT 'L',
  `TempatLahir` varchar(200) DEFAULT NULL,
  `TglLahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`NoRegistrasi`, `IdJabatan`, `Nama`, `Password`, `Gender`, `TempatLahir`, `TglLahir`) VALUES
('201908310148', 2, 'Rifky', 'c4ca4238a0b923820dcc509a6f75849b', 'L', 'Subang', '2011-11-11'),
('201908310149', 3, 'Riyan', 'c4ca4238a0b923820dcc509a6f75849b', 'L', 'Subang', '2011-11-11'),
('201908310243', 1, 'Dini', NULL, 'P', 'subang', '2011-11-11'),
('201908310244', 1, 'dina', NULL, 'P', 'Subang', '2022-02-22'),
('201908310245', 1, 'Rini', NULL, 'P', 'subang', '2012-02-21'),
('201908310411', 1, 'Koko Nurdin', NULL, 'L', 'Subang', '2012-12-12'),
('201908310413', 1, 'Revi', NULL, 'P', 'subang', '2012-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `idTahun` int(11) NOT NULL,
  `namaTahun` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`idTahun`, `namaTahun`) VALUES
(1, '2019'),
(2, '2020'),
(3, '2021'),
(4, '2022'),
(5, '2023'),
(6, '2024'),
(7, '2025'),
(8, '2026'),
(9, '2027'),
(10, '2028'),
(11, '2029'),
(12, '2030'),
(13, '2031'),
(14, '2032'),
(15, '2033'),
(16, '2034'),
(17, '2035'),
(18, '2036'),
(19, '2037'),
(20, '2037');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`IdAbsensi`);

--
-- Indexes for table `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  ADD PRIMARY KEY (`IdAbsenKaryawan`),
  ADD KEY `IdAbsensi` (`IdAbsensi`),
  ADD KEY `NoRegistrasi` (`NoRegistrasi`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`idBulan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`IdJabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`NoRegistrasi`),
  ADD KEY `IdJabatan` (`IdJabatan`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`idTahun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `idBulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `idTahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  ADD CONSTRAINT `absensi_karyawan_ibfk_1` FOREIGN KEY (`IdAbsensi`) REFERENCES `absensi` (`IdAbsensi`),
  ADD CONSTRAINT `absensi_karyawan_ibfk_2` FOREIGN KEY (`NoRegistrasi`) REFERENCES `karyawan` (`NoRegistrasi`);

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`IdJabatan`) REFERENCES `jabatan` (`IdJabatan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
