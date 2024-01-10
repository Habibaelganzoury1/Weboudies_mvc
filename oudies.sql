-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2024 at 03:42 PM
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
-- Database: `oudies`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` INT AUTO_INCREMENT PRIMARY KEY,
  `price` varchar(30) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--


-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `ID` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `cpassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`ID`, `fname`, `lname`, `uname`, `mail`, `phone`, `address`, `password`, `cpassword`) VALUES
(7, 'Lina', 'Mohamed', 'manal', 'lina_@outlook.com', '01030101454', 'Maadi', '56', '56'),
(8, 'Lina', 'Mohamed', 'lina.bassel', 'lina_bio22@outlook.com', '01030101454', 'Maadi', '12', '12'),
(9, 'Lina', 'ekwhflwe', 'waled', 'mostafa@ou.com', '01030101454', 'Maadi', '12', '12'),
(10, 'Lina', 'dsfsdfsdfsd', 'samira.refaey', 'lina_bio2018@outlook.com', '01030101454', 'Maadi', '5', '5'),
(11, 'Lina', 'dsfsdfsdfsd', 'aya', 'lina_bio2018@outlook.com', '01030101454', 'Maadi', '1', '1'),
(12, 'thtr', 'geer', 'ergeerg', 'lina_bio22@outlook.comyyy', '0103569845', 'Maadi', '23', '23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userr`
--
ALTER TABLE `userr`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Assuming a table structure like this:
 CREATE TABLE cart (
     id INT AUTO_INCREMENT PRIMARY KEY,
     ID INT,
     product_id INT,
     quantity INT,
     price DECIMAL(10, 2),
     FOREIGN KEY (ID) REFERENCES userr(id),
     FOREIGN KEY (product_id) REFERENCES products(id)
 );

-- Replace 'users' and 'products' with your actual user and product tables.

SELECT
    c.id AS cart_id,
    u.username AS username,
    p.product_name AS product_name,
    c.quantity,
    c.price
FROM
    cart c
JOIN
    userr u ON c.ID = u.id
JOIN
    products p ON c.product_id = p.id;
