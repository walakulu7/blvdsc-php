<?php
$page_title = 'Order Online';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$title = 'Order Online';
$subtitle = 'Skip the line and order ahead';
$backgroundImage = 'https://images.unsplash.com/photo-1498804103079-a6351b050096?q=80&w=2070&auto=format&fit=crop';
require_once 'includes/page-header.php';
?>

<main>
    <section class="section-padding bg-white">
        <div class="blvd-container">
            <div class="max-w-3xl mx-auto text-center">
                <svg class="mx-auto text-blvd-gold mb-6" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                    <path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path>
                    <line x1="6" y1="1" x2="6" y2="4"></line>
                    <line x1="10" y1="1" x2="10" y2="4"></line>
                    <line x1="14" y1="1" x2="14" y2="4"></line>
                </svg>
                <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Coming Soon</h2>
                <p class="text-blvd-charcoal/80 mb-10">
                    We're currently developing our online ordering system to make it easier for you to enjoy your favorite BLVD Coffee items. Soon you'll be able to order ahead for pickup or have our coffee beans delivered directly to your door.
                </p>
                
                <div class="mb-12">
                    <svg class="mx-auto text-blvd-gold/50 mb-6" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    <h3 class="font-display text-2xl font-light mb-4">In the meantime...</h3>
                    <p class="text-blvd-charcoal/80 mb-6">
                        You can still purchase our coffee beans, gift cards, and merchandise in-store. Visit us at <?php echo CONTACT_ADDRESS . ', ' . CONTACT_CITY; ?>, or give us a call to place an order for pickup.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <a href="<?php echo BASE_URL; ?>/menu.php" class="bg-blvd-cream p-8 rounded-sm hover:shadow-md transition-shadow">
                        <h3 class="font-display text-2xl font-light mb-4">Browse Our Menu</h3>
                        <p class="text-blvd-charcoal/80 mb-4">See what's available in-store and plan your next visit.</p>
                        <span class="text-blvd-gold underline">View Menu</span>
                    </a>
                    
                    <a href="<?php echo BASE_URL; ?>/contact.php" class="bg-blvd-cream p-8 rounded-sm hover:shadow-md transition-shadow">
                        <h3 class="font-display text-2xl font-light mb-4">Contact Us</h3>
                        <p class="text-blvd-charcoal/80 mb-4">Call ahead to place a pickup order or inquire about catering.</p>
                        <span class="text-blvd-gold underline">Get In Touch</span>
                    </a>
                </div>
                
                <div class="mt-12">
                    <p class="text-blvd-charcoal/80">
                        Want to be notified when online ordering launches? Sign up for our newsletter!
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto mt-6">
                        <input
                            type="email"
                            placeholder="Your email address"
                            class="flex-grow px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                        >
                        <button class="btn-primary whitespace-nowrap">
                            SIGN UP
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
