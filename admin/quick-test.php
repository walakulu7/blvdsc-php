<?php
// Simple test - if you see this, PHP is working
echo "PHP IS WORKING!<br>";
echo "Testing file paths...<br>";

// Test core files
$coreFiles = [
    'Session.php' => __DIR__ . '/core/Session.php',
    'Router.php' => __DIR__ . '/core/Router.php',
    'Controller.php' => __DIR__ . '/core/Controller.php',
    'Model.php' => __DIR__ . '/core/Model.php',
    'Auth.php' => __DIR__ . '/core/Auth.php',
];

foreach ($coreFiles as $name => $path) {
    if (file_exists($path)) {
        echo "✅ $name exists<br>";
    } else {
        echo "❌ $name MISSING at: $path<br>";
    }
}

// Test database
try {
    require_once __DIR__ . '/../config/database.php';
    echo "✅ Database connected<br>";
} catch (Exception $e) {
    echo "❌ Database error: " . $e->getMessage() . "<br>";
}

echo "<br><strong>If you see this, the issue is in routing or controller loading</strong>";
?>
