-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2022 at 05:47 AM
-- Server version: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `deleted_at`) VALUES
(201, 'zakiam', '$2y$10$ciap5Tw3cIEFfpK1YwgCpu1k8YqmksgMoT8vZUHRqziqdrr6UEzTy', 'Zakia Marrit', NULL),
(202, 'mandafailah', 'manda123', 'Manda Failah', '2022-12-04 04:21:23'),
(203, 'nizamassadel', 'adel123', 'Nizam Assadel', NULL),
(204, 'achmad', '$2y$10$36REiqtb7fY6uF4QfOELRulQNvltEZTcdM/O79VsJWoz3m38OmYCK', 'Achmad Soeryadi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori_stok_obat`
--

CREATE TABLE `histori_stok_obat` (
  `id_histori_stok_obat` int(255) NOT NULL,
  `id_obat` int(255) NOT NULL,
  `id_unit_kerja` int(255) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `tgl_stok` date NOT NULL,
  `dicatat_oleh` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `histori_stok_obat`
--

INSERT INTO `histori_stok_obat` (`id_histori_stok_obat`, `id_obat`, `id_unit_kerja`, `jumlah`, `tgl_stok`, `dicatat_oleh`, `deleted_at`) VALUES
(1, 306, 117, 25, '2021-11-11', 'Zakia', NULL),
(2, 302, 116, 46, '2022-12-07', 'Zakia', NULL),
(3, 310, 101, 78, '2022-12-06', '201', '2022-12-04 05:46:26'),
(4, 302, 116, 5, '2022-12-03', 'Manda', '2022-12-04 05:09:36'),
(5, 303, 102, 960, '2022-12-05', '201', '2022-12-04 05:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(255) NOT NULL,
  `id_tipe_obat` int(255) NOT NULL,
  `nama_obat` varchar(255) NOT NULL,
  `tipe_obat` varchar(255) NOT NULL,
  `tgl_kadaluarsa` date NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `id_tipe_obat`, `nama_obat`, `tipe_obat`, `tgl_kadaluarsa`, `deleted_at`) VALUES
(301, 1, 'Flunarizine', 'Antimigran', '2025-12-25', '2022-12-04 04:22:29'),
(302, 2, 'Amoxicilin 500 Mg', 'Antibiotik', '2025-10-08', NULL),
(303, 2, 'Cotrimoxazole Forte 960 Mg', 'Antibiotik', '2023-08-11', NULL),
(304, 2, 'Metronidazole 500 Mg', 'Antibiotik', '2025-09-09', NULL),
(305, 2, 'Ciprofloxacin 500 Mg', 'Antibiotik', '2025-12-17', NULL),
(306, 3, 'Albendazol 400 Mg', 'Antelmintik', '2025-12-24', NULL),
(307, 4, 'Asiklovir 400 Mg', 'Antivirus', '2025-12-31', NULL),
(308, 5, 'Omeprazole 20 Mg', 'Pompa Proton Inhibitor', '2026-01-16', NULL),
(309, 6, 'Antasida', 'Penetralisir Asam', '2025-01-16', NULL),
(310, 7, 'Hyoscine N-Butylbromide 10 Mg', 'Spasmodik', '2025-03-13', NULL),
(311, 8, 'Tripolidin Hel', 'Dekongestan', '2025-06-19', NULL),
(312, 8, 'Pseudoefedrin Hel', 'Dekongestan', '2028-02-10', NULL),
(313, 9, 'Captopril 24 Mg', 'Antihipertensi', '2024-12-19', NULL),
(314, 9, 'Furosemid 40 Mg', 'Antihipertensi', '2024-06-06', NULL),
(315, 9, 'Almodipin 10 Mg', 'Antihipertensi', '2026-07-14', NULL),
(316, 10, 'Vit B Complex', 'Suplemen', '2023-09-14', NULL),
(317, 10, 'Vit C', 'Suplemen', '2025-03-13', NULL),
(318, 10, 'Zink 10 Mg', 'Suplemen', '2024-05-03', NULL),
(319, 11, 'Attapulgiet 630 Mg', 'Antidiare', '2024-12-11', NULL),
(320, 11, 'Loperamide HCI 2 Mg', 'Antidiare', '2028-02-17', NULL),
(321, 11, 'Oralit', 'Antidiare', '2023-09-05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit_kerja` int(255) NOT NULL,
  `nama_unit_kerja` varchar(255) NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit_kerja`, `nama_unit_kerja`, `deleted_at`) VALUES
(101, 'Poliklinik Obgyn', NULL),
(102, 'Poliklinik Anak dan Tumbuh Kembang', NULL),
(103, 'Poliklinik Penyakit Dalam', NULL),
(104, 'Poliklinik Bedah Umum', NULL),
(105, 'Bedah Onkologi', NULL),
(106, 'Poliklinik Mata', NULL),
(107, 'Poliklinik Syaraf', NULL),
(108, 'Poliklinik Jantung', NULL),
(109, 'Poliklinik Bedah Digistif', NULL),
(110, 'Poliklinik Paru', NULL),
(111, 'Poliklink Orthopaedi', NULL),
(112, 'Poliklinik Bedah Plastik', NULL),
(113, 'Poliklinik Urologi', NULL),
(114, 'Poliklinik Jiwa', NULL),
(115, 'Poliklinik THT', NULL),
(116, 'Poliklinik Gizi', NULL),
(117, 'Poliklinik Anastesi', NULL),
(118, 'Poliklinik Bedah Syaraf', NULL),
(119, 'Test Update', '2022-12-04 04:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histori_stok_obat`
--
ALTER TABLE `histori_stok_obat`
  ADD PRIMARY KEY (`id_histori_stok_obat`),
  ADD KEY `histori_stok_obat_ibfk_1` (`id_obat`),
  ADD KEY `histori_stok_obat_ibfk_2` (`id_unit_kerja`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit_kerja`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histori_stok_obat`
--
ALTER TABLE `histori_stok_obat`
  ADD CONSTRAINT `histori_stok_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `histori_stok_obat_ibfk_2` FOREIGN KEY (`id_unit_kerja`) REFERENCES `unit_kerja` (`id_unit_kerja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
