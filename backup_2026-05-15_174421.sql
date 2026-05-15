

CREATE TABLE `admin_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `details` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `admin_id` (`admin_id`),
  KEY `created_at` (`created_at`),
  CONSTRAINT `fk_activity_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=230 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
INSERT INTO admin_activity_log VALUES("64","1","login","User logged in","::1","2026-02-17 21:11:16");
INSERT INTO admin_activity_log VALUES("65","1","login","User logged in","::1","2026-02-17 22:50:22");
INSERT INTO admin_activity_log VALUES("66","1","login","User logged in","::1","2026-02-18 00:30:54");
INSERT INTO admin_activity_log VALUES("67","1","logout","User logged out","::1","2026-02-18 00:47:45");
INSERT INTO admin_activity_log VALUES("68","1","login","User logged in","::1","2026-02-18 00:47:53");
INSERT INTO admin_activity_log VALUES("69","1","logout","User logged out","::1","2026-02-18 00:48:55");
INSERT INTO admin_activity_log VALUES("70","1","login","User logged in","::1","2026-02-18 01:02:04");
INSERT INTO admin_activity_log VALUES("71","1","logout","User logged out","::1","2026-02-18 01:20:24");
INSERT INTO admin_activity_log VALUES("72","2","login","User logged in","::1","2026-02-18 01:20:40");
INSERT INTO admin_activity_log VALUES("73","2","logout","User logged out","::1","2026-02-18 01:23:42");
INSERT INTO admin_activity_log VALUES("74","1","login","User logged in","::1","2026-02-18 01:23:47");
INSERT INTO admin_activity_log VALUES("75","1","login","User logged in","::1","2026-02-18 09:47:24");
INSERT INTO admin_activity_log VALUES("76","1","login","User logged in","::1","2026-02-18 10:32:15");
INSERT INTO admin_activity_log VALUES("77","1","login","User logged in","::1","2026-02-18 11:48:35");
INSERT INTO admin_activity_log VALUES("78","1","login","User logged in","::1","2026-02-18 13:08:03");
INSERT INTO admin_activity_log VALUES("79","1","login","User logged in","::1","2026-02-18 13:47:14");
INSERT INTO admin_activity_log VALUES("80","1","logout","User logged out","::1","2026-02-18 13:57:27");
INSERT INTO admin_activity_log VALUES("81","1","login","User logged in","::1","2026-02-18 13:58:11");
INSERT INTO admin_activity_log VALUES("82","1","logout","User logged out","::1","2026-02-18 13:59:01");
INSERT INTO admin_activity_log VALUES("83","2","login","User logged in","::1","2026-02-18 13:59:10");
INSERT INTO admin_activity_log VALUES("84","2","logout","User logged out","::1","2026-02-18 14:00:18");
INSERT INTO admin_activity_log VALUES("85","3","login","User logged in","::1","2026-02-18 14:00:27");
INSERT INTO admin_activity_log VALUES("86","3","logout","User logged out","::1","2026-02-18 14:02:00");
INSERT INTO admin_activity_log VALUES("87","1","login","User logged in","::1","2026-02-18 14:02:05");
INSERT INTO admin_activity_log VALUES("88","1","logout","User logged out","::1","2026-02-18 14:02:21");
INSERT INTO admin_activity_log VALUES("89","1","login","User logged in","::1","2026-02-18 14:08:18");
INSERT INTO admin_activity_log VALUES("90","1","logout","User logged out","::1","2026-02-18 14:08:23");
INSERT INTO admin_activity_log VALUES("91","2","login","User logged in","::1","2026-02-18 14:08:35");
INSERT INTO admin_activity_log VALUES("92","2","logout","User logged out","::1","2026-02-18 14:29:15");
INSERT INTO admin_activity_log VALUES("93","3","login","User logged in","::1","2026-02-18 14:29:25");
INSERT INTO admin_activity_log VALUES("94","3","logout","User logged out","::1","2026-02-18 14:29:32");
INSERT INTO admin_activity_log VALUES("95","1","login","User logged in","::1","2026-02-18 14:29:37");
INSERT INTO admin_activity_log VALUES("96","1","login","User logged in","::1","2026-02-18 15:13:15");
INSERT INTO admin_activity_log VALUES("97","1","login","User logged in","::1","2026-02-18 20:38:04");
INSERT INTO admin_activity_log VALUES("98","1","login","User logged in","127.0.0.1","2026-02-19 23:17:34");
INSERT INTO admin_activity_log VALUES("99","1","login","User logged in","::1","2026-02-19 23:21:54");
INSERT INTO admin_activity_log VALUES("100","1","login","User logged in","::1","2026-02-20 12:59:40");
INSERT INTO admin_activity_log VALUES("101","1","login","User logged in","::1","2026-02-20 14:41:06");
INSERT INTO admin_activity_log VALUES("102","1","login","User logged in","::1","2026-02-20 15:37:16");
INSERT INTO admin_activity_log VALUES("103","1","login","User logged in","::1","2026-02-22 13:37:03");
INSERT INTO admin_activity_log VALUES("104","1","login","User logged in","::1","2026-02-23 22:30:43");
INSERT INTO admin_activity_log VALUES("105","1","login","User logged in","::1","2026-02-23 23:52:03");
INSERT INTO admin_activity_log VALUES("106","1","updated reservation status","Changed reservation #10 to completed","::1","2026-02-23 23:53:14");
INSERT INTO admin_activity_log VALUES("107","1","updated reservation status","Changed reservation #11 to completed","::1","2026-02-23 23:53:27");
INSERT INTO admin_activity_log VALUES("108","1","updated reservation status","Changed reservation #12 to completed","116.206.244.19","2026-02-23 19:06:13");
INSERT INTO admin_activity_log VALUES("109","1","updated reservation status","Changed reservation #13 to confirmed","116.206.244.19","2026-02-23 19:08:39");
INSERT INTO admin_activity_log VALUES("110","1","updated reservation status","Changed reservation #14 to confirmed","116.206.244.19","2026-02-23 19:16:23");
INSERT INTO admin_activity_log VALUES("111","1","updated reservation status","Changed reservation #14 to completed","116.206.244.19","2026-02-23 19:17:23");
INSERT INTO admin_activity_log VALUES("112","1","login","User logged in","27.33.112.71","2026-02-24 11:13:30");
INSERT INTO admin_activity_log VALUES("113","1","login","User logged in","27.33.112.71","2026-02-24 11:27:25");
INSERT INTO admin_activity_log VALUES("114","1","logout","User logged out","27.33.112.71","2026-02-24 11:30:42");
INSERT INTO admin_activity_log VALUES("115","2","login","User logged in","175.157.143.48","2026-02-24 11:31:53");
INSERT INTO admin_activity_log VALUES("116","2","login","User logged in","27.33.112.71","2026-02-24 11:32:13");
INSERT INTO admin_activity_log VALUES("117","1","login","User logged in","116.206.244.10","2026-02-24 14:23:47");
INSERT INTO admin_activity_log VALUES("118","1","login","User logged in","116.206.247.85","2026-02-24 16:53:35");
INSERT INTO admin_activity_log VALUES("119","1","logout","User logged out","116.206.247.85","2026-02-24 16:54:35");
INSERT INTO admin_activity_log VALUES("120","1","login","User logged in","116.206.247.85","2026-02-24 16:54:40");
INSERT INTO admin_activity_log VALUES("121","1","logout","User logged out","116.206.247.85","2026-02-24 16:54:43");
INSERT INTO admin_activity_log VALUES("122","1","login","User logged in","116.206.247.85","2026-02-24 16:56:24");
INSERT INTO admin_activity_log VALUES("123","1","login","User logged in","116.206.247.85","2026-02-24 17:06:52");
INSERT INTO admin_activity_log VALUES("124","1","login","User logged in","116.206.247.85","2026-02-24 17:17:51");
INSERT INTO admin_activity_log VALUES("125","1","login","User logged in","116.206.247.85","2026-02-24 17:38:39");
INSERT INTO admin_activity_log VALUES("126","1","login","User logged in","116.206.247.85","2026-02-24 17:57:25");
INSERT INTO admin_activity_log VALUES("127","1","login","User logged in","111.223.182.22","2026-02-25 04:09:47");
INSERT INTO admin_activity_log VALUES("128","1","login","User logged in","111.223.188.128","2026-02-27 04:25:07");
INSERT INTO admin_activity_log VALUES("129","1","login","User logged in","175.157.17.7","2026-03-02 11:57:15");
INSERT INTO admin_activity_log VALUES("130","1","login","User logged in","116.206.244.170","2026-03-04 05:32:24");
INSERT INTO admin_activity_log VALUES("131","1","login","User logged in","175.157.23.232","2026-03-04 15:38:02");
INSERT INTO admin_activity_log VALUES("132","2","login","User logged in","27.33.112.71","2026-03-07 02:27:49");
INSERT INTO admin_activity_log VALUES("133","2","updated reservation status","Changed reservation #17 to confirmed","27.33.112.71","2026-03-07 02:28:38");
INSERT INTO admin_activity_log VALUES("134","2","updated reservation status","Changed reservation #15 to confirmed","27.33.112.71","2026-03-07 02:29:02");
INSERT INTO admin_activity_log VALUES("135","2","updated reservation status","Changed reservation #16 to confirmed","27.33.112.71","2026-03-07 02:29:11");
INSERT INTO admin_activity_log VALUES("136","2","login","User logged in","49.196.91.199","2026-03-10 00:56:06");
INSERT INTO admin_activity_log VALUES("137","2","updated reservation status","Changed reservation #18 to confirmed","49.196.91.199","2026-03-10 00:56:27");
INSERT INTO admin_activity_log VALUES("138","1","login","User logged in","111.223.183.206","2026-03-12 04:25:59");
INSERT INTO admin_activity_log VALUES("139","1","login","User logged in","175.157.29.143","2026-03-14 15:20:02");
INSERT INTO admin_activity_log VALUES("140","2","login","User logged in","27.33.112.71","2026-03-20 16:57:16");
INSERT INTO admin_activity_log VALUES("141","2","updated reservation status","Changed reservation #20 to confirmed","27.33.112.71","2026-03-20 16:57:53");
INSERT INTO admin_activity_log VALUES("142","2","updated reservation status","Changed reservation #21 to confirmed","27.33.112.71","2026-03-20 16:58:06");
INSERT INTO admin_activity_log VALUES("143","2","updated reservation status","Changed reservation #19 to completed","27.33.112.71","2026-03-20 16:58:45");
INSERT INTO admin_activity_log VALUES("144","1","login","User logged in","175.157.28.0","2026-03-24 14:33:46");
INSERT INTO admin_activity_log VALUES("145","1","logout","User logged out","175.157.28.0","2026-03-24 14:35:18");
INSERT INTO admin_activity_log VALUES("146","2","login","User logged in","175.157.28.0","2026-03-24 14:35:43");
INSERT INTO admin_activity_log VALUES("147","1","login","User logged in","175.157.28.0","2026-03-24 15:25:37");
INSERT INTO admin_activity_log VALUES("148","2","login","User logged in","60.240.225.49","2026-03-25 04:08:17");
INSERT INTO admin_activity_log VALUES("149","2","updated reservation status","Changed reservation #22 to completed","60.240.225.49","2026-03-25 04:08:49");
INSERT INTO admin_activity_log VALUES("150","2","updated reservation status","Changed reservation #23 to confirmed","60.240.225.49","2026-03-25 04:09:03");
INSERT INTO admin_activity_log VALUES("151","2","login","User logged in","220.244.143.233","2026-03-27 22:58:23");
INSERT INTO admin_activity_log VALUES("152","2","updated reservation status","Changed reservation #25 to confirmed","220.244.143.233","2026-03-27 22:58:48");
INSERT INTO admin_activity_log VALUES("153","2","updated reservation status","Changed reservation #24 to confirmed","220.244.143.233","2026-03-27 22:58:57");
INSERT INTO admin_activity_log VALUES("154","1","login","User logged in","212.104.231.99","2026-04-01 06:45:52");
INSERT INTO admin_activity_log VALUES("155","1","login","User logged in","175.157.41.206","2026-04-02 09:30:54");
INSERT INTO admin_activity_log VALUES("156","2","login","User logged in","220.244.143.233","2026-04-10 14:25:45");
INSERT INTO admin_activity_log VALUES("157","2","updated reservation status","Changed reservation #31 to confirmed","220.244.143.233","2026-04-10 14:27:34");
INSERT INTO admin_activity_log VALUES("158","2","updated reservation status","Changed reservation #28 to completed","220.244.143.233","2026-04-10 14:27:57");
INSERT INTO admin_activity_log VALUES("159","2","updated reservation status","Changed reservation #29 to completed","220.244.143.233","2026-04-10 14:28:12");
INSERT INTO admin_activity_log VALUES("160","2","updated reservation status","Changed reservation #30 to completed","220.244.143.233","2026-04-10 14:28:24");
INSERT INTO admin_activity_log VALUES("161","2","updated reservation status","Changed reservation #27 to completed","220.244.143.233","2026-04-10 14:28:35");
INSERT INTO admin_activity_log VALUES("162","2","updated reservation status","Changed reservation #26 to completed","220.244.143.233","2026-04-10 14:28:46");
INSERT INTO admin_activity_log VALUES("163","2","login","User logged in","220.244.143.233","2026-04-12 11:30:53");
INSERT INTO admin_activity_log VALUES("164","2","updated reservation status","Changed reservation #34 to confirmed","220.244.143.233","2026-04-12 11:32:02");
INSERT INTO admin_activity_log VALUES("165","2","updated reservation status","Changed reservation #33 to completed","220.244.143.233","2026-04-12 11:32:24");
INSERT INTO admin_activity_log VALUES("166","2","updated reservation status","Changed reservation #32 to completed","220.244.143.233","2026-04-12 11:32:37");
INSERT INTO admin_activity_log VALUES("167","2","login","User logged in","220.244.143.233","2026-04-16 11:12:27");
INSERT INTO admin_activity_log VALUES("168","2","updated reservation status","Changed reservation #35 to completed","220.244.143.233","2026-04-16 11:12:51");
INSERT INTO admin_activity_log VALUES("169","2","login","User logged in","220.244.143.233","2026-04-18 17:17:09");
INSERT INTO admin_activity_log VALUES("170","2","login","User logged in","220.244.143.233","2026-04-19 02:31:05");
INSERT INTO admin_activity_log VALUES("171","2","updated reservation status","Changed reservation #36 to confirmed","220.244.143.233","2026-04-19 02:31:26");
INSERT INTO admin_activity_log VALUES("172","2","login","User logged in","124.170.45.231","2026-04-20 15:03:10");
INSERT INTO admin_activity_log VALUES("173","2","login","User logged in","124.170.45.231","2026-04-20 15:04:33");
INSERT INTO admin_activity_log VALUES("174","2","updated reservation status","Changed reservation #37 to confirmed","124.170.45.231","2026-04-20 15:07:12");
INSERT INTO admin_activity_log VALUES("175","2","login","User logged in","124.170.45.231","2026-04-21 14:15:04");
INSERT INTO admin_activity_log VALUES("176","2","login","User logged in","120.18.27.145","2026-04-23 04:46:01");
INSERT INTO admin_activity_log VALUES("177","2","login","User logged in","49.196.77.23","2026-04-24 02:35:54");
INSERT INTO admin_activity_log VALUES("178","2","login","User logged in","124.170.45.231","2026-04-25 02:38:53");
INSERT INTO admin_activity_log VALUES("179","2","login","User logged in","124.170.45.231","2026-04-26 13:30:24");
INSERT INTO admin_activity_log VALUES("180","2","updated reservation status","Changed reservation #38 to confirmed","124.170.45.231","2026-04-26 13:31:37");
INSERT INTO admin_activity_log VALUES("181","2","login","User logged in","49.196.233.64","2026-04-27 02:29:48");
INSERT INTO admin_activity_log VALUES("182","2","updated reservation status","Changed reservation #39 to confirmed","49.196.233.64","2026-04-27 02:30:03");
INSERT INTO admin_activity_log VALUES("183","2","updated reservation status","Changed reservation #40 to confirmed","49.196.233.64","2026-04-27 02:30:15");
INSERT INTO admin_activity_log VALUES("184","2","login","User logged in","120.18.27.145","2026-04-27 03:08:53");
INSERT INTO admin_activity_log VALUES("185","2","login","User logged in","124.170.45.231","2026-04-30 04:07:46");
INSERT INTO admin_activity_log VALUES("186","1","login","User logged in","175.157.9.169","2026-04-30 10:30:22");
INSERT INTO admin_activity_log VALUES("187","1","logout","User logged out","175.157.9.169","2026-04-30 10:32:08");
INSERT INTO admin_activity_log VALUES("188","2","login","User logged in","101.118.2.222","2026-05-01 01:41:44");
INSERT INTO admin_activity_log VALUES("189","2","login","User logged in","49.196.46.139","2026-05-02 01:53:39");
INSERT INTO admin_activity_log VALUES("190","2","login","User logged in","124.170.45.231","2026-05-03 10:19:21");
INSERT INTO admin_activity_log VALUES("191","2","updated reservation status","Changed reservation #41 to confirmed","124.170.45.231","2026-05-03 10:20:08");
INSERT INTO admin_activity_log VALUES("192","2","login","User logged in","124.170.45.231","2026-05-04 05:06:19");
INSERT INTO admin_activity_log VALUES("193","2","updated reservation status","Changed reservation #42 to confirmed","124.170.45.231","2026-05-04 05:06:41");
INSERT INTO admin_activity_log VALUES("194","2","login","User logged in","124.170.45.231","2026-05-04 08:32:58");
INSERT INTO admin_activity_log VALUES("195","2","login","User logged in","124.170.45.231","2026-05-05 01:45:52");
INSERT INTO admin_activity_log VALUES("196","2","updated reservation status","Changed reservation #43 to confirmed","124.170.45.231","2026-05-05 01:46:06");
INSERT INTO admin_activity_log VALUES("197","2","login","User logged in","101.118.2.222","2026-05-05 02:08:55");
INSERT INTO admin_activity_log VALUES("198","2","login","User logged in","124.170.45.231","2026-05-06 02:39:35");
INSERT INTO admin_activity_log VALUES("199","2","updated reservation status","Changed reservation #44 to confirmed","124.170.45.231","2026-05-06 02:39:56");
INSERT INTO admin_activity_log VALUES("200","2","updated reservation status","Changed reservation #45 to confirmed","124.170.45.231","2026-05-06 02:40:03");
INSERT INTO admin_activity_log VALUES("201","2","login","User logged in","124.170.45.231","2026-05-06 09:54:25");
INSERT INTO admin_activity_log VALUES("202","2","updated reservation status","Changed reservation #46 to confirmed","124.170.45.231","2026-05-06 09:54:57");
INSERT INTO admin_activity_log VALUES("203","2","login","User logged in","101.118.2.222","2026-05-07 05:02:42");
INSERT INTO admin_activity_log VALUES("204","2","updated reservation status","Changed reservation #47 to confirmed","101.118.2.222","2026-05-07 05:03:04");
INSERT INTO admin_activity_log VALUES("205","2","login","User logged in","124.170.45.231","2026-05-08 17:32:49");
INSERT INTO admin_activity_log VALUES("206","2","updated reservation status","Changed reservation #48 to confirmed","124.170.45.231","2026-05-08 17:33:11");
INSERT INTO admin_activity_log VALUES("207","2","login","User logged in","124.170.45.231","2026-05-09 01:41:33");
INSERT INTO admin_activity_log VALUES("208","2","updated reservation status","Changed reservation #49 to confirmed","124.170.45.231","2026-05-09 01:41:55");
INSERT INTO admin_activity_log VALUES("209","2","login","User logged in","124.170.45.231","2026-05-09 07:29:25");
INSERT INTO admin_activity_log VALUES("210","2","updated reservation status","Changed reservation #51 to confirmed","124.170.45.231","2026-05-09 07:29:48");
INSERT INTO admin_activity_log VALUES("211","2","login","User logged in","124.170.45.231","2026-05-09 11:14:05");
INSERT INTO admin_activity_log VALUES("212","2","updated reservation status","Changed reservation #50 to confirmed","124.170.45.231","2026-05-09 11:15:51");
INSERT INTO admin_activity_log VALUES("213","2","updated reservation status","Changed reservation #52 to confirmed","124.170.45.231","2026-05-09 11:16:01");
INSERT INTO admin_activity_log VALUES("214","2","login","User logged in","124.170.45.231","2026-05-09 11:21:10");
INSERT INTO admin_activity_log VALUES("215","2","login","User logged in","124.170.45.231","2026-05-09 11:30:39");
INSERT INTO admin_activity_log VALUES("216","2","login","User logged in","124.170.45.231","2026-05-09 12:12:16");
INSERT INTO admin_activity_log VALUES("217","2","login","User logged in","49.196.182.189","2026-05-10 02:02:12");
INSERT INTO admin_activity_log VALUES("218","2","updated reservation status","Changed reservation #53 to confirmed","49.196.182.189","2026-05-10 02:02:33");
INSERT INTO admin_activity_log VALUES("219","2","updated reservation status","Changed reservation #54 to confirmed","101.118.2.222","2026-05-10 02:07:59");
INSERT INTO admin_activity_log VALUES("220","2","login","User logged in","124.170.45.231","2026-05-10 06:11:38");
INSERT INTO admin_activity_log VALUES("221","2","updated reservation status","Changed reservation #55 to completed","124.170.45.231","2026-05-10 06:12:33");
INSERT INTO admin_activity_log VALUES("222","2","updated reservation status","Changed reservation #56 to confirmed","124.170.45.231","2026-05-10 06:12:42");
INSERT INTO admin_activity_log VALUES("223","2","login","User logged in","101.118.2.222","2026-05-10 07:40:26");
INSERT INTO admin_activity_log VALUES("224","2","updated reservation status","Changed reservation #57 to confirmed","101.118.2.222","2026-05-10 07:40:41");
INSERT INTO admin_activity_log VALUES("225","1","login","User logged in","175.157.47.86","2026-05-10 07:40:47");
INSERT INTO admin_activity_log VALUES("226","1","updated reservation status","Changed reservation #57 to cancelled","175.157.47.86","2026-05-10 07:42:53");
INSERT INTO admin_activity_log VALUES("227","2","login","User logged in","124.170.45.231","2026-05-14 11:43:55");
INSERT INTO admin_activity_log VALUES("228","1","login","User logged in","175.157.14.18","2026-05-15 09:34:59");
INSERT INTO admin_activity_log VALUES("229","1","login","User logged in","111.223.179.93","2026-05-15 18:41:52");


CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','owner','manager') NOT NULL DEFAULT 'manager',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role` (`role`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO admin_users VALUES("1","admin","lankawebnets@gmail.com","$2y$10$Ieqx2Apw9qvkPfxgbLQ7c.6Oc7WRNoGMu4x97p0pjDvfIVqyGCH4C","admin","1","2026-05-15 17:41:52","2026-02-03 22:28:00","");
INSERT INTO admin_users VALUES("2","owner","owner@blvdcoffee.com","$2y$10$Goy6IDcpaxwwT9SyBlxTM.1NZphXaFD3wtIK5zlc/GwpEm37vnYIO","owner","1","2026-05-14 10:43:55","2026-02-03 22:28:00","");
INSERT INTO admin_users VALUES("3","manager","manager@blvdcoffee.com","$2y$10$msfD/FDwCn6qbxfV10930.03OENfGW6w3dNaN.lcju9oDiGB2URSy","manager","1","2026-02-18 08:59:25","2026-02-03 22:28:00","");


CREATE TABLE `backup_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_group` varchar(50) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO backup_settings VALUES("1","backup","backup_enabled","1","2026-02-17 21:49:38","2026-02-18 14:29:05");
INSERT INTO backup_settings VALUES("2","backup","backup_frequency","daily","2026-02-17 21:49:38","2026-02-17 21:49:38");
INSERT INTO backup_settings VALUES("3","backup","backup_retention","7","2026-02-17 21:49:38","2026-02-17 21:49:38");
INSERT INTO backup_settings VALUES("4","backup","backup_storage","local","2026-02-17 21:49:38","2026-02-17 21:49:38");
INSERT INTO backup_settings VALUES("5","","backup_cloud_enabled","0","2026-02-17 22:39:46","2026-02-17 22:39:46");


