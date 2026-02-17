<?php
// Ensure user is logged in
if (!isset($user) || !$user) {
    header('Location: /admin/login');
    exit;
}

// Get user initials for avatar
$initials = strtoupper(substr($user['username'], 0, 1));

// Format dates
$lastLogin = $user['last_login'] ? date('M d, Y g:i A', strtotime($user['last_login'])) : 'Never';
$createdAt = date('M d, Y', strtotime($user['created_at']));

// Role badge styling
$roleBadgeClass = match($user['role']) {
    'admin' => 'badge-error',
    'owner' => 'badge-warning',
    'manager' => 'badge-info',
    default => 'badge-info'
};
?>

<div class="admin-content">
    <!-- Flash Messages -->
    <?php if (Session::has('success')): ?>
        <div class="alert alert-success mb-4">
            <i data-lucide="check-circle"></i>
            <span><?= Session::get('success') ?></span>
        </div>
    <?php endif; ?>

    <?php if (Session::has('error')): ?>
        <div class="alert alert-error mb-4">
            <i data-lucide="alert-circle"></i>
            <span><?= Session::get('error') ?></span>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1" style="max-width: 900px;">
        <!-- Profile Information Card -->
        <div class="card mb-4">
            <div class="card-header">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <div class="user-avatar" style="width: 60px; height: 60px; font-size: 1.5rem;">
                        <?= $initials ?>
                    </div>
                    <div>
                        <h2 class="card-title mb-0">Profile Information</h2>
                        <p style="font-size: var(--text-sm); color: var(--color-gray-500); margin: 0;">
                            Update your account details
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= BASE_PATH ?>/settings/profile" id="profileForm">
                    <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
                    
                    <div class="grid grid-cols-2" style="gap: var(--spacing-lg);">
                        <div class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <input 
                                type="text" 
                                id="username" 
                                name="username" 
                                class="form-input" 
                                value="<?= htmlspecialchars($user['username']) ?>"
                                required
                            >
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Email Address</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                class="form-input" 
                                value="<?= htmlspecialchars($user['email']) ?>"
                                required
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-2" style="gap: var(--spacing-lg);">
                        <div class="form-group">
                            <label class="form-label">Role</label>
                            <div>
                                <span class="badge <?= $roleBadgeClass ?>" style="font-size: var(--text-sm);">
                                    <?= ucfirst($user['role']) ?>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Account Status</label>
                            <div>
                                <span class="badge <?= $user['is_active'] ? 'badge-success' : 'badge-error' ?>" style="font-size: var(--text-sm);">
                                    <?= $user['is_active'] ? 'Active' : 'Inactive' ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2" style="gap: var(--spacing-lg);">
                        <div class="form-group">
                            <label class="form-label">Last Login</label>
                            <p style="margin: 0; color: var(--color-gray-700); font-size: var(--text-sm);">
                                <?= $lastLogin ?>
                            </p>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Member Since</label>
                            <p style="margin: 0; color: var(--color-gray-700); font-size: var(--text-sm);">
                                <?= $createdAt ?>
                            </p>
                        </div>
                    </div>

                    <div style="margin-top: var(--spacing-lg); padding-top: var(--spacing-lg); border-top: 1px solid var(--color-gray-200);">
                        <button type="submit" class="btn btn-primary">
                            <i data-lucide="save"></i>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Change Password Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h2 class="card-title">Change Password</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= BASE_PATH ?>/settings/profile/password" id="passwordForm">
                    <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
                    
                    <div class="form-group">
                        <label class="form-label" for="current_password">Current Password</label>
                        <div style="position: relative;">
                            <input 
                                type="password" 
                                id="current_password" 
                                name="current_password" 
                                class="form-input"
                                required
                            >
                            <button 
                                type="button" 
                                class="password-toggle" 
                                onclick="togglePassword('current_password')"
                                style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--color-gray-500);"
                            >
                                <i data-lucide="eye" style="width: 18px; height: 18px;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="grid grid-cols-2" style="gap: var(--spacing-lg);">
                        <div class="form-group">
                            <label class="form-label" for="new_password">New Password</label>
                            <div style="position: relative;">
                                <input 
                                    type="password" 
                                    id="new_password" 
                                    name="new_password" 
                                    class="form-input"
                                    required
                                    oninput="checkPasswordStrength()"
                                >
                                <button 
                                    type="button" 
                                    class="password-toggle" 
                                    onclick="togglePassword('new_password')"
                                    style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--color-gray-500);"
                                >
                                    <i data-lucide="eye" style="width: 18px; height: 18px;"></i>
                                </button>
                            </div>
                            <!-- Password Strength Indicator -->
                            <div id="password-strength" style="margin-top: var(--spacing-xs); display: none;">
                                <div style="height: 4px; background: var(--color-gray-200); border-radius: 2px; overflow: hidden;">
                                    <div id="strength-bar" style="height: 100%; width: 0%; transition: all 0.3s ease;"></div>
                                </div>
                                <p id="strength-text" style="font-size: var(--text-xs); margin-top: var(--spacing-xs);"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="confirm_password">Confirm New Password</label>
                            <div style="position: relative;">
                                <input 
                                    type="password" 
                                    id="confirm_password" 
                                    name="confirm_password" 
                                    class="form-input"
                                    required
                                    oninput="checkPasswordMatch()"
                                >
                                <button 
                                    type="button" 
                                    class="password-toggle" 
                                    onclick="togglePassword('confirm_password')"
                                    style="position: absolute; right: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; color: var(--color-gray-500);"
                                >
                                    <i data-lucide="eye" style="width: 18px; height: 18px;"></i>
                                </button>
                            </div>
                            <p id="password-match" style="font-size: var(--text-xs); margin-top: var(--spacing-xs); display: none;"></p>
                        </div>
                    </div>

                    <!-- Password Requirements -->
                    <div style="background: var(--color-gray-50); padding: var(--spacing-md); border-radius: var(--border-radius-md); margin-top: var(--spacing-md);">
                        <p style="font-size: var(--text-xs); font-weight: 600; color: var(--color-gray-700); margin-bottom: var(--spacing-sm);">
                            Password Requirements:
                        </p>
                        <ul style="font-size: var(--text-xs); color: var(--color-gray-600); margin: 0; padding-left: 20px;">
                            <li>Minimum 8 characters long</li>
                            <li>At least one uppercase letter (recommended)</li>
                            <li>At least one number (recommended)</li>
                        </ul>
                    </div>

                    <div style="margin-top: var(--spacing-lg); padding-top: var(--spacing-lg); border-top: 1px solid var(--color-gray-200);">
                        <button type="submit" class="btn btn-primary">
                            <i data-lucide="key"></i>
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
/* Form Styles */
.form-group {
    margin-bottom: var(--spacing-lg);
}

