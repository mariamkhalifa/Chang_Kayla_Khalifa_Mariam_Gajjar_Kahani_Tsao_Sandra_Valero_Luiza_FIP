-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 25, 2020 at 07:38 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keepitneutral`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_community`
--

CREATE TABLE `tbl_community` (
  `ID` int(11) NOT NULL,
  `e_img` varchar(60) NOT NULL,
  `e_img2` varchar(60) NOT NULL,
  `e_month` varchar(10) NOT NULL,
  `e_day` varchar(2) NOT NULL,
  `e_heading` varchar(20) NOT NULL,
  `e_time` varchar(50) NOT NULL,
  `e_desc` varchar(100) NOT NULL,
  `e_location` varchar(40) NOT NULL,
  `e_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_community`
--

INSERT INTO `tbl_community` (`ID`, `e_img`, `e_img2`, `e_month`, `e_day`, `e_heading`, `e_time`, `e_desc`, `e_location`, `e_link`) VALUES
(1, 'coffee_cups.jpg', 'coffee_cups2.jpg', 'April', '01', 'Coffee Drop-In', 'Wednesday Mornings, 10:00 AM - 11:30 AM', 'Join us for coffee and support. For people living with HIV.', 'RHAC Boardroom, #30-186 King St.', 'www.hivaidsconnection.ca/events'),
(2, 'friends.jpg', 'friends2.jpg', 'April', '01', 'Couch Crew', 'Monday & Wednesday, 12:00 PM - 4:00 PM', 'Drop in and volunteer with us!', 'RHAC Boardroom, #30-186 King St.', 'www.hivaidsconnection.ca/events'),
(3, 'prep.jpg', 'prep2.jpg', 'April', '10', 'PrEP Clinic', 'Every second Friday, 9:00 AM to 5:00 PM', 'The RHAC PrEP clinic is currently held every second Friday.', 'RHAC Boardroom, #30-186 King St.', 'www.hivaidsconnection.ca/events');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `ID` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`ID`, `question`, `answer`) VALUES
(1, 'What\'s HIV? What\'s the difference between HIV and AIDS?', 'HIV starts as an infection. If left untreated, the HIV virus continues to hurt the immune system. During a period of a few months to several years, people are at risk of contracting serious infections that healthy immune systems can normally handle; This last stage of HIV infection is called AIDS. When HIV is diagnosed before it becomes AIDS, medicines can slow or stop the damage to the immune system. That said, If AIDS does develop, medicines can often help the immune system return to a healthier state.'),
(2, 'How can I get HIV?', 'HIV is spread through the exchange of blood, semen, and vaginal fluids. It is most often transmitted through unprotected sex and contaminated needles, but can also be passed from a mother to her baby during pregnancy, birth, or breastfeeding. HIV can’t be transmitted through air, water, or casual contact. Everyone can contract HIV, regardless of sexual orientation, gender, age, or social status.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

CREATE TABLE `tbl_home` (
  `ID` int(11) NOT NULL,
  `hero_img` varchar(60) NOT NULL,
  `hero_s_text` varchar(20) NOT NULL,
  `hero_l_text` varchar(20) NOT NULL,
  `about_heading` varchar(20) NOT NULL,
  `about_p` text NOT NULL,
  `about_p_sub` text NOT NULL,
  `about_p_highlight` varchar(100) NOT NULL,
  `stories_heading` varchar(20) NOT NULL,
  `stories_p` text NOT NULL,
  `faq_1` varchar(3) NOT NULL,
  `faq_2` varchar(3) NOT NULL,
  `map_location` text NOT NULL,
  `test_place` varchar(40) NOT NULL,
  `test_address` varchar(70) NOT NULL,
  `test_address_2` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`ID`, `hero_img`, `hero_s_text`, `hero_l_text`, `about_heading`, `about_p`, `about_p_sub`, `about_p_highlight`, `stories_heading`, `stories_p`, `faq_1`, `faq_2`, `map_location`, `test_place`, `test_address`, `test_address_2`) VALUES
(1, 'asian_girl3.jpg', 'Have', 'SAFER SEX', 'What\'s HIV Neutral?', 'We at Keep it Neutral want to create a community that openly talks about HIV/AIDS. Our goal is a world that’s “HIV Neutral” — where HIV is no longer transmittable or stigmatized.', 'Here you’ll find ways to start conversations that celebrate love, encourage safety, and stop the spread of HIV.', 'Let’s Keep it Neutral.', 'Stories of HIV/AIDS', 'Start by listening to real stories from people who speak openly about their experience with HIV/AIDS.', '1', '2', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2918.769633654516!2d-81.25054408514464!3d42.98312610351882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x882ef21cf012e81d%3A0xc2124c8409950117!2s186%20King%20St%2C%20London%2C%20ON%20N6A%201C7!5e0!3m2!1sen!2sca!4v1582313402657!5m2!1sen!2sca', 'Regional HIV/AIDS Connections', '186 King St #30', 'London, ON N6A 1C7'),
(2, 'blondie_boy3.jpg', 'What\'s', 'YOUR STATUS', '', '', '', '', '', '', '', '', '', 'London InterCommunity Health Centre', '659 Dundas St', ' London, ON N5W 2Z1'),
(3, 'happiness_girl3.jpg', 'Let\'s', 'TALK', '', '', '', '', '', '', '', '', '', 'Anova', '101 Wellington Rd', 'London, ON N6C 4M7'),
(4, 'dark_skin_teenager3.jpg', 'Take', 'PrEp or PEP', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 'thinking_girl3.jpg', 'It\'s', 'NEUTRAL', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'curly_haired_girl3.jpg', 'With', 'PRIDE', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `ID` int(11) NOT NULL,
  `sub_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(60) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(60) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_currentlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_ip` varchar(30) NOT NULL,
  `user_locked` varchar(3) NOT NULL,
  `user_attempts` varchar(2) NOT NULL,
  `user_fail_start` timestamp NULL DEFAULT NULL,
  `user_new` varchar(5) NOT NULL,
  `user_newstart` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_sus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_fname`, `user_name`, `user_pass`, `user_email`, `user_lastlogin`, `user_currentlogin`, `user_ip`, `user_locked`, `user_attempts`, `user_fail_start`, `user_new`, `user_newstart`, `user_sus`) VALUES
(1, 'Sandra', 'sandra', '$2y$10$tb17GejYMA27.4eGM9HKRehACqoxJM0SasRVzqvzzpXcyly9iante', 'SandraTsao0405@gmail.com', '2020-03-13 14:16:45', '2020-03-25 18:45:56', '::1', 'NO', '0', '2020-03-25 18:45:56', 'O', '2020-03-07 23:02:14', 'NO'),
(2, 'tester', 'test', '$2y$10$0nApKJp791jaED67N.GgxOloqO0G429mxL4t29KF6xfiJp/RSAtLq', 'SandraTsao0405@gmail.com', '2020-03-08 02:45:08', '2020-03-08 03:43:10', '::1', 'NO', '0', '2020-03-08 03:43:10', 'O', '2020-03-08 02:45:08', 'NO'),
(3, 'tester2', 'test2', '$2y$10$tb17GejYMA27.4eGM9HKRehACqoxJM0SasRVzqvzzpXcyly9iante', 'SandraTsao0405@gmail.com', '2020-03-08 02:54:55', '2020-03-08 02:54:55', '::1', 'NO', '0', NULL, 'N', '2020-03-02 02:54:55', 'SUSPENDED'),
(4, 'tester3', 'test3', '$2y$10$S/1dGaAcwDnuuNKqNePXdebIr66YaLzrbLu8zf7jpKBB1d/KFqOmm', 'SandraTsao0405@gmail.com', '2020-03-08 03:05:02', '2020-03-08 03:44:54', '::1', 'NO', '0', '2020-03-08 03:44:54', 'O', '2020-03-08 03:05:02', 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_community`
--
ALTER TABLE `tbl_community`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_community`
--
ALTER TABLE `tbl_community`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
