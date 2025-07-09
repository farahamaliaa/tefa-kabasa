@props(['paginator'])

@if ($paginator->hasPages())
    <div class="pagination_block" data-aos="fade-up" data-aos-duration="1500">
        <div class="row">
            <div class="col-lg-8">
                <ul>
                    <!-- Tautan Halaman Sebelumnya -->
                    @if ($paginator->onFirstPage())
                        <li class="disabled"><a href="#"><i class="icofont-double-left"></i></a></li>
                    @else
                        <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="icofont-double-left"></i></a></li>
                    @endif

                    <!-- Elemen Paginasi -->
                    @if ($paginator->lastPage() > 5 && $paginator->currentPage() > 3)
                        <li><a href="{{ $paginator->url(1) }}">1</a></li>
                        <li class="disabled"><a href="#">...</a></li>
                    @endif

                    @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->lastPage(), $paginator->currentPage() + 2); $i++)
                        <li><a href="{{ $paginator->url($i) }}" class="{{ $paginator->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a></li>
                    @endfor

                    @if ($paginator->lastPage() > 5 && $paginator->currentPage() < $paginator->lastPage() - 2)
                        <li class="disabled"><a href="#">...</a></li>
                        <li><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
                    @endif

                    <!-- Tautan Halaman Berikutnya -->
                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="icofont-double-right"></i></a></li>
                    @else
                        <li class="disabled"><a href="#"><i class="icofont-double-right"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif