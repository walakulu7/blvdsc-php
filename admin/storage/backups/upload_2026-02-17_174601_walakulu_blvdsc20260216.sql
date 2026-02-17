-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 16, 2026 at 07:12 AM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walakulu_blvdsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity_log`
--

CREATE TABLE `admin_activity_log` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `details` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_activity_log`
--

INSERT INTO `admin_activity_log` (`id`, `admin_id`, `action`, `details`, `ip_address`, `created_at`) VALUES
(1, 1, 'logout', 'User logged out', '::1', '2026-02-04 00:18:19'),
(2, 1, 'login', 'User logged in', '::1', '2026-02-04 00:18:33'),
(3, 1, 'updated reservation status', 'Changed reservation #2 to confirmed', '127.0.0.1', '2026-02-03 23:59:33'),
(4, 1, 'created new event', 'Valentine\'s Day Special', '127.0.0.1', '2026-02-03 22:59:33'),
(5, 1, 'approved customer review', 'Review from Jack Lee - 5 stars', '127.0.0.1', '2026-02-03 21:59:33'),
(6, 1, 'replied to message', 'Responded to catering inquiry', '127.0.0.1', '2026-02-03 20:59:33'),
(7, 1, 'logged in', 'Successful login', '127.0.0.1', '2026-02-03 19:59:33'),
(8, 1, 'login', 'User logged in', '::1', '2026-02-04 02:01:04'),
(9, 1, 'login', 'User logged in', '::1', '2026-02-04 11:52:06'),
(10, 1, 'login', 'User logged in', '::1', '2026-02-04 13:39:17'),
(11, 1, 'login', 'User logged in', '::1', '2026-02-04 15:22:33'),
(12, 1, 'login', 'User logged in', '::1', '2026-02-04 17:35:17'),
(13, 1, 'login', 'User logged in', '::1', '2026-02-04 19:21:25'),
(14, 1, 'login', 'User logged in', '::1', '2026-02-04 21:39:20');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','owner','manager') NOT NULL DEFAULT 'manager',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password_hash`, `role`, `is_active`, `last_login`, `created_at`, `created_by`) VALUES
(1, 'admin', 'admin@blvdcoffee.com', '$2y$10$Ni3HovmjvroqNMefsdcPb.BfimUdS0ml0RRzgUqfa3dMpQeGBteHG', 'admin', 1, '2026-02-04 16:09:20', '2026-02-03 22:28:00', NULL),
(2, 'owner', 'owner@blvdcoffee.com', '$2y$10$Ni3HovmjvroqNMefsdcPb.BfimUdS0ml0RRzgUqfa3dMpQeGBteHG', 'owner', 1, NULL, '2026-02-03 22:28:00', NULL),
(3, 'manager', 'manager@blvdcoffee.com', '$2y$10$Ni3HovmjvroqNMefsdcPb.BfimUdS0ml0RRzgUqfa3dMpQeGBteHG', 'manager', 1, NULL, '2026-02-03 22:28:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `replied_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `is_read`, `replied_at`, `created_at`) VALUES
(1, 'Emily Taylor', 'emily@example.com', 'Catering Inquiry', 'I am interested in catering services for a corporate event. Can you provide more details?', 0, NULL, '2026-02-04 00:59:33'),
(2, 'Frank Martinez', 'frank@example.com', 'Menu Question', 'Do you have gluten-free options available?', 0, NULL, '2026-02-03 22:59:33'),
(3, 'Grace Anderson', 'grace@example.com', 'Private Event', 'Looking to book the restaurant for a private event. Is that possible?', 1, NULL, '2026-02-03 00:59:33'),
(4, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', 'Test Janaka', 'tesssssssst contact form submission', 0, NULL, '2026-02-10 17:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `customer_reviews`
--

CREATE TABLE `customer_reviews` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `admin_reply` text DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_reviews`
--

INSERT INTO `customer_reviews` (`id`, `customer_name`, `rating`, `review_text`, `status`, `is_featured`, `admin_reply`, `replied_at`, `created_at`) VALUES
(1, 'Henry Thompson', 5, 'Absolutely amazing experience! The coffee was superb and the staff was incredibly friendly. Will definitely come back!', 'pending', 0, NULL, NULL, '2026-02-04 00:59:33'),
(2, 'Isabel Rodriguez', 4, 'Great atmosphere and delicious food. Only minor issue was the wait time, but worth it!', 'pending', 0, NULL, NULL, '2026-02-03 21:59:33'),
(3, 'Jack Lee', 5, 'Best high tea in town! The selection of pastries was incredible. Highly recommend the Premium package.', 'approved', 1, 'Thank you so much for your kind words! We\'re delighted you enjoyed the experience.', NULL, '2026-02-02 00:59:33'),
(4, 'Karen White', 3, 'Food was okay, but service could be improved. Coffee quality is excellent though.', 'pending', 0, NULL, NULL, '2026-02-03 19:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `custom_special_days`
--

CREATE TABLE `custom_special_days` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_special_days`
--

INSERT INTO `custom_special_days` (`id`, `date`, `reason`, `created_by`, `created_at`) VALUES
(1, '2026-12-25', 'Christmas Day - Closed', NULL, '2026-02-04 00:59:33'),
(2, '2026-12-31', 'New Year\'s Eve - Private Event', NULL, '2026-02-04 00:59:33'),
(3, '2026-03-06', 'Staff Training Day', NULL, '2026-02-04 00:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','cancelled') NOT NULL DEFAULT 'draft',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `event_date`, `event_time`, `image_url`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Valentine\'s Day Special', 'Romantic 5-course dinner with live music. Limited seating available.', '2026-02-14', '19:00:00', NULL, 'published', NULL, '2026-02-04 00:59:33', NULL),
(3, 'Sunday Brunch Special', 'Extended brunch menu with bottomless mimosas. Reservations recommended.', '2026-02-11', '10:00:00', NULL, 'published', NULL, '2026-02-04 00:59:33', NULL),
(4, 'Live Jazz Night', 'Enjoy smooth jazz with dinner and handcrafted cocktails.', '2026-02-09', '20:00:00', NULL, 'draft', NULL, '2026-02-04 00:59:33', NULL),
(5, 'Coffee Tasting Workshop', 'Join us for an exclusive coffee tasting session where you\'ll learn about different brewing methods and taste premium coffee from around the world. Perfect for coffee enthusiasts!', '2026-02-11', '14:00:00', NULL, 'published', 1, '2026-02-04 15:21:14', NULL),
(6, 'Latte Art Competition', 'Watch skilled baristas compete in creating stunning latte art designs. Audience participation and prizes for winners! Free coffee samples for all attendees.', '2026-02-18', '16:00:00', NULL, 'published', 1, '2026-02-04 15:21:14', NULL),
(7, 'Live Jazz Evening', 'Enjoy smooth jazz music while sipping your favorite coffee beverages. Featuring local artists in an intimate café setting. Reservations recommended.', '2026-02-25', '19:00:00', 'uploads/events/1770222809_698374d998a58.jpeg', 'published', 1, '2026-02-04 15:21:14', '2026-02-04 22:03:29'),
(8, 'Bean Origin Tour', 'A virtual tour of our coffee bean sources with our head roaster. Learn about sustainable farming practices and the journey from farm to cup.', '2026-03-04', '15:30:00', 'uploads/events/1770221964_6983718cdde06.jpeg', 'published', 1, '2026-02-04 15:21:14', '2026-02-04 21:49:25'),
(9, 'Barista Masterclass', 'Professional barista training session covering espresso extraction, milk steaming, and advanced brewing techniques. Limited spots available!', '2026-03-11', '10:00:00', 'uploads/events/1770222143_6983723f0fe0b.jpeg', 'published', 1, '2026-02-04 15:21:14', '2026-02-04 21:52:23'),
(10, 'Weekend Brunch Special', 'Planning a special weekend brunch menu with artisanal coffee pairings. Details to be confirmed.', '2026-03-21', '11:00:00', 'uploads/events/1770223464_69837768a19a3.jpeg', 'draft', 1, '2026-02-04 15:21:14', '2026-02-04 22:14:24'),
(11, 'Coffee & Books Club', 'Monthly gathering for book lovers to discuss their latest reads over coffee. Book selection pending.', '2026-03-26', '17:00:00', 'uploads/events/1770223492_698377848ea68.jpeg', 'draft', 1, '2026-02-04 15:21:14', '2026-02-04 22:14:52'),
(12, 'Holiday Coffee Celebration', 'Celebrated the holidays with special seasonal drinks and festive atmosphere. Great turnout with over 100 attendees!', '2026-01-05', '18:00:00', NULL, 'published', 1, '2025-12-31 15:21:14', NULL),
(13, 'Outdoor Coffee Festival', 'Originally planned outdoor festival had to be cancelled due to venue issues. Will be rescheduled soon..', '2026-04-05', '12:00:00', NULL, 'cancelled', 1, '2026-02-04 15:21:14', '2026-02-04 19:21:43'),
(14, 'Father\'s Day', 'Treat fathers specially on this day. Treat fathers specially on this day. Treat fathers specially on this day. Treat fathers specially on this day. Treat fathers specially on this day. Treat fathers specially on this day. ', '2026-03-08', '00:00:00', 'uploads/events/1770226034_69838172a1c55.jpeg', 'published', 1, '2026-02-04 19:23:44', '2026-02-04 22:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `uploaded_by` int(11) DEFAULT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_photos`
--

INSERT INTO `gallery_photos` (`id`, `filename`, `title`, `category`, `display_order`, `is_active`, `uploaded_by`, `uploaded_at`) VALUES
(1, 'coffee-art-1.jpg', 'Latte Art Masterpiece', 'Coffee', 1, 1, NULL, '2026-02-04 00:59:33'),
(2, 'high-tea-1.jpg', 'Premium High Tea Setup', 'High Tea', 2, 1, NULL, '2026-02-04 00:59:33'),
(3, 'interior-1.jpg', 'Cozy Interior', 'Ambiance', 3, 1, NULL, '2026-02-04 00:59:33'),
(4, 'food-1.jpg', 'Signature Dishes', 'Food', 4, 1, NULL, '2026-02-04 00:59:33'),
(5, 'outdoor-1.jpg', 'Outdoor Seating Area', 'Ambiance', 5, 1, NULL, '2026-02-04 00:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `high_tea_reservations`
--

CREATE TABLE `high_tea_reservations` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `party_size` int(11) NOT NULL,
  `package_type` enum('classic','premium','deluxe') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `special_requests` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `high_tea_reservations`
--

INSERT INTO `high_tea_reservations` (`id`, `customer_name`, `email`, `phone`, `date`, `time`, `party_size`, `package_type`, `total_price`, `status`, `special_requests`, `created_at`) VALUES
(1, 'Alice Cooper', 'alice@example.com', '5553334444', '2026-02-05', '15:00:00', 2, 'classic', 5000.00, 'pending', NULL, '2026-02-04 00:59:33'),
(2, 'Bob Wilson', 'bob@example.com', '5556667777', '2026-02-06', '16:00:00', 4, 'premium', 14000.00, 'confirmed', 'Vegetarian options please', '2026-02-04 00:59:33'),
(3, 'Carol Davis', 'carol@example.com', '5558889999', '2026-02-08', '14:30:00', 3, 'deluxe', 15000.00, 'pending', 'No nuts', '2026-02-04 00:59:33'),
(4, 'Emma Watson', 'emma.watson@example.com', '0771234567', '2026-02-04', '14:00:00', 2, 'classic', 5000.00, 'confirmed', 'Window seat preferred', '2026-02-04 13:52:07'),
(5, 'James Smith', 'james.smith@example.com', '0772345678', '2026-02-04', '15:00:00', 4, 'premium', 14000.00, 'pending', 'Birthday celebration. Please include a small cake.', '2026-02-04 13:52:07'),
(6, 'Sophie Turner', 'sophie.turner@example.com', '0773456789', '2026-02-05', '14:30:00', 3, 'deluxe', 15000.00, 'confirmed', 'Vegetarian options required', '2026-02-04 13:52:07'),
(7, 'Michael Brown', 'michael.brown@example.com', '0774567890', '2026-02-05', '16:00:00', 2, 'premium', 7000.00, 'confirmed', NULL, '2026-02-04 13:52:07'),
(8, 'Olivia Davis', 'olivia.davis@example.com', '0775678901', '2026-02-07', '14:00:00', 6, 'deluxe', 30000.00, 'pending', 'Anniversary celebration. Please arrange flowers on table.', '2026-02-04 13:52:07'),
(9, 'Daniel Wilson', 'daniel.wilson@example.com', '0776789012', '2026-02-08', '15:30:00', 2, 'classic', 5000.00, 'confirmed', 'Gluten-free options needed', '2026-02-04 13:52:07'),
(10, 'Isabella Garcia', 'isabella.garcia@example.com', '0777890123', '2026-02-09', '14:30:00', 4, 'premium', 14000.00, 'pending', NULL, '2026-02-04 13:52:07'),
(11, 'William Martinez', 'william.martinez@example.com', '0778901234', '2026-02-12', '16:00:00', 5, 'deluxe', 25000.00, 'confirmed', 'Corporate event. Need professional setup.', '2026-02-04 13:52:07'),
(12, 'Ava Rodriguez', 'ava.rodriguez@example.com', '0779012345', '2026-02-13', '14:00:00', 3, 'classic', 7500.00, 'pending', 'One guest is lactose intolerant', '2026-02-04 13:52:07'),
(13, 'Ethan Lee', 'ethan.lee@example.com', '0770123456', '2026-02-02', '14:30:00', 4, 'premium', 14000.00, 'completed', 'Window seating', '2026-02-01 13:52:07'),
(14, 'Mia Johnson', 'mia.johnson@example.com', '0771123456', '2026-01-30', '15:00:00', 2, 'deluxe', 10000.00, 'completed', NULL, '2026-01-29 13:52:07'),
(15, 'Noah Anderson', 'noah.anderson@example.com', '0772123456', '2026-01-28', '16:30:00', 6, 'classic', 15000.00, 'completed', 'Family gathering', '2026-01-27 13:52:07'),
(16, 'Charlotte Taylor', 'charlotte.taylor@example.com', '0773123456', '2026-02-10', '14:00:00', 3, 'premium', 10500.00, 'cancelled', 'Unable to attend due to emergency', '2026-02-03 13:52:07'),
(17, 'Liam Thomas', 'liam.thomas@example.com', '0774123456', '2026-02-03', '15:30:00', 2, 'classic', 5000.00, 'cancelled', 'Changed plans', '2026-02-02 13:52:07'),
(18, 'Amelia White', 'amelia.white@example.com', '0775123456', '2026-02-18', '14:30:00', 4, 'deluxe', 20000.00, 'confirmed', 'Special occasion - want extra special service', '2026-02-04 13:52:07'),
(19, 'Benjamin Harris', 'benjamin.harris@example.com', '0776123456', '2026-02-24', '16:00:00', 8, 'premium', 28000.00, 'pending', 'Wedding tea party. Need elegant setup.', '2026-02-04 13:52:07'),
(20, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '0112345679', '2026-02-20', '09:30:00', 2, 'classic', 79.90, 'pending', 'test', '2026-02-10 15:23:55'),
(21, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '0112345679', '2026-02-28', '11:30:00', 1, 'classic', 39.95, 'pending', 'test2', '2026-02-10 15:57:34'),
(22, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '0112345679', '2026-02-28', '11:30:00', 1, 'classic', 39.95, 'pending', 'test2', '2026-02-10 15:58:06'),
(23, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '0112345679', '2026-02-27', '09:30:00', 1, 'classic', 39.95, 'pending', 'test2', '2026-02-10 15:59:29'),
(24, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '1234234234', '2026-02-27', '09:30:00', 1, 'classic', 39.95, 'pending', 'sssssssssssssssss', '2026-02-10 17:00:44'),
(25, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '1234234234', '2026-02-28', '11:30:00', 4, 'classic', 159.80, 'pending', 'Special notes', '2026-02-10 17:28:32'),
(26, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '1234234234', '2026-03-06', '09:30:00', 2, 'classic', 79.90, 'pending', 'test booking', '2026-02-10 17:29:35'),
(27, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '1234234234', '2026-02-27', '11:30:00', 2, 'classic', 79.90, 'pending', 'test high tea', '2026-02-10 17:31:26'),
(28, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '0112345679', '2026-02-27', '09:30:00', 3, 'classic', 119.85, 'pending', 'rrrrrrrrrrrrrrrrrrrrr', '2026-02-10 17:42:16'),
(29, 'Janaka Walakulu [ ICT Officer ]', 'ictoncp@gmail.com', '1234234234', '2026-02-28', '11:30:00', 1, 'classic', 39.95, 'pending', 'hhhhhhhhhhhhhhhhhh', '2026-02-10 17:53:05'),
(30, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '1234234234', '2026-02-27', '09:30:00', 1, 'classic', 39.95, 'pending', 'sssssssssssssssssssss', '2026-02-11 18:37:37'),
(31, 'Thilanka', 'leo.yuange@yahoo.com', '426249394', '2026-02-13', '09:30:00', 2, 'classic', 79.90, 'pending', '', '2026-02-12 01:32:19'),
(32, 'Janaka Walakulu', 'ictoncp@gmail.com', '0772299722', '2026-02-14', '09:30:00', 1, 'classic', 39.95, 'pending', 'rrrrrrrrrrrrrr', '2026-02-12 11:43:59'),
(33, 'Janaka Sampath Walakuluarachchi', 'ictoncp@gmail.com', '0772299722', '2026-02-14', '09:30:00', 4, 'classic', 159.80, 'pending', 'Test booking', '2026-02-12 13:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `party_size` int(11) NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `customer_name`, `email`, `phone`, `date`, `time`, `party_size`, `status`, `notes`, `created_at`) VALUES
(1, 'John Doe', 'john@example.com', '1234567890', '2026-02-04', '18:00:00', 4, 'pending', 'Window seat please', '2026-02-04 00:59:33'),
(2, 'Jane Smith', 'jane@example.com', '0987654321', '2026-02-04', '19:30:00', 2, 'confirmed', 'Anniversary celebration', '2026-02-04 00:59:33'),
(3, 'Mike Johnson', 'mike@example.com', '5551234567', '2026-02-05', '20:00:00', 6, 'pending', 'Birthday party', '2026-02-04 00:59:33'),
(4, 'Sarah Williams', 'sarah@example.com', '5559876543', '2026-02-06', '18:30:00', 3, 'confirmed', NULL, '2026-02-04 00:59:33'),
(5, 'David Brown', 'david@example.com', '5551112222', '2026-02-07', '19:00:00', 2, 'pending', 'Quiet corner', '2026-02-04 00:59:33'),
(6, 'Janaka Walakulu [ ICT Officer ]', 'ictoncp@gmail.com', '1234234234', '2026-02-11', '08:00:00', 2, 'pending', 'Notes: eeeeeeeeeeeeeeeee', '2026-02-10 17:23:00'),
(7, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '1234234234', '2026-02-25', '10:00:00', 3, 'pending', 'Notes: I need wheel chair accessible table', '2026-02-10 17:27:10'),
(8, 'Janaka Walakuluarachchi', 'ictoncp@gmail.com', '1234234234', '2026-02-25', '08:00:00', 4, 'pending', 'Notes: No', '2026-02-10 17:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `setting_key`, `setting_value`, `updated_at`) VALUES
(1, 'site_name', 'BLVD Specialty Coffee', NULL),
(2, 'contact_email', 'info@blvdcoffee.com', NULL),
(3, 'contact_phone', '+94 11 234 5678', NULL),
(4, 'address', 'Colombo, Sri Lanka', NULL),
(5, 'opening_hours', 'Mon-Fri: 8AM-8PM, Sat-Sun: 9AM-9PM', NULL),
(6, 'high_tea_classic_price', '2500.00', NULL),
(7, 'high_tea_premium_price', '3500.00', NULL),
(8, 'high_tea_deluxe_price', '5000.00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`role`),
  ADD KEY `is_active` (`is_active`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_read` (`is_read`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `is_featured` (`is_featured`),
  ADD KEY `rating` (`rating`);

--
-- Indexes for table `custom_special_days`
--
ALTER TABLE `custom_special_days`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_date` (`event_date`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `is_active` (`is_active`),
  ADD KEY `display_order` (`display_order`);

--
-- Indexes for table `high_tea_reservations`
--
ALTER TABLE `high_tea_reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `status` (`status`),
  ADD KEY `package_type` (`package_type`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `is_available` (`is_available`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `date` (`date`),
  ADD KEY `status` (`status`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_reviews`
--
ALTER TABLE `customer_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `custom_special_days`
--
ALTER TABLE `custom_special_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `high_tea_reservations`
--
ALTER TABLE `high_tea_reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_activity_log`
--
ALTER TABLE `admin_activity_log`
  ADD CONSTRAINT `fk_activity_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
