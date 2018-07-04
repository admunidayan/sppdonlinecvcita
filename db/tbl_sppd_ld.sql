-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04 Jul 2018 pada 17.48
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd32`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sppd_ld`
--

CREATE TABLE `tbl_sppd_ld` (
  `id_sppd_ld` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `no_bukti` varchar(114) DEFAULT NULL,
  `tgl_bukti` varchar(114) DEFAULT NULL,
  `keperluan` text,
  `kd_anggaran` varchar(114) DEFAULT NULL,
  `jml_bayar` int(20) DEFAULT NULL,
  `id_golongan` int(11) DEFAULT NULL,
  `tujuan` varchar(114) DEFAULT NULL,
  `tgl_berangkat` varchar(114) DEFAULT NULL,
  `tgl_kembali` varchar(114) DEFAULT NULL,
  `lama_hari` varchar(114) DEFAULT NULL,
  `uang_perhari` int(20) DEFAULT NULL,
  `uang_total` int(20) DEFAULT NULL,
  `akomodasi_hotel` int(20) DEFAULT NULL,
  `biaya_representasi` int(20) DEFAULT NULL,
  `biaya_lain` int(20) DEFAULT NULL,
  `biaya_tiket_pp` int(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `nama_penginapan` varchar(114) DEFAULT NULL,
  `tujuan_ta` varchar(114) DEFAULT NULL,
  `tgl_ta_berangkat` varchar(114) DEFAULT NULL,
  `pesawat_berangkat` varchar(114) DEFAULT NULL,
  `no_tiket_berangkat` varchar(114) DEFAULT NULL,
  `kd_book_berangkat` varchar(114) DEFAULT NULL,
  `harga_berangkat` int(20) DEFAULT NULL,
  `tgl_ta_kembali` varchar(114) DEFAULT NULL,
  `pesawat_kembali` varchar(114) DEFAULT NULL,
  `no_tiket_kembali` varchar(114) DEFAULT NULL,
  `kd_book_kembali` varchar(114) DEFAULT NULL,
  `harga_kembali` int(20) DEFAULT NULL,
  `keterangan` text,
  `id_angkutan` int(11) NOT NULL,
  `uraian_kas` text NOT NULL,
  `volume_ot` int(11) NOT NULL,
  `no_rek` varchar(114) NOT NULL,
  `pejabat_yang_memerintah` varchar(114) NOT NULL,
  `id_pegawai_ttd` int(11) NOT NULL,
  `id_stat_pg_ttd` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tiba_berangkat` varchar(114) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_sppd_ld`
--
ALTER TABLE `tbl_sppd_ld`
  ADD PRIMARY KEY (`id_sppd_ld`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_sppd_ld`
--
ALTER TABLE `tbl_sppd_ld`
  MODIFY `id_sppd_ld` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
