<?php if (!defined('APP')) { http_response_code(404); exit; } ?>
<!DOCTYPE html>
<html lang="nl-BE">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= e($page['title']) ?></title>
  <meta name="description" content="<?= e($page['description']) ?>">
<?php if ($slug !== null): ?>
  <link rel="canonical" href="<?= e($config['url'] . '/' . $slug) ?>">
<?php else: ?>
  <meta name="robots" content="noindex">
<?php endif; ?>
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?= e($config['name']) ?>">
  <meta property="og:title" content="<?= e($page['title']) ?>">
  <meta property="og:description" content="<?= e($page['description']) ?>">
  <meta property="og:image" content="<?= e($config['url']) ?>/images/slider/banner.jpg">
  <meta property="og:locale" content="nl_BE">
  <!--Favicon-->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#333333">
  <!-- Styles -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="<?= e(asset('/css/site.css')) ?>">
  <script>document.documentElement.classList.add('js');</script>
  <script src="https://cdn.websitepolicies.io/lib/cookieconsent/cookieconsent.min.js" defer></script><script>window.addEventListener("load",function(){window.wpcc.init({"border":"thin","corners":"large","colors":{"popup":{"background":"#333333","text":"#ffffff","border":"#555555"},"button":{"background":"#de236d","text":"#ffffff"}},"position":"bottom","content":{"href":"/policy","message":"🍪 Onze website gebruikt cookies &amp; Matomo om het verkeer te analyseren en ons te helpen uw gebruikerservaring te verbeteren.\n\nWij verwerken uw e-mailadres en IP-adres en cookies worden 13 maanden in uw browser opgeslagen. Deze gegevens worden alleen door ons en ons webhostingplatform verwerkt.","button":"Ik heb het begrepen!","link":"Lees meer"}})});</script>
  <!-- Matomo -->
  <script>
    var _paq = window._paq = window._paq || [];
    /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
      var u="//matomo.vaultathome.be/";
      _paq.push(['setTrackerUrl', u+'matomo.php']);
      _paq.push(['setSiteId', '1']);
      var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
      g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
    })();
  </script>
  <!-- End Matomo Code -->
<?php if ($page['file'] === 'home'): ?>
  <script type="application/ld+json"><?= bakery_json_ld($config) ?></script>
<?php endif; ?>
</head>

<body id="top">
  <a class="skip-link" href="#main">Naar de inhoud</a>

  <header class="site-header">
    <div class="wrap site-header__inner">
      <a class="brand" href="/" aria-label="<?= e($config['name']) ?>, naar de startpagina">
        <img src="/images/logo.png" alt="<?= e($config['name']) ?>" width="420" height="160">
      </a>
      <button type="button" class="nav-toggle" aria-expanded="false" aria-controls="site-nav">
        <span class="sr-only">Menu</span>
        <span></span><span></span><span></span>
      </button>
      <nav id="site-nav" class="site-nav" aria-label="Hoofdnavigatie">
<?php foreach ($config['pages'] as $navSlug => $navPage): ?>
<?php if (empty($navPage['nav']) || ($navSlug === 'eindejaar' && !$config['show_kerstfolder'])) { continue; } ?>
        <a href="/<?= e($navSlug) ?>"<?= $navSlug === $slug ? ' aria-current="page"' : '' ?>><?= e($navPage['nav']) ?></a>
<?php endforeach; ?>
        <a class="nav-cta" href="tel:<?= e($config['phone_link']) ?>"><i class="fas fa-phone" aria-hidden="true"></i><?= e($config['phone_nav']) ?></a>
      </nav>
    </div>
  </header>

  <main id="main">
