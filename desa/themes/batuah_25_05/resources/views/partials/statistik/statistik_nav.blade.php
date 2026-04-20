
@php 
  $daftar_statistik = daftar_statistik();
  $slug_aktif       = str_replace('_', '-', $slug_aktif);
  $s_links = [
    [
      'target' => 'statistikPenduduk',
      'label' => 'Statistik Penduduk',
      'icon' => 'ti-chart-pie iconpenduduk',
      'submenu' => $daftar_statistik['penduduk']
    ],
    [
      'target' => 'statistikBantuan',
      'label' => 'Statistik Bantuan',
      'icon' => 'ti-chart-line iconbantuan',
      'submenu' => $daftar_statistik['bantuan']
    ],
    [
      'target' => 'statistikLainnya',
      'label' => 'Statistik Lainnya',
      'icon' => 'ti-chart-area iconlainnya',
      'submenu' => $daftar_statistik['lainnya']
    ]
  ];
@endphp
	
	@foreach($s_links as $statistik) 
    @php $is_active = in_array($slug_aktif, array_column($statistik['submenu'], 'slug')) @endphp
    <div class="panel-group bgwhite" id="accordion" role="tablist" aria-multiselectable="true" style="margin:10px 0 0 !important;">
	
      <div class="panel panel-default bgwhite" style="margin-bottom:0 !important;">

        <div class="heading-stat bgwhite flexleft bordergrey1" id="heading-{{ $statistik['label'] }}" role="tab">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $statistik['target']}}" aria-expanded="{{ $is_active ? 'true' : 'false' }}" aria-controls="{{ $statistik['target']}}"><i class="fa {{ $statistik['icon'] }}"></i> {{ $statistik['label'] }}</a>
        </div>
        <div id="{{ $statistik['target'] }}" class="panel-collapse collapse">
          <div class="panel-box bordergrey1">
            @foreach($statistik['submenu'] as $submenu) 
               @php
                $stat_slug = in_array($statistik['target'], ['statistikBantuan', 'statistikLainnya']) ? str_replace('first/', '', $submenu['url']) : 'statistik/' . $submenu['key'];
                if($stat_slug == 'data-dpt'){
                  $stat_slug = 'dpt';
                }
              @endphp
               @if (isset($statistik_aktif[$stat_slug]))
				@php $url = str_replace('first/statistik', 'data-statistik', $submenu['url']) @endphp	
                  <h3 class="stat-sub" id="statistik_13"><a href="{{ site_url($url) }}" class="{{ $submenu['slug'] == $slug_aktif ? 'bggrad-color2 stat-white' : 'hover:cursor-pointer hover:text-primary dark:text-white' }}">{{ $submenu['label'] }}</a></h3>
                @endif
				@endforeach
          </div>
        </div>
      </div>

    </div>
@endforeach