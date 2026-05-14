<?php

session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/middleware/auth_middleware.php';

if (!empty($_SESSION['logged_in'])) {
    $roleId = (int)($_SESSION['user_role_id'] ?? 0);
    $roleName = (string)($_SESSION['user_role'] ?? '');

    redirectToDashboard($roleId, $roleName, BASE_URL);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cattle Management System - Login</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Added Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .login-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 450px; /* Adjusted width for better look */
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h2 {
            font-weight: 700;
            color: #2e7d32;
            font-size: 28px;
        }

        .form-floating > label {
            font-size: 16px;
            color: #6c757d;
        }

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.25);
        }

        /* Eye Icon Styling */
        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            z-index: 10;
            color: #6c757d;
            font-size: 1.2rem;
        }

        .btn-login {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 12px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background-color: #388e3c;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h2>🐂 Cattle Management System</h2>
            <p class="text-muted" style="font-size: 14px;">Please login to your account</p>
        </div>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>controller/auth_controller.php" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>

            <!-- Password with Eye Icon -->
            <div class="password-wrapper mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control" id="pwd" name="password" placeholder="Password" required>
                    <label for="pwd">Password</label>
                </div>
                <i class="bi bi-eye-slash toggle-password" id="toggleIcon"></i>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>

            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>

    <!-- JavaScript to toggle password visibility -->
    <script>
        const toggleIcon = document.querySelector('#toggleIcon');
        const passwordInput = document.querySelector('#pwd');

        toggleIcon.addEventListener('click', function () {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Toggle the icon class
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
