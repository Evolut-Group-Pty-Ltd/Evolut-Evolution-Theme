function initJetChargeHeader() {
  const header = document.querySelector('.header');
  if(header === null) return;
  const triggerBtn = header.querySelector('.header__trigger-btn');

  triggerBtn.addEventListener('click', () => header.classList.toggle('header--open'));
}

initJetChargeHeader();
