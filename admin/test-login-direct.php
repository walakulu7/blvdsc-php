<?php
/**
 * Direct Login Test - Bypass Router
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_name('blvd_admin_session');
session_start();

// Load database
require_once __DIR__ . '/../config/database.php';

// Load constants
require_once __DIR__ . '/config/constants.php';

// Load core classes
require_once __DIR__ . '/core/Session.php';
require_once __DIR__ . '/core/Auth.php';
require_once __DIR__ . '/core/Controller.php';

// Load controllers
require_once __DIR__ . '/app/Controllers/AuthController.php';

echo "<!DOCTYPE html><html><body>";
echo "<h1>Testing Login View Rendering</h1>";
echo "<p>About to create AuthController and call loginForm()...</p>";

try {
    $authController = new AuthController();
    echo "<p style='color: green;'>✅ AuthController created successfully</p>";
    
    echo "<p>Calling loginForm() method...</p>";
    $authController->loginForm();
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Error: " . $e->getMessage() . "</p>";
    echo "<pre>" . $e->getTraceAsString() . "</pre>";
}

echo "</body></html>";
?>
