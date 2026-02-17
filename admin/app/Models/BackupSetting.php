<?php
require_once __DIR__ . '/../../core/Model.php';

/**
 * BackupSetting Model
 * Handles configuration for the backup module
 */
class BackupSetting extends Model {
    protected $table = 'backup_settings';

    /**
     * Get a setting value by key
     */
    public function get($key, $default = null) {
        $stmt = $this->db->prepare("SELECT setting_value FROM {$this->table} WHERE setting_key = ?");
        $stmt->execute([$key]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result ? $result['setting_value'] : $default;
    }

    /**
     * Get all settings as key-value array
     */
    public function getAll() {
        $stmt = $this->db->query("SELECT setting_key, setting_value FROM {$this->table}");
        $settings = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }
        
        return $settings;
    }

    /**
     * Set a setting value
     */
    public function set($key, $value) {
        $stmt = $this->db->prepare("INSERT INTO {$this->table} (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = VALUES(setting_value)");
        return $stmt->execute([$key, $value]);
    }
}
