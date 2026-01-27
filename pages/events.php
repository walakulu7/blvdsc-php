<!-- Page Header -->
<div class="relative pt-24 pb-16 md:pb-24">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0">
    <div 
      class="h-full w-full bg-cover bg-center bg-no-repeat" 
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=2074&auto=format&fit=crop');">
    </div>
  </div>
  
  <!-- Content -->
  <div class="relative z-10 blvd-container h-full flex items-center justify-center text-center py-16 md:py-24">
    <div class="text-white">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-light mb-4">
        Events & Workshops
      </h1>
      <p class="text-lg md:text-xl font-light max-w-2xl mx-auto">
        Join us for coffee education and community gatherings
      </p>
    </div>
  </div>
</div>

<!-- Main Content -->
<main>
  <section class="section-padding bg-white">
    <div class="blvd-container">
      <div class="max-w-3xl mx-auto mb-12">
        <h2 class="font-display text-3xl font-light mb-6 text-center">Upcoming Events</h2>
        <p class="text-gray-600 text-center mb-8">
          At BLVD Coffee, we love bringing people together. From coffee workshops to live music evenings, our events are designed to create community and share our passion for great coffee.
        </p>
        
        <div class="text-center mb-12">
          <a href="/contact" class="btn-primary">
            INQUIRE ABOUT PRIVATE EVENTS
          </a>
        </div>
      </div>
      
      <?php
      $events = [
        [
          'title' => 'Coffee Cupping Workshop',
          'date' => 'June 15, 2024',
          'time' => '9:00 AM - 11:00 AM',
          'description' => 'Join our master barista for an interactive coffee tasting experience. Learn how to identify flavor notes and appreciate different coffee origins.',
          'image' => 'https://images.unsplash.com/photo-1442512595331-e89e73853f31?q=80&w=2070&auto=format&fit=crop',
          'price' => '$35 per person'
        ],
        [
          'title' => 'Latte Art Masterclass',
          'date' => 'June 22, 2024',
          'time' => '2:00 PM - 4:00 PM',
          'description' => 'Learn the techniques behind creating beautiful latte art. This hands-on workshop will cover basic patterns and advanced designs.',
          'image' => 'https://images.unsplash.com/photo-1534040385115-33dcb3acba5b?q=80&w=1974&auto=format&fit=crop',
          'price' => '$40 per person'
        ],
        [
          'title' => 'Acoustic Music Night',
          'date' => 'June 28, 2024',
          'time' => '7:00 PM - 9:00 PM',
          'description' => 'Enjoy the soulful sounds of local musicians in our cozy café environment. Light refreshments and full coffee menu available.',
          'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=2074&auto=format&fit=crop',
          'price' => 'Free entry'
        ],
        [
          'title' => 'Home Brewing Methods',
          'date' => 'July 8, 2024',
          'time' => '10:00 AM - 12:00 PM',
          'description' => 'Discover how to brew café-quality coffee at home. We'll explore various brewing methods including pour-over, French press, AeroPress, and more.',
          'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop',
          'price' => '$30 per person'
        ]
      ];
      ?>

      <div class="space-y-12">
        <?php foreach ($events as $event): ?>
          <div class="bg-[#f8f7f5] p-6 rounded-sm grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
              <div class="h-48 md:h-full rounded-sm overflow-hidden">
                <img 
                  src="<?php echo htmlspecialchars($event['image']); ?>" 
                  alt="<?php echo htmlspecialchars($event['title']); ?>"
                  class="w-full h-full object-cover"
                />
              </div>
            </div>
            
            <div class="md:col-span-2">
              <h3 class="font-display text-2xl font-light mb-3"><?php echo htmlspecialchars($event['title']); ?></h3>
              
              <div class="flex items-center mb-2 text-sm text-gray-600">
                <i data-lucide="calendar" class="mr-2 text-yellow-600" size="16"></i>
                <span><?php echo $event['date']; ?></span>
                <i data-lucide="clock" class="ml-4 mr-2 text-yellow-600" size="16"></i>
                <span><?php echo $event['time']; ?></span>
              </div>
              
              <div class="flex items-center mb-4 text-sm text-gray-600">
                <i data-lucide="map-pin" class="mr-2 text-yellow-600" size="16"></i>
                <span>BLVD Coffee, 123 Main Street</span>
              </div>
              
              <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($event['description']); ?></p>
              
              <div class="flex flex-wrap items-center justify-between">
                <span class="font-medium"><?php echo $event['price']; ?></span>
                <a href="/contact" class="btn-primary mt-2 md:mt-0">
                  BOOK NOW
                </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      
      <div class="mt-16">
        <h3 class="font-display text-2xl font-light mb-6 text-center">Private Events</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
          <div>
            <img 
              src="https://images.unsplash.com/photo-1522682178963-d2e96cc8d978?q=80&w=1974&auto=format&fit=crop" 
              alt="Private event at BLVD Coffee"
              class="w-full h-auto rounded-sm"
            />
          </div>
          <div>
            <p class="text-gray-600 mb-6">
              Our café is available for private bookings outside regular hours. Whether you're planning a corporate gathering, book club meeting, or celebration, our space can be customized to your needs.
            </p>
            <p class="text-gray-600 mb-6">
              We offer catering options featuring our signature coffee drinks and a selection of pastries, sandwiches, and other light fare. Our team will work with you to create a memorable experience for your guests.
            </p>
            <p class="text-gray-600 mb-8">
              For pricing and availability, please contact our events team at events@blvdcoffee.com.au or fill out the inquiry form on our contact page.
            </p>
            <a href="/contact" class="btn-primary">
              INQUIRE NOW
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>