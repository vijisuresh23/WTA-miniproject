-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2020 at 03:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `Password`) VALUES
('admin001', '0123456');

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

CREATE TABLE `bank_details` (
  `id` int(11) NOT NULL,
  `KCN` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `ifsc` varchar(10) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `Bank_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `KCN`, `name`, `number`, `ifsc`, `branch`, `Bank_name`) VALUES
(2, 98765432, 'Rajesh S p', '4352617890', 'abcd1234', 'mandya', 'CANARA BANK');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_registration`
--

CREATE TABLE `buyer_registration` (
  `ACN` varchar(20) NOT NULL,
  `OrgName` varchar(20) NOT NULL,
  `Owner` varchar(20) NOT NULL,
  `OrgType` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `District` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `PhoneNum` varchar(20) NOT NULL,
  `PostalCode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_registration`
--

INSERT INTO `buyer_registration` (`ACN`, `OrgName`, `Owner`, `OrgType`, `Password`, `District`, `State`, `PhoneNum`, `PostalCode`) VALUES
('rahulkumar', 'Abc', 'Rahul', 'canteen', '124bd1296bec0d9d93c7b52a71ad8d5b', 'Mandya', 'Karnataka', '9874587425', 560600);

-- --------------------------------------------------------

--
-- Table structure for table `fam_registration`
--

CREATE TABLE `fam_registration` (
  `KCN` int(8) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `District` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `PhoneNum` varchar(10) NOT NULL,
  `PostalCode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fam_registration`
--

INSERT INTO `fam_registration` (`KCN`, `Fname`, `Lname`, `Password`, `District`, `State`, `PhoneNum`, `PostalCode`) VALUES
(78945612, 'nandesh', 'S P', '124bd1296bec0d9d93c7b52a71ad8d5b', 'Mysore', 'Karnataka', '8659741236', 560047),
(98765432, 'Rajesh', 'S P', '124bd1296bec0d9d93c7b52a71ad8d5b', 'Mandya', 'Karnataka', '9739557922', 566060);

-- --------------------------------------------------------

--
-- Table structure for table `new_product`
--

CREATE TABLE `new_product` (
  `id` int(11) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `Price` int(10) NOT NULL,
  `Info` varchar(100) NOT NULL,
  `Year` int(4) NOT NULL,
  `KCN` int(8) NOT NULL,
  `Mark` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_product`
--

INSERT INTO `new_product` (`id`, `Name`, `Quantity`, `Price`, `Info`, `Year`, `KCN`, `Mark`) VALUES
(1, 'Chilli', 45, 50, 'dried red chilli', 2020, 98765432, 1),
(2, 'Chana dal', 50, 120, 'polished and cleaned', 2020, 98765432, 2),
(3, 'Raagi', 100, 24, 'black raggi', 2020, 98765432, 2),
(4, 'wheat', 45, 65, 'clean and polished wheat', 2019, 98765432, 1),
(5, 'wheat', 100, 25, 'polished and cleaned', 2020, 98765432, 2),
(14, 'onion', 45, 35, 'onions', 2019, 78945612, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ACN` varchar(20) NOT NULL,
  `products` varchar(100) NOT NULL,
  `quant` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `payment_mode` varchar(30) NOT NULL,
  `shipping_address` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ACN`, `products`, `quant`, `price`, `date`, `payment_mode`, `shipping_address`, `status`) VALUES
(1, 'rahulkumar', 'peanuts', 20, 1120, '2020-12-20', 'cod', NULL, 0),
(2, 'rahulkumar', 'Puffed Rice', 1, 30, '2020-12-20', 'cod', NULL, 0),
(3, 'rahulkumar', 'Green peas', 1, 300, '2020-12-20', 'cod', NULL, 0),
(4, 'rahulkumar', 'Wheat Flour', 7, 413, '2020-12-20', 'dbt', NULL, 0),
(5, 'rahulkumar', 'Moong dal', 12, 828, '2020-12-20', 'dbt', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `price_details`
--

CREATE TABLE `price_details` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_details`
--

INSERT INTO `price_details` (`id`, `product_name`, `price`, `date`) VALUES
(1, 'Chana Dal(Premium)', '80', '2020-12-15'),
(2, 'Chana Dal', '80', '2020-12-18'),
(3, 'Black Chana', '100', '2020-12-07'),
(4, 'Red Rajma', '105', '2020-12-09'),
(5, 'Wheat Flour', '30', '2020-12-19'),
(6, 'Toor dal(premium)', '91', '2020-12-07'),
(7, 'Basmathi Rice', '85', '2020-12-15'),
(8, 'Moong Dal(premium)', '78', '2020-12-07'),
(9, 'Moong dal', '56', '2020-12-07'),
(10, 'Peanuts', '48', '2020-12-07'),
(11, 'Roasted Peanuts', '52', '2020-12-07'),
(12, 'Fennel seeds', '98', '2020-12-07'),
(13, 'Green peas', '300', '2020-12-07'),
(14, 'Kabuli Chana', '108', '2020-12-07'),
(15, 'Puffed Rice', '30', '2020-12-07'),
(16, 'Thick Poha', '36', '2020-12-07'),
(17, 'Coriander seeds', '56', '2020-12-07'),
(18, 'Dried Red Chilli', '120', '2020-12-07'),
(19, 'Jaggery', '60', '2020-12-07'),
(20, 'Mustard Seeds', '200', '2020-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(250) NOT NULL,
  `code` varchar(100) NOT NULL,
  `price` double(9,2) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `image`) VALUES
(2, 'Chana Dal premium', 'dal001', 100.00, 'product-images/chanadal.jpg'),
(3, 'Chana dal', 'dal002', 80.00, 'product-images/chanadal.jpg'),
(4, 'Black Chana', 'dal003', 120.00, 'product-images/blackchana.jpg'),
(5, 'Red Rajma', 'dal004', 140.00, 'product-images/redrajma.jpg'),
(6, 'Wheat Flour', 'flour001', 59.00, 'product-images/wheatFlour.jpg'),
(7, 'Toor dal premium', 'dal005', 102.00, 'product-images/toordal.jpg'),
(8, 'Basmathi Rice', 'rice001', 100.00, 'product-images/basmathi.jpg'),
(9, 'Moong Dal premium', 'dal006', 85.00, 'product-images/moongdal.jpg'),
(10, 'Moong dal', 'dal007', 69.00, 'product-images/moongdal.jpg'),
(11, 'Peanuts', 'code008', 56.00, 'product-images/peanuts.jpg'),
(12, 'Roasted peanuts', 'dal009', 60.00, 'product-images/roastedpeanuts.jpg'),
(13, 'Fennel Seeds', 'dal010', 104.00, 'product-images/fennelseeds.jpg'),
(14, 'Green peas', 'dal011', 300.00, 'product-images/greenpeas.jpg'),
(15, 'Kabuli chana', 'dal012', 120.00, 'product-images/kabulichana.jpg'),
(16, 'Puffed Rice', 'rice002', 30.00, 'product-images/puffedrice.jpg'),
(17, 'Thick Poha', 'rice003', 42.00, 'product-images/thickpoha.jpg'),
(18, 'Coriander Seeds', 'dal013', 62.00, 'product-images/coriander.jpg'),
(19, 'Dried Red Chilli', 'dal014', 120.00, 'product-images/chilli.jpg'),
(20, 'Jaggery', 'rice004', 60.00, 'product-images/jaggery.jpg'),
(21, 'Mustard Seeds', 'dal015', 260.00, 'product-images/mustard.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`id`, `Name`, `PhoneNumber`, `Address`, `email`) VALUES
(1, 'Navata Road Transport\r\n', '874521369', '139/18, Transport Street Opp. KR Puram, Railway Station, B Narayanapura, Bengaluru, Karnataka 560016', 'navata@gmail.com'),
(2, 'Sri Lakshmivenkateshwars Transport', '8659743256', '#38, subbarayanapalya Bangalore 560060, Kengeri, Bengaluru, Karnataka 560060', 'srilakshmivenkateshwara@gmail.com'),
(3, 'A N Kerala Transport Service', '8965744503', 'Above S L V Bakery, Near Kempamma Devi Temple, Nice Road Junction, Mysore, Road,, Kengrai, Bengaluru, Karnataka 560060', 'ankts@gmail.com'),
(4, 'Sri Lakshmi Enterprises', '7584425113', '#5 devegere cross gudimavu village kumbalagodu bangalore 560074', 'srilakshmi@gmail.com'),
(5, 'Ishwarya Transports', '8902140361', '#251/1 Near Kempamma Devi Temple, Nice Road Junction, Mysore, Road,, Kengrai, Bengaluru, Karnataka 560060', 'ishwaryatransports@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `KCN` (`KCN`);

--
-- Indexes for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  ADD PRIMARY KEY (`ACN`);

--
-- Indexes for table `fam_registration`
--
ALTER TABLE `fam_registration`
  ADD PRIMARY KEY (`KCN`);

--
-- Indexes for table `new_product`
--
ALTER TABLE `new_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `KCN` (`KCN`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ACN` (`ACN`);

--
-- Indexes for table `price_details`
--
ALTER TABLE `price_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_details`
--
ALTER TABLE `bank_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `new_product`
--
ALTER TABLE `new_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `price_details`
--
ALTER TABLE `price_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_details`
--
ALTER TABLE `bank_details`
  ADD CONSTRAINT `bank_details_ibfk_1` FOREIGN KEY (`KCN`) REFERENCES `fam_registration` (`KCN`);

--
-- Constraints for table `new_product`
--
ALTER TABLE `new_product`
  ADD CONSTRAINT `new_product_ibfk_1` FOREIGN KEY (`KCN`) REFERENCES `fam_registration` (`KCN`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ACN`) REFERENCES `buyer_registration` (`ACN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
