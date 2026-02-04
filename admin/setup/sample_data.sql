-- ========================================
-- BLVD Coffee Admin Panel - Sample Data
-- UPDATED to match database schema
-- ========================================

-- 1. Sample Reservations
-- Schema: customer_name, email, phone, date, time, party_size, notes, status
INSERT INTO reservations (customer_name, email, phone, date, time, party_size, notes, status, created_at) VALUES
('John Doe', 'john@example.com', '1234567890', CURDATE(), '18:00:00', 4, 'Window seat please', 'pending', NOW()),
('Jane Smith', 'jane@example.com', '0987654321', CURDATE(), '19:30:00', 2, 'Anniversary celebration', 'confirmed', NOW()),
('Mike Johnson', 'mike@example.com', '5551234567', DATE_ADD(CURDATE(), INTERVAL 1 DAY), '20:00:00', 6, 'Birthday party', 'pending', NOW()),
('Sarah Williams', 'sarah@example.com', '5559876543', DATE_ADD(CURDATE(), INTERVAL 2 DAY), '18:30:00', 3, NULL, 'confirmed', NOW()),
('David Brown', 'david@example.com', '5551112222', DATE_ADD(CURDATE(), INTERVAL 3 DAY), '19:00:00', 2, 'Quiet corner', 'pending', NOW());

-- 2. Sample High Tea Reservations
-- Schema: customer_name, email, phone, date, time, party_size, package_type, total_price, special_requests, status
INSERT INTO high_tea_reservations (customer_name, email, phone, date, time, party_size, package_type, total_price, special_requests, status, created_at) VALUES
('Alice Cooper', 'alice@example.com', '5553334444', DATE_ADD(CURDATE(), INTERVAL 1 DAY), '15:00:00', 2, 'classic', 5000.00, NULL, 'pending', NOW()),
('Bob Wilson', 'bob@example.com', '5556667777', DATE_ADD(CURDATE(), INTERVAL 2 DAY), '16:00:00', 4, 'premium', 14000.00, 'Vegetarian options please', 'confirmed', NOW()),
('Carol Davis', 'carol@example.com', '5558889999', DATE_ADD(CURDATE(), INTERVAL 4 DAY), '14:30:00', 3, 'deluxe', 15000.00, 'No nuts', 'pending', NOW());

-- 3. Sample Contact Messages
-- Schema: name, email, subject, message, is_read
INSERT INTO contact_messages (name, email, subject, message, is_read, created_at) VALUES
('Emily Taylor', 'emily@example.com', 'Catering Inquiry', 'I am interested in catering services for a corporate event. Can you provide more details?', 0, NOW()),
('Frank Martinez', 'frank@example.com', 'Menu Question', 'Do you have gluten-free options available?', 0, DATE_SUB(NOW(), INTERVAL 2 HOUR)),
('Grace Anderson', 'grace@example.com', 'Private Event', 'Looking to book the restaurant for a private event. Is that possible?', 1, DATE_SUB(NOW(), INTERVAL 1 DAY));

-- 4. Sample Events
-- Schema: title, description, event_date, event_time, image_url, status
INSERT INTO events (title, description, event_date, event_time, image_url, status, created_at) VALUES
('Valentine\'s Day Special', 'Romantic 5-course dinner with live music. Limited seating available.', DATE_ADD(CURDATE(), INTERVAL 10 DAY), '19:00:00', NULL, 'published', NOW()),
('Coffee Tasting Workshop', 'Learn about different coffee beans and brewing methods. Expert baristas will guide you through the experience.', DATE_ADD(CURDATE(), INTERVAL 15 DAY), '14:00:00', NULL, 'published', NOW()),
('Sunday Brunch Special', 'Extended brunch menu with bottomless mimosas. Reservations recommended.', DATE_ADD(CURDATE(), INTERVAL 7 DAY), '10:00:00', NULL, 'published', NOW()),
('Live Jazz Night', 'Enjoy smooth jazz with dinner and handcrafted cocktails.', DATE_ADD(CURDATE(), INTERVAL 5 DAY), '20:00:00', NULL, 'draft', NOW());

