-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Agu 2017 pada 07.48
-- Versi Server: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kursus_arab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_blog`
--

CREATE TABLE IF NOT EXISTS `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_judul` varchar(50) NOT NULL,
  `blog_tgl` varchar(10) NOT NULL,
  `blog_postby` varchar(20) NOT NULL,
  `blog_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_donasi`
--

CREATE TABLE IF NOT EXISTS `tbl_donasi` (
  `donasi_id` int(11) NOT NULL,
  `donasi_nama` varchar(100) NOT NULL,
  `donasi_bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galery`
--

CREATE TABLE IF NOT EXISTS `tbl_galery` (
  `galery_id` int(11) NOT NULL,
  `galery_img_src` varchar(100) NOT NULL,
  `galery_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `jadwal_id` int(11) NOT NULL,
  `jadwal_kelas` varchar(50) NOT NULL,
  `jadwal_jam` varchar(50) NOT NULL,
  `jadwal_mulai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelasbiaya`
--

CREATE TABLE IF NOT EXISTS `tbl_kelasbiaya` (
  `kelasbiaya_id` int(11) NOT NULL,
  `kelasbiaya_nama` varchar(50) NOT NULL,
  `kelasbiaya_ket` text NOT NULL,
  `kelasbiaya_biaya` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfirmasi_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tbl_konfirmasi_pembayaran` (
  `konfirmasi_id` int(11) NOT NULL,
  `konfirmasi_nama` varchar(50) NOT NULL,
  `konfirmasi_email` varchar(100) NOT NULL,
  `konfirmasi_bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_medsos`
--

CREATE TABLE IF NOT EXISTS `tbl_medsos` (
  `medsos_id` int(11) NOT NULL,
  `medsos_nama` varchar(10) NOT NULL,
  `medsos_url` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_medsos`
--

INSERT INTO `tbl_medsos` (`medsos_id`, `medsos_nama`, `medsos_url`) VALUES
(1, 'Facebook', 'facebook.com'),
(2, 'Instagram', 'instagram.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftar`
--

CREATE TABLE IF NOT EXISTS `tbl_pendaftar` (
  `pendaftar_id` int(11) NOT NULL,
  `pendaftar_nama` varchar(50) NOT NULL,
  `pendaftar_email` varchar(100) NOT NULL,
  `pendaftar_no_telp` varchar(15) NOT NULL,
  `pendaftar_kelas` varchar(10) NOT NULL,
  `pendaftar_jadwal` varchar(10) NOT NULL,
  `pendaftar_alamat` text NOT NULL,
  `pendaftar_ket_lain` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_testimoni`
--

CREATE TABLE IF NOT EXISTS `tbl_testimoni` (
  `testimoni_id` int(11) NOT NULL,
  `testimoni_nama` varchar(50) NOT NULL,
  `testimoni_email` varchar(50) NOT NULL,
  `testimoni_pekerjaan` varchar(50) NOT NULL,
  `testimoni_testimoni` text NOT NULL,
  `testimoni_ind` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`donasi_id`);

--
-- Indexes for table `tbl_galery`
--
ALTER TABLE `tbl_galery`
  ADD PRIMARY KEY (`galery_id`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indexes for table `tbl_kelasbiaya`
--
ALTER TABLE `tbl_kelasbiaya`
  ADD PRIMARY KEY (`kelasbiaya_id`);

--
-- Indexes for table `tbl_konfirmasi_pembayaran`
--
ALTER TABLE `tbl_konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`);

--
-- Indexes for table `tbl_medsos`
--
ALTER TABLE `tbl_medsos`
  ADD PRIMARY KEY (`medsos_id`);

--
-- Indexes for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  ADD PRIMARY KEY (`pendaftar_id`);

--
-- Indexes for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  ADD PRIMARY KEY (`testimoni_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `donasi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_galery`
--
ALTER TABLE `tbl_galery`
  MODIFY `galery_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `jadwal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_kelasbiaya`
--
ALTER TABLE `tbl_kelasbiaya`
  MODIFY `kelasbiaya_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_konfirmasi_pembayaran`
--
ALTER TABLE `tbl_konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_medsos`
--
ALTER TABLE `tbl_medsos`
  MODIFY `medsos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pendaftar`
--
ALTER TABLE `tbl_pendaftar`
  MODIFY `pendaftar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_testimoni`
--
ALTER TABLE `tbl_testimoni`
  MODIFY `testimoni_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
