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
