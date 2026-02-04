<!-- Flash Messages -->
<?php
$successMessage = Session::flash('success');
$errorMessage = Session::flash('error');
$warningMessage = Session::flash('warning');

if ($successMessage || $errorMessage || $warningMessage):
?>
<div class="flash-messages">
    <?php if ($successMessage): ?>
    <div class="flash-message flash-success">
        <i data-lucide="check-circle"></i>
        <?= htmlspecialchars($successMessage) ?>
    </div>
    <?php endif; ?>
    
    <?php if ($errorMessage): ?>
    <div class="flash-message flash-error">
        <i data-lucide="x-circle"></i>
        <?= htmlspecialchars($errorMessage) ?>
    </div>
    <?php endif; ?>
    
    <?php if ($warningMessage): ?>
    <div class="flash-message flash-warning">
        <i data-lucide="alert-triangle"></i>
        <?= htmlspecialchars($warningMessage) ?>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Page Header -->
<div class="card-header" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-lg); border-bottom: none; background: #c9a870; border-radius: var(--border-radius-xl); box-shadow: var(--shadow-sm);">
    <h1 class="header-title">High Tea Bookings</h1>
    <a href="<?= BASE_PATH ?>/hightea/export/csv?<?= $queryString ?>" class="btn btn-primary">
        <i data-lucide="download"></i>
        Export CSV
    </a>
</div>

