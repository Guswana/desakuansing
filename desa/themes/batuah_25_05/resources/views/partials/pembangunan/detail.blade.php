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
				<div class="bodypage bgwhite bordergrey pembangunanstyle">
					<div class="noprint">
					<div class="headstat-lebar flexcenter">
						<img src="{{ theme_asset('images/pembangunan.png') }}"/>
						<div>
						<h1 class="color-1">Pembangunan</h1>
						<h2>{{ ucwords(setting('sebutan_desa')) }}</h2>
						</div>
					</div>
					</div>
					<div class="pagebox">
						<div id="detail-pembangunan" style="margin:0 0 20px;">
				
						</div>
						<div class="noprint">
						@include('theme::commons.share', [
						'link' => site_url('pembangunan/' . $pembangunan->slug),
							'judul' => $pembangunan->judul,
						])
						</div>
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
        var slug = '{{ $slug }}';
        var notFound = '{{ asset("images/404-image-not-found.jpg") }}';

        function loadPembangunan() {
            const apiPembangunan = '{{ route("api.pembangunan") }}';
            const params = { 'filter[slug]': slug };

            $.get(apiPembangunan, params, function (response) {
                var detailPembangunan = $('#detail-pembangunan');

                detailPembangunan.empty();

                if (response.data.length !== 1) {
                    detailPembangunan.html('<div class="blankdata"><img style="width:100%;height:auto;display:block;border-radius:5px;" src="{{ theme_asset('images/nature.jpg') }}"/><div class="blankdata-title"><h2>Mohon maaf,</h2><h3>Data Pembangunan belum tersedia untuk saat ini...</h3></div><div class="blankdata-bottom"><img src="{{ theme_asset('images/girl.png') }}"/></div></div>');
                    return;
                }

                const pembangunan = response.data[0].attributes;
                const dokumentasi = pembangunan.pembangunan_dokumentasi;

                $('.judul-pembangunan').text('Detail Pembangunan ' + pembangunan.judul);

                var pembangunanHTML = '';
                var anggaran = formatRupiah(pembangunan.anggaran, 'Rp ');

                // Detail Pembangunan
                pembangunanHTML += `
                    <div class="pemb-detail">
						<div class="page">
						<div class="pemb-print-padding">
							<img style="width:100%;border-radius:5px;margin:0 0 15px;" src="${pembangunan.foto ?? notFound}" alt="${pembangunan.slug}"/>
							<div class="pemb-head">
								<div class="pemb-head-judul"><h1>${pembangunan.judul}</h1></div>
							</div>
							<div class="flexcenter" style="width:100%;">
									<div class="pembtitle flexcenter borderwhite" style="margin:5px auto 15px;">
									Detail Kegiatan Pembangunan
									</div>
								</div>
							<table style="width:100%;" class="table-pemb">
									<tr><td class="pemb-ket">Lokasi</td><td style="width:20px;text-align:center;">:</td><td>${pembangunan.alamat}</td></tr>
									<tr><td class="pemb-ket">Anggaran</td><td style="width:20px;text-align:center;">:</td><td>Rp. ${anggaran}</td></tr>
									<tr><td class="pemb-ket">Volume</td><td style="width:20px;text-align:center;">:</td><td>${pembangunan.volume}</td></tr>
									<tr><td class="pemb-ket">Sumber Dana</td><td style="width:20px;text-align:center;">:</td><td>${pembangunan.sumber_dana}</td></tr>
									<tr><td class="pemb-ket">Tahun</td><td style="width:20px;text-align:center;">:</td><td>${pembangunan.tahun_anggaran}</td></tr>
									<tr><td class="pemb-ket">Pelaksana</td><td style="width:20px;text-align:center;">:</td><td>${pembangunan.pelaksana_kegiatan}</td></tr>
									<tr><td class="pemb-ket">Keterangan</td><td style="width:20px;text-align:center;">:</td><td>${pembangunan.keterangan}</td></tr>
								</table>	
						</div>
						</div>
					</div>
                `;

                // Dokumentasi Pembangunan
                var gambarDokumentasi = '';
                
                if (dokumentasi && dokumentasi.length > 0) {
                    dokumentasi.forEach((dok) => {
                        gambarDokumentasi += `
                                <div class="pemb-doc-box bordergrey1 pembhover">
								<a href="${dok.gambar ?? notFound}" data-fancybox="images">
								<img src="${dok.gambar ?? notFound}" alt="Foto Pembangunan ${dok.persentase}" />
								<div class="pemb-doc-title hover-height flexcenter">
									<p>Foto Pembangunan ${dok.persentase}</p>
								</div>
								</a>
								</div>
                            `;
                    });
                } else {
                    gambarDokumentasi += `
                        <div class="text-center">
                            <p>Belum ada dokumentasi pembangunan yang tersedia.</p>
                        </div>`;
                }
                
                pembangunanHTML += `
                <div class="page">
				<div style="width:100%;float:none;">
				<div class="pemb-print-padding">
				<div class="pemb-doc bggrey1 bordergrey1">
					<div class="flexcenter" style="width:100%;">
						<div class="pembtitle flexcenter" style="border:none;margin:10px auto 5px;">
							<div>Dokumentasi Pembangunan</div>
						</div>
					</div>
					<div class="rowsame margin-minlr-5">
							 ${gambarDokumentasi}
					</div>
				</div>
				</div>
				</div>
				</div>
				`;
                
                pembangunanHTML += `
                <div class="noprint">
				<div class="pemb-maplokasi">
					<div class="flexcenter" style="width:100%;">
						<div class="pembtitle flexcenter borderwhite" style="margin:0 0 -25px;border:none;z-index:10;">
						Titik Lokasi
						</div>
					</div>
					<div id="map-pembangunan" class="pembmap flexcenter" style="z-index:1;"></div>
				</div>
				</div>
				`;
                
                detailPembangunan.append(pembangunanHTML);

                loadMap(pembangunan);
            });
        }

        function loadMap(pembangunan) {
            if (pembangunan.lat && pembangunan.lng) {

                // Tentukan posisi dan zoom default
                let lat = pembangunan.lat || config.lat;
                let lng = pembangunan.lng || config.lng;
                let posisi = [lat, lng];
                let zoom = setting.default_zoom || 15;

                // Tambahkan ikon ke peta
                let logo = L.icon({
                    iconUrl: setting.icon_pembangunan_peta,
                    iconSize: [30, 40], // Ukuran ikon
                    iconAnchor: [15, 40] // Posisi anchor
                });

                // Konfigurasi opsi peta
                let options = {
                    maxZoom: setting.max_zoom_peta || 18,
                    minZoom: setting.min_zoom_peta || 5,
                    attributionControl: true
                };

                // Inisialisasi peta
                let map = L.map('map-pembangunan', options).setView(posisi, zoom);

                // Tambahkan layer dasar ke peta
                getBaseLayers(map, setting.mapbox_key, setting.jenis_peta);

                // Tambahkan marker ke peta
                L.marker(posisi, { icon: logo }).addTo(map);
            }
        }

        loadPembangunan();
    });
</script>
@endpush

