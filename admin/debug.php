<?php
// Enable error display
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Debug Check</h1>";
echo "<p>PHP is working!</p>";

// Check if database config exists
$dbPath = __DIR__ . '/../config/database.php';
echo "<p>Looking for database.php at: " . realpath(dirname($dbPath)) . "</p>";

if (file_exists($dbPath)) {
    echo "<p style='color:green'>✅ database.php EXISTS</p>";
    
    try {
        require_once $dbPath;
        echo "<p style='color:green'>✅ database.php LOADED</p>";
        echo "<p>Database connection: " . (isset($pdo) ? "SUCCESS" : "FAILED") . "</p>";
    } catch (Exception $e) {
        echo "<p style='color:red'>❌ Error loading database.php: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color:red'>❌ database.php NOT FOUND</p>";
    echo "<p>Expected at: $dbPath</p>";
}

// Check admin_users table
if (isset($pdo)) {
    try {
        $stmt = $pdo->query("SELECT COUNT(*) FROM admin_users");
        $count = $stmt->fetchColumn();
        echo "<p style='color:green'>✅ admin_users table exists with $count users</p>";
    } catch (Exception $e) {
        echo "<p style='color:red'>❌ admin_users table error: " . $e->getMessage() . "</p>";
    }
}

echo "<hr>";
echo "<p><a href='login.php'>Try login.php</a></p>";
echo "<p><a href='dashboard.php'>Try dashboard.php</a></p>";
?>
