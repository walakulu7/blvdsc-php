<?php
/**
 * Notification Settings View
 * Allows admins to edit email templates for booking status updates.
 */
$settings = $settings ?? [];
$csrfToken = \Session::get('csrf_token');
?>

<div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h1 class="h3 mb-0 fw-bold">Notification Settings</h1>
            <p class="text-muted mb-0">Edit the emails automatically sent to customers when their booking status changes.</p>
        </div>
    </div>

    <!-- Placeholder Reference Card -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-transparent d-flex align-items-center gap-2 py-3">
            <i class="fas fa-tags text-warning"></i>
            <strong>Available Placeholders</strong>
        </div>
        <div class="card-body">
            <p class="text-muted small mb-2">Use these tags in your templates. They will be automatically replaced with the actual booking details when the email is sent.</p>
            <div class="d-flex flex-wrap gap-2">
                <?php
                $placeholders = [
                    '{customer_name}' => 'Customer\'s full name',
                    '{date}'          => 'Booking date (e.g., February 20, 2026)',
                    '{time}'          => 'Booking time (e.g., 7:00 PM)',
                    '{party_size}'    => 'Number of guests',
                    '{booking_id}'    => 'Unique booking ID',
                    '{contact_email}' => 'Your restaurant contact email',
                    '{contact_phone}' => 'Your restaurant contact phone',
                    '{site_name}'     => 'Your restaurant name',
                ];
                foreach ($placeholders as $tag => $description): ?>
                    <span class="badge bg-light border text-dark font-monospace" title="<?= htmlspecialchars($description) ?>"
                          style="cursor:pointer;" onclick="copyPlaceholder(this)"><?= htmlspecialchars($tag) ?></span>
                <?php endforeach; ?>
            </div>
            <small class="text-muted d-block mt-2"><i class="fas fa-hand-pointer me-1"></i>Click a tag to copy it.</small>
        </div>
    </div>

    <!-- Template Form -->
    <form method="POST" action="<?= BASE_URL ?>/settings/notifications">
        <input type="hidden" name="_csrf_token" value="<?= htmlspecialchars($csrfToken) ?>">

        <!-- Confirmed -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-transparent d-flex align-items-center gap-2 py-3">
                <span class="badge bg-success rounded-pill">&nbsp;</span>
                <strong>Booking Confirmed Email</strong>
                <span class="text-muted small ms-auto">Sent when status is changed to <span class="badge bg-success">Confirmed</span></span>
            </div>
            <div class="card-body">
                <label class="form-label">Email Body</label>
                <textarea name="booking_confirmed_template" class="form-control font-monospace"
                          rows="10" required style="width:100%; resize:vertical;"><?= htmlspecialchars($settings['booking_confirmed_template'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- Completed -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-transparent d-flex align-items-center gap-2 py-3">
                <span class="badge bg-dark rounded-pill">&nbsp;</span>
                <strong>Booking Completed Email</strong>
                <span class="text-muted small ms-auto">Sent when status is changed to <span class="badge bg-dark">Completed</span></span>
            </div>
            <div class="card-body">
                <label class="form-label">Email Body</label>
                <textarea name="booking_completed_template" class="form-control font-monospace"
                          rows="8" required style="width:100%; resize:vertical;"><?= htmlspecialchars($settings['booking_completed_template'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- Cancelled -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-transparent d-flex align-items-center gap-2 py-3">
                <span class="badge bg-danger rounded-pill">&nbsp;</span>
                <strong>Booking Cancelled Email</strong>
                <span class="text-muted small ms-auto">Sent when status is changed to <span class="badge bg-danger">Cancelled</span></span>
            </div>
            <div class="card-body">
                <label class="form-label">Email Body</label>
                <textarea name="booking_cancelled_template" class="form-control font-monospace"
                          rows="8" required style="width:100%; resize:vertical;"><?= htmlspecialchars($settings['booking_cancelled_template'] ?? '') ?></textarea>
            </div>
        </div>

        <hr class="my-5">
        <h2 class="h4 mb-3 fw-bold">Initial Web Bookings</h2>
        <p class="text-muted mb-4">These emails are sent <strong>immediately</strong> after a customer submits a booking on your website.</p>

        <!-- Received (Standard) -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-transparent d-flex align-items-center gap-2 py-3">
                <span class="badge bg-info rounded-pill">&nbsp;</span>
                <strong>Booking Received (Standard)</strong>
                <span class="text-muted small ms-auto">Sent immediately after a standard reservation is submitted.</span>
            </div>
            <div class="card-body">
                <label class="form-label">Email Body</label>
                <textarea name="booking_received_template" class="form-control font-monospace"
                          rows="8" required style="width:100%; resize:vertical;"><?= htmlspecialchars($settings['booking_received_template'] ?? '') ?></textarea>
            </div>
        </div>

        <!-- Received (High Tea) -->
        <div class="card mb-4 border-0 shadow-sm">
            <div class="card-header bg-transparent d-flex align-items-center gap-2 py-3">
                <span class="badge bg-info rounded-pill">&nbsp;</span>
                <strong>Booking Received (High Tea)</strong>
                <span class="text-muted small ms-auto">Sent immediately after a High Tea booking is submitted.</span>
            </div>
            <div class="card-body">
                <label class="form-label">Email Body</label>
                <textarea name="hightea_received_template" class="form-control font-monospace"
                          rows="8" required style="width:100%; resize:vertical;"><?= htmlspecialchars($settings['hightea_received_template'] ?? '') ?></textarea>
            </div>
        </div>

        <div class="d-flex justify-content-end mb-5">
            <button type="submit" class="btn btn-primary px-5">
                <i class="fas fa-save me-2"></i>Save Templates
            </button>
        </div>
    </form>
</div>

<script>
function copyPlaceholder(el) {
    const text = el.textContent;
    navigator.clipboard.writeText(text).then(() => {
        const original = el.style.background;
        el.classList.add('bg-warning');
        el.classList.remove('bg-light');
        setTimeout(() => {
            el.classList.remove('bg-warning');
            el.classList.add('bg-light');
        }, 700);
    });
}
</script>
