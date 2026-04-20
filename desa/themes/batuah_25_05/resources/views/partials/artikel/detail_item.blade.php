<div id="printthis">
	<div class="forprint">
		<div class="print-header flexleft">
			<img src="{{ gambar_desa($desa['logo']) }}"/>
			<div>
				<h2>{{ ucwords($setting->website_title) }}</h2>
				<h1>{{ ucwords(setting('sebutan_desa')) }} {{ ucwords($desa['nama_desa']) }}</h1>
				<h2>{{ ucwords(setting('sebutan_kecamatan')) }} {{ ucwords($desa['nama_kecamatan']) }}, {{ ucwords(setting('sebutan_kabupaten')) }} {{ ucwords($desa['nama_kabupaten']) }} - {{ $desa['kode_propinsi'] }}</h2>
			</div>
		</div>
	</div>

	<div class="forprint">
		<div class="print-body">
			<div class="print-headcontent">{{ $single_artikel["judul"] }}</div>
			<div class="flexleft">
				<p>{{ $single_artikel['owner'] }} | {{ $single_artikel['tgl_upload_local'] }} | {{ hit($single_artikel['hit']) }} Dibaca</p>
			</div>
			<div class="print-content">
				@if ($single_artikel['gambar'] != '' and is_file(LOKASI_FOTO_ARTIKEL . "sedang_" . $single_artikel['gambar']))
					<img style="width:100%;height:auto;margin:0 0 10px;" src="{{ AmbilFotoArtikel($single_artikel['gambar'], 'sedang') }}" />
				@endif
			</div>
		</div>
	</div>


	<div class="col-default">
		<div class="bodypage bgwhite bordergrey">
			<div class="center-head bggrad-color2 flexcenter noprint">
				<div class="icon-titlepage bgcolor-1 flexcenter"><svg viewBox="0 0 24 24">
						<path d="M3,4H7V8H3V4M9,5V7H21V5H9M3,10H7V14H3V10M9,11V13H21V11H9M3,16H7V20H3V16M9,17V19H21V17H9" />
					</svg></div>
				<h1>Artikel</h1>
			</div>
			<div class="pagebox artikelpage">
				<div class="headcontent noprint">{{ $single_artikel["judul"] }}</div>
				<div class="artikelhome-info noprint">
					<div class="artikelmeta flexleft"><i class="fa fa-user flexleft"></i>
						<p>{{ $single_artikel['owner'] }}</p>
					</div>
					<div class="artikelmeta flexleft"><i class="fa fa-calendar flexleft"></i>
						<p>{{ $single_artikel['tgl_upload_local'] }}</p>
					</div>
					<div class="artikelmeta flexleft"><i class="fa fa-eye flexleft"></i>
						<p>{{ hit($single_artikel['hit']) }} Dibaca</p>
					</div>
				</div>

				@if ($single_artikel['gambar1'] != '' and is_file(LOKASI_FOTO_ARTIKEL . "sedang_" . $single_artikel['gambar1']))
					<div class="image-area noprint">
						<div class="margin-minlr-5">
							<div class="bcarousel js-flickity" data-flickity='{ "autoPlay": false, "groupCells": true, "groupCells": 2, "cellAlign": "left", "wrapAround": false }'>
								@if ($single_artikel['gambar'] != '' and is_file(LOKASI_FOTO_ARTIKEL . "sedang_" . $single_artikel['gambar']))
									<div class="bcarousel-part">
										<div class="margin-lr-5">
											<a href="{{ AmbilFotoArtikel($single_artikel['gambar'], 'sedang') }}" data-fancybox="images">
												<div class="image-artikel-page">
													<img src="{{ AmbilFotoArtikel($single_artikel['gambar'], 'sedang') }}" />
												</div>
											</a>
										</div>
									</div>
								@endif
								@if ($single_artikel['gambar1'] != '' and is_file(LOKASI_FOTO_ARTIKEL . "sedang_" . $single_artikel['gambar1']))
									<div class="bcarousel-part">
										<div class="margin-lr-5">
											<a href="{{ AmbilFotoArtikel($single_artikel['gambar1'], 'sedang') }}" data-fancybox="images">
												<div class="image-artikel-page">
													<img src="{{ AmbilFotoArtikel($single_artikel['gambar1'], 'sedang') }}" />
												</div>
											</a>
										</div>
									</div>
								@endif
								@if ($single_artikel['gambar2'] != '' and is_file(LOKASI_FOTO_ARTIKEL . "sedang_" . $single_artikel['gambar2']))
									<div class="bcarousel-part">
										<div class="margin-lr-5">
											<a href="{{ AmbilFotoArtikel($single_artikel['gambar2'], 'sedang') }}" data-fancybox="images">
												<div class="image-artikel-page">
													<img src="{{ AmbilFotoArtikel($single_artikel['gambar2'], 'sedang') }}" />
												</div>
											</a>
										</div>
									</div>
								@endif
								@if ($single_artikel['gambar3'] != '' and is_file(LOKASI_FOTO_ARTIKEL . "sedang_" . $single_artikel['gambar3']))
									<div class="bcarousel-part">
										<div class="margin-lr-5">
											<a href="{{ AmbilFotoArtikel($single_artikel['gambar3'], 'sedang') }}" data-fancybox="images">
												<div class="image-artikel-page">
													<img src="{{ AmbilFotoArtikel($single_artikel['gambar3'], 'sedang') }}" />
												</div>
											</a>
										</div>
									</div>
								@endif
							</div>
						</div>
					</div>
				@else
					@if ($single_artikel['gambar'] != '' and is_file(LOKASI_FOTO_ARTIKEL . "sedang_" . $single_artikel['gambar']))
						<div class="image-area noprint">
							<a href="{{ AmbilFotoArtikel($single_artikel['gambar'], 'sedang') }}" data-fancybox="images">
								<div class="image-nocrop">
									<img src="{{ AmbilFotoArtikel($single_artikel['gambar'], 'sedang') }}" />
								</div>
							</a>
						</div>
					@endif
				@endif

				@if ($single_artikel['dokumen'] != '' and is_file(LOKASI_DOKUMEN . $single_artikel['dokumen']))
					<div class="lampiran flexcenter noprint" style="padding-top:15px;">
						<div>
							<a href="{{ ci_route("first.unduh_dokumen_artikel.{$single_artikel[' id']}") }}' title="">{{ $single_artikel['link_dokumen'] }}" title="">
								<div class="flexcenter">
									<div class="b-btn bgcolor-1 flexcenter"><i class="fa fa-download"></i>&nbsp;<p>Download</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				@endif
				@if ($single_artikel['tipe'] == 'agenda')
					<div class="agendapage">
						<table class="tablepage-noline" style="width:100%;">
							<tr>
								<td>Tanggal</td>
								<td style="width:20px;text-align:center;">:</td>
								<td>{{ tgl_indo2($single_artikel['tgl_upload']) }}</td>
							</tr>
							<tr>
								<td>Tempat</td>
								<td style="width:20px;text-align:center;">:</td>
								<td>{{ $detail_agenda['lokasi_kegiatan'] }}</td>
							</tr>
							<tr>
								<td>Koordinator</td>
								<td style="width:20px;text-align:center;">:</td>
								<td>
									@if ($detail_agenda['koordinator_kegiatan'])
										{{ $detail_agenda['koordinator_kegiatan'] }}
									@else
										-
									@endif
								</td>
							</tr>
						</table>
					</div>
				@endif
				<div class="isicontent">

					{!! $single_artikel["isi"] !!}
				</div>
				<div class="toshare noprint">
					@php
					$share = [
					'link' => $single_artikel['url_slug'],
					'judul' => htmlspecialchars($single_artikel["judul"]),
					];
					@endphp

					@include('theme::commons.share', $share)
				</div>
				@include('theme::partials.artikel.comment')
				
			</div>
			<div class="printpdf2">
			</div>
		</div>
	</div>
</div>

@include('theme::plus/print/print_set')

<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
	function printDiv(elementId) {
	 var a = document.getElementById('printing-css').value;
	 var b = document.getElementById(elementId).innerHTML;
	 window.frames["print_frame"].document.title = document.title;
	 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
	 window.frames["print_frame"].window.focus();
	 window.frames["print_frame"].window.print();
	}
</script>