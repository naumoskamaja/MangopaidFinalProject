@if (isset($paginator) && $paginator->lastPage() > 1)
    <ul class="pagination">
    @php
        $interval = isset($interval) ? abs(intval($interval)) : 3 ;
        $from = $paginator->currentPage() - $interval;
        if($from < 1){
          $from = 1;
        }

        $to = $paginator->currentPage() + $interval;
        if($to > $paginator->lastPage()){
          $to = $paginator->lastPage();
        }
    @endphp
    <!-- first/previous -->
        @if($paginator->currentPage() > 1)
            <li class="prevv">
                <a href="{{ $paginator->url(1) }}?orderby={{$orderBy??''}}" aria-label="First">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li  class="prevv">
                <a href="{{ $paginator->url($paginator->currentPage() - 1) }}&orderby={{$orderBy??''}}" aria-label="Previous">
                    <span aria-hidden="true">&lsaquo;</span>
                </a>
            </li>
        @endif
    <!-- links -->
        @for($i = $from; $i <= $to; $i++)
            @php
                $isCurrentPage = $paginator->currentPage() == $i;
            @endphp
            <li class="{{ $isCurrentPage ? 'active' : '' }}">
                <a href="{{ !$isCurrentPage ? $paginator->url($i) : '#' }}&orderby={{$orderBy??''}}">
                    {{ $i }}
                </a>
            </li>
        @endfor
    <!-- next/last -->
        @if($paginator->currentPage() < $paginator->lastPage())
            <li class="nextt">
                <a href="{{ $paginator->url($paginator->currentPage() + 1) }}&orderby={{$orderBy??''}}" aria-label="Next">
                    <span  aria-hidden="true">&rsaquo;</span>
                </a>
            </li>
            <li class="nextt">
                <a href="{{ $paginator->url($paginator->lastpage()) }}&orderby={{$orderBy??''}}" aria-label="Last">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        @endif
    </ul>
@endif

<style>
    .pagination li {
        padding: .5rem 1rem !important;
    }
    .pagination .active{
        border-bottom: 2px solid rgb(0, 60, 48);
    }
    .pagination .active a{
        color: rgb(0, 60, 48) !important;
    }
    .pagination .nextt, .pagination .prevv{
        padding: .5rem !important;
    }

    .pagination > li{
        display: -ms-flexbox;
        display: flex;
        padding-left: 0;
        list-style: none;
        width: 100%;
        text-align: center;
    }
</style>
