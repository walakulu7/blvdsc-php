<?php
/**
 * Standalone Login - No External Dependencies
 * Access at: http://localhost/blvdsc-web-php/admin/standalone-login.php
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

// Database connection inline
$db_host = 'localhost';
$db_name = 'blvd_coffee';
$db_user = 'root';
$db_pass = '';

$pdo = null;
$db_error = null;

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    $db_error = $e->getMessage();
}

// Handle login
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    if ($pdo) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        try {
            $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user'] = $user;
                $success = 'Login successful! Redirecting...';
                header('refresh:2;url=standalone-dashboard.php');
            } else {
                $error = 'Invalid username or password';
            }
        } catch(PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    } else {
        $error = 'Database not connected';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Login - BLVD Coffee</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f5f5, #e8e8e8);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
        }
        .logo {
            width: 80px;
            height: 80px;
            background: #c9a870;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1rem;
        }
        h1 { text-align: center; font-size: 1.75rem; margin-bottom: 0.5rem; color: #1f2937; }
        .subtitle { text-align: center; font-size: 0.875rem; color: #6b7280; margin-bottom: 2rem; }
        .status {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
        .error { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }
        .success { background: #f0fdf4; color: #166534; border: 1px solid #bbf7d0; }
        .warning { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .form-group { margin-bottom: 1.5rem; }
        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
        }
        input:focus {
            outline: none;
            border-color: #c9a870;
            box-shadow: 0 0 0 3px rgba(201,168,112,0.1);
        }
        button {
            width: 100%;
            padding: 0.875rem;
            background: #3d2817;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
        }
        button:hover { background: #4d3421; }
        .info {
            margin-top: 1.5rem;
            padding: 1rem;
            background: #f9fafb;
            border-radius: 8px;
            font-size: 0.75rem;
            text-align: center;
            color: #6b7280;
        }
        code {
            background: #e5e7eb;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">☕</div>
        <h1>BLVD Coffee</h1>
        <p class="subtitle">Admin Panel - Standalone Version</p>
        
        <?php if ($db_error): ?>
            <div class="status error">
                <strong>❌ Database Error:</strong><br>
                <?= htmlspecialchars($db_error) ?><br><br>
                Please create the <code>blvd_coffee</code> database in phpMyAdmin and import the SQL file.
            </div>
        <?php elseif ($success): ?>
            <div class="status success">
                <strong>✅ <?= htmlspecialchars($success) ?></strong>
            </div>
        <?php elseif ($error): ?>
            <div class="status error">
                <strong>❌ <?= htmlspecialchars($error) ?></strong>
            </div>
        <?php else: ?>
            <div class="status warning">
                <strong>⚠️ Note:</strong> This is a standalone version for testing. It works without the MVC framework.
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
        
        <div class="info">
            <strong>Default Credentials:</strong><br>
            Username: <code>admin</code> | Password: <code>admin123</code>
        </div>
    </div>
</body>
</html>
