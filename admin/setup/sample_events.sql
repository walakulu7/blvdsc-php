-- Sample Events Data
-- Insert sample events for testing the Events module

INSERT INTO `events` (`title`, `description`, `event_date`, `event_time`, `status`, `created_by`, `created_at`) VALUES
-- Upcoming published events
('Coffee Tasting Workshop', 'Join us for an exclusive coffee tasting session where you''ll learn about different brewing methods and taste premium coffee from around the world. Perfect for coffee enthusiasts!', DATE_ADD(CURDATE(), INTERVAL 7 DAY), '14:00:00', 'published', 1, NOW()),

('Latte Art Competition', 'Watch skilled baristas compete in creating stunning latte art designs. Audience participation and prizes for winners! Free coffee samples for all attendees.', DATE_ADD(CURDATE(), INTERVAL 14 DAY), '16:00:00', 'published', 1, NOW()),

('Live Jazz Evening', 'Enjoy smooth jazz music while sipping your favorite coffee beverages. Featuring local artists in an intimate café setting. Reservations recommended.', DATE_ADD(CURDATE(), INTERVAL 21 DAY), '19:00:00', 'published', 1, NOW()),

('Bean Origin Tour', 'A virtual tour of our coffee bean sources with our head roaster. Learn about sustainable farming practices and the journey from farm to cup.', DATE_ADD(CURDATE(), INTERVAL 28 DAY), '15:30:00', 'published', 1, NOW()),

('Barista Masterclass', 'Professional barista training session covering espresso extraction, milk steaming, and advanced brewing techniques. Limited spots available!', DATE_ADD(CURDATE(), INTERVAL 35 DAY), '10:00:00', 'published', 1, NOW()),

-- Draft events
('Weekend Brunch Special', 'Planning a special weekend brunch menu with artisanal coffee pairings. Details to be confirmed.', DATE_ADD(CURDATE(), INTERVAL 45 DAY), '11:00:00', 'draft', 1, NOW()),

('Coffee & Books Club', 'Monthly gathering for book lovers to discuss their latest reads over coffee. Book selection pending.', DATE_ADD(CURDATE(), INTERVAL 50 DAY), '17:00:00', 'draft', 1, NOW()),

-- Past event
('Holiday Coffee Celebration', 'Celebrated the holidays with special seasonal drinks and festive atmosphere. Great turnout with over 100 attendees!', DATE_SUB(CURDATE(), INTERVAL 30 DAY), '18:00:00', 'published', 1, DATE_SUB(NOW(), INTERVAL 35 DAY)),

-- Cancelled event
('Outdoor Coffee Festival', 'Originally planned outdoor festival had to be cancelled due to venue issues. Will be rescheduled soon.', DATE_ADD(CURDATE(), INTERVAL 60 DAY), '12:00:00', 'cancelled', 1, NOW());
