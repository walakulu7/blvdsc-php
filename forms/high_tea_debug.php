<?php
// BLVD Specialty Coffee - High Tea Reservation Form Handler (DEBUG MODE)

// Enable Error Reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    if (!file_exists('../config/config.php')) {
        throw new Exception('Config file not found at ../config/config.php');
    }
    require_once '../config/config.php';

    if (!file_exists('../config/database.php')) {
        throw new Exception('Database config file not found at ../config/database.php');
    }
    require_once '../config/database.php';

    if (!isset($pdo)) {
        throw new Exception('$pdo variable not defined after including database.php');
    }

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
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }

    if (empty($people)) {
        $errors[] = 'Number of guests is required';
    } elseif (!is_numeric($people) || $people < 1 || $people > 8) {
        $errors[] = 'Number of guests must be between 1 and 8';
    }

    if (empty($date)) {
        $errors[] = 'Date is required';
    } elseif (!strtotime($date)) {
        $errors[] = 'Please enter a valid date';
    } elseif (strtotime($date) < strtotime('today')) {
        $errors[] = 'Date must be in the future';
    } else {
        // Check if day is Fri (5), Sat (6), or Sun (0)
        $dayOfWeek = date('w', strtotime($date));
        if (!in_array($dayOfWeek, [0, 5, 6])) { // 0=Sun, 5=Fri, 6=Sat
            $errors[] = 'High Tea is only available on Fridays, Saturdays, and Sundays';
        }
    }

    if (empty($time)) {
        $errors[] = 'Time is required';
    } elseif (!in_array($time, ['9:30 AM', '11:30 AM'])) {
        $errors[] = 'Invalid time slot selected';
    }

    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Validation failed', 'errors' => $errors]);
        exit;
    }

    // Check availability (max 8 people per day)
    $stmt = $pdo->prepare("SELECT SUM(party_size) as total FROM high_tea_reservations WHERE date = ? AND status != 'cancelled'");
    $stmt->execute([$date]);
    $result = $stmt->fetch();
    $currentBookings = $result['total'] ?? 0;
    
    $availableSpots = 8 - $currentBookings;
    
    if ($people > $availableSpots) {
        http_response_code(400);
        echo json_encode([
            'success' => false, 
            'message' => "Sorry, only {$availableSpots} spot(s) available on this date. Please select fewer guests or choose another date."
        ]);
        exit;
    }
    
    // Calculate total price
    $totalPrice = $people * 39.95;
    
    // Convert time to 24-hour format for database (to support TIME column type)
    $dbTime = date('H:i:s', strtotime($time));
    
    // Save to database
    $stmt = $pdo->prepare("
        INSERT INTO high_tea_reservations 
        (customer_name, email, phone, date, time, party_size, package_type, total_price, special_requests, created_at) 
        VALUES (?, ?, ?, ?, ?, ?, 'classic', ?, ?, NOW())
    ");
    
    $result = $stmt->execute([
        $name,
        $email,
        $phone,
        $date,
        $dbTime,
        $people,
        $totalPrice,
        $additionalNotes
    ]);

    if ($result) {
        // Send confirmation email to customer
        $customerSubject = 'High Tea Reservation Confirmation - BLVD Specialty Coffee';
        $customerMessage = "Dear {$name},\n\n" .
                          "Thank you for booking High Tea at BLVD Specialty Coffee!\n\n" .
                          "Your Reservation Details:\n" .
                          "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n" .
                          "Date: {$date}\n" .
                          "Time: {$time}\n" .
                          "Guests: {$people}\n" .
                          "Total: $" . number_format($totalPrice, 2) . "\n" .
                          "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n\n" .
                          "We look forward to serving you an unforgettable High Tea experience.\n\n" .
                          "If you need to make any changes or have special requests, please contact us at " . CONTACT_PHONE . " or reply to this email.\n\n" .
                          "Best regards,\n" .
                          "BLVD Specialty Coffee Team\n" .
                          CONTACT_ADDRESS . "\n" .
                          CONTACT_PHONE;

        $customerHeaders = "From: " . CONTACT_EMAIL . "\r\nReply-To: " . CONTACT_EMAIL;
        @mail($email, $customerSubject, $customerMessage, $customerHeaders);

        // Send notification email to admin
        $adminSubject = 'New High Tea Reservation';
        $adminMessage = "New High Tea reservation received:\n\n" .
                       "Customer Details:\n" .
                       "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n" .
                       "Name: {$name}\n" .
                       "Phone: {$phone}\n" .
                       "Email: {$email}\n\n" .
                       "Reservation Details:\n" .
                       "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n" .
                       "Date: {$date}\n" .
                       "Time: {$time}\n" .
                       "Guests: {$people}\n" .
                       "Total: $" . number_format($totalPrice, 2) . "\n\n" .
                       "Special Requests:\n" .
                       ($additionalNotes ? $additionalNotes : 'None') . "\n\n" .
                       "━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n" .
                       "Remaining availability for {$date}: " . ($availableSpots - $people) . " spots";

        $adminHeaders = "From: " . CONTACT_EMAIL . "\r\nReply-To: {$email}";
        @mail(CONTACT_EMAIL, $adminSubject, $adminMessage, $adminHeaders);

        echo json_encode([
            'success' => true, 
            'message' => 'High Tea reservation confirmed! A confirmation email has been sent to ' . $email
        ]);
    } else {
        throw new Exception('Failed to save reservation');
    }

} catch (Exception $e) {
    http_response_code(500);
    // Return the actual error message for debugging
    echo json_encode(['success' => false, 'message' => 'Server Error: ' . $e->getMessage()]);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Fatal Error: ' . $e->getMessage()]);
}
?>
