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

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_id`, `CategoryName`, `Description`) VALUES
(1, 'Tự nhiên', ''),
(2, 'Xã hội', ''),
(3, 'Tâm lý', ''),
(4, 'Sức khỏe', ''),
(5, 'Tài chính', ''),
(6, 'Công nghệ', ''),
(7, 'Học tập', '');


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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Comment_id`, `Content`, `CreateDate`, `UpdateDate`, `isSpam`, `isDelete`, `Member_id`, `Post_id`) VALUES
(2, 'Xưa giờ mình cứ nghĩ buồn chán là điều gì đó tồi tệ lắm. Nhưng nhờ bài viết này mình đã thay đổi suy nghĩ. Cảm ơn vì bài viết ý nghĩa!', '2021-07-16 08:35:19', '2021-07-16 08:35:19', 0, 0, 4, 1),
(1, 'Bài viết hay, mong chờ các bài viết tiếp theo <3', '2021-07-16 08:32:13', '2021-07-16 08:32:13', 0, 0, 4, 2),
(3, 'Thật đáng để mong chờ... Nhớ ngày xưa mỗi lần được lên wins bản mới là háo hức không tả nổi :v', '2021-07-16 08:43:31', '2021-07-16 08:43:31', 0, 0, 5, 4),
(4, 'Chuỗi bài viết khá thú vị. Mặc dù nội dung mỗi bài khá ngắn gọn nhưng lại khá dễ hiểu. Mong sẽ có thêm những chuỗi bài viết thế này!', '2021-07-16 08:45:36', '2021-07-16 08:45:36', 0, 0, 5, 8),
(5, 'Kiến thức khá thú vị, đặc biệt là về lạc đà, điều này mình mới biết sau khi đọc bài viết này :v', '2021-07-16 08:54:30', '2021-07-16 08:54:30', 0, 0, 6, 5),
(6, 'Chờ đợi phần tiếp theo...', '2021-07-16 08:56:50', '2021-07-16 08:56:50', 0, 0, 6, 6),
(7, 'đọc bài xong mới biết tại sao tập thể dục hoài mà không có body sáu múi', '2021-07-17 23:01:23', '2021-07-17 23:01:23', 0, 0, 9, 19),
(8, 'bài viết đọc khá hay\r\n', '2021-07-17 23:01:50', '2021-07-17 23:01:50', 0, 0, 9, 19),
(9, 'Liệu có khóa học cụ thể cho điều này không?', '2021-07-17 23:02:36', '2021-07-17 23:02:36', 0, 0, 9, 14),
(10, 'nghe có vẻ hay đấy nhưng mình ra trường rồi và mình thấy tự học vẫn tốt nhất.\r\n', '2021-07-17 23:03:09', '2021-07-17 23:03:09', 0, 0, 9, 13),
(11, 'Nghe có vẻ hay đấy', '2021-07-17 23:03:46', '2021-07-17 23:03:46', 0, 0, 9, 12),
(12, 'hoc trên w3school vẫn ổn mà', '2021-07-17 23:04:08', '2021-07-17 23:04:08', 0, 0, 9, 11),
(13, 'vậy học JS trước mới nên học PHP phải không ta', '2021-07-17 23:04:43', '2021-07-17 23:04:43', 0, 0, 9, 10),
(14, 'Con người cũng rất bận rộn nhé :)))', '2021-07-17 18:54:35', '2021-07-17 18:54:35', 0, 0, 10, 31),
(15, 'Bài viết rất hay, ý nghĩa!', '2021-07-17 18:17:27', '2021-07-17 18:17:27', 0, 0, 11, 24),
(16, 'Mình có file nghe full, ai cần thì liên hệ mình nhé!', '2021-07-17 18:18:21', '2021-07-17 18:18:21', 0, 0, 11, 24),
(17, 'Thích nhất cái ảnh...', '2021-07-17 18:19:18', '2021-07-17 18:19:18', 1, 0, 11, 33),
(18, 'Môi trường sống rất quan trọng.', '2021-07-17 18:20:52', '2021-07-17 18:20:52', 1, 0, 11, 29),
(19, 'Ai nếm thử rồi cho mình xin review với!', '2021-07-17 18:21:56', '2021-07-17 18:21:56', 0, 0, 11, 32);

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
(1, 'Học sinh', 'Level 50 điểm trở lên'),
(2, 'Sinh viên', 'Level 100 điểm trở lên'),
(3, 'Thạc sĩ', 'Level 200 điểm trở lên'),
(4, 'Tiến sĩ', 'Level 400 điểm trở lên'),
(5, 'Giáo sư', 'Level 800 điểm trở lên');

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

--
-- Dumping data for table `liked_post`
--

