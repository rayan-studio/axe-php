<?php
// login.php
require 'config.php';
require 'models/User.php';
require 'controllers/AuthController.php';

$userModel = new User($pdo);
$auth      = new AuthController($userModel,  __DIR__ . '/views/');
$auth->login();   