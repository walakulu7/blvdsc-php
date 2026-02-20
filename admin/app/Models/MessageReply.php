<?php
require_once __DIR__ . '/../../core/Model.php';

class MessageReply extends Model {
    protected $table = 'message_replies';

    /**
     * Get replies for a specific message
     */
    public function getByMessageId($messageId) {
        $sql = "SELECT r.*, u.username as replier_name, u.role as replier_role 
                FROM {$this->table} r 
                LEFT JOIN admin_users u ON r.user_id = u.id 
                WHERE r.message_id = ? 
                ORDER BY r.created_at ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$messageId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Create a new reply
     */
    public function createReply($data) {
        return $this->create([
            'message_id' => $data['message_id'],
            'user_id' => $data['user_id'],
            'reply_content' => $data['reply_content']
        ]);
    }
}
