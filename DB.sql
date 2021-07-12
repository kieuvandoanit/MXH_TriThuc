-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 12:48 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `category`
--
drop database if exists questionLibrary;
create database questionLibrary;
use questionLibrary;
CREATE TABLE `category` (
  `Category_id` int(10) UNSIGNED NOT NULL,
  `CategoryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `CategoryName`) VALUES
(1, 'Tự nhiên'),
(2, 'Xã hội'),
(3, 'Tâm lý'),
(4, 'Sức khỏe'),
(5, 'Tài chính'),
(6, 'Công nghệ');

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Comment_id` int(10) UNSIGNED NOT NULL,
  `Content` text COLLATE utf8_unicode_ci NOT NULL,
  `CreateDate` datetime DEFAULT NOW(),
  `UpdateDate` datetime DEFAULT NOW(),
  `isSpam` tinyint(1) DEFAULT 0,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `Member_id` int(11) NOT NULL,
  `Post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Comment_id`, `Content`, `CreateDate`, `UpdateDate`, `isSpam`, `isDelete`, `Member_id`, `Post_id`) VALUES
(1, 'Comment ', '2021-07-08 16:09:58', '2021-07-08 16:09:58', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `Level_id` int(10) UNSIGNED NOT NULL,
  `level_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Discription` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`Level_id`, `level_name`, `Discription`) VALUES
(1, 'vàng', 'Rank BẠC');
INSERT INTO `level` (`Level_id`, `level_name`, `Discription`) VALUES
(2, 'vàng', 'Rank vàng');

-- --------------------------------------------------------

--
-- Table structure for table `liked_post`
--

