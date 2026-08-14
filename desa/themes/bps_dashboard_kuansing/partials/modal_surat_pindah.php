<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-pindah-modal',
    'judul' => 'Surat Permohonan Pindah',
    'ringkasan' => 'Surat ini dipakai untuk mengajukan kepindahan individu atau keluarga.',
    'persyaratan' => [
      'KK/KTP Individu/Keluarga yang akan Pindah',
      'Surat Pernyataan Permohonan Pindah',
      'Nomor yang bisa di hubungi',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
