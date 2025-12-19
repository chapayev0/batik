<?php
// Prototype freelancer registration (no DB). Uses client-side storage.
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Freelancer Registration</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="manifest" href="manifest.json">
  <meta name="theme-color" content="#2c2416">
  <link rel="stylesheet" href="assets/css/site-header.css">
  <link rel="stylesheet" href="assets/css/register.css">
  <script src="pwa-register.js" defer></script>
  <script src="assets/js/nav.js" defer></script>
  <script src="assets/js/register.js" defer></script>
</head>
<body class="page-offset">
  <?php session_start(); include __DIR__.'/includes/header.php'; ?>
  <main class="reg-wrap">
    <h1>Freelancer Registration</h1>
    <form id="freelancer-form" class="reg-form">
      <label>Full name<input name="full_name" required></label>
      <label>Email<input name="email" type="email" required></label>
      <label>Phone<input name="phone" type="tel"></label>
      <label>Location<input name="location"></label>
      <label>Skills / Bio<textarea name="skills" rows="4"></textarea></label>
      <label>Portfolio URL<input name="portfolio" type="url"></label>
      <div class="actions">
        <button type="submit" class="btn">Register</button>
        <a href="index.php" class="btn btn-link">Cancel</a>
      </div>
    </form>
  </main>
</body>
</html>
