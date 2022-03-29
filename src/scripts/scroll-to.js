(function() {
  const scrollBtns = document.querySelectorAll('.scroll-to');
  scrollBtns.forEach(function(btn) {
    const targetQuery = btn.dataset.target;
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(targetQuery);
      if(target === null) return;
      const top = target.offsetTop;
      window.scrollTo({
        top, left: 0,
        behavior: 'smooth'
      });
    });
  });
})();

