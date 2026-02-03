<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: standalone-login.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard - BLVD Coffee</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f9fafb;
            padding: 2rem;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 3rem;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h1 {
            font-size: 2rem;
            color: #1f2937;
            margin-bottom: 1rem;
            text-align: center;
        }
        .success {
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
        }
        .btn:hover {
            background: #4d3421;
            transform: translateY(-2px);
        }
        .next-steps {
            margin-top: 3rem;
            padding: 1.5rem;
            background: #f0fdf4;
            border-radius: 8px;
        }
        .next-steps h3 {
            margin-bottom: 1rem;
            color: #166534;
        }
        .next-steps ul {
            font-size: 0.875rem;
            line-height: 1.8;
            color: #166534;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎉 Welcome to BLVD Coffee Admin Panel</h1>
        
        <div class="success">
            ✅ Login Successful! MVC Foundation Working!
        </div>
        
        <div class="user-info">
            <h2>Current User</h2>
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username']) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
            <p><strong>Role:</strong> <?= ucfirst($user['role']) ?></p>
        </div>
        
        <div style="text-align: center;">
            <a href="?logout=1" class="btn">Logout</a>
        </div>
        
        <div class="next-steps">
            <h3>✅ Phase 1 Complete!</h3>
            <p style="font-size: 0.875rem; margin-bottom: 0.5rem;"><strong>Next Steps:</strong></p>
            <ul>
                <li>Phase 2: Build UI & Design System (React-style components)</li>
                <li>Phase 3: Complete Dashboard with stats and widgets</li>
                <li>Phase 4-9: All admin modules (Events, Reservations, etc.)</li>
            </ul>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: standalone-login.php');
    exit;
}
?>
