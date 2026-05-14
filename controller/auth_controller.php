<?php

session_start();

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db_conn.php';
require_once __DIR__ . '/../repositories/user_repository.php';
require_once __DIR__ . '/../service/auth_service.php';
require_once __DIR__ . '/../middleware/auth_middleware.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: ../index.php");
    exit();
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if(empty($email) || empty($password)){
    $_SESSION['error'] = "Email and password are required.";
    header("Location: ../index.php");
    exit();
}

$user = fetchUserByEmail($conn, $email);

if(!$user) {
    $_SESSION['error'] = "Invalid credentials.";
    header("Location: ../index.php");
    exit();
}

if(!verifyPassword($password, $user['password'])) {
    $_SESSION['error'] = "Invalid credentials.";
    header("Location: ../index.php");
    exit();
}

session_regenerate_id(true);

$_SESSION['user_id'] = $user['user_id'];
$_SESSION['user_role_id'] = $user['role_id'];
$_SESSION['user_role'] = $user['role_name'] ?? '';
$_SESSION['logged_in'] = true;

$roleId = (int)($_SESSION['user_role_id'] ?? 0);
redirectToDashboard($roleId, (string)($_SESSION['user_role'] ?? ''), BASE_URL);
?>