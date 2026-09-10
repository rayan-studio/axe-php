<?php
// config.php — à inclure en TÊTE de chaque script (index.php, login.php, etc.)

// --- Session ---
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// --- Connexion PDO ---
$dsn      = 'mysql:host=localhost;dbname=axe;charset=utf8mb4';
$user     = 'root';
$password = '';

$options  = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    // En prod : log uniquement, jamais de message visible
    error_log('DB Error: ' . $e->getMessage());
    die('Erreur de connexion.');
}

// --- Autoload simple (sans Composer) ---
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});   