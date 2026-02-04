<?php
require_once __DIR__ . '/../../core/Model.php';

/**
 * User Model
 * Handles admin user operations
 */
class User extends Model {
    protected $table = 'admin_users';
    
    /**
     * Get active users
     */
    public function getActive() {
        return $this->where(['is_active' => 1]);
    }
    
    /**
     * Get users by role
     */
    public function getByRole($role) {
        return $this->where(['role' => $role]);
    }
    
    /**
     * Get recent users
     */
    public function recent($limit = 5) {
        $sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC LIMIT ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Create user with password hashing
     */
    public function createUser($data) {
        // Hash password
        if (isset($data['password'])) {
            $data['password_hash'] = password_hash($data['password'], PASSWORD_DEFAULT);
            unset($data['password']);
        }
        
        // Set creation time
        $data['created_at'] = date('Y-m-d H:i:s');
        
        // Set created_by if authenticated
        if (Auth::check()) {
            $data['created_by'] = Auth::id();
        }
        
        return $this->create($data);
    }
    
    /**
     * Update user password
     */
    public function updatePassword($userId, $newPassword) {
        $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        return $this->update($userId, ['password_hash' => $passwordHash]);
    }
    
    /**
     * Deactivate user
     */
    public function deactivate($userId) {
        return $this->update($userId, ['is_active' => 0]);
    }
    
    /**
     * Activate user
     */
    public function activate($userId) {
        return $this->update($userId, ['is_active' => 1]);
    }
    
    /**
     * Get user activity log
     */
    public function getActivityLog($userId, $limit = 20) {
        $sql = "SELECT * FROM admin_activity_log 
                WHERE admin_id = ? 
                ORDER BY created_at DESC 
                LIMIT ?";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Check if username exists
     */
    public function usernameExists($username, $excludeId = null) {
        if ($excludeId) {
            $sql = "SELECT COUNT(*) FROM {$this->table} WHERE username = ? AND id != ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$username, $excludeId]);
        } else {
            $sql = "SELECT COUNT(*) FROM {$this->table} WHERE username = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$username]);
        }
        
        return $stmt->fetchColumn() > 0;
    }
}
