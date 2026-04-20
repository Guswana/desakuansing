@extends('theme::layouts.full-content')

@push('styles')
<style type="text/css">
	#galeri-list .row {margin-right: -5px;margin-left: -5px;}
</style>
@endpush

@section('content')
@include('theme::plus.header_side')
<div class="mainpage">
	<div class="margin-side-10">
	<div class="mainbodyarea">
		<div class="bigarea hiddenrelative">
		<div class="bigarea-margin">
			<div class="col-default margin-top-10">
				<div class="bodypage bgwhite bordergrey">
					<div class="headgaleri bgcolor-2">
						<div class="rowsame">
							<div class="headgaleri-title flexcenter">
								<div class="album-title hover-width">
									<h1>Galeri</h1>
									<h2>Foto</h2>
								</div>
							</div>
							<div class="headgaleri-image">
								<img src="{{ theme_asset('images/kamera.jpg') }}" />
								<div class="headgaleri-cover"></div>
							</div>
						</div>
					</div>
					<div class="pagebox">
						<div class="hiddenrelative" id="galeri-list"></div>
						@include('theme::commons.pagination')
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
@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		var parent = `{{ $parent }}`;
		var routeGaleri = `{{ ci_route('internal_api.galeri') }}`;
		let pageSizes = 6;
		let status = '';

		if (parent) {
			routeGaleri = `{{ ci_route('internal_api.galeri') }}/${parent}`;
			pageSizes = 10; 
		}
		
		const loadGaleri = function (pageNumber) {
			$.ajax({
				url: routeGaleri + `?sort=-tgl_upload&page[number]=${pageNumber}&page[size]=${pageSizes}`,
				type: "GET",
				beforeSend: function(){
					const galeriList = document.getElementById('galeri-list');
				},
				dataType: 'json',
				data: {
					
				},
				success: function (data) {
					displayGaleri(data);
					initPagination(data);					
				}
			});
		}

		const displayGaleri = function (dataGaleri) {
			const galeriList = document.getElementById('galeri-list');
			galeriList.innerHTML = '';
			if(!dataGaleri.data.length) {
				galeriList.innerHTML = `
				<div class="blankdata">
					<img style="width:100%;height:auto;display:block;border-radius:5px;" src="{{ theme_asset('images/nature.jpg') }}" />
					<div class="blankdata-title">
						<h2>Mohon maaf,</h2>
						<h3>Data Album Galeri Foto belum tersedia untuk saat ini...</h3>
					</div>
					<div class="blankdata-bottom">
						<img src="{{ theme_asset('images/girl.png') }}" />
					</div>
				</div>`
				return
			}
			const ulBlock = document.createElement('div');
			ulBlock.className = 'row';
			dataGaleri.data.forEach(item => {
				const card = document.createElement('div');								
				const image  = item.attributes.src_gambar ? `<img src="${item.attributes.src_gambar}" alt="${item.attributes.nama}"/>` : ``
				card.innerHTML = `
					<div class="col-sm-6" style="padding-right:5px;padding-left:5px;">
					<div class="galeri-box bordergrey1 forhover" style="width:100%!important;margin:5px 0;">
						<div class="image-galeri">
						${image}
						<div class="hoverimage flexcenter">
							<div class="hoverimage-left bgcolor-1 hover-width"></div>
							<div class="hoverimage-right bgcolor-1 hover-width"></div>
							<div>
							<a href="${item.attributes.url_detail}">
								<div class="hoverimage-icon flexcenter hover-height">
									<svg viewBox="0 0 24 24"><path d="M20,18H22V6H20M11.59,7.41L15.17,11H1V13H15.17L11.59,16.58L13,18L19,12L13,6L11.59,7.41Z" /></svg>
								</div>
							</a>
							</div>
						</div>
						</div>
						<h2>Album : ${item.attributes.nama}</h2>
					</div>
					</div>
				`;
				card.onclick = function(){}				
				galeriList.appendChild(card);
			});		
		}

		$('.pagination').on('click', '.btn-page', function() {
            var params = {};
            var page = $(this).data('page');
            loadGaleri(page);
        });
		loadGaleri(1);
	});	
	var config=@json(identitas());
</script>
@endpush