<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat = [
    'id' => 'surat-ahli-waris-modal',
    'judul' => 'Surat Pernyataan Ahli Waris',
    'ringkasan' => 'Surat ini dipakai untuk menerangkan daftar ahli waris yang sah sebelum pengurusan administrasi lanjutan.',
    'persyaratan' => [
      'Fotokopi Kartu Keluarga almarhum/almarhumah',
      'Fotokopi KTP seluruh ahli waris',
      'Fotokopi surat kematian atau akta kematian',
      'Fotokopi buku nikah atau surat perkawinan jika ada',
      'Dokumen pendukung kepemilikan harta jika diperlukan',
    ],
    'catatan' => 'Silakan membawa berkas asli dan fotokopi saat datang ke kantor desa pada jam pelayanan kerja.',
  ];
  require __DIR__ . '/surat_modal_template.php';
