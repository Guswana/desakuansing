@php defined('BASEPATH') || exit('No direct script access allowed'); @endphp

<div class="maphome">
<div id="map_canvas" class="maphome-height"></div>
<div class="mapleft-head"><h1 class="bgcolor-1 flexcenter">Lokasi Kantor {{ ucwords(setting('sebutan_desa')) . " " }}</h1></div>
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

    var lokasi_kantor = L.map('map_canvas', options).setView(posisi, zoom);

    //Menampilkan BaseLayers Peta
    var baseLayers = getBaseLayers(lokasi_kantor, "{{ setting('mapbox_key') }}", "{{ setting('jenis_peta') }}");

    L.control.layers(baseLayers, null, {
        position: 'topright',
        collapsed: true
    }).addTo(lokasi_kantor);

    //Jika posisi kantor desa belum ada, maka posisi peta akan menampilkan seluruh Indonesia
    @if (!empty($desa['lat']) && !empty($desa['lng']))
        var kantor_desa = L.marker(posisi).addTo(lokasi_kantor);
    @endif
</script>