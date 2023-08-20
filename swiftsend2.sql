-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2023 at 10:34 PM
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
-- Database: `swiftsend2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@mail.com'),
(2, 'tejjzakaria', 'sr9g1c5e', 'tejjzakaria@sendswift.co');

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `trackingNumber` varchar(255) DEFAULT NULL,
  `recipientName` varchar(255) DEFAULT NULL,
  `recipientPhoneNumber` varchar(255) DEFAULT NULL,
  `deliveryDate` varchar(255) DEFAULT NULL,
  `recipientAddress` varchar(255) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productWeight` varchar(255) DEFAULT NULL,
  `productPrice` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `paymentStatus` varchar(255) DEFAULT NULL,
  `recipientCity` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `userID`, `trackingNumber`, `recipientName`, `recipientPhoneNumber`, `deliveryDate`, `recipientAddress`, `productName`, `productWeight`, `productPrice`, `comments`, `status`, `paymentStatus`, `recipientCity`) VALUES
(3, 1, 'UD6O6IX95C', 'test', 'test', '2023-04-30', 'nr 99', 'test', '0-20', '200', 'none', 'in transit', 'unpaid', 'AGADIR'),
(4, 1, 'DV8R6DYSAK', 'test1', 'test', '2023-04-21', 'n99', 'test', '51-100', '300', 'none', 'delivered', 'paid', ''),
(5, 123, 'BO68VWCD0P', 'testuser2', 'testuser2', '2023-04-22', 'testuser2', 'testuser2', '0-20', '2002', 'testuser2', 'returned', 'unpaid', ''),
(6, 123, 'BO68VWCD0P', 'testuser2', 'testuser2', '2023-04-22', 'testuser2', 'testuser2', '0-20', '2002', 'testuser2', 'waiting pickup', 'unpaid', 'Rabat'),
(8, 1, 'ABT3XMK9VA', 'test22222', 'test22222', '2023-04-22', 'test22222', 'test', '0-20', '200', 'test22222', 'waiting pickup', 'unpaid', NULL),
(9, 1, 'LJX8S5GSEJ', 'John Doe', 'AGADIR', '2023-04-21', 'N 99 Av Med El Fassi Cite Salam', 'PowerBank', '0-20', '249', 'Leave at the door step please', 'delivered', 'paid', 'AGADIR'),
(10, 1, 'OBI59D1R9Z', 'Zakaria TEJJANI', '212 6 97 41 77 28', '2023-04-21', 'N 99 Av Med El Fassi Cite Salam', 'PowerBank', '0-20', '349', 'ssssss', 'in transit', 'unpaid', 'AGADIR'),
(11, 1, 'QABAOMO4V6', 'TC', '0600000000', '2023-04-29', 'N 99 ', 'TC', '0-20', '199', 'Lorem', 'returned', 'unpaid', 'AGADIR'),
(12, 126, 'NSSZQLD54S', 'Yassine TEJJANI', '0707071292', '2023-04-28', 'Nr 99 Av Med El Fassi', 'PowerBank', '0-20', '249', 'Leave at the door.', 'delivered', 'paid', 'Agadir'),
(13, 126, 'L5CIF00YTX', 'isdhi', '5867432', '2023-04-18', 'address', 'isdhi', '0-20', '1222', 'isdhi', 'in transit', 'unpaid', 'isdhi'),
(15, 127, '27RXE07L72', 'Recipient n', 'Recipient pn', '2023-04-29', 'Recipient a', 'Recipient p', '0-20', '599', 'Recipient i', 'waiting pickup', 'unpaid', 'Recipient cc'),
(16, 126, 'OP1Q89J4PI', 'Parcel 1', '0600000000', '2023-04-28', 'Parcel 1', 'Parcel 1', '0-20', '299', 'Parcel 1', 'waiting pickup', 'unpaid', 'Parcel 1'),
(17, 125, 'CQWL6PLH1R', 'John Doe', '0600000000', '2023-04-24', 'nr99', 'PowerBank', '0-20', '299', 'none', 'delivered', 'paid', 'AGADIR'),
(18, 125, 'HORC9Q5ZVI', 'John Doe', '212 6 00 00 00 00', '2023-12-04', 'NR 99 AV MED EL FASSI CITE SALAM', 'IPHONE 14', '0-20', '12000', 'LEAVE AT THE DOOR', 'delivered', 'paid', 'AGADIR'),
(19, 125, 'UWYVGFPN0Z', 'John Doe', '212 6 00 00 00 00', '2023-05-02', 'NR 99 AV MED EL FASSI CITE SALAM', 'IPHONE 14', '0-20', '12000', 'NONE', 'returned', 'unpaid', 'AGADIR');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `userID`, `amount`, `status`, `time`) VALUES
(2, 126, '0.00', 'pending', 1682807450),
(3, 126, '0.00', 'pending', 1682807562),
(4, 126, '0.00', 'pending', 1682807574),
(5, 126, '0', 'pending', 1682807661),
(6, 126, '0', 'pending', 1682807663),
(7, 126, '', 'pending', 1682813761),
(8, 126, '0', 'pending', 1682813772),
(9, 126, '', 'pending', 1682813796),
(10, 126, '', 'pending', 1682813835),
(11, 126, '0', 'pending', 1682813917),
(12, 126, '0', 'pending', 1682813921),
(13, 123, '0', 'pending', 1682813965);

