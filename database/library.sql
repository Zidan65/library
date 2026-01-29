CREATE DATABASE IF NOT EXISTS library;
USE library;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2026 at 11:11 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul` varchar(150) NOT NULL,
  `pengarang` varchar(150) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `tahun_terbit` year NOT NULL,
  `id_kategori` int NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `status` enum('tersedia','dipinjam') NOT NULL DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `id_kategori`, `deskripsi`, `cover`, `status`) VALUES
(18, 'Timun Mas', 'Eko Endarmoko', 'Grasindo', 2007, 4, 'Dongeng rakyat Jawa tentang seorang gadis bernama Timun Mas yang lahir dari timun ajaib. Ia dikejar oleh raksasa yang ingin memakannya, tapi berhasil lolos dengan kecerdikannya dan bantuan benda-benda ajaib dari ibunya.', 'timun_mas.jpg', 'dipinjam'),
(19, 'Maling Kundang', 'Dwi Purnawat', 'Gramedia', 2008, 4, 'Legenda dari Sumatera Barat tentang Malin Kundang, anak durhaka yang menolak mengakui ibunya setelah menjadi kaya. Ia dikutuk menjadi batu sebagai akibat dari doa sang ibu.', 'maling_kundang.jpg', 'tersedia'),
(20, 'Asal Usul Danau Toba', 'M. Siregar', 'Balai Bahasa Sumut', 2006, 4, 'Legenda tentang seorang pria yang menikahi gadis jelmaan ikan. Saat ia melanggar janjinya, terjadi banjir besar yang membentuk Danau Toba.', 'danau_toba3.jpg', 'tersedia'),
(21, 'Kancil dan Harimau', 'Edi Hartono', 'Gramedia Widiasarana Indonesia', 2010, 4, 'Si Kancil kembali menunjukkan kecerdasannya dengan menipu harimau agar tidak memakannya, biasanya dengan berpura-pura sedang menjalankan perintah raja atau menakut-nakuti harimau dengan akalnya.', 'kancil_dan_harimau.jpg', 'tersedia'),
(22, 'Kancil dan Buaya', 'Renny Yaniar', ' Dar! Mizan', 2009, 4, 'Dongeng fabel tentang si Kancil yang cerdik. Ia menipu para buaya agar bisa menyeberangi sungai dengan berpura-pura menghitung jumlah mereka untuk raja hutan.', 'kancil_dan_buaya.jpg', 'tersedia'),
(31, 'Legenda Salatiga', 'Gin Subiharso', 'Dinas Pariwisata Kota Salatiga', 2015, 4, 'Bercerita tentang seorang raja yang adil namun tegas. Ia menghukum tiga pejabat yang berkhianat. Nama \"Salatiga\" berasal dari peristiwa ini, artinya \"salah tiga orang.\"', 'legenda_salatiga.jpg', 'tersedia'),
(36, 'Hujan', 'Tere Liye', 'Gramedia Pustaka Utama', 2016, 5, 'Novel tentang Lail, gadis yang kehilangan keluarganya karena bencana. Dalam penyembuhan trauma, ia mengenang cinta dan pengorbanan bersama Esok.', '370c642eeade9a580d928ec1dd98bdae.jpg', 'tersedia'),
(37, 'Pulang', 'Tere Liye', 'Republika Penerbit', 2015, 5, 'Pulang mengisahkan perjalanan Bujang, dari anak desa menjadi eksekutor andal dalam organisasi kriminal, sambil mencari makna keluarga dan jati diri.\r\n', '03651a9a9676a058982fac7f886f66e6.jpg', 'dipinjam'),
(38, 'Seni Budaya', 'Tim Penulis Kemendikbud', 'Kementerian Pendidikan dan Kebudayaan Republik Indonesia', 2015, 10, 'bagus untuk belajar', '1f98b9713afcce91490328aeb958299b.jpg', 'tersedia'),
(39, 'Tentang Kamu', 'Tere Liye', 'Republika Penerbit', 2016, 5, 'bagus', '6186a0e5064e5e0382d0e51527d3f6c3.jpg', 'tersedia'),
(40, 'Sejarah Perang: Kerajaan-kerajaan di Nusantara', 'Sri Wintala Achmad', 'Araska', 2018, 3, 'menarik', 'd08b7ab8c44d4c4acf1792a2cef90a87.jpg', 'tersedia'),
(49, 'Kesombongan Semut (The Arrogant Ant)', 'Ahmad Filyan', 'Serba Jaya Surabaya', 2022, 4, 'bagus', '2119d91c2690e92335eef6daae904b93.jpg', 'dipinjam'),
(52, 'Asal Usul Danau Toba', 'Tere Liye', 'PT Gramedia Pustaka Utama', 2015, 4, 'bagus', '74077b0dcb60dffdde58d2ef545d24d2.jpg', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(3, 'Sejarah'),
(4, 'Dongeng'),
(5, 'Novel'),
(10, 'Pelajaran '),
(24, 'Cerita Bergambar');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `nama_user` varchar(200) NOT NULL,
  `id_buku` int NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan') DEFAULT 'dipinjam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nama_user`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(12, 'dani', 36, '2025-10-02', '2025-12-05', 'dikembalikan'),
(13, 'gani', 37, '2025-10-02', '2026-03-23', 'dipinjam'),
(14, 'indra', 40, '2025-10-08', '2025-11-24', 'dikembalikan'),
(18, 'Dani', 49, '2025-12-01', '2025-12-02', 'dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$pHP2U6O.ZOVABAAds8Vof.6wsTtlA7AFe/9048KNqO1QuwNq06rbm', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
