
<?php $galerivideo = theme_config('galerivideo', ''); ?>
<?php $video1 = theme_config('video1', ''); ?>
<?php $video2 = theme_config('video2', ''); ?>
<?php $video3 = theme_config('video3', ''); ?>
<?php $video4 = theme_config('video4', ''); ?>
<?php $video5 = theme_config('video5', ''); ?>

<?php if (theme_config('galerivideo') == 'true'): ?>
<div class="col-default" style="margin-top:10px !important;">

<div class="widget-box bgwhite bordergrey">
	<div class="widget-head bggrad-color2 flexleft">
					<svg viewBox="0 0 24 24"><path d="M19 3H5C3.89 3 3 3.89 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.89 20.1 3 19 3M10 16V8L15 12" /></svg>
					<h1>Galeri Video</h1>
					</div>
    <div class="galerivideo">
		<div class="margin-minlr-5">
			<div class="bcarousel js-flickity" data-flickity='{ "autoPlay": true, "cellAlign": "left", "wrapAround": true }'>
				<?php if (theme_config('video1')) : ?>
				<div class="bcarousel-part">
					<div class="margin-lr-5">
						<div class="image-video" data-toggle="modal" data-target="#video1">
							<img src="https://img.youtube.com/vi/<?=$video1?>/mqdefault.jpg" alt="Video Desa 1">
							<div class="videoplay"></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
                <?php if (theme_config('video2')) : ?>
				<div class="bcarousel-part">
					<div class="margin-lr-5">
						<div class="image-video" data-toggle="modal" data-target="#video2">
							<img src="https://img.youtube.com/vi/<?=$video2?>/mqdefault.jpg" alt="Video Desa 2">
							<div class="videoplay"></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
               <?php if (theme_config('video3')) : ?>
				<div class="bcarousel-part">
					<div class="margin-lr-5">
						<div class="image-video" data-toggle="modal" data-target="#video3">
							<img src="https://img.youtube.com/vi/<?=$video3?>/mqdefault.jpg" alt="Video Desa 3">
							<div class="videoplay"></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
                <?php if (theme_config('video4')) : ?>
				<div class="bcarousel-part">
					<div class="margin-lr-5">
						<div class="image-video" data-toggle="modal" data-target="#video4">
							<img src="https://img.youtube.com/vi/<?=$video4?>/mqdefault.jpg" alt="Video Desa 4">
							<div class="videoplay"></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
               <?php if (theme_config('video5')) : ?>
				<div class="bcarousel-part">
					<div class="margin-lr-5">
						<div class="image-video" data-toggle="modal" data-target="#video5">
							<img src="https://img.youtube.com/vi/<?=$video5?>/mqdefault.jpg" alt="Video Desa 5">
							<div class="videoplay"></div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
           
    </div>
</div>
</div>


<div class="forvideo">
<div class="modal center fade bgmodalcolor1" id="video1" role="dialog" aria-labelledby="video1" aria-hidden="true">	
	<div class="modal-dialog" role="document">
		<div class="modal-absolute">
			<div class="modal-video-container">
				<iframe src="https://www.youtube.com/embed/<?=$video1?>?controls=1&mute=1&loop=1&playlist=<?=$video1?>" frameborder="0"></iframe>
			</div>
			<div class="flexcenter"><div class="videoclose flexcenter" data-dismiss="modal" aria-label="Close"><svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></div></div>
		</div>
	</div>
</div>
</div>
<div class="forvideo">
<div class="modal center fade bgmodalcolor1" id="video2" role="dialog" aria-labelledby="video2" aria-hidden="true">	
	<div class="modal-dialog" role="document">
		<div class="modal-absolute">
			<div class="modal-video-container">
				<iframe src="https://www.youtube.com/embed/<?=$video2?>?controls=1&mute=1&loop=1&playlist=<?=$video2?>" frameborder="0"></iframe>
			</div>
			<div class="flexcenter"><div class="videoclose flexcenter" data-dismiss="modal" aria-label="Close"><svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></div></div>
		</div>
	</div>
</div>
</div>
<div class="forvideo">
<div class="modal center fade bgmodalcolor1" id="video3" role="dialog" aria-labelledby="video3" aria-hidden="true">	
	<div class="modal-dialog" role="document">
		<div class="modal-absolute">
			<div class="modal-video-container">
				<iframe src="https://www.youtube.com/embed/<?=$video3?>?controls=1&mute=1&loop=1&playlist=<?=$video3?>" frameborder="0"></iframe>
			</div>
			<div class="flexcenter"><div class="videoclose flexcenter" data-dismiss="modal" aria-label="Close"><svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></div></div>
		</div>
	</div>
</div>
</div>
<div class="forvideo">
<div class="modal center fade bgmodalcolor1" id="video4" role="dialog" aria-labelledby="video4" aria-hidden="true">	
	<div class="modal-dialog" role="document">
		<div class="modal-absolute">
			<div class="modal-video-container">
				<iframe src="https://www.youtube.com/embed/<?=$video4?>?controls=1&mute=1&loop=1&playlist=<?=$video4?>" frameborder="0"></iframe>
			</div>
			<div class="flexcenter"><div class="videoclose flexcenter" data-dismiss="modal" aria-label="Close"><svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></div></div>
		</div>
	</div>
</div>
</div>
<div class="forvideo">
<div class="modal center fade bgmodalcolor1" id="video5" role="dialog" aria-labelledby="video5" aria-hidden="true">	
	<div class="modal-dialog" role="document">
		<div class="modal-absolute">
			<div class="modal-video-container">
				<iframe src="https://www.youtube.com/embed/<?=$video5?>?controls=1&mute=1&loop=1&playlist=<?=$video5?>" frameborder="0"></iframe>
			</div>
			<div class="flexcenter"><div class="videoclose flexcenter" data-dismiss="modal" aria-label="Close"><svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></div></div>
		</div>
	</div>
</div>
</div>
<?php endif; ?>