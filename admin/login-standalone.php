<?php
/**
 * Direct Login Page (No Routing)
 * Access at: http://localhost/blvdsc-web-php/admin/login.php
 */

// Enable error display for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_name('blvd_admin_session');
session_start();

// Load database
try {
    require_once __DIR__ . '/../config/database.php';
} catch (Exception $e) {
    die("Database configuration error: " . $e->getMessage() . "<br><br>Please ensure the 'blvd_coffee' database exists and run the database.sql file.");
}


// Process login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if ($username && $password) {
        // Check user
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password_hash'])) {
            if ($user['is_active']) {
                // Set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user'] = $user;
                
                // Update last login
                $stmt = $pdo->prepare("UPDATE admin_users SET last_login = ? WHERE id = ?");
                $stmt->execute([date('Y-m-d H:i:s'), $user['id']]);
                
                // Redirect to dashboard (MVC route)
                header('Location: dashboard');
                exit;
            } else {
                $error = 'Account is inactive';
            }
        } else {
            $error = 'Invalid username or password';
        }
    } else {
        $error = 'Username and password are required';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BLVD Coffee Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-container {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            background: #c9a870;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1rem;
        }
        
        .text-center {
            text-align: center;
        }
        
        .brand-name {
            font-size: 1.75rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .brand-subtitle {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 2rem;
        }
        
        .welcome-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .welcome-subtitle {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #c9a870;
            box-shadow: 0 0 0 3px rgba(201, 168, 112, 0.1);
        }
        
        .btn-login {
            width: 100%;
            padding: 0.875rem;
            background: #3d2817;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-login:hover {
            background: #4d3421;
            transform: translateY(-1px);
        }
        
        .alert-error {
            padding: 0.875rem 1rem;
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
        
        .role-info {
            margin-top: 1.5rem;
            padding: 1rem;
            background: #f9fafb;
            border-radius: 8px;
            font-size: 0.75rem;
            color: #6b7280;
            text-align: center;
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
    <div class="login-container">
        <div class="text-center">
            <div class="logo">☕</div>
            <h1 class="brand-name">BLVD Coffee</h1>
            <p class="brand-subtitle">Admin Panel (Direct Access)</p>
        </div>
        
        <div class="text-center">
            <h2 class="welcome-title">Welcome Back</h2>
            <p class="welcome-subtitle">Enter your credentials to access the admin panel</p>
        </div>
        
        <?php if (isset($error)): ?>
            <div class="alert-error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label class="form-label" for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    class="form-input" 
                    placeholder="Enter your username"
                    required
                    autofocus
                >
            </div>
            
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-input" 
                    placeholder="Enter your password"
                    required
                >
            </div>
            
            <button type="submit" class="btn-login">
                Login to Admin Panel
            </button>
        </form>
        
        <div class="role-info">
            <strong>Default Credentials:</strong><br>
            Username: <code>admin</code> | Password: <code>admin123</code>
        </div>
    </div>
</body>
</html>
