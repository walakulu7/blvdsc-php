<?php

require_once __DIR__ . '/../../core/Model.php';

class MessageModel extends Model
{
    /**
     * Get all messages with optional filters
     */
    public function getAll($filters = [])
    {
        $sql = "SELECT * FROM contact_messages WHERE 1=1";
        $params = [];
        
        // Filter by status
        if (isset($filters['status'])) {
            if ($filters['status'] === 'unread') {
                $sql .= " AND is_read = 0";
            } elseif ($filters['status'] === 'read') {
                $sql .= " AND is_read = 1 AND replied_at IS NULL";
            } elseif ($filters['status'] === 'replied') {
                $sql .= " AND replied_at IS NOT NULL";
            }
        }
        
        // Filter by date range
        if (!empty($filters['date_from'])) {
            $sql .= " AND DATE(created_at) >= ?";
            $params[] = $filters['date_from'];
        }
        
        if (!empty($filters['date_to'])) {
            $sql .= " AND DATE(created_at) <= ?";
            $params[] = $filters['date_to'];
        }
        
        // Search in name, email, subject, message
        if (!empty($filters['search'])) {
            $sql .= " AND (name LIKE ? OR email LIKE ? OR subject LIKE ? OR message LIKE ?)";
            $searchTerm = '%' . $filters['search'] . '%';
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
            $params[] = $searchTerm;
        }
        
        // Order by newest first
        $sql .= " ORDER BY created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll();
    }
    
    /**
     * Get single message by ID
     */
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM contact_messages WHERE id = ?");
        $stmt->execute([$id]);
        
        return $stmt->fetch();
    }
    
    /**
     * Mark message as read
     */
    public function markAsRead($id)
    {
        $stmt = $this->db->prepare("UPDATE contact_messages SET is_read = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    /**
     * Mark message as replied
     */
    public function markAsReplied($id)
    {
        $stmt = $this->db->prepare("UPDATE contact_messages SET replied_at = NOW() WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    /**
     * Delete message
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM contact_messages WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    /**
     * Get statistics
     */
    public function getStats()
    {
        // Total messages
        $stmt = $this->db->query("SELECT COUNT(*) as total FROM contact_messages");
        $total = $stmt->fetch()['total'];
        
        // Unread messages
        $stmt = $this->db->query("SELECT COUNT(*) as unread FROM contact_messages WHERE is_read = 0");
        $unread = $stmt->fetch()['unread'];
        
        // Replied messages
        $stmt = $this->db->query("SELECT COUNT(*) as replied FROM contact_messages WHERE replied_at IS NOT NULL");
        $replied = $stmt->fetch()['replied'];
        
        // Today's messages
        $stmt = $this->db->query("SELECT COUNT(*) as today FROM contact_messages WHERE DATE(created_at) = CURDATE()");
        $today = $stmt->fetch()['today'];
        
        return [
            'total' => $total,
            'unread' => $unread,
            'replied' => $replied,
            'today' => $today
        ];
    }
    
    /**
     * Search messages
     */
    public function searchMessages($query)
    {
        $stmt = $this->db->prepare("
            SELECT * FROM contact_messages 
            WHERE name LIKE ? OR email LIKE ? OR subject LIKE ? OR message LIKE ?
            ORDER BY created_at DESC
        ");
        
        $searchTerm = '%' . $query . '%';
        $stmt->execute([$searchTerm, $searchTerm, $searchTerm, $searchTerm]);
        
        return $stmt->fetchAll();
    }
}
