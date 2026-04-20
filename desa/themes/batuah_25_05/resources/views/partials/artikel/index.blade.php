@extends('theme::layouts.right-sidebar')
@section('content')
<div class="homepage">
@include('theme::plus.header_side')
<div class="mainpage">
	@if (!empty($judul_kategori))
	@else
		@include('theme::partials.slider')
	@endif
	<div class="margin-side-10">
	<div class="mainbodyarea">
		<div class="bigarea hiddenrelative">
		<div class="bigarea-margin">
			@if (!empty($judul_kategori))
				@else
				@include('theme::plus.running')
				@include('theme::event.hari_besar')
				@include('theme::event.moment')
				@include('theme::event.jadwal_shalat')
				@include('theme::plus.sdgscustom')
				@include('theme::partials.artikel.headline')
			@endif
			<div class="col-default-nopad margin-top-10">
				<div class="artikelhome bggrad-color2">
					<div class="headmod bgcolor-2 flexleft">
					<h1>
						@if ($cari)
							Pencarian
						@elseif (!empty($judul_kategori))
							Kategori Artikel
						@else
							Artikel
						@endif
					</h1>
					</div>
					<div class="tabs">
						<input type="radio" id="tab1" name="tab-control" checked>
						<input type="radio" id="tab2" name="tab-control">
						<ul>
							<li title="Features">
							<label for="tab1" role="button" class="flexcenter tip-bottom" data-toggle="tooltip" data-original-title="Format Grid">
							<svg viewBox="0 0 24 24">
								<path d="M3,11H11V3H3M3,21H11V13H3M13,21H21V13H13M13,3V11H21V3" />
							</svg>
							</label>
							</li>
							<li title="Delivery Contents">
							<label for="tab2" role="button" class="flexcenter tip-bottom" data-toggle="tooltip" data-original-title="Format Row">
							<svg viewBox="0 0 24 24" style="height:30px;">
								<path d="M9,5V9H21V5M9,19H21V15H9M9,14H21V10H9M4,9H8V5H4M4,19H8V15H4M4,14H8V10H4V14Z" />
							</svg>
							</label>
							</li>
						</ul>
						<div class="content">
							<section>
								<div class="headhome-cat flexcenter">
								<h2>
								@if ($cari)
									Pencarian
								@elseif (!empty($judul_kategori))
									{{ $title }}
								@else
									Artikel
								@endif
								</h2>
							</div>
								<div class="gridstyle">
									@include('theme::partials.artikel.artikel_home_item')
								</div>	
							</section>
							<script>var config=@json(identitas());</script>
							<section>
								<div class="rowstyle">
									@include('theme::partials.artikel.artikel_home_item')
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
			@include('theme::plus.middle_page')
		</div>
		</div>
		<div class="rightsidearea">
			@include('theme::plus.side')			
		</div>
	</div>
	</div>
</div>
</div>
@endsection