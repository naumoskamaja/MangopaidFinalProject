@if(count($sliders)>=1)
    @include('frontend.src.home.style-1.sections.slider')
@endif
@include('frontend.src.home.common.categories')
@include('frontend.src.home.common.top-products')
@if(count($two_large_banners)>=2)
    @include('frontend.src.home.common.multiple-banners')
@endif
@include('frontend.src.home.style-1.sections.search')
@if(isset($fullwidth_banner) && $fullwidth_banner!=null)
    @include('frontend.src.home.common.fullwidth-banner')
@endif
@include('frontend.src.home.common.featured-area')
