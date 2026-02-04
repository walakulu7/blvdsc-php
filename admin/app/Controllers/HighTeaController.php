<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/HighTeaModel.php';

/**
 * High Tea Controller
 * Handles all High Tea booking-related requests
 */
class HighTeaController extends Controller
{
    private $highTeaModel;
    
    public function __construct()
    {
        $this->highTeaModel = new HighTeaModel();
    }
    
    /**
     * Display list of high tea bookings with filters
     */
    public function index()
    {
        // Get filters from request
        $filters = [
            'status' => $_GET['status'] ?? '',
            'package_type' => $_GET['package_type'] ?? '',
            'date_from' => $_GET['date_from'] ?? '',
            'date_to' => $_GET['date_to'] ?? '',
            'search' => $_GET['search'] ?? ''
        ];
        
        // Remove empty filters
        $filters = array_filter($filters, function($value) {
            return $value !== '';
        });
        
        // Pagination
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10;
        
        // Get data
        $bookings = $this->highTeaModel->findWithFilters($filters, $currentPage, $perPage);
        $total = $this->highTeaModel->getTotalCount($filters);
        $pages = ceil($total / $perPage);
        
        // Get statistics
        $stats = $this->highTeaModel->getStats();
        
        // Build query string for pagination
        $queryParams = $filters;
        unset($queryParams['page']);
        $queryString = http_build_query($queryParams);
        
        // Pass data to view
        $this->view('hightea/index', [
            'bookings' => $bookings,
            'filters' => $filters,
            'stats' => $stats,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'total' => $total,
            'perPage' => $perPage,
            'queryString' => $queryString
        ]);
    }
    
    /**
     * Display individual booking details
     */
    public function show($id)
    {
        $booking = $this->highTeaModel->findById($id);
        
        if (!$booking) {
            Session::setFlash('error', 'Booking not found');
            $this->redirect('/hightea');
            return;
        }
        
        $this->view('hightea/show', [
            'booking' => $booking
        ]);
    }
    
    /**
     * Update booking status
     */
    public function updateStatus($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/hightea');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::setFlash('error', 'Invalid request');
            $this->redirect('/hightea/' . $id);
            return;
        }
        
        $status = $_POST['status'] ?? '';
        
        if (!in_array($status, ['pending', 'confirmed', 'completed', 'cancelled'])) {
            Session::setFlash('error', 'Invalid status');
            $this->redirect('/hightea/' . $id);
            return;
        }
        
        $result = $this->highTeaModel->updateStatus($id, $status);
        
        if ($result) {
            Session::setFlash('success', 'Booking status updated successfully');
        } else {
            Session::setFlash('error', 'Failed to update booking status');
        }
        
        $this->redirect('/hightea/' . $id);
    }
    
    /**
     * Export bookings to CSV
     */
    public function export()
    {
        // Get filters from request
        $filters = [
            'status' => $_GET['status'] ?? '',
            'package_type' => $_GET['package_type'] ?? '',
            'date_from' => $_GET['date_from'] ?? '',
            'date_to' => $_GET['date_to'] ?? '',
            'search' => $_GET['search'] ?? ''
        ];
        
        // Remove empty filters
        $filters = array_filter($filters, function($value) {
            return $value !== '';
        });
        
        // Get data
        $bookings = $this->highTeaModel->exportToCSV($filters);
        
        // Set headers for CSV download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="high-tea-bookings-' . date('Y-m-d') . '.csv"');
        
        // Open output stream
        $output = fopen('php://output', 'w');
        
        // Write CSV headers
        fputcsv($output, [
            'ID',
            'Customer Name',
            'Email',
            'Phone',
            'Date',
            'Time',
            'Party Size',
            'Package Type',
            'Total Price',
            'Status',
            'Special Requests',
            'Created At'
        ]);
        
        // Write data rows
        foreach ($bookings as $booking) {
            fputcsv($output, [
                $booking['id'],
                $booking['customer_name'],
                $booking['email'],
                $booking['phone'],
                $booking['date'],
                $booking['time'],
                $booking['party_size'],
                ucfirst($booking['package_type']),
                $booking['total_price'],
                ucfirst($booking['status']),
                $booking['special_requests'],
                $booking['created_at']
            ]);
        }
        
        fclose($output);
        exit;
    }
}
