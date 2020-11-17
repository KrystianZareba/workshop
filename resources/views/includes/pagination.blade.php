@if ($paginator->lastPage() > 1)
    <nav>
        <ul class="pagination pg-blue justify-content-end">
            <li class="page-item ">
                <a href="{{ $paginator->url(1) }}" class="page-link">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="page-item ">
                <a href="{{ $paginator->url($paginator->currentPage()+1) }}" class="page-link">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endif
