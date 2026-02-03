<?php
// Password Hash Generator
// Run this file to get the correct password hash for "admin123"

$password = 'admin123';
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "<h1>Password Hash Generator</h1>";
echo "<p><strong>Password:</strong> $password</p>";
echo "<p><strong>Hash:</strong> <code>$hash</code></p>";
echo "<hr>";
echo "<h2>SQL Update Query:</h2>";
echo "<pre style='background:#f5f5f5; padding:15px; border-radius:5px;'>";
echo "UPDATE admin_users SET password_hash = '$hash' WHERE username = 'admin';\n";
echo "UPDATE admin_users SET password_hash = '$hash' WHERE username = 'owner';\n";
echo "UPDATE admin_users SET password_hash = '$hash' WHERE username = 'manager';";
echo "</pre>";
echo "<p>Copy and run these queries in phpMyAdmin SQL tab!</p>";
?>
