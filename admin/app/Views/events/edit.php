<style>
/* ==========================================================================
   Event Edit Form Styles
   ========================================================================== */

/* Page Container - Centered layout with max width */
.event-edit-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Page Header - Back button and action buttons */
.event-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px 0;
    margin-bottom: 24px;
}

.event-page-header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.event-page-header-right {
    display: flex;
    gap: 12px;
}

/* Form Card - White background with shadow */
.event-form-card {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 32px;
}

/* Section Headers - Visual separation */
.event-section {
    margin-bottom: 32px;
}

.event-section:last-child {
    margin-bottom: 0;
}

.event-section-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 20px 0;
}

/* Form Fields - Proper spacing and widths */
.event-form-field {
    margin-bottom: 20px;
}

.event-form-field:last-child {
    margin-bottom: 0;
}

.event-form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 6px;
}

.event-form-label .required {
    color: #dc2626;
}

/* Input Fields - Consistent styling with focus states */
.event-form-input,
.event-form-textarea,
.event-form-select,
.event-form-file {
    width: 100%;
    max-width: 100%;
    padding: 10px 12px;
    font-size: 0.875rem;
    line-height: 1.5;
    color: #1f2937;
    background-color: #ffffff;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.event-form-input:focus,
.event-form-textarea:focus,
.event-form-select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Limited width for standard inputs */
.event-form-input-limited {
    max-width: 400px;
}

/* Textarea - Allow vertical resize only */
.event-form-textarea {
    resize: vertical;
    min-height: 100px;
}

/* Select - Full width or limited */
.event-form-select-limited {
    max-width: 300px;
}

/* Help Text - Muted small text below inputs */
.event-help-text {
    margin-top: 6px;
    font-size: 0.8125rem;
    color: #6b7280;
    line-height: 1.4;
}

.event-help-text i {
    vertical-align: middle;
    margin-right: 4px;
}

/* Two Column Layout for Event Schedule */
.event-form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
}

/* Responsive - Single column on mobile */
@media (max-width: 640px) {
    .event-form-row {
        grid-template-columns: 1fr;
    }
    
    .event-page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
    
    .event-page-header-right {
        width: 100%;
    }
    
    .event-form-card {
        padding: 20px;
    }
}

/* Image Preview */
.event-current-image,
.event-image-preview {
    margin-top: 12px;
}

.event-current-image img,
.event-image-preview img {
    max-width: 100%;
    height: auto;
    border-radius: 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

.event-image-label {
    display: block;
    font-size: 0.8125rem;
    font-weight: 500;
    color: #6b7280;
    margin-bottom: 8px;
}

/* Buttons - Improved styling */
.event-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    font-size: 0.875rem;
    font-weight: 500;
    line-height: 1.5;
    text-decoration: none;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.15s ease-in-out;
}

.event-btn-primary {
    color: #ffffff;
    background-color: #3b82f6;
}

.event-btn-primary:hover {
    background-color: #2563eb;
}

.event-btn-danger {
    color: #ffffff;
    background-color: #dc2626;
}

.event-btn-danger:hover {
    background-color: #b91c1c;
}

.event-btn-secondary {
    color: #374151;
    background-color: #f3f4f6;
    border: 1px solid #d1d5db;
}

.event-btn-secondary:hover {
    background-color: #e5e7eb;
}

.event-btn i {
    width: 16px;
    height: 16px;
}

/* Back Link */
.event-back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 12px;
    font-size: 0.875rem;
    color: #374151;
    text-decoration: none;
    background-color: #f9fafb;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    transition: background-color 0.15s ease-in-out;
}

.event-back-link:hover {
    background-color: #f3f4f6;
}

.event-back-link i {
    width: 16px;
    height: 16px;
}

/* Page Title */
.event-page-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #111827;
    margin: 0;
}
</style>

<!-- Flash Messages -->
<?php
$errorMessage = Session::flash('error');

