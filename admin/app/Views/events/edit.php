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
        <h1 class="header-title">Edit Event</h1>
    </div>
    
    <form method="POST" action="<?= BASE_PATH ?>/events/<?= $event['id'] ?>/delete" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this event? This action cannot be undone.');">
        <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
        <button type="submit" class="btn btn-danger">
            <i data-lucide="trash-2"></i>
            Delete Event
        </button>
    </form>
</div>

<!-- Edit Event Form -->
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Event Details</h2>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= BASE_PATH ?>/events/<?= $event['id'] ?>" enctype="multipart/form-data" id="eventForm">
            <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">
            
            <div class="form-group">
                <label for="title">Event Title <span class="required">*</span></label>
                <input type="text" id="title" name="title" class="form-control" required 
                       value="<?= htmlspecialchars($event['title']) ?>"
                       placeholder="e.g., Coffee Tasting Workshop">
            </div>
            
            <div class="form-group">
                <label for="description">Description <span class="required">*</span></label>
                <textarea id="description" name="description" class="form-control" rows="6" required
                          placeholder="Provide details about the event..."><?= htmlspecialchars($event['description']) ?></textarea>
            </div>
            
            <div class="form-grid" style="grid-template-columns: 1fr 1fr;">
                <div class="form-group">
                    <label for="event_date">Event Date <span class="required">*</span></label>
                    <input type="date" id="event_date" name="event_date" class="form-control" required
                           value="<?= htmlspecialchars($event['event_date']) ?>">
                </div>
                
                <div class="form-group">
                    <label for="event_time">Event Time</label>
                    <input type="time" id="event_time" name="event_time" class="form-control"
                           value="<?= htmlspecialchars($event['event_time'] ?? '') ?>">
                </div>
            </div>
            
            <div class="form-group">
                <label for="image">Event Image</label>
                
                <!-- Current Image -->
                <?php if ($event['image_url']): ?>
                <div style="margin-bottom: var(--spacing-md);">
                    <label style="font-size: var(--text-sm); color: var(--color-gray-600); display: block; margin-bottom: 8px;">Current Image:</label>
                    <img src="<?= BASE_PATH ?>/<?= htmlspecialchars($event['image_url']) ?>" 
                         alt="<?= htmlspecialchars($event['title']) ?>" 
                         style="max-width: 400px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                </div>
                <?php endif; ?>
                
                <input type="file" id="image" name="image" class="form-control" accept="image/jpeg,image/png,image/webp">
                <div style="margin-top: 8px; font-size: var(--text-sm); color: var(--color-gray-600);">
                    <i data-lucide="info"></i>
                    <?php if ($event['image_url']): ?>
                    Upload a new image to replace the current one. Leave empty to keep current image.
                    <?php else: ?>
                    Maximum file size: 10MB. Accepted formats: JPG, PNG, WEBP. Images will be automatically resized to 720px width.
                    <?php endif; ?>
                </div>
                
                <!-- New Image Preview -->
                <div id="imagePreview" style="margin-top: var(--spacing-md); display: none;">
                    <label style="font-size: var(--text-sm); color: var(--color-gray-600); display: block; margin-bottom: 8px;">New Image Preview:</label>
                    <img id="previewImg" src="" alt="Preview" style="max-width: 400px; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm);">
                </div>
            </div>
            
            <div class="form-group">
                <label for="status">Status <span class="required">*</span></label>
                <select id="status" name="status" class="form-control" required>
                    <option value="draft" <?= $event['status'] === 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="published" <?= $event['status'] === 'published' ? 'selected' : '' ?>>Published</option>
                    <option value="cancelled" <?= $event['status'] === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i data-lucide="save"></i>
                    Update Event
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
</script>