CREATE TABLE `backups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `type` enum('manual','auto','upload') NOT NULL,
  `size` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO backups VALUES("2","backup_2026-02-17_173654.sql","manual","27385","1","2026-02-17 23:06:54");
INSERT INTO backups VALUES("6","upload_2026-02-17_174601_walakulu_blvdsc20260216.sql","upload","26762","1","2026-02-17 23:16:01");
INSERT INTO backups VALUES("8","backup_2026-02-17_175442.sql","manual","27623","1","2026-02-17 23:24:42");
INSERT INTO backups VALUES("10","backup_2026-02-22_082858.sql","manual","33273","1","2026-02-22 13:58:58");
INSERT INTO backups VALUES("11","backup_2026-05-10_064514.sql","manual","61562","1","2026-05-10 07:45:14");


CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `replied_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `is_read` (`is_read`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO contact_messages VALUES("12","Janaka Walakuluarachchi","ictoncp@gmail.com","0112345679","Test Janaka","testing","1","2026-02-23 19:26:26","2026-02-23 19:25:40");
INSERT INTO contact_messages VALUES("13","Yash Bhatnagar","yash.rocketdigitaltech@gmail.com","07532833829","Let\'s Get Your Website to Google\'s 1st Page","Hi,\n\nI would like to discuss a business SEO.\n\nLet me know if you are interested, then I can send you our Full SEO Packages with plan, activities, and Price list.\n \nThank You,\nYash","1","","2026-02-26 06:13:17");
INSERT INTO contact_messages VALUES("14","Trever Gray","trever.gray@turbojot.com","2158218810","This might be helpful","Hello! Would automating form submission campaigns help your team? I founded a company built specifically for scalable form submission campaigns using our 100M plus residential IP network, our proprietary stealth browser, AI powered captcha solving, and human like interaction patterns designed to remain undetectable. If you\'re open to it, you can book a time with me through our site. Hoping to connect! https://calendly.com/turbojot/30min","1","","2026-03-03 18:48:08");
INSERT INTO contact_messages VALUES("15","Trever Gray","trever.gray@turbojot.com","","","Hello! Would automating form submission campaigns help your team? I founded a company built specifically for scalable form submission campaigns using our 100M plus residential IP network, our proprietary stealth browser, AI powered captcha solving, and human like interaction patterns designed to remain undetectable. If you\'re open to it, you can book a time with me through our site. Hoping to connect! https://calendly.com/turbojot/30min","1","","2026-03-03 18:48:23");
INSERT INTO contact_messages VALUES("16","Alyssa Stone","alyssa@turbojot.com","2158218810","Please give it a try!","Hi! My name is Alyssa and I’d love to invite you to try TurboJot. I actually founded the company. It’s built to automate contact form submissions at scale. Simply upload a list of URLs and TurboJot automatically finds and submits contact forms on those sites. It beats cold email and paid ads on ROI and costs just $0.10 per submission. Powered by a rotating IP network, stealth browser, AI captcha solving, and human-like browsing behavior. You can sign up for free and give it a try here. I’d really appreciate the support! https://www.turbojot.com/","0","","2026-03-24 18:06:30");
INSERT INTO contact_messages VALUES("17","Alyssa Stone","alyssa@turbojot.com","","","Hi! My name is Alyssa and I’d love to invite you to try TurboJot. I actually founded the company. It’s built to automate contact form submissions at scale. Simply upload a list of URLs and TurboJot automatically finds and submits contact forms on those sites. It beats cold email and paid ads on ROI and costs just $0.10 per submission. Powered by a rotating IP network, stealth browser, AI captcha solving, and human-like browsing behavior. You can sign up for free and give it a try here. I’d really appreciate the support! https://www.turbojot.com/","1","","2026-03-24 18:06:48");
INSERT INTO contact_messages VALUES("18","Sophie Lane","sophie@sendproud.com","2155394452","Guaranteed results or your money back","Hi, I’m Sophie! I tried to find you on LinkedIn but couldn’t, so I’m reaching out here. I help businesses book meetings, drive traffic, and generate user sign ups through targeted outreach using my extensive private network, built over 12+ years, with access to over 100 million contacts. We’ll have a quick call to set a clear goal for your business, and I’ll personally work to make sure we reach it. You choose the result you want, whether that’s booked meetings, website traffic, user sign ups, or another measurable outcome, and if I fall short by even one, I’ll refund your money in full. Schedule a time with me here: https://calendly.com/sendproud/30min","1","","2026-04-03 02:24:53");
INSERT INTO contact_messages VALUES("19","Sophie Lane","sophie@sendproud.com","","","Hi, I’m Sophie! I tried to find you on LinkedIn but couldn’t, so I’m reaching out here. I help businesses book meetings, drive traffic, and generate user sign ups through targeted outreach using my extensive private network, built over 12+ years, with access to over 100 million contacts. We’ll have a quick call to set a clear goal for your business, and I’ll personally work to make sure we reach it. You choose the result you want, whether that’s booked meetings, website traffic, user sign ups, or another measurable outcome, and if I fall short by even one, I’ll refund your money in full. Schedule a time with me here: https://calendly.com/sendproud/30min","1","","2026-04-03 02:25:18");
INSERT INTO contact_messages VALUES("20","Lisa Ferris","lferris@eastfremantle.wa.gov.au","4671099532","Coffee booking.","Hi, I tried to call earlier to make a booking for a senior\'s group of 17 people for Coffee @ 10.30 Monday 20/04/2026 but the call won\'t connect.\nKind regards Lisa.","1","2026-04-18 17:26:44","2026-04-16 04:04:43");
INSERT INTO contact_messages VALUES("21","Hannah Melotto","hm@melottogroup.com","2158218810","Ready to assist","Hello! Do you have any use for a freelance writer? I have nearly a decade of experience and am looking for new opportunities. You can book a time with me to chat if interested. Looking forward to connecting! https://calendly.com/melottogroup/30min","1","","2026-04-18 07:53:29");
INSERT INTO contact_messages VALUES("22","Hannah Melotto","hm@melottogroup.com","","","Hello! Do you have any use for a freelance writer? I have nearly a decade of experience and am looking for new opportunities. You can book a time with me to chat if interested. Looking forward to connecting! https://calendly.com/melottogroup/30min","1","2026-04-18 17:19:53","2026-04-18 07:53:50");
INSERT INTO contact_messages VALUES("23","Yuvi","ymodgil52@gmail.com","0452300251","Fresh Fruit and Vegetable supplier","Hi \nMy name is Yuvi, and I’m reaching out from Next wave Fresh Produce, a local Perth supplier of fresh fruit and vegetables for cafes, restaurants, and hospitality venues.\n\nWe focus on providing:\n\n• Fresh, quality produce\n• Competitive pricing\n• Reliable deliveries\n• Flexible ordering\n• Fast response for urgent top-up orders\n\nI’d love the opportunity to Discuss pricing or arrange a small trial order so you can experience our service firsthand.\n\nThank you for your time, and I hope to work with you soon.\n\nKind regards,\nYuvi\nNextwave Logistics","1","2026-04-26 13:46:59","2026-04-20 04:44:32");
INSERT INTO contact_messages VALUES("24","Shanna Halton","shanna.halton123@gmail.com","0468548720","Booking","Enquiring about a booking for 7 people for breakfast at 0930 on 10/5","1","2026-05-06 02:44:46","2026-05-02 06:02:20");


CREATE TABLE `custom_special_days` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO custom_special_days VALUES("1","2026-12-25","Christmas Day - Closed","","2026-02-04 00:59:33");
INSERT INTO custom_special_days VALUES("2","2026-12-31","New Year\'s Eve - Private Event","","2026-02-04 00:59:33");
INSERT INTO custom_special_days VALUES("3","2026-03-06","Staff Training Day","","2026-02-04 00:59:33");


CREATE TABLE `customer_reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `admin_reply` text DEFAULT NULL,
  `replied_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `status` (`status`),
  KEY `is_featured` (`is_featured`),
  KEY `rating` (`rating`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO customer_reviews VALUES("1","Henry Thompson","5","Absolutely amazing experience! The coffee was superb and the staff was incredibly friendly. Will definitely come back!","pending","0","","","2026-02-04 00:59:33");
INSERT INTO customer_reviews VALUES("2","Isabel Rodriguez","4","Great atmosphere and delicious food. Only minor issue was the wait time, but worth it!","pending","0","","","2026-02-03 21:59:33");
INSERT INTO customer_reviews VALUES("3","Jack Lee","5","Best high tea in town! The selection of pastries was incredible. Highly recommend the Premium package.","approved","1","Thank you so much for your kind words! We\'re delighted you enjoyed the experience.","","2026-02-02 00:59:33");
INSERT INTO customer_reviews VALUES("4","Karen White","3","Food was okay, but service could be improved. Coffee quality is excellent though.","pending","0","","","2026-02-03 19:59:33");


CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `event_date` date NOT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `location` varchar(255) DEFAULT 'BLVD Coffee, 123 Main Street',
  `price_per_person` varchar(100) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','cancelled') NOT NULL DEFAULT 'draft',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `event_date` (`event_date`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO events VALUES("7","Live Jazz Evening","Enjoy smooth jazz music while sipping your favorite coffee beverages. Featuring local artists in an intimate caf� setting. Reservations recommended.","2026-02-19","09:00:00","11:00:00","BLVD Specialty Coffee, 123 Main Street","$50.00 Per Person","uploads/events/1770222809_698374d998a58.jpeg","published","1","2026-02-04 15:21:14","2026-02-18 11:59:29");
INSERT INTO events VALUES("9","Barista Masterclass","Professional barista training session covering espresso extraction, milk steaming, and advanced brewing techniques. Limited spots available!","2026-02-01","10:00:00","12:00:00","BLVD Specialty Coffee, 123 Main Street","$35 Per Person","uploads/events/1770222143_6983723f0fe0b.jpeg","published","1","2026-02-04 15:21:14","2026-02-23 19:13:07");
INSERT INTO events VALUES("10","Weekend Brunch Special","Planning a special weekend brunch menu with artisanal coffee pairings. Details to be confirmed.","2026-02-14","11:00:00","14:00:00","BLVD Coffee, 123 Main Street","$55.00","uploads/events/1770223464_69837768a19a3.jpeg","published","1","2026-02-04 15:21:14","2026-02-23 19:13:55");
INSERT INTO events VALUES("15","Mothers Day Brunch 2026","Treat mum this Mothers Day. ","2026-05-10","08:00:00","13:00:00","BLVD Specialty  Coffee, 96 Waratah Boulevard,Canningvale,WA 6155","$27.50 ","uploads/events/1778258840_69fe13982fa69.png","published","2","2026-05-08 17:47:20","2026-05-08 17:48:06");


CREATE TABLE `gallery_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `display_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `uploaded_by` int(11) DEFAULT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `is_active` (`is_active`),
  KEY `display_order` (`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO gallery_photos VALUES("1","coffee-art-1.jpg","Latte Art Masterpiece","Coffee","1","1","","2026-02-04 00:59:33");
INSERT INTO gallery_photos VALUES("2","high-tea-1.jpg","Premium High Tea Setup","High Tea","2","1","","2026-02-04 00:59:33");
INSERT INTO gallery_photos VALUES("3","interior-1.jpg","Cozy Interior","Ambiance","3","1","","2026-02-04 00:59:33");
INSERT INTO gallery_photos VALUES("4","food-1.jpg","Signature Dishes","Food","4","1","","2026-02-04 00:59:33");
INSERT INTO gallery_photos VALUES("5","outdoor-1.jpg","Outdoor Seating Area","Ambiance","5","1","","2026-02-04 00:59:33");


CREATE TABLE `high_tea_reservations` (
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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `status` (`status`),
  KEY `package_type` (`package_type`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO high_tea_reservations VALUES("31","Janaka Walakulu [ ICT Officer ]","ictoncp@gmail.com","0112345680","2026-02-27","11:30:00","2","classic","79.90","completed","Testing message","2026-02-23 19:19:54");
INSERT INTO high_tea_reservations VALUES("32","Kerri Shepherd","kezzashep@hotmail.com","0418638276","2026-05-15","11:30:00","2","classic","79.90","confirmed","","2026-05-13 13:30:21");


CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `is_available` (`is_available`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `image_url` varchar(500) DEFAULT NULL,
  `display_order` int(11) DEFAULT 0,
  `status` enum('published','draft') DEFAULT 'draft',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `idx_status` (`status`),
  KEY `idx_order` (`display_order`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO menus VALUES("1","COFFEE & TEA","coffee-tea","assets/images/menu-coffee-tea.webp","1","published","","2026-02-17 06:50:15","2026-05-08 17:54:55");
INSERT INTO menus VALUES("2","OTHER BEVERAGES","other-beverages","assets/images/menu-other-beverages.webp","2","published","","2026-02-17 06:50:15","2026-02-17 06:50:15");
INSERT INTO menus VALUES("3","ALL DAY BREAKFAST & SPECIALTIES","breakfast-specialties","uploads/menus/1778259228_69fe151cf35f2.png","3","published","","2026-02-17 06:50:15","2026-05-08 17:53:49");
INSERT INTO menus VALUES("4","KIDS & SEASONAL","kids-seasonal","uploads/menus/1778259339_69fe158b9fc5d.png","4","published","","2026-02-17 06:50:15","2026-05-08 17:55:39");


CREATE TABLE `message_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `idx_message_replies_message_id` (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO message_replies VALUES("3","12","1","I\'ll get back to you soon","2026-02-23 19:26:26");
INSERT INTO message_replies VALUES("4","22","2","Hi Hannah,\nThanks for reaching out. We are unsure how we could benifit from it as a cafe. If you have done some work for cafes in the past please get in touch via email Bookingsblvd@gmail.com. we can certainly put some thought to it.\nRegards","2026-04-18 17:19:53");
INSERT INTO message_replies VALUES("5","20","2","Hi Lisa,\nApologies for the delay. We have a seperate reservations page for bookings. However we do realise that it may not allow for larger bookings over 10. If you still havent booked  anywhere else we would love to assist. We can also offer 5% OFF for seniors. Please send us a confirmation email on bookingsblvd@gmail.com or text 0403529251  if you want us to reserve a table for this Monday. \nRegards\nTeam blvd.","2026-04-18 17:26:44");
INSERT INTO message_replies VALUES("6","23","2","Hi \nThanks. Yes we would like sole pricing on below please\nJuicing grade oranges\nApples\nBacon\nEggs\nCherry tomato\nLarge tomato\nBasil corriander chives \nRed chilli \nFrozen mixed berry\nStrawberry \nAvacado\n\nThanks","2026-04-26 13:46:59");
INSERT INTO message_replies VALUES("7","24","2","Hi Shanna,\nApologies for the delay. We would like to confirm your booking for 7ppl at 9:30am for this Sunday. Please kindly acknowledge the receipt of this email.\nRegards\nTeam BLVD","2026-05-06 02:44:46");


CREATE TABLE `reservations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `party_size` int(11) NOT NULL,
  `status` enum('pending','confirmed','completed','cancelled') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `date` (`date`),
  KEY `status` (`status`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO reservations VALUES("10","Penny Pearce","p_pearce@outlook.com","0457452169","2026-02-21","08:00:00","2","completed","","2026-02-17 11:26:49");
INSERT INTO reservations VALUES("11","Ansen","ansenchoy@gmail.com","0401135137","2026-02-21","11:30:00","4","completed","","2026-02-21 03:04:07");
INSERT INTO reservations VALUES("12","Anna loucas","annaloucas@hotmail.com","0467710108","2026-02-22","09:30:00","2","completed","Notes: We will have a pram with us.","2026-02-21 08:40:57");
INSERT INTO reservations VALUES("13","Ornella","ornella.jean@outlook.com","0475102530","2026-02-24","08:00:00","3","confirmed","Notes: Can I bring a birthday candle please? \n2 adults one child \nCan I also please have a high chair? \nThank you","2026-02-23 08:07:05");
INSERT INTO reservations VALUES("14","Janaka Walakulu [ ICT Officer ]","ictoncp@gmail.com","0112345679","2026-02-25","09:00:00","1","completed","Notes: eeeeeeeeeee","2026-02-23 19:15:14");
INSERT INTO reservations VALUES("15","Abbey Ward","wardabigail59@gmail.com","0451099630","2026-03-07","09:30:00","3","confirmed","","2026-03-06 03:24:53");
INSERT INTO reservations VALUES("16","Abbey Ward","wardabigail59@gmail.com","0451099630","2026-03-07","09:30:00","3","confirmed","","2026-03-06 03:25:51");
INSERT INTO reservations VALUES("17","Zip","zipporah.sam@hotmail.com","0420679996","2026-03-07","11:00:00","3","confirmed","","2026-03-07 00:55:01");
INSERT INTO reservations VALUES("18","Leesa Taveira","leesa.taveira@gmail.com","0438225427","2026-03-29","10:00:00","5","confirmed","","2026-03-08 22:40:24");
INSERT INTO reservations VALUES("19","Natalie Menage","nataliemenage@gmail.com","0409141271","2026-03-20","09:00:00","2","completed","","2026-03-19 03:16:27");
INSERT INTO reservations VALUES("20","Nelmarie Nagel","nelmarienagel@gmail.com","0493717159","2026-03-21","11:00:00","2","confirmed","","2026-03-20 10:51:18");
INSERT INTO reservations VALUES("21","coussy","tcoussy10@gmail.com","titouan","2026-03-21","11:00:00","2","confirmed","","2026-03-20 15:40:53");
INSERT INTO reservations VALUES("22","Jayde Whelan","jaydewhelan@hotmail.com","0416010982","2026-03-23","11:00:00","2","completed","","2026-03-22 08:04:53");
INSERT INTO reservations VALUES("23","Matt","mattygbails@gmail.com","0421952963","2026-03-29","11:00:00","2","confirmed","","2026-03-24 04:59:47");
INSERT INTO reservations VALUES("24","Gino Giulio Macchiusi","ggmacc@bigpond.net.au","0418918669","2026-04-26","09:30:00","5","confirmed","","2026-03-27 06:15:57");
INSERT INTO reservations VALUES("25","David Mazzotti","ittozzam@gmail.com","0449001505","2026-03-28","10:30:00","4","confirmed","","2026-03-27 11:26:36");
INSERT INTO reservations VALUES("26","Tristan McInnes","tristanmcinnesemail@gmail.com","0425261908","2026-04-03","11:30:00","2","completed","","2026-04-02 09:48:08");
INSERT INTO reservations VALUES("27","Nevena Grbic","nevena_c91@hotmail.com","0433623433","2026-04-09","09:30:00","6","completed","Notes: 1x highchair please. We will be arriving around 9:15am.","2026-04-08 06:36:25");
INSERT INTO reservations VALUES("28","Hayley Dos Santos","hayleydos10@gmail.com","0430431599","2026-04-10","09:00:00","4","completed","Notes: Can we have an inside table please","2026-04-09 07:13:44");
INSERT INTO reservations VALUES("29","Hayley Dos Santos","hayleydos10@gmail.com","0430431599","2026-04-10","09:00:00","4","completed","Notes: Hi there. I made a booking earlier asking for an inside table but would like to change that to the outside wooden table please - we might have 2 extras joining us. Thank you","2026-04-09 07:24:58");
INSERT INTO reservations VALUES("30","Ebony M","ebony.moffitt12@gmail.com","0478079684","2026-04-10","09:00:00","2","completed","","2026-04-09 10:50:00");
INSERT INTO reservations VALUES("31","Claire O\'Brien","c.l.obrien@live.com.au","0424 969 846","2026-04-12","10:30:00","2","confirmed","","2026-04-10 13:28:14");
INSERT INTO reservations VALUES("32","Emily Dawson","emilysicloud14@gmail.com","0460033518","2026-04-11","10:00:00","4","completed","","2026-04-11 00:11:25");
INSERT INTO reservations VALUES("33","Brooke Jacobson","bewj72@gmail.com","0412465510","2026-04-12","10:30:00","7","completed","Notes: Outside please","2026-04-12 02:17:09");
INSERT INTO reservations VALUES("34","jessin","jessintankx@gmail.com","6591008664","2026-06-01","08:30:00","6","confirmed","","2026-04-12 10:06:31");
INSERT INTO reservations VALUES("35","Stephen Murrat","stephenlawrencemurray@gmail.com","0477918696","2026-04-14","10:30:00","4","completed","Notes: Cosy positing with pleasant aspect, please.","2026-04-14 01:07:06");
INSERT INTO reservations VALUES("36","Aileen","hoganails@hotmail.com","435601685","2026-04-19","09:30:00","4","confirmed","","2026-04-19 01:56:28");
INSERT INTO reservations VALUES("37","Tara Verhaaf","tara.verhaaf@gmail.com","0421560737","2026-04-24","09:30:00","4","confirmed","Notes: If we could please book a table for outside, thank you","2026-04-19 03:59:32");
INSERT INTO reservations VALUES("38","Lisa Cooper","cooperl2010@gmail.com","0409887544","2026-05-03","10:30:00","4","confirmed","Notes: Pls could we have a reasonably private table outside (in the corner) but if the weather is really bad, we may need to be inside.  Thanks very much.","2026-04-26 03:48:47");
INSERT INTO reservations VALUES("39","SANAEA IRANI","sanaea_19@hotmail.com","0416661787","2026-04-27","11:00:00","3","confirmed","","2026-04-26 14:53:22");
INSERT INTO reservations VALUES("40","John Freeman","jfsefreeman@tpg.com.au","0421039252","2026-04-27","10:30:00","3","confirmed","Notes: A nice table out of the weather","2026-04-27 01:03:19");
INSERT INTO reservations VALUES("41","Liana jones","liana.cooper@hotmail.com","0409379613","2026-05-10","09:00:00","5","confirmed","","2026-05-03 10:03:04");
INSERT INTO reservations VALUES("42","Michaela Lumsden","michaela.lumsden@gmail.com","0410778942","2026-05-10","11:00:00","3","confirmed","","2026-05-04 04:54:22");
INSERT INTO reservations VALUES("43","Amy Rozario","amy-rozario@hotmail.com","0423138398","2026-05-23","09:30:00","4","confirmed","Notes: Could we also please have space for a high chair/pram :)","2026-05-04 12:01:25");
INSERT INTO reservations VALUES("44","Kaia","kaiajadeswiggs@gmail.com","0415852110","2026-05-10","11:00:00","3","confirmed","","2026-05-05 11:40:17");
INSERT INTO reservations VALUES("45","Aaron Wood","woodaaron013@gmail.com","0448121303","2026-05-10","09:00:00","4","confirmed","","2026-05-06 02:38:05");
INSERT INTO reservations VALUES("46","Ben","benhealey@iinet.net.au","0414471593","2026-05-10","08:00:00","4","confirmed","","2026-05-06 03:59:38");
INSERT INTO reservations VALUES("47","Kim Connolly","kimcon1982@gmail.com","0413016687","2026-05-10","09:00:00","5","confirmed","","2026-05-07 00:33:42");
INSERT INTO reservations VALUES("48","Mel Ward","finward@iinet.net.au","0415617979","2026-05-10","12:00:00","4","confirmed","","2026-05-08 04:59:30");
INSERT INTO reservations VALUES("49","Lauren","82laurenwhite@gmail.com","0407459791","2026-05-10","10:00:00","5","confirmed","Notes: We’d love an outside table please","2026-05-09 01:19:01");
INSERT INTO reservations VALUES("50","Lea","teamb227@gmail.com","0409564243","2026-05-10","09:00:00","4","confirmed","Notes: Hi\nCan we please have a high chair","2026-05-09 04:22:05");
INSERT INTO reservations VALUES("51","Connan Donegan","connandonegan80@gmail.com","0474753243","2026-05-10","10:00:00","5","confirmed","","2026-05-09 05:19:20");
INSERT INTO reservations VALUES("52","Cheyanne","cheyanne.goff.work@outlook.com","0484004805","2026-05-10","09:00:00","2","confirmed","","2026-05-09 06:00:15");
INSERT INTO reservations VALUES("53","Kaia Swiggs","kaiajadeswiggs@gmail.com","0415852110","2026-05-10","11:00:00","3","confirmed","","2026-05-10 01:33:07");
INSERT INTO reservations VALUES("54","Jo","bbyjojo@gmail.com","0432154373","2026-05-10","10:00:00","4","confirmed","","2026-05-10 02:01:25");
INSERT INTO reservations VALUES("55","Dom Pizzuto","dompizzuto66@gmail.com","0417118847","2026-05-10","10:00:00","3","completed","","2026-05-10 02:41:33");
INSERT INTO reservations VALUES("56","Christeen J Kurera","jkurera@gmail.com","0403529251","2026-05-11","09:30:00","2","confirmed","","2026-05-10 05:51:13");
INSERT INTO reservations VALUES("57","Janak","ictoncp@gmail.com","+94772299722","2026-05-11","08:00:00","1","cancelled","Notes: Testing","2026-05-10 07:39:39");


CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text NOT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO site_settings VALUES("1","site_name","BLVD Specialty Coffee","2026-05-15 18:42:31");
INSERT INTO site_settings VALUES("2","contact_email","info@blvdcoffee.com","2026-05-15 18:42:31");
INSERT INTO site_settings VALUES("3","contact_phone","416 550 190","2026-05-15 18:42:31");
INSERT INTO site_settings VALUES("4","address","96 Waratah Boulevard, Canning Vale WA 6155","2026-05-15 18:42:31");
INSERT INTO site_settings VALUES("5","opening_hours","Mon-Fri: 7AM-1.30PM, Sat-Sun: 8AM-1.30PM","2026-05-15 18:42:31");
INSERT INTO site_settings VALUES("6","high_tea_classic_price","2500.00","");
INSERT INTO site_settings VALUES("7","high_tea_premium_price","3500.00","");
INSERT INTO site_settings VALUES("8","high_tea_deluxe_price","5000.00","");
INSERT INTO site_settings VALUES("9","booking_confirmed_template","Dear {customer_name},\n\nWe are happy to inform you that your booking at BLVD Specialty Coffee has been CONFIRMED.\n\nBooking Details:\n- Date: {date}\n- Time: {time}\n- Party Size: {party_size}\n- Booking ID: #{booking_id}\n\nWe look forward to seeing you!\n\nBest regards,\nBLVD Specialty Coffee Team","2026-02-23 22:39:22");
INSERT INTO site_settings VALUES("10","booking_completed_template","Dear {customer_name},\n\nThank you for dining with us at BLVD Specialty Coffee!\n\nWe hope you had a wonderful experience. We would love to see you again soon.\n\nBest regards,\nBLVD Specialty Coffee Team","2026-02-23 22:39:22");
INSERT INTO site_settings VALUES("11","booking_cancelled_template","Dear {customer_name},\n\nWe regret to inform you that your booking on {date} has been CANCELLED.\n\nIf you have any questions or would like to reschedule, please contact us at {contact_email} or call {contact_phone}.\n\nBest regards,\nBLVD Specialty Coffee Team","2026-02-23 22:39:22");
INSERT INTO site_settings VALUES("12","booking_received_template","Dear {customer_name},\n\nThank you for your table reservation at BLVD Specialty Coffee!\n\nWe have received your request for:\n- Date: {date}\n- Time: {time}\n- Party Size: {party_size}\n\nPlease note that your table booking is awaiting confirmation. You will be notified once it is confirmed.\n\nBest regards,\nBLVD Specialty Coffee Team","2026-02-23 22:39:22");
INSERT INTO site_settings VALUES("13","hightea_received_template","Dear {customer_name},\n\nThank you for your High Tea booking at BLVD Specialty Coffee!\n\nWe have received your request for:\n- Date: {date}\n- Time: {time}\n- Guests: {party_size}\n\nPlease note that your high tea booking is awaiting confirmation. You will be notified once it is confirmed.\n\nBest regards,\nBLVD Specialty Coffee Team","2026-02-23 22:39:22");
