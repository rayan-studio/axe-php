<?php
// Protégé : si pas de session, on renvoie vers login
if (!isset($_SESSION['user_id'])) {
    header('Location: /axe-php/login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/axe-php/styles/index.css" />
    <link rel="icon" href="/axe-php/ressources/favicon.ico" />
</head>

<body>
    
</body>

</html>