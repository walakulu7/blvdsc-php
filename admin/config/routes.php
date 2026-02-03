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
$router->get('/reservations', 'ReservationController', 'index', ['auth']);
$router->get('/reservations/{id}', 'ReservationController', 'view', ['auth']);
$router->post('/reservations/{id}/status', 'ReservationController', 'updateStatus', ['auth']);
$router->get('/reservations/export/csv', 'ReservationController', 'exportCsv', ['auth']);

// High Tea
$router->get('/high-tea', 'HighTeaController', 'index', ['auth']);
$router->get('/high-tea/{id}', 'HighTeaController', 'view', ['auth']);
$router->post('/high-tea/{id}/status', 'HighTeaController', 'updateStatus', ['auth']);
$router->get('/high-tea/packages/manage', 'HighTeaController', 'managePackages', ['auth']);

// Events
$router->get('/events', 'EventController', 'index', ['auth']);
$router->get('/events/create', 'EventController', 'create', ['auth']);
$router->post('/events', 'EventController', 'store', ['auth']);
$router->get('/events/{id}/edit', 'EventController', 'edit', ['auth']);
$router->post('/events/{id}', 'EventController', 'update', ['auth']);
$router->post('/events/{id}/delete', 'EventController', 'delete', ['auth']);

// Messages
$router->get('/messages', 'MessageController', 'index', ['auth']);
$router->get('/messages/{id}', 'MessageController', 'view', ['auth']);
$router->post('/messages/{id}/read', 'MessageController', 'markRead', ['auth']);
$router->post('/messages/{id}/delete', 'MessageController', 'delete', ['auth']);

// Reviews
$router->get('/reviews', 'ReviewController', 'index', ['auth']);
$router->post('/reviews/{id}/approve', 'ReviewController', 'approve', ['auth']);
$router->post('/reviews/{id}/reject', 'ReviewController', 'reject', ['auth']);
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

// Settings
$router->get('/settings/contact', 'SettingsController', 'contact', ['auth']);
$router->post('/settings/contact', 'SettingsController', 'updateContact', ['auth']);
$router->get('/settings/site', 'SettingsController', 'site', ['auth']);
$router->post('/settings/site', 'SettingsController', 'updateSite', ['auth']);
$router->get('/settings/profile', 'SettingsController', 'profile', ['auth']);
$router->post('/settings/profile', 'SettingsController', 'updateProfile', ['auth']);

// Special Days
$router->get('/special-days', 'SpecialDayController', 'index', ['auth']);
$router->post('/special-days', 'SpecialDayController', 'store', ['auth']);
$router->post('/special-days/{id}/delete', 'SpecialDayController', 'delete', ['auth']);

// Menus
$router->get('/menus', 'MenuController', 'index', ['auth']);
$router->post('/menus/upload', 'MenuController', 'upload', ['auth']);
$router->post('/menus/{id}/delete', 'MenuController', 'delete', ['auth']);
