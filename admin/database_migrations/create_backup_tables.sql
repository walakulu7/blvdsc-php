-- Create backups table
CREATE TABLE IF NOT EXISTS `backups` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `filename` VARCHAR(255) NOT NULL,
    `type` ENUM('manual', 'auto', 'upload') NOT NULL DEFAULT 'manual',
    `size` INT NOT NULL DEFAULT 0, -- Size in bytes
    `created_by` INT NULL, -- NULL for auto-backups
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create backup_settings table
CREATE TABLE IF NOT EXISTS `backup_settings` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `setting_key` VARCHAR(100) NOT NULL UNIQUE,
    `setting_value` TEXT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default backup settings
INSERT INTO `backup_settings` (`setting_key`, `setting_value`) VALUES
('backup_enabled', '0'),
('backup_frequency', 'daily'),
('backup_retention', '7'),
('backup_storage', 'local'),
('backup_cloud_enabled', '0')
ON DUPLICATE KEY UPDATE `setting_value` = VALUES(`setting_value`);
