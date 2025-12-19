<?php
session_start();
// Show the loading page once per session before serving the main page
if (!isset($_SESSION['loader_shown'])) {
    $_SESSION['loader_shown'] = 1;
    header('Location: loading.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batik Net - Authentic Sri Lankan Batik Art</title>
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
            background: var(--light);
            color: var(--primary);
            line-height: 1.6;
        }

        .nav {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            border-bottom: 1px solid rgba(44, 36, 22, 0.1);
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: 2px;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--primary);
            font-weight: 500;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--accent);
        }

        .btn {
            padding: 0.75rem 2rem;
            border: 2px solid var(--primary);
            background: transparent;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .btn:hover {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary {
            background: var(--primary);
            color: var(--white);
        }

        .btn-primary:hover {
            background: var(--secondary);
            border-color: var(--secondary);
        }

        /* Registration modal styles */
        .reg-modal{position:fixed;inset:0;display:none;align-items:center;justify-content:center;z-index:1100}
        .reg-modal.open{display:flex}
        .reg-backdrop{position:absolute;inset:0;background:rgba(0,0,0,0.4)}
        .reg-dialog{position:relative;background:#fff;padding:20px;border-radius:8px;max-width:360px;width:92%;box-shadow:0 10px 30px rgba(0,0,0,0.2);z-index:2;text-align:center}
        .reg-options{display:flex;gap:12px;justify-content:center;margin-top:16px}
        .reg-close{position:absolute;top:8px;right:8px;border:none;background:transparent;font-size:22px;cursor:pointer}

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 8rem 5% 4rem;
            background: linear-gradient(135deg, #f8f6f3 0%, #e8e4df 100%);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 80%;
            height: 150%;
            background: radial-gradient(circle, rgba(212, 165, 116, 0.1) 0%, transparent 70%);
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            50% {
                transform: translate(-20px, 20px) rotate(5deg);
            }
        }

        .hero-content {
            max-width: 1400px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-text h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 5rem;
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            color: var(--primary);
        }

        .hero-text p {
            font-size: 1.2rem;
            color: var(--secondary);
            margin-bottom: 2.5rem;
            line-height: 1.8;
        }

        .hero-actions {
            display: flex;
            gap: 1.5rem;
        }

        .hero-image {
            position: relative;
        }

        .hero-image::before {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 100%;
            height: 100%;
            border: 3px solid var(--accent);
            z-index: -1;
        }

        .hero-image img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            background: var(--secondary);
        }

        .section {
            padding: 6rem 5%;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3.5rem;
            text-align: center;
            margin-bottom: 4rem;
            color: var(--primary);
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2.5rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .card {
            background: var(--white);
            padding: 3rem;
            border: 1px solid rgba(44, 36, 22, 0.1);
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--accent);
            transform: scaleX(0);
            transition: transform 0.4s;
        }

        .card:hover::before {
            transform: scaleX(1);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .card p {
            color: var(--secondary);
            margin-bottom: 1.5rem;
        }

        .footer {
            background: var(--primary);
            color: var(--white);
            padding: 4rem 5%;
            text-align: center;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
        }

        @media (max-width: 968px) {
            .hero-content {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .hero-text h1 {
                font-size: 3.5rem;
            }

            .nav-links {
                gap: 1.5rem;
            }
        }
    </style>
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/nav.js" defer></script>
</head>

<body>
    <nav class="nav">
        <a href="index.php" class="logo">
            <img src="icons/logo.png" alt="Batik Net Logo" style="height: 50px;">
        </a>
        <button class="nav-toggle" aria-label="Toggle menu" aria-expanded="false">
            <span class="hamburger"></span>
        </button>
        <div class="nav-links">
            <a href="products.php">Products</a>
            <a href="freelancers.php">Craftspeople</a>
            <a href="workshops.php">Workshops</a>
                        <?php if (!isset($_SESSION['logged_in'])): ?>
                        <button id="register-btn" class="btn">Register</button>
                        <?php endif; ?>
            <a href="<?php echo isset($_SESSION['logged_in']) ? ($_SESSION['user_type'] === 'freelancer' ? 'freelancer_profile.php' : 'workshop_profile.php') : 'login.php'; ?>"
                class="btn">
                <?php echo isset($_SESSION['logged_in']) ? 'Profile' : 'Login'; ?>
            </a>
        </div>
    </nav>

        <!-- Registration modal -->
        <div id="reg-modal" class="reg-modal" aria-hidden="true">
            <div class="reg-backdrop" data-close="true"></div>
            <div class="reg-dialog" role="dialog" aria-modal="true" aria-labelledby="reg-title">
                <button class="reg-close" aria-label="Close">&times;</button>
                <h3 id="reg-title">Register as</h3>
                <div class="reg-options">
                    <button id="reg-freelancer" class="btn btn-primary">Freelancer</button>
                    <button id="reg-company" class="btn btn-link">Company</button>
                </div>
            </div>
        </div>

    <section class="hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Authentic Batik Excellence</h1>
                <p>Connecting master batik artists with those who appreciate traditional wax-resist dyeing techniques.
                    Discover unique handcrafted textiles and skilled artisans in one curated marketplace.</p>
                <div class="hero-actions">
                    <a href="products.php" class="btn btn-primary">Browse Patterns</a>
                    <a href="freelancers.php" class="btn">Meet Artists</a>
                    <button id="install-app" class="btn btn-primary" style="display:none;">Install App</button>
                </div>
            </div>
            <div class="hero-image">
                <img src="icons/wall.jpg" alt="Batik Net Hero">
            </div>
        </div>
    </section>

    <section class="section">
        <h2 class="section-title">What We Offer</h2>
        <div class="cards">
            <div class="card">
                <h3>Batik Collections</h3>
                <p>Browse authentic batik textiles, from traditional wall hangings to modern silk sarees, each piece
                    waxed and dyed by hand.</p>
                <a href="products.php" class="btn">View Collection</a>
            </div>
            <div class="card">
                <h3>Master Artists</h3>
                <p>Connect with experienced batik artists showcasing their portfolios of complex patterns and unique
                    color combinations.</p>
                <a href="freelancers.php" class="btn">Find Artists</a>
            </div>
            <div class="card">
                <h3>Workshop Opportunities</h3>
                <p>Workshops post job opportunities for skilled dyers and wax artists to collaborate on heritage
                    projects.</p>
                <a href="workshops.php" class="btn">Browse Jobs</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-content">
            <div class="logo" style="color: var(--white); margin-bottom: 1rem;">Batik Net</div>
            <p style="opacity: 0.8;">Preserving the art of wax-resist dyeing for future generations</p>
            <p style="margin-top: 2rem; opacity: 0.6;">© 2024 Batik Net. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>