<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $menu_atas = menu_tema() ?: []; ?>

<nav class="bg-primary-100 text-white hidden lg:block dashboard-topbar-nav" role="navigation">
  <div class="dashboard-topbar-inner">
    <ul class="dashboard-topbar-menu">
      <li class="dashboard-topbar-home-item">
        <a href="<?= site_url() ?>" class="dashboard-topbar-home-link" title="Beranda"><i class="fa fa-home"></i></a>
      </li>

      <?php foreach($menu_atas as $menu) : ?>
        <?php $has_dropdown = count($menu['childrens'] ?? []) > 0 ?>
        <li class="dashboard-topbar-menu-item relative" <?php $has_dropdown and print('x-data="{dropdown: false}"') ?>>
          <?php $menu_link = $has_dropdown ? '#!' : ($menu['link_url'] ?? '#!') ?>

          <a
            href="<?= $menu_link ?>"
            class="dashboard-topbar-link"
            @mouseover="dropdown = true"
            @mouseleave="dropdown = false"
            @click="dropdown = !dropdown"
            <?php $has_dropdown and print('aria-expanded="false" aria-haspopup="true"') ?>>
            <?= $menu['nama'] ?>
            <?php if($has_dropdown) : ?>
              <i class="fas fa-chevron-down text-xs ml-1 inline-block transition duration-300" :class="{'transform rotate-180': dropdown}"></i>
            <?php endif ?>
          </a>

          <?php if($has_dropdown) : ?>
            <ul
              class="dashboard-dropdown-menu absolute top-full bg-white text-gray-700 shadow-lg invisible transform transition duration-200 origin-top"
              :class="{'opacity-0 invisible z-[-10] scale-y-50': !dropdown, 'opacity-100 visible z-[9999] scale-y-100': dropdown}"
              x-transition
              @mouseover="dropdown = true"
              @mouseleave="dropdown = false">

              <?php foreach($menu['childrens'] as $childrens) : ?>
                <?php if($childrens['childrens']) : ?>
                  <li class="inline-block relative">
                    <a href="<?= $childrens['link_url'] ?>" class="block py-3 pl-5 pr-4 hover:bg-primary-200 hover:text-white">
                      <?= $childrens['nama'] ?>
                      <i class="fas fa-chevron-left text-xs ml-1 inline-block"></i>
                    </a>
                  </li>

                  <?php foreach($childrens['childrens'] as $bmenu) : ?>
                    <?php $bhas_dropdown = count($bmenu['childrens'] ?? []) > 0 ?>
                    <li class="inline-block relative" <?php $bhas_dropdown and print('x-data="{dropdown: false}"') ?>>
                      <?php $bmenu_link = $bhas_dropdown ? '#!' : ($bmenu['link_url'] ?? '#!') ?>
                      <a
                        href="<?= $bmenu_link ?>"
                        class="p-3 inline-block hover:bg-primary-200"
                        @mouseover="dropdown = true"
                        @mouseleave="dropdown = false"
                        @click="dropdown = !dropdown"
                        <?php $bhas_dropdown and print('aria-expanded="false" aria-haspopup="true"') ?>>
                        <?= $bmenu['nama'] ?>
                        <?php if($bhas_dropdown) : ?>
                          <i class="fas fa-chevron-down text-xs ml-1 inline-block transition duration-300" :class="{'transform rotate-180': dropdown}"></i>
                        <?php endif ?>
                      </a>

                      <?php if($bhas_dropdown) : ?>
                        <ul
                          class="dashboard-dropdown-menu absolute top-full bg-white text-gray-700 shadow-lg invisible transform transition duration-200 origin-top"
                          :class="{'opacity-0 invisible z-[-10] scale-y-50': !dropdown, 'opacity-100 visible z-[9999] scale-y-100': dropdown}"
                          x-transition
                          @mouseover="dropdown = true"
                          @mouseleave="dropdown = false">
                          <?php foreach($bmenu['childrens'] as $bchildrens) : ?>
                            <li><a href="<?= $bchildrens['link_url'] ?>" class="block py-3 pl-5 pr-4 hover:bg-primary-200 hover:text-white"><?= $bchildrens['nama'] ?></a></li>
                          <?php endforeach ?>
                        </ul>
                      <?php endif ?>
                    </li>
                  <?php endforeach ?>
                <?php else: ?>
                  <li><a href="<?= $childrens['link_url'] ?>" class="block py-3 pl-5 pr-4 hover:bg-primary-200 hover:text-white"><?= $childrens['nama'] ?></a></li>
                <?php endif ?>
              <?php endforeach ?>
            </ul>
          <?php endif ?>
        </li>
      <?php endforeach ?>
    </ul>

    <div class="dashboard-topbar-actions">
      <?php if($this->setting->layanan_mandiri == 1) : ?>
        <a href="<?= site_url('layanan-mandiri') ?>" class="dashboard-topbar-btn">Layanan Mandiri <i class="fas fa-external-link-alt ml-1"></i></a>
      <?php endif ?>
      <a href="<?= site_url('siteman') ?>" class="dashboard-topbar-btn">Login Admin <i class="fas fa-external-link-alt ml-1"></i></a>
    </div>
  </div>
</nav>
