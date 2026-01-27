<!-- Hero Section -->
<div class="relative min-h-screen flex items-center">
  <!-- Background Image -->
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
         style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=2070&auto=format&fit=crop');">
    </div>
  </div>

  <!-- Content -->
  <div class="relative z-10 blvd-container">
    <div class="max-w-xl text-white">
      <span class="inline-block mb-4 text-sm uppercase tracking-wide font-medium">Welcome to BLVD</span>
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-light mb-6">
        Specialty Coffee & Good Vibes
      </h1>
      <p class="text-lg mb-8 font-light">
        Artisanal coffee, freshly baked goods, and a welcoming atmosphere in the heart of the city.
      </p>
      <div class="flex space-x-4">
        <a href="/menu" class="btn-primary">OUR MENU</a>
        <a href="/location" class="px-6 py-3 border border-white text-white text-sm uppercase tracking-wider font-medium transition-all hover:bg-white/20">
          FIND US
        </a>
      </div>
    </div>
  </div>
</div>

<!-- About Section -->
<section class="section-padding bg-white">
  <div class="blvd-container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div>
        <span class="inline-block text-yellow-600 text-sm uppercase tracking-wider mb-4">Our Story</span>
        <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Crafted With Passion</h2>
        <p class="text-gray-600 mb-6 leading-relaxed">
          Since 2015, BLVD Coffee Co. has been Melbourne's premier destination for exceptional coffee experiences. We source our beans directly from sustainable farms around the world and roast them in small batches to ensure maximum freshness and flavor.
        </p>
        <p class="text-gray-600 mb-8 leading-relaxed">
          Our commitment to quality extends beyond our coffee. We partner with local artisans for our pastries and work with nearby farms for our fresh ingredients. Every cup and every bite tells a story of dedication to craftsmanship.
        </p>
        <a href="/about" class="btn-primary">LEARN MORE</a>
      </div>
      <div class="relative">
        <img
          src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop"
          alt="BLVD Coffee interior"
          class="w-full h-96 object-cover rounded-sm"
        />
      </div>
    </div>
  </div>
</section>

<!-- Menu Section -->
<section class="section-padding bg-[#f8f7f5]">
  <div class="blvd-container">
    <div class="text-center max-w-2xl mx-auto mb-16">
      <span class="inline-block text-yellow-600 text-sm uppercase tracking-wider mb-4">Our Menu</span>
      <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Crafted With Care</h2>
      <p class="text-gray-600 leading-relaxed">
        We take pride in every item we serve, from our specialty coffees to our house-made pastries and meals. Each creation reflects our commitment to quality and passion for great taste.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <?php
      $all_items = getMenuItems();
      $grouped = [];
      foreach ($all_items as $item) {
        $cat = ucfirst($item['category']);
        if (!isset($grouped[$cat])) {
          $grouped[$cat] = [
            'name' => $cat,
            'description' => $item['description'],
            'image' => $item['image'],
            'link' => '/menu#' . strtolower($item['category'])
          ];
        }
      }
      $menu_items = array_values($grouped);

      foreach ($menu_items as $item) {
        echo '
        <div class="bg-white group overflow-hidden">
          <div class="flex flex-col md:flex-row h-full">
            <div class="md:w-2/5 relative overflow-hidden">
              <img
                src="' . $item['image'] . '"
                alt="' . $item['name'] . '"
                class="w-full h-48 md:h-full object-cover transition-transform duration-700 group-hover:scale-105"
              />
            </div>
            <div class="md:w-3/5 p-6 md:p-8 flex flex-col justify-between">
              <div>
                <h3 class="font-display text-xl mb-3">' . $item['name'] . '</h3>
                <p class="text-gray-600 text-sm mb-6">' . $item['description'] . '</p>
              </div>
              <a
                href="' . $item['link'] . '"
                class="text-yellow-600 underline text-sm font-medium uppercase tracking-wider hover:text-yellow-700"
              >
                View Menu
              </a>
            </div>
          </div>
        </div>';
      }
      ?>

    </div>

    <div class="text-center mt-12">
      <a href="/menu" class="btn-primary">FULL MENU</a>
    </div>
  </div>
</section>

<!-- Location Section -->
<section class="section-padding bg-white">
  <div class="blvd-container">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div class="relative">
        <img
          src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1974&auto=format&fit=crop"
          alt="BLVD Coffee location"
          class="w-full h-96 object-cover rounded-sm"
        />
      </div>
      <div>
        <span class="inline-block text-yellow-600 text-sm uppercase tracking-wider mb-4">Find Us</span>
        <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Visit Our Cafe</h2>
        <p class="text-gray-600 mb-6 leading-relaxed">
          Located in the heart of Melbourne's CBD, our cafe offers a perfect blend of urban energy and cozy atmosphere. Whether you're grabbing a quick coffee or settling in for a longer visit, our space is designed to be your home away from home.
        </p>
        <div class="space-y-4 mb-8">
          <div class="flex items-center">
            <i data-lucide="map-pin" class="mr-3 text-yellow-600" size="20"></i>
            <span class="text-gray-600">123 Main Street, Melbourne VIC 3000</span>
          </div>
          <div class="flex items-center">
            <i data-lucide="clock" class="mr-3 text-yellow-600" size="20"></i>
            <span class="text-gray-600">Mon-Fri: 7AM-6PM | Sat-Sun: 8AM-4PM</span>
          </div>
          <div class="flex items-center">
            <i data-lucide="phone" class="mr-3 text-yellow-600" size="20"></i>
            <span class="text-gray-600">+61 3 9123 4567</span>
          </div>
        </div>
        <a href="/location" class="btn-primary">GET DIRECTIONS</a>
      </div>
    </div>
  </div>
