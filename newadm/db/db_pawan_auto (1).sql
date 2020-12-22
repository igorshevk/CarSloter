-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 01:03 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pawan_auto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adm_id` int(11) NOT NULL,
  `adm_uid` varchar(255) NOT NULL,
  `adm_password` varchar(255) NOT NULL,
  `adm_type` varchar(255) NOT NULL,
  `adm_image` varchar(255) NOT NULL,
  `adm_name` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_mobile` varchar(255) NOT NULL,
  `adm_about` text NOT NULL,
  `adm_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adm_id`, `adm_uid`, `adm_password`, `adm_type`, `adm_image`, `adm_name`, `adm_email`, `adm_mobile`, `adm_about`, `adm_status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123456', 'Admin', '', 'Gaurav sh ', 'g@gmail.com', '9971695047', 'Demo', '', '2018-02-10 06:57:06', '2018-02-10 06:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `b_id` int(11) NOT NULL,
  `b_bcat_id` int(11) NOT NULL,
  `b_title` varchar(255) NOT NULL,
  `b_image` varchar(255) NOT NULL,
  `b_desc` text NOT NULL,
  `b_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_category`
--

CREATE TABLE `tbl_blog_category` (
  `bcat_id` int(11) NOT NULL,
  `bcat_name` varchar(255) NOT NULL,
  `bcat_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_title`, `brand_image`, `brand_desc`, `brand_status`, `created_at`) VALUES
(1, 'hgfdgjh', '15-03-2018 05-44-22-1606527987-Mother-Day-Mug-08-A.jpg', '', '0', '2018-03-15 17:44:22'),
(2, 'brand1', '25-03-2018 10-34-57-611340725-c-img-1.png', '<p>brand1</p>\r\n', '1', '2018-03-25 10:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

CREATE TABLE `tbl_career` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_mobile` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_education` varchar(255) NOT NULL,
  `c_resume` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(64) NOT NULL DEFAULT '',
  `country_iso_code` varchar(255) NOT NULL,
  `country_isd_code` varchar(255) DEFAULT NULL,
  `country_flag_image` varchar(255) NOT NULL,
  `country_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`country_id`, `country_name`, `country_iso_code`, `country_isd_code`, `country_flag_image`, `country_status`, `created_at`) VALUES
