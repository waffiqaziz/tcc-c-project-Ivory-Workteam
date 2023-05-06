-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2023 at 06:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ivory`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deadline` date NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `title`, `description`, `deadline`, `status`, `created_at`) VALUES
(44, 'Project 1', 'none', '2023-05-06', 0, '2023-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `sprint_child`
--

CREATE TABLE `sprint_child` (
  `child_id` int(11) NOT NULL,
  `child_title` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sprint_child`
--

INSERT INTO `sprint_child` (`child_id`, `child_title`, `parent_id`, `status`) VALUES
(102, 'Nice', 59, 0),
(103, 'Wow', 59, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sprint_parent`
--

CREATE TABLE `sprint_parent` (
  `parent_id` int(11) NOT NULL,
  `parent_title` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sprint_parent`
--

INSERT INTO `sprint_parent` (`parent_id`, `parent_title`, `project_id`) VALUES
(59, 'New...', 44),
(60, 'Next', 44);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `hobby` text NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `about`, `hobby`, `skill`) VALUES
(19, '2', 'a@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2', '2', '2'),
(20, 'Hi', 'b@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE `workspace` (
  `id_workspace` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`id_workspace`, `user_id`, `project_id`, `role`) VALUES
(62, 19, 44, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `sprint_child`
--
ALTER TABLE `sprint_child`
  ADD PRIMARY KEY (`child_id`),
  ADD KEY `fk_parentid` (`parent_id`);

--
-- Indexes for table `sprint_parent`
--
ALTER TABLE `sprint_parent`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `fk_projectid` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workspace`
--
ALTER TABLE `workspace`
  ADD PRIMARY KEY (`id_workspace`),
  ADD KEY `fk_userid` (`user_id`),
  ADD KEY `fk_projectid` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `sprint_child`
--
ALTER TABLE `sprint_child`
  MODIFY `child_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `sprint_parent`
--
ALTER TABLE `sprint_parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `id_workspace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sprint_child`
--
ALTER TABLE `sprint_child`
  ADD CONSTRAINT `sprint_child_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `sprint_parent` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sprint_parent`
--
ALTER TABLE `sprint_parent`
  ADD CONSTRAINT `sprint_parent_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workspace`
--
ALTER TABLE `workspace`
  ADD CONSTRAINT `workspace_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workspace_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
