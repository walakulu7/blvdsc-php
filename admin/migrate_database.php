<?php
/**
 * Database Migration Runner - Enhanced
 * Runs all pending migrations in order.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Load database configuration
$db_file = __DIR__ . '/../config/database.php';
if (!file_exists($db_file)) {
    die("Error: Database config not found at $db_file");
}
require_once $db_file;

echo "<h1>Running Database Migrations</h1>";
echo "<hr>";

// ── Migration 1: message_replies table ──────────────────────────────
echo "<h2>Migration 1: message_replies Table</h2>";

$migrationFile = __DIR__ . '/database_migrations/create_message_replies_table.sql';

if (!file_exists($migrationFile)) {
    echo "<p style='color:red'>Migration file not found: $migrationFile</p>";
} else {
    $sql = file_get_contents($migrationFile);
    try {
        $check = $pdo->query("SHOW TABLES LIKE 'message_replies'");
        if ($check->rowCount() > 0) {
            echo "<p style='color:blue'>Table <code>message_replies</code> already exists. No action needed.</p>";
        } else {
            $pdo->exec($sql);
            $check = $pdo->query("SHOW TABLES LIKE 'message_replies'");
            if ($check->rowCount() > 0) {
                echo "<p style='color:green'>Table <code>message_replies</code> created successfully!</p>";
            } else {
                echo "<p style='color:red'>Migration failed: Table was not created.</p>";
            }
        }
    } catch (PDOException $e) {
        echo "<p style='color:red'>Migration 1 failed: " . $e->getMessage() . "</p>";
        echo "<pre>" . htmlspecialchars($sql) . "</pre>";
    }
}
echo "<hr>";

// ── Migration 2: Notification Email Templates ────────────────────────
echo "<h2>Migration 2: Notification Email Templates</h2>";

$templateFile = __DIR__ . '/database_migrations/add_notification_templates.sql';

if (!file_exists($templateFile)) {
    echo "<p style='color:orange'>Warning: Notification template file not found. Skipping.</p>";
} else {
    $templateSql = file_get_contents($templateFile);
    try {
        $pdo->exec($templateSql);
        echo "<p style='color:green'>Notification templates seeded successfully!</p>";
    } catch (PDOException $e) {
        echo "<p style='color:red'>Template seeding failed: " . $e->getMessage() . "</p>";
        echo "<pre>" . htmlspecialchars($templateSql) . "</pre>";
    }
}
echo "<hr>";

// ── Diagnostics ──────────────────────────────────────────────────────
echo "<h2>Database Diagnostics</h2>";
try {
    echo "Current Database: " . $pdo->query('SELECT DATABASE()')->fetchColumn() . "<br>";

    $tables = ['contact_messages', 'message_replies', 'reservations', 'high_tea_reservations', 'site_settings'];
    foreach ($tables as $tbl) {
        $r = $pdo->query("SHOW TABLES LIKE '$tbl'");
        $found = $r->rowCount() > 0;
        echo "<code>$tbl</code>: " . ($found ? "<span style='color:green'>Found ✓</span>" : "<span style='color:red'>Missing ✗</span>") . "<br>";
    }
} catch (Exception $e) {
    echo "Diagnostic Error: " . $e->getMessage();
}

echo "<hr>";
echo "<p>After successful migration, please delete this file (<code>migrate_database.php</code>) for security.</p>";
