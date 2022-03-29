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
