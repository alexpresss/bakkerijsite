<?php
if (!defined('APP')) { http_response_code(404); exit; }

/** Escape tekst voor gebruik in HTML. */
function e($value)
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

/** Pad naar een css/js-bestand met versienummer, zodat browsers na een wijziging de nieuwe versie laden. */
function asset($path)
{
    $file = dirname(__DIR__) . $path;
    return $path . (is_file($file) ? '?v=' . filemtime($file) : '');
}

/** '08:00' wordt '8u00'. */
function hour_label($time)
{
    list($hour, $minutes) = explode(':', $time);
    return (int) $hour . 'u' . $minutes;
}

function hours_text(array $row)
{
    if ($row['open'] === null) {
        return 'Gesloten';
    }
    return hour_label($row['open']) . ' tot ' . hour_label($row['close']);
}

/** De lijst met openingsuren; js/site.js markeert de rij van vandaag via data-days. */
function render_hours(array $hours, $class = 'hours')
{
    echo '<dl class="' . e($class) . '">' . "\n";
    foreach ($hours as $row) {
        echo '          <div data-days="' . e(implode(' ', $row['days'])) . '"><dt>' . e($row['label'])
            . '</dt><dd>' . e(hours_text($row)) . '</dd></div>' . "\n";
    }
    echo '        </dl>' . "\n";
}

/** Gestructureerde gegevens (schema.org) zodat Google adres en openingsuren kent. */
function bakery_json_ld(array $config)
{
    $dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $openingHours = [];
    foreach ($config['hours'] as $row) {
        if ($row['open'] === null) {
            continue;
        }
        $days = [];
        foreach ($row['days'] as $day) {
            $days[] = $dayNames[$day];
        }
        $openingHours[] = [
            '@type'     => 'OpeningHoursSpecification',
            'dayOfWeek' => $days,
            'opens'     => $row['open'],
            'closes'    => $row['close'],
        ];
    }

    $sameAs = [];
    foreach ($config['social'] as $social) {
        $sameAs[] = $social['url'];
    }

    $data = [
        '@context'  => 'https://schema.org',
        '@type'     => 'Bakery',
        'name'      => $config['name'],
        'url'       => $config['url'] . '/',
        'image'     => $config['url'] . '/images/slider/banner.jpg',
        'telephone' => $config['phone_link'],
        'email'     => $config['email'],
        'vatID'     => str_replace(' ', '', $config['vat']),
        'address'   => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => $config['street'],
            'postalCode'      => $config['postal'],
            'addressLocality' => $config['city'],
            'addressCountry'  => 'BE',
        ],
        'openingHoursSpecification' => $openingHours,
        'sameAs'    => $sameAs,
    ];

    // JSON_HEX_TAG voorkomt dat een "</script>" in de gegevens het script-blok afsluit
    return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG);
}

/** Sorteer producten op naam, zonder onderscheid tussen hoofdletters of accenten. */
function sort_by_name(array $items)
{
    $collator = class_exists('Collator') ? new Collator('nl_BE') : null;
    usort($items, function ($a, $b) use ($collator) {
        return $collator
            ? $collator->compare($a['naam'], $b['naam'])
            : strcasecmp($a['naam'], $b['naam']);
    });
    return $items;
}
