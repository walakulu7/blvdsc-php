<!-- Page Header -->
<div class="relative pt-24 pb-16 md:pb-24">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0">
    <div 
      class="h-full w-full bg-cover bg-center bg-no-repeat" 
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?q=80&w=1974&auto=format&fit=crop');">
    </div>
  </div>
  
  <!-- Content -->
  <div class="relative z-10 blvd-container h-full flex items-center justify-center text-center py-16 md:py-24">
    <div class="text-white">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-light mb-4">
        Reserve a Table
      </h1>
      <p class="text-lg md:text-xl font-light max-w-2xl mx-auto">
        Book your spot at BLVD Coffee
      </p>
    </div>
  </div>
</div>

<!-- Main Content -->
<main>
  <section class="section-padding bg-white">
    <div class="blvd-container">
      <div class="max-w-2xl mx-auto">
        <h2 class="font-display text-3xl font-light mb-6 text-center">Make a Reservation</h2>
        <p class="text-gray-600 text-center mb-12">
          We recommend reserving in advance, especially for weekends and larger groups. Our team will confirm your booking within 24 hours.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
          <div class="bg-[#f8f7f5] p-6 rounded-sm">
            <h3 class="font-medium text-lg mb-4">Location Information</h3>
            <div class="space-y-3 text-sm text-gray-600">
              <p><i data-lucide="map-pin" class="inline mr-2" size="16"></i>123 Main Street, Melbourne VIC 3000</p>
              <p><i data-lucide="clock" class="inline mr-2" size="16"></i>Mon-Fri: 7AM-6PM | Sat-Sun: 8AM-4PM</p>
              <p><i data-lucide="phone" class="inline mr-2" size="16"></i>+61 3 9123 4567</p>
            </div>
          </div>
          <div class="bg-[#f8f7f5] p-6 rounded-sm">
            <h3 class="font-medium text-lg mb-4">Reservation Policy</h3>
            <div class="text-sm text-gray-600 space-y-2">
              <p>• 90 minutes for parties of 2-4</p>
              <p>• 120 minutes for parties of 5+</p>
              <p>• Please arrive on time for your reservation</p>
              <p>• We require 24 hours notice for cancellations</p>
            </div>
          </div>
        </div>

        <form id="reserve-form" action="forms/reserve.php" method="POST">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
              <label for="name" class="block text-sm font-medium mb-2">Full Name</label>
              <input 
                type="text" 
                id="name" 
                name="name"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600"
                placeholder="Your full name"
                required
              />
            </div>
            <div>
              <label for="phone" class="block text-sm font-medium mb-2">Phone Number</label>
              <input 
                type="tel" 
                id="phone" 
                name="phone"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600"
                placeholder="Your phone number"
                required
              />
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
              <label for="guests" class="block text-sm font-medium mb-2">Number of Guests</label>
              <input 
                type="number" 
                id="guests" 
                name="people"
                min="1"
                max="10"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600"
                placeholder="1"
                required
              />
            </div>
            <div>
              <label for="date" class="block text-sm font-medium mb-2">Date</label>
              <input 
                type="date" 
                id="date" 
                name="date"
                class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600"
                required
              />
            </div>
          </div>

          <div class="mb-6">
            <label for="time" class="block text-sm font-medium mb-2">Preferred Time</label>
            <select 
              id="time" 
              name="time"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600"
              required
            >
              <option value="">Select a time</option>
              <option value="08:00">8:30 AM</option>
              <option value="09:00">9:30 AM</option>
              <option value="10:00">10:30 AM</option>
              <option value="11:00">11:30 AM</option>
            </select>
          </div>

          <div class="mb-6">
            <label for="special-requirements" class="block text-sm font-medium mb-2">Special Requirements</label>
            <textarea 
              id="special-requirements" 
              name="specialRequirements"
              rows="3"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600"
              placeholder="Dietary restrictions, accessibility needs, etc."
            ></textarea>
          </div>

          <div class="mb-8">
            <label for="additional-notes" class="block text-sm font-medium mb-2">Additional Notes</label>
            <textarea 
              id="additional-notes" 
              name="additionalNotes"
              rows="3"
              class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-600"
              placeholder="Any other information"
            ></textarea>
          </div>

          <button 
            type="submit" 
            class="btn-primary w-full py-4 text-lg font-medium"
          >
            <i data-lucide="calendar" class="inline mr-2" size="20"></i>
            SUBMIT RESERVATION REQUEST
          </button>
        </form>
      </div>
    </div>
  </section>
</main>

<script>
  // Reservation form submission
  document.getElementById('reserve-form').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const submitButton = this.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;

    submitButton.innerHTML = 'Submitting...';
    submitButton.disabled = true;

    try {
      const response = await fetch('forms/reserve.php', {
        method: 'POST',
        body: formData
      });

      const result = await response.json();

      if (result.success) {
        alert(result.message);
        this.reset();
      } else {
        alert('Error: ' + (result.message || 'Failed to submit reservation'));
      }
    } catch (error) {
      alert('Error: Failed to submit reservation. Please try again.');
    } finally {
      submitButton.innerHTML = originalText;
      submitButton.disabled = false;
    }
  });
</script>