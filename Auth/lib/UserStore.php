<?php
class UserStore {
    private PDO $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function findByEmail(string $email): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE LOWER(email) = LOWER(?) LIMIT 1');
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function findById(string $id): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id = ? LIMIT 1');
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function addUser(array $user): bool {
        $stmt = $this->pdo->prepare('INSERT INTO users (id, email, password_hash, remember_token_hash, created_at) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([
            $user['id'],
            $user['email'],
            $user['password_hash'],
            $user['remember_token_hash'],
            $user['created_at']
        ]);
    }

    public function updateUser(array $user): bool {
        $stmt = $this->pdo->prepare('UPDATE users SET email = ?, password_hash = ?, remember_token_hash = ?, created_at = ? WHERE id = ?');
        return $stmt->execute([
            $user['email'],
            $user['password_hash'],
            $user['remember_token_hash'],
            $user['created_at'],
            $user['id'],
        ]);
    }

    /**
     * Because tokens are stored hashed, load candidates and verify.
     */
    public function findByRememberToken(string $token): ?array {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE remember_token_hash IS NOT NULL');
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (!empty($row['remember_token_hash']) && password_verify($token, $row['remember_token_hash'])) {
                return $row;
            }
        }
        return null;
    }
}