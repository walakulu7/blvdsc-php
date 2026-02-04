<!-- Flash Messages -->
<?php if (Session::has('error')): ?>
<div class="flash-messages">
    <div class="flash-message flash-error">
        <i data-lucide="x-circle"></i>
        <?= Session::flash('error') ?>
    </div>
</div>
<?php endif; ?>

<!-- Page Header -->
<div class="page-header">
    <div style="display: flex; align-items: center; gap: var(--spacing-md);">
        <a href="<?= BASE_PATH ?>/events" class="btn btn-secondary">
            <i data-lucide="arrow-left"></i>
            Back
        </a>
        <h1 class="header-title">Create Event</h1>
    </div>
</div>

<!-- Create Event Form -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Event Details</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= BASE_PATH ?>/events" enctype="multipart/form-data" id="eventForm">
            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
            
            <div class="form-group">
                <label for="title">Event Title <span class="required">*</span></label>
                <input type="text" id="title" name="title" class="form-control" required 
                       placeholder="e.g., Coffee Tasting Workshop">
            </div>
            
            <div class="form-group">
                <label for="description">Description <span class="required">*</span></label>
                <textarea id="description" name="description" class="form-control" rows="6" required
                          placeholder="Provide details about the event..."></textarea>
            </div>
            
            <div class="form-grid" style="grid-template-columns: 1fr 1fr;">
                <div class="form-group">
                    <label for="event_date">Event Date <span class="required">*</span></label>
                    <input type="date" id="event_date" name="event_date" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="event_time">Event Time</label>
                    <input type="time" id="event_time" name="event_time" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="image">Event Image</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                <div style="margin-top: 8px; font-size: var(--text-sm); color: var(--color-gray-600);">
                    <i data-lucide="info"></i>
                    Maximum file size: 10MB. Accepted formats: JPG, PNG, WEBP. Images will be automatically resized to 720px width.
                </div>
                
                <!-- Image Preview -->
                <div id="imagePreview" style="margin-top: var(--spacing-md); display: none;">
                    <img id="previewImg" src="" alt="Preview" style="max-width: 400px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                </div>
            </div>
            
            <div class="form-group">
                <label for="status">Status <span class="required">*</span></label>
                <select id="status" name="status" class="form-control" required>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="save"></i>
                    Create Event
                </button>
                <a href="<?= BASE_PATH ?>/events" class="btn btn-secondary">
                    <i data-lucide="x"></i>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>

<script>
    // Initialize Lucide icons
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
    
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
    
    // Set minimum date to today
    const dateInput = document.getElementById('event_date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.setAttribute('min', today);
</script>
