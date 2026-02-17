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
            <i data-lucide="x-circle"></i>
            <span><?= htmlspecialchars($errorMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
</div>
<?php endif; ?>

<!-- Page Header -->
<div class="card-header" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-lg); border-bottom: none; background: #c9a870; border-radius: var(--border-radius-xl); box-shadow: var(--shadow-sm);">
    <h1 class="header-title">Messages</h1>
</div>

<!-- Stats Cards -->
<div class="stat-row">
    <div class="stat-row-item stat-primary">
        <div class="stat-content">
            <h4>Total Messages</h4>
            <div class="value"><?= number_format($stats['total']) ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="mail"></i>
        </div>
    </div>
    
    <div class="stat-row-item stat-warning">
        <div class="stat-content">
            <h4>Unread</h4>
            <div class="value"><?= number_format($stats['unread']) ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="mail-open"></i>
        </div>
    </div>
    
    <div class="stat-row-item stat-success">
        <div class="stat-content">
            <h4>Replied</h4>
            <div class="value"><?= number_format($stats['replied']) ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="send"></i>
        </div>
    </div>
    
    <div class="stat-row-item stat-purple">
        <div class="stat-content">
            <h4>Today</h4>
            <div class="value"><?= number_format($stats['today']) ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="calendar"></i>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<div class="filter-bar">
    <form method="GET" action="<?= BASE_PATH ?>/messages" style="display: contents;">
        <div class="filter-group">
            <label>Status</label>
            <select name="status">
                <option value="">All Messages</option>
                <option value="unread" <?= ($filters['status'] ?? '') === 'unread' ? 'selected' : '' ?>>Unread</option>
                <option value="read" <?= ($filters['status'] ?? '') === 'read' ? 'selected' : '' ?>>Read</option>
                <option value="replied" <?= ($filters['status'] ?? '') === 'replied' ? 'selected' : '' ?>>Replied</option>
            </select>
        </div>
        
        <div class="filter-group">
            <label>From Date</label>
            <input type="date" name="date_from" value="<?= htmlspecialchars($filters['date_from'] ?? '') ?>">
        </div>
        
        <div class="filter-group">
            <label>To Date</label>
            <input type="date" name="date_to" value="<?= htmlspecialchars($filters['date_to'] ?? '') ?>">
        </div>
        
        <div class="filter-group search-input">
            <label>Search</label>
            <input type="text" name="search" placeholder="Name, email, subject..." value="<?= htmlspecialchars($filters['search'] ?? '') ?>">
        </div>

        <div class="filter-group" style="flex: 0;">
            <label>&nbsp;</label>
            <button type="submit" class="btn btn-primary">
                <i data-lucide="filter"></i>
                Filter
            </button>
        </div>
        
        <div class="filter-group" style="flex: 0;">
            <label>&nbsp;</label>
            <a href="<?= BASE_PATH ?>/messages" class="btn btn-secondary">
                <i data-lucide="x"></i>
                Clear
            </a>
        </div>
    </form>
</div>

<!-- Messages Table -->
<div class="card">
    <div class="card-body" style="padding: 0; overflow-x: auto;">
        <?php if (empty($messages)): ?>
            <div style="text-align: center; padding: 60px 20px; color: var(--color-gray-400);">
                <i data-lucide="inbox" style="width: 64px; height: 64px; margin: 0 auto 16px;"></i>
                <h3 style="font-size: var(--text-xl); color: var(--color-gray-600); margin-bottom: 8px;">No messages found</h3>
                <p style="color: var(--color-gray-500);">There are no messages matching your filters.</p>
            </div>
        <?php else: ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>DATE</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>SUBJECT</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($messages as $message): ?>
                        <tr class="<?= $message['is_read'] == 0 ? 'unread' : '' ?>">
                            <td>
                                <div style="color: var(--color-gray-600); font-size: 0.8125rem; white-space: nowrap;">
                                    <?= date('M j, Y', strtotime($message['created_at'])) ?><br>
                                    <span style="font-size: 0.75rem; color: #9ca3af;">
                                        <?= date('g:i A', strtotime($message['created_at'])) ?>
                                    </span>
                                </div>
                            </td>
                            <td><?= htmlspecialchars($message['name']) ?></td>
                            <td><?= htmlspecialchars($message['email']) ?></td>
                            <td><?= htmlspecialchars($message['subject'] ?? 'No subject') ?></td>
                            <td>
                                <?php if ($message['replied_at']): ?>
                                    <span class="badge badge-success">
                                        Replied
                                    </span>
                                <?php elseif ($message['is_read']): ?>
                                    <span class="badge badge-secondary" style="background: #f3f4f6; color: #6b7280;">
                                        Read
                                    </span>
                                <?php else: ?>
                                    <span class="badge badge-info" style="background: #dbeafe; color: #1e40af;">
                                        Unread
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="actions">
                                <a href="<?= BASE_PATH ?>/messages/<?= $message['id'] ?>" class="btn btn-sm btn-primary">
                                    <i data-lucide="eye" style="width: 14px; height: 14px;"></i>
                                    View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
</div>

<script>
// Initialize Lucide icons
setTimeout(() => {
    lucide.createIcons();
}, 100);

// Auto-hide flash messages after 5 seconds
setTimeout(() => {
    document.querySelectorAll('.flash-message').forEach(msg => {
        msg.style.opacity = '0';
        msg.style.transition = 'opacity 0.5s';
        setTimeout(() => msg.remove(), 500);
    });
}, 5000);
</script>
