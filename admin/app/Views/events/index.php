<!-- Flash Messages -->
<?php
$successMessage = Session::has('success') ? Session::flash('success') : null;
$errorMessage = Session::has('error') ? Session::flash('error') : null;
$warningMessage = Session::has('warning') ? Session::flash('warning') : null;

if ($successMessage || $errorMessage || $warningMessage):
?>
<div class="flash-messages">
    <?php if ($successMessage): ?>
    <div class="flash-message flash-success">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="check-circle"></i>
            <span><?= htmlspecialchars($successMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
    <?php endif; ?>
    
    <?php if ($errorMessage): ?>
    <div class="flash-message flash-error">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="x-circle"></i>
            <span><?= htmlspecialchars($errorMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
    <?php endif; ?>
    
    <?php if ($warningMessage): ?>
    <div class="flash-message flash-warning">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="alert-triangle"></i>
            <span><?= htmlspecialchars($warningMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Page Header -->
<div class="card-header" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-lg); border-bottom: none; background: #c9a870; border-radius: var(--border-radius-xl); box-shadow: var(--shadow-sm);">
    <h1 class="header-title">Events</h1>
    <a href="<?= BASE_PATH ?>/events/create" class="btn btn-primary">
        <i data-lucide="plus"></i>
        Create Event
    </a>
</div>

<!-- Statistics Row -->
<div class="stat-row">
    <div class="stat-row-item stat-primary">
        <div class="stat-content">
            <h4>Upcoming</h4>
            <div class="value"><?= $stats['upcoming'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="calendar-days"></i>
        </div>
    </div>
    <div class="stat-row-item stat-warning">
        <div class="stat-content">
            <h4>Draft</h4>
            <div class="value"><?= $stats['draft'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="file-edit"></i>
        </div>
    </div>
    <div class="stat-row-item stat-success">
        <div class="stat-content">
            <h4>Published</h4>
            <div class="value"><?= $stats['published'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="check-circle-2"></i>
        </div>
    </div>
    <div class="stat-row-item stat-info">
        <div class="stat-content">
            <h4>Total</h4>
            <div class="value"><?= $stats['total'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="list"></i>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<div class="filter-bar">
    <form method="GET" action="<?= BASE_PATH ?>/events" style="display: contents;">
        <div class="filter-group">
            <label>Status</label>
            <select name="status" onchange="this.form.submit()">
                <option value="">All Statuses</option>
                <option value="draft" <?= isset($filters['status']) && $filters['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
                <option value="published" <?= isset($filters['status']) && $filters['status'] === 'published' ? 'selected' : '' ?>>Published</option>
                <option value="cancelled" <?= isset($filters['status']) && $filters['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>
        </div>
        
        <div class="filter-group">
            <label>Date From</label>
            <input type="date" name="date_from" value="<?= $filters['date_from'] ?? '' ?>">
        </div>
        
        <div class="filter-group">
            <label>Date To</label>
            <input type="date" name="date_to" value="<?= $filters['date_to'] ?? '' ?>">
        </div>
        
        <div class="filter-group search-input">
            <label>Search</label>
            <input type="text" name="search" placeholder="Event title..." value="<?= $filters['search'] ?? '' ?>">
        </div>
        
        <div class="filter-group" style="flex: 0;">
            <label>&nbsp;</label>
            <button type="submit" class="btn btn-primary">
                <i data-lucide="search"></i>
                Filter
            </button>
        </div>
        
        <?php if (!empty($filters)): ?>
        <div class="filter-group" style="flex: 0;">
            <label>&nbsp;</label>
            <a href="<?= BASE_PATH ?>/events" class="btn btn-secondary">
                <i data-lucide="x"></i>
                Clear
            </a>
        </div>
        <?php endif; ?>
    </form>
</div>

<!-- Events Table -->
<div class="card">
    <div class="card-body" style="padding: 0; overflow-x: auto;">
        <?php if (empty($events)): ?>
        <div style="text-align: center; padding: 60px 20px; color: var(--color-gray-400);">
            <i data-lucide="calendar-x" style="width: 64px; height: 64px; margin: 0 auto 16px;"></i>
            <h3 style="font-size: var(--text-xl); color: var(--color-gray-600); margin-bottom: 8px;">No Events Found</h3>
            <p style="color: var(--color-gray-500);">
                <?php if (!empty($filters)): ?>
                    Try adjusting your filters to see more results.
                <?php else: ?>
                    No events have been created yet.
                <?php endif; ?>
            </p>
            <a href="<?= BASE_PATH ?>/events/create" class="btn btn-primary" style="margin-top: 16px;">
                <i data-lucide="plus"></i>
                Create Event
            </a>
        </div>
        <?php else: ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                <tr>
                    <td>
                        <?php if ($event['image_url']): ?>
                        <img src="<?= BASE_PATH ?>/<?= htmlspecialchars($event['image_url']) ?>" 
                             alt="<?= htmlspecialchars($event['title']) ?>" 
                             style="width: 60px; height: 40px; object-fit: cover; border-radius: var(--border-radius-sm);">
                        <?php else: ?>
                        <div style="width: 60px; height: 40px; background: var(--color-gray-100); border-radius: var(--border-radius-sm); display: flex; align-items: center; justify-content: center;">
                            <i data-lucide="image" style="width: 20px; height: 20px; color: var(--color-gray-400);"></i>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="font-weight: 600; color: var(--color-gray-900); margin-bottom: 2px;">
                            <?= htmlspecialchars($event['title']) ?>
                        </div>
                        <div style="font-size: var(--text-sm); color: var(--color-gray-600);">
                            <?= mb_substr(htmlspecialchars($event['description']), 0, 60) ?><?= mb_strlen($event['description']) > 60 ? '...' : '' ?>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600; color: var(--color-gray-900); margin-bottom: 2px;">
                            <?= date('M d, Y', strtotime($event['event_date'])) ?>
                        </div>
                    </td>
                    <td>
                        <div style="font-size: var(--text-sm); color: var(--color-gray-600);">
                            <?= $event['event_time'] ? date('h:i A', strtotime($event['event_time'])) : '-' ?>
                        </div>
                    </td>
                    <td>
                        <?php
                        $statusClass = 'badge-info';
                        if ($event['status'] === 'published') {
                            $statusClass = 'badge-success';
                        } elseif ($event['status'] === 'cancelled') {
                            $statusClass = 'badge-error';
                        } elseif ($event['status'] === 'draft') {
                            $statusClass = 'badge-warning';
                        }
                        ?>
                        <span class="badge <?= $statusClass ?>">
                            <?= ucfirst($event['status']) ?>
                        </span>
                    </td>
                    <td class="actions">
                        <a href="<?= BASE_PATH ?>/events/<?= $event['id'] ?>/edit" class="btn btn-sm btn-secondary">
                            <i data-lucide="edit-2" style="width: 14px; height: 14px;"></i>
                            Edit
                        </a>
                        <form method="POST" action="<?= BASE_PATH ?>/events/<?= $event['id'] ?>/delete" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this event?');">
                            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i data-lucide="trash-2" style="width: 14px; height: 14px;"></i>
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<!-- Pagination -->
<?php if ($pages > 1 && !empty($events)): ?>
<div class="pagination">
    <?php if ($currentPage > 1): ?>
    <a href="?page=1&<?= $queryString ?>">
        <i data-lucide="chevrons-left" style="width: 16px; height: 16px;"></i>
    </a>
    <a href="?page=<?= $currentPage - 1 ?>&<?= $queryString ?>">
        <i data-lucide="chevron-left" style="width: 16px; height: 16px;"></i>
    </a>
    <?php else: ?>
    <span class="disabled">
        <i data-lucide="chevrons-left" style="width: 16px; height: 16px;"></i>
    </span>
    <span class="disabled">
        <i data-lucide="chevron-left" style="width: 16px; height: 16px;"></i>
    </span>
    <?php endif; ?>
    
    <?php
    // Show page numbers
    $start = max(1, $currentPage - 2);
    $end = min($pages, $currentPage + 2);
    
    for ($i = $start; $i <= $end; $i++):
    ?>
    <?php if ($i == $currentPage): ?>
    <span class="active"><?= $i ?></span>
    <?php else: ?>
    <a href="?page=<?= $i ?>&<?= $queryString ?>"><?= $i ?></a>
    <?php endif; ?>
    <?php endfor; ?>
    
    <?php if ($currentPage < $pages): ?>
    <a href="?page=<?= $currentPage + 1 ?>&<?= $queryString ?>">
        <i data-lucide="chevron-right" style="width: 16px; height: 16px;"></i>
    </a>
    <a href="?page=<?= $pages ?>&<?= $queryString ?>">
        <i data-lucide="chevrons-right" style="width: 16px; height: 16px;"></i>
    </a>
    <?php else: ?>
    <span class="disabled">
        <i data-lucide="chevron-right" style="width: 16px; height: 16px;"></i>
    </span>
    <span class="disabled">
        <i data-lucide="chevrons-right" style="width: 16px; height: 16px;"></i>
    </span>
    <?php endif; ?>
</div>

<div style="text-align: center; color: var(--color-gray-500); font-size: var(--text-sm); margin-top: var(--spacing-md);">
    Showing <?= min(($currentPage - 1) * $perPage + 1, $total) ?> to <?= min($currentPage * $perPage, $total) ?> of <?= $total ?> events
</div>
<?php endif; ?>

<script>
    // Initialize Lucide icons
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
    
    // Auto-dismiss flash messages after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessages = document.querySelectorAll('.flash-message');
        flashMessages.forEach(function(message) {
            setTimeout(function() {
                message.style.transition = 'opacity 0.3s ease-out';
                message.style.opacity = '0';
                setTimeout(function() {
                    message.remove();
                }, 300);
            }, 5000);
        });
    });
</script>

