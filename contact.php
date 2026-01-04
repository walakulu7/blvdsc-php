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
                                    <p><?php echo $opening_hours['saturday']; ?></p>
                                    <p><?php echo $opening_hours['sunday']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="font-medium text-lg mb-4">Inquiries</h3>
                        <div class="space-y-3 text-blvd-charcoal/80 text-sm">
                            <p><span class="font-medium">Catering:</span> <?php echo EMAIL_CATERING; ?></p>
                            <p><span class="font-medium">Events:</span> <?php echo EMAIL_EVENTS; ?></p>
                            <p><span class="font-medium">Careers:</span> <?php echo EMAIL_CAREERS; ?></p>
                            <p><span class="font-medium">Press:</span> <?php echo EMAIL_MEDIA; ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-blvd-cream p-8 rounded-sm">
                    <h2 class="font-display text-2xl font-light mb-6">Send Us a Message</h2>
                    <form>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-sm mb-1">Name</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                    placeholder="Your Name"
                                >
                            </div>
                            <div>
                                <label for="email" class="block text-sm mb-1">Email</label>
                                <input 
                                    type="email" 
                                    id="email" 
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
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                placeholder="Subject"
                            >
                        </div>
                        
                        <div class="mb-6">
                            <label for="message" class="block text-sm mb-1">Message</label>
                            <textarea 
                                id="message" 
                                rows="5"
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
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
