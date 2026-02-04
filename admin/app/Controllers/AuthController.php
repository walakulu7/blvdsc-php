<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../core/Auth.php';

/**
 * Authentication Controller
 * Handles login, logout, and role selection
 */
class AuthController extends Controller {
    
    /**
     * Show login form
     */
    public function loginForm() {
        $this->view('auth/login', [], 'auth');
    }
    
    /**
     * Process login
     */
    public function login() {
        $username = $this->input('username');
        $password = $this->input('password');
        
        // Validate input
        if (empty($username) || empty($password)) {
            Session::flash('error', 'Username and password are required');
            $this->redirect('/login');
        }
        
        // Attempt login
        $result = Auth::attempt($username, $password);
        
        if ($result['success']) {
            // Redirect to dashboard
            $this->redirect('/dashboard');
        } else {
            // Show error
            Session::flash('error', $result['message']);
            $this->redirect('/login');
        }
    }
    
    /**
     * Logout
     */
    public function logout() {
        Auth::logout();
        $this->redirect('/login');
    }
}
