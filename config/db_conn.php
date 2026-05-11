<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$env = getenv('APP_ENV') ?: 'local';

if ($env === 'local') {
        $host = $_SERVER['DB_HOST'] ?? $_ENV['DB_HOST'];
        $db   = $_SERVER['DB_DATABASE'] ?? $_ENV['DB_DATABASE'];
        $user = $_SERVER['DB_USERNAME'] ?? $_ENV['DB_USERNAME'];
        $pass = $_SERVER['DB_PASSWORD'] ?? $_ENV['DB_PASSWORD'] ?? ''; 
    } else {
        $host = $_SERVER['PROD_DB_HOST'] ?? $_ENV['PROD_DB_HOST'];
        $db   = $_SERVER['PROD_DB_DATABASE'] ?? $_ENV['PROD_DB_DATABASE'];
        $user = $_SERVER['PROD_DB_USERNAME'] ?? $_ENV['PROD_DB_USERNAME'];
        $pass = $_SERVER['PROD_DB_PASSWORD'] ?? $_ENV['PROD_DB_PASSWORD'];
    }

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$db;charset=utf8",
        $user,
        $pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}