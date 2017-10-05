-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2017 at 08:15 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svendeprove_bak`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `album_id` int(11) NOT NULL,
  `album_artist` varchar(128) COLLATE utf8mb4_danish_ci NOT NULL,
  `album_title` varchar(128) COLLATE utf8mb4_danish_ci NOT NULL,
  `album_genre` varchar(128) COLLATE utf8mb4_danish_ci NOT NULL,
  `album_date` date NOT NULL,
  `album_price` int(64) NOT NULL,
  `album_img` varchar(128) COLLATE utf8mb4_danish_ci NOT NULL,
  `album_sale_no` int(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`album_id`, `album_artist`, `album_title`, `album_genre`, `album_date`, `album_price`, `album_img`, `album_sale_no`) VALUES
(1, 'Shakira', 'Oral Fixation 2', 'Pop', '0000-00-00', 0, '59d3643c65e50_shakira.jpg', 346),
(2, 'Red Hot Chili Peppers', 'Stadium Arcadium', 'Rock', '2006-04-14', 100, '59d3771f3693a_StadiumArcadium.jpg', 333),
(19, 'Gnarls Barkley', 'St. Elsewhere', 'Pop', '0000-00-00', 0, '59d37a800d901_Gnarls_Barkley.jpg', 8965),
(21, 'Skousen Niels', 'Daddy Longleg', 'Dansk', '2006-05-15', 50, '59d380d15e969_SkousenDaddyLongleg.jpg', 765),
(22, 'Knopfler & Harris', 'All The Roadrunning', 'Pop', '2006-04-16', 100, '59d3831bbed30_KnopflerHarrisRoadrunning.jpg', 33),
(23, 'Bruce Springsteen', 'We Shall Overcome The Seeger Sessions', 'Folk', '2006-04-14', 100, '59d383ba02dca_SpringsteenOvercome.jpg', NULL),
(24, 'Johnson', 'Det Passer', 'Hiphop', '2006-05-18', 100, '59d3857691bfc_JohnsonPasser.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `album_user`
--

CREATE TABLE `album_user` (
  `album_user_id` int(11) NOT NULL,
  `fk_album_id` int(64) NOT NULL,
  `fk_user_id` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `article_name` varchar(512) COLLATE utf8mb4_danish_ci NOT NULL,
  `article_body` varchar(2048) COLLATE utf8mb4_danish_ci NOT NULL,
  `fk_ article_writer` int(11) NOT NULL,
  `article_public` tinyint(1) NOT NULL,
  `article_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site-text`
--

CREATE TABLE `site-text` (
  `site_id` int(11) NOT NULL,
  `site_open_hours` varchar(512) COLLATE utf8mb4_danish_ci NOT NULL,
  `site_address` varchar(512) COLLATE utf8mb4_danish_ci NOT NULL,
  `site_phone` int(64) NOT NULL,
  `site_email` varchar(128) COLLATE utf8mb4_danish_ci NOT NULL,
  `site_welcome_text` varchar(512) COLLATE utf8mb4_danish_ci NOT NULL,
  `site_howto_text` varchar(512) COLLATE utf8mb4_danish_ci NOT NULL,
  `site_error_text` varchar(512) COLLATE utf8mb4_danish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(512) COLLATE utf8mb4_danish_ci NOT NULL,
  `user_email` varchar(512) COLLATE utf8mb4_danish_ci NOT NULL,
  `user_pw` varchar(128) COLLATE utf8mb4_danish_ci NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_img` varchar(32) COLLATE utf8mb4_danish_ci NOT NULL,
  `user_grunker` int(32) NOT NULL,
  `user_about` varchar(2048) COLLATE utf8mb4_danish_ci NOT NULL,
  `user_lateslogin` datetime NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_danish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pw`, `user_phone`, `user_img`, `user_grunker`, `user_about`, `user_lateslogin`, `user_role`) VALUES
(1, 'Flokke Flok', 'ff@sp.dk', '12345', 0, '0', 0, '0', '0000-00-00 00:00:00', 0),
(2, 'Biger Olsen', 'bo@grunk.dk', '1234', 12345677, '0', 1000, '0', '0000-00-00 00:00:00', 0),
(3, 'ha', 'ha@grunk.dk', '1234', 11111111, '0', 1000, '0', '0000-00-00 00:00:00', 1),
(4, 'Sonja Bullke', 'sb@grunk.dk', '1234', 2147483647, '', 1500, '', '0000-00-00 00:00:00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `album_user`
--
ALTER TABLE `album_user`
  ADD PRIMARY KEY (`album_user_id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_album_id` (`fk_album_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `fk_ article_writer` (`fk_ article_writer`);

--
-- Indexes for table `site-text`
--
ALTER TABLE `site-text`
  ADD PRIMARY KEY (`site_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `album_user`
--
ALTER TABLE `album_user`
  MODIFY `album_user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site-text`
--
ALTER TABLE `site-text`
  MODIFY `site_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `album_user`
--
ALTER TABLE `album_user`
  ADD CONSTRAINT `album_user_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `album_user_ibfk_3` FOREIGN KEY (`fk_album_id`) REFERENCES `albums` (`album_id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`fk_ article_writer`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
