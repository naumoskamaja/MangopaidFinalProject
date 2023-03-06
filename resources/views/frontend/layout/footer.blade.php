@if(isset($conf) && $conf!=null)
    @switch($conf->template)
        @case(2)
        @include('frontend.layout.footer.footer-style-2')
        @break
        @case(3)
        @include('frontend.layout.footer.footer-style-3')
        @break
        @case(4)
        @include('frontend.layout.footer.footer-style-4')
        @break
        @default
        @include('frontend.layout.footer.footer-style-1')
    @endswitch
@endif


