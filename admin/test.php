<?php
/**
 * Diagnostic Test Script
 * Access this at: http://localhost/blvdsc-web-php/admin/test.php
 */

echo "<h1>BLVD Admin - Diagnostic Test</h1>";
echo "<hr>";

// 1. Check PHP version
echo "<h2>1. PHP Version</h2>";
echo "Version: " . PHP_VERSION . " ✓<br>";

// 2. Check if mod_rewrite is enabled
echo "<h2>2. Apache mod_rewrite</h2>";
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    if (in_array('mod_rewrite', $modules)) {
        echo "mod_rewrite: <strong style='color:green'>ENABLED ✓</strong><br>";
    } else {
        echo "mod_rewrite: <strong style='color:red'>DISABLED ✗</strong><br>";
        echo "<em>You need to enable mod_rewrite in Apache!</em><br>";
    }
} else {
    echo "Cannot detect (might still be enabled)<br>";
}

// 3. Check database connection
echo "<h2>3. Database Connection</h2>";
try {
    require_once __DIR__ . '/../config/database.php';
    echo "Database: <strong style='color:green'>CONNECTED ✓</strong><br>";
    echo "Database Name: " . $pdo->query('SELECT DATABASE()')->fetchColumn() . "<br>";
} catch (Exception $e) {
    echo "Database: <strong style='color:red'>ERROR ✗</strong><br>";
    echo "Error: " . $e->getMessage() . "<br>";
}

// 4. Check if admin_users table exists
echo "<h2>4. Admin Users Table</h2>";
try {
    $stmt = $pdo->query("SELECT COUNT(*) FROM admin_users");
    $count = $stmt->fetchColumn();
    echo "admin_users table: <strong style='color:green'>EXISTS ✓</strong><br>";
    echo "Total users: $count<br>";
} catch (Exception $e) {
    echo "admin_users table: <strong style='color:red'>NOT FOUND ✗</strong><br>";
    echo "Run database.sql first!<br>";
}

// 5. Check file permissions
echo "<h2>5. File Permissions</h2>";
$files = [
    __DIR__ . '/index.php',
    __DIR__ . '/.htaccess',
    __DIR__ . '/core/Router.php',
];

foreach ($files as $file) {
    if (file_exists($file)) {
        echo basename($file) . ": <strong style='color:green'>EXISTS ✓</strong><br>";
    } else {
        echo basename($file) . ": <strong style='color:red'>MISSING ✗</strong><br>";
    }
}

// 6. Direct links to test
echo "<h2>6. Test Links</h2>";
echo "<a href='index.php'>Test index.php directly</a><br>";
echo "<a href='login'>Test /login (with rewrite)</a><br>";
echo "<a href='dashboard'>Test /dashboard (with rewrite)</a><br>";

echo "<hr>";
echo "<h2>Current Request Info</h2>";
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "<br>";
echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "<br>";
echo "PHP_SELF: " . $_SERVER['PHP_SELF'] . "<br>";
?>
