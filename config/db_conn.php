<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load .env
$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$env = $_ENV['APP_ENV'] ?? 'local';

if ($env === 'local') {
    $host = $_ENV['DB_LOCAL_HOST'];
    $db   = $_ENV['DB_LOCAL_NAME'];
    $user = $_ENV['DB_LOCAL_USER'];
    $pass = $_ENV['DB_LOCAL_PASS'];
} else {
    $host = $_ENV['DB_PROD_HOST'];
    $db   = $_ENV['DB_PROD_NAME'];
    $user = $_ENV['DB_PROD_USER'];
    $pass = $_ENV['DB_PROD_PASS'];
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