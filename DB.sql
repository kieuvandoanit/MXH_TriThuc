-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 06:15 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionlibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
drop database if exists questionLibrary;
create database questionLibrary;
use questionLibrary;
CREATE TABLE `category` (
  `Category_id` int(10) UNSIGNED NOT NULL,
  `CategoryName` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Comment_id` int(10) UNSIGNED NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime DEFAULT NULL,
  `UpdateDate` datetime DEFAULT NULL,
  `Status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `Member_id` int(11) DEFAULT NULL,
  `Post_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `Level_id` int(10) UNSIGNED NOT NULL,
  `level_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Discription` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `liked_post`
--

CREATE TABLE `liked_post` (
  `LP_id` int(10) UNSIGNED NOT NULL,
  `User_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Post_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HashTag` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LikesAmount` int(10) UNSIGNED DEFAULT NULL,
  `AvgRating` float DEFAULT NULL,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `isValid` tinyint(1) NOT NULL DEFAULT 0,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `Member_id` int(11) DEFAULT NULL,
  `Category_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(10) UNSIGNED NOT NULL,
  `UserName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `UType_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `UserName`, `email`, `Password`, `token`, `UType_id`) VALUES
(1, 'kieuvandoan', 'kieuvandoanit@gmail.com', 'a', NULL, 2),
(2, 'admin', 'kieuvandoanit@gmail.com', 'a', NULL, 1),
(19, 'test', 'kvd@gmail.com', 'a', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `Profile_id` int(10) UNSIGNED NOT NULL,
  `Avatar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` int(200) DEFAULT NULL,
  `PostAmount` int(10) UNSIGNED DEFAULT NULL,
  `CommentAmount` int(10) UNSIGNED DEFAULT NULL,
  `User_id` int(11) DEFAULT NULL,
  `Level_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`Profile_id`, `Avatar`, `Name`, `gender`, `Phone`, `Email`, `address`, `PostAmount`, `CommentAmount`, `User_id`, `Level_id`) VALUES
(1, 'https://i.vietgiaitri.com/2020/6/3/xinh-dep-lai-co-minh-day-cung-nguc-day-hotgirl-len-hinh-ben-bo-ma-bi-don-cap-dai-gia-19f-4981007.jpg', 'Kiều Văn Đoàn', 'Nam', '0975908445', 'kieuvandoanit@gmail.com', 0, NULL, NULL, 1, NULL),
(2, 'https://icdn.dantri.com.vn/thumb_w/640/2020/08/30/diem-danh-nhung-guong-mat-hot-girl-noi-bat-trong-thang-8-docx-1598788426579.jpeg', 'Nguyễn Văn Toàn', NULL, '095483728', 'kieuvandoanit@gmail.com', NULL, NULL, NULL, 2, NULL),
(15, '', 'Nguyễn Văn Test', NULL, '0987394934', 'nvt@gmail.com', 0, NULL, NULL, 19, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `UType_id` int(10) UNSIGNED NOT NULL,
  `Type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`UType_id`, `Type`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `Post_id` int(10) UNSIGNED NOT NULL,
  `Member_id` int(11) DEFAULT NULL,
  `Point` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Comment_id`),
  ADD KEY `FK_CommentPost` (`Post_id`),
  ADD KEY `FK_WhoCommentPost` (`Member_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`Level_id`);

--
-- Indexes for table `liked_post`
--
ALTER TABLE `liked_post`
  ADD PRIMARY KEY (`LP_id`),
  ADD KEY `FK_LikedPost` (`Post_id`),
  ADD KEY `FK_WhoLikePost` (`User_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Post_id`),
  ADD KEY `FK_FromMember` (`Member_id`),
  ADD KEY `FK_FromCategory` (`Category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`),
  ADD KEY `FK_FromUType` (`UType_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`Profile_id`),
  ADD KEY `FK_FromUser` (`User_id`),
  ADD KEY `FK_FromLevel` (`Level_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`UType_id`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`Post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `Level_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liked_post`
--
ALTER TABLE `liked_post`
  MODIFY `LP_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `Profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `UType_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `Post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
