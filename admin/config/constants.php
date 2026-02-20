<?php
/**
 * Application Constants
 */

// Application paths
// Application paths
define('APP_ROOT', dirname(__DIR__));

// Dynamic Base Path Detection
$scriptName = $_SERVER['SCRIPT_NAME'];
$publicPath = str_replace('/index.php', '', $scriptName);
$basePath = (strpos($publicPath, '/admin') !== false) ? substr($publicPath, 0, strpos($publicPath, '/admin') + 6) : $publicPath;
define('BASE_PATH', $basePath);

// Dynamic Base URL Detection
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
define('BASE_URL', $protocol . $host . BASE_PATH);

define('UPLOAD_PATH', APP_ROOT . '/public/uploads');

// Session configuration
define('SESSION_TIMEOUT', 1800); // 30 minutes
define('SESSION_NAME', 'blvd_admin_session');

// Pagination
define('ITEMS_PER_PAGE', 20);

// File upload limits
define('MAX_FILE_SIZE', 5 * 1024 * 1024); // 5MB
define('ALLOWED_IMAGE_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);

// Date format
define('DATE_FORMAT', 'Y-m-d');
define('DATETIME_FORMAT', 'Y-m-d H:i:s');
define('DISPLAY_DATE_FORMAT', 'M d, Y');
define('DISPLAY_DATETIME_FORMAT', 'M d, Y h:i A');

// Application info
define('APP_NAME', 'BLVD Coffee Admin');
define('APP_VERSION', '1.0.0');

// Email configuration
define('EMAIL_FROM_NAME', 'BLVD Specialty Coffee');
define('EMAIL_FROM_ADDRESS', 'noreply@blvdsc.com.au');
define('CONTACT_EMAIL', 'lankawebnets@gmail.com');
