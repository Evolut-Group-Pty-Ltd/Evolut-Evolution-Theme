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
