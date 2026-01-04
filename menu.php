<?php
$page_title = 'Our Menu';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$title = 'Our Menu';
$subtitle = 'Carefully crafted coffee and food made with quality ingredients';
$backgroundImage = 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=2070&auto=format&fit=crop';
require_once 'includes/page-header.php';
?>

<main>
    <section class="section-padding bg-white">
        <div class="blvd-container">
            <div class="w-full max-w-4xl mx-auto">
                <!-- Tab Navigation -->
                <div class="grid grid-cols-2 md:grid-cols-5 w-full mb-8 border-b border-blvd-beige">
                    <button role="tab" data-target="coffee" aria-selected="true" class="py-3 px-4 text-sm font-medium border-b-2 border-blvd-gold text-blvd-charcoal transition-colors">Coffee</button>
                    <button role="tab" data-target="breakfast" aria-selected="false" class="py-3 px-4 text-sm font-medium border-b-2 border-transparent text-blvd-charcoal/60 hover:text-blvd-charcoal transition-colors">Breakfast</button>
                    <button role="tab" data-target="lunch" aria-selected="false" class="py-3 px-4 text-sm font-medium border-b-2 border-transparent text-blvd-charcoal/60 hover:text-blvd-charcoal transition-colors">Lunch</button>
                    <button role="tab" data-target="pastries" aria-selected="false" class="py-3 px-4 text-sm font-medium border-b-2 border-transparent text-blvd-charcoal/60 hover:text-blvd-charcoal transition-colors">Pastries</button>
                    <button role="tab" data-target="beans" aria-selected="false" class="py-3 px-4 text-sm font-medium border-b-2 border-transparent text-blvd-charcoal/60 hover:text-blvd-charcoal transition-colors">Coffee Beans</button>
                </div>
                
                <!-- Coffee Tab -->
                <div id="coffee" role="tabpanel">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        <div>
                            <h2 class="font-display text-2xl mb-6">Espresso</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Espresso</h3>
                                        <span class="text-blvd-gold">$4.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">A rich, concentrated coffee served in a small cup</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Macchiato</h3>
                                        <span class="text-blvd-gold">$4.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Espresso with a dash of frothy milk</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Cortado</h3>
                                        <span class="text-blvd-gold">$5.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Equal parts espresso and warm milk</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Flat White</h3>
                                        <span class="text-blvd-gold">$5.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Espresso with steamed milk and minimal foam</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-display text-2xl mb-6">Specialty</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Pour Over</h3>
                                        <span class="text-blvd-gold">$6.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Hand-brewed coffee highlighting complex flavor notes</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Cold Brew</h3>
                                        <span class="text-blvd-gold">$5.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Smooth, low-acidity coffee steeped for 24 hours</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Affogato</h3>
                                        <span class="text-blvd-gold">$6.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Espresso poured over a scoop of vanilla ice cream</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">BLVD Signature Latte</h3>
                                        <span class="text-blvd-gold">$6.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Our special blend with hints of caramel and vanilla</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Breakfast Tab -->
                <div id="breakfast" role="tabpanel" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        <div>
                            <h2 class="font-display text-2xl mb-6">Morning Favorites</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Avocado Toast</h3>
                                        <span class="text-blvd-gold">$14.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Sourdough toast, smashed avocado, poached egg, chili flakes</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Breakfast Bowl</h3>
                                        <span class="text-blvd-gold">$16.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Quinoa, kale, poached eggs, avocado, roasted tomatoes</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">French Toast</h3>
                                        <span class="text-blvd-gold">$15.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Brioche bread, mixed berries, maple syrup, whipped cream</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-display text-2xl mb-6">Eggs & More</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Eggs Benedict</h3>
                                        <span class="text-blvd-gold">$16.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">English muffin, poached eggs, hollandaise, choice of ham or spinach</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Breakfast Burrito</h3>
                                        <span class="text-blvd-gold">$15.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Scrambled eggs, black beans, avocado, cheese, salsa</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Classic Breakfast</h3>
                                        <span class="text-blvd-gold">$18.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Two eggs any style, bacon, toast, roasted tomatoes, mushrooms</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Lunch Tab -->
                <div id="lunch" role="tabpanel" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        <div>
                            <h2 class="font-display text-2xl mb-6">Sandwiches</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Chicken Pesto Panini</h3>
                                        <span class="text-blvd-gold">$16.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Grilled chicken, pesto, mozzarella, tomato on sourdough</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Mediterranean Veggie</h3>
                                        <span class="text-blvd-gold">$14.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Hummus, roasted vegetables, feta, olive tapenade on focaccia</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">BLVD Club</h3>
                                        <span class="text-blvd-gold">$17.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Turkey, bacon, avocado, lettuce, tomato on multi-grain bread</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-display text-2xl mb-6">Salads</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Quinoa & Kale</h3>
                                        <span class="text-blvd-gold">$15.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Quinoa, kale, roasted sweet potato, cranberries, almonds, lemon dressing</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Chicken Caesar</h3>
                                        <span class="text-blvd-gold">$16.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Grilled chicken, romaine, parmesan, croutons, house-made Caesar dressing</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Mediterranean Bowl</h3>
                                        <span class="text-blvd-gold">$16.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Falafel, hummus, tabbouleh, mixed greens, tzatziki sauce</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pastries Tab -->
                <div id="pastries" role="tabpanel" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        <div>
                            <h2 class="font-display text-2xl mb-6">Sweet Treats</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Croissant</h3>
                                        <span class="text-blvd-gold">$4.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Traditional butter croissant, baked fresh daily</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Pain au Chocolat</h3>
                                        <span class="text-blvd-gold">$5.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Chocolate-filled croissant pastry</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Cinnamon Roll</h3>
                                        <span class="text-blvd-gold">$5.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Swirled pastry with cinnamon, sugar, and vanilla glaze</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-display text-2xl mb-6">Cookies & More</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Chocolate Chip Cookie</h3>
                                        <span class="text-blvd-gold">$3.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Classic cookie with semi-sweet chocolate chunks</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Blueberry Muffin</h3>
                                        <span class="text-blvd-gold">$4.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Moist muffin packed with fresh blueberries</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Banana Bread</h3>
                                        <span class="text-blvd-gold">$4.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Homemade with ripe bananas and walnuts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Coffee Beans Tab -->
                <div id="beans" role="tabpanel" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">
                        <div>
                            <h2 class="font-display text-2xl mb-6">Single Origin</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Ethiopian Yirgacheffe</h3>
                                        <span class="text-blvd-gold">$18.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Floral and citrus notes with a bright acidity, 250g</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Colombian Supremo</h3>
                                        <span class="text-blvd-gold">$16.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Rich caramel sweetness with hints of chocolate, 250g</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Costa Rican Tarrazu</h3>
                                        <span class="text-blvd-gold">$17.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Bold body with notes of honey and tropical fruit, 250g</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h2 class="font-display text-2xl mb-6">House Blends</h2>
                            <div class="space-y-6">
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">BLVD Signature Blend</h3>
                                        <span class="text-blvd-gold">$15.50</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Our flagship blend with notes of chocolate, caramel, and nuts, 250g</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Espresso Blend</h3>
                                        <span class="text-blvd-gold">$16.80</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Dark roast with a rich crema and robust flavor, 250g</p>
                                </div>
                                <div>
                                    <div class="flex justify-between items-center mb-2">
                                        <h3 class="font-medium">Decaf Blend</h3>
                                        <span class="text-blvd-gold">$17.20</span>
                                    </div>
                                    <p class="text-sm text-blvd-charcoal/80">Swiss water process decaffeinated with full flavor, 250g</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
