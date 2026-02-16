-- Migration: Add event fields for dynamic frontend display
-- Date: 2026-02-16
-- Purpose: Add location, pricing, and time range fields to events table

ALTER TABLE `events` 
ADD COLUMN `time_from` TIME NULL AFTER `event_time`,
ADD COLUMN `time_to` TIME NULL AFTER `time_from`,
ADD COLUMN `location` VARCHAR(255) NULL DEFAULT 'BLVD Coffee, 123 Main Street' AFTER `time_to`,
ADD COLUMN `price_per_person` VARCHAR(100) NULL AFTER `location`;
