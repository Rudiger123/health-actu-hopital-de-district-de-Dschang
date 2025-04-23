<style>
    .pagination-list {
        display: flex;
        list-style: none;
        padding: 0;
        gap: 8px;
    }

    .pagination-list li {
        margin: 0 3px;
    }

    .pagination-list li a,
    .pagination-list li span {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        text-decoration: none;
        color: #007bff;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
    }

    .pagination-list li.active span {
        background: #007bff;
        color: white;
        border-color: #007bff;
    }

    .pagination-list li a:hover {
        background: #f8f9fa;
        border-color: #007bff;
        color: #007bff;
    }

    .pagination-list li.disabled span {
        color: #6c757d;
        border-color: #dee2e6;
        cursor: not-allowed;
    }
</style>

@if ($paginator->hasPages())
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev">
                    <i class="bi bi-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page">
                            <span>{{ $page }}</span>
                        </li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next">
                    <i class="bi bi-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="disabled">
                <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
            </li>
        @endif
    </ul>
@endif
