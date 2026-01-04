<?php
$current_page = get_current_page();
$nav_links = [
    ['name' => 'HOME', 'path' => 'index.php', 'page' => 'home'],
    ['name' => 'ABOUT', 'path' => 'about.php', 'page' => 'about'],
    ['name' => 'MENU', 'path' => 'menu.php', 'page' => 'menu'],
    ['name' => 'LOCATION', 'path' => 'location.php', 'page' => 'location'],
    ['name' => 'EVENTS', 'path' => 'events.php', 'page' => 'events'],
    ['name' => 'RESERVE', 'path' => 'reserve.php', 'page' => 'reserve'],
    ['name' => 'CONTACT', 'path' => 'contact.php', 'page' => 'contact'],
];
?>
<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent py-4">
    <div class="blvd-container">
        <nav class="flex items-center justify-between">
            <!-- Logo -->
            <a href="<?php echo BASE_URL; ?>/index.php" class="flex items-center transition-colors text-white">
                <svg class="mr-2 navbar-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                    <line x1="6" y1="1" x2="6" y2="4"></line>
                    <line x1="10" y1="1" x2="10" y2="4"></line>
                    <line x1="14" y1="1" x2="14" y2="4"></line>
                </svg>
                <span class="text-2xl font-display font-light">BLVD</span>
                <span class="ml-2 text-xs uppercase tracking-widest font-light"><?php echo SITE_TAGLINE; ?></span>
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <?php foreach ($nav_links as $link): ?>
                    <a href="<?php echo BASE_URL . '/' . $link['path']; ?>" 
                       class="text-xs tracking-wider font-medium hover:text-blvd-gold transition-colors navbar-link <?php echo is_active($link['page']) ? 'active' : ''; ?>">
                        <?php echo $link['name']; ?>
                    </a>
                <?php endforeach; ?>
                <a href="<?php echo BASE_URL; ?>/order.php" class="btn-primary">
                    ORDER ONLINE
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden transition-colors navbar-link">
                <svg id="menu-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
                <svg id="close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </nav>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden bg-white hidden">
        <div class="py-4 px-6 space-y-4">
            <?php foreach ($nav_links as $link): ?>
                <a href="<?php echo BASE_URL . '/' . $link['path']; ?>" 
                   class="block py-2 text-sm tracking-wider text-blvd-charcoal hover:text-blvd-gold transition-colors">
                    <?php echo $link['name']; ?>
                </a>
            <?php endforeach; ?>
            <a href="<?php echo BASE_URL; ?>/order.php" 
               class="block btn-primary w-full text-center mt-6">
                ORDER ONLINE
            </a>
        </div>
    </div>
</header>
