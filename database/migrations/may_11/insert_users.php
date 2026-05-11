<?php

require_once __DIR__ . '../../../../config/db_conn.php';

$email = 'admin@gmail.com';
$password = 'christina_828';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO users (email, password, role_id) VALUES (:email, :password, :role_id)";
    $stmt = $conn->prepare($sql);
    $stmt->execute( [':email' => $email, ':password' => $hashed_password, ':role_id' => 1] );
    echo "User inserted successfully.";
} catch (PDOException $e) {
    echo "Error inserting user: " . $e->getMessage();
}

?>