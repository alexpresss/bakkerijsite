<?php if (!defined('APP')) { http_response_code(404); exit; } ?>
  </main>

  <footer class="site-footer">
    <div class="wrap footer-grid">
      <div class="footer-brand">
        <img src="/images/logo.png" alt="<?= e($config['name']) ?>" width="420" height="160" loading="lazy">
        <p>Brood &amp; Gebak Muylaert<br>Peter &amp; Ilse</p>
        <ul class="social">
<?php foreach ($config['social'] as $social): ?>
          <li><a href="<?= e($social['url']) ?>" target="_blank" rel="noopener" aria-label="<?= e($social['label']) ?>"><i class="<?= e($social['icon']) ?>" aria-hidden="true"></i></a></li>
<?php endforeach; ?>
          <li><a href="<?= e($config['maps']) ?>" target="_blank" rel="noopener" aria-label="Google Maps"><i class="fas fa-map-marked-alt" aria-hidden="true"></i></a></li>
          <li><a href="mailto:<?= e($config['email']) ?>" aria-label="E-mail"><i class="fas fa-envelope" aria-hidden="true"></i></a></li>
        </ul>
      </div>

      <div>
        <h2 id="openingsuren">Openingsuren</h2>
        <?php render_hours($config['hours']); ?>
      </div>

      <div>
        <h2>Contact</h2>
        <ul class="footer-contact">
          <li><i class="fas fa-map-marker-alt" aria-hidden="true"></i><a href="<?= e($config['maps']) ?>" target="_blank" rel="noopener"><?= e($config['street'] . ', ' . $config['postal'] . ' ' . $config['city']) ?></a></li>
          <li><i class="fas fa-phone" aria-hidden="true"></i><a href="tel:<?= e($config['phone_link']) ?>"><?= e($config['phone']) ?></a></li>
          <li><i class="fas fa-envelope" aria-hidden="true"></i><a href="mailto:<?= e($config['email']) ?>"><?= e($config['email']) ?></a></li>
          <li><i class="fas fa-briefcase" aria-hidden="true"></i><span><?= e($config['vat']) ?></span></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="wrap">
        <p>&copy; <?= date('Y') ?> <?= e($config['name']) ?> &middot; <a href="/policy">Privacy</a></p>
        <p>Website door <a href="https://alexandermuylaert.be" target="_blank" rel="noopener">Alexander Muylaert</a> &amp;
          <a href="https://maximiliaanmuylaert.be" target="_blank" rel="noopener">Maximiliaan Muylaert</a></p>
      </div>
    </div>
  </footer>

  <a href="#top" class="to-top" aria-label="Terug naar boven"><i class="fas fa-chevron-up" aria-hidden="true"></i></a>

  <script src="<?= e(asset('/js/site.js')) ?>"></script>
<?php foreach ((isset($page['scripts']) ? $page['scripts'] : []) as $script): ?>
  <script src="<?= e(asset($script)) ?>"></script>
<?php endforeach; ?>
</body>

</html>