</section>

<!-- Instagram Feed Section -->
<section class="section-padding bg-[#f8f7f5]">
  <div class="blvd-container">
    <div class="text-center max-w-2xl mx-auto mb-10">
      <span class="inline-block text-yellow-600 text-sm uppercase tracking-wider mb-4">Social</span>
      <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Follow Our Journey</h2>
      <p class="text-gray-600 leading-relaxed mb-4">
        Join our community on Instagram and share your BLVD moments with us.
      </p>
      <a
        href="https://instagram.com/blvdcoffee"
        target="_blank"
        rel="noopener noreferrer"
        class="inline-flex items-center text-yellow-600 hover:text-yellow-700 transition-colors"
      >
        <i data-lucide="instagram" class="mr-2" size="20"></i>
        @blvdcoffee
      </a>
    </div>
    
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
      <?php
      $instagram_posts = [
        ['image' => 'https://images.unsplash.com/photo-1442512595331-e89e73853f31?q=80&w=2070&auto=format&fit=crop', 'alt' => 'Coffee art latte'],
        ['image' => 'https://images.unsplash.com/photo-1556742502-ec7c0e9f34b1?q=80&w=2067&auto=format&fit=crop', 'alt' => 'Coffee beans'],
        ['image' => 'https://images.unsplash.com/photo-1534040385115-33dcb3acba5b?q=80&w=1974&auto=format&fit=crop', 'alt' => 'BLVD interior'],
        ['image' => 'https://images.unsplash.com/photo-1579888944880-d98341245702?q=80&w=2070&auto=format&fit=crop', 'alt' => 'Pastries and coffee'],
        ['image' => 'https://images.unsplash.com/photo-1506619216599-9d16d0903dfd?q=80&w=2069&auto=format&fit=crop', 'alt' => 'Coffee brewing'],
        ['image' => 'https://images.unsplash.com/photo-1525193612562-0ec53b0e5d7c?q=80&w=2070&auto=format&fit=crop', 'alt' => 'Coffee shop atmosphere']
      ];
      foreach ($instagram_posts as $post) {
        echo '
        <div class="aspect-square overflow-hidden group cursor-pointer">
          <img
            src="' . $post['image'] . '"
            alt="' . $post['alt'] . '"
            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
          />
        </div>';
      }
      ?>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="section-padding bg-[#f5f5dc]">
  <div class="blvd-container">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
      <div>
        <span class="inline-block text-yellow-600 text-sm uppercase tracking-wider mb-4">Get In Touch</span>
        <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Contact Us</h2>
        <p class="text-gray-600 mb-8 leading-relaxed">
          Have questions, suggestions, or interested in catering services? We'd love to hear from you! Reach out to our team through any of the channels below.
        </p>

        <div class="space-y-6 mb-8">
          <div class="flex items-start">
            <div class="mr-4 text-yellow-600">
              <i data-lucide="map-pin" size="20"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Address</h4>
              <p class="text-gray-600 text-sm">123 Main Street, Melbourne VIC 3000</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="mr-4 text-yellow-600">
              <i data-lucide="phone" size="20"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Phone</h4>
              <p class="text-gray-600 text-sm">+61 3 9123 4567</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="mr-4 text-yellow-600">
              <i data-lucide="mail" size="20"></i>
            </div>
            <div>
              <h4 class="font-medium mb-1">Email</h4>
              <p class="text-gray-600 text-sm">hello@blvdcoffee.com.au</p>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white p-8 rounded-sm">
        <h3 class="font-display text-2xl mb-6">Send Us a Message</h3>
        <form id="contact-form" action="forms/contact.php" method="POST">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            <div>
              <label for="name" class="block text-sm mb-1">Name</label>
              <input
                type="text"
                id="name"
                name="name"
                class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-yellow-600"
                placeholder="Your Name"
                required
              />
            </div>
            <div>
              <label for="email" class="block text-sm mb-1">Email</label>
              <input
                type="email"
                id="email"
                name="email"
                class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-yellow-600"
                placeholder="Your Email"
                required
              />
            </div>
          </div>

          <div class="mb-4">
            <label for="subject" class="block text-sm mb-1">Subject</label>
            <input
              type="text"
              id="subject"
              name="subject"
              class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-yellow-600"
              placeholder="Subject"
            />
          </div>

          <div class="mb-6">
            <label for="message" class="block text-sm mb-1">Message</label>
            <textarea
              id="message"
              name="message"
              rows="5"
              class="w-full px-4 py-2 border border-gray-300 focus:outline-none focus:ring-1 focus:ring-yellow-600"
              placeholder="Your Message"
              required
            ></textarea>
          </div>

          <button
            type="submit"
            class="btn-primary flex items-center justify-center w-full"
          >
            <i data-lucide="send" class="mr-2" size="16"></i>
            SEND MESSAGE
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<script>
// Contact form submission
document.getElementById('contact-form').addEventListener('submit', async function(e) {
  e.preventDefault();

  const formData = new FormData(this);
  const submitButton = this.querySelector('button[type="submit"]');
  const originalText = submitButton.innerHTML;

  submitButton.innerHTML = 'Sending...';
  submitButton.disabled = true;

  try {
    const response = await fetch('forms/contact.php', {
      method: 'POST',
      body: formData
    });

    const result = await response.json();

    if (result.success) {
      alert(result.message);
      this.reset();
    } else {
      alert('Error: ' + (result.message || 'Failed to send message'));
    }
  } catch (error) {
    alert('Error: Failed to send message. Please try again.');
  } finally {
    submitButton.innerHTML = originalText;
    submitButton.disabled = false;
  }
});
</script>