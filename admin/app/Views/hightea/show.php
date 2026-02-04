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
<div class="card-header" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-lg) 0; border-bottom: none;">
    <div style="display: flex; align-items: center; gap: var(--spacing-md);">
        <a href="<?= BASE_PATH ?>/hightea" class="btn btn-secondary">
            <i data-lucide="arrow-left"></i>
            Back
        </a>
        <h1 class="header-title">High Tea Booking #<?= $booking['id'] ?></h1>
    </div>
    
    <form method="POST" action="<?= BASE_PATH ?>/hightea/<?= $booking['id'] ?>/status" style="display: inline-block;">
        <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
        <select name="status" onchange="if(confirm('Update status to ' + this.value + '?')) this.form.submit();" 
                class="badge badge-<?= $booking['status'] === 'confirmed' ? 'success' : ($booking['status'] === 'pending' ? 'warning' : ($booking['status'] === 'cancelled' ? 'error' : 'info')) ?>" 
                style="padding: 8px 16px; cursor: pointer; border: none; font-size: var(--text-sm);">
            <option value="pending" <?= $booking['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="confirmed" <?= $booking['status'] === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
            <option value="completed" <?= $booking['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
            <option value="cancelled" <?= $booking['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
        </select>
    </form>
</div>

<!-- Booking Details Grid -->
<div class="grid grid-cols-2">
    <!-- Left Column: Customer Information -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Customer Information</h2>
        </div>
        <div class="card-body">
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="user"></i>
                    Full Name
                </div>
                <div class="detail-value">
                    <?= htmlspecialchars($booking['customer_name']) ?>
                </div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="mail"></i>
                    Email
                </div>
                <div class="detail-value">
                    <a href="mailto:<?= $booking['email'] ?>" style="color: var(--color-primary); text-decoration: none;">
                        <?= htmlspecialchars($booking['email']) ?>
                    </a>
                </div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="phone"></i>
                    Phone
                </div>
                <div class="detail-value">
                    <a href="tel:<?= $booking['phone'] ?>" style="color: var(--color-primary); text-decoration: none;">
                        <?= htmlspecialchars($booking['phone']) ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Right Column: Reservation Details -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Booking Details</h2>
        </div>
        <div class="card-body">
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="calendar"></i>
                    Date
                </div>
                <div class="detail-value">
                    <?= date('l, F j, Y', strtotime($booking['date'])) ?>
                </div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="clock"></i>
                    Time
                </div>
                <div class="detail-value">
                    <?= date('h:i A', strtotime($booking['time'])) ?>
                </div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="users"></i>
                    Party Size
                </div>
                <div class="detail-value">
                    <?= $booking['party_size'] ?> <?= $booking['party_size'] == 1 ? 'Guest' : 'Guests' ?>
                </div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="calendar-check"></i>
                    Created
                </div>
                <div class="detail-value">
                    <?= date('M j, Y \a\t h:i A', strtotime($booking['created_at'])) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Package & Pricing Information -->
<div class="card mt-4">
    <div class="card-header">
        <h2 class="card-title">Package & Pricing</h2>
    </div>
    <div class="card-body">
        <div class="grid grid-cols-3">
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="cup-soda"></i>
                    Package Type
                </div>
                <div class="detail-value">
                    <?php
                    $packageClass = 'badge-info';
                    if ($booking['package_type'] === 'premium') {
                        $packageClass = 'badge-primary';
                    } elseif ($booking['package_type'] === 'deluxe') {
                        $packageClass = 'badge-success';
                    }
                    ?>
                    <span class="badge <?= $packageClass ?>" style="font-size: var(--text-base); padding: 8px 16px;">
                        <?= ucfirst($booking['package_type']) ?>
                    </span>
                </div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="calculator"></i>
                    Price Per Person
                </div>
                <div class="detail-value">
                    Rs. <?= number_format($booking['total_price'] / $booking['party_size'], 2) ?>
                </div>
            </div>
            
            <div class="detail-row">
                <div class="detail-label">
                    <i data-lucide="banknote"></i>
                    Total Price
                </div>
                <div class="detail-value" style="font-size: var(--text-2xl); font-weight: 700; color: var(--color-primary);">
                    Rs. <?= number_format($booking['total_price'], 2) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Special Requests -->
<?php if ($booking['special_requests']): ?>
<div class="card mt-4">
    <div class="card-header">
        <h2 class="card-title">Special Requests</h2>
    </div>
    <div class="card-body">
        <div style="background: var(--color-gray-50); padding: var(--spacing-lg); border-radius: var(--border-radius-md); border-left: 4px solid var(--color-primary);">
            <p style="color: var(--color-gray-700); line-height: 1.6; margin: 0;">
                <?= nl2br(htmlspecialchars($booking['special_requests'])) ?>
            </p>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
    // Initialize Lucide icons
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
</script>
