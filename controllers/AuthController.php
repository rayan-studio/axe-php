<?php
class AuthController
{
    private User $userModel;
    private string $viewPath;

    public function __construct(User $model, string $viewPath)
    {
        $this->userModel = $model;
        $this->viewPath  = $viewPath;
    }

    public function login(): void
    {
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByEmail($email);

        if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
            session_regenerate_id(true); // obligatoire
            $_SESSION['user_id'] = $user['id'];
            header('Location: dashboard.php');
            exit;
        } else {
            // Message générique (ne jamais dire "email introuvable" vs "mot de passe incorrect")
            $error = 'Identifiants invalides.';
            include $this->viewPath . 'login.php';
        }
    }

    public function register(): void
    {
        $name            = trim($_POST['name'] ?? '');
        $email           = trim($_POST['email'] ?? '');
        $password        = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';

        $old = ['name' => $name, 'email' => $email];

        // Validation
        if (strlen($password) < 8) {
            $error = 'Le mot de passe doit faire au moins 8 caractères.';
            include $this->viewPath . 'register.php';
            return;
        }

        if ($password !== $passwordConfirm) {
            $error = 'Les mots de passe ne correspondent pas.';
            include $this->viewPath . 'register.php';
            return;
        }

        // Vérifier que l'email n'existe pas déjà
        if ($this->userModel->findByEmail($email)) {
            $error = 'Cet email est déjà utilisé.';
            include $this->viewPath . 'register.php';
            return;
        }

        // Création
        $this->userModel->create($name, $email, $password);

        // Connexion immédiate
        $user = $this->userModel->findByEmail($email);
        session_regenerate_id(true);
        $_SESSION['user_id']  = $user['id'];
        $_SESSION['username'] = $name;

        header('Location: dashboard.php');
        exit;
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}
