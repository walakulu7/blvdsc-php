-- BLVD Coffee Admin Panel Database Setup
-- Run this file in phpMyAdmin to create all required tables

-- Create database (if not exists)
CREATE DATABASE IF NOT EXISTS blvd_coffee CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE blvd_coffee;

-- =====================================================
-- ADMIN USERS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','owner','manager') NOT NULL DEFAULT 'manager',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role` (`role`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default admin user
-- Username: admin, Password: admin123
INSERT INTO `admin_users` (`username`, `email`, `password_hash`, `role`, `is_active`) VALUES
('admin', 'admin@blvdcoffee.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', 1),
('owner', 'owner@blvdcoffee.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'owner', 1),
('manager', 'manager@blvdcoffee.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'manager', 1);

-- =====================================================
-- RESERVATIONS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `party_size` int(11) NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `status` (`status`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- HIGH TEA RESERVATIONS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `high_tea_reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `status` (`status`),
  KEY `package_type` (`package_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- EVENTS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','cancelled') NOT NULL DEFAULT 'draft',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `event_date` (`event_date`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- CUSTOM SPECIAL DAYS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `custom_special_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- CONTACT MESSAGES TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `replied_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `is_read` (`is_read`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- CUSTOMER REVIEWS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `customer_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` >= 1 AND `rating` <= 5),
  `review_text` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `admin_reply` text DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `is_featured` (`is_featured`),
  KEY `rating` (`rating`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- GALLERY PHOTOS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `gallery_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `uploaded_by` int(11) DEFAULT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `is_active` (`is_active`),
  KEY `display_order` (`display_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- MENU ITEMS TABLE (if not already exists)
-- =====================================================
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `is_available` (`is_available`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- SITE SETTINGS TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default site settings
INSERT INTO `site_settings` (`setting_key`, `setting_value`) VALUES
('site_name', 'BLVD Specialty Coffee'),
('contact_email', 'info@blvdcoffee.com'),
('contact_phone', '+94 11 234 5678'),
('address', 'Colombo, Sri Lanka'),
('opening_hours', 'Mon-Fri: 8AM-8PM, Sat-Sun: 9AM-9PM'),
('high_tea_classic_price', '2500.00'),
('high_tea_premium_price', '3500.00'),
('high_tea_deluxe_price', '5000.00')
ON DUPLICATE KEY UPDATE setting_value=VALUES(setting_value);

-- =====================================================
-- ADMIN ACTIVITY LOG TABLE
-- =====================================================
CREATE TABLE IF NOT EXISTS `admin_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `details` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`),
  KEY `created_at` (`created_at`),
  CONSTRAINT `fk_activity_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- =====================================================
-- SUCCESS MESSAGE
-- =====================================================
SELECT 'Database setup completed successfully!' AS message,
       (SELECT COUNT(*) FROM admin_users) AS admin_users_count,
       (SELECT COUNT(*) FROM site_settings) AS site_settings_count;
