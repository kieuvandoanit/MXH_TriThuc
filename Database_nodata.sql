-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 01:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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

drop database if exists questionLibrary;
create database questionLibrary;
use questionLibrary;
-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_id` int(10) UNSIGNED NOT NULL,
  `CategoryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(300) COLLATE utf8_unicode_ci DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Comment_id` int(10) UNSIGNED NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime DEFAULT current_timestamp(),
  `UpdateDate` datetime DEFAULT current_timestamp(),
  `isSpam` tinyint(1) DEFAULT 0,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `Member_id` int(11) NOT NULL,
  `Post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `Level_id` int(10) UNSIGNED NOT NULL,
  `level_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Discription` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `liked_post`
--

CREATE TABLE `liked_post` (
  `LP_id` int(10) UNSIGNED NOT NULL,
  `User_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Post_id` int(11) NOT NULL,
  `CreatedDate` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Post_id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(500) COLLATE utf8_unicode_ci DEFAULT '',
  `HashTag` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `Status` enum('Chờ duyệt','Đã duyệt','Duyệt tự động','Không được duyệt') COLLATE utf8_unicode_ci DEFAULT 'Chờ duyệt',
  `LikesAmount` int(10) UNSIGNED DEFAULT 0,
  `commentAmount` int(11) UNSIGNED DEFAULT 0,
  `AvgRating` float DEFAULT 0,
  `rateAmount` int(11) UNSIGNED DEFAULT 0,
  `viewed` int(11) UNSIGNED DEFAULT 0,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `isValid` tinyint(1) NOT NULL DEFAULT 0,
  `CreatedDate` datetime DEFAULT current_timestamp(),
  `UpdatedDate` datetime DEFAULT current_timestamp(),
  `Member_id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `settingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Notification` tinyint(1) NOT NULL DEFAULT 1,
  `AutoBrowsing` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(10) UNSIGNED NOT NULL,
  `UserName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `UType_id` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `Profile_id` int(10) UNSIGNED NOT NULL,
  `Avatar` text COLLATE utf8_unicode_ci DEFAULT '',
  `Name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('Nam','Nữ') COLLATE utf8_unicode_ci DEFAULT 'Nam',
  `Phone` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `PostAmount` int(10) UNSIGNED DEFAULT 0,
  `CommentAmount` int(10) UNSIGNED DEFAULT 0,
  `User_id` int(11) NOT NULL,
  `Level_id` int(11) DEFAULT 1,
  `point` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `UType_id` int(10) UNSIGNED NOT NULL,
  `Type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `votingID` int(11) UNSIGNED NOT NULL,
  `PostID` int(11) UNSIGNED NOT NULL,
  `Member_id` int(11) UNSIGNED NOT NULL,
  `Rate` enum('1 sao','2 sao','3 sao','4 sao','5 sao') COLLATE utf8_unicode_ci DEFAULT '5 sao',
  `CreatedDate` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure for view `chartcountpost`
--
DROP TABLE IF EXISTS `chartcountpost`;

CREATE OR REPLACE VIEW chartCountPost
AS
	WITH RECURSIVE my_cte AS
(
  SELECT '202007' AS monthyear
  UNION ALL
  SELECT EXTRACT(YEAR_MONTH from DATE_ADD(CONVERT(CONCAT_WS("",monthyear,"01"), DATE), INTERVAL 1 MONTH)) FROM my_cte WHERE CAST(monthyear AS INT)<CAST(EXTRACT(YEAR_MONTH from now()) AS INT)
)
SELECT f.monthyear, COALESCE(countReal.soluong, 0) as soluong FROM my_cte f LEFT JOIN (SELECT EXTRACT(YEAR_MONTH from p.CreatedDate) as monthyear, COUNT(*) as soluong 
FROM post p 
WHERE YEAR(p.CreatedDate)=YEAR(NOW()) OR (YEAR(p.CreatedDate)=(YEAR(NOW())-1) AND MONTH(p.CreatedDate)>MONTH(NOW())) GROUP BY YEAR(p.CreatedDate),MONTH(p.CreatedDate)) AS countReal on f.monthyear=countReal.monthyear;


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
ALTER TABLE `post` ADD FULLTEXT KEY `Content` (`Content`);
ALTER TABLE `post` ADD FULLTEXT KEY `Title` (`Title`);
ALTER TABLE `post` ADD FULLTEXT KEY `HashTag` (`HashTag`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`settingID`),
  ADD UNIQUE KEY `userID` (`userID`);

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
  ADD PRIMARY KEY (`votingID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `Level_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `liked_post`
--
ALTER TABLE `liked_post`
  MODIFY `LP_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `settingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `Profile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `UType_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `votingID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;