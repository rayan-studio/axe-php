<?php $error = $error ?? '';
$old = $old ?? ['name' => '', 'email' => '']; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="./styles/index.css" />
</head>

<body>
    <div class="box">
        <div class="box-2">
             <div class="header">
                <img src="./ressources/favicon.ico" width="64" height="64"/>
                <div>
                    <h1>Inscription</h1>
                    <span>Veuilliz saisir les informations corespodante. </span>
                </div>
            </div>
            <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form method="POST" action="register.php">
                <label>Nom
                    <input type="text" name="name" required value="<?= htmlspecialchars($old['name']) ?>">
                </label>
                <label>Email
                    <input type="email" name="email" required value="<?= htmlspecialchars($old['email']) ?>">
                </label>
                <label>Mot de passe
                    <input type="password" name="password" required minlength="8">
                </label>
                <label>Confirmation
                    <input type="password" name="password_confirm" required>
                </label>
                <button type="submit">S'inscrire</button>
            </form>
            <p class="link">Déjà un compte ? <a href="login.php">Se connecter</a></p>
        </div>
    </div>
</body>

</html>