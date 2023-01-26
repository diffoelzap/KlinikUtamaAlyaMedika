-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 09:55 AM
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
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `masterdata_coa`
--

CREATE TABLE `masterdata_coa` (
  `id` int(11) NOT NULL,
  `kode_akun` varchar(50) NOT NULL,
  `nama_akun` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterdata_coa`
--

INSERT INTO `masterdata_coa` (`id`, `kode_akun`, `nama_akun`, `keterangan`) VALUES
(1, '111', 'kas', 'kas'),
(2, '112', 'piutang', 'piutang usaha'),
(3, '113', 'perlengkapan', 'perlengkapan usaha'),
(4, '121', 'peralatan', 'peralatan usaha');

-- --------------------------------------------------------

--
-- Table structure for table `masterdata_dokter`
--

CREATE TABLE `masterdata_dokter` (
  `id` int(11) NOT NULL,
  `kode_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(255) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterdata_dokter`
--

INSERT INTO `masterdata_dokter` (`id`, `kode_dokter`, `nama_dokter`, `spesialis`, `no_tlp`) VALUES
(1, 'DR001', 'Dr. Agus Setiawan', 'Tulang', '0813-9447-9848'),
(2, 'DR002', 'Dr. Irawan', 'THT', '0813-9447-9833');

-- --------------------------------------------------------

--
-- Table structure for table `masterdata_kamar`
--

CREATE TABLE `masterdata_kamar` (
  `id` int(11) NOT NULL,
  `kode_kamar` varchar(50) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterdata_kamar`
--

INSERT INTO `masterdata_kamar` (`id`, `kode_kamar`, `nama_kamar`, `tipe_kamar`, `jumlah`) VALUES
(2, 'KM001', 'Kamar Meriah', 'C', 12),
(3, 'KM003', 'Kamar Sedang', 'B', 2);

-- --------------------------------------------------------

--
-- Table structure for table `masterdata_obat`
--

CREATE TABLE `masterdata_obat` (
  `id` int(11) NOT NULL,
  `kode_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterdata_obat`
--

INSERT INTO `masterdata_obat` (`id`, `kode_obat`, `nama_obat`, `stok`, `kategori`, `deskripsi`) VALUES
(14, 'OB001', 'Paracetamol', 10, 'tablet', 'untuk menghilangkan penat'),
(16, 'OB016', 'Vitacimin', 1, 'Vitamin', 'untuk membuat kontol makin panjang'),
(18, 'OB018', 'Paracetamol', 1, 'tablet', 'untuk menghilangkan penat'),
(19, 'OB019', 'Paracetamol', 1, 'tablet', 'untuk menghilangkan penat'),
(20, 'OB020', 'Paracetamol', 10, 'tablet', 'untuk menghilangkan penat'),
(22, 'OB021', 'Bodrex', 10, 'tablet', 'untuk meredakan demam');

-- --------------------------------------------------------

--
-- Table structure for table `masterdata_pasien`
--

CREATE TABLE `masterdata_pasien` (
  `id` int(11) NOT NULL,
  `kode_pasien` varchar(50) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `no_tlp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterdata_pasien`
--

INSERT INTO `masterdata_pasien` (`id`, `kode_pasien`, `nama_pasien`, `gender`, `no_tlp`) VALUES
(1, 'PS001', 'Jonny', 'L', '0813-9447-9848'),
(3, 'PS003', 'Amran', 'L', '2131-2312-32'),
(4, 'PS004', 'Siti', 'P', '0813-9447-98');

-- --------------------------------------------------------

--
-- Table structure for table `masterdata_supplier`
--

CREATE TABLE `masterdata_supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(50) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `no_tlp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterdata_supplier`
--

INSERT INTO `masterdata_supplier` (`id`, `kode_supplier`, `nama_supplier`, `no_tlp`) VALUES
(2, 'SP001', 'PT Biofarma', '0812-1273-12'),
(3, 'SP003', 'PT Kimia Farma', '0813-9447-98');

-- --------------------------------------------------------

--
-- Table structure for table `masterdata_tindakan`
--

CREATE TABLE `masterdata_tindakan` (
  `id` int(11) NOT NULL,
  `nama_tindakan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `masterdata_tindakan`
--

INSERT INTO `masterdata_tindakan` (`id`, `nama_tindakan`) VALUES
(1, 'Penangganan P3K');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'Pegawai Gudang', 'diffoelzap54@gmail.com', 'default.jpg', '$2y$10$7wE1C1PE6PPAatVfgH5.N.O0bXf0WWmMQl9NpMcEwpP6p7zQSyDqK', 2, 1, 1674115682),
(6, 'Admin', 'abrarelza6@gmail.com', 'default.jpg', '$2y$10$P9E/2BrYhR5I9O0AyB5kaeF9i39pKXgm.9Ls3fa2zBBFCOzfkYbgm', 1, 1, 1674279787),
(15, 'Pegawai Apotik', 'abrarelza565@gmail.com', 'default.jpg', '$2y$10$zFl7ID1WhoATc2Y9Fxelv.rKLcP6TW/o9ClUMRtkN1ppF3012Ieky', 2, 1, 1674697235);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(12, 2, 7),
(21, 2, 8),
(22, 1, 8),
(32, 1, 7),
(34, 1, 10),
(35, 2, 10),
(38, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `is_active`) VALUES
(1, 'Admin', 1),
(2, 'User ', 1),
(3, 'Menu', 1),
(7, 'Master', 1),
(10, 'Transaksi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'Menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 7, 'Data Obat', 'master/obat', 'fas fa-fw fa-pills', 1),
(12, 7, 'Data Pasien', 'master/pasien', 'fas fa-fw fa-users', 1),
(13, 7, 'Data Dokter', 'master/dokter', 'fas fa-fw fa-user-md', 1),
(14, 7, 'Data Supplier', 'master/supplier', 'fas fa-fw fa-box', 1),
(15, 7, 'Data Kamar', 'master/kamar', 'fas fa-fw fa-bed', 1),
(17, 7, 'Data Tindakan', 'master/tindakan', 'fas fa-fw fa-ambulance', 1),
(18, 7, 'Data COA', 'master/coa', 'fas fa-fw fa-book', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(10, 'diffoelzap54@gmail.com', 'Xj8KAdJZa4SioHKfU/34dP7NgG8WAjY3t7Sc3q8st7s=', 1674656372);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masterdata_coa`
--
ALTER TABLE `masterdata_coa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterdata_dokter`
--
ALTER TABLE `masterdata_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterdata_kamar`
--
ALTER TABLE `masterdata_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterdata_obat`
--
ALTER TABLE `masterdata_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterdata_pasien`
--
ALTER TABLE `masterdata_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterdata_supplier`
--
ALTER TABLE `masterdata_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterdata_tindakan`
--
ALTER TABLE `masterdata_tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masterdata_coa`
--
ALTER TABLE `masterdata_coa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masterdata_dokter`
--
ALTER TABLE `masterdata_dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masterdata_kamar`
--
ALTER TABLE `masterdata_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masterdata_obat`
--
ALTER TABLE `masterdata_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `masterdata_pasien`
--
ALTER TABLE `masterdata_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `masterdata_supplier`
--
ALTER TABLE `masterdata_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masterdata_tindakan`
--
ALTER TABLE `masterdata_tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
