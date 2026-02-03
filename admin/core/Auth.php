<?php
require_once __DIR__ . '/Session.php';
require_once __DIR__ . '/../app/Models/User.php';

/**
 * Authentication Class
 * Handles user authentication and authorization
 */
class Auth {
    
    /**
     * Attempt to log in user
     */
    public static function attempt($username, $password) {
        $userModel = new User();
        $user = $userModel->first(['username' => $username]);
        
        if ($user && password_verify($password, $user['password_hash'])) {
            // Check if user is active
            if (!$user['is_active']) {
                return ['success' => false, 'message' => 'Account is inactive'];
            }
            
            // Set session
            Session::set('user_id', $user['id']);
            Session::set('user', $user);
            Session::regenerate();
            
            // Update last login
            $userModel->update($user['id'], ['last_login' => date('Y-m-d H:i:s')]);
            
            // Log activity
            self::logActivity('login', 'User logged in');
            
            return ['success' => true, 'user' => $user];
        }
        
        return ['success' => false, 'message' => 'Invalid username or password'];
    }
    
    /**
     * Check if user is authenticated
     */
    public static function check() {
        // Check session timeout
        if (!Session::checkTimeout()) {
            return false;
        }
        
        return Session::has('user_id');
    }
    
    /**
     * Get authenticated user
     */
    public static function user() {
        if (!self::check()) {
            return null;
        }
        
        return Session::get('user');
    }
    
    /**
     * Get authenticated user ID
     */
    public static function id() {
        $user = self::user();
        return $user['id'] ?? null;
    }
    
    /**
     * Check if user has specific role(s)
     */
    public static function hasRole($roles) {
        $user = self::user();
        
        if (!$user) {
            return false;
        }
        
        // Convert to array if string
        if (is_string($roles)) {
            $roles = [$roles];
        }
        
        return in_array($user['role'], $roles);
    }
    
    /**
     * Check if user is admin
     */
    public static function isAdmin() {
        return self::hasRole('admin');
    }
    
    /**
     * Check if user is owner
     */
    public static function isOwner() {
        return self::hasRole(['admin', 'owner']);
    }
    
    /**
     * Check if user is manager or higher
     */
    public static function isManager() {
        return self::hasRole(['admin', 'owner', 'manager']);
    }
    
    /**
     * Log out user
     */
    public static function logout() {
        self::logActivity('logout', 'User logged out');
        Session::destroy();
    }
    
    /**
     * Log user activity
     */
    public static function logActivity($action, $details = '') {
        global $pdo;
        
        $userId = self::id();
        if (!$userId) {
            return;
        }
        
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        
        $stmt = $pdo->prepare("
            INSERT INTO admin_activity_log (admin_id, action, details, ip_address) 
            VALUES (?, ?, ?, ?)
        ");
        
        $stmt->execute([$userId, $action, $details, $ip]);
    }
    
    /**
     * Update user session data
     */
    public static function refreshUser() {
        $userId = self::id();
        
        if ($userId) {
            $userModel = new User();
            $user = $userModel->find($userId);
            
            if ($user) {
                Session::set('user', $user);
            }
        }
    }
}
