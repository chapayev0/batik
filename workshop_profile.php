<?php
session_start();

// Check if logged in as workshop
if (!isset($_SESSION['logged_in']) || $_SESSION['user_type'] !== 'workshop') {
    header('Location: login.php');
    exit();
}

// Hardcoded workshop profile data
$workshop = [
    'name' => 'Heritage Batik Workshop',
    'username' => 'heritage_works',
    'founded' => '1998',
    'location' => 'Kandy, Sri Lanka',
    'employees' => '24',
    'specialties' => ['Traditional Batik', 'Silk Painting', 'Natural Dyeing', 'Wax Resist'],
    'about' => 'Heritage Batik Workshop is a premier traditional crafting center dedicated to preserving and promoting Sri Lankan batik heritage. We work with master craftspeople to create authentic, high-quality handmade products while providing training and employment opportunities to the next generation of artisans.',
    'mission' => 'To preserve traditional wax-resist dyeing techniques while creating sustainable livelihoods for skilled artisans and bringing authentic batik art to discerning customers worldwide.',
    'contact' => [
        'email' => 'info@heritagebatik.lk',
        'phone' => '+94 81 234 5678',
        'website' => 'www.heritagebatik.lk',
        'address' => '45 Temple Road, Kandy 20000'
    ]
];

// Active job postings
$jobPostings = [
    [
        'id' => 1,
        'title' => 'Senior Batik Artist',
        'type' => 'Full-time',
        'posted' => '2 days ago',
        'applications' => 12,
        'status' => 'Active'
    ],
    [
        'id' => 2,
        'title' => 'Dyeing Specialist',
        'type' => 'Part-time',
        'posted' => '5 days ago',
        'applications' => 8,
        'status' => 'Active'
    ],
    [
        'id' => 3,
        'title' => 'Fabric Prep Assistant',
        'type' => 'Contract',
        'posted' => '1 week ago',
        'applications' => 15,
        'status' => 'Active'
    ],
    [
        'id' => 4,
        'title' => 'Pattern Designer',
        'type' => 'Full-time',
        'posted' => '3 days ago',
        'applications' => 6,
        'status' => 'Active'
    ]
];

