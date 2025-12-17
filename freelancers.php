<?php
session_start();

// Hardcoded freelancer data
$freelancers = [
    [
        'id' => 1,
        'name' => 'Maya Perera',
        'username' => 'artisan_maya',
        'specialty' => 'Batik Artist & Designer',
        'experience' => '12 years',
        'location' => 'Kandy, Sri Lanka',
        'skills' => ['Wax Resisting', 'Natural Dyeing', 'Pattern Design', 'Silk Painting'],
        'bio' => 'Master batik artist specializing in traditional Sri Lankan motifs and contemporary abstract designs on silk and cotton.',
        'portfolio_items' => 45,
        'contact' => 'maya.perera@email.com',
        'phone' => '+94 77 123 4567',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 300 300\'%3E%3Crect fill=\'%238b7355\' width=\'300\' height=\'300\'/%3E%3Ccircle cx=\'150\' cy=\'120\' r=\'50\' fill=\'%23d4a574\'/%3E%3Crect x=\'100\' y=\'170\' width=\'100\' height=\'80\' fill=\'%23d4a574\'/%3E%3C/svg%3E'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Craftspeople - Batik House</title>
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
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1.5rem 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
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

        .page-header {
            padding: 4rem 5% 3rem;
            text-align: center;
        }

        .page-header h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 4rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .page-header p {
            font-size: 1.2rem;
            color: var(--secondary);
            max-width: 700px;
            margin: 0 auto;
        }

        .freelancers-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 5% 4rem;
        }

        .freelancer-card {
            background: var(--white);
            padding: 3rem;
            margin-bottom: 2.5rem;
            border: 1px solid rgba(44, 36, 22, 0.1);
            transition: all 0.4s;
        }

        .freelancer-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .freelancer-header {
            display: grid;
            grid-template-columns: 150px 1fr auto;
            gap: 2rem;
            margin-bottom: 2rem;
            align-items: start;
        }

        .freelancer-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border: 4px solid var(--accent);
        }

        .freelancer-info h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .specialty {
            color: var(--accent);
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .meta-info {
            display: flex;
            gap: 2rem;
            color: var(--secondary);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .bio {
            color: var(--secondary);
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .skills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 2rem;
        }

        .skill-tag {
            padding: 0.5rem 1rem;
            background: var(--light);
            color: var(--primary);
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid rgba(44, 36, 22, 0.1);
        }

        .contact-info {
            padding-top: 1.5rem;
            border-top: 2px solid var(--light);
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .contact-item {
            color: var(--secondary);
            font-size: 0.95rem;
        }

        .contact-item strong {
            color: var(--primary);
            display: block;
            margin-bottom: 0.25rem;
        }

        .btn {
            padding: 0.875rem 2rem;
            border: 2px solid var(--primary);
            background: var(--primary);
            color: var(--white);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            font-size: 0.9rem;
            letter-spacing: 1px;
            display: inline-block;
        }

        .btn:hover {
            background: var(--secondary);
            border-color: var(--secondary);
        }

        .stats {
            background: var(--light);
            padding: 1rem;
            text-align: center;
        }

        .stats-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
        }

        .stats-label {
            font-size: 0.85rem;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        @media (max-width: 968px) {
            .freelancer-header {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .freelancer-image {
                margin: 0 auto;
            }

            .page-header h1 {
                font-size: 3rem;
            }
        }
    </style>
</head>

<body>
    <nav class="nav">
        <a href="index.php" class="logo">BATIK HOUSE</a>
        <div class="nav-links">
            <a href="products.php">Products</a>
            <a href="freelancers.php">Craftspeople</a>
            <a href="workshops.php">Workshops</a>
            <a
                href="<?php echo isset($_SESSION['logged_in']) ? ($_SESSION['user_type'] === 'freelancer' ? 'freelancer_profile.php' : 'workshop_profile.php') : 'login.php'; ?>">
                <?php echo isset($_SESSION['logged_in']) ? 'Profile' : 'Login'; ?>
            </a>
        </div>
    </nav>

    <div class="page-header">
        <h1>Master Batik Artisans</h1>
        <p>Connect with skilled artists showcasing their expertise in traditional batik techniques</p>
    </div>

    <div class="freelancers-container">
        <?php foreach ($freelancers as $freelancer): ?>
            <div class="freelancer-card">
                <div class="freelancer-header">
                    <img src="<?php echo $freelancer['image']; ?>" alt="<?php echo $freelancer['name']; ?>"
                        class="freelancer-image">

                    <div class="freelancer-info">
                        <h2><?php echo $freelancer['name']; ?></h2>
                        <div class="specialty"><?php echo $freelancer['specialty']; ?></div>

                        <div class="meta-info">
                            <div class="meta-item">
                                <span>📍</span>
                                <span><?php echo $freelancer['location']; ?></span>
                            </div>
                            <div class="meta-item">
                                <span>⏱️</span>
                                <span><?php echo $freelancer['experience']; ?> experience</span>
                            </div>
                        </div>

                        <p class="bio"><?php echo $freelancer['bio']; ?></p>

                        <div class="skills">
                            <?php foreach ($freelancer['skills'] as $skill): ?>
                                <span class="skill-tag"><?php echo $skill; ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="stats">
                        <div class="stats-number"><?php echo $freelancer['portfolio_items']; ?></div>
                        <div class="stats-label">Portfolio Items</div>
                    </div>
                </div>

                <div class="contact-info">
                    <div class="contact-item">
                        <strong>Email</strong>
                        <?php echo $freelancer['contact']; ?>
                    </div>
                    <div class="contact-item">
                        <strong>Phone</strong>
                        <?php echo $freelancer['phone']; ?>
                    </div>
                    <div class="contact-item">
                        <a href="freelancer_full_profile.php" class="btn">View Full Portfolio</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>