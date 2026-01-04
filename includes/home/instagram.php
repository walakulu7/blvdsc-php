<?php
$instagramPosts = [
    ['id' => 1, 'image' => 'https://images.unsplash.com/photo-1442512595331-e89e73853f31?q=80&w=2070&auto=format&fit=crop', 'alt' => 'Coffee art latte'],
    ['id' => 2, 'image' => 'https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?q=80&w=2067&auto=format&fit=crop', 'alt' => 'Coffee beans'],
    ['id' => 3, 'image' => 'https://images.unsplash.com/photo-1534040385115-33dcb3acba5b?q=80&w=1974&auto=format&fit=crop', 'alt' => 'BLVD interior'],
    ['id' => 4, 'image' => 'https://images.unsplash.com/photo-1579888944880-d98341245702?q=80&w=2070&auto=format&fit=crop', 'alt' => 'Pastries and coffee'],
    ['id' => 5, 'image' => 'https://images.unsplash.com/photo-1506619216599-9d16d0903dfd?q=80&w=2069&auto=format&fit=crop', 'alt' => 'Coffee brewing'],
    ['id' => 6, 'image' => 'https://images.unsplash.com/photo-1525193612562-0ec53b0e5d7c?q=80&w=2070&auto=format&fit=crop', 'alt' => 'Coffee shop atmosphere'],
];
?>
<section class="section-padding bg-blvd-beige">
    <div class="blvd-container">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="inline-block text-blvd-gold text-sm uppercase tracking-wider mb-4">Social</span>
            <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Follow Our Journey</h2>
            <p class="text-blvd-charcoal/80 leading-relaxed mb-4">
                Join our community on Instagram and share your BLVD moments with us.
            </p>
            <a 
                href="<?php echo SOCIAL_INSTAGRAM; ?>" 
                target="_blank" 
                rel="noopener noreferrer"
                class="inline-flex items-center text-blvd-gold hover:text-blvd-taupe transition-colors"
            >
                <svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
                @blvdcoffee
            </a>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
            <?php foreach ($instagramPosts as $post): ?>
                <div class="aspect-square overflow-hidden group cursor-pointer">
                    <img 
                        src="<?php echo htmlspecialchars($post['image']); ?>" 
                        alt="<?php echo htmlspecialchars($post['alt']); ?>"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
