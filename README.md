# bakkerijsite

Website van Bakkerij Muylaert. PHP zonder framework of database.

## Structuur

| Pad | Inhoud |
|---|---|
| `index.php` | Router: zoekt de pagina bij de URL op en zet er header en footer rond |
| `includes/config.php` | Contactgegevens, openingsuren, menu en paginatitels |
| `includes/header.php`, `includes/footer.php` | Gedeelde header en footer |
| `pages/` | De inhoud van elke pagina |
| `js/assortiment.json` | De producten op de assortimentpagina |
| `css/site.css`, `js/site.js` | Opmaak en gedrag |

## Veelvoorkomende aanpassingen

- **Openingsuren, telefoon, adres:** `includes/config.php`. De wijziging komt automatisch in de footer, op de contactpagina en in de gegevens voor Google.
- **Kerstfolder in het menu:** zet `show_kerstfolder` op `true` in `includes/config.php` en pas `kerstfolder_pdf` aan naar de nieuwe pdf in `assets/`.
- **Product toevoegen:** voeg het toe in `js/assortiment.json` en zet de foto met dezelfde bestandsnaam in `images/assortiment/min` (klein) en `images/assortiment/full` (groot).
- **Nieuwe pagina:** maak `pages/naam.php` en voeg ze toe onder `pages` in `includes/config.php`.

## Hosting

De site heeft PHP 7.4 of nieuwer nodig en een webserver die onbekende URL's naar `index.php` stuurt. In nginx:

```nginx
location / {
    try_files $uri $uri/ /index.php?$args;
}
```

Zo werken de URL's zonder extensie (`/assortiment`, `/contact`). Oude adressen zoals `/contact.html` en `/contact/` worden doorgestuurd.
