<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container md:px-4 lg:px-4 sticky top-0 z-50 bg-primary-100/95 backdrop-blur-sm">
  <?php $this->load->view($folder_themes .'/commons/main_menu') ?>
  <?php $this->load->view($folder_themes .'/commons/mobile_menu') ?>
</div>
