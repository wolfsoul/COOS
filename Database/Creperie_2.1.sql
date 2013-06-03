-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 21 Μάη 2012 στις 18:57:30
-- Έκδοση Διακομιστή: 5.5.16
-- Έκδοση PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `creperi`
--
CREATE DATABASE `creperi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `creperi`;

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_surname` varchar(30) CHARACTER SET greek NOT NULL,
  `customer_name` varchar(30) CHARACTER SET greek NOT NULL,
  `customer_address` varchar(30) CHARACTER SET greek NOT NULL,
  `customer_floor` int(2) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `customer_username` varchar(30) NOT NULL,
  `customer_password` varchar(30) NOT NULL,
  `customer_confirmed` enum('Yes','No') CHARACTER SET greek NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_surname`, `customer_name`, `customer_address`, `customer_floor`, `customer_phone`, `customer_username`, `customer_password`, `customer_confirmed`) VALUES
(1, 'ΙΩΑΝΝΟΥ', 'ΙΩΑΝΝΗΣ', 'ΜΕΡΑΡΧΕΙΑΣ 45', 1, 2147483647, 'IOIO', '100', 'Yes'),
(2, 'ΔΗΜΟΥ', 'ΔΗΜΟΣΘΕΝΗΣ', 'ΕΡΜΟΥ 14', 2, 2147483647, 'DHDH', '101', 'Yes'),
(3, 'ΦΤΙΚΑΣ', 'ΠΕΡΙΚΛΗΣ', 'ΝΕΜΕΑΣ 46', 3, 2147483647, 'FTPE', '102', 'Yes'),
(4, 'ΓΕΩΡΓΙΟΥ', 'ΓΕΩΡΓΙΟΣ', 'ΣΠΥΡΙΔΗ 78', 3, 2147483647, 'GEGE', '103', 'Yes'),
(5, 'ΠΑΠΠΑΣ', 'ΝΙΚΟΛΑΟΣ', 'ΕΡΜΟΥ 41', 4, 2147483647, 'PANI', '104', 'Yes');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `material_id` int(2) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(30) NOT NULL,
  `material_type` enum('Cheese','Charcuterie','Ointments','Sour_Extras','Chocolates','Specials','Sweet_Extras') NOT NULL,
  `material_price` float unsigned NOT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Άδειασμα δεδομένων του πίνακα `materials`
--

INSERT INTO `materials` (`material_id`, `material_name`, `material_type`, `material_price`) VALUES
(15, 'ΠΡΑΛΙΝΑ', 'Chocolates', 0.8),
(16, 'ΛΕΥΚΗ ΣΟΚΟΛΑΤΑ', 'Chocolates', 0.8),
(17, 'ΜΠΙΣΚΟΤΟ', 'Specials', 0.5),
(18, 'ΦΡΑΟΥΛΕΣ', 'Sweet_Extras', 0.5),
(19, 'ΜΠΑΝΑΝΑ', 'Sweet_Extras', 0.5),
(20, 'ΚΑΣΕΡΙ', 'Cheese', 0.5),
(21, 'ΜΠΕΙΚΟΝ', 'Charcuterie', 0.5),
(22, 'ΓΑΛΟΠΟΥΛΑ', 'Charcuterie', 0.8),
(23, 'ΜΑΝΙΤΑΡΙΑ', 'Sour_Extras', 0.7),
(24, 'ΚΟΤΟΜΠΟΥΚΕΣ', 'Charcuterie', 0.5),
(25, 'GOUDA', 'Cheese', 1),
(26, 'TZATZIKI', 'Ointments', 0.7),
(27, '', '', 0);

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `order_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_total` float NOT NULL,
  `order_status` enum('ordered','processing','for delivery','delivered') CHARACTER SET latin1 NOT NULL,
  `order_customer_id` int(5) NOT NULL,
  `order_deliveryman` varchar(30) CHARACTER SET latin1 NOT NULL,
  `order_employee` varchar(30) CHARACTER SET latin1 NOT NULL,
  `order_description` mediumtext NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Άδειασμα δεδομένων του πίνακα `orders`
--

INSERT INTO `orders` (`order_id`, `order_datetime`, `order_total`, `order_status`, `order_customer_id`, `order_deliveryman`, `order_employee`, `order_description`) VALUES
(1, '0000-00-00 00:00:00', 3, 'ordered', 1, '1', '1', '1');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_surname` varchar(30) CHARACTER SET greek NOT NULL,
  `user_name` varchar(30) CHARACTER SET greek NOT NULL,
  `user_address` varchar(30) CHARACTER SET greek NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_phone` int(10) NOT NULL,
  `user_username` varchar(30) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_role` enum('employee','admin') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`user_id`, `user_surname`, `user_name`, `user_address`, `user_email`, `user_phone`, `user_username`, `user_password`, `user_role`) VALUES
(1, 'ΚΕΧΑΓΙΑΣ', 'ΔΗΜΗΤΡΙΟΣ', 'ΜΕΡΑΡΧΕΙΑΣ 1', 'KEDH@MAIL.COM', 2147483647, 'KREPA1', '10', 'employee'),
(2, 'ΔΗΜΗΤΡΙΟΥ', 'ΝΙΚΟΛΟΑΣ', 'ΕΡΜΟΥ 2', 'DHNI@YAHOO.COM', 2147483647, 'KREPA2', '20', 'employee'),
(3, 'ΔΗΜΗΤΡΙΑΔΗΣ', 'ΓΕΩΡΓΙΟΣ', 'ΘΡΑΚΗΣ 3', 'DHGE@HOTMAIL.COM', 2147483647, 'KREPA3', '30', 'employee'),
(4, 'ΙΩΑΝΝΙΔΗΣ', 'ΕΥΤΥΧΙΟΣ', 'ΣΠΥΡΙΔΗ 4', 'IOEY@MAIL.COM', 2147483647, 'KREPA4', '40', 'employee'),
(5, 'ΜΑΤΙΔΗΣ', 'ΔΗΜΟΣΘΕΝΗΣ', 'ΧΙΛΗΣ 5', 'MADH@IN.GR', 2147483647, 'KREPA5', '50', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
