-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 06:09 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new-b-pay`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id` int(10) NOT NULL,
  `bid` varchar(20) NOT NULL,
  `count` int(10) NOT NULL,
  `createe` datetime NOT NULL,
  `actions` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id`, `bid`, `count`, `createe`, `actions`, `status`) VALUES
(149, 'abcd342', 15, '2022-02-01 19:38:16', '', 'Fraud'),
(143, 'HDAPTG342', 97, '2022-02-02 19:38:21', '', 'Sucess'),
(143, 'HDdBJG342', 78, '2022-01-31 19:38:27', '', 'SUCCESS'),
(143, 'HDDPTG342', 98, '2022-01-27 19:38:37', '', 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `button`
--

CREATE TABLE `button` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `tsales` int(10) NOT NULL,
  `iname` text NOT NULL,
  `usold` int(10) NOT NULL,
  `cat` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(15) NOT NULL,
  `actions` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `button`
--

INSERT INTO `button` (`id`, `title`, `tsales`, `iname`, `usold`, `cat`, `status`, `actions`) VALUES
(149, 'manufacture', 2345, 'shirt', 5, '2022-02-02 02:17:55', 'inactive', 'fsghj'),
(149, 'sale', 34567, 'jeans', 10, '2022-02-02 02:20:02', 'active', 'done'),
(149, 'print', 12345, 'paper', 1000, '2022-02-02 02:21:26', 'active', 'done'),
(149, 'make', 4556, 'phone', 100, '2022-02-02 02:22:49', 'inactive', 'pending'),
(149, 'manufacture', 47389, 'net', 10, '2022-02-02 02:41:41', 'active', 'done'),
(149, 'manufacture', 789, 'blanket', 20, '2022-02-02 02:42:36', 'inactive', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `cno` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `cno`, `msg`) VALUES
(12, 'abc', 'a@gmail.com', 769854323, 'hello'),
(13, 'Komal Gulati', 'abc@gmail.com', 769854323, 'query'),
(14, 'user', 'gulati05.komal@gmail.com', 76309986, 'query message'),
(15, 'user', 'gulati05.komal@gmail.com', 769854323, 'hweloo'),
(16, 'raj', 'abc@gmail.com', 769854323, 'hello'),
(17, 'abc', 'abc@gmail.com', 769854323, 'msg'),
(18, 'raj', 'gulati05.komal@gmail.com', 769854323, 'new msg'),
(19, 'komal', 'abc@gmail.com', 769854323, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `dispute`
--

CREATE TABLE `dispute` (
  `id` int(10) NOT NULL,
  `did` varchar(20) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `amt` int(10) NOT NULL,
  `createe` date NOT NULL,
  `dstatus` text NOT NULL,
  `dtype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dispute`
--

INSERT INTO `dispute` (`id`, `did`, `pid`, `amt`, `createe`, `dstatus`, `dtype`) VALUES
(149, 'abcd342', 'pay302', 1200, '2022-02-01', 'open', 'Chargeback'),
(149, 'abut372', 'pay642', 1200, '2022-01-19', 'Won', 'Arbitration'),
(149, 'abyb492', 'pay192', 900, '2022-02-02', 'open', 'Chargeback'),
(149, 'por872', 'pay302', 1200, '2022-01-31', 'Lost', 'Fraud');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `plid` varchar(20) NOT NULL,
  `cat` date NOT NULL,
  `amt` int(10) NOT NULL,
  `rid` varchar(20) NOT NULL,
  `cust` text NOT NULL,
  `link` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`plid`, `cat`, `amt`, `rid`, `cust`, `link`, `status`, `id`) VALUES
('pay_123', '2022-02-03', 100, 'ref_123', '1234567890(abc@gmail.com)', 'www.basil.com', 'paid', 149),
('pay_234', '2022-02-03', 1000, 'ref_234', '2345678901(bcd@gmail.com)', 'www.basil1.com', 'unpaid', 149),
('pay_345', '2022-02-03', 200, 'ref_345', '3456789012(cde@gmail.com)', 'www.basil2.com', 'paid', 149);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `oid` varchar(20) NOT NULL,
  `attempts` int(10) NOT NULL,
  `reciept` text NOT NULL,
  `createe` datetime NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `oid`, `attempts`, `reciept`, `createe`, `status`) VALUES
(145, 'OID348', 28, '', '2022-02-01 14:16:59', 'Attempted'),
(149, 'OID448', 18, '', '2022-02-02 14:17:04', 'Attempted'),
(149, 'OID4856', 10, '', '2022-01-26 14:17:09', 'Paid'),
(149, 'OID631', 12, '', '2022-02-26 14:17:19', 'Paid'),
(149, 'OID821', 29, '', '2022-02-28 14:17:25', 'Created');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `pid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(10) NOT NULL,
  `amount` int(11) NOT NULL,
  `duration` date NOT NULL,
  `st` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `pid`, `email`, `contact`, `amount`, `duration`, `st`) VALUES
