(() => {
  const LABELS = {
    brood: 'Brood',
    koeken: 'Koeken',
    taarten: 'Taart',
    gebak: 'Gebak',
    seizoen: 'Seizoensartikelen',
    special: "American cake's & fototaarten"
  };

  const grid = document.querySelector('.products');
  const filters = [...document.querySelectorAll('.filter')];
  const search = document.querySelector('#zoek');
  const count = document.querySelector('.result-count');
  const empty = document.querySelector('.empty');
  if (!grid) return;

  let products = [];
  let activeFilter = 'alles';

  const normalize = text => text.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');

  const el = (tag, className, text) => {
    const node = document.createElement(tag);
    if (className) node.className = className;
    if (text) node.textContent = text;
    return node;
  };

  function render(data) {
    for (const category in data) {
      const list = data[category].sort((a, b) => a.naam.localeCompare(b.naam, 'nl'));
      list.forEach(item => {
        const card = el('li', 'product');
        const thumb = 'images/assortiment/min/' + item.foto;
        const media = el('button', 'product__media');
        media.type = 'button';
        media.setAttribute('aria-label', 'Vergroot foto van ' + item.naam);
        const img = el('img');
        img.src = '/' + thumb;
        img.alt = item.naam;
        img.loading = 'lazy';
        img.decoding = 'async';
        img.width = 520;
        img.height = 520;
        media.append(img);

        const body = el('div', 'product__body');
        body.append(el('span', 'product__cat', LABELS[category] || category), el('h3', '', item.naam));
        if (item.text) body.append(el('p', '', item.text));
        card.append(media, body);
        grid.append(card);

        const product = {
          card,
          category,
          haystack: normalize(item.naam + ' ' + item.text),
          lightbox: { src: '/images/assortiment/full/' + item.foto, thumb: '/' + thumb, title: item.naam, text: item.text }
        };
        media.addEventListener('click', () => {
          const visible = products.filter(p => !p.card.hidden);
          window.Lightbox.open(visible.map(p => p.lightbox), visible.indexOf(product));
        });
        products.push(product);
      });
    }
  }

  function apply() {
    const query = normalize(search.value.trim());
    let shown = 0;
    products.forEach(product => {
      const match = (activeFilter === 'alles' || product.category === activeFilter) &&
        (!query || product.haystack.includes(query));
      product.card.hidden = !match;
      if (match) shown++;
    });
    filters.forEach(button => button.setAttribute('aria-pressed', String(button.dataset.filter === activeFilter)));
    count.textContent = shown === 1 ? '1 product' : shown + ' producten';
    empty.hidden = shown > 0;
  }

  function setFilter(filter, updateHash) {
    activeFilter = LABELS[filter] ? filter : 'alles';
    if (updateHash) history.replaceState(null, '', activeFilter === 'alles' ? location.pathname : '#' + activeFilter);
    apply();
  }

  filters.forEach(button => button.addEventListener('click', () => setFilter(button.dataset.filter, true)));
  search.addEventListener('input', apply);
  addEventListener('hashchange', () => setFilter(location.hash.slice(1), false));

  fetch('/js/assortiment.json')
    .then(response => response.json())
    .then(data => {
      render(data);
      setFilter(location.hash.slice(1), false);
    })
    .catch(() => {
      count.textContent = '';
      empty.textContent = 'Het assortiment kon niet geladen worden. Probeer het later opnieuw.';
      empty.hidden = false;
    });
})();
