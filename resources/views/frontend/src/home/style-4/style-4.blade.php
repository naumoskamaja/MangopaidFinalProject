@if(count($sliders)>=1)
    @include('frontend.src.home.style-2.sections.slider')
@endif
@include('frontend.src.home.style-3.sections.sidetext-banner')

@include('frontend.src.home.style-4.sections.top-products')
@include('frontend.src.home.style-4.sections.categories')

@if(isset($video) && $video!=null)
@include('frontend.src.home.style-4.sections.video-banner')
@endif
@include('frontend.src.home.style-4.sections.search')
{{--@if(isset($fullwidth_banner) && $fullwidth_banner!=null)--}}
{{--    @include('frontend.src.home.common.fullwidth-banner')--}}
{{--@endif--}}
@include('frontend.src.home.common.featured-area')
@include('frontend.src.home.style-3.sections.subscribe-section')
