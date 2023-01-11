@if ($paginator->hasPages())
    <div class="author-btns d-flex align-items-center justify-content-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a
                class="prev d-flex align-items-center justify-content-center"
                aria-disabled="true"
                aria-label="@lang('pagination.previous')"
            >
                <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2L2 10L10 18" stroke="#718096" stroke-width="3" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>
        @else
            <a
                class="prev d-flex align-items-center justify-content-center"
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
                aria-label="@lang('pagination.previous')"
            >
                <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 2L2 10L10 18" stroke="#718096" stroke-width="3" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>
        @endif

        <div class="page">
            Page
            <span class="first-page">{{$paginator->currentPage()}}</span>
            of
            <span class="last-page">{{$paginator->lastPage()}}</span>
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a
                href="{{ $paginator->nextPageUrl() }}"
                rel="next"
                aria-label="@lang('pagination.next')"
                class="next d-flex align-items-center justify-content-center"
            >
                <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2L10 10L2 18" stroke="#718096" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        @else
            <a
                href="{{ $paginator->nextPageUrl() }}"
                rel="next"
                aria-disabled="true"
                aria-label="@lang('pagination.next')"
                class="next d-flex align-items-center justify-content-center"
            >
                <svg width="12" height="20" viewBox="0 0 12 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 2L10 10L2 18" stroke="#718096" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        @endif
    </div>
@endif
