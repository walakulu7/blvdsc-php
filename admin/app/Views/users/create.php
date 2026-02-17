<style>
/* ==========================================================================
   User Create Form Styles (matching Event Create)
   ========================================================================== */

/* Page Container - Centered layout with max width */
.user-create-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Page Header - Back button and action buttons */
.user-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px 0;
    margin-bottom: 24px;
}

.user-page-header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.user-page-header-right {
    display: flex;
    gap: 12px;
}

/* Form Card - White background with shadow */
.user-form-card {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 32px;
}

/* Section Headers - Visual separation */
.user-section {
    margin-bottom: 32px;
}

.user-section:last-child {
    margin-bottom: 0;
}

.user-section-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 20px 0;
}

/* Form Fields - Proper spacing and widths */
.user-form-field {
    margin-bottom: 20px;
}

.user-form-field:last-child {
    margin-bottom: 0;
}

.user-form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 6px;
}

.user-form-label .required {
    color: #dc2626;
}

/* Input Fields - Consistent styling with focus states */
.user-form-input,
.user-form-select {
    width: 100%;
    max-width: 100%;
    padding: 10px 12px;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #1f2937;
    background-color: #ffffff;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.user-form-input:focus,
.user-form-select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Limited width for standard inputs */
.user-form-input-limited {
    max-width: 400px;
}

.user-form-select-limited {
    max-width: 300px;
}

/* Help Text */
.user-help-text {
    font-size: 0.8125rem;
    color: #6b7280;
    margin-top: 6px;
    line-height: 1.4;
}

/* Form Grid Layout */
.user-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

/* Responsive */
@media (max-width: 640px) {
    .user-form-row {
        grid-template-columns: 1fr;
    }
    
    .user-page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
    
    .user-page-header-right {
        width: 100%;
    }
    
    .user-form-card {
        padding: 20px;
    }
}

/* Buttons */
.user-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    font-size: 0.875rem;
    font-weight: 500;
    line-height: 1.5;
    text-decoration: none;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.15s ease-in-out;
}

.user-btn-primary {
    color: #ffffff;
    background-color: #6B5744;
}

.user-btn-primary:hover {
    background-color: #4a3728;
}

.user-back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    font-size: 0.875rem;
    color: #374151;
    text-decoration: none;
    background-color: #f9fafb;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    transition: background-color 0.15s ease-in-out;
}

.user-back-link:hover {
    background-color: #f3f4f6;
}

.user-page-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #111827;
    margin: 0;
}

.user-back-link i, .user-btn i {
    width: 16px;
    height: 16px;
}

/* Password Toggle */
.password-wrapper {
    position: relative;
    max-width: 400px; /* Match the limited input width */
}

.password-toggle-btn {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: #9ca3af;
    padding: 4px;
    line-height: 1;
    transition: color 0.2s;
}

.password-toggle-btn:hover {
    color: #6b7280;
}

.password-toggle-btn i {
    width: 18px;
    height: 18px;
}
</style>

<!-- Flash Messages -->
<?php
$errorMessage = Session::flash('error');

if ($errorMessage):
?>
<div class="flash-messages">
    <div class="flash-message flash-error">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="x-circle"></i>
            <span><?= htmlspecialchars($errorMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
</div>
<?php endif; ?>

<div class="user-create-container">
    <!-- Page Header -->
    <div class="user-page-header">
        <div class="user-page-header-left">
            <a href="<?= BASE_PATH ?>/users" class="user-back-link">
                <i data-lucide="arrow-left"></i>
                Back
            </a>
            <h1 class="user-page-title">Create User</h1>
        </div>
        
        <div class="user-page-header-right">
            <button type="submit" form="userForm" class="user-btn user-btn-primary">
                <i data-lucide="save"></i>
                Create User
            </button>
        </div>
    </div>

    <!-- Create User Form -->
    <div class="user-form-card">
        <form method="POST" action="<?= BASE_PATH ?>/users" id="userForm">
            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
            
            <!-- Account Information -->
            <div class="user-section">
                <h3 class="user-section-title">Account Information</h3>
                
                <div class="user-form-row">
                    <div class="user-form-field">
                        <label for="username" class="user-form-label">
                            Username <span class="required">*</span>
                        </label>
                        <input type="text" id="username" name="username" class="user-form-input" required>
                        <p class="user-help-text">Unique username for login</p>
                    </div>
                    
                    <div class="user-form-field">
                        <label for="email" class="user-form-label">
                            Email Address <span class="required">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="user-form-input" required>
                    </div>
                </div>
            </div>
            
            <!-- Security & Access -->
            <div class="user-section">
                <h3 class="user-section-title">Security & Access</h3>
                
                <div class="user-form-field">
                    <label for="password" class="user-form-label">
                        Password <span class="required">*</span>
                    </label>
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" class="user-form-input user-form-input-limited" required>
                        <button type="button" class="password-toggle-btn" onclick="toggleCreatePassword()" title="Show/Hide password">
                            <i data-lucide="eye"></i>
                        </button>
                    </div>
                    <p class="user-help-text">Minimum 8 characters recommended</p>
                </div>
                
                <div class="user-form-row">
                    <div class="user-form-field">
                        <label for="role" class="user-form-label">
                            Role <span class="required">*</span>
                        </label>
                        <select id="role" name="role" class="user-form-select user-form-select-limited" required>
                            <option value="manager">Manager</option>
                            <option value="admin">Admin</option>
                            <option value="owner">Owner</option>
                        </select>
                        <p class="user-help-text">Determines system permissions</p>
                    </div>
                    
                    <div class="user-form-field">
                        <label for="status" class="user-form-label">
                            Status <span class="required">*</span>
                        </label>
                        <select id="status" name="is_active" class="user-form-select user-form-select-limited">
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        <p class="user-help-text">Inactive users cannot login</p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Toggle password visibility
function toggleCreatePassword() {
    const passwordField = document.getElementById('password');
    const toggleBtn = document.querySelector('.password-toggle-btn');
    
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        toggleBtn.innerHTML = '<i data-lucide="eye-off"></i>';
        toggleBtn.title = 'Hide password';
    } else {
        passwordField.type = 'password';
        toggleBtn.innerHTML = '<i data-lucide="eye"></i>';
        toggleBtn.title = 'Show password';
    }
    
    // Reinitialize Lucide icons
    lucide.createIcons();
}

// Initialize Lucide icons
setTimeout(() => {
    lucide.createIcons();
}, 100);
</script>
