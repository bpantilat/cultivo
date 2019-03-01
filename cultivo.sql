-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2019 at 08:35 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cultivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(15) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `username`, `image`, `email`, `password`, `created`) VALUES
(1, 'Admin', 'Cultiva', 'admin.cultiva', 'admin.png', 'admin@gmail.com', 'admin', '2019-02-20 14:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `blog_portfolio`
--

CREATE TABLE `blog_portfolio` (
  `id` int(11) NOT NULL,
  `context` varchar(255) DEFAULT NULL,
  `bold_title` varchar(255) NOT NULL,
  `blog_text` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_portfolio`
--

INSERT INTO `blog_portfolio` (`id`, `context`, `bold_title`, `blog_text`, `image`, `type`, `created`, `status`) VALUES
(109, 'Considerations of Context1', 'Capitalize on low hanging fruit to identify a ballpark case.1', '<p>xc</p>\n', '16807020_1829284517334523_6606573957403852868_n_20190221_113657.jpg', 'blog', '2019-02-27 05:08:07', 1),
(110, 'Considerations of Context', 'I realy think this could go viral it needs to be the same.', '', 'img-02.jpg', 'blog', '2019-02-20 20:29:10', 1),
(111, 'Considerations of Context', 'I realy think this could go viral it needs to be the same.', '', 'img-02.jpg', 'blog', '2019-02-20 20:29:10', 0),
(112, 'Considerations of Context', 'Capitalize on low hanging fruit to identify a ballpark case.', '', 'img-02.jpg', 'blog', '2019-02-20 20:29:10', 1),
(113, '', 'xS', '', '35779276_10211872558876088_3414906987853381632_n_20190221_193007.jpg', 'portfolio', '2019-02-27 09:44:29', 1),
(114, NULL, 'We bridge the gap between mentorship and mentees', '', 'img-01.jpg', 'portfolio', '2019-02-20 20:39:42', 1),
(115, NULL, 'We bridge the gap between mentorship and mentees', '', 'img-02.jpg', 'portfolio', '2019-02-20 20:39:42', 1),
(116, NULL, 'We bridge the gap between mentorship and mentees', '', 'img-03.jpg', 'portfolio', '2019-02-20 20:39:42', 1),
(117, NULL, 'We bridge the gap between mentorship and mentees', '', 'img-04.jpg', 'portfolio', '2019-02-20 20:39:42', 1),
(118, NULL, 'We bridge the gap between mentorship and mentees', '', 'img-05.jpg', 'portfolio', '2019-02-20 20:39:42', 1),
(119, NULL, 'We bridge the gap between mentorship and mentees', '', 'img-06.jpg', 'portfolio', '2019-02-20 20:39:43', 1),
(120, NULL, 'We bridge the gap between mentorship and mentees', '', 'img-01.jpg', 'portfolio', '2019-02-20 20:39:43', 1),
(154, NULL, 'nb', '', '35779276_10211872558876088_3414906987853381632_n_20190221_184254.jpg', 'portfolio', '2019-02-21 13:42:53', 1),
(155, NULL, 'sad', '', '35779276_10211872558876088_3414906987853381632_n_20190221_184404.jpg', 'portfolio', '2019-02-21 13:44:03', 1),
(156, 'test', 'test', '', '35779276_10211872558876088_3414906987853381632_n_20190225_063347.jpg', 'blog', '2019-02-25 01:33:42', 1),
(157, 'testtest', 'test', '[object HTMLTextAreaElement]', '35779276_10211872558876088_3414906987853381632_n_20190225_071745.jpg', 'blog', '2019-02-25 02:17:45', 1),
(158, 'test', 'test', '[object HTMLTextAreaElement]', 'telcirkel_20190225_073118.jpg', 'blog', '2019-02-25 02:31:18', 1),
(159, 'test', 'test', '[object HTMLTextAreaElement]', '35779276_10211872558876088_3414906987853381632_n_20190225_074050.jpg', 'blog', '2019-02-25 02:40:49', 1),
(160, 'test', 'testtse', '[object HTMLTextAreaElement]', '35779276_10211872558876088_3414906987853381632_n_20190225_074130.jpg', 'blog', '2019-02-25 02:41:30', 1),
(161, 'sdf', 'dsf', 'd', '35779276_10211872558876088_3414906987853381632_n_20190225_074951.jpg', 'blog', '2019-02-25 02:49:51', 1),
(162, 'ad', 'ad', 'asd\n', '35779276_10211872558876088_3414906987853381632_n_20190225_075645.jpg', 'blog', '2019-02-25 02:56:45', 1),
(163, 'test', 'test', 'test\n', '35779276_10211872558876088_3414906987853381632_n_20190225_075835.jpg', 'blog', '2019-02-25 02:58:35', 1),
(164, 'test', 'test', 'test\n', '35779276_10211872558876088_3414906987853381632_n_20190225_075917.jpg', 'blog', '2019-02-25 02:59:17', 1),
(165, 'test', 'tes', '<p><strong>test <em>test</em></strong></p>\n', '35779276_10211872558876088_3414906987853381632_n_20190225_080045.jpg', 'blog', '2019-02-25 03:00:45', 1),
(166, 'test', 'test', '<p>test</p>\n', 'telcirkel_20190227_095154.jpg', 'blog', '2019-02-27 04:51:54', 1),
(167, 'test', 'test', '<p>&nbsp;</p>\n\n<p>test</p>\n\n<p>test</p>\n', 'telcirkel_20190227_095226.jpg', 'blog', '2019-02-27 04:53:57', 1),
(168, 'tesr', 'ds', '<p>sd</p>\n', '35779276_10211872558876088_3414906987853381632_n_20190227_103253.jpg', 'blog', '2019-02-27 05:32:53', 1),
(169, 'ab', 'ab', '<p>ab</p>\n', 'xKgn6479_20190227_103403.jpg', 'blog', '2019-02-27 05:34:03', 1),
(170, 'abc', 'abc', '<p>abc</p>\n', 'telcirkel_20190227_103938.jpg', 'blog', '2019-02-27 05:39:38', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tag_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `id`, `created`, `tag_name`) VALUES
(3, 114, '2019-02-20 17:59:57', 'test'),
(4, 114, '2019-02-20 18:00:02', 'test'),
(5, 114, '2019-02-20 18:01:13', 'test'),
(6, 115, '2019-02-20 18:02:17', 'test'),
(7, 115, '2019-02-21 11:59:35', 'test'),
(8, 116, '2019-02-21 12:03:48', 'test'),
(9, 116, '2019-02-21 12:04:33', 'test'),
(10, 117, '2019-02-21 12:04:55', 'Colorado Media Porject'),
(11, 117, '2019-02-21 12:08:38', 'Colorado Media Porject'),
(12, 118, '2019-02-21 12:10:25', 'Colorado Media Porject'),
(13, 118, '2019-02-21 12:11:28', 'Colorado Media Porject'),
(14, 119, '2019-02-21 12:13:19', 'Colorado Media Porject'),
(15, 119, '2019-02-21 12:13:49', 'Colorado Media Porject'),
(16, 120, '2019-02-21 12:16:44', 'Prototyping'),
(17, 131, '2019-02-21 12:18:50', 'Prototyping'),
(18, 132, '2019-02-21 12:32:07', 'Prototyping'),
(19, 133, '2019-02-21 12:33:33', 'Prototyping'),
(20, 134, '2019-02-21 12:33:50', 'Prototyping'),
(21, 151, '2019-02-21 13:16:15', 'Prototyping'),
(22, 120, '2019-02-21 13:16:15', 'Colorado Media Porject'),
(23, 152, '2019-02-21 13:17:27', 'test1'),
(24, 23, '2019-02-21 13:17:27', 'test 2'),
(25, 153, '2019-02-21 13:19:23', 'Colorado Media Porject'),
(26, 153, '2019-02-21 13:19:23', 'test1as'),
(27, 154, '2019-02-21 18:42:54', 'Prototyping'),
(28, 154, '2019-02-21 18:42:54', 'Colorado Media Porject'),
(29, 155, '2019-02-21 18:44:04', 'Prototyping'),
(30, 155, '2019-02-21 18:44:04', 'Colorado Media Porject'),
(88, 0, '2019-02-21 19:27:23', 'test'),
(89, 0, '2019-02-21 19:27:23', 'test'),
(100, 113, '2019-02-27 14:35:47', 'test1'),
(102, 113, '2019-02-27 14:44:30', 'ABC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_portfolio`
--
ALTER TABLE `blog_portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_portfolio`
--
ALTER TABLE `blog_portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
