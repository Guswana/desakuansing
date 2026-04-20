@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div class="widget-box bgwhite bordergrey">
	<div class="widget-head bggrad-color2 flexleft">
		<svg viewBox="0 0 24 24">
			<path d="M3,4H7V8H3V4M9,5V7H21V5H9M3,10H7V14H3V10M9,11V13H21V11H9M3,16H7V20H3V16M9,17V19H21V17H9" />
		</svg>
		<h1>{{ $judul_widget }}</h1>
	</div>
	<div class="widget-inner category-menu">
		<ul id="ul-menu" style="text-align:left;list-style:none;">
			@foreach($menu_kiri as $data)
				<li>
					<div class="cat-link">
						<a href="{{ci_route('artikel/kategori/' . $data['slug']) }}">
							{{ $data['kategori'] }}
							@if(count($data['submenu'] ?? []) > 0)
								<span class="caret"></span>
							@endif
						</a>
					</div>
					@if(count($data['submenu'] ?? []) > 0)
						<ul>
							@foreach($data['submenu'] as $submenu)
								<div class="subcat-link trans-def"><a href="{{ci_route('artikel/kategori/' . $submenu['slug']) }}">{{ $submenu['kategori'] }}</a></div>
							@endforeach
						</ul>
					@endif
				</li>
			@endforeach
		</ul>
	</div>
</div>