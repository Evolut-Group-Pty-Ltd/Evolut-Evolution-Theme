/* === File: faq-accordion.js === */

var acc = document.getElementsByClassName("faq-accordion__item");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

/* === File: image-showcase.js === */
(function() {
  const scrollables = Array.from(document.querySelectorAll('.image-showcase--scrollable'));

  scrollables.forEach(scrollable => {
    let activeItem = 1;
    const visibleItems = getComputedStyle(scrollable).getPropertyValue('--visible-items');
    const itemCount = scrollable.querySelector('.image-showcase__images').children.length;
    const buttons = scrollable.querySelector('.image-showcase__navs').children;

    buttons[0].addEventListener('click', function() {
      if(activeItem === 1) return; // can't go lower
      activeItem--;
      scrollable.style.setProperty('--current-item', activeItem);
    });

    buttons[1].addEventListener('click', function() {
      if(activeItem === itemCount - visibleItems + 1) return; // can't go higher
      activeItem++;
      scrollable.style.setProperty('--current-item', activeItem);
    });
  });

  if(isMobileWidth()) {
    const showcases = Array.from(document.querySelectorAll('.image-showcase:not(.image-showcase--scrollable) .image-showcase__images'));
    showcases.forEach(showcase => {
      showcase.scrollLeft = showcase.scrollWidth / 2 - showcase.offsetWidth / 2;
    });
  }
})();

/* === File: scroll-to.js === */
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


/* === File: header.js === */
function initJetChargeHeader() {
  const header = document.querySelector('.header');
  if(header === null) return;
  const triggerBtn = header.querySelector('.header__trigger-btn');

  triggerBtn.addEventListener('click', () => header.classList.toggle('header--open'));
}

initJetChargeHeader();

/* === File: gravity-forms.js === */
jQuery(document).on('gform_page_loaded gform_confirmation_loaded', function() {
  initElSelects(document);
});

/* === File: slider.js === */
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

/* === File: evlt-accordion.js === */
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

/* === File: el-select.js === */
function createDomElement(tag, classes, attributes, content) {
  const node = document.createElement(tag);
  if(classes) classes.forEach(c => node.classList.add(c));
  if(attributes) Object.keys(attributes).forEach(a => node.setAttribute(a, attributes[a]));
  if(content) node.textContent = content;
  return node;
}

function initElSelects(target) {
  const selects = target.querySelectorAll('select.input--select, select.gfield_select, .ginput_container_time > select');
  const smartSelects = [];
  Array.from(selects).forEach(function(s) {
    if('smartSelect' in s) return; // this field already has smartSelect
    const isSearch = s.classList.contains('input--select-search');

    // creating smart select
    const smartSelect = createDomElement('div', ['el-select', ...Array.from(s.classList).filter(c => c !== 'input--select')], { 'value': '', 'selected-text': ''});
    if(s.hasAttribute('disabled')) smartSelect.classList.add('el-select--disabled');

    // creating trigger button
    let triggerBtn = null;
    if(isSearch) {
      triggerBtn = createDomElement('input', ['el-select__trigger', 'el-select__search'], { 'type': 'text' });
    } else {
      triggerBtn = createDomElement('button', ['el-select__trigger'], { 'type': 'button' });
    }

    // creating options
    const options = createDomElement('div', ['el-select__options']);
    smartSelect.appendChild(triggerBtn);
    triggerBtn.addEventListener('click', e => {
      if(smartSelect.classList.contains('el-select--disabled')) return;
      smartSelect.classList.toggle('el-select--active');
    });
    smartSelect.appendChild(options);
    if(s.children.length > 0) {
      smartSelect.setAttribute('value', s.children[0].value);
      smartSelect.setAttribute('selected-text', s.children[0].textContent);
    }

    // handling search
    if(isSearch) {
      triggerBtn.addEventListener('blur', function() {
        triggerBtn.value = '';
      });

      triggerBtn.addEventListener('focus', function() {
        const optionItems = Array.from(options.children);
        requestAnimationFrame(() => requestAnimationFrame(() => {
          optionItems.forEach(option => option.classList.remove('el-select__option--hidden'));
        }));
      });

      triggerBtn.addEventListener('input', function() {
        const query = `[data-text*="${triggerBtn.value}" i]`;
        const optionItems = Array.from(options.children);
        if(triggerBtn.value === '') {
          optionItems.forEach(option => option.classList.remove('el-select__option--hidden'));
          return;
        }

        const results = Array.from(options.querySelectorAll(query));

        optionItems.forEach(option => option.classList.toggle('el-select__option--hidden', results.indexOf(option) === -1));
      });

      triggerBtn.addEventListener('keypress', function(e) {
        if(e.keyCode !== 13) return; // only handle Enter button
        e.preventDefault();
        // find first non hidden option
        const option = options.querySelector('.el-select__option:not(.el-select__option--hidden)');
        option.click();
        triggerBtn.blur();
      });
    }

    // tracking value change
    s.addEventListener('change', function() {
      smartSelect.setAttribute('value', s.value);
      smartSelect.setAttribute('selected-text', Array.from(s.children).find(c => c.value == s.value).textContent);
    });

    // tracking properties change
    const observer = new MutationObserver(function() {
      if(s.hasAttribute('disabled')) {
        smartSelect.classList.add('el-select--disabled');
      } else {
        smartSelect.classList.remove('el-select--disabled');
      }
    });
    observer.observe(s, { attributes: true, attributeFilter: ['disabled']});
    smartSelects.push(smartSelect);

    Array.from(s.children).forEach(function(o) {
      const option = createDomElement(
        'button',
        ['el-select__option'],
        {
          'type': 'button',
          'value': o.value,
          'data-text': o.textContent
        },
        o.textContent
      );
      if(o.selected) {
        smartSelect.setAttribute('value', o.value);
        smartSelect.setAttribute('selected-text', o.textContent);
      }
      option.addEventListener('click', function() {
        smartSelect.setAttribute('value', o.value);
        smartSelect.setAttribute('selected-text', o.textContent);
        option.blur();
        s.value = o.value;
        s.dispatchEvent(new Event('change'));
        if(s.classList.contains('gfield_select')) jQuery(s).change();
      })
      options.appendChild(option);
    });

    s.parentNode.insertBefore(smartSelect, s);
    s.classList.add('input--select--hidden');
    s.smartSelect = smartSelect;
  });

  window.addEventListener('click', function(e) {
    if(e.target.matches('.el-select__trigger')) return;
    smartSelects.forEach(s => s.classList.remove('el-select--active'));
  })
};
initElSelects(document);

