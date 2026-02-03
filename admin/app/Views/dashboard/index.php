<!-- Dashboard Stats Grid -->
<div class="grid grid-cols-4 mb-4">
    <!-- Today's Reservations -->
    <div class="stat-card">
        <div class="stat-content">
            <h3>Today's Reservations</h3>
            <div class="stat-value"><?= $todayReservations ?></div>
            <div class="stat-subtitle">Bookings for today</div>
        </div>
        <div class="stat-icon" style="background: #dbeafe;">
            <i data-lucide="calendar-check" style="color: #3b82f6;"></i>
        </div>
    </div>
    
    <!-- Pending Reservations -->
    <div class="stat-card">
        <div class="stat-content">
            <h3>Pending Reservations</h3>
            <div class="stat-value"><?= $pendingReservations ?></div>
            <div class="stat-subtitle">Awaiting confirmation</div>
        </div>
        <div class="stat-icon" style="background: #fef3c7;">
            <i data-lucide="clock" style="color: #f59e0b;"></i>
        </div>
    </div>
    
    <!-- Pending High Tea -->
    <div class="stat-card">
        <div class="stat-content">
            <h3>High Tea Bookings</h3>
            <div class="stat-value"><?= $pendingHighTea ?></div>
            <div class="stat-subtitle">Pending confirmations</div>
        </div>
        <div class="stat-icon" style="background: #e8d9b8;">
            <i data-lucide="coffee" style="color: #8b6843;"></i>
        </div>
    </div>
    
    <!-- Unread Messages -->
    <div class="stat-card">
        <div class="stat-content">
            <h3>Unread Messages</h3>
            <div class="stat-value"><?= $unreadMessages ?></div>
            <div class="stat-subtitle">Need response</div>
        </div>
        <div class="stat-icon" style="background: #fee2e2;">
            <i data-lucide="message-square" style="color: #ef4444;"></i>
        </div>
    </div>
</div>

<!-- Second Row Stats -->
<div class="grid grid-cols-4 mb-4">
    <!-- Total Reservations -->
    <div class="stat-card">
        <div class="stat-content">
            <h3>Total Reservations</h3>
            <div class="stat-value"><?= $totalReservations ?></div>
            <div class="stat-subtitle">All time bookings</div>
        </div>
        <div class="stat-icon" style="background: #d1fae5;">
            <i data-lucide="calendar" style="color: #10b981;"></i>
        </div>
    </div>
    
    <!-- Total High Tea -->
    <div class="stat-card">
        <div class="stat-content">
            <h3>High Tea Total</h3>
            <div class="stat-value"><?= $totalHighTea ?></div>
            <div class="stat-subtitle">All time bookings</div>
        </div>
        <div class="stat-icon" style="background: #fce7f3;">
            <i data-lucide="cup-soda" style="color: #ec4899;"></i>
        </div>
    </div>
    
    <!-- Upcoming Events -->
    <div class="stat-card">
        <div class="stat-content">
            <h3>Upcoming Events</h3>
            <div class="stat-value"><?= $upcomingEvents ?></div>
            <div class="stat-subtitle">Published events</div>
        </div>
        <div class="stat-icon" style="background: #e0e7ff;">
            <i data-lucide="party-popper" style="color: #6366f1;"></i>
        </div>
    </div>
    
    <!-- Pending Reviews -->
    <div class="stat-card">
        <div class="stat-content">
            <h3>Pending Reviews</h3>
            <div class="stat-value"><?= $pendingReviews ?></div>
            <div class="stat-subtitle">Need moderation</div>
        </div>
        <div class="stat-icon" style="background: #fef9c3;">
            <i data-lucide="star" style="color: #eab308;"></i>
        </div>
    </div>
</div>

