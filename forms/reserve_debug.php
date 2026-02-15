<?php
// BLVD Specialty Coffee - Reservation Form Handler (DEBUG MODE)

// Enable Error Reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
    // Format time for database (production uses TIME column type)
    $dbTime = date('H:i:s', strtotime($time));

    // Combine extra details into 'notes' because production DB lacks specific columns
    $combinedNotes = "";
    if (!empty($seating)) {
        $combinedNotes .= "Seating Preference: $seating\n";
    }
    if (!empty($specialRequirements)) {
        $reqs = is_array($specialRequirements) ? implode(', ', $specialRequirements) : $specialRequirements;
        $combinedNotes .= "Special Requirements: $reqs\n";
    }
    if (!empty($additionalNotes)) {
        $combinedNotes .= "Notes: $additionalNotes";
    }
    $combinedNotes = trim($combinedNotes);

    // Execute INSERT directly here to debug SQL errors (bypassing config/database.php wrapper)
    // Schema: id, customer_name, email, phone, date, time, party_size, status, notes, created_at
    $stmt = $pdo->prepare("INSERT INTO reservations (customer_name, email, phone, date, time, party_size, status, notes, created_at) VALUES (?, ?, ?, ?, ?, ?, 'pending', ?, NOW())");
    
    $result = $stmt->execute([
        $name,
        $email,
        $phone,
        $date,
        $dbTime,
        $people,
        $combinedNotes
    ]);

    if ($result) {
        // Send confirmation email 
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
        @mail($to, $subject, $message, $headers);

        echo json_encode(['success' => true, 'message' => 'Reservation submitted successfully!']);
    } else {
        throw new Exception('Failed to save reservation');
    }
} catch (Exception $e) {
    http_response_code(500);
    // Return detailed error
    echo json_encode(['success' => false, 'message' => 'Debug Error: ' . $e->getMessage()]);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Debug Fatal Error: ' . $e->getMessage()]);
}
?>
