<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-nikah-belum-tercatat-modal',
    'judul' => 'Surat Pernyataan Nikah Kawin Belum Tercatat',
    'ringkasan' => 'Surat ini dipakai untuk menerangkan perkawinan yang belum tercatat secara administratif.',
    'persyaratan' => [
      'KK dan KTP Kedua Pihak yang Menikah',
      'Surat Nikah dari Penghulu',
      'Nomor yang bisa di hubungi',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
