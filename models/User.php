<?php
class User
{
    private PDO $db;

    /**
     * (PHP 5 &gt;= 5.5.0, PHP 5)<br/>
     *
     * Connecte à la database.
     */
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Récupére une utilisateur par sont email.
     */
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare("SELECT id, name, email, password, idRole FROM users WHERE email = :email LIMIT 1");
        $stmt->execute([':email' => $email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * Vérifier le mot de passe via sont hash
     */
    public function verifyPassword(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }

    /**
     * Créé un utilisateur
     */
    public function create(string $name, string $email, string $password): bool
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        return $stmt->execute([':name' => $name, ':email' => $email, ':password' => $hash]);
    }

    /**
     * Récupérer le role d'un utilisateur
     */
    public function getRole(?string $idRole)
    {
        if ($idRole === null || $idRole === '') { return null; }
        $stmt = $this->db->prepare("SELECT id, nom FROM role WHERE id = :idRole LIMIT 1");
        $stmt->execute([':idRole' => $idRole]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }
}
