<section class="section-padding bg-blvd-sand">
    <div class="blvd-container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <span class="inline-block text-blvd-gold text-sm uppercase tracking-wider mb-4">Get In Touch</span>
                <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Contact Us</h2>
                <p class="text-blvd-charcoal/80 mb-8 leading-relaxed">
                    Have questions, suggestions, or interested in catering services? We'd love to hear from you! Reach out to our team through any of the channels below.
                </p>
                
                <div class="space-y-6 mb-8">
                    <div class="flex items-start">
                        <div class="mr-4 text-blvd-gold">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">Address</h4>
                            <p class="text-blvd-charcoal/80 text-sm"><?php echo CONTACT_ADDRESS . ', ' . CONTACT_CITY . ' ' . CONTACT_STATE . ' ' . CONTACT_ZIP; ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="mr-4 text-blvd-gold">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">Phone</h4>
                            <p class="text-blvd-charcoal/80 text-sm"><?php echo CONTACT_PHONE; ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="mr-4 text-blvd-gold">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">Email</h4>
                            <p class="text-blvd-charcoal/80 text-sm"><?php echo CONTACT_EMAIL; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-white p-8">
                <h3 class="font-display text-2xl mb-6">Send Us a Message</h3>
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
