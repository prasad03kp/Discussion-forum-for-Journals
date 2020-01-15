-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2019 at 09:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disc_forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `discussion_forum`
--

CREATE TABLE `discussion_forum` (
  `id` int(11) NOT NULL,
  `doi` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_forum`
--

INSERT INTO `discussion_forum` (`id`, `doi`, `username`, `message`, `time`) VALUES
(1, '546231', 'shravan', 'How to analyse the things', '2019-11-29 19:42:40'),
(2, '546231', 'shravan', 'You have to analyse the situation', '2019-11-29 19:58:36'),
(3, '9876230', 'shravan', 'How to train model accurately', '2019-11-29 20:01:25'),
(4, '9876230', 'devpavan09', 'You have to use adam optimizer', '2019-11-29 20:07:48'),
(5, '546231', 'devpavan09', 'and you have to go through all the life cycles', '2019-11-29 20:08:56'),
(6, '987654', 'devpavan09', 'any improvements can be done on this research topic are welcome', '2019-11-29 20:09:53'),
(7, '201901', 'shravan', 'How does neural network works?', '2019-11-29 20:49:09'),
(8, '201901', 'devpavan09', 'Image result for how does neural network works?www.quora.com The Artificial Neural Network receives the input signal from the external world in the form of a pattern and image in the form of a vector. ... Each of the input is then multiplied by its corres', '2019-11-29 20:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `doi_paper`
--

CREATE TABLE `doi_paper` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `doi` varchar(255) DEFAULT NULL,
  `paper` varchar(255) DEFAULT NULL,
  `yop` varchar(255) DEFAULT NULL,
  `journal_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doi_paper`
--

INSERT INTO `doi_paper` (`id`, `username`, `doi`, `paper`, `yop`, `journal_type`) VALUES
(1, 'kp', '12345', '123457th sem SAN Module IV notes.pdf', '2019', 'Comedy'),
(2, 'Rahul1998', '100235', '100235ACA 2.pdf', '2018', 'Sample'),
(3, 'devpavan09', '987654', '987654ACA 3.pdf', '2019', 'technology'),
(4, 'SubramanyaBhat69', '9876230', '9876230DeepConvolutionGoogLeNet.pdf', '2015', 'Deep Learning'),
(5, 'Karthik1098', '546231', '546231camera-ready_icme2016template.pdf', '2018', 'Camera'),
(6, 'devpavan09', '201901', '201901FG2019_latex_template.pdf', '2019', 'Neural Network');

--
-- Triggers `doi_paper`
--
DELIMITER $$
CREATE TRIGGER `IncrementCount` AFTER INSERT ON `doi_paper` FOR EACH ROW update users set users.count = users.count + 1 where new.username = users.username
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `student_guide`
--

CREATE TABLE `student_guide` (
  `id` int(11) NOT NULL,
  `s_username` varchar(255) DEFAULT NULL,
  `g_username` varchar(255) DEFAULT NULL,
  `req_stats` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_guide`
--

INSERT INTO `student_guide` (`id`, `s_username`, `g_username`, `req_stats`) VALUES
(7, 'shravan', 'devpavan09', 'accepted'),
(8, 'Sujithd', 'devpavan09', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `full_name`, `email`, `qualification`, `password`, `status`, `count`) VALUES
('devpavan09', 'Pavan Soratur', 'pavan@gmail.com', 'B.E', '5d41402abc4b2a76b9719d911017c592', 1, 2),
('Karthik1098', 'Karthik Adyar', 'karthik@gmail.com', 'B.E', '5d41402abc4b2a76b9719d911017c592', 1, 1),
('kp', 'KRISHNA PRASAD P', 'prasad03kps15@gmail.com', 'BE', '5d41402abc4b2a76b9719d911017c592', 1, 1),
('Rahul1998', 'Rahul V Hegde', 'rahul@gmail.com', 'B.E', '5d41402abc4b2a76b9719d911017c592', 1, 1),
('Rohan009', 'Rohan sathish Acharya', 'rohan@gmail.com', 'B.E', '5d41402abc4b2a76b9719d911017c592', 0, 0),
('shravan', 'shravan kumar', 'shravan@gmail.com', 'B.E', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0),
('SubramanyaBhat69', 'PS Subramanya Bhat', 'subbu@gmail.com', 'B.E', '5d41402abc4b2a76b9719d911017c592', 1, 1),
('Sujithd', 'Sujith D', 'suji@gmail.com', 'BE', '5d41402abc4b2a76b9719d911017c592', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `discussion_forum`
--
ALTER TABLE `discussion_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doi` (`doi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `doi_paper`
--
ALTER TABLE `doi_paper`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doi` (`doi`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `student_guide`
--
ALTER TABLE `student_guide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_username` (`s_username`),
  ADD KEY `g_username` (`g_username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discussion_forum`
--
ALTER TABLE `discussion_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doi_paper`
--
ALTER TABLE `doi_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_guide`
--
ALTER TABLE `student_guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discussion_forum`
--
ALTER TABLE `discussion_forum`
  ADD CONSTRAINT `discussion_forum_ibfk_1` FOREIGN KEY (`doi`) REFERENCES `doi_paper` (`doi`),
  ADD CONSTRAINT `discussion_forum_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `doi_paper`
--
ALTER TABLE `doi_paper`
  ADD CONSTRAINT `doi_paper_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `student_guide`
--
ALTER TABLE `student_guide`
  ADD CONSTRAINT `student_guide_ibfk_1` FOREIGN KEY (`s_username`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `student_guide_ibfk_2` FOREIGN KEY (`g_username`) REFERENCES `doi_paper` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
