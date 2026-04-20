@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp
@include('theme::plus.main')
@php defined('FOTO_TIDAK_TERSEDIA') or define('FOTO_TIDAK_TERSEDIA', theme_config('foto_tidak_tersedia') ? base_url(theme_config('foto_tidak_tersedia')) : asset('images/404-image-not-found.jpg')) @endphp
@php $desa_title =  ucwords(setting('sebutan_desa')) . ' '. $desa['nama_desa'] . ' '. ucwords(setting('sebutan_kecamatan')) . ' '. $desa['nama_kecamatan'] . ' '. ucwords(setting('sebutan_kabupaten')) . ' '. $desa['nama_kabupaten']; @endphp

<meta http-equiv="encoding" content="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='viewport' content='width=device-width, initial-scale=1' />
<meta name='google' content='notranslate' />
<meta name='theme' content='Batuah' />
<meta name='designer' content='Rohmanudin' />
<meta name='theme:designer' content='Rohmanudin' />
<meta name='theme:version' content='{{ THEME_VERSION }}' />
<meta name="keywords" content="{{ setting('website_title') . ' '.  $desa_title }}"/>
<meta property="og:site_name" content="{{ $desa_title }}"/>
<meta property="og:type" content="article"/>
<title>
@if ($single_artikel["judul"] == "")
	{{ setting('website_title') . ' '.  $desa_title }}
@else
	{{ $single_artikel["judul"].' - '.ucwords(setting('sebutan_desa')) . ' ' . $desa['nama_desa'] }}
@endif
</title>

<link rel="shortcut icon" href="{{ favico_desa() }}"/>
<link rel="stylesheet" href="{{ theme_asset('fonts/custom.css') }}">
<link rel="stylesheet" href="{{ theme_asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ theme_asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ theme_asset('css/style.css') }}">
<link rel='stylesheet' href="{{ asset('css/font-awesome.min.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
<link rel="stylesheet" href="{{ asset('css/mapbox-gl.css') }}"/>
<link rel="stylesheet" href="{{ asset('css/peta.css') }}">
<link rel="stylesheet" href="{{ asset('bootstrap/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ theme_asset('css/color/01.css') }}">
<link rel="stylesheet" href="{{ theme_asset('css/responsive.css') }}">
@include('theme::commons.style')
<link href="{{ theme_asset('css/color/01.css') }}" rel="stylesheet alternate" title="01">
<link href="{{ theme_asset('css/color/02.css') }}" rel="stylesheet alternate" title="02">
<link href="{{ theme_asset('css/color/03.css') }}" rel="stylesheet alternate" title="03">
<link href="{{ theme_asset('css/color/04.css') }}" rel="stylesheet alternate" title="04">
<link href="{{ theme_asset('css/color/05.css') }}" rel="stylesheet alternate" title="05">
<link href="{{ theme_asset('css/color/06.css') }}" rel="stylesheet alternate" title="06">
<link href="{{ theme_asset('css/color/07.css') }}" rel="stylesheet alternate" title="07">
<link href="{{ theme_asset('css/color/08.css') }}" rel="stylesheet alternate" title="08">
@stack('styles')
@if(isset($single_artikel))
	<meta property="og:title" content="{{ htmlspecialchars($single_artikel['judul']) }}" />
    <meta property="og:url" content="{{ site_url('artikel/' . buat_slug($single_artikel)) }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="630" />
    <meta property="og:image" content="{{ base_url(LOKASI_FOTO_ARTIKEL . 'kecil_' . $single_artikel['gambar']) }}" />
    <meta property="og:description" content="{{ potong_teks($single_artikel['isi'], 300) }} ..." />
@else
	<meta property="og:title" content="{{ $desa_title }}"/>
	<meta property="og:url" content="{{ site_url() }}"/>
	<meta property="og:description" content="{{ setting('website_title') . ' '.  $desa_title }}"/>
@endif
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ if (window.scrollY == 0) window.scrollTo(0,1); } </script>
<script>
	var BASE_URL = '{{ base_url() }}';
	var SITE_URL = '{{ site_url() }}';
	var setting  = @json(setting());
	var config   = @json(identitas());
</script>
<script language='javascript' src="{{ asset('front/js/jquery.min.js') }}"></script>
<script src="{{ theme_asset('js/slider.js') }}"></script>
<script language='javascript' src="{{ asset('front/js/jquery.cycle2.min.js') }}"></script>
<script language='javascript' src="{{ asset('front/js/jquery.cycle2.carousel.js') }}"></script>
<script src="{{ theme_asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/leaflet.js') }}"></script>
<script src="{{ asset('front/js/layout.js') }}"></script>
<script src="{{ asset('front/js/jquery.colorbox.js') }}"></script>
<script src="{{ asset('js/leaflet-providers.js') }}"></script>
<script src="{{ asset('js/mapbox-gl.js') }}"></script>
<script src="{{ asset('js/leaflet-mapbox-gl.js') }}"></script>
<script src="{{ asset('js/peta.js') }}"></script>
<script src="{{ asset('bootstrap/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/dataTables.bootstrap.min.js') }}"></script>
@include('admin.layouts.components.validasi_form', ['web_ui' => true])
@include('theme::commons.batuah')
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="{{ theme_asset('js/jquery-bt2.js') }}"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2&appId={{ config_item('fb_id') }}&autoLogAppEvents=1"></script>

{!! view('admin.layouts.components.token') !!}
