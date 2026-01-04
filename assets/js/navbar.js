// Navbar scroll effect and mobile menu
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('navbar');
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    const navbarLinks = document.querySelectorAll('.navbar-link');
    const navbarIcon = document.querySelector('.navbar-icon');

    // Scroll effect
    function handleScroll() {
        if (window.scrollY > 10) {
            navbar.classList.add('bg-white', 'shadow-md', 'py-2');
            navbar.classList.remove('bg-transparent', 'py-4');

            // Change text color to dark
            navbarLinks.forEach(link => {
                link.classList.remove('text-white');
                link.classList.add('text-blvd-charcoal');
            });

            // Change icon color
            if (navbarIcon) {
                navbarIcon.classList.remove('text-white');
                navbarIcon.classList.add('text-blvd-gold');
            }
        } else {
            navbar.classList.remove('bg-white', 'shadow-md', 'py-2');
            navbar.classList.add('bg-transparent', 'py-4');

            // Change text color to white
            navbarLinks.forEach(link => {
                link.classList.remove('text-blvd-charcoal');
                link.classList.add('text-white');
            });

            // Change icon color
            if (navbarIcon) {
                navbarIcon.classList.remove('text-blvd-gold');
                navbarIcon.classList.add('text-white');
            }
        }
    }

    // Mobile menu toggle
    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    }

    // Close mobile menu when clicking a link
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function () {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        });
    });

    // Initial check
    handleScroll();

    // Listen for scroll events
    window.addEventListener('scroll', handleScroll);
});