CREATE TABLE `liked_post` (
  `LP_id` int(10) UNSIGNED NOT NULL,
  `User_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Post_id` int(11) NOT NULL,
  `time` datetime DEFAULT NOW()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `liked_post`
--

INSERT INTO `liked_post` (`LP_id`, `User_id`, `Post_id`, `time`) VALUES
(3, '1', 5, '2021-06-26 18:51:05'),
(33, '1', 1, '2021-06-28 10:09:13'),
(5, '1', 6, '2021-06-26 21:26:34');

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
  `commentAmount` int(11) DEFAULT 0,
  `AvgRating` float DEFAULT 0,
  `rateAmount` int(11) DEFAULT 0,
  `viewed` int(11) DEFAULT 0,
  `isDelete` tinyint(1) NOT NULL DEFAULT 0,
  `isValid` tinyint(1) NOT NULL DEFAULT 0,
  `CreatedDate` datetime DEFAULT NOW(),
  `UpdatedDate` datetime DEFAULT NOW(),
  `Member_id` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_id`, `Title`, `thumb`, `HashTag`, `Content`, `Status`, `LikesAmount`, `commentAmount`, `AvgRating`, `rateAmount`, `viewed`, `isDelete`, `isValid`, `CreatedDate`, `UpdatedDate`, `Member_id`, `Category_id`) VALUES
(27, 'test notification lan 2', 'https://lh4.googleusercontent.com/aKVbLfZ9AmHhKYtezYgfNsdyZxVKrihjzdp7nk14mnKTFWRHVE8R0lQOsEebSBoOfzSLp4lNgnfgcQDj1dhC93xhZ3uep0_FQZhQ9C66iIn3oiZsctGprV-I9xAuljxMiI3mQWQH', 'lamgiau cachlamgiau', 'as ', 'Chờ duyệt', 0, 0, 2, 1, 0, 0, 0, '2021-07-09 12:08:11', '2021-07-09 12:08:11', 1, 1),
(7, 'Học lập trình Fullstack', 'https://blog.freec.asia/wp-content/uploads/2020/10/front-end-back-end.png', 'laptrinh fullstack', 'Theo khảo sát của Stack Overflow Developer mới nhất, Full-Stack Web Development vẫn là xu hướng phổ biến nhất hiện nay. Không có gì ngạc nhiên khi có hàng tá các chương trình đào tạo online và offline giúp đỡ mọi lập trình viên trở thành Fullstack Developer và thậm chí sau đó còn hỗ trợ các developer mới này có được công việc lập trình với thu nhập cao.\r\n\r\nTrong bài viết này, tôi sẽ cung cấp các guideline hướng dẫn những kỹ năng quan trọng nhất cần thiết để trở thành một Full-Stack Web Developer.\r\n\r\nFullstack developer là gì?\r\nFullstack developer là sự tổng hợp từ kiến thức, sự hiểu biết trực quan và sâu sắc về cả front-end và back-end, cũng như nắm vững các best practices và khái niệm. Đương nhiên, các full stack developer đều có khả năng code cho mọi thành phần của hệ thống, và họ sẽ làm mọi thứ một cách tốt nhất nếu họ thực sự giỏi. Điều này đòi hỏi một lượng lớn các kỹ năng cũng như kinh nghiệm.\r\n\r\nFull stack developer làm những gì?\r\nMột Full-Stack Web Developer là người có thể làm việc trên cả front-end và back-end của một ứng dụng. Front-end nói chung là phần mà người dùng có thể thấy được và tương tác được, còn back-end là phần ứng dụng xử lý logic, tương tác cơ sở dữ liệu, chứng thực người dùng, cấu hình máy chủ, vv.', 'Chờ duyệt', 11, 0, 1, 1, 0, 0, 0, '2021-06-25 17:04:15', '2021-07-09 12:08:11', 1, 1),
(24, 'Test thử thông báo email', 'https://toplist.vn/images/800px/trung-tam-luyen-thi-dai-hoc-diem-10-271818.jpg', 'php hocphp ', 'Test thử send mail', 'Chờ duyệt', 0, 0, 0, 0, 0, 0, 0, '2021-07-09 12:01:25', '2021-07-09 12:08:11', 1, 1),
(25, 'test notification', 'https://lh4.googleusercontent.com/aKVbLfZ9AmHhKYtezYgfNsdyZxVKrihjzdp7nk14mnKTFWRHVE8R0lQOsEebSBoOfzSLp4lNgnfgcQDj1dhC93xhZ3uep0_FQZhQ9C66iIn3oiZsctGprV-I9xAuljxMiI3mQWQH', 'lamgiau cachlamgiau', 'as', 'Chờ duyệt', 0, 0, 0, 0, 0, 0, 0, '2021-07-09 12:03:43', '2021-07-09 12:08:11', 1, 1),
(26, 'test notification lan 1', 'https://lh4.googleusercontent.com/aKVbLfZ9AmHhKYtezYgfNsdyZxVKrihjzdp7nk14mnKTFWRHVE8R0lQOsEebSBoOfzSLp4lNgnfgcQDj1dhC93xhZ3uep0_FQZhQ9C66iIn3oiZsctGprV-I9xAuljxMiI3mQWQH', 'lamgiau cachlamgiau', 'as', 'Chờ duyệt', 0, 0, 0, 0, 0, 0, 0, '2021-07-09 12:05:56', '2021-07-09 12:08:11', 1, 1),
(6, 'Luyện thi đại học với Kiều Văn Đoàn', 'https://toplist.vn/images/800px/trung-tam-luyen-thi-dai-hoc-diem-10-271818.jpg', 'daihoc luyenthi', 'Những thành viên sáng lập trung tâm điểm 10 đều là các giảng viên có nhiều tâm huyết đến từ trường đại học Cần Thơ, có sự đầu tư chuẩn bị từ rất lâu về đội ngũ giảng viên tham gia giảng dạy nên có thể đảm bảo được chất lượng của đội ngũ giảng viên một cách thật sự. Các phòng học được trang bị cơ sở vật chất khang trang, đạt tiêu chuẩn của bộ y tế về diện tích phòng, bàn ghế, ánh sáng, bảng.\r\n\r\n\r\n\r\nPhòng học thoáng mát và trang bị cơ sở vật chất đạt chuẩn là yếu tố giúp các em học sinh có được sự thoải mái khi đến học lại trung tâm. Ngoài ra, trung tâm luyện thi đại học điểm 10 đã trang bị máy lạnh cho tất cả các phòng học. Trung tâm có nhiều kinh nghiệm dạy luyện thi và tâm huyết trong lĩnh vực giáo dục đào tạo nên có được sự chặt chẽ và khoa học trong công tác tổ chức và quản lý nhằm đảm bảo chất lượng dạy học.\r\n\r\n\r\n\r\nTrung tâm luyện thi đại học điểm 10 hiện đang đứng đầu về mảng dạy luyện thi (đông học sinh nhất và kết quả học sinh cao nhất Cần Thơ) + kỹ năng-nhân cách và hướng nghiệp duy nhất tại Cần Thơ, thực hiện nhiều chương trình lớn về định hướng thay đổi giáo dục cho xã hội và tầm ảnh hưởng lớn đến các trường THCS và THPT tại Cần Thơ.', 'Chờ duyệt', 6, 0, 3.5, 12, 0, 0, 0, '2021-06-25 17:02:22', '2021-07-09 12:08:11', 1, 1),
(4, 'Cách học lập trình javascript', 'https://www.hostinger.vn/huong-dan/wp-content/uploads/sites/10/2018/09/javascript-la-gi.jpg', 'js javascript learning', 'JavaScript được tạo trong mười ngày bởi Brandan Eich, một nhân viên của Netscape, vào tháng 9 năm 1995. Được đặt tên đầu tiên là Mocha, tên của nó được đổi thành Mona rồi LiveScript trước khi thật sự trở thành JavaScript nổi tiếng như bây giờ. Phiên bản đầu tiên của ngôn ngữ này bị giới hạn độc quyền bởi Netscape và chỉ có các tính năng hạn chế, nhưng nó tiếp tục phát triển theo thời gian, nhờ một phần vào cộng đồng các lập trình viên đã liên tục làm việc với nó.\r\n\r\nTrong năm 1996, JavaScript được chính thức đặt tên là ECMAScript. ECMAScript 2 phát hành năm 1998 và ECMAScript 3 tiếp tục ra mắt vào năm 1999. Nó liên tục phát triển thành JavaScript ngày nay, giờ đã hoạt động trên khắp mọi trình duyệt và trên khắp các thiết bị từ di động đến máy tính bàn.\r\n\r\nJavaScript liên tục phát triển kể từ đó, có lục đạt đến 92% website đang sử dụng JavaScript vào năm 2016. Chỉ trong 20 năm, nó từ một ngôn ngữ lập trình riêng trở thành công cụ quan trọng nhất trên bộ công cụ của các chuyên viên lập trình web. Nếu bạn đang dùng internet, vậy chắc chắn bạn đã từng sử dụng JavaScript rồi.', 'Chờ duyệt', 5, 0, 2.3, 6, 0, 0, 0, '2021-06-25 16:33:30', '2021-07-09 12:08:11', 1, 1),
(5, 'SEO dễ dàng với Kiều Văn Đoàn', 'https://azaseo.com/public/includes/elFinder-2.1.40/files/seo-la-gi.png', 'seo', 'Chào mừng bạn đã ở đây,\r\n\r\nNếu bạn đã nắm chắc các khái niệm căn bản về SEO và tầm quan trọng của SEO bạn có thể bỏ qua bài viết này để tham khảo các cách làm SEO tại đây.\r\n\r\nNếu bạn là người mới bắt đầu, bài viết này sẽ cung cấp cho bạn những kiến thức nền tảng về SEO. Đọc hết bài viết này bạn sẽ thấu hiểu:\r\n\r\nĐịnh nghĩa về SEO?\r\nTầm quan trọng của SEO\r\nCách SEO hoạt động như thế nào\r\n9 lưu ý quan trọng cho người mới bắt đầu học SEO\r\nNgay bây giờ bạn hãy bắt đầu tìm hiểu những thông tin đầu tiên về SEO, nếu có bất kỳ thắc mắc nào xin vui lòng để lại bình luận để tôi có thể giúp bạn giải đáp.\r\n\r\nSEO là gì?\r\nSEO là từ viết tắt của Search Engine Optimization (tối ưu hóa công cụ tìm kiếm), là một quy trình nâng cao thứ hạng của website trên các công cụ tìm kiếm giúp người dùng có thể tìm thấy trang web dễ dàng hơn trên bảng kết quả tìm kiếm.', 'Chờ duyệt', 4, 0, 2.7, 3, 0, 0, 0, '2021-06-25 16:35:23', '2021-07-09 12:08:11', 1, 1),
(1, 'Cách làm giàu ', 'https://web-api.tpbs.com.vn/static/uploads/websep24-1.jpg', 'lamgiau cachlamgiau', 'sfasfsf', 'Chờ duyệt', 33, 0, 2.7, 49, 0, 0, 0, '2021-06-25 11:26:20', '2021-07-09 12:08:11', 1, 1),
(3, 'Làm sao để học giỏi PHP', 'https://lh4.googleusercontent.com/aKVbLfZ9AmHhKYtezYgfNsdyZxVKrihjzdp7nk14mnKTFWRHVE8R0lQOsEebSBoOfzSLp4lNgnfgcQDj1dhC93xhZ3uep0_FQZhQ9C66iIn3oiZsctGprV-I9xAuljxMiI3mQWQH', 'php hocphp ', 'PHP (viết tắt đệ quy của PHP: Hypertext Preprocessor) là tập hợp con của các ngôn ngữ script như JavaScript và Python. Sự khác biệt là ngôn ngữ PHP chủ yếu được sử dụng để giao tiếp phía server trong khi JavaScript có thể được sử dụng cho cả frontend cũng như backend và Python – chỉ dành cho phía client (backend).\r\n\r\nNghe có vẻ khó hiểu nhỉ? Nên đó là lý do tại sao chúng ta cần hiểu về ngôn ngữ script trước khi đi sâu vào PHP.\r\n\r\nNgôn ngữ script, scripting language, là gì? Nó là ngôn ngữ tự động hóa việc thực hiện các tác vụ trong môi trường runtime đặc biệt. Chúng bao gồm việc yêu cầu một trang web tĩnh (được xây dựng bằng HTML và CSS) thực hiện các hành động cụ thể với quy tắc bạn đã xác định trước.\r\n\r\nChẳng hạn, bạn có thể sử dụng script để xác thực biểu mẫu đảm bảo tất cả các trường đã được điền trước khi nó được gửi trở lại server. Script sẽ chạy và sau đó kiểm tra tất cả các trường khi người dùng gửi biểu mẫu.\r\n\r\nNếu biểu mẫu trống, cảnh báo sẽ hiển thị để thông báo cho người dùng.\r\n\r\nCác cách sử dụng phổ biến khác của ngôn ngữ script bao gồm hiển thị hiệu ứng thả xuống khi con trỏ di chuyển qua menu chính, nút cuộn và hình động, mở hộp thoại, v.v.', 'Chờ duyệt', 9, 0, 3.3, 4, 0, 0, 0, '2021-06-25 16:29:16', '2021-07-09 12:08:11', 1, 1),
(28, 'test thử category', 'https://azaseo.com/public/includes/elFinder-2.1.40/files/seo-la-gi.png', 'lamgiau cachlamgiau', 'test thử category', 'Chờ duyệt', 0, 0, 0, 0, 0, 0, 0, '2021-07-10 17:11:01', '2021-07-09 12:08:11', 1, 3);

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

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `UserName`, `email`, `Password`, `UType_id`) VALUES
(1, 'kieuvandoan', 'kieuvandoanit@gmail.com', 'a', 2),
(2, 'admin', 'kieuvandoanit@gmail.com', 'a', 1),
(19, 'test', 'kvd@gmail.com', 'a', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `Profile_id` int(10) UNSIGNED NOT NULL,
  `Avatar` text COLLATE utf8_unicode_ci DEFAULT "",
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Nam','Nữ') COLLATE utf8_unicode_ci  DEFAULT 'Nam',
  `Phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci DEFAULT '',
  `PostAmount` int(10) UNSIGNED DEFAULT 0,
  `CommentAmount` int(10) UNSIGNED DEFAULT 0,
  `User_id` int(11) NOT NULL,
  `Level_id` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`Profile_id`, `Avatar`, `Name`, `gender`, `Phone`, `Email`, `address`, `PostAmount`, `CommentAmount`, `User_id`, `Level_id`) VALUES
