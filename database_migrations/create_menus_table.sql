-- Migration: Create menus table for dynamic menu management
-- Date: 2026-02-17
-- Purpose: Enable backend management of menu categories with images

CREATE TABLE `menus` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `image_url` VARCHAR(500) NULL,
  `display_order` INT DEFAULT 0,
  `status` ENUM('published', 'draft') DEFAULT 'draft',
  `created_by` INT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_status (`status`),
  INDEX idx_order (`display_order`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert initial menu categories
INSERT INTO `menus` (`title`, `slug`, `image_url`, `display_order`, `status`) VALUES
('COFFEE & TEA', 'coffee-tea', 'assets/images/menu-coffee-tea.webp', 1, 'published'),
('OTHER BEVERAGES', 'other-beverages', 'assets/images/menu-other-beverages.webp', 2, 'published'),
('ALL DAY BREAKFAST & SPECIALTIES', 'breakfast-specialties', 'assets/images/menu-all-daybreakfast.webp', 3, 'published'),
('KIDS & SEASONAL', 'kids-seasonal', 'assets/images/menu-kids-seasonal.webp', 4, 'published');
