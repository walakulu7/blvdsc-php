<?php
require_once __DIR__ . '/../../core/Model.php';

/**
 * Reservation Model
 * Handles all database operations for reservations
 */
class Reservation extends Model {
    protected $table = 'reservations';
    
    /**
     * Get all reservations with filters and pagination
     */
    public function getAll($filters = [], $page = 1, $limit = 20) {
        $where = [];
        $params = [];
        
        // Filter by status
        if (!empty($filters['status'])) {
            $where[] = "status = :status";
            $params[':status'] = $filters['status'];
        }
        
        // Filter by date range
        if (!empty($filters['date_from'])) {
            $where[] = "date >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        if (!empty($filters['date_to'])) {
            $where[] = "date <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }
        
        // Search across name, email, phone
        if (!empty($filters['search'])) {
            $where[] = "(customer_name LIKE :search OR email LIKE :search OR phone LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        // Default: only show upcoming reservations
        if (!isset($filters['show_all']) || !$filters['show_all']) {
            $where[] = "date >= CURDATE()";
        }
        
        // Build query
        $whereClause = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
        
        // Get total count for pagination
        $countSql = "SELECT COUNT(*) as total FROM {$this->table} {$whereClause}";
        $stmt = $this->db->prepare($countSql);
        $stmt->execute($params);
        $total = $stmt->fetch()['total'];
        
        // Get paginated results
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM {$this->table} {$whereClause} ORDER BY date DESC, time DESC LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        
        // Bind all params
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        // Bind pagination params
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        
        $stmt->execute();
        $results = $stmt->fetchAll();
        
        return [
            'data' => $results,
            'total' => $total,
            'pages' => ceil($total / $limit),
            'current_page' => $page,
            'per_page' => $limit
        ];
    }
    
    /**
     * Get single reservation by ID
     */
    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }
    
    /**
     * Update reservation status
     */
    public function updateStatus($id, $status) {
        $validStatuses = ['pending', 'confirmed', 'completed', 'cancelled'];
        
        if (!in_array($status, $validStatuses)) {
            return false;
        }
        
        $sql = "UPDATE {$this->table} SET status = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':status' => $status,
            ':id' => $id
        ]);
    }
    
    /**
     * Get statistics for dashboard and list page
     */
    public function getStats() {
        $sql = "SELECT 
            COUNT(*) as total,
            SUM(CASE WHEN date = CURDATE() THEN 1 ELSE 0 END) as today,
            SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
            SUM(CASE WHEN status = 'confirmed' THEN 1 ELSE 0 END) as confirmed,
            SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed,
            SUM(CASE WHEN status = 'cancelled' THEN 1 ELSE 0 END) as cancelled
        FROM {$this->table}";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetch();
    }
    
    /**
     * Get upcoming reservations
     */
    public function getUpcoming($limit = null) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE date >= CURDATE() 
                ORDER BY date ASC, time ASC";
        
        if ($limit) {
            $sql .= " LIMIT :limit";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            $stmt = $this->db->query($sql);
        }
        
        return $stmt->fetchAll();
    }
    
    /**
     * Get reservations by date range
     */
    public function getByDateRange($startDate, $endDate) {
        $sql = "SELECT * FROM {$this->table} 
                WHERE date BETWEEN :start AND :end 
                ORDER BY date ASC, time ASC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':start' => $startDate,
            ':end' => $endDate
        ]);
        
        return $stmt->fetchAll();
    }
    
    /**
     * Delete reservation
     */
    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
    
    /**
     * Get all reservations for CSV export (no pagination)
     */
    public function getAllForExport($filters = []) {
        $where = [];
        $params = [];
        
        // Same filters as getAll()
        if (!empty($filters['status'])) {
            $where[] = "status = :status";
            $params[':status'] = $filters['status'];
        }
        
        if (!empty($filters['date_from'])) {
            $where[] = "date >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        if (!empty($filters['date_to'])) {
            $where[] = "date <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }
        
        if (!empty($filters['search'])) {
            $where[] = "(customer_name LIKE :search OR email LIKE :search OR phone LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        if (!isset($filters['show_all']) || !$filters['show_all']) {
            $where[] = "date >= CURDATE()";
        }
        
        $whereClause = !empty($where) ? 'WHERE ' . implode(' AND ', $where) : '';
        
        $sql = "SELECT * FROM {$this->table} {$whereClause} ORDER BY date DESC, time DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll();
    }
}
