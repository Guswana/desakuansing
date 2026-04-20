@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div class="maphome">
	<div class="rowsame">
		<div class="wilayah-left flexleft">
		<div class="padding-10" style="margin-top:20px;">
			<table class="table-noborder" style="width:100%;">
				<tr>
					<td>Latitude</td><td style="width:20px;text-align:center;">:</td><td>{{ $desa['lat'] }}</td>
				</tr>
				<tr>
					<td>Longitude</td><td style="width:20px;text-align:center;">:</td><td>{{ $desa['lng'] }}</td>
				</tr>
			</table>
			<p>{{ ucwords(setting('sebutan_desa')) }} {{ ucwords($desa['nama_desa']) }}, {{ ucwords(setting('sebutan_kecamatan')." ".$desa['nama_kecamatan']) }}, {{ ucwords(setting('sebutan_kabupaten')." ".$desa['nama_kabupaten']) }} - {{ $desa['nama_propinsi'] }}</p>
			<p><a href="https://www.openstreetmap.org/#map=15/{{ $desa['lat'] }}/{{ $desa['lng'] }}" rel="noopener noreferrer" target="_blank">Buka Peta</a></p>
		</div>
		</div>
		<div class="wilayah-right">
		<div id="map_wilayah" class="maphome-height"></div>
		</div>
	</div>
	<div class="mapleft-head"><h1 class="bgcolor-1 flexcenter">Wilayah {{ ucwords(setting('sebutan_desa')) }}</h1></div>
</div>

<script>
    //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
    @if (!empty($desa['lat']) && !empty($desa['lng']))
        var posisi = [{{ $desa['lat'] }}, {{ $desa['lng'] }}];
        var zoom = {{ $desa['zoom'] ?: 10 }};
    @else
        var posisi = [-1.0546279422758742, 116.71875000000001];
        var zoom = 10;
    @endif

    var options = {
        maxZoom: {{ setting('max_zoom_peta') }},
        minZoom: {{ setting('min_zoom_peta') }},
    };

    //Style polygon
    var style_polygon = {
        stroke: true,
        color: '#FF0000',
        opacity: 1,
        weight: 2,
        fillColor: '#8888dd',
        fillOpacity: 0.5
    };
    var wilayah_desa = L.map('map_wilayah', options).setView(posisi, zoom);

    //Menampilkan BaseLayers Peta
    var baseLayers = getBaseLayers(wilayah_desa, "{{ setting('mapbox_key') }}", "{{ setting('jenis_peta') }}");

    L.control.layers(baseLayers, null, {
        position: 'topright',
        collapsed: true
    }).addTo(wilayah_desa);

    @if (!empty($desa['path']))
        var polygon_desa = {!! $desa['path'] !!};
        var kantor_desa = L.polygon(polygon_desa, style_polygon).bindTooltip("Wilayah Desa").addTo(wilayah_desa);
        wilayah_desa.fitBounds(kantor_desa.getBounds());
    @endif
</script>