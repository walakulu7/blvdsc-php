-- Add Booking Notification Templates to site_settings table
-- Uses only the columns that exist: setting_key, setting_value
INSERT INTO site_settings (setting_key, setting_value) VALUES 
('booking_confirmed_template', 'Dear {customer_name},

We are happy to inform you that your booking at BLVD Specialty Coffee has been CONFIRMED.

Booking Details:
- Date: {date}
- Time: {time}
- Party Size: {party_size}
- Booking ID: #{booking_id}

We look forward to seeing you!

Best regards,
BLVD Specialty Coffee Team'),

('booking_completed_template', 'Dear {customer_name},

Thank you for dining with us at BLVD Specialty Coffee!

We hope you had a wonderful experience. We would love to see you again soon.

Best regards,
BLVD Specialty Coffee Team'),

('booking_cancelled_template', 'Dear {customer_name},

We regret to inform you that your booking on {date} has been CANCELLED.

If you have any questions or would like to reschedule, please contact us at {contact_email} or call {contact_phone}.

Best regards,
BLVD Specialty Coffee Team'),

('booking_received_template', 'Dear {customer_name},

Thank you for your reservation at BLVD Specialty Coffee!

We have received your request for:
- Date: {date}
- Time: {time}
- Party Size: {party_size}

Please note: Your booking is currently PENDING. A member of our team will contact you shortly to confirm availability.

Best regards,
BLVD Specialty Coffee Team'),

('hightea_received_template', 'Dear {customer_name},

Thank you for your High Tea booking at BLVD Specialty Coffee!

We have received your request for:
- Date: {date}
- Time: {time}
- Guests: {party_size}

Your booking is currently being processed. We look forward to serving you an unforgettable High Tea experience.

Best regards,
BLVD Specialty Coffee Team')

ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value);
