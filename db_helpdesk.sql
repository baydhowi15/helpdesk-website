-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2024 at 06:45 AM
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
(1, 'Operasional Staff'),
(3, 'IT'),
(5, 'HR');

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
(3, 'Supervisior'),
(4, 'Assistant Toko');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `no_tiket` text NOT NULL,
  `judul_tiket` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_tiket` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `status_tiket` int(2) NOT NULL,
  `tgl_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(22, 123678, 'odi', 'odi@gmail.com', '$2y$10$.l6eKq2XRY8BlCjBg6BtJu.KXrsTlaBs/dijS1UkN2NYIIYXl3AX.', 'Supervisior', 'Operasional Staff', '2024-03-26 04:33:45', '2024-03-26 04:33:45', '', 1, 1),
(23, 876868, 'beni', 'beni@gmail.com', '$2y$10$QgR/s0uaHtWx4d8Zt/boZezQdRL6.jvMMmeoIPWqSNWJHIfYOzJNe', 'Supervisior', 'Operasional Staff', '2024-03-26 04:40:35', '2024-03-26 05:31:47', '', 1, 1),
(26, 98798, 'ad', 'ad@gmail.com', '$2y$10$AXYf7JStkD6ysWWSd2ViNuM.vGzBZCm22pVarKA./iHvNoLHL2vbm', '', '', '2024-03-26 05:16:36', '2024-03-26 05:16:36', '', 1, 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
