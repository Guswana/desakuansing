@push('styles')
<style type="text/css">

@media (max-width: 992px) {

}
</style>
@endpush

@php $linkplus = theme_config('linkplus', ''); @endphp
@if (theme_config('linkplus') == 'true')
<div class="col-default" style="margin-top:10px;">
<div class="widget-box bgwhite bordergrey">
	<div class="widget-head bggrad-color2 flexleft" style="border-radius:5px 5px 0 0;">
		<svg viewBox="0 0 24 24"><path d="M12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12A2,2 0 0,1 12,10M4,4H11A2,2 0 0,1 13,6V9H11V6H4V11H6V9L9,12L6,15V13H4A2,2 0 0,1 2,11V6A2,2 0 0,1 4,4M20,20H13A2,2 0 0,1 11,18V15H13V18H20V13H18V15L15,12L18,9V11H20A2,2 0 0,1 22,13V18A2,2 0 0,1 20,20Z" /></svg>
		<h1>Link</h1>
	</div>
	<div class="link-custom bgwhite bordergrey1">
		<div class="rowsame margin-minlr-5">
			<!-- Start -->
			<div class="link-col">
				<a rel="nofollow" href="https://api.whatsapp.com/send?phone={{ $desa['telepon'] }}&text=Saya ingin bertanya sesuatu" target="blank">
					<img src="{{ theme_asset('images/linkplus/wa.png') }}"/>
					<div class="flexcenter">
						<p>Hubungi Kami</p>
					</div>	
				</a>
			</div>
			<!-- End -->
			<!-- Start -->
			<div class="link-col">
				<a href="https://kemendesa.go.id/" target="blank">
					<img src="{{ theme_asset('images/linkplus/kemendesa.png') }}"/>
					<div class="flexcenter">
						<p>Kemendes PDTT</p>
					</div>	
				</a>
			</div>
			<!-- End -->
			<!-- Start -->
			<div class="link-col">
				<a href="http://idm.kemendesa.go.id/" target="blank">
					<img src="{{ theme_asset('images/linkplus/sdgs.png') }}"/>
					<div class="flexcenter">
						<p>IDM Kemendes PDTT</p>
					</div>	
				</a>
			</div>
			<!-- End -->
			<!-- Start -->
			<div class="link-col">
				<a href="https://kemendagri.go.id/" target="blank">
					<img src="{{ theme_asset('images/linkplus/kemendagri.png') }}"/>
					<div class="flexcenter">
						<p>Kemendagri</p>
					</div>	
				</a>
			</div>
			<!-- End -->
			<!-- Start -->
			<div class="link-col">
				<a href="https://gis.kemendesa.go.id/portal/home/" target="blank">
					<img src="{{ theme_asset('images/linkplus/kemendesa.png') }}"/>
					<div class="flexcenter">
						<p>GIS Kemendes PDTT</p>
					</div>	
				</a>
			</div>
			<!-- End -->
			<!-- Start -->
			<div class="link-col">
				<a href="https://opendesa.id/" target="blank">
					<img src="{{ theme_asset('images/linkplus/opensid.png') }}"/>
					<div class="flexcenter">
						<p>OpenDesa</p>
					</div>	
				</a>
			</div>
			<!-- End -->
		</div>	
	</div>
</div>
</div>
@endif