/* === File: draggable-content.js === */
(function() {
  const sliders = Array.from(document.querySelectorAll('.draggable-content__container'));

  if(!isMobileWidth()) {
    sliders.forEach(slider => {
      const itemsContainer = slider.querySelector('.draggable-content__items');
      let hadDrag = false;
      let active = false;
      let startPosX = 0;
      let currentScroll = 0;
      // initial scroll
      slider.scrollLeft = slider.scrollWidth / 2 - slider.offsetWidth / 2;


      function updateScroll(newScroll) {
        slider.scrollLeft = newScroll;
      }

      function startDrag(startX) {
        hadDrag = false;
        active = true;
        startPosX = startX;
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
  }

  /* OLD CODE */
  /*return;
  const sliders = Array.from(document.querySelectorAll('.draggable-content__items'));
  sliders.forEach(function(slider) {
    let active = false;
    let currentX = 0;
    let dx = 0;
    let xStart = 0;
    const sliderWidth = slider.offsetWidth;
    const style = getComputedStyle(slider);
    const itemGap = parseInt(style.getPropertyValue('--item-gap'));
    const slidesCount = slider.children.length;
    const sliderItemWidth = (sliderWidth - itemGap * (slidesCount - 1)) / slidesCount;
    console.log(sliderItemWidth);
    let maxX = sliderWidth / 2;
    let minX = maxX * -1;
    let transformShift = '-50% + ';

    // mobile parameters
    if(isMobileWidth()) {
      maxX = 0;
      minX = sliderWidth / -1 + sliderItemWidth;
      transformShift = '';
    }

    let hadDrag = false;

    function updateTransform() {
      slider.style.transform = `translateX(calc(${transformShift}${currentX + dx}px))`;
    }

    function startDrag(startX) {
      hadDrag = false;
      active = true;
      xStart = startX;
    }

    function updateDrag(posX) {
      if(!active) return;
      dx = (posX - xStart);
      if(dx > maxX - currentX) dx = maxX - currentX;
      if(dx < minX - currentX) dx = minX - currentX;
      updateTransform();
    }

    function stopDrag() {
      hadDrag = Math.abs(dx) > 5;
      active = false;
      currentX += dx;
      dx = 0;
    }

    slider.addEventListener('mousedown', e => startDrag(e.clientX));
    slider.addEventListener('mouseup', e => stopDrag());
    slider.addEventListener('mousemove', e => updateDrag(e.clientX));

    slider.addEventListener('touchstart', e => startDrag(e.changedTouches[0].clientX));
    slider.addEventListener('touchend', e => stopDrag());
    slider.addEventListener('touchmove', e => updateDrag(e.changedTouches[0].clientX));

    Array.from(slider.children).forEach(item => {
      item.addEventListener('click', function(e) {
        if(hadDrag) e.preventDefault();
      });
      item.addEventListener('dragstart', function(e) {
        e.preventDefault();
      });
    });
  });*/
})();

/* === File: visible-tag.js === */
window.addEventListener('load', function() {
  const tags = Array.from(document.querySelectorAll('.visible-tag'));

  handler();
  window.addEventListener('scroll', handler);

  function handler() {
    const viewStart = window.pageYOffset;
    const viewEnd = window.pageYOffset + window.innerHeight;
    const viewHeight = window.innerHeight;

    tags.forEach(function(t) {
      const rect = t.getBoundingClientRect();
      const topPos = viewHeight - rect.top;
      const bottomPos = viewHeight - (rect.top + rect.height);
      //console.log(topPos, bottomPos, videoHeight);
      if(topPos > viewHeight/3) {
        t.classList.add('visible-tag--visible');
      }
    });
  }
});

/* === File: jetcharge-graph.js === */
(function() {
  const graphs = Array.from(document.querySelectorAll('.jetcharge-graph'));
  graphs.forEach(graph => {
    const menuItems = Array.from(graph.querySelectorAll('.jetcharge-graph__menu-item'));
    const imageItems = Array.from(graph.querySelectorAll('.jetcharge-graph__graph-item'));
    const navButtons = Array.from(graph.querySelector('.jetcharge-graph__navs').children);

    function activateTargetItem(target) {
      graph.dataset.activeItem = target;
    }

    function changeTargetNumber(delta) {
      const count = imageItems.length;
      let next = parseInt(graph.dataset.activeItem) + delta;
      if(next > count) next = 1;
      if(next < 1) next = count;
      activateTargetItem(next);
    }

    menuItems.forEach(i => i.addEventListener('click', () => activateTargetItem(i.dataset.target)));
    imageItems.forEach(i => i.addEventListener('click', () => activateTargetItem(i.dataset.target)));

    navButtons[0].addEventListener('click', () => changeTargetNumber(-1));
    navButtons[1].addEventListener('click', () => changeTargetNumber(+1));
  });
})();

/* === File: utils.js === */
function nextAnimationFrame() {
  return new Promise(function(resolve, reject) {
    window.requestAnimationFrame(function() {
      window.requestAnimationFrame(resolve);
    });
  });
}

function isMobileWidth(width = 768) { return window.innerWidth <= width;  }

/* === File: model-search.js === */
function jetChargeModelSearchInit() {
  const searches = Array.from(document.querySelectorAll('.ev-model-search'));
  searches.forEach(search => {
    const select = search.querySelector('select.ev-model-search__select');
    const btn = search.querySelector('.ev-model-search__btn');
    btn.addEventListener('click', function() {
      if(select.value === '') return;
      document.location.href = select.value;
    });
  });
}

jetChargeModelSearchInit();

/* === File: mega-menu.js === */
function JetChargeMegaMenuInit() {
  const headerMenu = document.querySelector('.header__menu');
  const megaMenu = document.querySelector('.mega-menu__content');

  if(headerMenu === null || megaMenu === null) return;

  const menuItems = Array.from(headerMenu.children);

  menuItems.forEach(function(item) {
    const id = item.id.replace('menu-item-', '');
    const megaItem = megaMenu.querySelector(`#mega-menu-item-${id}`);
    if(megaItem === null) return;

    let menuItemHover = false;
    let megaItemHover = false;

    function updateMegaItem() {
      megaItem.classList.toggle('mega-menu__item--active', menuItemHover || megaItemHover);
    }

    item.addEventListener('mouseover', function() {
      menuItemHover = true;
      updateMegaItem();
    });

    item.addEventListener('mouseleave', function() {
      menuItemHover = false;
      updateMegaItem();
    });

    megaItem.addEventListener('mouseover', function() {
      megaItemHover = true;
      updateMegaItem();
    });

    megaItem.addEventListener('mouseleave', function() {
      megaItemHover = false;
      updateMegaItem();
    });
  });
};
JetChargeMegaMenuInit();
