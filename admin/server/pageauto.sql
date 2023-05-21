-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 02:15 PM
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
-- Database: `e-com`
--

-- --------------------------------------------------------

--
-- Table structure for table `pageauto`
--

CREATE TABLE `pageauto` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `type_box` varchar(50) NOT NULL,
  `database_name` varchar(50) NOT NULL,
  `box_title` varchar(50) NOT NULL,
  `checkbox` int(10) NOT NULL,
  `select_table_name` varchar(50) NOT NULL,
  `where_table_name` varchar(50) NOT NULL,
  `select_option_value` varchar(50) NOT NULL,
  `label_type` varchar(50) NOT NULL,
  `select_show_value` varchar(50) NOT NULL,
  `where_serach` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pageauto`
--

INSERT INTO `pageauto` (`id`, `table_name`, `type_box`, `database_name`, `box_title`, `checkbox`, `select_table_name`, `where_table_name`, `select_option_value`, `label_type`, `select_show_value`, `where_serach`) VALUES
(2, 't_shirts', 'input', 'image', 'IMAGE', 19, '', '', '', 'file', '', ''),
(3, 't_shirts', 'input', 'name', 'ENTER NAME', 19, '', '', '', 'text', '', ''),
(4, 't_shirts', 'select', 'brands', 'ENTER  BRANDS', 18, 'brands', 'typee', 'id', 'text', 'name', 'brands'),
(6, 't_shirts', 'select', 'common_name', 'ENTER  COMMON NAM', 18, 'common_name', 'typee', 'id', 'text', 'name', 'color'),
(7, 't_shirts', 'checkbox', 'active', 'ENTER ACTIVE', 19, '', '', '', '', '', ''),
(8, 't_shirts', 'input', 't_name', 'ENTER INFO', 19, '', '', '', '', '', ''),
(12, 'menu', 'input', 'name', 'ENTER NAME', 19, '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pageauto`
--
ALTER TABLE `pageauto`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pageauto`
--
ALTER TABLE `pageauto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
