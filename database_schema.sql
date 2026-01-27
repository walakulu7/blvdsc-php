-- BLVD Coffee Co. Database Schema
-- Run this script to set up the MySQL database

CREATE DATABASE IF NOT EXISTS blvd_coffee;
USE blvd_coffee;

-- Menu items table
CREATE TABLE IF NOT EXISTS menu_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(8,2),
    category VARCHAR(100),
    image VARCHAR(255),
    available BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Reservations table
CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(100),
    guests INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    special_requirements JSON,
    additional_notes TEXT,
    status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contact messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    subject VARCHAR(255),
    message TEXT NOT NULL,
    status ENUM('unread', 'read', 'replied') DEFAULT 'unread',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample menu data
INSERT INTO menu_items (name, description, price, category, image) VALUES
('Signature Espresso', 'Our hand-selected beans are roasted to perfection and prepared using methods that bring out their unique flavors.', 4.50, 'coffee', 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop'),
('Artisan Pastries', 'Freshly baked daily in our kitchen, our pastries are the perfect companion to your morning coffee.', 6.00, 'pastries', 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=2072&auto=format&fit=crop'),
('Gourmet Breakfast', 'Hearty breakfast dishes to start your day right.', 12.00, 'breakfast', 'https://images.unsplash.com/photo-1525351484163-7529414344d8?q=80&w=2080&auto=format&fit=crop'),
('Specialty Drinks', 'Unique beverages crafted by our expert baristas.', 7.50, 'drinks', 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?q=80&w=2069&auto=format&fit=crop'),
('Cappuccino', 'Rich espresso with steamed milk and a layer of foam.', 5.50, 'coffee', 'https://images.unsplash.com/photo-1572442388796-11668a67e53d?q=80&w=2070&auto=format&fit=crop'),
('Croissant', 'Buttery, flaky pastry perfect with your morning coffee.', 4.00, 'pastries', 'https://images.unsplash.com/photo-1555507036-ab1f4038808a?q=80&w=2026&auto=format&fit=crop'),
('Avocado Toast', 'Smashed avocado on artisanal bread with poached egg.', 11.00, 'breakfast', 'https://images.unsplash.com/photo-1541519227354-08fa5d50c44d?q=80&w=2070&auto=format&fit=crop'),
('Iced Latte', 'Smooth espresso with cold milk over ice.', 6.00, 'drinks', 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?q=80&w=2070&auto=format&fit=crop');

-- Create indexes for better performance
CREATE INDEX idx_menu_category ON menu_items(category);
CREATE INDEX idx_reservations_date ON reservations(date);
CREATE INDEX idx_contact_status ON contact_messages(status);