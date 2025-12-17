<?php
session_start();

// Hardcoded credentials
$users = [
    'freelancer' => [
        'username' => 'artisan_maya',
        'password' => 'craft123',
        'type' => 'freelancer',
        'name' => 'Maya Perera'
    ],
    'workshop' => [
        'username' => 'heritage_works',
        'password' => 'workshop123',
        'type' => 'workshop',
        'name' => 'Heritage Crafts Workshop'
    ]
];

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $type = $_POST['type'] ?? '';

    if (
        isset($users[$type]) &&
        $users[$type]['username'] === $username &&
        $users[$type]['password'] === $password
    ) {

        $_SESSION['logged_in'] = true;
        $_SESSION['user_type'] = $type;
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $users[$type]['name'];

        if ($type === 'freelancer') {
            header('Location: freelancer_profile.php');
        } else {
            header('Location: workshop_profile.php');
        }
        exit();
    } else {
        $error = 'Invalid credentials. Please try again.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Batik House</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Montserrat:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#2c2416">
    <link rel="apple-touch-icon" href="icons/icon.svg">
    <link rel="icon" type="image/svg+xml" href="icons/icon.svg">
    <script src="pwa-register.js" defer></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2c2416;
            --secondary: #8b7355;
            --accent: #d4a574;
            --light: #f8f6f3;
            --white: #ffffff;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: linear-gradient(135deg, #f8f6f3 0%, #e8e4df 100%);
            color: var(--primary);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-container {
            background: var(--white);
            max-width: 900px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .login-side {
            padding: 4rem;
        }

        .login-left {
            background: var(--primary);
            color: var(--white);
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            letter-spacing: 2px;
        }

        .login-left p {
            opacity: 0.9;
            line-height: 1.8;
            margin-bottom: 2rem;
        }

        .back-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        .login-form {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: var(--secondary);
        }

        input,
        select {
            width: 100%;
            padding: 0.875rem;
            border: 2px solid rgba(44, 36, 22, 0.1);
            background: var(--light);
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--accent);
            background: var(--white);
        }

        .btn {
            width: 100%;
            padding: 1rem;
            background: var(--primary);
            color: var(--white);
            border: none;
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
            letter-spacing: 1px;
        }

        .btn:hover {
            background: var(--secondary);
        }

        .error {
            background: #fee;
            color: #c33;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-left: 4px solid #c33;
            font-size: 0.9rem;
        }

        .demo-credentials {
            background: rgba(212, 165, 116, 0.1);
            padding: 1.5rem;
            margin-top: 1.5rem;
            border-left: 4px solid var(--accent);
        }

        .demo-credentials h4 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            margin-bottom: 0.75rem;
            color: var(--primary);
        }

        .demo-credentials p {
            font-size: 0.85rem;
            margin: 0.25rem 0;
            color: var(--secondary);
        }

        .demo-credentials strong {
            color: var(--primary);
        }

        @media (max-width: 768px) {
            .login-container {
                grid-template-columns: 1fr;
            }

            .login-left {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-side login-left">
            <div class="logo">BATIK HOUSE</div>
            <p>Welcome back! Login to access your profile, manage your portfolio, post jobs, or browse opportunities in
                traditional batik art.</p>
            <a href="index.php" class="back-link">← Back to Home</a>
        </div>
        <div class="login-side login-form">
            <h2>Login</h2>

            <?php if ($error): ?>
                <div class="error"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label>Account Type</label>
                    <select name="type" required>
                        <option value="">Select account type</option>
                        <option value="freelancer">Freelancer / Artisan</option>
                        <option value="workshop">Workshop / Company</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>

                <button type="submit" class="btn">Login</button>
            </form>

            <div class="demo-credentials">
                <h4>Demo Credentials</h4>
                <p><strong>Freelancer:</strong> artisan_maya / craft123</p>
                <p><strong>Workshop:</strong> heritage_works / workshop123</p>
            </div>
        </div>
    </div>
</body>

</html>