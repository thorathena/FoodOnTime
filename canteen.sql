-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 06:32 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_cart`
--

CREATE TABLE IF NOT EXISTS `food_cart` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `f_price` float NOT NULL,
  `f_id` int(11) NOT NULL,
  `stud_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`s_no`),
  KEY `stud_id` (`stud_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `food_cart`
--

INSERT INTO `food_cart` (`s_no`, `f_price`, `f_id`, `stud_id`, `name`, `qty`, `image`) VALUES
(42, 8, 1, 'group4@gmail.com', 'Coffee', 1, 'imagecoffee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`food_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`food_id`, `food_name`, `price`, `img`) VALUES
(1, 'Coffee', 8, 'image\\coffee.jpg'),
(2, 'Omlette', 20, 'image\\omelette.jpg'),
(3, 'Vegetable Fried Rice', 60, 'image\\fried_rice.jpg'),
(4, 'Vegetable Biriyani', 60, 'image\\Vegetable-Biryani.jpg'),
(5, 'Noodles', 55, 'image\\noodles.jpg'),
(6, 'Paneer curry', 50, 'image\\paneer.png'),
(7, 'Chapati', 10, 'image\\chapati.jpg'),
(8, 'Dosa', 30, 'image\\dosa.jpg'),
(9, 'Tea', 7, 'image\\tea.jpg'),
(10, 'Lemon juice', 20, 'image\\lime-juice.jpg'),
(11, 'Pepsi', 12, 'image\\pepsi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `name` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`name`, `id`, `password`, `dob`, `phone`) VALUES
('group 4', 'group4@gmail.com', 'Group-4#', '2018-01-28', '9898989898');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `wallet_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(200) NOT NULL,
  `balance` float NOT NULL,
  PRIMARY KEY (`wallet_id`),
  KEY `student_id` (`student_id`),
  KEY `student_id_2` (`student_id`),
  KEY `student_id_3` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `student_id`, `balance`) VALUES
(2, 'group4@gmail.com', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_cart`
--
ALTER TABLE `food_cart`
  ADD CONSTRAINT `food_cart_ibfk_1` FOREIGN KEY (`stud_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `food_cart_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `menu` (`food_id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
