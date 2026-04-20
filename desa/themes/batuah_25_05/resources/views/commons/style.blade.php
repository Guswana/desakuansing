@php $randomcolor = theme_config('randomcolor', ''); @endphp
@php $clr1 = theme_config('clr1', '#6eab11'); @endphp
@php $clr2 = theme_config('clr2', '#00743e'); @endphp
@php $clr3 = theme_config('clr3', '#38c255'); @endphp
@php $clrsoft1 = theme_config('clrsoft1', '#b2e665'); @endphp
@php $clrsoft2 = theme_config('clrsoft2', '#d5edb8'); @endphp

@if (theme_config('randomcolor') == 'true')
	<style type="text/css">
		:root{
			--clr1: <?=$clr1?>;
			--clr2: <?=$clr2?>;
			--clr3: <?=$color3?>;
			--clrsoft1: <?=$clrsoft1?>;
			--clrsoft2: <?=$clrsoft2?>;
		}
	</style>
@else	
	@if (theme_config('templatecolor') == '01')
		<link rel="stylesheet" href="{{ theme_asset('css/color/01.css') }}">
	@elseif (theme_config('templatecolor') == '02')
		<link rel="stylesheet" href="{{ theme_asset('css/color/02.css') }}">
	@elseif (theme_config('templatecolor') == '03')
		<link rel="stylesheet" href="{{ theme_asset('css/color/03.css') }}">	
	@elseif (theme_config('templatecolor') == '04')
		<link rel="stylesheet" href="{{ theme_asset('css/color/04.css') }}">	
	@elseif (theme_config('templatecolor') == '05')
		<link rel="stylesheet" href="{{ theme_asset('css/color/05.css') }}">	
	@elseif (theme_config('templatecolor') == '06')
		<link rel="stylesheet" href="{{ theme_asset('css/color/06.css') }}">	
	@elseif (theme_config('templatecolor') == '07')
		<link rel="stylesheet" href="{{ theme_asset('css/color/07.css') }}">
	@elseif (theme_config('templatecolor') == '08')
		<link rel="stylesheet" href="{{ theme_asset('css/color/08.css') }}">		
	@else
		<link rel="stylesheet" href="{{ theme_asset('css/color/01.css') }}">
	@endif
@endif
