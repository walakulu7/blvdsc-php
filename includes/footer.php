<footer class="bg-blvd-charcoal text-white pt-16 pb-8">
    <div class="blvd-container">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Brand Column -->
            <div class="col-span-1 md:col-span-1">
                <div class="mb-6">
                    <a href="<?php echo BASE_URL; ?>/index.php" class="flex items-center">
                        <svg class="mr-2 text-blvd-gold" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                            <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                            <line x1="6" y1="1" x2="6" y2="4"></line>
                            <line x1="10" y1="1" x2="10" y2="4"></line>
                            <line x1="14" y1="1" x2="14" y2="4"></line>
                        </svg>
                        <span class="text-2xl font-display font-light">BLVD</span>
                        <span class="ml-2 text-xs uppercase tracking-widest font-light"><?php echo SITE_TAGLINE; ?></span>
                    </a>
                </div>
                <p class="text-sm text-gray-400 mb-6">
                    Crafting exceptional coffee experiences since 2015. Our mission is to serve quality coffee in a welcoming space where community thrives.
                </p>
                <div class="flex space-x-4">
                    <a href="<?php echo SOCIAL_FACEBOOK; ?>" class="text-white hover:text-blvd-gold transition-colors">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="text-white hover:text-blvd-gold transition-colors">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                    </a>
                    <a href="<?php echo SOCIAL_TWITTER; ?>" class="text-white hover:text-blvd-gold transition-colors">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Menu Links Column -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">Menu</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="<?php echo BASE_URL; ?>/menu.php#coffee" class="hover:text-white transition-colors">Coffee</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/menu.php#breakfast" class="hover:text-white transition-colors">Breakfast</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/menu.php#lunch" class="hover:text-white transition-colors">Lunch</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/menu.php#pastries" class="hover:text-white transition-colors">Pastries</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/menu.php#beans" class="hover:text-white transition-colors">Coffee Beans</a></li>
                </ul>
            </div>

            <!-- Company Links Column -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">Company</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="<?php echo BASE_URL; ?>/about.php" class="hover:text-white transition-colors">Our Story</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Our Team</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/events.php" class="hover:text-white transition-colors">Events</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Careers</a></li>
                    <li><a href="<?php echo BASE_URL; ?>/contact.php" class="hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider mb-4">Visit Us</h4>
                <ul class="space-y-4 text-sm text-gray-400">
                    <li class="flex items-start">
                        <svg class="mr-2 mt-1 text-blvd-gold flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <span><?php echo CONTACT_ADDRESS; ?><br><?php echo CONTACT_CITY . ', ' . CONTACT_STATE . ' ' . CONTACT_ZIP; ?></span>
                    </li>
                    <li class="flex items-center">
                        <svg class="mr-2 text-blvd-gold flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                        </svg>
                        <span><?php echo CONTACT_PHONE; ?></span>
                    </li>
                    <li class="flex items-center">
                        <svg class="mr-2 text-blvd-gold flex-shrink-0" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span><?php echo CONTACT_EMAIL; ?></span>
                    </li>
                </ul>
                <div class="mt-6">
                    <a href="<?php echo BASE_URL; ?>/order.php" class="btn-primary">
                        ORDER ONLINE
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 pt-8 border-t border-gray-800 text-xs text-gray-500">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script src="<?php echo BASE_URL; ?>/assets/js/navbar.js"></script>
<script src="<?php echo BASE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
