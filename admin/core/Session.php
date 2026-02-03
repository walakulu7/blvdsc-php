<?php
/**
 * Session Management Class
 */
class Session {
    
    /**
     * Start session if not already started
     */
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }
    
    /**
     * Set session value
     */
    public static function set($key, $value) {
        self::start();
        $_SESSION[$key] = $value;
    }
    
    /**
     * Get session value
     */
    public static function get($key, $default = null) {
        self::start();
        return $_SESSION[$key] ?? $default;
    }
    
    /**
     * Check if session key exists
     */
    public static function has($key) {
        self::start();
        return isset($_SESSION[$key]);
    }
    
    /**
     * Remove session key
     */
    public static function remove($key) {
        self::start();
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    
    /**
     * Flash message (available for next request only)
     */
    public static function flash($key, $value = null) {
        self::start();
        
        if ($value === null) {
            // Get flash message
            $message = self::get("flash_$key");
            self::remove("flash_$key");
            return $message;
        }
        
        // Set flash message
        self::set("flash_$key", $value);
    }
    
    /**
     * Destroy session
     */
    public static function destroy() {
        self::start();
        $_SESSION = [];
        
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }
        
        session_destroy();
    }
    
    /**
     * Regenerate session ID (prevent session fixation)
     */
    public static function regenerate() {
        self::start();
        session_regenerate_id(true);
    }
    
    /**
     * Get or generate CSRF token
     */
    public static function csrf() {
        self::start();
        
        if (!self::has('csrf_token')) {
            self::set('csrf_token', bin2hex(random_bytes(32)));
        }
        
        return self::get('csrf_token');
    }
    
    /**
     * Check session timeout (30 minutes)
     */
    public static function checkTimeout($timeout = 1800) {
        self::start();
        
        if (self::has('last_activity')) {
            $elapsed = time() - self::get('last_activity');
            
            if ($elapsed > $timeout) {
                self::destroy();
                return false;
            }
        }
        
        self::set('last_activity', time());
        return true;
    }
}
