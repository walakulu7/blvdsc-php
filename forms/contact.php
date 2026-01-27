<?php
// BLVD Coffee Co. - Contact Form Handler

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
$email = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate input
$errors = [];

if (empty($name)) {
    $errors[] = 'Name is required';
}

if (empty($email)) {
    $errors[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
}

if (empty($message)) {
    $errors[] = 'Message is required';
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Validation failed', 'errors' => $errors]);
    exit;
}

try {
    // Save to database
    $result = saveContactMessage([
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message
    ]);

    if ($result) {
        // Send email notification (optional - may not work on localhost)
        $to = CONTACT_EMAIL;
        $emailSubject = 'New Contact Message: ' . ($subject ?: 'General Inquiry');
        $emailMessage = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email\r\nReply-To: $email";

        // Suppress errors for localhost where mail server may not be configured
        @mail($to, $emailSubject, $emailMessage, $headers);

        echo json_encode(['success' => true, 'message' => 'Thank you for your message! We will get back to you soon.']);
    } else {
        throw new Exception('Failed to save message');
    }
} catch (Exception $e) {
    error_log('Contact form error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Sorry, there was an error sending your message. Please try again later.']);
}
?>