<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-domisili-modal',
    'judul' => 'Surat Pernyataan Domisili',
    'ringkasan' => 'Surat ini dipakai untuk menerangkan daftar penduduk yang tinggal di wilayah desa.',
    'persyaratan' => [
      'Fotokopi Kartu Keluarga',
      'Fotokopi KTP pemohon',
      'Fotokopi surat kematian atau akta kematian',
      'Fotokopi buku nikah atau surat perkawinan jika ada',
      'Dokumen pendukung kepemilikan harta jika diperlukan',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
