<div class="card-header">
    <div class="header-content">
        <h1 class="header-title">Edit User</h1>
        <p class="header-subtitle">Update user details and permissions.</p>
    </div>
    <div class="header-actions">
        <a href="<?= BASE_PATH ?>/users" class="btn btn-secondary">
            <i data-lucide="arrow-left"></i>
            Back to Users
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="<?= BASE_PATH ?>/users/<?= $user['id'] ?>" method="POST">
            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
            
            <div class="form-grid">
                <!-- Username -->
                <div class="form-group">
                    <label for="username" class="form-label">Username <span class="required">*</span></label>
                    <input type="text" id="username" name="username" class="form-input" value="<?= htmlspecialchars($user['username']) ?>" required>
                </div>
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                    <input type="email" id="email" name="email" class="form-input" value="<?= htmlspecialchars($user['email']) ?>" required>
                </div>
                
                <!-- Role -->
                <div class="form-group">
                    <label for="role" class="form-label">Role <span class="required">*</span></label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="manager" <?= $user['role'] === 'manager' ? 'selected' : '' ?>>Manager</option>
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="owner" <?= $user['role'] === 'owner' ? 'selected' : '' ?>>Owner</option>
                    </select>
                </div>
                
                <!-- Status -->
                <div class="form-group checkbox-group" style="display: flex; align-items: center; gap: 10px; padding-top: 30px;">
                    <input type="checkbox" id="is_active" name="is_active" value="1" <?= $user['is_active'] ? 'checked' : '' ?> style="width: 20px; height: 20px;">
                    <label for="is_active" style="margin: 0; font-weight: 500;">Active User</label>
                </div>

                <!-- Password (Optional) -->
                <div class="form-group" style="grid-column: 1 / -1; margin-top: 10px; padding-top: 20px; border-top: 1px dashed var(--color-gray-200);">
                    <label for="password" class="form-label">Change Password <span style="font-weight: normal; color: var(--color-gray-500);">(Leave blank to keep current)</span></label>
                    <input type="password" id="password" name="password" class="form-input" autocomplete="new-password">
                    <small class="form-text">Enter a new password only if you want to change it.</small>
                </div>
            </div>
            
            <div class="form-actions" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--color-gray-200); display: flex; justify-content: flex-end; gap: 10px;">
                <a href="<?= BASE_PATH ?>/users" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="save"></i>
                    Update User
                </button>
            </div>
        </form>
    </div>
</div>

<style>
.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}
.required {
    color: #ef4444;
}
</style>

<script>
// Initialize Lucide icons
setTimeout(() => {
    lucide.createIcons();
}, 100);
</script>
