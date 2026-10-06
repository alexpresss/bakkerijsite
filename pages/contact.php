<?php if (!defined('APP')) { http_response_code(404); exit; } ?>
    <section class="page-hero">
      <div class="wrap">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li aria-current="page">Contact</li>
        </ol>
        <h1>Neem contact met ons op</h1>
        <p>Een vraag of opmerking? Wij helpen je graag verder.</p>
      </div>
    </section>

    <section class="section">
      <div class="wrap">
        <div class="notice" style="margin-bottom:clamp(24px,4vw,48px)">
          <span class="notice__icon"><i class="fas fa-bullhorn" aria-hidden="true"></i></span>
          <div>
            <h2>Opgelet! Wij aanvaarden geen bestellingen via e-mail!</h2>
            <p>U kan uw bestelling ter plaatse of telefonisch (<?= e($config['phone']) ?>) doorgeven.</p>
          </div>
          <a class="btn" href="tel:<?= e($config['phone_link']) ?>"><i class="fas fa-phone" aria-hidden="true"></i>Bel ons</a>
        </div>

        <div class="contact-grid">
          <div class="card">
            <h2>Bakkerij Muylaert</h2>
            <ul class="contact-list">
              <li><i class="fas fa-map-marker-alt" aria-hidden="true"></i><a href="<?= e($config['maps']) ?>" target="_blank" rel="noopener"><?= e($config['street']) ?><br><?= e($config['postal'] . ' ' . $config['city']) ?></a></li>
              <li><i class="fas fa-phone" aria-hidden="true"></i><a href="tel:<?= e($config['phone_link']) ?>"><?= e($config['phone']) ?></a></li>
              <li><i class="fas fa-envelope" aria-hidden="true"></i><a href="mailto:<?= e($config['email']) ?>"><?= e($config['email']) ?></a></li>
            </ul>
            <h2 style="font-size:18px;margin-bottom:12px">Openingsuren</h2>
            <?php render_hours($config['hours'], 'hours hours--light'); ?>
          </div>

          <div class="card">
            <h2>Stuur ons een bericht</h2>
            <form class="form" action="https://formspree.io/f/maqgkwrz" method="POST">
              <div class="field">
                <label for="name">Jouw naam</label>
                <input type="text" name="naam" id="name" autocomplete="name" minlength="2" required>
              </div>
              <div class="field">
                <label for="email">Jouw e-mail</label>
                <input type="email" name="email" id="email" autocomplete="email" required>
              </div>
              <div class="field field--full">
                <label for="subject">Onderwerp</label>
                <input type="text" name="onderwerp" id="subject" minlength="4" required>
              </div>
              <div class="field field--full">
                <label for="message">Bericht</label>
                <textarea name="message" id="message" rows="5" required></textarea>
              </div>
              <button type="submit" class="btn">Verzenden</button>
              <p class="form__note">Bestellingen via dit formulier of via e-mail worden niet aanvaard.</p>
            </form>
          </div>
        </div>
      </div>
    </section>

    <iframe class="map" title="Bakkerij Muylaert op Google Maps" loading="lazy" allowfullscreen
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.500158491077!2d4.01953331519993!3d50.8404217670703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3bb47c3a5f979%3A0x14d2069221d7e214!2sBakkerij+Muylaert!5e0!3m2!1snl!2sbe!4v1561565546815!5m2!1snl!2sbe"></iframe>
