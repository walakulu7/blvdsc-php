<!-- Page Header -->
<div class="relative pt-24 pb-16 md:pb-24">
  <!-- Background Image with Overlay -->
  <div class="absolute inset-0 z-0">
    <div 
      class="h-full w-full bg-cover bg-center bg-no-repeat" 
      style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=2070&auto=format&fit=crop');">
    </div>
  </div>
  
  <!-- Content -->
  <div class="relative z-10 blvd-container h-full flex items-center justify-center text-center py-16 md:py-24">
    <div class="text-white">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-display font-light mb-4">
        Contact Us
      </h1>
      <p class="text-lg md:text-xl font-light max-w-2xl mx-auto">
        We'd love to hear from you
      </p>
    </div>
  </div>
</div>

<!-- Main Content -->
<main>
  <section class="section-padding bg-white">
    <div class="blvd-container">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <div>
          <h2 class="font-display text-3xl font-light mb-6">Get In Touch</h2>
          <p class="text-gray-600 mb-8 leading-relaxed">
            We welcome your questions, feedback, and inquiries. Whether you're looking to book our space for an event, learn more about our coffee sourcing, or simply want to say hello, our team is here to help.
          </p>
          
          <div class="space-y-8 mb-10">
            <div class="flex items-start">
              <div class="mr-4 text-yellow-600">
                <i data-lucide="map-pin" size="24"></i>
              </div>
              <div>
                <h3 class="font-medium mb-1">Visit Us</h3>
                <p class="text-gray-600 text-sm">96 Waratah Boulevard, Canning Vale, WA, 6155, Australia</p>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="mr-4 text-yellow-600">
                <i data-lucide="phone" size="24"></i>
              </div>
              <div>
                <h3 class="font-medium mb-1">Call Us</h3>
                <p class="text-gray-600 text-sm">+61 3 9123 4567</p>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="mr-4 text-yellow-600">
                <i data-lucide="mail" size="24"></i>
              </div>
              <div>
                <h3 class="font-medium mb-1">Email Us</h3>
                <p class="text-gray-600 text-sm">hello@blvdcoffee.com.au</p>
              </div>
            </div>
            
            <div class="flex items-start">
              <div class="mr-4 text-yellow-600">
                <i data-lucide="clock" size="24"></i>
              </div>
              <div>
                <h3 class="font-medium mb-1">Hours</h3>
                <div class="text-gray-600 text-sm space-y-1">
                  <p>Monday - Friday: 7:00 AM - 6:00 PM</p>
                  <p>Saturday: 8:00 AM - 6:00 PM</p>
                  <p>Sunday: 8:00 AM - 4:00 PM</p>
                </div>
              </div>
            </div>
          </div>
          
          <div>
            <h3 class="font-medium text-lg mb-4">Inquiries</h3>
            <div class="space-y-3 text-gray-600 text-sm">
              <p><span class="font-medium">Catering:</span> catering@blvdcoffee.com.au</p>
              <p><span class="font-medium">Events:</span> events@blvdcoffee.com.au</p>
              <p><span class="font-medium">Careers:</span> careers@blvdcoffee.com.au</p>
              <p><span class="font-medium">Press:</span> media@blvdcoffee.com.au</p>
            </div>
          </div>
        </div>
        
        <div class="bg-[#f8f7f5] p-8 rounded-sm">
          <h2 class="font-display text-2xl font-light mb-6">Send Us a Message</h2>
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
</main>

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