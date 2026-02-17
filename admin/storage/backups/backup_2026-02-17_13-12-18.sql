-- BLVD Coffee Admin Backup
-- Generated: 2026-02-17 13:12:18

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE `admin_activity_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_id` int NOT NULL,
  `action` varchar(100) NOT NULL,
  `details` text,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`),
  KEY `created_at` (`created_at`),
  CONSTRAINT `fk_activity_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO admin_activity_log VALUES("1","1","logout","User logged out","::1","2026-02-04 00:18:19");
INSERT INTO admin_activity_log VALUES("2","1","login","User logged in","::1","2026-02-04 00:18:33");
INSERT INTO admin_activity_log VALUES("3","1","updated reservation status","Changed reservation #2 to confirmed","127.0.0.1","2026-02-03 23:59:33");
INSERT INTO admin_activity_log VALUES("4","1","created new event","Valentine\'s Day Special","127.0.0.1","2026-02-03 22:59:33");
INSERT INTO admin_activity_log VALUES("5","1","approved customer review","Review from Jack Lee - 5 stars","127.0.0.1","2026-02-03 21:59:33");
INSERT INTO admin_activity_log VALUES("6","1","replied to message","Responded to catering inquiry","127.0.0.1","2026-02-03 20:59:33");
INSERT INTO admin_activity_log VALUES("7","1","logged in","Successful login","127.0.0.1","2026-02-03 19:59:33");
INSERT INTO admin_activity_log VALUES("8","1","login","User logged in","::1","2026-02-04 02:01:04");
INSERT INTO admin_activity_log VALUES("9","1","login","User logged in","::1","2026-02-04 11:52:06");
INSERT INTO admin_activity_log VALUES("10","1","login","User logged in","::1","2026-02-04 13:39:17");
INSERT INTO admin_activity_log VALUES("11","1","login","User logged in","::1","2026-02-04 15:22:33");
INSERT INTO admin_activity_log VALUES("12","1","login","User logged in","::1","2026-02-04 17:35:17");
INSERT INTO admin_activity_log VALUES("13","1","login","User logged in","::1","2026-02-04 19:21:25");
INSERT INTO admin_activity_log VALUES("14","1","login","User logged in","::1","2026-02-04 21:39:20");
INSERT INTO admin_activity_log VALUES("15","1","login","User logged in","::1","2026-02-11 23:12:06");
INSERT INTO admin_activity_log VALUES("16","1","login","User logged in","::1","2026-02-12 00:09:06");
INSERT INTO admin_activity_log VALUES("17","1","login","User logged in","::1","2026-02-12 23:06:32");
INSERT INTO admin_activity_log VALUES("18","1","logout","User logged out","::1","2026-02-12 23:48:34");
INSERT INTO admin_activity_log VALUES("19","1","login","User logged in","::1","2026-02-12 23:48:43");
INSERT INTO admin_activity_log VALUES("20","1","updated reservation status","Changed reservation #7 to confirmed","::1","2026-02-12 23:49:00");
INSERT INTO admin_activity_log VALUES("21","1","updated reservation status","Changed reservation #7 to completed","::1","2026-02-12 23:50:19");
INSERT INTO admin_activity_log VALUES("22","1","updated reservation status","Changed reservation #7 to cancelled","::1","2026-02-12 23:50:29");
INSERT INTO admin_activity_log VALUES("23","1","updated reservation status","Changed reservation #7 to confirmed","::1","2026-02-12 23:50:34");
INSERT INTO admin_activity_log VALUES("24","1","updated reservation status","Changed reservation #7 to pending","::1","2026-02-12 23:50:38");
INSERT INTO admin_activity_log VALUES("25","1","updated reservation status","Changed reservation #7 to confirmed","::1","2026-02-12 23:51:16");
INSERT INTO admin_activity_log VALUES("26","1","updated reservation status","Changed reservation #7 to pending","::1","2026-02-12 23:51:21");
INSERT INTO admin_activity_log VALUES("27","1","updated reservation status","Changed reservation #7 to confirmed","::1","2026-02-12 23:55:37");
INSERT INTO admin_activity_log VALUES("28","1","updated reservation status","Changed reservation #7 to pending","::1","2026-02-12 23:57:52");
INSERT INTO admin_activity_log VALUES("29","1","logout","User logged out","::1","2026-02-12 23:57:56");
INSERT INTO admin_activity_log VALUES("30","1","login","User logged in","::1","2026-02-12 23:58:06");
INSERT INTO admin_activity_log VALUES("31","1","updated reservation status","Changed reservation #7 to confirmed","::1","2026-02-12 23:58:20");
INSERT INTO admin_activity_log VALUES("32","1","updated reservation status","Changed reservation #7 to pending","::1","2026-02-13 00:07:01");
INSERT INTO admin_activity_log VALUES("33","1","updated reservation status","Changed reservation #7 to confirmed","::1","2026-02-13 00:09:12");
INSERT INTO admin_activity_log VALUES("34","1","logout","User logged out","::1","2026-02-13 00:09:26");
INSERT INTO admin_activity_log VALUES("35","1","login","User logged in","::1","2026-02-13 00:09:36");
INSERT INTO admin_activity_log VALUES("36","1","updated reservation status","Changed reservation #6 to confirmed","::1","2026-02-13 00:09:49");
INSERT INTO admin_activity_log VALUES("37","1","updated reservation status","Changed reservation #7 to pending","::1","2026-02-13 00:15:48");
INSERT INTO admin_activity_log VALUES("38","1","updated reservation status","Changed reservation #6 to pending","::1","2026-02-13 00:16:32");
INSERT INTO admin_activity_log VALUES("39","1","updated reservation status","Changed reservation #7 to confirmed","::1","2026-02-13 00:17:48");
INSERT INTO admin_activity_log VALUES("40","1","login","User logged in","::1","2026-02-13 00:23:08");
INSERT INTO admin_activity_log VALUES("41","1","updated reservation status","Changed reservation #7 to pending","::1","2026-02-13 00:23:23");
INSERT INTO admin_activity_log VALUES("42","1","logout","User logged out","::1","2026-02-13 00:24:38");
INSERT INTO admin_activity_log VALUES("43","1","login","User logged in","::1","2026-02-13 00:25:07");
INSERT INTO admin_activity_log VALUES("44","1","updated reservation status","Changed reservation #7 to confirmed","::1","2026-02-13 00:25:19");
INSERT INTO admin_activity_log VALUES("45","1","login","User logged in","::1","2026-02-16 20:31:08");
INSERT INTO admin_activity_log VALUES("46","1","updated reservation status","Changed reservation #8 to confirmed","::1","2026-02-16 20:32:05");
INSERT INTO admin_activity_log VALUES("47","1","updated reservation status","Changed reservation #8 to pending","::1","2026-02-16 20:32:16");
INSERT INTO admin_activity_log VALUES("48","1","updated reservation status","Changed reservation #1 to completed","::1","2026-02-16 20:33:01");
INSERT INTO admin_activity_log VALUES("49","1","updated reservation status","Changed reservation #3 to cancelled","::1","2026-02-16 20:33:17");
INSERT INTO admin_activity_log VALUES("50","1","updated reservation status","Changed reservation #8 to confirmed","::1","2026-02-16 20:51:40");
INSERT INTO admin_activity_log VALUES("51","1","updated reservation status","Changed reservation #8 to completed","::1","2026-02-16 20:52:20");
INSERT INTO admin_activity_log VALUES("52","1","updated reservation status","Changed reservation #8 to cancelled","::1","2026-02-16 20:52:44");
INSERT INTO admin_activity_log VALUES("53","1","updated reservation status","Changed reservation #8 to completed","::1","2026-02-16 21:38:20");
INSERT INTO admin_activity_log VALUES("54","1","exported reservations","Exported 3 reservations to CSV","::1","2026-02-16 22:03:25");
INSERT INTO admin_activity_log VALUES("55","1","login","User logged in","::1","2026-02-16 23:07:09");
INSERT INTO admin_activity_log VALUES("56","1","login","User logged in","::1","2026-02-16 23:55:15");
INSERT INTO admin_activity_log VALUES("57","1","login","User logged in","::1","2026-02-17 01:36:30");
INSERT INTO admin_activity_log VALUES("58","1","login","User logged in","::1","2026-02-17 11:24:26");
INSERT INTO admin_activity_log VALUES("59","1","logout","User logged out","::1","2026-02-17 11:24:33");
INSERT INTO admin_activity_log VALUES("60","1","login","User logged in","::1","2026-02-17 11:26:29");
INSERT INTO admin_activity_log VALUES("61","1","login","User logged in","::1","2026-02-17 12:28:11");
INSERT INTO admin_activity_log VALUES("62","1","login","User logged in","::1","2026-02-17 14:35:02");
INSERT INTO admin_activity_log VALUES("63","1","login","User logged in","::1","2026-02-17 18:25:51");


