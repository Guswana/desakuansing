<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<nav class="bg-primary-100 text-white lg:hidden block dashboard-mobile-nav" x-data="{menuOpen: false}" role="navigation">
  <div class="dashboard-mobile-topbar">
    <a href="<?= site_url() ?>" class="dashboard-mobile-home-link" title="Beranda"><i class="fa fa-home"></i></a>

    <div class="dashboard-mobile-action-wrap">
      <?php if($this->setting->layanan_mandiri == 1) : ?>
        <a href="<?= site_url('layanan-mandiri') ?>" class="dashboard-mobile-action-btn">Mandiri</a>
      <?php endif ?>
      <a href="<?= site_url('siteman') ?>" class="dashboard-mobile-action-btn">Admin</a>
    </div>

    <button type="button" class="dashboard-mobile-menu-toggle" @click="menuOpen = !menuOpen" aria-label="Toggle menu">
      <i class="fas" :class="{'fa-bars': !menuOpen, 'fa-times': menuOpen}"></i>
    </button>
  </div>

  <ul x-show="menuOpen" x-transition class="dashboard-mobile-menu-list divide-y divide-primary-200">
    <?php $menu_atas = menu_tema() ?>
    <?php if($menu_atas) : ?>
      <?php foreach($menu_atas as $menu) : ?>
        <?php $has_dropdown = count($menu['childrens'] ?? []) > 0 ?>
        <li class="block relative" <?php $has_dropdown && print 'x-data="{dropdown: false}"' ?>>
          <?php $menu_link = $has_dropdown ? '#!' : ($menu['link_url'] ?? '#!') ?>

          <a href="<?= $menu_link ?>" class="p-3 block hover:bg-secondary-100" @click="dropdown = !dropdown">
            <?= $menu['nama'] ?>
            <?php if($has_dropdown) : ?>
              <i class="fas fa-chevron-down text-xs ml-1 inline-block transition duration-300" :class="{'transform rotate-180': dropdown}"></i>
            <?php endif ?>
          </a>

          <?php if($has_dropdown) : ?>
            <ul
              class="divide-y divide-primary-200"
              :class="{'opacity-0 invisible z-[-10] scale-y-75 h-0': !dropdown, 'opacity-100 visible z-30 scale-y-100 h-auto': dropdown}"
              x-transition.opacity
              @click="dropdown = !dropdown">
              <?php foreach($menu['childrens'] as $childrens) : ?>
                <li @click="dropdown = false"><a href="<?= $childrens['link_url'] ?>" class="block py-3 pl-5 pr-4 hover:bg-primary-200 hover:text-white"><?= $childrens['nama'] ?></a></li>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
        </li>
      <?php endforeach ?>
    <?php endif ?>
  </ul>
</nav>
