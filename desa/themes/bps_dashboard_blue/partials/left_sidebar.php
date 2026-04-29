<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $dashboard_menu = menu_tema() ?: [];
  $left_menu_groups = $dashboard_menu;
  if (!is_array($left_menu_groups) || count($left_menu_groups) === 0) {
    $left_menu_groups = [
      ['nama' => 'Profil Desa', 'link_url' => site_url('first'), 'childrens' => []],
      ['nama' => 'Pemerintahan Desa', 'link_url' => site_url('pemerintah-desa'), 'childrens' => []],
      ['nama' => 'Pembangunan Desa', 'link_url' => site_url('pembangunan'), 'childrens' => []],
      ['nama' => 'Publikasi', 'link_url' => site_url('arsip'), 'childrens' => []],
    ];
  }

  $alamat_parts = [];
  if (!empty($desa['alamat_kantor'])) {
    $alamat_parts[] = ucwords($desa['alamat_kantor']);
  }
  if (!empty($desa['nama_kecamatan'])) {
    $alamat_parts[] = ucfirst($this->setting->sebutan_kecamatan_singkat) . ' ' . ucwords($desa['nama_kecamatan']);
  }
  if (!empty($desa['nama_kabupaten'])) {
    $alamat_parts[] = ucfirst($this->setting->sebutan_kabupaten_singkat) . ' ' . ucwords($desa['nama_kabupaten']);
  }
  if (!empty($desa['nama_propinsi'])) {
    $alamat_parts[] = 'Provinsi ' . ucwords($desa['nama_propinsi']);
  }
  if (!empty($desa['kode_pos'])) {
    $alamat_parts[] = $desa['kode_pos'];
  }

  $alamat_lengkap = implode(', ', $alamat_parts);
  $brand_background = !empty($latar_website) ? $latar_website : gambar_desa($desa['logo']);
  $brand_background_position = 'center';

  $brand_background_overrides = [
    'desa/themes/bps_dashboard_blue/assets/images/brand-background.jpg',
  ];

  foreach ($brand_background_overrides as $brand_background_override) {
    if (is_file(FCPATH . $brand_background_override)) {
      $brand_background = base_url($brand_background_override);
      $brand_background_position = '28% center';
      break;
    }
  }
?>

<aside class="dashboard-left-column">
  <div class="dashboard-left-column-scroll">
    <section class="dashboard-left-brand" style="background-image: url(<?= html_escape($brand_background) ?>); background-position: <?= html_escape($brand_background_position) ?>;">
      <div class="dashboard-left-brand-overlay"></div>
      <div class="dashboard-left-brand-content">
        <img src="<?= gambar_desa($desa['logo']) ?>" alt="Logo <?= NAMA_DESA ?>" class="dashboard-left-logo">
        <h4 class="dashboard-left-title"><?= NAMA_DESA ?></h4>
        <p class="dashboard-left-subtitle"><?= $alamat_lengkap ?: ucfirst($this->setting->sebutan_kecamatan_singkat) . ' ' . ucwords($desa['nama_kecamatan']) ?></p>
      </div>
    </section>

    <section class="dashboard-left-accordion">
      <?php foreach($left_menu_groups as $index => $menu): ?>
        <?php $children = $menu['childrens'] ?? [] ?>
        <?php $has_children = count($children) > 0 ?>

        <?php if($has_children): ?>
          <div class="dashboard-accordion-item" x-data="{open: <?= $index === 0 ? 'true' : 'false' ?>}">
            <button type="button" class="dashboard-accordion-btn" @click="open = !open">
              <span><?= strip_tags($menu['nama']) ?></span>
              <i class="fas fa-chevron-down text-xs" :class="{'rotate-180': open}"></i>
            </button>
            <ul class="dashboard-accordion-list" x-show="open" x-transition>
              <?php foreach($children as $child): ?>
                <?php $child_link = $child['link_url'] ?? '#!' ?>
                <li><a href="<?= $child_link ?>"><?= strip_tags($child['nama']) ?></a></li>
                <?php if(!empty($child['childrens'])): ?>
                  <?php foreach($child['childrens'] as $subchild): ?>
                    <?php $subchild_link = $subchild['link_url'] ?? '#!' ?>
                    <li><a href="<?= $subchild_link ?>" class="dashboard-sub-link">- <?= strip_tags($subchild['nama']) ?></a></li>
                  <?php endforeach ?>
                <?php endif ?>
              <?php endforeach ?>
            </ul>
          </div>
        <?php else: ?>
          <?php $menu_link = $menu['link_url'] ?? '#!' ?>
          <?php $menu_name = trim(strip_tags((string) ($menu['nama'] ?? ''))) ?>
          <?php $menu_name_normalized = strtolower($menu_name) ?>
          <?php $hide_link_icon = in_array($menu_name_normalized, ['publikasi', 'lapak desa'], true) ?>
          <div class="dashboard-accordion-item dashboard-accordion-item--link">
            <a href="<?= $menu_link ?>" class="dashboard-accordion-link<?= $hide_link_icon ? ' dashboard-accordion-link--plain' : '' ?>">
              <span><?= $menu_name ?></span>
              <?php if(!$hide_link_icon): ?>
                <i class="fas fa-chevron-right text-xs"></i>
              <?php endif ?>
            </a>
          </div>
        <?php endif ?>
      <?php endforeach ?>
    </section>
  </div>
</aside>
