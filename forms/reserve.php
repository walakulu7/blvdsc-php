<?php
// BLVD Coffee Co. - Reservation Form Handler

require_once '../config/config.php';
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

// Get form data
$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$people = trim($_POST['people'] ?? '');
$date = trim($_POST['date'] ?? '');
$time = trim($_POST['time'] ?? '');
$seating = trim($_POST['seating'] ?? '');
$specialRequirements = $_POST['specialRequirements'] ?? [];
$additionalNotes = trim($_POST['additionalNotes'] ?? '');

// Validate input
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($phone)) {
    $errors[] = 'Phone number is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
}

if (empty($people)) {
    $errors[] = 'Number of guests is required';
}

if (empty($date)) {
    $errors[] = 'Date is required';
} elseif (!strtotime($date)) {
    $errors[] = 'Please enter a valid date';
}

if (empty($time)) {
    $errors[] = 'Time is required';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Validation failed', 'errors' => $errors]);
    exit;
}

try {
    // Save to database
    $result = saveReservation([
        'name' => $name,
        'phone' => $phone,
        'email' => $email,
        'people' => $people,
        'date' => $date,
        'time' => $time,
        'seating' => $seating,
        'specialRequirements' => $specialRequirements,
        'additionalNotes' => $additionalNotes
    ]);

    if ($result) {
        // Send confirmation email (optional - may not work on localhost) .......
        $to = CONTACT_EMAIL;
        $subject = 'New Table Reservation';
        $message = "New reservation received:\n\n" .
                  "Name: $name\n" .
                  "Phone: $phone\n" .
                  "Email: $email\n" .
                  "Guests: $people\n" .
                  "Date: $date\n" .
                  "Time: $time\n" .
                  "Seating Preference: $seating\n" .
                  "Special Requirements: " . json_encode($specialRequirements) . "\n" .
                  "Additional Notes: $additionalNotes\n\n" .
                  "Please confirm this reservation.";

        $headers = "From: " . CONTACT_EMAIL . "\r\nReply-To: $email";

        // Suppress errors for localhost where mail server may not be configured
        @mail($to, $subject, $message, $headers);

        echo json_encode(['success' => true, 'message' => 'Reservation submitted successfully! We will contact you to confirm.']);
    } else {
        throw new Exception('Failed to save reservation');
    }
} catch (Exception $e) {
    error_log('Reservation form error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Sorry, there was an error processing your reservation. Please try again later.']);
}
?>