<!-- Flash Messages -->
<?php
$successMessage = Session::flash('success');
$errorMessage = Session::flash('error');

if ($successMessage):
?>
<div class="flash-messages">
    <div class="flash-message flash-success">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="check-circle"></i>
            <span><?= htmlspecialchars($successMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
</div>
<?php endif; ?>

<?php if ($errorMessage): ?>
<div class="flash-messages">
    <div class="flash-message flash-error">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="alert-circle"></i>
            <span><?= htmlspecialchars($errorMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
</div>
<?php endif; ?>

<!-- Users Header -->
<div class="card-header" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-lg); border-bottom: none; background: #c9a870; border-radius: var(--border-radius-xl); box-shadow: var(--shadow-sm);">
    <h1 class="header-title">Users</h1>
    <a href="<?= BASE_PATH ?>/users/create" class="btn btn-primary" style="background: #3e2b22; border-color: #3e2b22;">
        <i data-lucide="plus"></i>
        Add New User
    </a>
</div>

<!-- Stats Indicators -->
<div class="stat-row">
    <div class="stat-row-item stat-primary">
        <div class="stat-content">
            <h4>Total Users</h4>
            <div class="value"><?= $stats['total'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="users"></i>
        </div>
    </div>
    <div class="stat-row-item stat-success">
        <div class="stat-content">
            <h4>Active Users</h4>
            <div class="value"><?= $stats['active'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="user-check"></i>
        </div>
    </div>
    <div class="stat-row-item stat-purple">
        <div class="stat-content">
            <h4>Administrators</h4>
            <div class="value"><?= $stats['admin'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="shield"></i>
        </div>
    </div>
    <div class="stat-row-item stat-warning">
        <div class="stat-content">
            <h4>Managers</h4>
            <div class="value"><?= $stats['manager'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="briefcase"></i>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<div class="filter-bar">
    <form action="<?= BASE_PATH ?>/users" method="GET" style="display: contents;">
        <div class="filter-group">
            <i data-lucide="search" class="filter-icon"></i>
            <input type="text" name="search" class="filter-input" placeholder="Search users..." value="<?= htmlspecialchars($filters['search']) ?>">
        </div>
        
        <div class="filter-group">
            <i data-lucide="shield" class="filter-icon"></i>
            <select name="role" class="filter-select">
                <option value="">All Roles</option>
                <option value="admin" <?= $filters['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="owner" <?= $filters['role'] === 'owner' ? 'selected' : '' ?>>Owner</option>
                <option value="manager" <?= $filters['role'] === 'manager' ? 'selected' : '' ?>>Manager</option>
            </select>
        </div>
        
        <div class="filter-group">
            <i data-lucide="activity" class="filter-icon"></i>
            <select name="status" class="filter-select">
                <option value="">All Status</option>
                <option value="1" <?= $filters['status'] === '1' ? 'selected' : '' ?>>Active</option>
                <option value="0" <?= $filters['status'] === '0' ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>
        
        <div class="filter-actions">
            <button type="submit" class="btn btn-primary">Filter</button>
            <?php if (!empty($filters['search']) || !empty($filters['role']) || $filters['status'] !== ''): ?>
                <a href="<?= BASE_PATH ?>/users" class="btn btn-secondary">Clear</a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- Users Table -->
<div class="card">
    <div class="card-body" style="padding: 0; overflow-x: auto;">
        <?php if (empty($users)): ?>
            <div style="text-align: center; padding: 60px 20px; color: var(--color-gray-400);">
                <i data-lucide="users" style="width: 64px; height: 64px; margin: 0 auto 16px;"></i>
                <h3 style="font-size: var(--text-xl); color: var(--color-gray-600); margin-bottom: 8px;">No users found</h3>
                <p style="color: var(--color-gray-500);">Try adjusting your search or filters.</p>
            </div>
        <?php else: ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>USERNAME</th>
                        <th>EMAIL</th>
                        <th>ROLE</th>
                        <th>STATUS</th>
                        <th>LAST LOGIN</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td style="font-weight: 500; color: var(--color-gray-800);">
                                <?= htmlspecialchars($user['username']) ?>
                            </td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                            <td>
                                <?php
                                $roleClass = match($user['role']) {
                                    'admin', 'owner' => 'badge-purple',
                                    'manager' => 'badge-info',
                                    default => 'badge-secondary'
                                };
                                ?>
                                <span class="badge <?= $roleClass ?>">
                                    <?= ucfirst($user['role']) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($user['is_active']): ?>
                                    <span class="badge badge-success">Active</span>
                                <?php else: ?>
                                    <span class="badge badge-error">Inactive</span>
                                <?php endif; ?>
                            </td>
                            <td style="color: var(--color-gray-500); font-size: 0.875rem;">
                                <?= $user['last_login'] ? date('M d, Y h:i A', strtotime($user['last_login'])) : 'Never' ?>
                            </td>
                            <td class="actions">
                                <a href="<?= BASE_PATH ?>/users/<?= $user['id'] ?>/edit" class="btn btn-sm btn-secondary">
                                    <i data-lucide="edit-2" style="width: 14px; height: 14px;"></i>
                                    Edit
                                </a>
                                <?php if ($user['id'] != Auth::id()): ?>
                                    <form action="<?= BASE_PATH ?>/users/<?= $user['id'] ?>/delete" method="POST" onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');" style="display: inline;">
                                        <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>
                                            Delete
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<script>
// Initialize Lucide icons
setTimeout(() => {
    lucide.createIcons();
}, 100);
</script>
