-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2025 at 09:53 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mos-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `created_at`, `updated_at`) VALUES
(31, 0, 1, 'Tổng quan', 'fa-tachometer', '/', '2025-04-09 08:27:18', '2025-04-12 09:35:53'),
(32, 0, 2, 'Quản lý tài khoản', 'fa-user', NULL, '2025-04-09 08:28:09', '2025-04-09 08:37:25'),
(33, 0, 3, 'Quản lý giáo viên', 'fa-user-secret', 'giao_vien', '2025-04-09 08:28:31', '2025-04-12 08:44:51'),
(34, 0, 4, 'Quản lý nhân viên', 'fa-user-md', 'nhan_vien', '2025-04-09 08:28:53', '2025-04-09 09:33:17'),
(35, 0, 5, 'Quản lý học sinh', 'fa-users', 'hoc_sinh', '2025-04-09 08:29:44', '2025-04-12 09:45:02'),
(36, 0, 6, 'Quản lý thí sinh dự thi', 'fa-android', NULL, '2025-04-09 08:30:07', '2025-04-09 08:37:25'),
(37, 0, 8, 'Quản lý lớp học', 'fa-area-chart', NULL, '2025-04-09 08:31:17', '2025-04-12 09:35:34'),
(38, 0, 9, 'Quản lý lịch thi', 'fa-book', NULL, '2025-04-09 08:31:56', '2025-04-12 09:35:34'),
(39, 38, 10, 'Lịch thi thử', 'fa-align-justify', NULL, '2025-04-09 08:32:20', '2025-04-12 09:35:34'),
(40, 38, 11, 'Lịch thi thật', 'fa-align-justify', NULL, '2025-04-09 08:32:32', '2025-04-12 09:35:34'),
(41, 0, 12, 'Quản lý thu chi', 'fa-money', NULL, '2025-04-09 08:33:07', '2025-04-12 09:35:34'),
(42, 0, 13, 'Quản lý kết quả thi', 'fa-bar-chart-o', NULL, '2025-04-09 08:33:54', '2025-04-12 09:35:34'),
(43, 0, 16, 'Quản lý khóa học', 'fa-bookmark', NULL, '2025-04-09 08:34:38', '2025-04-12 09:35:34'),
(44, 0, 17, 'Quản lý lĩnh vực', 'fa-archive', 'linh_vuc', '2025-04-09 08:35:17', '2025-04-12 09:35:34'),
(45, 42, 14, 'Kết quả thi thử', 'fa-bars', NULL, '2025-04-09 08:36:55', '2025-04-12 09:35:34'),
(46, 42, 15, 'Kết quả thi thật', 'fa-bars', NULL, '2025-04-09 08:37:15', '2025-04-12 09:35:34'),
(48, 0, 7, 'Quản lý phòng học', 'fa-home', 'phong_hoc', '2025-04-12 09:35:07', '2025-04-12 09:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_permissions`
--

INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
(1, 'All permission', '*', '', '*', NULL, '2018-07-26 14:29:38'),
(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
(4, 'User setting', 'auth.setting', 'GET,PUT,DELETE', '/auth/setting', NULL, '2018-08-25 11:19:26'),
(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL),
(6, 'Admin CMS', 'admin_cms', '', '/cms_news\r\n/cms_news/*\r\n/cms_page\r\n/cms_page/*', '2018-03-23 15:18:05', '2018-03-23 16:20:58'),
(7, 'Admin Shop', 'admin_shop', '', '/shop_*\r\n/getInfoProduct\r\n/shop_order_edit\r\n/shop_order_update', '2018-03-23 15:21:36', '2018-03-25 09:27:28'),
(8, 'Admin Config', 'admin_confi', '', '/config_*', '2018-03-23 15:25:02', '2018-03-23 15:25:02'),
(9, 'Manager Banner', 'banner', '', '/banner\r\n/banner/*', '2018-03-23 15:25:47', '2018-03-23 16:21:45');

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'administrator', '2018-01-12 17:27:40', '2018-01-12 17:27:40'),
(2, 'Admin', 'admin', '2018-01-12 18:02:33', '2018-01-12 18:02:33'),
(3, 'User', 'user', '2018-01-12 18:03:14', '2018-01-12 18:03:14'),
(4, 'Content', 'content', '2018-01-13 08:27:11', '2018-01-13 08:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_menu`
--

INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(2, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(3, 3, NULL, NULL),
(3, 4, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL),
(2, 4, NULL, NULL),
(4, 3, NULL, NULL),
(4, 4, NULL, NULL),
(2, 6, NULL, NULL),
(2, 7, NULL, NULL),
(2, 8, NULL, NULL),
(2, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role_users`
--

INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2a$12$eR.tlKLQZ./ZxL7epcCcK.E8PAbLDnNOh9FHlb.P8SmqIRRvW40Wy', 'MOS Test', 'images/1a5a99fd68265366fdd5785df04a22c1.png', 'i3GZ2y7dL2LYUYnvHAWAFs2n5E2N0r8A7VNKMAZLWDYplJcBtHuuI3z8cM1u', '2024-12-31 17:27:40', '2025-04-11 13:53:22'),
(3, 'user', '$2y$10$5XHIa1PBq5y5XYqaE1Va.ulyxN8QFaFXyTqTcotp4uZj.kjsYTKKO', 'User', NULL, NULL, '2018-01-12 18:05:28', '2018-01-12 18:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giaovien`
--

CREATE TABLE `giaovien` (
  `id` int(11) NOT NULL,
  `maGV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenGV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chungchi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maLV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masothue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tknganhang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giaovien`
--

INSERT INTO `giaovien` (`id`, `maGV`, `tenGV`, `diachi`, `email`, `ngaysinh`, `sdt`, `gioitinh`, `cmnd`, `chungchi`, `maLV`, `masothue`, `tknganhang`) VALUES
(1, 'GV001', 'Nguyễn Tiến Chiến', 'Hà Nội', 'ntchien5701@gmail.com', '2025-04-12', '0376793817', 0, '021332425432', 'MOS', 'LV001', '32542562456', '4352652546'),
(2, 'GV002', 'Nguyễn Minh Dương', 'Hà Nội', 'minhduong@gmail.com', '2025-04-12', '0376793817', 0, '021332425432', 'MOS', 'LV002', '32542562456', '4352652546');

-- --------------------------------------------------------

--
-- Table structure for table `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id` int(11) NOT NULL,
  `maHS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenHS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tendangnhap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hocsinh`
--

INSERT INTO `hocsinh` (`id`, `maHS`, `tenHS`, `diachi`, `email`, `ngaysinh`, `sdt`, `gioitinh`, `cmnd`, `tendangnhap`, `matkhau`) VALUES
(1, 'HS0001', 'Nguyễn Thành Công', 'Hà Nội', 'Thanhcong@gmail.com', '2025-04-12', '0376793817', 0, '021332425432', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `linhvuc`
--

CREATE TABLE `linhvuc` (
  `id` int(11) NOT NULL,
  `maLV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenLV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `linhvuc`
--

INSERT INTO `linhvuc` (`id`, `maLV`, `tenLV`) VALUES
(1, 'LV001', 'Công nghệ TT'),
(2, 'LV002', 'Tin học văn phòng');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `maNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tenNV` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL COMMENT '0 là nam, 1 là nữ',
  `cmnd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `masothue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tknganhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loai` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 là kế toán, 1 là tuyển sinh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `maNV`, `tenNV`, `diachi`, `email`, `ngaysinh`, `sdt`, `gioitinh`, `cmnd`, `masothue`, `tknganhang`, `loai`) VALUES
(1, 'NV0001', 'Nguyễn Tiến Chiến', 'Hà Nội', 'chien@gmail.com', '2025-04-09', '0376793817', 0, '021332425432', '32542562456', '4352652546', 0);

-- --------------------------------------------------------

--
-- Table structure for table `phonghoc`
--

CREATE TABLE `phonghoc` (
  `id` int(11) NOT NULL,
  `maPH` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenPH` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phonghoc`
--

INSERT INTO `phonghoc` (`id`, `maPH`, `tenPH`) VALUES
(1, 'PH001', 'Phòng  402'),
(2, 'PH002', 'Phòng  404');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note` json DEFAULT NULL,
  `other` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `school` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address1`, `address2`, `phone`, `remember_token`, `created_at`, `updated_at`, `note`, `other`, `school`, `category_id`, `image`) VALUES
(9, 'chiến nguyễn', 'chien123@gmail.com', '$2a$12$HWK3CCG9GvkqDoItHPVM8uoOZXxee/clVj2ikiccrjquBZfMu6DVu', NULL, NULL, NULL, NULL, '2023-06-21 16:14:23', '2023-06-21 16:14:23', NULL, NULL, NULL, NULL, NULL),
(10, 'chien nguyen', 'chien12345@gmail.com', '$2a$12$VZNU40/L6eYTsfsybMwL3Ou24mqN6ryPrZa9./OFSy3kKBrIwxSze', NULL, NULL, NULL, NULL, '2023-09-24 14:04:20', '2023-09-24 14:04:20', NULL, NULL, NULL, NULL, NULL),
(11, 'Trần phước', 'phuoctran@gmail.com', '$2y$10$d1MlxhaSxmZQ1RSP8j2FVOi73rEH984evyX.x0tbg3ihYSEfPkcIC', NULL, NULL, NULL, NULL, '2023-11-23 13:34:32', '2023-11-23 13:34:32', NULL, NULL, NULL, NULL, NULL),
(12, 'Chiến HN', 'chien57111@gmail.com', '$2y$10$XDp2gDOxPvbghfqLtBDltePcNyZk7BJOMrHgR933mLlrl0lRT1/96', NULL, NULL, NULL, NULL, '2024-05-04 03:41:03', '2024-05-04 03:41:03', NULL, NULL, NULL, NULL, NULL),
(13, 'Khải', 'khai@gmail.com', '$2y$10$LuxmZ6ZC9MordE6Oznf3Tun8fQoUJKdpDyINIHqD6Qcwbx06zxlT6', 'thanh xuân hà nội', NULL, '012345678', NULL, '2024-05-04 04:09:31', '2024-05-04 04:09:31', NULL, NULL, NULL, NULL, NULL),
(14, 'doanh', 'doanh123@gmail.com', '$2y$10$2NLbOiP6ZavFKfkTA8KT5.manPAE4rJCtDVgCcaRm1YrqPSnlZhD.', 'hà nội', NULL, '0386987133', NULL, '2024-06-17 09:04:31', '2024-06-17 09:04:31', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Indexes for table `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`);

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`);

--
-- Indexes for table `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Indexes for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Indexes for table `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Indexes for table `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Indexes for table `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linhvuc`
--
ALTER TABLE `linhvuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonghoc`
--
ALTER TABLE `phonghoc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `linhvuc`
--
ALTER TABLE `linhvuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phonghoc`
--
ALTER TABLE `phonghoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
