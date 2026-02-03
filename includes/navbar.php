<?php
$current_page = get_current_page();
$menu_items = [
    ['name' => 'HOME', 'path' => 'index.php', 'page' => 'home'],
    ['name' => 'ABOUT', 'path' => 'about.php', 'page' => 'about'],
    ['name' => 'MENU', 'path' => 'menu.php', 'page' => 'menu'],
    ['name' => 'EVENTS', 'path' => 'events.php', 'page' => 'events'],
    ['name' => 'RESERVE', 'path' => 'reserve.php', 'page' => 'reserve'],
    ['name' => 'CONTACT', 'path' => 'contact.php', 'page' => 'contact'],
];
?>
<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent py-4">
    <div class="blvd-container">
        <nav class="flex items-center justify-between">
            <!-- Logo -->
            <a href="<?php echo BASE_URL; ?>/index.php" class="transition-opacity hover:opacity-80">
                <img src="<?php echo BASE_URL; ?>/assets/images/blvdsc-logo.png" alt="BLVD Specialty Coffee" class="h-6" style="width: 250px; height: 30px;">
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-8">
                <?php foreach ($menu_items as $link): ?>
                    <a href="<?php echo BASE_URL . '/' . $link['path']; ?>" 
                       class="text-xs tracking-wider font-medium hover:text-blvd-gold transition-colors navbar-link <?php echo is_active($link['page']) ? 'active' : ''; ?>">
                        <?php echo $link['name']; ?>
                    </a>
                <?php endforeach; ?>
                <a href="https://blvdsc.square.site/" class="btn-primary">
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
            <?php foreach ($menu_items as $link): ?>
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
