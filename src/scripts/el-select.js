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
