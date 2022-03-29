(async function() {
  await nextAnimationFrame();
  const accordions = document.querySelectorAll('.evlt-accordion');
  accordions.forEach(function(acc) {
    if(!isMobileWidth() && acc.classList.contains('evlt-accordion--sm-only')) return;

    var items = acc.querySelectorAll('.evlt-accordion__item');
    items.forEach(function(item) {
      // Calculate content height
      var title = item.querySelector('.evlt-accordion__title');
      var content = item.querySelector('.evlt-accordion__content');
      item.style.height = (title.offsetHeight + content.offsetHeight) + 'px';

      // Handle toggle click
      title.addEventListener('click', function(e) {
        e.preventDefault();
        for(var i in Array.from(items)) {
          if(items[i].isSameNode(item))
            items[i].classList.toggle('evlt-accordion__item--active');
          else
            items[i].classList.remove('evlt-accordion__item--active');
        }
      })
    })
  });
})();
