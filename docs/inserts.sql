-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2015 at 11:03 PM
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
(1, 1),
(2, 2);

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `document`, `user_id`, `school_id`) VALUES
(1, '001', 3, 1);

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `document`) VALUES
(1, 'Queen Mary', '001');

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `description`) VALUES
(1, 'Request-Response Interaction', 'Request–response or request–reply is one of the basic methods computers use to communicate with each other. When using request–response, the first computer sends a request for some data and the second computer responds to the request. Usually there is a series of such interchanges until the complete message is sent. Browsing a web page is an example of request–response communication. One can think of request–response as being like a telephone call, where you call someone and they answer the call. Compare this with one-way computer communication, which is like the push-to-talk or "barge in" feature found on some phones and two-way radios, where a message is sent without waiting for a response. Sending an email is an example of one-way communication.');

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`id`, `number`, `title`, `section_id`) VALUES
(1, 1, 'Request-Response 1', 1),
(2, 2, 'Request-Response 2', 1);

--
-- Dumping data for table `studentclasses`
--

INSERT INTO `studentclasses` (`id`, `name`, `school_id`, `professor_id`) VALUES
(2, 'primary 1 A', 1, 1);

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `enrolment_n`, `rating_sum`, `studentclasse_id`, `user_id`, `school_id`) VALUES
(2, 123, 0, 2, 5, 1);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `first_name`, `surname`, `password`, `active`, `created`, `last_login`) VALUES
(1, 'admin@gmail.com', 'Web', 'Admin', '$2y$10$K4A/pBr7Tq6Ee5zGJaJk9u9M.gfkHkQKNYLwL7TFujlVOt9VuD9w.', 1, '2015-07-21 23:02:13', '2015-07-21 23:02:00'),
(2, 'admin2@gmail.com', 'Webs', 'Admin 2', '$2y$10$AFkP4EBfUnuFScYur9QSX..R1mxLuZD00W1R439IvWV/unm8qNJGO', 0, '2015-07-22 00:29:17', NULL),
(3, 'p@gmail.com', 'Paulo', 'Oliva', '$2y$10$I0ivhP/.GnGRSiSUjwm6q.jPuumdJH/tZYBtETp/ctvbpdwq6LCCq', 1, '2015-07-22 00:45:45', NULL),
(5, 'allan@gmail.com', 'Allan', 'Oliveira', '$2y$10$TWm6kAhuxYLdRLzu.9Lq3un4bq76UsVqmjX9jihRxAoUoSwqZe/Y6', 0, '2015-07-22 01:01:42', NULL);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
