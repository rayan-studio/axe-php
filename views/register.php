<?php $error = $error ?? ''; $old = $old ?? ['name' => '', 'email' => '']; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <style>
        body { font-family: sans-serif; display: grid; place-items: center; min-height: 100vh; background: #f4f4f4; }
        .box { background: #fff; padding: 2rem; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,.1); width: 320px; }
        h1 { font-size: 1.3rem; margin-bottom: 1rem; }
        label { display: block; margin-top: .8rem; font-size: .9rem; }
        input { width: 100%; padding: .5rem; margin-top: .2rem; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { margin-top: 1.2rem; width: 100%; padding: .6rem; background: #333; color: #fff; border: 0; border-radius: 4px; cursor: pointer; }
        .error { color: #c0392b; font-size: .85rem; margin-bottom: .5rem; }
        .link { display: block; margin-top: 1rem; font-size: .85rem; text-align: center; }
    </style>
</head>
<body>
<div class="box">
    <h1>Inscription</h1>
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
</body>
</html>   