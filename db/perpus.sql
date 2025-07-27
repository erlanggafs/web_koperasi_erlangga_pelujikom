-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3310
-- Waktu pembuatan: 21 Jul 2025 pada 11.21
-- Versi server: 8.0.30
-- Versi PHP: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` int NOT NULL,
  `kategori` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_rak` int NOT NULL,
  `no_laci` int NOT NULL,
  `no_boks` int NOT NULL,
  `judul_sales` varchar(100) NOT NULL,
  `nama_pengarang` varchar(100) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id`, `kategori`, `no_rak`, `no_laci`, `no_boks`, `judul_sales`, `nama_pengarang`, `tahun_terbit`, `penerima`, `penerbit`, `status`, `keterangan`) VALUES
(40, 'sales Anak Anak', 15, 15, 15, '4 sehat 5 sempurna', 'tri aksara', '2030-12-31', 'Tk zahira', 'Elfata Andi', 'Dipinjam', '12345678'),
(41, 'sales Anak Anak', 16, 16, 16, 'Lingkungan sehat', 'roro tri muji', '2019-01-09', 'Tk zahira', 'Andalas', 'Dipinjam', '12345678'),
(43, 'sales Anak Anak', 233, 34242, 234324, 'Jokowi', 'Mulyono', '2022-12-31', 'Rakyat', 'Negara Konoha', 'Ada', 'lawak'),
(44, 'sales Anak Anak', 23, 41, 14, 'Gatka pubg', 'Tencent', '2024-05-05', 'unpam', 'Pubg', 'Ada', 'ya'),
(45, 'sales Novel', 5, 6, 75, 'Kancil dan Bahlil', 'Bahlil', '2024-10-15', 'Azzam', 'Media Hoak Nasional', 'Ada', 'aman'),
(46, 'sales Anak Anak', 23, 90, 123, 'Kancil dan wkwk', 'wkkwk', '2025-07-21', 'aam', 'jawamedia', 'Ada', 'aman aja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `judul_sales` varchar(50) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `tgl_pinjam` varchar(25) NOT NULL,
  `tgl_kembali` varchar(25) NOT NULL,
  `lama_pinjam` int NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`judul_sales`, `peminjam`, `nim`, `tgl_pinjam`, `tgl_kembali`, `lama_pinjam`, `keterangan`, `id`) VALUES
('Kancil dan Buaya', 'Kamil', '', '2018-12-03', '2018-12-19', 16, 'Untuk Anak', 9),
('hidup sehat', 'Yanto', '', '2019-01-15', '2019-01-17', 2, 'untuk anak', 10),
('Jokowi', 'erlang', '', '2025-07-21', '2025-07-28', 7, '20101145049', 12),
('Jokowi', 'Fahrul', '', '2025-07-21', '2025-07-24', 3, 'gibran', 13),
('4 sehat 5 sempurna', 'Faiz', '', '2025-07-21', '2025-07-28', 8, 'jawa', 14),
('Lingkungan sehat', 'Gibran', '2010114504323', '2025-07-21', '2025-08-08', 19, 'jawa', 15);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `paswd` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `paswd`, `email`, `nama`, `level`, `ket`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'erlangga@gmail.com', 'Erlangga', 1, 'Staff Koperasi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
