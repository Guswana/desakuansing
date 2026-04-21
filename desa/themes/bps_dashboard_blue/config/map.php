<?php defined('BASEPATH') OR exit('No direct script access allowed');

return [
    // Ambil dari environment variable MAPBOX_PUBLIC_TOKEN.
    // Jangan isi token langsung di file ini agar aman dari commit.
    'mapbox_key' => trim((string) (getenv('MAPBOX_PUBLIC_TOKEN') ?: ($_ENV['MAPBOX_PUBLIC_TOKEN'] ?? ''))),

    // Halaman referensi atribusi Mapbox
    'mapbox_about_url' => 'https://www.mapbox.com/about/maps',
];
