-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 12:43 PM
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
  PRIMARY KEY (`s_no`),
  KEY `stud_id` (`stud_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `food_cart`
--

INSERT INTO `food_cart` (`s_no`, `f_price`, `f_id`, `stud_id`, `name`, `qty`) VALUES
(23, 8, 1, 'dan@gmail.com', 'Coffee', 2),
(36, 8, 1, 'group4@gmail.com', 'Coffee', 2);

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
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `s_no` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `f_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `delivery_time` time NOT NULL,
  `date` date NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'not delivered',
  PRIMARY KEY (`s_no`),
  KEY `user_id` (`user_id`,`f_id`),
  KEY `f_id` (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`s_no`, `order_id`, `user_id`, `f_id`, `name`, `qty`, `price`, `delivery_time`, `date`, `status`) VALUES
(7, 1, 'group4@gmail.com', 1, 'Coffee', 1, 8, '17:30:00', '0000-00-00', 'not delivered'),
(8, 1, 'group4@gmail.com', 2, 'Omlette', 1, 20, '17:30:00', '0000-00-00', 'not delivered'),
(9, 2, 'group4@gmail.com', 2, 'Omlette', 1, 20, '17:30:00', '0000-00-00', 'not delivered'),
(10, 3, 'dan@gmail.com', 1, 'Coffee', 1, 8, '15:00:00', '0000-00-00', 'not delivered'),
(11, 3, 'dan@gmail.com', 2, 'Omlette', 1, 20, '15:00:00', '0000-00-00', 'not delivered'),
(12, 3, 'dan@gmail.com', 3, 'Vegetable Fried Rice', 1, 60, '15:00:00', '0000-00-00', 'not delivered'),
(13, 4, 'dan@gmail.com', 4, 'Vegetable Biriyani', 1, 60, '19:09:00', '0000-00-00', 'not delivered'),
(14, 7, 'dan@gmail.com', 2, 'Omlette', 1, 20, '00:00:00', '0000-00-00', 'not delivered'),
(15, 8, 'dan@gmail.com', 1, 'Coffee', 1, 8, '00:00:00', '0000-00-00', 'not delivered'),
(16, 9, 'dan@gmail.com', 3, 'Vegetable Fried Rice', 1, 60, '00:00:00', '0000-00-00', 'not delivered'),
(17, 10, 'dan@gmail.com', 1, 'Coffee', 2, 8, '15:10:00', '0000-00-00', 'not delivered'),
(18, 11, 'dan@gmail.com', 8, 'Dosa', 1, 30, '00:00:00', '2018-05-12', 'not delivered'),
(19, 12, 'dan@gmail.com', 4, 'Vegetable Biriyani', 3, 60, '16:00:00', '2018-05-13', 'not delivered'),
(20, 13, 'dan@gmail.com', 5, 'Noodles', 1, 55, '14:00:00', '2018-05-13', 'not delivered'),
(21, 13, 'dan@gmail.com', 2, 'Omlette', 1, 20, '14:00:00', '2018-05-13', 'not delivered'),
(22, 13, 'dan@gmail.com', 3, 'Vegetable Fried Rice', 1, 60, '14:00:00', '2018-05-13', 'not delivered'),
(23, 14, 'group4@gmail.com', 2, 'Omlette', 1, 20, '15:00:00', '2018-05-13', 'not delivered'),
(24, 15, 'group4@gmail.com', 4, 'Vegetable Biriyani', 3, 60, '18:00:00', '2018-05-13', 'not delivered'),
(25, 19, 'group4@gmail.com', 3, 'Vegetable Fried Rice', 1, 60, '15:00:00', '2018-05-13', 'not delivered'),
(26, 20, 'group4@gmail.com', 2, 'Omlette', 2, 20, '19:30:00', '2018-05-13', 'not delivered'),
(27, 21, 'group4@gmail.com', 5, 'Noodles', 1, 55, '17:00:00', '2018-05-13', 'not delivered'),
(28, 23, 'group4@gmail.com', 1, 'Coffee', 1, 8, '15:00:00', '2018-05-13', 'not delivered'),
(29, 27, 'group4@gmail.com', 1, 'Coffee', 3, 8, '00:00:00', '2018-05-13', 'not delivered');

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
('Dhanya', 'dan@gmail.com', 'Dhanya!98', '1998-01-28', '9566955249'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `student_id`, `balance`) VALUES
(2, 'group4@gmail.com', 88),
(3, 'dan@gmail.com', 42);

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `menu` (`food_id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
