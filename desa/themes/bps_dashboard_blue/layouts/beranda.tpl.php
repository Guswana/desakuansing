<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php
  $title = (!empty($judul_kategori))? $judul_kategori: 'Artikel Terkini';
  $slug = 'terkini';
  if(is_array($title)){
    $slug = $title['slug'];
    $title = $title['kategori'];
  }

  $jumlah_artikel = isset($artikel) && is_array($artikel) ? count($artikel) : 0;
  $jumlah_slider = isset($slider_gambar['gambar']) && is_array($slider_gambar['gambar']) ? count($slider_gambar['gambar']) : 0;
  $jumlah_widget = isset($w_cos) && is_array($w_cos) ? count($w_cos) : 0;

  $show_highlight = empty($cari)
    && isset($slider_gambar['gambar'])
    && is_array($slider_gambar['gambar'])
    && count($slider_gambar['gambar']) > 0
    && $this->uri->segment(2) != 'kategori'
    && ($this->uri->segment(2) !== 'index' && $this->uri->segment(1) !== 'index');

  $dashboard_menu = menu_tema() ?: [];
  $rename_shortcut = static function ($label) {
    $label = trim(strip_tags((string) $label));
    $normalized = strtolower($label);

    if ($normalized === 'pembangunan' || $normalized === 'pembangunan desa') {
      return 'Bangun Desa';
    }

    return $label;
  };
  $shortcut_icons = ['fa-id-card', 'fa-users', 'fa-chart-pie', 'fa-camera', 'fa-hammer', 'fa-store', 'fa-map-marked-alt', 'fa-folder-open', 'fa-bullhorn'];
  $shortcut_items = [];

  foreach ($dashboard_menu as $menu_item) {
    if (count($shortcut_items) >= 9) {
      break;
    }

    if (!empty($menu_item['link_url']) && $menu_item['link_url'] !== '#!') {
      $shortcut_items[] = [
        'nama' => $rename_shortcut($menu_item['nama']),
        'link' => $menu_item['link_url'],
      ];
    }
  }

  if (count($shortcut_items) < 9) {
    $fallback_shortcuts = [
      ['nama' => 'Identitas Desa', 'link' => site_url('first')],
      ['nama' => 'Aparatur Desa', 'link' => site_url('pemerintah-desa')],
      ['nama' => 'Statistik', 'link' => site_url('statistik')],
      ['nama' => 'Galeri', 'link' => site_url('first/gallery')],
      ['nama' => 'Bangun Desa', 'link' => site_url('pembangunan')],
      ['nama' => 'Lapak Desa', 'link' => site_url('lapak')],
      ['nama' => 'Peta Desa', 'link' => site_url('peta')],
      ['nama' => 'Arsip', 'link' => site_url('arsip')],
      ['nama' => 'Pengaduan', 'link' => site_url('pengaduan')],
    ];

    foreach ($fallback_shortcuts as $shortcut) {
      if (count($shortcut_items) >= 9) {
        break;
      }

      $shortcut_items[] = $shortcut;
    }
  }

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
?>
<div class="container mx-auto lg:px-4 px-3 my-5 dashboard-content-wrap text-gray-700">
  <div class="dashboard-main-grid">
    <aside class="dashboard-left-column">
      <section class="dashboard-left-brand" style="background-image: url(<?= $latar_website ?>);">
        <div class="dashboard-left-brand-overlay"></div>
        <div class="dashboard-left-brand-content">
          <img src="<?= gambar_desa($desa['logo']) ?>" alt="Logo <?= NAMA_DESA ?>" class="dashboard-left-logo">
          <h4 class="dashboard-left-title"><?= NAMA_DESA ?></h4>
          <p class="dashboard-left-subtitle"><?= $alamat_lengkap ?: ucfirst($this->setting->sebutan_kecamatan_singkat) . ' ' . ucwords($desa['nama_kecamatan']) ?></p>
        </div>
      </section>

      <section class="dashboard-shortcut-grid-wrap">
        <div class="dashboard-shortcut-grid">
          <?php foreach($shortcut_items as $index => $shortcut): ?>
            <?php $icon = $shortcut_icons[$index % count($shortcut_icons)] ?>
            <a href="<?= $shortcut['link'] ?>" class="dashboard-shortcut-item" title="<?= $shortcut['nama'] ?>">
              <i class="fas <?= $icon ?>"></i>
              <span><?= $shortcut['nama'] ?></span>
            </a>
          <?php endforeach ?>
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
            <a href="<?= $menu_link ?>" class="dashboard-accordion-link">
              <span><?= strip_tags($menu['nama']) ?></span>
              <i class="fas fa-chevron-right text-xs"></i>
            </a>
          <?php endif ?>
        <?php endforeach ?>
      </section>
    </aside>

    <main class="dashboard-center-column">
      <section class="dashboard-stat-grid">
        <article class="dashboard-stat-card">
          <span class="dashboard-stat-label">Artikel Ditampilkan</span>
          <strong class="dashboard-stat-value"><?= number_format($jumlah_artikel, 0, ',', '.') ?></strong>
          <span class="dashboard-stat-desc">Publikasi terbaru pada halaman aktif</span>
        </article>
        <article class="dashboard-stat-card">
          <span class="dashboard-stat-label">Slider Beranda</span>
          <strong class="dashboard-stat-value"><?= number_format($jumlah_slider, 0, ',', '.') ?></strong>
          <span class="dashboard-stat-desc">Visual utama untuk informasi prioritas</span>
        </article>
        <article class="dashboard-stat-card">
          <span class="dashboard-stat-label">Widget Aktif</span>
          <strong class="dashboard-stat-value"><?= number_format($jumlah_widget, 0, ',', '.') ?></strong>
          <span class="dashboard-stat-desc">Panel layanan dan data pendukung</span>
        </article>
      </section>

      <?php if($show_highlight) : ?>
        <section class="dashboard-highlight-grid">
          <div class="dashboard-highlight-slider">
            <?php $this->load->view($folder_themes .'/partials/slider') ?>
          </div>
          <div class="dashboard-highlight-headline">
            <?php $this->load->view($folder_themes .'/partials/headline') ?>
          </div>
        </section>
      <?php endif; ?>

      <div class="dashboard-section-head">
        <h3 class="text-h4 text-primary-200"><?= $title ?></h3>
        <a href="<?= site_url('arsip') ?>" class="text-sm dashboard-link">Indeks <i class="fas fa-chevron-right ml-1"></i></a>
      </div>

      <?php if($artikel) : ?>
        <div class="dashboard-article-list">
          <?php foreach($artikel as $post) : ?>
            <?php $data['post'] = $post ?>
            <?php $this->load->view($folder_themes .'/partials/article_list', $data) ?>
          <?php endforeach ?>
        </div>
        <?php $data['paging_page'] = ($paging_page && IS_PREMIUM && $this->uri->segment(2) === 'kategori') ? $paging_page : 'first/'.$paging_page ?>
        <div class="pagination space-y-1 flex-wrap w-full">
          <?php $this->load->view($folder_themes .'/commons/paging', $data) ?>
        </div>
      <?php else : ?>
        <?php $data['title'] = $title ?>
        <?php $this->load->view($folder_themes .'/partials/empty_article', $data) ?>
      <?php endif ?>
    </main>

    <aside class="dashboard-right-column dashboard-sidebar-panel">
      <?php $this->load->view($folder_themes .'/partials/sidebar') ?>
    </aside>
  </div>
</div>
