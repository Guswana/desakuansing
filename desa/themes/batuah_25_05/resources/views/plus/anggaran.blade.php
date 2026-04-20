

<div class="hiddenrelative" style="padding:0 0 15px;">
<div class="headmod2 bgcolor-1 flexcenter" style="border-radius:5px 5px 0 0;"><h1 class="bggrey1 color-2">Transparansi Anggaran</h1></div>
    <div class="keuangan bggrey1 bordergrey" style="position:relative;overflow:hidden;">
	    <div class="samerow3">
	        @foreach ($data_widget as $subdata_name => $subdatas)
		        <div class="keuangan-col bgwhite bordergrey">
		            <div class="flexcenter">
		                <div class="head-anggaran flexcenter">
						<h2>
						{{ \Illuminate\Support\Str::of($subdatas['laporan'])
						->when(setting('sebutan_desa') != 'desa', function (\Illuminate\Support\Stringable $string) {
						return $string->replace('Des', \Illuminate\Support\Str::of(setting('sebutan_desa'))->substr(0,
						1)->ucfirst());
						}) }}
						</h2>
						</div>
		            </div>
					<div class="scroll-area" id="scrollstyle">
		            @foreach ($subdatas as $key => $subdata)
					@continue(!is_array($subdata))
						@if($subdata['judul'] != NULL and $key != 'laporan' and $subdata['realisasi'] != 0 or $subdata['anggaran'] != 0)
				            <div class="keuangan-box">
					            <h3>
								{{ \Illuminate\Support\Str::of($subdata['judul'])
								->title()
								->whenEndsWith('Desa', function (\Illuminate\Support\Stringable $string) {
								if (!in_array($string, ['Dana Desa'])) {
								return $string->replace('Desa', setting('sebutan_desa'));
								}
								})
								->title() }}
								</h3>
					            <table class="table-anggaran" style="width:100%;">
						            <tr>
							            <td style="text-align:center;font-size:95%;">Anggaran</td><td style="text-align:center;font-size:95%;">Realisasi</td>
						            </tr>
						            <tr>
							            <td style="font-size:90%;letter-spacing:-0.3px;">{{ rupiah24($subdata['anggaran']) }}</td><td style="font-size:90%;letter-spacing:-0.3px;">{{ rupiah24($subdata['realisasi'], 'RP ') }}</td>
						            </tr>
					            </table>
					            <div class="progress-anggaran">	
						            <progress max="100" value="{{ $subdata['persen'] }}" class="php">
							            <div class="progress-bar" role="progressbar" style="width: {{ $subdata['persen'] }}%" aria-valuenow="{{ $subdata['persen'] }}" aria-valuemin="0" aria-valuemax="100"></div>
						            </progress>
						            <p style="width:{{ $subdata['persen'] }}%" data-value="{{ $subdata['persen'] }}"></p>
					            </div>
				            </div>
			            @endif
		            @endforeach
					</div>
		        </div>
        	@endforeach
	    </div>
    </div>
</div>    