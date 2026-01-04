<?php
$page_title = 'Find Us';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$title = 'Find Us';
$subtitle = 'Visit our coffee shop in Melbourne';
$backgroundImage = 'https://images.unsplash.com/photo-1513267048331-5611cad62e41?q=80&w=2070&auto=format&fit=crop';
require_once 'includes/page-header.php';
?>

<main>
    <section class="section-padding bg-white">
        <div class="blvd-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h2 class="font-display text-3xl font-light mb-6">Our Location</h2>
                    
                    <div class="space-y-8 mb-8">
                        <div class="flex items-start">
                            <div class="mr-4 text-blvd-gold">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-lg mb-2">Address</h3>
                                <p class="text-blvd-charcoal/80">
                                    <?php echo CONTACT_ADDRESS; ?><br>
                                    <?php echo CONTACT_CITY . ', ' . CONTACT_STATE . ' ' . CONTACT_ZIP; ?><br>
                                    <?php echo CONTACT_COUNTRY; ?>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="mr-4 text-blvd-gold">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium text-lg mb-2">Opening Hours</h3>
                                <div class="space-y-1 text-blvd-charcoal/80">
                                    <p><?php echo $opening_hours['weekday']; ?></p>
                                    <p><?php echo $opening_hours['saturday']; ?></p>
                                    <p><?php echo $opening_hours['sunday']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h3 class="font-medium text-lg mb-4">Getting Here</h3>
                    
                    <div class="space-y-5">
                        <div class="flex items-center">
                            <svg class="mr-3 text-blvd-gold" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                                <circle cx="7" cy="17" r="2"></circle>
                                <path d="M9 17h6"></path>
                                <circle cx="17" cy="17" r="2"></circle>
                            </svg>
                            <div>
                                <h4 class="font-medium">By Car</h4>
                                <p class="text-sm text-blvd-charcoal/80">Metered parking available on Main Street and in the Wilson Parking garage on Cross Street.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <svg class="mr-3 text-blvd-gold" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                            </svg>
                            <div>
                                <h4 class="font-medium">By Train</h4>
                                <p class="text-sm text-blvd-charcoal/80">We're a 5-minute walk from Central Station. Take the north exit and head east.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center">
                            <svg class="mr-3 text-blvd-gold" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 18a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2"></path>
                                <path d="M12 2v16"></path>
                                <path d="M7 18h10"></path>
                            </svg>
                            <div>
                                <h4 class="font-medium">By Bus</h4>
                                <p class="text-sm text-blvd-charcoal/80">Routes 301, 302, and 305 stop directly in front of our café.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="h-full min-h-[500px] rounded-sm overflow-hidden">
                    <!-- This would typically be a Google Maps embed -->
                    <img 
                        src="https://images.unsplash.com/photo-1595867818082-083862f3d630?q=80&w=2070&auto=format&fit=crop" 
                        alt="Map showing BLVD Coffee location"
                        class="w-full h-full object-cover"
                    >
                </div>
            </div>
            
            <div class="mt-16">
                <h2 class="font-display text-3xl font-light mb-8 text-center">Our Space</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <img 
                            src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?q=80&w=2070&auto=format&fit=crop" 
                            alt="BLVD Coffee interior"
                            class="w-full h-64 object-cover rounded-sm mb-4"
                        >
                        <h3 class="font-medium text-lg mb-2">Cozy Seating</h3>
                        <p class="text-sm text-blvd-charcoal/80">
                            Our café features comfortable seating arrangements for individuals and groups, perfect for working, studying, or catching up with friends.
                        </p>
                    </div>
                    
                    <div>
                        <img 
                            src="https://images.unsplash.com/photo-1600093463592-8e36ae95ef56?q=80&w=2070&auto=format&fit=crop" 
                            alt="BLVD Coffee barista station"
                            class="w-full h-64 object-cover rounded-sm mb-4"
                        >
                        <h3 class="font-medium text-lg mb-2">Barista Bar</h3>
                        <p class="text-sm text-blvd-charcoal/80">
                            Watch our skilled baristas craft your perfect beverage at our custom-built coffee bar featuring state-of-the-art equipment.
                        </p>
                    </div>
                    
                    <div>
                        <img 
                            src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2047&auto=format&fit=crop" 
                            alt="BLVD Coffee outdoor seating"
                            class="w-full h-64 object-cover rounded-sm mb-4"
                        >
                        <h3 class="font-medium text-lg mb-2">Outdoor Patio</h3>
                        <p class="text-sm text-blvd-charcoal/80">
                            Enjoy your coffee in the fresh air on our landscaped patio, a tranquil urban oasis perfect for sunny days.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