// Products showcase
$products = [
    [
        'name' => 'Traditional Elephant Motif Wall Hanging',
        'category' => 'Wall Art',
        'price' => '$85',
        'stock' => 'In Stock'
    ],
    [
        'name' => 'Modern Silk Saree',
        'category' => 'Modern Silk',
        'price' => '$120',
        'stock' => 'In Stock'
    ],
    [
        'name' => 'Cotton Sarong - Indigo Series',
        'category' => 'Cotton Wear',
        'price' => '$45',
        'stock' => 'Limited'
    ],
    [
        'name' => 'Hand-dyed Tote Bag',
        'category' => 'Accessories',
        'price' => '$35',
        'stock' => 'In Stock'
    ],
    [
        'name' => 'Floral Table Runner',
        'category' => 'Home Decor',
        'price' => '$55',
        'stock' => 'In Stock'
    ],
    [
        'name' => 'Ceremonial Wall Panel',
        'category' => 'Traditional Batik',
        'price' => '$210',
        'stock' => 'In Stock'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $workshop['name']; ?> - Profile</title>
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

        .logout {
            color: var(--secondary) !important;
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: var(--white);
            padding: 4rem 5%;
        }

        .profile-header-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .profile-header-content h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .tagline {
            font-size: 1.3rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            opacity: 0.9;
            font-size: 0.95rem;
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

        .about-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .about-text {
            color: var(--secondary);
            line-height: 1.9;
        }

        .about-text p {
            margin-bottom: 1.5rem;
        }

        .specialties {
            background: var(--white);
            padding: 2rem;
            border: 1px solid rgba(44, 36, 22, 0.1);
        }

        .specialties h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            color: var(--primary);
        }

        .specialty-list {
            list-style: none;
        }

        .specialty-list li {
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(44, 36, 22, 0.1);
            color: var(--secondary);
        }

        .specialty-list li:last-child {
            border-bottom: none;
        }

        .specialty-list li::before {
            content: '✓';
            color: var(--accent);
            font-weight: bold;
            margin-right: 1rem;
        }

        .jobs-table {
            background: var(--white);
            border: 1px solid rgba(44, 36, 22, 0.1);
            overflow: hidden;
        }

        .table-header {
            background: var(--primary);
            color: var(--white);
            padding: 1.5rem;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 1rem;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .table-row {
            padding: 1.5rem;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr;
            gap: 1rem;
            border-bottom: 1px solid rgba(44, 36, 22, 0.1);
            align-items: center;
            transition: background 0.3s;
        }

        .table-row:hover {
            background: var(--light);
        }

        .table-row:last-child {
            border-bottom: none;
        }

        .status-badge {
            padding: 0.375rem 1rem;
            background: rgba(76, 175, 80, 0.1);
            color: #2e7d32;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            border-radius: 20px;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: var(--white);
            padding: 1.5rem;
            border: 1px solid rgba(44, 36, 22, 0.1);
            transition: all 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .product-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }

        .product-category {
            color: var(--accent);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 1rem;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(44, 36, 22, 0.1);
        }

        .product-price {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary);
        }

        .stock-badge {
            padding: 0.375rem 0.875rem;
            background: rgba(76, 175, 80, 0.1);
            color: #2e7d32;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .stock-badge.limited {
            background: rgba(255, 152, 0, 0.1);
            color: #e65100;
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
            .about-grid {
                grid-template-columns: 1fr;
            }

            .table-header,
            .table-row {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .table-header {
                display: none;
            }

            .profile-header-content h1 {
                font-size: 3rem;
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
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </nav>

    <div class="profile-header">
        <div class="profile-header-content">
            <h1><?php echo $workshop['name']; ?></h1>
            <div class="tagline">Preserving Traditional Batik Craftsmanship Since <?php echo $workshop['founded']; ?>
            </div>

            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number"><?php echo $workshop['founded']; ?></div>
                    <div class="stat-label">Established</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo $workshop['employees']; ?></div>
                    <div class="stat-label">Craftspeople</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo count($products); ?></div>
                    <div class="stat-label">Products</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo count($jobPostings); ?></div>
                    <div class="stat-label">Open Positions</div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <h2 class="section-title">About Us</h2>
        <div class="about-grid">
            <div class="about-text">
                <p><?php echo $workshop['about']; ?></p>
                <p><strong>Our Mission:</strong> <?php echo $workshop['mission']; ?></p>
            </div>

            <div class="specialties">
                <h3>Our Specialties</h3>
                <ul class="specialty-list">
                    <?php foreach ($workshop['specialties'] as $specialty): ?>
                        <li><?php echo $specialty; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <h2 class="section-title">Active Job Postings</h2>
        <div class="jobs-table">
            <div class="table-header">
                <div>Position</div>
                <div>Type</div>
                <div>Posted</div>
                <div>Applications</div>
                <div>Status</div>
            </div>
            <?php foreach ($jobPostings as $job): ?>
                <div class="table-row">
                    <div><strong><?php echo $job['title']; ?></strong></div>
                    <div><?php echo $job['type']; ?></div>
                    <div><?php echo $job['posted']; ?></div>
                    <div><?php echo $job['applications']; ?> received</div>
                    <div><span class="status-badge"><?php echo $job['status']; ?></span></div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="section-title" style="margin-top: 4rem;">Our Products</h2>
        <div class="products-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <div class="product-category"><?php echo $product['category']; ?></div>
                    <h3 class="product-name"><?php echo $product['name']; ?></h3>
                    <div class="product-footer">
                        <div class="product-price"><?php echo $product['price']; ?></div>
                        <span
                            class="stock-badge <?php echo strtolower($product['stock']) === 'limited' ? 'limited' : ''; ?>">
                            <?php echo $product['stock']; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="section-title" style="margin-top: 4rem;">Contact Information</h2>
        <div class="contact-section">
            <div class="contact-grid">
                <div class="contact-item">
                    <strong>Email</strong>
                    <?php echo $workshop['contact']['email']; ?>
                </div>
                <div class="contact-item">
                    <strong>Phone</strong>
                    <?php echo $workshop['contact']['phone']; ?>
                </div>
                <div class="contact-item">
                    <strong>Website</strong>
                    <?php echo $workshop['contact']['website']; ?>
                </div>
                <div class="contact-item">
                    <strong>Address</strong>
                    <?php echo $workshop['contact']['address']; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>