<?php if (!defined('APP')) { http_response_code(404); exit; }

// De producten zelf staan in js/assortiment.json; de sleutels daar zijn de categorieën hieronder.
$categories = [
    'brood'   => 'Brood',
    'koeken'  => 'Koeken',
    'taarten' => 'Taart',
    'gebak'   => 'Gebak',
    'seizoen' => 'Seizoensartikelen',
    'special' => "American cake's & fototaarten",
];

$json = @file_get_contents(dirname(__DIR__) . '/js/assortiment.json');
$assortiment = $json !== false ? json_decode($json, true) : null;
if (!is_array($assortiment)) {
    $assortiment = [];
}

$total = 0;
foreach ($assortiment as $items) {
    $total += count($items);
}
?>
    <section class="page-hero">
      <div class="wrap">
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>
          <li aria-current="page">Assortiment</li>
        </ol>
        <h1>Ons assortiment</h1>
        <p>Van ambachtelijk brood en ovenverse koeken tot taarten, gebak en American cake's.</p>
      </div>
    </section>

    <div class="toolbar">
      <div class="wrap toolbar__inner">
        <div class="filters" role="group" aria-label="Filter op categorie">
          <button type="button" class="filter" data-filter="alles" aria-pressed="true">Alles</button>
<?php foreach ($categories as $key => $label): ?>
          <button type="button" class="filter" data-filter="<?= e($key) ?>" aria-pressed="false"><?= e($label) ?></button>
<?php endforeach; ?>
        </div>
        <div class="search">
          <i class="fas fa-search" aria-hidden="true"></i>
          <label class="sr-only" for="zoek">Zoek in het assortiment</label>
          <input type="search" id="zoek" placeholder="Zoek een product…" autocomplete="off">
        </div>
      </div>
    </div>

    <section class="section" style="padding-top:32px">
      <div class="wrap">
<?php if ($total === 0): ?>
        <p class="empty">Het assortiment kon niet geladen worden. Probeer het later opnieuw.</p>
<?php else: ?>
        <p class="result-count" aria-live="polite"><?= $total ?> producten</p>
        <ul class="products">
<?php foreach ($assortiment as $category => $items): ?>
<?php foreach (sort_by_name($items) as $item): ?>
<?php $foto = rawurlencode($item['foto']); ?>
          <li class="product" data-category="<?= e($category) ?>">
            <button type="button" class="product__media" data-full="/images/assortiment/full/<?= e($foto) ?>" aria-label="Vergroot foto van <?= e($item['naam']) ?>">
              <img src="/images/assortiment/min/<?= e($foto) ?>" alt="<?= e($item['naam']) ?>" width="520" height="520" loading="lazy" decoding="async">
            </button>
            <div class="product__body">
              <span class="product__cat"><?= e(isset($categories[$category]) ? $categories[$category] : $category) ?></span>
              <h3><?= e($item['naam']) ?></h3>
<?php if (!empty($item['text'])): ?>
              <p><?= e($item['text']) ?></p>
<?php endif; ?>
            </div>
          </li>
<?php endforeach; ?>
<?php endforeach; ?>
        </ul>
        <p class="empty" hidden>Geen producten gevonden. Probeer een andere zoekterm of categorie.</p>
<?php endif; ?>
      </div>
    </section>
