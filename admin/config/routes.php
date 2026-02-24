<?php
/**
 * Route Definitions
 * Define all application routes here
 */

// Guest routes (login pages)
$router->get('/login', 'AuthController', 'loginForm', ['guest']);
$router->post('/login', 'AuthController', 'login', ['guest']);
$router->get('/logout', 'AuthController', 'logout', ['auth']);

// Dashboard
$router->get('/dashboard', 'DashboardController', 'index', ['auth']);
$router->get('/', 'DashboardController', 'index', ['auth']);

// Reservations
$router->get('/reservations/export/csv', 'ReservationController', 'exportCsv', ['auth']);
$router->get('/reservations', 'ReservationController', 'index', ['auth']);
$router->get('/reservations/{id}', 'ReservationController', 'show', ['auth']);
$router->post('/reservations/{id}/status', 'ReservationController', 'updateStatus', ['auth']);

// High Tea
$router->get('/hightea/export/csv', 'HighTeaController', 'export', ['auth']);
$router->get('/hightea', 'HighTeaController', 'index', ['auth']);
$router->get('/hightea/{id}', 'HighTeaController', 'show', ['auth']);
$router->post('/hightea/{id}/status', 'HighTeaController', 'updateStatus', ['auth']);

// Events
$router->get('/events', 'EventController', 'index', ['auth']);
$router->get('/events/create', 'EventController', 'create', ['auth']);
$router->post('/events', 'EventController', 'store', ['auth']);
$router->get('/events/{id}/edit', 'EventController', 'edit', ['auth']);
$router->post('/events/{id}', 'EventController', 'update', ['auth']);
$router->post('/events/{id}/delete', 'EventController', 'delete', ['auth']);

// Messages
$router->get('/messages', 'MessageController', 'index', ['auth']);
$router->get('/messages/{id}', 'MessageController', 'show', ['auth']);
$router->post('/messages/{id}/reply', 'MessageController', 'reply', ['auth']);
$router->post('/messages/{id}/delete', 'MessageController', 'destroy', ['auth']);

// Reviews
$router->get('/reviews', 'ReviewController', 'index', ['auth']);
$router->post('/reviews/{id}/approve', 'ReviewController', 'approve', ['auth']);
$router->post('/reviews/{id}/reject', 'ReviewController', 'reject', ['auth']);

// User Management
$router->get('/users', 'UserController', 'index', ['auth']);
$router->get('/users/create', 'UserController', 'create', ['auth']);
$router->post('/users', 'UserController', 'store', ['auth']);
$router->get('/users/{id}/edit', 'UserController', 'edit', ['auth']);
$router->post('/users/{id}', 'UserController', 'update', ['auth']);
$router->post('/users/{id}/delete', 'UserController', 'delete', ['auth']);
$router->post('/reviews/{id}/reply', 'ReviewController', 'reply', ['auth']);
$router->post('/reviews/{id}/feature', 'ReviewController', 'toggleFeatured', ['auth']);

// Gallery
$router->get('/gallery', 'GalleryController', 'index', ['auth']);
$router->post('/gallery/upload', 'GalleryController', 'upload', ['auth']);
$router->post('/gallery/{id}/update', 'GalleryController', 'update', ['auth']);
$router->post('/gallery/{id}/delete', 'GalleryController', 'delete', ['auth']);
$router->post('/gallery/reorder', 'GalleryController', 'reorder', ['auth']);

// Users (admin only)
$router->get('/users', 'UserController', 'index', ['auth']);
$router->get('/users/create', 'UserController', 'create', ['auth']);
$router->post('/users', 'UserController', 'store', ['auth']);
$router->get('/users/{id}/edit', 'UserController', 'edit', ['auth']);
$router->post('/users/{id}', 'UserController', 'update', ['auth']);
$router->post('/users/{id}/delete', 'UserController', 'delete', ['auth']);
$router->post('/users/{id}/toggle-active', 'UserController', 'toggleActive', ['auth']);

// Backups (admin only)
$router->get('/backups', 'BackupController', 'index', ['auth']);
$router->post('/backups/create', 'BackupController', 'create', ['auth']);
$router->get('/backups/download/{id}', 'BackupController', 'download', ['auth']);
$router->post('/backups/delete/{id}', 'BackupController', 'delete', ['auth']);
$router->post('/backups/restore/{id}', 'BackupController', 'restore', ['auth']);
$router->post('/backups/upload', 'BackupController', 'upload', ['auth']);
$router->post('/backups/settings', 'BackupController', 'updateSettings', ['auth']);

// Profile Management
$router->get('/settings/profile', 'ProfileController', 'index', ['auth']);
$router->post('/settings/profile', 'ProfileController', 'update', ['auth']);
$router->post('/settings/profile/password', 'ProfileController', 'changePassword', ['auth']);

// General Settings
$router->get('/settings/general', 'GeneralSettingsController', 'index', ['auth']);
$router->post('/settings/general', 'GeneralSettingsController', 'update', ['auth']);

// Notification Settings
$router->get('/settings/notifications', 'NotificationSettingsController', 'index', ['auth']);
$router->post('/settings/notifications', 'NotificationSettingsController', 'update', ['auth']);

// Special Days
$router->get('/special-days', 'SpecialDayController', 'index', ['auth']);
$router->post('/special-days', 'SpecialDayController', 'store', ['auth']);
$router->post('/special-days/{id}/delete', 'SpecialDayController', 'delete', ['auth']);

// Menus
$router->get('/menus', 'MenuController', 'index', ['auth']);
$router->get('/menus/create', 'MenuController', 'create', ['auth']);
$router->post('/menus', 'MenuController', 'store', ['auth']);
$router->get('/menus/{id}/edit', 'MenuController', 'edit', ['auth']);
$router->post('/menus/{id}', 'MenuController', 'update', ['auth']);
$router->post('/menus/{id}/delete', 'MenuController', 'destroy', ['auth']);
