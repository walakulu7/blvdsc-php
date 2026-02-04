<?php
/**
 * Image proxy script
 * Serves uploaded images with proper headers
 */

// Get requested image path from URL
$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri, PHP_URL_PATH);

// Extract the filename from the path
// Expected format: /blvdsc-web-php/uploads/image.php?file=uploads/events/filename.jpg
$file = $_GET['file'] ?? '';

if (empty($file)) {
    header('HTTP/1.0 404 Not Found');
    exit('File not found');
}

// Sanitize the file path
$file = str_replace(['../', '..\\', '\\'], '', $file);

// Remove 'uploads/' prefix if it exists (since we're already in uploads directory)
$file = preg_replace('#^uploads/#', '', $file);

// Build full path
$filepath = __DIR__ . '/' . $file;

// Check if file exists
if (!file_exists($filepath) || !is_file($filepath)) {
    header('HTTP/1.0 404 Not Found');
    exit('File not found');
}

// Get file extension
$ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

// Set appropriate content type
$contentTypes = [
    'jpg' => 'image/jpeg',
    'jpeg' => 'image/jpeg',
    'png' => 'image/png',
    'gif' => 'image/gif',
    'webp' => 'image/webp'
];

$contentType = $contentTypes[$ext] ?? 'application/octet-stream';

// Set headers
header('Content-Type: ' . $contentType);
header('Content-Length: ' . filesize($filepath));
header('Cache-Control: public, max-age=31536000'); // Cache for 1 year

// Output file
readfile($filepath);
exit;
