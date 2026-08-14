<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-penguburan-modal',
    'judul' => 'Pernyataan Penguburan',
    'ringkasan' => 'Surat ini dipakai untuk melaporkan penguburan jenazah.',
    'persyaratan' => [
      'KK/KTP/Identitas Lain Individu yang di kubur',
      'KK/KTP/Identitas Lain Individu yang Melaporkan',
      'Surat Pernyataan Penguburan',
      'Nomor yang bisa di hubungi',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
