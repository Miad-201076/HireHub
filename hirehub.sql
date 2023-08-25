-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 11:44 PM
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
  `j_description` varchar(500) NOT NULL,
  `needed_skill` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`j_id`, `e_id`, `j_title`, `j_type`, `j_description`, `needed_skill`, `status`) VALUES
(2, 18, 'Project Manager', 'Office Work', 'We are looking for a project Manager for our upcoming project.\nPreference will be someone having 2/3 years experience in this field ', 'Project Management', 1),
(3, 17, 'Web Developer ( With Prior Knowledge in ', 'Full_Time', 'We are looking for a web developer who has knowledge and working experience with NEXJS', 'NexJS', 1),
(4, 17, 'Back-End Developer [Django]', 'Remote', 'We are Looking for a Back-End Developer who has experience in working in Django', 'Django', 1),
(5, 20, 'Business Analytics', 'Full_Time', 'We are looking for a Business Analytics for guide us through the current market state.', 'Business Analytics', 1),
(6, 20, 'Front End Developer', 'Remote', 'We are looking for a front end developer who has prior knowledge in React Js', 'ReactJS', 1);

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
(4, 4, 'HTML'),
(5, 23, 'HTML'),
(6, 23, 'Django');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `t_id` int(11) NOT NULL,
  `t_title` varchar(50) NOT NULL,
  `t_file` varchar(500) NOT NULL,
  `t_description` varchar(500) NOT NULL,
  `t_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`t_id`, `t_title`, `t_file`, `t_description`, `t_type`) VALUES
(11, 'Php For Beginners ', '../videos/intro.mp4', 'This Tutorial is for those are in the in', 'php'),
(12, 'Php Session Tutoria', '../videos/phpsession.mp4', 'This a short tutorial to understand PHP ', 'php'),
(13, 'Django Tutorial', '../videos/django.mp4', 'Django Tutorial- creating CHat gpt', 'Django'),
(14, 'React Js', '../videos/ractjs.mp4', 'React Js', 'ReactJS'),
(15, 'Nex JS', '../videos/nexjs.mp4', 'NEXJS tutorial', 'NexJS'),
(16, 'Project Management Tutorial', '../videos/pmg.mp4', 'Project Management Tutorial', 'Project Management'),
(17, 'Business Analytics', '../videos/BA.mp4', 'Business Analytics', 'Business Analytics');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `university` varchar(30) NOT NULL,
  `education_background` varchar(50) NOT NULL,
  `cgpa` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `cv` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `cover_pic` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `company_type` varchar(30) NOT NULL,
  `approval` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `type`, `university`, `education_background`, `cgpa`, `description`, `cv`, `profile_pic`, `cover_pic`, `address`, `company_type`, `approval`) VALUES
(1, 'Admin', 'admin@gmail.com', '1234', 'admin', '', '', 0, '', '', '', '', '', '', 1),
(4, 'Abu Bakar', 'abu@gmail.com', '1234', 'seeker', 'United International Universit', '', 3.92, 'Hardworking and confident person who loves to do p', 'images/cv/abu.pdf', 'images/profile/abu.jpg', 'images/banner/Untitled-1.png', 'Notun Bazar dhaka', '', 1),
(13, 'Brain Station 23', 'bs@gmail.com', '1234', 'company', '', '', 0, 'Brain Station 23 Limited is a homegrown software development company providing state-of-the-art software & IT solutions for fintech, telco, eCommerce, pharma, manufacturing, retail, etc.', '', 'images/profile/bslogo.png', 'images/banner/bscover.jpg', '8th Floor, 2 Bir Uttam AK Khandakar Road, Dhaka 1212', 'IT', 1),
(14, 'BJIT', 'bjit@gmail.com', '1234', 'company', '', '', 0, 'BJIT has grown as a global organization of 750+ engineers and developers and a trusted IT partner for valued clients such as Google, Panasonic, Sony and many more.', '', 'images/profile/bjit.png', 'images/banner/bjitcover.png', 'H-2275, 2279 Pachkhola সাতারকুল রোড, Dhaka 1212', 'IT', 1),
(15, 'Reve System', 'rev@gmail.com', '1234', 'company', '', '', 0, 'REVE Systems is a telecommunication and software solution provider. It deals with mobile VoIP (Voice over Internet Protocol), SIP (session initiation protocol) Softswitch, VoIP billing, bandwidth optimization, WebRTC (web real-time communications), enterprise communication, e-governance, and mobile OTT (over-the-top).', '', 'images/profile/revsystem.jpg', 'images/banner/rveecover.jpg', 'RFM5+J5G, Plot-94 Purbachal Express Hwy, Dhaka', 'IT', 1),
(16, 'Lead Soft LTD', 'ls@gmail.com', '1234', 'company', '', '', 0, 'LeadSoft Bangladesh Limited is the leading IT/ITeS solution provider company in Bangladesh. LeadSoft is involved in designing, developing, implementing and maintaining business application software for both domestic and overseas markets.', '', 'images/profile/leadsogt.png', 'images/banner/ls.jpg', 'Rupayan Trade Center, 17th Floor, 114 Kazi Nazrul Islam Ave, Dhaka 1000', 'IT', 1),
(17, 'GrameenPhone', 'gp@gmail.com', '1234', 'company', '', '', 0, 'Grameenphone Ltd. is the largest mobile telecommunications operator in Bangladesh in terms of revenue, coverage and subscriber base. The company was incorporated on 10 October 1996 as a private limited company. Grameenphone converted to a public limited company on 25 June 2007.', '', 'images/profile/gp.jpg', 'images/banner/gpc.jpg', 'Bashundhara R/A, Dhaka', 'Telecom', 1),
(18, 'Robi', 'robi@gmail.com', '1234', 'company', '', '', 0, 'Robi Axiata Limited is a merged entity made up of Axiata Group Berhad of Malaysia, Bharti Airtel Limited of India, NTT DoCoMo Inc. of Japan and Airtel Bangladesh Limited. It is the second largest mobile operator in Bangladesh with 46.9 million active subscribers.', '', 'images/profile/robi.jpg', 'images/banner/robi.png', 'Ground floor, Robi Corporate Office (RCO), Nafi tower, Robi Corporate Office, 53 Gulshan Avenue, Ground floor, 53 Gulshan Ave, Dhaka 1212', 'Telecom', 1),
(19, 'ZUNOKS Consulting', 'z@gmail.com', '1234', 'company', '', '', 0, 'At ZUNOKS, we thrive to bring innovative solutions addressing critical challenges and maximize value for our clients.\n\nWith a combined experience of over 120 years, we offer solutions in the areas of setting up business, mergers and acquisitions, organizational development, executive search, corporate governance, human resources, transformation & leadership with end-to-end support in delivering manufacturing and supply-chain excellence. ', '', 'images/profile/zunoks.jpg', 'images/banner/unnamed.jpg', 'C1, Level - 3, House, Unit, 35/B Rd No 63, Dhaka 1212', 'Consultency', 1),
(20, 'Tiger It', 'tg@gmail.com', '1234', 'company', '', '', 0, 'TigerIT builds on its experience and specialized skills to provide national scale IT solutions. It has deep insight in biometrics information involving large population. With dynamic partnerships, TigerIT provides turnkey solutions that are sustainable and meet international standards.', '', 'images/profile/tiger-it.jpg', 'images/banner/tg.jpg', 'Block-K, House#21 Rd No.28, Dhaka 1213', 'IT', 1),
(21, 'Syed Eftasum Alam', 's@gmail.com', '1234', 'seeker', 'UIU', 'BSCSE', 3.88, 'A Computer Science and Engineering student who has interest in management and lead-\r\ning a team up front to achieve its goal along side problem solving and back end develop-\r\ning. Currently studying at United International University (10th trimester).\r\nI am enthusiastic about accepting fresh opportunities, embracing advancements in tech-\r\nnology, and making valuable contributions to the creation of inventive solutions that\r\ntackle practical issues.', 'images/cv/Syed_Eftasum_Alam_Resume.pdf', 'images/profile/syed.jpg', 'images/banner/dt.png', '', '', 1),
(22, 'Abu Bakar Fahad', 'a@gmail.com', '1234', 'seeker', 'UIU', 'BSCSE', 3.92, 'Looking for a challenging position as Computer Science and Engineering\r\nUndergraduate Assistant to utilize my institutional abilities.', 'images/cv/Updated_Resume_of_Fahad.pdf', 'images/profile/abu.jpg', 'images/banner/dt.png', '', '', 1),
(23, 'Mithila Farjana', 'm@gmail.com', '1234', 'seeker', 'UIU', 'BSCSE', 3.94, ' am Mithila Farjana, currently in 11th trimester pursuing Computer Science and\r\nEngineering. With an interest in IoT, Artificial Intelligence, Machine learning I am constantly looking for\r\nnew challenges and solutions.I believe combination of self development, access to the experience of\r\nimmersing myself in a new territory will help me to gain a mindset for future employment of\r\nopportunities.', 'images/cv/Mithilas_Curriculum_Vitae_1.pdf', 'images/profile/mithila.jpg', 'images/banner/dt.png', '', '', 1);

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
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
