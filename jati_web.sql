-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 09:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jati_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$wasSa6bIKjCSRwjXWaHiduCzqJOg8Iy0bKN83qFFdjPOiWRDzk0tG', '2023-06-27 23:26:41', NULL),
(2, 'dosen', 'dosen@pcr.ac.id', '$2y$10$V1Hi8RKJ1nezquIktC4gQejBKL7KAr3E1b6P92hkbNOm7lPdIBsqW', '2023-06-28 21:51:13', '2023-06-28 21:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kata_kunci` varchar(255) NOT NULL,
  `abstrak` text NOT NULL,
  `file_pdf` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_submit` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `volume_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `judul`, `kata_kunci`, `abstrak`, `file_pdf`, `status_id`, `tanggal_submit`, `created_at`, `updated_at`, `volume_id`, `user_id`) VALUES
(1, 'Rancang bangun game edukasi untuk mahasiswa', 'game edukasi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue. Vivamus quis hendrerit diam, sit amet dictum metus. Sed euismod lorem justo, in posuere purus faucibus id. Praesent sit amet rutrum massa, sed porttitor sem. Integer lacinia malesuada eros, eget venenatis mauris tincidunt at. Morbi et purus odio. Nunc sit amet viverra sem. Curabitur scelerisque consectetur ultrices. Suspendisse potenti.', 'ProbabilitasDiskrit.pdf', 2, '2023-06-28', '2023-06-28 00:06:53', '2023-06-28 23:22:31', 1, 1),
(2, 'santai dulu ga si', 'brokoli', 'awkwkwkwkwkwwkwkwkwkwwkwkwkwkwkwkwkwkwkw', 'SKPL_SIMPEL_KEL2_GANJIL.pdf', 1, '2023-06-28', '2023-06-28 04:53:01', '2023-06-28 04:53:01', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_review`
--

CREATE TABLE `jurnal_review` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurnal_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review_text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal_review`
--

INSERT INTO `jurnal_review` (`id`, `jurnal_id`, `user_id`, `review_text`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'test', '2023-06-28 23:49:03', '2023-06-28 23:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_volume`
--

CREATE TABLE `jurnal_volume` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_volume` varchar(255) NOT NULL,
  `desc_volume` text NOT NULL,
  `tanggal_volume` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal_volume`
--

INSERT INTO `jurnal_volume` (`id`, `nama_volume`, `desc_volume`, `tanggal_volume`, `created_at`, `updated_at`) VALUES
(1, 'Vol 1, No 1 (2023)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.', '2022-06-01', '2023-06-27 23:51:41', '2023-06-27 23:51:41'),
(2, 'Vol 1, No 2 (2023)', 'tes', '2023-06-28', '2023-06-27 23:52:20', '2023-06-27 23:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `kontributor`
--

CREATE TABLE `kontributor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `peran_kontributor` varchar(255) NOT NULL,
  `jurnal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontributor`
--

INSERT INTO `kontributor` (`id`, `nama`, `peran_kontributor`, `jurnal_id`, `created_at`, `updated_at`) VALUES
(1, 'tes1', 'Penulis', 1, '2023-06-28 00:06:53', '2023-06-28 00:06:53'),
(2, 'tes2', 'Penulis', 1, '2023-06-28 00:06:53', '2023-06-28 00:06:53'),
(3, 'siapa yak', 'Penulis', 2, '2023-06-28 04:53:01', '2023-06-28 04:53:01'),
(4, 'tes3', 'Penulis', 1, '2023-06-28 23:23:05', '2023-06-28 23:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_27_101104_create_admins_table', 1),
(6, '2023_06_28_023800_create_kontributor_table', 1),
(7, '2023_06_28_024309_create_jurnal_table', 1),
(8, '2023_06_28_025923_create_status_table', 1),
(9, '2023_06_28_030939_create_references_table', 1),
(10, '2023_06_28_052415_update_kontributor_table', 1),
(11, '2023_06_28_062039_create_jurnal_volume_table', 1),
(12, '2023_06_28_062229_update_jurnal_table', 1),
(13, '2023_06_28_121624_create_user_profile_table', 2),
(14, '2023_06_28_122141_create_user_profile_table', 3),
(15, '2023_06_29_063306_create_jurnal_review_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referensi` text NOT NULL,
  `jurnal_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `referensi`, `jurnal_id`, `created_at`, `updated_at`) VALUES
(1, 'S. v. Militante, “Malaria Disease Recognition through Adaptive Deep Learning Models of Convolutional Neural Network,” ICETAS 2019 - 2019 6th IEEE International Conference on Engineering, Technologies and Applied Sciences, Dec. 2019, doi: 10.1109/ICETAS48360.2019.9117446.', 1, '2023-06-28 00:06:53', '2023-06-28 00:06:53'),
(2, 'Phasellus condimentum viverra tellus, pellentesque congue erat accumsan vel. Duis tincidunt et dolor ac dictum. Nullam non tincidunt neque. Curabitur diam velit, imperdiet vitae dictum pretium, efficitur in risus. Sed placerat arcu id arcu maximus, non molestie odio auctor. Etiam in aliquet ante. Sed at elit sed lectus ornare varius vel eu velit. Maecenas scelerisque purus vel ex ultrices, non semper sapien bibendum. Phasellus lacus sem, commodo vitae tincidunt nec, interdum porta nisi. Curabitur sollicitudin eu nisi quis gravida.', 2, '2023-06-28 04:53:01', '2023-06-28 04:53:01'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut suscipit volutpat vestibulum. Sed sagittis magna id est accumsan condimentum. Nulla pellentesque dignissim massa, et ultricies tellus luctus sodales. Donec sed enim nec turpis finibus congue in a purus. Duis feugiat, justo vitae auctor maximus, lectus nisi convallis dolor, at sollicitudin nisi mauris ut eros. Pellentesque varius vitae odio et sollicitudin. Aliquam facilisis tristique maximus. Etiam interdum tortor ut quam ullamcorper tempor quis eget velit. Vivamus vel quam sed nisi vestibulum ullamcorper quis quis arcu. Mauris vehicula, tortor quis imperdiet convallis, orci ex tristique elit, et dapibus neque ex ut ex. Aenean non nisi posuere ipsum pulvinar vestibulum.', 2, '2023-06-28 04:53:01', '2023-06-28 04:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `jenis_status`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2023-06-27 23:26:41', NULL),
(2, 'Disetujui', '2023-06-27 23:26:41', NULL),
(3, 'Ditolak', '2023-06-27 23:26:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Penulis',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'tes', 'tes@gmail.com', '$2y$10$FWaBF2VE4vJ4OoNJo5wsiufytw.k/oUNwQlpG8obk0OyY5Cwjbr/q', 'Penulis', '2023-06-27 23:26:41', NULL),
(2, 'budi', 'budiman@gmail.com', '$2y$10$h3SuOe2t.fAc.vEeK/ug..dODnjVhsAZau2xinpiKfapPKHGffQna', 'Penulis', '2023-06-28 04:51:34', '2023-06-28 20:21:09'),
(4, 'fumoku', 'fumoku001@gmail.com', '$2y$10$XUspPHdzc7VDWv5t3wd5FOX4r/0xQjzFFsCB7g7npw.o1Hpb.auma', 'Editor', '2023-06-28 21:08:54', '2023-06-28 21:08:54'),
(5, 'blade', 'blade@gmail.com', '$2y$10$e2oORqY7UsV9gGTCFEIGQ.NZedZ22f4S5gkD3G2t5k6uaAZuZLls6', 'Reviewer', '2023-06-28 21:24:21', '2023-06-28 21:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `afiliasi` varchar(255) NOT NULL,
  `bahasa_kerja` varchar(255) NOT NULL,
  `gsch_id` varchar(255) NOT NULL,
  `scopus_id` varchar(255) NOT NULL,
  `sinta_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `nama`, `no_telp`, `afiliasi`, `bahasa_kerja`, `gsch_id`, `scopus_id`, `sinta_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'budi', '+6281270120774', 'PCR', 'Bahasa Indonesia', 'qawewvxcvhdg', 'htyjbavfvtrhtrui', 'cvvdfbfmnjtrdb', 2, '2023-06-28 05:41:33', '2023-06-28 20:56:48'),
(5, 'tes', '+6281372602738', 'UNRI', 'Bahasa Indonesia', 'wdafwadsdcsfa', 'adfwefwfwefsa', 'grthttjtrvsadaa', 1, '2023-06-28 20:47:00', '2023-06-28 20:54:28'),
(6, 'Fumoku', '+6281270120774', 'PCR', 'Bahasa Indonesia', 'cOX5SPsAAAAJ', '57330218200', '6687913', 4, '2023-06-28 21:12:27', '2023-06-28 21:12:27'),
(7, 'blade', '+6281372602738', 'PCR', 'Bahasa Indonesia', 'abcdefg', 'hijklmno', 'pqrstuv', 5, '2023-06-29 00:00:49', '2023-06-29 00:00:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_status_id_foreign` (`status_id`),
  ADD KEY `jurnal_volume_id_foreign` (`volume_id`),
  ADD KEY `jurnal_user_id_foreign` (`user_id`);

--
-- Indexes for table `jurnal_review`
--
ALTER TABLE `jurnal_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurnal_review_jurnal_id_foreign` (`jurnal_id`),
  ADD KEY `jurnal_review_user_id_foreign` (`user_id`);

--
-- Indexes for table `jurnal_volume`
--
ALTER TABLE `jurnal_volume`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontributor`
--
ALTER TABLE `kontributor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontributor_jurnal_id_foreign` (`jurnal_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `references_jurnal_id_foreign` (`jurnal_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scopus_id` (`scopus_id`),
  ADD UNIQUE KEY `gsch_id` (`gsch_id`),
  ADD UNIQUE KEY `sinta_id` (`sinta_id`),
  ADD KEY `user_profile_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jurnal_review`
--
ALTER TABLE `jurnal_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurnal_volume`
--
ALTER TABLE `jurnal_volume`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kontributor`
--
ALTER TABLE `kontributor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jurnal_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jurnal_volume_id_foreign` FOREIGN KEY (`volume_id`) REFERENCES `jurnal_volume` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jurnal_review`
--
ALTER TABLE `jurnal_review`
  ADD CONSTRAINT `jurnal_review_jurnal_id_foreign` FOREIGN KEY (`jurnal_id`) REFERENCES `jurnal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jurnal_review_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kontributor`
--
ALTER TABLE `kontributor`
  ADD CONSTRAINT `kontributor_jurnal_id_foreign` FOREIGN KEY (`jurnal_id`) REFERENCES `jurnal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `references`
--
ALTER TABLE `references`
  ADD CONSTRAINT `references_jurnal_id_foreign` FOREIGN KEY (`jurnal_id`) REFERENCES `jurnal` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
