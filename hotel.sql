-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 11:06 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin`, `password`, `create_datetime`) VALUES
(9902, 'admin02', '952a25433ff8ef5e40ce5cd88b655076', '2023-04-26 10:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `user_id` varchar(20) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `hotel` int(1) NOT NULL,
  `roomType` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int(1) NOT NULL,
  `childs` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`user_id`, `booking_id`, `name`, `number`, `email`, `hotel`, `roomType`, `check_in`, `check_out`, `adults`, `childs`) VALUES
('FburKTr1TcFLhAsJF5w2', 'bqef05AU4rjpW0NFLrsD', 'Labo', '01923834', 'labo@gmail.com', 2, 750, '2023-04-29', '2023-04-30', 3, 0),
('FburKTr1TcFLhAsJF5w2', 'cMxIQ4QO1kCw3vcxptqd', 'Landa', '241534', 'landa@gmail.com', 1, 550, '2023-04-26', '2023-04-27', 3, 0),
('FburKTr1TcFLhAsJF5w2', 'GhgGWHdBmOYpgLrRRdEr', 'Landa', '241534', 'landa@gmail.com', 3, 650, '2023-04-26', '2023-04-27', 1, 2),
('FburKTr1TcFLhAsJF5w2', 'x9NglYwhAxKgWlD0F4VC', 'Labo', '241534', 'labo@gmail.com', 3, 350, '2023-05-06', '2023-05-08', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(20) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `number`, `message`) VALUES
(1, 'Siti', 'siti@gmail.com', '1912847342', 'Halo'),
(3, 'Labo', 'labo@gmail.com', '018327362', 'Bello!'),
(4, 'Labo', 'labo@gmail.com', '241534', 'NI HAO'),
(5, 'Labo', 'labo@gmail.com', '241534', 'afasfdsv'),
(6, 'Lisa', 'lalisa@gmail.com', '0135363574', 'Good Hotel!'),
(7, 'Nina', 'nina@gmail.com', '0192316278', 'Annyeong! VERY GOOD hotel lehhh!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'Labo', 'labo@gmail.com', '7b53b39132e802f0555c9033c3423923', '2023-04-23 06:13:42'),
(2, 'Lily', 'lily@gmail.com', 'd8c1dcd6042ae6b1c58b552b7b045a15', '2023-04-23 09:46:53'),
(3, 'Landa', 'landa@gmail.com', '7b5da1c009d5e3f22f79114c17f25f8a', '2023-04-25 15:33:44'),
(4, 'Lisa', 'lalisa@gmail.com', '77424d0dd227f0ef8eecb54da4252be8', '2023-04-26 09:05:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9903;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
