@extends('theme::layouts.full-content')
@include('theme::commons.asset_peta')

@section('content')
@include('theme::plus.header_side')
<div class="mainpage">
	<div class="margin-side-10">
		<div class="mainbodyarea">
			<div class="bigarea hiddenrelative">
			<div class="bigarea-margin">
				<div class="col-default margin-top-10">
				<div class="bodypage bgwhite bordergrey">
					<div class="headstat-lebar flexcenter">
						<img src="{{ theme_asset('images/pembangunan.png') }}"/>
						<div>
						<h1 class="color-1">Pembangunan</h1>
						<h2>{{ ucwords(setting('sebutan_desa')) }}</h2>
						</div>
					</div>
					<div class="pagebox">
						<div class="row-pemb mt-15" id="pembangunan-list">
					
						</div>
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
    $(document).ready(function () {
        function loadPembangunan(params = {}) {
            
            var apiPembangunan = '{{ route("api.pembangunan") }}';

            $('#pagination-container').hide();

            $.get(apiPembangunan, params, function (data) {
                var pembangunan = data.data;
                var pembangunanList = $('#pembangunan-list');

                pembangunanList.empty();

                if (!pembangunan.length) {
                    pembangunanList.html('<div class="blankdata"><img style="width:100%;height:auto;display:block;border-radius:5px;" src="{{ theme_asset('images/nature.jpg') }}"/><div class="blankdata-title"><h2>Mohon maaf,</h2><h3>Data Pembangunan belum tersedia untuk saat ini...</h3></div><div class="blankdata-bottom"><img src="{{ theme_asset('images/girl.png') }}"/></div></div>');
                    return;
                }

                pembangunan.forEach(function (item) {
                    var url = SITE_URL + 'pembangunan/' + item.attributes.slug;
                    var fotoHTML = `<img src="${item.attributes.foto}" alt="Foto Pembangunan"/>`;

                    var pembangunanHTML = `
                        <div class="pemb-row bggrey1">
						<div class="rowsame forhover">
							<div class="pemb-image">
								${fotoHTML}
								<div class="hoverimage flexcenter">
									<div class="hoverimage-left bgcolor-1 hover-width"></div>
									<div class="hoverimage-right bgcolor-1 hover-width"></div>
									<div>
											<a href="${item.attributes.foto}" data-fancybox="images">
											<div class="hoverimage-icon flexcenter hover-height">
											<svg viewBox="0 0 24 24"><path d="M9.5,13.09L10.91,14.5L6.41,19H10V21H3V14H5V17.59L9.5,13.09M10.91,9.5L9.5,10.91L5,6.41V10H3V3H10V5H6.41L10.91,9.5M14.5,13.09L19,17.59V14H21V21H14V19H17.59L13.09,14.5L14.5,13.09M13.09,9.5L17.59,5H14V3H21V10H19V6.41L14.5,10.91L13.09,9.5Z"/></svg>
											</div>
											</a>
									</div>
								</div>
							</div>
							<div class="pemb-title flexleft">
								<div>
										<div class="pemb-padding">
										<h2>${item.attributes.judul}</h2>
										<h3>Tahun : <span class="color-2">${item.attributes.tahun_anggaran}</span></h3>
										<h3 class="desktop-only">Anggaran : <span class="color-2">Rp. ${item.attributes.anggaran}</span></h3>
										<a href="${url}" title="Detail">
											<div class="flexleft" style="margin:10px 0 0;">
												<div class="b-btn bgcolor-1 flexcenter"><p>Lihat Detail...</p></div>
											</div>
										</a>
										</div>
										</div>
							</div>
						</div>
						</div>
                           
                    `;

                    pembangunanList.append(pembangunanHTML);
                });

                initPagination(data);
            });
        }

        $('.pagination').on('click', '.btn-page', function() {
            var params = {};
            var page = $(this).data('page');

            params['page[number]'] = page;

            loadPembangunan(params);
        });

        loadPembangunan();
    });
	var config=@json(identitas());
</script>
@endpush