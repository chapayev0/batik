<?php
// Reusable site header (nav). Assumes this file is included from site root.
?>
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
