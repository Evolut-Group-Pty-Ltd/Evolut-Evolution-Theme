(function() {
  const sliders = Array.from(document.querySelectorAll('.draggable-content__container'));

  if(!isMobileWidth()) {
    sliders.forEach(slider => {
      const itemsContainer = slider.querySelector('.draggable-content__items');
      let hadDrag = false;
      let active = false;
      let startPosX = 0;
      let currentScroll = 0;
      let startDragTime = 0;
      // initial scroll
      slider.scrollLeft = slider.scrollWidth / 2 - slider.offsetWidth / 2;


      function updateScroll(newScroll) {
        slider.scrollLeft = newScroll;
      }

      function startDrag(startX) {
        hadDrag = false;
        active = true;
        startPosX = startX;
        startDragTime = Date.now();
        currentScroll = slider.scrollLeft;
      }

      function updateDrag(posX) {
        if(!active) return;
        let dx = posX - startPosX;
        let newScroll = currentScroll - dx;
        if(newScroll > slider.scrollWidth) newScroll = slider.scrollWidth;
        if(newScroll < 0) newScroll = 0;
        updateScroll(newScroll);
      }

      function stopDrag(posX) {
        hadDrag = Math.abs(posX - startPosX) > 5;
        // if dragging were longer than 0.5 second it was a grag
        const dragDuration = Date.now() - startDragTime;
        if(dragDuration > 500) hadDrag = true;
        active = false;
      }

      slider.addEventListener('mousedown', e => startDrag(e.clientX));
      slider.addEventListener('mouseup', e => stopDrag(e.clientX));
      slider.addEventListener('mousemove', e => updateDrag(e.clientX));

      Array.from(slider.querySelectorAll('.draggable-content__item')).forEach(item => {
        item.addEventListener('click', function(e) {
          if(hadDrag) e.preventDefault();
        });
      });
    });
  } else {
    sliders.forEach(slider => {
      const items = Array.from(slider.querySelectorAll('.draggable-content__item'));
      items.forEach(item => {
        item.addEventListener('touchstart', () => item.classList.add('draggable-content__item--dragged'));
        item.addEventListener('touchend', () => item.classList.remove('draggable-content__item--dragged'));
      });
    })
  }
})();
