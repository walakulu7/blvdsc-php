// Main JavaScript utilities
document.addEventListener('DOMContentLoaded', function () {

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href !== '') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Tab switching functionality for menu page
    const tabTriggers = document.querySelectorAll('[role="tab"]');
    if (tabTriggers.length > 0) {
        tabTriggers.forEach(trigger => {
            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-target');

                // Remove active class from all triggers
                tabTriggers.forEach(t => {
                    t.classList.remove('border-blvd-gold', 'text-blvd-charcoal');
                    t.classList.add('border-transparent', 'text-blvd-charcoal/60');
                    t.setAttribute('aria-selected', 'false');
                });

                // Add active class to clicked trigger
                this.classList.add('border-blvd-gold', 'text-blvd-charcoal');
                this.classList.remove('border-transparent', 'text-blvd-charcoal/60');
                this.setAttribute('aria-selected', 'true');

                // Hide all tab contents
                document.querySelectorAll('[role="tabpanel"]').forEach(panel => {
                    panel.classList.add('hidden');
                });

                // Show target tab content
                const targetPanel = document.getElementById(targetId);
                if (targetPanel) {
                    targetPanel.classList.remove('hidden');
                }
            });
        });
    }
});
