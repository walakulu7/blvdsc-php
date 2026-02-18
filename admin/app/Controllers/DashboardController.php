<?php
require_once __DIR__ . '/../../core/Controller.php';

/**
 * Dashboard Controller
 * Handles main dashboard view
 */
class DashboardController extends Controller {
    
    /**
     * Display dashboard
     */
    public function index() {
        $this->requireAuth();
        
        $user = Auth::user();
        
        // Set current page for sidebar
        $currentPage = 'dashboard';
        $pageTitle = 'Dashboard';
        
        // Get dashboard statistics
        global $pdo;
        
        // Total reservations
        $totalReservations = $pdo->query("SELECT COUNT(*) FROM reservations")->fetchColumn();
        $pendingReservations = $pdo->query("SELECT COUNT(*) FROM reservations WHERE status = 'pending'")->fetchColumn();
        
        // High tea bookings
        $totalHighTea = $pdo->query("SELECT COUNT(*) FROM high_tea_reservations")->fetchColumn();
        $pendingHighTea = $pdo->query("SELECT COUNT(*) FROM high_tea_reservations WHERE status = 'pending'")->fetchColumn();
        
        // Events
        $upcomingEvents = $pdo->query("SELECT COUNT(*) FROM events WHERE status = 'published' AND event_date >= CURDATE()")->fetchColumn();
        
        // Messages
        $unreadMessages = $pdo->query("SELECT COUNT(*) FROM contact_messages WHERE is_read = 0")->fetchColumn();
        
        // High Tea in 2 days (for kitchen preparation)
        $highTeaIn2Days = $pdo->query("SELECT COUNT(*) FROM high_tea_reservations WHERE DATE(date) = CURDATE() + INTERVAL 2 DAY")->fetchColumn();
        $highTeaIn2DaysDate = date('M d', strtotime('+2 days'));
        
        // Today's reservations
        $todayReservations = $pdo->query("SELECT COUNT(*) FROM reservations WHERE DATE(date) = CURDATE()")->fetchColumn();
        
        $this->view('dashboard/index', [
            'title' => 'Dashboard',
            'page_title' => $pageTitle,
            'current_page' => $currentPage,
            'user' => $user,
            'totalReservations' => $totalReservations,
            'pendingReservations' => $pendingReservations,
            'totalHighTea' => $totalHighTea,
            'pendingHighTea' => $pendingHighTea,
            'upcomingEvents' => $upcomingEvents,
            'unreadMessages' => $unreadMessages,
            'highTeaIn2Days' => $highTeaIn2Days,
            'highTeaIn2DaysDate' => $highTeaIn2DaysDate,
            'todayReservations' => $todayReservations
        ], 'main');
    }
}
