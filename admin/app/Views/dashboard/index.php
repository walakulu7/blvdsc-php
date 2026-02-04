<!-- Row 1: First 4 Stat Cards -->
<div class="stat-row">
    <!-- Total Reservations -->
    <div class="stat-row-item stat-success">
        <div class="stat-content">
            <h4>Total Reservations</h4>
            <div class="value"><?= $totalReservations ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="calendar"></i>
        </div>
    </div>
    
    <!-- Unread Messages -->
    <div class="stat-row-item stat-orange">
        <div class="stat-content">
            <h4>Unread Messages</h4>
            <div class="value"><?= $unreadMessages ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="message-square"></i>
        </div>
    </div>
    
    <!-- Upcoming Events -->
    <div class="stat-row-item stat-blue">
        <div class="stat-content">
            <h4>Upcoming Events</h4>
            <div class="value"><?= $upcomingEvents ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="party-popper"></i>
        </div>
    </div>
    
    <!-- Pending Reviews -->
    <div class="stat-row-item stat-warning">
        <div class="stat-content">
            <h4>Pending Reviews</h4>
            <div class="value"><?= $pendingReviews ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="star"></i>
        </div>
    </div>
</div>

<!-- Row 2: Second 4 Stat Cards -->
<div class="stat-row">
    <!-- Today's Reservations -->
    <div class="stat-row-item stat-info">
        <div class="stat-content">
            <h4>Today's Reservations</h4>
            <div class="value"><?= $todayReservations ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="calendar-check"></i>
        </div>
    </div>
    
    <!-- Pending Reservations -->
    <div class="stat-row-item stat-warning">
        <div class="stat-content">
            <h4>Pending Reservations</h4>
            <div class="value"><?= $pendingReservations ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="clock"></i>
        </div>
    </div>
    
    <!-- High Tea Pending -->
    <div class="stat-row-item stat-primary">
        <div class="stat-content">
            <h4>High Tea Pending</h4>
            <div class="value"><?= $pendingHighTea ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="coffee"></i>
        </div>
    </div>
    
    <!-- Total High Tea -->
    <div class="stat-row-item stat-purple">
        <div class="stat-content">
            <h4>High Tea Total</h4>
            <div class="value"><?= $totalHighTea ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="cup-soda"></i>
        </div>
    </div>
</div>

<!-- Row 3: Quick Actions (Full Width) -->
<div class="card mb-4">
    <div class="card-header">
        <h2 class="card-title">Quick Actions</h2>
    </div>
    <div class="card-body">
        <div class="grid grid-cols-4" style="gap: 16px;">
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

<!-- Row 4: Recent Activity & Calendar -->
<div class="grid grid-cols-2 mb-4">
    <!-- Recent Activity -->
    <div class="card">
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
                LIMIT 3
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
    
    <!-- Calendar -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Calendar</h2>
            <span style="font-size: 14px; color: var(--color-gray-500);">Upcoming reservations</span>
        </div>
        <div class="card-body">
            <div style="text-align: center; padding: 20px;">
                <div style="font-size: 18px; font-weight: 600; margin-bottom: 20px;">
                    <?= date('F Y') ?>
                </div>
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr>
                            <th style="padding: 8px; font-size: 12px; color: var(--color-gray-500);">Su</th>
                            <th style="padding: 8px; font-size: 12px; color: var(--color-gray-500);">Mo</th>
                            <th style="padding: 8px; font-size: 12px; color: var(--color-gray-500);">Tu</th>
                            <th style="padding: 8px; font-size: 12px; color: var(--color-gray-500);">We</th>
                            <th style="padding: 8px; font-size: 12px; color: var(--color-gray-500);">Th</th>
                            <th style="padding: 8px; font-size: 12px; color: var(--color-gray-500);">Fr</th>
                            <th style="padding: 8px; font-size: 12px; color: var(--color-gray-500);">Sa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Generate calendar
                        $today = date('j');
                        $firstDay = date('w', mktime(0, 0, 0, date('m'), 1, date('Y')));
                        $daysInMonth = date('t');
                        $day = 1;
                        
                        for ($week = 0; $week < 6; $week++) {
                            echo '<tr>';
                            for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++) {
                                if (($week == 0 && $dayOfWeek < $firstDay) || $day > $daysInMonth) {
                                    echo '<td style="padding: 8px;"></td>';
                                } else {
                                    $isToday = ($day == $today);
                                    $style = $isToday ? 'background: var(--color-primary); color: white; border-radius: 50%; width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center;' : '';
                                    echo '<td style="padding: 8px; text-align: center;"><div style="' . $style . '">' . $day . '</div></td>';
                                    $day++;
                                }
                            }
                            echo '</tr>';
                            if ($day > $daysInMonth) break;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Row 5: Upcoming Reservations & Upcoming Events -->
