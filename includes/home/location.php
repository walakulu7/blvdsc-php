<section class="section-padding bg-white">
    <div class="blvd-container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <div>
                <span class="inline-block text-blvd-gold text-sm uppercase tracking-wider mb-4">Visit Us</span>
                <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Our Location</h2>
                <p class="text-blvd-charcoal/80 mb-8 leading-relaxed">
                    Located in the heart of Canning Vale, BLVD is more than just a coffee shop — it's a community hub where people connect, work, and relax in a welcoming environment.
                </p>

                <div class="mb-8">
                    <h4 class="font-medium mb-4 text-blvd-charcoal">Our Features</h4>
                    <ul class="space-y-2 text-blvd-charcoal/80 text-sm">
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-blvd-gold mr-2 flex-shrink-0" style="max-width: 16px; max-height: 16px; min-width: 16px; min-height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Pet-friendly shaded alfresco
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-blvd-gold mr-2 flex-shrink-0" style="max-width: 16px; max-height: 16px; min-width: 16px; min-height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Gluten-free menu available
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-blvd-gold mr-2 flex-shrink-0" style="max-width: 16px; max-height: 16px; min-width: 16px; min-height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Vegan & vegetarian options
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-blvd-gold mr-2 flex-shrink-0" style="max-width: 16px; max-height: 16px; min-width: 16px; min-height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Free WiFi
                        </li>
                        <li class="flex items-center">
                            <svg class="w-4 h-4 text-blvd-gold mr-2 flex-shrink-0" style="max-width: 16px; max-height: 16px; min-width: 16px; min-height: 16px;" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            Ample parking
                        </li>
                    </ul>
                </div>

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
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-medium mb-1">Opening Hours</h4>
                            <div class="text-blvd-charcoal/80 text-sm space-y-1">
                                <p><?php echo $opening_hours['weekday']; ?></p>
                                <p><?php echo $opening_hours['weekend']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <a href="<?php echo BASE_URL; ?>/contact.php" class="btn-primary">
                    GET DIRECTIONS
                </a>
            </div>
            
            <div class="h-full min-h-[400px] rounded-sm overflow-hidden">
                <!-- This would typically be a Google Maps embed, using a placeholder image for now -->
                <img 
                    src="https://images.unsplash.com/photo-1595867818082-083862f3d630?q=80&w=2070&auto=format&fit=crop" 
                    alt="BLVD Coffee location map - Canning Vale Perth with pet-friendly outdoor seating"
                    class="w-full h-full object-cover"
                >
            </div>
        </div>
    </div>
</section>
