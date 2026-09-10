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
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            include $this->viewPath . 'login.php';
            return;
        }

        $error = '';
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userModel->findByEmail($email);

        if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
            session_regenerate_id(true);

            $_SESSION['user_id']  = $user['id'];
            $_SESSION['username'] = $user['name'];
            $_SESSION['role_id']  = $user['idRole'];

            $role = $this->userModel->getRole($user['idRole']);
            $_SESSION['role_name'] = $role['nom'] ?? null;

            header('Location: dashboard.php');
            exit;
        }

        $error = 'Identifiants invalides.';
        include $this->viewPath . 'login.php';
    }

    public function register(): void
    {
        // Si c'est un simple GET (affichage du formulaire), on ne fait rien
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            include $this->viewPath . 'register.php';
            return;
        }

        $error = '';
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

        // id utilisateur
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['username']  = $user['name'];
        $_SESSION['role_id']   = $user['role_id'];

        $role = $this->userModel->getRole($user['role_id']);
        $_SESSION['role_name'] = $role['name'] ?? null;

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
