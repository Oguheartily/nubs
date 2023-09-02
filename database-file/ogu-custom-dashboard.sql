-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 10:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogu-custom-dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_table`
--

CREATE TABLE `contact_form_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contact_name` varchar(55) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form_table`
--

INSERT INTO `contact_form_table` (`id`, `user_id`, `contact_name`, `contact_email`, `subject`, `comments`, `created_at`) VALUES
(1, 4, 'Ogu', 'user@usermail.com', '0', 'Hey Corpers Mami, I just want to say what a great job you are doing, keep it up, I\'d give you 5 stars any day.', '2023-07-26 09:44:17'),
(2, 99, 'Mr anonymous', 'anon@mail.com', '0', 'Hello, Good Job', '2023-07-26 09:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `income_table`
--

CREATE TABLE `income_table` (
  `id` int(11) NOT NULL,
  `excos_id` int(11) NOT NULL,
  `total_sales` int(10) NOT NULL DEFAULT 0,
  `pending_withdrawal` int(10) NOT NULL DEFAULT 0,
  `completed_withdrawal` int(10) NOT NULL DEFAULT 0,
  `current_balance` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income_table`
--

INSERT INTO `income_table` (`id`, `excos_id`, `total_sales`, `pending_withdrawal`, `completed_withdrawal`, `current_balance`) VALUES
(1, 1, 341000, 65000, 75000, 201000),
(5, 5, 57000, 0, 0, 57000),
(7, 8, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nigerian_states`
--

CREATE TABLE `nigerian_states` (
  `id` int(11) NOT NULL,
  `states` varchar(255) NOT NULL,
  `capitals` varchar(255) NOT NULL,
  `cities` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nigerian_states`
--

INSERT INTO `nigerian_states` (`id`, `states`, `capitals`, `cities`) VALUES
(1, 'Abia', 'Umuahia', 'Umuahia'),
(2, 'Adamawa', 'Yola', 'Yola'),
(3, 'Akwa Ibom', 'Uyo', 'Uyo'),
(4, 'Anambra', 'Awka', 'Awka'),
(5, 'Bauchi', 'Bauchi', 'Bauchi'),
(6, 'Bayelsa', 'Yenagoa', 'Yenagoa'),
(7, 'Benue', 'Makurdi', 'Makurdi'),
(8, 'Borno', 'Maiduguri', 'Maiduguri'),
(9, 'Cross Rivers', 'Calabar', 'Calabar'),
(10, 'Delta', 'Asaba', 'Asaba'),
(11, 'Ebonyi', 'Abakaliki', 'Abakaliki'),
(12, 'Edo', 'Benin City', 'Benin City'),
(13, 'Ekiti', 'Ado-Ekiti', 'Ado-Ekiti'),
(14, 'Enugu', 'Enugu', 'Enugu'),
(15, 'Gombe', 'Gombe', 'Gombe'),
(16, 'Imo', 'Owerri', 'Owerri'),
(17, 'Jigawa', 'Dutse', 'Dutse'),
(18, 'Kaduna', 'Kaduna', 'Kaduna'),
(19, 'Kano', 'Kano', 'Kano'),
(20, 'Katsina', 'Katsina', 'Katsina'),
(21, 'Kebbi', 'Birnin Kebbi', 'Birnin Kebbi'),
(22, 'Kogi', 'Lokoja', 'Lokoja'),
(23, 'Kwara', 'Ilorin', 'Ilorin'),
(24, 'Lagos', 'Ikeja', 'Ikeja'),
(25, 'Nasarawa', 'Lafia', 'Lafia'),
(26, 'Niger', 'Minna', 'Minna'),
(27, 'Ogun', 'Abeokuta', 'Abeokuta'),
(28, 'Ondo', 'Akura', 'Akura'),
(29, 'Osun', 'Oshogbo', 'Oshogbo'),
(30, 'Oyo', 'Ibadan', 'Ibadan'),
(31, 'Plateau', 'Jos', 'Jos'),
(32, 'Rivers', 'Port-Harcourt', 'Port-Harcourt'),
(33, 'Sokoto', 'Sokoto', 'Sokoto'),
(34, 'Taraba', 'Jalingo', 'Jalingo'),
(35, 'Yobe', 'Damaturu', 'Damaturu'),
(36, 'Zamfara', 'Gusau', 'Gusau'),
(37, 'FCT', 'FCT', 'Gwagwalada');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `pwd_reset_id` int(11) NOT NULL,
  `pwd_reset_email` varchar(200) NOT NULL,
  `pwd_reset_selector` varchar(200) NOT NULL,
  `pwd_reset_token` varchar(200) NOT NULL,
  `pwd_reset_expires` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `track_all_withdrawals`
--

CREATE TABLE `track_all_withdrawals` (
  `id` int(11) NOT NULL,
  `excos_id` int(11) NOT NULL,
  `amount_withdrawn` int(11) NOT NULL,
  `withdrawal_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `track_all_withdrawals`
--

INSERT INTO `track_all_withdrawals` (`id`, `excos_id`, `amount_withdrawn`, `withdrawal_date`) VALUES
(1, 1, 75000, '2023-08-07 21:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `user_address` varchar(100) DEFAULT '''No Address''',
  `pass_word` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `user_image` varchar(100) DEFAULT '''No Image Yet''',
  `nubs_id_card` varchar(100) DEFAULT '''No ID Image''',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `gender`, `e_mail`, `phone_number`, `state`, `city`, `user_address`, `pass_word`, `role_as`, `status`, `user_image`, `nubs_id_card`, `created_date`) VALUES
(1, 'Jessica', 'Johnson', 'Jessie Attires', 'Female', 'examplemail@example.com', '81234567891', 'Rivers', 'Port-Harcourt', 'Flat 3, No20 Abuloma Street, Fimie-Ama', '$2y$10$cU5Los0LRm58HNPl6kQOP.SZaaylq.hxFV3dm0Yy7HZ.E6velPX2q', 2, 2, '1689860431.jpeg', '1689856717.png', '2023-07-07 20:07:08'),
(2, 'viky', 'blaze', 'vzee', 'Female', 'vzee@example.com', '81234567835', '', '', 'No 12 Aeroplane Drive, Off Simphony Street', '$2y$10$1qf1gSvHiALQC8uMzpeDXunuDS4dmiqsrjiSBQihdyjnrKDokmBLe', 0, 0, NULL, NULL, '2023-07-08 05:28:11'),
(3, 'Ogu', 'Heartily', 'admin', 'Male', 'admin@admin.com', '70000000000', '', '', 'HQ, Planet earth.', '$2y$10$NOc.MCJLhCUwU1fw3y3bdu2TWiaTc6PNsR.NWI9h0odqVXVR4nkhW', 1, 5, NULL, NULL, '2023-07-08 05:29:21'),
(4, 'normal', 'userman', 'user', 'Male', 'user@user.com', '70800000000', 'Rivers', 'Rumuokoro', NULL, '$2y$10$6jvVc4B9V4cjYJziwoTLQ.QX9m7GeZBBuV5jCjo6uCWkBnyQPwG4W', 0, 0, NULL, NULL, '2023-07-08 05:32:43'),
(5, 'ogu', 'heartily', 'OG-Biz', 'male', 'ogu@examplemail.com', '07015321245', 'Rivers', 'Abuloma', 'Port harcourt Street', '$2y$10$XLcENYXWIUYvt7qcgK5wbOcagHEOd/7.bU4ieIaKOPbC/QZDAHfPG', 2, 2, '1689856717.jpg', '1689856717.png', '2023-07-19 12:59:23'),
(6, 'Joyce', 'Major', 'JM', '', 'jm@mail.com', '050214524511', '', '', NULL, '$2y$10$f6VPcw87yUW.ewn2kPV.Ce6knGh6ZZPWC1SRRBCrse7noOOBNfGb6', 9, 0, NULL, NULL, '2023-07-23 15:09:34'),
(7, 'Victor', 'Salem', 'victor Salem1', '', 'vsalem@mail.com', '07082014541', '', '', 'No 1 Business Address', '$2y$10$t0X1d7d8U6dKIhIGqgI84eJ6LeV9q44zXz.YpTsBc9xBDT2HmezE6', 0, 0, '1690545345.jpg', NULL, '2023-07-23 15:15:58'),
(8, 'John', 'Doe', 'Stella Stitch', 'female', 'amazingstella@mail.com', '07080000000', 'Delta', 'ogwachukwu', 'Delta State Poly road', '$2y$10$Cwwac8MAjtbbTGuOEHF27eq.SzmoUD/gu5.LHsL9bLWB.W6S3kNSG', 2, 2, '1691401462.jpg', '1691401462.png', '2023-08-07 08:58:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form_table`
--
ALTER TABLE `contact_form_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_table`
--
ALTER TABLE `income_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `excos_id` (`excos_id`);

--
-- Indexes for table `nigerian_states`
--
ALTER TABLE `nigerian_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`pwd_reset_id`);

--
-- Indexes for table `track_all_withdrawals`
--
ALTER TABLE `track_all_withdrawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form_table`
--
ALTER TABLE `contact_form_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income_table`
--
ALTER TABLE `income_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nigerian_states`
--
ALTER TABLE `nigerian_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `pwd_reset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `track_all_withdrawals`
--
ALTER TABLE `track_all_withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
