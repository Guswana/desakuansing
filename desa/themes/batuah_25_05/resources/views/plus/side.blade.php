
@push('styles')
<style type="text/css">
	.stickyarea iframe{max-width:100%!important;position:relative;overflow:hidden;}
</style>
@endpush

@include('theme::event.infohari')

<div class="stickyarea" style="max-width:100%;">
	<div class="col-default-right" style="max-width:100%!important;position:relative;overflow:hidden;">
	@if ($widgetAktif)
		@foreach ($widgetAktif as $widget)
			@php
            $judul_widget = [
                'judul_widget' => str_replace('Desa', ucwords(setting('sebutan_desa')), strip_tags($widget['judul'])),
            ];
			@endphp
			
			@if ($widget['jenis_widget'] == 3)
				<div class="widget-padding">
				<div class="widget-box bgwhite bordergrey">
					<div class="widget-head bggrad-color2 flexleft">
					<svg viewBox="0 0 24 24">
						<path d="M22,16A2,2 0 0,1 20,18H8C6.89,18 6,17.1 6,16V4C6,2.89 6.89,2 8,2H20A2,2 0 0,1 22,4V16M16,20V22H4A2,2 0 0,1 2,20V7H4V20H16Z" />
					</svg>
					<h1>{{ $judul_widget['judul_widget'] }}</h1>
					</div>
					<div class="widget-inner">
					{!! html_entity_decode($widget['isi']) !!}
					</div>
				</div>
				</div>
			@else
				@if ($widget['isi'] == 'keuangan' || $widget['isi'] == 'galeri' || $widget['isi'] == 'statistik' || $widget['isi'] == 'aparatur_desa' || $widget['isi'] == 'peta_lokasi_kantor' || $widget['isi'] == 'peta_wilayah_desa')
					
				@else
					<div class="widget-padding">@includeIf("theme::widgets.{$widget['isi']}", $judul_widget)</div>
				@endif
			@endif
		@endforeach	
	@endif
	</div>
</div>