@extends('theme::layouts.full-content')

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
						<img src="{{ theme_asset('images/pngfile/populasi.png') }}"/>
						<div>
							<h1 class="color-1">Pemerintah</h1>
							<h2>{{ ucwords(setting('sebutan_desa')) }}</h2>
						</div>
					</div>
					<div class="pagebox">
						<div class="row" id="pemerintah-list" style="margin:0 -5px;">
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
        function loadPemerintah(params = {}) {
            var apiPemerintah = '{{ route("api.pemerintah") }}';

            $('#pagination-container').hide();
            $('#pemerintah-list').html('<p class="text-center">Memuat...</p>');

            $.get(apiPemerintah, params, function (data) {
                var pemerintah = data.data;
                var pemerintahList = $('#pemerintah-list');
                pemerintahList.empty();

                if (!pemerintah.length) {
                    pemerintahList.html(`<p class="py-2"> ${setting.sebutan_pemerintah_desa} tidak tersedia.</p>`);
                    return;
                }

                var mediaSosialPlatforms = JSON.parse(setting.media_sosial_pemerintah_desa);

                pemerintah.forEach(function (item) {
                    var mediaSosial = '';
                    var mediaSosialPengurus = item.attributes.media_sosial || {};

                    mediaSosialPlatforms.forEach((platform) => {
                        var link = mediaSosialPengurus[platform];
                        mediaSosial += `
                            <a href="${link}" target="_blank" style="padding:5px 5px 0;margin:0!important;">
                                <span style="color:#919191;font-size:100%;"><i class="fa fa-${platform}"></i></span>
                            </a>
                        `;
                    });

                    var pemerintahHTML = `
                        <div class="col-lg-4 col-sm-6" style="padding:0 5px;margin:3px 0;">
							<div class="aparatur-col" style="width:100%;margin:0;">
								<div class="image-pemerintah mb-10">
									<img src="${item.attributes.foto}" alt="Foto ${item.attributes.nama}">
								</div>
								<div class="pemerintah-title" style="padding-top:5px;padding-bottom:60px;">
									<h2 class="color-2">${item.attributes.nama}</h2>
									<h3 style="margin-bottom:5px;">${item.attributes.nama_jabatan}</h3>
								</div>
								<div class="pemerintah-status flexcenter">
									<div>
										<div class="flexcenter" style="position:relative;text-align:center;margin:0;">
											 ${mediaSosial}
										</div>
										<div class="flexcenter">
										<div class="ada flexleft">
										${item.attributes.kehadiran == 1 ? `
										<span class="label label-${item.attributes.status_kehadiran === 'hadir' ? 'primary' : 'danger'}" style="padding:5px 10px;font-size:90%;">
                                        ${item.attributes.status_kehadiran === 'hadir' ? 'Hadir' : item.attributes.status_kehadiran}
										</span>` : ''}
										</div>
										</div>
									</div>
								</div>	
							</div>
                        </div>
                        `;

                    pemerintahList.append(pemerintahHTML);
                });

                initPagination(data);
            });
        }

        $('.pagination').on('click', '.btn-page', function() {
            var params = {};
            var page = $(this).data('page');

            params['page[number]'] = page;

            loadPemerintah(params);
        });

        loadPemerintah();
    });
	var config=@json(identitas());
</script>
@endpush