@push('styles')
<style type="text/css">
.gcolumn{display: flex;flex-flow: row wrap;justify-content: space-between center;margin:0 -5px;}
.menuflex {position:relative;width: calc(50% - 10px);margin:0 5px 10px;border-radius:5px;}
.menuflex-inner {border-radius:5px;color:#fff;padding:10px;line-height:1.2;font-size:100%;margin:0;text-align:center;}	
</style>
@endpush
	
<div class="headertop flexleft">
	<div class="flexcenter mb-menu" onclick="menuOpen()">
		<svg viewBox="0 0 24 24"><path d="M12 16C13.1 16 14 16.9 14 18S13.1 20 12 20 10 19.1 10 18 10.9 16 12 16M12 10C13.1 10 14 10.9 14 12S13.1 14 12 14 10 13.1 10 12 10.9 10 12 10M12 4C13.1 4 14 4.9 14 6S13.1 8 12 8 10 7.1 10 6 10.9 4 12 4M6 16C7.1 16 8 16.9 8 18S7.1 20 6 20 4 19.1 4 18 4.9 16 6 16M6 10C7.1 10 8 10.9 8 12S7.1 14 6 14 4 13.1 4 12 4.9 10 6 10M6 4C7.1 4 8 4.9 8 6S7.1 8 6 8 4 7.1 4 6 4.9 4 6 4M18 16C19.1 16 20 16.9 20 18S19.1 20 18 20 16 19.1 16 18 16.9 16 18 16M18 10C19.1 10 20 10.9 20 12S19.1 14 18 14 16 13.1 16 12 16.9 10 18 10M18 4C19.1 4 20 4.9 20 6S19.1 8 18 8 16 7.1 16 6 16.9 4 18 4Z" /></svg>
	</div>
	<div class="topdate flexleft">
		<div class="clock">
			<div class="wrap">
				<span class="hour"></span><span class="minute"></span><span class="second"></span><span class="dot"></span>
			</div>
		</div>
		<div class="desktop-only">
			<div id="topdate"></div>
		</div>
	</div>
	<div class="headertopright flexleft">
		@include('theme::plus.header_right')
		<div class="desktop-only flexcenter" data-toggle="modal" data-target="#visitor">
		<div class="itemtop bordergrey flexcenter tip-bottom" data-toggle="tooltip" data-original-title="Statistik Pengunjung" onclick="visitoropen()">
			<svg viewBox="0 0 24 24"><path d="M3,21H6V18H3M8,21H11V14H8M13,21H16V9H13M18,21H21V3H18V21Z"/></svg>
		</div>
		</div>
		<a class="desktop-only flexcenter" href="{{ site_url('siteman') }}">
		<div class="itemtop bordergrey flexcenter tip-bottom" data-toggle="tooltip" data-original-title="Login Administrator">
			<svg viewBox="0 0 24 24"><path d="M18,8A2,2 0 0,1 20,10V20A2,2 0 0,1 18,22H6C4.89,22 4,21.1 4,20V10A2,2 0 0,1 6,8H15V6A3,3 0 0,0 12,3A3,3 0 0,0 9,6H7A5,5 0 0,1 12,1A5,5 0 0,1 17,6V8H18M12,17A2,2 0 0,0 14,15A2,2 0 0,0 12,13A2,2 0 0,0 10,15A2,2 0 0,0 12,17Z"/></svg>
		</div>
		</a>
	</div>
</div>


<div class="bigmodal">
<div class="modal right fade" id="visitor" role="dialog" aria-labelledby="visitor" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog" role="document">
	<div class="modal-absolute bggrad-color2 bordergrey1">
		<div class="modalhead bgcolor-1 flexcenter"><h1>Statistik Pengunjung</h1></div>
		<div class="inner-modal">
		<div class="padding-10">
			@include('theme::widgets.statistik_pengunjung')
		</div>	
		</div>
		<div class="modalfoot bgcolor-1 bordergrey1 flexcenter" data-dismiss="modal" aria-label="Close">
			<div class="close-btn bgcolor-1"></div>
		</div>	
	</div>
	</div>
</div>
</div>

<div class="modalcenter">
	<div class="modal fade" id="searching" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
		<div class="modal-dialog" style="background:rgba(0,0,0,0.8);">
			<div class="modal-absolute">
				<div class="searchfull flexcenter">
				<div>
				<div style="position:relative">
				<form method=get action="{{ site_url() }}">
					<input style="color:#000;" type="text" name="cari" maxlength="50" class="form-control bgcolor-1" value="{{ html_escape($cari) }}" placeholder="Cari Artikel">
					<button type="submit" class="to-search bgcolor-3 flexcenter">
						<svg x="0px" y="0px" viewBox="0 0 56.966 56.966">
						<path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23 s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92 c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17 s-17-7.626-17-17S14.61,6,23.984,6z"/>
						</svg>
					</button>
				</form>
				</div>
				<div class="flexcenter" data-dismiss="modal" aria-label="Close" style="margin-top:15px;">
					<div class="batal color-1">Batal</div><div class="close-btn bgcolor-1"></div>
				</div>	
				</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modalcenter">
	<div class="modal fade" id="multicolor" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
		<div class="modal-dialog" style="background:rgba(0,0,0,0.8);">
			<div class="modal-absolute">
				<div class="change-color">
				@include('theme::plus.change_color')
				<div class="change-color-close bgcolor-1 flexcenter" data-dismiss="modal" aria-label="Close"><svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="custom-modal1">
<div class="modal left fade bgmodalcolor1" id="identitas" role="dialog" aria-labelledby="identitas" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog bgwhite" role="document">
	<div class="modal-absolute bggrey1 bordergrey1">
		<div class="modalhead bgcolor-1 flexcenter"><h1>Identitas {{ ucwords(setting('sebutan_desa')) }}</h1></div>
		<div class="inner-modal">
		<div class="padding-10">
		<div class="withscroll-padding identitas">
			<table class="table-noline" width="100%">
				<tr><td>Nama {{ ucwords(setting('sebutan_desa')) }}</td><td style="width:10px;text-align:center;">:</td><td><b>{{ ucwords($desa['nama_desa']) }}</b></td></tr>
				<tr><td>Kode {{ ucwords(setting('sebutan_desa')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_desa'] }}</td></tr>
				<tr><td>{{ ucwords(setting('sebutan_kecamatan')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ ucwords($desa['nama_kecamatan']) }}</td></tr>
				<tr><td>Kode {{ ucwords(setting('sebutan_kecamatan')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_kecamatan'] }}</td></tr>
				<tr><td>{{ ucwords(setting('sebutan_kabupaten')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ ucwords($desa['nama_kabupaten']) }}</td></tr>
				<tr><td>Kode {{ ucwords(setting('sebutan_kabupaten')) }}</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_kabupaten'] }}</td></tr>
				<tr><td>Provinsi</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['nama_propinsi'] }}</td></tr>
				<tr><td>Kode Provinsi</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_propinsi'] }}</td></tr>
				<tr><td>Kode Pos</td><td style="width:10px;text-align:center;">:</td><td>{{ $desa['kode_pos'] }}</td></tr>
			</table>
		</div>	
		</div>	
		</div>
		<div class="modalfoot bgwhite bordergrey1 flexcenter" data-dismiss="modal" aria-label="Close">
			<div class="close-btn bgcolor-1"></div>
		</div>	
	</div>
	</div>
</div>
</div>

<div class="custom-modal1">
<div class="modal left fade bgmodalcolor1" id="lapor" role="dialog" aria-labelledby="lapor" aria-hidden="true" data-backdrop="false">
	<div class="modal-dialog bgwhite" role="document">
	<div class="modal-absolute bggrey1 bordergrey1">
		<div class="modalhead bgcolor-1 flexcenter"><h1>Kontak & Pengaduan</h1></div>
		<div class="inner-modal">
		<div class="scroll-area" id="scrollstyle">
			<div class="padding-10">
				<div class="withscroll-padding">
					<div class="pengaduan-pop">
						<div class="flexcenter" style="margin-bottom:15px;">
							<div>
								<div class="flexcenter"><img src="{{ theme_asset('images/pengaduan.png') }}" /></div>
								<h3>Jika ada saran, pertanyaan, keluhan maupun kritikan dan pengaduan silahkan ajukan dengan menggunakan layanan dibawah...</h3>
							</div>
						</div>
						@if ($desa['telepon'])
							<div class="footer-contact padding-topbottom-1 flexleft">
								<div class="contact-icon bg-color1 flexcenter">
									<svg viewBox="0 0 24 24" style="opacity:1;">
										<path d="M19,11H21V9H19M20,15.5C18.75,15.5 17.55,15.3 16.43,14.93C16.08,14.82 15.69,14.9 15.41,15.18L13.21,17.38C10.38,15.94 8.06,13.62 6.62,10.79L8.82,8.59C9.1,8.31 9.18,7.92 9.07,7.57C8.7,6.45 8.5,5.25 8.5,4A1,1 0 0,0 7.5,3H4A1,1 0 0,0 3,4A17,17 0 0,0 20,21A1,1 0 0,0 21,20V16.5A1,1 0 0,0 20,15.5M17,9H15V11H17M13,9H11V11H13V9Z" />
									</svg>
								</div>
								<p>{{ $desa['telepon'] }}</p>
							</div>
						@endif
						@if ($desa['email_desa'])
							<div class="footer-contact padding-topbottom-1 flexleft">
								<div class="contact-icon bg-color1 flexcenter">
									<svg viewBox="0 0 24 24" style="opacity:1;">
										<path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z" />
									</svg>
								</div>
								<p>{{ $desa['email_desa'] }}</p>
							</div>
						@endif

						<a href="{{ site_url('pengaduan') }}">
							<div class="footer-contact padding-topbottom-1 flexleft">
								<div class="contact-icon bg-color1 flexcenter">
									<svg viewBox="0 0 24 24" style="opacity:1;">
										<path d="M20 2V4L4 8V6H2V18H4V16L6 16.5V18.5C6 20.4 7.6 22 9.5 22S13 20.4 13 18.5V18.3L20 20V22H22V2H20M11 18.5C11 19.3 10.3 20 9.5 20S8 19.3 8 18.5V17L11 17.8V18.5Z" />
									</svg>
								</div>
								<p><b>Layanan Pengaduan</b></p>
							</div>
						</a>

						<h3 style="margin-top:15px;">Kantor Desa :</h3>
						<p>{{ $desa['alamat_kantor'] }}, {{ ucwords(setting('sebutan_kecamatan')." ".$desa['nama_kecamatan']) }}, {{ ucwords(setting('sebutan_kabupaten')." ".$desa['nama_kabupaten']) }} - Provinsi {{ $desa['nama_propinsi'] }}</p>
						<div class="footer-social flexcenter" style="margin-top:15px;">
							@foreach ($sosmed as $data)
								@if (!empty($data['link']))
									<a href="{{ $data['link'] }}" target="_blank" rel="noopener">
										<img src="{{ $data['icon'] }}" alt="{{ $data['nama'] }}" style="width:24px;height:24px;margin:0 3px !important;" />
									</a>
								 @endif
							@endforeach
						</div>
					</div>
				</div>
			</div>	
		</div>	
		</div>
		<div class="modalfoot bgwhite bordergrey1 flexcenter" data-dismiss="modal" aria-label="Close">
			<div class="close-btn bgcolor-1"></div>
		</div>	
	</div>
	</div>
</div>
</div>

<div id="openmenu" class="menupanel">
	<div class="mb-close flexcenter" onclick="menuClose()">
		<div class="mb-close-inner flexcenter">
		<svg viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" /></svg>
		</div>
	</div>
	<div class="scroll-area" id="scrollstyle">
		<div class="panel-padding">
			<div class="topmobile">
				<div class="mobilegrid">
					<div class="topmobile-item">
						<a href="{{ site_url('siteman') }}" target="_blank">
						<div class="topmobile-item-inner bgbiru flexleft">
							<svg viewBox="0 0 24 24"><path d="M6 8C6 5.79 7.79 4 10 4S14 5.79 14 8 12.21 12 10 12 6 10.21 6 8M12 18.2C12 17.24 12.5 16.34 13.2 15.74V15.5C13.2 15.11 13.27 14.74 13.38 14.38C12.35 14.14 11.21 14 10 14C5.58 14 2 15.79 2 18V20H12V18.2M22 18.3V21.8C22 22.4 21.4 23 20.7 23H15.2C14.6 23 14 22.4 14 21.7V18.2C14 17.6 14.6 17 15.2 17V15.5C15.2 14.1 16.6 13 18 13C19.4 13 20.8 14.1 20.8 15.5V17C21.4 17 22 17.6 22 18.3M19.5 15.5C19.5 14.7 18.8 14.2 18 14.2C17.2 14.2 16.5 14.7 16.5 15.5V17H19.5V15.5Z" /></svg>
							<div>
							<p>Login</p><p>Admin</p>
							</div>
						</div>
						</a>
					</div>
					<div class="topmobile-item">
						<a href="{{ site_url('layanan-mandiri/masuk') }}" target="_blank">
						<div class="topmobile-item-inner bgorange flexleft">
							<svg viewBox="0 0 24 24"><path d="M21 10V9L15 3H5C3.89 3 3 3.89 3 5V19C3 20.11 3.9 21 5 21H11V19.13L19.39 10.74C19.83 10.3 20.39 10.06 21 10M14 4.5L19.5 10H14V4.5M22.85 14.19L21.87 15.17L19.83 13.13L20.81 12.15C21 11.95 21.33 11.95 21.53 12.15L22.85 13.47C23.05 13.67 23.05 14 22.85 14.19M19.13 13.83L21.17 15.87L15.04 22H13V19.96L19.13 13.83Z" /></svg>
							<div>
							<p>Layanan</p><p>Mandiri</p>
							</div>
						</div>
						</a>
					</div>
				</div>
			</div>
			@include('theme::partials.menu_head')
		</div>
	</div>
</div>

<div id="bload">
<div class="bload-container bgcolor-1 flexcenter">
	<div class="bloading">
	<div>
	<div class="outer">
		<div class="logo-loading">
			<img src="{{ gambar_desa($desa['logo']) }}"/>
		</div>
		<div class="infinityChrome">
		  <div></div>
		  <div></div>
		  <div></div>
		</div>
		<div class="infinity">
		  <div> <span></span></div>
		  <div> <span></span></div>
		  <div> <span></span></div>
		</div>	
		<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="goo-outer">
		  <defs>
			<filter id="goo">
			  <feGaussianBlur in="SourceGraphic" stdDeviation="6" result="blur"></feGaussianBlur>
			  <feColorMatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo"></feColorMatrix>
			  <feBlend in="SourceGraphic" in2="goo"></feBlend>
			</filter>
		  </defs>
		</svg>
	</div>
	<h1 class="color-2">{{ ucwords(setting('sebutan_desa')) }} {{ ucwords($desa['nama_desa']) }}</h1>
	<p class="color-2">{{ ucwords(setting('sebutan_kecamatan')." ".$desa['nama_kecamatan']) }}<br/>{{ ucwords(setting('sebutan_kabupaten')." ".$desa['nama_kabupaten']) }} - {{ $desa['nama_propinsi'] }}</p>
	</div>
</div>	
</div>
</div>

<script>
$(document).ready(function(){
$("#bload").delay(300).fadeOut();
})
</script>

<script>
	var tw = new Date();
	if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
	else (a=tw.getTime());
	tw.setTime(a);
	var tahun= tw.getFullYear ();
	var hari= tw.getDay ();
	var bulan= tw.getMonth ();
	var tanggal= tw.getDate ();
	var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
	var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
	document.getElementById("topdate").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun;
</script>

<script>
var inc = 1000;

clock();

function clock() {
  const date = new Date();

  const hours = ((date.getHours() + 11) % 12 + 1);
  const minutes = date.getMinutes();
  const seconds = date.getSeconds();
  
  const hour = hours * 30;
  const minute = minutes * 6;
  const second = seconds * 6;
  
  document.querySelector('.hour').style.transform = `rotate(${hour}deg)`
  document.querySelector('.minute').style.transform = `rotate(${minute}deg)`
  document.querySelector('.second').style.transform = `rotate(${second}deg)`
}

setInterval(clock, inc);
</script>

<script>
	function menuOpen() {
	  document.getElementById("openmenu").style.width = "100%";
	}
	function menuClose() {
	  document.getElementById("openmenu").style.width = "0";
	}	
</script>