-- --------------------------------------------------------

--
-- Table structure for table `payments2`
--

CREATE TABLE `payments2` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `paymentAmount` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments2`
--

INSERT INTO `payments2` (`id`, `userID`, `paymentAmount`, `date`, `status`) VALUES
(2, 1, '2300', '2023-05-01', 'completed'),
(3, 1, '2900', '2023-04-30', 'completed'),
(4, 126, '2900', '2023-04-30', 'pending'),
(5, 125, '11955', '2023-05-02', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `pickupRequests`
--

CREATE TABLE `pickupRequests` (
  `id` int(11) NOT NULL,
  `pickupDate` date NOT NULL,
  `pickupAddress` varchar(255) NOT NULL,
  `parcelsToBePickedup` text NOT NULL,
  `userID` int(11) NOT NULL,
  `requestStatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickupRequests`
--

INSERT INTO `pickupRequests` (`id`, `pickupDate`, `pickupAddress`, `parcelsToBePickedup`, `userID`, `requestStatus`) VALUES
(6, '2023-04-28', 'aaa', 'testuser2:BO68VWCD0P', 123, 'completed'),
(7, '2023-04-22', 'nnn', 'Yassine TEJJANI:NSSZQLD54S', 126, 'completed'),
(8, '2023-04-27', 'Nr 99', 'testuser2:BO68VWCD0P', 123, 'completed'),
(9, '2023-04-28', 'Pickup address', 'Recipient n:27RXE07L72', 127, 'completed'),
(10, '2023-04-28', 'fgsfdgfds', 'Parcel 1:OP1Q89J4PI', 126, 'pending'),
(11, '2023-12-22', 'NR 99 AV MED EL FASSI CITE SALAM AGADIR', 'John Doe:HORC9Q5ZVI', 125, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `idNumber` varchar(255) DEFAULT NULL,
  `phoneNumber` varchar(255) DEFAULT NULL,
  `businessName` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `websiteLink` varchar(255) DEFAULT NULL,
  `bankName` varchar(255) DEFAULT NULL,
  `accountNumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `fullName`, `idNumber`, `phoneNumber`, `businessName`, `city`, `address`, `websiteLink`, `bankName`, `accountNumber`) VALUES
(1, 'mail@nail.com', '123456', 'user', 'User User', '123', '22222222', 'bname', 'ny', 'address', 'link', 'bank', '123456789'),
(123, 'user2@mail.com', 'user2', 'USER 2', '1233456', '099999999', 'BNAME', 'AGADIR', 'ADDRESS', 'LINK', 'BANKNAME', '1243243241', '666'),
(125, 'zakaria.tejjani@gmail.com', 'sr9g1c5e', 'tejjzakaria', 'Zakaria Tejjani', 'P372091', '0697417728', 'SendSwift', 'Agadir', 'N99 Av Med El Fassi Cite Salam', 'as', 'CIH', '12321532345'),
(126, 'admin@admin.com', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'CIH', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments2`
--
ALTER TABLE `payments2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickupRequests`
--
ALTER TABLE `pickupRequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments2`
--
ALTER TABLE `payments2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pickupRequests`
--
ALTER TABLE `pickupRequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
