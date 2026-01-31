<?php
$page_title = 'Contact Us';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$title = 'Contact Us';
$subtitle = 'We\'d love to hear from you';
$backgroundImage = 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop';
require_once 'includes/page-header.php';
?>

<main>
    <section class="section-padding bg-white">
        <div class="blvd-container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h2 class="font-display text-3xl font-light mb-6">Get In Touch</h2>
                    <p class="text-blvd-charcoal/80 mb-8 leading-relaxed">
                        We welcome your questions, feedback, and inquiries. Whether you're looking to book our space for an event, learn more about our coffee sourcing, or simply want to say hello, our team is here to help.
                    </p>
                    
                    <div class="space-y-8 mb-10">
                        <div class="flex items-start">
                            <div class="mr-4 text-blvd-gold">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium mb-1">Visit Us</h3>
                                <p class="text-blvd-charcoal/80 text-sm"><?php echo CONTACT_ADDRESS . ', ' . CONTACT_CITY . ' ' . CONTACT_STATE . ' ' . CONTACT_ZIP; ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="mr-4 text-blvd-gold">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium mb-1">Call Us</h3>
                                <p class="text-blvd-charcoal/80 text-sm"><?php echo CONTACT_PHONE; ?></p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="mr-4 text-blvd-gold">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-medium mb-1">Email Us</h3>
                                <p class="text-blvd-charcoal/80 text-sm"><?php echo CONTACT_EMAIL; ?></p>
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
                                <h3 class="font-medium mb-1">Hours</h3>
                                <div class="text-blvd-charcoal/80 text-sm space-y-1">
                                    <p><?php echo $opening_hours['weekday']; ?></p>
                                    <p><?php echo $opening_hours['weekend']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-lg mb-4">Inquiries</h3>
                        <p class="text-blvd-charcoal/80 text-sm">
                            For all inquiries including catering, events, careers, and press, please contact us at <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="text-blvd-gold hover:underline"><?php echo CONTACT_EMAIL; ?></a>
                        </p>
                    </div>
                </div>
                
                <div class="bg-blvd-cream p-8 rounded-sm">
                    <h2 class="font-display text-2xl font-light mb-6">Send Us a Message</h2>
                    <form id="contact-form">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-sm mb-1">Name</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name"
                                    required
                                    class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                    placeholder="Your Name"
                                >
                            </div>
                            <div>
                                <label for="email" class="block text-sm mb-1">Email</label>
                                <input 
                                    type="email" 
                                    id="email" 
                                    name="email"
                                    required
                                    class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                    placeholder="Your Email"
                                >
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="subject" class="block text-sm mb-1">Subject</label>
                            <input 
                                type="text" 
                                id="subject" 
                                name="subject"
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                placeholder="Subject"
                            >
                        </div>
                        
                        <div class="mb-6">
                            <label for="message" class="block text-sm mb-1">Message</label>
                            <textarea 
                                id="message" 
                                name="message"
                                rows="5"
                                required
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                placeholder="Your Message"
                            ></textarea>
                        </div>
                        
                        <button 
                            type="submit" 
                            class="btn-primary flex items-center justify-center w-full"
                        >
                            <svg class="mr-2" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                            SEND MESSAGE
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Getting Here Section -->
            <div class="mt-16 pt-16 border-t border-blvd-beige">
                <h2 class="font-display text-3xl font-light mb-8 text-center">Getting Here</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                    <div class="flex items-start">
                        <svg class="mr-3 text-blvd-gold flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M19 17h2c.6 0 1-.4 1-1v-3c0-.9-.7-1.7-1.5-1.9C18.7 10.6 16 10 16 10s-1.3-1.4-2.2-2.3c-.5-.4-1.1-.7-1.8-.7H5c-.6 0-1.1.4-1.4.9l-1.4 2.9A3.7 3.7 0 0 0 2 12v4c0 .6.4 1 1 1h2"></path>
                            <circle cx="7" cy="17" r="2"></circle>
                            <path d="M9 17h6"></path>
                            <circle cx="17" cy="17" r="2"></circle>
                        </svg>
                        <div>
                            <h3 class="font-medium text-lg mb-2">By Car</h3>
                            <p class="text-sm text-blvd-charcoal/80">Metered parking available on Main Street and in the Wilson Parking garage on Cross Street.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <svg class="mr-3 text-blvd-gold flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                        </svg>
                        <div>
                            <h3 class="font-medium text-lg mb-2">By Train</h3>
                            <p class="text-sm text-blvd-charcoal/80">We're a 5-minute walk from Central Station. Take the north exit and head east.</p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <svg class="mr-3 text-blvd-gold flex-shrink-0" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 18a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2"></path>
                            <path d="M12 2v16"></path>
                            <path d="M7 18h10"></path>
                        </svg>
                        <div>
                            <h3 class="font-medium text-lg mb-2">By Bus</h3>
                            <p class="text-sm text-blvd-charcoal/80">Routes 301, 302, and 305 stop directly in front of our café.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Our Space Section -->
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
