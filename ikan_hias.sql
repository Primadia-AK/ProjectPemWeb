-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Des 2024 pada 05.05
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikan_hias`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_ikan` varchar(255) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_ikan`, `kategori`, `harga_beli`, `harga_jual`, `gambar`) VALUES
(3, 'Cupang', 'Air Tawar', 10000.00, 17000.00, '1735613864_download.jpeg'),
(4, 'Koki', 'Air Tawar', 39000.00, 50000.00, '1735613941_download (2).jpeg'),
(5, 'Ikan Badut', 'Air Laut', 50000.00, 75000.00, '1735614033_download (1).jpeg'),
(6, 'Guppy', 'Air Tawar', 5000.00, 10000.00, 'images.jpeg'),
(7, 'JihanBadut', 'Air Tawar', 1000.00, 500.00, '86efd437d922088ddb8b23887128edb7.jpg'),
(8, 'Molly', 'Air Tawar', 7000.00, 10000.00, 'the-mollie-1380726-03-e139588525c84a7b99846539fb5d0ae7_11zon-1536x1024.jpg'),
(9, 'Platy', 'Air Tawar', 8000.00, 16000.00, 'images (1).jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
