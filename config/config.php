<?php
// Site Configuration
define('SITE_NAME', 'BLVD Coffee Co.');
define('SITE_TAGLINE', 'Coffee Co.');
define('SITE_DESCRIPTION', 'Specialty coffee, freshly baked goods, and a welcoming atmosphere in the heart of Melbourne');

// Contact Information
define('CONTACT_ADDRESS', '123 Main Street');
define('CONTACT_CITY', 'Melbourne');
define('CONTACT_STATE', 'VIC');
define('CONTACT_ZIP', '3000');
define('CONTACT_COUNTRY', 'Australia');
define('CONTACT_PHONE', '+61 3 9123 4567');
define('CONTACT_EMAIL', 'hello@blvdcoffee.com.au');

// Department Emails
define('EMAIL_CATERING', 'catering@blvdcoffee.com.au');
define('EMAIL_EVENTS', 'events@blvdcoffee.com.au');
define('EMAIL_CAREERS', 'careers@blvdcoffee.com.au');
define('EMAIL_MEDIA', 'media@blvdcoffee.com.au');

// Social Media
define('SOCIAL_FACEBOOK', 'https://facebook.com/blvdcoffee');
define('SOCIAL_INSTAGRAM', 'https://instagram.com/blvdcoffee');
define('SOCIAL_TWITTER', 'https://twitter.com/blvdcoffee');

// Opening Hours
$opening_hours = [
    'weekday' => 'Monday - Friday: 7:00 AM - 6:00 PM',
    'saturday' => 'Saturday: 8:00 AM - 6:00 PM',
    'sunday' => 'Sunday: 8:00 AM - 4:00 PM'
];

// Base URL (adjust for your environment)
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$base_path = '/blvdsc/blvdsc-web-php';
define('BASE_URL', $protocol . '://' . $host . $base_path);

// Helper function to get current page
function get_current_page() {
    $page = basename($_SERVER['PHP_SELF'], '.php');
    return $page === 'index' ? 'home' : $page;
}

// Helper function to check if page is active
function is_active($page_name) {
    $current = get_current_page();
    if ($page_name === 'home' && $current === 'home') return true;
    if ($page_name === $current) return true;
    return false;
}
?>
