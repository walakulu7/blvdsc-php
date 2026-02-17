<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard' ?> - BLVD Coffee Admin</title>
    <link rel="icon" type="image/x-icon" href="<?= BASE_PATH ?>/../assets/images/favicon.ico">
    <link rel="stylesheet" href="<?= BASE_PATH ?>/public/css/admin.css">
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="admin-sidebar" id="sidebar">
            <div class="sidebar-logo">
                <div class="sidebar-logo-icon">☕</div>
                <div class="sidebar-logo-text">
                    <h1>BLVD Coffee</h1>
                    <p>Admin Panel</p>
                </div>
            </div>
            
            <nav class="sidebar-nav">
                <!-- Main Section -->
                <div class="nav-section">
                    <div class="nav-section-title">Main</div>
                    <a href="<?= BASE_PATH ?>/dashboard" class="nav-item <?= $current_page === 'dashboard' ? 'active' : '' ?>">
                        <i data-lucide="layout-dashboard" class="nav-item-icon"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                
                <!-- Bookings Section -->
                <div class="nav-section">
                    <div class="nav-section-title">Bookings</div>
                    <a href="<?= BASE_PATH ?>/reservations" class="nav-item <?= $current_page === 'reservations' ? 'active' : '' ?>">
                        <i data-lucide="calendar" class="nav-item-icon"></i>
                        <span>Reservations</span>
                    </a>
                    <a href="<?= BASE_PATH ?>/hightea" class="nav-item <?= $current_page === 'hightea' ? 'active' : '' ?>">
                        <i data-lucide="cup-soda" class="nav-item-icon"></i>
                        <span>High Tea</span>
                    </a>
                </div>
                
                <!-- Content Section -->
                <div class="nav-section">
                    <div class="nav-section-title">Content</div>
                    <a href="<?= BASE_PATH ?>/events" class="nav-item <?= $current_page === 'events' ? 'active' : '' ?>">
                        <i data-lucide="party-popper" class="nav-item-icon"></i>
                        <span>Events</span>
                    </a>
                    <a href="<?= BASE_PATH ?>/menus" class="nav-item <?= $current_page === 'menus' ? 'active' : '' ?>">
                        <i data-lucide="book-open" class="nav-item-icon"></i>
                        <span>Menus</span>
                    </a>
                </div>
                
                <!-- Communication Section -->
                <div class="nav-section">
                    <div class="nav-section-title">Communication</div>
                    <a href="<?= BASE_PATH ?>/messages" class="nav-item <?= $current_page === 'messages' ? 'active' : '' ?>">
                        <i data-lucide="message-square" class="nav-item-icon"></i>
                        <span>Messages</span>
                    </a>
                    <a href="<?= BASE_PATH ?>/reviews" class="nav-item <?= $current_page === 'reviews' ? 'active' : '' ?>">
                        <i data-lucide="star" class="nav-item-icon"></i>
                        <span>Reviews</span>
                    </a>
                </div>
                
                <!-- Management Section -->
                <div class="nav-section">
                    <div class="nav-section-title">Management</div>
                    <?php if (Auth::isAdmin()): ?>
                    <a href="<?= BASE_PATH ?>/users" class="nav-item <?= $current_page === 'users' ? 'active' : '' ?>">
                        <i data-lucide="users" class="nav-item-icon"></i>
                        <span>Users</span>
                    </a>
                    <?php endif; ?>
                    <a href="<?= BASE_PATH ?>/settings/site" class="nav-item <?= $current_page === 'settings' ? 'active' : '' ?>">
                        <i data-lucide="settings" class="nav-item-icon"></i>
                        <span>Settings</span>
                    </a>
                    <a href="<?= BASE_PATH ?>/special-days" class="nav-item <?= $current_page === 'special-days' ? 'active' : '' ?>">
                        <i data-lucide="calendar-x" class="nav-item-icon"></i>
                        <span>Special Days</span>
                    </a>
                </div>
            </nav>
        </aside>
        
        <!-- Main Content Area -->
        <main class="admin-main">
            <!-- Header -->
            <header class="admin-header">
                <div class="header-left">
                    <h1 class="header-title"><?= $page_title ?? 'Dashboard' ?></h1>
                </div>
                
                <div class="header-right">
                    <!-- Notifications -->
                    <div class="header-notifications">
                        <i data-lucide="bell"></i>
                        <?php 
                        // Get unread count (placeholder for now)
                        $unreadCount = 0; 
                        if ($unreadCount > 0): 
                        ?>
                        <span class="notification-badge"><?= $unreadCount ?></span>
                        <?php endif; ?>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="header-user" onclick="toggleUserMenu()">
                        <div class="user-avatar">
                            <?= strtoupper(substr(Auth::user()['username'], 0, 1)) ?>
                        </div>
                        <div class="user-info">
                            <div class="user-name"><?= htmlspecialchars(Auth::user()['username']) ?></div>
                            <div class="user-role"><?= htmlspecialchars(Auth::user()['role']) ?></div>
                        </div>
                        <i data-lucide="chevron-down"></i>
                    </div>
                    
                    <!-- User Dropdown Menu -->
                    <div id="userMenu" class="user-dropdown" style="display: none;">
                        <a href="<?= BASE_PATH ?>/settings/profile">
                            <i data-lucide="user"></i> Profile
                        </a>
                        <a href="<?= BASE_PATH ?>/settings/site">
                            <i data-lucide="settings"></i> Settings
                        </a>
                        <hr>
                        <a href="<?= BASE_PATH ?>/logout">
                            <i data-lucide="log-out"></i> Logout
                        </a>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <div class="admin-content">
                <?php if (Session::flash('success')): ?>
                <div class="alert alert-success" id="successAlert">
                    <?= htmlspecialchars(Session::flash('success')) ?>
                    <button onclick="this.parentElement.remove()" class="alert-close">&times;</button>
                </div>
                <?php endif; ?>
                
                <?php if (Session::flash('error')): ?>
                <div class="alert alert-error" id="errorAlert">
                    <?= htmlspecialchars(Session::flash('error')) ?>
                    <button onclick="this.parentElement.remove()" class="alert-close">&times;</button>
                </div>
                <?php endif; ?>
                
                <?= $content ?>
            </div>
        </main>
    </div>
    
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Toggle user menu
        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
        }
        
        // Close user menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('userMenu');
            const userBtn = document.querySelector('.header-user');
            
            if (!userBtn.contains(event.target) && menu.style.display === 'block') {
                menu.style.display = 'none';
            }
        });
        
        // Mobile sidebar toggle
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('mobile-open');
        }
        
        // Auto-dismiss flash messages after 5 seconds
        setTimeout(function() {
            const successAlert = document.getElementById('successAlert');
            const errorAlert = document.getElementById('errorAlert');
            
            if (successAlert) {
                successAlert.style.opacity = '0';
                setTimeout(() => successAlert.remove(), 300);
            }
            
            if (errorAlert) {
                errorAlert.style.opacity = '0';
                setTimeout(() => errorAlert.remove(), 300);
            }
        }, 5000);
    </script>
    
    <style>
        /* User dropdown menu */
        .user-dropdown {
            position: absolute;
            top: 60px;
            right: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            min-width: 200px;
            padding: 8px 0;
            z-index: 1000;
        }
        
        .user-dropdown a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: var(--color-gray-700);
            text-decoration: none;
            font-size: 14px;
            transition: background 0.2s;
        }
        
        .user-dropdown a:hover {
            background: var(--color-gray-50);
        }
        
        .user-dropdown hr {
            margin: 8px 0;
            border: none;
            border-top: 1px solid var(--color-gray-200);
        }
        
        /* Alert styles */
        .alert {
            position: relative;
            padding: 16px 40px 16px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
            transition: opacity 0.3s ease;
        }
        
        .alert-close {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            background: none;
            border: none;
            font-size: 24px;
            line-height: 1;
            cursor: pointer;
            opacity: 0.5;
            transition: opacity 0.2s;
            padding: 0;
            width: 24px;
            height: 24px;
        }
        
        .alert-close:hover {
            opacity: 1;
        }
        
        .alert-success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #6ee7b7;
        }
        
        .alert-success .alert-close {
            color: #065f46;
        }
        
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        .alert-error .alert-close {
            color: #991b1b;
        }
    </style>
</body>
</html>
