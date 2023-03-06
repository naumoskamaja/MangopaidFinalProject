@if(isset($conf) && $conf!=null)
    @switch($conf->template)
        @case(2)
        @include('frontend.layout.header.header-style-1')
        @break
        @case(3)
        @include('frontend.layout.header.header-style-2')
        @break
        @case(4)
        @include('frontend.layout.header.header-style-2')
        @break
        @default
        @include('frontend.layout.header.header-style-1')
    @endswitch
@endif


