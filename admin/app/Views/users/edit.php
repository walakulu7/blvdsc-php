<style>
/* ==========================================================================
   User Edit Form Styles (matching Create User)
   ========================================================================== */

/* Page Container - Centered layout with max width */
.user-edit-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Page Header */
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

/* Form Card */
.user-form-card {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 32px;
}

/* Section Headers */
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

/* Form Fields */
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

/* Input Fields */
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

/* Limited width inputs */
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

/* Form Grid */
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

<div class="user-edit-container">
    <!-- Page Header -->
    <div class="user-page-header">
        <div class="user-page-header-left">
            <a href="<?= BASE_PATH ?>/users" class="user-back-link">
                <i data-lucide="arrow-left"></i>
                Back
            </a>
            <h1 class="user-page-title">Edit User</h1>
        </div>
        
        <div class="user-page-header-right">
            <button type="submit" form="editUserForm" class="user-btn user-btn-primary">
                <i data-lucide="save"></i>
                Update User
            </button>
        </div>
    </div>

    <!-- Edit User Form -->
    <div class="user-form-card">
        <form method="POST" action="<?= BASE_PATH ?>/users/<?= $user['id'] ?>" id="editUserForm">
            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
            
            <!-- Account Information -->
            <div class="user-section">
                <h3 class="user-section-title">Account Information</h3>
                
                <div class="user-form-row">
                    <div class="user-form-field">
                        <label for="username" class="user-form-label">
                            Username <span class="required">*</span>
                        </label>
                        <input type="text" id="username" name="username" class="user-form-input" 
                               value="<?= htmlspecialchars($user['username']) ?>" required>
                    </div>
                    
                    <div class="user-form-field">
                        <label for="email" class="user-form-label">
                            Email Address <span class="required">*</span>
                        </label>
                        <input type="email" id="email" name="email" class="user-form-input" 
                               value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>
                </div>
            </div>
            
            <!-- Security & Access -->
            <div class="user-section">
                <h3 class="user-section-title">Security & Access</h3>
                
                <div class="user-form-row">
                    <div class="user-form-field">
                        <label for="role" class="user-form-label">
                            Role <span class="required">*</span>
                        </label>
                        <select id="role" name="role" class="user-form-select user-form-select-limited" required>
                            <option value="manager" <?= $user['role'] === 'manager' ? 'selected' : '' ?>>Manager</option>
                            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="owner" <?= $user['role'] === 'owner' ? 'selected' : '' ?>>Owner</option>
                        </select>
                        <p class="user-help-text">Determines system permissions</p>
                    </div>
                    
                    <div class="user-form-field">
                        <label for="status" class="user-form-label">
                            Status <span class="required">*</span>
                        </label>
                        <select id="status" name="is_active" class="user-form-select user-form-select-limited">
                            <option value="1" <?= $user['is_active'] ? 'selected' : '' ?>>Active</option>
                            <option value="0" <?= !$user['is_active'] ? 'selected' : '' ?>>Inactive</option>
                        </select>
                        <p class="user-help-text">Inactive users cannot login</p>
                    </div>
                </div>
                
                <div class="user-form-field" style="margin-top: 20px; padding-top: 20px; border-top: 1px dashed #e5e7eb;">
                    <label for="password" class="user-form-label">
                        Change Password
                    </label>
                    <input type="password" id="password" name="password" class="user-form-input user-form-input-limited" autocomplete="new-password">
                    <p class="user-help-text">
                        <i data-lucide="info" style="width: 14px; height: 14px; vertical-align: middle;"></i>
                        Leave blank to keep the current password
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Initialize Lucide icons
setTimeout(() => {
    lucide.createIcons();
}, 100);
</script>
