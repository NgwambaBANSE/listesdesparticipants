-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2023 at 05:08 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apprenant`
--

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int UNSIGNED NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `ville` varchar(30) NOT NULL,
  `formation` varchar(30) NOT NULL,
  `reg_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `date_de_naissance`, `ville`, `formation`, `reg_date`) VALUES
(23, 'BANSE', 'Ousseni', '1099-01-01', 'Ouagadougou', 'Economie', '2023-06-07 15:17:26'),
(24, 'SAVADO', 'JEAN', '1999-02-20', 'Koudougou', 'Histoire', '2023-06-07 15:18:21'),
(25, 'CONGO', 'ALI', '1999-12-12', 'BOBO', 'SVT', '2023-06-07 15:19:11'),
(26, 'SONDO', 'ABI', '2000-02-20', 'kaya', 'lm', '2023-06-07 15:19:47'),
(27, 'OUEDRAOGO', 'Daouda', '1999-11-11', 'bobo', 'MPCI', '2023-06-07 15:21:08'),
(28, 'Kouraogo', 'edvige', '2000-02-02', 'Ouagadougou', 'Psycologie', '2023-06-07 15:22:04'),
(29, 'gagre', 'Martine', '1990-12-19', 'Koudougou', 'svt', '2023-06-07 15:22:46'),
(31, 'yameogo', 'jeanine', '1997-02-02', 'koudougou', 'histoire', '2023-06-07 15:24:18'),
(32, 'Bonkoungou', 'ulrich', '1996-11-10', 'koudougou', 'Economie', '2023-06-07 15:25:08'),
(33, 'Bonkoungou', 'ulrich', '1996-11-10', 'koudougou', 'Economie', '2023-06-07 15:25:13'),
(34, 'Bonkoungou', 'ulrich', '1996-11-10', 'koudougou', 'Economie', '2023-06-07 15:25:13'),
(35, 'ouedraogo', 'adamq', '2003-02-20', 'kaya', 'Lettre', '2023-06-07 15:26:05'),
(36, 'Maiga', 'samira', '1999-10-10', 'koudougou', 'Marketing', '2023-06-07 15:26:45'),
(37, 'BANSo', 'Ousseni', '1099-01-01', 'Ouagadougou', 'Economie', '2023-06-07 15:31:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
