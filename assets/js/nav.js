// Mobile nav toggle
document.addEventListener('DOMContentLoaded', function () {
  var toggles = document.querySelectorAll('.nav-toggle');
  toggles.forEach(function(toggle){
    var nav = toggle.closest('.nav');
    var links = nav.querySelector('.nav-links');
    toggle.addEventListener('click', function (e) {
      var isOpen = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // Close on resize when switching to desktop
    window.addEventListener('resize', function () {
      if (window.innerWidth > 768 && nav.classList.contains('open')) {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });

    // Close when clicking outside
    document.addEventListener('click', function (ev) {
      if (!nav.contains(ev.target) && nav.classList.contains('open')) {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });

    // Close on escape
    document.addEventListener('keydown', function (ev) {
      if (ev.key === 'Escape' && nav.classList.contains('open')) {
        nav.classList.remove('open');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  });
  
  // Registration modal handling
  const regBtn = document.getElementById('register-btn');
  const regModal = document.getElementById('reg-modal');
  const regClose = regModal && regModal.querySelector('.reg-close');
  const regBackdrop = regModal && regModal.querySelector('.reg-backdrop');
  const regFreelancer = document.getElementById('reg-freelancer');
  const regCompany = document.getElementById('reg-company');

  function openReg(){ if (regModal) regModal.classList.add('open'); regModal && regModal.setAttribute('aria-hidden','false'); }
  function closeReg(){ if (regModal) regModal.classList.remove('open'); regModal && regModal.setAttribute('aria-hidden','true'); }

  if (regBtn) regBtn.addEventListener('click', (e)=>{ e.preventDefault(); openReg(); });
  if (regClose) regClose.addEventListener('click', closeReg);
  if (regBackdrop) regBackdrop.addEventListener('click', closeReg);
  document.addEventListener('keydown', (e)=>{ if (e.key==='Escape') closeReg(); });

  if (regFreelancer) regFreelancer.addEventListener('click', ()=>{ location.href='freelancer_register.php'; });
  if (regCompany) regCompany.addEventListener('click', ()=>{ location.href='company_register.php'; });
});
