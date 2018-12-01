<!-- @if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
        @endif
    </ul>
@endif
 -->

@if ($paginator->hasPages())
<div class="pagination">
    <div class="links">
    @if ($paginator->onFirstPage())
        @else
            <a href="{{ $paginator->previousPageUrl() }}" >&lt;</a>
        @endif

        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="page-item disabled"><span class="page-link">{{ $element }}</span></a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <b>{{ $page }}</b>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a></li>
        @else
            <a class="page-item disabled"><span class="page-link">&raquo;</span></a>
        @endif
    </div>
@endif
<!-- <div class="pagination">
          <div class="links"> <b>1</b> <a href="#">2</a> <a href="#"></a> <a href="#">&gt;|</a></div>
          <div class="results">Showing 1 to 15 of 16 (2 Pages)</div>
        </div> -->