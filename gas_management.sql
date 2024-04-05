-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 01:43 PM
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
-- Database: `gas_management`
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
(1, 1, 12, 'Gas Cylinder', 'master/gasCylinder', 1),
(2, 1, 12, 'Gas', 'master/gas', 1),
(3, 1, 12, 'Location', 'master/department', 1),
(4, 1, 12, 'Client', 'master/client', 1),
(5, 2, 12, 'Create Cylinder', 'transaction/create_cylinder', 1),
(6, 2, 12, 'Refill Cylinder', 'transaction/refill_cylinder', 1),
(7, 2, 12, 'Vehicle Loading', 'transaction/vehicle_loading', 1),
(8, 2, 12, 'Vehicle Unload', 'transaction/vehicle_unload', 1),
(9, 2, 12, 'Sale To Customer', 'transaction/sale_to_customer', 1),
(10, 2, 12, 'Storage Cylinder', 'transaction/storage_cylinder', 1),
(11, 2, 1, 'Dashboard', 'transaction/dashboard', 1);

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
  `profile_image` varchar(255) DEFAULT NULL,
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
(1, 1, 1, 1, 'Pradyumn', 'resource/img/employee/1703936534_3bc479b5074fa0dd16e5.jpg', '2000-07-29', 24, 'Male', '121234345656', 'pan01', '', '12345', '9876543210', '9898989898', 'pradyumn@gmail.com', 'Pune', 1, 1, 1, NULL, '444444', 1, 1, '2023-12-30 11:42:14', 1, NULL, 0);

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
-- Table structure for table `client_master`
--

CREATE TABLE `client_master` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `idealtimeforcylinder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`id`, `client_name`, `address`, `contact`, `email`, `idealtimeforcylinder`) VALUES
(1, 'client01', 'pune', '9898989898', 'client@gmail.com', '1');

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
-- Table structure for table `department_master`
--

CREATE TABLE `department_master` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `transaction_use` varchar(255) DEFAULT NULL,
  `gas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `department_master`
--

