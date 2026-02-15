<?php
// Debug script to check database connection and table existence
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Production Debugger</h1>";

// 1. Check Configuration File
echo "<h2>1. Configuration Check</h2>";
$configFile = 'config/database.php';
if (file_exists($configFile)) {
    echo "<p style='color:green'>Found config/database.php</p>";
    require_once $configFile;
    echo "<p>DB_HOST: " . DB_HOST . "</p>";
    echo "<p>DB_NAME: " . DB_NAME . "</p>";
    echo "<p>DB_USER: " . DB_USER . "</p>";
} else {
    echo "<p style='color:red'>Missing config/database.php</p>";
    die();
}

// 2. Check Database Connection
echo "<h2>2. Database Connection Check</h2>";
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
    $pdo = new PDO($dsn, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green'>Successfully connected to database.</p>";
} catch (PDOException $e) {
    echo "<p style='color:red'>Connection Failed: " . $e->getMessage() . "</p>";
    die();
}

// 3. Check Tables
echo "<h2>3. Table Existence Check</h2>";
$tables = ['menu_items', 'reservations', 'contact_messages', 'high_tea_reservations'];

foreach ($tables as $table) {
    try {
        $stmt = $pdo->query("SELECT 1 FROM $table LIMIT 1");
        echo "<p style='color:green'>Table '$table' exists.</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red'>Table '$table' DOES NOT EXIST or Error: " . $e->getMessage() . "</p>";
    }
}

// 4. Test Mail (Optional)
echo "<h2>4. Mail Function Check (dry run)</h2>";
if (function_exists('mail')) {
    echo "<p style='color:green'>mail() function is available.</p>";
} else {
    echo "<p style='color:red'>mail() function is disabled.</p>";
}
?>
