<?php
/**
 * Direct Dashboard Page (No Routing)
 * Access at: http://localhost/blvdsc-web-php/admin/dashboard.php
 */

// Start session
session_name('blvd_admin_session');
session_start();

// Check if logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Load database
require_once __DIR__ . '/../config/database.php';

$user = $_SESSION['user'];

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - BLVD Coffee Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f9fafb;
            min-height: 100vh;
            padding: 2rem;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            font-size: 2rem;
            color: #1f2937;
            margin-bottom: 1rem;
            text-align: center;
        }
        
        .success-message {
            background: #e8d9b8;
            color: #3d2817;
            padding: 1.5rem;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 500;
        }
        
        .user-info {
            background: #f9fafb;
            padding: 2rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }
        
        .user-info h2 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: #1f2937;
        }
        
        .user-info p {
            color: #6b7280;
            margin: 0.5rem 0;
        }
        
        .user-info strong {
            color: #1f2937;
        }
        
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #3d2817;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.2s;
            text-align: center;
        }
        
        .btn:hover {
            background: #4d3421;
            transform: translateY(-2px);
        }
        
        .note {
            background: #fffbeb;
            border-left: 4px solid #f59e0b;
            padding: 1rem;
            margin: 2rem 0;
            font-size: 0.875rem;
        }
        
        .note strong {
            display: block;
            margin-bottom: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 Welcome to BLVD Coffee Admin Panel</h1>
        
        <div class="success-message">
            ✅ MVC Foundation Successfully Installed!
        </div>
        
        <div class="user-info">
            <h2>Current User</h2>
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Role:</strong> <?= ucfirst($user['role']) ?></p>
            <p><strong>Last Login:</strong> <?= $user['last_login'] ?? 'First time' ?></p>
        </div>
        
        <div class="note">
            <strong>📝 Note: Direct Access Mode</strong>
            You're currently using direct file access (login.php & dashboard.php) because URL rewriting isn't configured yet. Once we verify Apache mod_rewrite is working, you'll be able to use clean URLs like /admin/login.
        </div>
        
        <div style="text-align: center; margin-top: 2rem;">
            <a href="?logout=1" class="btn">Logout</a>
        </div>
        
        <div style="margin-top: 3rem; padding: 1.5rem; background: #f0fdf4; border-radius: 8px;">
            <h3 style="margin-bottom: 1rem; color: #166534;">✅ Phase 1 Complete!</h3>
            <p style="font-size: 0.875rem; margin-bottom: 0.5rem;"><strong>Next Steps:</strong></p>
            <ul style="font-size: 0.875rem; line-height: 1.8; color: #166534;">
                <li>Test routing: <a href="test.php" target="_blank">Run Diagnostic Test</a></li>
                <li>Phase 2: Build UI & Design System</li>
                <li>Phase 3: Dashboard with React-style components</li>
            </ul>
        </div>
    </div>
</body>
</html>
