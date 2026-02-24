<?php
// BLVD Specialty Coffee - Reservation Form Handler

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
} elseif (!empty($date) && strtotime($date)) {
    // Validate time slot is appropriate for the selected date (only if date is valid)
    require_once '../config/special-days.php';
    $validTimeSlots = getTimeSlotsForDate($date);
    
    if (!in_array($time, $validTimeSlots)) {
        $errors[] = 'Invalid time slot for the selected date';
    }
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Validation failed', 'errors' => $errors]);
    exit;
}

try {
    // Format time for database
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

    // Save to database MATCHING PRODUCTION SCHEMA
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
        $lastId = $pdo->lastInsertId();
        
        // Prepare data for professional HTML email
        require_once '../admin/app/Utilities/BookingMailer.php';
        
        $bookingData = [
            'id'            => $lastId,
            'customer_name' => $name,
            'email'         => $email,
            'phone'         => $phone,
            'date'          => $date,
            'time'          => $time,
            'party_size'    => $people
        ];

        // Send professional HTML confirmation to customer
        BookingMailer::sendBookingStatusEmail($bookingData, 'received', 'reservation');

        // Notification email to admin (keep existing simple format for admin)
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

        $headers = "From: " . EMAIL_FROM_NAME . " <" . EMAIL_FROM_ADDRESS . ">\r\n" . "Reply-To: $email";
        @mail($to, $subject, $message, $headers);

        echo json_encode(['success' => true, 'message' => 'Reservation submitted successfully! We will contact you to confirm.']);
    } else {
        throw new Exception('Failed to save reservation');
    }
} catch (Exception $e) {
    error_log('Reservation form error: ' . $e->getMessage());
    http_response_code(500);
    // Return detailed error for debugging if needed, or generic
    echo json_encode(['success' => false, 'message' => 'Sorry, there was an error processing your reservation. Please try again later.']);
}
?>