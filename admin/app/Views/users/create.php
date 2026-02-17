<div class="card-header">
    <div class="header-content">
        <h1 class="header-title">Create User</h1>
        <p class="header-subtitle">Add a new system administrator or staff member.</p>
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
        <form action="<?= BASE_PATH ?>/users" method="POST">
            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
            
            <div class="form-grid">
                <!-- Username -->
                <div class="form-group">
                    <label for="username" class="form-label">Username <span class="required">*</span></label>
                    <input type="text" id="username" name="username" class="form-input" required>
                    <small class="form-text">Unique username for login</small>
                </div>
                
                <!-- Email -->
                <div class="form-group">
                    <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>
                
                <!-- Password -->
                <div class="form-group">
                    <label for="password" class="form-label">Password <span class="required">*</span></label>
                    <input type="password" id="password" name="password" class="form-input" required>
                    <small class="form-text">Minimum 8 characters recommended</small>
                </div>
                
                <!-- Role -->
                <div class="form-group">
                    <label for="role" class="form-label">Role <span class="required">*</span></label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="manager">Manager</option>
                        <option value="admin">Admin</option>
                        <option value="owner">Owner</option>
                    </select>
                </div>
                
                <!-- Status -->
                <div class="form-group checkbox-group" style="display: flex; align-items: center; gap: 10px; padding-top: 30px;">
                    <input type="checkbox" id="is_active" name="is_active" value="1" checked style="width: 20px; height: 20px;">
                    <label for="is_active" style="margin: 0; font-weight: 500;">Active User</label>
                </div>
            </div>
            
            <div class="form-actions" style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--color-gray-200); display: flex; justify-content: flex-end; gap: 10px;">
                <a href="<?= BASE_PATH ?>/users" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="check"></i>
                    Create User
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
