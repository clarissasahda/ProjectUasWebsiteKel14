-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 04:35 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `Id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `Input` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`Id`, `judul`, `Input`) VALUES
(1, 'Terasering yuk', 'Terasering adalah sebuah bangunan konservasi dari tanah dan air yang dibuat secara mekanis. Tujuan pembuatannya yaitu untuk mengurangi kemiringan lereng dengan cara menggali tanah dengan posisi melintang.'),
(2, 'Menanam Cabai di Rumah', 'Menyiapkan Media Semai  Kita bisa mencampurkan tanah, pupuk kandang atau kompos, dan sekam bakar dengan perbandingan 3:2:1.  Kemudian, kita bisa melakukan sterilisasi untuk mencegah penyakit pada tanaman, caranya dengan mengukus media semai atau menjemurnya di bawah cahaya Matahari.  Setelah didinginkan, media semai bisa dimasukkan dalam wadah seperti gelas plastik bekas yang diberi lubang atau polybag.'),
(3, 'Tips Menanam Terong', '1. Memilih bibit Langkah pertama yang dapat kita lakukan untuk memulai budidaya terong ungu berbuah lebat adalah memilih bibit unggul.  Saat ini sudah banyak toko yang menjual bibit unggul terong ungu, baik berbentuk benih maupun biji.  Berikut beberapa ciri yang dapat kita lihat untuk mengetahui benih terong ungu berkualitas yang dapat ditemukan di toko bibit:  Benih memiliki kadar air yang cukup Benih memiliki tampilan yang bersih dan mengilat Benih memiliki bentuk, ukuran, dan warna yang seragam Benih tidak tercampur dengan benih lain yang cacat/buruk Benih memiliki daya tumbuh yang cepat, yakni sekitar 80% Jika ciri-ciri benih di atas sudah ada pada benih terong ungu yang kita pilih, maka kita siap untuk melangkah ke proses berikutnya, yakni penanaman.');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(20) NOT NULL,
  `id_art` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_art`, `nama`, `tanggal`, `isi_komentar`) VALUES
(5, 1, 'Icha', '16-06-2021', 'Hai'),
(6, 2, 'Jannah', '16-06-2021', 'hajdwwhd'),
(7, 0, 'Icha', '16-06-2021', 'Wah menarik sekalii saya jadi semangat menanam terong di rumah'),
(10, 3, 'Icha', '16-06-2021', 'Baguss'),
(22, 2, 'Icha', '17-06-2021', 'Bermanfaat sekali ilmunyaa'),
(23, 3, 'Aisyah Auliana', '17-06-2021', 'Yesss'),
(24, 3, 'Aisyah Auliana', '17-06-2021', 'Terima kasih infonya'),
(25, 2, 'Aisyah Auliana', '17-06-2021', 'Terima kasih jadi semangat menanam cabe di rumah'),
(26, 5, 'Nana Mirana', '17-06-2021', 'hai'),
(27, 3, 'Amalia Atira', '17-06-2021', 'Wah ini yang aku cari, makasih ya'),
(28, 1, 'Amalia Atira', '17-06-2021', 'Wahh mantap');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`) VALUES
(1, 'ichaa123', '$2y$10$ig11im/ey6MRyYAvMhYcVuQXOn22S2CXZuE2O3.2jMVaSRiVdtLQe', 'Icha'),
(2, 'Veve', '$2y$10$JFKZOR.GjasJ6ijPZs0eK.PtvlmbARGPMdOfSEJ30Hs1dHPHvWUxe', 'Jannah'),
(3, 'sahda23', '$2y$10$WXXuidgGwdLAJml/VlhnRe7r3Uaghec.zN1BUWTV8Sif1Ix3/W6DW', 'Clarissa'),
(8, 'dindin', '$2y$10$ZyNdfaKDuJyAuPu4uKfROOT91n0GURcVWcRHPIbfqrWszU4hRpHnm', 'Adinda'),
(9, 'ais4567', '$2y$10$eY/tEmqRXze0Kcd61oSGy.fsGdFqlqSfYOcyCKY.ZyxNbyC.9TLGy', 'Aisyah Auliana'),
(10, 'Lala123', '$2y$10$HaySMkFwzVI4sT8negkmGO/lnVrUXZzR23ZbMAqhE7kqOi9URGovO', 'lalaa'),
(11, 'aaaaaa', '$2y$10$P3i5COsHUWoYbgrEGUA1IOTjLxCkjwhHdHq1ZCGBxlHTBTF0r72dO', 'aaaa'),
(12, 'nana123', '$2y$10$T/wsjfP8dVxDK9eBmPEqd.D1EDsF8bM/8i3DNfAdZLq9KbZ3nqsre', 'Nana Mirana'),
(13, 'atira76', '$2y$10$PdFJf74.ftioCUQbrbMxI.2wrm4PMF0Fs8eAODWL1dkl4xjZJJEp.', 'Amalia Atira');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
