-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 11:59 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kirablogspotdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `created_at`) VALUES
(1, 'Kira', '$2y$10$5CVq67qVJmm1KaoJrgKrJeMI9DAa3BHkLmwGh/Wkc761bgbVo2zgG', '2018-06-11 16:50:22'),
(2, 'chadmartin0215@yahoo.com', '$2y$10$4PU4rCGl6JpGPb8hxVDnUOg3TVj/HevygRVwKe3oxlGCfTJFv3dtG', '2018-06-11 22:05:20'),
(3, 'qwe123', '$2y$10$IzVGrFGggJEAOXIKGJjMT.BF0mTkeX2pALdVA0CRtOqyWE6hqesFm', '2018-06-11 22:07:29'),
(4, 'qwe', '$2y$10$VhV5fR3sgwadATkmecjTveu5AiMDOxQtIroRO4pAxXbZSDrWkFfP2', '2018-06-11 22:09:12'),
(5, 'blu', '$2y$10$wDlSh91glLYmN/0vTEDxlO2vgL75KxduFCBznJst2/1wspuMTvMAe', '2018-06-11 22:10:41'),
(6, 'poqwe', '$2y$10$968BU53ogkjRhJO6v9uSg.IOaze17/lqXjux7H9eWavryWzSib9Qi', '2018-06-11 22:11:08'),
(7, 'sdfasf', '$2y$10$ahqPbHZEansyeFYTyhn6k.lwVn3RsthrE8ozCGoPSoavo5dwmRQfq', '2018-06-11 22:11:28'),
(8, 'okay', '$2y$10$XBBGTR5f86cQzWuVBGnaPu/r6tjTe/q4ukWS2ntnuZvsHkyBc0d16', '2018-06-11 22:12:30'),
(9, 'qweqweqweqwe', '$2y$10$pE6PchJjSI5/eGF7yDszn.LNY2JMDrPO4fBC56Es41kg48BitRJLO', '2018-06-11 22:15:30'),
(10, 'qweqweqweqweqweqwe', '$2y$10$Fj02Tv4QDLnMREUiumc.ueq7814WWvY3wIi4QK6P.HpPKqg8qyM4.', '2018-06-11 22:16:51'),
(11, 'aerawertawertawerawer', '$2y$10$VnrnLRQndmd8tnEMK0E5ie80v7157OIKz.XPni2bE.ohgl8lPppwi', '2018-06-11 22:18:24'),
(12, 'awerawerawerawer', '$2y$10$fZNgT84a5iGlFk/iE4XaCugJ1DelYOK/.M2Lk1zDw3gtzUDM6LW.K', '2018-06-11 22:18:42'),
(13, 'kiraqwe', '$2y$10$bE7x9d4dSDvS/9zCpuhQiO3A6nvMZye2nan3XIAcQRoYCu50uxSnK', '2018-06-11 22:21:53'),
(14, 'asdfafwsdfds', '$2y$10$KUXzTzp../3ftxkIY68Osu3C0Xth1VV/k3aEhyRdcxc/gwg1yYkDK', '2018-06-11 22:23:07'),
(15, 'yurturdtyudrtyu', '$2y$10$yERKzE726jNG4iZf.8AhxubeMmVQHYSkws/PgM0Zt7lrNi9ibSHQG', '2018-06-11 22:26:02'),
(16, 'yeah', '$2y$10$/dHiK/IHb.SLDxVF85fs2uLfSydS.Gxh/mzfOB0ZEBvIHNPV9PgA6', '2018-06-11 22:27:46'),
(17, 'qwe123r', '$2y$10$Lqf8kCaKwJmMQq3bA/ZDEO2DIVO6sYmciRbaZZweMo/BVRWTo0z02', '2018-06-11 22:28:01'),
(18, 'kira123', '$2y$10$MPnZYwMCxT6TPSlzvE2WGuRxUMBa4XCtWDSkdYGN1sg2BH2nlc3CW', '2018-06-11 22:57:06'),
(19, 'kira1234', '$2y$10$vxQ8Z54B/5G5nNyLvQ10/.oy0fWArHcB0IK2qSboEpNq5IDzkHmAa', '2018-06-13 15:52:39'),
(20, 'l\';l;l;', '$2y$10$NXOS6vIWBjdvsmMN8qZuMud5t4JPjVufNix/X0mbgBmySp7pRaFAi', '2018-06-13 17:09:43'),
(21, 'adsfqwe', '$2y$10$iuE1pm3bdO97nT7pEQlxOuJEPM5769vXX3mfAVSk6Vtcy5AgmgCru', '2018-06-13 21:37:05'),
(22, 'blu123', '$2y$10$1nn7/h/zuw/OwgXuPG8R6OM7MnTkj5dhg3KQrHPIPFNaMSRSjPmKe', '2018-06-14 17:36:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
