<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-usaha-modal',
    'judul' => 'Pernyataan Usaha',
    'ringkasan' => 'Surat ini dipakai untuk menerangkan bahwa pemohon memiliki usaha.',
    'persyaratan' => [
      'KK/KTP/Identitas Lain',
      'Surat Pernyataan Mempunyai Usaha',
      'Nomor yang bisa di hubungi',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
