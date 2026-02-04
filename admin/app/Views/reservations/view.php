<!-- Back Button -->
<div style="margin-bottom: var(--spacing-xl);">
    <a href="<?= BASE_PATH ?>/reservations" class="btn btn-secondary">
        <i data-lucide="arrow-left"></i>
        Back to Reservations
    </a>
</div>

<!-- Flash Messages -->
<?php
$successMessage = Session::has('success') ? Session::flash('success') : null;
$errorMessage = Session::has('error') ? Session::flash('error') : null;

if ($successMessage || $errorMessage):
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
</div>
<?php endif; ?>

<!-- Page Header -->
<div class="card-header" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-lg) 0; border-bottom: none;">
    <div>
        <h1 class="header-title">Reservation Details</h1>
        <p style="color: var(--color-gray-500); font-size: var(--text-sm); margin-top: 4px;">
            ID: #<?= $reservation['id'] ?> • Created: <?= date('M d, Y h:i A', strtotime($reservation['created_at'])) ?>
        </p>
    </div>
    <span class="badge badge-<?= $reservation['status'] === 'confirmed' ? 'success' : ($reservation['status'] === 'pending' ? 'warning' : ($reservation['status'] === 'cancelled' ? 'error' : 'info')) ?>" style="font-size: var(--text-sm); padding: 8px 16px;">
        <?= ucfirst($reservation['status']) ?>
    </span>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-2">
    <!-- Customer Information -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">
                <i data-lucide="user"></i>
                Customer Information
            </h2>
        </div>
        <div class="card-body">
            <div style="display: flex; flex-direction: column; gap: var(--spacing-lg);">
                <div>
                    <label style="font-size: var(--text-xs); font-weight: 600; color: var(--color-gray-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block;">
                        Full Name
                    </label>
                    <div style="font-size: var(--text-lg); font-weight: 600; color: var(--color-gray-900);">
                        <?= htmlspecialchars($reservation['customer_name']) ?>
                    </div>
                </div>
                
                <div>
                    <label style="font-size: var(--text-xs); font-weight: 600; color: var(--color-gray-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block;">
                        Email Address
                    </label>
                    <div style="font-size: var(--text-base); color: var(--color-gray-700); display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="mail" style="width: 16px; height: 16px;"></i>
                        <a href="mailto:<?= htmlspecialchars($reservation['email']) ?>" style="color: var(--color-primary); text-decoration: none;">
                            <?= htmlspecialchars($reservation['email']) ?>
                        </a>
                    </div>
                </div>
                
                <div>
                    <label style="font-size: var(--text-xs); font-weight: 600; color: var(--color-gray-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block;">
                        Phone Number
                    </label>
                    <div style="font-size: var(--text-base); color: var(--color-gray-700); display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="phone" style="width: 16px; height: 16px;"></i>
                        <a href="tel:<?= htmlspecialchars($reservation['phone']) ?>" style="color: var(--color-primary); text-decoration: none;">
                            <?= htmlspecialchars($reservation['phone']) ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Reservation Details -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">
                <i data-lucide="calendar"></i>
                Reservation Details
            </h2>
        </div>
        <div class="card-body">
            <div style="display: flex; flex-direction: column; gap: var(--spacing-lg);">
                <div>
                    <label style="font-size: var(--text-xs); font-weight: 600; color: var(--color-gray-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block;">
                        Date
                    </label>
                    <div style="font-size: var(--text-lg); font-weight: 600; color: var(--color-gray-900);">
                        <?= date('l, F d, Y', strtotime($reservation['date'])) ?>
                    </div>
                </div>
                
                <div>
                    <label style="font-size: var(--text-xs); font-weight: 600; color: var(--color-gray-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block;">
                        Time
                    </label>
                    <div style="font-size: var(--text-lg); font-weight: 600; color: var(--color-gray-900); display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="clock" style="width: 20px; height: 20px;"></i>
                        <?= date('h:i A', strtotime($reservation['time'])) ?>
                    </div>
                </div>
                
                <div>
                    <label style="font-size: var(--text-xs); font-weight: 600; color: var(--color-gray-500); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block;">
                        Party Size
                    </label>
                    <div style="font-size: var(--text-lg); font-weight: 600; color: var(--color-gray-900); display: flex; align-items: center; gap: 8px;">
                        <i data-lucide="users" style="width: 20px; height: 20px;"></i>
                        <?= $reservation['party_size'] ?> <?= $reservation['party_size'] == 1 ? 'Guest' : 'Guests' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Special Notes -->
<?php if ($reservation['notes']): ?>
<div class="card">
    <div class="card-header">
        <h2 class="card-title">
            <i data-lucide="message-square"></i>
            Special Notes
        </h2>
    </div>
    <div class="card-body">
        <p style="font-size: var(--text-base); color: var(--color-gray-700); line-height: 1.6;">
            <?= nl2br(htmlspecialchars($reservation['notes'])) ?>
        </p>
    </div>
</div>
<?php endif; ?>

<!-- Status Update Actions -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title">
            <i data-lucide="settings"></i>
            Update Status
        </h2>
    </div>
    <div class="card-body">
        <p style="font-size: var(--text-sm); color: var(--color-gray-600); margin-bottom: var(--spacing-lg);">
            Current status: <strong style="color: var(--color-gray-900);"><?= ucfirst($reservation['status']) ?></strong>
        </p>
        
        <form method="POST" action="<?= BASE_PATH ?>/reservations/<?= $reservation['id'] ?>/status" onsubmit="return confirm('Are you sure you want to update this reservation status?');">
            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
            
            <div style="display: flex; gap: var(--spacing-md); flex-wrap: wrap;">
                <?php if ($reservation['status'] !== 'pending'): ?>
                <button type="submit" name="status" value="pending" class="btn btn-secondary">
                    <i data-lucide="clock"></i>
                    Mark as Pending
                </button>
                <?php endif; ?>
                
                <?php if ($reservation['status'] !== 'confirmed'): ?>
                <button type="submit" name="status" value="confirmed" class="btn btn-success">
                    <i data-lucide="check"></i>
                    Mark as Confirmed
                </button>
                <?php endif; ?>
                
                <?php if ($reservation['status'] !== 'completed'): ?>
                <button type="submit" name="status" value="completed" class="btn btn-primary">
                    <i data-lucide="check-circle"></i>
                    Mark as Completed
                </button>
                <?php endif; ?>
                
                <?php if ($reservation['status'] !== 'cancelled'): ?>
                <button type="submit" name="status" value="cancelled" class="btn btn-danger">
                    <i data-lucide="x-circle"></i>
                    Cancel Reservation
                </button>
                <?php endif; ?>
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