CREATE TABLE `admin_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','owner','manager') NOT NULL DEFAULT 'manager',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role` (`role`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO admin_users VALUES("1","admin","admin@blvdcoffee.com","$2y$10$Ni3HovmjvroqNMefsdcPb.BfimUdS0ml0RRzgUqfa3dMpQeGBteHG","admin","1","2026-02-17 12:55:51","2026-02-03 22:28:00","");
INSERT INTO admin_users VALUES("2","owner","owner@blvdcoffee.com","$2y$10$Ni3HovmjvroqNMefsdcPb.BfimUdS0ml0RRzgUqfa3dMpQeGBteHG","owner","1","","2026-02-03 22:28:00","");
INSERT INTO admin_users VALUES("3","manager","manager@blvdcoffee.com","$2y$10$Ni3HovmjvroqNMefsdcPb.BfimUdS0ml0RRzgUqfa3dMpQeGBteHG","manager","1","","2026-02-03 22:28:00","");


CREATE TABLE `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `replied_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `is_read` (`is_read`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO contact_messages VALUES("7","Janaka Walakuluarachchi","ictoncp@gmail.com","","Test Janaka","aasdasdasdasdadd","0","","2026-02-17 01:08:20");
INSERT INTO contact_messages VALUES("8","Janaka Walakuluarachchi","ictoncp@gmail.com","","Test Janaka","aaaaaaaaaaaaaaaa","0","","2026-02-17 01:11:16");
INSERT INTO contact_messages VALUES("9","Janaka Walakulu [ ICT Officer ]","ictoncp@gmail.com","","Test Janaka","sssssssssssssss","0","","2026-02-17 01:11:42");
INSERT INTO contact_messages VALUES("10","Janaka Walakulu [ ICT Officer ]","ictoncp@gmail.com","0112345679","Test Janaka","zzzzzzzzzzzzzzz","1","","2026-02-17 01:15:02");
INSERT INTO contact_messages VALUES("11","Janaka Walakuluarachchi","ictoncp@gmail.com","1234234234","Test Janaka","xxxxxxxxxxxxxx","1","2026-02-17 16:10:38","2026-02-17 01:16:59");


CREATE TABLE `custom_special_days` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO custom_special_days VALUES("1","2026-12-25","Christmas Day - Closed","","2026-02-04 00:59:33");
INSERT INTO custom_special_days VALUES("2","2026-12-31","New Year\'s Eve - Private Event","","2026-02-04 00:59:33");
INSERT INTO custom_special_days VALUES("3","2026-03-06","Staff Training Day","","2026-02-04 00:59:33");


CREATE TABLE `customer_reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `rating` int NOT NULL,
  `review_text` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `admin_reply` text,
  `replied_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `is_featured` (`is_featured`),
  KEY `rating` (`rating`),
  CONSTRAINT `customer_reviews_chk_1` CHECK (((`rating` >= 1) and (`rating` <= 5)))
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO customer_reviews VALUES("1","Henry Thompson","5","Absolutely amazing experience! The coffee was superb and the staff was incredibly friendly. Will definitely come back!","pending","0","","","2026-02-04 00:59:33");
INSERT INTO customer_reviews VALUES("2","Isabel Rodriguez","4","Great atmosphere and delicious food. Only minor issue was the wait time, but worth it!","pending","0","","","2026-02-03 21:59:33");
INSERT INTO customer_reviews VALUES("3","Jack Lee","5","Best high tea in town! The selection of pastries was incredible. Highly recommend the Premium package.","approved","1","Thank you so much for your kind words! We\'re delighted you enjoyed the experience.","","2026-02-02 00:59:33");
INSERT INTO customer_reviews VALUES("4","Karen White","3","Food was okay, but service could be improved. Coffee quality is excellent though.","pending","0","","","2026-02-03 19:59:33");


CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `event_date` date NOT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `location` varchar(255) DEFAULT 'BLVD Coffee, 123 Main Street',
  `price_per_person` varchar(100) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','cancelled') NOT NULL DEFAULT 'draft',
  `created_by` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `event_date` (`event_date`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO events VALUES("7","Live Jazz Evening","Enjoy smooth jazz music while sipping your favorite coffee beverages. Featuring local artists in an intimate café setting. Reservations recommended.","2026-01-25","09:00:00","11:00:00","BLVD Specialty Coffee, 123 Main Street","$50.00 Per Person","uploads/events/1770222809_698374d998a58.jpeg","published","1","2026-02-04 15:21:14","2026-02-17 00:43:37");
INSERT INTO events VALUES("8","Bean Origin Tour","A virtual tour of our coffee bean sources with our head roaster. Learn about sustainable farming practices and the journey from farm to cup.","2026-03-04","15:30:00","17:30:00","BLVD Specialty Coffee, 123 Main Street","$25.00 Per Person","uploads/events/1770221964_6983718cdde06.jpeg","published","1","2026-02-04 15:21:14","2026-02-17 00:43:28");
INSERT INTO events VALUES("9","Barista Masterclass","Professional barista training session covering espresso extraction, milk steaming, and advanced brewing techniques. Limited spots available!","2026-03-11","10:00:00","12:00:00","BLVD Specialty Coffee, 123 Main Street","$35 Per Person","uploads/events/1770222143_6983723f0fe0b.jpeg","published","1","2026-02-04 15:21:14","2026-02-17 00:43:05");
INSERT INTO events VALUES("10","Weekend Brunch Special","Planning a special weekend brunch menu with artisanal coffee pairings. Details to be confirmed.","2026-03-21","11:00:00","14:00:00","BLVD Coffee, 123 Main Street","$55.00","uploads/events/1770223464_69837768a19a3.jpeg","draft","1","2026-02-04 15:21:14","2026-02-17 00:38:10");
INSERT INTO events VALUES("12","Holiday Coffee Celebration","Celebrated the holidays with special seasonal drinks and festive atmosphere. Great turnout with over 100 attendees!","2026-01-05","12:17:00","14:18:00","BLVD Specialty Coffee, 123 Main Street","Free entry","uploads/events/1771273646_69937daed128d.png","published","1","2025-12-31 15:21:14","2026-02-17 01:57:27");
INSERT INTO events VALUES("13","Outdoor Coffee Festival","Originally planned outdoor festival had to be cancelled due to venue issues. Will be rescheduled soon..","2026-04-05","12:00:00","15:00:00","BLVD Coffee, 123 Main Street","$25.00","uploads/events/1771267785_699366c995aa8.png","cancelled","1","2026-02-04 15:21:14","2026-02-17 00:37:47");
INSERT INTO events VALUES("14","Father\'s Day","Treat fathers specially on this day. Treat fathers specially on this day. Treat fathers specially on this day. Treat fathers specially on this day. Treat fathers specially on this day. Treat fathers specially on this day. ","2026-03-08","12:00:00","14:30:00","BLVD Specialty Coffee, 123 Main Street","$35 Per Person","uploads/events/1771266505_699361c9aa822.jpg","published","1","2026-02-04 19:23:44","2026-02-17 00:43:19");


CREATE TABLE `gallery_photos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `display_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `uploaded_by` int DEFAULT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `is_active` (`is_active`),
  KEY `display_order` (`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO gallery_photos VALUES("1","coffee-art-1.jpg","Latte Art Masterpiece","Coffee","1","1","","2026-02-04 00:59:33");
INSERT INTO gallery_photos VALUES("2","high-tea-1.jpg","Premium High Tea Setup","High Tea","2","1","","2026-02-04 00:59:33");
INSERT INTO gallery_photos VALUES("3","interior-1.jpg","Cozy Interior","Ambiance","3","1","","2026-02-04 00:59:33");
INSERT INTO gallery_photos VALUES("4","food-1.jpg","Signature Dishes","Food","4","1","","2026-02-04 00:59:33");
INSERT INTO gallery_photos VALUES("5","outdoor-1.jpg","Outdoor Seating Area","Ambiance","5","1","","2026-02-04 00:59:33");


CREATE TABLE `high_tea_reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `party_size` int NOT NULL,
  `package_type` enum('classic','premium','deluxe') NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `special_requests` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `status` (`status`),
  KEY `package_type` (`package_type`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO high_tea_reservations VALUES("20","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-20","09:30:00","2","classic","79.90","pending","test","2026-02-10 15:23:55");
INSERT INTO high_tea_reservations VALUES("21","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-28","11:30:00","1","classic","39.95","confirmed","test2","2026-02-10 15:57:34");
INSERT INTO high_tea_reservations VALUES("22","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-28","11:30:00","1","classic","39.95","confirmed","test2","2026-02-10 15:58:06");
INSERT INTO high_tea_reservations VALUES("23","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-27","09:30:00","1","classic","39.95","pending","test2","2026-02-10 15:59:29");
INSERT INTO high_tea_reservations VALUES("24","Janaka Walakuluarachchi","ictoncp@gmail.com","1234234234","2026-02-28","09:30:00","1","classic","39.95","completed","gggggggggggggg","2026-02-12 00:08:27");
INSERT INTO high_tea_reservations VALUES("25","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345680","2026-02-14","09:30:00","1","classic","39.95","pending","wwwwww","2026-02-12 17:06:44");
INSERT INTO high_tea_reservations VALUES("26","Janaka Walakuluarachchi","ictoncp@gmail.com","1234234234","2026-02-20","09:30:00","1","classic","39.95","pending","wwwwwwwwwwwwwww","2026-02-16 00:48:48");
INSERT INTO high_tea_reservations VALUES("27","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-27","09:30:00","2","classic","79.90","pending","ddddddddddd","2026-02-17 01:17:51");


CREATE TABLE `menu_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `is_available` (`is_available`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



CREATE TABLE `menus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `display_order` int DEFAULT '0',
  `status` enum('published','draft') DEFAULT 'draft',
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_status` (`status`),
  KEY `idx_order` (`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO menus VALUES("1","COFFEE & TEA","coffee-tea","assets/images/menu-coffee-tea.webp","1","published","","2026-02-17 12:20:15","2026-02-17 12:20:15");
INSERT INTO menus VALUES("2","OTHER BEVERAGES","other-beverages","assets/images/menu-other-beverages.webp","2","published","","2026-02-17 12:20:15","2026-02-17 12:20:15");
INSERT INTO menus VALUES("3","ALL DAY BREAKFAST & SPECIALTIES","breakfast-specialties","assets/images/menu-all-daybreakfast.webp","3","published","","2026-02-17 12:20:15","2026-02-17 12:20:15");
INSERT INTO menus VALUES("4","KIDS & SEASONAL","kids-seasonal","assets/images/menu-kids-seasonal.webp","4","published","","2026-02-17 12:20:15","2026-02-17 12:20:15");
INSERT INTO menus VALUES("5","Other Beverages","other-beverages-1","uploads/menus/1771314061_69941b8d13b33.jpg","5","published","1","2026-02-17 13:11:01","2026-02-17 13:11:40");


CREATE TABLE `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `party_size` int NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `notes` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `status` (`status`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO reservations VALUES("1","John Doe","john@example.com","1234567890","2026-02-04","18:00:00","4","completed","Window seat please","2026-02-04 00:59:33");
INSERT INTO reservations VALUES("2","Jane Smith","jane@example.com","0987654321","2026-02-04","19:30:00","2","confirmed","Anniversary celebration","2026-02-04 00:59:33");
INSERT INTO reservations VALUES("3","Mike Johnson","mike@example.com","5551234567","2026-02-05","20:00:00","6","cancelled","Birthday party","2026-02-04 00:59:33");
INSERT INTO reservations VALUES("4","Sarah Williams","sarah@example.com","5559876543","2026-02-06","18:30:00","3","confirmed","","2026-02-04 00:59:33");
INSERT INTO reservations VALUES("5","David Brown","david@example.com","5551112222","2026-02-07","19:00:00","2","pending","Quiet corner","2026-02-04 00:59:33");
INSERT INTO reservations VALUES("6","Janaka Walakuluarachchi","ictoncp@gmail.com","1234234234","2026-02-12","08:00:00","2","pending","Notes: eeeeeeeeeeeee","2026-02-12 23:36:29");
INSERT INTO reservations VALUES("7","Janaka Walakulu [ ICT Officer ]","ictoncp@gmail.com","0112345680","2026-02-19","11:00:00","5","confirmed","Notes: rrrrrrrrrrrrrrrrrrr","2026-02-12 23:36:53");
INSERT INTO reservations VALUES("8","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-20","09:00:00","1","completed","Notes: qqqqqqqqqqqqqqq","2026-02-16 00:47:00");
INSERT INTO reservations VALUES("9","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-17","09:00:00","1","pending","Notes: OOOOOOOOOOOO","2026-02-16 16:25:46");
INSERT INTO reservations VALUES("10","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-20","09:00:00","1","pending","Notes: ffffffffffff","2026-02-17 01:18:33");
INSERT INTO reservations VALUES("11","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-19","08:30:00","1","pending","Notes: asdfasdf","2026-02-17 01:19:10");
INSERT INTO reservations VALUES("12","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","2026-02-19","08:00:00","1","pending","Notes: qqqqqqqqqq","2026-02-17 01:27:35");


CREATE TABLE `site_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO site_settings VALUES("1","site_name","BLVD Specialty Coffee","");
INSERT INTO site_settings VALUES("2","contact_email","info@blvdcoffee.com","");
INSERT INTO site_settings VALUES("3","contact_phone","+94 11 234 5678","");
INSERT INTO site_settings VALUES("4","address","Colombo, Sri Lanka","");
INSERT INTO site_settings VALUES("5","opening_hours","Mon-Fri: 8AM-8PM, Sat-Sun: 9AM-9PM","");
INSERT INTO site_settings VALUES("6","high_tea_classic_price","2500.00","");
INSERT INTO site_settings VALUES("7","high_tea_premium_price","3500.00","");
INSERT INTO site_settings VALUES("8","high_tea_deluxe_price","5000.00","");

SET FOREIGN_KEY_CHECKS=1;