(2, 'india', '91', 'f91', '05-04-2018 06-07-59-866176201-in.jpg', 1, '2018-04-04 09:54:39'),
(3, 'usa', '1', 'g1', '05-04-2018 06-07-37-1201907230-us.jpg', 1, '2018-04-04 09:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `enq_id` int(11) NOT NULL,
  `enq_name` varchar(255) NOT NULL,
  `enq_mobile` varchar(255) NOT NULL,
  `enq_email` varchar(255) NOT NULL,
  `enq_subject` varchar(255) NOT NULL,
  `enq_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`enq_id`, `enq_name`, `enq_mobile`, `enq_email`, `enq_subject`, `enq_message`, `created_at`) VALUES
(1, 'gaurav', 'gaurav@gmail.com', '9971695047', 'demo', 'hello', '2018-04-03 05:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `g_id` int(11) NOT NULL,
  `g_title` varchar(255) NOT NULL,
  `g_image` varchar(255) NOT NULL,
  `g_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mailbox`
--

CREATE TABLE `tbl_mailbox` (
  `mail_id` int(11) NOT NULL,
  `mail_to` varchar(255) NOT NULL,
  `mail_subject` text NOT NULL,
  `mail_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_maincategory`
--

CREATE TABLE `tbl_maincategory` (
  `mcat_id` int(11) NOT NULL,
  `mcat_name` varchar(255) NOT NULL,
  `mcat_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_maincategory`
--

INSERT INTO `tbl_maincategory` (`mcat_id`, `mcat_name`, `mcat_status`, `created_at`) VALUES
(1, 'Aston Martin', '1', '2018-04-03 10:54:50'),
(2, ' Alfa Romeo', '1', '2018-04-03 10:54:57'),
(3, ' Acura', '1', '2018-04-03 10:55:03'),
(4, 'Toyota\'s luxury car', '1', '2018-04-03 10:55:09'),
(5, 'Audi', '1', '2018-04-03 12:01:17'),
(6, ' Bentley', '1', '2018-04-03 12:01:24'),
(7, 'BMW', '1', '2018-04-03 12:01:32'),
(8, 'Other', '1', '2018-04-03 12:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `order_pid` int(11) NOT NULL,
  `order_cid` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `order_pid`, `order_cid`, `order_status`, `order_date`, `created_at`) VALUES
(1, 2, 1, 1, '2018-04-09', '2018-04-09 10:58:32'),
(2, 2, 1, 1, '2018-04-09', '2018-04-09 10:59:09'),
(3, 2, 2, 1, '2018-04-09', '2018-04-09 11:01:14'),
(4, 1, 2, 1, '2018-04-09', '2018-04-09 11:01:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_origin`
--

CREATE TABLE `tbl_origin` (
  `o_id` int(11) NOT NULL,
  `o_country_id` int(11) NOT NULL,
  `o_title` varchar(255) NOT NULL,
  `o_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_origin`
--

INSERT INTO `tbl_origin` (`o_id`, `o_country_id`, `o_title`, `o_status`, `created_at`) VALUES
(1, 2, 'up', 1, '2018-04-09 04:48:24'),
(2, 3, 'nkr', 1, '2018-04-09 04:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `p_id` int(11) NOT NULL,
  `p_mcat_id` int(11) NOT NULL,
  `p_o_id` int(11) NOT NULL,
  `p_title` varchar(255) NOT NULL,
  `p_year` varchar(255) NOT NULL,
  `p_mileage` varchar(255) NOT NULL,
  `p_location` varchar(255) NOT NULL,
  `p_transmission` varchar(255) NOT NULL,
  `p_condition` varchar(255) NOT NULL,
  `p_interior` varchar(255) NOT NULL,
  `p_stock` varchar(255) NOT NULL,
  `p_vin` varchar(255) NOT NULL,
  `p_exterior` varchar(255) NOT NULL,
  `p_image1` varchar(255) NOT NULL,
  `p_image2` varchar(255) NOT NULL,
  `p_image3` varchar(255) NOT NULL,
  `p_image4` varchar(255) NOT NULL,
  `p_desc` text NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `p_country` varchar(255) NOT NULL,
  `p_date` date NOT NULL,
  `p_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`p_id`, `p_mcat_id`, `p_o_id`, `p_title`, `p_year`, `p_mileage`, `p_location`, `p_transmission`, `p_condition`, `p_interior`, `p_stock`, `p_vin`, `p_exterior`, `p_image1`, `p_image2`, `p_image3`, `p_image4`, `p_desc`, `p_price`, `p_country`, `p_date`, `p_status`, `created_at`) VALUES
(1, 3, 2, 'Porsche 993 GT Cup \r\n', '2016', '22km/h', 'Scottsdale, Arizona, 85255', 'Manual', 'Excellent', ' Brown Vinal', 'werqw', 'erqwe', 'sdfsdfsd', '03-04-2018 12-54-02-1094764547-c2.jpg', '03-04-2018 12-54-02-1094764547-c1.jpg', '03-04-2018 12-54-02-1094764547-c3.jpg', '03-04-2018 12-54-02-1094764547-c6.jpg', '<p>1963 &quot;Aquila;&quot; &quot;the eagle&quot; hand built from a quality body kit supplied by FiberFab in Cupertino, California; only 150 bodys ever built; few completed; this is body number # 137; built to a very high quality with mostly newer parts; removable side windows; gull wing doors; fit and finish exceptional; build utalising a V.W. floor pan; custom gages and interior; moulded carpets with logo imprinted in them; electric headlight doors; all new wiring; very unique styling similar to a M-1 B.M.W.; totally sorted out; no issues; these bodies where produced many years ago; licensed as a 1963 V.W., no smog issues; can be driven anywhere. Shows very well; looks expensive; but a quality build for little money. Call for all the details (602) 410-4425; PAM</p>\r\n\r\n<p>Asking $17500 OBO</p>\r\n', '3425', '3', '2018-04-12', '1', '2018-04-03 10:54:02'),
(2, 3, 1, '1974 DeTomaso Pantera', '1974', '22km/h', 'Nashville, Tennessee, 37204', 'Manual', 'Excellent', 'Black', '3124124df', 'dsfws234', 'dfdsaadfg', '03-04-2018 01-10-33-492597808-c01.jpg', '03-04-2018 01-10-33-492597808-c02.jpg', '03-04-2018 01-10-33-492597808-c03.jpg', '03-04-2018 01-10-33-492597808-c04.jpg', '<p>&nbsp;</p>\r\n\r\n<p><strong>Seller&rsquo;s Description:</strong></p>\r\n\r\n<p>1974 DeTomaso Pantera L in Medium Blue with 23,950 miles. A true collector Pantera. All original paint and all original interior! Both in excellent condition. Rare color! 1 of 69 in Medium Blue in &#39;74.<br />\r\n<br />\r\nReceipts totaling $15k from last year include:</p>\r\n\r\n<p>Cooling system upgrade from Ron Davis Racing Products with stainless cooling pipes<br />\r\nnew coilovers<br />\r\ncontrol bushings<br />\r\nclutch master cylinder<br />\r\noil change/service<br />\r\nnew tires<br />\r\nbrand new Campagnolo wheels installed new from original boxes<br />\r\n<br />\r\nThe car drives and performs extremely well. No rust. Unmodified and all original, except for the much needed cooling upgrade. Original Becker radio and Sicursiv glass. All original paint and interior look exceptional!</p>\r\n', '1574', '2', '2018-04-07', '1', '2018-04-03 11:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_title`, `slider_image`, `slider_status`, `created_at`) VALUES
(1, 'slider1', '05-04-2018 03-34-46-588830833-car.jpg', '1', '2018-04-05 07:34:46'),
(2, 'slider2', '05-04-2018 03-34-58-1290778618-car.jpg', '1', '2018-04-05 07:34:58'),
(3, 'slider3', '05-04-2018 03-35-08-221828996-car.jpg', '1', '2018-04-05 07:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sms`
--

CREATE TABLE `tbl_sms` (
  `sms_id` int(11) NOT NULL,
  `sms_cust_name` varchar(255) NOT NULL,
  `sms_cust_country` int(11) NOT NULL,
  `sms_cust_mobile` varchar(255) NOT NULL,
  `sms_cust_message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `scat_id` int(11) NOT NULL,
  `scat_mcat_id` int(11) NOT NULL,
  `scat_name` varchar(255) NOT NULL,
  `scat_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`scat_id`, `scat_mcat_id`, `scat_name`, `scat_status`, `created_at`) VALUES
(10, 2, 'By Type', '1', '2018-03-20 18:09:44'),
(11, 2, 'By Relation', '1', '2018-03-20 18:10:01'),
(15, 3, 'By Type', '1', '2018-03-21 18:27:31'),
(16, 4, 'By Type', '1', '2018-03-21 18:27:42'),
(17, 5, 'By Type', '1', '2018-03-21 18:27:53'),
(18, 6, 'All Occasions', '1', '2018-03-21 18:28:14'),
(19, 3, 'By Relation', '1', '2018-03-21 18:28:37'),
(20, 4, 'By Relation', '1', '2018-03-21 18:28:47'),
(21, 5, 'By Relation', '1', '2018-03-21 18:28:56'),
(22, 6, 'All Occasions', '1', '2018-03-21 18:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supercategory`
--

CREATE TABLE `tbl_supercategory` (
  `supercat_id` int(11) NOT NULL,
  `supercat_mcat_id` int(11) NOT NULL,
  `supercat_scat_id` int(11) NOT NULL,
  `supercat_name` varchar(255) NOT NULL,
  `supercat_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supercategory`
--

INSERT INTO `tbl_supercategory` (`supercat_id`, `supercat_mcat_id`, `supercat_scat_id`, `supercat_name`, `supercat_status`, `created_at`) VALUES
(3, 2, 5, 'Mother', '1', '2018-03-18 17:54:15'),
(4, 2, 5, 'Father', '1', '2018-03-18 17:54:39'),
(5, 2, 5, 'Girlfriend', '0', '2018-03-18 17:55:17'),
(6, 2, 5, 'Boyfriend', '1', '2018-03-18 17:55:34'),
(7, 2, 5, 'Husband', '1', '2018-03-18 17:56:01'),
(8, 2, 5, 'Wife', '1', '2018-03-18 17:56:20'),
(9, 2, 5, 'Brother', '1', '2018-03-18 17:56:42'),
(10, 2, 5, 'Sister', '1', '2018-03-18 17:56:56'),
(13, 2, 10, 'Mug', '1', '2018-03-21 18:29:36'),
(14, 2, 10, 'Cushion', '1', '2018-03-21 18:29:51'),
(15, 2, 10, 'Key Chain', '1', '2018-03-21 18:30:05'),
(16, 2, 10, 'T-Shirt', '1', '2018-03-21 18:30:15'),
(17, 2, 10, 'Mobile Cover', '1', '2018-03-21 18:30:28'),
(18, 2, 10, 'Photo Frame', '1', '2018-03-21 18:30:42'),
(19, 2, 10, 'Personalized Puzzle', '1', '2018-03-21 18:30:55'),
(20, 2, 10, 'Chocolates', '1', '2018-03-21 18:31:08'),
(21, 2, 10, 'All Gifts', '1', '2018-03-21 18:31:20'),
(22, 2, 11, 'Mother', '1', '2018-03-21 18:32:48'),
(23, 2, 11, 'Father', '1', '2018-03-21 18:33:00'),
(24, 2, 11, 'Girlfriend', '1', '2018-03-21 18:33:13'),
(25, 2, 11, 'Boyfriend', '1', '2018-03-21 18:33:55'),
(26, 2, 11, 'Husband', '1', '2018-03-21 18:34:20'),
(27, 2, 11, 'Wife', '1', '2018-03-21 18:34:38'),
(28, 2, 11, 'Brother', '1', '2018-03-21 18:34:50'),
(29, 2, 11, 'Sister', '1', '2018-03-21 18:35:03'),
(30, 2, 11, 'Friend', '1', '2018-03-21 18:35:20'),
(31, 3, 15, 'Chocolates', '1', '2018-03-21 18:37:54'),
(32, 3, 15, 'Personalised Gifts', '1', '2018-03-21 18:38:06'),
(33, 3, 15, 'Cushions', '1', '2018-03-21 18:38:37'),
(34, 3, 15, 'God Idols', '1', '2018-03-21 18:39:02'),
(35, 3, 15, 'Mugs', '1', '2018-03-21 18:39:21'),
(36, 3, 15, 'Soft Toys', '1', '2018-03-21 18:39:36'),
(37, 3, 15, 'Plants', '1', '2018-03-21 18:40:14'),
(39, 3, 15, 'Other', '1', '2018-03-21 18:41:43'),
(40, 3, 15, 'All Gifts', '1', '2018-03-21 18:42:01'),
(41, 3, 19, 'Husband', '1', '2018-03-21 18:43:29'),
(42, 3, 19, 'Parents', '1', '2018-03-21 18:43:48'),
(43, 3, 19, 'Wife', '1', '2018-03-21 18:44:03'),
(44, 4, 16, 'Mug', '1', '2018-03-21 18:44:47'),
(45, 4, 16, 'Cushion', '1', '2018-03-21 18:45:03'),
(46, 4, 16, 'Key Chain', '1', '2018-03-21 18:45:37'),
(47, 4, 16, 'T-Shirt', '1', '2018-03-21 18:46:26'),
(48, 4, 16, 'Mobile Cover', '1', '2018-03-21 18:46:47'),
(49, 4, 16, 'Photo Frame', '1', '2018-03-21 18:47:02'),
(50, 4, 16, 'Personalized Puzzle', '1', '2018-03-21 18:47:30'),
(51, 4, 16, 'Chocolates', '1', '2018-03-21 18:47:49'),
(52, 4, 16, 'Combo', '1', '2018-03-21 18:48:19'),
(53, 4, 16, 'All Gifts', '1', '2018-03-21 18:48:30'),
(54, 4, 20, 'Mother', '1', '2018-03-21 18:50:25'),
(55, 4, 20, 'Father', '1', '2018-03-21 18:50:37'),
(56, 4, 20, 'Boyfriend', '1', '2018-03-21 18:51:07'),
(57, 4, 20, 'Girlfriend', '1', '2018-03-21 18:51:18'),
(58, 4, 20, 'Husband', '1', '2018-03-21 18:51:33'),
(59, 4, 20, 'Wife', '1', '2018-03-21 18:52:09'),
(60, 4, 20, 'Brother', '1', '2018-03-21 18:52:27'),
(61, 4, 20, 'Sister', '1', '2018-03-21 18:52:38'),
(62, 4, 20, 'Friend', '1', '2018-03-21 18:52:58'),
(63, 5, 17, 'Mug', '1', '2018-03-21 18:53:52'),
(64, 5, 17, 'Cushion', '1', '2018-03-21 18:54:03'),
(65, 5, 17, 'Key Chain', '1', '2018-03-21 18:54:20'),
(66, 5, 17, 'T-Shirt', '1', '2018-03-21 18:54:39'),
(67, 5, 17, 'Mobile Cover', '1', '2018-03-21 18:55:02'),
(68, 5, 17, 'Personalized Puzzle', '1', '2018-03-21 18:55:16'),
(69, 5, 17, 'Chocolates', '1', '2018-03-21 18:55:32'),
(70, 5, 17, 'All Gifts', '1', '2018-03-21 18:56:43'),
(71, 5, 21, 'Mother', '1', '2018-03-21 18:57:00'),
(72, 5, 21, 'Father', '1', '2018-03-21 18:57:23'),
(73, 5, 21, 'Boyfriend', '1', '2018-03-21 18:57:54'),
(74, 5, 21, 'Girlfriend', '1', '2018-03-21 18:58:30'),
(75, 5, 21, 'Husband', '1', '2018-03-21 18:58:56'),
(76, 5, 21, 'Wife', '1', '2018-03-21 18:59:10'),
(77, 5, 21, 'Brother', '1', '2018-03-21 18:59:25'),
(78, 5, 21, 'Sister', '1', '2018-03-21 19:00:00'),
(79, 5, 21, 'Friend', '1', '2018-03-21 19:00:09'),
(80, 6, 18, 'Holi', '1', '2018-03-21 19:00:39'),
(81, 6, 18, 'Women\'s Day', '1', '2018-03-21 19:00:51'),
(82, 6, 18, 'April Fool', '1', '2018-03-21 19:01:06'),
(83, 6, 18, 'Mother\'s Day', '1', '2018-03-21 19:01:35'),
(84, 6, 18, 'Father\'s Day', '1', '2018-03-21 19:01:53'),
(86, 6, 18, 'Rakhi', '1', '2018-03-21 19:02:18'),
(87, 6, 18, 'Parents Day', '1', '2018-03-21 19:02:49'),
(88, 6, 18, 'Daughter\'s Day', '1', '2018-03-21 19:03:02'),
(89, 6, 18, 'Teacher\'s Day', '1', '2018-03-21 19:03:17'),
(90, 6, 18, 'Grandparents Day', '1', '2018-03-21 19:03:30'),
(91, 6, 18, 'Karwa Chauth', '1', '2018-03-21 19:03:42'),
(92, 6, 18, 'Friendship Day', '1', '2018-03-21 19:04:28'),
(93, 6, 18, 'Diwali', '1', '2018-03-21 19:04:59'),
(94, 6, 22, 'Bhai Dooj', '1', '2018-03-21 19:05:15'),
(95, 6, 22, 'Children\'s Day', '1', '2018-03-21 19:05:28'),
(96, 6, 22, 'Christmas', '1', '2018-03-21 19:05:41'),
(97, 6, 22, 'New Year', '1', '2018-03-21 19:06:03'),
(98, 6, 22, 'Lohri', '1', '2018-03-21 19:06:14'),
(99, 6, 22, 'Rose Day', '1', '2018-03-21 19:06:25'),
(100, 6, 22, 'Propose Day', '1', '2018-03-21 19:06:36'),
(101, 6, 22, 'Chocolate Day', '1', '2018-03-21 19:06:46'),
(102, 6, 22, 'Teddy Day', '1', '2018-03-21 19:06:57'),
(103, 6, 22, 'Promise Day', '1', '2018-03-21 19:07:07'),
(104, 6, 22, 'Hug Day', '1', '2018-03-21 19:07:18'),
(105, 6, 22, 'Kiss Day', '1', '2018-03-21 19:07:29'),
(106, 6, 22, 'Valentine\'s Day', '1', '2018-03-21 19:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `u_lname` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_username` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_postalcode` varchar(255) NOT NULL,
  `u_features` varchar(255) NOT NULL,
  `u_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`u_id`, `u_fname`, `u_lname`, `u_email`, `u_username`, `u_password`, `u_postalcode`, `u_features`, `u_status`, `created_at`) VALUES
(1, 'raj', 'kumar', 'raj@gmail.com', 'raj', '111', '111', 'Notify me of new features or enhancements. , Email offers or events from marketing partners of Hemmings related to the Collector Car Hobby.', 1, '2018-04-09 10:58:21'),
(2, 'amit', 'sharma', 'a@gmail.com', 'amit', 'amit123', '201301', 'Send me the Hemmings Daily email newsletter. , Email offers or events from marketing partners of Hemmings related to the Collector Car Hobby.', 1, '2018-04-09 11:00:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  ADD PRIMARY KEY (`bcat_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_career`
--
ALTER TABLE `tbl_career`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `tbl_mailbox`
--
ALTER TABLE `tbl_mailbox`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `tbl_maincategory`
--
ALTER TABLE `tbl_maincategory`
  ADD PRIMARY KEY (`mcat_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_origin`
--
ALTER TABLE `tbl_origin`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_sms`
--
ALTER TABLE `tbl_sms`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`scat_id`);

--
-- Indexes for table `tbl_supercategory`
--
ALTER TABLE `tbl_supercategory`
  ADD PRIMARY KEY (`supercat_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  MODIFY `bcat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_career`
--
ALTER TABLE `tbl_career`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `enq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_mailbox`
--
ALTER TABLE `tbl_mailbox`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_maincategory`
--
ALTER TABLE `tbl_maincategory`
  MODIFY `mcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_origin`
--
ALTER TABLE `tbl_origin`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sms`
--
ALTER TABLE `tbl_sms`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `scat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_supercategory`
--
ALTER TABLE `tbl_supercategory`
  MODIFY `supercat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
