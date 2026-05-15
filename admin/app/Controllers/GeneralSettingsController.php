<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/SiteSetting.php';
require_once __DIR__ . '/../../core/Session.php';

/**
 * General Settings Controller
 * Manages global business settings
 */
class GeneralSettingsController extends Controller
{
    private $settingModel;

    public function __construct()
    {
        $this->settingModel = new SiteSetting();
    }

    /**
     * Display general settings page
     */
    public function index()
    {
        $this->requireAuth();

        $settings = $this->settingModel->getAll();

        $this->view('settings/general', [
            'settings' => $settings,
            'current_page' => 'settings-general',
            'page_title' => 'General Settings'
        ], 'main');
    }

    /**
     * Update general settings
     */
    public function update()
    {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/settings/general');
            return;
        }

        // Validate CSRF
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/settings/general');
            return;
        }

        $settings = [
            'site_name' => trim($_POST['site_name'] ?? ''),
            'contact_email' => trim($_POST['contact_email'] ?? ''),
            'contact_phone' => trim($_POST['contact_phone'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'opening_hours' => trim($_POST['opening_hours'] ?? '')
        ];

        // Validation
        $errors = $this->validate($settings);

        if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            $this->redirect('/settings/general');
            return;
        }

        if ($this->settingModel->updateMultiple($settings)) {
            $this->updateConfigFile($settings);
            Session::flash('success', 'Settings updated successfully');
        } else {
            Session::flash('error', 'Failed to update settings');
        }

        $this->redirect('/settings/general');
    }

    /**
     * Validate settings data
     */
    private function validate($settings)
    {
        $errors = [];

        if (empty($settings['site_name'])) {
            $errors[] = 'Business name is required';
        }

        if (empty($settings['contact_email'])) {
            $errors[] = 'Contact email is required';
        } elseif (!filter_var($settings['contact_email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format';
        }

        if (empty($settings['contact_phone'])) {
            $errors[] = 'Contact number is required';
        }

        return $errors;
    }

    /**
     * Update config.php constants to match database settings
     * This ensures the frontend (which uses config.php) stays in sync with admin settings
     */
    private function updateConfigFile($settings)
    {
        $configFile = __DIR__ . '/../../../config/config.php';
        if (!file_exists($configFile)) {
            return false;
        }

        $content = file_get_contents($configFile);

        $replacements = [
            'SITE_NAME' => $settings['site_name'] ?? '',
            'CONTACT_EMAIL' => $settings['contact_email'] ?? '',
            'CONTACT_PHONE' => $settings['contact_phone'] ?? ''
        ];

        foreach ($replacements as $key => $value) {
            if (!empty($value)) {
                $pattern = "/define\s*\(\s*['\"]" . preg_quote($key, '/') . "['\"]\s*,\s*['\"].*?['\"]\s*\)\s*;/i";
                $replacement = "define('$key', '" . addslashes($value) . "');";
                $content = preg_replace($pattern, $replacement, $content);
            }
        }

        return file_put_contents($configFile, $content) !== false;
    }
}
