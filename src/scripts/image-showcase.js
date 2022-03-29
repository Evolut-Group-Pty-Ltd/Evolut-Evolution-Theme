(function() {
  const scrollables = Array.from(document.querySelectorAll('.image-showcase--scrollable'));

  scrollables.forEach(scrollable => {
    let activeItem = 1;
    const visibleItems = getComputedStyle(scrollable).getPropertyValue('--visible-items');
    const itemCount = scrollable.querySelector('.image-showcase__images').children.length;
    const buttons = scrollable.querySelector('.image-showcase__navs').children;

    buttons[0].addEventListener('click', () => changeItem(-1));
    buttons[1].addEventListener('click', () => changeItem(+1));

    // Handling auto rotation of slides
    if('rotateSpeed' in scrollable.dataset) {
      const speed = parseInt(scrollable.dataset.rotateSpeed);
      if(speed > 0) setInterval(() => changeItem(+1), speed * 1000);
    }

    function changeItem(delta) {
      let nextItem = activeItem + delta;
      if(nextItem > itemCount - visibleItems + 1) nextItem = 1;
      if(nextItem < 1) nextItem = itemCount - visibleItems + 1;
      activeItem = nextItem;
      scrollable.style.setProperty('--current-item', nextItem);
    }
  });

  if(isMobileWidth()) {
    const showcases = Array.from(document.querySelectorAll('.image-showcase .image-showcase__images'));
    showcases.forEach(showcase => {
      showcase.scrollLeft = showcase.scrollWidth / 2 - showcase.offsetWidth / 2;
    });
  }
})();
