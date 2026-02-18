<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/Backup.php';
require_once __DIR__ . '/../Models/BackupSetting.php';

class BackupController extends Controller {
    private $backupModel;
    private $settingModel;

    public function __construct() {
        // parent::__construct(); // Controller has no constructor
        $this->requireAuth();
        
        $this->backupModel = new Backup();
        $this->settingModel = new BackupSetting();
    }

    /**
     * Display backup dashboard
     */
    public function index() {
        $backups = $this->backupModel->getAll();
        $settings = $this->settingModel->getAll();
        
        // Format sizes
        foreach ($backups as &$backup) {
            $backup['formatted_size'] = $this->backupModel->formatSize($backup['size']);
        }
        
        $this->view('backups/index', [
            'backups' => $backups,
            'settings' => $settings,
            'title' => 'Backup & Restore',
            'current_page' => 'backups'
        ]);
    }

    /**
     * Create manual backup
     */
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verify CSRF token
            if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                $_SESSION['error'] = 'Invalid request token.';
                $this->redirect('/backups');
            }

            if ($this->backupModel->createManual($_SESSION['user_id'])) {
                Session::flash('success', 'Backup created successfully.');
            } else {
                Session::flash('error', 'Failed to create backup.');
            }
            
            $this->redirect('/backups');
        }
    }

    /**
     * Download backup file
     */
    public function download($id) {
        $backup = $this->backupModel->find($id);
        
        if (!$backup) {
            Session::flash('error', 'Backup not found.');
            $this->redirect('/backups');
        }
        
        $filepath = $this->backupModel->getFilePath($backup['filename']);
        
        if (file_exists($filepath)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($filepath));
            readfile($filepath);
            exit;
        } else {
            Session::flash('error', 'Backup file not found.');
            $this->redirect('/backups');
        }
    }

    /**
     * Delete backup
     */
    public function delete($id) {
        if (!Auth::isAdmin()) {
            Session::flash('error', 'Only administrators can delete backups.');
            $this->redirect('/backups');
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verify CSRF token
            if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                $_SESSION['error'] = 'Invalid request token.';
                $this->redirect('/backups');
            }

            if ($this->backupModel->delete($id)) {
                Session::flash('success', 'Backup deleted successfully.');
            } else {
                Session::flash('error', 'Failed to delete backup.');
            }
            
            $this->redirect('/backups');
        }
    }

    /**
     * Restore database from backup
     */
    public function restore($id) {
        if (!Auth::isAdmin()) {
            Session::flash('error', 'Only administrators can restore backups.');
            $this->redirect('/backups');
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verify CSRF token
            if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                $_SESSION['error'] = 'Invalid request token.';
                $this->redirect('/backups');
            }

            // Restore logic
            if ($this->backupModel->restore($id)) {
                Session::flash('success', 'Database restored successfully.');
                // Log user out for safety after restore? Or just redirect
            } else {
                Session::flash('error', 'Failed to restore database. Please check logs.');
            }
            
            $this->redirect('/backups');
        }
    }

    /**
     * Update backup settings
     */
    public function updateSettings() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verify CSRF token
            if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                $_SESSION['error'] = 'Invalid request token.';
                $this->redirect('/backups');
            }

            $enabled = isset($_POST['backup_enabled']) ? '1' : '0';
            $frequency = $_POST['backup_frequency'] ?? 'daily';
            $retention = $_POST['backup_retention'] ?? '7';
            $cloudEnabled = isset($_POST['backup_cloud_enabled']) ? '1' : '0';

            $this->settingModel->set('backup_enabled', $enabled);
            $this->settingModel->set('backup_frequency', $frequency);
            $this->settingModel->set('backup_retention', $retention);
            $this->settingModel->set('backup_cloud_enabled', $cloudEnabled);
            
            // If cloud enabled, we'd handle google drive auth here in future
            
            Session::flash('success', 'Settings updated successfully.');
            $this->redirect('/backups');
        }
    }

    /**
     * Upload backup file
     */
    public function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Verify CSRF token
            if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                $_SESSION['error'] = 'Invalid request token.';
                $this->redirect('/backups');
            }

            if (isset($_FILES['backup_file']) && $_FILES['backup_file']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['backup_file'];
                if ($ext !== 'sql') {
                    Session::flash('error', 'Invalid file type. Only .sql files are allowed.');
                    $this->redirect('/backups');
                    return;
                }

                $filename = 'upload_' . date('Y-m-d_His') . '_' . basename($file['name']);
                $targetPath = APP_ROOT . '/storage/backups/' . $filename;
                
                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                    // Record in DB
                    if ($this->backupModel->registerUpload($filename, $_SESSION['user_id'])) {
                        Session::flash('success', 'Backup uploaded successfully.');
                    } else {
                        // If DB insert fails, remove file
                        unlink($targetPath);
                        Session::flash('error', 'Failed to record backup in database.');
                    }
                } else {
                    Session::flash('error', 'Failed to move uploaded file.');
                }
            } else {
                 Session::flash('error', 'File upload failed.');
            }

            $this->redirect('/backups');
        }
    }
}
