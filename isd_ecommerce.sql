-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 10:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isd_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_image`, `category_is_active`) VALUES
(6, 'Grocery', 'All Grocery Items', '../assets/images/category/Grocery-category.jpg', 1),
(7, 'Computer', 'All Computer Items', '../assets/images/category/Computer-category.jpg', 1),
(8, 'Electronics', 'All Electronics Items', '../assets/images/category/Electronics-category.jpg', 1),
(9, 'Mobile', 'All types of mobile items', '../assets/images/category/Mobile-category.jpg', 1),
(10, 'Kids Zone', 'All kids items', '../assets/images/category/Kids-zone-category.png', 1),
(11, 'Clothing', 'All clothing items', '../assets/images/category/clothing-category.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cutomers`
--

CREATE TABLE `cutomers` (
  `customers_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `upazilla` varchar(255) NOT NULL,
  `post_code` int(4) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_amount` double NOT NULL,
  `order_time` datetime NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'processing',
  `shipping_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0,
  `sub_category_id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_model` varchar(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(100) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `unit_price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `sub_category_id`, `product_code`, `product_brand`, `product_model`, `product_name`, `product_size`, `product_color`, `unit_price`, `quantity`, `product_description`, `product_image`, `product_is_active`) VALUES
(1, 7, 5, '7-5-5681', 'HP', 'HP Probook', 'HP ProBook 440 G7 10th Gen Intel Core i5 10210U', 'Unit', 'Grey', 64800, 5, 'Notebook Model - HP ProBook 440 G7, Notebook Series - ProBook, Processor Brand - Intel, Processor Generation - 10th Gen, Processor Model - Core i5 10210U, Processor Base Frequency - 1.60 GHz, Processor Max Turbo Frequency - 4.20 GHz, Processor Core - 4, Processor Thread - 8, Processor Cache - 6 MB, Display Size - 14 Inch, Display Technology - FHD LED Display, Display Resolution - 1920 x 1080, Display Surface - Anti-Glare, Touch Display - No, Memory (RAM) - 4 GB, Installed Memory Details - 1 x 4 GB, Memory Type - DDR4, Memory Bus (MHz) - 3200 MHz, Total Memory Slot - 2, Empty Memory Slot - 1, Max Memory Support - 32 GB, Optane Memory - No, Storage - 1 TB HDD, Installed HDD Type - SATA 3, HDD RPM - 5400 RPM, SSD Expansion Slot - 1 x M.2 PCIe Blank SSD Slot, Optical Drive - No-ODD, Multimedia Card Slot - 1, Supported Multimedia Card - Supports SD, SDHC, SDXC, Graphics Chipset - Intel UHD Graphics 620, Graphics Memory Accesibility - Integrated, Graphics Memory - Shared, LAN - Realtek 10/100/1000 GbE NIC, WiFi - Intel 802.11ac (2x2), Bluetooth - Bluetooth 5, NFC - No, USB 2 Port - 1 x USB2.0, USB 3 Port - 2 x USB3.1 Gen 1, USB C / Thunderbolt Port - 1 x USB3.1 Gen 1 Type-C, HDMI Port - 1, DP Port - No, D-SUB / VGA Port - No, Headphone Port - Combo, Microphone Port - Combo, Speaker - Stereo speakers, Microphone - Yes, WebCam - HD Webcam, Keyboard Layout - Spill-resistant, Keyboard Back-lit - No, RGB Keyboard - No, Num Key pad - No, Pointing Device - Clickpad with multi-touch gesture support, Finger Print Sensor - Yes, Face Detection - No, TPM - Yes, Battery - 3 Cell, Battery Capacity - 45Wh, Battery Type - Li-Ion, Power Adapter - 45W / 65W AC power adapter, Operating System - Windows 10 Home, Color - Silver, Weight - 1.6Kg, Special Feature - Finger Print Sensor, Stereo speakers, integrated microphone (mono or dual array) (Audio), Clickpad with multi-touch gesture support (Pointing Devices), 720p HD camera; IR Camera (Camera), Others - HDD Type: SATA 5400RPM, Wireless technologies: (2x2) WLAN and Bluetooth 5 Combo, Expansion slots: 1 SD (Supports SD, SDHC, SDXC.), 1 AC power, Network Interface: Realtek 10/100/1000 GbE NIC, Battery Wh: 45 Wh, Warranty - 3 year (1 year for Battery and Adapter), Warranty Claim Duration (Approximate) - Estimated Warranty Claim Duration 30 Days. It may take additional time up to 60 days, Part Number - 6XJ55AV-3Y (4GB-FPS-FHD), Country of Origin - USA, Made in / Assembled in - China', 'assets/img/products/7-5-5681.png', 1),
(2, 8, 10, '8-10-7441', 'Samsung', 'UA32T4500ARSFS', 'Samsung 32\' UA32T4500ARSFS Smart HD TV - Black', 'Unit', 'Black', 28000, 3, 'A smart TV, also known as a connected TV (CTV), is a traditional television set with integrated Internet and interactive Web 2.0 features, which allows users to stream music and videos, browse the internet, and view photos. ... In smart TVs, the operating system is preloaded or is available through the set-top box.', 'assets/img/products/8-10-7441.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `shipping_type` varchar(255) NOT NULL,
  `shipping_company` varchar(255) NOT NULL,
  `shipping_status` varchar(255) NOT NULL DEFAULT 'shipped'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_description` varchar(255) NOT NULL,
  `sub_category_image` varchar(255) NOT NULL,
  `sub_category_is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_description`, `sub_category_image`, `sub_category_is_active`) VALUES
(1, 6, 'Tea, Veberage & Drinks', 'All Types of Drinks', '../assets/images/sub_categories/Tea-veberage.jpg', 1),
(2, 6, 'Dairy Items', 'All Type of Dairy Items', '../assets/images/sub_categories/Dairy-sub-category.jpg', 1),
(3, 6, 'Snacks', 'All Snacks Items', '../assets/images/sub_categories/snacks-sub-category.jpg', 1),
(4, 7, 'Desktop ', 'All Type of Desktop Computer', '../assets/images/sub_categories/desktop-sub-category.jpg', 1),
(5, 7, 'Laptop', 'All Type of Laptop', '../assets/images/sub_categories/laptop-sub-category.jpg', 1),
(6, 7, 'All-in-One Computer', 'All types of all in one computer', '../assets/images/sub_categories/all-in-one-sub-category.jpg', 1),
(7, 7, 'Computer Accessories', 'All type of computer accessories', '../assets/images/sub_categories/com-accessories-sub-category.jpg', 1),
(8, 8, 'Fridge', 'All types of fridge', '../assets/images/sub_categories/fridge-sub-category.jpg', 1),
(9, 8, 'Air Conditioner', 'All Type of AC', '../assets/images/sub_categories/ac-sub-category.jpg', 1),
(10, 8, 'TV', 'All Type of TV', '../assets/images/sub_categories/tv-sub-category.jpg', 1),
(11, 8, 'Washing Machine', 'All Type of Washing Machie', '../assets/images/sub_categories/washing-machine-sub-category.jpg', 1),
(12, 8, 'FAN', 'All Type of FAN', '../assets/images/sub_categories/fan-sub-category.jpg', 1),
(13, 8, 'Others Electronics', 'All others electronics items', '../assets/images/sub_categories/other-electronic-product-sub-category.png', 1),
(14, 9, 'Smart Phone', 'All type of smart phone', '../assets/images/sub_categories/smart-phone-sub-category.jpg', 1),
(15, 9, 'Feature Phone', 'All type of feature phone', '../assets/images/sub_categories/feature-phone-sub-category.png', 1),
(16, 9, 'Mobile Accessories', 'All type of mobile accessories', '../assets/images/sub_categories/mobile-accessories-sub-category.jpeg', 1),
(17, 8, 'Watch', 'All types of watches', '../assets/images/sub_categories/watch-sub-category.jpg', 1),
(18, 10, 'Kids Dress', 'All Type of kids dress', '../assets/images/sub_categories/kids-dress-sub-category.jpg', 1),
(19, 10, 'Kids Food', 'All types of kids food', '../assets/images/sub_categories/kids-food-sub-category.jpg', 1),
(20, 10, 'Kids Diaper', 'All Type of Diapers', '../assets/images/sub_categories/kids-diaper-sub-category.jpg', 1),
(21, 10, 'Kids Toys', 'All types of toys', '../assets/images/sub_categories/kids-toys-sub-category.jpg', 1),
(22, 11, 'Mens Clothing', 'All Type of Mens Clothing', '../assets/images/sub_categories/mens-clothing-sub-category.jpg', 1),
(23, 11, 'Womens Clothing', 'All Types womens clothings', '../assets/images/sub_categories/women-clothing-sub-category.jpg', 1),
(24, 11, 'Mens Footwear', 'All types of mens footwear', '../assets/images/sub_categories/mems-footwear-sub-category.jpg', 1),
(25, 11, 'Womens Footwear', 'All Types womens footwear', '../assets/images/sub_categories/women-footwear-clothing-sub-category.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `division` varchar(20) NOT NULL,
  `post_code` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role` varchar(20) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `date_of_birth`, `email_address`, `phone_no`, `address`, `city`, `division`, `post_code`, `password`, `user_role`, `created_at`) VALUES
