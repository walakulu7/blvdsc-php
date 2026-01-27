<!-- Page Header -->
<div class="relative pt-24 pb-16 md:pb-24">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0">
    <div 
      class="h-full w-full bg-cover bg-center bg-no-repeat" 
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=2070&auto=format&fit=crop');">
    </div>
  </div>
  
  <!-- Content -->
  <div class="relative z-10 blvd-container h-full flex items-center justify-center text-center py-16 md:py-24">
    <div class="text-white">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-light mb-4">
        Our Menu
      </h1>
      <p class="text-lg md:text-xl font-light max-w-2xl mx-auto">
        Carefully crafted coffee and food made with quality ingredients
      </p>
    </div>
  </div>
</div>

<!-- Main Content -->
<main>
  <section class="section-padding bg-white">
    <div class="blvd-container">
      <?php
      $all_items = getMenuItems();
      $grouped_items = [];
      foreach ($all_items as $item) {
        $cat = ucfirst($item['category']);
        if (!isset($grouped_items[$cat])) {
          $grouped_items[$cat] = [];
        }
        $grouped_items[$cat][] = $item;
      }
      ksort($grouped_items); // Sort categories alphabetically
      ?>

      <?php foreach ($grouped_items as $category => $items): ?>
        <div class="mb-16">
          <h2 class="font-display text-3xl md:text-4xl font-light mb-8 text-center border-b-2 border-yellow-200 pb-4">
            <?php echo $category; ?>
          </h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($items as $item): ?>
              <div class="bg-[#f8f7f5] rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300 group">
                <?php if ($item['image']): ?>
                  <div class="relative overflow-hidden h-48">
                    <img 
                      src="<?php echo htmlspecialchars($item['image']); ?>" 
                      alt="<?php echo htmlspecialchars($item['name']); ?>"
                      class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                  </div>
                <?php endif; ?>
                <div class="p-6">
                  <h3 class="font-semibold text-xl mb-2 text-gray-800"><?php echo htmlspecialchars($item['name']); ?></h3>
                  <p class="text-gray-600 mb-4 leading-relaxed"><?php echo htmlspecialchars($item['description']); ?></p>
                  <div class="flex justify-between items-center">
                    <span class="text-2xl font-bold text-yellow-600">$<?php echo number_format($item['price'], 2); ?></span>
                    <?php if ($item['available']): ?>
                      <span class="px-3 py-1 bg-green-100 text-green-800 text-sm font-medium rounded-full">Available</span>
                    <?php else: ?>
                      <span class="px-3 py-1 bg-gray-100 text-gray-800 text-sm font-medium rounded-full">Unavailable</span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>

      <?php if (empty($grouped_items)): ?>
        <div class="text-center py-12">
          <p class="text-gray-500 text-lg">Menu coming soon. Check back for our latest offerings!</p>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>