(function() {
  const instances = Array.from(document.querySelectorAll('.posts-preview'));

  instances.forEach(preview => {
    var delay = 5000; //ms
    const views = Array.from(preview.querySelectorAll('.posts-preview__view'));
    const listItems = Array.from(preview.querySelectorAll('.posts-preview__list-item'));
    let currentView = 0;

    const navBacks = Array.from(preview.querySelectorAll('.posts-preview__nav-item:first-child'));
    const navForws = Array.from(preview.querySelectorAll('.posts-preview__nav-item:last-child'));

    navBacks.forEach(n => n.addEventListener('click', () => changeViewNumber(-1)));
    navForws.forEach(n => n.addEventListener('click', () => changeViewNumber(+1)));

    listItems.forEach(function(item, idx) {
      item.addEventListener('click', () => setViewNumber(idx));
    });

    setInterval(changeViewNumber, delay, +1);

    function changeViewNumber(delta) {
      let nextView = currentView + delta;
      if(nextView >= views.length) nextView = 0;
      if(nextView < 0) nextView = views.length - 1;

      setViewNumber(nextView);
    }

    function setViewNumber(nextView) {
      currentView = nextView;

      views.forEach((view, idx) => view.classList.toggle('posts-preview__view--active', idx === nextView));
      listItems.forEach((view, idx) => view.classList.toggle('posts-preview__list-item--active', idx === nextView));
    }
  });
})();
