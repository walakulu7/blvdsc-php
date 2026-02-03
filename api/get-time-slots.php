<?php
// API Endpoint: Get time slots for a given date
// Returns different time slots based on whether the date is a special day

require_once '../config/special-days.php';

header('Content-Type: application/json');

// Get date parameter
$date = $_GET['date'] ?? '';

// Validate date
if (empty($date)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Date parameter is required'
    ]);
    exit;
}

// Validate date format
if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Invalid date format. Use YYYY-MM-DD'
    ]);
    exit;
}

// Check if it's a special day
$isSpecial = isSpecialDay($date);
$timeSlots = getTimeSlotsForDate($date);

// Build response
$response = [
    'success' => true,
    'date' => $date,
    'isSpecialDay' => $isSpecial,
    'timeSlots' => $timeSlots
];

// Add special day information if applicable
if ($isSpecial) {
    $specialDayName = getSpecialDayName($date);
    $response['specialDayName'] = $specialDayName;
    $response['message'] = "Limited time slots available for $specialDayName";
}

echo json_encode($response);
?>
