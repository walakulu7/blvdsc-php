-- Migration: Add phone field to contact_messages table
-- Date: 2026-02-17
-- Purpose: Add phone number field to contact form submissions

ALTER TABLE `contact_messages` 
ADD COLUMN `phone` VARCHAR(20) NULL AFTER `email`;
