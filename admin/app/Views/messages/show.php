<style>
/* Message Detail Container */
.message-detail-container {
    max-width: 900px;
    margin: 0 auto;
    padding: 0 20px 40px;
}

/* Page Header */
.message-page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 24px 0;
    margin-bottom: 24px;
}

.message-page-header-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.message-page-header-right {
    display: flex;
    gap: 12px;
}

/* Back Link */
.message-back-link {
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
    transition: background-color 0.15s;
}

.message-back-link:hover {
    background-color: #f3f4f6;
}

.message-back-link i {
    width: 16px;
    height: 16px;
}

/* Page Title */
.message-page-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #111827;
    margin: 0;
}

/* Message Card */
.message-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 32px;
    margin-bottom: 24px;
}

.message-section {
    margin-bottom: 24px;
}

.message-section:last-child {
    margin-bottom: 0;
}

.message-section-title {
    font-size: 0.875rem;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin: 0 0 12px 0;
}

/* Message Info Grid */
.message-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 24px;
}

.message-info-item {
    display: flex;
    flex-direction: column;
    gap: 4px;
}

.message-info-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.message-info-value {
    font-size: 0.875rem;
    color: #1f2937;
    font-weight: 500;
}

/* Message Content */
.message-content {
    background: #f9fafb;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    padding: 20px;
    margin-top: 16px;
}

.message-subject {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1f2937;
    margin: 0 0 12px 0;
}

.message-text {
    font-size: 0.875rem;
    line-height: 1.6;
    color: #374151;
    white-space: pre-wrap;
    margin: 0;
}

/* Status Badge */
.message-status {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 0.875rem;
    font-weight: 500;
}

.message-status.unread {
    background: #dbeafe;
    color: #1e40af;
}

.message-status.read {
    background: #f3f4f6;
    color: #6b7280;
}

.message-status.replied {
    background: #d1fae5;
    color: #065f46;
}

.message-status i {
    width: 14px;
    height: 14px;
}

/* Reply Section */
.reply-section {
    background: white;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    padding: 32px;
}

.reply-form-field {
    margin-bottom: 20px;
}

.reply-form-label {
    display: block;
    font-size: 0.875rem;
    font-weight:500;
    color: #374151;
    margin-bottom: 6px;
}

.reply-form-textarea {
    width: 100%;
    min-height: 200px;
    padding: 12px;
    font-size: 0.875rem;
    line-height: 1.6;
    color: #1f2937;
    background-color: #ffffff;
    border: 1px solid #d1d5db;
    border-radius: 6px;
    resize: vertical;
    font-family: inherit;
}

.reply-form-textarea:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

/* Buttons */
.message-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    font-size: 0.875rem;
    font-weight: 500;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.15s;
}

.message-btn-primary {
    background: #6B5744;
    color: white;
}

.message-btn-primary:hover {
    background: #4a3728;
}

.message-btn-danger {
    background: #dc2626;
    color: white;
}

.message-btn-danger:hover {
    background: #b91c1c;
}

.message-btn i {
    width: 16px;
    height: 16px;
}

/* Replied Notice */
.replied-notice {
    background: #d1fae5;
    border: 1px solid #10b981;
    border-radius: 6px;
    padding: 16px;
    display: flex;
    align-items: center;
    gap: 12px;
}

.replied-notice i {
    width: 20px;
    height: 20px;
    color: #065f46;
    flex-shrink: 0;
}

.replied-notice-content {
    flex: 1;
}

.replied-notice-content p {
    margin: 0;
    font-size: 0.875rem;
    color: #065f46;
    font-weight: 500;
}

.replied-notice-content small {
    font-size: 0.75rem;
    color: #047857;
}

/* Responsive */
@media (max-width: 640px) {
    .message-page-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
    }
    
    .message-card,
    .reply-section {
        padding: 20px;
    }
    
    .message-info-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Flash Messages -->
<?php
$successMessage = Session::flash('success');
$errorMessage = Session::flash('error');

