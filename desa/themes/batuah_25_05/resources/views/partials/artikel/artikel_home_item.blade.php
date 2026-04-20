@php $abstrak = potong_teks($post['isi'], 550) @endphp

@if ($artikel)
<div class="rowsame margin-minlr-5">
	@foreach ($artikel as $post)
		<div class="articlerow-box bggrad-grey1 forhover">
			<div class="artikelhome-image">
				<div class="image-artikelhome">
					@if (is_file(LOKASI_FOTO_ARTIKEL.'kecil_'.$post['gambar']))
						<img src="{{ AmbilFotoArtikel($post['gambar'], 'sedang') }}">
					@else
						<img src="{{ theme_asset('images/pengganti.jpg') }}"/>
						<div class="logo-no-image"><img src="{{ gambar_desa($desa['logo']) }}"/></div>
					@endif
					<div class="hiderow artikel-date flexleft">
						<div class="metadate bgorange flexcenter">{{ date('d',strtotime($post['tgl_upload'])) }}</div>
						<div class="metanext flexleft">{{ date('M Y',strtotime($post['tgl_upload'])) }}</div>
					</div>
					<div class="hoverimage flexcenter">
						<div class="hoverimage-left bgcolor-1 hover-width"></div>
						<div class="hoverimage-right bgcolor-1 hover-width"></div>
						<div>
							@if (is_file(LOKASI_FOTO_ARTIKEL.'kecil_'.$post['gambar']))
							<a href="{{ AmbilFotoArtikel($post['gambar'], 'sedang') }}"  data-fancybox="images" data-caption="{{ $post['judul'] }}">
							<div class="hoverimage-icon flexcenter hover-height">
							<svg viewBox="0 0 24 24"><path d="M9.5,13.09L10.91,14.5L6.41,19H10V21H3V14H5V17.59L9.5,13.09M10.91,9.5L9.5,10.91L5,6.41V10H3V3H10V5H6.41L10.91,9.5M14.5,13.09L19,17.59V14H21V21H14V19H17.59L13.09,14.5L14.5,13.09M13.09,9.5L17.59,5H14V3H21V10H19V6.41L14.5,10.91L13.09,9.5Z"/></svg>
							</div>
							</a>
							@endif
							<a href="{{ $post->url_slug }}">
							<div class="hoverimage-icon flexcenter hover-height">
							<svg viewBox="0 0 24 24"><path d="M20,18H22V6H20M11.59,7.41L15.17,11H1V13H15.17L11.59,16.58L13,18L19,12L13,6L11.59,7.41Z"/></svg>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="artikelhome-text">
				<a href="{{ $post->url_slug }}">
				<h3>{{ $post['judul'] }}</h3>
				</a>
				<div class="desktop-only">
				<div class="artikelhome-info flexleft">
					<div class="artikelmeta flexleft"><i class="fa fa-user flexleft"></i><p>Admin : {{ $post['owner'] }}</p></div>
				</div>
				</div>
				<div class="artikelhome-info flexleft">
					<div class="artikelmeta flexleft"><i class="fa fa-eye flexleft"></i><p>{{ hit($post['hit']) }} dibuka</p></div>
					<div class="artikelmeta flexleft"><i class="fa fa-comments flexleft"></i><p>{{ $post->jumlah_komentar }}</p></div>
				</div>
			</div>
			<div class="artikelhome-link bgwhite bordergrey">
				<div class="rowsame">
					<div class="artikelhome-link-col" style="width:100%;">
					<a href="{{ $post->url_slug }}">
						<div class="artikelhome-link-item2 flexcenter">
						<i class="fa fa-external-link flexleft"></i><p>Buka Halaman</p>
						</div>
					</a>
					</div>
				</div>
			</div>
		</div>
		
	@endforeach
</div>
<div class="row">
<div class="col-sm-12">
	<div class="flexcenter">@include('theme::commons.page')</div>
</div>
</div>
@else
	<div class="widget-inner" style="padding:15px 0;">
		<div class="nodata-small flexcenter">
			<img src="{{ theme_asset('images/pngfile/nodata-small.png') }}" />
			<p style="color:#fff;">Belum ada agenda terdata</p>
		</div>
	</div>
@endif