(1, 'https://i.vietgiaitri.com/2020/6/3/xinh-dep-lai-co-minh-day-cung-nguc-day-hotgirl-len-hinh-ben-bo-ma-bi-don-cap-dai-gia-19f-4981007.jpg', 'Kiều Văn Đoàn', 'Nam', '975908445', 'kieuvandoanit@gmail.com', '0', 0, 0, 1, 0),
(2, 'https://icdn.dantri.com.vn/thumb_w/640/2020/08/30/diem-danh-nhung-guong-mat-hot-girl-noi-bat-trong-thang-8-docx-1598788426579.jpeg', 'Nguyễn Văn Toàn', '', '95483728', 'kieuvandoanit@gmail.com', '', 0, 0, 2, 0),
(15, '', 'Nguyễn Văn Test', '', '987394934', 'nvt@gmail.com', '0', 0, 0, 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `UType_id` int(10) UNSIGNED NOT NULL,
  `Type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`UType_id`, `Type`) VALUES
(2, 'user'),
(1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `votingID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `Member_id` int(11) NOT NULL,
  `Rate` enum('1 sao','2 sao','3 sao','4 sao','5 sao') COLLATE utf8_unicode_ci DEFAULT '5 sao',
  `time` datetime DEFAULT now()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`votingID`, `PostID`, `Member_id`, `Rate`, `time`) VALUES
