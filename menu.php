<?php
$page_title = 'Our Menu';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$title = 'Our Menu';
$subtitle = 'Discover our carefully crafted selection';
$backgroundImage = 'https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?q=80&w=2070&auto=format&fit=crop';
require_once 'includes/page-header.php';
?>

<style>
.menu-sidebar {
    position: sticky;
    top: 100px;
}

.menu-tab {
    display: block;
    width: 100%;
    text-align: left;
    padding: 12px 20px;
    margin-bottom: 8px;
    background: transparent;
    border: none;
    border-left: 4px solid transparent;
    color: #9ca3af;
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.menu-tab:hover {
    background: #f5f3f0;
    border-left-color: #d4c5b9;
}

.menu-tab.active {
    background: #f5f3f0;
    border-left-color: #c9a870;
    color: #2d2d2d;
}

.menu-panel {
    display: none;
}

.menu-panel.active {
    display: block;
}

.menu-image-container {
    background: #f5f3f0;
    padding: 40px;
    border-radius: 4px;
}

.menu-image-container img {
    width: 100%;
    height: auto;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    cursor: pointer;
    transition: transform 0.3s ease;
}

.menu-image-container img:hover {
    transform: scale(1.02);
}
</style>

<main>
    <section class="section-padding bg-white">
        <div class="blvd-container">
            <div style="max-width: 1200px; margin: 0 auto;">
                <div style="display: flex; gap: 40px; align-items: flex-start;">
                    <!-- Left Sidebar -->
                    <div class="menu-sidebar" style="width: 250px; flex-shrink: 0;">
                        <h2 style="font-family: 'Playfair Display', serif; font-size: 24px; color: #c9a870; margin-bottom: 24px;">Our Menu</h2>
                        
                        <button class="menu-tab active" data-target="coffee">COFFEE & TEA</button>
                        <button class="menu-tab" data-target="beverages">OTHER BEVERAGES</button>
                        <button class="menu-tab" data-target="breakfast">ALL DAY BREAKFAST & SPECIALTIES</button>
                        <button class="menu-tab" data-target="kids">KIDS & SEASONAL</button>
                    </div>

                    <!-- Right Content -->
                    <div style="flex: 1;">
                        <!-- Coffee Menu -->
                        <div id="coffee" class="menu-panel active">
                            <div class="menu-image-container">
                                <h3 style="font-family: 'Playfair Display', serif; font-size: 32px; text-align: center; margin-bottom: 24px; color: #2d2d2d;">
                                    Menu <span style="color: #c9a870;">BLVD Specialty Coffee</span>
                                </h3>
                                <img src="assets/images/menu-coffee-tea.webp" alt="Coffee & Tea Menu" onclick="openModal(this.src)">
                            </div>
                        </div>

                        <!-- Beverages Menu -->
                        <div id="beverages" class="menu-panel">
                            <div class="menu-image-container">
                                <h3 style="font-family: 'Playfair Display', serif; font-size: 32px; text-align: center; margin-bottom: 24px; color: #2d2d2d;">
                                    Menu <span style="color: #c9a870;">BLVD Specialty Coffee</span>
                                </h3>
                                <img src="assets/images/menu-other-beverages.webp" alt="Other Beverages Menu" onclick="openModal(this.src)">
                            </div>
                        </div>

                        <!-- Breakfast Menu -->
                        <div id="breakfast" class="menu-panel">
                            <div class="menu-image-container">
                                <h3 style="font-family: 'Playfair Display', serif; font-size: 32px; text-align: center; margin-bottom: 24px; color: #2d2d2d;">
                                    Menu <span style="color: #c9a870;">BLVD Specialty Coffee</span>
                                </h3>
                                <img src="assets/images/menu-all-daybreakfast.webp" alt="All Day Breakfast Menu" onclick="openModal(this.src)">
                            </div>
                        </div>

                        <!-- Kids Menu -->
                        <div id="kids" class="menu-panel">
                            <div class="menu-image-container">
                                <h3 style="font-family: 'Playfair Display', serif; font-size: 32px; text-align: center; margin-bottom: 24px; color: #2d2d2d;">
                                    Menu <span style="color: #c9a870;">BLVD Specialty Coffee</span>
                                </h3>
                                <img src="assets/images/menu-kids-seasonal.webp" alt="Kids & Seasonal Menu" onclick="openModal(this.src)">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer Text -->
                <div style="margin-top: 60px; text-align: center; color: #6b7280; font-size: 14px;">
                    <p style="margin-bottom: 8px;">Thanks for visiting BLVD Specialty Coffee. We hope you enjoyed your meal and see you again soon.</p>
                    <p>Please follow us on IG or Meta for menu updates and specials.</p>
                    
                    <div style="display: flex; justify-content: center; gap: 16px; margin-top: 20px;">
                        <a href="<?php echo SOCIAL_INSTAGRAM; ?>" target="_blank" style="display: inline-flex; align-items: center; justify-center; width: 40px; height: 40px; background: #2d2d2d; border-radius: 50%; transition: background 0.3s;">
                            <svg style="width: 20px; height: 20px; color: white;" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="<?php echo SOCIAL_FACEBOOK; ?>" target="_blank" style="display: inline-flex; align-items: center; justify-center; width: 40px; height: 40px; background: #2d2d2d; border-radius: 50%; transition: background 0.3s;">
                            <svg style="width: 20px; height: 20px; color: white;" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal -->
<div id="menuModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.9); z-index: 9999; padding: 20px;" onclick="closeModal()">
    <div style="max-width: 1200px; margin: 0 auto; position: relative; height: 100%; display: flex; align-items: center; justify-content: center;">
        <button onclick="closeModal()" style="position: absolute; top: 20px; right: 20px; background: none; border: none; color: white; font-size: 40px; cursor: pointer; line-height: 1;">&times;</button>
        <img id="modalImg" src="" style="max-width: 100%; max-height: 90vh; border-radius: 4px;">
    </div>
</div>

<script>
// Tab switching
document.querySelectorAll('.menu-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        // Remove active class from all tabs
        document.querySelectorAll('.menu-tab').forEach(t => t.classList.remove('active'));
        // Add active class to clicked tab
        this.classList.add('active');
        
        // Hide all panels
        document.querySelectorAll('.menu-panel').forEach(p => p.classList.remove('active'));
        // Show selected panel
        const target = this.getAttribute('data-target');
        document.getElementById(target).classList.add('active');
    });
});

function openModal(src) {
    document.getElementById('modalImg').src = src;
    document.getElementById('menuModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeModal() {
    document.getElementById('menuModal').style.display = 'none';
    document.body.style.overflow = '';
}

// Close on Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeModal();
});
</script>

<?php require_once 'includes/footer.php'; ?>
