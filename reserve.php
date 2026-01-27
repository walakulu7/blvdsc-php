<?php
$page_title = 'Reserve a Table';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$title = 'Reserve a Table';
$subtitle = 'Book your spot at BLVD Coffee';
$backgroundImage = 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop';
require_once 'includes/page-header.php';

$timeSlots = [
    '8:30 AM', '9:30 AM', '10:30 AM', '11:30 AM'
];
?>

<main>
    <section class="section-padding bg-white">
        <div class="blvd-container">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="font-display text-3xl md:text-4xl font-light mb-6">Make a Reservation</h2>
                    <p class="text-blvd-charcoal/80 leading-relaxed">
                        Reserve your table at BLVD Coffee. Whether you're planning a business meeting, catching up with friends, or enjoying a quiet moment with a book, we'll make sure you have the perfect spot.
                    </p>
                </div>
                
                <div class="bg-blvd-cream p-8 rounded-sm">
                    <form id="reservation-form">
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
                        
                        <div class="mb-6">
                            <label for="location" class="block text-sm font-medium mb-2">Location *</label>
                            <select 
                                id="location" 
                                name="location"
                                required
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                            >
                                <option value="">Select a location</option>
                                <option value="main">96 Waratah Boulevard, Canning Vale, WA, 6155, Australia</option>
                            </select>
                        </div>
                        
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
                            <label for="partySize" class="block text-sm font-medium mb-2">Party Size *</label>
                            <select 
                                id="partySize" 
                                name="people"
                                required
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                            >
                                <option value="">Select party size</option>
                                <option value="1">1 person</option>
                                <option value="2">2 people</option>
                                <option value="3">3 people</option>
                                <option value="4">4 people</option>
                                <option value="5">5 people</option>
                                <option value="6">6 people</option>
                                <option value="7">7 people</option>
                                <option value="8">8 people</option>
                                <option value="9+">9+ people</option>
                            </select>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2">Seating Preference</label>
                            <div class="flex gap-4">
                                <label class="flex items-center">
                                    <input type="radio" name="seating" value="indoor" checked class="mr-2">
                                    <span>Indoor</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="radio" name="seating" value="outdoor" class="mr-2">
                                    <span>Outdoor</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-sm font-medium mb-2">Special Requests (Optional)</label>
                            <div class="space-y-2">
                                <label class="flex items-center">
                                    <input type="checkbox" name="dietary" class="mr-2">
                                    <span class="text-sm">Dietary restrictions or allergies</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="occasion" class="mr-2">
                                    <span class="text-sm">Special occasion</span>
                                </label>
                                <label class="flex items-center">
                                    <input type="checkbox" name="quiet" class="mr-2">
                                    <span class="text-sm">Quiet area preferred</span>
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-6">
                            <label for="notes" class="block text-sm font-medium mb-2">Additional Notes</label>
                            <textarea 
                                id="notes" 
                                name="additionalNotes"
                                rows="4"
                                class="w-full px-4 py-2 border border-blvd-beige focus:outline-none focus:ring-1 focus:ring-blvd-gold"
                                placeholder="Any additional information we should know?"
                            ></textarea>
                        </div>
                        
                        <button 
                            type="submit" 
                            class="btn-primary w-full"
                        >
                            CONFIRM RESERVATION
                        </button>
                    </form>
                </div>
                
                <div class="mt-8 text-center text-sm text-blvd-charcoal/70">
                    <p>For parties of 9 or more, please call us at <?php echo CONTACT_PHONE; ?> or email <?php echo CONTACT_EMAIL; ?></p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
