-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 07:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(30) NOT NULL,
  `b_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`) VALUES
(3, 'Nestle'),
(4, 'Cadbury'),
(5, 'Britannia'),
(6, 'Hatsun Agro'),
(7, 'Kwality Wall\'s'),
(8, 'KRBL'),
(10, 'P&G');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `quantity`) VALUES
(22, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(30) NOT NULL,
  `c_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(1, 'Beverages'),
(2, 'Jarred Goods'),
(3, 'Dry/Baking Goods'),
(4, 'Cleaners'),
(5, 'Paper Goods'),
(6, 'Personal Care');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`) VALUES
(4, 14, 100, 1376802066, 5, '2020-05-29 02:19:07', 'completed'),
(7, 14, 50, 71447007, 1, '2020-05-29 02:19:07', 'completed'),
(8, 14, 450, 398232824, 3, '2020-05-29 02:19:07', 'completed'),
(9, 14, 40, 1790326754, 1, '2020-05-29 02:19:07', 'completed'),
(10, 14, 60, 1790326754, 2, '2020-05-29 02:19:07', 'completed'),
(13, 14, 50, 347294224, 1, '2020-05-29 02:19:07', 'completed'),
(14, 14, 20, 415256965, 1, '2020-05-29 16:23:06', 'completed'),
(15, 15, 120, 108792730, 2, '2020-05-29 16:23:06', 'completed'),
(16, 0, 150, 999618523, 1, '2020-05-29 17:43:16', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(50) NOT NULL,
  `pay_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `acc_no` int(50) NOT NULL,
  `acc_name` text NOT NULL,
  `exp` text NOT NULL,
  `cvv` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `pay_date`, `acc_no`, `acc_name`, `exp`, `cvv`) VALUES
(1, '2020-05-29 02:46:59', 2147483647, 'Ayushi', '10/2021', 353),
(2, '2020-05-29 02:49:01', 2147483647, 'Ayushi', '10/2021', 353),
(3, '2020-05-29 02:51:00', 2147483647, 'Ayushi', '10/2021', 353),
(4, '2020-05-29 16:23:36', 2147483647, 'diksha', '09/2022', 456);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `b_id` int(20) NOT NULL,
  `c_id` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `b_id`, `c_id`, `date`, `product_title`, `product_img`, `product_price`, `product_description`) VALUES
(4, 3, 3, '2020-05-22 18:50:51', 'kitkat', '32.jpg', 30, '<p>tasty</p>'),
(5, 4, 3, '2020-05-22 18:52:47', 'Dairy Milk', '31.jpg', 20, '<p>I love this</p>'),
(6, 3, 3, '2020-05-22 18:56:02', 'Maggie', '21.jpg', 40, '<p>Have this maggie.</p>'),
(7, 6, 4, '2020-05-22 18:56:43', 'Vim', '18.jpg', 60, '<p>Used to wash</p>'),
(8, 7, 2, '2020-05-22 18:57:34', 'Corn Flakes', '30.jpg', 150, '<p>Have this</p>'),
(9, 6, 3, '2020-05-22 19:00:01', 'Sugar', '28.jpg', 50, '<p>Have this sugar</p>'),
(10, 10, 6, '2020-05-29 17:11:45', 'Dove', '22.jpg', 120, '<p>This is 120ml bottle of dove.</p>'),
(11, 8, 6, '2020-05-29 17:13:23', 'Fair & Lovely', '47.jpg', 45, '<p>Medium size tube of Fair &amp; Lovely.</p>'),
(12, 10, 6, '2020-05-29 17:14:47', 'Nivea Body Lotion', '45.jpg', 200, '<p>This is 150 ml per bottle of body lotion.</p>'),
(13, 8, 5, '2020-05-29 17:16:01', 'Toilet Paper', '42.jpg', 85, '<p>Medium size roll.</p>'),
(14, 5, 5, '2020-05-29 17:17:11', 'Paper Bag', '43.jpg', 2, '<p>One paper bag costs 2 rs.</p>'),
(15, 7, 5, '2020-05-29 17:18:36', 'Paper Plate', '44.jpg', 10, '<p>10 pieces costs Rs 20.</p>'),
(16, 5, 4, '2020-05-29 17:22:54', 'Windex', '39.jpg', 90, '<p>Good Cleansing agent.</p>'),
(17, 8, 0, '2020-05-29 17:23:51', 'All Out', '40.jpg', 105, '<p>One bottle for Rs 105</p>'),
(18, 7, 4, '2020-05-29 17:24:56', 'Complete Cleansing Kit', '41.jpg', 350, '<p>Complete kit for cleaning</p>'),
(19, 3, 2, '2020-05-29 17:26:11', 'Pickles', '36.jpg', 100, '<p>Medium size jar.</p>'),
(20, 4, 2, '2020-05-29 17:28:06', 'Jam', '37.jpg', 115, '<p>Mix fruit jam (small size jar).</p>'),
(21, 5, 1, '2020-05-29 17:29:15', 'Tang', '33.jpg', 200, '<p>Large size packet.</p>'),
(22, 3, 1, '2020-05-29 17:30:21', 'Pepsi', '34.jpg', 45, '<p>One litre bottle.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `user` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `country` text NOT NULL,
  `zip` int(40) NOT NULL,
  `contact` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`user`, `address1`, `address2`, `country`, `zip`, `contact`) VALUES
('0', 'ROOM NO-104,CHANDRABHAGA HOSTEL,JNU', 'New Delhi', 'India', 110067, 2147483647),
('Rakesh', 'S 25 4,Bhojubeer', 'Varanasi', 'India', 221002, 2147483647),
('Diksha', 'S 25 4', 'BHOJUBEER', 'India', 221002, 4574333),
('', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `address`) VALUES
(9, 'abc', 'abc@gmail.com', '123', 'abc'),
(10, 'xyz', 'ayushi54_scs@jnu.ac.in', 'xyz', 'S 25 4, BHOJUBEER, CANTT'),
(11, 'www', 'www@gmail.com', 'Ayushi23', 'S 25 4, BHOJUBEER, CANTT'),
(13, 'twinkle', 'abc@gmail.com', 'ayushi', 'xyz'),
(14, 'Rakesh', 'abc@gmail.com', 'rakesh', 'S 25 4'),
(15, 'Diksha', 'abc@gmail.com', 'diksha', 'S 25 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
