<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-kurang-mampu-modal',
    'judul' => 'Pernyataan Kurang Mampu',
    'ringkasan' => 'Surat ini dipakai untuk menerangkan kondisi ekonomi kurang mampu.',
    'persyaratan' => [
      'KK/KTP/Identitas Lain',
      'Surat Pernyataan Kurang Mampu',
      'Nomor yang bisa di hubungi',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
