@if ($paginator->lastPage() > 1)
    <div class="col-md-offset-5">
        <ul class="pagination">
            <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a href="{{ $paginator->url(1) }}">&laquo;</a>
            </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
            <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                @if($paginator->currentPage() != $paginator->lastPage())
                    <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >&raquo;</a>
                @else
                    <a href="" >&raquo;</a>
                @endif

            </li>
        </ul>
    </div>

@endif