<?php

require_once __DIR__ . '/../Models/MenuModel.php';
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../../core/Session.php';

class MenuController extends Controller
{
    private $menuModel;
    
    public function __construct()
    {
        $this->menuModel = new MenuModel();
    }
    
    /**
     * Display list of all menus
     */
    public function index()
    {
        $menus = $this->menuModel->getAll();
        
        // Calculate stats
        $stats = [
            'total' => count($menus),
            'published' => count(array_filter($menus, fn($m) => $m['status'] === 'published')),
            'draft' => count(array_filter($menus, fn($m) => $m['status'] === 'draft'))
        ];
        
        $this->view('menus/index', [
            'menus' => $menus,
            'stats' => $stats,
            'current_page' => 'menus'
        ]);
    }
    
    /**
     * Show create form
     */
    public function create()
    {
        $maxOrder = $this->menuModel->getMaxOrder();
        
        $this->view('menus/create', [
            'current_page' => 'menus',
            'next_order' => $maxOrder + 1
        ]);
    }
    
    /**
     * Store new menu
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/menus');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/menus/create');
            return;
        }
        
        // Validation
        $errors = $this->validateMenuData($_POST);
        
        if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            $this->redirect('/menus/create');
            return;
        }
        
        // Handle image upload
        $imageUrl = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageUrl = $this->handleImageUpload($_FILES['image']);
            
            if ($imageUrl === false) {
                // Error message already set by handleImageUpload
                $this->redirect('/menus/create');
                return;
            }
        }
        
        // Generate slug
        $slug = $this->menuModel->generateSlug($_POST['title']);
        
        // Create menu
        $data = [
            'title' => $_POST['title'],
            'slug' => $slug,
            'image_url' => $imageUrl,
            'display_order' => $_POST['display_order'] ?? 0,
            'status' => $_POST['status'] ?? 'draft',
            'created_by' => Session::get('user_id')
        ];
        
        if ($this->menuModel->create($data)) {
            Session::flash('success', 'Menu created successfully');
            $this->redirect('/menus');
        } else {
            Session::flash('error', 'Failed to create menu');
            $this->redirect('/menus/create');
        }
    }
    
    /**
     * Show edit form
     */
    public function edit($id)
    {
        $menu = $this->menuModel->getById($id);
        
        if (!$menu) {
            Session::flash('error', 'Menu not found');
            $this->redirect('/menus');
            return;
        }
        
        $this->view('menus/edit', [
            'menu' => $menu,
            'current_page' => 'menus'
        ]);
    }
    
