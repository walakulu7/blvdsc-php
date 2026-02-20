<?php
/**
 * Database Migration Runner - Enhanced
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load database configuration
$db_file = __DIR__ . '/../config/database.php';
if (!file_exists($db_file)) {
    die("Error: Database config not found at $db_file");
}
require_once $db_file;

echo "<h1>Running Database Migration</h1>";
echo "<hr>";

$migrationFile = __DIR__ . '/database_migrations/create_message_replies_table.sql';

if (!file_exists($migrationFile)) {
    echo "<p style='color:red'>Migration file not found: $migrationFile</p>";
    echo "<p>Please ensure you have uploaded the <code>database_migrations</code> folder with the SQL file inside the <code>admin</code> directory.</p>";
    exit;
}

$sql = file_get_contents($migrationFile);

try {
    // Check if table already exists
    $check = $pdo->query("SHOW TABLES LIKE 'message_replies'");
    if ($check->rowCount() > 0) {
        echo "<p style='color:blue'>Table <code>message_replies</code> already exists. No action needed.</p>";
    } else {
        // Execute migration
        $pdo->exec($sql);
        
        // Re-check
        $check = $pdo->query("SHOW TABLES LIKE 'message_replies'");
        if ($check->rowCount() > 0) {
            echo "<p style='color:green'>Migration executed successfully!</p>";
            echo "<p>Table <code>message_replies</code> created.</p>";
        } else {
            echo "<p style='color:red'>Migration failed: Table was not created despite no obvious error.</p>";
        }
    }
} catch (PDOException $e) {
    echo "<p style='color:red'>Migration failed: " . $e->getMessage() . "</p>";
    echo "<p>SQL Attempted:</p><pre>" . htmlspecialchars($sql) . "</pre>";
}

echo "<hr>";
echo "<h2>Database Diagnostics</h2>";
try {
    echo "Current Database: " . $pdo->query('SELECT DATABASE()')->fetchColumn() . "<br>";
    
    // Check contact_messages table
    $msgCheck = $pdo->query("SHOW TABLES LIKE 'contact_messages'");
    if ($msgCheck->rowCount() > 0) {
        echo "<code>contact_messages</code> table: <span style='color:green'>Found ✓</span><br>";
    } else {
        echo "<code>contact_messages</code> table: <span style='color:red'>Missing ✗</span><br>";
    }
    
} catch (Exception $e) {
    echo "Diagnostic Error: " . $e->getMessage();
}

echo "<hr>";
echo "<p>After successful migration, please delete this file (<code>migrate_database.php</code>) for security.</p>";
