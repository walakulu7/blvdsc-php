<?php
/**
 * Application Constants
 */

// Application paths
define('APP_ROOT', __DIR__ . '/..');
define('BASE_PATH', '/blvdsc-web-php/admin');
define('BASE_URL', 'http://localhost/blvdsc-web-php/admin');
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
