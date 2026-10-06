<?php if (!defined('APP')) { http_response_code(404); exit; } ?>
    <section class="page-hero">
      <div class="wrap">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li aria-current="page">Kerstfolder</li>
        </ol>
        <h1>Kerstfolder</h1>
        <p>Kerstspecialiteiten voor de feestdagen.</p>
      </div>
    </section>

    <section class="section">
      <div class="wrap">
        <div class="notice">
          <span class="notice__icon"><i class="fas fa-bullhorn" aria-hidden="true"></i></span>
          <div>
            <h2>Tijdens de feestdagen zijn er geen andere taarten mogelijk</h2>
            <p>Ook American cake's zijn dan niet te verkrijgen. Na de feestdagen kunnen wij terug aan jullie wensen
              voldoen.</p>
          </div>
          <a class="btn" href="<?= e($kerstfolder) ?>" download="Kerstfolder-bakkerij-muylaert"><i class="fas fa-download" aria-hidden="true"></i>Download onze kerstfolder</a>
        </div>
      </div>
    </section>

    <section class="section section--marble" style="padding-top:clamp(32px,5vw,56px)">
      <div class="wrap">
        <div class="embed-card">
          <iframe class="pdf-frame" src="<?= e($kerstfolder) ?>" title="Kerstfolder Bakkerij Muylaert"></iframe>
        </div>
      </div>
    </section>
