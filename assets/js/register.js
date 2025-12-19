// register.js - client-side prototype registration (stores in localStorage)
document.addEventListener('DOMContentLoaded', () => {
  const fForm = document.getElementById('freelancer-form');
  const cForm = document.getElementById('company-form');

  if (fForm) {
    fForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const data = {};
      new FormData(fForm).forEach((v,k)=>data[k]=v.trim());
      localStorage.setItem('freelancer_profile', JSON.stringify(data));
      // redirect to success page
      location.href = 'registration_success.php?type=freelancer';
    });
  }

  if (cForm) {
    cForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const data = {};
      new FormData(cForm).forEach((v,k)=>data[k]=v.trim());
      localStorage.setItem('company_profile', JSON.stringify(data));
      location.href = 'registration_success.php?type=company';
    });
  }
});
