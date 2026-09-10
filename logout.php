<?php
// logout.php
require 'config.php';
require 'controllers/AuthController.php';
require 'models/User.php';

$auth = new AuthController(new User($pdo),  __DIR__ . '/views/');
$auth->logout();   