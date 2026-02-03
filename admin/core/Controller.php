<?php
/**
 * Base Controller Class
 * All controllers extend this class
 */
class Controller {
    
    /**
     * Render a view
     */
    protected function view($view, $data = [], $layout = 'main') {
        extract($data);
        
        // Start output buffering
        ob_start();
        
        // Include the view file
        $viewPath = __DIR__ . "/../app/Views/$view.php";
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            die("View not found: $view");
        }
        
        // Get view content
        $content = ob_get_clean();
        
        // Include layout if specified
        if ($layout) {
            $layoutPath = __DIR__ . "/../app/Views/layouts/$layout.php";
            if (file_exists($layoutPath)) {
                include $layoutPath;
            } else {
                echo $content;
            }
        } else {
            echo $content;
        }
    }
    
    /**
     * Return JSON response
     */
    protected function json($data, $statusCode = 200) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
    
    /**
     * Redirect to another route
     */
    protected function redirect($path) {
        $basePath = '/blvdsc-web-php/admin';
        header("Location: $basePath$path");
        exit;
    }
    
    /**
     * Redirect back with message
     */
    protected function back($message = null, $type = 'success') {
        if ($message) {
            Session::flash($type, $message);
        }
        
        $referer = $_SERVER['HTTP_REFERER'] ?? '/blvdsc-web-php/admin/dashboard';
        header("Location: $referer");
        exit;
    }
    
    /**
     * Require authentication
     */
    protected function requireAuth() {
        if (!Auth::check()) {
            $this->redirect('/login');
        }
    }
    
    /**
     * Require specific role(s)
     */
    protected function requireRole($roles) {
        if (!Auth::hasRole($roles)) {
            http_response_code(403);
            $this->view('errors/403', [], false);
            exit;
        }
    }
    
    /**
     * Get request input
     */
    protected function input($key, $default = null) {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
        
        if (isset($_GET[$key])) {
            return $_GET[$key];
        }
        
        return $default;
    }
    
    /**
     * Get all request input
     */
    protected function all() {
        return array_merge($_GET, $_POST);
    }
    
    /**
     * Validate CSRF token
     */
    protected function validateCsrf() {
        $token = $this->input('_csrf_token');
        
        if (!$token || $token !== Session::get('csrf_token')) {
            http_response_code(403);
            die('CSRF token mismatch');
        }
    }
}
