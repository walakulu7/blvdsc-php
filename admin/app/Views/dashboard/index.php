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

<!-- Row 4: Recent Activity, Calendar & High Tea Calendar -->
<div class="grid grid-cols-3 mb-4">
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
    
    <!-- Calendar - Reservations -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Reservations</h2>
            <span style="font-size: 14px; color: var(--color-gray-500);">Calendar</span>
        </div>
        <div class="card-body">
            <div style="text-align: center; padding: 20px;">
                <div style="font-size: 18px; font-weight: 600; margin-bottom: 20px;">
                    <?= date('F Y') ?>
                </div>
                <?php
                // Get reservations for current month
                $currentMonth = date('Y-m');
                $reservationsInMonth = $pdo->query("
                    SELECT DATE(date) as reservation_date, COUNT(*) as count 
                    FROM reservations 
                    WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'
                    GROUP BY DATE(date)
                ")->fetchAll(PDO::FETCH_KEY_PAIR);
                ?>
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
                        $currentYear = date('Y');
                        $currentMonthNum = date('m');
                        $firstDay = date('w', mktime(0, 0, 0, $currentMonthNum, 1, $currentYear));
                        $daysInMonth = date('t');
                        $day = 1;
                        
                        for ($week = 0; $week < 6; $week++) {
                            echo '<tr>';
                            for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++) {
                                if (($week == 0 && $dayOfWeek < $firstDay) || $day > $daysInMonth) {
                                    echo '<td style="padding: 8px;"></td>';
                                } else {
                                    $isToday = ($day == $today);
                                    $dateKey = sprintf('%s-%02d', $currentMonth, $day);
                                    $hasReservations = isset($reservationsInMonth[$dateKey]);
                                    $reservationCount = $hasReservations ? $reservationsInMonth[$dateKey] : 0;
                                    
                                    // Determine color based on reservation count
                                    $circleColor = '';
                                    $textColor = '';
                                    if ($hasReservations) {
                                        if ($reservationCount >= 4) {
                                            $circleColor = '#dc2626'; // Red for 4+ bookings
                                            $textColor = 'white';
                                        } elseif ($reservationCount == 3) {
                                            $circleColor = '#f59e0b'; // Orange for 3 bookings
                                            $textColor = 'white';
                                        } elseif ($reservationCount == 2) {
                                            $circleColor = '#3b82f6'; // Blue for 2 bookings
                                            $textColor = 'white';
                                        } else {
                                            $circleColor = '#10b981'; // Green for 1 booking
                                            $textColor = 'white';
                                        }
                                    } elseif ($isToday) {
                                        $circleColor = 'var(--color-primary)';
                                        $textColor = 'white';
                                    }
                                    
                                    // Styling
                                    $cellStyle = 'padding: 8px; text-align: center;';
                                    $dayStyle = 'display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%;';
                                    
                                    if ($circleColor) {
                                        $dayStyle .= ' background: ' . $circleColor . '; color: ' . $textColor . ';';
                                    }
                                    
                                    echo '<td style="' . $cellStyle . '">';
                                    echo '<div style="' . $dayStyle . '">' . $day . '</div>';
                                    echo '</td>';
                                    $day++;
                                }
                            }
                            echo '</tr>';
                            if ($day > $daysInMonth) break;
                        }
                        ?>
                    </tbody>
                </table>
                
                <!-- Legend -->
                <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--color-gray-200); display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--color-gray-600);">
                        <div style="width: 6px; height: 6px; background: #10b981; border-radius: 50%;"></div>
                        <span>1</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--color-gray-600);">
                        <div style="width: 6px; height: 6px; background: #3b82f6; border-radius: 50%;"></div>
                        <span>2</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--color-gray-600);">
                        <div style="width: 6px; height: 6px; background: #f59e0b; border-radius: 50%;"></div>
                        <span>3</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--color-gray-600);">
                        <div style="width: 6px; height: 6px; background: #dc2626; border-radius: 50%;"></div>
                        <span>4+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Calendar - High Tea -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">High Tea</h2>
            <span style="font-size: 14px; color: var(--color-gray-500);">Calendar</span>
        </div>
        <div class="card-body">
            <div style="text-align: center; padding: 20px;">
                <div style="font-size: 18px; font-weight: 600; margin-bottom: 20px;">
                    <?= date('F Y') ?>
                </div>
                <?php
                // Get high tea reservations for current month
                $highTeaInMonth = $pdo->query("
                    SELECT DATE(date) as reservation_date, COUNT(*) as count 
                    FROM high_tea_reservations 
                    WHERE DATE_FORMAT(date, '%Y-%m') = '$currentMonth'
                    GROUP BY DATE(date)
                ")->fetchAll(PDO::FETCH_KEY_PAIR);
                ?>
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
                        // Generate calendar for high tea
                        $day = 1;
                        
                        for ($week = 0; $week < 6; $week++) {
                            echo '<tr>';
                            for ($dayOfWeek = 0; $dayOfWeek < 7; $dayOfWeek++) {
                                if (($week == 0 && $dayOfWeek < $firstDay) || $day > $daysInMonth) {
                                    echo '<td style="padding: 8px;"></td>';
                                } else {
                                    $isToday = ($day == $today);
                                    $dateKey = sprintf('%s-%02d', $currentMonth, $day);
                                    $hasHighTea = isset($highTeaInMonth[$dateKey]);
                                    $highTeaCount = $hasHighTea ? $highTeaInMonth[$dateKey] : 0;
                                    
                                    // Determine color based on high tea count
                                    $circleColor = '';
                                    $textColor = '';
                                    if ($hasHighTea) {
                                        if ($highTeaCount >= 4) {
                                            $circleColor = '#dc2626'; // Red for 4+ bookings
                                            $textColor = 'white';
                                        } elseif ($highTeaCount == 3) {
                                            $circleColor = '#f59e0b'; // Orange for 3 bookings
                                            $textColor = 'white';
                                        } elseif ($highTeaCount == 2) {
                                            $circleColor = '#3b82f6'; // Blue for 2 bookings
                                            $textColor = 'white';
                                        } else {
                                            $circleColor = '#10b981'; // Green for 1 booking
                                            $textColor = 'white';
                                        }
                                    } elseif ($isToday) {
                                        $circleColor = 'var(--color-primary)';
                                        $textColor = 'white';
                                    }
                                    
                                    // Styling
                                    $cellStyle = 'padding: 8px; text-align: center;';
                                    $dayStyle = 'display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%;';
                                    
                                    if ($circleColor) {
                                        $dayStyle .= ' background: ' . $circleColor . '; color: ' . $textColor . ';';
                                    }
                                    
                                    echo '<td style="' . $cellStyle . '">';
                                    echo '<div style="' . $dayStyle . '">' . $day . '</div>';
                                    echo '</td>';
                                    $day++;
                                }
                            }
                            echo '</tr>';
                            if ($day > $daysInMonth) break;
                        }
                        ?>
                    </tbody>
                </table>
                
                <!-- Legend -->
                <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid var(--color-gray-200); display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--color-gray-600);">
                        <div style="width: 6px; height: 6px; background: #10b981; border-radius: 50%;"></div>
                        <span>1</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--color-gray-600);">
                        <div style="width: 6px; height: 6px; background: #3b82f6; border-radius: 50%;"></div>
                        <span>2</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--color-gray-600);">
                        <div style="width: 6px; height: 6px; background: #f59e0b; border-radius: 50%;"></div>
                        <span>3</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--color-gray-600);">
                        <div style="width: 6px; height: 6px; background: #dc2626; border-radius: 50%;"></div>
                        <span>4+</span>
                    </div>
                </div>
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
