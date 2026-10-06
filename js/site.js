(() => {
  const $ = (sel, root = document) => root.querySelector(sel);
  const $$ = (sel, root = document) => [...root.querySelectorAll(sel)];
  const reducedMotion = matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Mobile navigation
  const toggle = $('.nav-toggle');
  const nav = $('#site-nav');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const open = toggle.getAttribute('aria-expanded') !== 'true';
      toggle.setAttribute('aria-expanded', String(open));
      nav.classList.toggle('is-open', open);
    });
  }

  // Header shadow & scroll-to-top button
  const header = $('.site-header');
  const toTop = $('.to-top');
  const onScroll = () => {
    if (header) header.classList.toggle('is-scrolled', scrollY > 8);
    if (toTop) toTop.classList.toggle('is-visible', scrollY > 400);
  };
  addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  $$('[data-year]').forEach(el => { el.textContent = new Date().getFullYear(); });

  // Opening hours: the footer list is the single source, highlight today (Belgian time)
  const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
  const today = days.indexOf(
    new Intl.DateTimeFormat('en-US', { weekday: 'short', timeZone: 'Europe/Brussels' }).format(new Date())
  );
  let todayHours = null;
  $$('.hours [data-days]').forEach(row => {
    if (row.dataset.days.split(' ').includes(String(today))) {
      row.classList.add('is-today');
      todayHours = $('dd', row).textContent.trim();
    }
  });
  const todayEl = $('[data-today-hours]');
  if (todayEl && todayHours) {
    todayEl.textContent = /gesloten/i.test(todayHours) ? 'Vandaag gesloten' : `Vandaag open: ${todayHours}`;
  }

  // Hero slideshow & rotating slogans
  const slides = $$('.hero__slide');
  const dots = $$('.hero__dots button');
  if (slides.length > 1) {
    let current = 0;
    let timer;
    const show = index => {
      current = (index + slides.length) % slides.length;
      slides.forEach((slide, i) => slide.classList.toggle('is-active', i === current));
      dots.forEach((dot, i) => dot.setAttribute('aria-current', String(i === current)));
    };
    const start = () => {
      if (!reducedMotion) timer = setInterval(() => show(current + 1), 6000);
    };
    dots.forEach((dot, i) => dot.addEventListener('click', () => {
      clearInterval(timer);
      show(i);
      start();
    }));
    start();
  }

  const slogans = $$('.slogans p');
  if (slogans.length > 1 && !reducedMotion) {
    let current = 0;
    setInterval(() => {
      slogans[current].classList.remove('is-active');
      current = (current + 1) % slogans.length;
      slogans[current].classList.add('is-active');
    }, 4500);
  }

  // Reveal on scroll
  const revealEls = $$('[data-reveal]');
  if ('IntersectionObserver' in window && !reducedMotion) {
    const observer = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px' });
    revealEls.forEach(el => observer.observe(el));
  } else {
    revealEls.forEach(el => el.classList.add('is-visible'));
  }

  // Lightbox: items are { src, thumb, title, text }
  const Lightbox = (() => {
    let dialog, img, caption, items = [], index = 0;

    const build = () => {
      dialog = document.createElement('dialog');
      dialog.className = 'lightbox';
      dialog.innerHTML =
        '<div class="lightbox__stage"><img alt=""><div class="lightbox__caption"></div></div>' +
        '<button type="button" class="lightbox__close" aria-label="Sluiten"><i class="fas fa-times"></i></button>' +
        '<button type="button" class="lightbox__prev" aria-label="Vorige"><i class="fas fa-chevron-left"></i></button>' +
        '<button type="button" class="lightbox__next" aria-label="Volgende"><i class="fas fa-chevron-right"></i></button>';
      document.body.append(dialog);
      img = $('img', dialog);
      caption = $('.lightbox__caption', dialog);
      $('.lightbox__close', dialog).addEventListener('click', () => dialog.close());
      $('.lightbox__prev', dialog).addEventListener('click', () => go(index - 1));
      $('.lightbox__next', dialog).addEventListener('click', () => go(index + 1));
      dialog.addEventListener('click', e => {
        if (e.target === dialog || e.target.classList.contains('lightbox__stage')) dialog.close();
      });
      dialog.addEventListener('keydown', e => {
        if (e.key === 'ArrowLeft') go(index - 1);
        if (e.key === 'ArrowRight') go(index + 1);
      });
    };

    const go = i => {
      index = (i + items.length) % items.length;
      const item = items[index];
      // Show the thumbnail right away, swap in the full image once it has loaded
      img.src = item.thumb || item.src;
      img.alt = item.title || '';
      if (item.thumb && item.thumb !== item.src) {
        const full = new Image();
        full.onload = () => { if (items[index] === item) img.src = item.src; };
        full.src = item.src;
      }
      caption.textContent = item.title || '';
      if (item.text) {
        const small = document.createElement('small');
        small.textContent = item.text;
        caption.append(small);
      }
    };

    return {
      open(list, start = 0) {
        if (!dialog) build();
        items = list;
        const single = items.length < 2;
        $('.lightbox__prev', dialog).hidden = single;
        $('.lightbox__next', dialog).hidden = single;
        go(start);
        dialog.showModal();
      }
    };
  })();
  window.Lightbox = Lightbox;

  // Static galleries: <div data-lightbox><a href="full.jpg"><img src="thumb.jpg"></a>…</div>
  $$('[data-lightbox]').forEach(gallery => {
    const links = $$('a', gallery);
    const list = links.map(link => {
      const thumb = $('img', link);
      return { src: link.href, thumb: thumb.currentSrc || thumb.src, title: thumb.alt };
    });
    links.forEach((link, i) => link.addEventListener('click', e => {
      e.preventDefault();
      Lightbox.open(list, i);
    }));
  });
})();