.form-label {
    display: block;
    font-size: var(--text-sm);
    font-weight: 600;
    color: var(--color-gray-700);
    margin-bottom: var(--spacing-xs);
}

.form-input {
    width: 100%;
    padding: var(--spacing-sm) var(--spacing-md);
    border: 1px solid var(--color-gray-300);
    border-radius: var(--border-radius-md);
    font-size: var(--text-sm);
    transition: border-color var(--transition-base);
    font-family: var(--font-sans);
}

.form-input:focus {
    outline: none;
    border-color: var(--color-primary);
    box-shadow: 0 0 0 3px rgba(201, 168, 112, 0.1);
}

/* Alert Styles */
.alert {
    display: flex;
    align-items: center;
    gap: var(--spacing-md);
    padding: var(--spacing-md) var(--spacing-lg);
    border-radius: var(--border-radius-md);
    font-size: var(--text-sm);
    margin-bottom: var(--spacing-lg);
}

.alert-success {
    background: var(--color-success-bg);
    color: var(--color-success);
    border: 1px solid var(--color-success);
}

.alert-error {
    background: var(--color-error-bg);
    color: var(--color-error);
    border: 1px solid var(--color-error);
}

.alert i {
    width: 20px;
    height: 20px;
}

/* Responsive Grid */
@media (max-width: 768px) {
    .grid-cols-2 {
        grid-template-columns: 1fr !important;
    }
}
</style>

<script>
// Toggle password visibility
function togglePassword(fieldId) {
    const field = document.getElementById(fieldId);
    const button = field.nextElementSibling;
    
    if (field.type === 'password') {
        field.type = 'text';
        button.innerHTML = '<i data-lucide="eye-off" style="width: 18px; height: 18px;"></i>';
        button.title = 'Hide password';
    } else {
        field.type = 'password';
        button.innerHTML = '<i data-lucide="eye" style="width: 18px; height: 18px;"></i>';
        button.title = 'Show password';
    }
    
    // Reinitialize Lucide icons
    lucide.createIcons();
}

// Check password strength
function checkPasswordStrength() {
    const password = document.getElementById('new_password').value;
    const strengthBar = document.getElementById('strength-bar');
    const strengthText = document.getElementById('strength-text');
    const strengthContainer = document.getElementById('password-strength');
    
    if (password.length === 0) {
        strengthContainer.style.display = 'none';
        return;
    }
    
    strengthContainer.style.display = 'block';
    
    let strength = 0;
    let color = '';
    let text = '';
    
    // Length check
    if (password.length >= 8) strength += 25;
    if (password.length >= 12) strength += 25;
    
    // Character variety checks
    if (/[a-z]/.test(password)) strength += 10;
    if (/[A-Z]/.test(password)) strength += 15;
    if (/[0-9]/.test(password)) strength += 15;
    if (/[^a-zA-Z0-9]/.test(password)) strength += 10;
    
    // Determine color and text
    if (strength < 30) {
        color = 'var(--color-error)';
        text = 'Weak';
    } else if (strength < 60) {
        color = 'var(--color-warning)';
        text = 'Medium';
    } else {
        color = 'var(--color-success)';
        text = 'Strong';
    }
    
    strengthBar.style.width = strength + '%';
    strengthBar.style.background = color;
    strengthText.textContent = text;
    strengthText.style.color = color;
}

// Check password match
function checkPasswordMatch() {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const matchText = document.getElementById('password-match');
    
    if (confirmPassword.length === 0) {
        matchText.style.display = 'none';
        return;
    }
    
    matchText.style.display = 'block';
    
    if (newPassword === confirmPassword) {
        matchText.textContent = 'Passwords match ✓';
        matchText.style.color = 'var(--color-success)';
    } else {
        matchText.textContent = 'Passwords do not match';
        matchText.style.color = 'var(--color-error)';
    }
}

// Initialize Lucide icons when page loads
document.addEventListener('DOMContentLoaded', function() {
    lucide.createIcons();
});
</script>
