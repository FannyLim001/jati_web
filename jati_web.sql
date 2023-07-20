-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 07:13 AM
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
(1, 'admin', 'admin@gmail.com', '$2y$10$erMpmQmqZPJ6jQXdqhco0utGsPGxJ9uKx6aHj2wAmwoCVYPHJWmSm', '2023-07-04 00:22:19', NULL);

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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reviewer_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `judul`, `kata_kunci`, `abstrak`, `file_pdf`, `status_id`, `tanggal_submit`, `created_at`, `updated_at`, `volume_id`, `user_id`, `reviewer_id`) VALUES
(1, 'Rancang bangun game edukasi untuk mahasiswa', 'game edukasi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue. Vivamus quis hendrerit diam, sit amet dictum metus. Sed euismod lorem justo, in posuere purus faucibus id. Praesent sit amet rutrum massa, sed porttitor sem. Integer lacinia malesuada eros, eget venenatis mauris tincidunt at. Morbi et purus odio. Nunc sit amet viverra sem. Curabitur scelerisque consectetur ultrices. Suspendisse potenti.', 'ProbabilitasDiskrit.pdf', 5, '2023-07-04', '2023-07-04 00:32:40', '2023-07-04 00:32:40', 1, 1, 3),
(2, 'santai dulu ga si', 'brokoli', 'testttttttttttttttttttttttt', 'Kel2Ganjil_PengujianWhite_Blackbox.pdf', 7, '2023-07-05', '2023-07-04 19:15:08', '2023-07-04 19:15:08', 2, 1, 3),
(3, 'Tesssssssssssssssss', 'tes', 'asdasdasdasdasdad', 'ProbabilitasDiskrit.pdf', 5, '2023-07-11', '2023-07-10 20:13:24', '2023-07-10 20:13:24', 1, 1, 3);

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
(1, 1, 3, 'test', '2023-07-04 00:54:11', '2023-07-04 00:54:11'),
(2, 2, 3, 'mohon dijelaskan lebih jelas abstrak dan referensi', '2023-07-04 19:22:07', '2023-07-04 19:22:07'),
(3, 3, 3, 'paper ini bagus', '2023-07-10 20:20:01', '2023-07-10 20:20:01');

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
(1, 'Vol 1, No 1 (2023)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.', '2023-06-28', '2023-07-04 00:30:45', NULL),
(2, 'Vol 1, No 2 (2023)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec laoreet fermentum urna. Duis nec eros ex. Praesent a euismod justo. Nullam dignissim, lectus sed iaculis placerat, quam odio sagittis leo, tempor porta lorem lectus sed lectus. Etiam semper, neque at mattis ultricies, dolor mi congue risus, non vehicula libero risus ac erat. Integer nec arcu augue.', '2023-07-04', '2023-07-04 01:30:45', NULL);

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
(1, 'bambank', 'Penulis', 1, '2023-07-04 00:32:40', '2023-07-04 00:32:40'),
(2, 'papa zola', 'Penulis', 1, '2023-07-04 00:32:40', '2023-07-04 00:32:40'),
(3, 'tes2', 'Penulis', 2, '2023-07-04 19:15:08', '2023-07-04 19:15:08'),
(4, 'tes1', 'Penulis', 2, '2023-07-04 19:15:08', '2023-07-04 19:15:08'),
(8, 'tes3', 'Penulis', 3, '2023-07-10 20:21:07', '2023-07-10 20:21:07'),
(9, 'tes', 'Penulis', 3, '2023-07-10 20:21:07', '2023-07-10 20:21:07'),
(10, 'tes2', 'Penulis', 3, '2023-07-10 20:21:07', '2023-07-10 20:21:07');

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
(13, '2023_06_28_122141_create_user_profile_table', 1),
(14, '2023_06_29_063306_create_jurnal_review_table', 1);

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
(1, 'S. v. Militante, “Malaria Disease Recognition through Adaptive Deep Learning Models of Convolutional Neural Network,” ICETAS 2019 - 2019\r\n6th IEEE International Conference on Engineering, Technologies and Applied Sciences, Dec. 2019, doi: 10.1109/ICETAS48360.2019.9117446.', 1, '2023-07-04 00:32:40', '2023-07-04 00:32:40'),
(2, 'test', 2, '2023-07-04 19:15:08', '2023-07-04 19:15:08'),
(4, 'asdasdada', 3, '2023-07-10 20:21:07', '2023-07-10 20:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_status` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `jenis_status`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Submission', 'admin', '2023-07-04 00:22:19', NULL),
(2, 'Direview', 'admin', '2023-07-04 00:22:19', NULL),
(3, 'Diterima', 'admin', '2023-07-04 00:22:19', NULL),
(4, 'Copy Editing', 'admin', '2023-07-04 00:22:19', NULL),
(5, 'Dipublish', 'admin', '2023-07-04 00:22:19', NULL),
(6, 'Ditolak', 'admin', '2023-07-04 00:22:19', NULL),
(7, 'Submisi diterima', 'reviewer', '2023-07-04 00:22:19', NULL),
(8, 'Diperlukan revisi', 'reviewer', '2023-07-04 00:22:19', NULL),
(9, 'Submit ulang untuk review', 'reviewer', '2023-07-04 00:22:19', NULL),
(10, 'Submit ulang ditempat lain', 'reviewer', '2023-07-04 00:22:19', NULL),
(11, 'Submisi ditolak', 'reviewer', '2023-07-04 00:22:19', NULL);

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
(1, 'tes', 'tes@gmail.com', '$2y$10$i7gC1Eog/AcRFCozn4DvLeBaYjz3z9IZzFlymlR6jRF6yaYDHuA8e', 'Penulis', '2023-07-04 00:22:19', NULL),
(2, 'fumoku', 'fumoku@gmail.com', '$2y$10$SaYbnsB8LJPy8fo9q1wKNOHPNbZMmruFKqWVrNASdemyKGVviNKH.', 'Editor', '2023-07-04 00:25:36', NULL),
(3, 'blade', 'blade@gmail.com', '$2y$10$Ufv849aU9tXcC3vp/FCdpupUqcPUmlB4tvU9jr6VSsLEgZMFiuQQm', 'Reviewer', '2023-07-04 00:25:44', NULL);

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
(3, 'Fumoku', '+6281013483', 'PCR', 'Bahasa Indonesia', 'cOX5SPsAAAAJ', '57330218200', '6687913', 2, '2023-07-04 20:02:23', NULL),
(4, 'Blade', '+6289385049', 'PCR', 'Bahasa Indonesia', 'cOX5SPsBBBBJ', '57330218211', '6688113', 3, '2023-07-04 20:02:23', NULL);

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
  ADD KEY `jurnal_user_id_foreign` (`user_id`),
  ADD KEY `jurnal_reviewer_id_foreign` (`reviewer_id`);

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
  ADD UNIQUE KEY `user_profile_gsch_id_unique` (`gsch_id`),
  ADD UNIQUE KEY `user_profile_scopus_id_unique` (`scopus_id`),
  ADD UNIQUE KEY `user_profile_sinta_id_unique` (`sinta_id`),
  ADD KEY `user_profile_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurnal_review`
--
ALTER TABLE `jurnal_review`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurnal_volume`
--
ALTER TABLE `jurnal_volume`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontributor`
--
ALTER TABLE `kontributor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_reviewer_id_foreign` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
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
