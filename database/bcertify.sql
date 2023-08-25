-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 08:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcertify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(125) NOT NULL,
  `lastName` varchar(125) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `confirmCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`, `type`, `confirmCode`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '6464651', 'okay', 'f6fdffe48c908deb0f4c3bd36c032e72', 'admin', '789456'),
(2, 'Hiakosi', 'Castaneda', 'joana@gmail.com', '09368790811', 'ADDRESS 1 BLK 15 LOT 17 DRIVE ST.', '21232f297a57a5a743894a0e4a801fc3', 'staff', '131527'),
(3, 'Jhenny', 'Lee', 'lee@gmail.com', '09207601999', 'longos', '69a9dc1da83c4c3e58a5ecb7c9de78fa', 'admin', '139474');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `quantity`) VALUES
(11, 2, 12, 0),
(12, 0, 46, 0),
(15, 43, 47, 0),
(19, 42, 54, 0),
(20, 42, 53, 0),
(21, 0, 47, 0),
(22, 0, 99, 0),
(23, 46, 81, 0);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `oplace` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'no',
  `odate` date NOT NULL,
  `ddate` date NOT NULL,
  `delivery` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `pid`, `quantity`, `oplace`, `mobile`, `dstatus`, `odate`, `ddate`, `delivery`) VALUES
(90, 49, 82, 1, '0xA920bdACd696Ff7913795ed63d0ddD1642b0F22A', '8001581728', 'no', '2023-04-14', '0000-00-00', 'Express Delivery +100php upon ');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `iname` varchar(100) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `picture` text NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `iname`, `rname`, `picture`, `filename`) VALUES
(114, 'arabindak22', 'vamsee', '1681484888.jpeg', ''),
(115, 'fdfdf', 'afdfadf', '', '1681488485.pdf'),
(116, 'iiiiiiiiiiiiiiii', 'iiiiiiiiiiiiii', '', '1681497838.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `sign_docu`
--

CREATE TABLE `sign_docu` (
  `issuer` varchar(50) NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `course` int(50) NOT NULL,
  `date` date NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmCode` varchar(10) NOT NULL,
  `activation` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `address`, `password`, `confirmCode`, `activation`) VALUES
(44, 'Jo', 'Castaneda', 'joanmcastaneda@gmail.com', 'ADDRESS 1 BLK 15 LOT 17 DRIVE ST.', '69a9dc1da83c4c3e58a5ecb7c9de78fa', '0', 'yes'),
(45, 'KO', 'KOOOO', 'ko@w.com', 'ADDRESS 1 BLK 15 LOT 17 DRIVE ST.', '25d55ad283aa400af464c76d713c07ad', '289477', 'no'),
(46, 'Czyke', 'Correa', 'czyke@yahoo.com', 'ADDRESS 1 BLK 15 LOT 17 DRIVE ST.', '7c09a95be9c2e9612c2bda758fc17e42', '0', 'yes'),
(47, 'Afafd', 'Kfdfd', 't@1419.gmail.com', 'a934,kolkata', 'c3346f44444b4997370c3b3405b88fb1', '279384', 'no'),
(48, 'Rohan', 'Joshi', 'rohan.joshi@gmail.com', '0xA920bdACd696Ff7913795ed63d0ddD1642b0F22A', '25f9e794323b453885f5181f1b624d0b', '172937', 'no'),
(49, 'Rohan', 'Joshi', 'rohan.joshdi@gmail.com', '0xA920bdACd696Ff7913795ed63d0ddD1642b0F22A', '25f9e794323b453885f5181f1b624d0b', '0', 'yes'),
(50, 'Vamsse', 'KVK', 'vamsee@gmail.com', '0xA920bdACd696Ff7913795ed63d0ddD1642b0F22A', '827ccb0eea8a706c4c34a16891f84e7b', '0', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sign_docu`
--
ALTER TABLE `sign_docu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
