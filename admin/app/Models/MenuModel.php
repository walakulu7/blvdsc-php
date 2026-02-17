<?php

require_once __DIR__ . '/../../core/Model.php';

class MenuModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Get all menus with optional filters
     */
    public function getAll($filters = [])
    {
        $sql = "SELECT * FROM menus WHERE 1=1";
        $params = [];
        
        if (isset($filters['status'])) {
            $sql .= " AND status = :status";
            $params[':status'] = $filters['status'];
        }
        
        $sql .= " ORDER BY display_order ASC, created_at DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get published menus ordered by display_order for frontend
     */
    public function getPublishedMenus()
    {
        $stmt = $this->db->prepare("
            SELECT * FROM menus 
            WHERE status = 'published' 
            ORDER BY display_order ASC, created_at DESC
        ");
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Get single menu by ID
     */
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM menus WHERE id = :id");
        $stmt->execute([':id' => $id]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Create new menu
     */
    public function create($data)
    {
        $sql = "INSERT INTO menus (title, slug, image_url, display_order, status, created_by, created_at) 
                VALUES (:title, :slug, :image_url, :display_order, :status, :created_by, NOW())";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':title' => $data['title'],
            ':slug' => $data['slug'],
            ':image_url' => $data['image_url'] ?? null,
            ':display_order' => $data['display_order'] ?? 0,
            ':status' => $data['status'] ?? 'draft',
            ':created_by' => $data['created_by'] ?? null
        ]);
    }
    
    /**
     * Update existing menu
     */
    public function update($id, $data)
    {
        $sql = "UPDATE menus 
                SET title = :title, 
                    slug = :slug, 
                    image_url = :image_url, 
                    display_order = :display_order,
                    status = :status,
                    updated_at = NOW()
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':title' => $data['title'],
            ':slug' => $data['slug'],
            ':image_url' => $data['image_url'],
            ':display_order' => $data['display_order'],
            ':status' => $data['status'] ?? 'draft',
            ':id' => $id
        ]);
    }
    
    /**
     * Delete menu by ID
     */
    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM menus WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
    
    /**
     * Update display order
     */
    public function updateOrder($id, $order)
    {
        $stmt = $this->db->prepare("UPDATE menus SET display_order = :order WHERE id = :id");
        return $stmt->execute([
            ':order' => $order,
            ':id' => $id
        ]);
    }
    
    /**
     * Get maximum display order (for new items)
     */
    public function getMaxOrder()
    {
        $stmt = $this->db->query("SELECT MAX(display_order) as max_order FROM menus");
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['max_order'] ?? 0;
    }
    
    /**
     * Generate unique slug from title
     */
    public function generateSlug($title, $excludeId = null)
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
        $originalSlug = $slug;
        $counter = 1;
        
        while ($this->slugExists($slug, $excludeId)) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }
    
    /**
     * Check if slug exists
     */
    private function slugExists($slug, $excludeId = null)
    {
        $sql = "SELECT COUNT(*) FROM menus WHERE slug = :slug";
        $params = [':slug' => $slug];
        
        if ($excludeId) {
            $sql .= " AND id != :id";
            $params[':id'] = $excludeId;
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        
        return $stmt->fetchColumn() > 0;
    }
}
