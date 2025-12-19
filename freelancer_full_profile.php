<?php
session_start();

// Hardcoded freelancer profile data matching the dummy profile request
$profile = [
    'name' => 'Maya Perera',
    'username' => 'artisan_maya',
    'specialty' => 'Batik Artist & Designer',
    'experience' => '12 years',
    'location' => 'Kandy, Sri Lanka',
    'bio' => 'Master batik artist specializing in traditional Sri Lankan motifs and contemporary abstract designs. I blend ancient wax-resist dyeing techniques with modern artistic sensibilities to create unique textile art.',
    'skills' => ['Wax Resisting', 'Natural Dyeing', 'Pattern Design', 'Silk Painting', 'Color Theory', 'Fabric Treatment'],
    'contact' => [
        'email' => 'maya.perera@email.com',
        'phone' => '+94 77 123 4567',
        'website' => 'www.mayaperera.art'
    ]
];

// Portfolio items
$portfolio = [
    [
        'title' => 'Traditional Elephant Parade',
        'description' => 'Detailed wall hanging depicting the Kandy Perahera using multi-layered wax resist technique',
        'year' => '2023',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%238b7355\' width=\'400\' height=\'300\'/%3E%3Cellipse cx=\'200\' cy=\'150\' rx=\'100\' ry=\'120\' fill=\'%23d4a574\'/%3E%3Ccircle cx=\'170\' cy=\'130\' r=\'15\' fill=\'%232c2416\'/%3E%3Ccircle cx=\'230\' cy=\'130\' r=\'15\' fill=\'%232c2416\'/%3E%3C/svg%3E'
    ],
    [
        'title' => 'Abstract Blue Silk Saree',
        'description' => 'Contemporary silk saree design featuring fluid organic shapes in indigo and turquoise',
        'year' => '2024',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%23f8f6f3\' width=\'400\' height=\'300\'/%3E%3Crect x=\'50\' y=\'100\' width=\'300\' height=\'20\' fill=\'%238b7355\'/%3E%3Crect x=\'80\' y=\'120\' width=\'10\' height=\'100\' fill=\'%236b5345\'/%3E%3Crect x=\'310\' y=\'120\' width=\'10\' height=\'100\' fill=\'%236b5345\'/%3E%3C/svg%3E'
    ],
    [
        'title' => 'Floral Wall Panel',
        'description' => 'Large scale cotton panel with intricate lotus flower motifs',
        'year' => '2023',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%23c4a882\' width=\'400\' height=\'300\'/%3E%3Cpath d=\'M 100 100 L 200 50 L 300 100 L 300 200 L 200 250 L 100 200 Z\' fill=\'%238b7355\' stroke=\'%23d4a574\' stroke-width=\'3\'/%3E%3C/svg%3E'
    ],
    [
        'title' => 'Geometric Cushion Covers',
        'description' => 'Set of modern cushion covers using crackle effect batik technique',
        'year' => '2024',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%23e8e4df\' width=\'400\' height=\'300\'/%3E%3Cellipse cx=\'200\' cy=\'180\' rx=\'120\' ry=\'80\' fill=\'%238b7355\'/%3E%3Cellipse cx=\'200\' cy=\'170\' rx=\'100\' ry=\'60\' fill=\'%23d4a574\'/%3E%3C/svg%3E'
    ],
    [
        'title' => 'Ceremonial Wall Art',
        'description' => 'Commissioned piece for a heritage hotel lobby featuring ancient Sigiriya frescoes',
        'year' => '2023',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%23f8f6f3\' width=\'400\' height=\'300\'/%3E%3Crect x=\'120\' y=\'100\' width=\'160\' height=\'100\' rx=\'10\' fill=\'%238b7355\'/%3E%3Cpath d=\'M 100 250 Q 200 230 300 250\' stroke=\'%236b5345\' stroke-width=\'8\' fill=\'none\'/%3E%3C/svg%3E'
    ],
    [
        'title' => 'Silk Scarf Collection',
        'description' => 'Limited edition hand-painted silk scarves with botanical dyes',
        'year' => '2024',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%232c2416\' width=\'400\' height=\'300\'/%3E%3Crect x=\'80\' y=\'120\' width=\'240\' height=\'15\' fill=\'%23d4a574\'/%3E%3Crect x=\'100\' y=\'135\' width=\'10\' height=\'80\' fill=\'%238b7355\'/%3E%3Crect x=\'290\' y=\'135\' width=\'10\' height=\'80\' fill=\'%238b7355\'/%3E%3C/svg%3E'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $profile['name']; ?> - Profile</title>
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

        .profile-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: var(--white);
            padding: 4rem 5%;
        }

        .profile-header-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 200px 1fr;
            gap: 3rem;
            align-items: start;
        }

        .profile-image {
            width: 200px;
            height: 200px;
            border: 5px solid var(--accent);
            background: var(--accent);
        }

        .profile-info h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3.5rem;
            margin-bottom: 0.5rem;
        }

        .specialty {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .meta-tags {
            display: flex;
            gap: 2rem;
            margin-bottom: 1.5rem;
        }

        .meta-tag {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0.9;
        }

        .bio {
            line-height: 1.8;
            opacity: 0.95;
            max-width: 800px;
        }

        .section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 5%;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            margin-bottom: 2rem;
            color: var(--primary);
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 3rem;
        }

        .skill-card {
            background: var(--white);
            padding: 1.5rem;
            text-align: center;
            border: 2px solid var(--accent);
            transition: all 0.3s;
        }

        .skill-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        .portfolio-item {
            background: var(--white);
            overflow: hidden;
            transition: all 0.4s;
            border: 1px solid rgba(44, 36, 22, 0.1);
        }

        .portfolio-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .portfolio-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        .portfolio-info {
            padding: 2rem;
        }

        .portfolio-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .portfolio-year {
            color: var(--accent);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .portfolio-description {
            color: var(--secondary);
            line-height: 1.7;
        }

        .contact-section {
            background: var(--white);
            padding: 3rem;
            border: 1px solid rgba(44, 36, 22, 0.1);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .contact-item {
            color: var(--secondary);
        }

        .contact-item strong {
            display: block;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        @media (max-width: 968px) {
            .profile-header-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .profile-image {
                margin: 0 auto;
            }

            .portfolio-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="assets/css/responsive.css">
    <script src="assets/js/nav.js" defer></script>
</head>

<body>
    <nav class="nav">
        <a href="index.php" class="logo">Batik Net</a>
        <button class="nav-toggle" aria-label="Toggle menu" aria-expanded="false">
            <span class="hamburger"></span>
        </button>
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

    <div class="profile-header">
        <div class="profile-header-content">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 300 300'%3E%3Crect fill='%238b7355' width='300' height='300'/%3E%3Ccircle cx='150' cy='120' r='50' fill='%23d4a574'/%3E%3Crect x='100' y='170' width='100' height='80' fill='%23d4a574'/%3E%3C/svg%3E"
                alt="<?php echo $profile['name']; ?>" class="profile-image">

            <div class="profile-info">
                <h1><?php echo $profile['name']; ?></h1>
                <div class="specialty"><?php echo $profile['specialty']; ?></div>

                <div class="meta-tags">
                    <div class="meta-tag">
                        <span>📍</span>
                        <span><?php echo $profile['location']; ?></span>
                    </div>
                    <div class="meta-tag">
                        <span>⏱️</span>
                        <span><?php echo $profile['experience']; ?> experience</span>
                    </div>
                </div>

                <p class="bio"><?php echo $profile['bio']; ?></p>
            </div>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">Skills & Expertise</h2>
        <div class="skills-grid">
            <?php foreach ($profile['skills'] as $skill): ?>
                <div class="skill-card">
                    <strong><?php echo $skill; ?></strong>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="section-title">Portfolio</h2>
        <div class="portfolio-grid">
            <?php foreach ($portfolio as $item): ?>
                <div class="portfolio-item">
                    <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['title']; ?>" class="portfolio-image">
                    <div class="portfolio-info">
                        <div class="portfolio-year"><?php echo $item['year']; ?></div>
                        <h3 class="portfolio-title"><?php echo $item['title']; ?></h3>
                        <p class="portfolio-description"><?php echo $item['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="section-title" style="margin-top: 4rem;">Contact Information</h2>
        <div class="contact-section">
            <div class="contact-grid">
                <div class="contact-item">
                    <strong>Email</strong>
                    <?php echo $profile['contact']['email']; ?>
                </div>
                <div class="contact-item">
                    <strong>Phone</strong>
                    <?php echo $profile['contact']['phone']; ?>
                </div>
                <div class="contact-item">
                    <strong>Website</strong>
                    <?php echo $profile['contact']['website']; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>