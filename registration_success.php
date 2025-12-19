<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Registration Success</title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;600;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="manifest" href="manifest.json">
  <meta name="theme-color" content="#2c2416">
  <link rel="stylesheet" href="assets/css/site-header.css">
  <link rel="stylesheet" href="assets/css/register.css">
  <script src="pwa-register.js" defer></script>
  <script src="assets/js/nav.js" defer></script>
</head>
<body class="page-offset">
  <?php include __DIR__.'/includes/header.php'; ?>
  <main class="reg-wrap">
    <h1>Registration Successful</h1>
    <div id="preview" class="preview"></div>
    <div class="actions">
      <a href="index.php" class="btn">Home</a>
      <a id="new-reg" class="btn btn-link">New Registration</a>
    </div>
  </main>
  <script>
    function qs(name){
      const url = new URL(location.href);
      return url.searchParams.get(name);
    }
    const type = qs('type') || 'freelancer';
    const key = type === 'company' ? 'company_profile' : 'freelancer_profile';
    const raw = localStorage.getItem(key);
    const preview = document.getElementById('preview');
    if (!raw){
      preview.innerHTML = '<p>No saved registration found. Try registering first.</p>';
    } else {
      const data = JSON.parse(raw);
      let html = '<dl>';
      for (const k in data){
        html += `<dt>${k.replace(/_/g,' ')}:</dt><dd>${(data[k]||'')}</dd>`;
      }
      html += '</dl>';
      preview.innerHTML = html;
    }
    document.getElementById('new-reg').href = type === 'company' ? 'company_register.php' : 'freelancer_register.php';
  </script>
</body>
</html>
