@if ($paginator->hasPages())
	<div style="width:100%;float:left;margin:12px 0;">
        <div class="flexcenter infopaging" style="font-size:90%;">Halaman {{ $paginator->currentPage() }} dari {{ $paginator->lastPage() }}</div>
        <div class="pagination flexcenter" style="float:none !important;padding:0 !important;margin:0 auto !important;">
            {{-- Previous Page Link --}}
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url(1) }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-fast-backward"></i>&nbsp;</a>
            </li>
            @if ($paginator->onFirstPage())
                
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-backward"></i>&nbsp;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-forward"></i>&nbsp;</a>
                </li>
            @else
                
            @endif
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-fast-forward"></i>&nbsp;</a>
            </li>
        </div>
	 </div>	
@endif