<div class="grid grid-cols-2">
    <!-- Upcoming Reservations -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Upcoming Reservations</h2>
            <a href="<?= BASE_PATH ?>/reservations" style="color: var(--color-primary); font-size: 14px; text-decoration: none;">View All →</a>
        </div>
        <div class="card-body">
            <?php
            // Get upcoming reservations
            $upcomingReservations = $pdo->query("
                SELECT * FROM reservations 
                WHERE date >= CURDATE() 
                ORDER BY date ASC, time ASC 
                LIMIT 3
            ")->fetchAll();
            
            if (empty($upcomingReservations)):
            ?>
                <div style="text-align: center; padding: 40px; color: var(--color-gray-400);">
                    <i data-lucide="calendar-x" style="width: 48px; height: 48px; margin: 0 auto 16px;"></i>
                    <p>No upcoming reservations</p>
                </div>
            <?php else: ?>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <?php foreach ($upcomingReservations as $reservation): ?>
                    <div style="padding: 12px; border: 1px solid var(--color-gray-200); border-radius: 8px;">
                        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 8px;">
                            <div>
                                <div style="font-weight: 600; color: var(--color-gray-900);">
                                    <?= htmlspecialchars($reservation['customer_name']) ?>
                                </div>
                                <div style="font-size: 13px; color: var(--color-gray-500);">
                                    <?= $reservation['party_size'] ?> guests
                                </div>
                            </div>
                            <span class="badge badge-<?= $reservation['status'] === 'confirmed' ? 'success' : 'warning' ?>">
                                <?= ucfirst($reservation['status']) ?>
                            </span>
                        </div>
                        <div style="font-size: 13px; color: var(--color-gray-600);">
                            <i data-lucide="calendar" style="width: 14px; height: 14px;"></i>
                            <?= date('M d, Y', strtotime($reservation['date'])) ?> at <?= date('h:i A', strtotime($reservation['time'])) ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Upcoming Events -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Upcoming Events</h2>
            <a href="<?= BASE_PATH ?>/events" style="color: var(--color-primary); font-size: 14px; text-decoration: none;">View All →</a>
        </div>
        <div class="card-body">
            <?php
            // Get upcoming events
            $upcomingEventsList = $pdo->query("
                SELECT * FROM events 
                WHERE event_date >= CURDATE() AND status = 'published'
                ORDER BY event_date ASC 
                LIMIT 3
            ")->fetchAll();
            
            if (empty($upcomingEventsList)):
            ?>
                <div style="text-align: center; padding: 40px; color: var(--color-gray-400);">
                    <i data-lucide="calendar-x" style="width: 48px; height: 48px; margin: 0 auto 16px;"></i>
                    <p>No upcoming events</p>
                </div>
            <?php else: ?>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <?php foreach ($upcomingEventsList as $event): ?>
                    <div style="padding: 12px; border: 1px solid var(--color-gray-200); border-radius: 8px;">
                        <div style="display: flex; gap: 12px;">
                            <div style="flex-shrink: 0; width: 50px; height: 50px; background: var(--color-gray-100); border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                                <div style="font-size: 18px; font-weight: 600; color: var(--color-gray-900);">
                                    <?= date('d', strtotime($event['event_date'])) ?>
                                </div>
                                <div style="font-size: 11px; color: var(--color-gray-500);">
                                    <?= date('M', strtotime($event['event_date'])) ?>
                                </div>
                            </div>
                            <div style="flex: 1;">
                                <div style="font-weight: 600; color: var(--color-gray-900); margin-bottom: 4px;">
                                    <?= htmlspecialchars($event['title']) ?>
                                </div>
                                <div style="font-size: 13px; color: var(--color-gray-500);">
                                    <?= htmlspecialchars(substr($event['description'], 0, 60)) ?>...
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    // Initialize Lucide icons for dynamically loaded content
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
</script>