INSERT INTO `liked_post` (`LP_id`, `User_id`, `Post_id`, `CreatedDate`) VALUES
(3, '5', 8, '2021-07-16 08:44:33'),
(2, '5', 7, '2021-07-16 08:39:54'),
(1, '4', 1, '2021-07-16 08:35:34'),
(4, '5', 1, '2021-07-16 08:48:41'),
(5, '6', 5, '2021-07-16 08:52:14'),
(6, '6', 7, '2021-07-16 08:55:26'),
(7, '6', 2, '2021-07-16 08:55:30'),
(8, '6', 2, '2021-07-16 08:56:27'),
(9, '9', 18, '2021-07-17 22:57:54'),
(10, '9', 14, '2021-07-17 22:57:55'),
(11, '9', 2, '2021-07-17 22:57:56'),
(12, '9', 3, '2021-07-17 22:57:56'),
(13, '9', 5, '2021-07-17 22:58:18'),
(14, '9', 8, '2021-07-17 22:58:19'),
(15, '9', 13, '2021-07-17 22:58:20'),
(16, '9', 6, '2021-07-17 22:58:20'),
(17, '9', 7, '2021-07-17 22:58:23'),
(18, '9', 11, '2021-07-17 22:58:24'),
(19, '9', 12, '2021-07-17 22:58:24'),
(20, '9', 10, '2021-07-17 22:58:25'),
(21, '9', 20, '2021-07-17 22:58:55'),
(22, '9', 19, '2021-07-17 22:58:56'),
(23, '9', 21, '2021-07-17 22:58:58'),
(24, '9', 22, '2021-07-17 22:59:01'),
(25, '10', 28, '2021-07-17 18:53:45'),
(26, '10', 33, '2021-07-17 18:53:48'),
(27, '11', 24, '2021-07-17 18:17:04'),
(28, '11', 33, '2021-07-17 18:18:56'),
(29, '11', 30, '2021-07-17 18:19:37'),
(30, '11', 27, '2021-07-17 18:19:39'),
(31, '11', 28, '2021-07-17 18:19:40'),
(32, '11', 29, '2021-07-17 18:19:41'),
(33, '11', 26, '2021-07-17 18:19:42'),
(34, '11', 32, '2021-07-17 18:19:44'),
(35, '11', 25, '2021-07-17 18:19:47'),
(36, '11', 31, '2021-07-17 18:19:52'),
(37, '10', 32, '2021-07-17 18:53:50'),
(38, '10', 31, '2021-07-17 18:53:51'),
(39, '10', 3, '2021-07-17 18:58:37'),
(40, '10', 25, '2021-07-17 18:56:29'),
(41, '10', 24, '2021-07-17 18:56:35'),
(42, '10', 27, '2021-07-17 18:56:55'),
(43, '10', 30, '2021-07-17 18:56:59'),
(44, '10', 28, '2021-07-17 18:58:42');

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

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Post_id`, `Title`, `thumb`, `HashTag`, `Content`, `Status`, `LikesAmount`, `commentAmount`, `AvgRating`, `rateAmount`, `viewed`, `isDelete`, `isValid`, `CreatedDate`, `UpdatedDate`, `Member_id`, `Category_id`) VALUES
(14, 'Học lập trình Fullstack', 'uploads/front-end-back-end.png', 'laptrinh fullstack', 'Theo khảo sát của Stack Overflow Developer mới nhất, Full-Stack Web Development vẫn là xu hướng phổ biến nhất hiện nay. Không có gì ngạc nhiên khi có hàng tá các chương trình đào tạo online và offline giúp đỡ mọi lập trình viên trở thành Fullstack Developer và thậm chí sau đó còn hỗ trợ các developer mới này có được công việc lập trình với thu nhập cao.\r\n\r\nTrong bài viết này, tôi sẽ cung cấp các guideline hướng dẫn những kỹ năng quan trọng nhất cần thiết để trở thành một Full-Stack Web Developer.\r\n\r\nFullstack developer là gì?\r\nFullstack developer là sự tổng hợp từ kiến thức, sự hiểu biết trực quan và sâu sắc về cả front-end và back-end, cũng như nắm vững các best practices và khái niệm. Đương nhiên, các full stack developer đều có khả năng code cho mọi thành phần của hệ thống, và họ sẽ làm mọi thứ một cách tốt nhất nếu họ thực sự giỏi. Điều này đòi hỏi một lượng lớn các kỹ năng cũng như kinh nghiệm.\r\n\r\nFull stack developer làm những gì?\r\nMột Full-Stack Web Developer là người có thể làm việc trên cả front-end và back-end của một ứng dụng. Front-end nói chung là phần mà người dùng có thể thấy được và tương tác được, còn back-end là phần ứng dụng xử lý logic, tương tác cơ sở dữ liệu, chứng thực người dùng, cấu hình máy chủ, vv.', 'Đã duyệt', 13, 1, 3, 2, 25, 0, 0, '2021-06-25 17:04:15', '2021-07-09 12:08:11', 1, 1),
(15, 'Test thử thông báo email', 'uploads/luyenthi.jpg', 'php hocphp ', 'Test thử send mail', 'Không được duyệt', 0, 0, 0, 0, 1, 0, 0, '2021-07-09 12:01:25', '2021-07-09 12:08:11', 1, 1),
(13, 'Luyện thi đại học với Kiều Văn Đoàn', 'uploads/luyenthi.jpg', 'daihoc luyenthi', 'Những thành viên sáng lập trung tâm điểm 10 đều là các giảng viên có nhiều tâm huyết đến từ trường đại học Cần Thơ, có sự đầu tư chuẩn bị từ rất lâu về đội ngũ giảng viên tham gia giảng dạy nên có thể đảm bảo được chất lượng của đội ngũ giảng viên một cách thật sự. Các phòng học được trang bị cơ sở vật chất khang trang, đạt tiêu chuẩn của bộ y tế về diện tích phòng, bàn ghế, ánh sáng, bảng.\r\n\r\n\r\n\r\nPhòng học thoáng mát và trang bị cơ sở vật chất đạt chuẩn là yếu tố giúp các em học sinh có được sự thoải mái khi đến học lại trung tâm. Ngoài ra, trung tâm luyện thi đại học điểm 10 đã trang bị máy lạnh cho tất cả các phòng học. Trung tâm có nhiều kinh nghiệm dạy luyện thi và tâm huyết trong lĩnh vực giáo dục đào tạo nên có được sự chặt chẽ và khoa học trong công tác tổ chức và quản lý nhằm đảm bảo chất lượng dạy học.\r\n\r\n\r\n\r\nTrung tâm luyện thi đại học điểm 10 hiện đang đứng đầu về mảng dạy luyện thi (đông học sinh nhất và kết quả học sinh cao nhất Cần Thơ) + kỹ năng-nhân cách và hướng nghiệp duy nhất tại Cần Thơ, thực hiện nhiều chương trình lớn về định hướng thay đổi giáo dục cho xã hội và tầm ảnh hưởng lớn đến các trường THCS và THPT tại Cần Thơ.', 'Đã duyệt', 7, 1, 3.53846, 13, 6, 0, 0, '2021-06-25 17:02:22', '2021-07-09 12:08:11', 1, 1),
(11, 'Cách học lập trình javascript', 'uploads/javascript.jpg', 'js javascript learning', 'JavaScript được tạo trong mười ngày bởi Brandan Eich, một nhân viên của Netscape, vào tháng 9 năm 1995. Được đặt tên đầu tiên là Mocha, tên của nó được đổi thành Mona rồi LiveScript trước khi thật sự trở thành JavaScript nổi tiếng như bây giờ. Phiên bản đầu tiên của ngôn ngữ này bị giới hạn độc quyền bởi Netscape và chỉ có các tính năng hạn chế, nhưng nó tiếp tục phát triển theo thời gian, nhờ một phần vào cộng đồng các lập trình viên đã liên tục làm việc với nó.\r\n\r\nTrong năm 1996, JavaScript được chính thức đặt tên là ECMAScript. ECMAScript 2 phát hành năm 1998 và ECMAScript 3 tiếp tục ra mắt vào năm 1999. Nó liên tục phát triển thành JavaScript ngày nay, giờ đã hoạt động trên khắp mọi trình duyệt và trên khắp các thiết bị từ di động đến máy tính bàn.\r\n\r\nJavaScript liên tục phát triển kể từ đó, có lục đạt đến 92% website đang sử dụng JavaScript vào năm 2016. Chỉ trong 20 năm, nó từ một ngôn ngữ lập trình riêng trở thành công cụ quan trọng nhất trên bộ công cụ của các chuyên viên lập trình web. Nếu bạn đang dùng internet, vậy chắc chắn bạn đã từng sử dụng JavaScript rồi.', 'Đã duyệt', 6, 1, 2.54286, 7, 3, 0, 0, '2021-06-25 16:33:30', '2021-07-09 12:08:11', 1, 1),
(12, 'SEO dễ dàng với Kiều Văn Đoàn', 'uploads/seo.png', 'seo', 'Chào mừng bạn đã ở đây,\r\n\r\nNếu bạn đã nắm chắc các khái niệm căn bản về SEO và tầm quan trọng của SEO bạn có thể bỏ qua bài viết này để tham khảo các cách làm SEO tại đây.\r\n\r\nNếu bạn là người mới bắt đầu, bài viết này sẽ cung cấp cho bạn những kiến thức nền tảng về SEO. Đọc hết bài viết này bạn sẽ thấu hiểu:\r\n\r\nĐịnh nghĩa về SEO?\r\nTầm quan trọng của SEO\r\nCách SEO hoạt động như thế nào\r\n9 lưu ý quan trọng cho người mới bắt đầu học SEO\r\nNgay bây giờ bạn hãy bắt đầu tìm hiểu những thông tin đầu tiên về SEO, nếu có bất kỳ thắc mắc nào xin vui lòng để lại bình luận để tôi có thể giúp bạn giải đáp.\r\n\r\nSEO là gì?\r\nSEO là từ viết tắt của Search Engine Optimization (tối ưu hóa công cụ tìm kiếm), là một quy trình nâng cao thứ hạng của website trên các công cụ tìm kiếm giúp người dùng có thể tìm thấy trang web dễ dàng hơn trên bảng kết quả tìm kiếm.', 'Đã duyệt', 5, 1, 3.275, 4, 4, 0, 0, '2021-06-25 16:35:23', '2021-07-09 12:08:11', 1, 2),
(9, 'Cách làm giàu ', 'uploads/cachlamgiau.jpg', 'lamgiau cachlamgiau', 'sfasfsf', 'Không được duyệt', 33, 0, 2.7, 49, 1, 1, 0, '2021-06-25 11:26:20', '2021-07-09 12:08:11', 1, 1),
(10, 'Làm sao để học giỏi PHP', 'uploads/hocphp.jpg', 'php hocphp ', 'PHP (viết tắt đệ quy của PHP: Hypertext Preprocessor) là tập hợp con của các ngôn ngữ script như JavaScript và Python. Sự khác biệt là ngôn ngữ PHP chủ yếu được sử dụng để giao tiếp phía server trong khi JavaScript có thể được sử dụng cho cả frontend cũng như backend và Python – chỉ dành cho phía client (backend).\r\n\r\nNghe có vẻ khó hiểu nhỉ? Nên đó là lý do tại sao chúng ta cần hiểu về ngôn ngữ script trước khi đi sâu vào PHP.\r\n\r\nNgôn ngữ script, scripting language, là gì? Nó là ngôn ngữ tự động hóa việc thực hiện các tác vụ trong môi trường runtime đặc biệt. Chúng bao gồm việc yêu cầu một trang web tĩnh (được xây dựng bằng HTML và CSS) thực hiện các hành động cụ thể với quy tắc bạn đã xác định trước.\r\n\r\nChẳng hạn, bạn có thể sử dụng script để xác thực biểu mẫu đảm bảo tất cả các trường đã được điền trước khi nó được gửi trở lại server. Script sẽ chạy và sau đó kiểm tra tất cả các trường khi người dùng gửi biểu mẫu.\r\n\r\nNếu biểu mẫu trống, cảnh báo sẽ hiển thị để thông báo cho người dùng.\r\n\r\nCác cách sử dụng phổ biến khác của ngôn ngữ script bao gồm hiển thị hiệu ứng thả xuống khi con trỏ di chuyển qua menu chính, nút cuộn và hình động, mở hộp thoại, v.v.', 'Đã duyệt', 10, 1, 3.24, 5, 3, 0, 0, '2021-06-25 16:29:16', '2021-07-09 12:08:11', 1, 1),
(16, 'test upload file 3 edit', 'uploads/1.PNG', 'php hocphp ', 'test', 'Không được duyệt', 0, 0, 0, 0, 0, 1, 0, '2021-07-12 11:30:26', '2021-07-12 11:30:26', 1, 2),
(17, 'test upload file', 'uploads/4.jpg', 'test upload', 'test', 'Không được duyệt', 0, 0, 0, 0, 0, 0, 0, '2021-07-12 12:34:51', '2021-07-12 12:34:51', 1, 1),
(18, 'Đoàn Say Hello', 'uploads/4.jpg', 'doan', '<p><span style=\"background-color: #f1c40f;\"><strong>Kiều Văn Đo&agrave;n</strong></span> say hello Mạng X&atilde; Hội Tri Thức</p>', 'Đã duyệt', 2, 1, 3, 6, 37, 0, 0, '2021-07-16 15:16:01', '2021-07-16 15:16:01', 1, 2),
(1, 'Ưu điểm của Buồn chán', 'uploads/buonchan.jpg', 'tamlyhoc connguoi', 'Khi chúng ta nghĩ về những hành động và hành vi sẽ có tác động lớn nhất lên cuộc sống, chúng ta có xu hướng tưởng tượng ra những thời khắc lịch sử trong cuộc sống - tức là, những sự kiện giàu cảm xúc và đầy kịch tính.<br>\r\nKhi chúng ta nghĩ về những hành động và hành vi sẽ có tác động lớn nhất lên cuộc sống, chúng ta có xu hướng tưởng tượng ra những thời khắc lịch sử trong cuộc sống - tức là, những sự kiện giàu cảm xúc và đầy kịch tính.<br>\r\nNhưng thường thì, ngược lại là đàng khác. Bỏ rượu có lẽ sẽ thay đổi đời bạn nhiều hơn là leo núi. Tập thể dục ba lần một tuần trong vòng một năm có thể sẽ tác động mạnh mẽ đến tâm trạng và lòng tự tôn của bạn hơn một buổi hội thảo đắt đỏ. Chặn mạng xã hội trên các thiết bị của bạn trong tuần sẽ giúp bạn đạt được năng suất cao hơn bất kỳ bí kíp “hack” năng suất mà bạn tìm thấy trong một cuốn sách.<br>\r\nĐiều này có vẻ quá rõ ràng và đó là một phần lý do tại sao chúng ta không làm theo. Chúng ta trì hoãn, trì hoãn nữa và trì hoãn mãi, rồi cuối cùng, khi ta phát ngán với bản thân mình, ta lại tự nhủ, “Đã đến lúc cần phải thay đổi!” và sau đó chúng ta tìm kiếm giải pháp quyết liệt và dữ dội nhất mà ta có thể làm, trong khi thực tế thì từ xưa đến giờ, thay đổi rất đơn giản.<br>\r\nTôi cho rằng có hai lý do khiến chúng ta rất dở trong việc chấp nhận chuyện này. Lý do đầu tiên là những thứ thú vị thường dễ quảng bá và dễ bán hơn, vì vậy đó chính là những thứ mà bạn và tôi thường hay nghe đến. Uống nước ép cải xoăn và tập chống đẩy? Quên mẹ nó đi. Hãy bán nhà và sống trong một chiếc xe RV.<br>\r\nỞ đây xuất hiện một hiệu ứng tâm lý, rằng một hành động càng gay gắt thì chúng ta càng giả định rằng mọi thứ sẽ thay đổi trong cuộc đời mình, một khi chúng ta làm như vậy. Nhưng đây là một ảo tưởng, một trò bịp bợm của tâm trí.\r\nLý do khác khiến chúng ta khó chấp nhận điều này đó là chúng ta thích cái ý tưởng rằng ngoài kia có một vài bí mật tầm cỡ vũ trụ, đang đợi ta khám phá. Thật tuyệt làm sao! Nó mang đến hy vọng cho ta. Nó giúp chúng ta chịu đựng những ngày buồn tẻ, lặp đi lặp lại vốn là thứ không thể tránh khỏi trong cuộc sống. Chúng ta không muốn thừa nhận rằng chúng là điều chắc chắn xảy ra. Vì thế mà ta chạy theo ảo tưởng thay đổi - cuộc sống tiếp theo.<br>\r\nSự buồn chán có ưu điểm - và không chỉ nằm ở việc khoan dung với nó, mà còn học cách đón nhận nó. Đó là nơi tạo ra giá trị thực trong cuộc sống. Và đó cũng là nơi mà người ta trải nghiệm được thứ giá trị nhất.<br><br>\r\n\r\nNguồn: Mark Manson<br>', 'Chờ duyệt', 2, 0, 5, 1, 5, 0, 0, '2021-02-05 14:50:51', '2021-07-15 14:50:51', 3, 3),
(19, '6 bí quyết giúp bạn tập thể dục đúng cách', 'uploads/thucansach.png', 'healthy theduc', '<h2>1. Ăn nhẹ trước khi tập thể dục:</h2>\r\n<p><em>Cơ thể bạn cần c&oacute; một lượng glucose (lượng đường trong m&aacute;u) để duy tr&igrave; năng lượng trong qu&aacute; tr&igrave;nh tập luyện. Cơ thể nhịn đ&oacute;i sẽ dễ dẫn đến t&igrave;nh trạng lượng đường trong m&aacute;u bị hạ thấp. Nếu lượng đường trong m&aacute;u thấp sẽ khiến bạn mệt mỏi, uể oải, ch&oacute;ng mặt trong qu&aacute; tr&igrave;nh tập v&agrave; thậm ch&iacute; l&agrave;m giảm hiệu quả giảm c&acirc;n.</em></p>\r\n<h2>2. K&eacute;o gi&atilde;n cơ thể trước khi tập:</h2>\r\n<p><em>Bạn h&atilde;y d&agrave;nh ra 5 &ndash; 10 ph&uacute;t để khởi động cơ thể bằng những</em> <strong><em>b&agrave;i tập cardio </em></strong><em>như chạy bộ, đạp xe, nhảy d&acirc;y&hellip; Sau đ&oacute;, bạn thực hiện những b&agrave;i tập gi&atilde;n cơ để k&iacute;ch th&iacute;ch n&atilde;o, tăng phạm vi chuyển động của cơ khớp v&agrave; ngăn ngừa bong g&acirc;n, đau cơ&hellip;.</em></p>\r\n<h2>3. Thực hiện đa dạng c&aacute;c b&agrave;i tập</h2>\r\n<p>Nếu muốn tập thể dục đ&uacute;ng c&aacute;ch để giảm c&acirc;n, bạn n&ecirc;n thực hiện chuỗi b&agrave;i tập xoay v&ograve;ng (circuit training) để l&agrave;m tăng nhịp tim v&agrave; đốt ch&aacute;y được lượng calo tối đa. C&aacute;c chuỗi b&agrave;i tập xoay v&ograve;ng sẽ được thực hiện bằng c&aacute;ch kết hợp nhiều động t&aacute;c với nhau (khoảng 4 &ndash; 5 b&agrave;i) v&agrave; tập ở cường độ cao với rất &iacute;t thời gian nghỉ.</p>\r\n<h2>4. Thay đổi th&oacute;i quen tập thể dục</h2>\r\n<p>Nếu duy tr&igrave; th&oacute;i quen thực hiện một b&agrave;i tập thể dục mỗi ng&agrave;y, cơ thể bạn sẽ quen dần với b&agrave;i tập v&agrave; khiến bạn kh&oacute; giảm c&acirc;n cũng như nhận được những lợi &iacute;ch sức khỏe. V&igrave; thế m&agrave; bạn h&atilde;y thay đổi c&aacute;c b&agrave;i tập của m&igrave;nh &iacute;t nhất 2 lần/1 tuần để thay đổi th&oacute;i quen tập luyện v&agrave; gi&uacute;p c&aacute;c bộ phận được t&aacute;c động nhiều nhất c&oacute; thể.</p>\r\n<h2>5. Kh&ocirc;ng sử dụng điện thoại khi tập luyện</h2>\r\n<p>Thời gian tập luyện với cường độ cao l&agrave; rất cần thiết để bạn đốt ch&aacute;y mỡ thừa. Nếu bạn muốn thấy kết quả như &yacute;, bạn kh&ocirc;ng n&ecirc;n sử dụng điện thoại khi tập thể dục v&igrave; l&uacute;c n&agrave;y l&agrave; bạn đang cho cơ thể m&igrave;nh nghỉ ngơi v&agrave; kh&ocirc;ng thể tập trung luyện tập được.</p>\r\n<h2>6. Biết giới hạn của bản th&acirc;n</h2>\r\n<p>Bạn n&ecirc;n biết giới hạn của bản th&acirc;n m&igrave;nh nếu kh&ocirc;ng muốn việc tập luyện trở n&ecirc;n k&eacute;m hiệu quả. Việc tập luyện qu&aacute; sức sẽ l&agrave;m cơ thể bạn chấn thương v&agrave; l&agrave;m ảnh hưởng kh&aacute; nhiều đến sinh hoạt h&agrave;ng ng&agrave;y, thậm ch&iacute; khiến bạn phải ngừng việc tập luyện một thời gian. L&uacute;c n&agrave;y bạn phải nằm một chỗ để điều trị bệnh n&ecirc;n c&ograve;n dễ d&agrave;ng tăng c&acirc;n hơn nữa đấy!</p>', 'Duyệt tự động', 1, 2, 4, 1, 3, 0, 0, '2021-07-17 16:28:21', '2021-07-17 16:28:21', 7, 4),
(2, '4 bài học tài chính đắt giá (Phần 1)', 'uploads/taichinh1.jpg', 'baihoc taichinh', '<p><strong>Bạn sẽ không có thứ bạn xứng đáng được nhận, bạn chỉ có thứ bạn thỏa thuận được</strong></p>\r\nFarnoosh Torabi – người nổi tiếng ở nhiều vai trò khác nhau, như chuyên gia tài chính cá nhân, tác giả sách, nhà sản xuất chương trình truyền hình Bank of Mom and Dad … có một bài học tài chính được đúc kết từ trải nghiệm trong công việc của cô.<br>\r\n“Năm 2006, khi 26 tuổi, tôi được giới thiệu vào làm phóng viên cấp cao tại tờ báo The Street.com. Thời điểm đó tôi đang kiếm được 45.000 USD từ công việc sản xuất các chương trình tại đài truyền hình nên không có ý định đến TheStreet.com do khá hài lòng với những gì mình có, vì vậy tôi yêu cầu họ một mức lương không tưởng là 100.000 USD, hơn gấp đôi những gì tôi đang nhận được và ngồi chờ sự từ chối từ họ. Kết quả thật bất ngờ, họ cố gắng thỏa thuận với tôi ở mức lương 85.000 USD và ngay khi tôi đưa ra lời đề nghị 90.000 USD, họ lập tức soạn thảo hợp đồng và gửi mail chào mừng tôi đến với The Street.com”.<br><br>\r\nNguồn: Happy.Live<br>', 'Đã duyệt', 1, 0, 4, 1, 4, 0, 0, '2021-03-03 08:00:51', '2021-07-16 08:00:51', 3, 5),
(3, 'Đối tượng nghiên cứu và nhiệm vụ của Tâm lý học.', 'uploads/tamly.png', 'tamlyhoc doituong', 'Đối tượng của tâm lý học là các hiện tượng tâm lý với tư cách là một hiện tượng tinh thần do thế giới khách quan tác động vào não con người sinh ra, gọi chung là các hoạt động tâm lý. Tâm lý học nghiên cứu sự hình thành, vận hành và phát triển của các hoạt động tâm lý.<br>\r\nĐể làm rõ, tìm hiểu các hiện tượng tâm lý; nhiệm vụ đầu tiên của ngành tâm lý học; đó là nghiên cứu hiện tượng tâm lý từ những thực trạng đang xảy ra xung quanh đời sống. Tiếp sau việc nghiên cứu từ những thực trạng, ngành này còn có thêm nhiệm vụ; là phải phát hiện các quy luật trong hiện tượng tâm lý đó.<br>\r\nTừ đó, các nhà tâm lý học sẽ lý giải những hiện tượng tâm lý đang xảy ra; và dự báo các hành vi, thái độ của những cá nhân đang vướng phải hiện tượng tâm lý. Cuối cùng, dựa trên việc dự báo hành vi, thái độ của người mắc phải hiện tượng tâm lý; nhà tư vấn tâm lý sẽ đưa ra các giải pháp phát huy việc thiết lập mối quan hệ với những người khác; đồng thời, còn ứng dụng và nâng cao chất lượng đời sống nội tâm cho mọi người.<br>', 'Duyệt tự động', 1, 0, 0, 0, 4, 0, 0, '2021-03-09 14:53:50', '2021-07-15 14:53:50', 3, 3),
(4, 'Microsoft chính thức giới thiệu Windows 11', 'uploads/win11.png', 'congnghe win11', 'Microsoft mới đây vừa chính thức giới thiệu Windows 11, phiên bản chính tiếp theo của hệ điều hành máy tính lâu năm của công ty.<br>\r\nHệ điều hành mới mang theo một số cải tiến, bao gồm giao diện người dùng được thiết kế lại, cập nhật các tính năng quản lý cửa sổ và thậm chí hỗ trợ các ứng dụng Android.<br>\r\nNgay lập tức, điều đầu tiên bạn nhận thấy là thanh tác vụ và menu Start được thiết kế lại. Giống các rò rỉ trước đó, thanh taskbar của Windows 11 giờ đây trông khá giống với macOS với các biểu tượng được căn giữa chứ không lệch trái như trước. Tuy nhiên, nó vẫn giữ các mục linh tinh như đồng hồ và biểu tượng ở bên phải, và điều này khiến cho bên trái cảm thấy trống rỗng.<br>\r\nBên cạnh đó, Start Menu cũng mang thiết kế hoàn toàn mới, tập trung hiển thị ứng dụng và tài liệu mà người dùng thường truy cập. Bạn vẫn có thể thay đổi hồ sơ người dùng của mình và tắt nguồn PC từ đây.<br>\r\nPhần còn lại của giao diện người dùng cũng nhận được nhiều cải tiến mới. Các góc cửa sổ windows hiện được bo tròn nhiều hơn so với phiên bản cũ hơn, đặc biệt là khi so sánh với các cạnh sắc nét của Windows 10. Giờ đây, giao diện người dùng thậm chí được thiết kế trong suốt hơn và chủ đề đã được đại tu, hiện có thể có tác động đáng kể hơn đến giao diện người dùng.<br>\r\nWindows 11 cũng giới thiệu Snap Layouts, Snap Groups và Desktop, giúp bạn dễ dàng sắp xếp nhanh chóng nhiều cửa sổ xung quanh màn hình nền của mình. Nó cũng sẽ ghi nhớ cách bố trí này để người dùng vẫn có thể sử dụng khi chuyển đổi giữa các màn hình.<br>\r\nTrên Windows 11, Microsoft đã tích hợp ứng dụng Microsoft Teams của riêng mình trực tiếp vào hệ điều hành. Nó nằm ở thanh tác vụ và về cơ bản, Teams là một ứng dụng nhắn tin/gọi video call mà bạn có thể sử dụng để gọi điện hoặc nhắn tin cho bạn bè, gia đình hoặc đồng nghiệp của mình.<br>\r\nWindows 11 cũng đang nhận được các widget mới. Các widget này nằm trong màn hình riêng biệt của chúng, có thể được kéo vào bất kỳ lúc nào từ cạnh trái của màn hình. Như đã thấy trên các nền tảng khác, các widget sẽ cung cấp thông tin có thể xem nhanh từ tất cả các ứng dụng của bạn sẽ hỗ trợ tính năng này.<br>\r\nMicrosoft cũng đã cải thiện hỗ trợ cho các thiết bị màn hình cảm ứng. Hệ điều hành sẽ thay đổi bố cục của nó khi phát hiện khi bạn chuyển sang chế độ máy tính bảng. Tính năng nhập liệu bằng giọng nói và văn bản cũng đã được cải thiện với bàn phím mới. Những người sử dụng bút cảm ứng cũng sẽ nhận được phản hồi xúc giác với một số mẫu bút được chọn.<br>\r\nĐối với các game thủ, Microsoft đang mang đến tính năng Auto HDR từ tay cầm chơi game Xbox Series của mình, và tính năng này sẽ cho phép xuất HDR ngay cả từ các trò chơi không có HDR. Một tính năng khác được thiết kế cho tay cầm chơi game Xbox và hiện đang có trên PC là DirectStorage. Nó tận dụng bộ nhớ SSD NVMe và tăng tốc thời gian tải trò chơi một cách đáng kể. Game Pass, một dịch vụ đăng ký cho trò chơi, cũng sẽ được tích hợp trong hệ điều hành thông qua ứng dụng Xbox mới.<br>\r\nMicrosoft cũng đã đại tu ứng dụng Store của mình cho Windows 11. Mặc dù nó có giao diện người dùng hoàn toàn mới được thiết kế để tải và hoạt động nhanh hơn, nhưng tính năng đáng chú ý nhất ở đây là hỗ trợ ứng dụng Android. Thông qua quan hệ đối tác với Amazon và Intel, các ứng dụng Android hiện có sẽ có sẵn thông qua Microsoft Store và sẽ chạy trên Windows 11 mà không cần bất kỳ tinh chỉnh nào từ các nhà phát triển.<br>\r\nĐược biết, Windows 11 sẽ chính thức được Microsoft tung ra vào cuối năm nay và là bản cập nhật miễn phí.<br>', 'Duyệt tự động', 0, 0, 0, 0, 3, 0, 0, '2021-04-21 14:50:12', '2021-07-15 14:50:12', 3, 6),
(5, 'Những kiến thức khoa học thú vị về động vật.', 'uploads/lacda.jpg', 'khoahoctunhien dongvat', 'Toàn thế giới có hơn 1 triệu loài động vật đã được phát hiện và nhận biết, có những loài rất quen thuộc nhưng chúng ta vẫn chưa hiểu hết về chúng, hãy cùng điểm hiểu một số kiến thức khoa học thú vị liên quan đến động vật nhé!<br>\r\n– Cá ngựa là loài không có dạ dày, đường ruột của chúng kiêm nhiệm chức năng của dạ dày.<br>\r\n– Kangaroo là loài động vật đặc trưng của nước Úc với những bước nhảy xa tận 9m. Nhưng chúng không thể nhảy nếu đuôi không chạm mặt đất, vì đuôi chính là bộ phận giúp kangaroo giữ được sự cân bằng.<br>\r\n– Loài trai biển cung cấp cho con người những viên ngọc trai quý giá. Khi sinh ra, ban đầu tất cả các thể trai đều là con đực, vậy làm sao để chúng sinh sản? Vào một thời điểm nhất định trong chu kỳ đời sống, một số con trai đực quyết định “chuyển đổi giới tính” sang con cái.\r\nThế giới động vật luôn ẩn chứa những điều thú vị<br>\r\n– Kiến là một loài động vật sống có tổ chức và quy củ. Khi một cá thể trong đàn bị chết, các con còn lại trong đàn phát hiện thấy mùi lạ và tiến hành “mai táng” con kiến đã chết bằng cách mang xác ra khỏi tổ và và vứt vào một nơi cụ thể. Mục đích chính là không làm ô nhiễm môi trường sống của chúng, tránh các mầm bệnh có thể lây lan.<br>\r\n– Nhiều người lầm tưởng bướu trên lưng lạc đà chứa nước là chủ yếu, thế nhưng thực chất trong bướu lạc đà là các chất béo cung cấp năng lượng, chất dinh dưỡng đồng thời giúp chúng điều hòa thân nhiệt.<br>', 'Đã duyệt', 1, 0, 4, 1, 4, 0, 0, '2021-05-12 14:55:07', '2021-07-15 14:55:07', 3, 1),
(6, '4 bài học tài chính đắt giá (Phần 2)', 'uploads/taichinh2.jpg', 'baihoc taichinh', '<p><strong>Không quan trọng việc bạn kiếm được bao nhiêu, quan trọng là bạn có được bao nhiêu</strong></p>\r\nVào năm 10 tuổi, Bill Rancic – triệu phú sở hữu nhiều nhà hàng, dự án bất động sản nổi tiếng ở Chicago (Mỹ), học được bài học đầu tiên và quan trọng nhất về tài chính cùng với bà ngoại của mình, khi cả hai đi bán bánh: “Dù cho ngày hôm đó bạn bán được bao nhiêu chiếc bánh, kiếm được bao nhiêu tiền, nếu cuối ngày bạn trở về với một cái túi rỗng không, bạn cũng chỉ là con số không”.<br>\r\n“Từ đó tôi hiểu rằng, kiếm được một triệu đô không có nghĩa là bạn đã trở thành triệu phú. Không học được cách quản lý tiền bạc, cách tiết kiệm và đầu tư khôn ngoan, bạn sẽ không bao giờ trở thành triệu phú. Hãy bắt đầu học cách quản lý tiền bạc của mình, học cách chi ít hơn thu, tránh xa nợ nần ngay hôm nay, vì không bao giờ là quá trễ cả”.<br><br>\r\nNguồn: Happy.Live<br>', 'Đã duyệt', 1, 0, 0, 0, 4, 0, 0, '2021-05-19 08:05:33', '2021-07-16 08:05:33', 3, 5),
(7, '4 bài học tài chính đắt giá (Phần 3)', 'uploads/taichinh3.jpg', 'baihoc taichinh', '<p><strong>Có kế hoạch cho mọi việc.</strong></p>\r\nNăm 2002, khi anh em sinh đôi Kelly Edwards và Chris Edwards mua căn nhà đầu tiên ở thành phố Raleigh, phía bắc Carlifornia (Mỹ), họ không biết quá nhiều về bất động sản. “Chúng tôi biết mình không phải là kẻ thông minh nhất, nhưng chúng tôi biết chúng tôi đang làm gì”, Chris Edwards nhớ lại.<br>\r\nNgày nay, khi đã có trong tay khối tài sản ước tính 8 triệu USD, nguyên tắc đầu tư từ bài học thành công đầu tiên ấy của anh em nhà Edwards vẫn không đổi: “Đầu tư, kinh doanh là một phần cuộc sống của mỗi chúng ta, nên không thể để mọi thứ cứ thế diễn ra. Chúng ta cần một kế hoạch, thật tỉ mỉ”.<br>\r\n“Năm 2001, tôi và Kelly cùng ngồi lại, lên kế hoạch cho việc đầu tư bất động sản và từ phi vụ đầu tiên năm 2002 đến nay, quy tắc đầu tư của chúng tôi vẫn vậy. Năm 2006, khi nhìn vào bảng liệt kê tài sản của mình, chúng tôi cười phá lên, bởi nó hoàn toàn trùng khớp với những gì chúng tôi đã lên kế hoạch từ năm 2001”.<br>\r\n“Khác biệt mọi thứ là nằm ở kế hoạch. Chúng tôi không bao giờ là người giỏi nhất, nhưng chúng tôi luôn có thể thuê những người xuất sắc, những người giỏi hơn mình để đảm nhận các vấn đề hóc búa. Điều quan trọng nhất chỉ là biết mình đi tới đâu và mình muốn điều gì”.<br><br>\r\nNguồn: Happy.Live<br>', 'Đã duyệt', 1, 0, 4, 1, 4, 0, 0, '2021-05-20 18:04:05', '2021-07-16 08:10:57', 3, 5),
(8, '4 bài học tài chính đắt giá (Phần cuối)', 'uploads/taichinh4.jpg', 'baihoc taichinh', '<p><strong>Biết chính xác bạn đang sở hữu thứ gì và giá trị của nó là bao nhiêu.</strong></p>\r\nAaron LaPedis – triệu phú đồng thời là tác giả quyển sách bán chạy The Garage Sale Millionaire (Triệu phú trong nhà để xe), đã học được bài học tài chính trị giá hàng triệu đô khi mới… 10 tuổi.<br>\r\nLúc đó Aaron LaPedis có một cuộc “thương lượng” với bố mẹ mình, rằng nếu cậu giúp bố mẹ cậu bán những đồ dùng cũ trong garage của gia đình, cùng với những đồ chơi cũ của cậu, cậu sẽ được sử dụng số tiền đó để mua bất cứ món đồ chơi mới nào mà cậu thích. Và cậu bé Aaron LaPedis nhanh chóng thu về rất nhiều tiền, dù sau đó cậu đã bị bố mẹ phạt vì “vô tình” bán cả những vật dụng không nằm trong garage như lời bố mẹ dặn.<br>\r\nThương vụ đầu tiên này đã dạy cho Aaron LaPedis một bài học, rằng con người thật sự không biết rõ giá trị những món đồ mà họ đang sở hữu. Họ dễ dàng định giá mọi thứ thông qua việc so sánh qua lại hoặc kinh nghiệm bản thân. Đó là lý do, nhiều người từng bán những món đồ cổ, những bức tranh nghệ thuật hàng triệu USD với cái giá của một mớ giấy vụn.<br>\r\nVì vậy, khi bắt đầu sự nghiệp kinh doanh – đầu tư của mình, Aaron LaPedis luôn có một quy tắc, đó là chỉ bán hay mua những thứ mà mình biết chính xác giá trị thực của nó.<br>\r\nNguồn: Happy.Live<br>', 'Đã duyệt', 1, 0, 4, 1, 2, 0, 0, '2021-06-15 08:12:47', '2021-07-16 08:12:47', 3, 5),
(20, 'Đi bộ nhanh đúng cách thế nào để eo thon sức khỏe?', 'uploads/dibodungcach.jpg', 'healthy theduc dibo dibodungcach', '<p><strong>Đi bộ nhanh l&agrave; b&agrave;i tập cường độ cao bạn c&oacute; thể thực hiện tại nh&agrave; m&agrave; kh&ocirc;ng cần đến ph&ograve;ng tập để sử dụng c&aacute;c thiết bị hỗ trợ. B&agrave;i tập với 30 ph&uacute;t mỗi ng&agrave;y sẽ gi&uacute;p cơ thể bạn to&aacute;t nhiều mồ h&ocirc;i v&agrave; gặt h&aacute;i được nhiều lợi &iacute;ch sức khỏe.</strong></p>\r\n<h3>Cường độ đi bộ nhanh mỗi tuần</h3>\r\n<p><span style=\"color: #000000;\"><strong>Hiệp hội Tim mạch Hoa Kỳ</strong> </span>khuyến nghị bạn n&ecirc;n d&agrave;nh ra 150 ph&uacute;t tập thể dục ở cường độ vừa phải hoặc 75 ph&uacute;t tập ở cường độ cao mỗi tuần.</p>\r\n<p>Nếu bạn l&agrave;m theo khuyến nghị để tập thể dục với tốc độ vừa phải trong 150 ph&uacute;t mỗi tuần th&igrave; bạn n&ecirc;n đi bộ nhanh trong 30 ph&uacute;t mỗi ng&agrave;y, chia đều trong 5 ng&agrave;y một tuần. Nếu đi bộ trong 30 ph&uacute;t mỗi lần kh&oacute; ph&ugrave; hợp với lịch tr&igrave;nh của bạn, bạn c&oacute; thể chia b&agrave;i tập th&agrave;nh 3 lần đi bộ 10 ph&uacute;t hoặc 2 lần đi bộ 15 ph&uacute;t mỗi ng&agrave;y.</p>\r\n<h2>C&aacute;ch x&aacute;c định tốc độ khi đi bộ nhanh</h2>\r\n<h3>1. Đo nhịp tim mục ti&ecirc;u</h3>\r\n<h3>2. Đếm bước ch&acirc;n</h3>\r\n<h3>3. B&agrave;i kiểm tra n&oacute;i chuyện</h3>\r\n<p>Bạn nghĩ c&oacute; thể điều g&igrave; cần lưu &yacute; th&igrave; comment dưới nh&eacute;&nbsp;</p>', 'Đã duyệt', 1, 0, 0, 0, 1, 0, 0, '2021-07-17 16:34:58', '2021-07-17 16:34:58', 7, 4),
(21, 'Đánh giá Windows 11 Insider Preview', 'uploads/win11.png', 'congnghe win11', '<h3><strong>Đ&aacute;nh gi&aacute; Windows 11 Insider Preview c&oacute; g&igrave; mới ở phần giao diện b&ecirc;n ngo&agrave;i? (cập nhật ng&agrave;y 10/07/2021)</strong></h3>\r\n<ul>\r\n<li><strong>N&uacute;t Refresh thần th&aacute;nh đ&atilde; quay trở lại tr&ecirc;n Windows 11 Insider Preview (build 22000.65)</strong></li>\r\n</ul>\r\n<p>Ở bản build trước đ&oacute; của Windows 11 th&igrave; m&igrave;nh nhận thấy sự biến mất của n&uacute;t Refresh thần th&aacute;nh ng&agrave;y n&agrave;o n&ecirc;n m&igrave;nh cảm thấy kh&aacute; tiếc (do m&igrave;nh c&oacute; th&oacute;i quen bấm ph&iacute;m n&agrave;y). May mắn thay l&agrave; ở Windows 11 Insider Preview (build 22000.65) đ&atilde; c&oacute; sự xuất hiện của chức năng n&agrave;y. Bạn n&agrave;o hay bị ngứa tay như m&igrave;nh, muốn c&oacute; c&aacute;i click cho đỡ buồn th&igrave; giờ c&oacute; thể click rất tiện rồi nh&eacute;, Refresh c&ograve;n gi&uacute;p m&aacute;y ch&uacute;ng ta hoạt động mượt m&agrave; hơn nữa đ&oacute;.</p>\r\n<p>B&ecirc;n cạnh đ&oacute; th&igrave; menu Start ở bản cập nhật Windows 11 n&agrave;y đ&atilde; c&oacute; th&ecirc;m thanh c&ocirc;ng cụ t&igrave;m kiếm ở tr&ecirc;n c&ugrave;ng. Thế nhưng, khi m&igrave;nh nhấn v&agrave;o th&igrave; m&igrave;nh lại được dẫn sang giao diện t&igrave;m kiếm của Windows 11. Thật sự m&agrave; n&oacute;i th&igrave; c&aacute;i &ocirc; n&agrave;y hơi giống như kiểu click v&ocirc; để đổi giao diện th&ocirc;i c&aacute;c bạn ạ chứ thanh đ&oacute; kh&ocirc;ng phải l&agrave; một &ocirc; t&igrave;m kiếm thật.</p>\r\n<ul>\r\n<li><strong>Bộ phần mềm Microsoft Office đ&atilde; c&oacute; một thiết kế mới ho&agrave;n to&agrave;n</strong></li>\r\n</ul>\r\n<p>Trong nhiều năm trở lại đ&acirc;y th&igrave; Microsoft đ&atilde; dần chuyển đổi c&aacute;c yếu tố của Windows 10 sang ng&ocirc;n ngữ thiết kế Fluent design mới. Tuy nhi&ecirc;n, phải đến khi Windows 11 ra mắt th&igrave; ch&uacute;ng ta mới thấy sự &aacute;p dụng rộng r&atilde;i hơn của ng&ocirc;n ngữ thiết kế Fluent Design tr&ecirc;n giao diện hệ thống v&agrave; c&aacute;c ứng dụng gốc. Một trong số đ&oacute; ch&iacute;nh l&agrave; bộ phần mềm văn ph&ograve;ng Microsoft Office (Word, Excel, PowerPoint, OneNote, Outlook,...) với giao diện được thiết kế lại ho&agrave;n to&agrave;n, tr&ocirc;ng cực kỳ đẹp v&agrave; cuốn h&uacute;t.</p>\r\n<p>Cụ thể, m&igrave;nh thấy ở giao diện menu mới vẫn giữ những t&iacute;nh năng hiện c&oacute; nhưng tất cả c&aacute;c t&ugrave;y chọn đều sử dụng ng&ocirc;n ngữ thiết kế Fluent Design để c&oacute; t&iacute;nh đồng nhất với Windows 11. V&iacute; dụ như t&ugrave;y chọn edit, save, undo/redo, share v&agrave; nhiều t&ugrave;y chọn kh&aacute;c được l&agrave;m mới ho&agrave;n to&agrave;n. Ngo&agrave;i ra, c&aacute;c ứng dụng Office c&ograve;n c&oacute; một thanh t&igrave;m kiếm mới ở tr&ecirc;n đầu với giao diện gọn g&agrave;ng hơn v&agrave; c&aacute;c cạnh được bo tr&ograve;n. C&aacute; nh&acirc;n m&igrave;nh thấy đ&acirc;y l&agrave; lần đại tu thiết kế lớn nhất cho c&aacute;c ứng dụng Windows trong s&aacute;u năm qua v&agrave; m&igrave;nh cực kỳ th&iacute;ch sự thay đổi n&agrave;y.</p>\r\n<p>Thiết kế mới sẽ tự động được &aacute;p dụng cho bất kỳ người d&ugrave;ng n&agrave;o đ&atilde; đăng k&yacute; chương tr&igrave;nh <strong>Office insider</strong> của Microsoft. Nếu c&aacute;c bạn quan t&acirc;m đến thiết kế mới của Microsoft Office th&igrave; c&oacute; thể đăng k&yacute; v&agrave; trải nghiệm thử. M&igrave;nh c&oacute; một lưu &yacute; đ&oacute; l&agrave; c&aacute;c bạn n&ecirc;n chọn Beta channel v&agrave; tải xuống bản version 2107 Build 14228.20000 để c&oacute; được thiết kế mới của Microsoft Office.</p>', 'Đã duyệt', 2, 0, 0, 0, 4, 0, 0, '2021-07-17 16:38:37', '2021-07-17 16:38:37', 8, 6),
(22, 'Những website tổng hợp âm thanh giúp tập trung cho công việc, học tập', 'uploads/win11.png', 'hoctap amthanhtaptrung', '<p><em>&Acirc;m thanh, &acirc;m nhạc thường được gắn với &yacute; nghĩa s&ocirc;i động vui vẻ, song cũng c&oacute; những &acirc;m điệu gi&uacute;p bạn dễ c&oacute; sự tập trung cao để thực hiện c&ocirc;ng việc hay học tập.</em></p>\r\n<p>Bạn c&oacute; phải l&agrave; người rất dễ mất tập trung khi l&agrave;m việc tại những nơi qu&aacute; ồn, hoặc thậm ch&iacute; l&agrave; qu&aacute; y&ecirc;n tĩnh? Theo nhiều nghi&ecirc;n cứu, ch&uacute;ng ta thường l&agrave;m việc hiệu quả v&agrave; tập trung tốt khi xung quanh c&oacute; những &acirc;m thanh vừa phải, nhẹ nh&agrave;ng, kh&ocirc;ng cao tr&agrave;o.&nbsp;Giải ph&aacute;p l&agrave; bạn c&oacute; thể trang bị tai nghe, nhưng chưa phải l&agrave;&nbsp;tốt&nbsp;nếu bạn nghe những bản nhạc c&oacute; lời.</p>\r\n<p>Theo một&nbsp;<a href=\"http://www.jstor.org/stable/10.1086/665048#fndtn-full_text_tab_contents\">nghi&ecirc;n cứu</a>&nbsp;th&igrave; mức độ tiếng ồn xung quanh trong khoảng 50-70 Db sẽ l&agrave;m tăng hiệu suất của c&aacute;c c&ocirc;ng việc mang t&iacute;nh s&aacute;ng tạo. Ngược lại &acirc;m thanh cao hơn khoảng 85 Db sẽ l&agrave;m giảm khả năng s&aacute;ng tạo. Nghi&ecirc;n cứu cũng chỉ ra rằng mức độ tiếng ồn vừa phải sẽ l&agrave;m giảm khả năng xử l&yacute; th&ocirc;ng tin, khi đ&oacute; con người thường tăng khả năng xử l&yacute; trừu tượng,&nbsp;đ&acirc;y ch&iacute;nh l&agrave; nguy&ecirc;n nh&acirc;n dẫn đến sự s&aacute;ng tạo</p>\r\n<p>Những website dưới đ&acirc;y sẽ gi&uacute;p bạn tập trung trong c&ocirc;ng việc, tăng khả năng s&aacute;ng tạo với những &acirc;m&nbsp;thanh nhẹ nh&agrave;ng như đang&nbsp;ở ngo&agrave;i thi&ecirc;n nhi&ecirc;n. Bạn cũng c&oacute; thể thưởng thức những bản nhạc n&agrave;y khi ngồi thiền hoặc tịnh t&acirc;m.</p>\r\n<h2><span id=\"Nhung_website_am_thanh_giup_tap_trung_lam_viec_hoc_tap\"><strong>Những website &acirc;m thanh gi&uacute;p tập trung l&agrave;m việc, học tập</strong></span></h2>\r\n<h3><span id=\"1_Defonic_nghe_am_thanh_tu_thien_nhien\"><strong>1. Defonic &ndash; nghe &acirc;m thanh từ thi&ecirc;n nhi&ecirc;n:</strong></span></h3>\r\n<p>Ngay tr&ecirc;n trang chủ của&nbsp;<a href=\"http://defonic.com/\" target=\"_blank\" rel=\"noopener noreferrer\">Defonic</a>, bạn sẽ thấy 21 loại &acirc;m thanh được m&ocirc; tả bằng những biểu tượng. V&iacute; dụ như tiếng mưa, tuyết rơi, tiếng khua nước của m&aacute;i ch&egrave;o&hellip; cho đến những &acirc;m thanh nh&acirc;n tạo như tiếng tr&ograve; chuyện r&acirc;m ran trong qu&aacute;n c&agrave; ph&ecirc; hay &acirc;m thanh trong lớp học&hellip;</p>\r\n<h3><span id=\"2_NoisliVua_nghe_nhac_thien_nhien_vua_soan_van_ban\"><strong>2. Noisli&nbsp;&ndash;&nbsp;Vừa nghe nhạc thi&ecirc;n nhi&ecirc;n vừa soạn văn bản</strong></span></h3>\r\n<p><a href=\"https://www.noisli.com/\" target=\"_blank\" rel=\"noopener noreferrer\">Noisli</a>&nbsp;l&agrave; website&nbsp;kh&ocirc;ng kh&aacute;c nhiều so với Defonic trong việc cung cấp những &acirc;m thanh từ thi&ecirc;n nhi&ecirc;n, cho ph&eacute;p bạn s&aacute;ng tạo bản mix v&agrave; tăng giảm &acirc;m lượng. Ngay giao diện trang chủ l&agrave; c&aacute;c biểu tượng hiển thị cho từng loại &acirc;m thanh:&nbsp;tiếng mưa rơi, tiếng sấm chớp, tiếng nước chảy, l&aacute; rơi, lửa ch&aacute;y v&agrave; cả &acirc;m thanh x&igrave; x&agrave;o như trong qu&aacute;n c&agrave; ph&ecirc;&hellip;</p>\r\n<h3><span id=\"3_Coffitivity_Khong_gian_quan_ca_phe_ngay_tai_nha_ban\"><strong>3. Coffitivity &ndash; Kh&ocirc;ng gian qu&aacute;n c&agrave; ph&ecirc; ngay tại nh&agrave; bạn:</strong></span></h3>\r\n<p><a href=\"https://coffitivity.com/\" target=\"_blank\" rel=\"noopener noreferrer\">Coffitivity</a>&nbsp;như một cứu c&aacute;nh cho hội những người th&iacute;ch ngồi l&agrave;m việc ở qu&aacute;n c&agrave; ph&ecirc; nhưng kh&ocirc;ng phải l&uacute;c n&agrave;o cũng được như &yacute; muốn.&nbsp;Đ&acirc;y l&agrave; trang web t&aacute;i tạo lại &acirc;m thanh của một qu&aacute;n c&agrave; ph&ecirc; để đạt được sự kết hợp ho&agrave;n hảo của tĩnh v&agrave; động. N&oacute; sẽ gi&uacute;p bạn khơi dậy được d&ograve;ng cảm hứng s&aacute;ng tạo khi bạn kh&ocirc;ng cảm thấy bị mắc kẹt hay l&agrave;m phiền.</p>\r\n<h3><span id=\"4_Calm_Thu_gian_tuc_thi_trong_2_phut\">4. Calm&nbsp;&ndash; Thư gi&atilde;n tức th&igrave; trong 2 ph&uacute;t</span></h3>\r\n<p><a href=\"https://www.calm.com/\" target=\"_blank\" rel=\"noopener noreferrer\">Calm</a>&nbsp;l&agrave; website c&oacute; lối thiết kế giao diện đơn giản, nhẹ nh&agrave;ng với m&agrave;u xanh chủ đạo, bạn sẽ dễ lạc v&agrave;o kh&ocirc;ng gian rộng lớn của thi&ecirc;n nhi&ecirc;n v&agrave; chỉ muốn ho&agrave; m&igrave;nh ngay v&agrave;o cảnh vật đ&oacute;.&nbsp;Điều đặc biệt của Calm ch&iacute;nh l&agrave; chức năng &ldquo;Take a Meditation Break&rdquo; (Thư gi&atilde;n nhanh) ở g&oacute;c tr&aacute;i, bạn c&oacute; thể điều chỉnh thời gian bạn muốn để thư gi&atilde;n giữa giờ l&agrave;m việc. Ngo&agrave;i ra, bạn c&ograve;n được lựa chọn thư gi&atilde;n theo &ldquo;Guide&rdquo;&nbsp;(hướng dẫn thư gi&atilde;n với giọng n&oacute;i) hoặc &ldquo;Timer Only&rdquo; (đếm l&ugrave;i thời gian).</p>', 'Đã duyệt', 2, 0, 0, 0, 3, 0, 0, '2021-07-17 16:42:18', '2021-07-17 16:42:18', 8, 7),
(0, 'TOP 5 WEBSITE LUYỆN THI TOEIC ONLINE MIỄN PHÍ TỐT NHẤT!', 'uploads/toeic24hpng.png', 'hoctap toeic toeicfree', '<p>Một số trang tự &ocirc;n tập v&agrave; luyện thi tiếng anh m&agrave; bạn n&ecirc;n biết:&nbsp;</p>\r\n<ol>\r\n<li>https://toeic24.vn/</li>\r\n<li>https://www.e2school.com/</li>\r\n<li>https://tienganhmoingay.com/de-thi-toeic/lam-de-thi-thu-toeic/</li>\r\n</ol>\r\n<p>Hi vọng những trang web tr&ecirc;n hữu &iacute;ch với bạn.</p>', 'Đã duyệt', 0, 0, 0, 0, 4, 0, 0, '2021-07-17 16:49:36', '2021-07-17 16:49:36', 8, 7),
(23, 'Cách quản lý tài chính cá nhân HIỆU QUẢ như thế nào?', 'uploads/taichinh1.jpg', 'taichinh quanlytaichinh', '<h2><strong>Quản l&yacute; t&agrave;i ch&iacute;nh c&aacute; nh&acirc;n hiệu quả</strong></h2>\r\n<p><strong>Quản l&yacute; t&agrave;i ch&iacute;nh c&aacute; nh&acirc;n</strong>&nbsp;hiệu quả kh&ocirc;ng phải l&agrave; c&ocirc;ng việc đơn giản, kh&ocirc;ng thể thực hiện ng&agrave;y một ng&agrave;y hai m&agrave; th&agrave;nh c&ocirc;ng. Tuy nhi&ecirc;n, bạn c&oacute; thể bắt đầu từ những bước nhỏ nhất, đơn giản nhất. Đ&oacute; l&agrave; tập th&oacute;i quen ghi ch&eacute;p lại c&aacute;c chi ph&iacute; m&igrave;nh đ&atilde; sử dụng mỗi ng&agrave;y. Mục ti&ecirc;u của việc n&agrave;y l&agrave; để cuối ng&agrave;y bạn c&oacute; thể tổng kết lại v&agrave; ph&acirc;n bố lại chi ti&ecirc;u một c&aacute;ch hợp l&yacute; hơn.</p>\r\n<p>Bước đầu tập quản l&yacute; t&agrave;i ch&iacute;nh c&oacute; thể l&agrave; sẽ kh&aacute; kh&oacute; khăn, v&igrave; bạn đang trong một lối sống kh&aacute; tự do, ti&ecirc;u pha kh&ocirc;ng suy nghĩ nhiều. Ch&iacute;nh v&igrave; thế m&agrave; bạn cần thực hiện việc quản l&yacute; t&agrave;i ch&iacute;nh mỗi ng&agrave;y, v&igrave; dần dần n&oacute; sẽ tạo th&agrave;nh một th&oacute;i quen tốt v&agrave; c&oacute; &iacute;ch cho bạn.&nbsp;</p>\r\n<p>B&ecirc;n cạnh đ&oacute;, việc xem x&eacute;t v&agrave; t&iacute;nh to&aacute;n chi ti&ecirc;u mỗi ng&agrave;y sẽ gi&uacute;p bạn dễ d&agrave;ng hơn trong việc c&acirc;n đối v&agrave; quản l&yacute; chi ti&ecirc;u lại sao cho ph&ugrave; hợp với những kế hoạch m&agrave; m&igrave;nh đ&atilde; lập ra. C&oacute; như thế th&igrave; việc quản trị t&agrave;i ch&iacute;nh c&aacute; nh&acirc;n hiệu quả v&agrave; l&acirc;u d&agrave;i.&nbsp;</p>', 'Đã duyệt', 0, 0, 0, 0, 1, 0, 0, '2021-07-17 16:50:50', '2021-07-17 16:50:50', 8, 5),
(24, 'Những kỷ lục độc lạ của thế giới tự nhiên năm 2020', 'uploads/12.png', 'thiennhien kyluc', 'Chim bay xa nhất thế giới\r\n\r\nMùa thu năm nay, chim godwit (tên khoa học: Limosa lapponica) - một loại chim dẽ đuôi có sọc - phá kỷ lục thế giới về chuyến bay thẳng dài nhất. Chim đặc trưng với kích thước to, mỏ dài, màu gỉ sắt và khả năng bay đường trường ấn tượng.\r\n\r\nNgày 16-9-2020, một chú chim godwit xuất phát từ tây nam Alaska (Mỹ), bay trong 11 ngày liền không nghỉ để tới New Zealand. Tổng quãng đường chim bay là 12.200km.\r\n\r\nKỷ lục trước đó được nắm giữ bởi một con chim godwit khác, vượt qua quãng đường 11.500km từ New Zealand đến Hàn Quốc và Trung Quốc. Chim bay liên tục trong 9 ngày.', 'Đã duyệt', 1, 0, 0, 0, 1, 0, 0, '2021-07-17 18:34:20', '2021-07-17 18:34:20', 11, 1),
(25, 'Chìa khóa để nói tiếng Anh xuất sắc', 'uploads/1.png', 'speaking english', 'Kỹ năng tiếng Anh nào là quan trọng nhất? \r\nKỹ năng nào giúp bạn giao tiếp tiếng Anh tốt?\r\nĐương nhiên, Lưu loát là quan trọng nhất… Thế nào là lưu loát ?\r\nLưu loát là khả năng nói và hiểu tiếng Anh một cách nhanh chóng và dễ dàng...KHÔNG cần dịch sang Tiếng Việt. Lưu loát cũng đồng nghĩa với việc bạn có thể nói chuyện với người bản xứ một cách dễ dàng. Họ hiểu bạn và bạn cũng hiểu họ dễ dàng. Nói một cách khác đó là, bạn nói và hiểu tiếng Anh ngay lập tức.Sự lưu loát là mục tiêu quan trong nhất trong tiếng Anh.\r\nCác nghiên cứu cho thấy. Chỉ có MỘT cách để đạt được sự lưu loát trong nói tiếng Anh. Bạn không thể nói lưu loát bằng cách đọc sách. Bạn không thể nói lưu loát bằng cách đi học tiếng Anh ở trường. Bạn không thể nói tiếng Anh lưu loát bằng cách học giỏi văn phạm.\r\nNGHE CHÍNH LÀ CHÌA KHÓA', 'Đã duyệt', 2, 2, 5, 2, 9, 0, 0, '2021-07-17 17:45:46', '2021-07-17 17:45:46', 11, 2),
(26, 'Tâm lý học thuyết phục', 'uploads/2.png', 'tamly tamlyhoc', 'Thuyết phục là một trong những cách để bạn có thể dễ dàng đạt được mục tiêu.\r\nNhưng để có thể thuyết phục người khác không phải điều dễ dàng. Khi bạn có thể quản lý cảm xúc, ý nghĩ của mình và thấu hiểu ý nghĩ của đối phương thì khả năng thuyết phục thành công sẽ cao hơn.\r\nNâng cao khả năng thuyết phục của bản thân trong công việc, cuộc sống hay trong các mối quan hệ là điều vô cùng cần thiết.', 'Đã duyệt', 2, 0, 4, 1, 1, 0, 0, '2021-07-17 17:50:53', '2021-07-17 17:50:53', 11, 3),
(27, 'Vượt qua rối loạn tâm lý', 'uploads/3.png', 'tamly tamlyhoc', 'Nuôi con chính là một bản năng của mẹ.\r\nNhưng bất kỳ ai cũng mong muốn con yêu phát triển khỏe mạnh và thông minh.\r\nĐể có được điều này các bà mẹ cần tìm ra phương pháp để tương tác với con phù hợp nhất.\r\nMẹ vượt qua được những khủng hoảng của chính mình cũng là cách để giúp con không gặp các vấn đề rối loạn tâm lý ở từng giai đoạn.\r\nCon tự tin và tự lập hơn để có thể phát triển tốt nhất. Khóa học này chính là cách để mỗi gia đình đều có thể nắm bắt phương pháp nuôi dạy con phù hợp.\r\nThấu hiểu con chính là cách giúp giải quyết các vấn đề mà mọi gia đình đều gặp phải giữa cha mẹ và con cái.', 'Đã duyệt', 1, 0, 0, 0, 0, 0, 0, '2021-07-17 17:53:23', '2021-07-17 17:53:23', 11, 3),
(28, 'Tâm lý học qua ngôn ngữ cơ thể', 'uploads/4.png', 'tamly tamlyhoc ngonngu', 'Giải mã ngôn ngữ cơ thể là cách hiệu quả để có thể nâng cao khả năng giao tiếp. Việc phán đoán đối phương cũng sẽ trở nên chính xác hơn.\r\nKhóa học này giúp bạn phân tích cả những cử chỉ nhỏ nhất trên cơ thể. Từ đó có hiểu được điều mà đối phương muốn biểu đạt.\r\nNhư vậy bạn sẽ có được cách ứng xử phù hợp nhất. Mỗi dấu hiệu cơ thể trong khi giao tiếp đều thể hiện một ý nghĩa. Hiểu được và ứng xử đúng cách sẽ giúp tạo thiện cảm và bạn sẽ được yêu quý nhiều hơn.', 'Đã duyệt', 2, 0, 5, 1, 2, 0, 0, '2021-07-17 17:55:42', '2021-07-17 17:55:42', 11, 3),
(29, 'Cách Phòng Tránh Bạo hành Bằng Lời Nói', 'uploads/5.png', 'tamly tamlyhoc baohanh', 'Bạo hành bằng lời nói là cách tấn công, khủng bố, gây tổn thương đối phương bằng lời nói hoặc sự im lặng thờ ơ. Bạo hành bằng lời nói được biểu thị dưới nhiều hình thức khác nhau từ việc huênh hoang quá mức cần thiết đến các các hành vi gây hấn thụ động.\r\nCác dạng thức phổ biến của Bạo hành bằng lời nói bao gồm việc cố ý tiết lộ thông tin suy nghĩ cảm nhận của người khác; phản bác lại các suy nghĩ trải nghiệm của đối phương; đổ lỗi đối phương về những việc ngoài ý muốn; dùng những lời lẽ miệt thị để chỉ trích người khác, gọi họ là thằng đần, lũ trẻ trâu, kẻ cơ hội.', 'Đã duyệt', 2, 0, 0, 0, 0, 0, 0, '2021-07-17 17:59:21', '2021-07-17 17:59:21', 11, 3),
(30, 'Khi Tâm Lý Hành Vi Bị Ảnh Hưởng Bởi Môi Trường Sống', 'uploads/6.png', 'tamly tamlyhoc hanhvi', 'Vào đầu thập niên 70, một nhóm các nhà nghiên cứu tại Mỹ đã thả hàng trăm lá thư đã dán tem, ghi địa chỉ vào khu ký túc xá dọc Bờ Đông và ghi chép lại số lượng những lá thư đi lạc được đem trả lại hòm thư chính xác. Các nhà nghiên cứu cho rằng việc gửi lại lá thư đến đúng địa chỉ là một hành động nhỏ cho thấy tấm lòng lương thiện và khám phá ra một điều: sinh viên ở một số tòa nhà cư xử tử tế hơn số còn lại.\r\nGần như tất cả số thư được thả xung quanh khi ký túc vắng người – nơi mà mỗi tầng chỉ có khoảng vài sinh viên sống – được mang tới đúng địa chỉ. Trái lại, chỉ khoảng 6/10 số thư được thả gần khu kí túc đông người đến được tay người nhận.\r\nRõ ràng, sinh viên sống ở nơi đông đúc hơn, nơi mọi người gần gũi với nhau hơn lại ít quan tâm hơn tới bạn học của mình, và việc này rõ ràng làm giảm lòng rộng lượng của họ. ', 'Đã duyệt', 2, 1, 4.5, 2, 5, 0, 0, '2021-07-17 18:00:37', '2021-07-17 18:00:37', 11, 3),
(31, 'Sự tươi đẹp kỳ bí của thiên nhiên.', 'uploads/7.png', 'thiennhien tunhien', 'Khi con người ta đã quá quen thuộc với bộn bề cao ốc, khói bụi xe cộ... thì trong sâu thẳm trong thâm tâm đều mong muốn được về với thiên nhiên – một nơi không có khói bụi, ồn ào mà chỉ có ánh nắng ban mai rọi xuống chồi non đang hé mở, giọt sương đêm còn đọng lại trên mặt lá long lanh, gió vi vu thổi nhẹ trong lành khiến tâm hồn ta như được buông bỏ muộn phiền, đem đến cảm giác bình yên đến lạ!', 'Đã duyệt', 2, 0, 4, 1, 3, 0, 0, '2021-07-17 18:04:04', '2021-07-17 18:04:04', 11, 1),
(32, 'Thiên nhiên bận rộn lắm!', 'uploads/8.png', 'thiennhien tunhien thoigian', 'Trên con đường đầy nắng, ta luôn hối hả tìm cho mình một bóng râm chật hẹp để nép vào. Thiên nhiên bận rộn lắm, đâu dư thời gian để an ủi nhiều ngày.', 'Đã duyệt', 2, 1, 4, 1, 2, 0, 0, '2021-07-17 18:05:00', '2021-07-17 18:05:00', 11, 1),
(33, 'Vị thiên nhiên', 'uploads/9.png', 'thiennhien vithiennhien', 'Không thể nếm trải vị của thiên nhiên là hoang phí cả một đời người.', 'Đã duyệt', 2, 1, 3, 1, 2, 0, 0, '2021-07-17 18:06:00', '2021-07-17 18:06:00', 11, 1),
(34, 'Thơ hay sưu tầm', 'uploads/11.png', 'thoca thiennhien', 'Xin...ta được làm chim \r\nBay thăm vùng đỉnh núi\r\nNơi văn minh từ chối\r\nSự sống là mồ hôi !\r\n\r\nBàn tay vạch núi đồi\r\nBuộc núi trồi lương thực\r\nNhốt thiên nhiên vào ngực\r\nChưa từng biết bon chen !\r\n\r\nMặt trời hóa thân quen\r\nNúi rừng là bằng hữu\r\nChê khen không màng tới\r\nCòn gì hạnh phúc hơn !\r\n', 'Đã duyệt', 2, 1, 4, 1, 3, 0, 0, '2021-07-17 18:08:01', '2021-07-17 18:08:01', 11, 2);

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

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`settingID`, `userID`, `email`, `Notification`, `AutoBrowsing`) VALUES
(1, 2, 'kieuvandoanit@gmail.com', 0, 0);

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
(1, 'kieuvandoan', 'kieuvandoanit@gmail.com', 'abc', 2),
(2, 'admin', 'kieuvandoanit@gmail.com', 'a', 1),
(3, 'ngocduyen', 'vtn.duyen1509@gmail.com', 'abc123', 2),
(4, 'minhanh', 'minhanh@gmail.com', 'ma1234.', 2),
(5, 'HoaNguyen', 'nguyenn.hoa@gmail.com', 'nh3399', 2),
(6, 'KhoaLe', 'ledangkhoa@gmail.com', 'kl12345', 2),
(7, 'lekhacduong', 'duonglee2311@gmail.com', '123456', 2),
(8, 'chubatgioi', 'leedaeyang1@gmail.com', '123456', 2),
(9, 'limyoona', 'bubeo93@yahoo.com', '123456', 2),
(10, 'thuonghoai', 'th@gmail.com', '1712452', 2),
(11, 'hoai', 'thuonghoai080499@gmail.com', '1', 2);

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

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`Profile_id`, `Avatar`, `Name`, `gender`, `Phone`, `Email`, `address`, `PostAmount`, `CommentAmount`, `User_id`, `Level_id`, `point`) VALUES
(2, 'uploads/1.jpg', 'Kiều Văn Đoàn', 'Nam', '975908445', 'kieuvandoanit@gmail.com', '0', 14, 1, 1, 2, 96),
(1, 'https://icdn.dantri.com.vn/thumb_w/640/2020/08/30/diem-danh-nhung-guong-mat-hot-girl-noi-bat-trong-thang-8-docx-1598788426579.jpeg', 'Nguyễn Văn Toàn', 'Nam', '95483728', 'kieuvandoanit@gmail.com', '', 0, 0, 2, 1, 0),
(7, 'uploads/lekhacduong.jpg', 'dương', 'Nam', '0935304235', 'duonglee2311@gmail.com', 'Gia Lai', 2, 0, 7, 1, 5),
(3, '', 'Vo Thi Ngoc Duyen', 'Nữ', '0798117960', 'vtn.duyen1509@gmail.com', 'long thanh, dong nai', 8, 0, 3, 1, 25),
(4, '', 'Vo Minh Anh', 'Nữ', '0123456789', 'minhanh@gmail.com', '', 0, 0, 4, 1, 0),
(5, '', 'Nguyen Ngoc Hoa', 'Nữ', '0909337333', 'nguyenn.hoa@gmail.com', '', 0, 0, 5, 1, 0),
(6, '', 'Le Dang Anh Khoa', 'Nam', '0986666222', 'ledangkhoa@gmail.com', '', 0, 0, 6, 1, 0),
(8, 'uploads/chubatgioi.jpg', 'chư ngộ tĩnh', 'Nam', '01626364866', 'leedaeyang1@gmail.com', 'Tp.HCM', 4, 0, 8, 1, 20),
(9, '', 'Lim yoona', 'Nữ', '+84654315697', 'bubeo93@yahoo.com', 'Korean', 0, 7, 9, 1, 14),
(10, 'uploads/park-min-young-la-ai-a240dbcb.jpg', 'Lê Hận Thương Hoài', 'Nữ', '0327173941', 'thuonghoai080499@gmail.com', '', 12, 5, 11, 1, 60),
(11, 'uploads/1.png', 'Thương Hoài', 'Nữ', '0327173941', 'th@gmail.com', '', 0, 1, 10, 1, 2);

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
  `votingID` int(11) UNSIGNED NOT NULL,
  `PostID` int(11) UNSIGNED NOT NULL,
  `Member_id` int(11) UNSIGNED NOT NULL,
  `Rate` enum('1 sao','2 sao','3 sao','4 sao','5 sao') COLLATE utf8_unicode_ci DEFAULT '5 sao',
  `CreatedDate` datetime DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`votingID`, `PostID`, `Member_id`, `Rate`, `CreatedDate`) VALUES
(33, 7, 1, '1 sao', '2021-06-26 18:30:22'),
(2, 1, 1, '2 sao', '2021-07-17 10:26:40'),
(3, 1, 1, '2 sao', '2021-07-17 10:26:43'),
(4, 1, 1, '5 sao', '2021-07-17 10:26:45'),
(32, 4, 1, '1 sao', '2021-06-26 18:06:58'),
(6, 1, 1, '5 sao', '2021-07-17 10:26:48'),
(31, 4, 1, '3 sao', '2021-06-26 18:06:54'),
(8, 1, 1, '1 sao', '2021-07-17 10:26:50'),
(9, 1, 1, '1 sao', '2021-07-17 10:26:55'),
(10, 1, 1, '1 sao', '2021-07-17 10:26:57'),
(11, 1, 1, '1 sao', '2021-07-17 10:27:00'),
(12, 1, 1, '1 sao', '2021-07-16 10:27:02'),
(13, 1, 1, '1 sao', '2021-07-14 10:27:05'),
(14, 1, 1, '1 sao', '2021-07-14 10:27:08'),
(15, 5, 1, '1 sao', '2021-07-13 10:27:10'),
(16, 5, 1, '5 sao', '2021-07-08 10:27:13'),
(17, 5, 1, '2 sao', '2021-07-08 10:27:15'),
(18, 6, 1, '1 sao', '2021-07-14 10:27:17'),
(19, 6, 1, '3 sao', '2021-07-09 10:27:20'),
(20, 6, 1, '5 sao', '2021-07-07 10:27:23'),
(21, 6, 1, '5 sao', '2021-07-07 10:27:25'),
(22, 6, 1, '1 sao', '2021-07-06 10:27:27'),
(23, 6, 1, '5 sao', '2021-07-12 10:27:29'),
(24, 6, 1, '5 sao', '2020-07-16 10:27:33'),
(25, 6, 1, '5 sao', '2021-07-15 10:27:40'),
(26, 6, 1, '2 sao', '2021-07-08 10:27:42'),
(27, 6, 1, '3 sao', '2021-07-08 10:27:44'),
(1, 6, 1, '4 sao', '2021-07-15 10:27:46'),
(29, 6, 1, '3 sao', '0000-00-00 00:00:00'),
(30, 3, 1, '2 sao', '2021-06-26 18:04:27'),
(34, 8, 1, '2 sao', '2021-06-27 18:19:39'),
(35, 9, 1, '2 sao', '2021-06-28 10:10:09'),
(36, 27, 1, '2 sao', '2021-07-10 16:21:27'),
(37, 39, 1, '1 sao', '2021-07-12 11:39:34'),
(43, 41, 1, '1 sao', '2021-07-16 15:45:54'),
(44, 19, 9, '4 sao', '2021-07-17 22:59:11'),
(45, 14, 9, '5 sao', '2021-07-17 23:02:40'),
(46, 13, 9, '4 sao', '2021-07-17 23:03:12'),
(47, 12, 9, '5 sao', '2021-07-17 23:03:17'),
(48, 11, 9, '4 sao', '2021-07-17 23:04:14'),
(49, 10, 9, '3 sao', '2021-07-17 23:04:46'),
(50, 24, 11, '5 sao', '2021-07-17 18:17:33'),
(51, 33, 11, '4 sao', '2021-07-17 18:19:23'),
(52, 29, 11, '5 sao', '2021-07-17 18:21:20'),
(53, 32, 11, '3 sao', '2021-07-17 18:22:01'),
(54, 31, 10, '4 sao', '2021-07-17 18:56:13'),
(55, 25, 10, '4 sao', '2021-07-17 18:56:27'),
(56, 24, 10, '5 sao', '2021-07-17 18:56:43'),
(57, 27, 10, '5 sao', '2021-07-17 18:56:52'),
(58, 30, 10, '4 sao', '2021-07-17 18:57:04'),
(59, 29, 10, '4 sao', '2021-07-17 18:57:43');

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