-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2021 at 11:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather_img`
--

-- --------------------------------------------------------

--
-- Table structure for table `img_src`
--

CREATE TABLE `img_src` (
  `icon_id` varchar(3) NOT NULL,
  `src` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `img_src`
--

INSERT INTO `img_src` (`icon_id`, `src`) VALUES
('01d', 'clearskymorn.png'),
('01n', 'clearskynight.png'),
('02d', 'clearskymorn.png'),
('02n', 'clearskynight.png'),
('03d', 'clearskymorn.png'),
('03n', 'clearskynight.png'),
('04d', 'clearskymorn.png'),
('04n', 'clearskynight.png'),
('09d', 'rainsky.png'),
('09n', 'rainsky.png'),
('10d', 'rainsky.png'),
('10n', 'rainsky.png'),
('11d', 'rainsky.png'),
('11n', 'rainsky.png'),
('50d', 'clearskymorn.png'),
('50n', 'clearskynight.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img_src`
--
ALTER TABLE `img_src`
  ADD PRIMARY KEY (`icon_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
