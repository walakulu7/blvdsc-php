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

    // Reservation form submission
    const reservationForm = document.getElementById('reservation-form');
    if (reservationForm) {
        reservationForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            // Collect special requirements checkboxes
            const specialRequirements = [];
            const checkboxes = this.querySelectorAll('input[type="checkbox"]:checked');
            checkboxes.forEach(cb => {
                specialRequirements.push(cb.name);
            });

            // Create FormData with all fields
            const formData = new FormData(this);

            // Add seating preference (radio button)
            const seating = this.querySelector('input[name="seating"]:checked');
            if (seating) {
                formData.append('seating', seating.value);
            }

            // Add special requirements as array
            formData.delete('dietary');
            formData.delete('occasion');
            formData.delete('quiet');
            specialRequirements.forEach(req => {
                formData.append('specialRequirements[]', req);
            });

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

            try {
                const response = await fetch('forms/reserve.php', {
                    method: 'POST',
                    body: formData
                });

                // Log the response for debugging
                console.log('Response status:', response.status);

                // Get response text first  
                const responseText = await response.text();
                console.log('Response text:', responseText);

                // Try to parse as JSON
                let data;
                try {
                    data = JSON.parse(responseText);
                } catch (e) {
                    console.error('Failed to parse JSON:', e);
                    throw new Error('Invalid response from server: ' + responseText.substring(0, 200));
                }

                if (data.success) {
                    // Show success message
                    showMessage('success', data.message);
                    // Reset form
                    this.reset();
                } else {
                    // Show error message
                    showMessage('error', data.message || 'An error occurred. Please try again.');
                }
            } catch (error) {
                console.error('Form submission error:', error);
                showMessage('error', error.message || 'Network error. Please check your connection and try again.');
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    }

    // Contact form submission
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            // Disable button and show loading state
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<svg class="animate-spin h-5 w-5 mx-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>';

            try {
                const response = await fetch('forms/contact.php', {
                    method: 'POST',
                    body: formData
                });

                // Log the response for debugging
                console.log('Response status:', response.status);

                // Get response text first to see what we're getting
                const responseText = await response.text();
                console.log('Response text:', responseText);

                // Try to parse as JSON
                let data;
                try {
                    data = JSON.parse(responseText);
                } catch (e) {
                    console.error('Failed to parse JSON:', e);
                    throw new Error('Invalid response from server: ' + responseText.substring(0, 200));
                }

                if (data.success) {
                    // Show success message
                    showMessage('success', data.message);
                    // Reset form
                    this.reset();
                } else {
                    // Show error message
                    showMessage('error', data.message || 'An error occurred. Please try again.');
                }
            } catch (error) {
                console.error('Form submission error:', error);
                showMessage('error', error.message || 'Network error. Please check your connection and try again.');
            } finally {
                // Re-enable button
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
            }
        });
    }

    // Helper function to show messages
    function showMessage(type, message) {
        console.log('Showing message:', type, message);

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
        console.log('Message div appended to body');

        // Auto-remove after 5 seconds
        setTimeout(() => {
            messageDiv.style.opacity = '0';
            setTimeout(() => messageDiv.remove(), 300);
        }, 5000);
    }
});
