-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 07:28 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `icon` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`) VALUES
(1, 'Smartphone', 'phone'),
(2, 'Smartcam', 'cam'),
(3, 'Laptop', 'laptop'),
(4, 'Smartwatch', 'watch'),
(5, 'Smartspeaker', 'speaker'),
(6, 'SmartVR', 'vr');

-- --------------------------------------------------------

--
-- Table structure for table `command`
--

CREATE TABLE `command` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statut` varchar(1000) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `command`
--

INSERT INTO `command` (`id`, `id_produit`, `quantity`, `dat`, `statut`, `id_user`) VALUES
(147, 17, 3, '2020-03-12 17:37:40', 'ordered', 5),
(148, 42, 1, '2020-03-12 18:23:16', 'ordered', 12),
(149, 42, 1, '2020-03-12 18:23:19', 'ordered', 12);

-- --------------------------------------------------------

--
-- Table structure for table `details_command`
--

CREATE TABLE `details_command` (
  `id` int(11) NOT NULL,
  `product` varchar(1000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_command` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `statut` varchar(1000) NOT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details_command`
--

INSERT INTO `details_command` (`id`, `product`, `quantity`, `price`, `id_command`, `id_user`, `user`, `address`, `country`, `city`, `statut`, `date`) VALUES
(44, 'Nexus 6P', 3, 1497, 147, 5, 'Ismail Ghallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'ready', '2020-03-12'),
(46, 'Macbook', 1, 123, 148, 12, 'Muhammad Ali Jinnah', 'Arifwala ABC', 'Morocco', 'Arifwala', 'ready', '2020-03-12'),
(47, 'Macbook', 1, 123, 149, 12, 'Muhammad Ali Jinnah', 'Arifwala ABC', 'Morocco', 'Arifwala', 'ready', '2020-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  `thumbnail` varchar(1000) NOT NULL,
  `promo` varchar(1000) NOT NULL,
  `stock` int(5) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_category`, `name`, `description`, `price`, `id_picture`, `thumbnail`, `promo`, `stock`) VALUES
(7, 1, 'Samsung s7 edge', '5.50-inch 1440x2560 display powered by 1.6GHz octa-core processor alongside 4GB of RAM and 12-megapixel', 560, 2, 'galaxy-s7-edge-black.png', '', 34),
(8, 1, 'Iphone 7', 'Features 3G, 4.7â€³ LED-backlit IPS LCD display, 12 MP camera, Wi-Fi, GPS, Bluetooth', 700, 8, 'rsz_iphone-7-jet-black.jpg', '', 123),
(9, 2, 'Gopro Hero 5', ' GoPro HERO5 Black features Supports 4K30, 2.7K60, 1080p120 Video, Capture 12MP Photos at 30fps', 450, 9, 'gopro5.png', '1', 23),
(11, 6, 'Oculus rift', 'The Oculus Rift is a virtual reality system that completely immerses you inside virtual worlds', 600, 10, 'Oculus_Product_Dynamic 45.jpg', '1', 3),
(12, 3, 'MSI GP62 Leopard Pro', 'In-depth review of the MSI GP62-2QEi781FD (Intel Core i7 5700HQ, NVIDIA GeForce GTX 950M, 15.6\", 2.3 kg) ... The MSI GE series is already the manufacturer\'s entry-level gaming series. ..... ', 839, 12, 'msi-gp62-6qf-product_pictures-3d1.png', '', 11),
(13, 5, 'Amazon Echo', 'Amazon Echo is a hands-free speaker you control with your voice. Echo connects to the Alexa Voice Service to play music, provide information, news, sports ...', 179, 13, 'amazon-echo-image.jpg', '', 22),
(14, 4, 'Apple Watch', 'The new Apple Watch is the ultimate device for your healthy life. Choose from a range of models including Apple Watch Series 2 and Apple Watch Nike+', 349, 14, 'apple-watch-premium-design-vs-pebble-time-round-classic-design.jpg', '', 24),
(15, 1, 'Google Pixel XL', 'XL 5.5\" Phone 128GB Quite Black Cell Smart. GOOGLE PIXEL XL 5.5\" Black 32GB TRUE ANDROID PHONE CDMA+GSM WORLD UNLOCKED', 649, 15, 'pixel.png', '', 33),
(16, 2, 'Canon EOS 7D', 'The EOS 7D features a Canon-designed 18.0 Megapixel APS-C size CMOS sensor that captures such a high level of resolution it\'s easy to crop images for ...', 889, 16, 'EOS 7D Mark II Hero.jpg', '', 56),
(17, 1, 'Nexus 6P', 'All-metal design Unlocked, LTE smartphone with a powerful 2GHz Snapdragon 810 V2.1 Processor and the newest Android software, Android 6.0 marshmallow.', 499, 17, 'nexus-6p-topic-full.png', '', 0),
(40, 3, 'Logo', 'Logo', 0, 18, 'logo.png', '', 1),
(42, 3, 'Macbook', 'Macbook pro', 123, 0, 'download.jpg', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(1000) NOT NULL,
  `lastname` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `address`, `city`, `country`, `role`) VALUES
(5, 'admin@gmail.com', 'Muhammad', 'Ayoub', 'admin', 'N 23 Lot El Waha Errachidia', 'Errachidia', 'Isreal', 'admin'),
(6, 'ismail16smakosh23@gmail.com', 'ahmed', 'ali', 'ahmed', 'N 26 Lot El Waha Errachidia', 'Errachidia', 'Morocco', 'client'),
(7, 'client', 'omar', 'ahmed', 'client', 'N 22 Lot El Waha Errachidia', 'Errachidia', 'Morocco', 'client'),
(8, 'anas@anas.com', 'anas', 'mazouni', 'anas', 'N 20 Lot El dunno Cairo', 'Cairo', 'Morocco', 'client'),
(12, 'kanjar@gmail.com', 'kanjar', 'kate', '12345', 'Arifwala ABC', 'ABC', 'Isreal', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details_command`
--
ALTER TABLE `details_command`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `command`
--
ALTER TABLE `command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `details_command`
--
ALTER TABLE `details_command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
