<?php
require_once __DIR__ . '/controllers/AuthController.php';

// Instantiate the controller
$authController = new AuthController();

// Handle routes
$request = $_SERVER['REQUEST_URI'];
$base_path = '/school-management-system/public';
$route = str_replace($base_path, '', $request);

switch ($route) {
    case '/login':
        include __DIR__ . '/views/login.php';
        break;

    case '/auth/login':
        $authController->login();
        break;

    case '/admin/dashboard':
        include __DIR__ . '/views/admin/dashboard.php';
        break;

    case '/teacher/dashboard':
        include __DIR__ . '/views/teacher/dashboard.php';
        break;

    // Add other routes for accountant, receptionist, etc.
    default:
        include __DIR__ . '/views/404.php';
        break;
}
?>
