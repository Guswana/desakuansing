@if (!empty($komentar))
					<div class="comment noprint">
						<div class="headborder bordergrey flexleft" style="padding-bottom:5px;">
							<h3>Komentar</h3>
						</div>
						@foreach ($komentar as $data)
							<div class="comment-row" style="width:100%;">
								<div class="responden flexleft">
									<svg viewBox="0 0 24 24">
										<path d="M20,2H4A2,2 0 0,0 2,4V16A2,2 0 0,0 4,18H8L12,22L16,18H20A2,2 0 0,0 22,16V4A2,2 0 0,0 20,2M12,4.3C13.5,4.3 14.7,5.5 14.7,7C14.7,8.5 13.5,9.7 12,9.7C10.5,9.7 9.3,8.5 9.3,7C9.3,5.5 10.5,4.3 12,4.3M18,15H6V14.1C6,12.1 10,11 12,11C14,11 18,12.1 18,14.1V15Z" />
									</svg>
									<div>
										<h3><b>{{ $data['pengguna']['nama'] }}</b></h3>
										<h3>{{ tgl_indo2($data['tgl_upload']) }}</h3>
									</div>
								</div>
								<p>{{ $data['komentar'] }}</p>
								@if (count($data['children']) > 0)
									@foreach ($data['children'] as $children)
										<div style="margin:10px 0 0 0;">
											<p><i class="fa fa-user"></i> <b>{{ $children['pengguna']['nama'] }}</b> ({{ $children['pengguna']['level'] }})</p>
											<p style="margin-left:55px;">{{ tgl_indo2($children['tgl_upload']) }}<br/>{{ $children['komentar'] }}</p>
										</div>
									@endforeach
								@endif
							</div>
							
						@endforeach
					</div>
				@endif

@if ($single_artikel['boleh_komentar'] == 1)
					<div class="comment noprint" id="kolom-komentar">
						<div class="flexcenter" style="text-align:center;">
							<div>
								@php
		$notif = session('notif');
		$label = ($notif['status'] == -1) ? 'label-danger' : 'label-info';
	@endphp
								@if ($notif)
									<p style="padding:0;margin:0;line-height:1.1;display:block;">{{ $notif['pesan'] }}</p>
								@endif
							</div>
						</div>
						<div class="headborder bordergrey flexleft" style="margin-top:10px;">
							<h1 class="bordercolor-1">Kirim Komentar</h1>
						</div>
						<div class="commentform">
							<form class="contact_form" id="validasi" name="form" action="{{ci_route("add_comment.{$single_artikel['id']}") }}" method="POST" onSubmit="return validasi(this);"> 
								<table class="tablecomment" style="width:100%;">
									<tr>
										<td class="label-formcomment"><b>Nama</b></td>
										<td>
											<input style="margin:5px 0 !important;" class="formcomment bordergrey flexleft" type="text" name="owner" maxlength="100" placeholder="wajib diisi..." value="{{ $notif['data']['owner'] }}" required>
										</td>
									</tr>
									<tr>
										<td class="label-formcomment"><b>Telp./HP</b></td>
										<td>
											<input style="margin:5px 0 !important;" class="formcomment bordergrey flexleft" type="text" name="no_hp" maxlength="15" placeholder="wajib diisi..." value="{{ $notif['data']['no_hp'] }}" required>
										</td>
									</tr>
									<tr>
										<td class="label-formcomment"><b>E-mail</b></td>
										<td>
											<input style="margin:5px 0 !important;" class="formcomment bordergrey flexleft" type="text" name="email" maxlength="100" placeholder="tidak wajib" value="{{ $notif['data']['email'] }}">
										</td>
									</tr>
								</table>
								<div class="rowsame">
									<div class="title-isi-komentar">
										<p style="margin:5px 0 2px;padding:0;line-height:1.2;font-weight:bold;">Komentar</p>
									</div>
									<div class="isi-komentar">
										<textarea class="bordergrey" name="komentar">{{ $notif['data']['komentar'] }}</textarea>
									</div>
								</div>
								<div class="rowsame">
									<div class="title-captha">
										<p style="margin:5px 0 2px;padding:0;line-height:1.2;font-weight:bold;">Captha</p>
									</div>
									<div class="captha-area">
										<div class="rowsame" style="margin:0 -3px;">
											<div class="imagecaptha bordergrey">
												<img id="captcha" src="{{ci_route('captcha') }}" alt="CAPTCHA Image" />
											</div>
											<div class="captha-refresh bordergrey flexcenter">
												<a href="#" onclick="document.getElementById('captcha').src = '{{ci_route('captcha') }}?' + Math.random();" alt="CAPTCHA Image">
														<path d="M19,8L15,12H18A6,6 0 0,1 12,18C11,18 10.03,17.75 9.2,17.3L7.74,18.76C8.97,19.54 10.43,20 12,20A8,8 0 0,0 20,12H23M6,12A6,6 0 0,1 12,6C13,6 13.97,6.25 14.8,6.7L16.26,5.24C15.03,4.46 13.57,4 12,4A8,8 0 0,0 4,12H1L5,16L9,12" />
													</svg></a>
											</div>
											<input type="text" name="captcha_code" class="captha-isi bordergrey flexcenter" maxlength="6" placeholder="Masukkan Kode"/>

											<input class="captha-send bgcolor-1 bordergrey flexcenter" type="submit" value="Kirim">

										</div>
									</div>
								</div>

							</form>
						</div>
					</div>
				@else
					<div class="comment noprint">
						<span class='info'></span>
					</div>
				@endif
				@if ($single_artikel['boleh_komentar'] == 1)
					<div class="comment noprint">
						<div class="headborder bordergrey flexleft">
							<h1 class="bordercolor-1">Komentar Facebook</h1>
						</div>
						<div class="fb-comments" data-href="{{ $single_artikel['url_slug'] }}" width="100%" data-numposts="5"></div>
					</div>
				@endif	