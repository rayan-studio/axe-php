<?php
// config.php — à inclure en tête des scripts

// --- Session ---
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- Connexion PDO ---
$dsn      = 'mysql:host=localhost;dbname=axe;charset=utf8mb4';
$user     = 'root';
$password = '';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    error_log('DB Error: ' . $e->getMessage());
    die('Erreur de connexion.');
}

// --- Autoload simple ---
spl_autoload_register(function (string $class): void {
    $directories = [
        __DIR__ . '/../models/',
        __DIR__ . '/../controllers/',
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class . '.php';

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// --- Modèle utilisateur ---
$userModel = new User($pdo);