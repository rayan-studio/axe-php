<?php
// Protégé :  session, on renvoie vers dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

$error = $error ?? '';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="./styles/index.css" />
</head>

<body>
    <div class="box">
        <h1>Connexion</h1>
        <?php if ($error): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <label>Email
                <input type="email" name="email" required autofocus>
            </label>
            <label>Mot de passe
                <input type="password" name="password" required>
            </label>
            <button type="submit">Se connecter</button>

            <p class="link">Pas de compte ? <a href="register.php">S'inscrire</a></p>   
        </form>
    </div>
</body>

</html>