<?php
/**
 * Diagnostic Script for Duplicate Class Errors
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Diagnostic: Class Declaration Conflict</h1>";
echo "<hr>";

$controllersDir = __DIR__ . '/app/Controllers';
echo "<h2>1. Checking Controllers Directory: $controllersDir</h2>";

if (!is_dir($controllersDir)) {
    echo "<p style='color:red'>Error: Directory not found!</p>";
    exit;
}

$files = glob($controllersDir . "/*.php");
echo "<p>Found " . count($files) . " .php files:</p>";
echo "<ul>";
foreach ($files as $file) {
    $content = file_get_contents($file);
    $hasMatch = preg_match('/class\s+MessageController/i', $content);
    echo "<li>" . basename($file) . ($hasMatch ? " <strong style='color:orange'>[Contains MessageController]</strong>" : "") . "</li>";
}
echo "</ul>";

echo "<h2>2. Testing Inclusions</h2>";
foreach ($files as $file) {
    echo "Attempting to load: " . basename($file) . "... ";
    try {
        require_once $file;
        echo "<span style='color:green'>SUCCESS ✓</span><br>";
    } catch (Throwable $e) {
        echo "<span style='color:red'>FAILED: " . $e->getMessage() . " ✗</span><br>";
    }
}

echo "<hr>";
echo "<p>If you see two files with similar names (e.g., MessageController.php and messagecontroller.php), please delete the incorrect one.</p>";
?>