-- 5. Sample Customer Reviews
-- Schema: customer_name, rating, review_text, status, admin_reply, is_featured
INSERT INTO customer_reviews (customer_name, rating, review_text, status, admin_reply, is_featured, created_at) VALUES
('Henry Thompson', 5, 'Absolutely amazing experience! The coffee was superb and the staff was incredibly friendly. Will definitely come back!', 'pending', NULL, 0, NOW()),
('Isabel Rodriguez', 4, 'Great atmosphere and delicious food. Only minor issue was the wait time, but worth it!', 'pending', NULL, 0, DATE_SUB(NOW(), INTERVAL 3 HOUR)),
('Jack Lee', 5, 'Best high tea in town! The selection of pastries was incredible. Highly recommend the Premium package.', 'approved', 'Thank you so much for your kind words! We\'re delighted you enjoyed the experience.', 1, DATE_SUB(NOW(), INTERVAL 2 DAY)),
('Karen White', 3, 'Food was okay, but service could be improved. Coffee quality is excellent though.', 'pending', NULL, 0, DATE_SUB(NOW(), INTERVAL 5 HOUR));

-- 6. Sample Gallery Photos
-- Schema: filename, title, category, display_order, is_active
INSERT INTO gallery_photos (filename, title, category, display_order, is_active, uploaded_at) VALUES
('coffee-art-1.jpg', 'Latte Art Masterpiece', 'Coffee', 1, 1, NOW()),
('high-tea-1.jpg', 'Premium High Tea Setup', 'High Tea', 2, 1, NOW()),
('interior-1.jpg', 'Cozy Interior', 'Ambiance', 3, 1, NOW()),
('food-1.jpg', 'Signature Dishes', 'Food', 4, 1, NOW()),
('outdoor-1.jpg', 'Outdoor Seating Area', 'Ambiance', 5, 1, NOW());

-- 7. Sample Activity Log (for dashboard Recent Activity)
INSERT INTO admin_activity_log (admin_id, action, details, ip_address, created_at) VALUES
(1, 'updated reservation status', 'Changed reservation #2 to confirmed', '127.0.0.1', DATE_SUB(NOW(), INTERVAL 1 HOUR)),
(1, 'created new event', 'Valentine\'s Day Special', '127.0.0.1', DATE_SUB(NOW(), INTERVAL 2 HOUR)),
(1, 'approved customer review', 'Review from Jack Lee - 5 stars', '127.0.0.1', DATE_SUB(NOW(), INTERVAL 3 HOUR)),
(1, 'replied to message', 'Responded to catering inquiry', '127.0.0.1', DATE_SUB(NOW(), INTERVAL 4 HOUR)),
(1, 'logged in', 'Successful login', '127.0.0.1', DATE_SUB(NOW(), INTERVAL 5 HOUR));

-- 8. Sample Special Days (closed/restricted dates)
-- Schema: date, reason
INSERT INTO custom_special_days (date, reason, created_at) VALUES
('2026-12-25', 'Christmas Day - Closed', NOW()),
('2026-12-31', 'New Year\'s Eve - Private Event', NOW()),
(DATE_ADD(CURDATE(), INTERVAL 30 DAY), 'Staff Training Day', NOW());

-- ========================================
-- Verification Queries
-- Run these to check if data was inserted
-- ========================================

-- Check reservation counts
SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
    SUM(CASE WHEN DATE(date) = CURDATE() THEN 1 ELSE 0 END) as today
FROM reservations;

-- Check high tea counts
SELECT 
    COUNT(*) as total,
    SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending
FROM high_tea_reservations;

-- Check messages
SELECT COUNT(*) as total, SUM(CASE WHEN is_read = 0 THEN 1 ELSE 0 END) as unread
FROM contact_messages;

-- Check events
SELECT COUNT(*) as total 
FROM events 
WHERE event_date >= CURDATE() AND status = 'published';

-- Check reviews
SELECT COUNT(*) as total, SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending
FROM customer_reviews;

-- ========================================
-- Expected Dashboard Stats After Insert:
-- ========================================
-- Total Reservations: 5
-- Today's Reservations: 2
-- Pending Reservations: 3
-- High Tea Total: 3
-- High Tea Pending: 2
-- Unread Messages: 2
-- Upcoming Events: 3
-- Pending Reviews: 3
-- Recent Activity: Shows 3 most recent (out of 5 total)
-- Upcoming Reservations: Shows 3 soonest (out of 5 total)
-- Upcoming Events: Shows 3 soonest (out of 3-4 total)
-- ========================================
