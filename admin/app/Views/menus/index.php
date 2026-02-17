<?php
// Flash Messages
$successMessage = Session::flash('success');
$errorMessage = Session::flash('error');
$warningMessage = Session::flash('warning');

if ($successMessage || $errorMessage || $warningMessage):
?>
<div class="flash-messages">
    <?php if ($successMessage): ?>
    <div class="flash-message flash-success">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="check-circle"></i>
            <span><?= htmlspecialchars($successMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
    <?php endif; ?>
    
    <?php if ($errorMessage): ?>
    <div class="flash-message flash-error">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="x-circle"></i>
            <span><?= htmlspecialchars($errorMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
    <?php endif; ?>
    
    <?php if ($warningMessage): ?>
    <div class="flash-message flash-warning">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="alert-triangle"></i>
            <span><?= htmlspecialchars($warningMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.remove()">
            <i data-lucide="x"></i>
        </button>
    </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Page Header -->
<div class="card-header" style="margin-bottom: var(--spacing-xl); padding: var(--spacing-lg); border-bottom: none; background: #c9a870; border-radius: var(--border-radius-xl); box-shadow: var(--shadow-sm);">
    <h1 class="header-title">Menus</h1>
    <a href="<?= BASE_PATH ?>/menus/create" class="btn btn-primary">
        <i data-lucide="plus"></i>
        Create Menu
    </a>
</div>

<!-- Statistics Row -->
<div class="stat-row">
    <div class="stat-row-item stat-info">
        <div class="stat-content">
            <h4>Total</h4>
            <div class="value"><?= $stats['total'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="list"></i>
        </div>
    </div>
    <div class="stat-row-item stat-success">
        <div class="stat-content">
            <h4>Published</h4>
            <div class="value"><?= $stats['published'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="check-circle-2"></i>
        </div>
    </div>
    <div class="stat-row-item stat-warning">
        <div class="stat-content">
            <h4>Draft</h4>
            <div class="value"><?= $stats['draft'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="file-edit"></i>
        </div>
    </div>
    <div class="stat-row-item stat-primary">
        <div class="stat-content">
            <h4>Categories</h4>
            <div class="value"><?= $stats['total'] ?></div>
        </div>
        <div class="stat-icon">
            <i data-lucide="coffee"></i>
        </div>
    </div>
</div>

<!-- Menus Table -->
<div class="card">
    <div class="card-body" style="padding: 0; overflow-x: auto;">
        <?php if (empty($menus)): ?>
        <div style="text-align: center; padding: 60px 20px; color: var(--color-gray-400);">
            <i data-lucide="coffee" style="width: 64px; height: 64px; margin: 0 auto 16px;"></i>
            <p style="font-size: 18px; font-weight: 500; margin-bottom: 8px;">No menus found</p>
            <p style="font-size: 14px;">Create your first menu to get started.</p>
        </div>
        <?php else: ?>
        <table class="data-table">
            <thead>
                <tr>
                    <th style="width: 80px; text-align: center;">ORDER</th>
                    <th style="width: 120px;">IMAGE</th>
                    <th>TITLE</th>
                    <th style="width: 130px; text-align: center;">STATUS</th>
                    <th style="width: 180px; text-align: center;">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menus as $menu): ?>
                <tr>
                    <td style="text-align: center; font-weight: 600; color: #6b7280; font-size: 18px;">
                        <?= htmlspecialchars($menu['display_order']) ?>
                    </td>
                    <td>
                        <?php if (!empty($menu['image_url'])): ?>
                            <img 
                                src="<?= BASE_URL ?>/../<?= htmlspecialchars($menu['image_url']) ?>" 
                                alt="<?= htmlspecialchars($menu['title']) ?>"
                                style="width: 80px; height: auto; border-radius: var(--border-radius-md); box-shadow: var(--shadow-sm); cursor: pointer;"
                                onclick="window.open(this.src, '_blank')"
                            >
                        <?php else: ?>
                            <div style="width: 80px; height: 80px; background: var(--color-gray-100); border-radius: var(--border-radius-md); display: flex; align-items: center; justify-content: center;">
                                <i data-lucide="image-off" style="color: var(--color-gray-400); width: 24px; height: 24px;"></i>
                            </div>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="font-weight: 600; color: var(--color-gray-900); margin-bottom: 4px; font-size: 15px;">
                            <?= htmlspecialchars($menu['title']) ?>
                        </div>
                        <div style="font-size: 13px; color: var(--color-gray-500);">
                            <?= htmlspecialchars($menu['slug']) ?>
                        </div>
                    </td>
                    <td style="text-align: center;">
                        <?php if ($menu['status'] === 'published'): ?>
                            <span class="badge badge-success">Published</span>
                        <?php else: ?>
                            <span class="badge badge-warning">Draft</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div style="display: flex; gap: 8px; justify-content: center; align-items: center;">
                            <a href="<?= BASE_PATH ?>/menus/<?= $menu['id'] ?>/edit" class="btn btn-secondary btn-sm">
                                <i data-lucide="edit-3"></i>
                                Edit
                            </a>
                            <form method="POST" action="<?= BASE_PATH ?>/menus/<?= $menu['id'] ?>/delete" style="display: inline; margin: 0;" onsubmit="return confirm('Are you sure you want to delete this menu? This action cannot be undone.');">
                                <input type="hidden" name="_csrf_token" value="<?= Session::csrf() ?>">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i data-lucide="trash-2"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
</div>

<script>
    // Initialize Lucide icons for dynamically loaded content
    setTimeout(() => {
        lucide.createIcons();
    }, 100);
</script>
