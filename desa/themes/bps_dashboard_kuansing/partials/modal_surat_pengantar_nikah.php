<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-pengantar-nikah-modal',
    'judul' => 'Surat Pengantar Nikah',
    'ringkasan' => 'Surat ini dipakai untuk pengantar administrasi pernikahan.',
    'persyaratan' => [
      'KK dan KTP Kedua Pihak yang Menikah',
      'Surat Pengantar dari Ninik Mamak Suku Masing-masing Pihak yang menikah',
      'Nomor yang bisa di hubungi',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
