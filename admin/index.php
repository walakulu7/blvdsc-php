<?php
/**
 * Admin Panel Entry Point
 * All requests go through this file
 */

// Start session
session_name('blvd_admin_session');
session_start();

// Error reporting (configured for production - shows errors but not deprecation warnings)
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
ini_set('display_errors', 1);

// Load database configuration
require_once __DIR__ . '/../config/database.php';

// Load constants
require_once __DIR__ . '/config/constants.php';

// Load core classes
require_once __DIR__ . '/core/Session.php';
require_once __DIR__ . '/core/Router.php';
require_once __DIR__ . '/core/Controller.php';
require_once __DIR__ . '/core/Model.php';
require_once __DIR__ . '/core/Auth.php';

// Load all models
require_once __DIR__ . '/app/Models/User.php';

// Load all controllers
foreach (glob(__DIR__ . '/app/Controllers/*.php') as $controller) {
    require_once $controller;
}

// Create router instance
$router = new Router();

// Load routes
require_once __DIR__ . '/config/routes.php';

// Dispatch request
$router->dispatch();