if ($errorMessage):
?>
<div class="flash-messages">
    <div class="flash-message flash-error">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="x-circle"></i>
            <span><?= htmlspecialchars($errorMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
</div>
<?php endif; ?>

<div class="event-edit-container">
    <!-- Page Header -->
    <div class="event-page-header">
        <div class="event-page-header-left">
            <a href="<?= BASE_PATH ?>/events" class="event-back-link">
                <i data-lucide="arrow-left"></i>
                Back
            </a>
            <h1 class="event-page-title">Edit Event</h1>
        </div>
        
        <div class="event-page-header-right">
            <form method="POST" action="<?= BASE_PATH ?>/events/<?= $event['id'] ?>/delete" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this event? This action cannot be undone.');">
                <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
                <button type="submit" class="event-btn event-btn-danger">
                    <i data-lucide="trash-2"></i>
                    Delete Event
                </button>
            </form>
            
            <button type="submit" form="eventForm" class="event-btn event-btn-primary">
                <i data-lucide="save"></i>
                Save Event
            </button>
        </div>
    </div>

    <!-- Edit Event Form -->
    <div class="event-form-card">
        <form method="POST" action="<?= BASE_PATH ?>/events/<?= $event['id'] ?>" enctype="multipart/form-data" id="eventForm">
            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
            
            <!-- Event Information Section -->
            <div class="event-section">
                <h3 class="event-section-title">Event Information</h3>
                
                <div class="event-form-field">
                    <label for="title" class="event-form-label">
                        Event Title <span class="required">*</span>
                    </label>
                    <input type="text" id="title" name="title" class="event-form-input event-form-input-limited" required 
                           value="<?= htmlspecialchars($event['title']) ?>"
                           placeholder="e.g., Coffee Tasting Workshop">
                </div>
                
                <div class="event-form-field">
                    <label for="description" class="event-form-label">
                        Description <span class="required">*</span>
                    </label>
                    <textarea id="description" name="description" class="event-form-textarea" rows="5" required
                              placeholder="Provide details about the event..."><?= htmlspecialchars($event['description']) ?></textarea>
                    <p class="event-help-text">
                        This description will be visible to visitors on the website.
                    </p>
                </div>
            </div>
            
            <!-- Event Schedule Section -->
            <div class="event-section">
                <h3 class="event-section-title">Event Schedule</h3>
                
                <div class="event-form-row">
                    <div class="event-form-field">
                        <label for="event_date" class="event-form-label">
                            Event Date <span class="required">*</span>
                        </label>
                        <input type="date" id="event_date" name="event_date" class="event-form-input" required
                               value="<?= htmlspecialchars($event['event_date']) ?>">
                    </div>
                    
                    <div class="event-form-field">
                        <label for="event_time" class="event-form-label">
                            Event Time
                        </label>
                        <input type="time" id="event_time" name="event_time" class="event-form-input"
                               value="<?= htmlspecialchars($event['event_time'] ?? '') ?>">
                        <p class="event-help-text">
                            Optional - leave empty if time is not applicable
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Event Image Section -->
            <div class="event-section">
                <h3 class="event-section-title">Event Image</h3>
                
                <?php if ($event['image_url']): ?>
                <div class="event-current-image">
                    <span class="event-image-label">Current Image:</span>
                    <img src="/blvdsc-web-php/uploads/image.php?file=<?= htmlspecialchars($event['image_url']) ?>" 
                         alt="<?= htmlspecialchars($event['title']) ?>">
                </div>
                <?php endif; ?>
                
                <div class="event-form-field" style="margin-top: <?= $event['image_url'] ? '20px' : '0' ?>;">
                    <input type="file" id="image" name="image" class="event-form-file" accept="image/jpeg,image/png,image/webp">
                    <p class="event-help-text">
                        <i data-lucide="info"></i>
                        <?php if ($event['image_url']): ?>
                        Upload a new image to replace the current one, or leave empty to keep the existing image. 
                        <?php endif; ?>
                        Maximum file size: 10MB. Accepted formats: JPG, PNG, WEBP. Images will be automatically resized to 720px width.
                    </p>
                </div>
                
                <!-- New Image Preview -->
                <div id="imagePreview" class="event-image-preview" style="display: none;">
                    <span class="event-image-label">New Image Preview:</span>
                    <img id="previewImg" src="" alt="Preview">
                </div>
            </div>
            
            <!-- Event Status Section -->
            <div class="event-section">
                <h3 class="event-section-title">Event Status</h3>
                
                <div class="event-form-field">
                    <label for="status" class="event-form-label">
                        Publication Status <span class="required">*</span>
                    </label>
                    <select id="status" name="status" class="event-form-select event-form-select-limited" required>
                        <option value="draft" <?= $event['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
                        <option value="published" <?= $event['status'] === 'published' ? 'selected' : '' ?>>Published</option>
                        <option value="cancelled" <?= $event['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Initialize Lucide icons
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
    
    // Auto-dismiss flash messages after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessages = document.querySelectorAll('.flash-message');
        flashMessages.forEach(function(message) {
            setTimeout(function() {
                message.style.transition = 'opacity 0.3s ease-out';
                message.style.opacity = '0';
                setTimeout(function() {
                    message.remove();
                }, 300);
            }, 5000);
        });
    });
    
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file size
            if (file.size > 10 * 1024 * 1024) {
                alert('File size must be less than 10MB');
                this.value = '';
                document.getElementById('imagePreview').style.display = 'none';
                return;
            }
            
            // Validate file type
            if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {
                alert('Please select a valid image file (JPG, PNG, or WEBP)');
                this.value = '';
                document.getElementById('imagePreview').style.display = 'none';
                return;
            }
            
            // Show preview
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('imagePreview').style.display = 'none';
        }
    });
</script>
