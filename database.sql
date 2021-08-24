-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2021 at 02:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2107_reqkerjasama`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `no_naskah` varchar(75) NOT NULL,
  `mitra` varchar(30) NOT NULL,
  `bidang` varchar(20) DEFAULT NULL,
  `dasarhukum1` varchar(125) DEFAULT NULL,
  `dasarhukum2` varchar(150) DEFAULT NULL,
  `dasarhukum3` varchar(150) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `judul` varchar(150) NOT NULL,
  `tanggalmulai` date DEFAULT NULL,
  `tanggalakhir` date DEFAULT NULL,
  `kepentingan` varchar(255) DEFAULT NULL,
  `file` text NOT NULL,
  `file_acc` varchar(75) DEFAULT NULL,
  `status_persetujuan` enum('pending','accept','decline') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `no_naskah`, `mitra`, `bidang`, `dasarhukum1`, `dasarhukum2`, `dasarhukum3`, `jenis`, `judul`, `tanggalmulai`, `tanggalakhir`, `kepentingan`, `file`, `file_acc`, `status_persetujuan`, `created_at`) VALUES
(1, '1868130563', 'Hummasoft', 'Pembangunan Daerah', '', '', '', 'MoU', 'Pengajuan Mitra', '2021-07-14', '2021-07-24', 'Lorepisum dolar sit amlet', 'FILE-60fd7a564da51.xlsx', NULL, 'decline', '2021-07-25 14:51:45'),
(2, '186681350882', 'Politeknik Negeri Malang', 'Pembangunan Daerah', '', '', '', 'MoU', 'Internship', '2021-07-14', '2021-07-31', 'Permintaan magang dan persetujuan dengan perusahaan ', 'FILE-60fd8c83e31b9.xlsx', 'ACC-60fed85bcf85d.jpeg', 'accept', '2021-07-25 16:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(15) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `image` varchar(125) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `name`, `password`, `role_id`, `is_active`, `image`, `status`, `alamat`) VALUES
('102938', 'User 1', '$2y$10$H32TRNPuYROrMlbQSsiHCekvV2dw0DIeL0UU58J2ODOnot6UmNZ.K', 2, 1, 'default.jpg', 'Anggota Mitra Kerjasama', 'Jl. Semanggi Barat no.1a'),
('ADMIN1', 'ADMIN1', '$2y$10$R/sq3qsdQML9Z98RL2ybJ.paPi/UGwur50TCeD7bDu/vuBLRBcqpO', 1, 1, 'logo_kabmalang.png', 'Admin 1', 'Kantor Bupati Kab Kepanjen'),
('ADMIN2', 'ADMIN2', '$2y$10$Gy4PN39cRk.w.pL3Ra3cJ.hxB1ElMN4i.BtnSm0yc7a1.cwkFdVrC', 1, 1, 'logo_kabmalang.png', 'Admin 2', 'Kantor Bupati Kab. Kepanjen');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `no` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`no`, `role_id`, `menu_id`) VALUES
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `no` int(20) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`no`, `menu`) VALUES
(1, 'Profile'),
(2, 'Manage User'),
(3, 'Manage Document');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `no` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`no`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `no` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`no`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 1, 'Profile', 'user/profile', 'fas fa-faw fa-user', 1),
(3, 1, 'Ubah Profile', 'user/editprofile', 'fas fa-faw fa-user-edit', 1),
(4, 2, 'Tambah Pengguna', 'tambah/pengguna', 'fas fa-fw fa-user-plus', 1),
(5, 3, 'Dokumen', 'managedoc/dokumen', 'fas fa-fw fa-folder-plus', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
