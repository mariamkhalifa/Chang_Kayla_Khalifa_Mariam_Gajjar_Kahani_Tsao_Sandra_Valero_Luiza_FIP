-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889

-- Generation Time: Apr 13, 2020 at 01:00 AM

-- Server version: 5.7.26
-- PHP Version: 7.4.2

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
  `p_sub` text NOT NULL,
  `p_bold` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `img`, `heading`, `p`, `p_sub`, `p_bold`) VALUES

(1, 'girl3.jpg', 'What\'s HIV Neutral?', 'We at Keep it Neutral want to create a community that openly talks about HIV/AIDS. Our goal is a world that’s “HIV Neutral” — where HIV is no longer transmittable or stigmatized.', 'Here you’ll find ways to start conversations that celebrate love, encourage safety, and stop the spread of HIV. ', 'Let\'s Keep It Neutral.');



-- --------------------------------------------------------

--
-- Table structure for table `tbl_communityintro`
--

CREATE TABLE `tbl_communityintro` (
  `id` int(11) NOT NULL,
  `heading` varchar(70) NOT NULL,
  `text` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_communityintro`
--

INSERT INTO `tbl_communityintro` (`id`, `heading`, `text`) VALUES
(1, 'Community', 'See our thriving community of people living with HIV/AIDS.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactinfo`
--

CREATE TABLE `tbl_contactinfo` (
  `id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contactinfo`
--

INSERT INTO `tbl_contactinfo` (`id`, `address`, `phone`, `email`) VALUES
(1, '683 King Street, \r\nLondon, ON,\r\nWC27 8XQ', '519-230-6781', 'support@keepitneutral.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactintro`
--

CREATE TABLE `tbl_contactintro` (
  `id` int(11) NOT NULL,
  `heading` varchar(80) NOT NULL,
  `text` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contactintro`
--

INSERT INTO `tbl_contactintro` (`id`, `heading`, `text`) VALUES
(1, 'Contact Us', 'We’re here to help. Got questions? Want to use stuff from our campaign? Please don’t hesitate to reach out.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `id` int(11) NOT NULL,
  `img` varchar(60) NOT NULL,
  `heading` varchar(70) NOT NULL,
  `location` varchar(40) NOT NULL,
  `month` varchar(10) NOT NULL,
  `day` varchar(2) NOT NULL,
  `time` varchar(50) NOT NULL,
  `des` varchar(100) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`id`, `img`, `heading`, `location`, `month`, `day`, `time`, `des`, `link`) VALUES
(1, 'coffee_cups.jpg', 'Coffee Drop-In', 'RHAC Boardroom, #30-186 King St.', 'April', '01', 'Wednesday Mornings, 10:00 AM - 11:30 AM', 'Join us for coffee and support. For people living with HIV.', 'www.hivaidsconnection.ca/events'),
(2, 'friends.jpg', 'Couch Crew', 'RHAC Boardroom, #30-186 King St.', 'April', '01', 'Monday & Wednesday, 12:00 PM - 4:00 PM', 'Drop in and volunteer with us!', 'www.hivaidsconnection.ca/events'),
(3, 'prep.jpg', 'PrEP Clinic', 'RHAC Boardroom, #30-186 King St.', 'April', '10', 'Every second Friday, 9:00 AM to 5:00 PM', 'The RHAC PrEP clinic is currently held every second Friday.', 'www.hivaidsconnection.ca/events');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_eventsheading`
--

CREATE TABLE `tbl_eventsheading` (
  `id` int(11) NOT NULL,
  `heading` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_eventsheading`
--

INSERT INTO `tbl_eventsheading` (`id`, `heading`) VALUES
(1, 'Events in London');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factslinks`
--

CREATE TABLE `tbl_factslinks` (
  `id` int(11) NOT NULL,
  `heading` varchar(80) NOT NULL,
  `text` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_factslinks`
--

INSERT INTO `tbl_factslinks` (`id`, `heading`, `text`) VALUES
(1, 'Get the Facts', 'For more information about HIV/AIDS, visit the helpful links below.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_factsmore`
--

CREATE TABLE `tbl_factsmore` (
  `id` int(11) NOT NULL,
  `heading` varchar(80) NOT NULL,
  `text` varchar(150) NOT NULL,
  `img` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_factsmore`
--

INSERT INTO `tbl_factsmore` (`id`, `heading`, `text`, `img`) VALUES
(1, 'More questions?', 'We can help you find the answers.', 'question_icon.svg');

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
(2, 'How can I get HIV?', 'HIV is spread through the exchange of blood, semen, and vaginal fluids. It is most often transmitted through unprotected sex and contaminated needles, but can also be passed from a mother to her baby during pregnancy, birth, or breastfeeding. HIV can’t be transmitted through air, water, or casual contact. Everyone can contract HIV, regardless of sexual orientation, gender, age, or social status.'),
(4, 'How can I keep myself safe?', 'Practice safe sex, never share your needles or razors, and talk to your partner before having sex. If you are at higher risk of getting infected with HIV, you can take antiretroviral medicine to help protect yourself from HIV infection.'),
(5, 'Other than condoms, how can I practice safer sex to prevent HIV?', 'Talk to your partner before having sex. Find out if they are at risk for HIV. Tell them when you were last tested, and get tested together! Other physical protective barriers include dental dams and disposable gloves.'),
(6, 'What are the ways I CANNOT get HIV?', 'HIV is NOT transmitted by hugging, shaking hands, coughs or sneezes, eating food prepared or handled by an HIV-infected person, donating blood, mosquitoes, toilet seats, sweat or tears, simple kissing or everyday contact with HIV-infected persons at school, work, home or anywhere else.'),
(7, 'How do I ask my partner about their HIV status?', 'Ideally talk to your partner before things start to heat up. Say you\'d like to use protection, and ask if they\'ve been tested. Maybe start by disclosing your own status. Or, make it a date and get tested together. Show them this website! But don\'t compromise on your health because you were too afraid or were unsure about how to ask your partner about their status.');


-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqintro`
--

CREATE TABLE `tbl_faqintro` (
  `id` int(11) NOT NULL,
  `heading` varchar(250) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_faqintro`
--

INSERT INTO `tbl_faqintro` (`id`, `heading`, `text`) VALUES
(1, 'Frequently Asked Questions', 'Do you have any questions? We can help you find the answers!');

-- --------------------------------------------------------
--
-- Table structure for table `tbl_formlabels`
--
CREATE TABLE `tbl_formlabels` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Dumping data for table `tbl_formlabels`
--
INSERT INTO `tbl_formlabels` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'Your name', 'Email', 'Phone', 'Message');
-- --------------------------------------------------------
--
-- Table structure for table `tbl_helplines`
--
CREATE TABLE `tbl_helplines` (
  `id` int(11) NOT NULL,
  `heading` varchar(80) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(60) NOT NULL,
  `rhaclinkheading` varchar(100) NOT NULL,
  `rhaclink` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Dumping data for table `tbl_helplines`
--
INSERT INTO `tbl_helplines` (`id`, `heading`, `text`, `img`, `rhaclinkheading`, `rhaclink`) VALUES
(1, 'Helplines and Anonymous Services for HIV', 'A peer-to-peer support group for individuals or families living with HIV. Everyone is welcome, from newly diagnosed to long-term survivors.', 'contact.svg', 'Contact to Regional HIV/AIDS Connection', 'https://hivaidsconnection.ca/contact');

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
(1, 'asian_girl3.jpg', 'Have', 'safer sex'),
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
(1, 'dark_skin_teenager3.jpg', 'Take', 'prep/pep'),
(2, 'thinking_girl3.jpg', 'It\'s', 'neutral'),
(3, 'curly_haired_girl3.jpg', 'With', 'pride');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_infolinksdata`
--

CREATE TABLE `tbl_infolinksdata` (
  `id` int(11) NOT NULL,
  `img` varchar(60) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_infolinksdata`
--

INSERT INTO `tbl_infolinksdata` (`id`, `img`, `link`) VALUES
(1, 'rhac_logo.jpg', 'https://hivaidsconnection.ca'),
(2, 'catie_logo.jpg', 'https://www.catie.ca/en/basics'),
(3, 'unaid_logo.jpg', 'https://www.unaids.org/en');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instagram`
--

CREATE TABLE `tbl_instagram` (
  `id` int(11) NOT NULL,
  `img` varchar(60) NOT NULL,
  `quote` varchar(400) NOT NULL,
  `author` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_instagram`
--

INSERT INTO `tbl_instagram` (`id`, `img`, `quote`, `author`) VALUES
(1, 'i_asian_girl.jpg', 'Let us give publicity to HIV/AIDS and not hide it. because that is the only way to make it appear like a normal illness.', 'Nelson Mandela'),
(2, 'i_blondie_teenger.jpg', 'It is bad enough that people are dying of AIDS, but no one should die of ignorance.', 'Elizabeth Taylor'),
(3, 'supporters.jpg', 'HIV does not make people dangerous to know, so you can shake their hands and give them a hug: Heaven knows they need it.', 'Princess Diana'),
(4, 'high_school_teenagers.jpg', 'I tell you, it’s funny because the only time I think about HIV is when I have to take my medicine twice a day.', 'Magic Johnson'),
(5, 'girls.jpg', 'Education, awareness and prevention are the key, but stigmatization and exclusion from family is what makes people suffer most', 'Ralph Fiennes'),
(6, 'group_supporters.jpg', 'HIV infection and AIDS is growing- but so too is public apathy. We have already lost too many friends and colleagues.', 'David Geffen'),
(7, 'i_african_american.jpg', 'It’s not the years in your life that count. It’s the life in your years.', 'Abe Lincoln');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_instagramfeed`
--

CREATE TABLE `tbl_instagramfeed` (
  `id` int(11) NOT NULL,
  `heading` varchar(80) NOT NULL,
  `btn` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_instagramfeed`
--

INSERT INTO `tbl_instagramfeed` (`id`, `heading`, `btn`) VALUES
(1, 'Join our Community on Instagram', 'More Instagram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locationsintro`
--

CREATE TABLE `tbl_locationsintro` (
  `id` int(11) NOT NULL,
  `heading` text NOT NULL,
  `text` text NOT NULL,
  `linktext` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_locationsintro`
--

INSERT INTO `tbl_locationsintro` (`id`, `heading`, `text`, `linktext`, `link`) VALUES
(1, 'Get Tested', 'Find HIV Testing locations and care services close to you.', 'For more information on where to get tested:', 'https://hivaidsconnection.ca/get-facts/get-tested/where-get-tested');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_socialmedia`
--

CREATE TABLE `tbl_socialmedia` (
  `id` int(11) NOT NULL,
  `heading` varchar(80) NOT NULL,
  `intro` varchar(80) NOT NULL,
  `text` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_socialmedia`
--

INSERT INTO `tbl_socialmedia` (`id`, `heading`, `intro`, `text`) VALUES
(1, 'Social media', 'Follow us here!', 'All social media accounts are updated and monitored Monday to Friday from 8 a.m. to 8 p.m. EST/EDT. ');

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
(1, 'I was diagnosed with HIV in 2010 when I went for my antenatal check. I guess I didn’t know how I felt about it at first but as time passed I took responsibility. I started to accept my HIV status and understand my condition. It was hard to start my meds. I felt humiliated and scared of rejection… I ended up not taking them first-time round.'),
(2, 'I’m the first to admit that growing up with HIV positive parents was agonizing, it was an isolating and emotional nightmare. They were both very sick in my teens. I hated my father for not being honest about his sexuality in the first place. I refused to attend his funeral. He had been dead to me long before his corporeal self left us.'),
(3, 'I’m the first to admit that growing up with HIV positive parents was agonizing, it was an isolating and emotional nightmare. They were both very sick in my teens. I hated my father for not being honest about his sexuality in the first place. I refused to attend his funeral. He had been dead to me long before his corporeal self left us.'),
(4, 'I’m the first to admit that growing up with HIV positive parents was agonizing, it was an isolating and emotional nightmare. They were both very sick in my teens. I hated my father for not being honest about his sexuality in the first place. I refused to attend his funeral. He had been dead to me long before his corporeal self left us.'),
(5, 'I’m the first to admit that growing up with HIV positive parents was agonizing, it was an isolating and emotional nightmare. They were both very sick in my teens. I hated my father for not being honest about his sexuality in the first place. I refused to attend his funeral. He had been dead to me long before his corporeal self left us.'),
(6, 'I’m the first to admit that growing up with HIV positive parents was agonizing, it was an isolating and emotional nightmare. They were both very sick in my teens. I hated my father for not being honest about his sexuality in the first place. I refused to attend his funeral. He had been dead to me long before his corporeal self left us.'),
(7, 'I’m the first to admit that growing up with HIV positive parents was agonizing, it was an isolating and emotional nightmare. They were both very sick in my teens. I hated my father for not being honest about his sexuality in the first place. I refused to attend his funeral. He had been dead to me long before his corporeal self left us.'),
(8, 'I’m the first to admit that growing up with HIV positive parents was agonizing, it was an isolating and emotional nightmare. They were both very sick in my teens. I hated my father for not being honest about his sexuality in the first place. I refused to attend his funeral. He had been dead to me long before his corporeal self left us.'),
(9, 'I’m the first to admit that growing up with HIV positive parents was agonizing, it was an isolating and emotional nightmare. They were both very sick in my teens. I hated my father for not being honest about his sexuality in the first place. I refused to attend his funeral. He had been dead to me long before his corporeal self left us.'),
(10, 'this is my story');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_storyintro`
--

CREATE TABLE `tbl_storyintro` (
  `id` int(11) NOT NULL,
  `heading` varchar(70) NOT NULL,
  `text` text NOT NULL,
  `formlabel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_storyintro`
--

INSERT INTO `tbl_storyintro` (`id`, `heading`, `text`, `formlabel`) VALUES
(1, 'Share Your Story', 'We want to give people living with HIV and their loved ones the opportunity to share their life changing stories. Submit your story anonymously, and we\'ll share it on our social media.', 'What\'s Your Story?');

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
(3, 'Anova', '101 Wellington Rd, London, ON N6C 4M7');

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
(1, 'Sandra', 'sandra', '$2y$10$tb17GejYMA27.4eGM9HKRehACqoxJM0SasRVzqvzzpXcyly9iante', 'SandraTsao0405@gmail.com', '2020-04-10 09:40:42', '2020-04-10 21:02:48', '::1', 'NO', '0', '2020-04-10 21:02:48', 'O', '2020-03-07 23:02:14', 'NO'),
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
-- Indexes for table `tbl_communityintro`
--
ALTER TABLE `tbl_communityintro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactinfo`
--
ALTER TABLE `tbl_contactinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contactintro`
--
ALTER TABLE `tbl_contactintro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_eventsheading`
--
ALTER TABLE `tbl_eventsheading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_factslinks`
--
ALTER TABLE `tbl_factslinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_factsmore`
--
ALTER TABLE `tbl_factsmore`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_faqintro`
--
ALTER TABLE `tbl_faqintro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_formlabels`
--
ALTER TABLE `tbl_formlabels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_helplines`
--
ALTER TABLE `tbl_helplines`
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
-- Indexes for table `tbl_infolinksdata`
--
ALTER TABLE `tbl_infolinksdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_instagram`
--
ALTER TABLE `tbl_instagram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_instagramfeed`
--
ALTER TABLE `tbl_instagramfeed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_locationsintro`
--
ALTER TABLE `tbl_locationsintro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_socialmedia`
--
ALTER TABLE `tbl_socialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_story`
--
ALTER TABLE `tbl_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_storyintro`
--
ALTER TABLE `tbl_storyintro`
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
-- AUTO_INCREMENT for table `tbl_communityintro`
--
ALTER TABLE `tbl_communityintro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contactinfo`
--
ALTER TABLE `tbl_contactinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contactintro`
--
ALTER TABLE `tbl_contactintro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_eventsheading`
--
ALTER TABLE `tbl_eventsheading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_factslinks`
--
ALTER TABLE `tbl_factslinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_factsmore`
--
ALTER TABLE `tbl_factsmore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_faqintro`
--
ALTER TABLE `tbl_faqintro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_formlabels`
--
ALTER TABLE `tbl_formlabels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_helplines`
--
ALTER TABLE `tbl_helplines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `tbl_infolinksdata`
--
ALTER TABLE `tbl_infolinksdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_instagram`
--
ALTER TABLE `tbl_instagram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_instagramfeed`
--
ALTER TABLE `tbl_instagramfeed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_locationsintro`
--
ALTER TABLE `tbl_locationsintro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_socialmedia`
--
ALTER TABLE `tbl_socialmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_story`
--
ALTER TABLE `tbl_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_storyintro`
--
ALTER TABLE `tbl_storyintro`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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