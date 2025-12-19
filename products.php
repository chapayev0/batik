<?php
session_start();

// Hardcoded product data
$products = [
    [
        'id' => 1,
        'name' => 'Traditional Elephant Motif Wall Hanging',
        'category' => 'Wall Art',
        'price' => '$85',
        'seller' => 'Heritage Batik Workshop',
        'description' => 'Hand-waxed traditional wall hanging featuring the majestic Sri Lankan elephant in earth tones.',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%238b7355\' width=\'400\' height=\'300\'/%3E%3Cellipse cx=\'200\' cy=\'150\' rx=\'120\' ry=\'80\' fill=\'%23d4a574\'/%3E%3Cellipse cx=\'200\' cy=\'140\' rx=\'100\' ry=\'60\' fill=\'%236b5345\'/%3E%3C/svg%3E'
    ],
    [
        'id' => 2,
        'name' => 'Modern Silk Saree',
        'category' => 'Modern Silk',
        'price' => '$120',
        'seller' => 'Heritage Batik Workshop',
        'description' => 'Contemporary silk saree with abstract geometric batik patterns in vibrant blues.',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%23c4a882\' width=\'400\' height=\'300\'/%3E%3Crect x=\'100\' y=\'80\' width=\'200\' height=\'150\' fill=\'%238b7355\' rx=\'10\'/%3E%3Cpath d=\'M 100 80 Q 200 60 300 80\' stroke=\'%23d4a574\' stroke-width=\'3\' fill=\'none\'/%3E%3C/svg%3E'
    ],
    [
        'id' => 3,
        'name' => 'Cotton Sarong - Indigo Series',
        'category' => 'Cotton Wear',
        'price' => '$45',
        'seller' => 'Heritage Batik Workshop',
        'description' => 'Premium cotton sarong featuring classic indigo dye techniques and dot patterns.',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%23e8e4df\' width=\'400\' height=\'300\'/%3E%3Ccircle cx=\'150\' cy=\'150\' r=\'60\' fill=\'%238b7355\'/%3E%3Ccircle cx=\'250\' cy=\'150\' r=\'60\' fill=\'%238b7355\'/%3E%3Crect x=\'180\' y=\'120\' width=\'40\' height=\'60\' fill=\'%23d4a574\'/%3E%3C/svg%3E'
    ],
    [
        'id' => 4,
        'name' => 'Hand-dyed Tote Bag',
        'category' => 'Accessories',
        'price' => '$35',
        'seller' => 'Heritage Batik Workshop',
        'description' => 'Durable canvas tote bag with unique hand-dyed batik motifs.',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%23f8f6f3\' width=\'400\' height=\'300\'/%3E%3Crect x=\'100\' y=\'80\' width=\'200\' height=\'140\' fill=\'%236b5345\' rx=\'15\'/%3E%3Crect x=\'180\' y=\'50\' width=\'40\' height=\'40\' fill=\'%23d4a574\' rx=\'5\'/%3E%3C/svg%3E'
    ],
    [
        'id' => 5,
        'name' => 'Floral Table Runner',
        'category' => 'Home Decor',
        'price' => '$55',
        'seller' => 'Heritage Batik Workshop',
        'description' => 'Elegant table runner with intricate floral batik designs on linen.',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%232c2416\' width=\'400\' height=\'300\'/%3E%3Ccircle cx=\'200\' cy=\'150\' r=\'80\' fill=\'%23d4a574\'/%3E%3Cpath d=\'M 200 100 L 220 140 L 200 180 L 180 140 Z\' fill=\'%238b7355\'/%3E%3C/svg%3E'
    ],
    [
        'id' => 6,
        'name' => 'Ceremonial Wall Panel',
        'category' => 'Traditional Batik',
        'price' => '$210',
        'seller' => 'Heritage Batik Workshop',
        'description' => 'Large-scale ceremonial wall panel depicting traditional Sri Lankan folklore.',
        'image' => 'data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 400 300\'%3E%3Crect fill=\'%23c4a882\' width=\'400\' height=\'300\'/%3E%3Crect x=\'50\' y=\'100\' width=\'300\' height=\'100\' fill=\'%238b7355\'/%3E%3Cpath d=\'M 70 120 h 260 M 70 140 h 260 M 70 160 h 260 M 70 180 h 260\' stroke=\'%23d4a574\' stroke-width=\'2\'/%3E%3C/svg%3E'
    ]
];

$categories = ['All', 'Traditional Batik', 'Modern Silk', 'Cotton Wear', 'Wall Art', 'Home Decor', 'Accessories'];
$selectedCategory = $_GET['category'] ?? 'All';

$filteredProducts = $selectedCategory === 'All'
    ? $products
    : array_filter($products, function ($p) use ($selectedCategory) {
        return $p['category'] === $selectedCategory;
    });
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batik Products - Batik Net</title>
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
            padding: 4rem 5% 2rem;
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
        }

        .categories {
            display: flex;
            gap: 1rem;
            justify-content: center;
            padding: 2rem 5%;
            flex-wrap: wrap;
        }

        .category-btn {
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--primary);
            background: transparent;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .category-btn:hover,
        .category-btn.active {
            background: var(--primary);
            color: var(--white);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2.5rem;
            padding: 2rem 5% 4rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .product-card {
            background: var(--white);
            overflow: hidden;
            transition: all 0.4s;
            border: 1px solid rgba(44, 36, 22, 0.1);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            background: var(--light);
        }

        .product-info {
            padding: 2rem;
        }

        .product-category {
            color: var(--accent);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .product-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            margin-bottom: 0.75rem;
            color: var(--primary);
        }

        .product-description {
            color: var(--secondary);
            font-size: 0.95rem;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(44, 36, 22, 0.1);
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
        }

        .product-seller {
            font-size: 0.85rem;
            color: var(--secondary);
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 3rem;
            }

            .products-grid {
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

    <div class="page-header">
        <h1>Batik Masterpieces</h1>
        <p>Authentic hand-dyed batik creations by skilled Sri Lankan artisans</p>
    </div>

    <div class="categories">
        <?php foreach ($categories as $cat): ?>
            <a href="?category=<?php echo $cat; ?>"
                class="category-btn <?php echo $selectedCategory === $cat ? 'active' : ''; ?>">
                <?php echo $cat; ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="products-grid">
        <?php foreach ($filteredProducts as $product): ?>
            <div class="product-card">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                <div class="product-info">
                    <div class="product-category"><?php echo $product['category']; ?></div>
                    <h3 class="product-name"><?php echo $product['name']; ?></h3>
                    <p class="product-description"><?php echo $product['description']; ?></p>
                    <div class="product-footer">
                        <div class="product-price"><?php echo $product['price']; ?></div>
                    </div>
                    <div class="product-seller" style="margin-top: 0.5rem;">by <?php echo $product['seller']; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>