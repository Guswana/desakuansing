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
						<img src="{{ theme_asset('images/pengaduan2.png') }}"/>
						<div>
						<h2>Layanan</h2>
						<h1 class="color-1">Pengaduan</h1>
						</div>
					</div>
					<div class="pagebox">
						<div class="filterpengaduan" style="width:100%;margin:0 0 20px;">
						<div class="row" style="margin:0 -5px;">
							<div class="col-md-4 col-xs-12" style="padding:0 5px;margin:2px 0;">
								<button type="button" class="b-btn bgcolor-1 flexcenter" style="cursor:pointer;position:relative;z-indek:20;display:block;width:100%;" data-toggle="modal" data-target="#newpengaduan">Formulir Pengaduan</button>
							</div>
							<div class="col-md-4 col-xs-12" style="padding:0 5px;margin:2px 0;">
								<select class="form-control select2" id="caristatus" name="caristatus" style="width:100%;">
										<option value="">Semua Status</option>
										<option value="1">Menunggu Diproses</option>
										<option value="2">Sedang Diproses</option>
										<option value="3">Selesai Diproses</option>
									</select>
							</div>
							<div class="col-md-4 col-xs-12" style="padding:0 5px;margin:2px 0;">
								<div class="input-group">
										<input type="text" name="cari-pengaduan" value="{{ $cari }}" placeholder="Cari pengaduan disini..." class="form-control">
										<span class="input-group-btn">
											<button type="button" id="btn-search" class="b-btn bgcolor-1 flexcenter" style="margin:0 0 0 5px;color:#fff;"><svg style="width:24px;fill:#fff;" viewBox="0 0 24 24"><path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" /></svg></button>								
										</span>
									</div>
							</div>
						</div>
						</div>
					
						@include('theme::commons.notifikasi')
						<div id="pengaduan-list"></div>	
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

<div class="lapakdetail-modal">
<div class="modal center fade" id="pengaduan-detail" tabindex="-1" role="dialog" aria-labelledby="pengaduan-detail" aria-hidden="true">
	
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modalhead bgcolor-1 flexcenter" style="position:relative;overflow:hidden;"><h1>Detail Pengaduan</h1></div>

				<div class="modal-body">
					
				</div>
				<div class="modal-footer difle-r">
					<div class="modalfoot bggrey1 bordergrey1 flexcenter" data-dismiss="modal" aria-label="Close">
												<div class="close-btn bgcolor-1"></div>
											</div>	
				</div>
			</div>
		</div>
</div>	
</div>

