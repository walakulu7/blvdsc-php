<?php

require_once __DIR__ . '/../../core/Controller.php';
require_once __DIR__ . '/../Models/User.php';

class UserController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    /**
     * Display users list
     */
    public function index()
    {
        // Get filters
        $filters = [
            'search' => $_GET['search'] ?? '',
            'role' => $_GET['role'] ?? '',
            'status' => $_GET['status'] ?? ''
        ];

        $users = $this->userModel->getWithFilters($filters);
        $stats = $this->userModel->getStats();

        $this->view('users/index', [
            'users' => $users,
            'stats' => $stats,
            'filters' => $filters,
            'current_page' => 'users'
        ]);
    }

    /**
     * Show create user form
     */
    public function create()
    {
        $this->view('users/create', [
            'current_page' => 'users'
        ]);
    }

    /**
     * Store new user
     */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/users/create');
            return;
        }

        // Validate CSRF
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/users/create');
            return;
        }

        $data = [
            'username' => trim($_POST['username'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'password' => $_POST['password'] ?? '',
            'role' => $_POST['role'] ?? 'manager',
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];

        // Validation
        if (empty($data['username']) || empty($data['email']) || empty($data['password'])) {
            Session::flash('error', 'Username, Email and Password are required');
            $this->redirect('/users/create');
            return;
        }

        if ($this->userModel->usernameExists($data['username'])) {
            Session::flash('error', 'Username already exists');
            $this->redirect('/users/create');
            return;
        }

        if ($this->userModel->createUser($data)) {
            Session::flash('success', 'User created successfully');
            $this->redirect('/users');
        } else {
            Session::flash('error', 'Failed to create user');
            $this->redirect('/users/create');
        }
    }

    /**
     * Show edit user form
     */
    public function edit($id)
    {
        $user = $this->userModel->find($id);

        if (!$user) {
            Session::flash('error', 'User not found');
            $this->redirect('/users');
            return;
        }

        $this->view('users/edit', [
            'user' => $user,
            'current_page' => 'users'
        ]);
    }

    /**
     * Update user
     */
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/users');
            return;
        }

        // Validate CSRF
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/users/' . $id . '/edit');
            return;
        }

        $user = $this->userModel->find($id);
        if (!$user) {
            Session::flash('error', 'User not found');
            $this->redirect('/users');
            return;
        }

        $data = [
            'username' => trim($_POST['username'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'role' => $_POST['role'] ?? 'manager',
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];

        // Validation
        if (empty($data['username']) || empty($data['email'])) {
            Session::flash('error', 'Username and Email are required');
            $this->redirect('/users/' . $id . '/edit');
            return;
        }

        if ($this->userModel->usernameExists($data['username'], $id)) {
            Session::flash('error', 'Username already exists');
            $this->redirect('/users/' . $id . '/edit');
            return;
        }

        // Handle password update if provided
        if (!empty($_POST['password'])) {
            $data['password_hash'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }

        if ($this->userModel->update($id, $data)) {
            Session::flash('success', 'User updated successfully');
            $this->redirect('/users');
        } else {
            Session::flash('error', 'Failed to update user');
            $this->redirect('/users/' . $id . '/edit');
        }
    }

    /**
     * Delete user
     */
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/users');
            return;
        }

        // Validate CSRF
        if (!isset($_POST['_csrf_token']) || $_POST['_csrf_token'] !== Session::get('csrf_token')) {
            Session::flash('error', 'Invalid request');
            $this->redirect('/users');
            return;
        }

        // Prevent self-deletion
        if ($id == Auth::id()) {
            Session::flash('error', 'You cannot delete your own account');
            $this->redirect('/users');
            return;
        }

        if ($this->userModel->delete($id)) {
            Session::flash('success', 'User deleted successfully');
        } else {
            Session::flash('error', 'Failed to delete user');
        }

        $this->redirect('/users');
    }
}
