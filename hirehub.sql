-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 07:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hirehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `a_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `seeker_id` int(11) NOT NULL,
  `mojor_skill` varchar(30) NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `j_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `j_title` varchar(40) NOT NULL,
  `j_type` varchar(30) NOT NULL,
  `j_description` varchar(60) NOT NULL,
  `needed_skill` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`j_id`, `e_id`, `j_title`, `j_type`, `j_description`, `needed_skill`, `status`) VALUES
(1, 2, 'Back-End Developer [Django]', 'Full_Time', 'Need a Back_End developer who has decent knowledge in Django', 'Django', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jskill`
--

CREATE TABLE `jskill` (
  `jr_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `skill_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `s_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `skill_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`s_id`, `e_id`, `skill_name`) VALUES
(1, 4, 'php'),
(2, 4, 'ReactJS'),
(4, 4, 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `t_id` int(11) NOT NULL,
  `t_title` varchar(50) NOT NULL,
  `t_file` varchar(40) NOT NULL,
  `t_description` varchar(40) NOT NULL,
  `t_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`t_id`, `t_title`, `t_file`, `t_description`, `t_type`) VALUES
(11, 'Php For Beginners ', '../videos/intro.mp4', 'This Tutorial is for those are in the in', 'php');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `university` varchar(30) NOT NULL,
  `education_background` varchar(50) NOT NULL,
  `cgpa` float NOT NULL,
  `description` varchar(50) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `cover_pic` varchar(200) NOT NULL,
  `address` varchar(20) NOT NULL,
  `company_type` varchar(30) NOT NULL,
  `approval` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `type`, `university`, `education_background`, `cgpa`, `description`, `cv`, `profile_pic`, `cover_pic`, `address`, `company_type`, `approval`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234', 'admin', '', '', 0, '', '', '', '', '', '', 1),
(2, 'Tiger it', 'tiger@gmail.com', '1234', 'company', '', '', 0, 'It company in Gulshan', '', 'images/profile/tig.png', 'images/banner/Untitled-1.png', 'Gulshan,Dhaka', 'IT', 1),
(4, 'Abu Bakar', 'abu@gmail.com', '1234', 'seeker', 'United International Universit', '', 3.92, 'Hardworking and confident person who loves to do p', 'images/cv/abu.pdf', 'images/profile/abu.jpg', 'images/banner/Untitled-1.png', 'Notun Bazar dhaka', '', 1),
(8, 'Mithila', 'm@gmail.com', '1234', 'seeker', 'United International Universit', '', 3.94, 'Hardworking and confident person who loves to do p', 'm.pdf', 'images/profile/mithila.jpg', 'images/banner/Untitled-1.png', 'Bashabo, Dhaka', '', 1),
(12, 'Ranks', 'r@gmail.com', '1234', 'company', '', '', 0, 'Ranks It', '', 'images/profile/peakpx.jpg', 'images/banner/922335.jpg', 'Dhaka', 'IT', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`j_id`);

--
-- Indexes for table `jskill`
--
ALTER TABLE `jskill`
  ADD PRIMARY KEY (`jr_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jskill`
--
ALTER TABLE `jskill`
  MODIFY `jr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
