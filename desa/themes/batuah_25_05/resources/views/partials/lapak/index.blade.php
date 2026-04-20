
@extends('theme::layouts.full-content')
@include('theme::commons.asset_peta')
@push('styles')
<style type="text/css">
#produk-list .flickity-prev-next-button{border-radius:100%;top:50%;-webkit-transform: translate3d(0, -50%, 0);-moz-transform: translate3d(0, -50%, 0);-ms-transform: translate3d(0, -50%, 0);-o-transform: translate3d(0, -50%, 0);transform: translate3d(0, -50%, 0);}
#produk-list .flickity-prev-next-button.previous{left:5px;}
#produk-list .flickity-prev-next-button.next{right:5px;}
.lapakname{text-align:center;}
.lapakname h2{font-size:120%;margin:10px 0;padding:0;line-height:1.1;}
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
					<div class="headstat-lebar flexcenter">
						<img src="{{ theme_asset('images/lapak.png') }}"/>
						<div>
						<h1 class="color-1">Lapak</h1>
						<h2>{{ ucwords(setting('sebutan_desa')) }}</h2>
						</div>
					</div>
					<div class="pagebox">
						<div class="flexcenter" style="margin-bottom:20px;">
							<form id="form-cari" class="form-inline text-center">
							<div class="row" style="margin:0 -5px;">
								<div class="col-lg-5 col-sm-12" style="padding:0 5px;margin:3px 0;">
									<select class="form-control select2" id="id_kategori" name="id_kategori">
										<option selected value="">Semua Kategori</option>
									</select>
								</div>
								<div class="col-lg-7 col-sm-12" style="padding:0 5px;margin:3px 0;">
									<div class="flexcenter">
									<input type="text" id="search" name="search" maxlength="50" class="form-control" placeholder="Cari Produk">
									<button type="button" id="btn-cari" class="btn btn-primary">Cari</button>
									<button type="button" id="btn-semua" class="btn btn-success" style="display: none;">Tampil Semua</button>
									</div>
								</div>
							</div>
						</form>
						</div>
						<div class="rowsame margin-minlr-5" id="produk-list">

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
<div class='modal fade' id="modalLokasi" tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                <h4 class='modal-title'></h4>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        var apiKategori = '{{ route("api.lapak.kategori") }}';
        $.get(apiKategori, function (data) {
            var kategori = data.data;
            var select = $('#id_kategori');
            kategori.forEach(function (item) {
                select.append('<option value="' + item.id + '">' + item.attributes.kategori + '</option>');
            });
        });

        function loadProduk(params = {}) {
            
            var apiProduk = '{{ route("api.lapak.produk") }}';

            $('#pagination-container').hide();

            $.get(apiProduk, params, function (data) {
                var produk = data.data;
                var produkList = $('#produk-list');

                produkList.empty();

                if (!produk.length) {
                    produkList.html('<p class="text-center">Tidak ada produk yang ditemukan.</p>');
                    return;
                }

                produk.forEach(function (item) {
                    var fotoHTML = '';
                    var fotoList = item.attributes.foto;

                    fotoList.forEach(function (fotoItem) {
                        fotoHTML += `
                            <div class="bcarousel-part">
								<a href="${fotoItem}"  data-fancybox="images">
                                <div class="image-lapak">
                                    <img src="${fotoItem}" alt="Foto Produk">
                                </div>
								</a>
                            </div>
                        `;
                    });

                    fotoHTML += '';

                    var hargaDiskon = formatRupiah(item.attributes.harga_diskon, 'Rp ');
                    var hargaAwal = formatRupiah(item.attributes.harga, 'Rp ');
                    var viewDiskon = (hargaAwal === hargaDiskon) ? `` : `<s class="text-xs text-red-500">${hargaAwal}</s>`;

                    var produkHTML = `
                    
                        <div class="lapak-col bordergrey1">
							<div class="hiddenrelative forhover">
                           <div class="bcarousel js-flickity" data-flickity='{ "autoPlay": true, "cellAlign": "left", "wrapAround": true }'>${fotoHTML}</div>
						   
						   </div>
						   <div class="lapakname">
								<h2 class="hover-height">${item.attributes.nama}</h2>
							</div>
							<div class="hiddenrelative margin-topbottom-10">
								<div class="harga-produk flexcenter" style="text-align:center;">
									<div>
									<p>
										<font style="color:red; text-decoration: line-through red;">${hargaAwal}</font>
									</p>
									<p class="color-2"><b>Harga: ${hargaDiskon}</b></p>	
									</div>
								</div>
							</div>
							<div class="flexcenter lapakinfo" style="text-align:center;">
									<div>
									<p class="desktop-only" style="margin-top:10px;">Pelapak : ${item.attributes.pelapak.penduduk.nama ?? 'Admin'}</p>
									<p style="margin:0 10px;margin-top:10px;">${item.attributes.deskripsi}</p>
									</div>
								</div>
							<div class="lapak-open flexcenter">
									

									<a href="${item.attributes.pesan_wa}" rel="noopener noreferrer" target="_blank" title="WhatsApp"><div class="lapak-open-item bordergrey1 flexcenter"><div class="lapak-icon bghijau flexcenter"><svg viewBox="0 0 24 24"><path d="M12,13A5,5 0 0,1 7,8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H17A5,5 0 0,1 12,13M12,3A3,3 0 0,1 15,6H9A3,3 0 0,1 12,3M19,6H17A5,5 0 0,0 12,1A5,5 0 0,0 7,6H5C3.89,6 3,6.89 3,8V20A2,2 0 0,0 5,22H19A2,2 0 0,0 21,20V8C21,6.89 20.1,6 19,6Z" /></svg></div><p>Beli</p></div></a>
									
									<div class="lapak-open-item bordergrey1 flexcenter" data-remote="false" data-toggle="modal" data-target="#modalLokasi" title="Lokasi" data-lat="${item.attributes.pelapak.lat}" data-lng="${item.attributes.pelapak.lng}" data-zoom="${item.attributes.pelapak.zoom}" data-title="Lokasi ${item.attributes.pelapak.penduduk.nama}"><div class="lapak-icon bgbiru flexcenter"><svg viewBox="0 0 24 24"><path d="M12,2C15.31,2 18,4.66 18,7.95C18,12.41 12,19 12,19C12,19 6,12.41 6,7.95C6,4.66 8.69,2 12,2M12,6A2,2 0 0,0 10,8A2,2 0 0,0 12,10A2,2 0 0,0 14,8A2,2 0 0,0 12,6M20,19C20,21.21 16.42,23 12,23C7.58,23 4,21.21 4,19C4,17.71 5.22,16.56 7.11,15.83L7.75,16.74C6.67,17.19 6,17.81 6,18.5C6,19.88 8.69,21 12,21C15.31,21 18,19.88 18,18.5C18,17.81 17.33,17.19 16.25,16.74L16.89,15.83C18.78,16.56 20,17.71 20,19Z" /></svg></div><p>Lokasi</p></div>					
							</div>
							
                        </div>
                    

                    `;

                    produkList.append(produkHTML);
                });
				$('.bcarousel').flickity({
  // options
  cellAlign: 'left',
  contain: true
});
                $('.slick_slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-chevron-left"></i></button>',
                    nextArrow: '<button type="button" class="slick-next"><i class="fa fa-chevron-right"></i></button>',
                    dots: true,
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 2000,
                    responsive: [{
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            arrows: false
                        }
                    }]
                });
                
                initPagination(data);

                $('.slick_slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: true,
                    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
                    nextArrow: '<button type="button" class="slick-next">Next</button>',
                    responsive: [
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        }

        $('#btn-cari').on('click', function () {
            var params = {};
            var kategori = $('#id_kategori').val();
            var search = $('#search').val();

            if (kategori) {
                params['filter[id_produk_kategori]'] = kategori;
            }

            if (search) {
                params['filter[search]'] = search;
            }

            console.log(params);
            
            
            loadProduk(params);

            $('#btn-semua').show();
        });

        $('.pagination').on('click', '.btn-page', function() {
            var params = {};
            var page = $(this).data('page');
            var kategori = $('#id_kategori').val();
            var search = $('#search').val();

            if (kategori) {
                params['filter[id_produk_kategori]'] = kategori;
            }

            if (search) {
                params['filter[search]'] = search;
            } 

            params['page[number]'] = page;

            loadProduk(params);
        });

        $('#btn-semua').on('click', function () {
            loadProduk();
            $('#btn-semua').hide();
            $('#search').val('');
            $('#id_kategori').val('');
        });

        $('#search').keypress(function (e) {
            if (e.which == 13) {
                e.preventDefault();
                $('#btn-cari').trigger('click');
            }
        });

        loadProduk();

        $('#modalLokasi').on('shown.bs.modal', function (event) {
            const link = $(event.relatedTarget);
            const modal = $(this);

            modal.find('.modal-title').text(link.data('title'));
            modal.find('.modal-body').html("<div id='map' style='width: 100%; height:350px'></div>");

            const posisi = [link.data('lat'), link.data('lng')];
            const zoom = link.data('zoom') || 10;
            const popupContent = link.closest('.this-product').find('.detail').html();

            const mapOptions = {
                maxZoom: setting.max_zoom_peta, 
                minZoom: setting.min_zoom_peta
            };

            $('#lat').val(posisi[0]);
            $('#lng').val(posisi[1]);

            if (window.pelapak) {
                window.pelapak.remove();
            }

            window.pelapak = L.map('map', mapOptions).setView(posisi, zoom);
            getBaseLayers(window.pelapak, setting.mapbox_key, setting.jenis_peta);

            const markerIcon = L.icon({
                iconUrl: setting.icon_lapak_peta
            });

            L.marker(posisi, { icon: markerIcon }).addTo(window.pelapak).bindPopup(`
                <div class="card">
                    <div class="text-xs">
                        <div class="py-1 space-y-1/2 text-sm flex flex-col">
                            ${popupContent}
                        </div>
                    </div>
                </div>
            `);

            L.control.scale().addTo(window.pelapak);

            window.pelapak.invalidateSize();
        });
    });
	var config=@json(identitas());
</script>
@endpush