(149, 'abcd342', 'xyz@gmail.com', 981124521, 900, '2022-02-09', 'active'),
(149, 'apn765', 'pnm@gmail.com', 786321365, 12000, '2022-02-01', 'inactive'),
(149, 'kjg324', 'xyz@gmail.com', 0, 0, '2022-02-02', 'inactive'),
(149, 'mnh985', 'kl@gmail.com', 986431237, 1500, '2022-02-08', 'active'),
(145, 'xyz359', 'project@gmail.com', 78541234, 9800, '2022-02-01', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(10) NOT NULL,
  `rid` varchar(20) NOT NULL,
  `payid` varchar(20) NOT NULL,
  `createe` datetime NOT NULL,
  `status` text NOT NULL,
  `amt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`id`, `rid`, `payid`, `createe`, `status`, `amt`) VALUES
(149, 'omw321', 'abmd342', '2022-02-01 19:39:25', 'Processed', 1500),
(145, 'pwaw291', 'oyr436', '2022-02-02 19:39:29', 'Processing', 9800),
(149, 'ubcd342', 'pay654', '2022-02-01 13:49:20', 'Failed', 854),
(145, 'usw291', 'jsg436', '0000-00-00 00:00:00', 'Processing', 1700),
(143, 'utyd342', 'pay954', '2022-02-02 13:49:25', 'Failed', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `route_accounts`
--

CREATE TABLE `route_accounts` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `account_status` text NOT NULL,
  `dashboard_access` text NOT NULL,
  `allow_refunds` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_accounts`
--

INSERT INTO `route_accounts` (`id`, `account_id`, `email`, `name`, `account_status`, `dashboard_access`, `allow_refunds`) VALUES
(149, 1, 'abc@xyz.com', 'ABC', 'Good', 'Yes', 'Yes'),
(149, 2, 'def@xyz.com', 'DEF', 'Good', 'Yes', 'Yes'),
(149, 3, 'ghi@xyz.com', 'GHI', 'Bad', 'No', 'No'),
(149, 4, 'jkl@xyz.com', 'JKL', 'Bad', 'Yes', 'Yes'),
(149, 5, 'mno@xyz.com', 'MNO', 'Good', 'No', 'No'),
(143, 6, 'pqr@xyz.com', 'PQR', 'Bad', 'Yes', 'No'),
(143, 7, 'stu@xyz.com', 'STU', 'Good', 'Yes', 'Yes'),
(143, 8, 'vwx@xyz.com', 'VWX', 'Bad', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `route_batch`
--

CREATE TABLE `route_batch` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `batch_name` text NOT NULL,
  `count` int(11) NOT NULL,
  `type` text NOT NULL,
  `status` text NOT NULL,
  `actions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_batch`
--

INSERT INTO `route_batch` (`id`, `batch_id`, `batch_name`, `count`, `type`, `status`, `actions`) VALUES
(149, 1, 'ABC', 25, 'Transfers', 'Good', 'None'),
(149, 2, 'DEF', 30, 'Transfers', 'Good', 'None'),
(149, 3, 'GHI', 35, 'Reversals', 'Bad', 'Refund'),
(149, 4, 'JKL', 40, 'Reversals', 'Bad', 'Refund'),
(149, 5, 'MNO', 45, 'Linked Accounts', 'Good', 'None'),
(143, 6, 'PQR', 50, 'Linked Accounts', 'Bad', 'None'),
(143, 7, 'STU', 55, 'Transfers', 'Good', 'Refund'),
(143, 8, 'VWX', 60, 'Reversals', 'Bad', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `route_payments`
--

CREATE TABLE `route_payments` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_payments`
--

INSERT INTO `route_payments` (`id`, `payment_id`, `amount`, `email`, `contact`, `createdAt`, `status`) VALUES
(149, 1, 1000, 'abc@xyz.com', 1234567890, '2022-02-02', 'Processed'),
(149, 2, 2000, 'def@xyz.com', 1234567890, '2022-02-16', 'Processed'),
(149, 3, 3000, 'ghi@xyz.com', 1235678410, '2022-02-13', 'Processing'),
(149, 4, 4000, 'jkl@xyz.com', 1234012583, '2022-02-02', 'Processing'),
(143, 5, 5000, 'mno@xyz.com', 1234567890, '2022-02-01', 'Failed'),
(149, 6, 6000, 'pqr@xyz.com', 1234567890, '2022-02-26', 'Failed'),
(143, 7, 7000, 'stu@xyz.com', 1234567890, '2022-02-16', 'Processed'),
(143, 8, 8000, 'vwx@xyz.com', 1234567890, '2022-02-07', 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `route_reversals`
--

CREATE TABLE `route_reversals` (
  `id` int(11) NOT NULL,
  `reversal_id` int(11) NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_reversals`
--

INSERT INTO `route_reversals` (`id`, `reversal_id`, `transfer_id`, `amount`, `createdAt`) VALUES
(149, 1, 11, 1000, '2022-02-02'),
(149, 2, 12, 2000, '2022-02-16'),
(149, 3, 13, 3000, '2022-02-09'),
(149, 4, 14, 4000, '2022-02-28'),
(149, 5, 15, 5000, '2022-02-01'),
(143, 6, 16, 6000, '2022-02-26'),
(143, 7, 17, 7000, '2022-02-23'),
(143, 8, 18, 8000, '2022-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `route_transfers`
--

CREATE TABLE `route_transfers` (
  `id` int(11) NOT NULL,
  `transfer_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `transfer_status` text NOT NULL,
  `settlement_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_transfers`
--

INSERT INTO `route_transfers` (`id`, `transfer_id`, `source_id`, `amount`, `createdAt`, `transfer_status`, `settlement_status`) VALUES
(149, 1, 11, 1000, '2022-02-02', 'Created', 'Processed'),
(149, 2, 12, 2000, '2022-02-16', 'Created', 'Processed'),
(149, 3, 13, 3000, '2022-02-13', 'Pending', 'Processing'),
(149, 4, 14, 4000, '2022-02-02', 'Pending', 'Processing'),
(149, 5, 15, 5000, '2022-02-01', 'Pending', 'Processing'),
(143, 6, 16, 6000, '2022-02-26', 'Pending', 'On hold'),
(143, 7, 17, 7000, '2022-02-07', 'Reversed', 'On hold'),
(143, 8, 18, 8000, '2022-02-07', 'Failed', 'Processed');

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

CREATE TABLE `settlements` (
  `id` int(10) NOT NULL,
  `sid` varchar(20) NOT NULL,
  `amt` int(10) NOT NULL,
  `fee` int(10) NOT NULL,
  `tax` int(10) NOT NULL,
  `createe` date NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settlements`
--

INSERT INTO `settlements` (`id`, `sid`, `amt`, `fee`, `tax`, `createe`, `status`) VALUES
(149, 'abix342', 1700, 1800, 180, '2022-02-01', 'fail'),
(149, 'ayte849', 5700, 5800, 580, '2022-02-08', 'fail'),
(149, 'setid42', 1300, 1200, 200, '2022-01-25', 'success'),
(149, 'setid701', 3200, 3300, 300, '2022-02-01', 'success'),
(143, 'setid901', 300, 350, 350, '2022-01-31', 'success'),
(149, 'setid92', 2200, 2300, 400, '2022-02-27', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `email` varchar(35) COLLATE utf8_bin NOT NULL,
  `pwd` varchar(15) COLLATE utf8_bin NOT NULL,
  `btype` char(50) COLLATE utf8_bin NOT NULL DEFAULT 'Not Registered',
  `name` text COLLATE utf8_bin NOT NULL,
  `cno` int(10) NOT NULL,
  `otp` int(255) NOT NULL,
  `status` int(10) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `email`, `pwd`, `btype`, `name`, `cno`, `otp`, `status`, `added_on`) VALUES
(119, 'raj@gmail.com', '2345', 'Socity', 'raj', 98765356, 14695, 1, '2022-01-29 12:39:30'),
(143, 'abc@gmail.com', '2yG9q7O7s42BI', 'Proprietorship', 'abc', 769854323, 81521, 0, '2022-01-30 07:39:30'),
(145, 'project1.check@gmail.com', '2yYCAxSSsi8Rw', 'Unregistered Business', 'abc', 769854323, 64016, 0, '2022-01-30 07:43:55'),
(149, 'gulati05.komal@gmail.com', '2yfpijg/cwJhQ', 'Private Limited', 'komal', 769854323, 14745, 1, '2022-02-03 10:01:59'),
(151, 'rajkumargulati9019@gmail.com', '2yG9q7O7s42BI', 'Proprietorship', 'Raj', 769854323, 11395, 1, '2022-02-03 10:22:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD UNIQUE KEY `bid` (`bid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `button`
--
ALTER TABLE `button`
  ADD KEY `id` (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispute`
--
ALTER TABLE `dispute`
  ADD UNIQUE KEY `did` (`did`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD KEY `id` (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `oid` (`oid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD UNIQUE KEY `rid` (`rid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `route_accounts`
--
ALTER TABLE `route_accounts`
  ADD KEY `id` (`id`);

--
-- Indexes for table `route_batch`
--
ALTER TABLE `route_batch`
  ADD KEY `id` (`id`);

--
-- Indexes for table `route_payments`
--
ALTER TABLE `route_payments`
  ADD KEY `id` (`id`);

--
-- Indexes for table `route_reversals`
--
ALTER TABLE `route_reversals`
  ADD KEY `id` (`id`);

--
-- Indexes for table `route_transfers`
--
ALTER TABLE `route_transfers`
  ADD KEY `id` (`id`);

--
-- Indexes for table `settlements`
--
ALTER TABLE `settlements`
  ADD UNIQUE KEY `sid` (`sid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `E-Mail` (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `batch_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `button`
--
ALTER TABLE `button`
  ADD CONSTRAINT `button_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `dispute`
--
ALTER TABLE `dispute`
  ADD CONSTRAINT `dispute_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `refund`
--
ALTER TABLE `refund`
  ADD CONSTRAINT `refund_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `route_accounts`
--
ALTER TABLE `route_accounts`
  ADD CONSTRAINT `route_accounts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `route_batch`
--
ALTER TABLE `route_batch`
  ADD CONSTRAINT `route_batch_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `route_payments`
--
ALTER TABLE `route_payments`
  ADD CONSTRAINT `route_payments_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `route_reversals`
--
ALTER TABLE `route_reversals`
  ADD CONSTRAINT `route_reversals_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `route_transfers`
--
ALTER TABLE `route_transfers`
  ADD CONSTRAINT `route_transfers_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);

--
-- Constraints for table `settlements`
--
ALTER TABLE `settlements`
  ADD CONSTRAINT `settlements_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
