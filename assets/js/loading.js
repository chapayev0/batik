// Redirect to index.php after a short delay
document.addEventListener('DOMContentLoaded', function(){
  // If you prefer a longer pause, increase this value (milliseconds)
  setTimeout(function(){
    window.location.href = 'index.php';
  }, 1500);
});
