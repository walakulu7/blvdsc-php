<?php
$page_title = 'High Tea Reservations';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$title = 'High Tea Experience';
$subtitle = 'Book your exclusive High Tea at BLVD Coffee';
$backgroundImage = 'assets/images/hightea/hightea1.jpeg';
require_once 'includes/page-header.php';

$timeSlots = [
    '9:30 AM',
    '11:30 AM'
];
?>

<main>
    <section class="section-padding bg-white">
        <div class="blvd-container">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Reserve Your High Tea Experience</h2>
                    <p class="text-blvd-charcoal/80 leading-relaxed mb-4">
                        Indulge in an exquisite High Tea experience at BLVD Specialty Coffee. Enjoy a curated selection of premium teas, freshly baked scones, delicate finger sandwiches, and artisanal pastries.
                    </p>
                    <div class="bg-blvd-gold/10 p-6 rounded-sm inline-block">
                        <p class="text-2xl font-display text-blvd-charcoal mb-2">$39.95 <span class="text-base font-normal">per person</span></p>
                        <p class="text-sm text-blvd-charcoal/70">Limited to 8 guests per day</p>
                    </div>
                </div>
                
                <div class="bg-blvd-cream p-8 rounded-sm">
                    <form id="high-tea-form">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-sm font-medium mb-2">Name *</label>
                                <input 
                                    type="text" 
                                    id="name" 
                                    name="name"
                                    required
                                    class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                    placeholder="Your Name"
                                >
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium mb-2">Phone *</label>
                                <input 
                                    type="tel" 
                                    id="phone" 
                                    name="phone"
                                    required
                                    class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                    placeholder="Your Phone Number"
                                >
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium mb-2">Email *</label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                required
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                placeholder="Your Email"
                            >
                        </div>
                        
                        <!-- Availability Notice -->
                        <div id="availability-notice" class="hidden mb-6 p-4 border-l-4 rounded"></div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="date" class="block text-sm font-medium mb-2">Date *</label>
                                <input 
                                    type="date" 
                                    id="date" 
                                    name="date"
                                    required
                                    min="<?php echo date('Y-m-d'); ?>"
                                    class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                >
                            </div>
                            
                            <div>
                                <label for="time" class="block text-sm font-medium mb-2">Time *</label>
                                <select 
                                    id="time" 
                                    name="time"
                                    required
                                    class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                >
                                    <option value="">Select a time</option>
                                    <?php foreach ($timeSlots as $slot): ?>
                                        <option value="<?php echo htmlspecialchars($slot); ?>"><?php echo htmlspecialchars($slot); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label for="partySize" class="block text-sm font-medium mb-2">Number of Guests *</label>
                            <select 
                                id="partySize" 
                                name="people"
                                required
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                            >
                                <option value="">Select number of guests</option>
                                <option value="1">1 guest</option>
                                <option value="2">2 guests</option>
                                <option value="3">3 guests</option>
                                <option value="4">4 guests</option>
                                <option value="5">5 guests</option>
                                <option value="6">6 guests</option>
                                <option value="7">7 guests</option>
                                <option value="8">8 guests</option>
                            </select>
                        </div>
                        
                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium mb-2">Special Requests</label>
                            <textarea 
                                id="notes" 
                                name="additionalNotes"
                                rows="4"
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                placeholder="Any dietary requirements or special requests?"
                            ></textarea>
                        </div>
                        
                        <button 
                            type="submit" 
                            class="btn-primary w-full"
                        >
                            CONFIRM HIGH TEA RESERVATION
                        </button>
                    </form>
                </div>
                
                <div class="mt-8 text-center text-sm text-blvd-charcoal/70">
                    <p>For inquiries, please call us at <?php echo CONTACT_PHONE; ?> or email <?php echo CONTACT_EMAIL; ?></p>
                </div>
            </div>
        </div>
    </section>



    <!-- High Tea Gallery -->
    <section class="section-padding bg-blvd-beige">
        <div class="blvd-container">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="inline-block text-blvd-gold text-sm uppercase tracking-wider mb-4">Gallery</span>
                <h2 class="font-display text-3xl md:text-4xl font-light mb-6">High Tea Experience</h2>
                <p class="text-blvd-charcoal/80 leading-relaxed mb-4">
                    Discover the elegance of our High Tea selection
                </p>
            </div>       
            
            <div>&nbsp;</div>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                <div class="aspect-square overflow-hidden group cursor-pointer">
                    <img 
                        src="<?php echo BASE_URL; ?>/assets/images/hightea/hightea1.jpeg" 
                        alt="High Tea Experience"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                </div>
                <div class="aspect-square overflow-hidden group cursor-pointer">
                    <img 
                        src="<?php echo BASE_URL; ?>/assets/images/hightea/hightea2.jpeg" 
                        alt="High Tea Delicacies"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                </div>
                <div class="aspect-square overflow-hidden group cursor-pointer">
                    <img 
                        src="<?php echo BASE_URL; ?>/assets/images/hightea/hightea3.jpeg" 
                        alt="Premium Tea Selection"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                </div>
                <div class="aspect-square overflow-hidden group cursor-pointer">
                    <img 
                        src="<?php echo BASE_URL; ?>/assets/images/hightea/hightea4.jpeg" 
                        alt="Artisanal Pastries"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                </div>
                <div class="aspect-square overflow-hidden group cursor-pointer">
                    <img 
                        src="<?php echo BASE_URL; ?>/assets/images/hightea/hightea5.jpeg" 
                        alt="Premium Tea Selection"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                </div>
                <div class="aspect-square overflow-hidden group cursor-pointer">
                    <img 
                        src="<?php echo BASE_URL; ?>/assets/images/hightea/hightea6.jpeg" 
                        alt="Artisanal Pastries"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                </div>
            </div>
            <div>&nbsp;</div>
            
        </div>
    </section>
</main>

<script>
document.getElementById('high-tea-form').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;
    
    submitBtn.disabled = true;
    submitBtn.textContent = 'PROCESSING...';
    
    try {
        const response = await fetch('<?php echo BASE_URL; ?>/forms/high_tea.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            alert(result.message);
            this.reset();
        } else {
            alert(result.message || 'An error occurred. Please try again.');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again later.');
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
    }
});

// Check availability when date changes
document.getElementById('date').addEventListener('change', async function() {
    const date = this.value;
    const notice = document.getElementById('availability-notice');
    
    if (!date) {
        notice.classList.add('hidden');
        return;
    }
    
    try {
        const response = await fetch(`<?php echo BASE_URL; ?>/api/check-high-tea-availability.php?date=${date}`);
        const result = await response.json();
        
        if (result.available !== undefined) {
            const remaining = 8 - result.booked;
            
            if (remaining > 0) {
                notice.className = 'mb-6 p-4 bg-green-50 border-l-4 border-green-500 rounded';
                notice.innerHTML = `<p class="text-sm font-medium text-green-800">${remaining} ${remaining === 1 ? 'spot' : 'spots'} available for this date</p>`;
            } else {
                notice.className = 'mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded';
                notice.innerHTML = `<p class="text-sm font-medium text-red-800">Sorry, this date is fully booked. Please select another date.</p>`;
            }
            notice.classList.remove('hidden');
        }
    } catch (error) {
        console.error('Error checking availability:', error);
    }
});
</script>

<?php require_once 'includes/footer.php'; ?>
