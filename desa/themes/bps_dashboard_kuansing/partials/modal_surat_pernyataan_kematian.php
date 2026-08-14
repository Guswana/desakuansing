<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-kematian-modal',
    'judul' => 'Pernyataan Kematian',
    'ringkasan' => 'Surat ini dipakai untuk melaporkan peristiwa kematian.',
    'persyaratan' => [
      'KK/KTP/Identitas Lain Individu yang meninggal',
      'KK/KTP/Identitas Lain Individu yang Melaporkan',
      'Surat Pernyataan Kematian',
      'Nomor yang bisa di hubungi',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
