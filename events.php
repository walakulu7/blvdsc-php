<?php
$page_title = 'Events & Workshops';
$page_description = 'Join coffee workshops, cupping sessions, latte art classes, and live music events at BLVD Canning Vale. Pet-friendly venue perfect for private events in Perth.';
require_once 'includes/header.php';
require_once 'includes/events_schema.json.php';
require_once 'includes/navbar.php';

$title = 'Events & Workshops';
$subtitle = 'Join us for coffee education and community gatherings';
$backgroundImage = 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=2074&auto=format&fit=crop';
require_once 'includes/page-header.php';

// Database connection
require_once 'config/database.php';

// Fetch published events from database (limit to 4 total)
try {
    $stmt = $pdo->prepare("
        SELECT * FROM events 
        WHERE status = 'published'
        ORDER BY event_date DESC
        LIMIT 4
    ");
    $stmt->execute();
    $dbEvents = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Events fetch error: " . $e->getMessage());
    $dbEvents = [];
}

// Format events for display - preserving exact same structure as current hardcoded array
$events = [];
$today = date('Y-m-d');

foreach ($dbEvents as $dbEvent) {
    // Format date
    $eventDate = date('F j, Y', strtotime($dbEvent['event_date']));
    
    // Format time range
    if (!empty($dbEvent['time_from']) && !empty($dbEvent['time_to'])) {
        $eventTime = date('g:i A', strtotime($dbEvent['time_from'])) . ' - ' . 
                    date('g:i A', strtotime($dbEvent['time_to']));
    } else {
        $eventTime = 'TBA';
    }
    
    // Check if event is in the past
    $isPast = $dbEvent['event_date'] < $today;
    
    // Build event array
    $events[] = [
        'id' => $dbEvent['id'],
        'title' => $dbEvent['title'],
        'date' => $eventDate,
        'time' => $eventTime,
        'description' => $dbEvent['description'],
        'image' => !empty($dbEvent['image_url']) 
            ? BASE_URL . '/uploads/image.php?file=' . urlencode($dbEvent['image_url'])
            : 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=2074&auto=format&fit=crop',
        'price' => $dbEvent['price_per_person'] ?? 'Contact for pricing',
        'location' => $dbEvent['location'] ?? 'BLVD Coffee, 123 Main Street',
        'is_past' => $isPast
    ];
}
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
                <?php if (empty($events)): ?>
                    <div class="text-center py-12">
                        <p class="text-blvd-charcoal/60 text-lg">
                            No events available at the moment. Check back soon!
                        </p>
                    </div>
                <?php else: ?>
                    <?php foreach ($events as $event): ?>
                        <!-- Apply opacity to past events for grayed-out effect -->
                        <div class="bg-blvd-cream p-6 rounded-sm grid grid-cols-1 md:grid-cols-3 gap-6<?= $event['is_past'] ? ' opacity-50' : '' ?>">
                            <div class="md:col-span-1">
                                <div class="h-64 rounded-sm overflow-hidden">
                                    <img 
                                        src="<?php echo htmlspecialchars($event['image']); ?>" 
                                        alt="<?php echo htmlspecialchars($event['title']); ?> at BLVD Canning Vale"
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
                                    <span><?php echo htmlspecialchars($event['location']); ?></span>
                                </div>
                                
                                <p class="text-blvd-charcoal/80 mb-4"><?php echo htmlspecialchars($event['description']); ?></p>
                                
                                <div class="flex flex-wrap items-center justify-between">
                                    <span class="font-medium"><?php echo htmlspecialchars($event['price']); ?></span>
                                    <?php if (!$event['is_past']): ?>
                                        <a href="<?php echo BASE_URL; ?>/contact.php" class="btn-primary mt-2 md:mt-0">
                                            BOOK NOW
                                        </a>
                                    <?php else: ?>
                                        <span class="text-blvd-charcoal/50 text-sm mt-2 md:mt-0">Past Event</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
            <div class="mt-16">
                <h3 class="font-display text-2xl font-light mb-6 text-center">Private Events</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        <img 
                            src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?q=80&w=2070&auto=format&fit=crop" 
                            alt="Private event at BLVD Coffee - Pet-friendly venue for celebrations in Canning Vale Perth"
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
