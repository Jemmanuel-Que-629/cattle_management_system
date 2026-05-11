<?php

session_start();

require_once __DIR__ . '/../config/db_conn.php';
require_once __DIR__ . '/../repositories/user_repository.php';
require_once __DIR__ . '/../service/auth_service.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: ../views/index.php");
    exit();
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if(empty($email) || empty($password)){
    $_SESSION['error'] = "Email and password are required.";
    header("Location: ../views/index.php");
    exit();
}

$user = fetchUserByEmail($conn, $email);

if(!$user) {
    $_SESSION['error'] = "Invalid credentials.";
    header("Location: ../views/index.php");
    exit();
}

if(!verifyPassword($password, $user['password'])) {
    $_SESSION['error'] = "Invalid credentials.";
    header("Location: ../views/index.php");
    exit();
}

session_regenerate_id(true);

$_SESSION['user_id'] = $user['user_id'];
$_SESSION['user_role_id'] = $user['role_id'];
$_SESSION['user_role'] = $user['role_name'];
$_SESSION['logged_in'] = true;

if($user['role_name'] === 'Admin'){
    header("Location: ../views/admin/dashboard.php");
    exit();
} 

if ($user['role_name'] === 'Manager') {
    header("Location: ../views/manager/dashboard.php");
    exit();
}

header("Location: ../views/employee/dashboard.php");
exit();

var_dump($password);
var_dump($user['password']);
exit();

?>