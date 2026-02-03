<?php
// Special Days Configuration for BLVD Coffee Co.
// Determines reservation time slots based on special days

/**
 * Get the nth occurrence of a weekday in a month
 * @param int $year - Year
 * @param int $month - Month (1-12)
 * @param int $dayOfWeek - Day of week (0=Sunday, 1=Monday, etc.)
 * @param int $n - Which occurrence (1=first, 2=second, etc.)
 * @return string - Date in Y-m-d format
 */
function getNthWeekdayOfMonth($year, $month, $dayOfWeek, $n) {
    $firstDay = mktime(0, 0, 0, $month, 1, $year);
    $firstDayOfWeek = date('w', $firstDay);
    
    // Calculate days to add to get to first occurrence
    $daysToAdd = ($dayOfWeek - $firstDayOfWeek + 7) % 7;
    
    // Add weeks to get to nth occurrence
    $daysToAdd += 7 * ($n - 1);
    
    $targetTimestamp = mktime(0, 0, 0, $month, 1 + $daysToAdd, $year);
    return date('Y-m-d', $targetTimestamp);
}

/**
 * Check if a given date is a special day
 * @param string $date - Date in Y-m-d format
 * @return bool
 */
function isSpecialDay($date) {
    $timestamp = strtotime($date);
    $year = date('Y', $timestamp);
    $month = date('n', $timestamp);
    $day = date('j', $timestamp);
    
    // Fixed dates
    if ($month == 3 && $day == 8) return true;   // International Women's Day
    if ($month == 11 && $day == 19) return true; // International Men's Day
    if ($month == 11 && $day == 20) return true; // Children's Day (World)
    
    // Floating dates
    // Mother's Day - 2nd Sunday of May
    if ($date == getNthWeekdayOfMonth($year, 5, 0, 2)) return true;
    
    // Father's Day - 3rd Sunday of June
    if ($date == getNthWeekdayOfMonth($year, 6, 0, 3)) return true;
    
    // Grandparents' Day - 1st Sunday of September
    if ($date == getNthWeekdayOfMonth($year, 9, 0, 1)) return true;
    
    return false;
}

/**
 * Get the name of the special day
 * @param string $date - Date in Y-m-d format
 * @return string|null - Name of special day or null
 */
function getSpecialDayName($date) {
    $timestamp = strtotime($date);
    $year = date('Y', $timestamp);
    $month = date('n', $timestamp);
    $day = date('j', $timestamp);
    
    // Fixed dates
    if ($month == 3 && $day == 8) return "International Women's Day";
    if ($month == 11 && $day == 19) return "International Men's Day";
    if ($month == 11 && $day == 20) return "Children's Day";
    
    // Floating dates
    if ($date == getNthWeekdayOfMonth($year, 5, 0, 2)) return "Mother's Day";
    if ($date == getNthWeekdayOfMonth($year, 6, 0, 3)) return "Father's Day";
    if ($date == getNthWeekdayOfMonth($year, 9, 0, 1)) return "Grandparents' Day";
    
    return null;
}

/**
 * Get time slots for a given date
 * @param string $date - Date in Y-m-d format
 * @return array - Array of time slots
 */
function getTimeSlotsForDate($date) {
    if (isSpecialDay($date)) {
        // Special days: hourly slots only
        return [
            '8:00 AM',
            '9:00 AM',
            '10:00 AM',
            '11:00 AM',
            '12:00 PM'
        ];
    } else {
        // Normal days: 30-minute intervals
        return [
            '8:00 AM',
            '8:30 AM',
            '9:00 AM',
            '9:30 AM',
            '10:00 AM',
            '10:30 AM',
            '11:00 AM',
            '11:30 AM',
            '12:00 PM',
            '12:30 PM'
        ];
    }
}
?>
