<?php

require __DIR__ . '/../src/config.php';

$viewPath = __DIR__ . '/../views/';

$action = $_GET['action'] ?? 'dashboard';

switch ($action) {

    case 'login':
        $controller = new AuthController($userModel, $viewPath);
        $controller->login();
        break;

    case 'register':
        $controller = new AuthController($userModel, $viewPath);
        $controller->register();
        break;

    case 'logout':
        $controller = new AuthController($userModel, $viewPath);
        $controller->logout();
        break;

    case 'dashboard':
    default:
        if (!isset($_SESSION['user_id'])) {
            header('Location: login');
            exit;
        }

        include $viewPath . 'dashboard.php';
        break;
}