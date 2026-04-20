
@php $banner_aktif = theme_config('banner_aktif', ''); @endphp
@php $judul = theme_config('judul', ''); @endphp
@php $sub_judul = theme_config('sub_judul', ''); @endphp
@php $formal = theme_config('formal', ''); @endphp
@php $ucapan = theme_config('ucapan', ''); @endphp
@php $deskripsi = theme_config('deskripsi', ''); @endphp

@if (theme_config('banner_aktif') == 'true')
	
	<div class="col-default margin-top-10">		
		<div class="event-inner bggrad-color1">
			<div class="merdeka">
			<div class="merahputih" style="background-image:url({{ theme_asset('images/animation-color.svg') }});"></div>
			</div>
			<div class="event-row">
			@if (theme_config('formal') == 'true')
				<div class="logo-formal">
					<img src="{{ gambar_desa($desa['logo']) }}">
				</div>
			@endif
			<div class="event-title">
				<div>
				@if (theme_config('formal') == 'true')
					<h2>Pemerintah {{ ucwords(setting('sebutan_desa')) }} {{ ucwords($desa['nama_desa']) }}<br/><font style="font-weight:500;font-size:90%;padding-top:5px;">mengucapkan,</font></h2>
				@else
					@if ($ucapan)
					<h2>{{ $ucapan }}</h2>
					@endif
				@endif
				@if ($judul)
					<h1>{{ $judul }}</h1>
				@endif
				@if ($sub_judul)
					<h2>{{ $sub_judul }}</h2>
				@endif
				@if ($deskripsi)
					<p>{{ $deskripsi }}</p>
				@endif
				</div>
			</div>
			</div>
		</div>
	</div>
@endif