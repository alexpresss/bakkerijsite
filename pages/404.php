<?php if (!defined('APP')) { http_response_code(404); exit; } ?>
    <section class="section">
      <div class="wrap error-page">
        <img src="/images/404.jpg" alt="" width="772" height="772">
        <div>
          <div class="error-page__code">404</div>
          <h1>Oeps!</h1>
          <p>Het lijkt erop dat de pagina die je wil bereiken niet bestaat...</p>
          <div class="error-page__actions">
            <a class="btn" href="/">Naar de startpagina</a>
            <button type="button" class="btn btn--outline" onclick="history.back()">Ga terug</button>
          </div>
        </div>
      </div>
    </section>
