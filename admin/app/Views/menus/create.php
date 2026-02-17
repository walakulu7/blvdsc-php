<style>
/* ==========================================================================
   Menu Create Form Styles (matching Event Create)
   ========================================================================== */

/* Page Container - Centered layout with max width */
.menu-create-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Page Header - Back button and action buttons */
.menu-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px 0;
    margin-bottom: 24px;
}

.menu-page-header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.menu-page-header-right {
    display: flex;
    gap: 12px;
}

/* Form Card - White background with shadow */
.menu-form-card {
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 32px;
}

/* Section Headers - Visual separation */
.menu-section {
    margin-bottom: 32px;
}

.menu-section:last-child {
    margin-bottom: 0;
}

.menu-section-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 20px 0;
}

/* Form Fields - Proper spacing and widths */
.menu-form-field {
    margin-bottom: 20px;
}

.menu-form-field:last-child {
    margin-bottom: 0;
}

.menu-form-label {
    display: block;
    font-size: 0.875rem;
    font-weight: 500;
    color: #374151;
    margin-bottom: 6px;
}

.menu-form-label .required {
    color: #dc2626;
}

/* Input Fields - Consistent styling with focus states */
.menu-form-input,
.menu-form-select {
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

.menu-form-input:focus,
.menu-form-select:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Help Text */
.menu-help-text {
    font-size: 0.8125rem;
    color: #6b7280;
    margin-top: 6px;
    margin-bottom: 0;
}

/* Form Row */
.menu-form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

/* Buttons - Improved styling */
.menu-btn {
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

.menu-btn-primary {
    color: #ffffff;
    background-color: #6B5744;
}

.menu-btn-primary:hover {
    background-color: #4a3728;
}

.menu-btn-secondary {
    color: #374151;
    background-color: #f3f4f6;
    border: 1px solid #d1d5db;
}

.menu-btn-secondary:hover {
    background-color: #e5e7eb;
}

.menu-btn i {
    width: 16px;
    height: 16px;
}

/* Back Link */
.menu-back-link {
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

.menu-back-link:hover {
    background-color: #f3f4f6;
}

.menu-back-link i {
    width: 16px;
    height: 16px;
}

/* Page Title */
.menu-page-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #111827;
    margin: 0;
}

/* Image Preview */
.menu-image-preview {
    margin-top: 12px;
    max-width: 300px;
}

.menu-image-preview img {
    width: 100%;
    height: auto;
    border-radius: 6px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}

/* Responsive */
@media (max-width: 640px) {
    .menu-page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
    
    .menu-page-header-left {
        width: 100%;
    }
    
    .menu-page-header-right {
        width: 100%;
    }
    
    .menu-form-card {
        padding: 20px;
    }
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

<div class="menu-create-container">
    <!-- Page Header -->
    <div class="menu-page-header">
        <div class="menu-page-header-left">
            <a href="<?= BASE_PATH ?>/menus" class="menu-back-link">
                <i data-lucide="arrow-left"></i>
                Back
            </a>
            <h1 class="menu-page-title">Create Menu</h1>
        </div>
        
        <div class="menu-page-header-right">
            <button type="submit" form="menuForm" class="menu-btn menu-btn-primary">
                <i data-lucide="save"></i>
                Create Menu
            </button>
        </div>
    </div>

    <!-- Create Menu Form -->
    <div class="menu-form-card">
        <form method="POST" action="<?= BASE_PATH ?>/menus" enctype="multipart/form-data" id="menuForm">
            <input type="hidden" name="_csrf_token" value="<?= Session::csrf() ?>">
            
            <!-- Menu Information Section -->
            <div class="menu-section">
                <h3 class="menu-section-title">Menu Information</h3>
                
                <div class="menu-form-field">
                    <label for="title" class="menu-form-label">
                        Title <span class="required">*</span>
                    </label>
                    <input type="text" id="title" name="title" class="menu-form-input" required 
                           placeholder="e.g., Coffee & Tea">
                    <p class="menu-help-text">
                        Menu category name (will be displayed in tabs)
                    </p>
                </div>
                
                <div class="menu-form-row">
                    <div class="menu-form-field">
                        <label for="display_order" class="menu-form-label">
                            Display Order <span class="required">*</span>
                        </label>
                        <input type="number" id="display_order" name="display_order" class="menu-form-input" 
                               value="<?= $next_order ?? 1 ?>" min="0" required>
                        <p class="menu-help-text">
                            Lower numbers appear first
                        </p>
                    </div>
                    
                    <div class="menu-form-field">
                        <label for="status" class="menu-form-label">
                            Status <span class="required">*</span>
                        </label>
                        <select id="status" name="status" class="menu-form-select" required>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                        <p class="menu-help-text">
                            Only published menus appear on the website
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Menu Image Section -->
            <div class="menu-section">
                <h3 class="menu-section-title">Menu Image</h3>
                
                <div class="menu-form-field">
                    <label for="image" class="menu-form-label">
                        Upload Image <span class="required">*</span>
                    </label>
                    <input type="file" id="image" name="image" class="menu-form-input" 
                           accept="image/jpeg,image/png,image/webp" required onchange="previewMenuImage(event)">
                    <p class="menu-help-text">
                        Upload menu image (JPG, PNG, WEBP). Max 10MB.<br>
                        Images will be automatically resized to 794×1123 pixels (A4 size).
                    </p>
                </div>
                
                <div id="menuImagePreview" style="display: none;">
                    <div class="menu-image-preview">
                        <img id="previewMenuImg" src="" alt="Preview">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
function previewMenuImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewMenuImg').src = e.target.result;
            document.getElementById('menuImagePreview').style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
}

// Initialize Lucide icons
setTimeout(() => {
    lucide.createIcons();
}, 100);
</script>
