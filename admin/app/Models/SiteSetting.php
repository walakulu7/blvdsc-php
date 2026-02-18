<?php

require_once __DIR__ . '/../../core/Model.php';

/**
 * SiteSetting Model
 * Manages site_settings key-value pairs
 */
class SiteSetting extends Model
{
    protected $table = 'site_settings';

    /**
     * Get all settings as key => value array
     */
    public function getAll()
    {
        $stmt = $this->db->query("SELECT setting_key, setting_value FROM site_settings");
        return $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    }

    /**
     * Get a single setting value by key
     */
    public function get($key)
    {
        $stmt = $this->db->prepare("SELECT setting_value FROM site_settings WHERE setting_key = ?");
        $stmt->execute([$key]);
        return $stmt->fetchColumn();
    }

    /**
     * Update a single setting
     */
    public function updateSetting($key, $value)
    {
        $stmt = $this->db->prepare("UPDATE site_settings SET setting_value = ?, updated_at = NOW() WHERE setting_key = ?");
        return $stmt->execute([$value, $key]);
    }

    /**
     * Bulk update multiple settings
     */
    public function updateMultiple($settings)
    {
        $this->db->beginTransaction();
        try {
            $stmt = $this->db->prepare("UPDATE site_settings SET setting_value = ?, updated_at = NOW() WHERE setting_key = ?");
            foreach ($settings as $key => $value) {
                $stmt->execute([$value, $key]);
            }
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
}
