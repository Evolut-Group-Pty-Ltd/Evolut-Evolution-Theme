(function() {
  const sliders = Array.from(document.querySelectorAll('.slider'));
  sliders.forEach(function(slider) {
    const navButtons = Array.from(slider.querySelectorAll('.slider__nav-item'));
    const arrowButtons = Array.from(slider.querySelectorAll('.slider__arrow'));

    // Handling arrow buttons if they are present
    if(arrowButtons.length > 0) {
      arrowButtons[0].addEventListener('click', () => changeSlideNumber(-1));
      arrowButtons[1].addEventListener('click', () => changeSlideNumber(+1));
    }

    // Handling nav buttons if they are present
    if(navButtons.length > 0) {
      navButtons.forEach(button => button.addEventListener('click', function() {
        const targetSlide = button.dataset.targetSlide;
        slider.dataset.slide = targetSlide;
      }));
    }

    // Handling auto rotation of slides
    if('rotateSpeed' in slider.dataset) {
      const speed = parseInt(slider.dataset.rotateSpeed);
      if(speed > 0) setInterval(() => changeSlideNumber(+1, true), speed * 1000);
    }

    function changeSlideNumber(delta, loop = false) {
      const slidesNumber = slider.querySelector('.slider__items').children.length;
      let nextSlide = parseInt(slider.dataset.slide) + delta;
      if(!loop && nextSlide > slidesNumber) return;
      if(!loop && nextSlide < 1) return;
      if(loop && nextSlide > slidesNumber) nextSlide = 1;
      if(loop && nextSlide < 1) nexSlide = slidesNumber;
      slider.dataset.slide = nextSlide;
    }

  })
})();
