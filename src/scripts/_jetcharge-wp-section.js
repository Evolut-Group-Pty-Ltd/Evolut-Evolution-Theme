(function() {
  const sectionApiUrl = 'https://jetcharge.evolut.com.au/shopify-sections/';

  const sections = Array.from(document.querySelectorAll('.jetcharge-wp-section'));
  sections.forEach(async function(section) {
    const sectionName = section.dataset.sectionName;
    const response = await fetch(`${sectionApiUrl}?section=${sectionName}`);

    if(!response.ok) {
      section.textContent = `Error ${response.status}: ${response.statusText}`;
      return;
    }

    section.innerHTML = await response.text();

    if(sectionName === 'header') {
      JetChargeMegaMenuInit();
      initJetChargeHeader();
      jetChargeModelSearchInit();
    }

    const cartCounts = Array.from(section.querySelectorAll('.Header__CartCount'));
    cartCounts.forEach(cart => cart.textContent = theme.cartCount);

    feather.replace();
    initElSelects(section);
  });
})();
