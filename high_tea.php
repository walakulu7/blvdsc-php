<?php
$page_title = 'High Tea Reservations';
$page_description = 'Book High Tea at BLVD Specialty Coffee - $39.95pp. Weekend reservations with gluten-free and vegan options available. Pet-friendly alfresco seating in Perth. Reserve Friday-Sunday.';
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
                                <label for="hightea-date" class="block text-sm font-medium mb-2">Date *</label>
                                <input 
                                    type="date" 
                                    id="hightea-date" 
                                    name="date"
                                    required
                                    min="<?php echo date('Y-m-d', strtotime('+2 days')); ?>"
                                    class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                >
                            </div>
                            
                            <div>
                                <label for="hightea-time" class="block text-sm font-medium mb-2">Time *</label>
                                <select 
                                    id="hightea-time" 
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
            showMessage('success', result.message);
            this.reset();
            // Hide availability notice on success reset
            document.getElementById('availability-notice').classList.add('hidden');
        } else {
            showMessage('error', result.message || 'An error occurred. Please try again.');
        }
    } catch (error) {
        console.error('Error:', error);
        showMessage('error', 'An error occurred. Please try again later.');
    } finally {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
    }
});

// Helper function to show messages (Consistent with main.js)
function showMessage(type, message) {
    const messageDiv = document.createElement('div');
    messageDiv.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 9999;
        max-width: 400px;
        padding: 16px;
        background-color: ${type === 'success' ? '#f0fdf4' : '#fef2f2'};
        border-left: 4px solid ${type === 'success' ? '#22c55e' : '#ef4444'};
        color: ${type === 'success' ? '#166534' : '#991b1b'};
        border-radius: 4px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        font-family: system-ui, -apple-system, sans-serif;
        transition: opacity 0.3s ease;
    `;

    messageDiv.innerHTML = `
        <div style="display: flex; align-items: flex-start; gap: 12px;">
            <div style="flex-shrink: 0;">
                ${type === 'success'
            ? '<svg style="width: 20px; height: 20px; color: #22c55e;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>'
            : '<svg style="width: 20px; height: 20px; color: #ef4444;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>'
        }
            </div>
            <div style="flex: 1;">
                <p style="margin: 0; font-size: 14px; font-weight: 500;">${message}</p>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" style="flex-shrink: 0; background: none; border: none; cursor: pointer; padding: 0; color: #9ca3af;">
                <svg style="width: 20px; height: 20px;" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            </button>
        </div>
    `;

    document.body.appendChild(messageDiv);

    // Auto-remove after 5 seconds
    setTimeout(() => {
        messageDiv.style.opacity = '0';
        setTimeout(() => messageDiv.remove(), 300);
    }, 5000);
}

// Check availability when date changes
document.getElementById('hightea-date').addEventListener('change', async function() {
    const dateInput = this;
    const date = dateInput.value;
    const notice = document.getElementById('availability-notice');
    
    if (!date) {
        notice.classList.add('hidden');
        return;
    }
    
    // Check if day is valid (Fri, Sat, Sun)
    // Parse date parts manually to avoid timezone issues
    const parts = date.split('-');
    const year = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10) - 1; // Months are 0-indexed
    const day = parseInt(parts[2], 10);
    const dayOfWeek = new Date(year, month, day).getDay();
    
    // Check for 2-day advance booking requirement
    const selectedDate = new Date(year, month, day);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    
    // Create date for 2 days from now (preparation time)
    const minDate = new Date(today);
    minDate.setDate(today.getDate() + 2);
    
    if (selectedDate < minDate) {
        notice.className = 'mb-6 p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded';
        notice.innerHTML = `<p class="text-sm font-medium text-yellow-800">High Tea requires at least 2 days advance notice for preparation. Please select a later date.</p>`;
        notice.classList.remove('hidden');
        dateInput.value = ''; // Clear invalid date
        return;
    }

    // getDay() returns 0 for Sunday, 5 for Friday, 6 for Saturday
    if (dayOfWeek !== 0 && dayOfWeek !== 5 && dayOfWeek !== 6) {
        notice.className = 'mb-6 p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded';
        notice.innerHTML = `<p class="text-sm font-medium text-yellow-800">High Tea is only available on Fridays, Saturdays, and Sundays. Please select a valid date.</p>`;
        notice.classList.remove('hidden');
        dateInput.value = ''; // Clear invalid date
        return;
    }
    
    try {
        const response = await fetch(`<?php echo BASE_URL; ?>/api/check-high-tea-availability.php?date=${date}`);
        const result = await response.json();
        
        if (result.available !== undefined) {
            // Check for message from API (e.g. invalid day)
            if (result.message && result.available === 0 && result.booked === 0) {
                 notice.className = 'mb-6 p-4 bg-yellow-50 border-l-4 border-yellow-500 rounded';
                 notice.innerHTML = `<p class="text-sm font-medium text-yellow-800">${result.message}</p>`;
                 notice.classList.remove('hidden');
                 dateInput.value = '';
                 return;
            }

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
