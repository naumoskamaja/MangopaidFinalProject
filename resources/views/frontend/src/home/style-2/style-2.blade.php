@if(count($sliders)>=1)
    @include('frontend.src.home.style-2.sections.slider')
@endif
@include('frontend.src.home.common.top-products')
@include('frontend.src.home.common.categories')
@if(count($two_large_banners)>=2)
    @include('frontend.src.home.common.multiple-banners')
@endif
@include('frontend.src.home.common.featured-area')
@include('frontend.src.home.style-2.sections.subscribe-section')