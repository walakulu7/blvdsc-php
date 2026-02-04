<?php
require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/EventModel.php';

/**
 * Event Controller
 * Handles all event-related requests
 */
class EventController extends Controller
{
    private $eventModel;
    
    public function __construct()
    {
        $this->eventModel = new EventModel();
    }
    
    /**
     * Display list of events with filters
     */
    public function index()
    {
        // Get filters from request
        $filters = [
            'status' => $_GET['status'] ?? '',
            'date_from' => $_GET['date_from'] ?? '',
            'date_to' => $_GET['date_to'] ?? '',
            'search' => $_GET['search'] ?? ''
        ];
        
        // Remove empty filters
        $filters = array_filter($filters, function($value) {
            return $value !== '';
        });
        
        // Pagination
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10;
        
        // Get data
        $events = $this->eventModel->findAll($filters, $currentPage, $perPage);
        $total = $this->eventModel->getTotalCount($filters);
        $pages = ceil($total / $perPage);
        
        // Get statistics
        $stats = $this->eventModel->getStats();
        
        // Build query string for pagination
        $queryParams = $filters;
        unset($queryParams['page']);
        $queryString = http_build_query($queryParams);
        
        // Pass data to view
        $this->view('events/index', [
            'events' => $events,
            'filters' => $filters,
            'stats' => $stats,
            'currentPage' => $currentPage,
            'pages' => $pages,
            'total' => $total,
            'perPage' => $perPage,
            'queryString' => $queryString,
            'current_page' => 'events'
        ]);
    }
    
    /**
     * Show create event form
     */
    public function create()
    {
        $this->view('events/create', [
            'current_page' => 'events'
        ]);
    }
    
    /**
     * Store new event
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/events');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/events/create');
            return;
        }
        
        // Validation
        $errors = $this->validateEventData($_POST);
        
        if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            $this->redirect('/events/create');
            return;
        }
        
        // Handle image upload
        $imageUrl = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageUrl = $this->handleImageUpload($_FILES['image']);
            
            if (!$imageUrl) {
                Session::flash('error', 'Failed to upload image');
                $this->redirect('/events/create');
                return;
            }
        }
        
        // Prepare data
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'event_date' => $_POST['event_date'],
            'event_time' => $_POST['event_time'] ?? null,
            'image_url' => $imageUrl,
            'status' => $_POST['status'] ?? 'draft',
            'created_by' => Auth::user()['id'] ?? null
        ];
        
        // Create event
        $result = $this->eventModel->create($data);
        
        if ($result) {
            Session::flash('success', 'Event created successfully');
            $this->redirect('/events');
        } else {
            Session::flash('error', 'Failed to create event');
            $this->redirect('/events/create');
        }
    }
    
    /**
     * Show edit event form
     */
    public function edit($id)
    {
        $event = $this->eventModel->findById($id);
        
        if (!$event) {
            Session::flash('error', 'Event not found');
            $this->redirect('/events');
            return;
        }
        
        $this->view('events/edit', [
            'event' => $event,
            'current_page' => 'events'
        ]);
    }
    
    /**
     * Update event
     */
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/events');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/events/' . $id . '/edit');
            return;
        }
        
        // Get existing event
        $event = $this->eventModel->findById($id);
        
        if (!$event) {
            Session::flash('error', 'Event not found');
            $this->redirect('/events');
            return;
        }
        
        // Validation
        $errors = $this->validateEventData($_POST);
        
        if (!empty($errors)) {
            Session::flash('error', implode('<br>', $errors));
            $this->redirect('/events/' . $id . '/edit');
            return;
        }
        
        // Handle image upload
        $imageUrl = $event['image_url']; // Keep existing image by default
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newImageUrl = $this->handleImageUpload($_FILES['image']);
            
            if ($newImageUrl) {
                // Delete old image if exists
                if ($imageUrl) {
                    $this->deleteImageFile($imageUrl);
                }
                $imageUrl = $newImageUrl;
            }
        }
        
        // Prepare data
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'event_date' => $_POST['event_date'],
            'event_time' => $_POST['event_time'] ?? null,
            'image_url' => $imageUrl,
            'status' => $_POST['status'] ?? 'draft'
        ];
        
        // Update event
        $result = $this->eventModel->update($id, $data);
        
        if ($result) {
            Session::flash('success', 'Event updated successfully');
            $this->redirect('/events');
        } else {
            Session::flash('error', 'Failed to update event');
            $this->redirect('/events/' . $id . '/edit');
        }
    }
    
    /**
     * Delete event
     */
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/events');
            return;
        }
        
        // CSRF validation
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/events');
            return;
        }
        
        // Get event to delete image
        $event = $this->eventModel->findById($id);
        
        if (!$event) {
            Session::flash('error', 'Event not found');
            $this->redirect('/events');
            return;
        }
        
        // Delete event
        $result = $this->eventModel->delete($id);
        
        if ($result) {
            // Delete associated image
            if ($event['image_url']) {
                $this->deleteImageFile($event['image_url']);
            }
            
            Session::flash('success', 'Event deleted successfully');
        } else {
            Session::flash('error', 'Failed to delete event');
        }
        
        $this->redirect('/events');
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
            return false;
        }
        
        if ($file['size'] > $maxSize) {
            return false;
        }
        
        // Create upload directory if not exists
        $uploadDir = __DIR__ . '/../../../uploads/events/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Generate unique filename
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = time() . '_' . uniqid() . '.' . $extension;
        $targetPath = $uploadDir . $filename;
        
        // Move uploaded file temporarily
        $tempPath = $file['tmp_name'];
        
        // Optimize image
        $optimized = $this->optimizeImage($tempPath, $targetPath, 720, 480, 85);
        
        if ($optimized) {
            return 'uploads/events/' . $filename;
        }
        
        return false;
    }
    
    /**
     * Optimize and resize image
     */
    private function optimizeImage($sourcePath, $destPath, $maxWidth, $maxHeight, $quality)
    {
        // Get image info
        $imageInfo = getimagesize($sourcePath);
        
        if (!$imageInfo) {
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
    
    /**
     * Delete image file
     */
    private function deleteImageFile($imagePath)
    {
        $fullPath = __DIR__ . '/../../../' . $imagePath;
        
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
    
    /**
     * Validate event data
     */
    private function validateEventData($data)
    {
        $errors = [];
        
        if (empty($data['title'])) {
            $errors[] = 'Title is required';
        }
        
        if (empty($data['description'])) {
            $errors[] = 'Description is required';
        }
        
        if (empty($data['event_date'])) {
            $errors[] = 'Event date is required';
        }
        
        return $errors;
    }
}