(1, 'Md Jahirul', 'Islam', 'male', '1988-05-15', 'jahirbd350@gmail.com', '01777844111', 'Air Force Headquarters Reception, Dhaka Cant', 'Dhaka', 'Dhaka', 1206, '12345', 'admin', '2020-11-26 09:37:24'),
(2, 'Tarekul', 'Islam', 'male', '2020-11-17', 'tarek026@gmail.com', '01777844111', 'Air Force Headquarters Reception, Dhaka Cant', 'Dhaka', 'Dhaka', 1206, '12345', 'user', '2020-11-26 09:36:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cutomers`
--
ALTER TABLE `cutomers`
  ADD PRIMARY KEY (`customers_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_fk0` (`customer_id`),
  ADD KEY `order_fk1` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_fk0` (`customer_id`),
  ADD KEY `payment_fk1` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `products_fk0` (`category_id`),
  ADD KEY `products_fk1` (`sub_category_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`),
  ADD KEY `shipping_fk0` (`order_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `shopping_cart_fk0` (`product_id`),
  ADD KEY `shopping_cart_fk1` (`customer_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD KEY `sub_category_fk0` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cutomers`
--
ALTER TABLE `cutomers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_fk0` FOREIGN KEY (`customer_id`) REFERENCES `cutomers` (`customers_id`),
  ADD CONSTRAINT `order_fk1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_fk0` FOREIGN KEY (`customer_id`) REFERENCES `cutomers` (`customers_id`),
  ADD CONSTRAINT `payment_fk1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `products_fk1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`sub_category_id`);

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_fk0` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_fk0` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `shopping_cart_fk1` FOREIGN KEY (`customer_id`) REFERENCES `cutomers` (`customers_id`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_fk0` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
