<?php
/**
 * Base Model Class
 * All models extend this class for database operations
 */
class Model {
    protected $db;
    protected $table;
    
    public function __construct() {
        global $pdo;
        $this->db = $pdo;
    }
    
    /**
     * Get all records
     */
    public function all($orderBy = 'id', $order = 'ASC') {
        $sql = "SELECT * FROM {$this->table} ORDER BY $orderBy $order";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Find record by ID
     */
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Create new record
     */
    public function create($data) {
        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');
        
        $sql = "INSERT INTO {$this->table} (" . implode(',', $fields) . ") 
                VALUES (" . implode(',', $placeholders) . ")";
        
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(array_values($data));
        
        if ($result) {
            return $this->db->lastInsertId();
        }
        
        return false;
    }
    
    /**
     * Update record by ID
     */
    public function update($id, $data) {
        $fields = [];
        foreach (array_keys($data) as $field) {
            $fields[] = "$field = ?";
        }
        
        $sql = "UPDATE {$this->table} SET " . implode(', ', $fields) . " WHERE id = ?";
        $values = array_values($data);
        $values[] = $id;
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($values);
    }
    
    /**
     * Delete record by ID
     */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    /**
     * Find records by conditions
     */
    public function where($conditions, $operator = 'AND') {
        $where = [];
        $values = [];
        
        foreach ($conditions as $field => $value) {
            $where[] = "$field = ?";
            $values[] = $value;
        }
        
        $sql = "SELECT * FROM {$this->table} WHERE " . implode(" $operator ", $where);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Find first record by conditions
     */
    public function first($conditions) {
        $results = $this->where($conditions);
        return $results[0] ?? null;
    }
    
    /**
     * Count records
     */
    public function count($conditions = []) {
        if (empty($conditions)) {
            $stmt = $this->db->query("SELECT COUNT(*) FROM {$this->table}");
            return $stmt->fetchColumn();
        }
        
        $where = [];
        $values = [];
        
        foreach ($conditions as $field => $value) {
            $where[] = "$field = ?";
            $values[] = $value;
        }
        
        $sql = "SELECT COUNT(*) FROM {$this->table} WHERE " . implode(' AND ', $where);
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        return $stmt->fetchColumn();
    }
    
    /**
     * Execute raw query
     */
    public function query($sql, $params = []) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Paginate results
     */
    public function paginate($page = 1, $perPage = 20, $conditions = []) {
        $offset = ($page - 1) * $perPage;
        
        $where = '';
        $values = [];
        
        if (!empty($conditions)) {
            $whereArr = [];
            foreach ($conditions as $field => $value) {
                $whereArr[] = "$field = ?";
                $values[] = $value;
            }
            $where = ' WHERE ' . implode(' AND ', $whereArr);
        }
        
        // Get total count
        $countSql = "SELECT COUNT(*) FROM {$this->table}$where";
        $countStmt = $this->db->prepare($countSql);
        $countStmt->execute($values);
        $total = $countStmt->fetchColumn();
        
        // Get paginated data
        $sql = "SELECT * FROM {$this->table}$where ORDER BY id DESC LIMIT $perPage OFFSET $offset";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($values);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return [
            'data' => $data,
            'total' => $total,
            'page' => $page,
            'perPage' => $perPage,
            'totalPages' => ceil($total / $perPage)
        ];
    }
}
