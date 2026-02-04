<?php
require_once __DIR__ . '/../../core/Model.php';

/**
 * Event Model
 * Handles all database operations for events
 */
class EventModel extends Model
{
    /**
     * Find events with filters and pagination
     */
    public function findAll($filters = [], $page = 1, $perPage = 10)
    {
        $where = [];
        $params = [];
        
        // Status filter
        if (isset($filters['status']) && !empty($filters['status'])) {
            $where[] = "status = :status";
            $params[':status'] = $filters['status'];
        }
        
        // Date from filter
        if (isset($filters['date_from']) && !empty($filters['date_from'])) {
            $where[] = "event_date >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        // Date to filter
        if (isset($filters['date_to']) && !empty($filters['date_to'])) {
            $where[] = "event_date <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }
        
        // Search filter (title, description)
        if (isset($filters['search']) && !empty($filters['search'])) {
            $where[] = "(title LIKE :search OR description LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        // Build WHERE clause
        $whereClause = count($where) > 0 ? 'WHERE ' . implode(' AND ', $where) : '';
        
        // Calculate offset
        $offset = ($page - 1) * $perPage;
        
        // Build and execute query
        $sql = "SELECT * FROM events $whereClause ORDER BY event_date DESC, created_at DESC LIMIT :limit OFFSET :offset";
        
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
        
        // Date from filter
        if (isset($filters['date_from']) && !empty($filters['date_from'])) {
            $where[] = "event_date >= :date_from";
            $params[':date_from'] = $filters['date_from'];
        }
        
        // Date to filter
        if (isset($filters['date_to']) && !empty($filters['date_to'])) {
            $where[] = "event_date <= :date_to";
            $params[':date_to'] = $filters['date_to'];
        }
        
        // Search filter
        if (isset($filters['search']) && !empty($filters['search'])) {
            $where[] = "(title LIKE :search OR description LIKE :search)";
            $params[':search'] = '%' . $filters['search'] . '%';
        }
        
        // Build WHERE clause
        $whereClause = count($where) > 0 ? 'WHERE ' . implode(' AND ', $where) : '';
        
        $sql = "SELECT COUNT(*) as total FROM events $whereClause";
        
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
     * Find event by ID
     */
    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM events WHERE id = :id");
        $stmt->execute([':id' => $id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Create new event
     */
    public function create($data)
    {
        $sql = "INSERT INTO events (title, description, event_date, event_time, image_url, status, created_by, created_at) 
                VALUES (:title, :description, :event_date, :event_time, :image_url, :status, :created_by, NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':event_date' => $data['event_date'],
            ':event_time' => $data['event_time'] ?? null,
            ':image_url' => $data['image_url'] ?? null,
            ':status' => $data['status'] ?? 'draft',
            ':created_by' => $data['created_by'] ?? null
        ]);
    }
    
    /**
     * Update event
     */
    public function update($id, $data)
    {
        $sql = "UPDATE events 
                SET title = :title, 
                    description = :description, 
                    event_date = :event_date, 
                    event_time = :event_time, 
                    image_url = :image_url, 
                    status = :status 
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':event_date' => $data['event_date'],
            ':event_time' => $data['event_time'] ?? null,
            ':image_url' => $data['image_url'],
            ':status' => $data['status'] ?? 'draft',
            ':id' => $id
        ]);
    }
    
    /**
     * Delete event
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM events WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    
    /**
     * Get event statistics
     */
    public function getStats()
    {
        $stats = [
            'upcoming' => 0,
            'draft' => 0,
            'published' => 0,
            'total' => 0
        ];
        
        // Upcoming events (future published events)
        $stmt = $this->db->query("
            SELECT COUNT(*) as count 
            FROM events 
            WHERE status = 'published' AND event_date >= CURDATE()
        ");
        $stats['upcoming'] = (int) $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        // Draft events
        $stmt = $this->db->query("
            SELECT COUNT(*) as count 
            FROM events 
            WHERE status = 'draft'
        ");
        $stats['draft'] = (int) $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        // Published events
        $stmt = $this->db->query("
            SELECT COUNT(*) as count 
            FROM events 
            WHERE status = 'published'
        ");
        $stats['published'] = (int) $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        // Total events
        $stmt = $this->db->query("SELECT COUNT(*) as count FROM events");
        $stats['total'] = (int) $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        return $stats;
    }
    
    /**
     * Get upcoming published events
     */
    public function getUpcoming($limit = 5)
    {
        $stmt = $this->db->prepare("
            SELECT * FROM events 
            WHERE status = 'published' AND event_date >= CURDATE() 
            ORDER BY event_date ASC, event_time ASC 
            LIMIT :limit
        ");
        
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
