<?php
// Protégé :  session, on renvoie vers dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: /axe-php/dashboard');
    exit;
}

$error = $error ?? '';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/axe-php/styles/index.css">
    <link rel="icon" href="/axe-php/ressources/favicon.ico" />

</head>

<body>
    <div class="box">
        <div class="box-2">
            <div class="header">
                <img src="/axe-php/ressources/favicon.ico" width="64" height="64"/>
                <div>
                    <h1>Connexion</h1>
                    <span>Entree vos identifiant.</span>
                </div>
            </div>
            <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form method="POST" action="/axe-php/login">
                <label>Email
                    <input type="email" name="email" required autofocus>
                </label>
                <label>Mot de passe
                    <input type="password" name="password" required>
                </label>
                <button type="submit">Se connecter</button>

                <p class="link">Pas de compte ? <a href="/axe-php/register">S'inscrire</a></p>
            </form>
        </div>
    </div>
</body>

</html>