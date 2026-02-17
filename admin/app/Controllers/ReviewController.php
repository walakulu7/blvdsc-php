<?php

require_once __DIR__ . '/../../core/Controller.php';

class ReviewController extends Controller
{
    /**
     * Display reviews placeholder page
     */
    public function index()
    {
        $this->view('reviews/index', [
            'current_page' => 'reviews'
        ]);
    }
    
    // Placeholder methods for routes defined in routes.php
    public function approve($id) {}
    public function reject($id) {}
}
