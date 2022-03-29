(function() {
  const pageStart = document.querySelector('[name="page-content-start"]');
  const header = document.querySelector('.header');
  const topbar = document.querySelector('.topbar');

  function scrollHandler() {
    pageStartPos = pageStart.offsetTop;
    scrollPos = window.scrollY;

    const isContent = scrollPos > pageStartPos;
    topbar.classList.toggle('topbar--overlay', !isContent);
    topbar.classList.toggle('topbar--fixed', isContent);
    header.classList.toggle('header--overlay', !isContent);
    header.classList.toggle('header--fixed', isContent);
  }
  document.addEventListener('scroll', scrollHandler);
  scrollHandler();
})();