if ($successMessage):
?>
<div class="flash-messages" style="margin-bottom: 0;">
    <div class="flash-message flash-success" style="display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; margin-bottom: 0; border-radius: 0; background-color: #10b981; color: white;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="check-circle"></i>
            <span><?= htmlspecialchars($successMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.parentElement.remove()" style="background: none; border: none; color: white; cursor: pointer; padding: 0; display: flex; align-items: center;">
            <i data-lucide="x"></i>
        </button>
    </div>
</div>
<?php endif; ?>

<?php if ($errorMessage): ?>
<div class="flash-messages" style="margin-bottom: 0;">
    <div class="flash-message flash-error" style="display: flex; align-items: center; justify-content: space-between; padding: 16px 20px; margin-bottom: 0; border-radius: 0; background-color: #ef4444; color: white;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <i data-lucide="x-circle"></i>
            <span><?= htmlspecialchars($errorMessage) ?></span>
        </div>
        <button class="flash-close" onclick="this.parentElement.parentElement.remove()" style="background: none; border: none; color: white; cursor: pointer; padding: 0; display: flex; align-items: center;">
            <i data-lucide="x"></i>
        </button>
    </div>
</div>
<?php endif; ?>

<div class="message-detail-container">
    <!-- Page Header -->
    <div class="message-page-header">
        <div class="message-page-header-left">
            <a href="<?= BASE_PATH ?>/messages" class="message-back-link">
                <i data-lucide="arrow-left"></i>
                Back
            </a>
            <h1 class="message-page-title">View Message</h1>
        </div>
        
        <div class="message-page-header-right">
            <button type="button" onclick="document.getElementById('deleteForm').submit();" class="message-btn message-btn-danger">
                <i data-lucide="trash-2"></i>
                Delete
            </button>
        </div>
    </div>

    <!-- Message Details Card -->
    <div class="message-card">
        <!-- Sender Information -->
        <div class="message-section">
            <h3 class="message-section-title">Message Details</h3>
            
            <div class="message-info-grid">
                <div class="message-info-item">
                    <span class="message-info-label">From</span>
                    <span class="message-info-value"><?= htmlspecialchars($message['name']) ?></span>
                </div>
                
                <div class="message-info-item">
                    <span class="message-info-label">Email</span>
                    <span class="message-info-value">
                        <a href="mailto:<?= htmlspecialchars($message['email']) ?>" style="color: #3b82f6; text-decoration: none;">
                            <?= htmlspecialchars($message['email']) ?>
                        </a>
                    </span>
                </div>
                
                <?php if (!empty($message['phone'])): ?>
                <div class="message-info-item">
                    <span class="message-info-label">Phone</span>
                    <span class="message-info-value">
                        <a href="tel:<?= htmlspecialchars($message['phone']) ?>" style="color: #3b82f6; text-decoration: none;">
                            <?= htmlspecialchars($message['phone']) ?>
                        </a>
                    </span>
                </div>
                <?php endif; ?>
                
                <div class="message-info-item">
                    <span class="message-info-label">Date</span>
                    <span class="message-info-value">
                        <?= date('F j, Y g:i A', strtotime($message['created_at'])) ?>
                    </span>
                </div>
                
                <div class="message-info-item">
                    <span class="message-info-label">Status</span>
                    <span>
                        <?php if ($message['replied_at']): ?>
                            <span class="message-status replied">
                                <i data-lucide="check-circle"></i>
                                Replied
                            </span>
                        <?php elseif ($message['is_read']): ?>
                            <span class="message-status read">
                                <i data-lucide="mail"></i>
                                Read
                            </span>
                        <?php else: ?>
                            <span class="message-status unread">
                                <i data-lucide="mail-open"></i>
                                Unread
                            </span>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
        
        <!-- Message Content -->
        <div class="message-section">
            <div class="message-content">
                <?php if (!empty($message['subject'])): ?>
                    <h4 class="message-subject"><?= htmlspecialchars($message['subject']) ?></h4>
                <?php endif; ?>
                <p class="message-text"><?= htmlspecialchars($message['message']) ?></p>
            </div>
        </div>
    </div>

    <!-- Conversation History -->
    <?php if (!empty($replies)): ?>
        <h3 class="message-section-title" style="margin-top: 32px; margin-bottom: 16px;">Conversation History</h3>
        <?php foreach ($replies as $reply): ?>
            <div class="message-card" style="padding: 24px; border-left: 4px solid #10b981; margin-bottom: 16px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <div style="width: 32px; height: 32px; background: #e5e7eb; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #374151;">
                            <i data-lucide="user" style="width: 16px; height: 16px;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 600; font-size: 0.875rem; color: #111827;">
                                <?= htmlspecialchars($reply['replier_name'] ?? 'Admin') ?>
                            </div>
                            <div style="font-size: 0.75rem; color: #6b7280;">
                                <?= ucfirst($reply['replier_role'] ?? 'Administrator') ?>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 0.8125rem; color: #6b7280; display: flex; align-items: center; gap: 6px;">
                        <i data-lucide="clock" style="width: 14px; height: 14px;"></i>
                        <?= date('M j, Y g:i A', strtotime($reply['created_at'])) ?>
                    </div>
                </div>
                <div class="message-text" style="color: #374151; font-size: 0.9375rem;">
                    <?= nl2br(htmlspecialchars($reply['reply_content'])) ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <!-- Reply Section -->
    <div class="reply-section" style="margin-top: 32px;">
        <h3 class="message-section-title">Send Reply</h3>
        
        <form method="POST" action="<?= BASE_PATH ?>/messages/<?= $message['id'] ?>/reply" id="replyForm">
            <input type="hidden" name="_csrf_token" value="<?= Session::csrf() ?>">
            
            <div class="reply-form-field">
                <label for="reply_message" class="reply-form-label">
                    Reply Message <span style="color: #dc2626;">*</span>
                </label>
                <textarea id="reply_message" name="reply_message" class="reply-form-textarea" required 
                          placeholder="Type your reply here..."></textarea>
                <p style="font-size: 0.8125rem; color: #6b7280; margin-top: 6px; margin-bottom: 0;">
                    This reply will be sent to <strong><?= htmlspecialchars($message['email']) ?></strong>
                </p>
            </div>
            
            <div style="display: flex; gap: 12px;">
                <button type="submit" class="message-btn message-btn-primary">
                    <i data-lucide="send"></i>
                    Send Reply
                </button>
            </div>
        </form>
    </div>
    
    <!-- Delete Form (Hidden) -->
    <form method="POST" action="<?= BASE_PATH ?>/messages/<?= $message['id'] ?>/delete" id="deleteForm" 
          onsubmit="return confirm('Are you sure you want to delete this message? This action cannot be undone.');">
        <input type="hidden" name="_csrf_token" value="<?= Session::csrf() ?>">
    </form>
</div>

<script>
// Initialize Lucide icons
setTimeout(() => {
    lucide.createIcons();
}, 100);
</script>