<!-- Quick Actions & Recent Activity -->
<div class="grid grid-cols-3">
    <!-- Quick Actions -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Quick Actions</h2>
        </div>
        <div class="card-body">
            <div style="display: flex; flex-direction: column; gap: 12px;">
                <a href="<?= BASE_PATH ?>/reservations" class="btn btn-primary" style="width: 100%;">
                    <i data-lucide="calendar-plus"></i>
                    View Reservations
                </a>
                <a href="<?= BASE_PATH ?>/high-tea" class="btn btn-primary" style="width: 100%;">
                    <i data-lucide="coffee"></i>
                    High Tea Bookings
                </a>
                <a href="<?= BASE_PATH ?>/events/create" class="btn btn-secondary" style="width: 100%;">
                    <i data-lucide="plus"></i>
                    Create Event
                </a>
                <a href="<?= BASE_PATH ?>/messages" class="btn btn-secondary" style="width: 100%;">
                    <i data-lucide="inbox"></i>
                    View Messages
                </a>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="card" style="grid-column: span 2;">
        <div class="card-header">
            <h2 class="card-title">Recent Activity</h2>
            <a href="<?= BASE_PATH ?>/activity" style="color: var(--color-primary); font-size: 14px; text-decoration: none;">View All</a>
        </div>
        <div class="card-body">
            <?php
            // Get recent activity from activity log
            global $pdo;
            $recentActivity = $pdo->query("
                SELECT al.*, au.username 
                FROM admin_activity_log al 
                LEFT JOIN admin_users au ON al.admin_id = au.id 
                ORDER BY al.created_at DESC 
                LIMIT 5
            ")->fetchAll();
            
            if (empty($recentActivity)):
            ?>
                <div style="text-align: center; padding: 40px; color: var(--color-gray-400);">
                    <i data-lucide="activity" style="width: 48px; height: 48px; margin: 0 auto 16px;"></i>
                    <p>No recent activity</p>
                </div>
            <?php else: ?>
                <div style="display: flex; flex-direction: column; gap: 16px;">
                    <?php foreach ($recentActivity as $activity): ?>
                    <div style="display: flex; align-items: flex-start; gap: 12px; padding-bottom: 16px; border-bottom: 1px solid var(--color-gray-100);">
                        <div class="user-avatar" style="width: 36px; height: 36px; font-size: 14px;">
                            <?= strtoupper(substr($activity['username'], 0, 1)) ?>
                        </div>
                        <div style="flex: 1;">
                            <div style="font-size: 14px; color: var(--color-gray-900); margin-bottom: 4px;">
                                <strong><?= htmlspecialchars($activity['username']) ?></strong> 
                                <?= htmlspecialchars($activity['action']) ?>
                            </div>
                            <?php if ($activity['details']): ?>
                            <div style="font-size: 13px; color: var(--color-gray-500);">
                                <?= htmlspecialchars($activity['details']) ?>
                            </div>
                            <?php endif; ?>
                            <div style="font-size: 12px; color: var(--color-gray-400); margin-top: 4px;">
                                <?= date('M d, Y h:i A', strtotime($activity['created_at'])) ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Welcome Message for first time -->
<?php if ($todayReservations == 0 && $pendingReservations == 0 && $totalReservations == 0): ?>
<div class="card mt-4" style="background: linear-gradient(135deg, var(--color-primary-light), var(--color-gray-50)); border: 2px dashed var(--color-primary);">
    <div class="card-body" style="text-align: center; padding: 48px;">
        <div style="font-size: 48px; margin-bottom: 16px;">🎉</div>
        <h2 style="font-size: 24px; margin-bottom: 12px; color: var(--color-gray-900);">Welcome to BLVD Coffee Admin Panel!</h2>
        <p style="color: var(--color-gray-600); font-size: 16px; margin-bottom: 24px;">
            Your beautiful admin panel is now ready. Start by exploring the features or checking out the quick actions above.
        </p>
        <div style="display: flex; gap: 12px; justify-content: center;">
            <a href="<?= BASE_PATH ?>/settings/site" class="btn btn-primary">
                <i data-lucide="settings"></i>
                Configure Settings
            </a>
            <a href="<?= BASE_PATH ?>/events/create" class="btn btn-secondary">
                <i data-lucide="calendar-plus"></i>
                Create First Event
            </a>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
    // Initialize Lucide icons for dynamically loaded content
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
</script>
