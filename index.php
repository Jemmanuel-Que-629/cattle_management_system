<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cow Management System - Login</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- Corrected Bootstrap 5.3 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            max-width: 600px;
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h2 {
            font-weight: 700;
            color: #2e7d32; /* Earthy Green */
            font-size: 30px;
        }

        /* Customizing the Google-style floating labels */
        .form-floating > label {
            font-size: 16px;
            color: #6c757d;
        }

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.25rem rgba(76, 175, 80, 0.25);
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

        .form-check-label {
            font-size: 14px;
            color: #495057;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h2>🐂 Cattle Management System</h2>
            <p class="text-muted" style="font-size: 14px;">Please login to your account</p>
        </div>

        <form action="/login.php">
            <!-- Floating Email Field -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                <label for="email">Email address</label>
            </div>

            <!-- Floating Password Field -->
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required>
                <label for="pwd">Password</label>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>