<div class="lapakdetail-modal">
<div class="modal center fade bgmodalcolor1" id="newpengaduan" role="dialog" aria-labelledby="lapor" aria-hidden="true">	
	<div class="modal-dialog bggrey1" role="document">
		<div class="modal-absolute bgwhite bordergrey1">
			<div class="modalhead bgcolor-1 flexcenter"><h1>Buat Pengaduan</h1></div>
			<div class="inner-modal" style="border-radius:0;">
				<div class="scroll-area" id="scrollstyle">
					<div class="lapakdetail">
						<form action="{{ $form_action }}" method="POST" enctype="multipart/form-data">
							<div class="modal-body">
								<!-- Notifikasi -->
								@include('theme::commons.notifikasi')
								@php $data = 	session('data', []) @endphp
								<label style="font-size:95%;margin:0;padding:0;line-height:1.1;font-weight:500;">Masukkan NIK</label>
								<input name="nik" type="text" maxlength="16" class="form-control bordergrey" placeholder="NIK" value="{{ $data['nik'] }}" style="margin:0 0 5px;">
					
							<label style="font-size:95%;margin:0;padding:0;line-height:1.1;font-weight:500;">Masukkan Nama</label>
							<input name="nama" type="text" class="form-control bordergrey" placeholder="Nama*" value="{{ $data['nama'] }}" required style="margin:0 0 5px;">
							
					
					<label style="font-size:95%;margin:0;padding:0;line-height:1.1;font-weight:500;">Masukkan Email</label>
					<input name="email" type="email" class="form-control bordergrey" placeholder="Email" value="{{ $data['email'] }}" style="margin:0 0 5px;">
					
					<label style="font-size:95%;margin:0;padding:0;line-height:1.1;font-weight:500;">Masukkan No. Telp.</label>
					<input name="telepon" type="text" class="form-control bordergrey" placeholder="Telepon" value="{{ $data['telepon'] }}" style="margin:0 0 5px;">

					<label style="font-size:95%;margin:0;padding:0;line-height:1.1;font-weight:500;">Judul Pengaduan</label>
					<input name="judul" type="text" class="form-control bordergrey" placeholder="Judul*" value="{{ $data['judul'] }}" required style="margin:0 0 5px;">
					
					<label style="font-size:95%;margin:0;padding:0;line-height:1.1;font-weight:500;">Isi/detail Pengaduan</label>
					<textarea style="line-height:1;min-height:10vh;" name="isi" class="form-control bordergrey" placeholder="Isi Pengaduan*" rows="5" required>{{ $data['isi'] }}</textarea>

								<div class="form-group" style="margin:10px 0 10px !important;">
									<div class="flexcenter" style="margin:0 0 10px;">
										<input type="text" accept="image/*" onchange="readURL(this);" class="form-control bordergrey" id="file_path" placeholder="Unggah Foto" name="foto" value="{{ $data['foto'] }}">
										<input type="file" accept="image/*" onchange="readURL(this);" class="hidden" id="file" name="foto" value="{{ $data['foto'] }}">
										
											<button type="button" class="b-btn bgcolor-1 flexcenter" style="margin:0 5px;" id="file_browser"><svg viewBox="0 0 24 24" style="width:24px;fill:#fff;"><path d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z" /></svg></button>
									
									</div>

									<img id="blah" src="#" alt="gambar" class="img-responsive hidden" />
								</div>
								<div class="form-group" style="margin:0;">
									<div class="width-default relative-hidden">
									<div class="rowsame" style="margin:0 -5px;">
										<div class="image-captha2 bordergrey1 flexcenter">
											<a href="#" id="b-captcha" style="color: #000000;">
													<img id="captcha" src="{{ ci_route('captcha')  }}" onclick="document.getElementById('captcha').src = '{{ ci_route('captcha')  }}?' + Math.random();" alt="CAPTCHA Image" />
												</a>
										</div>
										
											<input type="text" name="captcha_code" class="captha-isi2 bordergrey1 flexcenter" maxlength="6" placeholder="Masukkan kode" required />
										
									</div>
									</div>
								</div>
							</div>
							<div class="width-default flexcenter" style="padding:15px 0 !important;color:#fff;">

								<button type="submit" class="b-btn bgcolor-1 flexcenter" style="margin-bottom:50px;"><i class="fa fa-pencil"></i><p style="margin-left:5px;">Kirim</p></button>
							</div>
							
						</form>
					</div>	
				</div>
			</div>
			<div class="modalfoot bggrey1 bordergrey1 flexcenter" data-dismiss="modal" aria-label="Close">
				<div class="close-btn bgcolor-1"></div>
			</div>	
		</div>
	</div>
</div>	
</div>
@endsection

