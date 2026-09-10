<?php
// Protégé : si pas de session, on renvoie vers login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./styles/index.css" />
</head>

<body>
    <div class="topbar">
        <h1>Bienvenue</h1>
        <a href="logout.php">Déconnexion</a>
    </div>
    <p>Vous êtes connecté en tant que <strong><?= htmlspecialchars($_SESSION['username'] ?? 'utilisateur') ?></strong>.</p>
    <p>Rôle : <strong><?= htmlspecialchars($_SESSION['role_name'] ?? 'inconnu') ?></strong></p>
    
</body>

</html>