<!-- Statistics Row -->
<div class="stat-row">
    <div class="stat-row-item stat-info">
        <div class="stat-content">
            <h4>Today</h4>
            <div class="value"><?= $stats['today'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="calendar-clock"></i>
        </div>
    </div>
    <div class="stat-row-item stat-warning">
        <div class="stat-content">
            <h4>Pending</h4>
            <div class="value"><?= $stats['pending'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="clock"></i>
        </div>
    </div>
    <div class="stat-row-item stat-success">
        <div class="stat-content">
            <h4>Confirmed</h4>
            <div class="value"><?= $stats['confirmed'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="check-circle"></i>
        </div>
    </div>
    <div class="stat-row-item stat-primary">
        <div class="stat-content">
            <h4>Total</h4>
            <div class="value"><?= $stats['total'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="cup-soda"></i>
        </div>
    </div>
</div>

<!-- Filter Bar -->
<div class="filter-bar">
    <form method="GET" action="<?= BASE_PATH ?>/hightea" style="display: contents;">
        <div class="filter-group">
            <label>Status</label>
            <select name="status" onchange="this.form.submit()">
                <option value="">All Status</option>
                <option value="pending" <?= isset($filters['status']) && $filters['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="confirmed" <?= isset($filters['status']) && $filters['status'] === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                <option value="completed" <?= isset($filters['status']) && $filters['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                <option value="cancelled" <?= isset($filters['status']) && $filters['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
            </select>
        </div>
        
        <div class="filter-group">
            <label>Package</label>
            <select name="package_type" onchange="this.form.submit()">
                <option value="">All Packages</option>
                <option value="classic" <?= isset($filters['package_type']) && $filters['package_type'] === 'classic' ? 'selected' : '' ?>>Classic</option>
                <option value="premium" <?= isset($filters['package_type']) && $filters['package_type'] === 'premium' ? 'selected' : '' ?>>Premium</option>
                <option value="deluxe" <?= isset($filters['package_type']) && $filters['package_type'] === 'deluxe' ? 'selected' : '' ?>>Deluxe</option>
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
            <input type="text" name="search" placeholder="Name, email, or phone..." value="<?= $filters['search'] ?? '' ?>">
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
            <a href="<?= BASE_PATH ?>/hightea" class="btn btn-secondary">
                <i data-lucide="x"></i>
                Clear
            </a>
        </div>
        <?php endif; ?>
    </form>
</div>

<!-- Bookings Table -->
<div class="card">
    <div class="card-body" style="padding: 0; overflow-x: auto;">
        <?php if (empty($bookings)): ?>
        <div style="text-align: center; padding: 60px 20px; color: var(--color-gray-400);">
            <i data-lucide="cup-soda" style="width: 64px; height: 64px; margin: 0 auto 16px;"></i>
            <h3 style="font-size: var(--text-xl); color: var(--color-gray-600); margin-bottom: 8px;">No High Tea Bookings Found</h3>
            <p style="color: var(--color-gray-500);">
                <?php if (!empty($filters)): ?>
                    Try adjusting your filters to see more results.
                <?php else: ?>
                    No High Tea bookings have been made yet.
                <?php endif; ?>
            </p>
        </div>
        <?php else: ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Customer</th>
                    <th>Contact</th>
                    <th>Date & Time</th>
                    <th>Party Size</th>
                    <th>Package</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bookings as $booking): ?>
                <tr>
                    <td>
                        <div style="font-weight: 600; color: var(--color-gray-900); margin-bottom: 2px;">
                            <?= htmlspecialchars($booking['customer_name']) ?>
                        </div>
                        <?php if ($booking['special_requests']): ?>
                        <div style="font-size: var(--text-xs); color: var(--color-gray-500);">
                            <?= htmlspecialchars(substr($booking['special_requests'], 0, 40)) ?><?= strlen($booking['special_requests']) > 40 ? '...' : '' ?>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="font-size: var(--text-sm); margin-bottom: 2px;">
                            <i data-lucide="mail" style="width: 14px; height: 14px; display: inline-block; vertical-align: middle;"></i>
                            <?= htmlspecialchars($booking['email']) ?>
                        </div>
                        <div style="font-size: var(--text-sm);">
                            <i data-lucide="phone" style="width: 14px; height: 14px; display: inline-block; vertical-align: middle;"></i>
                            <?= htmlspecialchars($booking['phone']) ?>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600; color: var(--color-gray-900); margin-bottom: 2px;">
                            <?= date('M d, Y', strtotime($booking['date'])) ?>
                        </div>
                        <div style="font-size: var(--text-sm); color: var(--color-gray-600);">
                            <?= date('h:i A', strtotime($booking['time'])) ?>
                        </div>
                    </td>
                    <td>
                        <div style="font-weight: 600; color: var(--color-gray-900);">
                            <?= $booking['party_size'] ?> <?= $booking['party_size'] == 1 ? 'guest' : 'guests' ?>
                        </div>
                    </td>
                    <td>
                        <?php
                        $packageClass = 'badge-info';
                        if ($booking['package_type'] === 'premium') {
                            $packageClass = 'badge-primary';
                        } elseif ($booking['package_type'] === 'deluxe') {
                            $packageClass = 'badge-success';
                        }
                        ?>
                        <span class="badge <?= $packageClass ?>">
                            <?= ucfirst($booking['package_type']) ?>
                        </span>
                    </td>
                    <td>
                        <div style="font-weight: 600; color: var(--color-primary);">
                            Rs. <?= number_format($booking['total_price'], 2) ?>
                        </div>
                    </td>
                    <td>
                        <form method="POST" action="<?= BASE_PATH ?>/hightea/<?= $booking['id'] ?>/status" style="display: inline-block;">
                            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
                            <select name="status" onchange="if(confirm('Update status to ' + this.value + '?')) this.form.submit();" 
                                    class="badge badge-<?= $booking['status'] === 'confirmed' ? 'success' : ($booking['status'] === 'pending' ? 'warning' : ($booking['status'] === 'cancelled' ? 'error' : 'info')) ?>" 
                                    style="padding: 4px 12px; cursor: pointer; border: none; font-size: var(--text-xs);">
                                <option value="pending" <?= $booking['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="confirmed" <?= $booking['status'] === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                                <option value="completed" <?= $booking['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
                                <option value="cancelled" <?= $booking['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                            </select>
                        </form>
                    </td>
                    <td class="actions">
                        <a href="<?= BASE_PATH ?>/hightea/<?= $booking['id'] ?>" class="btn btn-sm btn-secondary">
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

<!-- Pagination -->
<?php if ($pages > 1): ?>
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
    Showing <?= min(($currentPage - 1) * $perPage + 1, $total) ?> to <?= min($currentPage * $perPage, $total) ?> of <?= $total ?> booking<?= $total != 1 ? 's' : '' ?>
</div>
<?php endif; ?>

<script>
    // Initialize Lucide icons
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
</script>
