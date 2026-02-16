-- Migration: Remove deprecated event_time column
-- Date: 2026-02-17
-- Purpose: Remove event_time column as it's replaced by time_from and time_to

ALTER TABLE `events` 
DROP COLUMN `event_time`;
