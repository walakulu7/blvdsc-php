

<!-- Page Header -->
<div class="card-header" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-lg); border-bottom: none; background: #c9a870; border-radius: var(--border-radius-xl); box-shadow: var(--shadow-sm);">
    <h1 class="header-title" style="color: white; font-size: var(--text-xl);">Backup & Restore</h1>
    <div class="page-actions" style="display: flex; gap: var(--spacing-md);">
        <button type="button" class="btn btn-secondary" onclick="document.getElementById('uploadModal').classList.add('active')" style="background: rgba(255,255,255,0.2); color: white; border: none;">
            <i data-lucide="upload"></i>
            Upload Backup
        </button>
        <form action="<?= BASE_PATH ?>/backups/create" method="POST" style="display: inline;">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <button type="submit" class="btn btn-primary" style="background: #3e2b22; border-color: #3e2b22;">
                <i data-lucide="database"></i>
                Generate Backup
            </button>
        </form>
    </div>
</div>

<div class="grid" style="grid-template-columns: 2fr 1fr;">
    <!-- Backups List -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Backup History</h3>
        </div>
        <div class="card-body" style="padding: 0; overflow-x: auto;">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Filename</th>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($backups)): ?>
                        <tr>
                            <td colspan="5" style="text-align: center; padding: 60px 20px; color: var(--color-gray-400);">
                                <i data-lucide="database" style="width: 48px; height: 48px; margin: 0 auto 16px; opacity: 0.5;"></i>
                                <p>No backups found.</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($backups as $backup): ?>
                            <tr>
                                <td style="font-family: var(--font-mono); font-size: 0.875rem; color: var(--color-gray-800);">
                                    <?php
                                    // Clean up filename display for uploads
                                    $displayName = preg_replace('/^upload_\d{4}-\d{2}-\d{2}_\d{6}_/', '', $backup['filename']);
                                    echo htmlspecialchars($displayName);
                                    ?>
                                </td>
                                <td><?= date('M d, Y H:i', strtotime($backup['created_at'])) ?></td>
                                <td>
                                    <?php
                                    $badgeClass = match($backup['type']) {
                                        'auto' => 'badge-info',
                                        'manual' => 'badge-success',
                                        default => 'badge-warning'
                                    };
                                    ?>
                                    <span class="badge <?= $badgeClass ?>">
                                        <?= ucfirst($backup['type']) ?>
                                    </span>
                                </td>
                                <td><?= $backup['formatted_size'] ?></td>
                                <td class="actions">
                                    <a href="<?= BASE_PATH ?>/backups/download/<?= $backup['id'] ?>" class="btn btn-sm btn-secondary" title="Download">
                                        <i data-lucide="download" style="width: 14px; height: 14px;"></i>
                                    </a>
                                    <?php if (Auth::isAdmin()): ?>
                                    <button type="button" class="btn btn-sm btn-warning" onclick="confirmRestore(<?= $backup['id'] ?>, '<?= htmlspecialchars($backup['created_at']) ?>')" title="Restore" style="color: white;">
                                        <i data-lucide="rotate-ccw" style="width: 14px; height: 14px;"></i>
                                    </button>
                                    <form action="<?= BASE_PATH ?>/backups/delete/<?= $backup['id'] ?>" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this backup?');">
                                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                            <i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Backup Settings -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Backup Settings</h3>
        </div>
        <div class="card-body">
            <form action="<?= BASE_PATH ?>/backups/settings" method="POST">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                
                <div class="form-group">
                    <label class="form-label">Auto Backup</label>
                    <label class="toggle-switch">
                        <input type="checkbox" name="backup_enabled" <?= ($settings['backup_enabled'] ?? '0') === '1' ? 'checked' : '' ?>>
                        <span class="toggle-slider"></span>
                        <span class="toggle-label">Enable automated backups</span>
                    </label>
                </div>

                <div class="form-group">
                    <label class="form-label" for="frequency">Frequency</label>
                    <select name="backup_frequency" id="frequency" class="form-select">
                        <option value="daily" <?= ($settings['backup_frequency'] ?? 'daily') === 'daily' ? 'selected' : '' ?>>Daily</option>
                        <option value="weekly" <?= ($settings['backup_frequency'] ?? 'weekly') === 'weekly' ? 'selected' : '' ?>>Weekly</option>
                        <option value="monthly" <?= ($settings['backup_frequency'] ?? 'monthly') === 'monthly' ? 'selected' : '' ?>>Monthly</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="retention">Retention (Files to keep)</label>
                    <input type="number" name="backup_retention" id="retention" class="form-input" value="<?= $settings['backup_retention'] ?? '7' ?>" min="1" max="30">
                </div>

                <hr style="border: 0; border-top: 1px solid var(--color-gray-200); margin: 1.5rem 0;">

                <div class="form-group">
                    <label class="form-label">Cloud Backup</label>
                    <label class="toggle-switch">
                        <input type="checkbox" name="backup_cloud_enabled" <?= ($settings['backup_cloud_enabled'] ?? '0') === '1' ? 'checked' : '' ?>>
                        <span class="toggle-slider"></span>
                        <span class="toggle-label">Sync to Google Drive</span>
                    </label>
                    <p class="form-hint">Requires Google Drive API configuration.</p>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Save Settings</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Upload Modal -->
<div id="uploadModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3>Upload Backup File</h3>
            <button class="modal-close" onclick="document.getElementById('uploadModal').classList.remove('active')">&times;</button>
        </div>
        <div class="modal-body">
            <form action="<?= BASE_PATH ?>/backups/upload" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="form-group">
                    <label class="form-label">Select .sql File</label>
                    <input type="file" name="backup_file" class="form-input" accept=".sql" required>
                </div>
                <div class="form-actions" style="justify-content: flex-end; margin-top: 1rem;">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('uploadModal').classList.remove('active')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Restore Confirmation Modal -->
<div id="restoreModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="text-error">⚠️ Database Restore</h3>
            <button class="modal-close" onclick="document.getElementById('restoreModal').classList.remove('active')">&times;</button>
        </div>
        <div class="modal-body">
            <p><strong>Warning!</strong> You are about to restore the database to the state of:</p>
            <p id="restoreDate" style="font-weight: bold; font-family: var(--font-mono); font-size: 1.1rem; text-align: center; margin: 1rem 0;"></p>
            <p class="text-error">This action will overwrite all current data. This process cannot be undone.</p>
            
            <form id="restoreForm" action="" method="POST" style="margin-top: 1.5rem;">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
                <div class="form-actions" style="justify-content: flex-end;">
                    <button type="button" class="btn btn-secondary" onclick="document.getElementById('restoreModal').classList.remove('active')">Cancel</button>
                    <button type="submit" class="btn btn-danger">Confirm Restore</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Initialize Lucide icons if not auto-initialized
if (typeof lucide !== 'undefined') {
    lucide.createIcons();
}

function confirmRestore(id, date) {
    document.getElementById('restoreDate').textContent = date;
    document.getElementById('restoreForm').action = '<?= BASE_PATH ?>/backups/restore/' + id;
    document.getElementById('restoreModal').classList.add('active');
}
</script>
