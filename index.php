<?php
// Alle pagina's lopen via dit bestand: het zoekt de pagina bij de URL op
// (bv. /assortiment) en zet er de gedeelde header en footer rond.
define('APP', true);

$config = require __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/functions.php';

$path = parse_url(isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/', PHP_URL_PATH);
$path = is_string($path) ? rawurldecode($path) : '/';
$slug = trim($path, '/');

// Oude of alternatieve schrijfwijzen (/contact/, /contact.html, /index.php) doorsturen naar de nette URL
$clean = preg_replace('~\.(html|php)$~', '', $slug);
if ($clean === 'index') {
    $clean = '';
}
$hasTrailingSlash = $slug !== '' && substr($path, -1) === '/';
if (($clean !== $slug || $hasTrailingSlash) && isset($config['pages'][$clean])) {
    $query = isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
    header('Location: /' . $clean . ($query !== '' ? '?' . $query : ''), true, 301);
    exit;
}

// Buiten de kerstperiode (of zonder pdf van dit jaar) bestaat de kerstfolderpagina niet
$kerstfolder = kerstfolder_pdf($config['kerstfolder']);

if (isset($config['pages'][$slug]) && ($slug !== 'eindejaar' || $kerstfolder !== null)) {
    $page = $config['pages'][$slug];
} else {
    http_response_code(404);
    $page = $config['not_found'];
    $slug = null;
}

require __DIR__ . '/includes/header.php';
require __DIR__ . '/pages/' . $page['file'] . '.php';
require __DIR__ . '/includes/footer.php';
