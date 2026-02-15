<?php
session_start();

echo "<h1>CSRF Token Debug</h1>";

// Check current session token
echo "<h2>Current Session Token:</h2>";
echo "<pre>";
var_dump($_SESSION['csrf_token'] ?? 'NOT SET');
echo "</pre>";

// Check if Session class csrf() method works
require_once 'core/Session.php';
echo "<h2>Token from Session::csrf():</h2>";
echo "<pre>";
echo Session::csrf();
echo "</pre>";

// Check session token again after calling csrf()
echo "<h2>Session Token After csrf() call:</h2>";
echo "<pre>";
var_dump($_SESSION['csrf_token']);
echo "</pre>";

// Show all session data
echo "<h2>Full Session Data:</h2>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// Test form
echo "<h2>Test Form:</h2>";
echo '<form method="POST" action="test_csrf_post.php">';
echo '<input type="hidden" name="_csrf_token" value="' . Session::csrf() . '">';
echo '<button type="submit">Test Submit</button>';
echo '</form>';

echo "<h3>Expected Token in Form:</h3>";
echo "<pre>" . htmlspecialchars(Session::csrf()) . "</pre>";
