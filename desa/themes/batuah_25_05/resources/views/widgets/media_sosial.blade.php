@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div class="widget-box bgwhite bordergrey">
	<div class="widget-head bggrad-color2 flexleft">
		<svg viewBox="0 0 24 24">
			<path d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
		</svg>
		<h1>{{ $judul_widget }}</h1>
	</div>
	<div class="widget-inner flexcenter">
		@foreach ($sosmed as $data)
			@if (!empty($data["link"]))
				<a href="{{ $data['link'] }}" target="_blank" rel="noopener">
					<img src="{{ $data['icon'] }}" alt="{{ $data['nama'] }}" style="width:24px;height:24px;margin:0 3px !important;" />
				</a>
			@endif
			@endforeach
	</div>
</div>