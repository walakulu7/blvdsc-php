<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Reservation.php';

/**
 * Reservation Controller
 * Handles all reservation-related requests
 */
class ReservationController extends Controller {
    
    private $reservationModel;
    
    public function __construct() {
        $this->requireAuth();
        $this->reservationModel = new Reservation();
    }
    
    /**
     * List all reservations with filters
     * GET /reservations
     */
    public function index() {
        // Get filter parameters from URL
        $filters = [];
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        if (!empty($_GET['status'])) {
            $filters['status'] = $_GET['status'];
        }
        
        if (!empty($_GET['date_from'])) {
            $filters['date_from'] = $_GET['date_from'];
        }
        
        if (!empty($_GET['date_to'])) {
            $filters['date_to'] = $_GET['date_to'];
        }
        
        if (!empty($_GET['search'])) {
            $filters['search'] = $_GET['search'];
        }
        
        if (isset($_GET['show_all']) && $_GET['show_all'] === '1') {
            $filters['show_all'] = true;
        }
        
        // Get paginated reservations
        $result = $this->reservationModel->getAll($filters, $page, 20);
        
        // Get statistics
        $stats = $this->reservationModel->getStats();
        
        // Build query string for pagination
        $queryParams = $_GET;
        unset($queryParams['page']);
        $queryString = http_build_query($queryParams);
        
        // Render view
        $this->view('reservations/index', [
            'reservations' => $result['data'],
            'total' => $result['total'],
            'pages' => $result['pages'],
            'currentPage' => $result['current_page'],
            'perPage' => $result['per_page'],
            'stats' => $stats,
            'filters' => $filters,
            'queryString' => $queryString,
            'current_page' => 'reservations'
        ]);
    }
    
    /**
     * Show single reservation details
     * GET /reservations/{id}
     */
    public function show($id) {
        $reservation = $this->reservationModel->getById($id);
        
        if (!$reservation) {
            Session::flash('error', 'Reservation not found');
            $this->redirect('/reservations');
            return;
        }
        
        $this->view('reservations/show', [
            'reservation' => $reservation,
            'current_page' => 'reservations'
        ]);
    }
    
    /**
     * Update reservation status
     * POST /reservations/{id}/status
     */
    public function updateStatus($id) {
        $this->validateCsrf();
        
        $status = $this->input('status');
        
        if (empty($status)) {
            Session::flash('error', 'Status is required');
            $this->back();
            return;
        }
        
        $reservation = $this->reservationModel->getById($id);
        
        if (!$reservation) {
            Session::flash('error', 'Reservation not found');
            $this->redirect('/reservations');
            return;
        }
        
        $success = $this->reservationModel->updateStatus($id, $status);
        
        if ($success) {
            // Log activity
            $this->logActivity("updated reservation status", "Changed reservation #{$id} to {$status}");
            
            Session::flash('success', 'Reservation status updated successfully');
        } else {
            Session::flash('error', 'Failed to update reservation status');
        }
        
        // Redirect back to where we came from
        $referer = $_SERVER['HTTP_REFERER'] ?? BASE_PATH . '/reservations';
        header("Location: $referer");
        exit;
    }
    
    /**
     * Export reservations to CSV
     * GET /reservations/export/csv
     */
    public function exportCsv() {
        // Get same filters as list
        $filters = [];
        
        if (!empty($_GET['status'])) {
            $filters['status'] = $_GET['status'];
        }
        
        if (!empty($_GET['date_from'])) {
            $filters['date_from'] = $_GET['date_from'];
        }
        
        if (!empty($_GET['date_to'])) {
            $filters['date_to'] = $_GET['date_to'];
        }
        
        if (!empty($_GET['search'])) {
            $filters['search'] = $_GET['search'];
        }
        
        if (isset($_GET['show_all']) && $_GET['show_all'] === '1') {
            $filters['show_all'] = true;
        }
        
        // Get all reservations (no pagination)
        $reservations = $this->reservationModel->getAllForExport($filters);
        
        // Set headers for CSV download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="reservations_' . date('Y-m-d') . '.csv"');
        
        // Open output stream
        $output = fopen('php://output', 'w');
        
        // Add CSV headers
        fputcsv($output, [
            'ID',
            'Customer Name',
            'Email',
            'Phone',
            'Date',
            'Time',
            'Party Size',
            'Status',
            'Notes',
            'Created At'
        ]);
        
        // Add data rows
        foreach ($reservations as $reservation) {
            fputcsv($output, [
                $reservation['id'],
                $reservation['customer_name'],
                $reservation['email'],
                $reservation['phone'],
                $reservation['date'],
                date('h:i A', strtotime($reservation['time'])),
                $reservation['party_size'],
                ucfirst($reservation['status']),
                $reservation['notes'] ?? '',
                date('Y-m-d H:i:s', strtotime($reservation['created_at']))
            ]);
        }
        
        fclose($output);
        
        // Log activity
        $this->logActivity("exported reservations", "Exported " . count($reservations) . " reservations to CSV");
        
        exit;
    }
    
    /**
     * Helper: Log admin activity
     */
    private function logActivity($action, $details = null) {
        global $pdo;
        
        $sql = "INSERT INTO admin_activity_log (admin_id, action, details, ip_address, created_at) 
                VALUES (:admin_id, :action, :details, :ip, NOW())";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':admin_id' => Auth::user()['id'],
            ':action' => $action,
            ':details' => $details,
            ':ip' => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1'
        ]);
    }
}
