<?php if(!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<style type="text/css">
.grapsvg-dot {position:absolute;left:7%;top:0;width:50vh;height:50vh;z-index:7;overflow:hidden;opacity:0.3;background:url(<?= base_url("$this->theme_folder/$this->theme/assets/images/svgfile/svg-dot.svg") ?>) center top;background-size:100% auto;background-repeat:no-repeat;}
</style>
<?php $templateslide = theme_config('templateslide', ''); ?>
<?php $slidetitle1 = theme_config('slidetitle1', ''); ?>
<?php $slidetitle2 = theme_config('slidetitle2', ''); ?>
<?php $slidetitle3 = theme_config('slidetitle3', ''); ?>
	
	<?php if (theme_config('templateslide') == 'true'): ?>
		<div class="desktop-only" style="padding:10px 10px 0;">
		<div class="templateslide">
			<div class="slidecustom">
				<div style="min-height:0px;" class="bcarousel js-flickity" data-flickity='{ "autoPlay": true, "cellAlign": "left", "fade": "true" }'>
						<?php foreach($slider_gambar['gambar'] as $data) : ?>
							<?php $img = $slider_gambar['lokasi'] . 'sedang_' . $data['gambar']; ?>
							<?php if(is_file($img)) : ?>
								<div class="bcarousel-part">
									<div class="image-slidecustom"><img src="<?= base_url($img) ?>"></div>
								</div>
							<?php endif ?>
						<?php endforeach ?>
				</div>
			</div>
			<div class="grapsvg0">
				<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1181.000000pt" height="458.000000pt" viewBox="0 0 1181.000000 458.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,458.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M0 4425 l0 -155 5905 0 5905 0 0 155 0 155 -5905 0 -5905 0 0 -155z"/><path d="M0 155 l0 -155 5905 0 5905 0 0 155 0 155 -5905 0 -5905 0 0 -155z"/></g></svg>
			</div>
			<div class="grapsvg-dot"></div>
			<div class="grapsvg1">
				<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1181.000000pt" height="458.000000pt" viewBox="0 0 1181.000000 458.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,458.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M0 2290 l0 -2290 5905 0 5905 0 0 155 0 155 -3742 2 -3743 3 -59 24 c-152 61 -209 185 -173 376 21 111 903 3118 933 3182 82 173 229 287 447 346 l82 22 3128 2 3127 3 0 155 0 155 -5905 0 -5905 0 0 -2290z"/></g></svg>
			</div>
			<div class="grapsvg2">
				<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1181.000000pt" height="458.000000pt" viewBox="0 0 1181.000000 458.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,458.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M0 1935 l0 -1935 1748 3 c1647 2 1750 3 1807 20 225 68 386 213 449 404 13 43 127 427 251 853 125 426 328 1119 451 1539 233 794 242 832 213 908 -17 46 -79 102 -136 123 -53 20 -81 20 -2418 20 l-2365 0 0 -1935z"/></g></svg>
			</div>
			<div class="grapsvg3">
				<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1181.000000pt" height="458.000000pt" viewBox="0 0 1181.000000 458.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,458.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M0 2015 l0 -1855 1688 3 c1880 3 1748 -2 1899 72 116 57 186 137 245 279 16 38 147 475 293 970 145 496 334 1142 421 1436 235 803 234 799 234 844 -1 44 -11 62 -50 89 -23 16 -177 17 -2377 17 l-2353 0 0 -1855z"/></g></svg>
			</div>
			<div class="grapsvg4 flexcenter">
				<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1181.000000pt" height="458.000000pt" viewBox="0 0 1181.000000 458.000000" preserveAspectRatio="xMidYMid meet">
				<defs>
				<linearGradient id="linear-gradient" x1="0%" y1="0%" x2="0%" y2="100%">
					<stop offset="0%" stop-color="var(--clr1)" stop-opacity="1" />
					<stop offset="100%" stop-color="var(--clr2)" stop-opacity="1" />
				</linearGradient>
				</defs>
				<g transform="translate(0.000000,458.000000) scale(0.100000,-0.100000)" stroke="none"><path style="fill:url(#linear-gradient);" d="M0 2170 l0 -1940 1599 0 c1010 0 1617 4 1648 10 26 5 84 16 128 25 171 32 297 127 369 279 46 96 -10 -89 782 2615 203 694 211 731 180 804 -22 51 -78 96 -150 123 l-67 24 -2244 0 -2245 0 0 -1940z"/></g></svg>
			</div>
			<div class="grapsvg5">
				<svg version="1.0" xmlns="http://www.w3.org/2000/svg"  width="749.000000pt" height="111.000000pt" viewBox="0 0 749.000000 111.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,111.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M768 1087 c-82 -28 -163 -83 -226 -152 -62 -69 -516 -730 -530 -774 -24 -69 -8 -121 43 -146 30 -13 373 -15 3313 -15 3257 0 3280 0 3345 20 83 26 173 86 237 158 66 74 504 712 524 763 29 73 15 128 -39 154 -30 13 -373 15 -3317 15 l-3283 -1 -67 -22z"/></g></svg>
			</div>
			<div class="grapsvg6">
				<svg version="1.0" xmlns="http://www.w3.org/2000/svg"  width="742.000000pt" height="374.000000pt" viewBox="0 0 742.000000 374.000000"  preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,374.000000) scale(0.100000,-0.100000)"stroke="none"><path d="M2630 3733 c-162 -28 -384 -161 -482 -290 -74 -97 -2088 -3101 -2116 -3156 -20 -40 -26 -67 -27 -117 0 -77 22 -116 82 -146 36 -18 78 -19 778 -22 511 -2 760 1 805 8 137 24 313 120 425 234 44 45 337 473 1102 1613 573 853 1052 1571 1064 1595 13 26 24 68 26 108 4 56 2 70 -19 99 -12 19 -41 44 -63 55 -39 21 -50 21 -795 22 -415 1 -766 0 -780 -3z"/></g></svg>
			</div>
			<div class="grapsvg7">
				<svg version="1.0" xmlns="http://www.w3.org/2000/svg"  width="742.000000pt" height="374.000000pt" viewBox="0 0 742.000000 374.000000"  preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,374.000000) scale(0.100000,-0.100000)"stroke="none"><path d="M5724 3725 c-130 -28 -292 -122 -399 -229 -45 -45 -334 -468 -1102 -1613 -573 -853 -1052 -1571 -1064 -1595 -13 -26 -24 -68 -26 -108 -4 -56 -2 -70 19 -99 12 -19 41 -44 63 -55 40 -21 49 -21 815 -21 l775 0 80 28 c147 50 308 160 387 264 74 97 2088 3101 2116 3156 20 40 26 67 27 117 0 77 -22 116 -82 146 -36 18 -77 19 -793 21 -601 1 -768 -1 -816 -12z"/></g></svg>
			</div>
			<div class="grap-title flexcenter">
				<div>
				<div class="grap-title-top">
					<?php if (theme_config('slidetitle1')) : ?>
						<?=$slidetitle1?>
					<?php else : ?>
						Pemerintah <?= ucwords($this->setting->sebutan_desa); ?>
					<?php endif ?>	
				</div>
				<div class="grap-title-middle">
					<?php if (theme_config('slidetitle2')) : ?>
						<?=$slidetitle2?>
					<?php else : ?>
						<?= ucwords(($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : ''); ?>
					<?php endif ?>
				</div>
				<div class="grap-title-bottom">
					<?php if (theme_config('slidetitle3')) : ?>
						<?=$slidetitle3?>
					<?php else : ?>
						<?= ucwords($this->setting->sebutan_desa); ?> Cerdas & Berdata
					<?php endif ?>
				</div>
				<div class="grap-title-bottom2">
					<?php if (theme_config('slidetitle4')) : ?>
						<?=$slidetitle4?>
					<?php else : ?>
						<?= ucwords($this->setting->sebutan_desa); ?> menjadi lebih efektif dan efisien dalam melakukan tugas dan fungsi dengan baik dalam melayani masyarakat
					<?php endif ?>
				</div>
				</div>
			</div>
		</div>
		</div>
		<div class="slidecustom-mobile hiddenrelative margin-top-10">
			<div class="slider-container" style="background-image: url('<?= $latar_website ?>');">
				<div class="sliderstyle">
					<div style="min-height:0px;" class="bcarousel js-flickity" data-flickity='{ "autoPlay": true, "cellAlign": "left", "fade": "true" }'>
						<?php foreach($slider_gambar['gambar'] as $data) : ?>
							<?php $img = $slider_gambar['lokasi'] . 'sedang_' . $data['gambar']; ?>
							<?php if(is_file($img)) : ?>
								<div class="bcarousel-part">
									<div class="image-slider"><img src="<?= base_url($img) ?>"></div>
								</div>
							<?php endif ?>
						<?php endforeach ?>
					</div>
				</div>
			</div>
			<div class="grapsvg-mob">
				<div class="grapsvg-mob1">
					<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1243.000000pt" height="295.000000pt" viewBox="0 0 1243.000000 295.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,295.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M12225 2663 c-255 -105 -642 -253 -980 -376 -2561 -930 -5251 -1539 -7465 -1692 -553 -38 -1337 -45 -1745 -15 -777 56 -1383 171 -1891 361 -73 27 -135 49 -138 49 -4 0 -5 -222 -4 -492 l3 -493 6208 -3 6207 -2 0 1370 c0 753 -3 1369 -7 1369 -5 -1 -89 -35 -188 -76z"/></g></svg>
				</div>
				<div class="grapsvg-mob2">
					<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1243.000000pt" height="295.000000pt" viewBox="0 0 1243.000000 295.000000" preserveAspectRatio="xMidYMid meet">
					<defs>
						<linearGradient id="gradbot" gradientTransform="rotate(0)">
							<stop offset="0" stop-color="var(--clr2)" />
							<stop offset="70%" stop-color="transparent" />
						</linearGradient>
					</defs>
					<g transform="translate(0.000000,295.000000) scale(0.100000,-0.100000)" stroke="none"><path fill="url(#gradbot)" d="M12225 2663 c-255 -105 -642 -253 -980 -376 -2561 -930 -5251 -1539 -7465 -1692 -553 -38 -1337 -45 -1745 -15 -703 50 -1270 151 -1742 309 -81 27 -149 48 -151 47 -1 -2 64 -29 145 -61 1941 -763 4675 -739 8728 79 913 184 1648 352 2758 628 l647 161 0 498 c0 275 -3 498 -7 498 -5 -1 -89 -35 -188 -76z"/></g></svg>
				</div>
				<div class="grapsvg-mob3">
					<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1243.000000pt" height="295.000000pt" viewBox="0 0 1243.000000 295.000000" preserveAspectRatio="xMidYMid meet"><g transform="translate(0.000000,295.000000) scale(0.100000,-0.100000)" stroke="none"><path d="M12388 2930 c-30 -18 -517 -229 -787 -342 -1727 -719 -3525 -1273 -5306 -1634 -292 -59 -790 -152 -975 -181 -63 -10 -108 -19 -99 -21 37 -7 813 122 1289 214 1001 194 2305 523 3210 809 845 267 1363 446 2010 693 233 89 609 238 663 263 27 12 27 13 27 111 0 54 -3 98 -7 98 -5 0 -16 -5 -25 -10z M5158 743 c6 -2 18 -2 25 0 6 3 1 5 -13 5 -14 0 -19 -2 -12 -5z M5098 733 c7 -3 16 -2 19 1 4 3 -2 6 -13 5 -11 0 -14 -3 -6 -6z"/></g></svg>
				</div>
				<div class="grapsvg-mob4">
					<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1243.000000pt" height="295.000000pt" viewBox="0 0 1243.000000 295.000000" preserveAspectRatio="xMidYMid meet">
					<defs>
						<linearGradient id="gradtop" gradientTransform="rotate(0)">
							<stop offset="0" stop-color="var(--clrsoft1)" />
							<stop offset="100%" stop-color="var(--clr1)" />
						</linearGradient>
					</defs>
					<g transform="translate(0.000000,295.000000) scale(0.100000,-0.100000)" stroke="none"><path fill="url(#gradtop)" d="M12010 2804 c-2508 -861 -4944 -1434 -6960 -1638 -669 -68 -1095 -90 -1735 -90 -544 1 -816 13 -1225 55 -733 75 -1397 224 -1952 437 -70 27 -130 47 -133 44 -3 -3 -5 -142 -5 -309 l0 -304 58 -26 c31 -14 136 -51 232 -83 668 -221 1483 -330 2465 -330 779 0 1661 69 2395 186 2180 348 4356 969 6450 1842 260 108 751 320 759 328 11 10 -36 -5 -349 -112z"/></g></svg>
				</div>
			</div>
			<div class="grapsvg-mob-title">
				<h1>
					<?php if (theme_config('slidetitle2')) : ?>
						<?=$slidetitle2?>
					<?php else : ?>
						<?= ucwords(($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : ''); ?>
					<?php endif ?>
				</h1>
				<div class="flexcenter">			
				<h2>
					<?php if (theme_config('slidetitle3')) : ?>
						<?=$slidetitle3?>
					<?php else : ?>
						<?= ucwords($this->setting->sebutan_desa); ?> Cerdas & Berdata
					<?php endif ?>
				</h2>	
				</div>
			</div>
		</div>
	<?php else : ?>
		<div class="hiddenrelative margin-top-10">
		<div class="slider-container" style="background-image: url('<?= $latar_website ?>');">
			<div class="sliderstyle">
				<div style="min-height:0px;" class="bcarousel js-flickity" data-flickity='{ "autoPlay": true, "cellAlign": "left", "fade": "true" }'>
					<?php foreach($slider_gambar['gambar'] as $data) : ?>
						<?php $img = $slider_gambar['lokasi'] . 'sedang_' . $data['gambar']; ?>
						<?php if(is_file($img)) : ?>
							<div class="bcarousel-part">
								<div class="image-slider"><img src="<?= base_url($img) ?>"></div>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		</div>
	<?php endif; ?>
<script>
/**
 * Flickity fade v1.0.0
 * Fade between Flickity slides
 */

/* jshint browser: true, undef: true, unused: true */

( function( window, factory ) {
  // universal module definition
  /*globals define, module, require */
  if ( typeof define == 'function' && define.amd ) {
    // AMD
    define( [
      'flickity/js/index',
      'fizzy-ui-utils/utils',
    ], factory );
  } else if ( typeof module == 'object' && module.exports ) {
    // CommonJS
    module.exports = factory(
      require('flickity'),
      require('fizzy-ui-utils')
    );
  } else {
    // browser global
    factory(
      window.Flickity,
      window.fizzyUIUtils
    );
  }

}( this, function factory( Flickity, utils ) {

// ---- Slide ---- //

var Slide = Flickity.Slide;

var slideUpdateTarget = Slide.prototype.updateTarget;
Slide.prototype.updateTarget = function() {
  slideUpdateTarget.apply( this, arguments );
  if ( !this.parent.options.fade ) {
    return;
  }
  // position cells at selected target
  var slideTargetX = this.target - this.x;
  var firstCellX = this.cells[0].x;
  this.cells.forEach( function( cell ) {
    var targetX = cell.x - firstCellX - slideTargetX;
    cell.renderPosition( targetX );
  });
};

Slide.prototype.setOpacity = function( alpha ) {
  this.cells.forEach( function( cell ) {
    cell.element.style.opacity = alpha;
  });
};

// ---- Flickity ---- //

var proto = Flickity.prototype;

Flickity.createMethods.push('_createFade');

proto._createFade = function() {
  this.fadeIndex = this.selectedIndex;
  this.prevSelectedIndex = this.selectedIndex;
  this.on( 'select', this.onSelectFade );
  this.on( 'dragEnd', this.onDragEndFade );
  this.on( 'settle', this.onSettleFade );
  this.on( 'activate', this.onActivateFade );
  this.on( 'deactivate', this.onDeactivateFade );
};

var updateSlides = proto.updateSlides;
proto.updateSlides = function() {
  updateSlides.apply( this, arguments );
  if ( !this.options.fade ) {
    return;
  }
  // set initial opacity
  this.slides.forEach( function( slide, i ) {
    var alpha = i == this.selectedIndex ? 1 : 0;
    slide.setOpacity( alpha );
  }, this );
};

/* ---- events ---- */

proto.onSelectFade = function() {
  // in case of resize, keep fadeIndex within current count
  this.fadeIndex = Math.min( this.prevSelectedIndex, this.slides.length - 1 );
  this.prevSelectedIndex = this.selectedIndex;
};

proto.onSettleFade = function() {
  delete this.didDragEnd;
  if ( !this.options.fade ) {
    return;
  }
  // set full and 0 opacity on selected & faded slides
  this.selectedSlide.setOpacity( 1 );
  var fadedSlide = this.slides[ this.fadeIndex ];
  if ( fadedSlide && this.fadeIndex != this.selectedIndex ) {
    this.slides[ this.fadeIndex ].setOpacity( 0 );
  }
};

proto.onDragEndFade = function() {
  // set flag
  this.didDragEnd = true;
};

proto.onActivateFade = function() {
  if ( this.options.fade ) {
    this.element.classList.add('is-fade');
  }
};

proto.onDeactivateFade = function() {
  if ( !this.options.fade ) {
    return;
  }
  this.element.classList.remove('is-fade');
  // reset opacity
  this.slides.forEach( function( slide ) {
    slide.setOpacity('');
  });
};

/* ---- position & fading ---- */

var positionSlider = proto.positionSlider;
proto.positionSlider = function() {
  if ( !this.options.fade ) {
    positionSlider.apply( this, arguments );
    return;
  }

  this.fadeSlides();
  this.dispatchScrollEvent();
};

var positionSliderAtSelected = proto.positionSliderAtSelected;
proto.positionSliderAtSelected = function() {
  if ( this.options.fade ) {
    // position fade slider at origin
    this.setTranslateX( 0 );
  }
  positionSliderAtSelected.apply( this, arguments );
};

proto.fadeSlides = function() {
  if ( this.slides.length < 2 ) {
    return;
  }
  // get slides to fade-in & fade-out
  var indexes = this.getFadeIndexes();
  var fadeSlideA = this.slides[ indexes.a ];
  var fadeSlideB = this.slides[ indexes.b ];
  var distance = this.wrapDifference( fadeSlideA.target, fadeSlideB.target );
  var progress = this.wrapDifference( fadeSlideA.target, -this.x );
  progress = progress / distance;

  fadeSlideA.setOpacity( 1 - progress );
  fadeSlideB.setOpacity( progress );

  // hide previous slide
  var fadeHideIndex = indexes.a;
  if ( this.isDragging ) {
    fadeHideIndex = progress > 0.5 ? indexes.a : indexes.b;
  }
  var isNewHideIndex = this.fadeHideIndex != undefined &&
    this.fadeHideIndex != fadeHideIndex &&
    this.fadeHideIndex != indexes.a &&
    this.fadeHideIndex != indexes.b;
  if ( isNewHideIndex ) {
    // new fadeHideSlide set, hide previous
    this.slides[ this.fadeHideIndex ].setOpacity( 0 );
  }
  this.fadeHideIndex = fadeHideIndex;
};

proto.getFadeIndexes = function() {
  if ( !this.isDragging && !this.didDragEnd ) {
    return {
      a: this.fadeIndex,
      b: this.selectedIndex,
    };
  }
  if ( this.options.wrapAround ) {
    return this.getFadeDragWrapIndexes();
  } else {
    return this.getFadeDragLimitIndexes();
  }
};

proto.getFadeDragWrapIndexes = function() {
  var distances = this.slides.map( function( slide, i ) {
    return this.getSlideDistance( -this.x, i );
  }, this );
  var absDistances = distances.map( function( distance ) {
    return Math.abs( distance );
  });
  var minDistance = Math.min.apply( Math, absDistances );
  var closestIndex = absDistances.indexOf( minDistance );
  var distance = distances[ closestIndex ];
  var len = this.slides.length;

  var delta = distance >= 0 ? 1 : -1;
  return {
    a: closestIndex,
    b: utils.modulo( closestIndex + delta, len ),
  };
};

proto.getFadeDragLimitIndexes = function() {
  // calculate closest previous slide
  var dragIndex = 0;
  for ( var i=0; i < this.slides.length - 1; i++ ) {
    var slide = this.slides[i];
    if ( -this.x < slide.target ) {
      break;
    }
    dragIndex = i;
  }
  return {
    a: dragIndex,
    b: dragIndex + 1,
  };
};

proto.wrapDifference = function( a, b ) {
  var diff = b - a;

  if ( !this.options.wrapAround ) {
    return diff;
  }

  var diffPlus = diff + this.slideableWidth;
  var diffMinus = diff - this.slideableWidth;
  if ( Math.abs( diffPlus ) < Math.abs( diff ) ) {
    diff = diffPlus;
  }
  if ( Math.abs( diffMinus ) < Math.abs( diff ) ) {
    diff = diffMinus;
  }
  return diff;
};

// ---- wrapAround ---- //

var _getWrapShiftCells = proto._getWrapShiftCells;
proto._getWrapShiftCells = function() {
  if ( !this.options.fade ) {
    _getWrapShiftCells.apply( this, arguments );
  }
};

var shiftWrapCells = proto.shiftWrapCells;
proto.shiftWrapCells = function() {
  if ( !this.options.fade ) {
    shiftWrapCells.apply( this, arguments );
  }
};

return Flickity;

}));
</script>
