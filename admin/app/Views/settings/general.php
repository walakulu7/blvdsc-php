<div style="max-width: 800px;">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Business Information</h2>
            <p style="font-size: var(--text-sm); color: var(--color-gray-500); margin: 0;">Manage your global business details</p>
        </div>
        <div class="card-body">
            <form action="<?= BASE_PATH ?>/settings/general" method="POST">
                <input type="hidden" name="_csrf_token" value="<?= Session::get('csrf_token') ?>">

                <div class="form-group">
                    <label class="form-label" for="site_name">Business Name</label>
                    <input type="text" id="site_name" name="site_name" class="form-input" 
                           value="<?= htmlspecialchars($settings['site_name'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="contact_email">Contact Email</label>
                    <input type="email" id="contact_email" name="contact_email" class="form-input" 
                           value="<?= htmlspecialchars($settings['contact_email'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="contact_phone">Contact Number</label>
                    <input type="tel" id="contact_phone" name="contact_phone" class="form-input" 
                           value="<?= htmlspecialchars($settings['contact_phone'] ?? '') ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="address">Address</label>
                    <textarea id="address" name="address" class="form-input" rows="3"><?= htmlspecialchars($settings['address'] ?? '') ?></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label" for="opening_hours">Opening Hours</label>
                    <textarea id="opening_hours" name="opening_hours" class="form-input" rows="3" 
                              placeholder="e.g. Mon-Fri: 8AM-8PM&#10;Sat-Sun: 9AM-9PM"><?= htmlspecialchars($settings['opening_hours'] ?? '') ?></textarea>
                    <span class="form-hint">Enter each day/range on a new line</span>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i data-lucide="save" style="width: 16px; height: 16px;"></i>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    setTimeout(() => { lucide.createIcons(); }, 100);
</script>
