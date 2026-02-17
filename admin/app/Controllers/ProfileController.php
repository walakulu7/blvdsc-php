<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../../core/Session.php';

/**
 * Profile Controller
 * Handles user profile management (self-service)
 */
class ProfileController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Display user profile page
     */
    public function index()
    {
        $this->requireAuth();
        
        $userId = Auth::id();
        $user = $this->userModel->find($userId);

        if (!$user) {
            Session::flash('error', 'User not found');
            $this->redirect('/dashboard');
            return;
        }

        $this->view('profile/index', [
            'user' => $user,
            'current_page' => 'profile',
            'page_title' => 'My Profile'
        ]);
    }

    /**
     * Update user profile information
     */
    public function update()
    {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/settings/profile');
            return;
        }

        // Validate CSRF
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/settings/profile');
            return;
        }

        $userId = Auth::id();
        $user = $this->userModel->find($userId);

        if (!$user) {
            Session::flash('error', 'User not found');
            $this->redirect('/dashboard');
            return;
        }

        $data = [
            'username' => trim($_POST['username'] ?? ''),
            'email' => trim($_POST['email'] ?? '')
        ];

        // Validation
        $errors = $this->validateProfileData($data, $userId);

        if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            $this->redirect('/settings/profile');
            return;
        }

        if ($this->userModel->updateProfile($userId, $data)) {
            Session::flash('success', 'Profile updated successfully');
            $this->redirect('/settings/profile');
        } else {
            Session::flash('error', 'Failed to update profile');
            $this->redirect('/settings/profile');
        }
    }

    /**
     * Change user password
     */
    public function changePassword()
    {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/settings/profile');
            return;
        }

        // Validate CSRF
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/settings/profile');
            return;
        }

        $userId = Auth::id();

        $data = [
            'current_password' => $_POST['current_password'] ?? '',
            'new_password' => $_POST['new_password'] ?? '',
            'confirm_password' => $_POST['confirm_password'] ?? ''
        ];

        // Validation
        $errors = $this->validatePasswordData($data, $userId);

        if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            $this->redirect('/settings/profile');
            return;
        }

        if ($this->userModel->updatePassword($userId, $data['new_password'])) {
            Session::flash('success', 'Password changed successfully');
            $this->redirect('/settings/profile');
        } else {
            Session::flash('error', 'Failed to change password');
            $this->redirect('/settings/profile');
        }
    }

    /**
     * Validate profile update data
     */
    private function validateProfileData($data, $userId)
    {
        $errors = [];

        if (empty($data['username'])) {
            $errors[] = 'Username is required';
        }

        if (empty($data['email'])) {
            $errors[] = 'Email is required';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        } elseif ($this->userModel->emailExists($data['email'], $userId)) {
            $errors[] = 'Email already exists';
        }

        if ($this->userModel->usernameExists($data['username'], $userId)) {
            $errors[] = 'Username already exists';
        }

        return $errors;
    }

    /**
     * Validate password change data
     */
    private function validatePasswordData($data, $userId)
    {
        $errors = [];

        if (empty($data['current_password'])) {
            $errors[] = 'Current password is required';
        } elseif (!$this->userModel->verifyPassword($userId, $data['current_password'])) {
            $errors[] = 'Current password is incorrect';
        }

        if (empty($data['new_password'])) {
            $errors[] = 'New password is required';
        } elseif (strlen($data['new_password']) < 8) {
            $errors[] = 'Password must be at least 8 characters long';
        }

        if ($data['new_password'] !== $data['confirm_password']) {
            $errors[] = 'New password and confirmation do not match';
        }

        return $errors;
    }
}
