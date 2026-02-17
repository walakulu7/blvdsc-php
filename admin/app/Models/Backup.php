<?php
require_once __DIR__ . '/../../core/Model.php';

/**
 * Backup Model
 * Handles database backup and restore operations
 */
class Backup extends Model {
    protected $table = 'backups';
    protected $storagePath;

    public function __construct() {
        parent::__construct();
        // Define storage path
        $this->storagePath = APP_ROOT . '/storage/backups';
        
        // Ensure storage directory exists
        if (!file_exists($this->storagePath)) {
            mkdir($this->storagePath, 0755, true);
        }
        
        // Secure storage directory
        if (!file_exists($this->storagePath . '/.htaccess')) {
            file_put_contents($this->storagePath . '/.htaccess', "Order Deny,Allow\nDeny from all");
        }
    }

    /**
     * Get all backups
     */
    public function getAll() {
        // Get all records ordered by creation date desc
        return $this->all('created_at', 'DESC');
    }

    /**
     * Create a manual backup
     */
    public function createManual($userId) {
        $filename = 'backup_' . date('Y-m-d_His') . '.sql';
        $filepath = $this->storagePath . '/' . $filename;
        
        if ($this->dumpDatabase($filepath)) {
            $filesize = file_exists($filepath) ? filesize($filepath) : 0;
            
            $stmt = $this->db->prepare("INSERT INTO {$this->table} (filename, type, size, created_by, created_at) VALUES (?, 'manual', ?, ?, NOW())");
            return $stmt->execute([$filename, $filesize, $userId]);
        }
        
        return false;
    }

    /**
     * Create an auto backup
     */
    public function createAuto() {
        $filename = 'auto_backup_' . date('Y-m-d_His') . '.sql';
        $filepath = $this->storagePath . '/' . $filename;
        
        if ($this->dumpDatabase($filepath)) {
            $filesize = file_exists($filepath) ? filesize($filepath) : 0;
            
            $stmt = $this->db->prepare("INSERT INTO {$this->table} (filename, type, size, created_by, created_at) VALUES (?, 'auto', ?, NULL, NOW())");
            return $stmt->execute([$filename, $filesize]);
        }
        
        return false;
    }

    /**
     * Delete a backup
     */
    public function delete($id) {
        $backup = $this->find($id);
        
        if ($backup) {
            // Delete file
            $filepath = $this->storagePath . '/' . $backup['filename'];
            if (file_exists($filepath)) {
                unlink($filepath);
            }
            
            // Delete record
            $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
            return $stmt->execute([$id]);
        }
        
        return false;
    }

    /**
     * Restore database from backup
     */
    public function restore($id) {
        $backup = $this->find($id);
        
        if (!$backup) {
            return false;
        }
        
        $filepath = $this->storagePath . '/' . $backup['filename'];
        
        if (!file_exists($filepath)) {
            return false;
        }
        
        // Disable foreign key checks
        $this->db->exec('SET FOREIGN_KEY_CHECKS = 0');
        
        // Get all tables
        $tables = [];
        $result = $this->db->query("SHOW TABLES");
        while ($row = $result->fetch(PDO::FETCH_NUM)) {
            $tables[] = $row[0];
        }
        
        // Drop all tables
        foreach ($tables as $table) {
            $this->db->exec("DROP TABLE IF EXISTS `$table`");
        }
        
        // Restore from file
        // Read file content and split into queries
        // Note: This simple implementation assumes standard SQL dump format
        // For very large files, line-by-line processing is better
        
        $sql = file_get_contents($filepath);
        
        try {
            $this->db->exec($sql);
            // Re-enable foreign key checks
            $this->db->exec('SET FOREIGN_KEY_CHECKS = 1');
            return true;
        } catch (Exception $e) {
            // Re-enable foreign key checks even on failure
            $this->db->exec('SET FOREIGN_KEY_CHECKS = 1');
            error_log("Restore failed: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Get backup file path
     */
    public function getFilePath($filename) {
        return $this->storagePath . '/' . $filename;
    }

    /**
     * Prune old auto-backups based on retention limit
     */
    public function pruneRecents($limit = 7) {
        // Get auto backups ordered by date DESC
        $sql = "SELECT * FROM {$this->table} WHERE type = 'auto' ORDER BY created_at DESC LIMIT 100 OFFSET ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        
        $oldBackups = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($oldBackups as $backup) {
            $this->delete($backup['id']);
        }
        
        return count($oldBackups);
    }

    /**
     * Dump database to file
     */
    private function dumpDatabase($filepath) {
        // Try using mysqldump if available (preferred method)
        // Adjust path/command based on environment
        $host = DB_HOST;
        $user = DB_USER;
        $pass = DB_PASS;
        $name = DB_NAME;
        
        // Basic PHP fallback implementation
        // This is safer for shared hosting where exec() might be disabled
        
        try {
            $return = "";
            
            // Get all tables
            $tables = [];
            $result = $this->db->query("SHOW TABLES");
            while ($row = $result->fetch(PDO::FETCH_NUM)) {
                $tables[] = $row[0];
            }
            
            // Cycle through each table
            foreach ($tables as $table) {
                // Get create table command
                $result = $this->db->query("SHOW CREATE TABLE $table");
                $row = $result->fetch(PDO::FETCH_NUM);
                $return .= "\n\n" . $row[1] . ";\n\n";
                
                // Get data
                $result = $this->db->query("SELECT * FROM $table");
                while ($row = $result->fetch(PDO::FETCH_NUM)) {
                    $return .= "INSERT INTO $table VALUES(";
                    for ($j = 0; $j < count($row); $j++) {
                        $row[$j] = addslashes($row[$j]);
                        $row[$j] = str_replace("\n", "\\n", $row[$j]);
                        if (isset($row[$j])) {
                            $return .= '"' . $row[$j] . '"';
                        } else {
                            $return .= '""';
                        }
                        if ($j < (count($row) - 1)) {
                            $return .= ',';
                        }
                    }
                    $return .= ");\n";
                }
            }
            
            // Save file
            file_put_contents($filepath, $return);
            return true;
            
        } catch (Exception $e) {
            error_log("Backup generation failed: " . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Register an uploaded backup file
     */
    public function registerUpload($filename, $userId) {
        $filepath = $this->storagePath . '/' . $filename;
        $filesize = file_exists($filepath) ? filesize($filepath) : 0;
        
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (filename, type, size, created_by, created_at) VALUES (?, 'upload', ?, ?, NOW())");
        return $stmt->execute([$filename, $filesize, $userId]);
    }
    
    /**
     * Format size to human readable
     */
    public function formatSize($bytes) {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }
        return $bytes;
    }
}
