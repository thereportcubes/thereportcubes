<ul class="pagination mb-0">
    @if ($paginator->onFirstPage())
        <li class="page-item" aria-label="Previous"><span><i class="icon-west"></i></span></li>
    @else
        <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}"  aria-label="Previous" class="page-link"><i class="icon-west"></i>Previous</a></li>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="page-item"><span>{{ $element }}</span></li>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active page-item"><a href="{{ $url }}" class="page-link"><span>{{ $page }}</span></a></li>
                @else
                    <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach
    
    @if ($paginator->hasMorePages())
        <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" aria-label="Next" class="page-link"><i class="icon-east"></i>Next</a></li>
    @else
        <li class="page-item"><i class="icon-east"></i></li>
    @endif
</ul>