-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2015 at 01:24 AM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teaching`
--

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `user_id`) VALUES
(1, 1);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `surname`, `password`, `active`, `created`, `last_login`) VALUES
(1, 'admin@gmail.com', 'Web', 'Admin', '$2y$10$K4A/pBr7Tq6Ee5zGJaJk9u9M.gfkHkQKNYLwL7TFujlVOt9VuD9w.', 1, '2015-07-21 23:02:13', '2015-07-21 23:02:00');
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
