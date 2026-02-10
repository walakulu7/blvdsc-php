<?php
// BLVD Specialty Coffee - High Tea Availability Check API

require_once '../config/config.php';
require_once '../config/database.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$date = $_GET['date'] ?? '';

if (empty($date)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Date is required']);
    exit;
}

try {
    // Check current bookings for the date
    $stmt = $pdo->prepare("
        SELECT SUM(party_size) as total 
        FROM high_tea_reservations 
        WHERE date = ? AND status != 'cancelled'
    ");
    $stmt->execute([$date]);
    $result = $stmt->fetch();
    
    $booked = $result['total'] ?? 0;
    $available = 8 - $booked;
    
    echo json_encode([
        'success' => true,
        'date' => $date,
        'booked' => (int)$booked,
        'available' => (int)$available,
        'maxCapacity' => 8
    ]);
} catch (Exception $e) {
    error_log('High Tea availability check error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Error checking availability'
    ]);
}
?>
