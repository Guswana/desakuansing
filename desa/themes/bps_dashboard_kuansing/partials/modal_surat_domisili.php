<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $modal_surat_domisili = [
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
?>

<div
  id="<?= $modal_surat_domisili['id'] ?>"
  class="dashboard-modal-backdrop"
  role="presentation"
  aria-hidden="true"
  hidden
  style="display:none;"
  onclick="if (event.target === this) dashboardCloseModal('<?= $modal_surat_domisili['id'] ?>')">
  <div class="dashboard-modal-panel" role="dialog" aria-modal="true" aria-labelledby="surat-domisili-modal-title" onclick="event.stopPropagation()">
    <button type="button" class="dashboard-modal-close" onclick="dashboardCloseModal('<?= $modal_surat_domisili['id'] ?>')" aria-label="Tutup modal">
      <i class="fas fa-times"></i>
    </button>

    <div class="dashboard-modal-header">
      <p class="dashboard-modal-kicker">Layanan Surat</p>
      <h3 id="surat-domisili-modal-title" class="dashboard-modal-title"><?= $modal_surat_domisili['judul'] ?></h3>
      <p class="dashboard-modal-description"><?= $modal_surat_domisili['ringkasan'] ?></p>
    </div>

    <div class="dashboard-modal-body">
      <div class="dashboard-modal-section">
        <h4>Persyaratan</h4>
        <ol class="dashboard-modal-list">
          <?php foreach ($modal_surat_domisili['persyaratan'] as $syarat) : ?>
            <li><?= $syarat ?></li>
          <?php endforeach ?>
        </ol>
      </div>

      <div class="dashboard-modal-section dashboard-modal-section--note">
        <h4>Catatan</h4>
        <p><?= $modal_surat_domisili['catatan'] ?></p>
      </div>

      <div class="dashboard-modal-actions">
        <button type="button" class="dashboard-modal-button" onclick="dashboardCloseModal('<?= $modal_surat_domisili['id'] ?>')">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  (function () {
    var modalId = '<?= $modal_surat_domisili['id'] ?>';
    var modal = document.getElementById(modalId);

    if (!modal) {
      return;
    }

    if (!window.dashboardOpenModal) {
      window.dashboardOpenModal = function (event, id) {
        if (event) {
          event.preventDefault();
        }

        var target = document.getElementById(id);
        if (!target) {
          return;
        }

        target.hidden = false;
        target.style.display = 'flex';
        target.classList.add('is-open');
        target.setAttribute('aria-hidden', 'false');
        document.body.classList.add('dashboard-modal-is-open');
      };
    }

    if (!window.dashboardCloseModal) {
      window.dashboardCloseModal = function (id) {
        var target = document.getElementById(id);
        if (!target) {
          return;
        }

        target.hidden = true;
        target.style.display = 'none';
        target.classList.remove('is-open');
        target.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('dashboard-modal-is-open');
      };
    }

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && modal && modal.classList.contains('is-open')) {
        window.dashboardCloseModal(modalId);
      }
    });

    window.dashboardCloseModal(modalId);
  })();
</script>