INSERT INTO `department_master` (`id`, `dept_name`, `description`, `transaction_use`, `gas_id`) VALUES
(1, 'Empty Stock Location', '', 'emp', NULL),
(2, 'Storage Location', '', 'str', NULL),
(3, 'Vehicle Load', '', 'vehicle', NULL),
(4, 'Sale To Customer', '', 'client', NULL),
(5, 'Repair', '', 'repair', NULL),
(6, 'Gas Tank', '', 'gtank', NULL),
(7, 'Refill', '', 'refill', NULL),
(8, 'Vehicle Unload', '', 'unload', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gas_cylinder_master`
--

CREATE TABLE `gas_cylinder_master` (
  `id` int(11) NOT NULL,
  `cylinder_no` varchar(255) NOT NULL,
  `barcode` text DEFAULT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `manufacturer_no` varchar(255) NOT NULL,
  `cylinder_gas_filling_size` varchar(255) NOT NULL,
  `cylinder_height` varchar(255) NOT NULL,
  `gasId` int(11) DEFAULT NULL,
  `cylinder_status` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gas_cylinder_master`
--

INSERT INTO `gas_cylinder_master` (`id`, `cylinder_no`, `barcode`, `manufacturer_name`, `manufacturer_no`, `cylinder_gas_filling_size`, `cylinder_height`, `gasId`, `cylinder_status`, `status`) VALUES
(1, 'Cylinder01', 'soul1000', 'manufacturer01', 'manuNo01', '15', '15', 1, 4, 1),
(2, 'Cylinder02', 'soul1001', 'manufacturer02', 'manuNo02', '15', '15', 2, 4, 1),
(3, 'Cylinder03', 'soul1002', 'manufacturer03', 'manuNo03', '15', '15', 1, 8, 1),
(4, 'Cylinder04', 'soul1003', 'manufacturer04', 'manuNo04', '14', '4', 2, 3, 1),
(5, 'Cylinder05', 'soul1004', 'manufacturer05', 'manuNo05', '14', '15', 1, 2, 1),
(6, 'Cylinder06', 'soul1005', 'manufacturer06', 'manuNo06', '15', '15', 2, 7, 1),
(7, 'Cylinder07', 'soul1006', 'manufacturer07', 'manuNo07', '15', '4', 1, 7, 1),
(8, 'Cylinder08', 'soul1007', 'manufacturer08', 'manuNo08', '14', '4', 2, 1, 1),
(9, 'Cylinder09', 'soul1008', 'manufacturer09', 'manuNo09', '15', '4', 2, 1, 1),
(10, 'Cylinder10', 'soul1009', 'manufacturer10', 'manuNo10', '14', '4', 2, 1, 1),
(11, 'Cylinder11', 'soul1010', 'manufacturer11', 'manuNo11', '14', '4', 1, 1, 1),
(12, 'Cylinder12', 'soul1011', 'manufacturer12', 'manuNo12', '14', '4', 1, 1, 1),
(13, 'Cylinder13', 'soul1012', 'manufacturer13', 'manuNo13', '14', '4', 1, 1, 1),
(14, 'Cylinder14', 'soul1013', 'manufacturer14', 'manuNo14', '14', '4', 2, 1, 1),
(15, 'Cylinder15', 'soul1014', 'manufacturer15', 'manuNo15', '14', '4', 2, 1, 1),
(16, 'Cylinder16', 'soul1015', 'manufacturer16', 'manuNo16', '14', '4', 1, 1, 1),
(17, 'Cylinder17', 'soul1016', 'manufacturer17', 'manuNo17', '14', '4', 2, 1, 1),
(18, 'Cylinder18', 'soul1017', 'manufacturer18', 'manuNo18', '14', '4', 1, 1, 1),
(19, 'Cylinder19', 'soul1018', 'manufacturer19', 'manuNo19', '14', '4', 2, 1, 1),
(20, 'Cylinder20', 'soul1019', 'manufacturer20', 'manuNo20', '14', '4', 2, 1, 1),
(21, 'Cylinder21', 'soul1020', 'manufacturer21', 'manuNo21', '14', '4', 2, 1, 1),
(22, 'Cylinder22', 'soul1021', 'manufacturer22', 'manuNo22', '14', '4', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gas_master`
--

CREATE TABLE `gas_master` (
  `id` int(11) NOT NULL,
  `gas_name` varchar(255) NOT NULL,
  `gas_formula` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `gas_master`
--

INSERT INTO `gas_master` (`id`, `gas_name`, `gas_formula`, `status`) VALUES
(1, 'Oxygen', 'O2', 1),
(2, 'Nitrogen', 'N2', 1);

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
(22, '2023-11-02-071033', 'App\\Database\\Migrations\\AdminMaster', 'default', 'App', 1698913427, 17),
(24, '2023-12-29-133251', 'App\\Database\\Migrations\\GasCylinderMaster', 'default', 'App', 1703856852, 19),
(25, '2023-12-29-130256', 'App\\Database\\Migrations\\GasCylinderModel', 'default', 'App', 1703914895, 20),
(26, '2023-12-30-053802', 'App\\Database\\Migrations\\GasModel', 'default', 'App', 1703914958, 21),
(27, '2023-12-30-060614', 'App\\Database\\Migrations\\RenameColumnInGasModel', 'default', 'App', 1703916459, 22),
(28, '2023-12-30-072823', 'App\\Database\\Migrations\\DepartmentModel', 'default', 'App', 1703921611, 23),
(29, '2023-12-30-092231', 'App\\Database\\Migrations\\ClientModel', 'default', 'App', 1703929531, 24),
(30, '2024-01-08-100413', 'App\\Database\\Migrations\\StockTypeModel', 'default', 'App', 1704708449, 25),
(31, '2024-01-09-044040', 'App\\Database\\Migrations\\Stocksmaster', 'default', 'App', 1704776330, 26);

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
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `contact_number1` varchar(20) NOT NULL,
  `contact_number2` varchar(20) DEFAULT NULL,
  `email_id` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `office_branch_master`
--

INSERT INTO `office_branch_master` (`id`, `office_type_id`, `office_name`, `address`, `country_id`, `state_id`, `city_id`, `area_id`, `pincode`, `hod_id`, `created_by`, `created_at`, `modified_by`, `modified_at`, `contact_number1`, `contact_number2`, `email_id`) VALUES
(1, 1, 'Guddu Cake Shop', 'Pune', 1, 1, 1, NULL, 444444, 0, NULL, NULL, NULL, NULL, '9876543210', '9898989898', 'pradyumn@gmail.com');

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
(1, 'Main-Branch');

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
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(14, 11, 1),
(15, 6, 1),
(16, 10, 1),
(17, 7, 1),
(18, 8, 1),
(19, 9, 1);

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
(1, 1, 'System Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_role_permission`
--

CREATE TABLE `profile_role_permission` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(1, 1, 1),
(2, 2, 1);

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
(1, 'Admin');

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
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `cylinder_id` int(11) NOT NULL,
  `barcode` text DEFAULT NULL,
  `qr_code` text DEFAULT NULL,
  `qty` varchar(255) DEFAULT '1',
  `stock_type` varchar(255) DEFAULT '1',
  `stock_location` varchar(255) DEFAULT '1',
  `date` date DEFAULT NULL,
  `gas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `cylinder_id`, `barcode`, `qr_code`, `qty`, `stock_type`, `stock_location`, `date`, `gas_id`) VALUES
(14, 3, 'soul1002', NULL, '1', '1', '8', '2024-01-25', 1),
(24, 2, 'soul1001', NULL, '1', '1', '4', '2024-01-25', 2),
(25, 4, 'soul1003', NULL, '1', '1', '3', '0000-00-00', 2),
(27, 1, 'soul1000', NULL, '1', '1', '4', '2024-01-25', 1),
(29, 5, 'soul1004', NULL, '1', '1', '2', '2024-01-27', 1),
(32, 6, 'soul1005', NULL, '1', '1', '7', '2024-01-27', 2),
(34, 7, 'soul1006', NULL, '1', '1', '7', '2024-01-27', 1),
(35, 8, 'soul1007', NULL, '1', '1', '1', '2024-01-27', 2),
(37, 9, 'soul1008', NULL, '1', '1', '1', '2024-01-27', 2),
(38, 10, 'soul1009', NULL, '1', '1', '1', '2024-01-27', 2),
(39, 11, 'soul1010', NULL, '1', '1', '1', '2024-01-27', 1),
(40, 12, 'soul1011', NULL, '1', '1', '1', '2024-01-27', 1),
(41, 13, 'soul1012', NULL, '1', '1', '1', '2024-01-27', 1),
(42, 14, 'soul1013', NULL, '1', '1', '1', '2024-01-27', 2),
(45, 15, 'soul1014', NULL, '1', '1', '1', '2024-01-27', 2),
(46, 16, 'soul1015', NULL, '1', '1', '1', '2024-01-27', 1),
(47, 17, 'soul1016', NULL, '1', '1', '1', '2024-01-27', 2),
(48, 18, 'soul1017', NULL, '1', '1', '1', '2024-01-27', 1),
(49, 19, 'soul1018', NULL, '1', '1', '1', '2024-01-27', 2),
(50, 20, 'soul1019', NULL, '1', '1', '1', '2024-01-27', 2),
(51, 21, 'soul1020', NULL, '1', '1', '1', '2024-01-27', 2),
(53, 22, 'soul1021', NULL, '1', '1', '2', '2024-01-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stock_type_master`
--

CREATE TABLE `stock_type_master` (
  `id` int(11) NOT NULL,
  `stock_type_master` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stock_type_master`
--

INSERT INTO `stock_type_master` (`id`, `stock_type_master`, `description`) VALUES
(1, 'Opening', 'Create New Cylinder'),
(2, 'Refill', 'Issue to refilling department (O2, N)'),
(3, 'Store', 'Issue from refill dept / Vehicle to Store department'),
(4, 'Vehicle', 'Loading from store to Vehicle'),
(5, 'Sales', 'Sale to client from vehicle or store'),
(6, 'Inward', 'Inward to Empty Department');

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
(1, 'gms@gmail.com', '$2y$10$VlJVFB.upU2iSpK2EyqnhuAZm7WUG.2M19V8SW1xf4UinZqTgMAjG', '2023-12-28 01:53:23', '2023-12-28 01:53:23');

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
(1, 'Master', 1, 5, 1),
(2, 'Transaction', 1, 13, 1);

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
-- Indexes for table `client_master`
--
ALTER TABLE `client_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_master`
--
ALTER TABLE `department_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `gas_cylinder_master`
--
ALTER TABLE `gas_cylinder_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `gas_master`
--
ALTER TABLE `gas_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stock_type_master`
--
ALTER TABLE `stock_type_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_master`
--
ALTER TABLE `activity_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department_master`
--
ALTER TABLE `department_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gas_cylinder_master`
--
ALTER TABLE `gas_cylinder_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gas_master`
--
ALTER TABLE `gas_master`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `office_branch_master`
--
ALTER TABLE `office_branch_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `office_type_master`
--
ALTER TABLE `office_type_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_access_control_permission`
--
ALTER TABLE `profile_access_control_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_activity_permission`
--
ALTER TABLE `profile_activity_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `profile_master`
--
ALTER TABLE `profile_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profile_role_permission`
--
ALTER TABLE `profile_role_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_tab_permission`
--
ALTER TABLE `profile_tab_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `stock_type_master`
--
ALTER TABLE `stock_type_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `super_master`
--
ALTER TABLE `super_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tab_master`
--
ALTER TABLE `tab_master`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
