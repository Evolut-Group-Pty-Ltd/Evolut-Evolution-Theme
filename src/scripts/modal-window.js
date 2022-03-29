(function() {
  const modals = Array.from(document.querySelectorAll('.modal-window'));
  modals.forEach(function(modal) {
    const closeBtn = modal.querySelector('.modal-window__close-btn');
    closeBtn.addEventListener('click', function() {
      modal.classList.remove('modal-window--active');
    });
  });

  const modalTriggers = Array.from(document.querySelectorAll('.modal-window__trigger'));
  modalTriggers.forEach(function(trigger) {
    trigger.addEventListener('click', function(e) {
      if(!trigger.classList.contains('modal-window__trigger--allow-default')) e.preventDefault();
      const targetId = trigger.dataset.target;
      const target = document.querySelector(targetId);
      if(target !== null) {
        target.classList.add('modal-window--active');
      }
    });
  });
})();

