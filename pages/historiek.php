<?php if (!defined('APP')) { http_response_code(404); exit; } ?>
    <section class="page-hero">
      <div class="wrap">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li aria-current="page">Historiek</li>
        </ol>
        <h1>Onze historiek</h1>
        <p>Een familiebakkerij in Ninove, al sinds 1970.</p>
      </div>
    </section>

    <section class="section">
      <div class="wrap wrap--narrow">
        <p class="lead" data-reveal>
          Bakkerij Muylaert werd opgericht in 1970 door onze ouders Jean-Paul Muylaert en Josée Vanderpoorten.
          Ze namen de bakkerij over van Clement en Irène Van den Meersche, waar Jean-Paul werkte als brood- en
          banketbakker.
        </p>

        <ol class="timeline">
          <li data-reveal>
            <span class="timeline__year">1970</span>
            <p>Jean-Paul Muylaert en Josée Vanderpoorten richten Bakkerij Muylaert op.</p>
          </li>
          <li data-reveal>
            <span class="timeline__year">1974</span>
            <p>De zaak werd grondig vernieuwd. Er werd hard gewerkt om al de producten op ambachtelijke wijze te
              fabriceren.</p>
          </li>
          <li data-reveal>
            <span class="timeline__year">1988</span>
            <p>De zaak groeide uit en zoon Peter kwam meewerken in de zaak. Na zijn middelbare school in het
              Sint-Aloysiuscollege te Ninove genoot hij van een opleiding aan Ter Groene Poorte in Brugge. Hij volgde
              ook ijsbereiding en chocolade- en marsepeinbewerking.</p>
          </li>
          <li data-reveal>
            <span class="timeline__year">1992</span>
            <p>De winkel en het atelier werden volledig vernieuwd en aangepast aan de HACCP-normen.</p>
          </li>
          <li data-reveal>
            <span class="timeline__year">1993</span>
            <p>Peter leert Ilse D'Haese kennen. Ilse voltooide haar opleiding als kleuterleidster aan de normaalschool
              KAHO Sint-Lieven te Gijzegem en in 1995 kwam ze het team versterken.</p>
          </li>
          <li data-reveal>
            <span class="timeline__year">1996</span>
            <p>Op 9 augustus 1996 treden ze in het huwelijksbootje. 9 maanden later, op 7 juni 1997, werd hun eerste
              zoontje geboren, Alexander. 2 jaar later, op 21 juni 1999, kwam Maximiliaan ter wereld.</p>
          </li>
          <li data-reveal>
            <span class="timeline__year">2007</span>
            <p>Na verschillende jaren ervaring beslisten Peter en Ilse om de zaak over te nemen.</p>
          </li>
          <li data-reveal>
            <span class="timeline__year">2013</span>
            <p>In augustus onderging de winkel een echte metamorfose. In 4 weken tijd werd de winkel gerenoveerd. Alles
              werd verwijderd: vloer, plafond, winkeltoog, broodrekken, koekenrek, ...</p>
          </li>
        </ol>
      </div>
    </section>

    <section class="section section--soft">
      <div class="wrap">
        <div class="section-head" data-reveal>
          <span class="eyebrow">Sfeerbeelden</span>
          <h2>Kijk je mee?</h2>
        </div>
        <div class="gallery" data-lightbox>
<?php for ($i = 1; $i <= 20; $i++): ?>
          <a href="/images/historiek/<?= $i ?>.jpg"><img src="/images/historiek/<?= $i ?>.jpg" alt="Sfeerbeeld <?= $i ?> van Bakkerij Muylaert" width="900" height="675" loading="lazy"></a>
<?php endfor; ?>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="wrap">
        <div class="section-head" data-reveal>
          <span class="eyebrow">Wie zijn wij</span>
          <h2>Ons team</h2>
        </div>
        <div class="team">
          <figure data-reveal>
            <img src="/images/services/Peter.jpg" alt="Peter Muylaert" width="426" height="426" loading="lazy">
            <figcaption><strong>Peter Muylaert</strong></figcaption>
          </figure>
          <figure data-reveal>
            <img src="/images/services/Ilse.jpg" alt="Ilse D'Haese" width="1536" height="1536" loading="lazy">
            <figcaption><strong>Ilse D'Haese</strong></figcaption>
          </figure>
        </div>
      </div>
    </section>
