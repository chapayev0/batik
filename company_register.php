<?php
// Prototype company registration (no DB). Uses client-side storage.
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Company Registration</title>
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
    <h1>Company Registration</h1>
    <form id="company-form" class="reg-form">
      <label>Company name<input name="company_name" required></label>
      <label>Contact person<input name="contact_person"></label>
      <label>Email<input name="email" type="email" required></label>
      <label>Phone<input name="phone" type="tel"></label>
      <label>Website<input name="website" type="url"></label>
      <label>About / Description<textarea name="description" rows="4"></textarea></label>
      <div class="actions">
        <button type="submit" class="btn">Register</button>
        <a href="index.php" class="btn btn-link">Cancel</a>
      </div>
    </form>
  </main>
</body>
</html>
