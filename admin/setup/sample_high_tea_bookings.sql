-- Sample High Tea Bookings Data
-- Insert sample bookings for testing the High Tea module

INSERT INTO `high_tea_bookings` (`customer_name`, `email`, `phone`, `date`, `time`, `party_size`, `package_type`, `total_price`, `status`, `special_requests`, `created_at`) VALUES
-- Today's bookings
('Emma Watson', 'emma.watson@example.com', '0771234567', CURDATE(), '14:00:00', 2, 'classic', 5000.00, 'confirmed', 'Window seat preferred', NOW()),
('James Smith', 'james.smith@example.com', '0772345678', CURDATE(), '15:00:00', 4, 'premium', 14000.00, 'pending', 'Birthday celebration. Please include a small cake.', NOW()),

-- Tomorrow's bookings  
('Sophie Turner', 'sophie.turner@example.com', '0773456789', DATE_ADD(CURDATE(), INTERVAL 1 DAY), '14:30:00', 3, 'deluxe', 15000.00, 'confirmed', 'Vegetarian options required', NOW()),
('Michael Brown', 'michael.brown@example.com', '0774567890', DATE_ADD(CURDATE(), INTERVAL 1 DAY), '16:00:00', 2, 'premium', 7000.00, 'confirmed', NULL, NOW()),

-- This week
('Olivia Davis', 'olivia.davis@example.com', '0775678901', DATE_ADD(CURDATE(), INTERVAL 3 DAY), '14:00:00', 6, 'deluxe', 30000.00, 'pending', 'Anniversary celebration. Please arrange flowers on table.', NOW()),
('Daniel Wilson', 'daniel.wilson@example.com', '0776789012', DATE_ADD(CURDATE(), INTERVAL 4 DAY), '15:30:00', 2, 'classic', 5000.00, 'confirmed', 'Gluten-free options needed', NOW()),
('Isabella Garcia', 'isabella.garcia@example.com', '0777890123', DATE_ADD(CURDATE(), INTERVAL 5 DAY), '14:30:00', 4, 'premium', 14000.00, 'pending', NULL, NOW()),

-- Next week
('William Martinez', 'william.martinez@example.com', '0778901234', DATE_ADD(CURDATE(), INTERVAL 8 DAY), '16:00:00', 5, 'deluxe', 25000.00, 'confirmed', 'Corporate event. Need professional setup.', NOW()),
('Ava Rodriguez', 'ava.rodriguez@example.com', '0779012345', DATE_ADD(CURDATE(), INTERVAL 9 DAY), '14:00:00', 3, 'classic', 7500.00, 'pending', 'One guest is lactose intolerant', NOW()),

-- Past bookings (this month)
('Ethan Lee', 'ethan.lee@example.com', '0770123456', DATE_SUB(CURDATE(), INTERVAL 2 DAY), '14:30:00', 4, 'premium', 14000.00, 'completed', 'Window seating', DATE_SUB(NOW(), INTERVAL 3 DAY)),
('Mia Johnson', 'mia.johnson@example.com', '0771123456', DATE_SUB(CURDATE(), INTERVAL 5 DAY), '15:00:00', 2, 'deluxe', 10000.00, 'completed', NULL, DATE_SUB(NOW(), INTERVAL 6 DAY)),
('Noah Anderson', 'noah.anderson@example.com', '0772123456', DATE_SUB(CURDATE(), INTERVAL 7 DAY), '16:30:00', 6, 'classic', 15000.00, 'completed', 'Family gathering', DATE_SUB(NOW(), INTERVAL 8 DAY)),

-- Cancelled bookings
('Charlotte Taylor', 'charlotte.taylor@example.com', '0773123456', DATE_ADD(CURDATE(), INTERVAL 6 DAY), '14:00:00', 3, 'premium', 10500.00, 'cancelled', 'Unable to attend due to emergency', DATE_SUB(NOW(), INTERVAL 1 DAY)),
('Liam Thomas', 'liam.thomas@example.com', '0774123456', DATE_SUB(CURDATE(), INTERVAL 1 DAY), '15:30:00', 2, 'classic', 5000.00, 'cancelled', 'Changed plans', DATE_SUB(NOW(), INTERVAL 2 DAY)),

-- Far future bookings
('Amelia White', 'amelia.white@example.com', '0775123456', DATE_ADD(CURDATE(), INTERVAL 14 DAY), '14:30:00', 4, 'deluxe', 20000.00, 'confirmed', 'Special occasion - want extra special service', NOW()),
('Benjamin Harris', 'benjamin.harris@example.com', '0776123456', DATE_ADD(CURDATE(), INTERVAL 20 DAY), '16:00:00', 8, 'premium', 28000.00, 'pending', 'Wedding tea party. Need elegant setup.', NOW());