@push('scripts')
<script src="{{ theme_asset('js/pagination.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function() {
		const pageSize = 10
		let pageNumber = 1
		let status = ''
		let cari = $('input[name=cari-pengaduan]').val()
		window.setTimeout(function() {
			$("#notifikasi").fadeTo(500, 0).slideUp(500, function() {
				$(this).remove();
			});
		}, 2000);

		var data = {{ count(session('data') ?? [])  }};
		if (data) {
			$('#newpengaduan').modal('show');
		}

		$('#btn-search').click(function(){
			pageNumber = 1
			cari = $('input[name=cari-pengaduan]').val()
			status = $('#caristatus').val()
			loadPengaduan(pageNumber)
		})

		const loadPengaduan = function (pageNumber) {
			let _filter = []
			if(status){
				_filter.push('filter[status]='+status)  
			}
			if(cari){
				_filter.push('filter[search]='+cari)				
			}
			let _filterString = _filter.length ? _filter.join('&') : '' 			
			$.ajax({
				url: `{{ ci_route('internal_api.pengaduan') }}?sort=-created_at&page[number]=${pageNumber}&page[size]=${pageSize}&${_filterString}`,
				type: "GET",
				beforeSend: function(){
					const pengaduanList = document.getElementById('pengaduan-list');
					pengaduanList.innerHTML = `<div class="fa fa-circle-o-notch fa-spin fa-4x" role="status">
										<span class="sr-only">Loading...</span>
										</div>`;
				},
				dataType: 'json',
				data: {
					
				},
				success: function (data) {
					displayPengaduan(data);
					const pagination = new Pagination(document.getElementById('pagination'))
					pagination.generatePagination(data, loadPengaduan)
				}
			});
		}

		const displayPengaduan = function (dataPengaduan) {
			const pengaduanList = document.getElementById('pengaduan-list');
			pengaduanList.innerHTML = '';
			if(!dataPengaduan.data.length) {
				pengaduanList.innerHTML = `<div class="alert alert-info" role="alert">Data tidak tersedia</div>`
				return
			}
			const ulBlock = document.createElement('ul');
			ulBlock.className = 'list-group fa-padding';
			dataPengaduan.data.forEach(item => {
				const card = document.createElement('li');
				const labelComment = `<span class="badge badge-`+ (item.attributes.child_count ? 'bgtoska' : 'bgpink')+ ` pull-right"><i class="fa fa-comments"></i> ${item.attributes.child_count} Tanggapan</span>`
				const isi = `<span>${item.attributes.isi.substring(0,50)}`+ (item.attributes.isi.length > 50 ? `<label class="text-info" style="margin-left:5px;">selengkapnya...</label>`: '') +`</span>`
				const image  = item.attributes.foto ? `<img class="img-thumbnail" src="${item.attributes.foto}" alt="Foto Pengaduan">` : ``
				let labelStatus;
				switch(item.attributes.status){
					case 1:
						labelStatus = `<span class="badge bgorange" style="margin-left:5px;margin-right:5px;font-weight:normal;">Menunggu Diproses</span>`
						break;
					case 2:
						labelStatus = `<span class="badge bgbiru" style="margin-left:5px;margin-right:5px;font-weight:normal;">Sedang Diproses</span>`
						break;
					case 3:
						labelStatus = `<span class="badge bghijau" style="margin-left:5px;margin-right:5px;font-weight:normal;">Selesai Diproses</span>`
						break;
				}
				card.className = `list-group-item status${item.attributes.status} allstatus`;				
				card.innerHTML = `
					<div class="listrow bordergrey1">
						<div class="listrow-image">
							<div class="foto-pengaduan"><img src="{{ theme_asset('images/svgfile/pelapor.svg') }}"/></div>
						</div>
						<div class="listrow-title">
							<h2>Pelapor : ${item.attributes.nama}</h2>
							<div class="info flexleft mb-10" style="width:100%;font-size:90%;">
								<div class="flexleft" style="margin:2px 0;"><i class="fa fa-calendar flexleft" style="margin-right:5px;"></i>${item.attributes.created_at}</div>
								<div class="flexleft" style="margin:2px 0;">
									${labelStatus}
									${labelComment}
								</div>
							</div>
							<h3 style="margin:5px 0 5px;"><b>${item.attributes.judul}</b></h3>
							<p>${isi}</p>
						</div>
					</div>									
				`;
				card.onclick = function(){
					let _comments = []
					const image  = item.attributes.foto ? `<img class="img-thumbnail" src="${item.attributes.foto}" alt="Foto Pengaduan">` : ``
					if(item.attributes.child_count){
						item.attributes.child.forEach(comment => {
							_comments.push(`
							<table class="identitas-table" style="margin:10px 0;">
								<tr>
									<td style="border:none;">Ditanggapi oleh</td><td style="width:15px;text-align:center;border:none;">:</td><td style="border:none;">${comment.nama}</td>
								</tr>
								<tr>
									<td style="border:none;">Tanggal</td><td style="width:15px;text-align:center;border:none;">:</td><td style="border:none;">${comment.created_at}</td>
								</tr>
								<tr>
									<td style="border:none;">Tanggapan</td><td style="width:15px;text-align:center;border:none;">:</td><td style="border:none;">${comment.isi}</td>
								</tr>
							</table>
							`)		
						});
					}
					const htmlBody = `
					<div class="row">
						<div class="col-md-12">
							${image}
							<table class="identitas-table" style="margin:10px 0;">
								<tr>
									<td style="border:none;vertical-align:top;">Oleh</td><td style="width:15px;text-align:center;border:none;">:</td><td style="border:none;">${item.attributes.nama}</td>
								</tr>
								<tr>
									<td style="border:none;vertical-align:top;">Tgl.</td><td style="width:15px;text-align:center;border:none;">:</td><td style="border:none;">${item.attributes.created_at}</td>
								</tr>
								<tr>
									<td style="border:none;vertical-align:top;">Isi</td><td style="width:15px;text-align:center;border:none;">:</td><td style="border:none;vertical-align:top;">${item.attributes.isi}</td>
								</tr>
							</table>							
						</div>
					</div> ${_comments.join('')}`;
										
					$('#pengaduan-detail').modal('show')
					$('#pengaduan-judul').text(item.attributes.judul)

					$('#pengaduan-detail .modal-body').html(htmlBody)
					
					<?php foreach ($pengaduan_balas as $keyna => $valuena) : ?>
					<?php if ($valuena['id_pengaduan'] && $valuena['id_pengaduan'] == $value['id']) : ?>
					
					<?php endif; ?>
					<?php endforeach; ?>
				}				
				pengaduanList.appendChild(card);
			});
		}		

		loadPengaduan(pageNumber);
	});
	var config=@json(identitas());
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#blah').removeClass('hidden');
				$('#blah').attr('src', e.target.result).width(150).height(auto);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
@endpush