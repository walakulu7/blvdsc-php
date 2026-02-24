<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/SiteSetting.php';
require_once __DIR__ . '/../../core/Session.php';

/**
 * Notification Settings Controller
 * Manages email notification templates for booking status updates
 */
class NotificationSettingsController extends Controller
{
    private $settingModel;

    public function __construct()
    {
        $this->requireAuth();
        $this->settingModel = new SiteSetting();
    }

    /**
     * Display notification settings page
     */
    public function index()
    {
        $settings = $this->settingModel->getAll();

        // Default templates if not set in DB
        $defaults = [
            'booking_confirmed_template' => "Dear {customer_name},\n\nWe are happy to inform you that your booking at BLVD Specialty Coffee has been CONFIRMED.\n\nBooking Details:\n- Date: {date}\n- Time: {time}\n- Party Size: {party_size}\n- Booking ID: #{booking_id}\n\nWe look forward to seeing you!\n\nBest regards,\nBLVD Specialty Coffee Team",
            'booking_completed_template' => "Dear {customer_name},\n\nThank you for dining with us at BLVD Specialty Coffee!\n\nWe hope you had a wonderful experience. We would love to see you again soon.\n\nBest regards,\nBLVD Specialty Coffee Team",
            'booking_cancelled_template' => "Dear {customer_name},\n\nWe regret to inform you that your booking on {date} has been CANCELLED.\n\nIf you have any questions or would like to reschedule, please contact us.\n\nBest regards,\nBLVD Specialty Coffee Team",
            'booking_received_template' => "Dear {customer_name},\n\nThank you for your reservation at BLVD Specialty Coffee!\n\nWe have received your request for:\n- Date: {date}\n- Time: {time}\n- Party Size: {party_size}\n\nPlease note: Your booking is currently PENDING. A member of our team will contact you shortly to confirm availability.\n\nBest regards,\nBLVD Specialty Coffee Team",
            'hightea_received_template' => "Dear {customer_name},\n\nThank you for your High Tea booking at BLVD Specialty Coffee!\n\nWe have received your request for:\n- Date: {date}\n- Time: {time}\n- Guests: {party_size}\n\nYour booking is currently being processed. We look forward to serving you an unforgettable High Tea experience.\n\nBest regards,\nBLVD Specialty Coffee Team",
        ];

        foreach ($defaults as $key => $default) {
            if (empty($settings[$key])) {
                $settings[$key] = $default;
            }
        }

        $this->view('settings/notifications', [
            'settings'     => $settings,
            'current_page' => 'settings-notifications',
            'page_title'   => 'Notification Settings',
        ], 'main');
    }

    /**
     * Update notification templates
     */
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/settings/notifications');
            return;
        }

        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/settings/notifications');
            return;
        }

        $templates = [
            'booking_confirmed_template' => trim($_POST['booking_confirmed_template'] ?? ''),
            'booking_completed_template' => trim($_POST['booking_completed_template'] ?? ''),
            'booking_cancelled_template' => trim($_POST['booking_cancelled_template'] ?? ''),
            'booking_received_template'  => trim($_POST['booking_received_template'] ?? ''),
            'hightea_received_template'  => trim($_POST['hightea_received_template'] ?? ''),
        ];

        // Validate - none should be empty
        foreach ($templates as $key => $value) {
            if (empty($value)) {
                Session::flash('error', 'All templates must have content.');
                $this->redirect('/settings/notifications');
                return;
            }
        }

        if ($this->settingModel->updateMultiple($templates)) {
            Session::flash('success', 'Notification templates updated successfully!');
        } else {
            // Try to insert if update failed (keys don't exist yet)
            $allOk = true;
            foreach ($templates as $key => $value) {
                if (!$this->settingModel->upsert($key, $value)) {
                    $allOk = false;
                }
            }
            if ($allOk) {
                Session::flash('success', 'Notification templates saved successfully!');
            } else {
                Session::flash('error', 'Failed to save templates. Please try again.');
            }
        }

        $this->redirect('/settings/notifications');
    }
}
