<?php
class Database {
    /**
     * Connect to MySQL using PDO and run simple migration.
     */
    public static function connect(string $host, string $db, string $user, string $pass): PDO {
        $dsn = "mysql:host={$host};dbname={$db};charset=utf8mb4";
        $opts = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opts);
        self::migrate($pdo);
        return $pdo;
    }

    private static function migrate(PDO $pdo){
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id VARCHAR(32) PRIMARY KEY,
                email VARCHAR(255) NOT NULL UNIQUE,
                password_hash TEXT NOT NULL,
                remember_token_hash TEXT,
                created_at INT NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ");
        $pdo->exec("CREATE INDEX IF NOT EXISTS idx_users_remember ON users(remember_token_hash(60))");
    }
}