(33, 7, 1, '1 sao', '2021-06-26 18:30:22'),
(2, 1, 1, '2 sao', '0000-00-00 00:00:00'),
(3, 1, 1, '2 sao', '0000-00-00 00:00:00'),
(4, 1, 1, '5 sao', '0000-00-00 00:00:00'),
(32, 4, 1, '1 sao', '2021-06-26 18:06:58'),
(6, 1, 1, '5 sao', '0000-00-00 00:00:00'),
(31, 4, 1, '3 sao', '2021-06-26 18:06:54'),
(8, 1, 1, '1 sao', '0000-00-00 00:00:00'),
(9, 1, 1, '1 sao', '0000-00-00 00:00:00'),
(10, 1, 1, '1 sao', '0000-00-00 00:00:00'),
(11, 1, 1, '1 sao', '0000-00-00 00:00:00'),
(12, 1, 1, '1 sao', '0000-00-00 00:00:00'),
(13, 1, 1, '1 sao', '0000-00-00 00:00:00'),
(14, 1, 1, '1 sao', '0000-00-00 00:00:00'),
(15, 5, 1, '1 sao', '0000-00-00 00:00:00'),
(16, 5, 1, '5 sao', '0000-00-00 00:00:00'),
(17, 5, 1, '2 sao', '0000-00-00 00:00:00'),
(18, 6, 1, '1 sao', '0000-00-00 00:00:00'),
(19, 6, 1, '3 sao', '0000-00-00 00:00:00'),
(20, 6, 1, '5 sao', '0000-00-00 00:00:00'),
(21, 6, 1, '5 sao', '0000-00-00 00:00:00'),
(22, 6, 1, '1 sao', '0000-00-00 00:00:00'),
(23, 6, 1, '5 sao', '0000-00-00 00:00:00'),
(24, 6, 1, '5 sao', '0000-00-00 00:00:00'),
(25, 6, 1, '5 sao', '0000-00-00 00:00:00'),
(26, 6, 1, '2 sao', '0000-00-00 00:00:00'),
(27, 6, 1, '3 sao', '0000-00-00 00:00:00'),
(28, 6, 1, '4 sao', '0000-00-00 00:00:00'),
(29, 6, 1, '3 sao', '0000-00-00 00:00:00'),
(30, 3, 1, '2 sao', '2021-06-26 18:04:27'),
(34, 8, 1, '2 sao', '2021-06-27 18:19:39'),
(35, 9, 1, '2 sao', '2021-06-28 10:10:09'),
(36, 27, 1, '2 sao', '2021-07-10 16:21:27');

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
  MODIFY `Category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `Level_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `liked_post`
--
ALTER TABLE `liked_post`
  MODIFY `LP_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Post_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `votingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE post add FULLTEXT (Content);
ALTER TABLE post add FULLTEXT (Title);
ALTER TABLE post add FULLTEXT (HashTag);
