-- Add Booking Notification Templates to site_settings table
INSERT INTO site_settings (setting_key, setting_value, created_at, updated_at) VALUES 
('booking_confirmed_template', 'Dear {customer_name},\n\nWe are happy to inform you that your booking at BLVD Specialty Coffee has been CONFIRMED.\n\nBooking Details:\n- Date: {date}\n- Time: {time}\n- Party Size: {party_size}\n- Booking ID: #{booking_id}\n\nWe look forward to seeing you!\n\nBest regards,\nBLVD Specialty Coffee Team', NOW(), NOW()),

('booking_completed_template', 'Dear {customer_name},\n\nThank you for dining with us at BLVD Specialty Coffee!\n\nWe hope you had a wonderful experience. We would love to see you again soon.\n\nBest regards,\nBLVD Specialty Coffee Team', NOW(), NOW()),

('booking_cancelled_template', 'Dear {customer_name},\n\nWe regret to inform you that your booking on {date} has been CANCELLED.\n\nIf you have any questions or would like to reschedule, please contact us at {contact_email} or {contact_phone}.\n\nBest regards,\nBLVD Specialty Coffee Team', NOW(), NOW())
ON DUPLICATE KEY UPDATE updated_at = NOW();
