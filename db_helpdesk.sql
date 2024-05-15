-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 04:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_tiket`
--

CREATE TABLE `detail_tiket` (
  `id_detail` int(11) NOT NULL,
  `tiket_id` int(11) DEFAULT NULL,
  `tanggapan` text NOT NULL,
  `gambar_tanggapan` text NOT NULL,
  `waktu_tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_tiket`
--

INSERT INTO `detail_tiket` (`id_detail`, `tiket_id`, `tanggapan`, `gambar_tanggapan`, `waktu_tanggapan`) VALUES
(46, 46, 'Oke Siap saya otw', '20240428221114.png', '2024-04-28'),
(47, 47, 'Siap saya segera', '20240428221156.png', '2024-04-28'),
(48, 48, 'segera', 'default.jpg', '2024-05-02'),
(49, 49, 'n', 'default.jpg', '2024-05-02'),
(50, 50, 'oke', '20240502142717.png', '2024-05-02'),
(51, 51, 's', 'default.jpg', '2024-05-02'),
(52, 52, 'oke', 'default.jpg', '2024-05-02'),
(53, 53, 'Segera ke tempat', 'default.jpg', '2024-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
(9, 'Komisaris'),
(10, 'Direksi'),
(11, 'Manager'),
(12, 'Asistant Manager'),
(13, 'Legal'),
(14, 'Administrasi'),
(15, 'Survey'),
(16, 'SKPT'),
(17, 'Keuangan'),
(18, 'General Affair'),
(19, 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(19, 'Komisaris'),
(20, 'Direksi'),
(21, 'Manager'),
(22, 'Assisant Manager'),
(23, 'Admin Legal'),
(24, 'Staff Admin'),
(25, 'Staff Survey'),
(26, 'Staff SKPT'),
(27, 'Staff Keuangan'),
(28, 'Staff General Affair'),
(29, 'Staff IT');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `no_tiket` varchar(25) NOT NULL,
  `judul_tiket` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_tiket` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status_tiket` int(2) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `no_tiket`, `judul_tiket`, `deskripsi`, `gambar_tiket`, `user_id`, `status_tiket`, `tgl_daftar`) VALUES
(53, '1505240001', 'Pc Blue screen', 'Pc Blue screen', '150524000120240515092922.png', 43, 2, '2024-05-15 02:30:10'),
(54, '1505240002', 'Tolong install ulang', 'Tolong install ulang', 'default.jpg', 42, 0, '2024-05-14 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_user` varchar(255) NOT NULL,
  `level_user` int(2) NOT NULL,
  `status_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nip`, `username`, `email`, `password`, `jabatan`, `divisi`, `created`, `modified`, `image_user`, `level_user`, `status_user`) VALUES
(39, 98789, 'admin', 'admin@gmail.com', '$2y$10$tWf9mjvzEvc/99F0L.9IDulqVg2VUocubMRQB4LNp9TsnSTAQIVkq', 'Staff IT', 'IT', '2024-05-15 01:52:11', '2024-05-15 02:24:28', '', 2, 1),
(41, 10001, 'suharjono', 'suharjo@gmail.com', '$2y$10$fSQu1DnsWQLs.Ra.8NHQb.RFrOPlUU9298TYhRcIyhbpAx2XY/sgG', 'Direksi', 'Direksi', '2024-05-15 02:27:13', '2024-05-15 02:27:13', '', 1, 1),
(42, 1005, 'fachren', 'fachren@gmail.com', '$2y$10$n8ao9doSfbK44duh/t4uY.yKYMTz23MYGcqsZR33sDmkxeIi6rvt2', 'Assisant Manager', 'Asistant Manager', '2024-05-15 02:27:47', '2024-05-15 02:27:47', '', 1, 1),
(43, 10008, 'agam', 'agam@gmail.com', '$2y$10$HW4oH5WknkW8q8i2RrS/8eeWKJhxUW5kFPrr2Sx/0uL0cmcvw9DuS', 'Staff Admin', 'Administrasi', '2024-05-15 02:28:24', '2024-05-15 02:28:24', '', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_tiket`
--
ALTER TABLE `detail_tiket`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_tiket`
--
ALTER TABLE `detail_tiket`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
