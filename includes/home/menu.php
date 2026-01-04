<?php
$menuItems = [
    [
        'id' => 1,
        'name' => 'Signature Coffee',
        'description' => 'Our hand-selected beans are roasted to perfection and prepared using methods that bring out their unique flavors.',
        'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop',
        'link' => '/menu.php#coffee'
    ],
    [
        'id' => 2,
        'name' => 'Artisan Pastries',
        'description' => 'Freshly baked daily in our kitchen, our pastries are the perfect companion to your morning coffee.',
        'image' => 'https://images.unsplash.com/photo-1509440159596-0249088772ff?q=80&w=2072&auto=format&fit=crop',
        'link' => '/menu.php#pastries'
    ],
    [
        'id' => 3,
        'name' => 'Breakfast & Lunch',
        'description' => 'From hearty breakfast options to delicious lunch selections, we offer nutritious meals made with locally sourced ingredients.',
        'image' => 'https://images.unsplash.com/photo-1525351484163-7529414344d8?q=80&w=2080&auto=format&fit=crop',
        'link' => '/menu.php#meals'
    ],
    [
        'id' => 4,
        'name' => 'Specialty Drinks',
        'description' => 'Explore our range of specialty beverages, from seasonal lattes to refreshing cold brews and tea options.',
        'image' => 'https://images.unsplash.com/photo-1461023058943-07fcbe16d735?q=80&w=2069&auto=format&fit=crop',
        'link' => '/menu.php#specialty'
    ],
];
?>
<section class="section-padding bg-blvd-cream">
    <div class="blvd-container">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="inline-block text-blvd-gold text-sm uppercase tracking-wider mb-4">Our Menu</span>
            <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Crafted With Care</h2>
            <p class="text-blvd-charcoal/80 leading-relaxed">
                We take pride in every item we serve, from our specialty coffees to our house-made pastries and meals. Each creation reflects our commitment to quality and passion for great taste.
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($menuItems as $item): ?>
                <div class="bg-white group overflow-hidden">
                    <div class="flex flex-col md:flex-row h-full">
                        <div class="md:w-2/5 relative overflow-hidden">
                            <img 
                                src="<?php echo htmlspecialchars($item['image']); ?>" 
                                alt="<?php echo htmlspecialchars($item['name']); ?>"
                                class="w-full h-48 md:h-full object-cover transition-transform duration-700 group-hover:scale-105"
                            >
                        </div>
                        <div class="md:w-3/5 p-6 md:p-8 flex flex-col justify-between">
                            <div>
                                <h3 class="font-display text-xl mb-3"><?php echo htmlspecialchars($item['name']); ?></h3>
                                <p class="text-blvd-charcoal/80 text-sm mb-6"><?php echo htmlspecialchars($item['description']); ?></p>
                            </div>
                            <a 
                                href="<?php echo BASE_URL . $item['link']; ?>"
                                class="text-blvd-gold underline text-sm font-medium uppercase tracking-wider hover:text-blvd-taupe"
                            >
                                View Menu
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-12">
            <a href="<?php echo BASE_URL; ?>/menu.php" class="btn-primary">
                FULL MENU
            </a>
        </div>
    </div>
</section>
