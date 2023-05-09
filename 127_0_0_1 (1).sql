-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2023 at 04:44 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_directboss2`
--
CREATE DATABASE IF NOT EXISTS `project_directboss2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project_directboss2`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answ`
--

CREATE TABLE `tbl_answ` (
  `no` int(11) NOT NULL,
  `ref_q_id` int(11) NOT NULL,
  `score` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_answ`
--

INSERT INTO `tbl_answ` (`no`, `ref_q_id`, `score`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 4),
(4, 4, 5),
(5, 5, 5),
(6, 1, 2),
(7, 2, 3),
(8, 3, 2),
(9, 4, 5),
(10, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dmboss`
--

CREATE TABLE `tbl_dmboss` (
  `id` int(11) NOT NULL,
  `dm_detail` text NOT NULL,
  `dm_name` varchar(50) NOT NULL,
  `dm_email` varchar(50) NOT NULL,
  `date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dmboss`
--

INSERT INTO `tbl_dmboss` (`id`, `dm_detail`, `dm_name`, `dm_email`, `date_save`) VALUES
(1, 'รายละเอียด', 'รายละเอียด', 'abc@g.com', '2020-03-08 07:52:15'),
(2, 'รายละเอียด', 'รายละเอียด', 'abc@g.com', '2020-03-08 07:53:09'),
(3, 'ทดสอบ', 'ทดสอบ', 'dev@g.com', '2020-03-26 09:18:43'),
(4, 'ทดสอบ', 'นายทดสอบ', 'ddd@g.com', '2020-03-26 09:34:42'),
(5, 'ไม่มีที่จอดรถ', 'สมชาย', 'somchai@gggg.com', '2020-03-26 09:42:00'),
(6, 'aaaaa', 'dddddd', 'aaa@gggc.com', '2023-05-08 09:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_personnel`
--

CREATE TABLE `tbl_personnel` (
  `personnel_id` int(11) NOT NULL,
  `ref_position_id` int(11) NOT NULL COMMENT 'id position',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ref_prefix_id` int(11) NOT NULL COMMENT 'prefix_id',
  `name` varchar(100) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `personnel_level` varchar(1) NOT NULL,
  `dateCreate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_personnel`
--

INSERT INTO `tbl_personnel` (`personnel_id`, `ref_position_id`, `username`, `password`, `ref_prefix_id`, `name`, `lastname`, `phone`, `personnel_level`, `dateCreate`) VALUES
(1, 6, 'aa@gg.com', 'df1bb40520cf283ef729f086bdd578c71af96f74', 1, 'พิศิษฐ์', 'บวรเลิศสุธี', '0211111111', 'S', '2023-05-08 14:51:42'),
(2, 6, 'aa@g.com', '03cb4f4c591e357ef006b9974285101ae2df41c8', 1, 'พพพ', 'ลลล', '0202020202', 'S', '2023-05-08 14:53:29'),
(3, 5, 'abt@g.com', 'd27b153a22cbc3a7377212eb1cc3633117ba14ec', 5, 'พพพพ', 'บบบบบ', '0202154878', 'T', '2023-05-08 14:56:17'),
(4, 6, 'admin@g.com', '64f506c717c631c84af0b92a16c42a5fa057c383', 1, 'Pisit', 'Bow', '0487878787', 'A', '2023-05-08 15:17:44'),
(5, 6, 'aa@ggg', '553aeb66b210b8d840d757afbf2e7d674c83d2c5', 1, 'dddd', 'eeeeeee', '333sss', 'S', '2023-05-09 02:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_name`) VALUES
(1, 'คณบดี'),
(2, 'รองคณบดี'),
(3, 'ผู้ช่วยคณบดี'),
(4, 'ประธานหลักสูตร'),
(5, 'อาจารย์'),
(6, 'บุคลากร');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prefix`
--

CREATE TABLE `tbl_prefix` (
  `prefix_id` int(11) NOT NULL,
  `prefix_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_prefix`
--

INSERT INTO `tbl_prefix` (`prefix_id`, `prefix_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว'),
(4, 'อาจารย์'),
(5, 'อาจารย์ ดร.'),
(6, 'ผศ. ดร.'),
(7, 'รศ.ดร.'),
(8, 'ศ.ดร.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id_question` int(11) NOT NULL,
  `name_question` varchar(100) NOT NULL,
  `group_question` int(1) NOT NULL COMMENT '1 radio, 2 text'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_answ`
--
ALTER TABLE `tbl_answ`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbl_dmboss`
--
ALTER TABLE `tbl_dmboss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  ADD PRIMARY KEY (`personnel_id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbl_prefix`
--
ALTER TABLE `tbl_prefix`
  ADD PRIMARY KEY (`prefix_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_answ`
--
ALTER TABLE `tbl_answ`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_dmboss`
--
ALTER TABLE `tbl_dmboss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_personnel`
--
ALTER TABLE `tbl_personnel`
  MODIFY `personnel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_prefix`
--
ALTER TABLE `tbl_prefix`
  MODIFY `prefix_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
