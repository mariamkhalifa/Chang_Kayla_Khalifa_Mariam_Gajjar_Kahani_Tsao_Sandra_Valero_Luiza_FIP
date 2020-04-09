-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 08, 2020 at 10:14 PM
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
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL,
  `img` varchar(60) NOT NULL,
  `heading` varchar(60) NOT NULL,
  `p` text NOT NULL,
  `p_sub` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `img`, `heading`, `p`, `p_sub`) VALUES
(1, 'girl3.jpg', 'What\'s HIV Neutral?', 'We at Keep it Neutral want to create a community that openly talks about HIV/AIDS. Our goal is a world that’s “HIV Neutral” — where HIV is no longer transmittable or stigmatized.', 'Here you’ll find ways to start conversations that celebrate love, encourage safety, and stop the spread of HIV. Let’s Keep it Neutral.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `img` varchar(60) NOT NULL,
  `month` varchar(10) NOT NULL,
  `day` varchar(2) NOT NULL,
  `heading` varchar(20) NOT NULL,
  `time` varchar(50) NOT NULL,
  `des` varchar(100) NOT NULL,
  `location` varchar(40) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `img`, `month`, `day`, `heading`, `time`, `des`, `location`, `link`) VALUES
(1, 'coffee_cups.jpg', 'April', '01', 'Coffee Drop-In', 'Wednesday Mornings, 10:00 AM - 11:30 AM', 'Join us for coffee and support. For people living with HIV.', 'RHAC Boardroom, #30-186 King St.', 'www.hivaidsconnection.ca/events'),
(2, 'friends.jpg', 'April', '01', 'Couch Crew', 'Monday & Wednesday, 12:00 PM - 4:00 PM', 'Drop in and volunteer with us!', 'RHAC Boardroom, #30-186 King St.', 'www.hivaidsconnection.ca/events'),
(3, 'prep.jpg', 'April', '10', 'PrEP Clinic', 'Every second Friday, 9:00 AM to 5:00 PM', 'The RHAC PrEP clinic is currently held every second Friday.', 'RHAC Boardroom, #30-186 King St.', 'www.hivaidsconnection.ca/events');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`id`, `question`, `answer`) VALUES
(1, 'What\'s HIV? What\'s the difference between HIV and AIDS?', 'HIV starts as an infection. If left untreated, the HIV virus continues to hurt the immune system. During a period of a few months to several years, people are at risk of contracting serious infections that healthy immune systems can normally handle; This last stage of HIV infection is called AIDS. When HIV is diagnosed before it becomes AIDS, medicines can slow or stop the damage to the immune system. That said, If AIDS does develop, medicines can often help the immune system return to a healthier state.'),
(2, 'How can I get HIV?', 'HIV is spread through the exchange of blood, semen, and vaginal fluids. It is most often transmitted through unprotected sex and contaminated needles, but can also be passed from a mother to her baby during pregnancy, birth, or breastfeeding. HIV can’t be transmitted through air, water, or casual contact. Everyone can contract HIV, regardless of sexual orientation, gender, age, or social status.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hero`
--

CREATE TABLE `tbl_hero` (
  `id` int(11) NOT NULL,
  `img` varchar(60) NOT NULL,
  `text` varchar(30) NOT NULL,
  `cap_text` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hero`
--

INSERT INTO `tbl_hero` (`id`, `img`, `text`, `cap_text`) VALUES
(1, 'asian_girl3.jpg', 'Have', 'saver dex'),
(2, 'blondie_boy3.jpg', 'What\'s', 'your status'),
(3, 'happiness_girl3.jpg', 'Let\'s', 'talk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hero_alt`
--

CREATE TABLE `tbl_hero_alt` (
  `id` int(11) NOT NULL,
  `img` varchar(60) NOT NULL,
  `text` varchar(30) NOT NULL,
  `cap_text` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hero_alt`
--

INSERT INTO `tbl_hero_alt` (`id`, `img`, `text`, `cap_text`) VALUES
(1, 'dark_skin_teenager3.jpg', 'Take', 'prep or pep'),
(2, 'thinking_girl3.jpg', 'It\'s', 'neutral'),
(3, 'curly_haired_girl3.jpg', 'With', 'pride');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_story`
--

CREATE TABLE `tbl_story` (
  `id` int(11) NOT NULL,
  `story` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_story`
--

INSERT INTO `tbl_story` (`id`, `story`) VALUES
(1, 'I was diagnosed with HIV in 2010 when I went for my antenatal check. I guess I didn’t know how I felt about it at first but as time passed I took responsibility. I started to accept my HIV status and understand my condition. It was hard to start my meds. I felt humiliated and scared of rejection… I ended up not taking them first-time round.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscription`
--

CREATE TABLE `tbl_subscription` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subscription`
--

INSERT INTO `tbl_subscription` (`id`, `email`) VALUES
(1, 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test_location`
--

CREATE TABLE `tbl_test_location` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_test_location`
--

INSERT INTO `tbl_test_location` (`id`, `name`, `address`) VALUES
(1, 'Regional HIV/AIDS Connections', '186 King St #30, London, ON N6A 1C7'),
(2, 'London InterCommunity Health Centre', '659 Dundas St, London, ON N5W 2Z1'),
(3, 'Avona', '101 Wellington Rd, London, ON N6C 4M7');

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
(1, 'Sandra', 'sandra', '$2y$10$tb17GejYMA27.4eGM9HKRehACqoxJM0SasRVzqvzzpXcyly9iante', 'SandraTsao0405@gmail.com', '2020-04-08 00:48:54', '2020-04-08 18:59:47', '::1', 'NO', '0', '2020-04-08 18:59:47', 'O', '2020-03-07 23:02:14', 'NO'),
(2, 'tester', 'test', '$2y$10$0nApKJp791jaED67N.GgxOloqO0G429mxL4t29KF6xfiJp/RSAtLq', 'SandraTsao0405@gmail.com', '2020-03-08 02:45:08', '2020-03-08 03:43:10', '::1', 'NO', '0', '2020-03-08 03:43:10', 'O', '2020-03-08 02:45:08', 'NO'),
(3, 'tester2', 'test2', '$2y$10$tb17GejYMA27.4eGM9HKRehACqoxJM0SasRVzqvzzpXcyly9iante', 'SandraTsao0405@gmail.com', '2020-03-08 02:54:55', '2020-03-08 02:54:55', '::1', 'NO', '0', NULL, 'N', '2020-03-02 02:54:55', 'SUSPENDED'),
(4, 'tester3', 'test3', '$2y$10$S/1dGaAcwDnuuNKqNePXdebIr66YaLzrbLu8zf7jpKBB1d/KFqOmm', 'SandraTsao0405@gmail.com', '2020-03-08 03:05:02', '2020-03-08 03:44:54', '::1', 'NO', '0', '2020-03-08 03:44:54', 'O', '2020-03-08 03:05:02', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_video`
--

CREATE TABLE `tbl_video` (
  `id` int(11) NOT NULL,
  `video` varchar(60) NOT NULL,
  `heading` varchar(70) NOT NULL,
  `p` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_video`
--

INSERT INTO `tbl_video` (`id`, `video`, `heading`, `p`) VALUES
(1, 'keepitneutral.mp4', 'Stories of HIV/AIDS', 'Start by listening to real stories from people who speak openly about their experience with HIV/AIDS.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hero`
--
ALTER TABLE `tbl_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hero_alt`
--
ALTER TABLE `tbl_hero_alt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_story`
--
ALTER TABLE `tbl_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_test_location`
--
ALTER TABLE `tbl_test_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_video`
--
ALTER TABLE `tbl_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_hero`
--
ALTER TABLE `tbl_hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_hero_alt`
--
ALTER TABLE `tbl_hero_alt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_story`
--
ALTER TABLE `tbl_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subscription`
--
ALTER TABLE `tbl_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_test_location`
--
ALTER TABLE `tbl_test_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_video`
--
ALTER TABLE `tbl_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
