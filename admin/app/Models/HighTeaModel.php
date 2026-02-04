<?php
require_once __DIR__ . '/../../core/Model.php';

/**
 * High Tea Model
 * Handles all database operations for High Tea bookings
 */
class HighTeaModel extends Model
{
    /**
     * Find bookings with filters and pagination
     */
    public function findWithFilters($filters = [], $page = 1, $perPage = 10)
    {
        $where = [];
        $params = [];
        
        // Status filter
        if (isset($filters['status']) && !empty($filters['status'])) {
            $where[] = "status = :status";
            $params[':status'] = $filters['status'];
        }
        
        // Package type filter
        if (isset($filters['package_type']) && !empty($filters['package_type'])) {
            $where[] = "package_type = :package_type";
            $params[':package_type'] = $filters['package_type'];
        }
        
        // Date from filter
        if (isset($filters['date_from']) && !empty($filters['date_from'])) {
            $where[] = "date >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        // Date to filter
        if (isset($filters['date_to']) && !empty($filters['date_to'])) {
            $where[] = "date <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }
        
        // Search filter (name, email, phone)
        if (isset($filters['search']) && !empty($filters['search'])) {
            $where[] = "(customer_name LIKE :search OR email LIKE :search OR phone LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        // Build WHERE clause
        $whereClause = count($where) > 0 ? 'WHERE ' . implode(' AND ', $where) : '';
        
        // Calculate offset
        $offset = ($page - 1) * $perPage;
        
        // Build and execute query
        $sql = "SELECT * FROM high_tea_reservations $whereClause ORDER BY date DESC, time DESC LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        
        // Bind parameters
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get total count with filters
     */
    public function getTotalCount($filters = [])
    {
        $where = [];
        $params = [];
        
        // Status filter
        if (isset($filters['status']) && !empty($filters['status'])) {
            $where[] = "status = :status";
            $params[':status'] = $filters['status'];
        }
        
        // Package type filter
        if (isset($filters['package_type']) && !empty($filters['package_type'])) {
            $where[] = "package_type = :package_type";
            $params[':package_type'] = $filters['package_type'];
        }
        
        // Date from filter
        if (isset($filters['date_from']) && !empty($filters['date_from'])) {
            $where[] = "date >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        // Date to filter
        if (isset($filters['date_to']) && !empty($filters['date_to'])) {
            $where[] = "date <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }
        
        // Search filter
        if (isset($filters['search']) && !empty($filters['search'])) {
            $where[] = "(customer_name LIKE :search OR email LIKE :search OR phone LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        // Build WHERE clause
        $whereClause = count($where) > 0 ? 'WHERE ' . implode(' AND ', $where) : '';
        
        $sql = "SELECT COUNT(*) as total FROM high_tea_reservations $whereClause";
        
        $stmt = $this->db->prepare($sql);
        
        // Bind parameters
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return (int) $result['total'];
    }
    
    /**
     * Find booking by ID
     */
    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM high_tea_reservations WHERE id = :id");
        $stmt->execute([':id' => $id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Update booking status
     */
    public function updateStatus($id, $status)
    {
        $stmt = $this->db->prepare("
            UPDATE high_tea_reservations 
            SET status = :status 
            WHERE id = :id
        ");
        
        return $stmt->execute([
            ':status' => $status,
            ':id' => $id
        ]);
    }
    
    /**
     * Get statistics
     */
    public function getStats()
    {
        $stats = [
            'today' => 0,
            'pending' => 0,
            'confirmed' => 0,
            'total' => 0
        ];
        
        // Today's bookings
        $stmt = $this->db->query("
            SELECT COUNT(*) as count 
            FROM high_tea_reservations 
            WHERE date = CURDATE()
        ");
        $stats['today'] = (int) $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        // Pending bookings
        $stmt = $this->db->query("
            SELECT COUNT(*) as count 
            FROM high_tea_reservations 
            WHERE status = 'pending' AND date >= CURDATE()
        ");
        $stats['pending'] = (int) $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        // Confirmed bookings
        $stmt = $this->db->query("
            SELECT COUNT(*) as count 
            FROM high_tea_reservations 
            WHERE status = 'confirmed' AND date >= CURDATE()
        ");
        $stats['confirmed'] = (int) $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        // Total bookings
        $stmt = $this->db->query("
            SELECT COUNT(*) as count 
            FROM high_tea_reservations
        ");
        $stats['total'] = (int) $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        return $stats;
    }
    
    /**
     * Export bookings to CSV
     */
    public function exportToCSV($filters = [])
    {
        $where = [];
        $params = [];
        
        // Apply same filters as findWithFilters
        if (isset($filters['status']) && !empty($filters['status'])) {
            $where[] = "status = :status";
            $params[':status'] = $filters['status'];
        }
        
        if (isset($filters['package_type']) && !empty($filters['package_type'])) {
            $where[] = "package_type = :package_type";
            $params[':package_type'] = $filters['package_type'];
        }
        
        if (isset($filters['date_from']) && !empty($filters['date_from'])) {
            $where[] = "date >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        if (isset($filters['date_to']) && !empty($filters['date_to'])) {
            $where[] = "date <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }
        
        if (isset($filters['search']) && !empty($filters['search'])) {
            $where[] = "(customer_name LIKE :search OR email LIKE :search OR phone LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        $whereClause = count($where) > 0 ? 'WHERE ' . implode(' AND ', $where) : '';
        
        $sql = "SELECT * FROM high_tea_reservations $whereClause ORDER BY date DESC, time DESC";
        
        $stmt = $this->db->prepare($sql);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
