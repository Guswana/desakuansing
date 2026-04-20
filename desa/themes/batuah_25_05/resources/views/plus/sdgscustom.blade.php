@push('styles')
<style type="text/css">
.sdgsportabel-heading a::after {position:relative;z-index:10;content: "";border: solid;border-width: 0 3px 3px 0;display: inline-block;padding: 5px;margin:0 0 0 10px!important;top:-30px!important;transform: rotate(45deg);border-color:#fff!important;}
@media (max-width: 992px) {
.sdgsportabel-heading{margin-bottom:-30px!important;}
.sdgsportabel-heading a::after {margin:0 0 3px 10px!important;}
}
</style>
@endpush
@php $sdgscustom = theme_config('sdgscustom', ''); @endphp

@if (theme_config('sdgscustom') == 'true')
<div class="col-default" style="margin-top:10px;">
	<div class="sdgsportabel bordergrey1">
	<div class="sdgshead bggrad-color2 flexcenter">
		<img src="{{ theme_asset('images/sdgs/logo-sdgs.png') }}"/>
		<h1>SDGS</h1>
	</div>
	<div class="sdgsportabel-heading" style="padding:0;border-radius:0 0 5px 5px;text-align:center;">
	<a data-toggle="collapse" data-parent="#accordion" href="#collapsesdgs" style="padding:0;">
		<div class="sdgsportabel-top">
			<div class="desktop-only"><img style="width:100%;display:block;height:auto;margin:0 auto -30px" src="{{ theme_asset('images/sawah.jpg') }}"/></div>
			<div class="head-sdgsmobile imagecover">
				<img src="{{ theme_asset('images/nature.jpg') }}"/>
			</div>
			<div class="sdgsportabel-topleft flexcenter">
				<div>
				<h2>Skor SDGs {{ ucwords(setting('sebutan_desa')) }}</h2>
				<h1 id="average"></h1>
				</div>
			</div>
			<div class="sdgsportabel-topright flexcenter">
				<img src="{{ theme_asset('images/sdgs-multi.png') }}"/>
			</div>
		</div>
	</a>
	</div>
	<div id="collapsesdgs" class="panel-collapse collapse">
		<div class="sdgsportabel-inner bgwhite bordergrey1">
			<div class="sdgsportabel-row">
				<div id="sdgsData"></div>
			</div>
		</div>
	</div>
	</div>
</div>
@endif

@push('scripts')
<script type="text/javascript">
    $(function() {
        $.get("{{ route('api.sdgs') }}", function(data) {
            if (data['error_msg']) {
                $('#errorMsg').show().next('#sdgs_desa').hide();
                $('#errorText').html(data['error_msg']);
                return;
            }

            $('#sdgs_desa').show();
            var { data, total_desa, average } = data['data'][0]['attributes'];
            var path = BASE_URL + 'assets/images/sdgs/';
            $('#average').prepend(`${average} `);
            
            data.forEach(item => {
                const image = path + item.image;
                $('#sdgsData').append(`
                    <div class="sdgs-col bgwhite bordergrey">
						<div class="icon-sdgs">
							<div class="padding-leftright-10"><img src="${image}" alt="${item.image}"></div>
						</div>
						<div class="sdgs-point bordergrey">
							<p>Nilai</p>
							<h2>${item.score}</h2>
						</div>
                    </div>
                `);
            });
        });
    });
	var config=@json(identitas());
</script>
@endpush