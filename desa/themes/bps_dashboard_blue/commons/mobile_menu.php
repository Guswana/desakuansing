<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<?php
  $menu_atas = menu_tema() ?: [];

  $render_mobile_menu = function(array $items, int $level = 0) use (&$render_mobile_menu) {
    if (empty($items)) {
      return;
    }

    $list_class = $level === 0
      ? 'dashboard-mobile-menu-list divide-y divide-primary-200'
      : 'dashboard-mobile-submenu divide-y divide-primary-200';
?>
    <ul<?= $level === 0 ? ' x-show="menuOpen" x-transition.opacity.duration.200ms' : ' x-show="open" x-transition.opacity.duration.200ms' ?> class="<?= $list_class ?>"<?= $level > 0 ? ' data-level="' . $level . '"' : '' ?>>
      <?php foreach ($items as $menu) : ?>
        <?php
          $children = $menu['childrens'] ?? [];
          $has_dropdown = is_array($children) && count($children) > 0;
          $menu_name = trim(strip_tags((string) ($menu['nama'] ?? '')));
          $menu_link = $menu['link_url'] ?? '#!';
          $padding_left = number_format(1 + ($level * 0.9), 2, '.', '');
        ?>
        <li class="dashboard-mobile-menu-item<?= $has_dropdown ? ' dashboard-mobile-menu-item--has-children' : '' ?>"<?= $has_dropdown ? ' x-data="{open: false}"' : '' ?>>
          <?php if ($has_dropdown) : ?>
            <button
              type="button"
              class="dashboard-mobile-menu-trigger"
              style="padding-left: <?= $padding_left ?>rem;"
              @click="open = !open"
              :aria-expanded="open.toString()">
              <span><?= $menu_name ?></span>
              <i class="fas fa-chevron-down dashboard-mobile-menu-icon" :class="{'rotate-180': open}"></i>
            </button>

            <?php $render_mobile_menu($children, $level + 1); ?>
          <?php else : ?>
            <a href="<?= $menu_link ?>" class="dashboard-mobile-menu-link" style="padding-left: <?= $padding_left ?>rem;"><?= $menu_name ?></a>
          <?php endif ?>
        </li>
      <?php endforeach ?>
    </ul>
<?php
  };
?>

<nav class="bg-primary-100 text-white lg:hidden block dashboard-mobile-nav" x-data="{menuOpen: false}" role="navigation">
  <div class="dashboard-mobile-topbar">
    <a href="<?= site_url() ?>" class="dashboard-mobile-home-link" title="Beranda"><i class="fa fa-home"></i></a>

    <?php $this->load->view($folder_themes . '/commons/header_clock', ['is_mobile_clock' => true]) ?>

    <div class="dashboard-mobile-action-wrap">
      <?php if($this->setting->layanan_mandiri == 1) : ?>
        <a href="<?= site_url('layanan-mandiri') ?>" class="dashboard-mobile-action-btn">Mandiri</a>
      <?php endif ?>
      <a href="<?= site_url('siteman') ?>" class="dashboard-mobile-action-btn">Admin</a>
    </div>

    <button type="button" class="dashboard-mobile-menu-toggle" @click="menuOpen = !menuOpen" :aria-expanded="menuOpen.toString()" aria-label="Toggle menu">
      <i class="fas" :class="{'fa-bars': !menuOpen, 'fa-times': menuOpen}"></i>
    </button>
  </div>

  <?php $render_mobile_menu($menu_atas); ?>
</nav>
