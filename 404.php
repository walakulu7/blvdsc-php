<?php
$page_title = '404 - Page Not Found';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<main>
    <section class="section-padding bg-white min-h-screen flex items-center">
        <div class="blvd-container">
            <div class="max-w-2xl mx-auto text-center">
                <h1 class="font-display text-6xl md:text-8xl font-light text-blvd-gold mb-6">404</h1>
                <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Page Not Found</h2>
                <p class="text-blvd-charcoal/80 mb-10 text-lg">
                    Oops! The page you're looking for seems to have wandered off. Perhaps it's getting a coffee?
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="<?php echo BASE_URL; ?>/index.php" class="btn-primary">
                        BACK TO HOME
                    </a>
                    <a href="<?php echo BASE_URL; ?>/menu.php" class="px-6 py-3 border border-blvd-gold text-blvd-gold text-sm uppercase tracking-wider font-medium transition-all hover:bg-blvd-gold hover:text-white">
                        VIEW MENU
                    </a>
                </div>
                
                <div class="mt-16">
                    <svg class="mx-auto text-blvd-gold/30" width="120" height="120" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                        <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                        <line x1="6" y1="1" x2="6" y2="4"></line>
                        <line x1="10" y1="1" x2="10" y2="4"></line>
                        <line x1="14" y1="1" x2="14" y2="4"></line>
                    </svg>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
