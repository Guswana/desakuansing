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

?>
<div class="container mx-auto lg:px-4 px-3 my-5 dashboard-content-wrap text-gray-700">
  <div class="dashboard-main-grid">
    <?php $this->load->view($folder_themes .'/partials/left_sidebar') ?>

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
        <?php $use_direct_paging = $paging_page === 'index' || ($paging_page && IS_PREMIUM && $this->uri->segment(2) === 'kategori') ?>
        <?php $data['paging_page'] = $use_direct_paging ? $paging_page : 'first/'.$paging_page ?>
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
