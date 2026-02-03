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
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
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
        
        .logo-container {
            text-align: center;
            margin-bottom: 2rem;
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
            margin-bottom: 1rem;
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
        }
        
        .welcome-text {
            text-align: center;
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
            box-shadow: 0 4px 12px rgba(61, 40, 23, 0.3);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .alert {
            padding: 0.875rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
        
        .alert-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        .alert-success {
            background: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        
        .divider {
            text-align: center;
            margin: 1.5rem 0;
            color: #9ca3af;
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
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <div class="logo">☕</div>
            <h1 class="brand-name">BLVD Coffee</h1>
            <p class="brand-subtitle">Admin Panel</p>
        </div>
        
        <div class="welcome-text">
            <h2 class="welcome-title">Welcome Back</h2>
            <p class="welcome-subtitle">Enter your credentials to access the admin panel</p>
        </div>
        
        <?php if (Session::flash('error')): ?>
            <div class="alert alert-error">
                <?= htmlspecialchars(Session::flash('error')) ?>
            </div>
        <?php endif; ?>
        
        <?php if (Session::flash('success')): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars(Session::flash('success')) ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="<?= BASE_PATH ?>/login">
            <input type="hidden" name="_csrf_token" value="<?= Session::csrf() ?>">
            
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
