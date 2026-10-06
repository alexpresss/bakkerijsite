(() => {
  // The product cards are rendered by pages/assortiment.php; this adds filtering, search and the lightbox.
  const grid = document.querySelector('.products');
  if (!grid) return;

  const filters = [...document.querySelectorAll('.filter')];
  const search = document.querySelector('#zoek');
  const count = document.querySelector('.result-count');
  const empty = document.querySelector('.empty');
  const categories = filters.map(button => button.dataset.filter);
  let activeFilter = 'alles';

  const normalize = text => text.toLowerCase().normalize('NFD').replace(/[̀-ͯ]/g, '');

  const products = [...grid.querySelectorAll('.product')].map(card => {
    const media = card.querySelector('.product__media');
    const title = card.querySelector('h3').textContent;
    const description = card.querySelector('p');
    const text = description ? description.textContent : '';
    return {
      card,
      media,
      category: card.dataset.category,
      haystack: normalize(title + ' ' + text),
      lightbox: { src: media.dataset.full, thumb: media.querySelector('img').getAttribute('src'), title, text }
    };
  });

  products.forEach(product => product.media.addEventListener('click', () => {
    const visible = products.filter(p => !p.card.hidden);
    window.Lightbox.open(visible.map(p => p.lightbox), visible.indexOf(product));
  }));

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
    activeFilter = categories.includes(filter) ? filter : 'alles';
    if (updateHash) history.replaceState(null, '', activeFilter === 'alles' ? location.pathname : '#' + activeFilter);
    apply();
  }

  filters.forEach(button => button.addEventListener('click', () => setFilter(button.dataset.filter, true)));
  search.addEventListener('input', apply);
  addEventListener('hashchange', () => setFilter(location.hash.slice(1), false));
  setFilter(location.hash.slice(1), false);
})();