    /**
     * Update existing menu
     */
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/menus');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/menus/' . $id . '/edit');
            return;
        }
        
        $menu = $this->menuModel->getById($id);
        if (!$menu) {
            Session::flash('error', 'Menu not found');
            $this->redirect('/menus');
            return;
        }
        
        // Validation
        $errors = $this->validateMenuData($_POST);
        
        if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            $this->redirect('/menus/' . $id . '/edit');
            return;
        }
        
        // Handle image upload
        $imageUrl = $menu['image_url']; // Keep existing if not uploading new
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newImageUrl = $this->handleImageUpload($_FILES['image']);
            
            if ($newImageUrl !== false) {
                // Delete old image if exists
                if (!empty($imageUrl) && file_exists(__DIR__ . '/../../../' . $imageUrl)) {
                    @unlink(__DIR__ . '/../../../' . $imageUrl);
                }
                $imageUrl = $newImageUrl;
            }
            // If upload failed, error message already set by handleImageUpload
        }
        
        // Generate new slug if title changed
        $slug = $menu['slug'];
        if ($_POST['title'] !== $menu['title']) {
            $slug = $this->menuModel->generateSlug($_POST['title'], $id);
        }
        
        // Update menu
        $data = [
            'title' => $_POST['title'],
            'slug' => $slug,
            'image_url' => $imageUrl,
            'display_order' => $_POST['display_order'],
            'status' => $_POST['status']
        ];
        
        if ($this->menuModel->update($id, $data)) {
            Session::flash('success', 'Menu updated successfully');
            $this->redirect('/menus');
        } else {
            Session::flash('error', 'Failed to update menu');
            $this->redirect('/menus/' . $id . '/edit');
        }
    }
    
    /**
     * Delete menu
     */
    public function destroy($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/menus');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/menus');
            return;
        }
        
        $menu = $this->menuModel->getById($id);
        if (!$menu) {
            Session::flash('error', 'Menu not found');
            $this->redirect('/menus');
            return;
        }
        
        // Delete image file if exists
        if (!empty($menu['image_url']) && file_exists(__DIR__ . '/../../../' . $menu['image_url'])) {
            @unlink(__DIR__ . '/../../../' . $menu['image_url']);
        }
        
        if ($this->menuModel->delete($id)) {
            Session::flash('success', 'Menu deleted successfully');
        } else {
            Session::flash('error', 'Failed to delete menu');
        }
        
        $this->redirect('/menus');
    }
    
    /**
     * Validate menu data
     */
    private function validateMenuData($data)
    {
        $errors = [];
        
        if (empty($data['title'])) {
            $errors[] = 'Title is required';
        }
        
        if (!isset($data['display_order']) || !is_numeric($data['display_order'])) {
            $errors[] = 'Display order must be a number';
        }
        
        return $errors;
    }
    
    /**
     * Handle image upload with optimization
     */
    private function handleImageUpload($file)
    {
        // Validate file
        $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
        $maxSize = 10 * 1024 * 1024; // 10MB
        
        if (!in_array($file['type'], $allowedTypes)) {
            Session::flash('error', 'Invalid file type. Only JPG, PNG, and WEBP images are allowed.');
            return false;
        }
        
        if ($file['size'] > $maxSize) {
            Session::flash('error', 'File size exceeds 10MB limit.');
            return false;
        }
        
        // Create upload directory if not exists
        $uploadDir = __DIR__ . '/../../../uploads/menus/';
        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                Session::flash('error', 'Failed to create upload directory.');
                return false;
            }
        }
        
        // Generate unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = time() . '_' . uniqid() . '.' . $extension;
        $targetPath = $uploadDir . $filename;
        
        // Move uploaded file temporarily
        $tempPath = $file['tmp_name'];
        
        // Try to optimize image (794×1123 pixels - A4 at 150 DPI)
        $optimized = $this->optimizeImage($tempPath, $targetPath, 794, 1123, 85);
        
        // If optimization fails, just copy the file directly
        if (!$optimized) {
            if (move_uploaded_file($tempPath, $targetPath)) {
                return 'uploads/menus/' . $filename;
            }
            Session::flash('error', 'Failed to move uploaded file.');
            return false;
        }
        
        return 'uploads/menus/' . $filename;
    }
    
    /**
     * Optimize and resize image
     */
    private function optimizeImage($sourcePath, $destPath, $maxWidth, $maxHeight, $quality)
    {
        // Get image info
        $imageInfo = getimagesize($sourcePath);
        
        if ($imageInfo === false || !is_array($imageInfo) || count($imageInfo) < 3) {
            return false;
        }
        
        list($width, $height, $type) = $imageInfo;
        
        // Calculate new dimensions
        $ratio = min($maxWidth / $width, $maxHeight / $height);
        
        // Only resize if image is larger than max dimensions
        if ($ratio < 1) {
            $newWidth = (int)($width * $ratio);
            $newHeight = (int)($height * $ratio);
        } else {
            $newWidth = $width;
            $newHeight = $height;
        }
        
        // Create image resource based on type
        switch ($type) {
            case IMAGETYPE_JPEG:
                $source = imagecreatefromjpeg($sourcePath);
                break;
            case IMAGETYPE_PNG:
                $source = imagecreatefrompng($sourcePath);
                break;
            case IMAGETYPE_WEBP:
                $source = imagecreatefromwebp($sourcePath);
                break;
            default:
                return false;
        }
        
        if (!$source) {
            return false;
        }
        
        // Create new image
        $destination = imagecreatetruecolor($newWidth, $newHeight);
        
        // Preserve transparency for PNG
        if ($type === IMAGETYPE_PNG) {
            imagealphablending($destination, false);
            imagesavealpha($destination, true);
        }
        
        // Resize image
        imagecopyresampled($destination, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        
        // Save optimized image
        $result = false;
        switch ($type) {
            case IMAGETYPE_JPEG:
                $result = imagejpeg($destination, $destPath, $quality);
                break;
            case IMAGETYPE_PNG:
                // PNG quality is 0-9, convert from 0-100
                $pngQuality = (int)(9 - ($quality / 100 * 9));
                $result = imagepng($destination, $destPath, $pngQuality);
                break;
            case IMAGETYPE_WEBP:
                $result = imagewebp($destination, $destPath, $quality);
                break;
        }
        
        // Free memory
        imagedestroy($source);
        imagedestroy($destination);
        
        return $result;
    }
}
