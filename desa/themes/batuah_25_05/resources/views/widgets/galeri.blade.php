@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div class="col-default">
	<div class="galeri bgwhite bordergrey">
	<div class="rowsame margin-minlr-5">
		<div class="judul-album flexcenter">
		<a href="{{ site_url('galeri') }}">
		<div class="album-cover bordergrey1">
		<img src="{{ theme_asset('images/kamera.jpg') }}"/>
		</div>
		<div class="album-title hover-width"><h1>Galeri</h1><h2>Foto</h2></div>
		</a>
		</div>
		<div class="album">
			<div class="margin-minlr-5">
			@foreach ($w_gal as $data)
				<div class="album-col">
				<div class="margin-lr-5">
					<div class="galeri-border bordergrey1 hover-gal">
					<a href="{{ site_url("galeri/$data[id]") }}">
					<div class="image-galeri">
						@if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar']))
							<img src="{{ AmbilGaleri($data['gambar'],'sedang') }}">
						@else
							<img src="{{ theme_asset('images/pengganti.jpg') }}"/>
							<div class="logo-no-image"><img src="{{ gambar_desa($desa['logo']) }}"/></div>
						@endif
						<div class="absolute-title">
							<p class="hover-height">{{ $data['nama'] }}</p>
						</div>
						<div class="hid-galeri flexcenter hover-height">
							<p>{{ $data['nama'] }}</p>
						</div>
					</div>
					</a>
					</div>
				</div>
				</div>
			@endforeach	
			</div>
		</div>
	</div>
	</div>
</div>