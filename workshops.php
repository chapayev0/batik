<?php
session_start();

// Hardcoded recruitment/workshop data
$workshops = [
    [
        'id' => 1,
        'name' => 'Heritage Batik Workshop',
        'username' => 'heritage_works',
        'location' => 'Kandy, Sri Lanka',
        'type' => 'Workshop / Company',
        'specialties' => ['Traditional Batik', 'Silk Painting', 'Natural Dyeing', 'Wax Resist'],
        'description' => 'Heritage Batik Workshop is a premier traditional crafting center dedicated to preserving and promoting Sri Lankan batik heritage. We work with master craftspeople to create authentic, high-quality handmade products.',
        'active_jobs' => 4,
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 300 300\'%3E%3Crect fill=\'%23c4a882\' width=\'300\' height=\'300\'/%3E%3Cpath d=\'M 50 150 L 150 50 L 250 150 L 150 250 Z\' fill=\'%238b7355\' stroke=\'%232c2416\' stroke-width=\'5\'/%3E%3C/svg%3E',
        'jobs' => [
            [
                'title' => 'Senior Batik Artist',
                'type' => 'Full-time',
                'salary' => 'Negotiable',
                'requirements' => ['5+ years experience', 'Mastery of wax application', 'Portfolio required']
            ],
            [
                'title' => 'Dyeing Specialist',
                'type' => 'Part-time',
                'salary' => '$500/mo',
                'requirements' => ['Knowledge of natural dyes', 'Color mixing expert', 'Detail oriented']
            ],
            [
                'title' => 'Pattern Designer',
                'type' => 'Contract',
                'salary' => 'Project-based',
                'requirements' => ['Traditional motif knowledge', 'Creative flair', 'Sketching skills']
            ]
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workshop Jobs - Batik House</title>
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

        .workshops-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 5% 4rem;
        }

        .workshop-card {
            background: var(--white);
            padding: 3rem;
            margin-bottom: 2.5rem;
            border: 1px solid rgba(44, 36, 22, 0.1);
            transition: all 0.4s;
        }

        .workshop-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .workshop-header {
            display: grid;
            grid-template-columns: 100px 1fr auto;
            gap: 2rem;
            margin-bottom: 2rem;
            align-items: center;
            padding-bottom: 2rem;
            border-bottom: 1px solid rgba(44, 36, 22, 0.1);
        }

        .workshop-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .workshop-info h2 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .meta-info {
            display: flex;
            gap: 2rem;
            color: var(--secondary);
            font-size: 0.9rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .workshop-description {
            margin-bottom: 2rem;
            color: var(--secondary);
            max-width: 800px;
        }

        .specialties {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            margin-bottom: 2.5rem;
        }

        .specialty-tag {
            padding: 0.5rem 1rem;
            background: var(--light);
            color: var(--primary);
            font-size: 0.85rem;
            font-weight: 500;
            border: 1px solid rgba(44, 36, 22, 0.1);
        }

        .jobs-section {
            background: var(--light);
            padding: 2rem;
            border-radius: 8px;
        }

        .jobs-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .job-card {
            background: var(--white);
            padding: 1.5rem;
            margin-bottom: 1rem;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr auto;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s;
        }

        .job-card:last-child {
            margin-bottom: 0;
        }

        .job-card:hover {
            transform: translateX(10px);
            border-left: 4px solid var(--accent);
        }

        .job-title {
            font-weight: 600;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .job-type {
            font-size: 0.9rem;
            color: var(--accent);
            font-weight: 500;
        }

        .job-salary {
            font-size: 0.9rem;
            color: var(--secondary);
        }

        .apply-btn {
            padding: 0.5rem 1.5rem;
            border: 1px solid var(--primary);
            background: transparent;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s;
        }

        .apply-btn:hover {
            background: var(--primary);
            color: var(--white);
        }

        @media (max-width: 968px) {
            .workshop-header {
                grid-template-columns: 1fr;
                text-align: center;
                justify-items: center;
            }

            .job-card {
                grid-template-columns: 1fr;
                gap: 0.5rem;
                text-align: center;
            }

            .job-card:hover {
                transform: translateY(-5px);
                border-left: none;
                border-top: 4px solid var(--accent);
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
        <h1>Workshop Opportunities</h1>
        <p>Join leading batik workshops and contribute to the preservation of traditional Sri Lankan craftsmanship</p>
    </div>

    <div class="workshops-container">
        <?php foreach ($workshops as $workshop): ?>
            <div class="workshop-card">
                <div class="workshop-header">
                    <img src="<?php echo $workshop['image']; ?>" alt="<?php echo $workshop['name']; ?>"
                        class="workshop-logo">

                    <div class="workshop-info">
                        <h2><?php echo $workshop['name']; ?></h2>
                        <div class="meta-info">
                            <div class="meta-item">
                                <span>📍</span>
                                <span><?php echo $workshop['location']; ?></span>
                            </div>
                            <div class="meta-item">
                                <span>🏢</span>
                                <span><?php echo $workshop['type']; ?></span>
                            </div>
                        </div>
                    </div>

                    <a href="workshop_profile.php" class="apply-btn" style="padding: 1rem 2rem;">View Profile</a>
                </div>

                <p class="workshop-description"><?php echo $workshop['description']; ?></p>

                <div class="specialties">
                    <?php foreach ($workshop['specialties'] as $specialty): ?>
                        <span class="specialty-tag"><?php echo $specialty; ?></span>
                    <?php endforeach; ?>
                </div>

                <div class="jobs-section">
                    <div class="jobs-title">
                        <span>Open Positions</span>
                        <span
                            style="font-size: 0.9rem; color: var(--secondary); font-family: 'Montserrat', sans-serif;"><?php echo $workshop['active_jobs']; ?>
                            Active</span>
                    </div>

                    <?php foreach ($workshop['jobs'] as $job): ?>
                        <div class="job-card">
                            <div class="job-title"><?php echo $job['title']; ?></div>
                            <div class="job-type"><?php echo $job['type']; ?></div>
                            <div class="job-salary"><?php echo $job['salary']; ?></div>
                            <a href="#" class="apply-btn">Apply Now</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>