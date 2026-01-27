<?php
// Database configuration for BLVD Coffee Co.

// Database credentials
define('DB_HOST', 'localhost');
define('DB_NAME', 'blvd_coffee');
define('DB_USER', 'root');
define('DB_PASS', '');

// Create connection
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Helper functions for database operations
function getMenuItems() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM menu_items ORDER BY category, name");
    return $stmt->fetchAll();
}

function getReservations() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM reservations ORDER BY created_at DESC");
    return $stmt->fetchAll();
}

function saveReservation($data) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO reservations (name, phone, location, guests, date, time, special_requirements, additional_notes, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    return $stmt->execute([
        $data['name'],
        $data['phone'],
        $data['location'],
        $data['people'],
        $data['date'],
        $data['time'],
        json_encode($data['specialRequirements']),
        $data['additionalNotes']
    ]);
}

function saveContactMessage($data) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())");
    return $stmt->execute([
        $data['name'],
        $data['email'],
        $data['subject'],
        $data['message']
    ]);
}
?>