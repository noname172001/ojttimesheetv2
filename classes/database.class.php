<?php

declare(strict_types=1);

// I am marking this class as final so you know you dont want to extend here :P
final class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getConnection(array $config = []): PDO
    {
        if (self::$instance !== null) return self::$instance;

        if (empty($config)) {
            throw new Exception("Database config missing on first initialization");
        }


        try {
            $db = $config['database'];
            $dsn = "mysql:host={$db['db_host']};dbname={$db['db_name']};charset={$db['charset']}";

            self::$instance = new PDO($dsn, $db['db_user'], $db['db_pass'], $config['pdo_options'] ?? []);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection to db failed: " . $e->getMessage());
        }

        return self::$instance;
    }

    // Prevent cloning of instance
    private function __clone() {}

    // Prevent unserialization backdoor
    public function __wakeup() {}
}
