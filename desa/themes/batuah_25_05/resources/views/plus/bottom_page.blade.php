
@push('styles')
<style type="text/css">
	.maphome .leaflet-left {left:auto !important;right:10px !important;margin-top:35px;}
</style>
@endpush
<div class="mainpage-bottom">
	<div class="col-default-nopad margin-top-10">
	<div class="margin-side-10">
	@if (!is_null($transparansi))
		<div class="relhid anggaran-bottom mt-15" style="margin-bottom:-15px;">
		<div class="marginpage">
			@include('theme::plus.anggaran', $transparansi)
		</div>
		</div>
	@endif
	</div>
	</div>
	<div class="col-default-nopad margin-top-10">
		<div class="margin-side-10">
			<div class="rowsame margin-minlr-5">
				<div class="mapleft bgwhite bordergrey">
					@include('theme::widgets.peta_lokasi_kantor')
				</div>
				<div class="mapright bgwhite bordergrey">
					@include('theme::widgets.peta_wilayah_desa')
				</div>
			</div>
		</div>
	</div>
</div>