<?php  if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php $linkplus = theme_config('linkplus', ''); ?>
<?php if (theme_config('linkplus') == 'true'): ?>
<div class="col-default">
	<div class="widget-head bggrad-color2 flexleft" style="border-radius:5px 5px 0 0;">
		<svg viewBox="0 0 24 24"><path d="M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M4,4H11A2,2 0 0,1 13,6V9H11V6H4V11H6V9L9,12L6,15V13H4A2,2 0 0,1 2,11V6A2,2 0 0,1 4,4M20,20H13A2,2 0 0,1 11,18V15H13V18H20V13H18V15L15,12L18,9V11H20A2,2 0 0,1 22,13V18A2,2 0 0,1 20,20Z" /></svg>
		<h1>Link</h1>
	</div>
	<div class="link-custom bgwhite bordergrey1">
		<div class="rowsame margin-minlr-5">
			<!-- Start -->
			<div class="link-col">
				<a href="#" target="blank">
					<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/linplus/opensid.png") ?>"/>
					<div class="flexcenter">
						<p>Judul Link 1</p>
					</div>	
				</a>
			<!-- End -->	
			</div>
			<div class="link-col">
				<a href="#" target="blank">
					<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/linplus/opensid.png") ?>"/>
					<div class="flexcenter">
						<p>Judul Link 3</p>
					</div>	
				</a>
			<!-- End -->	
			</div>
			<div class="link-col">
				<a href="#" target="blank">
					<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/linplus/opensid.png") ?>"/>
					<div class="flexcenter">
						<p>Judul Link 1</p>
					</div>	
				</a>
			<!-- End -->	
			</div>
			<div class="link-col">
				<a href="#" target="blank">
					<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/linplus/opensid.png") ?>"/>
					<div class="flexcenter">
						<p>Judul Link 4</p>
					</div>	
				</a>
			<!-- End -->	
			</div>
			<div class="link-col">
				<a href="#" target="blank">
					<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/linplus/opensid.png") ?>"/>
					<div class="flexcenter">
						<p>Judul Link 5</p>
					</div>	
				</a>
			<!-- End -->	
			</div>
			<div class="link-col">
				<a href="#" target="blank">
					<img src="<?= base_url("$this->theme_folder/$this->theme/assets/images/linplus/opensid.png") ?>"/>
					<div class="flexcenter">
						<p>Judul Link 6</p>
					</div>	
				</a>
			<!-- End -->	
			</div>
		</div>	
	</div>
</div>
<?php endif ?>