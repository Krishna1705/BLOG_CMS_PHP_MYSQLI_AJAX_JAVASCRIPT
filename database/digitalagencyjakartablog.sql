-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 05:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalagencyjakartablog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `post_id`, `comment_text`, `email`, `status`) VALUES
(35, 20, 'nice blog ', 'krishupatel19@gmail.com', 1),
(36, 23, 'this is technical blog', 'ridpatel2907@gmail.com', 1),
(37, 30, 'must visit sentara for knee pain and replacement surgery.', 'vd11@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `feature_image` varchar(200) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `feature_image`, `view`) VALUES
(20, '20HT NEW BLOG POST TITLE', '<p>20HT NEW BLOG POST CONTENT</p>\r\n', '', 'ss_acne.png', 39),
(21, '21 BLOG TITLE HERE-AGE REVERSAL TREATMENT', '<p>21 BLOG CONTENT -</p>\r\n\r\n<p>age reversal treatmentage reversal treatmentage reversal treatmentage reversal treatmentage reversal treatmentage reversal treatment</p>\r\n', '', 'ss_age_reversal_NEW.png', 17),
(22, '22 new blog title-skin health', '<p>22 new blog title-skin health.22 new blog title-skin health.22 new blog title-skin health.22 new blog title-skin health.</p>\r\n', '', 'ss_self care.png', 16),
(23, '23-technical blog', '<p>technical blog.technical blog.technical blog.technical blog.technical blog.technical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blogtechnical blog</p>\r\n', '', 'Screenshot (1).png', 7),
(26, 'covid-19', '<h2><strong>Coronavirus disease (COVID-19)</strong> <strong>is an infectious disease caused by a newly discovered coronavirus.</strong></h2>\r\n\r\n<p>Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.&nbsp; Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.</p>\r\n\r\n<p>The best way to prevent and slow down transmission is be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face.&nbsp;</p>\r\n\r\n<p>The COVID-19 virus spreads primarily through droplets of saliva or discharge from the nose when an infected person coughs or sneezes, so it&rsquo;s important that you also practice respiratory etiquette (for example, by coughing into a flexed elbow).</p>\r\n\r\n<p>At this time, there are no specific vaccines or treatments for COVID-19. However, there are many ongoing clinical trials evaluating potential treatments. WHO will continue to provide updated information as soon as clinical findings become available.</p>\r\n', '', 'corona.jpg', 37),
(30, 'new demo', '<p>this is demo artical.regarding knee pain.</p>\r\n', '', '82609172_516157522362854_8622543207776911360_o.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(3, 'krishupatel19@gmail.com', 'Krishna Patel', '$2y$10$E5raxOkL1m0eFiAnbQL/B.SFceHnqhGbuxIZg5.nkWLEQZjY1UYui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
