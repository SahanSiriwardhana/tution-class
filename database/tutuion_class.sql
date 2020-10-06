-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 04:00 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutuion_class`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_payments`
--

CREATE TABLE `class_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `month` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_students`
--

CREATE TABLE `class_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `institute_classes`
--

CREATE TABLE `institute_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scheme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_for_examination` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacherID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_count` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institute_classes`
--

INSERT INTO `institute_classes` (`id`, `class_name`, `scheme`, `year_for_examination`, `subject`, `date`, `start_time`, `end_time`, `fee`, `teacherID`, `status`, `student_count`, `created_at`, `updated_at`) VALUES
(1, 'A/L-2024-Maths', 'A/L', '2024', 'Test', 'Friday', '06:58', '03:01', '800', '3', '1', 0, '2020-09-22 17:01:06', '2020-10-05 20:29:13'),
(2, 'A/L-2020-Test 2', 'A/L', '2020', 'Test 2', 'Monday', '08:06', '04:09', '1800', '4', '1', 0, '2020-09-22 17:06:32', '2020-10-01 13:39:49'),
(4, 'O/L-2020-Sinhala', 'A/L', '2020', 'Sinhala', 'Wednesday', '14:58', '16:58', '900', '3', '1', 0, '2020-10-04 03:59:53', '2020-10-04 09:37:00');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_09_20_034145_create_teachers_table', 1),
(12, '2020_09_20_034203_create_students_table', 1),
(13, '2020_09_21_183731_create_institute_classes_table', 2),
(14, '2020_09_25_191840_laratrust_setup_tables', 3),
(15, '2020_09_29_183246_create_class_students_table', 4),
(16, '2020_09_29_214816_create_class_payments_table', 5),
(17, '2020_10_01_081153_create_notifications_table', 6),
(18, '2020_10_01_104025_create_roles_table', 7),
(19, '2020_10_01_104456_create_role_user__table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `class_id`, `date`, `message`, `created_at`, `updated_at`) VALUES
(2, 2, '2020-10-16', 'class will not be held', '2020-10-01 04:55:27', '2020-10-01 04:55:27'),
(4, 1, '2020-10-24', 'test 32', '2020-10-01 06:25:46', '2020-10-01 06:25:46'),
(5, 2, '2020-10-12', 'redda', '2020-10-02 15:05:26', '2020-10-02 15:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'teacher', NULL, NULL),
(3, 'student', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 4, NULL, NULL),
(3, 3, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `genID`, `first_name`, `last_name`, `grade`, `email`, `userID`, `contact_no`, `created_at`, `updated_at`) VALUES
(1, 'STD0001', 'sahan', 'Amarathunga', '9', 'sudeerasahanstd@gmail.com', '6', '0716531991', '2020-09-20 09:23:35', '2020-09-29 12:06:59'),
(3, 'STD0002', 'Asanka', 'darshana', '8', 'asankad@gmail.com', '8', '0711309416', '2020-09-29 12:47:34', '2020-09-29 12:47:34'),
(4, 'STD0004', 'Isuru', 'Malaka', '9', 'lapa@gmail.com', '9', '0813214567', '2020-10-01 02:33:55', '2020-10-01 02:33:55'),
(5, 'STD0005', 'Ashan', 'Sajeewa', '9', 'sanjeewa@gmail.com', '10', '0916206312', '2020-10-05 19:36:19', '2020-10-05 19:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `genID` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `genID`, `first_name`, `last_name`, `email`, `userID`, `contact_no`, `created_at`, `updated_at`) VALUES
(3, 'TEC0003', 'Denith', 'Liyanaarachchi', 'kanaka@gmail.com', '3', '0771620876', '2020-09-20 08:16:20', '2020-09-20 08:39:54'),
(4, 'TEC0004', 'Rangana', 'Rasith', 'rath@gmail.com', '4', '0716209871', '2020-09-20 09:02:03', '2020-09-20 09:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'sudeerasahan@gmail.com', '1', NULL, '$2y$10$CdugtwHAPI3zS9TJuKNUw.yYTS/uwt3gGUcgslCI4dBxB7GAAzrGK', NULL, '2020-09-20 06:06:39', '2020-10-02 14:59:36'),
(3, 'TEC0003', 'kanaka@gmail.com', '2', NULL, '$2y$10$jLhtfxfpkOtmwhN2MQDDOeetpntgdO50SUwex5uf1pSs9c9P072uu', NULL, '2020-09-20 08:16:20', '2020-09-20 08:16:20'),
(4, 'TEC0004', 'rath@gmail.com', '2', NULL, '$2y$10$jLhtfxfpkOtmwhN2MQDDOeetpntgdO50SUwex5uf1pSs9c9P072uu', NULL, '2020-09-20 09:02:03', '2020-09-20 09:02:03'),
(5, 'STD0001', 'sudeerasahan1@gmail.com', '2', NULL, '$2y$10$ceCYGGSsJeHnPbO0yWBcsuLt/Ct/WHvT4jvgKT/WuuPz6GFPR1bIy', NULL, '2020-09-20 09:20:03', '2020-09-20 09:20:03'),
(6, 'STD0001', 'sudeerasahanstd@gmail.com', '3', NULL, '$2y$10$jLhtfxfpkOtmwhN2MQDDOeetpntgdO50SUwex5uf1pSs9c9P072uu', NULL, '2020-09-20 09:23:35', '2020-09-20 09:23:35'),
(7, 'STD0002', 'ash@gmail.com', '3', NULL, '$2y$10$mnFMM5W9FU3/bbjPK.ft8OEUJkCGj1k3qU8ZKbj9Rj410YGFJeqIS', NULL, '2020-09-29 12:22:58', '2020-09-29 12:22:58'),
(8, 'STD0002', 'asankad@gmail.com', '3', NULL, '$2y$10$kKgtFyqVyqyj6HcrkUY9r.3uZOiEMw3k0FBmakuygYbiMZI9bNWoy', NULL, '2020-09-29 12:47:34', '2020-09-29 12:47:34'),
(9, 'STD0004', 'lapa@gmail.com', '3', NULL, '$2y$10$BisVYWkc6Vjax00hK.5jCemNBHNeOKfds859ROmUM/8wfbBe0MmiK', NULL, '2020-10-01 02:33:55', '2020-10-01 02:33:55'),
(10, 'STD0005', 'sanjeewa@gmail.com', '3', NULL, '$2y$10$oGrnu.475PVWc28pvJv5MO4kzEA0N.hElHW0l467Sz8OKvTLZPgqK', NULL, '2020-10-05 19:36:18', '2020-10-05 19:36:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_payments`
--
ALTER TABLE `class_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_payments_class_id_foreign` (`class_id`),
  ADD KEY `class_payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `class_students`
--
ALTER TABLE `class_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_students_class_id_foreign` (`class_id`),
  ADD KEY `class_students_student_id_foreign` (`student_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institute_classes`
--
ALTER TABLE `institute_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_class_id_foreign` (`class_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genID` (`genID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `class_payments`
--
ALTER TABLE `class_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `class_students`
--
ALTER TABLE `class_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institute_classes`
--
ALTER TABLE `institute_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class_payments`
--
ALTER TABLE `class_payments`
  ADD CONSTRAINT `class_payments_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `institute_classes` (`id`),
  ADD CONSTRAINT `class_payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `class_students`
--
ALTER TABLE `class_students`
  ADD CONSTRAINT `class_students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `institute_classes` (`id`),
  ADD CONSTRAINT `class_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `institute_classes` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
