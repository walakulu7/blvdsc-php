<?php
$page_title = 'Events & Workshops';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$title = 'Events & Workshops';
$subtitle = 'Join us for coffee education and community gatherings';
$backgroundImage = 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=2074&auto=format&fit=crop';
require_once 'includes/page-header.php';

$events = [
    [
        'id' => 1,
        'title' => 'Coffee Cupping Workshop',
        'date' => 'June 15, 2024',
        'time' => '9:00 AM - 11:00 AM',
        'description' => 'Join our master barista for an interactive coffee tasting experience. Learn how to identify flavor notes and appreciate different coffee origins.',
        'image' => 'https://images.unsplash.com/photo-1442512595331-e89e73853f31?q=80&w=2070&auto=format&fit=crop',
        'price' => '$35 per person'
    ],
    [
        'id' => 2,
        'title' => 'Latte Art Masterclass',
        'date' => 'June 22, 2024',
        'time' => '2:00 PM - 4:00 PM',
        'description' => 'Learn the techniques behind creating beautiful latte art. This hands-on workshop will cover basic patterns and advanced designs.',
        'image' => 'https://images.unsplash.com/photo-1534040385115-33dcb3acba5b?q=80&w=1974&auto=format&fit=crop',
        'price' => '$40 per person'
    ],
    [
        'id' => 3,
        'title' => 'Acoustic Music Night',
        'date' => 'June 28, 2024',
        'time' => '7:00 PM - 9:00 PM',
        'description' => 'Enjoy the soulful sounds of local musicians in our cozy café environment. Light refreshments and full coffee menu available.',
        'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=2074&auto=format&fit=crop',
        'price' => 'Free entry'
    ],
    [
        'id' => 4,
        'title' => 'Home Brewing Methods',
        'date' => 'July 8, 2024',
        'time' => '10:00 AM - 12:00 PM',
        'description' => 'Discover how to brew café-quality coffee at home. We\'ll explore various brewing methods including pour-over, French press, AeroPress, and more.',
        'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop',
        'price' => '$30 per person'
    ],
];
?>

<main>
    <section class="section-padding bg-white">
        <div class="blvd-container">
            <div class="max-w-3xl mx-auto mb-12">
                <h2 class="font-display text-3xl font-light mb-6 text-center">Upcoming Events</h2>
                <p class="text-blvd-charcoal/80 text-center mb-8">
                    At BLVD Coffee, we love bringing people together. From coffee workshops to live music evenings, our events are designed to create community and share our passion for great coffee.
                </p>
                
                <div class="text-center mb-12">
                    <a href="<?php echo BASE_URL; ?>/contact.php" class="btn-primary">
                        INQUIRE ABOUT PRIVATE EVENTS
                    </a>
                </div>
            </div>
            
            <div class="space-y-12">
                <?php foreach ($events as $event): ?>
                    <div class="bg-blvd-cream p-6 rounded-sm grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="md:col-span-1">
                            <div class="h-48 md:h-full rounded-sm overflow-hidden">
                                <img 
                                    src="<?php echo htmlspecialchars($event['image']); ?>" 
                                    alt="<?php echo htmlspecialchars($event['title']); ?>"
                                    class="w-full h-full object-cover"
                                >
                            </div>
                        </div>
                        
                        <div class="md:col-span-2">
                            <h3 class="font-display text-2xl font-light mb-3"><?php echo htmlspecialchars($event['title']); ?></h3>
                            
                            <div class="flex items-center mb-2 text-sm text-blvd-charcoal/80">
                                <svg class="mr-2 text-blvd-gold" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <span><?php echo htmlspecialchars($event['date']); ?></span>
                                <svg class="ml-4 mr-2 text-blvd-gold" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span><?php echo htmlspecialchars($event['time']); ?></span>
                            </div>
                            
                            <div class="flex items-center mb-4 text-sm text-blvd-charcoal/80">
                                <svg class="mr-2 text-blvd-gold" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span>BLVD Coffee, 123 Main Street</span>
                            </div>
                            
                            <p class="text-blvd-charcoal/80 mb-4"><?php echo htmlspecialchars($event['description']); ?></p>
                            
                            <div class="flex flex-wrap items-center justify-between">
                                <span class="font-medium"><?php echo htmlspecialchars($event['price']); ?></span>
                                <a href="<?php echo BASE_URL; ?>/contact.php" class="btn-primary mt-2 md:mt-0">
                                    BOOK NOW
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <div class="mt-16">
                <h3 class="font-display text-2xl font-light mb-6 text-center">Private Events</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        <img 
                            src="https://images.unsplash.com/photo-1522682178963-d2e96cc8d978?q=80&w=1974&auto=format&fit=crop" 
                            alt="Private event at BLVD Coffee"
                            class="w-full h-auto rounded-sm"
                        >
                    </div>
                    <div>
                        <p class="text-blvd-charcoal/80 mb-6">
                            Our café is available for private bookings outside regular hours. Whether you're planning a corporate gathering, book club meeting, or celebration, our space can be customized to your needs.
                        </p>
                        <p class="text-blvd-charcoal/80 mb-6">
                            We offer catering options featuring our signature coffee drinks and a selection of pastries, sandwiches, and other light fare. Our team will work with you to create a memorable experience for your guests.
                        </p>
                        <p class="text-blvd-charcoal/80 mb-8">
                            For pricing and availability, please contact our events team at <?php echo EMAIL_EVENTS; ?> or fill out the inquiry form on our contact page.
                        </p>
                        <a href="<?php echo BASE_URL; ?>/contact.php" class="btn-primary">
                            INQUIRE NOW
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
