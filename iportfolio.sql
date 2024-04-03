-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 03:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curvdent`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_access_controls`
--

CREATE TABLE `activity_access_controls` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `control_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activity_access_controls`
--

INSERT INTO `activity_access_controls` (`id`, `activity_id`, `control_name`) VALUES
(1, 1, 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `activity_master`
--

CREATE TABLE `activity_master` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `tab_id` int(11) NOT NULL,
  `icon_id` int(11) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `activity_master`
--

INSERT INTO `activity_master` (`id`, `tab_id`, `icon_id`, `activity_title`, `url`, `is_active`) VALUES
(1, 1, 2, 'Client', 'client', 1),
(2, 1, 12, 'Branch', 'branch', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `office_branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `aadhar_no` varchar(255) NOT NULL,
  `pancard` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `password` varchar(8) NOT NULL,
  `contact_number1` varchar(20) NOT NULL,
  `contact_number2` varchar(20) DEFAULT NULL,
  `email_id` varchar(150) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `pincode` varchar(10) NOT NULL,
  `is_active` tinyint(2) NOT NULL,
  `is_verified` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `role_id`, `profile_id`, `office_branch_id`, `name`, `profile_image`, `dob`, `age`, `gender`, `aadhar_no`, `pancard`, `userid`, `password`, `contact_number1`, `contact_number2`, `email_id`, `address`, `country_id`, `state_id`, `city_id`, `area_id`, `pincode`, `is_active`, `is_verified`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 1, 1, 'Pradyumn', 'resource/img/employee/1699261619_64082414e425fd4ad27f.jpg', '1998-07-29', 25, 'Male', '4465654446456', 'ghf76758', 'pb@gmail.com', '12345', '9898989898', '9898989898', 'pradyumn@gmail.com', 'pune', 1, 1, 1, NULL, '441441', 1, 1, '2023-11-06 09:06:59', 1, NULL, 0),
(2, 2, 2, 1, 'abcde', 'resource/img/employee/1699261152_29576a7335846e5ae597.jpg', '2023-11-15', 33, 'Male', '4465654446456', 'ghf76758', '', '12345', '9898989898', '9898989898', 'abcd@gmail.com', 'pune', 1, 1, 1, NULL, '441441', 1, 1, '2023-11-06 08:59:12', 1, NULL, 0),
(3, 1, 1, 1, '', 'resource/img/employee/1699265693_2d4f1e93e437efb08d37.jpg', '0000-00-00', 0, 'Male', '', '', '', '', '', '', '', '', 1, 1, 1, NULL, '', 1, 1, '2023-11-06 10:14:53', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`id`, `country_id`, `state_id`, `city`) VALUES
(1, 1, 1, 'Pune'),
(2, 1, 1, 'Sangamner');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`id`, `country`) VALUES
(1, 'India'),
(2, 'America');

-- --------------------------------------------------------

--
-- Table structure for table `icon_master`
--

CREATE TABLE `icon_master` (
  `id` int(11) UNSIGNED NOT NULL,
  `icon_title` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `icon_master`
--

INSERT INTO `icon_master` (`id`, `icon_title`, `icon`) VALUES
(1, 'Dashboard', 'fa fa-dashboard'),
(2, 'Spinner', 'fa fa-fw fa-spinner'),
(3, 'Briefcase', 'glyphicon glyphicon-briefcase'),
(4, 'Location marker', 'fa fa-map-marker'),
(5, 'Bank', 'fa fa-bank'),
(6, 'Car', 'fa fa-automobile'),
(7, 'Cake', 'fa fa-birthday-cake'),
(8, 'Astrik', 'fa fa-asterisk'),
(9, 'Edit', 'fa fa-edit'),
(10, 'Bell', 'fa fa-bell-o'),
(11, 'Bookmark', 'fa fa-bookmark'),
(12, 'Circle', 'fa fa-circle-o'),
(13, 'Bars', 'fa fa-bars'),
(14, 'Archive', 'fa fa-archive');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-10-21-072904', 'App\\Database\\Migrations\\AddSuperUser', 'default', 'App', 1698036772, 1),
(2, '2023-10-22-121827', 'App\\Database\\Migrations\\Test', 'default', 'App', 1698036773, 1),
(3, '2023-10-23-062526', 'App\\Database\\Migrations\\TabMaster', 'default', 'App', 1698042596, 2),
(4, '2023-10-23-111520', 'App\\Database\\Migrations\\IconMaster', 'default', 'App', 1698059932, 3),
(5, '2023-10-23-110044', 'App\\Database\\Migrations\\ActivityMaster', 'default', 'App', 1698208834, 4),
(6, '2023-10-25-060037', 'App\\Database\\Migrations\\ProfileMaster', 'default', 'App', 1698215199, 5),
(7, '2023-10-25-072127', 'App\\Database\\Migrations\\RoleMaster', 'default', 'App', 1698231087, 6),
(8, '2023-10-25-095531', 'App\\Database\\Migrations\\OfficeTypeMaster', 'default', 'App', 1698231087, 6),
(9, '2023-10-26-034604', 'App\\Database\\Migrations\\AdminMaster', 'default', 'App', 1698292038, 7),
(10, '2023-10-26-063958', 'App\\Database\\Migrations\\AdminMaster', 'default', 'App', 1698302710, 8),
(11, '2023-10-26-072624', 'App\\Database\\Migrations\\ProfileRolePermission', 'default', 'App', 1698305837, 9),
(12, '2023-10-26-093318', 'App\\Database\\Migrations\\ProfileTabPermission', 'default', 'App', 1698312892, 10),
(13, '2023-10-26-102236', 'App\\Database\\Migrations\\ProfileActivityPermission', 'default', 'App', 1698315915, 11),
(14, '2023-10-26-114626', 'App\\Database\\Migrations\\ProfileAccessControlPermission', 'default', 'App', 1698369469, 12),
(15, '2023-10-27-013630', 'App\\Database\\Migrations\\ProfileAccessControlPermission', 'default', 'App', 1698370655, 13),
(16, '2023-10-26-123618', 'App\\Database\\Migrations\\OfficeBranchMaster', 'default', 'App', 1698379543, 14),
(17, '2023-10-27-033444', 'App\\Database\\Migrations\\ActivityAccessControls', 'default', 'App', 1698379544, 14),
(18, '2023-10-27-054555', 'App\\Database\\Migrations\\CountryMaster', 'default', 'App', 1698412097, 15),
(19, '2023-10-27-061446', 'App\\Database\\Migrations\\StateMaster', 'default', 'App', 1698412098, 15),
(20, '2023-10-27-084556', 'App\\Database\\Migrations\\CityMaster', 'default', 'App', 1698412099, 15),
(21, '2023-10-28-082747', 'App\\Database\\Migrations\\AdminMaster', 'default', 'App', 1698481769, 16),
(22, '2023-11-02-071033', 'App\\Database\\Migrations\\AdminMaster', 'default', 'App', 1698913427, 17);

-- --------------------------------------------------------

--
-- Table structure for table `office_branch_master`
--

CREATE TABLE `office_branch_master` (
  `id` int(11) NOT NULL,
  `office_type_id` int(11) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `pincode` int(11) NOT NULL,
  `hod_id` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `contact_number1` varchar(20) NOT NULL,
  `contact_number2` varchar(20) DEFAULT NULL,
  `email_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `office_branch_master`
--

INSERT INTO `office_branch_master` (`id`, `office_type_id`, `office_name`, `address`, `country_id`, `state_id`, `city_id`, `area_id`, `pincode`, `hod_id`, `created_by`, `created_at`, `modified_by`, `modified_at`, `contact_number1`, `contact_number2`, `email_id`) VALUES
(1, 1, 'Guddu Cake Shop', '34,rameshwarinagpur', 1, 1, 1, NULL, 440009, 1, '', '2022-01-23 06:34:27', 1, '2022-01-23 06:34:42', '8741258963', '', 'lalit@gmail.com'),
(2, 3, 'Krishna Enterprises', 'kudkeshwar road nagpur', 1, 1, 1, 0, 440034, 1, '1', '2023-07-20 10:03:27', 1, '2023-07-20 10:04:30', '08007015819', '', 'lalitrmeshram@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `office_type_master`
--

CREATE TABLE `office_type_master` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `office_type_master`
--

INSERT INTO `office_type_master` (`id`, `type`) VALUES
(1, 'Main-Branch'),
(2, 'Sub-Branch');

-- --------------------------------------------------------

--
-- Table structure for table `profile_access_control_permission`
--

CREATE TABLE `profile_access_control_permission` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `aac_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_activity_permission`
--

CREATE TABLE `profile_activity_permission` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile_activity_permission`
--

INSERT INTO `profile_activity_permission` (`id`, `activity_id`, `profile_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_master`
--

CREATE TABLE `profile_master` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile_master`
--

INSERT INTO `profile_master` (`id`, `role_id`, `profile`, `is_active`) VALUES
(1, 1, 'System Admin', 1),
(2, 2, 'Sells Manager', 1),
(4, 2, 'Sellsman', 1),
(5, 2, 'Cashier', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_role_permission`
--

CREATE TABLE `profile_role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile_role_permission`
--

INSERT INTO `profile_role_permission` (`id`, `role_id`, `profile_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 4),
(4, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `profile_tab_permission`
--

CREATE TABLE `profile_tab_permission` (
  `id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile_tab_permission`
--

INSERT INTO `profile_tab_permission` (`id`, `tab_id`, `profile_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state` varchar(100) NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`id`, `country_id`, `state`, `is_active`) VALUES
(1, 1, 'Maharashtra', 1),
(2, 1, 'Gujrat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `super_master`
--

CREATE TABLE `super_master` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `uname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `super_master`
--

INSERT INTO `super_master` (`id`, `uname`, `password`, `created_at`, `updated_at`) VALUES
(1, 'pb@gmail.com', '$2y$10$AJef5ZstgN9KmrlGEtTRnO1xFYIUENdcdSdo41ywWuqGyenSGq5lC', '2023-10-22 23:39:10', '2023-10-22 23:39:10'),
(2, 'pradyumn@gmail.com', '$2y$10$wo3vPRHoDskOR83y6Ba5veW8VsvGPJTD6f5XhXgHGwlKfOzVj.2UW', '2023-10-22 23:52:23', '2023-10-22 23:52:23'),
(3, 'pradyumn123@gmail.com', '$2y$10$vMBIEpF.kgHeyhaqqxljbeGtWQsLKwzR6SjpOGkwBHYUG1LbD.w6u', '2023-10-22 23:53:42', '2023-10-22 23:53:42'),
(4, 'pradyumn1234@gmail.com', '$2y$10$PWoY4TGjFeOfgzKl35usFOsLE/mp.8ZrU4gUcN6hsGqG8t9CBDjye', '2023-10-23 00:29:27', '2023-10-23 00:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `tab_master`
--

CREATE TABLE `tab_master` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `tab_name` varchar(255) NOT NULL,
  `is_subtab` tinyint(1) NOT NULL,
  `icon_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tab_master`
--

INSERT INTO `tab_master` (`id`, `tab_name`, `is_subtab`, `icon_id`, `is_active`) VALUES
(1, 'Master', 1, 2, 1),
(2, 'Decode', 1, 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_access_controls`
--
ALTER TABLE `activity_access_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_master`
--
ALTER TABLE `activity_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icon_master`
--
ALTER TABLE `icon_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `icon_title` (`icon_title`),
  ADD UNIQUE KEY `icon` (`icon`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_branch_master`
--
ALTER TABLE `office_branch_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_type_master`
--
ALTER TABLE `office_type_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_access_control_permission`
--
ALTER TABLE `profile_access_control_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_activity_permission`
--
ALTER TABLE `profile_activity_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_master`
--
ALTER TABLE `profile_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_role_permission`
--
ALTER TABLE `profile_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_tab_permission`
--
ALTER TABLE `profile_tab_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_master`
--
ALTER TABLE `super_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `tab_master`
--
ALTER TABLE `tab_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tab_name` (`tab_name`),
  ADD KEY `is_subtab` (`is_subtab`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_access_controls`
--
ALTER TABLE `activity_access_controls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activity_master`
--
ALTER TABLE `activity_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `icon_master`
--
ALTER TABLE `icon_master`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `office_branch_master`
--
ALTER TABLE `office_branch_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office_type_master`
--
ALTER TABLE `office_type_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile_access_control_permission`
--
ALTER TABLE `profile_access_control_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_activity_permission`
--
ALTER TABLE `profile_activity_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_master`
--
ALTER TABLE `profile_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile_role_permission`
--
ALTER TABLE `profile_role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile_tab_permission`
--
ALTER TABLE `profile_tab_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `super_master`
--
ALTER TABLE `super_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tab_master`
--
ALTER TABLE `tab_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
