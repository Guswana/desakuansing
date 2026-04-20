<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--@php $kddesa = base64_encode($desa['kode_desa']); @endphp-->
    @include('theme::commons.config')
    @include('theme::commons.meta')
</head>
<body>
	<div id="batuah">
	<div class="rowabsolute">
		@include('theme::partials.header')
		@yield('layout')
		@include('theme::plus.bottom_page')
		@include('theme::partials.footer')
	</div>
	</div>
	@include('theme::commons.meta_footer')
	<script type="text/javascript">
       function formatRupiah(angka, prefix = 'Rp ') {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '') + ',00';
        }
    </script>
    @stack('scripts')
</body>
</html>