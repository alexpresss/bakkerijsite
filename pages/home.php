<?php if (!defined('APP')) { http_response_code(404); exit; } ?>
    <section class="hero">
      <div class="hero__slides" aria-hidden="true">
        <img class="hero__slide is-active" src="/images/slider/banner.jpg" alt="" width="2500" height="1000" fetchpriority="high">
        <img class="hero__slide" src="/images/slider/banner2.jpg" alt="" width="2500" height="1000" loading="lazy">
        <img class="hero__slide" src="/images/slider/banner3.jpg" alt="" width="2500" height="1000" loading="lazy">
      </div>

      <div class="wrap hero__content">
        <span class="hero__eyebrow">Ambachtelijk sinds 1970</span>
        <h1>Welkom op <span>Bakkerij Muylaert</span></h1>
        <div class="slogans">
          <p class="is-active">Gespecialiseerd in fototaarten, chocolade- en marsepeinbewerking</p>
          <p>De oudste, de stoutste en de wijste der bakkerijen</p>
          <p>#altijdfeestmetbakkerijmuylaert</p>
        </div>
        <div class="hero__actions">
          <a class="btn" href="/assortiment">Ontdek ons assortiment</a>
          <a class="btn btn--ghost" href="/contact">Contact &amp; route</a>
        </div>
      </div>

      <div class="wrap hero__dots">
        <button type="button" aria-label="Foto 1" aria-current="true"></button>
        <button type="button" aria-label="Foto 2" aria-current="false"></button>
        <button type="button" aria-label="Foto 3" aria-current="false"></button>
      </div>
      <img class="hero__badge" src="/images/echtBrood.webp" alt="Écht Brood" width="2154" height="2271">
    </section>

    <div class="wrap info-strip">
      <div class="info-strip__grid">
        <a class="info-item" href="#openingsuren">
          <i class="fas fa-clock" aria-hidden="true"></i>
          <span><small>Openingsuren</small><strong data-today-hours>Bekijk onze openingsuren</strong></span>
        </a>
        <a class="info-item" href="<?= e($config['maps']) ?>" target="_blank" rel="noopener">
          <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
          <span><small>Adres</small><strong><?= e($config['street'] . ', ' . $config['city']) ?></strong></span>
        </a>
        <a class="info-item" href="tel:<?= e($config['phone_link']) ?>">
          <i class="fas fa-phone" aria-hidden="true"></i>
          <span><small>Bestellen</small><strong><?= e($config['phone']) ?></strong></span>
        </a>
      </div>
    </div>

    <section class="section">
      <div class="wrap">
        <div class="section-head" data-reveal>
          <span class="eyebrow">Onze specialiteiten</span>
          <h2>Elke dag vers uit eigen atelier</h2>
        </div>
        <div class="features">
          <a class="feature-card" href="/assortiment#special" data-reveal>
            <span class="feature-card__icon"><i class="fas fa-birthday-cake" aria-hidden="true"></i></span>
            <h3>American cake's</h3>
            <span class="feature-card__more">Bekijk <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
          </a>
          <a class="feature-card" href="/assortiment#special" data-reveal>
            <span class="feature-card__icon"><i class="fas fa-image" aria-hidden="true"></i></span>
            <h3>Fototaarten</h3>
            <span class="feature-card__more">Bekijk <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
          </a>
          <a class="feature-card" href="/assortiment#brood" data-reveal>
            <span class="feature-card__icon"><i class="fas fa-bread-slice" aria-hidden="true"></i></span>
            <h3>Ambachtelijke broodsoorten</h3>
            <span class="feature-card__more">Bekijk <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
          </a>
          <a class="feature-card" href="/assortiment#koeken" data-reveal>
            <span class="feature-card__icon"><img src="/images/croissant.png" alt="" width="50" height="50"></span>
            <h3>Ovenverse koeken</h3>
            <span class="feature-card__more">Bekijk <i class="fas fa-arrow-right" aria-hidden="true"></i></span>
          </a>
        </div>
      </div>
    </section>

    <section class="section" style="padding-top:0">
      <div class="wrap">
        <div class="notice" data-reveal>
          <span class="notice__icon"><i class="fas fa-bullhorn" aria-hidden="true"></i></span>
          <div>
            <h2>Opgelet: bestellen doe je telefonisch of in de winkel</h2>
            <p>Bestellingen graag telefonisch of ter plaatse in de winkel doorgeven en <strong>niet via e-mail</strong>.</p>
            <p>Om je bestelling te garanderen vragen wij vriendelijk om ze op tijd door te geven. Speciale en grote
              taarten voor zaterdag en zondag bestel je ten laatste <strong>donderdag vóór 15u</strong>.</p>
          </div>
          <a class="btn" href="tel:<?= e($config['phone_link']) ?>"><i class="fas fa-phone" aria-hidden="true"></i>Bel ons</a>
        </div>
      </div>
    </section>

    <section class="section section--soft">
      <div class="wrap" style="max-width:1000px">
        <div class="section-head" data-reveal>
          <span class="eyebrow">In beeld</span>
          <h2>Een kijkje in onze bakkerij</h2>
        </div>
        <div class="video" data-reveal>
          <iframe src="https://www.youtube-nocookie.com/embed/6JPZLPnJ_ik" title="Bakkerij Muylaert in beeld" loading="lazy"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </section>

    <section id="news" class="section section--marble">
      <div class="wrap">
        <div class="section-head" data-reveal>
          <span class="eyebrow">Volg ons</span>
          <h2>Nieuws</h2>
        </div>
        <div class="embed-card">
          <iframe class="news-frame" src="https://www.powr.io/facebook-feed/u/ecc1cfa5_1606002714#platform=iframe"
            title="Nieuws van Bakkerij Muylaert op Facebook" loading="lazy"></iframe>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="wrap">
        <div class="section-head" data-reveal>
          <span class="eyebrow">Reviews</span>
          <h2>Wat onze klanten zeggen</h2>
        </div>
        <script src="https://widget.trustmary.com/vcqp9Jayb"></script>
      </div>
    </section>
