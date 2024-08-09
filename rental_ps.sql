-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2024 at 03:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_ps`
--

-- --------------------------------------------------------

--
-- Table structure for table `consoles`
--

CREATE TABLE `consoles` (
  `id` int UNSIGNED NOT NULL,
  `console_type_id` int UNSIGNED NOT NULL,
  `serial_number` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consoles`
--

INSERT INTO `consoles` (`id`, `console_type_id`, `serial_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '0001', 'ready', '2024-08-04 07:16:54', '2024-08-07 03:31:04'),
(2, 2, '0002', 'ready', '2024-08-05 04:27:37', '2024-08-07 02:51:20'),
(4, 1, '0003', 'ready', '2024-08-07 03:16:37', '2024-08-07 03:16:37'),
(5, 5, '0005', 'ready', '2024-08-07 03:27:21', '2024-08-07 03:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `console_types`
--

CREATE TABLE `console_types` (
  `id` int UNSIGNED NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `console_types`
--

INSERT INTO `console_types` (`id`, `model`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'PlayStation 3', ' ini adalah tipe konsol playstation 3                           ', '1722755758.avif', 5000.00, '2024-08-04 07:15:58', '2024-08-04 07:15:58'),
(2, 'PlayStation 4', 'Ini adalah jenis console playstation 4', '1722999926.avif', 10000.00, '2024-08-05 04:27:17', '2024-08-07 03:05:26'),
(3, 'PlayStation 5', 'Ini adalah jenis console playstation 5                            ', '1722999961.avif', 15000.00, '2024-08-07 03:06:01', '2024-08-07 03:06:01'),
(5, 'tes', 'tes                            ', '1723001171.avif', 10000.00, '2024-08-07 03:26:11', '2024-08-07 03:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-08-03-000002', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1722755552, 1),
(2, '2024-08-03-000003', 'App\\Database\\Migrations\\CreateConsoleTypesTable', 'default', 'App', 1722755552, 1),
(3, '2024-08-03-000004', 'App\\Database\\Migrations\\CreateConsolesTable', 'default', 'App', 1722755552, 1),
(4, '2024-08-03-000005', 'App\\Database\\Migrations\\CreateRentalsTable', 'default', 'App', 1722755552, 1),
(5, '2024-08-03-000006', 'App\\Database\\Migrations\\CreateRentalItemsTable', 'default', 'App', 1722755552, 1),
(6, '2024-08-03-000007', 'App\\Database\\Migrations\\CreateRentalsTable', 'default', 'App', 1722774592, 2),
(7, '2024-08-03-000008', 'App\\Database\\Migrations\\CreateRentalsTable', 'default', 'App', 1722775219, 3);

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` int UNSIGNED NOT NULL,
  `console_id` int UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_general_ci NOT NULL,
  `rental_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `console_id`, `customer_name`, `email`, `no_telp`, `alamat`, `rental_date`, `return_date`, `status`, `total_price`, `created_at`, `updated_at`) VALUES
(5, 1, 'tes', 'test@test.com', '1231231231', 'testing', '2024-06-06', '2024-06-12', 'selesai', 30000.00, '2024-08-04 12:51:23', '2024-08-04 15:03:38'),
(6, 1, 'dimas', 'dwid4503@gmail.com', '213123123123', 'test', '2024-08-05', '2024-08-08', 'selesai', 15000.00, '2024-08-05 04:25:54', '2024-08-05 04:26:12'),
(7, 2, 'testin', 'tesit1@gmail.com', '1231231233434', 'testing', '2024-06-06', '2024-06-10', 'dibatalkan', 40000.00, '2024-08-05 11:18:02', '2024-08-05 11:31:14'),
(8, 1, 'tes', 'esss@gmail.com', '1231232424', 'testing', '2024-08-05', '2024-08-10', 'dibatalkan', 25000.00, '2024-08-05 11:39:05', '2024-08-05 11:44:58'),
(9, 2, 'tesss', 'tess@tes.com', '123123123', 'testing', '2024-08-07', '2024-08-10', 'selesai', 30000.00, '2024-08-07 02:51:08', '2024-08-07 02:51:20'),
(10, 5, 'customer', 'customer@gmail.com', '0821404877312', 'customer', '2024-08-07', '2024-08-10', 'selesai', 30000.00, '2024-08-07 03:28:52', '2024-08-07 03:29:20'),
(11, 1, 'customer2', 'customer2@gmail.com', '08213233202', 'customer2', '2023-08-07', '2023-08-10', 'selesai', 15000.00, '2024-08-07 03:30:36', '2024-08-07 03:31:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$WCwuO5H/jnZd2YpsgyyeGeg3W/nsMjC7RopAJb4C2WqCUTRJUSTyG', NULL, NULL),
(4, 'admin2', 'admin2@gmail.com', '$2y$10$ZZXB1tyfyWS3O9eS/XF84eNBtuUGjgk2cADI6qopCbPmyUGVngwHW', '2024-08-05 12:30:49', '2024-08-05 12:30:49'),
(5, 'admin3', 'admin3@gmail.com', '$2y$10$HC5UtRAeC3MZWKj3.sXYMuNhX9ad73ElRJOxgra5B9DXxPFmaOzAi', '2024-08-07 03:23:25', '2024-08-07 03:23:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial_number` (`serial_number`),
  ADD KEY `consoles_console_type_id_foreign` (`console_type_id`);

--
-- Indexes for table `console_types`
--
ALTER TABLE `console_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `model` (`model`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_console_id_foreign` (`console_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consoles`
--
ALTER TABLE `consoles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `console_types`
--
ALTER TABLE `console_types`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consoles`
--
ALTER TABLE `consoles`
  ADD CONSTRAINT `consoles_console_type_id_foreign` FOREIGN KEY (`console_type_id`) REFERENCES `console_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_console_id_foreign` FOREIGN KEY (`console_id`) REFERENCES `consoles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
