<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BLVD Specialty Coffee - Admin Panel">
    <meta property="og:title" content="BLVD Specialty Coffee - Admin">
    <meta property="og:description" content="Management Panel for BLVD Specialty Coffee">
    <meta property="og:image" content="<?= BASE_URL ?>/../assets/images/blvd-logo-circle-white.png">
    <meta property="og:type" content="website">
    <title>Login - BLVD Specialty Coffee Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .login-wrapper {
            display: flex;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            width: 100%;
            max-width: 1000px;
            min-height: 600px;
        }
        
        /* Left Panel - Branded Section */
        .brand-panel {
            flex: 1;
            background: linear-gradient(135deg, #c9a870 0%, #b8976c 100%);
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            position: relative;
            overflow: hidden;
        }
        
        .brand-panel::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        }
        
        .brand-content {
            position: relative;
            z-index: 1;
            text-align: center;
        }
        
        .brand-logo {
            width: 150px;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem auto;
        }
        
        .brand-logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.15));
        }
        
        .brand-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .brand-subtitle {
            font-size: 1.125rem;
            font-weight: 300;
            opacity: 0.95;
            margin-bottom: 3rem;
        }
        
        .features-list {
            list-style: none;
            text-align: left;
            max-width: 280px;
        }
        
        .features-list li {
            padding: 0.75rem 0;
            display: flex;
            align-items: center;
            font-size: 0.9375rem;
            opacity: 0.9;
        }
        
        .features-list li::before {
            content: '✓';
            margin-right: 12px;
            font-weight: bold;
            font-size: 1.125rem;
        }
        
        /* Right Panel - Form Section */
        .form-panel {
            flex: 1;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-width: 500px;
        }
        
        .welcome-header {
            margin-bottom: 2rem;
        }
        
        .welcome-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }
        
        .welcome-subtitle {
            font-size: 0.9375rem;
            color: #6b7280;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 1.125rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.875rem 1rem 0.875rem 2.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            font-size: 0.9375rem;
            transition: all 0.2s;
            background: #f9fafb;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #c9a870;
            background: white;
            box-shadow: 0 0 0 4px rgba(201, 168, 112, 0.1);
        }
        
        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #9ca3af;
            font-size: 1.25rem;
            padding: 0.25rem;
            line-height: 1;
            transition: color 0.2s;
        }
        
        .password-toggle:hover {
            color: #6b7280;
        }
        
        .form-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }
        
        .remember-me {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #4b5563;
        }
        
        .remember-me input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }
        
        .forgot-password {
            color: #c9a870;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .forgot-password:hover {
            color: #b8976c;
        }
        
        .btn-login {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #c9a870 0%, #b8976c 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 14px rgba(201, 168, 112, 0.4);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(201, 168, 112, 0.5);
        }
        
        .btn-login:active {
            transform: translateY(0);
        }
        
        .copyright {
            margin-top: 2rem;
            text-align: center;
            font-size: 0.75rem;
            color: #9ca3af;
        }
        
        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
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
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .login-wrapper {
                flex-direction: column;
                max-width: 450px;
            }
            
            .brand-panel {
                padding: 2rem;
                min-height: 300px;
            }
            
            .brand-logo {
                width: 100px;
                height: 100px;
            }
            
            .brand-title {
                font-size: 1.75rem;
            }
            
            .brand-subtitle {
                font-size: 1rem;
                margin-bottom: 2rem;
            }
            
            .features-list {
                display: none;
            }
            
            .form-panel {
                padding: 2rem;
            }
            
            .welcome-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <!-- Left Panel - Brand Section -->
        <div class="brand-panel">
            <div class="brand-content">
                <div class="brand-logo">
                    <img src="../assets/images/blvd-login-logo.png" alt="BLVD Specialty Coffee Logo">
                </div>
                <h1 class="brand-title">BLVD Specialty Coffee</h1>
                <p class="brand-subtitle">Management System</p>
                
                <ul class="features-list">
                    <li>Event Management</li>
                    <li>Reservation System</li>
                    <li>Contact Management</li>
                    <li>Content Administration</li>
                </ul>
            </div>
        </div>
        
        <!-- Right Panel - Login Form -->
        <div class="form-panel">
            <div class="welcome-header">
                <h2 class="welcome-title">Welcome Back</h2>
                <p class="welcome-subtitle">Please enter your details to sign in.</p>
            </div>
            
            <?php 
            $error = Session::flash('error');
            if ($error): 
            ?>
                <div class="alert alert-error">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            
            <?php 
            $success = Session::flash('success');
            if ($success): 
            ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($success) ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="<?= BASE_PATH ?>/login">
                <input type="hidden" name="_csrf_token" value="<?= Session::csrf() ?>">
                
                <div class="form-group">
                    <label class="form-label" for="username">Username</label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
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
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-input" 
                            placeholder="Enter your password"
                            required
                        >
                        <button 
                            type="button" 
                            class="password-toggle" 
                            onclick="togglePassword()"
                            title="Show/Hide password"
                        >
                            👁️
                        </button>
                    </div>
                </div>
                
                <div class="form-footer">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                
                <button type="submit" class="btn-login">
                    Sign In
                </button>
            </form>
            
            <p class="copyright">
                © <?= date('Y') ?> BLVD Specialty Coffee. All rights reserved.
            </p>
        </div>
    </div>
    
    <script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const toggleButton = document.querySelector('.password-toggle');
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleButton.textContent = '🙈';
            toggleButton.title = 'Hide password';
        } else {
            passwordField.type = 'password';
            toggleButton.textContent = '👁️';
            toggleButton.title = 'Show password';
        }
    }
    </script>
</body>
</html>
