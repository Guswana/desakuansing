@extends('theme::layouts.full-content')
@push('styles')
<style type="text/css">
	.sdgs-col {float:left;}
</style>
@endpush
@section('content')
@include('theme::plus.header_side')
<div class="mainpage">
	<div class="margin-side-10">
	<div class="mainbodyarea">
		<div class="bigarea hiddenrelative">
		<div class="bigarea-margin">
			<div class="col-default margin-top-10">
				<div class="bodypage bgwhite bordergrey">
					<div class="headsmall headstat-lebar padding-leftright-10 flexcenter" style="padding: 10px 10px 5px !important;">
						<img src="{{ theme_asset('images/sdgs.png') }}"/>
						<div>
						<h3 class="color-1">SDGs</h3>
						<p>(Sustainable Development Goals)</p>
						</div>
					</div>
					<div class="pagebox">
						<div class="relative-hidden plr-15 ptb-15">
							<div id="errorMsg" style="display: none;">
								<div class="alert alert-danger">
									<p class="py-3" id="errorText"></p>
								</div>
							</div>
							<div class="scoring c1"></div>
							<div class="info-box sdgshead bgwhite bordergrey" style="display: flex;justify-content: center;padding:15px !important;margin-bottom:5px !important;">
							<span class="info-box-number total-bumds" style="text-align: center;">
								<span class="info-box-text desc-bumds" style="text-align: center;">Skor SDGs {{ ucwords(setting('sebutan_desa')) }}<br/><font id="average" style="font-size:140%;"></font></span>
							</span>
							</div>
							
							<div id="sdgsData"></div>
							
						</div>
					</div>
				</div>
			</div>
			@include('theme::plus.middle_page')
		</div>
		</div>
		<div class="rightsidearea">
			@include('theme::plus.side')		
		</div>
	</div>
	</div>
</div>
@endsection

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