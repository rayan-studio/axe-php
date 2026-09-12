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
    <div class="dashboard-box">
        <div class="">
            <div>
                <img src="/axe-php/ressources/favicon.ico" width="24" />
            </div>
        </div>


        <div class="">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5V19M5 12H19" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
            </svg>
        </div>
    </div>
</body>

</html>